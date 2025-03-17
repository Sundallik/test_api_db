<?php

namespace App\Console\Commands;

use App\Services\Api\ApiService;
use App\Services\Api\SalesService;
use Illuminate\Console\Command;

class getSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:sales {dateFrom} {dateTo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get sales from API';

    /**
     * Execute the console command.
     */
    public function handle(SalesService $salesService)
    {
        $dateFrom = $this->argument('dateFrom');
        $dateTo = $this->argument('dateTo');

        $salesService->getSales($dateFrom, $dateTo);

        $this->info('Sales data imported successfully.');
    }
}
