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
     * @param $className
     * @param $params
     *
     * @return mixed
     */
    static public function createInstance($className, $params)
    {
        $namespaceName = (new \ReflectionClass(static::class))->getNamespaceName();

        if (!class_exists($fullClassName = $namespaceName . '\\' . $className)) {
            throw new \RuntimeException(sprintf('Class "%s" in namespace "%s" does not found.' . PHP_EOL, $className, $namespaceName));
        }

        return new $fullClassName($params);
    }
}
