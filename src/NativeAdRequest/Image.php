<?php

namespace OpenRtb\NativeAdRequest;

use OpenRtb\NativeAdRequest\Specification\ImageAssetType;
use OpenRtb\NativeAdRequest\Specification\ImageMimeType;
use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class Image implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * ImageAssetType
     * @var int
     */
    protected $type;

    /**
     * Width of the image in pixels
     * @var int
     */
    protected $w;

    /**
     * The minimum requested width of the image in pixels
     * @recommended
     * @var int
     */
    protected $wmin;

    /**
     * Height of the image in pixels
     * @var int
     */
    protected $h;

    /**
     * The minimum requested height of the image in pixels
     * @recommended
     * @var int
     */
    protected $hmin;

    /**
     * If blank, assume all types are allowed.
     * Array of strings (ImageMimeType)
     * @var array
     */
    protected $mimes;

    /**
     * @var
     */
    protected $ext;

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setType($type)
    {
        $this->validateInWithCustom500Values($type, ImageAssetType::getAll());
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getW()
    {
        return $this->w;
    }

    /**
     * @param int $w
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setW($w)
    {
        $this->w = $this->validateInt($w);
        return $this;
    }

    /**
     * @return int
     */
    public function getWmin()
    {
        return $this->wmin;
    }

    /**
     * @param int $wmin
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setWmin($wmin)
    {
        $this->wmin = $this->validateInt($wmin);
        return $this;
    }

    /**
     * @return int
     */
    public function getH()
    {
        return $this->h;
    }

    /**
     * @param int $h
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setH($h)
    {
        $this->h = $this->validateInt($h);
        return $this;
    }

    /**
     * @return int
     */
    public function getHmin()
    {
        return $this->hmin;
    }

    /**
     * @param int $hmin
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setHmin($hmin)
    {
        $this->hmin = $this->validateInt($hmin);
        return $this;
    }

    /**
     * @return array
     */
    public function getMimes()
    {
        return $this->mimes;
    }

    /**
     * @param string $mimes
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function addMimes($mimes)
    {
        $this->validateIn($mimes, ImageMimeType::getAll());
        $this->mimes[] = $mimes;
        return $this;
    }

    /**
     * @param array $mimes
     * @return $this
     */
    public function setMimes(array $mimes)
    {
        $this->mimes = $mimes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @param $ext
     * @return $this
     */
    public function setExt($ext)
    {
        $this->ext = $ext;
        return $this;
    }
}
