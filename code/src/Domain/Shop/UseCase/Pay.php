<?php

namespace App\Domain\Shop\UseCase;

use App\Domain\Shop\Exception\EntityNotFoundException;
use App\Domain\Shop\Exception\PaymentException;
use App\Domain\Shop\Repository\CouponRepository;
use App\Domain\Shop\Repository\ProductRepository;
use App\Domain\Shop\RequestData\PayData;
use App\Domain\Shop\RequestData\ProductData;
use App\Domain\Shop\Service\DiscountService;
use App\Domain\Shop\Service\PayService;
use App\Domain\Shop\Service\TaxService;

class Pay {

    public function __construct(
        private readonly PriceCalculate $calculator,
        private readonly PayService $payService,
    ) {
    }

    /**
     * @throws EntityNotFoundException
     * @throws PaymentException
     */
    public function process(PayData $data): void {
        $price = $this->calculator->process($data->product, $data->taxNumber, $data->couponCode);
        $this->payService->process($price, $data->paymentProcessor);
    }
}
