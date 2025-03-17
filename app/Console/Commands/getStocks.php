<?php

namespace App\Console\Commands;

use App\Services\Api\ApiService;
use App\Services\Api\StocksService;
use Illuminate\Console\Command;

class getStocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:stocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get stocks from API';

    /**
     * Execute the console command.
     */
    public function handle(StocksService $stocksService)
    {
        $stocksService->getStocks();

        $this->info('Stocks data imported successfully.');
    }
}
