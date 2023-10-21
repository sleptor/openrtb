<?php

namespace OpenRtb\NativeAdRequest;

use OpenRtb\NativeAdRequest\Specification\BitType;
use OpenRtb\Tools\Exceptions\ExceptionInvalidValue;
use OpenRtb\Tools\Interfaces\Arrayable;
use OpenRtb\Tools\Traits\SetterValidation;
use OpenRtb\Tools\Traits\ToArray;

class Assets implements Arrayable
{
    use SetterValidation;
    use ToArray;

    /**
     * Unique asset ID, assigned by exchange
     * @required
     * @var int
     */
    protected $id;

    /**
     * Set to 1 if asset is required
     * @default 0
     * @var int
     */
    protected $required;

    /**
     * @var Title
     */
    protected $title;

    /**
     * @var Image
     */
    protected $img;

    /**
     * @var Video
     */
    protected $video;

    /**
     * @var Data
     */
    protected $data;

    /**
     * @var
     */
    protected $ext;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setId($id)
    {
        $this->id = $this->validateInt($id);
        return $this;
    }

    /**
     * @return int
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * @param int $required
     * @return $this
     * @throws ExceptionInvalidValue
     */
    public function setRequired($required)
    {
        $this->validateIn($required, BitType::getAll());
        $this->required = $required;
        return $this;
    }

    /**
     * @return Title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param Title $title
     * @return $this
     */
    public function setTitle(Title $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Image
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param Image $img
     * @return $this
     */
    public function setImg(Image $img)
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @return Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param Video $video
     * @return $this
     */
    public function setVideo(Video $video)
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return Data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param Data $data
     * @return $this
     */
    public function setData(Data $data)
    {
        $this->data = $data;
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
