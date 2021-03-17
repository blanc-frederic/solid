<?php

namespace solid;

class CsvDataImporter
{
    private Repository $repository;
    private Loader $loader;

    public function __construct(Repository $repository, Loader $loader)
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
