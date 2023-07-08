<?php

namespace App\Domain\Shop\Service;

use App\Domain\Shop\Embeddable\DiscountType;
use App\Domain\Shop\Entity\Coupon;

class DiscountService {
    public function apply(float $price, ?Coupon $coupon): float {
        if (!$coupon || !$coupon->isActive()) {
            return $price;
        }

        return match ($coupon->getType()) {
            DiscountType::absolute => $price - $coupon->getValue(),
            DiscountType::relative => $price - (100 - $coupon->getValue()) * 0.01
        };
    }
}
