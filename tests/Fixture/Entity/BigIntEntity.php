<?php

namespace Zenstruck\Foundry\Tests\Fixture\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
class BigIntEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    private Uuid $id;

    #[ORM\Column(type: 'bigint', nullable: false, options: ['default' => "0"])]
    private ?string $bigIntVal = '0';

    public function __construct()
    {
        $this->id = Uuid::v7();
    }

    public function getBigIntVal(): ?string
    {
        return $this->bigIntVal;
    }

    public function setBigIntVal(?string $bigIntVal): BigIntEntity
    {
        $this->bigIntVal = $bigIntVal;
        return $this;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }
}
