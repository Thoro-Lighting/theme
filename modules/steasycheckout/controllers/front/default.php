<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
use PrestaShop\PrestaShop\Core\Foundation\Templating\RenderableProxy;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutProcess.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StDeliveryOptionsFinder.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StPaymentOptionsFinder.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutSession.php';
//
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutStepInterface.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StAbstractCheckoutStep.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutPersonalInformationStep.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutAddressesStep.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutDeliveryStep.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutPaymentStep.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutSummaryStep.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutSummaryAddressStep.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StCheckoutCartStep.php';
require_once _PS_MODULE_DIR_.'steasycheckout/classes/StAddressValidator.php';
if(!class_exists('CustomerAddress'))
    require_once _PS_MODULE_DIR_.'steasycheckout/classes/CustomerAddress.php';

class StEasyCheckoutDefaultModuleFrontController extends ModuleFrontController
{
    public $_prefix_st = 'STECO_';
    /**
     * @var CheckoutProcess
     */
    protected $checkoutProcess;
    protected $result = array();
    public $checkoutWarning = false;
    public $stepsMap = array(
        'personal_information' => 1,
        'addresses' => 1,
        'delivery' => 4,
        'payment' => 8,
        'cart' => 16,
        'summary' => 16,
        'summary_address' => 16,
    );

    /**
     * @var CartChecksum
     */
    protected $cartChecksum;

    public function init()
    {
        if(Configuration::get($this->_prefix_st.'DISABLE'))
            return Tools::redirect($this->context->link->getPageLink('order'));
        parent::init();
        if (Tools::isSubmit('steco_logout')) {
            $this->context->customer->logout();
            $display_logout = Configuration::get($this->_prefix_st.'DISPLAY_LOGOUT');
            if($display_logout==2)
                Tools::redirect($this->context->link->getPageLink('authentication', $this->ssl));
            elseif($display_logout==1)
                Tools::redirect($this->context->link->getPageLink('index', $this->ssl));
        }
        $this->cartChecksum = new CartChecksum(new AddressChecksum());
    }

    public function postProcess()
    {
        parent::postProcess();
        $this->bootstrap();
    }

    protected function bootstrap()
    {
        $translator = $this->getTranslator();
        $session = $this->getCheckoutSession();

        $this->checkoutProcess = new StCheckoutProcess(
            $this->context,
            $session
        );

        $this->checkoutProcess
            ->addStep(new StCheckoutPersonalInformationStep(
                $this->context,
                $translator,
                $this->module,
                $this->makeLoginForm(),
                $this->makeCustomerForm()
            ), 'personal_information')
            ->addStep(new StCheckoutAddressesStep(
                $this->context,
                $translator,
                $this->module,
                $this->makeAddressForm(),
                $this->makeAddressForm()
            ), 'addresses');

        if (!$this->context->cart->isVirtualCart()) {
            $checkoutDeliveryStep = new StCheckoutDeliveryStep(
                $this->context,
                $translator,
                $this->module
            );

            $checkoutDeliveryStep
                ->setRecyclablePackAllowed((bool) Configuration::get('PS_RECYCLABLE_PACK'))
                ->setGiftAllowed((bool) Configuration::get('PS_GIFT_WRAPPING'))
                ->setIncludeTaxes(
                    !Product::getTaxCalculationMethod((int) $this->context->cart->id_customer)
                    && (int) Configuration::get('PS_TAX')
                )
                ->setDisplayTaxesLabel((Configuration::get('PS_TAX') && !Configuration::get('AEUC_LABEL_TAX_INC_EXC')))
                ->setGiftCost(
                    $this->context->cart->getGiftWrappingPrice(
                        $checkoutDeliveryStep->getIncludeTaxes()
                    )
                );

            $this->checkoutProcess->addStep($checkoutDeliveryStep, 'delivery');
        }
        $this->checkoutProcess
            ->addStep(new StCheckoutPaymentStep(
                $this->context,
                $translator,
                $this->module,
                new StPaymentOptionsFinder(),
                new ConditionsToApproveFinder(
                    $this->context,
                    $translator
                )
            ), 'payment')
        ;
        $this->checkoutProcess
            ->addStep(new StCheckoutCartStep(
                $this->context,
                $translator,
                $this->module,
                new ConditionsToApproveFinder(
                    $this->context,
                    $translator
                )
            ), 'cart')
        ;

        $this->checkoutProcess
            ->addStep(new StCheckoutSummaryStep(
                $this->context,
                $translator,
                $this->module,
                new ConditionsToApproveFinder(
                    $this->context,
                    $translator
                )
            ), 'summary')
        ;

        $this->checkoutProcess
            ->addStep(new StCheckoutSummaryAddressStep(
                $this->context,
                $translator,
                $this->module,
                new StPaymentOptionsFinder()
            ), 'summary_address')
        ;
    }

