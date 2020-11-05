<?php

namespace App\Console\Commands;

use App\Services\Contracts\CurrencyService;
use App\Services\Contracts\RateService;
use Illuminate\Console\Command;

class CurrencySync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'currency sync';

    protected $currencyService;
    protected $rateService;

    /**
     * Create a new command instance.
     *
     * @param CurrencyService $currencyService
     * @param RateService $rateService
     */
    public function __construct(CurrencyService $currencyService, RateService $rateService)
    {
        parent::__construct();
        $this->currencyService = $currencyService;
        $this->rateService = $rateService;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->currencyService->sync();
    }
}
