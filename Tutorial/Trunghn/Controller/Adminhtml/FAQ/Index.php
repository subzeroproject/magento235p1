<?php

namespace Tutorial\Trunghn\Controller\Adminhtml\Faq;

class Index extends \Magento\Backend\App\Action
{
    protected $_resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }


    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Tutorial_Trunghn::faq_list');
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ List'));
        return $resultPage;
    }
    /**
     * Check FAQ List Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_Trunghn::faq_list');
    }
}
