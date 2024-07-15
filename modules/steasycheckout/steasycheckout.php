<?php
/*
* 2007-2018 PrestaShop
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
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class StEasyCheckout extends Module
{
    protected static $access_rights = 0775;
    public $_prefix_st = 'STECO_';
    private $_config_folder;
    public $tabs;
    public $defaults;
    public $validation_errors = array();
    private $_html;
    public static $textTransform = array(
        array('id' => 0, 'name' => 'none'),
        array('id' => 1, 'name' => 'uppercase'),
        array('id' => 2, 'name' => 'lowercase'),
        array('id' => 3, 'name' => 'capitalize'),
    );
    private $_font_inherit = 'inherit';
    private $systemFonts = array("Helvetica","Arial","Verdana","Georgia","Tahoma","Times New Roman","sans-serif");
    private $googleFonts;
    public $imgtype = array('jpg', 'gif', 'jpeg', 'png');
    private $syn_items = array(
            'GUEST_CHECKOUT_ENABLED',
            'CUSTOMER_BIRTHDATE',
            'CUSTOMER_OPTIN',
            'CARRIER_DEFAULT',
            'CARRIER_DEFAULT_SORT',
            'CARRIER_DEFAULT_ORDER',
        );
	function __construct()
	{
		$this->name = 'steasycheckout';
		$this->tab = 'front_office_features';
		$this->version = '2.1.6';
		$this->author        = 'PrestaShop';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();


		$this->displayName = $this->l('Easy Checkout');
		$this->description = $this->l('An easy to use OPC module with nice looking.');
		$this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        $this->controllers = array('default');
        $this->_config_folder = _PS_MODULE_DIR_.$this->name.'/config/';
        $this->tabs = array(
         //  array('id'  => '0,8,11,14,16,21,22,25', 'name' => $this->l('General')),
            array('id'  => '0,8,14', 'name' => $this->l('General')),
            array('id'  => '7,9,24,10', 'name' => $this->l('Layout settings')),
        //  array('id'  => '7,9,24,20,10', 'name' => $this->l('Layout settings')),
        //  array('id'  => '1,17', 'name' => $this->l('Personal information block')),
            array('id'  => '1', 'name' => $this->l('Personal information block')),
            array('id'  => '6', 'name' => $this->l('Socail login')),
            array('id'  => '2,18,97', 'name' => $this->l('Address block')),
         // 'carriers' => array('id'  => '3,19', 'name' => $this->l('Carrier block')),
            'carriers' => array('id'  => '3', 'name' => $this->l('Carrier block')),
            array('id'  => '101', 'name' => $this->l('Shipping and delivery time')),
         // 'payment_methods'=>array('id'  => '4,13', 'name' => $this->l('Payment method block')),
            'payment_methods'=>array('id'  => '4', 'name' => $this->l('Payment method block')),
            array('id'  => '5,15', 'name' => $this->l('Cart block')),
            array('id'  => '23', 'name' => $this->l('Custom content')),
            array('id'  => '100', 'name' => $this->l('Free shipping zone')),
            
        );
        $this->googleFonts = include(dirname(__FILE__).'/googlefonts.php');
        $this->defaults = array(
            'disable'                              => array('exp'=>1,'val'=>0,'smarty_val'=>1,'js_val'=>1),
            'skip_shopping_cart'                   => array('exp'=>1,'val'=>1),
            'guest_checkout_enabled'               => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'customer_birthdate'                   => array('exp'=>1,'val'=>1),
            'ask_for_gender'                       => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'customer_optin'                       => array('exp'=>1,'val'=>1),
            'newsletter'                           => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'display_logout'                       => array('exp'=>1,'val'=>2),
            'terms_conditions_checked'             => array('exp'=>1,'val'=>1),
            'default_pi_form'                      => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'facebook_login'                       => array('exp'=>0,'val'=>0),
            'google_login'                         => array('exp'=>0,'val'=>0),
            'paypal_login'                         => array('exp'=>0,'val'=>0),
            'amazon_login'                         => array('exp'=>0,'val'=>0),
            'twitter_login'                        => array('exp'=>0,'val'=>0),
            'facebook_id'                          => array('exp'=>0,'val'=>''),
            'facebook_key'                         => array('exp'=>0,'val'=>''),
            'google_id'                            => array('exp'=>0,'val'=>''),
            'google_key'                           => array('exp'=>0,'val'=>''),
            'paypal_id'                            => array('exp'=>0,'val'=>''),
            'paypal_key'                           => array('exp'=>0,'val'=>''),
            'amazon_id'                            => array('exp'=>0,'val'=>''),
            'amazon_key'                           => array('exp'=>0,'val'=>''),
            'twitter_id'                           => array('exp'=>0,'val'=>''),
            'twitter_key'                          => array('exp'=>0,'val'=>''),
            'column_1'                             => array('exp'=>1,'val'=>5,'smarty_val' => 1),
            'column_2'                             => array('exp'=>1,'val'=>3,'smarty_val' => 1),
            'column_3'                             => array('exp'=>1,'val'=>4,'smarty_val' => 1),
            'column_4'                             => array('exp'=>1,'val'=>4,'smarty_val' => 1),
            'column_5'                             => array('exp'=>1,'val'=>4,'smarty_val' => 1),
            'column_6'                             => array('exp'=>1,'val'=>4,'smarty_val' => 1),
            'column_gap'                           => array('exp'=>1,'val'=>''),
            'column_bg'                            => array('exp'=>1,'val'=>'#ffffff'),
            'column_tb_padding'                    => array('exp'=>1,'val'=>16),
            'column_rl_padding'                    => array('exp'=>1,'val'=>12),

            'login_block'                          => array('exp'=>1,'val'=>0,'smarty_val' => 1),
            // 'addresses_block'                   => array('exp'=>1,'val'=>0,'smarty_val' => 1),
            'delivery_block'                       => array('exp'=>1,'val'=>1,'smarty_val' => 1),
            'payment_block'                        => array('exp'=>1,'val'=>2,'smarty_val' => 1),
            'summary_block'                        => array('exp'=>1,'val'=>2,'smarty_val' => 1),
            'summary_address_block'                => array('exp'=>1,'val'=>2,'smarty_val' => 1),
            // 'order_block'                       => array('exp'=>1,'val'=>2,'smarty_val' => 1),
            'display_cart'                         => array('exp'=>1,'val'=>2,'smarty_val' => 1),
            'beambar_cart'                         => array('exp'=>1,'val'=>2,'smarty_val' => 1),
            'message_order'                         => array('exp'=>1,'val'=>2,'smarty_val' => 1),
            'reassurance'                          => array('exp'=>1,'val'=>4,'smarty_val' => 1),

            'text_color'                           => array('exp'=>1,'val'=>''),
            'standard_version'                     => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'button_form'                     => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'link_color'                           => array('exp'=>1,'val'=>''),
            'link_hover_color'                     => array('exp'=>1,'val'=>''),
            'bg_color'                             => array('exp'=>1,'val'=>''),
            'con_bg_color'                         => array('exp'=>1,'val'=>''),
            'section_bg_image_field'               => array('exp'=>1,'val'=>''),
            'section_bg_repeat'                    => array('exp'=>1,'val'=>0),
            'section_bg_position'                  => array('exp'=>1,'val'=>1),
            'section_bg_cover'                     => array('exp'=>1,'val'=>0),

            'heading_color'                        => array('exp'=>1,'val'=>'#444444'),
            'heading_size'                         => array('exp'=>1,'val'=>''),
            'heading_bg'                           => array('exp'=>1,'val'=>'#F5F5F5'),

            'step_numbers'                         => array('exp'=>1,'val'=>0,'smarty_val' => 1),
            'step_number_color'                    => array('exp'=>1,'val'=>'#ffffff'),
            'step_number_bg'                       => array('exp'=>1,'val'=>'#F1756D'),
            'step_number_text_size'                => array('exp'=>1,'val'=>22),
            'step_number_width'                    => array('exp'=>1,'val'=>46),
            'step_number_height'                   => array('exp'=>1,'val'=>46),
            'step_number_radius'                   => array('exp'=>1,'val'=>0),
            'step_number_padding'                  => array('exp'=>1,'val'=>0),
            'step_number_border'                   => array('exp'=>1,'val'=>0),
            'step_number_border_color'             => array('exp'=>1,'val'=>''),

            'column_shadow'                        => array('exp'=>1,'val'=>0),
            'column_h_shadow'                      => array('exp'=>1,'val'=>0),
            'column_v_shadow'                      => array('exp'=>1,'val'=>0),
            'column_shadow_blur'                   => array('exp'=>1,'val'=>4),
            'column_shadow_color'                  => array('exp'=>1,'val'=>'#000000'),
            'column_shadow_opacity'                => array('exp'=>1,'val'=>0.6),

            'column_border'                        => array('exp'=>1,'val'=>0),
            'column_border_color'                  => array('exp'=>1,'val'=>''),

            'radio_checkbox_color'                 => array('exp'=>1,'val'=>''),
            'radio_checkbox_bg'                    => array('exp'=>1,'val'=>'#fcfcfc'),
            'radio_checkbox_color_active'          => array('exp'=>1,'val'=>''),
            'radio_checkbox_bg_active'             => array('exp'=>1,'val'=>''),

            'font_latin_support'                   => array('exp'=>1,'val'=>0),
            'font_cyrillic_support'                => array('exp'=>1,'val'=>0),
            'font_vietnamese'                      => array('exp'=>1,'val'=>0),
            'font_greek_support'                   => array('exp'=>1,'val'=>0),
            'font_arabic_support'                  => array('exp'=>1,'val'=>0),

            'font_text'                            => array('exp'=>1,'val'=>''),
            'font_body_size'                       => array('exp'=>1,'val'=>0),

            'font_heading'                         => array('exp'=>1,'val'=>''),
            'font_heading_trans'                   => array('exp'=>1,'val'=>3),
            'heading_paddings_p_l'                 => array('exp'=>1,'val'=>0),
            'heading_paddings_p_t'                 => array('exp'=>1,'val'=>0),
            'heading_paddings_p_r'                 => array('exp'=>1,'val'=>0),
            'heading_paddings_p_b'                 => array('exp'=>1,'val'=>0),
            'carrier_paddings_p_l'                 => array('exp'=>1,'val'=>0),
            'carrier_paddings_p_t'                 => array('exp'=>1,'val'=>8),
            'carrier_paddings_p_r'                 => array('exp'=>1,'val'=>0),
            'carrier_paddings_p_b'                 => array('exp'=>1,'val'=>8),
            'payment_paddings_p_l'                 => array('exp'=>1,'val'=>10),
            'payment_paddings_p_t'                 => array('exp'=>1,'val'=>8),
            'payment_paddings_p_r'                 => array('exp'=>1,'val'=>10),
            'payment_paddings_p_b'                 => array('exp'=>1,'val'=>8),

            'font_step_number'                     => array('exp'=>1,'val'=>'Abril Fatface:400'),
            'font_carrier'                         => array('exp'=>1,'val'=>''),
            'font_payment'                         => array('exp'=>1,'val'=>'inherit:700'),
            'font_subheading'                      => array('exp'=>1,'val'=>''),
            'carrier_title_size'                   => array('exp'=>1,'val'=>0),
            'payment_title_size'                   => array('exp'=>1,'val'=>0),
            'subheading_text_size'                 => array('exp'=>1,'val'=>16),
            'subheading_color'                     => array('exp'=>1,'val'=>''),

            'custom_css'                           => array('exp'=>0,'val'=>''),

            'cart_summary'                         => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'graphic_free'                         => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'text_free_delivery'                   => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'cart_pro_image'                       => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'weight_products'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'weight_products_sum'                  => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'cart_pro_name'                        => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'presentation_voucher'                 => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'coll_ex_address'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'shadow_address'                       => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'vis_voucher_zone'                     => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'promotion_strickers'                  => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'promotion_price'                   => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'promotion_save'                  => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'cart_pro_quantity'                    => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'cart_pro_price'                       => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'cart_pro_remove'                      => array('exp'=>1,'val'=>0,'smarty_val'=>1),

            'carrier_default'                      => array('exp'=>1,'val'=>0),
            'carrier_default_sort'                 => array('exp'=>1,'val'=>0),
            'carrier_default_order'                => array('exp'=>1,'val'=>0),

            'default_payment_method'               => array('exp'=>1,'val'=>0),
            'carrier_method_description'           => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'show_carrier_image'                   => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'default_account'                   => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'carriers_color'                       => array('exp'=>1,'val'=>''),
            'carriers_bg'                          => array('exp'=>1,'val'=>'#D9D9D9'),
            'carriers_price_color'                 => array('exp'=>1,'val'=>''),
            'carriers_color_selected'              => array('exp'=>1,'val'=>'#ffffff'),
            'carriers_bg_selected'                 => array('exp'=>1,'val'=>'#49C9B0'),
            'carriers_border'                      => array('exp'=>1,'val'=>''),
            'carriers_border_color'                => array('exp'=>1,'val'=>''),
            'carriers_border_color_selected'       => array('exp'=>1,'val'=>''),
            'date_holidays'                         => array('exp'=>0,'val'=>0),
            'hour_holidays'                         => array('exp'=>0,'val'=>0),
            'deli_holiday'                         => array('exp'=>0,'val'=>0),
            'ship_holiday'                         => array('exp'=>0,'val'=>0),
            'ship_holiday_form'                         => array('exp'=>0,'val'=>0),
        
        

            'addresses_color'                      => array('exp'=>1,'val'=>''),
            'addresses_bg'                         => array('exp'=>1,'val'=>''),
            'addresses_color_selected'             => array('exp'=>1,'val'=>'#ffffff'),
            'addresses_bg_selected'                => array('exp'=>1,'val'=>'#49C9B0'),
            'addresses_border'                     => array('exp'=>1,'val'=>1),
            'addresses_border_color'               => array('exp'=>1,'val'=>'#D9D9D9'),
            'addresses_border_color_selected'      => array('exp'=>1,'val'=>''),

            'pi_heading_color'                     => array('exp'=>1,'val'=>''),
            'pi_heading_bg'                        => array('exp'=>1,'val'=>''),
            'pi_heading_color_selected'            => array('exp'=>1,'val'=>''),
            'pi_heading_bg_selected'               => array('exp'=>1,'val'=>'#49C9B0'),
            'pi_heading_border'                    => array('exp'=>1,'val'=>''),
            'pi_heading_border_color'              => array('exp'=>1,'val'=>''),
            'pi_heading_border_color_selected'     => array('exp'=>1,'val'=>''),

            'btn_color'                            => array('exp'=>1,'val'=>''),
            'btn_bg'                               => array('exp'=>1,'val'=>''),
            'btn_color_selected'                   => array('exp'=>1,'val'=>''),
            'btn_bg_selected'                      => array('exp'=>1,'val'=>''),
            'btn_border'                           => array('exp'=>1,'val'=>''),
            'btn_border_color'                     => array('exp'=>1,'val'=>''),
            'btn_border_color_selected'            => array('exp'=>1,'val'=>''),

            'payments_color'                       => array('exp'=>1,'val'=>''),
            'payments_bg'                          => array('exp'=>1,'val'=>'#D9D9D9'),
            'payments_color_selected'              => array('exp'=>1,'val'=>'#ffffff'),
            'payments_bg_selected'                 => array('exp'=>1,'val'=>'#49C9B0'),
            'payments_border'                      => array('exp'=>1,'val'=>1),
            'payments_border_color'                => array('exp'=>1,'val'=>''),
            'payments_border_color_selected'       => array('exp'=>1,'val'=>''),

            'section_bg_pattern'                   => array('exp'=>1,'val'=>4),
            'top_spacing'                          => array('exp'=>1,'val'=>30),
            'bottom_spacing'                       => array('exp'=>1,'val'=>30),

            'show_payment_logo'                    => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'show_payment_name'                    => array('exp'=>1,'val'=>1,'smarty_val'=>1),
        

            'carriers_per_xl'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'carriers_per_lg'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'carriers_per_md'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'carriers_per_sm'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'carriers_per_xs'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),

            'address_per_xl'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'address_per_lg'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'address_per_md'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'address_per_sm'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'address_per_xs'                      => array('exp'=>1,'val'=>1,'smarty_val'=>1),

            'social_button'                        => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'custom_content'                       => array('exp'=>0,'val'=>array(1=>'')),
            'bottom_custom_content'                       => array('exp'=>0,'val'=>array(1=>'')),

            'pi_text_color'                        => array('exp'=>1,'val'=>''),
            'pi_link_color'                        => array('exp'=>1,'val'=>''),
            'pi_link_hover_color'                  => array('exp'=>1,'val'=>''),
            'pi_bg_color'                          => array('exp'=>1,'val'=>''),

            'custom_content_text_color'                        => array('exp'=>0,'val'=>''),
            'custom_content_link_color'                        => array('exp'=>0,'val'=>''),
            'custom_content_link_hover_color'                  => array('exp'=>0,'val'=>''),
            'custom_content_bg_color'                          => array('exp'=>0,'val'=>''),

            'address_text_color'                   => array('exp'=>1,'val'=>''),
            'address_bg_color'                     => array('exp'=>1,'val'=>''),

            'carriers_text_color'                  => array('exp'=>1,'val'=>''),
            'carriers_bg_color'                    => array('exp'=>1,'val'=>''),

            'payments_text_color'                  => array('exp'=>1,'val'=>''),
            'payments_bg_color'                    => array('exp'=>1,'val'=>''),

            'cart_text_color'                      => array('exp'=>1,'val'=>''),
            'cart_link_color'                      => array('exp'=>1,'val'=>''),
            'cart_link_hover_color'                => array('exp'=>1,'val'=>''),
            'cart_bg_color'                        => array('exp'=>1,'val'=>''),
            'cart_price_color'                        => array('exp'=>1,'val'=>''),

            'input_color'                          => array('exp'=>1,'val'=>''),
            'input_bg'                             => array('exp'=>1,'val'=>''),
            'input_border_color'                   => array('exp'=>1,'val'=>''),

            'overlay_bg'                           => array('exp'=>1,'val'=>''),
            'overlay_opacity'                      => array('exp'=>1,'val'=>0.6),
            'placehoder_color'                     => array('exp'=>1,'val'=>''),
            'placehoder_bg'                        => array('exp'=>1,'val'=>''),
            'placehoder_highlight_bg'              => array('exp'=>1,'val'=>''),
            'compact_forms'                        => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'payment_method_description'           => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'payment_method_summary'           => array('exp'=>1,'val'=>1,'smarty_val'=>1),
            'tick_selected_only'           => array('exp'=>1,'val'=>0,'smarty_val'=>1),
            'tick_size'           => array('exp'=>1,'val'=>0),
            'tick_border_size'           => array('exp'=>1,'val'=>1),
            'tick_border_color'           => array('exp'=>1,'val'=>0),
            'pi_icon'           => array('exp'=>1,'val'=>'','smarty_val' => 1),
            'carrier_icon'           => array('exp'=>1,'val'=>'','smarty_val' => 1),
            'payment_icon'           => array('exp'=>1,'val'=>'','smarty_val' => 1),
            'cart_icon'           => array('exp'=>1,'val'=>'','smarty_val' => 1),
            'tick_icon'           => array('exp'=>1,'val'=>'eco-ok'),
            'heading_align'           => array('exp'=>1,'val'=>0,'smarty_val' => 1),
            'gmap_api_key'           => array('exp'=>0,'val'=>'','smarty_val' => 1),
            'geolocate'           => array('exp'=>0,'val'=>0,'js_val'=>1),
            'payments_no_submit'           => array('exp'=>0,'val'=>'','js_val'=>1),
            'checkout_bar_color'                           => array('exp'=>1,'val'=>''),
            'checkout_bar_bg'                           => array('exp'=>1,'val'=>''),
            'compact_address'                           => array('exp'=>1,'val'=>0,'smarty_val'=>1),
        );

        /*
            iWeb - 2023-04-03
        */
        $carriers = Carrier::getCarriers(Context::getContext()->language->id);
        foreach ($carriers as $carrier) {
            $this->defaults['hour_holidays_' . $carrier['id_reference']] = array('exp'=>0,'val'=>0);
            $this->defaults['alt_desc_' . $carrier['id_reference']] = array('exp'=>1,'val'=>1,'smarty_val'=>1);
        }
	}
	function install()
	{
		$result = parent::install() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('actionFrontControllerAfterInit') &&
            $this->registerHook('actionShopDataDuplication') &&
            $this->registerHook('displayBeforeBodyClosingTag') &&
            $this->registerHook('registerGDPRConsent') &&
            // $this->registerHook('actionDeleteGDPRCustomer') &&
            // $this->registerHook('actionExportGDPRData') &&
            $this->_useDefault();

        return $result;
	}
    function uninstall()
	{
		return $this->_deleteConfiguration() && parent::uninstall();
	}

    private function _deleteConfiguration()
    {
        $res = true;
        foreach($this->defaults as $k=>$v)
            $res &= Configuration::deleteByName($this->_prefix_st.strtoupper($k));
        return $res;
    }
    private function _useDefault($html = false, $id_shop_group = null, $id_shop = null)
    {
        $res = true;
        $defaults_copy = $this->defaults;
        foreach($this->syn_items as $item)
            unset($defaults_copy[Tools::strtolower($item)]);

        $this->_synWithPS(0);

        foreach($defaults_copy as $k=>$v)
            $res &= Configuration::updateValue($this->_prefix_st.strtoupper($k), $v['val'], $html, $id_shop_group, $id_shop);
        return $res;
    }

    private function _synWithPS($syn)
    {
        if($syn)
            foreach($this->syn_items as $item) {

                /*
                    iWeb - moduł trzyma id_reference a presta ID - 2020-09-02
                */
                if ( $item == 'CARRIER_DEFAULT' ) {
                    $carrier = Carrier::getCarrierByReference(Configuration::get($this->_prefix_st.$item));
                    if ( !empty($carrier->id) ) {
                        Configuration::updateValue('PS_'.$item, $carrier->id);
                        continue;
                    }
                }


                Configuration::updateValue('PS_'.$item, Configuration::get($this->_prefix_st.$item));
            }
        else
            foreach($this->syn_items as $item)
                Configuration::updateValue($this->_prefix_st.$item, Configuration::get('PS_'.$item));
    }

    public function uploadCheckAndGetName($name)
    {
        $type = strtolower(substr(strrchr($name, '.'), 1));
        if(!in_array($type, $this->imgtype))
            return false;
        $filename = Tools::encrypt($name.sha1(microtime()));
        while (file_exists(_PS_UPLOAD_DIR_.$this->name.'/'.$filename.'.'.$type)) {
            $filename .= rand(10, 99);
        } 
        return $filename.'.'.$type;
    }
    private function _checkImageDir($dir)
    {
        $result = '';
        if (!file_exists($dir))
        {
            $success = @mkdir($dir, self::$access_rights, true)
                        || @chmod($dir, self::$access_rights);
            if(!$success)
                $result = $this->displayError('"'.$dir.'" '.$this->l('An error occurred during new folder creation'));
        }

        if (!is_writable($dir))
            $result = $this->displayError('"'.$dir.'" '.$this->l('directory isn\'t writable.'));
        
        return $result;
    }
	public function getContent()
    {
        $this->registerHook('displayAdminOrder');

        global $license;
        require_once(_PS_MODULE_DIR_.$this->name.'/classes/StModuleLicense.php');
        $license = StModuleLicense::getInstance($this);
        $this->context->controller->addCSS(($this->_path).'views/css/admin.css');
        $this->context->controller->addCSS($this->_path.'views/font/fontello-codes.css');
        $this->context->controller->addJS(($this->_path).'views/js/admin.js');

        Media::addJsDef(array(
            'module_name' => $this->name,
            'st_upgrade_warning_1' => $this->l('Warning: If you have modified any module files directly, you will lose your modifications, you need to re-do them after upgrade. Do you want to continue ?'),
            'st_upgrade_warning_2' => $this->l('Have you made a full backup the module ? Click the [Yes] button to continue.'),
        ));
        $this->_html .= '<script type="text/javascript">var systemFonts = \''.implode(',',$this->systemFonts).'\'; var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';</script>';
        if (Tools::isSubmit('export'.$this->name))
        {
            $this->_html .= $this->export();
        }
        if (Tools::isSubmit('download'.$this->name))
        {
            $file = Tools::getValue('file');
            if (file_exists($this->_config_folder.$file))
            {
                if (ob_get_length() > 0)
                    ob_end_clean();

                ob_start();
                header('Pragma: public');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Cache-Control: public');
                header('Content-Description: File Transfer');
                header('Content-type:text/xml');
                header('Content-Disposition: attachment; filename="'.$file.'"');
                ob_end_flush();
                readfile($this->_config_folder.$file);
                exit;
            }
        }
        if (Tools::isSubmit('upload'.$this->name))
        {
            if (isset($_FILES['xml_config_file_field']) && $_FILES['xml_config_file_field']['tmp_name'] && !$_FILES['xml_config_file_field']['error'])
            {
                $error = '';
                $folder = $this->_config_folder;
                if (!is_dir($folder))
                    $error = $this->displayError('"'.$folder.'" '.$this->l('directory isn\'t exists.'));
                elseif (!is_writable($folder))
                    $error = $this->displayError('"'.$folder.'" '.$this->l('directory isn\'t writable.'));
                
                $file = date('YmdHis').'_'.(int)Shop::getContextShopID().'.xml';
                if (!move_uploaded_file($_FILES['xml_config_file_field']['tmp_name'], $folder.$file))
                    $error = $this->displayError($this->l('Upload config file failed.'));
                else
                {
                    $res = $this->_usePredefined('', $file);
                    if ($res !== 1) {
                        $this->_html .= $res;
                    } else {
                        $this->_clearCache('*');
                        $this->_html .= $this->displayConfirmation($this->l('Imported data success.'));
                    }
                }   
            }
        }
        if (Tools::isSubmit('predefined') && Tools::getValue('predefined'))
        {
            $res = $this->_usePredefined(Tools::getValue('predefined'));
            if ($res !== 1) {
                $this->_html .= $this->displayError($this->l('Error occurred while import configuration:')).$res;
            } else {
                $this->_clearCache('*');
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules'));    
            }
        }
        if(Tools::getValue('act')=='delete_image' && $field=Tools::getValue('field'))
        {
            $field = strtoupper($field);
            @unlink(_PS_UPLOAD_DIR_.Configuration::get($this->_prefix_st.$field));
            Configuration::updateValue($this->_prefix_st.$field, '');
            $result['r'] = true;
            die(json_encode($result));
        }
        if(Tools::getValue('act') == 'update_module' && Tools::getValue('ajax') == 1)
        {
            $result = array(
                'r' => true,
                'm' => $this->displayConfirmation($this->l('Your theme has been upgraded.')),
            );
            $m = $license->upgrade();
            if ($m !== true) {
                $result['r'] = false;
                $result['m'] = $this->displayError($m);
            }
            die(json_encode($result));
        }
        if(Tools::getValue('act') == 'check_update' && Tools::getValue('ajax') == 1)
        {
            $result = array(
                'r' => false,
                'm' => $this->displayConfirmation($this->l('Your theme version is up to date.')),
            );
            $remote_version = $license->checkUpdate(true);
            if ($remote_version === null) {
                $result['m'] = $this->displayError($this->l('Unable to check update.'));
            }
            if($remote_version){
                $result['r'] = true;
                $result['m'] = $this->displayConfirmation(sprintf($this->l('A new version %s is available.'), $remote_version));
            }
            die(json_encode($result));
        }
        $this->fields_form = $this->getFieldsForm();
        if (Tools::isSubmit('save'.$this->name)) {

            if (isset($_POST['custom_css']) && $_POST['custom_css']) {
                $_POST['custom_css'] = str_replace('\\', '¤', $_POST['custom_css']);
            }

            foreach($this->fields_form as $form)
                foreach($form['form']['input'] as $field)
                    if(isset($field['validation']))
                    {
                        $ishtml = ($field['validation']=='isAnything') ? true : false;
                        $errors = array();       
                        $value = Tools::getValue($field['name']);
                        if (isset($field['required']) && $field['required'] && $value==false && (string)$value != '0')
                                $errors[] = sprintf(Tools::displayError('Field "%s" is required.'), $field['label']);
                        elseif($value)
                        {
                            $field_validation = $field['validation'];
                            if (!Validate::$field_validation($value))
                                $errors[] = sprintf(Tools::displayError('Field "%s" is invalid.'), $field['label']);
                        }
                        // Set default value
                        if ($value === false && isset($field['default_value']))
                            $value = $field['default_value'];
                        
                        if(count($errors))
                        {
                            $this->validation_errors = array_merge($this->validation_errors, $errors);
                        }
                        elseif($value==false)
                        {
                            switch($field['validation'])
                            {
                                case 'isUnsignedId':
                                case 'isUnsignedInt':
                                case 'isInt':
                                case 'isBool':
                                    $value = 0;
                                break;
                                case 'isNullOrUnsignedId':
                                    $value = $value==='0' || $value===0 ? '0' : '';
                                break;
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value, $ishtml);
                    }
            $this->_synWithPS(1);

            $this->updateCustomContent();
            $this->updateCatePerRow();
            $this->updateHeadingPaddings();
            
            $this->_checkImageDir(_PS_UPLOAD_DIR_.$this->name.'/');
            $this->updateCarriersLogo();
            $this->updatePaymentMethodsLogo();
            $bg_array = array('section');
            foreach($bg_array as $v)
            {
                if (isset($_FILES[$v.'_bg_image_field']) && isset($_FILES[$v.'_bg_image_field']['tmp_name']) && !empty($_FILES[$v.'_bg_image_field']['tmp_name'])) 
                {
                    if ($error = ImageManager::validateUpload($_FILES[$v.'_bg_image_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                       $this->validation_errors[] = Tools::displayError($error);
                    else 
                    {
                        $footer_image = $this->uploadCheckAndGetName($_FILES[$v.'_bg_image_field']['name']);
                        if(!$footer_image)
                            $this->validation_errors[] = Tools::displayError('Image format not recognized');
                        if (!move_uploaded_file($_FILES[$v.'_bg_image_field']['tmp_name'], _PS_UPLOAD_DIR_.$this->name.'/'.$footer_image))
                            $this->validation_errors[] = Tools::displayError('Error move uploaded file');
                        else
                        {
                           Configuration::updateValue($this->_prefix_st.strtoupper($v).'_BG_IMG', $this->name.'/'.$footer_image);
                        }
                    }
                }
            }
            //                                     
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));

            $this->_clearCache('*');
        }
        $helper = $this->initForm();
        Media::addJsDef(array(
            'id_tab_index' => Tools::getValue('id_tab_index', 0),
        ));
        return $this->_html.$this->initToolbarBtn().'<div class="tabbable row sttab">'.$this->initTab().'<div class="col-xs-12 col-lg-10 tab-content">'.$helper->generateForm($this->fields_form).'</div></div>';
    }
    public function updateCustomContent() {
        $languages = Language::getLanguages();
        $result = $bottom_result = array();
        $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
        foreach ($languages as $language){
            $result[$language['id_lang']] = Tools::getValue('custom_content_' . $language['id_lang']) ? Tools::getValue('custom_content_'.$language['id_lang']) : Tools::getValue('custom_content_'.$defaultLanguage->id);
            $bottom_result[$language['id_lang']] = Tools::getValue('bottom_custom_content_' . $language['id_lang']) ? Tools::getValue('bottom_custom_content_'.$language['id_lang']) : Tools::getValue('bottom_custom_content_'.$defaultLanguage->id);
        }

        /*if(!$result[$defaultLanguage->id])
            $this->validation_errors[] = Tools::displayError('The field "Copyright text" is required at least in '.$defaultLanguage->name);
        else*/
            Configuration::updateValue($this->_prefix_st.'CUSTOM_CONTENT', $result, true);
            Configuration::updateValue($this->_prefix_st.'BOTTOM_CUSTOM_CONTENT', $bottom_result, true);
    }
    public function updateHeadingPaddings() {
        $arr = $this->getMP(1);
        foreach ($arr as $mp)
        {
            $gv = Tools::getValue('heading_paddings_'.$mp['id']);
            if ($gv!==false)
                Configuration::updateValue($this->_prefix_st.strtoupper('HEADING_PADDINGS_'.$mp['id']), $gv);
            $gv = Tools::getValue('carrier_paddings_'.$mp['id']);
            if ($gv!==false)
                Configuration::updateValue($this->_prefix_st.strtoupper('CARRIER_PADDINGS_'.$mp['id']), $gv);
            $gv = Tools::getValue('payment_paddings_'.$mp['id']);
            if ($gv!==false)
                Configuration::updateValue($this->_prefix_st.strtoupper('PAYMENT_PADDINGS_'.$mp['id']), $gv);
        }
    }
    public function updateCatePerRow() {
        $arr = $this->findCateProPer();
        foreach ($arr as $key => $value)
            foreach ($value as $v)
            {
                $gv = Tools::getValue($v['id']);
                if ($gv!==false)
                    Configuration::updateValue($this->_prefix_st.strtoupper($v['id']), $gv);
            }
    }
    public function updateCarriersLogo() {
        $carriers = Carrier::getCarriers($this->context->language->id, true, false, false, null, Carrier::ALL_CARRIERS);
        
        foreach ($carriers as $carrier) {
            $this->uploadLogos('carrier_logo_'.$carrier['id_reference']);
        }
    }
    public function updatePaymentMethodsLogo() {
        $languages = Language::getLanguages();
        $title = $subtitle = $confirming = array();
        $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));

        $payment_methods = $this->getPaymentOptions();
        
        foreach ($payment_methods as $payment_method) {
            $this->uploadLogos('payment_method_logo_'.$payment_method['name']);

            foreach ($languages as $language){
                $title[$language['id_lang']] = Tools::getValue('payment_method_title_'.$payment_method['name'].'_'.$language['id_lang']) ? Tools::getValue('payment_method_title_'.$payment_method['name'].'_'.$language['id_lang']) : Tools::getValue('payment_method_title_'.$payment_method['name'].'_'.$defaultLanguage->id);
                $subtitle[$language['id_lang']] = Tools::getValue('payment_method_subtitle_'.$payment_method['name'].'_'.$language['id_lang']) ? Tools::getValue('payment_method_subtitle_'.$payment_method['name'].'_'.$language['id_lang']) : Tools::getValue('payment_method_subtitle_'.$payment_method['name'].'_'.$defaultLanguage->id);
                $confirming[$language['id_lang']] = Tools::getValue('payment_method_confirming_'.$payment_method['name'].'_'.$language['id_lang']) ? Tools::getValue('payment_method_confirming_'.$payment_method['name'].'_'.$language['id_lang']) : Tools::getValue('payment_method_confirming_'.$payment_method['name'].'_'.$defaultLanguage->id);
        
            }

            Configuration::updateValue($this->_prefix_st.'PAYMENT_METHOD_TITLE_'.Tools::strtoupper($payment_method['name']), $title, true);
            Configuration::updateValue($this->_prefix_st.'PAYMENT_METHOD_SUBTITLE_'.Tools::strtoupper($payment_method['name']), $subtitle, true);
            Configuration::updateValue($this->_prefix_st.'PAYMENT_METHOD_CONFIRMING_'.Tools::strtoupper($payment_method['name']), $confirming, true);
       
        }
    }
    public function uploadLogos($k) {
        if (isset($_FILES[$k]) && isset($_FILES[$k]['tmp_name']) && !empty($_FILES[$k]['tmp_name'])) 
        {
            if ($error = ImageManager::validateUpload($_FILES[$k], Tools::convertBytes(ini_get('upload_max_filesize'))))
               $this->validation_errors[] = Tools::displayError($error);
            else 
            {
                $footer_image = $this->uploadCheckAndGetName($_FILES[$k]['name']);
                if(!$footer_image)
                    $this->validation_errors[] = Tools::displayError('Image format not recognized');
                if (!move_uploaded_file($_FILES[$k]['tmp_name'], _PS_UPLOAD_DIR_.$this->name.'/'.$footer_image))
                    $this->validation_errors[] = Tools::displayError('Error move uploaded file');
                else
                {
                   Configuration::updateValue($this->_prefix_st.strtoupper($k), $this->name.'/'.$footer_image);
                }
            }
        }
    }
    public function initDropListGroup()
    {
        $this->fields_form[7]['form']['input']['columns']['name'] = $this->BuildDropListGroup($this->findCateProPer(1),0,12);
        $this->fields_form[3]['form']['input']['carriers_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(2),1,6);
        $this->fields_form[2]['form']['input']['address_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(3),1,6);
    }
    public function initTab()
    {
        $html = '<div class="st_sidebar col-xs-12 col-lg-2"><ul class="nav nav-tabs">';
        foreach($this->tabs AS $tab)
            $html .= '<li class="nav-item"><a href="javascript:;" title="'.$tab['name'].'" data-fieldset="'.$tab['id'].'">'.$tab['name'].'</a></li>';
        $html .= '</ul></div>';
        return $html;
    }
    public function getFieldsForm(){
        $fields_form = include(_PS_MODULE_DIR_.$this->name.'/steasycheckoutform.php');

        $carriers = Carrier::getCarriers($this->context->language->id, true, false, false, null, Carrier::ALL_CARRIERS);
        $carriers_dropdown = array(
            array('id' => -1, 'name' => $this->l('Best price')),
            array('id' => -2, 'name' => $this->l('Best grade')),
        );
        foreach ($carriers as $key=>$carrier) {
            $carriers_dropdown[] = array('id' => $carrier['id_reference'], 'name' => $carrier['name']);
            $form_k = $key+50;

            $fields_form[$form_k]['form']['legend'] = array(
                'title' => $carrier['name'],
                'icon' => 'icon-cogs'
            );

            $fields_form[$form_k]['form']['input'][$carrier['id_reference']] = array(
                'type' => 'file',
                'label' => $this->l('Logo'),
                'name' => 'carrier_logo_'.$carrier['id_reference'],
                'desc' => '',
            );
            /*$fields_form[$form_k]['form']['input'][] = array(
                'type' => 'color',
                'label' => $this->l('Background color'),
                'name' => 'carrier_bg_'.$carrier['id_reference'],
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
            );
            $fields_form[$form_k]['form']['input'][] = array(
                'type' => 'color',
                'label' => $this->l('Text color'),
                'name' => 'carrier_color_'.$carrier['id_reference'],
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
            );*/


            /*
                iWeb - paczkomaty- 2020-02-16
            */
            $fields_form[$form_k]['form']['input'][] = array(
                'type' => 'switch',
                'label' => $this->l('Paczkomat?'),
                'name' => 'carrier_paczkomat_' . $carrier['id_reference'],
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'carrier_paczkomat_' . $carrier['id_reference'] . '_1',
                        'value' => 1,
                        'label' => $this->l('YES', $name)),
                    array(
                        'id' => 'carrier_paczkomat_' . $carrier['id_reference'] . '_0',
                        'value' => 0,
                        'label' => $this->l('NO', $name)),
                ),
                'validation' => 'isUnsignedInt',
            );


            $this->tabs['carriers']['id'] .= ','.$form_k;
        }

        $fields_form[3]['form']['input']['carrier_default']['options']['query'] = $carriers_dropdown;
        
        $payment_methods = $this->getPaymentOptions();
        foreach ($payment_methods as $key=>$payment_method) {
            $form_k = $key+30;

            $fields_form[$form_k]['form']['legend'] = array(
                'title' => $payment_method['name'],
                'icon' => 'icon-cogs'
            );

            $fields_form[$form_k]['form']['input'][$payment_method['name']] = array(
                'type' => 'file',
                'label' => $payment_method['name'],
                'name' => 'payment_method_logo_'.$payment_method['name'],
                'desc' => '',
            );

            $fields_form[$form_k]['form']['input'][] = array(
                'type' => 'text',
                'label' => $this->l('Title:'),
                'name' => 'payment_method_title_'.$payment_method['name'],
                'size' => 64,
                'lang' => true,
            );
            $fields_form[$form_k]['form']['input'][] = array(
                'type' => 'text',
                'label' => $this->l('Sub title:'),
                'name' => 'payment_method_subtitle_'.$payment_method['name'],
                'size' => 64,
                'lang' => true,
            );
             $fields_form[$form_k]['form']['input'][] = array(
                'type' => 'text',
                'label' => $this->l('The content in the button confirming the order:'),
                'name' => 'payment_method_confirming_'.$payment_method['name'],
                'size' => 64,
                'lang' => true,
            );
            
            $this->tabs['payment_methods']['id'] .= ','.$form_k;
        }
        $payment_modules = PaymentModule::getInstalledPaymentModules();
        $payment_methods_dropdown = array(
            array('id' => 0, 'name' => '--'),
        );
        foreach ($payment_modules as $payment_module) {
            $payment_methods_dropdown[] = array('id' => $payment_module['name'], 'name' => $payment_module['name']);
        }
        $fields_form[4]['form']['input']['default_payment_method']['options']['query']  = $payment_methods_dropdown;

        return $fields_form;
    }

    
    public function BuildInputs($group, $k)
    {
        $html = '<div class="row">';
        foreach($group AS $mp)
        {
             $html .= '<div class="col-xs-4 col-sm-3"><label>'.$mp['label'].'</label>'.
             '<input type="text" name="'.$k.'_'.$mp['id'].'" id="'.$k.'_'.$mp['id'].'" class="fixed-width-md" value="'.(int)Configuration::get($this->_prefix_st.strtoupper($k.'_'.$mp['id'])).'"></div>';
        }
        return $html.'</div>';
    }
    public function getMP($k=null){
        $groups = array(
            0 => array(
                array(
                    'id' => 'm_l',
                    'css_name' => 'margin-left',
                    'label' => $this->l('Left margin'),
                ),
                array(
                    'id' => 'm_t',
                    'css_name' => 'margin-top',
                    'label' => $this->l('Top margin'),
                ),
                array(
                    'id' => 'm_r',
                    'css_name' => 'margin-right',
                    'label' => $this->l('Right margin'),
                ),
                array(
                    'id' => 'm_b',
                    'css_name' => 'margin-bottom',
                    'label' => $this->l('Bottom margin'),
                ),
            ),
            1 => array(
                array(
                    'id' => 'p_l',
                    'css_name' => 'padding-left',
                    'label' => $this->l('Left padding'),
                ),
                array(
                    'id' => 'p_t',
                    'css_name' => 'padding-top',
                    'label' => $this->l('Top padding'),
                ),
                array(
                    'id' => 'p_r',
                    'css_name' => 'padding-right',
                    'label' => $this->l('Right padding'),
                ),
                array(
                    'id' => 'p_b',
                    'css_name' => 'padding-bottom',
                    'label' => $this->l('Bottom padding'),
                ),
            ),
        );

        return ($k!==null && isset($groups[$k])) ? $groups[$k] : $groups;
    }
	public function initForm()
	{		
        $this->initDropListGroup();
        $this->fields_form[9]['form']['input']['heading_paddings']['name'] = $this->BuildInputs($this->getMP(1), 'heading_paddings');
     // $this->fields_form[19]['form']['input']['carrier_paddings']['name'] = $this->BuildInputs($this->getMP(1), 'carrier_paddings');
        $this->fields_form[13]['form']['input']['payment_paddings']['name'] = $this->BuildInputs($this->getMP(1), 'payment_paddings');

        if (Configuration::get($this->_prefix_st.'SECTION_BG_IMG') != "") {
            $this->fields_form[8]['form']['input']['section_bg_image_field']['image'] = $this->getImageHtml(_THEME_PROD_PIC_DIR_.Configuration::get($this->_prefix_st.'SECTION_BG_IMG'), 'section_bg_img');
        }
        foreach (array('font_text'=>11, 'font_heading'=>9, 'font_step_number'=>24, 'font_carrier'=>19, 'font_payment'=>13, 'font_subheading'=>20) as $font=>$wf) {
            if ($font_menu_string = Configuration::get($this->_prefix_st.strtoupper($font))) {
                $font_menu = explode(":", $font_menu_string);
                $font_menu = $font_menu[0];
                $font_menu_key = str_replace(' ', '_', $font_menu);
            }
            else
            {
                $font_menu_key = $font_menu = $this->_font_inherit;
            }
            if(array_key_exists($font_menu_key, $this->googleFonts))
            {
                $font_menu_array = array(
                    $font_menu.':700' => '700',
                    $font_menu.':italic' => 'italic',
                    $font_menu.':700italic' => '700italic',
                );
                foreach ($this->googleFonts[$font_menu_key]['variants'] as $g) {
                    $font_menu_array[$font_menu.':'.$g] = $g;
                }
                foreach($font_menu_array AS $value){
                    $this->fields_form[$wf]['form']['input'][$font]['options']['query'][] = array(
                            'id'=> $font_menu.':'.($value=='regular' ? '400' : $value),
                            'name'=> $value,
                        );
                }
            }
            else
            {
                $this->fields_form[$wf]['form']['input'][$font]['options']['query'] = array(
                    array('id'=> $font_menu,'name'=>'Normal'),
                    array('id'=> $font_menu.':700','name'=>'Bold'),
                    array('id'=> $font_menu.':italic','name'=>'Italic'),
                    array('id'=> $font_menu.':700italic','name'=>'Bold & Italic'),
                );
            }  
        }
        $carriers = Carrier::getCarriers($this->context->language->id, true, false, false, null, Carrier::ALL_CARRIERS);
        foreach ($carriers as $key=>$carrier) {
            $form_k = $key+50;
            if (Configuration::get($this->_prefix_st.'CARRIER_LOGO_'.$carrier['id_reference']) != "") {
                $this->fields_form[$form_k]['form']['input'][$carrier['id_reference']]['image'] = $this->getImageHtml(_THEME_PROD_PIC_DIR_.Configuration::get($this->_prefix_st.'CARRIER_LOGO_'.$carrier['id_reference']), 'carrier_logo_'.$carrier['id_reference']);
            }
        }
        
        $payment_methods = $this->getPaymentOptions();
        foreach ($payment_methods as $key=>$payment_method) {
            $form_k = $key+30;
            if (Configuration::get($this->_prefix_st.'PAYMENT_METHOD_LOGO_'.Tools::strtoupper($payment_method['name'])) != "") {
                $this->fields_form[$form_k]['form']['input'][$payment_method['name']]['image'] = $this->getImageHtml(_THEME_PROD_PIC_DIR_.Configuration::get($this->_prefix_st.'PAYMENT_METHOD_LOGO_'.Tools::strtoupper($payment_method['name'])), 'payment_method_logo_'.$payment_method['name']);
            }
        }
		$helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'save'.$this->name;
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

        return $helper;
	}
    private function getPaymentOptions(){
        $payment_methods = PaymentModule::getInstalledPaymentModules();
        $payment_options = array();
        foreach ($payment_methods as $payment_method) {
            $payment_options[] = $payment_method;
            if ($payment_method['name']=='paypal') {
                $method_active = Configuration::get('PAYPAL_METHOD');
                switch ($method_active) {
                    case 'EC':
                        if (Configuration::get('PAYPAL_API_CARD')) {
                            $payment_options[] = $payment_method;
                            $payment_options[count($payment_options)-1]['id_module'] = 'api_card_'.$payment_method['id_module'];
                            $payment_options[count($payment_options)-1]['name'] = 'api_card';
                        }
                    break;
                    case 'BT':
                        $payment_options[count($payment_options)-1]['name'] = 'braintree';
                    break;
                    case 'PPP':
                        $payment_options[count($payment_options)-1]['name'] = 'paypal_plus';
                    break;
                }
            }
        }
        return $payment_options;
    }
    public function getImageHtml($src, $id)
    {
        $html = '';
        if ($src && $id)
            $html .= '
            <img src="'.$src.'" class="img_preview">
            <p>
                <a data-field="'.$id.'" href="javascript:;" class="btn btn-default st_delete_image"><i class="icon-trash"></i> '.$this->l('Delete').'</a>
            </p>
            ';
        return $html;    
    }
	public function getConfigFieldsValues($type=0)
	{
		$fields_values = array();

        foreach($this->defaults as $k=>$v)
        {
            $fields_values[$k] = Configuration::get($this->_prefix_st.strtoupper($k));
            if (isset($v['esc']) && $v['esc'])
                $fields_values[$k] = html_entity_decode($fields_values[$k]);
        }
        if (isset($fields_values['custom_css']) && $fields_values['custom_css'])
            $fields_values['custom_css'] = str_replace('¤', '\\', $fields_values['custom_css']); 

        $languages = Language::getLanguages(false);
        $fields_values['custom_content'] = $fields_values['bottom_custom_content'] = array(); 
        foreach ($languages as $language)
        {
            $fields_values['custom_content'][$language['id_lang']] = html_entity_decode(Configuration::get($this->_prefix_st.'CUSTOM_CONTENT', $language['id_lang']));
            $fields_values['bottom_custom_content'][$language['id_lang']] = html_entity_decode(Configuration::get($this->_prefix_st.'BOTTOM_CUSTOM_CONTENT', $language['id_lang']));
        }

        $payment_methods = $this->getPaymentOptions();
        foreach ($payment_methods as $key=>$payment_method) {
            $form_k = $key+30;
            foreach ($languages as $language)
            {
                $fields_values['payment_method_title_'.$payment_method['name']][$language['id_lang']] = html_entity_decode(Configuration::get($this->_prefix_st.'PAYMENT_METHOD_TITLE_'.Tools::strtoupper($payment_method['name']), $language['id_lang'])); 
                $fields_values['payment_method_subtitle_'.$payment_method['name']][$language['id_lang']] = html_entity_decode(Configuration::get($this->_prefix_st.'PAYMENT_METHOD_SUBTITLE_'.Tools::strtoupper($payment_method['name']), $language['id_lang'])); 
                $fields_values['payment_method_confirming_'.$payment_method['name']][$language['id_lang']] = html_entity_decode(Configuration::get($this->_prefix_st.'PAYMENT_METHOD_CONFIRMING_'.Tools::strtoupper($payment_method['name']), $language['id_lang'])); 
      
            }
        }

        $font_text_string = Configuration::get($this->_prefix_st.'FONT_TEXT');
        $font_text_string && $font_text_string = explode(":", $font_text_string);
        $fields_values['font_text_list'] = $font_text_string ? $font_text_string[0] : '';
        
        $font_heading_string = Configuration::get($this->_prefix_st.'FONT_HEADING');
        $font_heading_string && $font_heading_string = explode(":", $font_heading_string);
        $fields_values['font_heading_list'] = $font_heading_string ? $font_heading_string[0] : '';

        $pro_step_number_string = Configuration::get($this->_prefix_st.'FONT_STEP_NUMBER');
        $pro_step_number_string && $pro_step_number_string = explode(":", $pro_step_number_string);
        $fields_values['font_step_number_list'] = $pro_step_number_string ? $pro_step_number_string[0] : '';

        $pro_carrier_string = Configuration::get($this->_prefix_st.'FONT_CARRIER');
        $pro_carrier_string && $pro_carrier_string = explode(":", $pro_carrier_string);
        $fields_values['font_carrier_list'] = $pro_carrier_string ? $pro_carrier_string[0] : '';

        $pro_payment_string = Configuration::get($this->_prefix_st.'FONT_PAYMENT');
        $pro_payment_string && $pro_payment_string = explode(":", $pro_payment_string);
        $fields_values['font_payment_list'] = $pro_payment_string ? $pro_payment_string[0] : '';

        $subheading_string = Configuration::get($this->_prefix_st.'FONT_SUBHEADING');
        $subheading_string && $subheading_string = explode(":", $subheading_string);
        $fields_values['font_subheading_list'] = $subheading_string ? $subheading_string[0] : '';

        $arr = $this->getMP(1);
        foreach ($arr as $mp){
            $fields_values['heading_paddings_'.$mp['id']] = Configuration::get($this->_prefix_st.strtoupper('heading_paddings_'.$mp['id']));
            $fields_values['carrier_paddings_'.$mp['id']] = Configuration::get($this->_prefix_st.strtoupper('carrier_paddings_'.$mp['id']));
            $fields_values['payment_paddings'.$mp['id']] = Configuration::get($this->_prefix_st.strtoupper('payment_paddings'.$mp['id']));
        }

        $carriers = Carrier::getCarriers($this->context->language->id, true, false, false, null, Carrier::ALL_CARRIERS);
        foreach ($carriers as $carrier) {
            // $fields_values['carrier_bg_'.$carrier['id_reference']] = Configuration::get($this->_prefix_st.'CARRIER_BG_'.$carrier['id_reference']);
            // $fields_values['carrier_color_'.$carrier['id_reference']] = Configuration::get($this->_prefix_st.'CARRIER_COLOR_'.$carrier['id_reference']);
            
            $fields_values['carrier_paczkomat_'.$carrier['id_reference']] = Configuration::get($this->_prefix_st.'CARRIER_PACZKOMAT_'.$carrier['id_reference']);
        }

        $fields_values['id_tab_index'] = Tools::getValue('id_tab_index', 0);

        return $fields_values;
	}
    public function getVals($type=false){
        $vals = array();
        if(!$type)
            return $vals;
        foreach($this->defaults as $k=>$v)
        {
            if(isset($v[$type]))
                $vals[$k] = Configuration::get($this->_prefix_st.strtoupper($k));
        }

        if($type=='smarty_val'){
            $vals['columns'][$vals['login_block']][] = 'personal_information';
            $vals['columns'][$vals['display_cart']][] = 'cart';
            $vals['columns'][$vals['delivery_block']][] = 'delivery';
            $vals['columns'][$vals['payment_block']][] = 'payment';
            $vals['columns'][$vals['summary_block']][] = 'summary';
            $vals['columns'][$vals['summary_address_block']][] = 'summary_address';
            // $vals['columns'][$vals['order_block']][] = 'order';
            $vals['columns'][$vals['reassurance']][] = 'reassurance';
            ksort($vals['columns']);
          //  $vals['column_2'] = Tools::ps_round(($vals['column_2']*12)/(12-$vals['column_1']));
           // $vals['column_3'] = 12-$vals['column_2'];

            $vals['custom_content'] = html_entity_decode(Configuration::get($this->_prefix_st.'CUSTOM_CONTENT', $this->context->language->id));
            $vals['bottom_custom_content'] = html_entity_decode(Configuration::get($this->_prefix_st.'BOTTOM_CUSTOM_CONTENT', $this->context->language->id));
        }

        // echo '<pre>';
        // print_r($vals);
        // echo '</pre>';
        return $vals;
    }
    public function hookDisplayHeader($params)
    {
        if(Configuration::get($this->_prefix_st.'DISABLE'))
            return;
        if ($this->context->controller->php_self=='cart' && 'show' == Tools::getValue('action') && !$this->context->controller->ajax && !count($this->context->controller->errors) && Configuration::get($this->_prefix_st.'SKIP_SHOPPING_CART') && $this->context->cart->nbProducts() > 0) {
            Tools::redirect(
                $this->context->link->getModuleLink(
                    $this->name,
                    'default',
                    array(),
                    (bool) Configuration::get('PS_SSL_ENABLED')
                )
            );
        }

        $this->redirectToEasyCheckout();

        //don't load files when not in the ec page.
        $page = Context::getContext()->smarty->getTemplateVars('page');
        if($page['page_name']!='module-steasycheckout-default')
            return;

        $vals = array();
        $vals['js_val'] = array(
            'urls' => array(
                'personal_information' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'personal_information'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'addresses' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'addresses'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'delivery' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'delivery'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'payment' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'payment'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'summary' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'summary'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'summary_address' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'summary_address'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'update' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'update'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'cart' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'cart_detailed'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'select_payment_method' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'select_payment_method'),(bool)Configuration::get('PS_SSL_ENABLED')),


                /*
                    iWeb - paczkomaty - 2020-02-29
                */
                'select_paczkomat' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'select_paczkomat'),(bool)Configuration::get('PS_SSL_ENABLED')),


                'set_message' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'set_message'),(bool)Configuration::get('PS_SSL_ENABLED')),
                'validate_address' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'validate_address'),(bool)Configuration::get('PS_SSL_ENABLED')),
                // 'voucher' => $this->context->link->getModuleLink($this->name,'default',array('action' => 'voucher'),(bool) Configuration::get('PS_SSL_ENABLED')),
            ),
            'price' => Tools::displayPrice(12345678.123),
        );
        $vals['js_val'] = array_merge($this->getVals('js_val'), $vals['js_val']);

        $this->context->controller->addJS($this->_path.'views/js/front.js');
        $this->context->controller->addCSS($this->_path.'views/css/front.css');
        $this->context->controller->addCSS($this->_path.'views/font/fontello-codes.css');
        $this->context->controller->addJS($this->_path.'views/js/front.js');
        $this->context->controller->addJS($this->_path.'views/js/moment.min.js');

        $template_file = 'module:steasycheckout/views/templates/hook/header.tpl';
        if (!$this->isCached($template_file, $this->getCacheId())) {
            $css = '';
            $prefix = '.steco_container';

            $column_gap = Configuration::get($this->_prefix_st.'COLUMN_GAP');
            if($column_gap==='0' || $column_gap){
                $css .= '@media (min-width: 992px){'; 
                $css .= $prefix.' .row.steco_row{margin-right: -'.$column_gap.'px;margin-left: -'.$column_gap.'px;}'; 
                $css .= $prefix.' .row .steco_col{padding-right: '.$column_gap.'px;padding-left: '.$column_gap.'px;}'; 
                $css .= '.steco_fouth_column{margin-top: '.$column_gap.'px;}'; 
                $css .= '}'; 
            }

            if($column_bg = Configuration::get($this->_prefix_st.'COLUMN_BG'))
                $css .= '.steco_column_section{background-color:'.$column_bg.';}';
            $column_tb_padding = Configuration::get($this->_prefix_st.'COLUMN_TB_PADDING');
            if($column_tb_padding || $column_tb_padding===0 || $column_tb_padding==='0')
                $css .= '.steco_block{padding-top:'.$column_tb_padding.'px;padding-bottom:'.$column_tb_padding.'px;}#steco_progress{bottom:'.$column_tb_padding.'px;}';
            $column_rl_padding = Configuration::get($this->_prefix_st.'COLUMN_RL_PADDING');
            if($column_rl_padding || $column_rl_padding===0 || $column_rl_padding==='0')
                $css .= '.steco_block{padding-right:'.$column_rl_padding.'px;padding-left:'.$column_rl_padding.'px;}'; 

            if($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR'))
                $css .= $prefix.','.$prefix.' .price{color:'.$text_color.';}'; 
            if($link_color = Configuration::get($this->_prefix_st.'LINK_COLOR'))
                $css .= $prefix.' a{color:'.$link_color.';}'; 
            if($link_hover_color = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR'))
                $css .= $prefix.' a:hover{color:'.$link_hover_color.';}'; 

            if($bg_color = Configuration::get($this->_prefix_st.'BG_COLOR'))
                $css .= '#module-steasycheckout-default #wrapper{background-color:'.$bg_color.';}'; 
            if($con_bg_color = Configuration::get($this->_prefix_st.'CON_BG_COLOR'))
                $css .= '#module-steasycheckout-default #wrapper > .container{background-color:'.$con_bg_color.';}'; 

            if (($bg_pattern = Configuration::get($this->_prefix_st.'SECTION_BG_PATTERN')) && (Configuration::get($this->_prefix_st.'SECTION_BG_IMG')=="")){
                $pattern_path = _MODULE_DIR_.$this->name.'/patterns/'.$bg_pattern.'.png';
                $pattern_url = context::getContext()->link->protocol_content.Tools::getMediaServer($pattern_path).$pattern_path;
                $css .= '#module-steasycheckout-default #wrapper{background-image: url('.$pattern_url.');}';
            }
            if ($bg_img = Configuration::get($this->_prefix_st.'SECTION_BG_IMG')) {
                $this->fetchMediaServer($bg_img);
                $css .= '#module-steasycheckout-default #wrapper{background-image:url('.$bg_img.');}';  
            }
            if (Configuration::get($this->_prefix_st.'SECTION_BG_REPEAT')) {
                switch(Configuration::get($this->_prefix_st.'SECTION_BG_REPEAT')) {
                    case 1 :
                        $repeat_option = 'repeat-x';
                        break;
                    case 2 :
                        $repeat_option = 'repeat-y';
                        break;
                    case 3 :
                        $repeat_option = 'no-repeat';
                        break;
                    default :
                        $repeat_option = 'repeat';
                }
                $css .= '#module-steasycheckout-default #wrapper{background-repeat:'.$repeat_option.';}';
            }
            if (Configuration::get($this->_prefix_st.'SECTION_BG_POSITION')) {
                switch(Configuration::get($this->_prefix_st.'SECTION_BG_POSITION')) {
                    case 1 :
                        $position_option = 'center top';
                        break;
                    case 2 :
                        $position_option = 'right top';
                        break;
                    default :
                        $position_option = 'left top';
                }
                $css .= '#module-steasycheckout-default #wrapper{background-position: '.$position_option.';}';
            }
            if (Configuration::get($this->_prefix_st.'SECTION_BG_COVER')) {
                $css .= '#module-steasycheckout-default #wrapper{background-size: cover;}';
            }

            if($heading_color = Configuration::get($this->_prefix_st.'HEADING_COLOR'))
                $css .= '.steco_heading{color:'.$heading_color.';}'; 
            if($heading_size = Configuration::get($this->_prefix_st.'HEADING_SIZE'))
                $css .= '.steco_heading{font-size:'.$heading_size.'px;}'; 
            if($heading_bg = Configuration::get($this->_prefix_st.'HEADING_BG'))
                $css .= '.steco_heading{background-color:'.$heading_bg.';}'; 
            if($font_heading_trans = Configuration::get($this->_prefix_st.'FONT_HEADING_TRANS'))
                $css .= '.steco_heading{text-transform: '.self::$textTransform[(int)$font_heading_trans]['name'].';}'; 

            $arr = $this->getMP(1);
            foreach ($arr as $mp){
                $css .= '.steco_heading{'.$mp['css_name'].':'.Configuration::get($this->_prefix_st.strtoupper('heading_paddings_'.$mp['id'])).'px;}';
              //$css .= '.steco-delivery-option{'.$mp['css_name'].':'.Configuration::get($this->_prefix_st.strtoupper('carrier_paddings_'.$mp['id'])).'px;}';
              //$css .= '.steco-payment-option .payment-option label{'.$mp['css_name'].':'.Configuration::get($this->_prefix_st.strtoupper('payment_paddings_'.$mp['id'])).'px;}';
            }

            if($step_number_color = Configuration::get($this->_prefix_st.'STEP_NUMBER_COLOR'))
                $css .= '.steco_step_number{color:'.$step_number_color.';}'; 
            if($step_number_bg = Configuration::get($this->_prefix_st.'STEP_NUMBER_BG'))
                $css .= '.steco_step_number{background-color:'.$step_number_bg.';}'; 
            if($step_number_text_size = Configuration::get($this->_prefix_st.'STEP_NUMBER_TEXT_SIZE'))
                $css .= '.steco_step_number{font-size:'.$step_number_text_size.'px;}'; 
            if($step_number_width = Configuration::get($this->_prefix_st.'STEP_NUMBER_WIDTH'))
                $css .= '.steco_step_number{width:'.$step_number_width.'px;}'; 
            if($step_number_height = Configuration::get($this->_prefix_st.'STEP_NUMBER_HEIGHT'))
                $css .= '.steco_step_number{height:'.$step_number_height.'px;line-height:'.$step_number_height.'px;}'; 
            $css .= '.steco_step_number{border-radius:'.(int)Configuration::get($this->_prefix_st.'STEP_NUMBER_RADIUS').'px;}'; 
            if($step_number_padding = Configuration::get($this->_prefix_st.'STEP_NUMBER_PADDING'))
                $css .= '.steco_step_number{padding:'.$step_number_padding.'px;}'; 
            if($step_number_border = Configuration::get($this->_prefix_st.'step_number_border'))
                $css .= '.steco_step_number{border-width:'.$step_number_border.'px;}'; 
            if($step_number_border_color = Configuration::get($this->_prefix_st.'step_number_border_color'))
                $css .= '.steco_step_number{border-color:'.$step_number_border_color.';}'; 
            
            if(Configuration::get($this->_prefix_st.'COLUMN_SHADOW'))
            {
                $pro_shadow_color = Configuration::get($this->_prefix_st.'COLUMN_SHADOW_COLOR');
                if(!Validate::isColor($pro_shadow_color))
                    $pro_shadow_color = '#000000';

                $pro_shadow_color_arr = self::hex2rgb($pro_shadow_color);
                if(is_array($pro_shadow_color_arr))
                {
                    $pro_shadow_opacity = (float)Configuration::get($this->_prefix_st.'COLUMN_SHADOW_OPACITY');
                    if($pro_shadow_opacity<0 || $pro_shadow_opacity>1)
                        $pro_shadow_opacity = 0.1;

                    $pro_h_shadow = (int)Configuration::get($this->_prefix_st.'COLUMN_H_SHADOW');
                    $pro_v_shadow = (int)Configuration::get($this->_prefix_st.'COLUMN_V_SHADOW');
                    $pro_shadow_blur = (int)Configuration::get($this->_prefix_st.'COLUMN_SHADOW_BLUR');

                    $pro_shadow_css = $pro_h_shadow.'px '.$pro_v_shadow.'px '.$pro_shadow_blur.'px rgba('.$pro_shadow_color_arr[0].','.$pro_shadow_color_arr[1].','.$pro_shadow_color_arr[2].','.$pro_shadow_opacity.')';
                    
                    $css .= '.steco_column_section{-webkit-box-shadow: '.$pro_shadow_css .'; -moz-box-shadow: '.$pro_shadow_css .'; box-shadow: '.$pro_shadow_css .'; }';
                }
            }

            if($column_border = Configuration::get($this->_prefix_st.'COLUMN_BORDER'))
                $css .= '.steco_divider>[class*="col-"]:nth-child(n+2):before{border-left-width:'.$column_border.'px;border-left-color:'.(Configuration::get($this->_prefix_st.'COLUMN_BORDER')?:'#f2f2f2').';}';  
            //
            $fontText = $fontHeading = $fontStepNumber = $fontCarrier = $fontPayment = $fontSubheading = '';
            $fontTextWeight = $fontHeadingWeight = $fontStepNumberWeight = $fontCarrierWeight = $fontPaymentWeight = $fontSubheadingWeight = '';
            $fontTextStyle = $fontHeadingStyle = $fontStepNumberStyle = $fontCarrierStyle = $fontPaymentStyle = $fontSubheadingStyle = '';

            if($fontTextString = Configuration::get($this->_prefix_st.'FONT_TEXT'))
            {
                preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontTextString, $fontTextArr);
                $fontText = $fontTextArr[1][0];
                $fontTextArr[2][0] && $fontTextWeight = 'font-weight:'.$fontTextArr[2][0].';';
                $fontTextArr[3][0] && $fontTextStyle = 'font-style:'.$fontTextArr[3][0].';';
            }
            if($fontHeadingString = Configuration::get($this->_prefix_st.'FONT_HEADING'))
            {
                preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontHeadingString, $fontHeadingArr);
                $fontHeading = $fontHeadingArr[1][0];
                $fontHeadingArr[2][0] && $fontHeadingWeight = 'font-weight:'.$fontHeadingArr[2][0].';';
                $fontHeadingArr[3][0] && $fontHeadingStyle = 'font-style:'.$fontHeadingArr[3][0].';';
            }
            if($fontStepNumberString = Configuration::get($this->_prefix_st.'FONT_STEP_NUMBER'))
            {
                preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontStepNumberString, $fontStepNumberArr);
                $fontStepNumber = $fontStepNumberArr[1][0];
                $fontStepNumberArr[2][0] && $fontStepNumberWeight = 'font-weight:'.$fontStepNumberArr[2][0].';';
                $fontStepNumberArr[3][0] && $fontStepNumberStyle = 'font-style:'.$fontStepNumberArr[3][0].';';
            }
            if($fontCarrierString = Configuration::get($this->_prefix_st.'FONT_CARRIER'))
            {
                preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontCarrierString, $fontCarrierArr);
                $fontCarrier = $fontCarrierArr[1][0];
                $fontCarrierArr[2][0] && $fontCarrierWeight = 'font-weight:'.$fontCarrierArr[2][0].';';
                $fontCarrierArr[3][0] && $fontCarrierStyle = 'font-style:'.$fontCarrierArr[3][0].';';
            }
            if($fontPaymentString = Configuration::get($this->_prefix_st.'FONT_PAYMENT'))
            {
                preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontPaymentString, $fontPaymentArr);
                $fontPayment = $fontPaymentArr[1][0];
                $fontPaymentArr[2][0] && $fontPaymentWeight = 'font-weight:'.$fontPaymentArr[2][0].';';
                $fontPaymentArr[3][0] && $fontPaymentStyle = 'font-style:'.$fontPaymentArr[3][0].';';
            }
            if($fontSubheadingString = Configuration::get($this->_prefix_st.'FONT_SUBHEADING'))
            {
                preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontSubheadingString, $fontSubheadingArr);
                $fontSubheading = $fontSubheadingArr[1][0];
                $fontSubheadingArr[2][0] && $fontSubheadingWeight = 'font-weight:'.$fontSubheadingArr[2][0].';';
                $fontSubheadingArr[3][0] && $fontSubheadingStyle = 'font-style:'.$fontSubheadingArr[3][0].';';
            }

            if($fontText)
               $css .= $prefix.'{'.($fontText != $this->_font_inherit ? 'font-family:'.(preg_match("/[\d\s_]/", $fontText) ? '"'.$fontText.'"' : $fontText).', Tahoma, sans-serif, Arial;' : '').$fontTextWeight.$fontTextStyle.'}';
            if($fontHeading)
               $css .= '.steco_heading{'.($fontHeading != $this->_font_inherit ? 'font-family:'.(preg_match("/[\d\s_]/", $fontHeading) ? '"'.$fontHeading.'"' : $fontHeading).', Tahoma, sans-serif, Arial;' : '').$fontHeadingWeight.$fontHeadingStyle.'}';
            if($fontStepNumber)
               $css .= '.steco_step_number{'.($fontStepNumber != $this->_font_inherit ? 'font-family:'.(preg_match("/[\d\s_]/", $fontStepNumber) ? '"'.$fontStepNumber.'"' : $fontStepNumber).', Tahoma, sans-serif, Arial;' : '').$fontStepNumberWeight.$fontStepNumberStyle.'}';
            if($fontCarrier)
               $css .= '.steco-delivery-option .carrier-name{'.($fontCarrier != $this->_font_inherit ? 'font-family:'.(preg_match("/[\d\s_]/", $fontCarrier) ? '"'.$fontCarrier.'"' : $fontCarrier).', Tahoma, sans-serif, Arial;' : '').$fontCarrierWeight.$fontCarrierStyle.'}';
            if($carrier_title_size = Configuration::get($this->_prefix_st.'CARRIER_TITLE_SIZE'))
                $css .= '.steco-delivery-option .carrier-name{font-size:'.$carrier_title_size.'px;}';
            if($fontPayment)
               $css .= '.steco_payment_option_title{'.($fontPayment != $this->_font_inherit ? 'font-family:'.(preg_match("/[\d\s_]/", $fontPayment) ? '"'.$fontPayment.'"' : $fontPayment).', Tahoma, sans-serif, Arial;' : '').$fontPaymentWeight.$fontPaymentStyle.'}';
            if($payment_title_size = Configuration::get($this->_prefix_st.'PAYMENT_TITLE_SIZE'))
                $css .= '.steco_payment_option_title{font-size:'.$payment_title_size.'px;}';
            if($fontSubheading)
               $css .= '.steco_sub_heading{'.($fontSubheading != $this->_font_inherit ? 'font-family:'.(preg_match("/[\d\s_]/", $fontSubheading) ? '"'.$fontSubheading.'"' : $fontSubheading).', Tahoma, sans-serif, Arial;' : '').$fontSubheadingWeight.$fontSubheadingStyle.'}';
            if($subheading_text_size = Configuration::get($this->_prefix_st.'SUBHEADING_TEXT_SIZE'))
                $css .= '.steco_sub_heading{font-size:'.$subheading_text_size.'px;}';
            if($subheading_color = Configuration::get($this->_prefix_st.'SUBHEADING_COLOR'))
                $css .= '.steco_sub_heading{color:'.$subheading_color.';}';
            //

            if(!Configuration::get($this->_prefix_st.'CART_PRO_IMAGE'))
                $css .= '.steco_cart .product-line-grid-left{display:none;}';
            if(!Configuration::get($this->_prefix_st.'CART_PRO_NAME'))
                $css .= '.steco_cart .product-line-grid-body{display:none;}';  
            if(!Configuration::get($this->_prefix_st.'CART_PRO_QUANTITY'))
                $css .= '.steco_cart .product-line-grid-right .qty{display:none;}';  
            if(!Configuration::get($this->_prefix_st.'CART_PRO_PRICE'))
                $css .= '.steco_cart .product-line-grid-right .col-md-10 .col-2{display:none;}';  
            if(!Configuration::get($this->_prefix_st.'CART_PRO_REMOVE'))
                $css .= '.steco_cart .product-line-grid-right .col-md-2{display:none;}';  

            if($carriers_color = Configuration::get($this->_prefix_st.'CARRIERS_COLOR'))
                $css .= '.steco-delivery-option,.steco-delivery-option label{color:'.$carriers_color.';}';  
            if($carriers_bg = Configuration::get($this->_prefix_st.'CARRIERS_BG'))
                $css .= '.steco-delivery-option{background-color:'.$carriers_bg.';}'; 
            if($carriers_price_color = Configuration::get($this->_prefix_st.'CARRIERS_PRICE_COLOR'))
                $css .= '.steco-delivery-option label .carrier-price{color:'.$carriers_price_color.';}';  
            if($carriers_color_selected = Configuration::get($this->_prefix_st.'CARRIERS_COLOR_SELECTED'))
                $css .= '.steco-delivery-option.steco_selected, .steco-delivery-option.steco_selected label{color:'.$carriers_color_selected.';}';  
            if($carriers_bg_selected = Configuration::get($this->_prefix_st.'CARRIERS_BG_SELECTED'))
                $css .= '.steco-delivery-option.steco_selected{background-color:'.$carriers_bg_selected.';}'; 
            if($carriers_border = Configuration::get($this->_prefix_st.'CARRIERS_BORDER'))
                $css .= '.steco-delivery-option{border-width:'.$carriers_border.'px;}'; 
            if($carriers_border_color = Configuration::get($this->_prefix_st.'CARRIERS_BORDER_COLOR'))
                $css .= '.steco-delivery-option{border-color:'.$carriers_border_color.';}'; 
            if($carriers_border_color_selected = Configuration::get($this->_prefix_st.'CARRIERS_BORDER_COLOR_SELECTED'))
                $css .= '.steco-delivery-option.steco_selected{border-color:'.$carriers_border_color_selected.';}';

            if($payments_color = Configuration::get($this->_prefix_st.'PAYMENTS_COLOR'))
                $css .= '.steco-payment-option .payment-option label{color:'.$payments_color.';}';  
            if($payments_bg = Configuration::get($this->_prefix_st.'PAYMENTS_BG'))
                $css .= '.steco-payment-option .payment-option label{background-color:'.$payments_bg.';}';  
            if($payments_color_selected = Configuration::get($this->_prefix_st.'PAYMENTS_COLOR_SELECTED'))
                $css .= '.steco-payment-option .payment-option label.steco_selected{color:'.$payments_color_selected.';}';  
            if($payments_bg_selected = Configuration::get($this->_prefix_st.'PAYMENTS_BG_SELECTED'))
                $css .= '.steco-payment-option .payment-option label.steco_selected{background-color:'.$payments_bg_selected.';}'; 
            if($payments_border = Configuration::get($this->_prefix_st.'PAYMENTS_BORDER'))
                $css .= '.steco-payment-option .payment-option label{border-width:'.$payments_border.'px;}'; 
            if($payments_border_color = Configuration::get($this->_prefix_st.'PAYMENTS_BORDER_COLOR'))
                $css .= '.steco-payment-option .payment-option label{border-color:'.$payments_border_color.';}'; 
            if($payments_border_color_selected = Configuration::get($this->_prefix_st.'PAYMENTS_BORDER_COLOR_SELECTED'))
                $css .= '.steco-payment-option .payment-option label.steco_selected{border-color:'.$payments_border_color_selected.';}';

            if($addresses_color = Configuration::get($this->_prefix_st.'ADDRESSES_COLOR'))
                $css .= '.steco-address-item label, .steco-address-item .steco_address_actions a{color:'.$addresses_color.';}';  
            if($addresses_bg = Configuration::get($this->_prefix_st.'ADDRESSES_BG'))
                $css .= '.steco-address-item{background-color:'.$addresses_bg.';}';  
            if($addresses_color_selected = Configuration::get($this->_prefix_st.'ADDRESSES_COLOR_SELECTED'))
                $css .= '.steco-address-item.steco_selected label, .steco-address-item.steco_selected .steco_address_actions a{color:'.$addresses_color_selected.';}';  
            if($addresses_bg_selected = Configuration::get($this->_prefix_st.'ADDRESSES_BG_SELECTED'))
                $css .= '.steco-address-item.steco_selected{background-color:'.$addresses_bg_selected.';}'; 
            if($addresses_border = Configuration::get($this->_prefix_st.'ADDRESSES_BORDER'))
                $css .= '.steco-address-item{border-width:'.$addresses_border.'px;}'; 
            if($addresses_border_color = Configuration::get($this->_prefix_st.'ADDRESSES_BORDER_COLOR'))
                $css .= '.steco-address-item{border-color:'.$addresses_border_color.';}'; 
            if($addresses_border_color_selected = Configuration::get($this->_prefix_st.'ADDRESSES_BORDER_COLOR_SELECTED'))
                $css .= '.steco-address-item.steco_selected{border-color:'.$addresses_border_color_selected.';}';

            if($pi_heading_color = Configuration::get($this->_prefix_st.'PI_HEADING_COLOR'))
                $css .= '#steco_pi_forms > .card > .card-header div.collapsed{color:'.$pi_heading_color.';}';  
            if($pi_heading_bg = Configuration::get($this->_prefix_st.'PI_HEADING_BG'))
                $css .= '#steco_pi_forms > .card > .card-header div.collapsed{background-color:'.$pi_heading_bg.';}';  
            if($pi_heading_color_selected = Configuration::get($this->_prefix_st.'PI_HEADING_COLOR_SELECTED'))
                $css .= '#steco_pi_forms > .card > .card-header div{color:'.$pi_heading_color_selected.';}';  
            if($pi_heading_bg_selected = Configuration::get($this->_prefix_st.'PI_HEADING_BG_SELECTED'))
                $css .= '#steco_pi_forms > .card > .card-header div{background-color:'.$pi_heading_bg_selected.';}'; 
            if($pi_heading_border = Configuration::get($this->_prefix_st.'PI_HEADING_BORDER'))
                $css .= '#steco_pi_forms > .card > .card-header div.collapsed{border-width:'.$pi_heading_border.'px;}'; 
            if($pi_heading_border_color = Configuration::get($this->_prefix_st.'PI_HEADING_BORDER_COLOR'))
                $css .= '#steco_pi_forms > .card > .card-header div.collapsed{border-color:'.$pi_heading_border_color.';}'; 
            if($pi_heading_border_color_selected = Configuration::get($this->_prefix_st.'PI_HEADING_BORDER_COLOR_SELECTED'))
                $css .= '#steco_pi_forms > .card > .card-header div{border-color:'.$pi_heading_border_color_selected.';}';

            if($btn_color = Configuration::get($this->_prefix_st.'BTN_COLOR'))
                $css .= '.btn.steco_btn{color:'.$btn_color.';}';  
            if($btn_bg = Configuration::get($this->_prefix_st.'BTN_BG'))
                $css .= '.btn.steco_btn{background-color:'.$btn_bg.';border-color:'.$btn_bg.';}';  
            if($btn_color_selected = Configuration::get($this->_prefix_st.'BTN_COLOR_SELECTED'))
                $css .= '.btn.steco_btn:hover{color:'.$btn_color_selected.';}';  
            if($btn_bg_selected = Configuration::get($this->_prefix_st.'BTN_BG_SELECTED'))
                $css .= '.btn.steco_btn:hover{background-color:'.$btn_bg_selected.';border-color:'.$btn_bg_selected.';}'; 
            if($btn_border = Configuration::get($this->_prefix_st.'BTN_BORDER'))
                $css .= '.btn.steco_btn{border-width:'.$btn_border.'px;}'; 
            if($btn_border_color = Configuration::get($this->_prefix_st.'BTN_BORDER_COLOR'))
                $css .= '.btn.steco_btn{border-color:'.$btn_border_color.';}'; 
            if($btn_border_color_selected = Configuration::get($this->_prefix_st.'BTN_BORDER_COLOR_SELECTED'))
                $css .= '.btn.steco_btn:hover{border-color:'.$btn_border_color_selected.';}';

           // $css .= '#module-steasycheckout-default #wrapper{padding-top:'.(int)Configuration::get($this->_prefix_st.'TOP_SPACING').'px;}'; 
         //   $css .= '#module-steasycheckout-default #wrapper{padding-bottom:'.(int)Configuration::get($this->_prefix_st.'BOTTOM_SPACING').'px;}';

            if($radio_checkbox_color = Configuration::get($this->_prefix_st.'RADIO_CHECKBOX_COLOR'))
                $css .= '.steco-custom-input-box.steco-tick .steco-custom-input-item i{color:'.$radio_checkbox_color.';}';
            if($radio_checkbox_bg = Configuration::get($this->_prefix_st.'RADIO_CHECKBOX_BG'))
                $css .= '.steco-custom-input-box.steco-tick .steco-custom-input-item,.steco-custom-input-box.steco-tick:hover .steco-custom-input-item.steco-custom-input-radio, .steco_selected.steco-input-loading .steco-custom-input-box.steco-tick .steco-custom-input-item.steco-custom-input-radio{background-color:'.$radio_checkbox_bg.';}'; 
            if($radio_checkbox_color_active = Configuration::get($this->_prefix_st.'RADIO_CHECKBOX_COLOR_ACTIVE'))
                $css .= '.steco-custom-input-box.steco-tick input[type=radio]:checked+.steco-custom-input-item i{color:'.$radio_checkbox_color_active.';}';
            if($radio_checkbox_bg_active = Configuration::get($this->_prefix_st.'RADIO_CHECKBOX_BG_ACTIVE'))
                $css .= '.steco-custom-input-box.steco-tick input[type=radio]:checked+.steco-custom-input-item,.steco-custom-input-box.steco-tick:hover .steco-custom-input-item{background-color:'.$radio_checkbox_bg_active.';}';

            $tick_border_size = Configuration::get($this->_prefix_st.'TICK_BORDER_SIZE');
            $css .= '.steco-custom-input-box.steco-tick .steco-custom-input-item{border-width:'.$tick_border_size.'px;}';   
            if(!$tick_border_size)         
                $css .= '.steco-custom-input-box.steco-tick .steco-custom-input-item{line-height:15px;}';//default line height when border is 0

            if($tick_border_color = Configuration::get($this->_prefix_st.'TICK_BORDER_COLOR'))
                $css .= '.steco-custom-input-box.steco-tick .steco-custom-input-item{border-color:'.$tick_border_color.';}';
            if($tick_size = Configuration::get($this->_prefix_st.'TICK_SIZE'))
            {
                $css .= '.steco-custom-input-box.steco-tick .steco-custom-input-item i{font-size:'.$tick_size.'px;}';
                $tick_box_size = Tools::ps_round($tick_size*1.2);
                $css .= '.steco-custom-input-box.steco-tick .steco-custom-input-item{height:'.$tick_box_size.'px;line-height:'.($tick_box_size-2*$tick_border_size).'px;width:'.$tick_box_size.'px;}';
            }
           // $tick_icon = Configuration::get($this->_prefix_st.'TICK_ICON');
            //if($tick_icon && $tick_icon!='eco-ok'){
            //    $icons = $this->get_fontello()['classes'];
           //     $icon_hex = array_search($tick_icon, $icons);
           //     $css .= '.steco-custom-input-box.steco-tick .steco-custom-input-item i.eco-ok:before{ content: "\\'.dechex($icon_hex).'"; }';
           // }elseif(!$tick_icon){
           //     $css .= '.steco-custom-input-box.steco-tick input[type=radio]:checked+.steco-custom-input-item .checkbox-checked{ display:none; }';
           // }

            if($pi_text_color = Configuration::get($this->_prefix_st.'PI_TEXT_COLOR'))
                $css .= '.steco_personal_information {color:'.$pi_text_color.';}';
            if($pi_link_color = Configuration::get($this->_prefix_st.'PI_LINK_COLOR'))
                $css .= '.steco_personal_information a{color:'.$pi_link_color.';}';
            if($pi_link_hover_color = Configuration::get($this->_prefix_st.'PI_LINK_HOVER_COLOR'))
                $css .= '.steco_personal_information a:hover{color:'.$pi_link_hover_color.';}';
            if($pi_bg_color = Configuration::get($this->_prefix_st.'PI_BG_COLOR'))
                $css .= '.steco_personal_information {background-color:'.$pi_bg_color.';}';

            if($custom_content_text_color = Configuration::get($this->_prefix_st.'CUSTOM_CONTENT_TEXT_COLOR'))
                $css .= '.steco_custom_content {color:'.$custom_content_text_color.';}';
            if($custom_content_link_color = Configuration::get($this->_prefix_st.'CUSTOM_CONTENT_LINK_COLOR'))
                $css .= '.steco_custom_content a{color:'.$custom_content_link_color.';}';
            if($custom_content_link_hover_color = Configuration::get($this->_prefix_st.'CUSTOM_CONTENT_LINK_HOVER_COLOR'))
                $css .= '.steco_custom_content a:hover{color:'.$custom_content_link_hover_color.';}';
            if($custom_content_bg_color = Configuration::get($this->_prefix_st.'CUSTOM_CONTENT_BG_COLOR'))
                $css .= '.steco_custom_content {background-color:'.$custom_content_bg_color.';}';

            if($address_text_color = Configuration::get($this->_prefix_st.'ADDRESS_TEXT_COLOR'))
                $css .= '.steco_addresses {color:'.$address_text_color.';}';
            if($address_bg_color = Configuration::get($this->_prefix_st.'ADDRESS_BG_COLOR'))
                $css .= '.steco_addresses {background-color:'.$address_bg_color.';}';

            if($carriers_text_color = Configuration::get($this->_prefix_st.'CARRIERS_TEXT_COLOR'))
                $css .= '.steco_delivery {color:'.$carriers_text_color.';}';
            if($carriers_bg_color = Configuration::get($this->_prefix_st.'CARRIERS_BG_COLOR'))
                $css .= '.steco_delivery {background-color:'.$carriers_bg_color.';}';

            if($payments_text_color = Configuration::get($this->_prefix_st.'PAYMENTS_TEXT_COLOR'))
                $css .= '.steco_payment {color:'.$payments_text_color.';}';
            if($payments_bg_color = Configuration::get($this->_prefix_st.'PAYMENTS_BG_COLOR'))
                $css .= '.steco_payment {background-color:'.$payments_bg_color.';}';

            if($cart_text_color = Configuration::get($this->_prefix_st.'CART_TEXT_COLOR'))
                $css .= '.steco_cart {color:'.$cart_text_color.';}';
            if($cart_link_color = Configuration::get($this->_prefix_st.'CART_LINK_COLOR'))
                $css .= '.steco_cart a{color:'.$cart_link_color.';}';
            if($cart_link_hover_color = Configuration::get($this->_prefix_st.'CART_LINK_HOVER_COLOR'))
                $css .= '.steco_cart a:hover{color:'.$cart_link_hover_color.';}';
            if($cart_bg_color = Configuration::get($this->_prefix_st.'CART_BG_COLOR'))
                $css .= '.steco_cart {background-color:'.$cart_bg_color.';}';
            if($cart_price_color = Configuration::get($this->_prefix_st.'CART_PRICE_COLOR'))
                $css .= '.steco_cart .price{color:'.$cart_price_color.';}';

            if($input_color = Configuration::get($this->_prefix_st.'INPUT_COLOR'))
                $css .= '.steco_container input.form-control, .steco_container input.form-control:focus {color:'.$input_color.';}';
            if($input_bg = Configuration::get($this->_prefix_st.'INPUT_BG'))
                $css .= '.steco_container input.form-control {background-color:'.$input_bg.';}';
            if($input_border_color = Configuration::get($this->_prefix_st.'INPUT_BORDER_COLOR'))
                $css .= '.steco_container input.form-control, .steco_container input.form-control:focus {border-color:'.$input_border_color.';}';

            if($overlay_bg = Configuration::get($this->_prefix_st.'OVERLAY_BG')){
                if(!Validate::isColor($overlay_bg))
                    $overlay_bg = '#000000';

                $overlay_bg_arr = self::hex2rgb($overlay_bg);
                if(is_array($overlay_bg_arr))
                {
                    $overlay_opacity = (float)Configuration::get($this->_prefix_st.'OVERLAY_OPACITY');
                    if($overlay_opacity<0 || $overlay_opacity>1)
                        $overlay_opacity = 0.1;

                    $css .= '.steco_column_inner .steco_layer{background-color: rgba('.$overlay_bg_arr[0].','.$overlay_bg_arr[1].','.$overlay_bg_arr[2].','.$overlay_opacity.'); }';
                }
            }
            if($placehoder_color = Configuration::get($this->_prefix_st.'PLACEHODER_COLOR'))
                $css .= '.steco_ph_line{background-color:'.$placehoder_color.';}';
            if($placehoder_bg = Configuration::get($this->_prefix_st.'PLACEHODER_BG')){
                $placehoder_highlight_bg = Configuration::get($this->_prefix_st.'PLACEHODER_HIGHLIGHT_BG');
                if(!Validate::isColor($placehoder_highlight_bg))
                    $placehoder_highlight_bg = '#e9ebee';
                $css .= '.steco_placeholder{background-color:'.$placehoder_bg.';background-image: linear-gradient(to right, '.$placehoder_bg.' 0%, '.$placehoder_highlight_bg.' 20%, '.$placehoder_bg.' 40%, '.$placehoder_bg.' 100%);}';
            }
          //  if(!Configuration::get($this->_prefix_st.'PAYMENT_METHOD_DESCRIPTION'))
          //      $css .= '.steco_payment .additional-information{display:none!important;}';

            if($checkout_bar_color = Configuration::get($this->_prefix_st.'CHECKOUT_BAR_COLOR'))
                $css .= '#steco_progress_bar{background-color:'.$checkout_bar_color.';}';
            if($checkout_bar_bg = Configuration::get($this->_prefix_st.'CHECKOUT_BAR_BG'))
                $css .= '#steco_progress{background-color:'.$checkout_bar_bg.';}';

            if ($custom_css = Configuration::get($this->_prefix_st.'CUSTOM_CSS'))
                $css .= html_entity_decode(str_replace('¤', '\\', $custom_css));

            $this->context->smarty->assign('steasycheckout', array(
                'custom_css' =>  $css,
            ));
        }
        Media::addJsDef(array('steasycheckout' => $vals['js_val']));

        $theme_font = array();
        $theme_font[] = Configuration::get($this->_prefix_st.'FONT_TEXT');
        $theme_font[] = Configuration::get($this->_prefix_st.'FONT_HEADING');
        $theme_font[] = Configuration::get($this->_prefix_st.'FONT_STEP_NUMBER');
        $theme_font[] = Configuration::get($this->_prefix_st.'FONT_CARRIER');
        $theme_font[] = Configuration::get($this->_prefix_st.'FONT_PAYMENT');
        $theme_font[] = Configuration::get($this->_prefix_st.'FONT_SUBHEADING');
        
        $font_latin_support = Configuration::get($this->_prefix_st.'FONT_LATIN_SUPPORT');
        $font_cyrillic_support = Configuration::get($this->_prefix_st.'FONT_CYRILLIC_SUPPORT');
        $font_vietnamese = Configuration::get($this->_prefix_st.'FONT_VIETNAMESE');
        $font_greek_support = Configuration::get($this->_prefix_st.'FONT_GREEK_SUPPORT');
        $font_arabic_support = Configuration::get($this->_prefix_st.'FONT_ARABIC_SUPPORT');
        $font_support = ($font_latin_support || $font_cyrillic_support || $font_vietnamese || $font_greek_support || $font_arabic_support) ? '&subset=' : '';
        $font_latin_support && $font_support .= 'latin,latin-ext,';
        $font_cyrillic_support && $font_support .= 'cyrillic,cyrillic-ext,';
        $font_vietnamese && $font_support .= 'vietnamese,';
        $font_greek_support && $font_support .= 'greek,greek-ext,';
        $font_arabic_support && $font_support .= 'arabic,';
        
        $theme_font = array_unique($theme_font);
        if(is_array($theme_font) && count($theme_font)) {
            $fonts = array();
            foreach($theme_font as $v)
            {
                $arr = explode(':', $v);
                if(!isset($arr[0]) || !$arr[0] || $arr[0] == $this->_font_inherit || in_array($arr[0], $this->systemFonts))
                    continue;
                $gf_key = preg_replace('/\s/iS','_',$arr[0]);
                if (isset($arr[1]) && !in_array($arr[1], $this->googleFonts[$gf_key]['variants']))
                    $v = $arr[0];
                $fonts[] = str_replace(' ', '+', $v);
            }
            if ($fonts) {
                $this->context->controller->registerStylesheet('steasycheckout-google-fonts', $this->context->link->protocol_content."fonts.googleapis.com/css?family=".implode('|', $fonts).($font_support ? rtrim($font_support,',') : ''), ['server' => 'remote']);
            }    
        }
        return $this->fetch($template_file, $this->getCacheId());
    }
    public static function hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);
    
       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);
       return $rgb;
    }
    public function hookActionFrontControllerAfterInit($params)
    {
        $this->redirectToEasyCheckout();
    }
    private function redirectToEasyCheckout(){
        if (Dispatcher::getInstance()->getController()=='order' && !Tools::isSubmit('submitReorder') && !Configuration::get($this->_prefix_st.'DISABLE')) {
            Tools::redirect($this->context->link->getModuleLink($this->name,'default'));
        }
    }
    
    protected function stGetCacheId($key, $name = null)
    {
        $cache_id = parent::getCacheId($name);
        return $cache_id.'_'.$key;
    }
    public function BuildDropListGroup($group,$start=1,$end=6)
    {
        if(!is_array($group) || !count($group))
            return false;

        $html = '<div class="row">';
        foreach($group AS $key => $k)
        {
             if($key==3)
                 $html .= '</div><div class="row">';

             $html .= '<div class="col-xs-4 col-sm-3"><label '.(isset($k['tooltip']) ? ' data-html="true" data-toggle="tooltip" class="label-tooltip" data-original-title="'.$k['tooltip'].'" ':'').'>'.$k['label'].'</label>'.
             '<select name="'.$k['id'].'" 
             id="'.$k['id'].'" 
             class="'.(isset($k['class']) ? $k['class'] : 'fixed-width-md').'"'.
             (isset($k['onchange']) ? ' onchange="'.$k['onchange'].'"':'').' >';
            
            for ($i=$start; $i <= $end; $i++){
                $html .= '<option value="'.$i.'" '.(Configuration::get($this->_prefix_st.strtoupper($k['id'])) == $i ? ' selected="selected"':'').'>'.$i.'</option>';
            }
                                
            $html .= '</select></div>';
        }
        return $html.'</div>';
    }
    public function findCateProPer($k=null)
    {
        $proper = array(
            1 => array(
                array(
                    'id' => 'column_1',
                    'label' => $this->l('First column'),
                    'tooltip' => '',
                ),
                array(
                    'id' => 'column_2',
                    'label' => $this->l('Second column'),
                    'tooltip' => '',
                ),
                array(
                    'id' => 'column_3',
                    'label' => $this->l('Third column'),
                    'tooltip' => '',
                ),
                
                array(
                    'id' => 'column_4',
                    'label' => $this->l('Fourth column'),
                    'tooltip' => '',
                ),
                
                array(
                    'id' => 'column_5',
                    'label' => $this->l('Five column'),
                    'tooltip' => '',
                ),

                 array(
                    'id' => 'column_6',
                    'label' => $this->l('Six column'),
                    'tooltip' => '',
                ),
                
            ),
            2 => array(
                array(
                    'id' => 'carriers_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'carriers_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'carriers_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>768px)'),
                ),
                array(
                    'id' => 'carriers_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (<768px)'),
                ),
                array(
                    'id' => 'carriers_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (<554px)'),
                ),
            ),
            3 => array(
                array(
                    'id' => 'address_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'address_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'address_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>768px)'),
                ),
                array(
                    'id' => 'address_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (<768px)'),
                ),
                array(
                    'id' => 'address_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (<554px)'),
                ),
            ),
        );
        return ($k!==null && isset($proper[$k])) ? $proper[$k] : $proper;
    }
    public function fetchMediaServer(&$image)
    {
        $image = _THEME_PROD_PIC_DIR_.$image;
        $image = context::getContext()->link->protocol_content.Tools::getMediaServer($image).$image;
    }
    public function fontOptions() {
        $system = $google = array();
        foreach($this->systemFonts as $v)
            $system[] = array('id'=>$v,'name'=>$v);
        foreach($this->googleFonts as $v)
            $google[] = array('id'=>$v['family'],'name'=>$v['family']);
        $module = new StEasyCheckout();
        return array(
            array('name'=>$module->l('System Web fonts'),'query'=>$system),
            array('name'=>$module->l('Google Web Fonts'),'query'=>$google),
        );
    }

    private function _usePredefined($demo = '', $file = '')
    {
        $res = true;
        
        if(!$demo && !$file)
            return false;
        
        if ($file) {
            $config_file = $this->_config_folder.$file;
        } else {
            $config_file = $this->_config_folder.'predefined_'.$demo.'.xml';
        }
        if (!file_exists($config_file))
            return $this->displayError('"'.$config_file.'"'.$this->l(' file isn\'t exists.'));
        
        $xml = @simplexml_load_file($config_file);
        
        if ($xml === false) {
            return $this->displayError($this->l('Fetch configuration file content failed'));
        }
        
        $languages = Language::getLanguages(false);
        
        foreach($xml->children() as $k => $v)
        {
            if (!key_exists($k, $this->defaults)) {
                continue;
            }
            if (is_array($this->defaults[$k]['val'])) {
                $text_lang = array();
                $default = '';
                foreach($xml->$k->children() AS $_k => $_v)
                {
                    $id_lang = str_replace('lang_', '', $_k);
                    $text_lang[$id_lang] = (string)$_v;
                    if (!$default) {
                        $default = $text_lang[$id_lang];
                    }
                }
                foreach($languages AS $language) {
                    if (!key_exists($language['id_lang'], $text_lang)) {
                        $text_lang[$language['id_lang']] = $default;
                    }
                }
                
                $this->defaults[$k]['val'] = $text_lang;
            } else {
                $this->defaults[$k]['val'] = (string)$v;
            }
        }
        foreach($this->defaults as $k=>$v) {
            $res &= Configuration::updateValue($this->_prefix_st.strtoupper($k), $v['val']);
        }
        
        return $res;
    }
    public function hookActionShopDataDuplication($params)
    {
        $this->_useDefault(false,shop::getGroupFromShop($params['new_id_shop']),$params['new_id_shop']);
    }
    public function getPatterns($amount=28,$type='')
    {
        $html = '';
        foreach(range(1,$amount) as $v)
            $html .= '<div class="parttern_wrap '.($type=='heading_bg' ? ' repeat_x ' : '').'" style="background-image:url('.$this->_path.'patterns'.($type ? '/'.$type : '').'/'.$v.'.png);"><span>'.$v.'</span></div>';
        $html .= '<div>'.$this->l('Pattern credits').':<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>';
        return $html;
    }
    public function getPatternsArray($amount=28)
    {
        $arr = array();
        for($i=1;$i<=$amount;$i++)
            $arr[] = array('id'=>$i,'name'=>$i); 
        return $arr;   
    }
    public function initToolbarBtn()
    {
        $token = Tools::getAdminTokenLite('AdminModules');
        $toolbar_btn = array(
            'demo_1' => array(
                'class' => '',
                'desc' => $this->l('Default'),
                'type' => 'button',
            ),
            'demo_6' => array(
                'class' => '',
                'desc' => $this->l('Yellow'),
                'type' => 'button',
            ),
            'demo_9' => array(
                'class' => '',
                'desc' => $this->l('Blue'),
                'type' => 'button',
            ),
            'demo_12' => array(
                'class' => '',
                'desc' => $this->l('Green'),
                'type' => 'button',
            ),
            'demo_14' => array(
                'class' => '',
                'desc' => $this->l('Brown'),
                'type' => 'button',
            ),
            'demo_17' => array(
                'class' => '',
                'desc' => $this->l('Orange'),
                'type' => 'button',
            ),
            'export' => array(
                'desc' => $this->l('Export'),
                'class' => 'icon-share',
                'type' => 'button',
                'click' => '',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&export'.$this->name.'&token='.$token,
            ),
        );
        $html = '<div class="panel st_toolbtn clearfix"><ul class="nav nav-pills">';
        foreach($toolbar_btn AS $k => $btn)
        {
            $desc = $btn['desc'];
        
            $html .= '
            <li class="nav-item"><a id="desc-configuration-'.$k.'" class="boolbtn-'.$k.' btn btn-default" '.(isset($btn['click']) ? $btn['click'] : 'onclick="if (confirm(\''.sprintf($this->l('Importing %s, are your sure?'), $desc).'\')){return true;}else{event.preventDefault();}"').' href="'.(isset($btn['href']) ? $btn['href'] : AdminController::$currentIndex.'&configure='.$this->name.'&predefined='.$k.'&token='.$token).'" title="'.$desc.'">
            <span>
            <i class="'.($btn['class'] ? $btn['class'] : 'icon-download').' icon-fw"></i> '.$desc.'</span></a></li>';    
        }
        $html .= '</ul>';
        $html .= '<form class="defaultForm form-horizontal" action="'.AdminController::$currentIndex.'&configure='.$this->name.'&upload'.$this->name.'&token='.$token.'" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label class="control-label col-lg-2">'.$this->l('Upload a custom configuration file:').'</label>
            <div class="col-lg-10">
            <div class="form-group">
                <div class="col-sm-6">
                    <input id="xml_config_file_field" type="file" name="xml_config_file_field" class="hide">
                    <div class="dummyfile input-group">
                        <span class="input-group-addon"><i class="icon-file"></i></span>
                        <input id="xml_config_file_field-name" type="text" name="filename" readonly="">
                        <span class="input-group-btn">
                            <button id="xml_config_file_field-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
                                <i class="icon-folder-open"></i> '.$this->l('Choose a .xml file').'</button>
                        </span>
                    </div>
                    <button type="submit" value="1" name="uploadconfig" id="uploadconfig" class="btn btn-default" data="'.$this->l('Your current module settings will be overrided, are your sure?').'"><i class="icon icon-upload"></i> '.$this->l('Upload and import the file').'</button>
                </div>
            </div>
            </div>
            </div>
            </form>
            <div class="alert alert-info"><p>'.$this->l('All settings will be exported out, except private data, like settings under the social login tab, customer contents and API key for Google adress auto suggestion.').'</p></div>';
        $html .= '</div>';
        return $html;
    }
    public function export($return = false)
    {
        $result = '';
        $exports = array();
        
        $folder = $this->_config_folder;
        if (!is_dir($folder))
            return $this->displayError('"'.$folder.'" '.$this->l('directory isn\'t exists.'));
        elseif (!is_writable($folder))
            return $this->displayError('"'.$folder.'" '.$this->l('directory isn\'t writable.'));
        
        $file = date('YmdH').'_'.(int)Shop::getContextShopID().'.xml';
        
        $lang_array = array();
        foreach($this->defaults AS $k => $value) {
            if (is_array($value) && isset($value['exp']) && $value['exp'] == 1) {
                if (is_array($value['val'])) {
                    $lang_array[] = $k;
                }
                $exports[$k] = Configuration::get($this->_prefix_st.strtoupper($k));
            }
        }
        $languages = Language::getLanguages(false);
        foreach($lang_array AS $value) {
            if (key_exists($value, $exports)) {
                foreach ($languages as $language) {
                    $exports[$value][$language['id_lang']] = Configuration::get($this->_prefix_st.strtoupper($value), $language['id_lang']);
                }
            }
        }
        $editor = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!-- Copyright Sunnytoo.com --><steasycheckout></steasycheckout>');
        foreach($exports AS $key => $value)
        {
            if (in_array($key, $lang_array) && is_array($value))
            {
                $lang_text = $editor->addChild($key);
                foreach($value AS $id_lang => $v) {
                    $lang_text->addChild('lang_'.$id_lang, Tools::htmlentitiesUTF8($v));
                }
            } else {
                $editor->addChild($key, $value);
            }
        }
        
        $content = $editor->asXML();
        if ($return) {
            return $content;
        }
        if (!file_put_contents($folder.$file, $content)) {
            return $this->displayError($this->l('Create config file failed.'));
        } else {
            $link = '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&download'.$this->name.'&file='.$file.'">'._MODULE_DIR_.$this->name.'/config/'.$file.'</a>';
            return $this->displayConfirmation($this->l('Generate config file successfully, Click the link to download : ').$link);
        }   
    }
    public function get_fontello()
    {
        $res= array(
            'css' => '',
            'classes' => array(),
        );
        if (file_exists(_PS_ROOT_DIR_.'/modules/'.$this->name.'/views/font/config.json'))
        {
            $icons = Tools::jsonDecode(Tools::file_get_contents(_PS_ROOT_DIR_.'/modules/'.$this->name.'/views/font/config.json'));
            if($icons && is_array($icons->glyphs))
                foreach ($icons->glyphs as $icon) {
                    $res['classes'][$icon->code] = 'eco-'.$icon->css;
                }
        }

        return $res;
    }
    public function hookDisplayBeforeBodyClosingTag($params)
    {
        $page = Context::getContext()->smarty->getTemplateVars('page');
        if($page['page_name']!='module-steasycheckout-default')
            return;
        if($gmap_api_key = Configuration::get($this->_prefix_st.'GMAP_API_KEY'))
            return '<script src="//maps.googleapis.com/maps/api/js?key='.$gmap_api_key.'&libraries=places&callback=stecoInitAutocomplete" async defer></script>';
    }


    /*
        iWeb - paczkomaty - 2020-08-26
    */
    public function hookDisplayAdminOrder($params) {
        $order = new Order((int)$params['id_order']);

        $info = Db::getInstance()->getRow('SELECT `invoice`, `company` FROM `' . _DB_PREFIX_ . 'cart_info` WHERE `id_cart` = ' . (int)$order->id_cart);

        $html = '<div class="row"> <div class="col-lg-12"> <div class="panel"> <div class="panel-heading"> Informacje o zamówieniu </div> <div class="panel-body">'; 

        if ( $paczkomat = $order->getSelectedPaczkomat() ) {
            $html .= '<p>Paczkomat: <strong>' . $paczkomat . '</strong></p>';
        }

        $html .= '<p>Dokument wybrany przez klienta: <strong>' . ( !empty($info['invoice']) ? 'faktura' : 'paragon' ) . '</strong></p>';

        return $html . '</div></div></div></div>';
    }


	public function hookDisplayShippingInfo($params) {
		if ( isset($params['quantity']) && $params['quantity'] <= 0 ) return '';
		
		$hour = date('H');
		$date_shipping = date('Y-m-d');


        /*
            iWeb - 2023-04-03
        */
        $hour_holidays = 0;
        if ( !empty($this->context->cart->id_carrier) ) {
            $id_reference = Db::getInstance()->getValue('
                SELECT `id_reference` 
                FROM `' . _DB_PREFIX_ . 'carrier`
                WHERE id_carrier = ' . (int)$this->context->cart->id_carrier);
            $hour_holidays = Configuration::get('STECO_HOUR_HOLIDAYS_' . $id_reference);
        }

        if ( !$hour_holidays ) $hour_holidays = Configuration::get('STECO_HOUR_HOLIDAYS');

		if ( $hour >= $hour_holidays ) $date_shipping = $this->nextBusinessDay($date_shipping);
		// $date_shipping = $this->nextBusinessDay($date_shipping);

		$week_day = date('w');

		$now = new DateTime(date('Y-m-d'));
		$shipping = new DateTime($date_shipping);

		$shipping_days = $now->diff($shipping);
		$shipping_days = $shipping_days->format('%a');

		$this->context->smarty->assign([
			'hour' => $hour_holidays,
			'shipping_days' => $shipping_days,
			'shipping_day_of_week' => date('w', strtotime($date_shipping))
		]);

		return $this->fetch('module:steasycheckout/views/templates/hook/countdown.tpl'); 
	}


	public function hookDisplayEstimatedDeliveryDate($params) {
		
		if ( isset($params['quantity']) && $params['quantity'] <= 0 ) return '';
		$hour = date('H');
		$date_shipping = date('Y-m-d');

        /*
            Jeżeli to weekend to lecimy do poniedziałku - 2022-10-24
        */
        if ( in_array(date('w', strtotime($date_shipping)), [6, 0]) ) {
            $date_shipping = $this->nextBusinessDay($date_shipping);
        }


        /*
            iWeb - 2023-04-03
        */
        $hour_holidays = 0;
        $alt_desc = false;
        if ( !empty($params['id_carrier']) ) {
            $id_reference = Db::getInstance()->getValue('
                SELECT `id_reference` 
                FROM `' . _DB_PREFIX_ . 'carrier`
                WHERE id_carrier = ' . (int)$params['id_carrier']);
            $hour_holidays = Configuration::get('STECO_HOUR_HOLIDAYS_' . $id_reference);
            $alt_desc = Configuration::get('STECO_ALT_DESC_' . $id_reference);
        } else if ( !empty($this->context->cart->id_carrier) ) {
            $id_reference = Db::getInstance()->getValue('
                SELECT `id_reference` 
                FROM `' . _DB_PREFIX_ . 'carrier`
                WHERE id_carrier = ' . (int)$this->context->cart->id_carrier);
            $hour_holidays = Configuration::get('STECO_HOUR_HOLIDAYS_' . $id_reference);
        }

        if ( !$hour_holidays ) $hour_holidays = Configuration::get('STECO_HOUR_HOLIDAYS');



		if ( $hour >= $hour_holidays ) $date_shipping = $this->nextBusinessDay($date_shipping);
		$delivery_date_start = $this->nextBusinessDay($date_shipping);
		$delivery_date_end = $this->nextBusinessDay($delivery_date_start);


		$deadline = strtotime(date('Y-m-d ' . $hour_holidays . ':00:00')) - time();

		$deadline_text = '';
		if ( $deadline > 0 ) {
			$deadline_text .= (int)($deadline / 3600) ? (int)($deadline / 3600) . ' godz. ' : '';
			$deadline_text .= (int)($deadline % 3600 / 60) ? (int)($deadline % 3600 / 60) . ' min. ' : '';
		}


		$this->context->smarty->assign([
			'deli_holiday' => Configuration::get('STECO_DELI_HOLIDAY'),
		    'ship_holiday_form' => Configuration::get('STECO_SHIP_HOLIDAY_FORM'),
            'deadline' => $deadline,
			'deadline_text' => $deadline_text,
			'hour' => $hour_holidays,
            'alt_desc' => $alt_desc,
			'date_start' => $this->formatEstimatedDeliveryDate($delivery_date_start),
			'date_end' => $this->formatEstimatedDeliveryDate($delivery_date_end),
		]);


		return $this->fetch('module:steasycheckout/views/templates/hook/estimated-delivery-date.tpl'); 
	}

	protected function formatEstimatedDeliveryDate($date) {
		return str_replace(
			['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'], 
			['pon.', 'wt.', 'śro.', 'czw.', 'pt.', 'sob.', 'nd.'], 
			date('D d.m', strtotime($date))
		);
	}


	protected function nextBusinessDay($date) {
		$holidays = array_map(function($value) {
			return trim($value);
		}, explode("\n", Configuration::get('STECO_DATE_HOLIDAYS')));
		
        /*
            Jeżeli mamy święto i nie jest to weekend to przeskakujemy dalej - 2022-10-24
        */
        $i = in_array($date, $holidays) && !in_array(date('w', strtotime($date)), [6, 0]) ? 2 : 1;

		$nextBusinessDay = date('Y-m-d', strtotime($date . ' +' . $i . ' Weekday'));

		while ( in_array($nextBusinessDay, $holidays) ) {
		    $i++;
		    $nextBusinessDay = date('Y-m-d', strtotime($date . ' +' . $i . ' Weekday'));
		}

		return $nextBusinessDay;
	}


}