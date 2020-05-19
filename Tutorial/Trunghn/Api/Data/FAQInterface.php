<?php

namespace Tutorial\Trunghn\Api\Data;

interface FAQInterface
{
    const ID = 'id_faq';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const IMAGE = 'image';
    const STATUS = 'status';
    const CREATE_AT = 'create_at';
    const UPDATE_AT = 'update_at';
    const OBS_TITLE = 'obs_title';

    public function getId();
    public function setId($id);

    public function getObs();
    public function setObs($Obs);

    public function getTitle();
    public function setTitle($title);

    public function getDescription();
    public function setDescription($des);

    public function getImage();
    public function setImage($image);

    public function getStatus();
    public function setStatus($status);

    public function getCreateAt();
    public function setCreateAt($time);

    public function getUpdateAt();
    public function setUpdateAt($time);
}
