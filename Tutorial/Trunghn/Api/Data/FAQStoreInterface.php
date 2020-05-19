<?php

namespace Tutorial\Trunghn\Api\Data;

interface FAQStoreInterface{
    const ID = 'id';
    const FAQ_ID = 'id_faq';
    const STORE_ID = 'store_id';

    public function getId();
    public function setId($id);

    public function getFAQ_Id();
    public function setFAQ_Id($fId);

    public function getStore_Id();
    public function setStore_Id($sId);


}
