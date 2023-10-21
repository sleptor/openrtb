<?php

namespace OpenRtb\NativeAdResponse;

use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class Link implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Landing URL of the clickable link
     * @required
     * @var string
     */
    protected $url;

    /**
     * List of third-party tracker URLs to be fired on click of the URL
     * Array of strings
     * @var array
     */
    protected $clicktrackers;

    /**
     * Fallback URL for deeplink. To be used if the URL given in url is not supported by the device
     * @var string
     */
    protected $fallback;

    /**
     * @var Ext
     */
    protected $ext;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setUrl($url)
    {
        $this->validateString($url);
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getClicktrackers()
    {
        return $this->clicktrackers;
    }

    /**
     * @param string $clicktrackers
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function addClicktrackers($clicktrackers)
    {
        $this->validateString($clicktrackers);
        $this->clicktrackers[] = $clicktrackers;
        return $this;
    }

    /**
     * @param array $clicktrackers
     * @return $this
     */
    public function setClicktrackers(array $clicktrackers)
    {
        $this->clicktrackers = $clicktrackers;
        return $this;
    }

    /**
     * @return string
     */
    public function getFallback()
    {
        return $this->fallback;
    }

    /**
     * @param string $fallback
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setFallback($fallback)
    {
        $this->validateString($fallback);
        $this->fallback = $fallback;
        return $this;
    }

    /**
     * @return Ext
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @param $ext
     * @return $this
     */
    public function setExt(Ext $ext)
    {
        $this->ext = $ext;
        return $this;
    }
}
