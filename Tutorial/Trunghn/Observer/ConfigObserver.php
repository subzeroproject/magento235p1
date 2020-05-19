<?php
namespace Tutorial\Trunghn\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;

class ConfigObserver implements ObserverInterface
{

    public function __construct(
    ) {
    }

    public function execute(EventObserver $observer)
    {
        //$this->logger->info($observer->getWebsite());
        //$this->logger->info($observer->getStore());
    }
}
