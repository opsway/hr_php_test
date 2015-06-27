<?php
namespace OpsWay\Migration\Reader;

use OpsWay\Migration\Factory\ReaderWriterTrait;

class ReaderFactory
{
    use ReaderWriterTrait;

    static public function create($className, array $params = [])
    {
        $instance = static::createInstance($className, $params);

        if (!($instance instanceof ReaderInterface)) {
            throw new \RuntimeException(sprintf('Reader "%s" should implement ReaderInterface', get_class($instance)));
        }
        return $instance;
    }
}
