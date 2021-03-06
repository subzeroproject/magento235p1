<?php

namespace Tutorial\Trunghn\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Tutorial\Trunghn\Logger\Logger;

class AddRow extends Action
{
    private $coreRegistry;
    private $log;

    private $faqFactory;
    private $_faqStoreFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Tutorial\Trunghn\Model\FAQFactory $faqFactory,
        \Tutorial\Trunghn\Model\FAQStoreFactory $faqStoreFactory,
        Logger $log
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->faqFactory = $faqFactory;
        $this->log = $log;
        $this->_faqStoreFactory = $faqStoreFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
//        $this->log->info(json_encode($rowId));
        $rowData = $this->faqFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            if ($rowData->getEntityId()) {
                $this->messageManager->addErrorMessage(__('Row data no longer exist'));
                $this->_redirect('tutorial/faq/rowdata');
                return;
            }
        }
        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit: ') . $rowTitle : __('Add');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_Trunghn::addrow');
    }

    /**
     * Get form action URL.
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        if ($this->hasFormActionUrl()) {
            return $this->getData('form_action_url');
        }

        return $this->getUrl('*/*/save');
    }
}
