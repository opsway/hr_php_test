<?php

namespace OpsWay\Migration\Writer\File;

use OpsWay\Migration\Writer\WriterInterface;

class Csv implements WriterInterface
{
    protected $file;
    protected $filename;

    public function __construct()
    {
        if (!count($params = func_get_args()) || !isset($params[0]['filename'])) {
            throw new \RuntimeException('Need filename in params for csv export');
        }

        $fileName = $params[0]['filename'];

        if ($this->checkFileName($fileName)) {
            $this->filename = $fileName;
        }
    }

    /**
     * @param $item array
     *
     * @return bool
     */
    public function write(array $item)
    {
        if (!$this->file) {
            $this->file = fopen($this->filename, 'w+');
            fputcsv($this->file, array_keys($item));
        }
        return fputcsv($this->file, $item);
    }

    public function __destruct()
    {
        if ($this->file) {
            fclose($this->file);
        }
    }

    /**
     * @param string $filename
     * @return bool
     */
    private function checkFileName($filename)
    {
        if (!fopen($filename, 'w+')) {
            throw new \RuntimeException(sprintf('Can not create file "%s" for writing data.', $filename));
        }

        return true;
    }
}
