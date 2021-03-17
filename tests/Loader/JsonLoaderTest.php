<?php

declare(strict_types=1);

namespace tests\Loader;

use PHPUnit\Framework\TestCase;
use solid\Loader\JsonLoader;

class JsonLoaderTest extends TestCase
{
    public function testDate(): void
    {
        $loader = new JsonLoader('var/import/users.json');

        $dateFormatted = $loader->getDate()->format('d/m/Y');

        $this->assertSame('12/03/2021', $dateFormatted);
    }
}
