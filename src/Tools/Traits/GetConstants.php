<?php

namespace OpenRtb\Tools\Traits;

use ReflectionClass;

trait GetConstants
{
    use Cache;

    /**
     * @return array
     */
    public static function getAll()
    {
        $className = md5('const' . __CLASS__);
        if (($constants = self::cacheFetch($className)) !== false) {
            return $constants;
        }

        $constants = self::getConstants();
        self::cacheStore($className, $constants);
        return $constants;
    }

    private static function getConstants()
    {
        return (new ReflectionClass(__CLASS__))->getConstants();
    }
}
