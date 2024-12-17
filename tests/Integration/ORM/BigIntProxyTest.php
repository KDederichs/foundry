<?php

namespace Integration\ORM;

use Zenstruck\Foundry\Tests\Fixture\Entity\BigIntEntity;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Tests\Integration\RequiresORM;
use function Zenstruck\Foundry\Persistence\proxy_factory;

final class BigIntProxyTest extends KernelTestCase
{
    use Factories, RequiresORM;

    public function testItDoesNotChangeTheEntity(): void
    {
        $factory = proxy_factory(BigIntEntity::class);
        $entity = $factory->create();
        self::assertEquals($entity->getId(), $entity->getId());
    }
}
