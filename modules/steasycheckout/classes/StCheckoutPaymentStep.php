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
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;

class StCheckoutPaymentStep extends StAbstractCheckoutStep
{
    protected $template = 'module:steasycheckout/views/templates/hook/steps/payment.tpl';
    public $selected_payment_option;
    public $selected_payment_module;
    private $payment_options;
    private $is_free;

    public $selected_payment_name;
    public $selected_payment_subtitle;
    public $selected_payment_confirming;


    public function __construct(
        Context $context,
        TranslatorInterface $translator,
        StEasyCheckout $module,
        StPaymentOptionsFinder $paymentOptionsFinder,
        ConditionsToApproveFinder $conditionsToApproveFinder
    ) {
        parent::__construct($context, $translator, $module);
        $this->paymentOptionsFinder = $paymentOptionsFinder;
        $this->conditionsToApproveFinder = $conditionsToApproveFinder;
    }
    public function getDataToPersist()
    {
        return array(
            'selected_payment_option' => $this->selected_payment_option,
            'selected_payment_module' => $this->selected_payment_module,
            'selected_payment_name' => $this->selected_payment_name,
            'selected_payment_subtitle' => $this->selected_payment_subtitle,
            'selected_payment_confirming' => $this->selected_payment_confirming
        );
    }

    public function restorePersistedData(array $data)
    {
        if (array_key_exists('selected_payment_option', $data)) {
            $this->selected_payment_option = $data['selected_payment_option'];
        }
        if (array_key_exists('selected_payment_module', $data)) {
            $this->selected_payment_module = $data['selected_payment_module'];
        }
        if (array_key_exists('selected_payment_name', $data)) {
            $this->selected_payment_name = $data['selected_payment_name'];
        }
        if (array_key_exists('selected_payment_subtitle', $data)) {
            $this->selected_payment_subtitle = $data['selected_payment_subtitle'];
        }
        
        if (array_key_exists('selected_payment_confirming', $data)) {
            $this->selected_payment_confirming = $data['selected_payment_confirming'];
        }

        return $this;
    }
    public function handleRequest(array $requestParams = array())
    {
        $allProductsInStock = $this->getCheckoutSession()->getCart()->isAllProductsInStock();

        if ($allProductsInStock !== true) {
            $cartShowUrl = $this->context->link->getPageLink(
                'cart',
                null,
                $this->context->language->id,
                array(
                    'action' => 'show'
                ),
                false,
                null,
                false
            );
            Tools::redirect($cartShowUrl);
        }

        if (isset($requestParams['select_payment_option']) && isset($requestParams['select_payment_module'])) {
            $this->selected_payment_option = $requestParams['select_payment_option'];
            $this->selected_payment_module = $requestParams['select_payment_module'];
        }

        $this->is_free = 0 == (float) $this->getCheckoutSession()->getCart()->getOrderTotal(true, Cart::BOTH);
        // $this->payment_options = $this->paymentOptionsFinder->present($this->is_free);
        $this->payment_options = $this->stGetPaymentOptions();
        $default_payment_method = Configuration::get($this->_prefix_st.'DEFAULT_PAYMENT_METHOD');

        $is_selected_payment_option_validate = false;
        $temp_selected_payment_option = false;
        $temp_selected_payment_module = false;

        foreach ($this->payment_options as $pk=>$module_options) {
            foreach ($module_options as $ok=>$option) {

                if ( !$option['module_name'] ) $option['module_name'] = $pk;

                if(!$temp_selected_payment_option && $option['module_name']==$default_payment_method){
                    $temp_selected_payment_option = $option['id'];
                    $temp_selected_payment_module = $option['module_name'];
                }
                if($option['id']==$this->selected_payment_option && $option['module_name']==$this->selected_payment_module)
                    $is_selected_payment_option_validate = true;
            }
        }
        if(!$is_selected_payment_option_validate && $temp_selected_payment_option && $temp_selected_payment_module){
            $this->selected_payment_option = $temp_selected_payment_option;
            $this->selected_payment_module = $temp_selected_payment_module;
        }

        $this->getAdditionalPaymentInfo();
        
        $this->setTitle(
            $this->module->l('Payment', 'StCheckoutPaymentStep')
        );
    }

