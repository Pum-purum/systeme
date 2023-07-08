<?php

namespace App\Domain\Shop\Service;

use App\Domain\Shop\Exception\PaymentException;
use App\Domain\Shop\Service\PaymentProcessor\PaymentInterface;

class PayService {

    public function __construct(
        /** @var PaymentInterface[] */
        private readonly iterable $processors
    ) {
    }

    /**
     * @throws PaymentException
     */
    public function process(float $price, string $paymentProcessorCode): void {
        foreach ($this->processors as $processor) {
            if ($processor->supports($paymentProcessorCode)) {
                $processor->process($price);

                return;
            }
        }

        throw new PaymentException('Платежная система не найдена');
    }
}
