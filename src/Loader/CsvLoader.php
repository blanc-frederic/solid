<?php

declare(strict_types=1);

namespace solid\Loader;

use solid\Contract\LoaderInterface;

class CsvLoader implements LoaderInterface
{
    private string $filename;
    
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function loadFile(): array
    {
        $records = array();
        if (false !== $handle = fopen($this->filename, 'r')) {
            while ($record = fgetcsv($handle, 0, ';')) {
                $records[] = $record;
            }
        }
        fclose($handle);

        return $records;
    }
}
