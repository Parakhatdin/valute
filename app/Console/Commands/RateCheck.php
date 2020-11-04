<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\RateCheckService;

class RateCheck extends Command
{
    private $service;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check rate';

    /**
     * Create a new command instance.
     *
     * @param RateCheckService $service
     */
    public function __construct(RateCheckService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->service->check();
    }
}
