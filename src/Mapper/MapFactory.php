<?php

namespace OpenRtb\Mapper;


class MapFactory
{
    /**
     * @var array
     */
    protected static $allowedTags = [
        'required',
        'uuid',
        'default'
    ];

    /**
     * @param array $mapSchema
     * @return Map
     */
    public static function create(array $mapSchema)
    {
        $map = new Map();
        foreach ($mapSchema as $key => $value) {
            $tags = [];
            if (str_contains($key, ':')) {
                [$key, $tags] = explode(':', $key);
                $tags = self::normaliseTags($tags);
            }
            $map->add(new MapItem($key, $value, $tags));
        }
        return $map;
    }

    /**
     * @param string|array $tags
     * @return array
     * @throws \Exception
     */
    protected static function normaliseTags($tags)
    {
        if (is_string($tags)) {
            $tags = self::tagsFromString($tags);
        }
        if ( ! is_array($tags)) {
            throw new \Exception('Invalid tags');
        }
        return self::validateTags($tags);
    }

    /**
     * @param array $tags
     * @return array
     */
    protected static function validateTags(array $tags)
    {
        $result = [];
        if (empty($tags)) {
            return $result;
        }
        foreach ($tags as $tag => $value) {
            if ( ! self::isValidTag($tag)) {
                continue;
            }
            $result[$tag] = $value;
        }
        return $result;
    }

    /**
     * @param string $tags
     * @return array
     */
    protected static function tagsFromString($tags)
    {
        $result = [];
        $tags = explode('@', $tags);
        foreach ($tags as $tag) {
            if (empty($tag)) {
                continue;
            }
            if (str_contains($tag, ' ')) {
                [$tag, $value] = explode(' ', $tag);
            }
            $result[$tag] = $value ?? true;
        }
        return $result;
    }

    /**
     * @param $tag
     * @return bool
     */
    protected static function isValidTag($tag)
    {
        if ( ! in_array($tag, self::$allowedTags)) {
            return false;
        }
        return true;
    }
}
