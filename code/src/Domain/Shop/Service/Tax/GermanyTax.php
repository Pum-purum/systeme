<?php

namespace App\Domain\Shop\Service\Tax;

class GermanyTax extends AbstractStateTax {

    public function supports(string $taxNumber): bool {
        return 1 === preg_match("/^DE\d{9}$/", $taxNumber);
    }

    public function getTaxPercent(): float {
        return 19;
    }
}
