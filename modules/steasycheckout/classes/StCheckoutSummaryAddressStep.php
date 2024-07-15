<?php
/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */


use Symfony\Component\Translation\TranslatorInterface;

class StCheckoutSummaryAddressStep extends StAbstractCheckoutStep
{
    protected $template = 'module:steasycheckout/views/templates/hook/steps/summary-address.tpl';

    protected $selected_payment_name;
    protected $selected_payment_subtitle;

    private $is_free;


    /*
        iWeb - paczkomaty - 2020-02-29
    */
    protected $selected_paczkomat;

    public function __construct(
        Context $context,
        TranslatorInterface $translator,
        StEasyCheckout $module,
        StPaymentOptionsFinder $paymentOptionsFinder
    ) {
        parent::__construct($context, $translator, $module);

        $this->paymentOptionsFinder = $paymentOptionsFinder;
    }


    public function handleRequest(array $requestParams = array()) {

        $this->is_free = 0 == (float) $this->getCheckoutSession()->getCart()->getOrderTotal(true, Cart::BOTH);
        
        $this->setTitle(
            $this->module->l('Summary Address', 'StCheckoutSummaryStep')
        );
    }


    public function render(array $extraParams = array()) {
        $delivery_options = $this->getCheckoutSession()->getDeliveryOptions();
        $delivery_option = $this->getCheckoutSession()->getSelectedDeliveryOption();

        /*
            2019-02-27
        */
        $id_carrier = $this->getCheckoutSession()->getDelivery();
        if ( $id_carrier && $delivery_option != $id_carrier ) {
            $this->getCheckoutSession()->setDeliveryOption(
                array((int)$this->getCheckoutSession()->getIdAddressDelivery() => $id_carrier . ',')
            );

            $delivery_option = $this->getCheckoutSession()->getSelectedDeliveryOption();
        }

            

        $assignedVars = array(
            'delivery_option' => !empty($delivery_options[$delivery_option]) ? $delivery_options[$delivery_option] : false,
            'selected_payment_name' => $this->selected_payment_name,
            'cart_info' => $this->getCheckoutSession()->getInvaoiceAndCompany(),
            'selected_paczkomat' => $this->selected_paczkomat
        );


        return $this->renderTemplate($this->getTemplate(), $extraParams, $assignedVars);
    }


    public function restorePersistedData(array $data, array $all_data = array()) {
        if (array_key_exists('selected_payment_name', $all_data['st-checkout-payment-step'])) {
            $this->selected_payment_name = $all_data['st-checkout-payment-step']['selected_payment_name'];
        }

        if (array_key_exists('selected_payment_subtitle', $all_data['st-checkout-payment-step'])) {
            $this->selected_payment_subtitle = $all_data['st-checkout-payment-step']['selected_payment_subtitle'];
        }
        

        /*
            iWeb - paczkomaty - 2020-02-29
        */
        if (array_key_exists('selected_paczkomat', $all_data['st-checkout-delivery-step'])) {
            $this->selected_paczkomat = $all_data['st-checkout-delivery-step']['selected_paczkomat'];
        }

        return $this;
    }


}
