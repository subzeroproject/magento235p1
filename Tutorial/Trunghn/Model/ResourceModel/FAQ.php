<?php

namespace Tutorial\Trunghn\Model\ResourceModel;

class FAQ extends \Magento\Framework\Model\ResourceModel\Db\AbstractDB
{
    protected $_idFieldName = 'id_faq';

    protected $_date;

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        $resultPrefix = null
    ) {
        parent::__construct($context);
        $this->_date = $date;
    }

    protected function _construct()
    {
        $this->_init('tutorial_trunghn', 'id_faq');
    }
}
