<?php

namespace OpenRtb\BidRequest;

use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\BidRequest\Specification\BitType;
use OpenRtb\BidRequest\Specification\ConnectionType;
use OpenRtb\BidRequest\Specification\DeviceType;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

/**
 * This object provides information pertaining to the device through which the user is interacting.
 * Device information includes its hardware, platform, location, and carrier data.
 * The device can refer to a mobile handset, a desktop computer, set-top box, or other digital device.
 *
 * Class Device
 * @package OpenRtb\BidRequest
 */
class Device implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Standard "Do Not Track" flag as set in the header by the browser,
     * where 0 = tracking is unrestricted, 1 = do not track.
     *
     * @recommended
     * @var int
     */
    protected $dnt;

    /**
     * Browser user agent
     * @recommended
     * @var string
     */
    protected $ua;

    /**
     * IPv4 address closest to device.
     *
     * @recommended
     * @var string
     */
    protected $ip;

    /**
     * Location of the device assumed to be the user's current location defined by a Geo object.
     *
     * @recommended
     * @var Geo
     */
    protected $geo;

    /**
     * Hardware device ID (e.g., IMEI); hashed via SHA1
     * @var string
     */
    protected $didsha1;

    /**
     * Hardware device ID (e.g., IMEI); hashed via MD5
     * @var string
     */
    protected $didmd5;

    /**
     * Platform device ID (e.g., Android ID); hashed via SHA1
     * @var string
     */
    protected $dpidsha1;

    /**
     * Platform device ID (e.g., Android ID); hashed via MD5
     * @var string
     */
    protected $dpidmd5;

    /**
     * IPv6 address closest to device.
     *
     * @var string
     */
    protected $ipv6;

    /**
     * Carrier or ISP (e.g., “VERIZON”). “WIFI” is often used in mobile
     * to indicate high bandwidth (e.g., video friendly vs. cellular)
     * @var string
     */
    protected $carrier;

    /**
     * Browser language using ISO-639-1-alpha-2
     * @var string
     */
    protected $language;

    /**
     * Device make (e.g., “Apple”)
     * @var string
     */
    protected $make;

    /**
     * Device model (e.g., “iPhone”)
     * @var string
     */
    protected $model;

    /**
     * Device operating system (e.g., “iOS”)
     * @var string
     */
    protected $os;

    /**
     * Device operating system version (e.g., “3.1.2”)
     * @var string
     */
    protected $osv;

    /**
     * Hardware version of the device (e.g., “5S” for iPhone 5S)
     * @var string
     */
    protected $hwv;

    /**
     * Physical width of the screen in pixels
     * @var int
     */
    protected $w;

    /**
     * Physical height of the screen in pixels
     * @var int
     */
    protected $h;

    /**
     * Screen size as pixels per linear inch
     * @var int
     */
    protected $ppi;

    /**
     * The ratio of physical pixels to device independent pixels
     * @var float
     */
    protected $pxratio;

    /**
     * Support for JavaScript, where 0 = no, 1 = yes
     * @var int
     */
    protected $js;

    /**
     * Indicates if the geolocation API will be available to JavaScript code running in the banner,
     * where 0 = no, 1 = yes.
     *
     * @var int
     */
    protected $geofetch;

    /**
     * Network connection type
     * OpenRtb\BidRequest\Specification\ConnectionType
     * @var int
     */
    protected $connectiontype;

    /**
     * The general type of device.
     *
     * OpenRtb\BidRequest\Specification\DeviceType
     * @var int
     */
    protected $devicetype;

    /**
     * Version of Flash supported by the browser
     * @var string
     */
    protected $flashver;

    /**
     * ID sanctioned for advertiser use in the clear (i.e., not hashed).
     *
     * @var string
     */
    protected $ifa;

    /**
     * MAC address of the device; hashed via SHA1
     * @var string
     */
    protected $macsha1;

    /**
     * MAC address of the device; hashed via MD5
     * @var string
     */
    protected $macmd5;

    /**
     * "Limit Ad Tracking" signal commercially endorsed (e.g., iOS, Android)
     * where 0 = tracking is unrestricted, 1 = tracking must be limited per commercial guidelines
     *
     * @recommended
     * @var int
     */
    protected $lmt;

    /**
     * Mobile carrier as the concatenated MCC-MNC code (e.g., "310-005" identifies Verizon Wireless CDMA in the USA).
     * Refer to https://en.wikipedia.org/wiki/Mobile_country_code for further examples.
     * Note that the dash between the MCC and MNC parts is required to remove parsing ambiguity.
     *
     * @var string
     */
    protected $mccmnc;

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
        $this->setGeo(new Geo());
    }

    /**
     * @return string
     */
    public function getUa()
    {
        return $this->ua;
    }

    /**
     * @param string $ua
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setUa($ua)
    {
        $this->validateString($ua);
        $this->ua = $ua;
        return $this;
    }

    /**
     * @return Geo
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * @param Geo $geo
     * @return $this
     */
    public function setGeo(Geo $geo)
    {
        $this->geo = $geo;
        return $this;
    }

    /**
     * @return int
     */
    public function getDnt()
    {
        return $this->dnt;
    }

    /**
     * @param int $dnt
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setDnt($dnt)
    {
        $this->validateIn($dnt, BitType::getAll());
        $this->dnt = $dnt;
        return $this;
    }

    /**
     * @return int
     */
    public function getLmt()
    {
        return $this->lmt;
    }

    /**
     * @param int $lmt
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setLmt($lmt)
    {
        $this->validateIn($lmt, BitType::getAll());
        $this->lmt = $lmt;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setIp($ip)
    {
        $this->validateIp($ip);
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpv6()
    {
        return $this->ipv6;
    }

    /**
     * @param string $ipv6
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setIpv6($ipv6)
    {
        $this->validateString($ipv6);
        $this->ipv6 = $ipv6;
        return $this;
    }

    /**
     * @return int
     */
    public function getDevicetype()
    {
        return $this->devicetype;
    }

    /**
     * @param int $devicetype
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setDevicetype($devicetype)
    {
        $this->validateIn($devicetype, DeviceType::getAll());
        $this->devicetype = $devicetype;
        return $this;
    }

    /**
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param string $make
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setMake($make)
    {
        $this->validateString($make);
        $this->make = $make;
        return $this;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setModel($model)
    {
        $this->validateString($model);
        $this->model = $model;
        return $this;
    }

    /**
     * @return string
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * @param string $os
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setOs($os)
    {
        $this->validateString($os);
        $this->os = $os;
        return $this;
    }

    /**
     * @return string
     */
    public function getOsv()
    {
        return $this->osv;
    }

    /**
     * @param string $osv
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setOsv($osv)
    {
        $this->validateString($osv);
        $this->osv = $osv;
        return $this;
    }

    /**
     * @return string
     */
    public function getHwv()
    {
        return $this->hwv;
    }

    /**
     * @param string $hwv
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setHwv($hwv)
    {
        $this->validateString($hwv);
        $this->hwv = $hwv;
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
        $this->h = $this->validatePositiveInt($h);
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
        $this->w = $this->validatePositiveInt($w);
        return $this;
    }

    /**
     * @return int
     */
    public function getPpi()
    {
        return $this->ppi;
    }

    /**
     * @param int $ppi
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setPpi($ppi)
    {
        $this->ppi = $this->validatePositiveInt($ppi);
        return $this;
    }

    /**
     * @return float
     */
    public function getPxratio()
    {
        return $this->pxratio;
    }

    /**
     * @param float $pxratio
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setPxratio($pxratio)
    {
        $this->pxratio = $this->validateNumericToFloat($pxratio);
        return $this;
    }

    /**
     * @return int
     */
    public function getJs()
    {
        return $this->js;
    }

    /**
     * @param int $js
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setJs($js)
    {
        $this->validateIn($js, BitType::getAll());
        $this->js = $js;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlashver()
    {
        return $this->flashver;
    }

    /**
     * @param string $flashver
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setFlashver($flashver)
    {
        $this->validateString($flashver);
        $this->flashver = $flashver;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setLanguage($language)
    {
        $this->validateString($language);
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param string $carrier
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setCarrier($carrier)
    {
        $this->validateString($carrier);
        $this->carrier = $carrier;
        return $this;
    }

    /**
     * @return int
     */
    public function getConnectiontype()
    {
        return $this->connectiontype;
    }

    /**
     * @param int $connectiontype
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setConnectiontype($connectiontype)
    {
        $this->validateIn($connectiontype, ConnectionType::getAll());
        $this->connectiontype = $connectiontype;
        return $this;
    }

    /**
     * @return string
     */
    public function getIfa()
    {
        return $this->ifa;
    }

    /**
     * @param string $ifa
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setIfa($ifa)
    {
        $this->validateString($ifa);
        $this->ifa = $ifa;
        return $this;
    }

    /**
     * @return string
     */
    public function getDidsha1()
    {
        return $this->didsha1;
    }

    /**
     * @param string $didsha1
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setDidsha1($didsha1)
    {
        $this->validateString($didsha1);
        $this->didsha1 = $didsha1;
        return $this;
    }

    /**
     * @return string
     */
    public function getDidmd5()
    {
        return $this->didmd5;
    }

    /**
     * @param string $didmd5
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setDidmd5($didmd5)
    {
        $this->validateString($didmd5);
        $this->didmd5 = $didmd5;
        return $this;
    }

    /**
     * @return string
     */
    public function getDpidsha1()
    {
        return $this->dpidsha1;
    }

    /**
     * @param string $dpidsha1
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setDpidsha1($dpidsha1)
    {
        $this->validateString($dpidsha1);
        $this->dpidsha1 = $dpidsha1;
        return $this;
    }

    /**
     * @return string
     */
    public function getDpidmd5()
    {
        return $this->dpidmd5;
    }

    /**
     * @param string $dpidmd5
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setDpidmd5($dpidmd5)
    {
        $this->validateString($dpidmd5);
        $this->dpidmd5 = $dpidmd5;
        return $this;
    }

    /**
     * @return string
     */
    public function getMacsha1()
    {
        return $this->macsha1;
    }

    /**
     * @param string $macsha1
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setMacsha1($macsha1)
    {
        $this->validateString($macsha1);
        $this->macsha1 = $macsha1;
        return $this;
    }

    /**
     * @return string
     */
    public function getMacmd5()
    {
        return $this->macmd5;
    }

    /**
     * @param string $macmd5
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setMacmd5($macmd5)
    {
        $this->validateString($macmd5);
        $this->macmd5 = $macmd5;
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

    /**
     * @return int
     */
    public function getGeofetch()
    {
        return $this->geofetch;
    }

    /**
     * @param $geofetch
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setGeofetch($geofetch)
    {
        $this->validateIn($geofetch, BitType::getAll());
        $this->geofetch = $geofetch;

        return $this;
    }

    /**
     * @return string
     */
    public function getMccmnc()
    {
        return $this->mccmnc;
    }

    /**
     * @param $mccmnc
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setMccmnc($mccmnc)
    {
        $this->validateString($mccmnc);
        $this->mccmnc = $mccmnc;

        return $this;
    }
}
