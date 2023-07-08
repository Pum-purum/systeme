<?php

namespace App\Domain\Shop\Service\Tax;

class ItalyTax extends AbstractStateTax {

    public function supports(string $taxNumber): bool {
        return 1 === preg_match("/^IT\d{11}$/", $taxNumber);
    }

    public function getTaxPercent(): float {
        return 22;
    }
}
