<?php
declare(strict_types = 1);
/*
function getTransactionFiles(string $dirpath): array
{
    $files = [];

    foreach (scandir($dirpath) as $file) {
        if(is_dir($file)){
            continue
        }
        
        // Dodaj ime datoteke u niz
        $files[] =  $file;
    }
    

    return $files;
}
 function getTransactions(string $fileName, ?callable $transactionHandler = null) : array{
    if(! file_exists($fileName)){
        trigger_error('file ' . $filename . 'does not exist' )
    }
    $file = fopen($fileName,'r');
    $transactions = [];

    while($transaction = fgetcsv($file) !== false)// za svaku liniju da je niz 0 1 2 3 
    //$transactions = extractTransaction($transaction);// npr za samo jedan ako hocemo vise formata tj funkcija kod ispod
        if ($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;
    }
    return $transactions;
 function extractTransaction(array $transactionRow): array
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date'        => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount'      => $amount,
    ];
}
function calculateTotals(array $transactions): array // funkcija za ekstrakt za tocno ovaj format mozemo ih imati vise
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}
*/

/*
function getTransactionFiles(string $dirPath): array
{
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;
}
*/
function getTransactionFiles(string $dirPath): array
{
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;
}

function getTransactions(string $fileName, ?callable $transactionHandler = null): array
{
    if (! file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist.', E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');

    // Preskoči zaglavlje CSV-a
    fgetcsv($file);

    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        // Proveri da li red ima tačno 4 elementa pre nego što nastavi MESSAGE : zapravo je bio error u csv file da nije dobro formatiran
        if (count($transaction) < 4) { 
            continue; // Preskoči ovaj redak
        }

        if ($transactionHandler !== null) { // ako funkcija nije null datoteku u obliku niza ubacujemo u funkciju
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;
    }

    fclose($file);

    return $transactions;
}


function extractTransaction(array $transactionRow): array
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date'        => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount'      => $amount,
    ];
}

function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}