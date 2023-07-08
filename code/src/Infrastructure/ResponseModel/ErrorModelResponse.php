<?php

declare(strict_types=1);

namespace App\Infrastructure\ResponseModel;

/**
 * @psalm-immutable
 */
final class ErrorModelResponse
{
    public function __construct(
        public readonly string $type,
        public readonly string $message,
    ) {
    }
}
