<?php

namespace App\Domain\Shop\RequestData;

use Prugala\RequestDto\Dto\RequestDtoInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ProductData implements RequestDtoInterface {
    #[Assert\NotNull()]
    public string $taxNumber;
    #[Assert\Positive()]
    public int $product;
    public ?string $couponCode;
}
