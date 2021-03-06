<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Model\Resource\Category\Attribute\Frontend;

/**
 * Category image attribute frontend
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Image extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    const IMAGE_PATH_SEGMENT = 'catalog/category/';

    /**
     * Store manager
     *
     * @var \Magento\Framework\Store\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * Construct
     *
     * @param \Magento\Framework\Store\StoreManagerInterface $storeManager
     */
    public function __construct(\Magento\Framework\Store\StoreManagerInterface $storeManager)
    {
        $this->_storeManager = $storeManager;
    }

    /**
     * Return image url
     *
     * @param \Magento\Framework\Object $object
     * @return string|null
     */
    public function getUrl($object)
    {
        $url = false;
        if ($image = $object->getData($this->getAttribute()->getAttributeCode())) {
            $url = $this->_storeManager->getStore()->getBaseUrl(
                \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
            ) . self::IMAGE_PATH_SEGMENT . $image;
        }
        return $url;
    }
}
