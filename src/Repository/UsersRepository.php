<?php

declare(strict_types=1);

namespace solid\Repository;

use solid\Repository\AbstractRepository;

class UsersRepository extends AbstractRepository
{
    protected function beforeInserts(): void
    {
        $this->db->exec('DELETE FROM users');
    }

    protected function insert(array $record): void
    {
        $this->db->prepare('INSERT INTO users VALUES (?, ?, ?)')
            ->execute($record);
    }

    public function getCount(): int
    {
        $data = $this->db->query('SELECT COUNT(*) AS nb FROM users')->fetch();

        return (int) $data['nb'];
    }
}
