<?php

/*
 * This file is part of the zenstruck/foundry package.
 *
 * (c) Kevin Bond <kevinbond@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zenstruck\Foundry\Tests\Fixture;

final class ObjectWithNonWriteable
{
    private string $bar;
    // @phpstan-ignore-next-line We do not want assign a default value to this so the factory sets one
    private string $baz;

    public function __construct(
        public readonly string $foo
    ) {
        $this->bar = 'bar';
    }

    public function getBaz(): string
    {
        return $this->baz;
    }

    public function setBaz(string $baz): ObjectWithNonWriteable
    {
        $this->baz = $baz;
        return $this;
    }

    public function getBar(): string
    {
        return $this->bar;
    }
}
