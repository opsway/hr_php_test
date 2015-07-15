<?php

namespace OpsWay\Migration\Logger;

use OpsWay\Migration\Writer\WriterInterface;

class OutOfStockLogger
{
    /**
     * @var WriterInterface
     */
    protected $writer;

    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function __invoke($item, $status, $msg)
    {
        if ($item['qty'] == 0 && $item['is_stock'] == 0) {
            $this->writer->write($item);
        }
    }
}
