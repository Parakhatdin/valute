<?php


namespace App\Services;

use App\Repositories\Contracts\CurrencyRepository;
use App\Repositories\Contracts\RateRepository;
use App\Services\Contracts\CurrencyService as CurrencyServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class CurrencyService implements CurrencyServiceInterface
{
    private $url = 'http://cbu.uz/uz/arkhiv-kursov-valyut/json';
    private $data;

    private $currencyRepository;
    private $rateRepository;
    private $requestService;

    /**
     * CurrencyService constructor.
     * @param CurrencyRepository $currencyRepository
     * @param RateRepository $rateRepository
     * @param RequestService $requestService
     */
    public function __construct(CurrencyRepository $currencyRepository, RateRepository $rateRepository, RequestService $requestService)
    {
        $this->currencyRepository = $currencyRepository;
        $this->rateRepository = $rateRepository;
        $this->requestService = $requestService;
    }

    public function get_all($limit)
    {
        return $this->rateRepository->get_last_all($limit);
    }

    public function get_by_id($id)
    {
        return $this->currencyRepository->get_all_rates($id);
    }

    public function sync()
    {
        $data = $this->requestService->get($this->url);
        if (count($data) > 0) {
            $this->data = $data;
            try {
                DB::transaction(function () {
                    foreach ($this->data as $value) {
                        if (!$this->currencyRepository->find($value['Code'])) {
                            $this->currencyRepository->store([
                                'id' => $value['Code'],
                                'name' => $value['Ccy']
                            ]);
                        }
                        $d = explode('.', $value['Date']);
                        $date = $d[2]."-".$d[1]."-".$d[0];
                        if (!$this->rateRepository->find_by_date_and_currency_id($date, $value['Code'])) {
                            $this->rateRepository->store([
                                'currency_id' => $value['Code'],
                                'rate' => $value['Rate'],
                                'date' => $date
                            ]);
                        }
                    }
                });
            } catch (Exception $exception) {
                info("error: ".$exception);
            }
        }
    }
}
