<?php

use solid\DataImporter;
use solid\Loader\CsvLoader;
use solid\Repository\ImportedRepository;

require 'vendor/autoload.php';

$db = new PDO(
    'mysql:host=localhost;port=3306;dbname=solid',
    'solid',
    'local'
);
$repository = new ImportedRepository($db);
$loader = new CsvLoader('var/import/data.csv');

$importer = new DataImporter($repository, $loader);
$importer->import();
