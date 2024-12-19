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

class StCheckoutAddressesStep extends StAbstractCheckoutStep
{
    protected $template = 'module:steasycheckout/views/templates/hook/steps/addresses.tpl';

    private $addressForm;
    private $addressFormInvoice;
    private $use_same_address = true;
    private $show_delivery_address_form = false;
    private $show_invoice_address_form = false;
    private $form_has_continue_button = false;
    public $is_address_saved = false;

    public function __construct(
        Context $context,
        TranslatorInterface $translator,
        StEasyCheckout $module,
        CustomerAddressForm $addressForm,
        CustomerAddressForm $addressFormInvoice
    ) {
        parent::__construct($context, $translator, $module);
        $this->addressForm = $addressForm;
        $this->addressFormInvoice = $addressFormInvoice;

        /*
            iWeb - 2018-01-03
        */
        $this->addressForm->getFormatter()->addFakeEmail();
    }

    public function setAddressForm(CustomerAddressForm $addressForm)
    {
        $this->addressForm = $addressForm;

        /*
            iWeb - 2018-01-03
        */
        $this->addressForm->getFormatter()->addFakeEmail();
    }
    public function getDataToPersist()
    {
        return array(
            'use_same_address' => $this->use_same_address,
        );
    }

    public function restorePersistedData(array $data)
    {
        if (array_key_exists('use_same_address', $data)) {
            $this->use_same_address = $data['use_same_address'];
        }

        return $this;
    }

