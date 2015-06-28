<?php

namespace OpsWay\Migration\Tests;

use OpsWay\Migration\Processor\ReadWriteProcessor;
use OpsWay\Migration\Reader\ReaderFactory;
use OpsWay\Migration\Writer\WriterFactory;

class Task4 extends \PHPUnit_Framework_TestCase {

    protected $output;

    public function setUp(){
        require_once 'vendor/autoload.php';
    }

    public function testCheckAnswerTask4()
    {
        $_GET['reader'] = 'Db\\Product';
        $_GET['writer'] = 'Html';
        ob_start();
        include 'main2.php';
        $resultOutput = ob_get_flush();

        $processor = new ReadWriteProcessor(
            ReaderFactory::create('Db\\Product', include 'config/database.php'),
            WriterFactory::create('Html'),
            function () {}
        );
        ob_start();
        $processor->processing();
        $this->assertEquals(ob_get_flush(), $resultOutput);
    }
}
