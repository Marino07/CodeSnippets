<?php
declare(strict_types = 1);
/*
declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR; // VRACA CIJELU PUTANJU DO NASEG TRENUTNOG DIREKTORIJA(RODITELJSKOG) u OVOM SLUCAJU MINIPROJECT

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
var_dump($root);
require APP_PATH . "app.php";
// Pozovi funkciju getTransactionFiles() i spremi rezultat u varijablu $files
$files = getTransactionFiles("/putanja/do/direktorija");

// Koristi var_dump() za ispis rezultata
//var_dump($files);
getTransactionFiles(FILES_PATH);
// Pozovi funkciju getTransactionFiles() i spremi rezultat u varijablu $files
$files = getTransactionFiles(FILES_PATH);

// Koristi var_dump() za ispis rezultataj
$transactions = [];
foreach($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}
$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php';
*/

ini_set('display_errors', 1);
error_reporting(E_ALL);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR; // directory separator je u sustini samo / i dodaje se samo na lokaciju iza __dir__
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . "App.php";
require APP_PATH . 'helpers.php';

$files = getTransactionFiles(FILES_PATH);

$transactions = [];
foreach($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}

$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php';