<?php

namespace OpenRtb\NativeAdRequest;

use OpenRtb\NativeAdRequest\Specification\DataAssetType;
use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class Data implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Type ID of the element supported by the publisher (DataAssetType)
     * @required
     * @var int
     */
    protected $type;

    /**
     * Maximum length of the text in the element’s response
     * @var int
     */
    protected $len;

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
        $this->validateInWithCustom500Values($type, DataAssetType::getAll());
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getLen()
    {
        return $this->len;
    }

    /**
     * @param int $len
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setLen($len)
    {
        $this->len = $this->validatePositiveInt($len);
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
