<?php

namespace Tutorial\Trunghn\Block;

use Magento\Framework\View\Element\Template\Context;
use Tutorial\Trunghn\Model\FAQFactory;

/**
 * Test List block
 */
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_faqFactory;

    public function __construct(
        Context $context,
        FAQFactory $faqFactory
    ) {
        $this->_faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('List Page'));
        $faqPerTab = (int) $this->_scopeConfig->getValue(
            'Tutorial/tutorial_general/general/display_number_faq',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if ($this->getFAQCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'Trunghn.faq.pager'
            )->setAvailableLimit([$faqPerTab=>$faqPerTab])->setShowPerPage(true)->setCollection(
                $this->getFAQCollection()
            );
            $this->setChild('pager', $pager);
            $this->getFAQCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getFAQCollection()
    {
        $faqPerTab = (int) $this->_scopeConfig->getValue('tutorial/tutorial_general/general/display_number_faq', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : $faqPerTab;

        $faq = $this->_faqFactory->create();
        $collection = $faq->getCollection();
        $collection->addFieldToFilter('Status', '1'); 
        $collection->setOrder('id_faq','ASC');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
