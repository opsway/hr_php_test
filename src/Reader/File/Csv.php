<?php

namespace OpsWay\Migration\Reader\File;

use OpsWay\Migration\Reader\ReaderInterface;
use SplFileObject;

class Csv extends \SplFileObject implements ReaderInterface
{
    protected $isFirstRowHeader = true;

    public function __construct($params)
    {
        parent::__construct($params['filename']);
        $this->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE
            | SplFileObject::READ_AHEAD);
        $this->setCsvControl(',', '"', "\\");
        if ($this->isFirstRowHeader) {
            $this->header = $this->current();
        }
    }

    /**
     * @return array|null
     */
    public function read()
    {
        $this->next();
        return $this->current();
    }

    public function current()
    {
        $row = parent::current();
        if ($this->isFirstRowHeader){
                if (empty($this->header)){
                        return $row;
                }
                $row = @array_combine($this->header,$row);
        }
        return $row;
    }

    public function rewind()
    {
        parent::rewind();
        if ($this->isFirstRowHeader) {
            $this->seek(1);
        }
    }
}
