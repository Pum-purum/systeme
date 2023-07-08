<?php

declare(strict_types=1);

namespace App\Infrastructure\Exception;

interface ShowMessageInterface
{
    public function getShowMessage(): string;
}
