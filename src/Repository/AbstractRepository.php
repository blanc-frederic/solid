<?php

declare(strict_types=1);

namespace solid\Repository;

use PDO;
use PDOException;
use solid\Contract\ImportDataInterface;

abstract class AbstractRepository implements ImportDataInterface
{
    protected PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    abstract protected function beforeInserts(): void;
    abstract protected function insert(array $record): void;

    abstract public function getCount(): int;

    public function importData(array $records): void
    {
        try {
            $this->db->beginTransaction();

            $this->beforeInserts();

            foreach ($records as $record) {
                $this->insert($record);
            }

            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
        }
    }
}
