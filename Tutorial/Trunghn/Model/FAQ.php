<?php

namespace Tutorial\Trunghn\Model;

use Tutorial\Trunghn\Api\Data\FAQInterface;

class FAQ extends \Magento\Framework\Model\AbstractModel implements FAQInterface
{
    const CACHE_TAG = 'tutorial_trunghn';

    protected $_cacheTag = 'tutorial_trunghn';

    protected $_eventPrefix = 'tutorial_trunghn';

    protected function _construct()
    {
        $this->_init('Tutorial\Trunghn\Model\ResourceModel\FAQ');
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getObs()
    {
        return $this->getData(self::OBS_TITLE);
    }

    public function setObs($obs)
    {
        return $this->setData(self::OBS_TITLE, $obs);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($des)
    {
        return $this->setData(self::DESCRIPTION, $des);
    }

    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    public function getStatus()
    {
        return $this->getData();
    }
    public function setStatus($status)
    {
        return $this->setDate(self::STATUS, $status);
    }

    public function getCreateAt()
    {
        return $this->getData(self::CREATE_AT);
    }
    public function setCreateAt($time)
    {
        return $this->setData(self::CREATE_AT, $time);
    }

    public function getUpdateAt()
    {
        return $this->getData(self::UPDATE_AT);
    }

    public function setUpdateAt($time)
    {
        return $this->setData(self::UPDATE_AT, $time);
    }
}
