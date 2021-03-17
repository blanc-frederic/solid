<?php

declare(strict_types=1);

namespace solid\Loader;

use DateTimeImmutable;
use solid\Contract\LoaderInterface;

class JsonLoader implements LoaderInterface
{
    private string $filename;
    
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    private function readFile(): array
    {
        return json_decode(file_get_contents($this->filename), true);
    }

    public function loadFile(): array
    {
        $content = $this->readFile();

        return array_map(
            fn ($values) => array_values($values),
            $content['users']
        );
    }

    public function getDate(): DateTimeImmutable
    {
        $content = $this->readFile();

        return new DateTimeImmutable($content['updatedAt']);
    }
}
