<?php

namespace App\Domain\Shop\Service\PaymentProcessor;

use App\Domain\Shop\Exception\PaymentException;
use StripePaymentProcessor;
class StripePay extends StripePaymentProcessor implements PaymentInterface {

    public function supports(string $code): bool {
        return 'stripe' === $code;
    }

    public function process(float $price): void {
        if (false === $this->processPayment((int)$price)) {
            throw new PaymentException();
        }
    }
}
