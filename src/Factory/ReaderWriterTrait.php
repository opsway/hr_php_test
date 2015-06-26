<?php

namespace OpsWay\Migration\Factory;

/**
 * Trait ReaderWriterTrait
 *
 * @package OpsWay\Migration\Factory
 */
trait ReaderWriterTrait
{
    /**
     * @param $name
     * @param $params
     *
     * @return mixed
     */
    static public function createInstance($name, $params)
    {
        $namespace = substr(static::class, 0, strrpos(static::class, '\\'));
        if (class_exists($namespace . '\\' . $name)) {
            $name = $namespace . '\\' . $name;
        } elseif (!class_exists($name)) {
            throw new \RuntimeException(sprintf('Class "%s" does not found.' . PHP_EOL, $name));
        }
        return new $name($params);
    }
}
