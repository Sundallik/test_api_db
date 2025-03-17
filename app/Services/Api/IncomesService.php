<?php

namespace App\Services\Api;
use App\Models\Income;

class IncomesService extends ApiService
{
    public function getIncomes($dateFrom, $dateTo)
    {
        $this->fetchData(
            '/api/incomes',
            ['dateFrom' => $dateFrom, 'dateTo' => $dateTo],
            Income::class,
        );
    }
}
