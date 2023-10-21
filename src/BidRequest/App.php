<?php

namespace OpenRtb\BidRequest;

use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\BidRequest\Specification\BitType;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class App implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Application ID on the exchange. RECOMMENDED by the OpenRTB specification.
     *
     * @recommended
     * @var string
     */
    protected $id;

    /**
     * Application name (may be aliased at publisher's request)
     *
     * App name (may be aliased at the publisher’s request)
     * @var string
     */
    protected $name;

    /**
     * Domain of the application, used for advertiser side blocking. For example, "mygame.foo.com".
     *
     * @var string
     */
    protected $domain;

    /**
     * Array of IAB content categories of the app. Refer to enum ContentCategory.
     *
     * Array of string
     * @var array
     */
    protected $cat;

    /**
     * Array of IAB content categories that describe the current section of the app. Refer to enum ContentCategory.
     *
     * Array of string
     * @var array
     */
    protected $sectioncat;

    /**
     * Array of IAB content categories that describe the current page or view of the app. Refer to enum ContentCategory.
     *
     * Array of string
     * @var array
     */
    protected $pagecat;

    /**
     * Application version
     *
     * @var string
     */
    protected $ver;

    /**
     * A platform-specific application identifier intended to be unique to the app and independent of the exchange.
     * On Android, this should be a bundle or package name (e.g., com.foo.mygame). On iOS, it is a numeric ID.
     *
     * @var string
     */
    protected $bundle;

    /**
     * Indicates if the app has a privacy policy, where 0 = no, 1 = yes
     *
     * @var int
     */
    protected $privacypolicy;

    /**
     * 0 = app is free, 1 = the app is a paid version
     *
     * @var int
     */
    protected $paid;

    /**
     * Details about the Publisher object of the app.
     *
     * @var Publisher
     */
    protected $publisher;

    /**
     * Details about the Content within the app.
     *
     * @var Content
     */
    protected $content;

    /**
     * Comma-separated list of keywords about this app.
     * Note: OpenRTB 2.2 allowed an array of strings as alternate implementation but this was fixed in 2.3+ where it's definitely a single string with CSV content again.
     * Compatibility with some OpenRTB 2.2 exchanges that adopted the alternate representation may require custom handling of the JSON.
     *
     * @var string
     */
    protected $keywords;

    /**
     * App store URL for an installed app
     * @var string
     */
    protected $storeurl;

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
        $this->setPublisher(new Publisher());
        $this->setContent(new Content());
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
     * @return string
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * @param string $bundle
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setBundle($bundle)
    {
        $this->validateString($bundle);
        $this->bundle = $bundle;
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
     * @return string
     */
    public function getStoreurl()
    {
        return $this->storeurl;
    }

    /**
     * @param string $storeurl
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setStoreurl($storeurl)
    {
        $this->validateString($storeurl);
        $this->storeurl = $storeurl;
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
     * @return array
     */
    public function getSectioncat()
    {
        return $this->sectioncat;
    }

    /**
     * @param string $sectioncat
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function addSectioncat($sectioncat)
    {
        $this->validateString($sectioncat);
        $this->sectioncat[] = $sectioncat;
        return $this;
    }

    /**
     * @param array $sectioncat
     * @return $this
     */
    public function setSectioncat(array $sectioncat)
    {
        $this->sectioncat = $sectioncat;
        return $this;
    }

    /**
     * @return array
     */
    public function getPagecat()
    {
        return $this->pagecat;
    }

    /**
     * @param string $pagecat
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function addPagecat($pagecat)
    {
        $this->validateString($pagecat);
        $this->pagecat[] = $pagecat;
        return $this;
    }

    /**
     * @param array $pagecat
     * @return $this
     */
    public function setPagecat(array $pagecat)
    {
        $this->pagecat = $pagecat;
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
        $this->validateString($ver);
        $this->ver = $ver;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrivacypolicy()
    {
        return $this->privacypolicy;
    }

    /**
     * @param int $privacypolicy
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setPrivacypolicy($privacypolicy)
    {
        $this->validateIn($privacypolicy, BitType::getAll());
        $this->privacypolicy = $privacypolicy;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * @param int $paid
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setPaid($paid)
    {
        $this->validateIn($paid, BitType::getAll());
        $this->paid = $paid;
        return $this;
    }

    /**
     * @return Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param Publisher $publisher
     * @return $this
     */
    public function setPublisher(Publisher $publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * @return Content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param Content $content
     * @return $this
     */
    public function setContent(Content $content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setKeywords($keywords)
    {
        $this->validateString($keywords);
        $this->keywords = $keywords;
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
     */
    public function setExt(Ext $ext)
    {
        $this->ext = $ext;
    }
}
