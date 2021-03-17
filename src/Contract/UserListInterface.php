<?php

declare(strict_types=1);

namespace solid\Contract;

interface UserListInterface
{
    public function getActives(): array;
}
