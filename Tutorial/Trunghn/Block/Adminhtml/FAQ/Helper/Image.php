<?php
namespace Tutorial\Trunghn\Block\Adminhtml\Faq\Helper;

use Magento\Framework\Data\Form\Element\CollectionFactory as ElementCollectionFactory;
use Magento\Framework\Data\Form\Element\Factory as ElementFactory;
use Magento\Framework\Data\Form\Element\Image as ImageField;
use Magento\Framework\Escaper;
use Magento\Framework\UrlInterface;
use Tutorial\Trunghn\Model\Faq\Image as FAQImage;

/**
 * @method string getValue()
 */
class Image extends ImageField
{
    /**
     * image model
     *
     * @var \Tutorial\Trunghn\Model\Faq\Image
     */
    protected $imageModel;

    /**
     * @param [Entity]Image $imageModel
     * @param ElementFactory $factoryElement
     * @param ElementCollectionFactory $factoryCollection
     * @param Escaper $escaper
     * @param UrlInterface $urlBuilder
     * @param array $data
     */
    public function __construct(
        FAQImage $imageModel,
        ElementFactory $factoryElement,
        ElementCollectionFactory $factoryCollection,
        Escaper $escaper,
        UrlInterface $urlBuilder,
        $data = []
    ) {
        $this->imageModel = $imageModel;
        parent::__construct($factoryElement, $factoryCollection, $escaper, $urlBuilder, $data);
    }
    /**
     * Get image preview url
     *
     * @return string
     */
    protected function _getUrl()
    {
        $url = false;
        if ($this->getValue()) {
            $url = $this->imageModel->getBaseUrl() . $this->getValue();
        }
        return $url;
    }
}
