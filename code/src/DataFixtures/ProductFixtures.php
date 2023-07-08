<?php

namespace App\DataFixtures;

use App\Domain\Shop\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $product = new Product(trim($data['title']), $data['price']);
            $manager->persist($product);
        }

        $manager->flush();
    }

    private function getData() {
        return [
          [
              'title' => 'Iphone',
              'price' => 100,
          ],
          [
              'title' => 'Наушники',
              'price' => 20,
          ],
          [
              'title' => 'Чехол',
              'price' => 10,
          ],
        ];
    }
}
