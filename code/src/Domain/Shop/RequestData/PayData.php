<?php

namespace App\Domain\Shop\RequestData;

use Prugala\RequestDto\Dto\RequestDtoInterface;
use Symfony\Component\Validator\Constraints as Assert;

final class PayData extends ProductData {
    #[Assert\NotNull()]
    public string $paymentProcessor;
}
