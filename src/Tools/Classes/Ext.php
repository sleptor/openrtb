<?php

namespace OpenRtb\Tools\Classes;

use OpenRtb\Tools\Interfaces\Arrayable;

abstract class Ext implements Arrayable
{
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @param array $parameters
     * @return $this
     */
    public function add(array $parameters = array())
    {
        $this->parameters = array_replace($this->parameters, $parameters);
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->parameters[$key] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->parameters[$key] ?? null;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->parameters;
    }
}