    /**
     * @param array $extraParams
     * @return string
     */
    public function render(array $extraParams = array())
    {
        $this->payment_options = $this->stGetPaymentOptions();
        $this->getAdditionalPaymentInfo();

        // $conditionsToApprove = $this->conditionsToApproveFinder->getConditionsToApproveForTemplate();
        $deliveryOptions = $this->getCheckoutSession()->getDeliveryOptions();
        $deliveryOptionKey = $this->getCheckoutSession()->getSelectedDeliveryOption();

        if (isset($deliveryOptions[$deliveryOptionKey])) {
            $selectedDeliveryOption = $deliveryOptions[$deliveryOptionKey];
        } else {
            $selectedDeliveryOption = 0;
        }
        unset($selectedDeliveryOption['product_list']);

        $assignedVars = array(
            'is_free' => $this->is_free,
            'payment_options' => $this->payment_options,
            // 'conditions_to_approve' => $conditionsToApprove,
            'selected_payment_option' => $this->selected_payment_option,
            'selected_delivery_option' => $selectedDeliveryOption,
            // 'show_final_summary' => Configuration::get('PS_FINAL_SUMMARY_ENABLED'),
            // 'terms_conditions_checked' => Configuration::get($this->_prefix_st.'TERMS_CONDITIONS_CHECKED'),
            'step_number' => Configuration::get($this->_prefix_st.'PAYMENT_BLOCK'),      
        );

        return $this->renderTemplate($this->getTemplate(), $extraParams, $assignedVars);
    }
    public function stGetPaymentOptions(){
        $payment_options = $this->paymentOptionsFinder->present($this->is_free);

        foreach ($payment_options as $pk=>$module_options) {
            foreach ($module_options as $ok=>$option) {

                if ( !$option['module_name'] ) $payment_options[$pk][$ok]['module_name'] = $pk;
            }
        }

        return $payment_options;
    }


    protected function getAdditionalPaymentInfo() {
        $priceFormatter = new PriceFormatter();

        foreach ($this->payment_options as $pk=>$module_options) {
            foreach ($module_options as $ok=>$option) {
                $module_name = $option['module_name'] ?: $pk;
                if ($module_name=='paypal') {
                    $method_active = Configuration::get('PAYPAL_METHOD');
                    if($method_active=="EC" && Configuration::get('PAYPAL_API_CARD') && strpos($option['action'], 'credit_card=1')!==false)
                        $module_name = 'api_card';
                }
                if ($logo = Configuration::get($this->_prefix_st.'PAYMENT_METHOD_LOGO_'.Tools::strtoupper($module_name))) {
                    $this->module->fetchMediaServer($logo);
                    $this->payment_options[$pk][$ok]['logo'] = $logo;
                }
                if ($title = Configuration::get($this->_prefix_st.'PAYMENT_METHOD_TITLE_'.Tools::strtoupper($module_name),$this->context->language->id)) {
                    $this->payment_options[$pk][$ok]['call_to_action_text'] = $title;
                }
                if ($subtitle = Configuration::get($this->_prefix_st.'PAYMENT_METHOD_SUBTITLE_'.Tools::strtoupper($module_name),$this->context->language->id)) {
                    $this->payment_options[$pk][$ok]['subtitle'] = $subtitle;
                }
                
               if ($confirming = Configuration::get($this->_prefix_st.'PAYMENT_METHOD_CONFIRMING_'.Tools::strtoupper($module_name),$this->context->language->id)) {
                    $this->payment_options[$pk][$ok]['confirming'] = $confirming;
                }

                /*
                    iWeb - 2018-12-29
                */
                if ( $option['id'] == $this->selected_payment_option && $option['module_name'] == $this->selected_payment_module ) {
                    $this->selected_payment_name = $this->payment_options[$pk][$ok]['call_to_action_text'];
                    $this->selected_payment_subtitle = !empty($this->payment_options[$pk][$ok]['subtitle']) ? $this->payment_options[$pk][$ok]['subtitle'] : '';
                    $this->selected_payment_confirming = !empty($this->payment_options[$pk][$ok]['confirming']) ? $this->payment_options[$pk][$ok]['confirming'] : '';
             
                }

                $payment = 0;

                if ( $option['module_name'] == 'cashondeliverywithfeeextra' ) {
                    $module = \Module::getInstanceByName('cashondeliverywithfeeextra');
                    $payment = $module->getCashOnDeliveryFee($this->getCheckoutSession()->getCart());
                }


                $this->payment_options[$pk][$ok]['payment'] = $priceFormatter->convertAndFormat($payment);
            }
        }
    }
}
