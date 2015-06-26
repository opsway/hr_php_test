<?php

namespace OpsWay\Migration\Writer\File;

use OpsWay\Migration\Writer\WriterInterface;

class Csv implements WriterInterface
{
    protected $file;
    protected $filename;

    /**
     * @param $item array
     *
     * @return bool
     */
    public function write(array $item)
    {
        if (!$this->file) {
            $this->file = @fopen($this->filename, 'w+');
            if (!$this->file) {
                throw new \RuntimeException(sprintf('File "%s" not accessible.', $this->filename));
            }
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
}
