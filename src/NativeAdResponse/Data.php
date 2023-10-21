<?php

namespace OpenRtb\NativeAdResponse;

use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class Data implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * The optional formatted string name of the data type to be displayed
     * @var string
     */
    protected $label;

    /**
     * The formatted string of data to be displayed
     * @required
     * @var string
     */
    protected $value;

    /**
     * @var Ext
     */
    protected $ext;

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setLabel($label)
    {
        $this->validateString($label);
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setValue($value)
    {
        $this->validateString($value);
        $this->value = $value;
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
