<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.06.15
 * Time: 16:42
 */

namespace OpsWay\Migration\Reader\File;

use OpsWay\Migration\Reader\ReaderInterface;

class Csv implements ReaderInterface
{
    private $filename,
            $file,
            $firstRow;

    public function __construct()
    {
        if (!count($params = func_get_args()) || !isset($params[0]['filename_read'])) {
            throw new \RuntimeException('Need filename_read in params for csv export');
        }

        $fileName = $params[0]['filename_read'];

        if ($this->checkFileName($fileName)) {
            $this->filename = $fileName;
            $this->file = fopen($this->filename, 'r');
        }
    }

    /**
     * @return array|null
     */
    public function read()
    {
        static $head = true;
        if ($head) {
            $this->firstRow = fgetcsv($this->file);
            $this->checkRow($this->firstRow);
            $head = false;
        }
        if (!$row = fgetcsv($this->file)) {
            return array();
        }
        $this->checkRow($row);
        return array_combine($this->firstRow, $row);
    }

    /**
     * @param string $filename
     * @return bool
     */
    private function checkFileName($filename)
    {
        if (!file_exists($filename)) {
            throw new \RuntimeException(sprintf('File "%s" not exists.', $filename));
        }

        if (!fopen($filename, 'r')) {
            throw new \RuntimeException(sprintf('Can not open file "%s" for reading data.', $filename));
        }

        return true;
    }

    /**
     * @param array $row
     */
    private function checkRow($row)
    {
        if (!is_array($row)) {
            throw new \RuntimeException('Csv file ' . $this->filename . ' has incorrect format');
        }
    }

}

