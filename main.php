
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Cursor;
use Symfony\Component\Console\Output\ConsoleOutput;

// 設置記憶體無上限
// ini_set('memory_limit', '128M');
ini_set('memory_limit', '-1');

$output = new ConsoleOutput();
$cursor = new Cursor($output);

/**
 * @param int $bytes
 * @param int $type default = 1
 *      type = 1, KB
 *      type = 2, MB
 * @return string 
 */
function getSizeStr(int $bytes, int $type = 1) {
    switch ($type) {
        case 1:
            return sprintf("%10s", number_format($bytes / 1024, 2)). ' KBs';
        case 2:
            return sprintf("%10s", number_format($bytes / 1048576, 2)) . ' MBs';
        default:
            new \Exception("ERROR TYPE: $type");
    }
}

// $output->writeln(vsprintf("<info>Current Memory Use: %s\nPeak Memory Use: %s\n</info>", [
//     getSizeStr(memory_get_usage(), 2),
//     getSizeStr(memory_get_peak_usage(true), 2)
// ]));
// and write text on this position using the output

$tmpArr = [];
while(true) {
    $tmpArr[] = [
        [1, 2, 3, 4], 
        [1, 2, 3, 4], 
        [1, 2, 3, 4], 
        [1, 2, 3, 4], 
        [1, 2, 3, 4], 
        [1, 2, 3, 4],
    ];

    $showMsg = getSizeStr(memory_get_usage(), 2);
    print_r($showMsg);
    $cursor->clearLine();
}