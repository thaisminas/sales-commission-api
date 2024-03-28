<?php

namespace App\DTOs;

class SalespersonDTO
{
    public $salesperson;
    public $amount;
    public $salesDate;

    public function __construct($salesperson, $amount, $salesDate)
    {
        $this->salesperson = $salesperson;
        $this->amount = $amount;
        $this->salesDate = $salesDate;
    }
}
