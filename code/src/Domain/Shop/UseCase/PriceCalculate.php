<?php

namespace App\Domain\Shop\UseCase;

use App\Domain\Shop\Exception\EntityNotFoundException;
use App\Domain\Shop\Repository\CouponRepository;
use App\Domain\Shop\Repository\ProductRepository;
use App\Domain\Shop\RequestData\ProductData;
use App\Domain\Shop\Service\DiscountService;
use App\Domain\Shop\Service\TaxService;

class PriceCalculate {

    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly CouponRepository  $couponRepository,
        private readonly DiscountService   $discountService,
        private readonly TaxService        $taxService,
    ) {
    }

    /**
     * @throws EntityNotFoundException
     */
    public function process(int $productId, string $taxNumber, ?string $couponCode): float {
        $coupon = null;
        $product = $this->productRepository->findOrFail($productId);
        if (null !== $couponCode) {
            $coupon = $this->couponRepository->findOneBy(['code' => $couponCode]);
            if (null === $coupon) {
                throw new EntityNotFoundException('Купон не найден');
            }
        }
        $price = $this->discountService->apply($product->getPrice(), $coupon);
        $price = $this->taxService->apply($price, $taxNumber);

        return round($price, 2);
    }
}
