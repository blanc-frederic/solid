<?php

declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use solid\CsvDataImporter;
use solid\Repository;

class CsvDataImporterTest extends TestCase
{
    public function testImport(): void
    {
        $db = TestsFacility::createDb();
        $importer = new CsvDataImporter($db);
        $importer->import('var/import/data.csv');

        $repository = new Repository($db);
        $this->assertSame(3, $repository->getCount());
    }
}
