<?php
date_default_timezone_set('UTC');

include 'vendor/autoload.php';

$config = [
    'params' => []
];

if (defined("CLI_MODE") && CLI_MODE) {

    if (PHP_SAPI !== 'cli') {
        die('This can be run only on CLI mode.' . PHP_EOL);
    }
    if ((!isset($argv[1])) || (!isset($argv[2]))) {
        die ('Please input required params: main.php NameReader NameWriter' . PHP_EOL);
    }

    $config['reader'] = $argv[1];
    $config['writer'] = $argv[2];

} else {

    if (PHP_SAPI === 'cli') {
        die('This can be run only on WEB mode.' . PHP_EOL);
    }
    if ((!isset($_GET['reader'])) || (!isset($_GET['writer']))) {
        die ('Please input required params: main2.php?reader=ReaderName&writer=WriterName' . PHP_EOL);
    }

    $config['reader'] = $_GET['reader'];
    $config['writer'] = $_GET['writer'];
}

foreach (glob(__DIR__ . "/config/*.php") as $file) {
    $config['params'] = array_merge($config['params'], include $file);
}

return $config;
