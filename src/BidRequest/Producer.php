<?php

namespace OpenRtb\BidRequest;

use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class Producer implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Content producer or originator ID. Useful if content is syndicated, and may be posted on a site using embed tags.
     *
     * @var string
     */
    protected $id;

    /**
     * Content producer or originator name (e.g., “Warner Bros”)
     * @var string
     */
    protected $name;

    /**
     * Array of IAB content categories that describe the content producer.
     *
     * Array of strings
     * @var array
     */
    protected $cat;

    /**
     * Highest level domain of the content producer (e.g., "producer.com")
     * @var string
     */
    protected $domain;

    /**
     * @var Ext
     */
    protected $ext;

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
     * @param $name
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
     * @return array
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * @param string $cat
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function addCat($cat)
    {
        $this->validateString($cat);
        $this->cat[] = $cat;
        return $this;
    }

    /**
     * @param array $cat
     * @return $this
     */
    public function setCat(array $cat)
    {
        $this->cat = $cat;
        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setDomain($domain)
    {
        $this->validateString($domain);
        $this->domain = $domain;
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