    protected function getCheckoutSession()
    {
        $deliveryOptionsFinder = new StDeliveryOptionsFinder(
            $this->context,
            $this->getTranslator(),
            $this->objectPresenter,
            new PriceFormatter()
        );

        $session = new StCheckoutSession(
            $this->context,
            $deliveryOptionsFinder
        );

        return $session;
    }
    public function reInitAddresses(){
        $step = $this->checkoutProcess->getSteps('addresses');
        $step->setAddressForm($this->makeAddressForm());//deng lu hou, token changed.
        return true;
    }

    /**
     * Persists cart-related data in checkout session
     *
     * @param CheckoutProcess $process
     */
    protected function saveDataToPersist(StCheckoutProcess $process)
    {
        $data             = $process->getDataToPersist();
        $addressValidator = new StAddressValidator($this->context);
        $customer         = $this->context->customer;
        $cart             = $this->context->cart;

        $shouldGenerateChecksum = true;

        if ($customer->isGuest()) {
            $shouldGenerateChecksum = true;
        } else {
            $invalidAddressIds = $addressValidator->validateCartAddresses($cart);
            if (empty($invalidAddressIds)) {
                $shouldGenerateChecksum = true;
            }
        }

        $data['checksum'] = $shouldGenerateChecksum
            ? $this->cartChecksum->generateChecksum($cart)
            : null;

        Db::getInstance()->execute(
            'UPDATE ' . _DB_PREFIX_ . 'cart SET checkout_session_data = "' . pSQL(json_encode($data)) . '"
                WHERE id_cart = ' . (int)$cart->id
        );
    }

    /**
     * Restores from checkout session some previously persisted cart-related data
     *
     * @param CheckoutProcess $process
     */
    protected function restorePersistedData(StCheckoutProcess $process)
    {
        $cart     = $this->context->cart;
        $customer = $this->context->customer;
        $rawData  = Db::getInstance()->getValue(
            'SELECT checkout_session_data FROM ' . _DB_PREFIX_ . 'cart WHERE id_cart = ' . (int)$cart->id
        );
        $data     = json_decode($rawData, true);
        if (!is_array($data)) {
            $data = array();
        }

        $addressValidator  = new StAddressValidator();
        $invalidAddressIds = $addressValidator->validateCartAddresses($cart);

        // Build the currently selected address' warning message (if relevant)
        if (false && !$customer->isGuest() && !empty($invalidAddressIds)) {
            $this->checkoutWarning['address'] = array(
                'id_address' => (int)reset($invalidAddressIds),
                'exception'  => $this->l('Your address is incomplete, please update it.', 'default'),
            );

            $checksum = null;
        } else {
            $checksum = $this->cartChecksum->generateChecksum($cart);
        }

        // Prepare all other addresses' warning messages (if relevant).
        // These messages are displayed when changing the selected address.
        $allInvalidAddressIds = $addressValidator->validateCustomerAddresses($customer, $this->context->language);
        $this->checkoutWarning['invalid_addresses'] = $allInvalidAddressIds;

        /*
            iWeb - na jaką cholere jest ten checksum? tylko problemy z tego powodu są... - 2019-01-23
        */
        // if (isset($data['checksum']) && $data['checksum'] === $checksum) {
            $process->restorePersistedData($data);
        // }
    }

