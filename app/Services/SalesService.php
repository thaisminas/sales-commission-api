<?php

namespace App\Services;

use App\DTOs\SalesDTO;
use App\Models\Sales;
use App\Repositories\SalesRepository;
use SebastianBergmann\CodeCoverage\Util\Percentage;

const PERCENTAGE = 8.5;

class SalesService
{
    const PERCENTAGE = 8.5;

    private $salesRepository;

    public function __construct(SalesRepository $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }

    public function create($params)
    {
        $params['commission_amount'] = $this->calculateCommission($params['amount']);
        $sales = $this->salesRepository->create($params);

        return $sales;
    }

    public function getAllSales()
    {
        return $this->salesRepository->getSales();
    }

    public function getSalesBySalllersId(int $id)
    {
        if (!is_numeric($id)) {
            throw new \Exception("Erro ao obter dados dos vendedores");
        }

        return $this->salesRepository->getSalesBySalllersId($id);
    }


    private function calculateCommission(float $salesValue)
    {
        return ($salesValue * self::PERCENTAGE) / 100;
    }

    public function getSalesReportBySalesperson($salespersonId)
    {
        return $this->salesRepository->getSalesReportBySalesperson($salespersonId);
    }
}
