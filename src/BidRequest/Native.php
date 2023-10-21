<?php

namespace OpenRtb\BidRequest;

use OpenRtb\NativeAdRequest\NativeAdRequest;
use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\BidRequest\Specification\ApiFrameworks;
use OpenRtb\BidRequest\Specification\CreativeAttributes;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class Native implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Request payload complying with the Native Ad Specification.
     * Exactly one of {request, request_native} should be used.
     * @required
     * @var string
     */
    protected $request;

    /**
     * Version of the Native Ad Specification to which request complies.
     *
     * @recommended
     * @var string
     */
    protected $ver;

    /**
     * List of supported API frameworks for this impression. If an API is not explicitly listed, it is assumed not to be supported.
     *
     * Array of integers (ApiFrameworks)
     * @var array
     */
    protected $api;

    /**
     * Blocked creative attributes.
     *
     * Array of integers (CreativeAttributes)
     * @var array
     */
    protected $battr;

    /**
     * @var Ext
     */
    protected $ext;

    /**
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    public function setRequestViaNativeAdRequest(NativeAdRequest $nativeAdRequest)
    {
        $this->setRequest($nativeAdRequest->getRequest());
    }

    /**
     * @param string $request
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setRequest($request)
    {
        $this->validateString($request);
        $this->request = $request;
        return $this;
    }

    /**
     * @return string
     */
    public function getVer()
    {
        return $this->ver;
    }

    /**
     * @param string $ver
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setVer($ver)
    {
        $this->validateVersion($ver);
        $this->ver = $ver;
        return $this;
    }

    /**
     * @return array
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * @param int $api
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function addApi($api)
    {
        $this->validateIn($api, ApiFrameworks::getAll());
        $this->api[] = $api;
        return $this;
    }

    /**
     * @param array $api
     * @return $this
     */
    public function setApi(array $api)
    {
        $this->api = $api;
        return $this;
    }

    /**
     * @return array
     */
    public function getBattr()
    {
        return $this->battr;
    }

    /**
     * @param int $battr
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function addBattr($battr)
    {
        $this->validateIn($battr, CreativeAttributes::getAll());
        $this->battr[] = $battr;
        return $this;
    }

    /**
     * @param array $battr
     * @return $this
     */
    public function setBattr(array $battr)
    {
        $this->battr = $battr;
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
