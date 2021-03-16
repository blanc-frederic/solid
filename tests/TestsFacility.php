<?php

declare(strict_types=1);

namespace tests;

use PDO;

class TestsFacility
{
    public static function createDb(): PDO
    {
        $exists = is_file('var/db.sqlite');

        $db = new PDO('sqlite:var/db.sqlite', null, null, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        if (! $exists) {
            self::loadFixtures($db);
        }

        return $db;
    }

    private static function loadFixtures(PDO $db): void
    {
        $db->exec('CREATE TABLE imported (
            champ1 TINYTEXT NOT NULL,
            champ2 TINYTEXT NOT NULL,
            champ3 TINYTEXT NOT NULL
        )');

        $db->exec('CREATE TABLE users (
            id TINYTEXT NOT NULL,
            login TINYTEXT NOT NULL,
            fullname TINYTEXT NOT NULL
        )');
    }
}
