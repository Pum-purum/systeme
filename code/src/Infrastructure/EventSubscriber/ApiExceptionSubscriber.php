<?php

declare(strict_types=1);

namespace App\Infrastructure\EventSubscriber;

use App\Infrastructure\Exception\ApiException;
use App\Infrastructure\Exception\ShowMessageInterface;
use App\Infrastructure\ResponseModel\ErrorModelResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ApiExceptionSubscriber implements EventSubscriberInterface
{
    public const DEFAULT_ERROR_TYPE = 'Bad Request';
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }

    /**
     * @throws \Throwable
     */
    public function onKernelException(ExceptionEvent $event): void
    {
        $e = $event->getThrowable();

        // define
        $errorType = $e instanceof ApiException ? $e->getType() : self::DEFAULT_ERROR_TYPE;
        $message = $e instanceof ShowMessageInterface ? $e->getShowMessage() : $errorType;

        // create model
        $errorModel = new ErrorModelResponse(
            $errorType,
            $message
        );

        $responseBody = (array)$errorModel;
        if (null !== $previous = $e->getPrevious()) {
            $responseBody['previous'] = (string)$previous;
        }

        // create response
        $response = new JsonResponse($responseBody);
        if ($e instanceof ApiException) {
            foreach ($e->getHeaders() as $key => $header) {
                $response->headers->set($key, $header);
            }
        }


        $response->setStatusCode($e->getCode());
        $event->setResponse($response);
    }
}
