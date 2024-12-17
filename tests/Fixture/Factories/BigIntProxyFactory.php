<?php

/*
 * This file is part of the zenstruck/foundry package.
 *
 * (c) Kevin Bond <kevinbond@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zenstruck\Foundry\Tests\Fixture\Factories;

use Zenstruck\Foundry\Tests\Fixture\Entity\BigIntEntity;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 *
 * @extends PersistentProxyObjectFactory<BigIntEntity>
 */
final class BigIntProxyFactory extends PersistentProxyObjectFactory
{
    protected function defaults(): array
    {
        return [
        ];
    }

    public static function class(): string
    {
        return BigIntEntity::class;
    }
}
