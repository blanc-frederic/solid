<?php

declare(strict_types=1);

namespace solid\Repository;

use solid\Contract\UserListInterface;
use solid\Repository\AbstractRepository;

class UsersRepository extends AbstractRepository implements UserListInterface
{
    protected function beforeInserts(): void
    {
        $this->db->exec('DELETE FROM users');
    }

    protected function insert(array $record): void
    {
        $this->db->prepare('INSERT INTO users (id, login, fullname) VALUES (?, ?, ?)')
            ->execute($record);
    }

    public function getCount(): int
    {
        $data = $this->db->query('SELECT COUNT(*) AS nb FROM users')->fetch();

        return (int) $data['nb'];
    }

    public function getActives(): array
    {
        return $this->db->query('SELECT * FROM users WHERE active = 1')->fetchAll();
    }
}
