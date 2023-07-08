<?php

namespace App\Domain\Shop\Service\PaymentProcessor;

use App\Domain\Shop\Exception\PaymentException;
use PaypalPaymentProcessor;
class PayPalPay extends PaypalPaymentProcessor implements PaymentInterface {

    public function supports(string $code): bool {
        return 'paypal' === $code;
    }

    /**
     * @throws PaymentException
     */
    public function process(float $price): void {
        try {
            $this->pay((int)$price);
        } catch (\Exception $e) {
            throw new PaymentException($e->getMessage());
        }
    }
}
