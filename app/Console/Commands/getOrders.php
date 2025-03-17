<?php

namespace App\Console\Commands;

use App\Services\Api\ApiService;
use App\Services\Api\OrdersService;
use Illuminate\Console\Command;

class getOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:orders {dateFrom} {dateTo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get orders from API';

    /**
     * Execute the console command.
     */
    public function handle(OrdersService $ordersService)
    {
        $dateFrom = $this->argument('dateFrom');
        $dateTo = $this->argument('dateTo');

        $ordersService->getOrders($dateFrom, $dateTo);

        $this->info('Orders data imported successfully.');
    }
}
