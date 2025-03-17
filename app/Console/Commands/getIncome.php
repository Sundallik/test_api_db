<?php

namespace App\Console\Commands;

use App\Services\Api\ApiService;
use App\Services\Api\IncomesService;
use Illuminate\Console\Command;

class getIncome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:incomes {dateFrom} {dateTo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get incomes from API';

    /**
     * Execute the console command.
     */
    public function handle(IncomesService $incomesService)
    {
        $dateFrom = $this->argument('dateFrom');
        $dateTo = $this->argument('dateTo');

        $incomesService->getIncomes($dateFrom, $dateTo);

        $this->info('Incomes data imported successfully.');
    }
}
