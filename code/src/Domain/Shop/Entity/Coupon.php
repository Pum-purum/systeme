<?php

declare(strict_types=1);

namespace App\Domain\Shop\Entity;

use App\Domain\Shop\Embeddable\DiscountType;
use App\Domain\Shop\Repository\CouponRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouponRepository::class)]
#[ORM\Table(name: 'coupons')]
class Coupon {
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 12)]
    private string $code;

    #[ORM\Column(type: 'string', length: 8, enumType: DiscountType::class)]
    private DiscountType $type;

    #[ORM\Column(type: 'integer')]
    private int $value;

    #[ORM\Column(type: 'boolean')]
    private bool $active;

    public function __construct(string $code, DiscountType $type, int $value) {
        $this->code = $code;
        $this->type = $type;
        $this->value = $value;
        $this->active = true;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): Coupon {
        $this->id = $id;
        return $this;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function setCode(string $code): Coupon {
        $this->code = $code;
        return $this;
    }

    public function getType(): DiscountType {
        return $this->type;
    }

    public function setType(DiscountType $type): Coupon {
        $this->type = $type;
        return $this;
    }

    public function getValue(): int {
        return $this->value;
    }

    public function setValue(int $value): Coupon {
        $this->value = $value;
        return $this;
    }

    public function isActive(): bool {
        return $this->active;
    }

    public function setActive(bool $active): Coupon {
        $this->active = $active;
        return $this;
    }
}
