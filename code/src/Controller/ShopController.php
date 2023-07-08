<?php

namespace App\Controller;

use App\Domain\Shop\Exception\EntityNotFoundException;
use App\Domain\Shop\RequestData\PayData;
use App\Domain\Shop\RequestData\ProductData;
use App\Domain\Shop\UseCase\Pay;
use App\Domain\Shop\UseCase\PriceCalculate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    /**
     * @throws EntityNotFoundException
     */
    #[Route('/price', name: 'price', methods: [Request::METHOD_POST])]
    public function price(
        ProductData $data,
        PriceCalculate $useCase
    ): Response
    {
        $price = $useCase->process($data->product, $data->taxNumber, $data->couponCode);

        return $this->json(['price' => $price]);
    }

    /**
     * @throws EntityNotFoundException
     */
    #[Route('/pay', name: 'pay', methods: [Request::METHOD_POST])]
    public function pay(
        PayData $data,
        Pay $useCase
    ): Response
    {
        $useCase->process($data);

        return $this->json(['success' => true]);
    }
}
