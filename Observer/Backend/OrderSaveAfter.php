<?php
/**
 * Checkout.com Magento 2 Payment module (https://www.checkout.com)
 *
 * Copyright (c) 2017 Checkout.com (https://www.checkout.com)
 * Author: David Fiaty | integration@checkout.com
 *
 * MIT License
 */

namespace CheckoutCom\Magento2\Observer\Backend;

use Magento\Backend\Model\Auth\Session;
use Magento\Framework\Event\ObserverInterface; 
use Magento\Framework\Event\Observer;

class OrderSaveAfter implements ObserverInterface { 
 
    /**
     * @var Session
     */
    protected $backendAuthSession;

    /**
     * OrderSaveBefore constructor.
     */
    public function __construct(Session $backendAuthSession) { 
        $this->backendAuthSession = $backendAuthSession;
    }
 
    /**
     * Observer execute function.
     */
    public function execute(Observer $observer) { 
        if ($this->backendAuthSession->isLoggedIn()) {
            // Get the order
            $order = $observer->getEvent()->getOrder();

            // todo - Retrieve the response and place the order
        }
    }
}