<?php

namespace OpsWay\Migration\Tests;

use OpsWay\Migration\Logger\ConsoleLogger;

class Task5 extends \PHPUnit_Framework_TestCase {

    protected $output;

    public function setUp(){
        require_once 'vendor/autoload.php';
    }

    public function testCheckAnswerTask5()
    {
        $argv[1] = 'Db\\Product';
        $argv[2] = 'Stub';
        include 'main.php';
        $this->assertNotInstanceOf(ConsoleLogger::class, $processor->getLogger());
        $this->assertInstanceOf(\Closure::class, $processor->getLogger());
    }
}