    public function handleRequest(array $requestParams = array())
    {
        $this->addressForm->setAction($this->getCheckoutSession()->getCheckoutURL());
        $this->addressFormInvoice->setAction($this->getCheckoutSession()->getCheckoutURL());

        $this->use_same_address = array_key_exists('use_same_address', $requestParams);

        //virtual
        if (!$this->use_same_address && !isset($requestParams['id_address_invoice']))
            $this->use_same_address = true;

        if (isset($requestParams['id_address_delivery'])) {
            $id_address = $requestParams['id_address_delivery'];

            if ($this->getCheckoutSession()->getIdAddressDelivery() != $id_address) {
                $this->setCurrent(true);
                $this->getCheckoutProcess()->invalidateAllStepsAfterCurrent();
            }

            $this->getCheckoutSession()->setIdAddressDelivery($id_address);
            if ($this->use_same_address) {
                $this->getCheckoutSession()->setIdAddressInvoice($id_address);
            }
        }


        if (!$this->use_same_address && isset($requestParams['id_address_invoice'])) {//st
            $id_address = $requestParams['id_address_invoice'];
            $this->getCheckoutSession()->setIdAddressInvoice($id_address);
        }


        if (isset($requestParams['cancelAddress'])) {
            if ($requestParams['cancelAddress'] === 'invoice') {
                if ($this->getCheckoutSession()->getCustomerAddressesCount() < 2) {
                    $this->use_same_address = true;
                }
            }
            $this->step_is_current = true;
        }

        // Can't really hurt to set the firstname and lastname.
        $this->addressForm->fillWith(array(
            'firstname' => $this->getCheckoutSession()->getCustomer()->firstname,
            'lastname' => $this->getCheckoutSession()->getCustomer()->lastname,
        ));

        if (isset($requestParams['saveAddress'])) {
            // if(!isset($requestParams['id_customer']) || !$requestParams['id_customer']){
            // }
            $requestParams['id_customer'] = $this->getCheckoutSession()->getCustomer()->id;
            $requestParams['token'] = Tools::getToken(true, $this->context);//XSS //context verified 
            //

            $addressForm = $requestParams['saveAddress'] == 'invoice' ? $this->addressFormInvoice : $this->addressForm;

            $saved = $addressForm->fillWith($requestParams)->submit();
            // if(in_array('invoice', $requestParams['use_as_delivery_invoice'])){

            //     $addressForm->fillWith($requestParams);
            //     echo '<pre>';
            //     print_r($addressForm->validate());
            //     echo '</pre>';
            //     echo '<pre>';
            //     print_r($addressForm->getErrors());
            //     echo '</pre>';
            //     print_r($requestParams);
            //     var_dump($saved);
            //     die;
            // }

            if (!$saved) {
                $this->is_address_saved=0;
                $this->step_is_current = true;
                $this->getCheckoutProcess()->setHasErrors(true);
                $this->show_delivery_address_form = isset($requestParams['use_as_delivery_invoice']) && in_array('delivery', $requestParams['use_as_delivery_invoice']);
                $this->show_invoice_address_form = isset($requestParams['use_as_delivery_invoice']) && in_array('invoice', $requestParams['use_as_delivery_invoice']);
            } else {
                $this->is_address_saved=1;
                $id_address = $addressForm->getAddress()->id;

                $addresses_count = $this->getCheckoutSession()->getCustomerAddressesCount();

                if((isset($requestParams['use_as_delivery_invoice']) && in_array('delivery', $requestParams['use_as_delivery_invoice'])) || $addresses_count==1) {
                    $this->getCheckoutSession()->setIdAddressDelivery($id_address);
                }
                if((isset($requestParams['use_as_delivery_invoice']) && in_array('invoice', $requestParams['use_as_delivery_invoice'])) || $addresses_count==1) {
                    $this->getCheckoutSession()->setIdAddressInvoice($id_address);
                }
                
            }
        } elseif (isset($requestParams['newAddress'])) {
            // while a form is open, do not go to next step
            $this->step_is_current = true;
            $this->show_delivery_address_form = true;
            $this->show_invoice_address_form = true;

            $this->addressForm->fillWith($requestParams);
            // $this->form_has_continue_button = $this->use_same_address;
        } elseif (isset($requestParams['editAddress'])) {
            // while a form is open, do not go to next step
            $this->step_is_current = true;

            $this->show_delivery_address_form = false;
            $this->show_invoice_address_form = false;
            $idAddressDelivery = (int)$this->getCheckoutSession()->getIdAddressDelivery();
            $idAddressInvoice  = (int)$this->getCheckoutSession()->getIdAddressInvoice();
            // if ($idAddressDelivery==$requestParams['id_address']) {
            //     $this->show_delivery_address_form = true;
            // }
            // if ($idAddressInvoice==$requestParams['id_address']) {
            //     $this->show_invoice_address_form = true;
            // }

            if ( $requestParams['editAddress'] == 'delivery' ) {
                $this->show_delivery_address_form = true;
            }
            if ( $requestParams['editAddress'] == 'invoice' ) {
                $this->show_invoice_address_form = true;
            }
            $this->addressForm->loadAddressById($requestParams['id_address']);
            $this->addressFormInvoice->loadAddressById($requestParams['id_address']);

        } elseif (isset($requestParams['deleteAddress'])) {
            $addressPersister = new CustomerAddressPersister(
                $this->context->customer,
                $this->context->cart,
                Tools::getToken(true, $this->context)
            );

            $deletionResult = (bool)$addressPersister->delete(
                new Address((int) Tools::getValue('id_address'), $this->context->language->id),
                Tools::getValue('token')
            );
            if ($deletionResult) {
                /*$this->context->controller->success[] = $this->module->l('Address successfully deleted!', 'StCheckoutAddressesStep');
                $this->context->controller->redirectWithNotifications(
                    $this->getCheckoutSession()->getCheckoutURL()
                );*/
            } else {
                $this->getCheckoutProcess()->setHasErrors(true);
                $this->errors[] = $this->module->l('Could not delete this address.', 'StCheckoutAddressesStep');
            }
        }


        if (!$this->step_is_complete) {
            $idAddressDelivery = (int)$this->getCheckoutSession()->getIdAddressDelivery();
            $idAddressInvoice  = (int)$this->getCheckoutSession()->getIdAddressInvoice();

            $this->step_is_complete = $idAddressDelivery && $idAddressInvoice;
            $warnings         = $this->context->controller->checkoutWarning;
            $invalidAddresses = isset($warnings['invalid_addresses'])
                ? $warnings['invalid_addresses']
                : array();

            if (in_array($idAddressDelivery, $invalidAddresses)) {
                $this->step_is_complete = false;
            }

            if (in_array($idAddressInvoice, $invalidAddresses)) {
                $this->step_is_complete = false;
            }
        }

        $addresses_count = $this->getCheckoutSession()->getCustomerAddressesCount();

        if ($addresses_count === 0) {
            $this->show_delivery_address_form = true;
            $this->show_invoice_address_form = true;
        }

        if($this->getCheckoutSession()->getCustomer()->isGuest() && $addresses_count){
            $idAddressDelivery = (int)$this->getCheckoutSession()->getIdAddressDelivery();
            $idAddressInvoice  = (int)$this->getCheckoutSession()->getIdAddressInvoice();
            
            $this->addressForm->loadAddressById($idAddressDelivery);
            $this->addressFormInvoice->loadAddressById($idAddressInvoice);

            $this->show_delivery_address_form = true;

            if ( $idAddressDelivery != $idAddressInvoice ) $this->show_invoice_address_form = true;
        }
        /*elseif ($addresses_count < 2 && !$this->use_same_address) {
            $this->show_invoice_address_form = true;
            $this->step_is_complete = false;
        }*/

        /*if ($this->show_invoice_address_form) {
            // show continue button because form is at the end of the step
            $this->form_has_continue_button = true;
        } elseif ($this->show_delivery_address_form) {
            // only show continue button if we're sure
            // our form is at the bottom of the step
            if ($this->use_same_address || $addresses_count < 2) {
                $this->form_has_continue_button = true;
            }
        }*/

        $this->setTitle($this->module->l('Addresses', 'StCheckoutAddressesStep'));

        return $this;
    }

