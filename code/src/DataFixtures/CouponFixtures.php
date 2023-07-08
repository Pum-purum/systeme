<?php

namespace App\DataFixtures;

use App\Domain\Shop\Embeddable\DiscountType;
use App\Domain\Shop\Entity\Coupon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CouponFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $coupon = new Coupon($data['code'], $data['type'], $data['value']);
            $manager->persist($coupon);
        }

        $manager->flush();
    }

    private function getData() {
        return [
          [
              'code' => 'A7',
              'type' => DiscountType::absolute,
              'value' => 7,
          ],
          [
              'code' => 'R4',
              'type' => DiscountType::relative,
              'value' => 4,
          ],
        ];
    }
}
