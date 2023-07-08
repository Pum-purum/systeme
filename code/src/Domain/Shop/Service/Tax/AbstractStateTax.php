<?php

namespace App\Domain\Shop\Service\Tax;

abstract class AbstractStateTax implements TaxInterface {
    public function apply(float $price): float {
        return $price * (100 - $this->getTaxPercent()) * 0.01;
    }
}
