<?php

namespace App\Domain\Shop\Service\PaymentProcessor;

interface PaymentInterface {
    public function supports(string $code): bool;
    public function process(float $price): void;
}
