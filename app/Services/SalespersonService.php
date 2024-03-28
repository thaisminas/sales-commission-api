<?php

namespace App\Services;

use App\Repositories\SalespersonRepository;

class SalespersonService
{
    private $salespersonRepository;

    public function __construct(SalespersonRepository $salespersonRepository)
    {
        $this->salespersonRepository = $salespersonRepository;
    }

    public function create(array $params)
    {
        $salesperson = $this->salespersonRepository->create($params);

        return $salesperson;
    }

    public function getSallers()
    {
        return $this->salespersonRepository->getSellers();
    }
}
