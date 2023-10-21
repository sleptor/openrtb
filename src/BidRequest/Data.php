<?php

namespace OpenRtb\BidRequest;

use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;
use OpenRtb\Tools\Classes\ArrayCollection;

class Data implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Exchange-specific ID for the data provider.
     *
     * @var string
     */
    protected $id;

    /**
     * Exchange-specific name for the data provider.
     *
     * @var string
     */
    protected $name;

    /**
     * Array of Segment objects that contain the actual data values.
     *
     * Array of Segment
     * @var ArrayCollection
     */
    protected $segment;

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
        $this->setSegment(new ArrayCollection());
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setId($id)
    {
        $this->validateString($id);
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setName($name)
    {
        $this->validateString($name);
        $this->name = $name;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * @param Segment $segment
     * @return $this
     */
    public function addSegment(Segment $segment = null)
    {
        if (is_null($segment)) {
            $segment = new Segment();
        }
        $this->segment->add($segment);
        return $this;
    }

    /**
     * @param ArrayCollection $segment
     * @return $this
     */
    public function setSegment(ArrayCollection $segment)
    {
        $this->segment = $segment;
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
