<?php
/**
 * Checkout.com Magento 2 Payment module (https://www.checkout.com)
 *
 * Copyright (c) 2017 Checkout.com (https://www.checkout.com)
 * Author: David Fiaty | integration@checkout.com
 *
 * License GNU/GPL V3 https://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace CheckoutCom\Magento2\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use CheckoutCom\Magento2\Model\Service\OrderHandlerService;
use CheckoutCom\Magento2\Model\Ui\ConfigProvider;

class OrderCancelObserver implements ObserverInterface {

    /**
     * @var OrderHandlerService
     */
    protected $orderService;

    public function __construct(OrderHandlerService $orderService) {
        $this->orderService = $orderService;    
    }

    /**
     * Handles the observer for order cancellation.
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer) {

        // Get the order
        $order = $observer->getEvent()->getOrder();

        // Get the payment method
        $paymentMethod = $order->getPayment()->getMethod();

        // Test the current method used
        if ($paymentMethod == ConfigProvider::CODE || $paymentMethod == ConfigProvider::CC_VAULT_CODE || $paymentMethod == ConfigProvider::THREE_DS_CODE) {

            // Update the hub API for cancelled order
            $this->orderService->cancelTransactionToRemote($order);    
        }

        return $this;
    }
}