    protected function displayAjax(){
        $action = Tools::toCamelCase(Tools::getValue('action'), true);

        $this->restorePersistedData($this->checkoutProcess);


        if (!empty($action) && method_exists($this, 'ecoAjax'.$action)){
            $this->{'ecoAjax'.$action}();
        }

        $this->saveDataToPersist($this->checkoutProcess);

        // ob_end_clean();
        header('Content-Type: application/json');

        $this->ajaxDie(Tools::jsonEncode($this->result));

    }
    protected function handleRequest(){
        $this->checkoutProcess->handleRequest(
            Tools::getAllValues()
        );
        $this->checkoutProcess
            ->setNextStepReachable();
            // ->markCurrentStep()
            // ->invalidateAllStepsAfterCurrent();
    }
    protected function ecoAjaxUpdate(){
        $this->handleRequest();
        $items = Tools::getValue('items') ? (int)Tools::getValue('items') : 0;

        $cart = $this->cart_presenter->present($this->context->cart);
        $customer = $this->getTemplateVarCustomer();
        $steps = $this->checkoutProcess->getSteps();

        foreach ($steps as $name => $step) {
            if($items && !($this->stepsMap[$name]&$items))
                continue;
            $params = array(
                'customer' => $customer,
                'cart' => $cart,
                'token' => Tools::getToken(),
            );
            if($name=='cart'){
                $params = array_merge($params, array(
                    'selected_payment_option' => $steps['payment']->selected_payment_option,
                ));
            }
            if($this->stepsMap[$name]==2)
                $this->result['is_address_saved'] = $step->is_address_saved;
            $this->result[$name] = $step->render($params);
        }

        /*
            2021-02-03
        */
        $this->result['free_delivery_info'] = Hook::exec('displayFreeShippingInfo');

        
        //speed up
        if(Tools::getValue('final') && isset($this->result['is_address_saved']) && $this->result['is_address_saved'] && $items==0){
            unset($this->result['personal_information']);
            unset($this->result['addresses']);
            unset($this->result['delivery']);
            unset($this->result['payment']);
            unset($this->result['summary']);
            unset($this->result['summary_address']);
            unset($this->result['cart']);
        }
        $this->result['is_logged'] = $customer['is_logged'];
        $this->result['is_guest'] = $customer['is_guest'];


        // $data = json_decode(Db::getInstance()->getValue('SELECT checkout_session_data FROM ' . _DB_PREFIX_ . 'cart WHERE id_cart = ' . (int)$this->context->cart->id), true);
        // echo '<pre>';
        // print_r($data['st-checkout-payment-step']['selected_payment_name']);
        // echo '</pre>';

        // echo '<pre>';
        // print_r(Tools::getAllValues());
        // echo '</pre>';
    }
    protected function ecoAjaxPersonalInformation(){
        $this->handleRequest();
        $step = $this->checkoutProcess->getSteps('personal_information');

            $this->result['personal_information'] = $step->render(array(
                'customer' => $this->getTemplateVarCustomer(),
            ));

    }
    protected function ecoAjaxAddresses(){
        $this->handleRequest();
        $step = $this->checkoutProcess->getSteps('addresses');
        $this->result['addresses'] = $step->render(array(
            'customer' => $this->getTemplateVarCustomer(),
            'cart' => $this->cart_presenter->present($this->context->cart),
            'token' => Tools::getToken(),
        ));
    }
    protected function ecoAjaxDelivery(){
        $this->handleRequest();
        $step = $this->checkoutProcess->getSteps('delivery');
        $this->result['delivery'] = $step->render(array(
            'customer' => $this->getTemplateVarCustomer(),
            'token' => Tools::getToken(),
        ));
    }
    protected function ecoAjaxPayment(){
        $this->handleRequest();
        $step = $this->checkoutProcess->getSteps('payment');
        $selected_payment_option = $step->selected_payment_option;
        $customer = $this->getTemplateVarCustomer();
        $this->result['payment'] = $step->render(array(
            'customer' => $customer,
            'token' => Tools::getToken(),
        ));

        // $step = $this->checkoutProcess->getSteps('cart');

        // $this->result['cart'] = $step->render(array(
        //     'customer' => $customer,
        //     'token' => Tools::getToken(),
        //     'selected_payment_option' => $selected_payment_option,
        //     'cart' => $this->cart_presenter->present($this->context->cart),
        // ));

        $step = $this->checkoutProcess->getSteps('summary');

        $this->result['summary'] = $step->render(array(
            'customer' => $customer,
            'token' => Tools::getToken(),
            'cart' => $this->cart_presenter->present($this->context->cart),
        ));

        $step = $this->checkoutProcess->getSteps('summary_address');

        $this->result['summary_address'] = $step->render(array(
            'customer' => $customer,
            'token' => Tools::getToken(),
            'cart' => $this->cart_presenter->present($this->context->cart),
        ));


        /*
            2021-02-03
        */
        $this->result['free_delivery_info'] = Hook::exec('displayFreeShippingInfo');
        
    }