    public function getTemplateParameters()
    {
        $idAddressDelivery = (int)$this->getCheckoutSession()->getIdAddressDelivery();
        $idAddressInvoice  = (int)$this->getCheckoutSession()->getIdAddressInvoice();

        $postcode = $this->addressForm->getField('postcode');
        if($postcode){
            $postcode->addAvailableValue('comment', sprintf($this->module->l('Postcode should look like %s', 'StCheckoutAddressesStep'), '<span class="postcode_format" data-iso_code="'.$this->addressForm->getFormatter()->getCountry()->iso_code.'">'.$this->addressForm->getFormatter()->getCountry()->zip_code_format.'</span>'));
        }
        $postcode = $this->addressFormInvoice->getField('postcode');
        if($postcode){
            $postcode->addAvailableValue('comment', sprintf($this->module->l('Postcode should look like %s', 'StCheckoutAddressesStep'), '<span class="postcode_format" data-iso_code="'.$this->addressFormInvoice->getFormatter()->getCountry()->iso_code.'">'.$this->addressFormInvoice->getFormatter()->getCountry()->zip_code_format.'</span>'));
        }

        $params = array(
            'address_form'               => $this->addressForm->getProxy(),
            'address_form_invoice'       => $this->addressFormInvoice->getProxy(),
            'use_same_address'           => $idAddressDelivery == $idAddressInvoice,
            /*'use_different_address_url'  => $this->context->link->getPageLink(
                'order',
                true,
                null,
                array('use_same_address' => 0)
            ),*/
            'new_address_delivery_url'   => $this->context->link->getModuleLink(
                'steasycheckout',
                'default',
                array('action' => 'addresses', 'newAddress' => 'delivery')
            ),
            'new_address_invoice_url'    => $this->context->link->getModuleLink(
                'steasycheckout',
                'default',
                array('action' => 'addresses', 'newAddress' => 'invoice')
            ),
            'id_address_delivery'        => $idAddressDelivery,
            'id_address_invoice'         => $idAddressInvoice,
            'show_delivery_address_form' => $this->show_delivery_address_form,
            'show_invoice_address_form'  => $this->show_invoice_address_form,
            'form_has_continue_button'   => $this->form_has_continue_button,
            'addresses_count' => $this->getCheckoutSession()->getCustomerAddressesCount(),

            /*
                iWeb - 2018-12-30
            */
            'cart_info' => $this->getCheckoutSession()->getInvaoiceAndCompany()
        );

        if($this->getCheckoutSession()->getCustomer()->isGuest() && $this->getCheckoutSession()->getCustomerAddressesCount()){
            if($idAddressDelivery == $idAddressInvoice)
                $this->addressFormInvoice->setValue('id_address', "");
            $params['address_form_invoice'] = $this->addressFormInvoice->getProxy();
        }
        
        /** @var OrderControllerCore $controller */
        $controller = $this->context->controller;
        
        if (isset($controller)) {
            $warnings         = $controller->checkoutWarning;
            $addressWarning   = isset($warnings['address'])
                ? $warnings['address']
                : false;
            $invalidAddresses = isset($warnings['invalid_addresses'])
                ? $warnings['invalid_addresses']
                : array();

            $errors = array();
            if (in_array($idAddressDelivery, $invalidAddresses)) {
                $errors['delivery_address_error'] = $addressWarning;
            }

            if (in_array($idAddressInvoice, $invalidAddresses)) {
                $errors['invoice_address_error'] = $addressWarning;
            }

            /*if ($this->show_invoice_address_form
                || $idAddressInvoice != $idAddressDelivery
                || !empty($errors['invoice_address_error'])
            ) {
                $this->use_same_address = false;
            }*/

            // Add specific parameters
            $params = array_replace(
                $params,
                array(
                    'not_valid_addresses' => $invalidAddresses,
                    // 'use_same_address'    => $this->use_same_address,
                ),
                $errors
            );
        }

        return $params;
    }

    public function render(array $extraParams = array())
    {
        return $this->renderTemplate(
            $this->getTemplate(),
            $extraParams,
            $this->getTemplateParameters()
        );
    }
}
