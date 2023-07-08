<?php

declare(strict_types=1);

namespace App\Domain\Shop\Embeddable;

enum DiscountType: string
{
    case relative = 'relative';

    case absolute = 'absolute';
}