    protected function ecoAjaxSummary(){
        $this->handleRequest();
        $step = $this->checkoutProcess->getSteps('summary');
        $customer = $this->getTemplateVarCustomer();
        $this->result['summary'] = $step->render(array(
            'customer' => $customer,
            'token' => Tools::getToken(),
        ));
    }

    protected function ecoAjaxSummaryAddress(){
        $this->handleRequest();
        $step = $this->checkoutProcess->getSteps('summary_address');
        $customer = $this->getTemplateVarCustomer();
        $this->result['summary_address'] = $step->render(array(
            'customer' => $customer,
            'token' => Tools::getToken(),
        ));
    }

    protected function ecoAjaxSelectPaymentMethod(){
        $step = $this->checkoutProcess->getSteps('payment');
        $step->handleRequest(Tools::getAllValues());

        $this->saveDataToPersist($this->checkoutProcess);


        $step = $this->checkoutProcess->getSteps('summary');
        $customer = $this->getTemplateVarCustomer();
        $this->result['summary'] = $step->render(array(
            'customer' => $customer,
            'token' => Tools::getToken(),
            'cart' => $this->cart_presenter->present($this->context->cart)
        ));
    }


    /*
        iWeb - paczkomaty - 2020-02-29
    */
    protected function ecoAjaxSelectPaczkomat(){
        $step = $this->checkoutProcess->getSteps('delivery');
        $step->handleRequest(Tools::getAllValues());

        $this->saveDataToPersist($this->checkoutProcess);
    }

    protected function ecoAjaxSetMessage(){
        if($message=Tools::getValue('delivery_message'))
        {
            $session = $this->getCheckoutSession();
            $session->setMessage($message);
        }

        /*
            iWeb - 2018-12-30
        */
        if ( isset($_POST['invoice']) ) {
            $session = $this->getCheckoutSession();
            $session->setInvoiceAndCompany(Tools::getValue('invoice'), Tools::getValue('company'));

            $step = $this->checkoutProcess->getSteps('summary_address');
            $customer = $this->getTemplateVarCustomer();
            $this->result['summary_address'] = $step->render(array(
                'customer' => $customer,
                'token' => Tools::getToken(),
            ));
        }
    }

