<?php

namespace App\Domain\Shop\Service;

use App\Domain\Shop\Service\Tax\TaxInterface;

class TaxService {

    public function __construct(
        /** @var TaxInterface[] */
        private readonly iterable $taxes
    ) {
    }

    public function apply(float $price, string $taxNumber): float {
        foreach ($this->taxes as $tax) {
            if ($tax->supports($taxNumber)) {
                return $tax->apply($price);
            }
        }

        return $price;
    }
}
