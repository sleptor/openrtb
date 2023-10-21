<?php

namespace OpenRtb\NativeAdResponse;

use OpenRtb\Tools\Classes\ArrayCollection;
use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class Native implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Version of the Native Markup version in use
     * @default 1
     * @var int
     */
    protected $ver;

    /**
     * List of native ad’s assets
     * Array of asset objects
     * @required
     * @var ArrayCollection
     */
    protected $assets;

    /**
     * Destination Link
     * @required
     * @var Link
     */
    protected $link;

    /**
     * Array of strings
     * @var array
     */
    protected $imptrackers;

    /**
     * Optional JavaScript impression tracker
     * @var string
     */
    protected $jstracker;

    /**
     * @var Ext
     */
    protected $ext;

    public function __construct()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->setAssets(new ArrayCollection());
    }

    /**
     * @return int
     */
    public function getVer()
    {
        return $this->ver;
    }

    /**
     * @param int $ver
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setVer($ver)
    {
        $this->ver = $this->validateInt($ver);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAssets()
    {
        return $this->assets;
    }

    /**
     * @param Assets $assets
     * @return $this
     */
    public function addAssets(Assets $assets)
    {
        $this->assets->add($assets);
        return $this;
    }

    /**
     * @param ArrayCollection $assets
     * @return $this
     */
    public function setAssets(ArrayCollection $assets)
    {
        $this->assets = $assets;
        return $this;
    }

    /**
     * @return Link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param Link $link
     * @return $this
     */
    public function setLink(Link $link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return array
     */
    public function getImptrackers()
    {
        return $this->imptrackers;
    }

    /**
     * @param string $imptrackers
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function addImptrackers($imptrackers)
    {
        $this->validateString($imptrackers);
        $this->imptrackers[] = $imptrackers;
        return $this;
    }

    /**
     * @param array $imptrackers
     * @return $this
     */
    public function setImptrackers(array $imptrackers)
    {
        $this->imptrackers = $imptrackers;
        return $this;
    }

    /**
     * @return string
     */
    public function getJstracker()
    {
        return $this->jstracker;
    }

    /**
     * @param string $jstracker
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setJstracker($jstracker)
    {
        $this->validateString($jstracker);
        $this->jstracker = $jstracker;
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
     * @param Ext $ext
     * @return $this
     */
    public function setExt(Ext $ext)
    {
        $this->ext = $ext;
        return $this;
    }
}
