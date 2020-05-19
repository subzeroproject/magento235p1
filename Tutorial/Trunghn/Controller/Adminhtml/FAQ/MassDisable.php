<?php
namespace Tutorial\Trunghn\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Tutorial\Trunghn\Model\ResourceModel\Faq\CollectionFactory;

/**
 * Class MassDisable
 */
class MassDisable extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;

    protected $log;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        \Tutorial\Trunghn\Logger\Logger $logger,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->filter = $filter;
        $this->log = $logger;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $i = 0;
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        foreach ($collection as $item) {
//            $this->log->info($item->toJson());
            if ($item['status'] == '1') {
                $item['status'] = '0';
                $i++;
                $item->save();
            }
//            $item->setStatus('Enable')->save();
        }
//        $this->messageManager->addSuccess(__('A total of %1 record(s) have been modified.', $collection->getSize()));
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been modified.', $i));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }

    /**
     * Check Category Map recode delete Permission.
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_Trunghn::row_data_disable');
    }
}
