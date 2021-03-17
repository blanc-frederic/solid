<?php

declare(strict_types=1);

namespace solid\Repository;

use solid\Repository\AbstractRepository;

class ImportedRepository extends AbstractRepository
{
    protected function beforeInserts(): void
    {
        $this->db->exec('DELETE FROM imported');
    }

    protected function insert(array $record): void
    {
        $this->db->prepare('INSERT INTO imported VALUES (?, ?, ?)')
            ->execute($record);
    }

    public function getCount(): int
    {
        $data = $this->db->query('SELECT COUNT(*) AS nb FROM imported')->fetch();

        return (int) $data['nb'];
    }
}
