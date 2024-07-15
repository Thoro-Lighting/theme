<?php
/**
* 2007-2017 PrestaShop
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class EkomiSff extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'ekomiSff';
        $this->tab = 'checkout';
        $this->version = '2.0.1';
        $this->author = 'eKomi';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('eKomi Iff Pop-up');
        $this->description = $this->l('This Module shows eKomi IFF pop-up form on order confirmation page.');
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('EKOMISFF_ENABLE', '0');
        Configuration::updateValue('EKOMISFF_SHOP_ID', '');
        Configuration::updateValue('EKOMISFF_FORM_ID', '');
        Configuration::updateValue('EKOMISFF_TRANSACTION_ID_PREFIX', '');
        Configuration::updateValue('EKOMISFF_ENABLE_PRODUCT_REVIEWS', '0');
        Configuration::updateValue('EKOMISFF_WIDGET_WIDTH', '');
        Configuration::updateValue('EKOMISFF_WIDGET_HEIGHT', '');
        Configuration::updateValue('EKOMISFF_URL_PLACEHOLDER', 'orderSuccess,order-success,order-confirmation,module=paynow,paynow');

        return parent::install() &&
            $this->registerHook('displayOrderConfirmation') &&
            $this->registerHook( 'header');
    }

    public function uninstall()
    {
        Configuration::deleteByName('EKOMISFF_ENABLE');
        Configuration::deleteByName('EKOMISFF_SHOP_ID');
        Configuration::deleteByName('EKOMISFF_FORM_ID');
        Configuration::deleteByName('EKOMISFF_TRANSACTION_ID_PREFIX');
        Configuration::deleteByName('EKOMISFF_ENABLE_PRODUCT_REVIEWS');
        Configuration::deleteByName('EKOMISFF_WIDGET_WIDTH');
        Configuration::deleteByName('EKOMISFF_WIDGET_HEIGHT');
        Configuration::deleteByName('EKOMISFF_URL_PLACEHOLDER');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        $output = '';
        if (((bool)Tools::isSubmit('submitEkomiSffModule')) == true) {
            $shopId = str_replace(' ', '', Tools::getValue('EKOMISFF_SHOP_ID'));
            $formId = str_replace(' ', '', Tools::getValue('EKOMISFF_FORM_ID'));
            $urlPlaceholder = str_replace(' ', '', Tools::getValue('EKOMISFF_URL_PLACEHOLDER'));
            if (!empty($shopId) && !empty($formId)) {
                if(!empty($urlPlaceholder)) {
                    $this->updateValues();
                    $output = $this->displayConfirmation(
                        $this->l('Settings Saved successfully')
                    );
                }else{
                    $output = $this->displayError($this->l('URL Placeholder should not be empty.'));
                }
            } else {
                Configuration::updateValue('EKOMISFF_ENABLE', '0');
                $output = $this->displayError($this->l('eKomi Shop Id or Form Id is empty.'));
            }
        }

        $this->context->smarty->assign('module_dir', $this->_path);

//        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output . $this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitEkomiSffModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Gets boolean options.
     *
     * @return array
     */
    public function getBoolOptions()
    {
        $options = array(
            array(
                'id_enable' => 0,
                'name' => 'No'
            ),
            array(
                'id_enable' => 1,
                'name' => 'Yes'
            ),
        );

        return $options;
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        $options = $this->getBoolOptions();
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type'    => 'select',
                        'label'   => $this->l('Plug-in Enabled'),
                        'name'    => 'EKOMISFF_ENABLE',
                        'options' => array(
                            'query' => $options,
                            'id'    => 'id_enable',
                            'name'  => 'name'
                        ),
                        'required' => true,
                    ),
                    array(
                        'type'     => 'text',
                        'label'    => $this->l('eKomi Shop ID'),
                        'name'     => 'EKOMISFF_SHOP_ID',
                        'size'     => 20,
                        'required' => true,
                    ),
                    array(
                        'type'     => 'text',
                        'label'    => $this->l('eKomi Form ID'),
                        'name'     => 'EKOMISFF_FORM_ID',
                        'size'     => 20,
                        'required' => true,
                        'desc'     => '',
                    ),
                    array(
                        'type'     => 'text',
                        'label'    => $this->l('Transaction ID Prefix'),
                        'name'     => 'EKOMISFF_TRANSACTION_ID_PREFIX',
                        'size'     => 20,
                        'desc'     => 'Any prefix before Order Id i.e <strong>IR_</strong>  Otherwise leave this empty',
                    ),
                    array(
                        'type'    => 'select',
                        'label'   => $this->l('Enable Product Reviews'),
                        'name'    => 'EKOMISFF_ENABLE_PRODUCT_REVIEWS',
                        'options' => array(
                            'query' => $options,
                            'id'    => 'id_enable',
                            'name'  => 'name'
                        ),
                        'required' => true,
                    ),
                    array(
                        'type'     => 'text',
                        'label'    => $this->l('eKomi Widget Width'),
                        'name'     => 'EKOMISFF_WIDGET_WIDTH',
                        'size'     => 20,
                        'required' => true,
                    ),
                    array(
                        'type'     => 'text',
                        'label'    => $this->l('eKomi Widget Height'),
                        'name'     => 'EKOMISFF_WIDGET_HEIGHT',
                        'size'     => 20,
                        'required' => true,
                    ),
                    array(
                        'type'     => 'textarea',
                        'label'    => $this->l('eKomi Url Placeholder'),
                        'name'     => 'EKOMISFF_URL_PLACEHOLDER',
                        'cols' => 30,
                        'rows' => 5,
                        'required' => true,
                    )
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $shopId = str_replace(' ', '', Configuration::get('EKOMISFF_SHOP_ID'));
        $formId = str_replace(' ', '', Configuration::get('EKOMISFF_FORM_ID'));
        $formwidth = str_replace(' ', '', Configuration::get('EKOMISFF_WIDGET_WIDTH'));
        $formheight = str_replace(' ', '', Configuration::get('EKOMISFF_WIDGET_HEIGHT'));
        $urlPlaceholder = str_replace(' ', '', Configuration::get('EKOMISFF_URL_PLACEHOLDER'));
        return array(
            'EKOMISFF_ENABLE' => Configuration::get('EKOMISFF_ENABLE'),
            'EKOMISFF_SHOP_ID' => $shopId,
            'EKOMISFF_FORM_ID' => $formId,
            'EKOMISFF_TRANSACTION_ID_PREFIX' => Configuration::get('EKOMISFF_TRANSACTION_ID_PREFIX'),
            'EKOMISFF_ENABLE_PRODUCT_REVIEWS' => Configuration::get('EKOMISFF_ENABLE_PRODUCT_REVIEWS'),
            'EKOMISFF_WIDGET_WIDTH' => $formwidth,
            'EKOMISFF_WIDGET_HEIGHT' => $formheight,
            'EKOMISFF_URL_PLACEHOLDER' => $urlPlaceholder,
        );
    }

    /**
     * Checks if Plugin is enabled.
     *
     * @return string
     */
    public static function isActivated()
    {
        return Configuration::get('EKOMISFF_ENABLE');
    }

    /**
     * Checks if Plugin is enabled.
     *
     * @return string
     */
    public static function isRroductReviewsEnabled()
    {
        return Configuration::get('EKOMISFF_ENABLE_PRODUCT_REVIEWS');
    }

    /**
     * Save form data.
     */
    protected function updateValues()
    {
        $form_values = $this->getConfigFormValues();
        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
     * hookHeader hookHeader implementation
     * @param  mixed $params
     * @return mixed
     */
    public function hookHeader($params)
    {
        $uri= $_SERVER['REQUEST_URI'];
        // Whenever add to cart, id get saved into cookies
        if(isset($params['cart']) && isset($params['cart']->id) && !empty($params['cart']->id))
            $this->context->cookie->__set('cart-id', $params['cart']->id);
        $id_order = '';
        $cartId = (intval(Tools::getValue('id_cart')) ? intval(Tools::getValue('id_cart', 0)) : $this->context->cookie->__get('cart-id'));
        if(isset($cartId) && !empty($cartId))
            $id_order = Order::getOrderByCartId($cartId);

        if(isset($id_order) && !empty($id_order)){
            return $this->renderIffPopup($id_order);
        }else{
            $placeholders = explode(',', Configuration::get('EKOMISFF_URL_PLACEHOLDER'));
            $found = 0;
            foreach ($placeholders as $keyword) {
                $pattern = "/\b{$keyword}\b/";

                if (preg_match($pattern, $uri) == true) {
                    $found = 1;
                    break;
                }
            }

            if($found && $this->isActivated()) {
                $formWidth = Configuration::get('EKOMISFF_WIDGET_WIDTH');
                $formHeight = Configuration::get('EKOMISFF_WIDGET_HEIGHT');
                $orderIdPrefix =  Configuration::get('EKOMISFF_TRANSACTION_ID_PREFIX');
                $params = array(
                    'ekomiShopId' => Configuration::get('EKOMISFF_SHOP_ID'),
                    'ekomiFormId' => Configuration::get('EKOMISFF_FORM_ID'),
                    'orderIdPrefix' => (!empty($orderIdPrefix)) ? $orderIdPrefix : '',
                    'ekomiWidgetWidth' => (!empty($formWidth)) ? $formWidth:'1020px',
                    'ekomiWidgetHeight' => (!empty($formHeight)) ? $formHeight:'1290px',
                );

                if(!empty($cartId)) {
                    $params['orderId'] = $cartId;
                    $params['productIds'] = '';

                    $this->smarty->assign($params);
                    $this->context->cookie->__set('cart-id', null);
                    return $this->display(__FILE__, 'order_confirmation.tpl');
                }
            }
        }
        return '';
    }

    /**
     * Display Iff popup if we have proper order id
     */
    public function renderIffPopup($id_order){
        if($this->isActivated()) {

            $formWidth = Configuration::get('EKOMISFF_WIDGET_WIDTH');
            $formHeight = Configuration::get('EKOMISFF_WIDGET_HEIGHT');
            $orderIdPrefix =  Configuration::get('EKOMISFF_TRANSACTION_ID_PREFIX');
            $params = array(
                'ekomiShopId' => Configuration::get('EKOMISFF_SHOP_ID'),
                'ekomiFormId' => Configuration::get('EKOMISFF_FORM_ID'),
                'orderIdPrefix' => (!empty($orderIdPrefix)) ? $orderIdPrefix : '',
                'ekomiWidgetWidth' => (!empty($formWidth)) ? $formWidth:'1020px',
                'ekomiWidgetHeight' => (!empty($formHeight)) ? $formHeight:'1290px',
            );

            $order = new Order($id_order);
            if (Validate::isLoadedObject($order)) {
                $this->context->cookie->__set('cart-id', null);
                $params['orderId'] = $id_order;
                $params['productIds'] = '';
                if ($this->isRroductReviewsEnabled()) {
                    $ProductDetailObject = new OrderDetail;
                    $products = $ProductDetailObject->getList($id_order);
                    $productIds = array();
                    foreach ($products as $product) {
                        $productIds[] = $product['product_id'];
                    }
                    $params['productIds'] = implode(',', $productIds);
                }

                $this->smarty->assign($params);
            }
            return $this->display(__FILE__, 'order_confirmation.tpl');
        }
    }

}
