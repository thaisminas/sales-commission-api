<?php

namespace App\Services;

use App\Exceptions\InvalidIdExceptins;
use App\Helpers\CalculateCommission;
use App\Repositories\SalesRepository;




class SalesService
{

    private $salesRepository;
    private $calculateCommission;

    public function __construct(SalesRepository $salesRepository, CalculateCommission $calculateCommission)
    {
        $this->salesRepository = $salesRepository;
        $this->calculateCommission = $calculateCommission;
    }

    public function create($params)
    {
        $params['commission_amount'] = $this->calculateCommission->calculate($params['amount']);
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
            throw new InvalidIdExceptins('Id infomed not is valid');
        }

        return $this->salesRepository->getSalesBySalllersId($id);
    }

    public function getSalesReportBySalesperson($salespersonId)
    {
        return $this->salesRepository->getSalesReportBySalesperson($salespersonId);
    }
}
