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


use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;

class StCheckoutDeliveryStep extends StAbstractCheckoutStep
{
    protected $template = 'module:steasycheckout/views/templates/hook/steps/shipping.tpl';

    private $recyclablePackAllowed = false;
    private $giftAllowed = false;
    private $giftCost = 0;
    private $includeTaxes = false;
    private $displayTaxesLabel = false;


    /*
        iWeb - paczkomaty - 2020-02-29
    */
    protected $selected_paczkomat;


    public function getDataToPersist()
    {
        return array(
            'selected_paczkomat' => $this->selected_paczkomat,
        );
    }

    public function restorePersistedData(array $data)
    {
        if (array_key_exists('selected_paczkomat', $data)) {
            $this->selected_paczkomat = $data['selected_paczkomat'];
        }

        return $this;
    }



    public function setRecyclablePackAllowed($recyclablePackAllowed)
    {
        $this->recyclablePackAllowed = $recyclablePackAllowed;

        return $this;
    }

    public function isRecyclablePackAllowed()
    {
        return $this->recyclablePackAllowed;
    }

    public function setGiftAllowed($giftAllowed)
    {
        $this->giftAllowed = $giftAllowed;

        return $this;
    }

    public function isGiftAllowed()
    {
        return $this->giftAllowed;
    }

    public function setGiftCost($giftCost)
    {
        $this->giftCost = $giftCost;

        return $this;
    }

    public function getGiftCost()
    {
        return $this->giftCost;
    }

    public function setIncludeTaxes($includeTaxes)
    {
        $this->includeTaxes = $includeTaxes;

        return $this;
    }

    public function getIncludeTaxes()
    {
        return $this->includeTaxes;
    }

    public function setDisplayTaxesLabel($displayTaxesLabel)
    {
        $this->displayTaxesLabel = $displayTaxesLabel;

        return $this;
    }

    public function getDisplayTaxesLabel()
    {
        return $this->displayTaxesLabel;
    }

    public function getGiftCostForLabel()
    {
        if ($this->getGiftCost() != 0) {
            $taxLabel = '';
            $priceFormatter = new PriceFormatter();

            if ($this->getIncludeTaxes() && $this->getDisplayTaxesLabel()) {
                $taxLabel .= ' tax incl.';
            } elseif ($this->getDisplayTaxesLabel()) {
                $taxLabel .= ' tax excl.';
            }
            return sprintf($this->module->l('%s', 'StCheckoutDeliveryStep'), $priceFormatter->convertAndFormat($this->getGiftCost()), $taxLabel);
        }

        return '';
    }

    public function handleRequest(array $requestParams = array())
    {
        if (isset($requestParams['delivery_option'])) {
            $this->getCheckoutSession()->setDeliveryOption(
                $requestParams['delivery_option']
            );

            /*
                iWeb - 2019-02-27
            */
            $this->getCheckoutSession()->setDelivery((int)current($requestParams['delivery_option']));

            $this->getCheckoutSession()->setRecyclable(
                isset($requestParams['recyclable']) ? $requestParams['recyclable'] : false
            );
            $this->getCheckoutSession()->setGift(
                isset($requestParams['gift']) ? $requestParams['gift'] : false,
                (isset($requestParams['gift']) && isset($requestParams['gift_message'])) ? $requestParams['gift_message'] : ''
            );
        }else{
            //zai cuo wu de di zhi qie huan delivery, if don't update delivery, the worng delivery will be remembered.
            if(!$this->getCheckoutSession()->getCustomerSelectedDeliveryOption()){
                $id_address = $this->getCheckoutSession()->getIdAddressDelivery();
                $delivery_option = $this->getCheckoutSession()->getSelectedDeliveryOption();
                if($delivery_option){//removing $id_address is a temporaray solution to force to have a selected option
                    $default_delivery_option = array();
                    $default_delivery_option[$id_address] = $delivery_option;
                    $this->getCheckoutSession()->setDeliveryOption($default_delivery_option);
                }
            }
        }
        //st set default carrier
        /*if (Validate::isLoadedObject($this->context->cart)) {
            $carrier = new Carrier($this->context->cart->id_carrier);
            if (!Validate::isLoadedObject($carrier)) {
                $id_address = $this->getCheckoutSession()->getIdAddressDelivery();
                $delivery_option = $this->getCheckoutSession()->getSelectedDeliveryOption();
                if($id_address && $delivery_option){
                    $default_delivery_option = array();
                    $default_delivery_option[$id_address] = $delivery_option;
                    $this->getCheckoutSession()->setDeliveryOption($default_delivery_option);
                }
            }
        }*/

        if (isset($requestParams['delivery_message'])) {
            $this->getCheckoutSession()->setMessage($requestParams['delivery_message']);
        }
        // if ($this->step_is_reachable && isset($requestParams['confirmDeliveryOption'])) {
            // we're done if
            // - the step was reached (= all previous steps complete)
            // - user has clicked on "continue"
            // - there are delivery options
            // - the is a selected delivery option
            // - the module associated to the delivery option confirms
            // $deliveryOptions = $this->getCheckoutSession()->getDeliveryOptions();
            $deliveryOptions = $this->stGetDeliveryOptions((isset($requestParams['id_country']) ? $requestParams['id_country'] : false));
            $this->step_is_complete =
                !empty($deliveryOptions) && $this->getCheckoutSession()->getSelectedDeliveryOption() && $this->isModuleComplete($requestParams, $deliveryOptions)
            ;
        // }


        /*
            iWeb - paczkomaty - 2020-02-29
        */
        if ( isset($requestParams['selected_paczkomat']) ) {
            $this->selected_paczkomat = $requestParams['selected_paczkomat'];
        }

        $this->setTitle($this->module->l('Shipping Method', 'StCheckoutDeliveryStep'));

        Hook::exec('actionCarrierProcess', array('cart' => $this->getCheckoutSession()->getCart()));
    }

