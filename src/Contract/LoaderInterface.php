<?php

declare(strict_types=1);

namespace solid\Contract;

interface LoaderInterface
{
    public function loadFile(): array;
}
