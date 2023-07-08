<?php

namespace App\Domain\Shop\Exception;

use App\Infrastructure\EventSubscriber\ApiExceptionSubscriber;
use App\Infrastructure\Exception\ApiException;
use Symfony\Component\HttpFoundation\Response;

class EntityNotFoundException extends ApiException {
    public function __construct(string $message = '', \Throwable $previous = null)
    {
        parent::__construct($message, ApiExceptionSubscriber::DEFAULT_ERROR_TYPE, $previous);
    }

    protected function getStatusCode(): int {
        return Response::HTTP_BAD_REQUEST;
    }

    public function getShowMessage(): string {
        return $this->message ?: 'Сущность не найдена';
    }
}
