<?php

namespace Zenstruck\Foundry\Tests\Fixture\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class BigIntEntity
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $id = 1;

    #[ORM\Column(type: 'bigint', nullable: false, options: ['default' => "0"])]
    private ?string $bigIntVal = '0';

    public function getBigIntVal(): ?string
    {
        return $this->bigIntVal;
    }

    public function setBigIntVal(?string $bigIntVal): BigIntEntity
    {
        $this->bigIntVal = $bigIntVal;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): BigIntEntity
    {
        $this->id = $id;
        return $this;
    }
}
