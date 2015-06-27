<?php

use OpsWay\Migration\Logger\ConsoleLogger;
use OpsWay\Migration\Processor\ReadWriteProcessor;
use OpsWay\Migration\Reader\ReaderFactory;
use OpsWay\Migration\Writer\WriterFactory;

define("CLI_MODE", true);
$config = include 'config.php';

echo "Start Time: " . date("d-m-Y H:i:s") . PHP_EOL;

try {
    $processor = new ReadWriteProcessor(
        ReaderFactory::create($config['reader'], $config['params']),
        WriterFactory::create($config['writer'], $config['params']),
        new ConsoleLogger(true)
    );
    //Processing
    $processor->processing();

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
} finally {
    echo PHP_EOL;
}

echo "End Time: " . date("d-m-Y H:i:s") . PHP_EOL;
