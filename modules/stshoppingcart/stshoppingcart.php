<?php
/*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Adapter\Cart\CartPresenter;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;

class StShoppingcart extends Module implements WidgetInterface
{
    private $_hooks = array();
    private $_info_array = array();
    protected $templatePath;
	public function __construct()
	{
		$this->name = 'stshoppingcart';
		$this->tab = 'front_office_features';
		$this->version = '1.5.8';
		$this->author        = 'PrestaShop';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();
        
		$this->displayName = $this->getTranslator()->trans('Shopping cart mod', array(), 'Modules.Stshoppingcart.Admin');
		$this->description = $this->getTranslator()->trans('Adds a block containing the customers shopping cart.', array(), 'Modules.Stshoppingcart.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->controllers = array('ajax');
        $this->templatePath = 'module:'.$this->name.'/views/templates/hook/';
	}
    
    private function initInfoArray()
    {
        $this->_info_array = array(
                array(
                    'id' => 'text',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('The "Shopping cart" text', array(), 'Modules.Stshoppingcart.Admin'),
                ),
                array(
                    'id' => 'number',
                    'val' => '2',
                    'name' => $this->getTranslator()->trans('The number of items in cart, like "2 items"', array(), 'Modules.Stshoppingcart.Admin'),
                ),
                array(
                    'id' => 'small_number',
                    'val' => '4',
                    'name' => $this->getTranslator()->trans('Display the number of items in cart along with the cart icon', array(), 'Modules.Stshoppingcart.Admin'),
                ),
                array(
                    'id' => 'price',
                    'val' => '8',
                    'name' => $this->getTranslator()->trans('Total price', array(), 'Modules.Stshoppingcart.Admin'),
                ),
                
                array(
                    'id' => 'Icone',
                    'val' => '16',
                    'name' => $this->getTranslator()->trans('Icone cart', array(), 'Modules.Stshoppingcart.Admin'),
                ),
            );
    }
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
        			'id' => 'displayNav1',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar left - displayNav1', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
        		),
                array(
                    'id' => 'displayNav3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar center - displayNav3', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
                ),
        		array(
        			'id' => 'displayNav2',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar right - displayNav2', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
        		),
        		
        		array(
        			'id' => 'displayNav1blog',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar left blog - displayNav1', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
        		),
                array(
                    'id' => 'displayNav3blog',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar center blog - displayNav3', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
                ),
        		array(
        			'id' => 'displayNav2blog',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar right blog - displayNav2', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
        		),
                array(
                    'id' => 'displayHeaderLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header left', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
                ),
                array(
                    'id' => 'displayHeaderCenter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header center', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
                ),
        		array(
        			'id' => 'displayTop',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Header right(Header top)', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
        		),
                array(
        			'id' => 'displayHeaderBottom',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Header bottom', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
        		),
        		array(
                    'id' => 'displayHeaderLeftBlog',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header left blog', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
                ),
                array(
                    'id' => 'displayHeaderCenterBlog',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header center blog', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
                ),
        		array(
        			'id' => 'displayTopBlog',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Header right blog (Header top)', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
        		),
                array(
        			'id' => 'displayHeaderBottomBlog',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Header bottom blog', array(), 'Admin.Theme.Transformer'),
                    // 'sin' => '1',
        		),
        		
        		array(
        			'id' => 'displayRightBar',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Right Bar', array(), 'Admin.Theme.Transformer'),
        		),
        		/*array(
        			'id' => 'displayMobileBar',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Mobile Bar', array(), 'Admin.Theme.Transformer'),
        		),
                array(
                    'id' => 'displayMobileBarLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Mobile Bar left', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayMobileBarCenter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Mobile Bar center', array(), 'Admin.Theme.Transformer'),
                ),
        		array(
        			'id' => 'displayMobileBarBottom',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Mobile Bar bottom', array(), 'Admin.Theme.Transformer'),
        		),*/
        		array(
        			'id' => 'displayMainMenuWidget',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Main menu widget', array(), 'Admin.Theme.Transformer'),
        		),
            )
        );
    }
    
    private function saveHook()
    {
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $val = (int)Tools::getValue($key.'_'.$value['id']);
                $this->_processHook($key, $value['id'], $val);
                if (isset($value['ref']) && $value['ref'])
                    $this->_processHook($key, $value['ref'], $val);
            }
        }
        // clear module cache to apply new data.
        Cache::clean('hook_module_list');
    }
    
    private function _processHook($key='', $hook='', $value=1)
    {
        if (!$key || !$hook)
            return false;
        $rs = true;
        $id_hook = Hook::getIdByName($hook);
        if ($value)
        {
            if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                return $rs;
            if (!$this->isHookableOn($hook))
                $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to ', array(), 'Admin.Theme.Transformer').$hook;
            else
                $rs = $this->registerHook($hook, Shop::getContextListShopID());
        }
        else
        {
            if($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
            {
                $rs = $this->unregisterHook($id_hook, Shop::getContextListShopID());
                $rs &= $this->unregisterExceptions($id_hook, Shop::getContextListShopID());
            } 
        }
        return $rs;
    }

	public function getContent()
	{
		$output = '';
        $this->initHookArray();
        $this->initInfoArray();
		if (Tools::isSubmit('submitBlockCart'))
		{
			$ajax = Tools::getValue('PS_BLOCK_CART_AJAX');
			if ($ajax != 0 && $ajax != 1)
				$output .= $this->displayError($this->getTranslator()->trans('Ajax: Invalid choice.', array(), 'Modules.Stshoppingcart.Admin'));
			else
				Configuration::updateValue('PS_BLOCK_CART_AJAX', (int)($ajax));

			$animation= Tools::getValue('addtocart_animation');
			if (!Validate::isUnsignedInt($animation))
				$output .= $this->displayError($this->getTranslator()->trans('Animation: Invalid choice.', array(), 'Modules.Stshoppingcart.Admin'));
			else
				Configuration::updateValue('ST_ADDTOCART_ANIMATION', (int)($animation));
				
			Configuration::updateValue('ST_BLOCK_CART_STYLE', (int)Tools::getValue('block_cart_style'));
			Configuration::updateValue('ST_CLICK_ON_HEADER_CART', (int)Tools::getValue('click_on_header_cart'));
            Configuration::updateValue('ST_HOVER_DISPLAY_CP', (int)Tools::getValue('hover_display_cp'));

            Configuration::updateValue('ST_DROP_DOWN_CART_HEIGHT', (int)Tools::getValue('drop_down_cart_height'));
            Configuration::updateValue('ST_BLOCK_CART_HEIGHT', (int)Tools::getValue('block_cart_height'));
            Configuration::updateValue('ST_BLOCK_CART_COLOR', Tools::getValue('block_cart_color'));
            Configuration::updateValue('ST_BLOCK_CART_HOVER_COLOR', Tools::getValue('block_cart_hover_color'));
            Configuration::updateValue('ST_BLOCK_CART_BG', Tools::getValue('block_cart_bg'));
            Configuration::updateValue('ST_BLOCK_CART_HOVER_BG', Tools::getValue('block_cart_hover_bg'));
			Configuration::updateValue('ST_BLOCK_CART_BORDER_COLOR', Tools::getValue('block_cart_border_color'));
            Configuration::updateValue('ST_BLOCK_CART_CHECKOUT', (int)Tools::getValue('block_cart_checkout'));
            Configuration::updateValue('ST_SHOPPING_FREE', (int)Tools::getValue('shopping_free'));
            Configuration::updateValue('ST_COST_DOWNLOADING', (int)Tools::getValue('cost_downloading'));
            Configuration::updateValue('ST_SIMILLAR_WIDOW', (int)Tools::getValue('simillar_widow'));
            Configuration::updateValue('ST_CART_STYLE', (int)Tools::getValue('cart_style'));
            Configuration::updateValue('ST_CART_QUANTITY_MINI', (int)Tools::getValue('cart_quantity_mini'));
            Configuration::updateValue('ST_CART_ICONE', (int)Tools::getValue('cart_icone'));
            Configuration::updateValue('ST_CART_ICONE_HOVER', (int)Tools::getValue('cart_icone_hover'));
            Configuration::updateValue('ST_CART_ICONE_PROMO', (int)Tools::getValue('cart_icone_promo'));
            Configuration::updateValue('ST_CART_PROMO_PRICE', (int)Tools::getValue('cart_promo_price'));
            Configuration::updateValue('ST_BUTTON_CHECKOUT', (int)Tools::getValue('button_checkout'));
            Configuration::updateValue('ST_PRODUCT_WEIGHT', (int)Tools::getValue('product_weight'));
            Configuration::updateValue('ST_PRODUCT_WEIGHT_SUMMARY', (int)Tools::getValue('product_weight_summary'));
            Configuration::updateValue('ST_TAXIN_CART', (int)Tools::getValue('taxin_cart'));
            Configuration::updateValue('ST_CART_VALUE', (int)Tools::getValue('cart_value'));
            Configuration::updateValue('ST_EMPTY_CART', (int)Tools::getValue('empty_cart'));
            Configuration::updateValue('ST_CART_CATEGORY', (int)Tools::getValue('cart_category'));
            Configuration::updateValue('ST_BUTTON_STYLE', (int)Tools::getValue('button_style'));
            Configuration::updateValue('ST_CART_BORDER_HOVER', (int)Tools::getValue('cart_border_hover'));
            
            


            $results = 0;
            foreach($this->_info_array as $v)
                $results += (int)Tools::getValue('block_cart_info_'.$v['id']);
            Configuration::updateValue('ST_BLOCK_CART_INFO', $results);


			$productNbr = (int)Tools::getValue('PS_BLOCK_CART_XSELL_LIMIT');
			if (!Validate::isUnsignedInt($productNbr))
				$productNbr = 6;
			Configuration::updateValue('PS_BLOCK_CART_XSELL_LIMIT', $productNbr);

			if(!$output)
            {
                $this->saveHook();
                $output .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));
            }

			Configuration::updateValue('PS_BLOCK_CART_SHOW_CROSSSELLING', (int)(Tools::getValue('PS_BLOCK_CART_SHOW_CROSSSELLING')));
		}
		return $output.$this->_check_single().$this->renderForm();
	}

	public function install()
	{
		if (
			parent::install() == false
			|| $this->registerHook('displayTop') == false
			|| $this->registerHook('displayHeader') == false
			// || $this->registerHook('displayMobileBar') == false
			|| $this->registerHook('displaySideBar') == false

            || Configuration::updateValue('ST_BLOCK_CART_HEIGHT', 42) == false
            || Configuration::updateValue('ST_DROP_DOWN_CART_HEIGHT', 0) == false
            || Configuration::updateValue('ST_BLOCK_CART_COLOR', '#06a161') == false
            || Configuration::updateValue('ST_BLOCK_CART_HOVER_COLOR', '#ffffff') == false
            || Configuration::updateValue('ST_BLOCK_CART_BG', '#f2f2f2') == false
            || Configuration::updateValue('ST_BLOCK_CART_HOVER_BG', '#06a161') == false
            || Configuration::updateValue('ST_BLOCK_CART_BORDER_COLOR', '#e5e5e5') == false

            || Configuration::updateValue('ST_BLOCK_CART_STYLE', 0) == false
			|| Configuration::updateValue('ST_BLOCK_CART_INFO', 7) == false
			|| Configuration::updateValue('PS_BLOCK_CART_AJAX', 1) == false
			|| Configuration::updateValue('PS_BLOCK_CART_SHOW_CROSSSELLING', 1) == false
			|| Configuration::updateValue('PS_BLOCK_CART_XSELL_LIMIT', 6) == false
			|| Configuration::updateValue('ST_ADDTOCART_ANIMATION', 0) == false
            || Configuration::updateValue('ST_CLICK_ON_HEADER_CART', 0) == false
			|| Configuration::updateValue('ST_BLOCK_CART_CHECKOUT', 0) == false
			|| Configuration::updateValue('ST_HOVER_DISPLAY_CP', 1) == false)
			return false;
		return true;
	}
	public function renderForm()
	{
		$this->fields_form[0]['form'] = array(
				'legend' => array(
					'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'switch',
						'label' => $this->getTranslator()->trans('Ajax cart', array(), 'Modules.Stshoppingcart.Admin'),
						'name' => 'PS_BLOCK_CART_AJAX',
						'is_bool' => true,
						'desc' => $this->getTranslator()->trans('Activate Ajax mode for the cart (compatible with the default theme).', array(), 'Modules.Stshoppingcart.Admin'),
						'values' => array(
								array(
									'id' => 'cart_ajax_on',
									'value' => 1,
									'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
								),
								array(
									'id' => 'cart_ajax_off',
									'value' => 0,
									'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
								)
							),
					),
	                array(
						'type' => 'radio',
						'label' => $this->getTranslator()->trans('What to do if customers click on the header cart icon:', array(), 'Modules.Stshoppingcart.Admin'),
						'name' => 'click_on_header_cart',
	                    'default_value' => 0,
						'values' => array(
							array(
								'id' => 'click_on_header_cart_link',
								'value' => 0,
								'label' => $this->getTranslator()->trans('Link to shopping cart page.', array(), 'Modules.Stshoppingcart.Admin')),
							array(
								'id' => 'click_on_header_cart_right_bar',
								'value' => 1,
								'label' => $this->getTranslator()->trans('Display cart items on the right side bar.', array(), 'Modules.Stshoppingcart.Admin')),
							array(
								'id' => 'click_on_header_cart_left_bar',
								'value' => 2,
								'label' => $this->getTranslator()->trans('Display cart items on the left side bar.', array(), 'Modules.Stshoppingcart.Admin')),
						),
					), 
					array(
						'type' => 'radio',
						'label' => $this->getTranslator()->trans('Display cart items if mouse over the header cart icon', array(), 'Modules.Stshoppingcart.Admin'),
						'name' => 'hover_display_cp',
	                    'default_value' => 1,
						'values' => array(
								array(
									'id' => 'hover_display_cp_1',
									'value' => 1,
									'label' => $this->getTranslator()->trans('Yes, do nothing when no products in cart', array(), 'Modules.Stshoppingcart.Admin')
								),
								array(
									'id' => 'hover_display_cp_2',
									'value' => 2,
									'label' => $this->getTranslator()->trans('Yes, display a message when no products in cart', array(), 'Modules.Stshoppingcart.Admin')
								),
								array(
									'id' => 'hover_display_cp_0',
									'value' => 0,
									'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
								)
							),
					),
					
					array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Empty cart:', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'empty_cart',
                        'default_value' => 0,
                        'values' => array(
                            array(
                                'id' => 'empty_cart_0',
                                'value' => 0,
                                'label' => $this->getTranslator()->trans('Info empty', array(), 'Modules.Stshoppingcart.Admin')),
                            
                            array(
                                'id' => 'empty_cart_4',
                                'value' => 4,
                                'label' => $this->getTranslator()->trans('Info plus', array(), 'Modules.Stshoppingcart.Admin')),
                            array(
                                'id' => 'empty_cart_1',
                                'value' => 1,
                                'label' => $this->getTranslator()->trans('Info plus new products', array(), 'Modules.Stshoppingcart.Admin')),
                            array(
                                'id' => 'empty_cart_2',
                                'value' => 2,
                                'label' => $this->getTranslator()->trans('Info plus promotions', array(), 'Modules.Stshoppingcart.Admin')),
                            array(
                                'id' => 'empty_cart_3',
                                'value' => 3,
                                'label' => $this->getTranslator()->trans('Info plus recommended products', array(), 'Modules.Stshoppingcart.Admin')),
                            
                       
                            
                            ),
                    ),
                    
                    
                   array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Id category', array(), 'Modules.Stshoppingcart.Admin'),
                    'name' => 'cart_category',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'id',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Enter the category id you want to recommend in an empty basket. This option works if you select Information plus recommended products from the above setting.', array(), 'Modules.Stshoppingcart.Admin'),
                
					),
					
					  array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Button_style:', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'button_style',
                        'default_value' => 0,
                        'values' => array(
                            array(
                                'id' => 'button_style_0',
                                'value' => 0,
                                'label' => $this->getTranslator()->trans('White whith border', array(), 'Modules.Stshoppingcart.Admin')),
                            
                            array(
                                'id' => 'button_style_1',
                                'value' => 1,
                                'label' => $this->getTranslator()->trans('Full color', array(), 'Modules.Stshoppingcart.Admin')),
                           
                           
                            
                            ),
                    ),
                    
                    
                      array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Border hover', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cart_border_hover',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'cart_border_hover_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'cart_border_hover_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('On hover', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'cart_border_hover_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Visible right away', array(), 'Admin.Theme.Transformer')),
                               ), 
                   
      
                      ),
					
	                array(
						'type' => 'radio',
						'label' => $this->getTranslator()->trans('Add to cart animation:', array(), 'Modules.Stshoppingcart.Admin'),
						'name' => 'addtocart_animation',
	                    'default_value' => 0,
						'values' => array(
							array(
								'id' => 'addtocart_animation_dialog',
								'value' => 0,
								'label' => $this->getTranslator()->trans('Pop-up dialog', array(), 'Modules.Stshoppingcart.Admin')),
							array(
								'id' => 'addtocart_animation_flying',
								'value' => 1,
								'label' => $this->getTranslator()->trans('Product image to the header cart', array(), 'Modules.Stshoppingcart.Admin')),
							array(
								'id' => 'addtocart_animation_flying_scroll',
								'value' => 2,
								'label' => $this->getTranslator()->trans('Product image to the header cart(Page scroll to top)', array(), 'Modules.Stshoppingcart.Admin')),
							array(
								'id' => 'addtocart_animation_right_bar',
								'value' => 3,
								'label' => $this->getTranslator()->trans('Product image to the right bar cart', array(), 'Modules.Stshoppingcart.Admin')),
						),
					), 
					
					 				
					
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Cart style on the header:', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'block_cart_style',
                        'default_value' => 0,
                        'values' => array(
                            array(
                                'id' => 'block_cart_style_big_div',
                                'value' => 0,
                                'label' => $this->getTranslator()->trans('Classic style', array(), 'Modules.Stshoppingcart.Admin')),
                            array(
                                'id' => 'block_cart_style_big_icon',
                                'value' => 2,
                                'label' => $this->getTranslator()->trans('Large cart icon', array(), 'Modules.Stshoppingcart.Admin')),
                            array(
                                'id' => 'block_cart_style_small_icon',
                                'value' => 3,
                                'label' => $this->getTranslator()->trans('Small cart icon', array(), 'Modules.Stshoppingcart.Admin')),
                            array(
                                'id' => 'block_cart_style_white_icon',
                                'value' => 4,
                                'label' => $this->getTranslator()->trans('Small cart icon white', array(), 'Modules.Stshoppingcart.Admin')),
                        ),
                    ),
                    
                    
                    
                      array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Show icone:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cart_icone',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'cart_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'cart_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    
                    'desc' => $this->getTranslator()->trans('The setting only works if you select the Cart icon only option', array(), 'Modules.Stshoppingcart.Admin'),
     
                ),
                
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Icone hover:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cart_icone_hover',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'cart_icone_hover_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'cart_icone_hover_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    
                    'desc' => $this->getTranslator()->trans('The setting only works if you select the Cart icon only option', array(), 'Modules.Stshoppingcart.Admin'),
     
                ),       
                
                                  
                    
                    
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Visibility title:', array(), 'Admin.Theme.Transformer'),
                        'name' => 'cart_style',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'cart_style_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'cart_style_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('Always - inline', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'cart_style_2',
                                    'value' => 2,
                                    'label' => $this->getTranslator()->trans('Always - block', array(), 'Admin.Theme.Transformer')
                               
                            )
                            ), 
                                'desc' => $this->getTranslator()->trans('The setting only works if you select the Cart icon only option', array(), 'Modules.Stshoppingcart.Admin'),
     
                            ), 
                            
                            
                             array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Visibility quantity:', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'cart_quantity_mini',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'cart_quantity_mini_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stshoppingcart.Admin')
                                ),
                                array(
                                    'id' => 'cart_quantity_mini_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('Display the number of items in cart along with the cart icon', array(), 'Modules.Stshoppingcart.Admin')
                                ),
                                array(
                                    'id' => 'cart_quantity_mini_2',
                                    'value' => 2,
                                    'label' => $this->getTranslator()->trans('Display the number of items in cart name', array(), 'Modules.Stshoppingcart.Admin')
                               
                            )
                            ), 
                                 'desc' => $this->getTranslator()->trans('The setting only works if you select the Cart icon only option', array(), 'Modules.Stshoppingcart.Admin'),
     
                            ), 
                            
                             array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Icone promo:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cart_icone_promo',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'cart_icone_promo_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'cart_icone_promo_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    
                  
                ),     

                 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Promo price:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cart_promo_price',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'cart_promo_price_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'cart_promo_price_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    
                  
                ),
                    
                   
                    
                    array(
                        'type' => 'checkbox',
                        'label' => $this->getTranslator()->trans('Cart information on the header', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'block_cart_info',
                        'values' => array(
                            'query' => $this->_info_array,
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'desc' => $this->getTranslator()->trans('Choose infomation to be displayed on the header shopping cart', array(), 'Modules.Stshoppingcart.Admin'),
                    ),
                    
                                        
                    
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Checkout button and shopping cart button', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'block_cart_checkout',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'checkout_cart',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('Display shopping cart button', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'checkout_checkout',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('Display checkout button', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'checkout_both',
                                    'value' => 2,
                                    'label' => $this->getTranslator()->trans('Display both shopping cart button and checkout button', array(), 'Admin.Theme.Transformer')
                                )
                            ),
                        'desc' => $this->getTranslator()->trans('Checkout button is used to direct customers to the checkout page without going to the shopping cart page.', array(), 'Modules.Stshoppingcart.Admin'),
                    ),
                    
                                array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Button style finalize the order', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'button_checkout',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'button_checkout_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('Normal', array(), 'Modules.Stshoppingcart.Admin')
                                ),
                                array(
                                    'id' => 'button_checkout_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('White with border on hover', array(), 'Modules.Stshoppingcart.Admin')
                               
                            )
                            ),
                            
                              'desc' => $this->getTranslator()->trans('For the button, complete the order.', array(), 'Modules.Stshoppingcart.Admin'),
                        ),


                    
                    
                     array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('A smaller window with notification', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'simillar_widow',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'simillar_widow_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'simillar_widow_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                               
                            )
                        ),
                    ),
                    
                    
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Product weight', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'product_weight',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'product_weight_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'product_weight_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                               
                            )
                        ),
                    ),
                    
                    
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Information how much is missing for free shipping', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'shopping_free',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'shopping_free_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('As example content', array(), 'Admin.Theme.Transformer')
                                ),
                                
                                array(
                                    'id' => 'shopping_free_3',
                                    'value' => 3,
                                    'label' => $this->getTranslator()->trans('In graphic form', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'shopping_free_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                               
                            )
                        ),
                    ),
                    
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Show the cost of downloading', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'cost_downloading',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'cost_downloading_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'cost_downloading_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                               
                            )
                        ),
                    ),
                    
                                      
                    
                    
                    
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Weight of products in the summary', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'product_weight_summary',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'product_weight_summary_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'product_weight_summary_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                               
                            )
                        ),
                    ),
                    
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Tax bar in the basket', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'taxin_cart',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'taxin_cart_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'taxin_cart_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                               
                            )
                        ),
                    ),
                    
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Cart value:', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'cart_value',
                        'default_value' => 0,
                        'values' => array(
                                array(
                                    'id' => 'cart_value_0',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('With shipping costs', array(), 'Modules.Stshoppingcart.Admin')
                                ),
                                array(
                                    'id' => 'cart_value_1',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('No shipping costs', array(), 'Modules.Stshoppingcart.Admin')
                                )
                               
                            ),
                       
                    ),
                    
                    
                    array(
                        'type' => 'switch',
                        'label' => $this->getTranslator()->trans('Show cross-selling', array(), 'Modules.Stshoppingcart.Admin'),
                        'name' => 'PS_BLOCK_CART_SHOW_CROSSSELLING',
                        'is_bool' => true,
                        'desc' => $this->getTranslator()->trans('Activate cross-selling display for the cart.', array(), 'Modules.Stshoppingcart.Admin'),
                        'values' => array(
                                array(
                                    'id' => 'active_on',
                                    'value' => 1,
                                    'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                                ),
                                array(
                                    'id' => 'active_off',
                                    'value' => 0,
                                    'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                                )
                            ),
                        ),
					array(
						'type' => 'text',
						'label' => $this->getTranslator()->trans('Products to display in cross-selling', array(), 'Modules.Stshoppingcart.Admin'),
						'name' => 'PS_BLOCK_CART_XSELL_LIMIT',
						'class' => 'fixed-width-xs',
						'desc' => $this->getTranslator()->trans('Define the number of products to be displayed in the cross-selling block.', array(), 'Modules.Stshoppingcart.Admin')
					),
				),
				'submit' => array(
					'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions')
				)
		);
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslatOr()->trans('Shopping cart on the header', array(), 'Modules.Stshoppingcart.Admin'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'block_cart_height',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Modules.Stshoppingcart.Admin'),
                    'name' => 'block_cart_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text hover color:', array(), 'Modules.Stshoppingcart.Admin'),
                    'name' => 'block_cart_hover_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'block_cart_bg',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Hover background:', array(), 'Modules.Stshoppingcart.Admin'),
                    'name' => 'block_cart_hover_bg',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'block_cart_border_color',
                    'size' => 33,
                    'validation' => 'isColor',
                    'desc' => $this->getTranslator()->trans('Only classic cart style has borders.', array(), 'Modules.Stshoppingcart.Admin')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Max height of the drop down cart:', array(), 'Modules.Stshoppingcart.Admin'),
                    'name' => 'drop_down_cart_height',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value', array(), 'Modules.Stshoppingcart.Admin'),
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions')
            )
        );
        $this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
			'input' => array(
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions')
			),
		);
        
        foreach($this->_hooks AS $key => $values)
        {
            if (!is_array($values) || !count($values))
                continue;
            $this->fields_form[2]['form']['input'][] = array(
					'type' => 'checkbox',
					'label' => $key,
					'name' => $key,
					'lang' => true,
					'values' => array(
						'query' => $values,
						'id' => 'id',
						'name' => 'name'
					)
				);
        }
		
		$helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitBlockCart';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

        foreach($this->_info_array as $v)
            $helper->tpl_vars['fields_value']['block_cart_info_'.$v['id']] = (int)$v['val']&(int)Configuration::get('ST_BLOCK_CART_INFO');

		return $helper->generateForm($this->fields_form);
	}
	
	public function getConfigFieldsValues()
	{
		$fields_values = array(
			'PS_BLOCK_CART_AJAX' => (bool)Tools::getValue('PS_BLOCK_CART_AJAX', Configuration::get('PS_BLOCK_CART_AJAX')),
			'PS_BLOCK_CART_XSELL_LIMIT' => (int)Tools::getValue('PS_BLOCK_CART_XSELL_LIMIT', Configuration::get('PS_BLOCK_CART_XSELL_LIMIT')),
			'PS_BLOCK_CART_SHOW_CROSSSELLING' => (bool)Tools::getValue('PS_BLOCK_CART_SHOW_CROSSSELLING', Configuration::get('PS_BLOCK_CART_SHOW_CROSSSELLING')),
			'addtocart_animation' => (int)Tools::getValue('ST_ADDTOCART_ANIMATION', Configuration::get('ST_ADDTOCART_ANIMATION')),
			'click_on_header_cart' => (int)Tools::getValue('ST_CLICK_ON_HEADER_CART', Configuration::get('ST_CLICK_ON_HEADER_CART')),
			'hover_display_cp' => (int)Tools::getValue('ST_HOVER_DISPLAY_CP', Configuration::get('ST_HOVER_DISPLAY_CP')),
            'block_cart_style' => (int)Tools::getValue('ST_BLOCK_CART_STYLE', Configuration::get('ST_BLOCK_CART_STYLE')),

            'block_cart_height' => (int)Configuration::get('ST_BLOCK_CART_HEIGHT'),
            'drop_down_cart_height' => (int)Configuration::get('ST_DROP_DOWN_CART_HEIGHT'),
            'block_cart_color' => Configuration::get('ST_BLOCK_CART_COLOR'),
            'block_cart_hover_color' => Configuration::get('ST_BLOCK_CART_HOVER_COLOR'),
            'block_cart_bg' => Configuration::get('ST_BLOCK_CART_BG'),
            'block_cart_hover_bg' => Configuration::get('ST_BLOCK_CART_HOVER_BG'),
            'block_cart_border_color' => Configuration::get('ST_BLOCK_CART_BORDER_COLOR'),
            'block_cart_checkout' => (int)Configuration::get('ST_BLOCK_CART_CHECKOUT'),
	    	'shopping_free' => (int)Configuration::get('ST_SHOPPING_FREE'),
		    'cost_downloading' => (int)Configuration::get('ST_COST_DOWNLOADING'),
		    'cart_value' => (int)Configuration::get('ST_CART_VALUE'),
		    'simillar_widow' => (int)Configuration::get('ST_SIMILLAR_WIDOW'),
	     	'cart_style' => (int)Configuration::get('ST_CART_STYLE'),
		    'cart_quantity_mini' => (int)Configuration::get('ST_CART_QUANTITY_MINI'),
		    'cart_icone' => (int)Configuration::get('ST_CART_ICONE'),
		    'cart_icone_hover' => (int)Configuration::get('ST_CART_ICONE_HOVER'),
		
            'cart_icone_promo' => (int)Configuration::get('ST_CART_ICONE_PROMO'),
            'cart_promo_price' => (int)Configuration::get('ST_CART_PROMO_PRICE'),   
		    'button_checkout' => (int)Configuration::get('ST_BUTTON_CHECKOUT'),
		    'product_weight' => (int)Configuration::get('ST_PRODUCT_WEIGHT'),
		    'product_weight_summary' => (int)Configuration::get('ST_PRODUCT_WEIGHT_SUMMARY'),
	    	'taxin_cart' => (int)Configuration::get('ST_TAXIN_CART'),
		    'empty_cart' => (int)Configuration::get('ST_EMPTY_CART'),
		    'cart_category' => (int)Configuration::get('ST_CART_CATEGORY'),
		    'button_style' => (int)Configuration::get('ST_BUTTON_STYLE'),
	    	'cart_border_hover' => (int)Configuration::get('ST_CART_BORDER_HOVER'),
		
		
		    
	
		);
        
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $fields_values[$key.'_'.$value['id']] = 0;
                if($id_hook = Hook::getIdByName($value['id']))
                    if(Hook::getModulesFromHook($id_hook, $this->id))
                        $fields_values[$key.'_'.$value['id']] = 1;
            }
        }
        
        return $fields_values;
	}


    public function hookDisplaySideBar($params)
    {
    	if (Configuration::isCatalogMode()) {
		    return;
		}
		$this->smarty->assign($this->getWidgetVariables(null, $params));
        return $this->display(__FILE__, 'stshoppingcart-side.tpl');
    }
    /*public function hookDisplayMobileBar($params)
    {
    	if (Configuration::isCatalogMode()) {
		    return;
		}
    	$this->smarty->assign($this->getWidgetVariables(null, $params));
        return $this->display(__FILE__, 'stshoppingcart-mobilebar.tpl');
    }    
    public function hookDisplayMobileBarLeft($params){
        return $this->hookDisplayMobileBar($params);
    }
    public function hookDisplayMobileBarCenter($params){
        return $this->hookDisplayMobileBar($params);
    }
    public function hookDisplayMobileBarBottom($params){
    	return $this->hookDisplayMobileBar($params);
    }*/
    private function _check_single()
    {
        $msg = '';
        $count = 0;
        foreach($this->_hooks AS $values)
            foreach($values AS $value)
                if (isset($value['sin']) && $value['sin'])
                {
                    $id_hook = Hook::getIdByName($value['id']);
                    if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                        $msg .= '<br/>('.++$count.') '.$value['name'];
                }
        return $count > 1 ? $this->displayError($this->getTranslator()->trans('This module was transplanted to these hooks at the same time. You should not have done that. This module can only be transplante to one of them, otherwise the front page might be messed up.', array(), 'Modules.Stshoppingcart.Admin').$msg): '';
    }


	public function hookDisplayHeader($params)
	{
		if (Configuration::isCatalogMode()) {
		    return;
		}
		if ((int)(Configuration::get('PS_BLOCK_CART_AJAX')))
		{
            $this->context->controller->registerJavascript('modules-stshoppingcart', 'modules/'.$this->name.'/views/js/stshoppingcartv2.js');
			$this->context->controller->addJqueryPlugin(array('scrollTo'));
		}

		Media::addJsDef(array(
			'click_on_header_cart' => (int)Configuration::get('ST_CLICK_ON_HEADER_CART'),
			'hover_display_cp' => (int)Configuration::get('ST_HOVER_DISPLAY_CP'),
			'addtocart_animation' => (int)Configuration::get('ST_ADDTOCART_ANIMATION'),
        ));

        if (!$this->isCached($this->templatePath.'header.tpl', $this->getCacheId()))
        {   
            $custom_css = '';

            if ($quick_search_input_height = (int)Configuration::get('ST_BLOCK_CART_HEIGHT'))
            {
                $custom_css .= '.top_bar_item .cart_icon_item{height:'.$quick_search_input_height.'px;line-height:'.($quick_search_input_height-2).'px;}';
                $custom_css .= '.top_bar_item.shopping_cart_style_0 .ajax_cart_bag{min-width:'.$quick_search_input_height.'px;}';
            }
            if ($drop_down_cart_height = (int)Configuration::get('ST_DROP_DOWN_CART_HEIGHT'))
                $custom_css .= '.cart_body .small_cart_product_list{max-height:'.$drop_down_cart_height.'px;}';

            if (Configuration::get('ST_BLOCK_CART_COLOR'))
                $custom_css .= '.top_bar_item .cart_icon_item{color:'.Configuration::get('ST_BLOCK_CART_COLOR').';}';
            if (Configuration::get('ST_BLOCK_CART_HOVER_COLOR'))
            {
                $custom_css .= '.top_bar_item.shopping_cart_style_0:hover .ajax_cart_bag{color:'.Configuration::get('ST_BLOCK_CART_HOVER_COLOR').';}';
                $custom_css .= '.top_bar_item.shopping_cart_style_2:hover .cart_icon_item, .top_bar_item.shopping_cart_style_3:hover .cart_icon_item{color:'.Configuration::get('ST_BLOCK_CART_HOVER_COLOR').';}';
            }
            if (Configuration::get('ST_BLOCK_CART_BG'))
                $custom_css .= '.top_bar_item .cart_icon_item{background:'.Configuration::get('ST_BLOCK_CART_BG').';}';
            if (Configuration::get('ST_BLOCK_CART_HOVER_BG'))
            {
                $custom_css .= '.top_bar_item.shopping_cart_style_0:hover .ajax_cart_bag{background:'.Configuration::get('ST_BLOCK_CART_HOVER_BG').';}';
                $custom_css .= '.top_bar_item.shopping_cart_style_2:hover .cart_icon_item, .top_bar_item.shopping_cart_style_3:hover .cart_icon_item{background:'.Configuration::get('ST_BLOCK_CART_HOVER_BG').';}';
            }
            if (Configuration::get('ST_BLOCK_CART_BORDER_COLOR'))
                $custom_css .= '.top_bar_item.shopping_cart_style_0 .ajax_cart_bag.cart_icon_item{border-color:'.Configuration::get('ST_BLOCK_CART_BORDER_COLOR').';}';

            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }

        return $this->fetch($this->templatePath.'header.tpl', $this->getCacheId());
	}

	private function getCartSummaryURL()
	{
		return $this->context->link->getModuleLink('steasycheckout', 'default');

        return $this->context->link->getPageLink(
            'cart',
            null,
            $this->context->language->id,
            array(
                'action' => 'show'
            ),
            false,
            null,
            true
        );
	}

	public function getWidgetVariables($hookName, array $params)
	{
		$cart_url = $this->getCartSummaryURL();

		return array(
			'cart' => (new CartPresenter)->present(isset($params['cart']) ? $params['cart'] : $this->context->cart, true),
            'refresh_url' => $this->context->link->getModuleLink('stshoppingcart', 'ajax', array(), null, null, null, true),
			'cart_url' => $cart_url,
            'order_url' => version_compare(_PS_VERSION_, '1.7', '>=') ? $cart_url.'?checkout' : $this->context->link->getPageLink('order'),
			'click_on_header_cart' => Configuration::get('ST_CLICK_ON_HEADER_CART'),
			'hover_display_cp' => Configuration::get('ST_HOVER_DISPLAY_CP'),
			'addtocart_animation' => Configuration::get('ST_ADDTOCART_ANIMATION'),
            'block_cart_style' => Configuration::get('ST_BLOCK_CART_STYLE'),
			'block_cart_info' => Configuration::get('ST_BLOCK_CART_INFO'),
            'link' => $this->context->link
		);
	}

	public function renderWidget($hookName, array $params)
	{
		if (Configuration::isCatalogMode()) {
		    return;
		}
		$this->smarty->assign($this->getWidgetVariables($hookName, $params));
		return $this->fetch('module:stshoppingcart/views/templates/hook/stshoppingcart.tpl');
	}

	public function renderProductList($hookName, array $params)
	{
		if (Configuration::isCatalogMode()) {
		    return;
		}

		$this->smarty->assign($this->getWidgetVariables($hookName, $params));
		return $this->fetch('module:stshoppingcart/views/templates/hook/stshoppingcart-list.tpl');
	}

	public function renderModal(Cart $cart, $id_product, $id_product_attribute)
	{
		$data = (new CartPresenter)->present($cart, true);
		$product = null;
		foreach ($data['products'] as $p) {
			if ($p['id_product'] == $id_product && $p['id_product_attribute'] == $id_product_attribute) {
				$product = $p;
				break;
			}
		}

		if(!$product)
			return false;

        $module = Module::getInstanceByName('stthemeeditor');
        $vals = $module->getStBasicVals();

        $this->smarty->assign(array(
            'sttheme' => $vals['smarty_val'],
			'product' => $product,
			'cart' => $data,
			'cart_cross_selling' => $this->getCartCrossSelling($id_product),
            'cart_url' => $this->getCartSummaryURL(),
            'order_url' => $this->getCartSummaryURL() . '?checkout',
            'is_rtl' => (int)$this->context->language->is_rtl,
            'heading_style' => (int)Configuration::get('STSN_HEADING_STYLE'),
		));

		return $this->fetch('module:stshoppingcart/views/templates/hook/modal.tpl');
	}
	public function getCartCrossSelling($id_product)
	{
		if(!Configuration::get('PS_BLOCK_CART_SHOW_CROSSSELLING'))
			return false;
		return $this->getOrderProducts(array($id_product));
	}
	//this function copied from the ps_crosselling module
	protected function getOrderProducts(array $productIds = array())
    {
        $q_orders = 'SELECT o.id_order
        FROM '._DB_PREFIX_.'orders o
        LEFT JOIN '._DB_PREFIX_.'order_detail od ON (od.id_order = o.id_order)
        WHERE o.valid = 1
        AND od.product_id IN ('.implode(',', $productIds).')';

        $orders = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($q_orders);

        if (0 < count($orders)) {
            $list = '';
            foreach ($orders as $order) {
                $list .= (int)$order['id_order'].',';
            }
            $list = rtrim($list, ',');
            $list_product_ids = join(',', $productIds);

            if (Group::isFeatureActive()) {
                $sql_groups_join = '
                LEFT JOIN `'._DB_PREFIX_.'category_product` cp ON (cp.`id_category` = product_shop.id_category_default AND cp.id_product = product_shop.id_product)
                LEFT JOIN `'._DB_PREFIX_.'category_group` cg ON (cp.`id_category` = cg.`id_category`)';
                $groups = FrontController::getCurrentCustomerGroups();
                $sql_groups_where = 'AND cg.`id_group` '. (count($groups) ? 'IN ('.implode(',', $groups) . ')' : '=' . (int)Group::getCurrent()->id);
            }

            $order_products = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                SELECT DISTINCT od.product_id
                FROM '._DB_PREFIX_.'order_detail od
                LEFT JOIN '._DB_PREFIX_.'product p ON (p.id_product = od.product_id)
                '.Shop::addSqlAssociation('product', 'p').
                (Combination::isFeatureActive() ? 'LEFT JOIN `' . _DB_PREFIX_.'product_attribute` pa ON (p.`id_product` = pa.`id_product`)
                ' . Shop::addSqlAssociation(
                        'product_attribute',
                        'pa',
                        false,
                        'product_attribute_shop.`default_on` = 1'
                    ).'
                ' . Product::sqlStock(
                        'p',
                        'product_attribute_shop',
                        false,
                        $this->context->shop
                    ) :  Product::sqlStock(
                    'p',
                    'product',
                    false,
                    $this->context->shop
                )).'
                LEFT JOIN '._DB_PREFIX_.'product_lang pl ON (pl.id_product = od.product_id' .
                Shop::addSqlRestrictionOnLang('pl').')
                LEFT JOIN '._DB_PREFIX_.'category_lang cl ON (cl.id_category = product_shop.id_category_default'
                .Shop::addSqlRestrictionOnLang('cl').')
                LEFT JOIN '._DB_PREFIX_.'image i ON (i.id_product = od.product_id)
                '.(Group::isFeatureActive() ? $sql_groups_join : '').'
                WHERE od.id_order IN ('.$list.')
                AND pl.id_lang = '.(int)$this->context->language->id.'
                AND cl.id_lang = '.(int)$this->context->language->id.'
                AND od.product_id NOT IN ('.$list_product_ids.')
                AND i.cover = 1
                AND product_shop.active = 1
                '.(Group::isFeatureActive() ? $sql_groups_where : '').'
                ORDER BY RAND()
                LIMIT '.(int)Configuration::get('PS_BLOCK_CART_XSELL_LIMIT')
            );
        }

        if (!empty($order_products)) {
            $assembler = new ProductAssembler($this->context);

            $presenterFactory = new ProductPresenterFactory($this->context);
            $presentationSettings = $presenterFactory->getPresentationSettings();
            $presenter = new ProductListingPresenter(
                new ImageRetriever(
                    $this->context->link
                ),
                $this->context->link,
                new PriceFormatter(),
                new ProductColorsRetriever(),
                $this->context->getTranslator()
            );

            $productsForTemplate = array();

            if (is_array($order_products)) {
                foreach ($order_products as $productId) {
                    $productsForTemplate[] = $presenter->present(
                        $presentationSettings,
                        $assembler->assembleProduct(array('id_product' => $productId['product_id'])),
                        $this->context->language
                    );
                }
            }

            return $productsForTemplate;
        }

        return false;
    }
	public function renderFlyImage(Cart $cart, $id_product, $id_product_attribute)
	{
		$data = (new CartPresenter)->present($cart);
		$product = null;
		foreach ($data['products'] as $p) {
			if ($p['id_product'] == $id_product && $p['id_product_attribute'] == $id_product_attribute) {
				$product = $p;
				break;
			}
		}

		$this->smarty->assign(array(
			'product' => $product,
		));

		return $this->fetch('module:stshoppingcart/views/templates/hook/flying_image.tpl');
	}
    public function get_prefix()
    {
        return 'ST_BLOCK_CART_';
    }
}
