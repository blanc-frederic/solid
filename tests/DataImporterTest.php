<?php

declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use solid\DataImporter;
use solid\Loader\CsvLoader;
use solid\Loader\JsonLoader;
use solid\Repository\ImportedRepository;
use solid\Repository\UsersRepository;

class DataImporterTest extends TestCase
{
    public function testImport(): void
    {
        $db = TestsFacility::createDb();
        $repository = new ImportedRepository($db);
        $loader = new CsvLoader('var/import/data.csv');

        $importer = new DataImporter($repository, $loader);
        $importer->import();

        $this->assertSame(3, $repository->getCount());
    }

    public function testUsers(): void
    {
        $db = TestsFacility::createDb();
        $repository = new UsersRepository($db);
        $loader = new JsonLoader('var/import/users.json');

        $importer = new DataImporter($repository, $loader);
        $importer->import();

        $this->assertSame(2, $repository->getCount());
    }
}
