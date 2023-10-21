<?php

namespace OpenRtb\Mapper;

use Countable;
use IteratorAggregate;
use ArrayIterator;

class Map implements Countable, IteratorAggregate
{
    /**
     * @var array
     */
    protected $map = [];

    /**
     * @param MapItem $mapItem
     */
    public function add(MapItem $mapItem)
    {
        $this->map[$mapItem->getObjectPath()] = $mapItem;
    }

    /**
     * @return array
     */
    public function getObjectPaths(): array
    {
        return array_keys($this->map);
    }

    /**
     * @param string $objectPath
     * @return bool
     */
    public function containsObjectPath($objectPath): bool
    {
        return isset($this->map[$objectPath]) || array_key_exists($objectPath, $this->map);
    }

    /**
     * @param string $objectPath
     * @return MapItem|null
     */
    public function get($objectPath)
    {
        return $this->map[$objectPath] ?? null;
    }

    /**
     * @param string $objectPath
     * @return bool
     */
    public function removeObjectPath($objectPath): bool
    {
        if ( ! $this->containsObjectPath($objectPath)) {
            return false;
        }
        unset($this->map[$objectPath]);
        return true;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->map);
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->map);
    }
}
