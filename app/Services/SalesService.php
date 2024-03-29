<?php

namespace App\Services;

use App\DTOs\SalesDTO;
use App\Repositories\SalesRepository;

class SalesService
{
    private $salesRepository;

    public function __construct(SalesRepository $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }

    public function create(SalesDTO $params)
    {
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
}
