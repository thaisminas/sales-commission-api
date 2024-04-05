<?php

namespace App\Helpers;

class CalculateCommission {
    const PERCENTAGE = 8.5;

    public function calculate(float $salesValue)
    {
        return ($salesValue * self::PERCENTAGE) / 100;
    }
}
