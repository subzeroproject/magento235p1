<?php

namespace Tutorial\Trunghn\Controller\Index;

class TestEvent extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        // TODO: Implement execute() method.
        $textDisplay = new \Magento\Framework\DataObject(array('text'=>'Tutorial'));
        $this->_eventManager->dispatch('tutorial_display_text', ['mp_text'=>$textDisplay]);
        echo $textDisplay->getData('text');
        exit;
    }
}
