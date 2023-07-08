<?php

namespace App\Domain\Shop\Service\Tax;

interface TaxInterface {
    public function supports(string $taxNumber): bool;
    public function apply(float $price): float;
    public function getTaxPercent(): float;
}