    public function render(array $extraParams = array())
    {
        $delivery_options = $this->stGetDeliveryOptions();
        foreach ($delivery_options as &$carrier) {
            if ($logo = Configuration::get($this->_prefix_st.'CARRIER_LOGO_'.$carrier['id_reference'])) {
                $this->module->fetchMediaServer($logo);
                $carrier['logo'] = $logo;
            }
        }
        return $this->renderTemplate(
            $this->getTemplate(),
            $extraParams,
            array(
                'hookDisplayBeforeCarrier' => Hook::exec('displayBeforeCarrier', array('cart' => $this->getCheckoutSession()->getCart())),
                'hookDisplayAfterCarrier' => Hook::exec('displayAfterCarrier', array('cart' => $this->getCheckoutSession()->getCart())),
                'id_address' => $this->getCheckoutSession()->getIdAddressDelivery(),
                'delivery_options' => $delivery_options,
                'delivery_option' => $this->getCheckoutSession()->getSelectedDeliveryOption(),
                'recyclable' => $this->getCheckoutSession()->isRecyclable(),
                'recyclablePackAllowed' => $this->isRecyclablePackAllowed(),
                'gift' => array(
                    'allowed' => $this->isGiftAllowed(),
                    'isGift' => $this->getCheckoutSession()->getGift()['isGift'],
                    'label' => sprintf($this->module->l(
                    '%s', 'StCheckoutDeliveryStep'), $this->getGiftCostForLabel()),
                    'message' => $this->getCheckoutSession()->getGift()['message'],
                ),
                'step_number' => Configuration::get($this->_prefix_st.'DELIVERY_BLOCK'),    
                'delivery_message' => $this->getCheckoutSession()->getMessage(),  

                /*
                    iWeb - paczkomaty - 2020-02-29
                */
                'selected_paczkomat' => $this->selected_paczkomat
            )
        );
    }

    protected function isModuleComplete($requestParams, $deliveryOptions)
    {
        $currentDeliveryOption = $deliveryOptions[$this->getCheckoutSession()->getSelectedDeliveryOption()];
        if (!$currentDeliveryOption['is_module']) {
            return true;
        }

        $isComplete = true;
        Hook::exec(
            'actionValidateStepComplete',
            array(
                'step_name' => 'delivery',
                'request_params' => $requestParams,
                'completed' => &$isComplete,
            ),
            Module::getModuleIdByName($currentDeliveryOption['external_module_name']));
        return $isComplete;
    }
    public function stGetDeliveryOptions(){
        $delivery_options = $this->getCheckoutSession()->getDeliveryOptions();
        $this->checkTheDefaultDeliveryOptions($delivery_options);

        /*
            iWeb - 2019-02-01
        */
        foreach ($delivery_options as &$row) {
            // if ( (float)$row['price'] > 0) {
            //     $cart = $this->context->smarty->getTemplateVars('cart');
            //     if ( isset($cart['weight']) && $cart['weight'] > 30 ) {
            //         $factor = ceil($cart['weight'] / 30);

            //         $priceFormatter = new PriceFormatter();
            //         $row['price'] = $factor . ' x ' . $priceFormatter->convertAndFormat((float)str_replace(',', '.', $row['price']) / $factor);
            //     }
            // }

            /*
                2020-02-16
            */
            $row['paczkomat'] = Configuration::get($this->_prefix_st.'CARRIER_PACZKOMAT_'.$row['id_reference']);
        }

        return $delivery_options;
    }
    public function checkTheDefaultDeliveryOptions($delivery_options){
        if(!count($delivery_options))
            $this->getCheckoutSession()->setDeliveryOption(null);
        else{
            $delivery_option = $this->getCheckoutSession()->getSelectedDeliveryOption();
            if(!array_key_exists($delivery_option, $delivery_options))
            {
                $id_address = $this->getCheckoutSession()->getIdAddressDelivery();
                foreach ($delivery_options as $k => $v) {
                    $default_delivery_option = array();
                    $default_delivery_option[$id_address] = $k;
                    $this->getCheckoutSession()->setDeliveryOption($default_delivery_option);
                    break;
                }
            }
        }
    }
}
