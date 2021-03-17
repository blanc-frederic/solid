<?php

namespace solid;

use solid\Contract\ImportDataInterface;
use solid\Contract\LoaderInterface;

class DataImporter
{
    private ImportDataInterface $importer;
    private LoaderInterface $loader;

    public function __construct(ImportDataInterface $importer, LoaderInterface $loader)
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
