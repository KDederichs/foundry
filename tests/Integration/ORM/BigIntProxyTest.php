<?php

namespace Integration\ORM;

use Zenstruck\Foundry\Tests\Fixture\Factories\BigIntProxyFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Tests\Integration\RequiresORM;

final class BigIntProxyTest extends KernelTestCase
{
    use Factories, RequiresORM;

    public function testItDoesNotChangeTheEntity(): void
    {
        $entity = BigIntProxyFactory::createOne();
        self::assertEquals(1, $entity->getId());
    }
}