    public function ecoAjaxValidateAddress() {

        /*
            2022-10-06
        */
        $cart_info = $this->getCheckoutSession()->getInvaoiceAndCompany();

        /*
            iWeb - 2019-01-05
        */
        if ( isset($_GET['cart_addresses']) ) {

            if ( $_GET['cart_addresses'] == 1 ) {
                $this->getCheckoutSession()->setIdAddressInvoice($this->getCheckoutSession()->getIdAddressDelivery());
            }

            $addressForm = $this->makeAddressForm();
            $addressForm->loadAddressById($this->getCheckoutSession()->getIdAddressDelivery());
            $this->result['d'] = $addressForm->validate();


            $addressForm = $this->makeAddressForm();
            $addressForm->loadAddressById($this->getCheckoutSession()->getIdAddressInvoice());

            /*
                2022-10-06
            */
            if ( !empty($cart_info['company']) ) {
                $addressForm->getField('company')->setRequired(true);
                $addressForm->getField('vat_number')->setRequired(true);
            }

            $this->result['i'] = $addressForm->validate();
            return;
        }

        $delivery_invoice = Tools::getValue('delivery_invoice');
        if(!$delivery_invoice)
            return;
        $id_country = Tools::getValue('id_country', Configuration::get('PS_COUNTRY_DEFAULT'));
        $addressForm = $this->makeAddressForm();

        /*
            iWeb - 2018-01-03
        */
        if ( $delivery_invoice == 'delivery' ) $addressForm->getFormatter()->addFakeEmail();

        $addressForm->fillWith(Tools::getAllValues());


        if ( $delivery_invoice == 'invoice' ) {
            if ( !empty($cart_info['company']) ) {
                $addressForm->getField('company')->setRequired(true);
                $addressForm->getField('vat_number')->setRequired(true);
            }

            /*
                2022-10-11
            */
            $addressForm->getField('phone')->setRequired(false);
        };


        $this->result['r'] = $addressForm->validate();
        if(!$this->result['r']){
            $postcode = $addressForm->getField('postcode');
            if($postcode){
                if (Tools::getIsset('id_country')) {
                    $country = new Country($id_country);
                    $postcode->addAvailableValue('comment', sprintf($this->module->l('Postcode should look like %s', 'default'), '<span class="postcode_format" data-iso_code="'.$country->iso_code.'">'.$country->zip_code_format.'</span>'));
                }else{
                    $postcode->addAvailableValue('comment', sprintf($this->module->l('Postcode should look like %s', 'default'), '<span class="postcode_format" data-iso_code="'.$addressForm->getFormatter()->getCountry()->iso_code.'">'.$addressForm->getFormatter()->getCountry()->zip_code_format.'</span>'));
                }
            }
            $idAddressDelivery = (int)$this->getCheckoutSession()->getIdAddressDelivery();
            $idAddressInvoice  = (int)$this->getCheckoutSession()->getIdAddressInvoice();
            $customer = $this->getTemplateVarCustomer();
            $templateParams = array_merge(
                $addressForm->getTemplateVariables(),
                // $stepTemplateParameters,
                array(
                    'type' => $delivery_invoice,
                    'use_same_address'           => $idAddressDelivery == $idAddressInvoice,
                    'st_ajax_load_address_form' => 1,
                    'show_delivery_address_form' => true,
                    'show_invoice_address_form' => true,
                    'is_logged'                      => $customer['is_logged'],
                    'is_guest'                      => $customer['is_guest'],
                    'addresses_count' => $this->getCheckoutSession()->getCustomerAddressesCount(),
                    'steco' => $this->module->getVals('smarty_val'),
                )
            );
            $this->result['address_form'] = $this->context->smarty->fetch(
                'module:steasycheckout/views/templates/hook/address-form.tpl',
                $templateParams
            );
        }
    }
    public function ecoAjaxAddressForm()
    {
        $delivery_invoice = Tools::getValue('delivery_invoice');
        if(!$delivery_invoice)
            return;
        $errors = array();
        $address_type = Configuration::get('PS_TAX_ADDRESS_TYPE')=='id_address_invoice' ? 'invoice' : 'delivery';
        $id_address = (int)Tools::getValue('id_address');
        $customer = $this->getTemplateVarCustomer();
        $addressForm = $this->makeAddressForm();

        /*
            iWeb - 2018-01-03
        */
        if ( $address_type == 'delivery' ) $addressForm->getFormatter()->addFakeEmail();

        $id_country = Tools::getValue('id_country', Configuration::get('PS_COUNTRY_DEFAULT'));
        $id_state = Tools::getValue('id_state');

        if (!$customer['is_logged'] && $id_country && $address_type==$delivery_invoice) {
            if(!$id_address && isset($this->context->cookie->steasycheckout_temp_id_address) && $this->context->cookie->steasycheckout_temp_id_address)
                $id_address = (int)$this->context->cookie->steasycheckout_temp_id_address;
            if($id_address){
                $new_address = new Address($id_address);
                if(validate::isLoadedObject($new_address) && !$new_address->id_customer){
                    $new_address->id_country = $id_country;
                    if($id_state)
                        $new_address->id_state = $id_state;
                    if($new_address->save()){
                    }else{
                        $errors[] = $this->module->l('An error occurred when updating address.', 'default');
                    }
                }else{
                    $id_address = false;
                }
            }
            if(!$id_address){
                $new_address = new Address();
                $new_address->id_customer = 0;
                $new_address->id_manufacturer = '';
                $new_address->id_supplier = '';
                $new_address->id_warehouse = '';
                $new_address->id_country = $id_country;
                $new_address->id_state = $id_state;
                $new_address->alias = $this->module->l('My Address');
                $new_address->company = '';
                $new_address->lastname = ' ';
                $new_address->firstname = ' ';
                $new_address->vat_number = '';
                $new_address->address1 = ' ';
                $new_address->address2 = '';
                $new_address->postcode = 0;
                $new_address->city = ' ';
                $new_address->other = '';
                $new_address->phone = '';
                $new_address->phone_mobile = '';
                $new_address->dni = '';
                $new_address->deleted = 0;
                if($new_address->save()){
                    $id_address = $new_address->id;
                    $this->context->cookie->__set('steasycheckout_temp_id_address', $id_address);
                }else{
                    $errors[] = $this->module->l('An error occurred when creating new address.', 'default');
                }
            }
            if($id_address){
                $addressForm->fillWith(array('id_address' => $id_address));
                $this->getCheckoutSession()->setIdAddressDelivery($id_address);
            }
        }else{
            if ($id_address) {
                $addressForm->loadAddressById($id_address);
            }
        }
        if ($id_state) {
            $addressForm->fillWith(array('id_state' => $id_state));
        }
        $addressForm->fillWith(array('id_country' => $id_country));

        $postcode = $addressForm->getField('postcode');
        if($postcode){
            if ($id_country) {
                $country = new Country($id_country);
                $postcode->addAvailableValue('comment', sprintf($this->module->l('Postcode should look like %s', 'default'), '<span class="postcode_format" data-iso_code="'.$country->iso_code.'">'.$country->zip_code_format.'</span>'));
            }else{
                $postcode->addAvailableValue('comment', sprintf($this->module->l('Postcode should look like %s', 'default'), '<span class="postcode_format" data-iso_code="'.$addressForm->getFormatter()->getCountry()->iso_code.'">'.$addressForm->getFormatter()->getCountry()->zip_code_format.'</span>'));
            }
        }

        /*$stepTemplateParameters = array();
        foreach ($this->checkoutProcess->getSteps() as $step) {
            if ($step instanceof CheckoutAddressesStep) {
                $stepTemplateParameters = $step->getTemplateParameters();
            }
        }*/
        $idAddressDelivery = (int)$this->getCheckoutSession()->getIdAddressDelivery();
        $idAddressInvoice  = (int)$this->getCheckoutSession()->getIdAddressInvoice();
        $templateParams = array_merge(
            $addressForm->getTemplateVariables(),
            // $stepTemplateParameters,
            array(
                'type' => $delivery_invoice,
                'use_same_address'           => $idAddressDelivery == $idAddressInvoice,
                'st_ajax_load_address_form' => 1,
                'show_delivery_address_form' => true,
                'show_invoice_address_form' => true,
                'is_logged'                      => $customer['is_logged'],
                'is_guest'                      => $customer['is_guest'],
                'addresses_count' => $this->getCheckoutSession()->getCustomerAddressesCount(),
                'address_form_errors' => $errors,
                'steco' => $this->module->getVals('smarty_val'),
            )
        );

        $this->result['address_form'] = $this->context->smarty->fetch(
                'module:steasycheckout/views/templates/hook/address-form.tpl',
                $templateParams
            );
        if (!$customer['is_logged'] && Tools::getIsset('id_country') && $address_type==$delivery_invoice) {//why not $address_type==$delivery_invoice
            $this->handleRequest();
            $step = $this->checkoutProcess->getSteps('delivery');
            $this->result['delivery'] = $step->render(array(
                'customer' => $this->getTemplateVarCustomer(),
                'token' => Tools::getToken(),
            ));
            $step = $this->checkoutProcess->getSteps('payment');
            $selected_payment_option = $step->selected_payment_option;
            $customer = $this->getTemplateVarCustomer();
            $this->result['payment'] = $step->render(array(
                'customer' => $customer,
                'token' => Tools::getToken(),
            ));

            $step = $this->checkoutProcess->getSteps('cart');
            $this->result['cart'] = $step->render(array(
                'customer' => $customer,
                'token' => Tools::getToken(),
                'selected_payment_option' => $selected_payment_option,
                'cart' => $this->cart_presenter->present($this->context->cart),
            ));
        }
    }

