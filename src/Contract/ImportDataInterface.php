<?php

declare(strict_types=1);

namespace solid\Contract;

interface ImportDataInterface
{
    public function importData(array $records): void;
}
