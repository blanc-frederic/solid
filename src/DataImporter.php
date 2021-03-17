<?php

namespace solid;

use solid\Contract\ImportDataInterface;
use solid\Loader\CsvLoader;

class DataImporter
{
    private ImportDataInterface $importer;
    private CsvLoader $loader;

    public function __construct(ImportDataInterface $importer, CsvLoader $loader)
    {
        $this->importer = $importer;
        $this->loader = $loader;
    }

    public function import(): void
    {
        $records = $this->loader->loadFile();
        $this->importer->importData($records);
    }
}
