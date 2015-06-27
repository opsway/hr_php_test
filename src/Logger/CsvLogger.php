<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.06.15
 * Time: 17:06
 */

namespace OpsWay\Migration\Logger;

class CsvLogger
{
    static public $countItem = 0;
    protected $debug;
    private $file,
            $filename = 'data/output.log.csv';

    public function __construct($mode = false)
    {
        $this->debug = $mode;
        $this->file = fopen($this->filename, 'w+');
    }


    public function __invoke($item, $status, $msg)
    {
        if (!$this->debug || self::$countItem++ == 0 || !isset($item['qty']) || !isset($item['is_stock'])) {
            return;
        }

        if ((int)$item['qty'] == 0 && (int)$item['is_stock'] == 0) {
            fputcsv($this->file, $item);
        }
    }

}