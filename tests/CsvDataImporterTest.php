<?php

declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use solid\CsvDataImporter;
use solid\Loader;
use solid\Repository;

class CsvDataImporterTest extends TestCase
{
    public function testImport(): void
    {
        $db = TestsFacility::createDb();
        $repository = new Repository($db);
        $loader = new Loader('var/import/data.csv');

        $importer = new CsvDataImporter($repository, $loader);
        $importer->import();

        $this->assertSame(3, $repository->getCount());
    }
}
