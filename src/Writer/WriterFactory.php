<?php
namespace OpsWay\Migration\Writer;

use OpsWay\Migration\Factory\ReaderWriterTrait;

/**
 * Class WriterFactory
 *
 * @package OpsWay\Migration\Writer
 */
class WriterFactory
{
    use ReaderWriterTrait;

    /**
     * @param       $name
     * @param array $params
     *
     * @return WriterInterface
     */
    static public function create($name, array $params = [])
    {
        $instance = static::createInstance($name, $params);
        if (!($instance instanceof WriterInterface)) {
            throw new \RuntimeException(sprintf('Writer "%s" should implement WriterInterface', get_class($instance)));
        }
        return $instance;
    }
}