    public function ecoAjaxSelectDeliveryOption()
    {
        /*$this->handleRequest();
        $step = $this->checkoutProcess->getSteps('delivery');*/
        
        $this->ecoAjaxPayment();

        /*
            2020-11-22
        */
        $step = $this->checkoutProcess->getSteps('cart');
        $this->result['cart'] = $step->render(array(
            'customer' => $customer,
            'token' => Tools::getToken(),
            'cart' => $this->cart_presenter->present($this->context->cart),
        ));
    }

    /*public function ecoAjaxCartDetailed(){
        $display_cart = Configuration::get($this->_prefix_st.'DISPLAY_CART');
        $cart = $this->cart_presenter->present(
            $this->context->cart
        );

        $this->result['preview'] = $this->context->smarty->fetch('module:steasycheckout/views/templates/hook/cart-summary.tpl', array(
                'cart' => $cart,
                'static_token' => Tools::getToken(false),
                'steco_urls' => array(
                    'cart' => $this->context->link->getPageLink('cart', $this->ssl),
                ),
                'urls' => $this->getTemplateVarUrls(),
            ));
    }*/
    
    public function initContent()
    {
        if (Tools::isSubmit('steco_facebook') || Tools::isSubmit('steco_google') || Tools::isSubmit('steco_paypal') || Tools::isSubmit('steco_amazon') || Tools::isSubmit('steco_twitter')) {
            $personal_information_step = $this->checkoutProcess->getSteps('personal_information');
            if(Tools::isSubmit('steco_facebook'))
                $personal_information_step->setSocialName('Facebook');
            elseif(Tools::isSubmit('steco_google'))
                $personal_information_step->setSocialName('Google');
            elseif(Tools::isSubmit('steco_paypal'))
                $personal_information_step->setSocialName('Paypal');
            elseif(Tools::isSubmit('steco_amazon'))
                $personal_information_step->setSocialName('Amazon');
            elseif(Tools::isSubmit('steco_twitter'))
                $personal_information_step->setSocialName('Twitter');

            $result = $personal_information_step->socialLogin();
            if(is_array($result) && count($result))
                $this->errors = array_merge($this->errors, $result);
        } 

        /*$this->restorePersistedData($this->checkoutProcess);

        $this->checkoutProcess->handleRequest(
            Tools::getAllValues()
        );*/

        $presentedCart = $this->cart_presenter->present($this->context->cart);

        if (count($presentedCart['products']) <= 0 || $presentedCart['minimalPurchaseRequired']) {
            // if there is no product in current cart, redirect to cart page
            $cartLink = $this->context->link->getPageLink('cart');
            if($this->ajax){
                header('Content-Type: application/json');
                $this->ajaxDie(Tools::jsonEncode(array(
                    'redirect' => $cartLink,
                )));
            }else
                Tools::redirect($cartLink);
        }

        $product = $this->context->cart->checkQuantities(true);
        if (is_array($product)) {
            $this->context->cart->deleteProduct($product['id_product'], $product['id_product_attribute'], $product['id_customization'], $product['id_address_delivery']);


            // if there is an issue with product quantities, redirect to cart page
            // $cartLink = $this->context->link->getPageLink('cart', null, null, array('action' => 'show'));
            // if($this->ajax){
            //     header('Content-Type: application/json');
            //     $this->ajaxDie(Tools::jsonEncode(array(
            //         'redirect' => $cartLink,
            //     )));
            // } else {
            //     Tools::redirect($cartLink);
            // }
        }

        /*$this->checkoutProcess
            ->setNextStepReachable()
            ->markCurrentStep()
            ->invalidateAllStepsAfterCurrent();

        $this->saveDataToPersist($this->checkoutProcess);*/
        
        $smarty_vals = $this->module->getVals('smarty_val');

        if ($this->context->cart->isVirtualCart()) {
            foreach ($smarty_vals['columns'] as $ck => $c_blocks) {
                foreach($c_blocks as $bk=>$bv){
                    if($bv=='delivery'){
                        unset($smarty_vals['columns'][$ck][$bk]);
                        if(!count($smarty_vals['columns'][$ck]))
                            unset($smarty_vals['columns'][$ck]);                            
                    }
                }
            }
        }

        $this->context->smarty->assign(array(
            'steco' => $smarty_vals,
        ));

        parent::initContent();

        $this->setTemplate('module:steasycheckout/views/templates/hook/steasycheckout.tpl');
    }
}
