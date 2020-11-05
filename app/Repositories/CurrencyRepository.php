<?php


namespace App\Repositories;

use App\Models\Currency;
use App\Repositories\Contracts\CurrencyRepository as CurrencyRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CurrencyRepository implements CurrencyRepositoryInterface
{

    private $model;

    /**
     * CurrencyRepository constructor.
     * @param Currency $model
     */
    public function __construct(Currency $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        Currency::create($data);
    }

    public function find($id)
    {
        return Currency::find($id)->last_rate();
    }

    public function get_all_rates($id)
    {
        return DB::table('currencies')->
        join('rates', 'currencies.id', '=', 'rates.currency_id')->
        select(['currencies.id', 'currencies.name', 'rates.rate', 'rates.date'])->
        where('currencies.id', '=', $id)->
        get();
    }
}
