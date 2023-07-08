<?php

namespace App\Domain\Shop\Service\Tax;

class GreeceTax extends AbstractStateTax {

    public function supports(string $taxNumber): bool {
        return 1 === preg_match("/^GR\d{9}$/", $taxNumber);
    }

    public function getTaxPercent(): float {
        return 24;
    }
}
