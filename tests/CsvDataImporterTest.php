<?php

declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use solid\CsvDataImporter;
use solid\Loader;
use solid\Repository\ImportedRepository;
use solid\Repository\UsersRepository;

class CsvDataImporterTest extends TestCase
{
    public function testImport(): void
    {
        $db = TestsFacility::createDb();
        $repository = new ImportedRepository($db);
        $loader = new Loader('var/import/data.csv');

        $importer = new CsvDataImporter($repository, $loader);
        $importer->import();

        $this->assertSame(3, $repository->getCount());
    }

    public function testUsers(): void
    {
        $db = TestsFacility::createDb();
        $repository = new UsersRepository($db);
        $loader = new Loader('var/import/users.csv');

        $importer = new CsvDataImporter($repository, $loader);
        $importer->import();

        $this->assertSame(2, $repository->getCount());
    }
}
