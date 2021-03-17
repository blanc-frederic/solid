<?php

namespace solid;

use solid\Loader\CsvLoader;
use solid\Repository\AbstractRepository;

class DataImporter
{
    private AbstractRepository $repository;
    private CsvLoader $loader;

    public function __construct(AbstractRepository $repository, CsvLoader $loader)
    {
        $this->repository = $repository;
        $this->loader = $loader;
    }

    public function import(): void
    {
        $records = $this->loader->loadFile();
        $this->repository->importData($records);
    }
}
