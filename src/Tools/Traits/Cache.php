<?php

namespace OpenRtb\Tools\Traits;

trait Cache
{
    protected static function cacheFetch($key)
    {
        if (!self::apcuExists()) {
            return false;
        }

        return apcu_fetch($key);
    }

    /**
     * @param string $key
     * @param mixed $item
     * @return bool
     */
    protected static function cacheStore($key, $item)
    {
        if (!self::apcuExists()) {
            return false;
        }

        return apcu_store($key, $item);
    }

    /**
     * @return bool
     */
    protected static function apcuExists(): bool
    {
        return extension_loaded("apcu");
    }
}
