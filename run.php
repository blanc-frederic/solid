<?php

use solid\CsvDataImporter;
use solid\Loader;
use solid\Repository\ImportedRepository;

require 'vendor/autoload.php';

$db = new PDO(
    'mysql:host=localhost;port=3306;dbname=solid',
    'solid',
    'local'
);
$repository = new ImportedRepository($db);
$loader = new Loader('var/import/data.csv');

$importer = new CsvDataImporter($repository, $loader);
$importer->import();
