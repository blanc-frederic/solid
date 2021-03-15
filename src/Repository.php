<?php

declare(strict_types=1);

namespace solid;

use PDO;

class Repository
{
    private PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getCount(): int
    {
        $data = $this->db->query('SELECT COUNT(*) AS nb FROM imported')->fetch();

        return (int) $data['nb'];
    }
}
