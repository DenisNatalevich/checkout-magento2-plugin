<?php
/**
 * Checkout.com Magento 2 Payment module (https://www.checkout.com)
 *
 * Copyright (c) 2017 Checkout.com (https://www.checkout.com)
 * Author: David Fiaty | integration@checkout.com
 *
 * License GNU/GPL V3 https://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace CheckoutCom\Magento2\Block\Adminhtml\System\Config\Fieldset;

use Magento\Backend\Block\Template;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Renderer\RendererInterface;
use CheckoutCom\Magento2\Helper\Tools;

class Logo extends Template implements RendererInterface {

    /**
     * @var Tools
     */
    protected $tools;

    /**
     * Logo constructor
     */
    public function __construct(
        Tools $tools
    ) {
        $this->tools = $tools;
    }

    /**
     * Renders form element as HTML
     *
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element) {
        $pattern    = '<div id="checkout_com_adminhtml_logo"><a href="%s" target="_blank"><img src="%s" alt="Checkout.com Logo"></a></div>';
        $url        = $this->tools->modmeta['url'];
        $src        = $this->tools->modmeta['logo'];

        return sprintf($pattern, $url, $src);
    }
}
