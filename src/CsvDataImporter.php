<?php

namespace solid;

use solid\Repository\AbstractRepository;

class CsvDataImporter
{
    private AbstractRepository $repository;
    private Loader $loader;

    public function __construct(AbstractRepository $repository, Loader $loader)
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
