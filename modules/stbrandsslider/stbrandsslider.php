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

if (!defined('_PS_VERSION_'))
	exit;

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
require_once _PS_MODULE_DIR_.'stbrandsslider/classes/StBrandsSliderClass.php';
include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseSlider.php');
class StBrandsSlider extends BaseSlider implements WidgetInterface
{
    public $_prefix_st = 'ST_BRANDS_';
    public $_prefix_stsn = 'STSN_BRANDS_';
    protected $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Brand Name: A to Z'),
        2 => array('id' =>2 , 'name' => 'Brand Name: Z to A'),
        3 => array('id' =>3 , 'name' => 'Random'),
    );
    protected $templatePath;


    /*
        iWeb - 2019-05-09
    */
    protected $fields_default_stsn_epresta = array(
        'pro_per_rec_fw' => 0,
        'pro_per_rec_xxl' => 5,
        'pro_per_rec_xl' => 4,
        'pro_per_rec_lg' => 4,
        'pro_per_rec_md' => 3,
        'pro_per_rec_sm' => 2,
        'pro_per_rec_xs' => 1,
        'pro_per_list_fw' => 0,
        'pro_per_list_xxl' => 5,
        'pro_per_list_xl' => 4,
        'pro_per_list_lg' => 4,
        'pro_per_list_md' => 3,
        'pro_per_list_sm' => 2,
        'pro_per_list_xs' => 1,
    );


	public function __construct()
	{
		$this->name          = 'stbrandsslider';
		$this->version       = '1.3.7';
		$this->author        = '';
        $this->displayName = $this->getTranslator()->trans('Brands Slider', array(), 'Modules.Stbrandsslider.Admin');
		$this->description = $this->getTranslator()->trans('Brands slider on your home page.', array(), 'Modules.Stbrandsslider.Admin');
		$this->secure_key = Tools::encrypt($this->name);	
		parent::__construct();
        $this->templatePath = 'module:'.$this->name.'/views/templates/hook/';
    }
    protected function initTabNames()
    {
        $this->_tabs = array(
            array('id'  => '0', 'name' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer')),
            array('id'  => '1,4', 'name' => $this->getTranslator()->trans('Homepage', array(), 'Admin.Theme.Transformer')),
            array('id'  => '6,7', 'name' => $this->getTranslator()->trans('Brandpage', array(), 'Admin.Theme.Transformer')),
            array('id'  => '2', 'name' => $this->getTranslator()->trans('Left or right column', array(), 'Admin.Theme.Transformer')),
            array('id'  => '3', 'name' => $this->getTranslator()->trans('Hooks', array(), 'Admin.Theme.Transformer')),
        );
    }
    protected function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
                    'id' => 'displayFullWidthTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthTop', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayFullWidthTop2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthTop2', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeTop', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHome',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHome', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeLeft', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeRight', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeFirstQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFirstQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeSecondQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeSecondQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeThirdQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeThirdQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeFourthQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFourthQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeBottom', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayFullWidthBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthBottom', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayFooterProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooterProduct', array(), 'Admin.Theme.Transformer')
                ),
                
                array(
                    'id' => 'displayProductBottomZone',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductBottomZone', array(), 'Admin.Theme.Transformer')
                ),
                
                array(
                    'id' => 'displayBrandsText',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayBrandsText', array(), 'Admin.Theme.Transformer')
                ),
            ),
            'Column' => array(
                array(
                    'id' => 'displayLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Left column except the produt page', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column except the produt page', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayLeftColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Left column on the product page only', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayRightColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column on the product page only', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayProductRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Product right column', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayStBlogLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStBlogLeftColumn', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayStBlogRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStBlogRightColumn', array(), 'Admin.Theme.Transformer')
                )
            ),
            /*'Footer' => array(      
                array(
                    'id' => 'displayFooter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayFooterAfter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooterAfter', array(), 'Admin.Theme.Transformer')
                )
            )*/
        );
    }
	public function install()
	{
		if (!parent::install() 
            || !$this->installDB()
            || !$this->initData()
			|| !$this->registerHook('displayHomeBottom')
			|| !$this->registerHook('actionObjectManufacturerDeleteAfter')
			|| !$this->registerHook('actionObjectManufacturerUpdateAfter')
            || !$this->registerHook('vcBeforeInit')

            || !Configuration::updateValue($this->_prefix_st.'PRO_PER_XXL', 8)
            || !Configuration::updateValue($this->_prefix_st.'PRO_PER_XL', 7)
            || !Configuration::updateValue($this->_prefix_st.'PRO_PER_LG', 6)
            || !Configuration::updateValue($this->_prefix_st.'PRO_PER_MD', 5)
            || !Configuration::updateValue($this->_prefix_st.'PRO_PER_SM', 4)
            || !Configuration::updateValue($this->_prefix_st.'PRO_PER_XS', 3)
            
            || !Configuration::updateValue($this->_prefix_st.'RECOMENDED_PRODUCER', 0)
            || !Configuration::updateValue($this->_prefix_st.'NAME_BRAND_FEATURED', 0)
            || !Configuration::updateValue($this->_prefix_st.'DESC_BRAND_FEATURED', 0)
            
            || !Configuration::updateValue($this->_prefix_st.'NAME_LETTER', 1)
            || !Configuration::updateValue($this->_prefix_st.'IMAGE_BRAND', 1)
            || !Configuration::updateValue($this->_prefix_st.'SHORT_DESC_LETTER', 1)
            || !Configuration::updateValue($this->_prefix_st.'QUANTITY_LETTER', 1)
            || !Configuration::updateValue($this->_prefix_st.'LOVED_BRAND', 1)
            || !Configuration::updateValue($this->_prefix_st.'BRAND_STICKY', 1)
            || !Configuration::updateValue($this->_prefix_st.'ALFABET_STICKY_VERTICAL', 1)
			|| !Configuration::updateValue($this->_prefix_st.'BRAND_STICKY_SEARCH', 1)
            || !Configuration::updateValue($this->_prefix_st.'MORE_LETTER', 1)
            || !Configuration::updateValue($this->_prefix_st.'BRAND_INFORMATION', 1)         
			|| !Configuration::updateValue($this->_prefix_st.'BR_HIDE_DIRECTION_NAV_ON_MOB', 1)
			|| !Configuration::updateValue($this->_prefix_st.'BR_HIDE_CONTROL_NAV_ON_MOB', 1)
			|| !Configuration::updateValue($this->_prefix_st.'BR_CONTROL_NAV', 1)
			|| !Configuration::updateValue($this->_prefix_st.'BR_DIRECTION_NAV', 1)
            
	
     
            || !Configuration::updateValue($this->_prefix_st.'NBR', 10)
            || !Configuration::updateValue($this->_prefix_st.'ORDER', 1)
            || !Configuration::updateValue($this->_prefix_st.'NAME', 0)
            || !Configuration::updateValue($this->_prefix_st.'SHORT_DESC', 0)
            || !Configuration::updateValue($this->_prefix_st.'SPACING_BETWEEN', 13)
        )
			return false;
        $this->clearSliderCache();
		return true;
	}
	public function uninstall()
	{
        $this->clearSliderCache();
		if (!parent::uninstall() 
            || !$this->uninstallDB()
        )
			return false;
		return true;
	}
    private function installDB()
	{
		return Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_brands_slider` (
                 `id_manufacturer` int(10) NOT NULL,  
                 `id_shop` int(11) NOT NULL,                   
                PRIMARY KEY (`id_manufacturer`,`id_shop`),    
                KEY `id_shop` (`id_shop`)       
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
	}
	private function uninstallDB()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_brands_slider`');
	}  
    private function initData()
    {
        $res = true;
        $manufacturers = Manufacturer::getManufacturers(false, (int)$this->context->language->id);
        if (is_array($manufacturers) && count($manufacturers))
        {
            foreach($manufacturers as $k => $v)
                if($k<10)
                    $res &= Db::getInstance()->insert('st_brands_slider', array(
        					'id_manufacturer' => (int)$v['id_manufacturer'],
        					'id_shop' => (int)$this->context->shop->id,
        				));
                else
                    break;
        }
        return $res;
    }
    public function getContent()
	{
        $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');
        if(Tools::getValue('act')=='delete_image' && $identi = Tools::getValue('identi'))
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );

            if(Configuration::updateValue($this->_prefix_st.Tools::strtoupper($identi), ''))

            die(json_encode($result));
        }
        $this->initHookArray();
	    $this->initTabNames();
        if (Tools::getValue('act') == 'gmfb' && Tools::getValue('ajax')==1)
        {
            if(!$q = Tools::getValue('q'))
                die;
            $excludeIds = Tools::getValue('excludeIds');
            $result = Db::getInstance()->executeS('
			SELECT m.`id_manufacturer`,m.`name`
			FROM `'._DB_PREFIX_.'manufacturer` m
            LEFT JOIN `'._DB_PREFIX_.'manufacturer_shop` ms
            ON m.`id_manufacturer` = ms.`id_manufacturer`
			WHERE `name` LIKE \'%'.pSQL($q).'%\'
            AND id_shop = '.(int)Shop::getContextShopID().'
            AND `active` = 1
            '.($excludeIds ? 'AND m.`id_manufacturer` NOT IN('.$excludeIds.')' : '').'
    		');
            foreach ($result AS $value)
		      echo trim($value['name']).'|'.(int)($value['id_manufacturer'])."\n";
            die;
        }
        parent::getContent();
		$helper = $this->initForm();
        $this->smarty->assign(array(
            'bo_tabs' => $this->_tabs,
            'bo_tab_content' => $helper->generateForm($this->fields_form),
        ));
        return $this->_html.$this->display(__FILE__, 'bo_tab_layout.tpl');
	}
    public function saveForm()
    {
        if (isset($_POST['savesliderform'])) {
            StBrandsSliderClass::deleteByShop((int)$this->context->shop->id);
            $res = true;
            if($id_manufacturer = Tools::getValue('id_manufacturer'))
                foreach($id_manufacturer AS $value)
                {
                  $res &= Db::getInstance()->insert('st_brands_slider', array(
        					'id_manufacturer' => (int)$value,
        					'id_shop' => (int)$this->context->shop->id,
        				));  
                }
            if ($res) {
                parent::saveForm();
            }    
        }
    }
    public function initFieldsForm()
    {
        $this->fields_form = array();
        $fields = $this->getFormFields();
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Show all Brands:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'all',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'all_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'all_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer'))
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                'manufacturers' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Specific Brands:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'manufacturers',
                    'autocomplete' => false,
                    'class' => 'fixed-width-xxl',
                    'desc' => '',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display brand name:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'name',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'slide_name_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'slide_name_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Display brand short description:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'short_desc',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'short_desc_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'short_desc_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Normal(100 characters)', array(), 'Modules.Stbrandsslider.Admin')),
                        array(
                            'id' => 'short_desc_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Full description', array(), 'Modules.Stbrandsslider.Admin')),
                    ),
                    'validation' => 'isUnsignedInt',
                )
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        $this->fields_form[0]['form']['input'] = array_merge($this->fields_form[0]['form']['input'], $fields['setting']);
        
        $fields['home_slider']['nbr']['label'] = $this->getTranslator()->trans('Define the number of brands to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['label'] = $this->getTranslator()->trans('Spacing between brands:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['desc'][0] = $this->getTranslator()->trans('Distance between brands.', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['link_hover_color']['label'] = $this->getTranslator()->trans('Brands name hover color:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['soby']['default_value'] = 1;
        unset($fields['home_slider']['grid']);
        unset($fields['home_slider']['display_sd']);
        unset($fields['home_slider']['price_color']);
        unset($fields['home_slider']['image_type']);
        $this->fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Slider on homepage', array(), 'Admin.Theme.Transformer'),
			),
			'input' => $fields['home_slider'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        
        $fields['column']['display_pro_col']['label'] = $this->getTranslator()->trans('How to display brands:', array(), 'Admin.Theme.Transformer');
        $fields['column']['nbr_col']['label'] = $this->getTranslator()->trans('Define the number of brands to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['column']['items_col']['label'] = $this->getTranslator()->trans('How many brands per view on compact slider:', array(), 'Admin.Theme.Transformer');
        $fields['column']['soby_col']['default_value'] = 1;
        unset($fields['column']['aw_display_col']);

        $this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Left or right column', array(), 'Admin.Theme.Transformer'),
			),
			'input' => $fields['column'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        
        $this->fields_form[3]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').
            '<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
			'input' => $fields['hook'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);

        /*
            iWeb - 2019-05-09
        */
        $dropdownlistgroup = $fields['home_slider']['dropdownlistgroup'];
        $dropdownlistgroup['name'] = 'pro_per_rec';
		
		 $this->fields_form[6]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Recommended producers', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			
			'description' => $this->getTranslator()->trans('List settings of recommended producers on the website of your stores producers.', array(), 'Admin.Theme.Transformer'),
          'input' => array(
			
			 array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('The way of presentation', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'recomended_producer',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'recomended_producer_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Slider', array(), 'Modules.Stbrandsslider.Admin')),
                        array(
                            'id' => 'recomended_producer_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Static', array(), 'Modules.Stbrandsslider.Admin')),
                       
                    ),
                    'validation' => 'isUnsignedInt',
             
			),
			
			
			array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
			'name' => 'br_direction_nav',
			'default_value' => 3,
			'values' => array(
				array(
					'id' => 'br_direction_nav_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_2t',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Full height', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full height, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_4',
					'value' => 4,
					'label' =>$this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_5',
					'value' => 5,
					'label' =>$this->getTranslator()->trans('Square, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_6',
					'value' => 6,
					'label' =>$this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_7',
					'value' => 7,
					'label' =>$this->getTranslator()->trans('Circle, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_8',
					'value' => 8,
					'label' =>$this->getTranslator()->trans('Arrow', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_direction_nav_9',
					'value' => 9,
					'label' =>$this->getTranslator()->trans('Arrow, show out when mouseover', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
        array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Hide "next" and "prev" buttons on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'br_hide_direction_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'br_hide_direction_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'br_hide_direction_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show pagination:', array(), 'Admin.Theme.Transformer'),
			'name' => 'br_control_nav',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'br_control_nav_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_control_nav_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Round', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_control_nav_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Progress', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_control_nav_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Number', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'br_control_nav_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		
		array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Hide navigation on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'br_hide_control_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'br_hide_control_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'br_hide_control_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
			
			 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display brand name:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'name_brand_featured',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'name_brand_featured_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'name_brand_featured_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    
                 
                ), 
                
                 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display brand short description:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'desc_brand_featured',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'desc_brand_featured_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'desc_brand_featured_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    ),

                'dropdownlistgroup' => $dropdownlistgroup
                    
                ), 
                
              
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);


        /*
            iWeb - 2019-05-09
        */
        $dropdownlistgroup['name'] = 'pro_per_list';


		$this->fields_form[7]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Brand list settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			
			  'description' => $this->getTranslator()->trans('List settings of all manufacturers on the website of your stores producers.', array(), 'Admin.Theme.Transformer'),
         
           
			'input' => array(
			
			array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Brand search sticky:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'brand_sticky',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'brand_sticky_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'brand_sticky_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                          
                                       
                ), 
                
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Search engine in the mobile version (sticky):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'brand_sticky_search',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'brand_sticky_search_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'brand_sticky_search_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                          
                                       
                ), 
                
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Vertical sticky alphabet in the mobile version:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'alfabet_sticky_vertical',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'alfabet_sticky_vertical_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'alfabet_sticky_vertical_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                          
                                       
                ), 
			
			 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display brand list:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'brand_list_show',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'brand_list_show_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'brand_list_show_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    
                ), 
                
                 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display brand search:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'brand_list_search',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'brand_list_search_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'brand_list_search_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    
                ), 
			
			 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display brand name:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'name_letter',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'name_letter_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'name_letter_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    
                ), 
                
                
                 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Add to favorites:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'loved_brand',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'loved_brand_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'loved_brand_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                          
                                       
                ), 
                
                
                
                
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display image brand:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'image_brand',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'image_brand_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'image_brand_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    
                   
                ),
                
                 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display brand short description:', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'short_desc_letter',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'short_desc_letter_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'short_desc_letter_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    
                   
                ), 
                
                 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Amount of products', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'quantity_letter',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'quantity_letter_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'quantity_letter_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ), 
                
                 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Link more', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'more_letter',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'more_letter_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'more_letter_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    
                    
                ), 
                
                 array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Manufacturers data', array(), 'Modules.Stbrandsslider.Admin'),
                    'name' => 'brand_information',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'recomended_producer_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('On the left side of the logo', array(), 'Modules.Stbrandsslider.Admin')),
                        array(
                            'id' => 'recomended_producer_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Below the logo', array(), 'Modules.Stbrandsslider.Admin')),
                       
                    ),
                    'validation' => 'isUnsignedInt',
                    
                    ),
                'dropdownlistgroup' => $dropdownlistgroup
             
			),
			
			
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        
        $this->fields_form[4]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Video background', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'description' => $this->getTranslator()->trans('Video background feature can not work on both Android and IOS devices, which is due to restrictions on autoplay and performance, so you also need to upload a video thumbnail, the thumbnail will be displayed on mobile devices.', array(), 'Admin.Theme.Transformer'),
            'input' => $fields['video'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
    }
    
    public function hookDisplayHeader($params)
    {
        if (!$this->isCached($this->templatePath.'header.tpl', $this->getCacheId()))
        {
            $custom_css = '';
            
            $group_css = '';
            if ($bg_color = Configuration::get($this->_prefix_st.'BG_COLOR'))
                $group_css .= 'background-color:'.$bg_color.';';
            if ($bg_img = Configuration::get($this->_prefix_st.'BG_IMG'))
            {
                $this->fetchMediaServer($bg_img);
                $group_css .= 'background-image: url('.$bg_img.');';
            }
            elseif ($bg_pattern = Configuration::get($this->_prefix_st.'BG_PATTERN'))
            {
                $img = _MODULE_DIR_.'stthemeeditor/patterns/'.$bg_pattern.'.png';
                $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                $group_css .= 'background-image: url('.$img.');background-repeat: repeat;';
            }
            if($group_css)
                $custom_css .= '.brands_slider_container.products_container{'.$group_css.'}';
            if ($bg_img_v_offset = (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET')) {
                $custom_css .= '.brands_slider_container.products_container{background-position:center -'.$bg_img_v_offset.'px;}';
            }

            if ($top_padding = (int)Configuration::get($this->_prefix_st.'TOP_PADDING'))
                $custom_css .= '@media (min-width: 768px) {.brands_slider_container.products_container{padding-top:'.$top_padding.'px;}}';
            if ($bottom_padding = (int)Configuration::get($this->_prefix_st.'BOTTOM_PADDING'))
                $custom_css .= '@media (min-width: 768px) {.brands_slider_container.products_container{padding-bottom:'.$bottom_padding.'px;}}';
                
            if ($top_padding_mobile = (int)Configuration::get($this->_prefix_st.'TOP_PADDING_MOBILE'))
                $custom_css .= '@media (max-width: 767px) {.brands_slider_container.products_container{padding-top:'.$top_padding_mobile.'px;}}';
            if ($bottom_padding_mobile = (int)Configuration::get($this->_prefix_st.'BOTTOM_PADDING_MOBILE'))
                $custom_css .= '@media (max-width: 767px) {.brands_slider_container.products_container{padding-bottom:'.$bottom_padding_mobile.'px;}}';

            $top_margin = Configuration::get($this->_prefix_st.'TOP_MARGIN');
            if($top_margin || $top_margin===0 || $top_margin==='0')
                $custom_css .= '@media (min-width: 768px) {.brands_slider_container.products_container{margin-top:'.$top_margin.'px;}}';
            $bottom_margin = Configuration::get($this->_prefix_st.'BOTTOM_MARGIN');
            if($bottom_margin || $bottom_margin===0 || $bottom_margin==='0')
                $custom_css .= '@media (min-width: 768px) {.brands_slider_container.products_container{margin-bottom:'.$bottom_margin.'px;}}';
                
            $top_margin_mobile = Configuration::get($this->_prefix_st.'TOP_MARGIN_MOBILE');
            if($top_margin_mobile || $top_margi_mobile===0 || $top_margin_mobile==='0')
                $custom_css .= '@media (max-width: 767px) {.brands_slider_container.products_container{margin-top:'.$top_margin_mobile.'px;}}';
            $bottom_margin_mobile = Configuration::get($this->_prefix_st.'BOTTOM_MARGIN_MOBILE');
            if($bottom_margin_mobile || $bottom_margin_mobile===0 || $bottom_margin_mobile==='0')
                $custom_css .= '@media (max-width: 767px) {.brands_slider_container.products_container{margin-bottom:'.$bottom_margin_mobile.'px;}}';

            if ($title_font_size = (int)Configuration::get($this->_prefix_st.'TITLE_FONT_SIZE'))
                 $custom_css .= '.brands_slider_container.products_container .title_block_inner{font-size:'.$title_font_size.'px;}';

            if ($title_color = Configuration::get($this->_prefix_st.'TITLE_COLOR'))
                $custom_css .= '.brands_slider_container.products_container .title_block_inner{color:'.$title_color.';}';
            if ($title_hover_color = Configuration::get($this->_prefix_st.'TITLE_HOVER_COLOR'))
                $custom_css .= '.brands_slider_container.products_container .title_block_inner:hover{color:'.$title_hover_color.';}';


            $heading_bottom_border = Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER');
            if($heading_bottom_border || $heading_bottom_border===0 || $heading_bottom_border==='0')
            {
                $custom_css .= '.brands_slider_container.products_container .title_style_0,.brands_slider_container.products_container .title_style_0 .title_block_inner{border-bottom-width:'.$heading_bottom_border.'px;}.brands_slider_container.products_container .title_style_0 .title_block_inner{margin-bottom:'.$heading_bottom_border.'px;}';
                $custom_css .= '.brands_slider_container.products_container .title_style_1 .flex_child, .brands_slider_container.products_container .title_style_3 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                $custom_css .= '.brands_slider_container.products_container .title_style_2 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;border-top-width:'.$heading_bottom_border.'px;}';
            }
            
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR'))
                $custom_css .='.brands_slider_container.products_container .title_style_0, .brands_slider_container.products_container .title_style_1 .flex_child, .brands_slider_container.products_container .title_style_2 .flex_child, .brands_slider_container.products_container .title_style_3 .flex_child{border-bottom-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}.brands_slider_container.products_container .title_style_2 .flex_child{border-top-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}';  
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H'))
                $custom_css .='.brands_slider_container.products_container .title_style_0 .title_block_inner{border-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H').';}'; 
                
            if ($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR'))
                $custom_css .= '.brands_slider_container.products_container .pro_second_box .s_title_block a,
                .brands_slider_container.products_container .pro_second_box .product-desc{color:'.$text_color.';}';
    
            if ($link_hover_color = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR'))
                $custom_css .= '.brands_slider_container.products_container .pro_second_box .s_title_block a:hover{color:'.$link_hover_color.';}';
    
            if ($grid_bg = Configuration::get($this->_prefix_st.'GRID_BG'))
                $custom_css .= '.brands_slider_container.products_container .pro_outer_box .pro_second_box{background-color:'.$grid_bg.';}';
            if ($grid_hover_bg = Configuration::get($this->_prefix_st.'GRID_HOVER_BG'))
                $custom_css .= '.brands_slider_container.products_container .pro_outer_box:hover .pro_second_box{background-color:'.$grid_hover_bg.';}';

            if ($direction_color = Configuration::get($this->_prefix_st.'DIRECTION_COLOR'))
                $custom_css .= '.brands_slider_container.block .products_slider .swiper-button{color:'.$direction_color.';}';
            if ($direction_color_hover = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_HOVER'))
                $custom_css .= '.brands_slider_container.block .products_slider .swiper-button:hover{color:'.$direction_color_hover.';}';
            if ($direction_color_disabled = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_DISABLED'))
                $custom_css .= '.brands_slider_container.block .products_slider .swiper-button.swiper-button-disabled, .brands_slider_container.block .products_slider .swiper-button.swiper-button-disabled:hover{color:'.$direction_color_disabled.';}';
            
            if ($direction_bg = Configuration::get($this->_prefix_st.'DIRECTION_BG'))
                $custom_css .= '.brands_slider_container.block .products_slider .swiper-button{background-color:'.$direction_bg.';}';
            if ($direction_hover_bg = Configuration::get($this->_prefix_st.'DIRECTION_HOVER_BG'))
                $custom_css .= '.brands_slider_container.block .products_slider .swiper-button:hover{background-color:'.$direction_hover_bg.';}';
            if ($direction_disabled_bg = Configuration::get($this->_prefix_st.'DIRECTION_DISABLED_BG'))
                $custom_css .= '.brands_slider_container.block .products_slider .swiper-button.swiper-button-disabled, .brands_slider_container.block .products_slider .swiper-button.swiper-button-disabled:hover{background-color:'.$direction_disabled_bg.';}';
            /*else
                $custom_css .= '.brands_slider_container .products_slider .swiper-button.swiper-button-disabled, .brands_slider_container .products_slider .swiper-button.swiper-button-disabled:hover{background-color:transparent;}';*/

            if ($pag_nav_bg = Configuration::get($this->_prefix_st.'PAG_NAV_BG')){
                $custom_css .= '.brands_slider_container .swiper-pagination-bullet,.brands_slider_container .swiper-pagination-progress{background-color:'.$pag_nav_bg.';}';
                $custom_css .= '.brands_slider_container .swiper-pagination-st-round .swiper-pagination-bullet{background-color:transparent;border-color:'.$pag_nav_bg.';}';
                $custom_css .= '.brands_slider_container .swiper-pagination-st-round .swiper-pagination-bullet span{background-color:'.$pag_nav_bg.';}';
            }
            
            
             if ($left_padding = Configuration::get($this->_prefix_st.'LEFT_PADDING'))
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container.products_container .block_content {padding-left:'.$left_padding.'px;}}';
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .left_zone_visible {width:'.$left_padding.'px;}}';
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .swiper-container.position_buttons_0 {padding-left:'.$left_padding.'px;}}';
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .swiper-container.position_buttons_0 {margin-left:-'.$left_padding.'px;}}';
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .title_block {padding-left:'.$left_padding.'px;}}';  
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .product_view_more_box {padding-left:'.$left_padding.'px;}}';  
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .product_list {padding-left:'.$left_padding.'px;}}';  
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .pro_itemlist {padding-left:'.$left_padding.'px;}}'; 
                
              if ($right_padding = Configuration::get($this->_prefix_st.'RIGHT_PADDING'))
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container.products_container .block_content {padding-right:'.$right_padding.'px;}}';
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .right_zone_visible {width:'.$right_padding.'px;}';  
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .swiper-container.position_buttons_0 {padding-right:'.$right_padding.'px;}}'; 
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .swiper-container.position_buttons_0 {margin-right:-'.$right_padding.'px;}}';  
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container.title_block {padding-right:'.$right_padding.'px;}}';  
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .product_view_more_box {padding-right:'.$right_padding.'px;}}';  
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .product_list {padding-right:'.$right_padding.'px;}}';  
                $custom_css .= '@media (min-width: 992px) {.brands_slider_container .pro_itemlist {padding-right:'.$right_padding.'px;}}';  
                
                
                 
            if ($bg_color = Configuration::get($this->_prefix_st.'BG_COLOR'))
              $custom_css .= '.brands_slider_container .left_zone_visible {background:'.$bg_color.' !important;}';
              $custom_css .= '.brands_slider_container .right_zone_visible {background:'.$bg_color.' !important;}';
            
            if ($pag_nav_bg_hover = Configuration::get($this->_prefix_st.'PAG_NAV_BG_HOVER')){
                $custom_css .= '.brands_slider_container .swiper-pagination-bullet-active, .brands_slider_container .swiper-pagination-progress .swiper-pagination-progressbar{background-color:'.$pag_nav_bg_hover.';}';
                $custom_css .= '.brands_slider_container .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active{background-color:'.$pag_nav_bg_hover.';border-color:'.$pag_nav_bg_hover.';}';
                $custom_css .= '.brands_slider_container .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active span{background-color:'.$pag_nav_bg_hover.';}';
            }

            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->fetch($this->templatePath.'header.tpl', $this->getCacheId());
    }
	public function hookDisplayHome($params, $func = '', $flag=0)
	{
	    $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__).(isset($params['st_time']) ? $params['st_time'] : '');
		if (!$this->isCached($this->templatePath.'stbrandsslider.tpl', $this->stGetCacheId($hook_hash)) || Configuration::get($this->_prefix_st.'SOBY') == 3) {
            $this->_prepareHook();

            $custom_content = Hook::exec('displayModuleCustomContent', array('type'=>2,'identify'=>'stbrandsslider'), null, true);

            $poster = Configuration::get($this->_prefix_st.'VIDEO_POSTER');
            if($poster)
                $this->fetchMediaServer($poster);
            $this->smarty->assign(array(
                'homeverybottom'         => ($flag==2 ? true : false),
                'hook_hash'              => $hook_hash,
                                
                'has_background_img'     => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
                'speed'                  => Configuration::get($this->_prefix_st.'SPEED'),
                'bg_img_v_offset'        => (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET'),

                'video_mpfour'  => Configuration::get($this->_prefix_st.'VIDEO_MPFOUR'),
                'video_webm'    => Configuration::get($this->_prefix_st.'VIDEO_WEBM'),
                'video_ogg'     => Configuration::get($this->_prefix_st.'VIDEO_OGG'),
                'video_loop'    => Configuration::get($this->_prefix_st.'VIDEO_LOOP'),
                'video_muted'   => Configuration::get($this->_prefix_st.'VIDEO_MUTED'),
                'video_poster'  => $poster,
                'video_v_offset'=> Configuration::get($this->_prefix_st.'VIDEO_V_OFFSET'),

                'custom_content' => $custom_content && array_key_exists('steasycontent', $custom_content) ? $custom_content['steasycontent'] : false,
            ));
        }
		return $this->fetch($this->templatePath.'stbrandsslider.tpl', $this->stGetCacheId($hook_hash));
	}
	
public function hookDisplayBrandsText($params, $func = '', $flag=0)
	{
	    $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__).(isset($params['st_time']) ? $params['st_time'] : '');
		if (!$this->isCached($this->templatePath.'stbrandsslider.tpl', $this->stGetCacheId($hook_hash)) || Configuration::get($this->_prefix_st.'SOBY') == 3) {
            $this->_prepareHook();

            $custom_content = Hook::exec('displayModuleCustomContent', array('type'=>2,'identify'=>'stbrandsslider'), null, true);

            $poster = Configuration::get($this->_prefix_st.'VIDEO_POSTER');
            if($poster)
                $this->fetchMediaServer($poster);
            $this->smarty->assign(array(
                'homeverybottom'         => ($flag==2 ? true : false),
                'hook_hash'              => $hook_hash,
                                
                'has_background_img'     => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
                'speed'                  => Configuration::get($this->_prefix_st.'SPEED'),
                'bg_img_v_offset'        => (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET'),

                'video_mpfour'  => Configuration::get($this->_prefix_st.'VIDEO_MPFOUR'),
                'video_webm'    => Configuration::get($this->_prefix_st.'VIDEO_WEBM'),
                'video_ogg'     => Configuration::get($this->_prefix_st.'VIDEO_OGG'),
                'video_loop'    => Configuration::get($this->_prefix_st.'VIDEO_LOOP'),
                'video_muted'   => Configuration::get($this->_prefix_st.'VIDEO_MUTED'),
                'video_poster'  => $poster,
                'video_v_offset'=> Configuration::get($this->_prefix_st.'VIDEO_V_OFFSET'),

                'custom_content' => $custom_content && array_key_exists('steasycontent', $custom_content) ? $custom_content['steasycontent'] : false,
            ));
        }
		return $this->fetch($this->templatePath.'stbrandpage.tpl', $this->stGetCacheId($hook_hash));
	}
	
	
    public function hookDisplayLeftColumn($params, $func = '')
    {
        $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
		if (!$this->isCached($this->templatePath.'stbrandsslider-column.tpl', $this->stGetCacheId($hook_hash))) {
            $this->_prepareHook('col');
            $this->smarty->assign(array(
                'hook_hash' => $hook_hash
            ));
        }
		return $this->fetch($this->templatePath.'stbrandsslider-column.tpl', $this->stGetCacheId($hook_hash));
    }
    public function hookDisplayCategoryFooter($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayFooterProduct($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    
    public function hookDisplayProductBottomZone($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    /*public function hookDisplayFooter($params, $func = '')
    {
        $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
	    if (!$this->isCached('stbrandsslider-footer.tpl', $this->stGetCacheId($hook_hash)))
	    {
            $this->_prepareHook('fot');
            $this->smarty->assign(array(
                'hook_hash' => $hook_hash
            ));
	    }
		return $this->display(__FILE__, 'stbrandsslider-footer.tpl', $this->stGetCacheId($hook_hash));
    }*/
    private function _prepareHook($ext='')
    {
        if (Configuration::get($this->_prefix_st.'ALL'))
            $brands = $this->getManufacturersAll();
        else
            $brands = $this->getManufacturers(Configuration::get($this->_prefix_st.'NBR'.$ext), $this->context->shop->id,$this->context->language->id);
        
        $ext = $ext ? '_'.strtoupper($ext) : '';

		$this->smarty->assign(array(
            'brands'                        => $this->getTemplateVarManufacturers($brands),
            'manufacturerSize'              => Image::getSize(ImageType::getFormattedName('brand')),
            
            'slider_slideshow'              => Configuration::get($this->_prefix_st.'SLIDESHOW'.$ext),
            'slider_s_speed'                => Configuration::get($this->_prefix_st.'S_SPEED'.$ext),
            'slider_a_speed'                => Configuration::get($this->_prefix_st.'A_SPEED'.$ext),
            'slider_pause_on_hover'         => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'.$ext),
            'rewind_nav'                    => Configuration::get($this->_prefix_st.'REWIND_NAV'.$ext),
            
            'slider_move'                   => Configuration::get($this->_prefix_st.'MOVE'),
            'slider_items'                  => Configuration::get($this->_prefix_st.'ITEMS_COL'),
            'spacing_between'               => Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            
            'lazy_load'                   => Configuration::get($this->_prefix_st.'LAZY'.$ext),
            'pro_per_fw'                  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_FW'),
            'pro_per_xxl'                 => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
            'pro_per_xl'                  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
            'pro_per_lg'                  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
            'pro_per_md'                  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_MD'),
            'pro_per_sm'                  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_SM'),
            'pro_per_xs'                  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XS'),
            'title_position'              => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
            'direction_nav'               => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'                 => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
            'brand_slider_items'          => Configuration::get($this->_prefix_st.'ITEMS_COL'),
            'hide_mob'                    => Configuration::get($this->_prefix_st.'HIDE_MOB'),
            'hide_direction_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
            'hide_control_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
            'view_more'             => (int)Configuration::get($this->_prefix_st.'VIEW_MORE'),
        ));
    }
    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        $this->clearSliderCache();
    }
    public function hookActionObjectManufacturerUpdateAfter($params)
    {
        $this->clearSliderCache();
    }
	public function getManufacturers($nbr, $id_shop , $id_lang = 0 )
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		if (!$id_shop)
			$id_shop = (int)$this->context->shop->id;

		$sql = 'SELECT m.*, ml.`description`, ml.`short_description`
			FROM `'._DB_PREFIX_.'st_brands_slider` sbs
            LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = sbs.`id_manufacturer` 
			LEFT JOIN `'._DB_PREFIX_.'manufacturer_lang` ml ON (
				m.`id_manufacturer` = ml.`id_manufacturer`
				AND ml.`id_lang` = '.(int)$id_lang.'
			)
			'.Shop::addSqlAssociation('manufacturer', 'm');
			$sql .= ' WHERE sbs.`id_shop` = '.$id_shop.' AND m.`active` = 1 
            GROUP BY m.id_manufacturer ';
            switch(Configuration::get($this->_prefix_st.'SOBY'))
            {
                case 1:
                    $sql .= ' ORDER BY m.`name` ASC ';
                break;
                case 2:
                    $sql .= ' ORDER BY m.`name` DESC ';
                break;
                case 3:
                    $sql .= ' ORDER BY RAND() ';
                break;
                default:
                    $sql .= ' ORDER BY m.`name` ASC ';
                break;
            }
            $sql .= ($nbr ? ' LIMIT '.$nbr : '');

		$manufacturers = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		if ($manufacturers === false)
			return false;

        $totalManufacturers = count($manufacturers);
        $rewriteSettings = (int) Configuration::get('PS_REWRITING_SETTINGS');
        for ($i = 0; $i < $totalManufacturers; $i++) {
            $manufacturers[$i]['link_rewrite'] = ($rewriteSettings ? Tools::link_rewrite($manufacturers[$i]['name']) : 0);
        }

		return $manufacturers;
	}
    public function getManufacturersAll($active = true)
	{
		$id_lang = (int)$this->context->language->id;
        
        $order_by = 'm.`name` DESC'; 
        switch(Configuration::get($this->_prefix_st.'SOBY'))
        {
            case 1:
                $order_by = ' m.`name` ASC ';
            break;
            case 2:
                $order_by = ' m.`name` DESC ';
            break;
            case 3:
                $order_by = ' RAND() ';
            break;
            default:
                $order_by = ' m.`name` ASC ';
            break;
        }   
   
		$manufacturers = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT m.*, ml.`description`, ml.`short_description`
		FROM `'._DB_PREFIX_.'manufacturer` m
		'.Shop::addSqlAssociation('manufacturer', 'm').'
		INNER JOIN `'._DB_PREFIX_.'manufacturer_lang` ml ON (m.`id_manufacturer` = ml.`id_manufacturer` AND ml.`id_lang` = '.(int)$id_lang.')
		'.($active ? 'WHERE m.`active` = 1' : '')
		.' GROUP BY m.`id_manufacturer`'
        .' ORDER by'.$order_by);
		if ($manufacturers === false)
			return false;

        $totalManufacturers = count($manufacturers);
        $rewriteSettings = (int) Configuration::get('PS_REWRITING_SETTINGS');
        for ($i = 0; $i < $totalManufacturers; $i++) {
            $manufacturers[$i]['link_rewrite'] = ($rewriteSettings ? Tools::link_rewrite($manufacturers[$i]['name']) : 0);
        }

		return $manufacturers;
	}
    public function getTemplateVarManufacturers($manufacturers)
    {
        $manufacturers_for_display = array();

        if(is_array($manufacturers) && count($manufacturers)){
            foreach ($manufacturers as $manufacturer) {
                $manufacturers_for_display[$manufacturer['id_manufacturer']] = $manufacturer;
                $manufacturers_for_display[$manufacturer['id_manufacturer']]['text'] = $manufacturer['short_description'];
                $manufacturers_for_display[$manufacturer['id_manufacturer']]['image'] = $this->context->link->getManufacturerImageLink($manufacturer['id_manufacturer'], 'brand_default');
                $manufacturers_for_display[$manufacturer['id_manufacturer']]['image_2x'] = $this->context->link->getManufacturerImageLink($manufacturer['id_manufacturer'], 'brand_default_2x');
                $manufacturers_for_display[$manufacturer['id_manufacturer']]['url'] = $this->context->link->getmanufacturerLink($manufacturer['id_manufacturer']);

            }
        }
        return $manufacturers_for_display;
    }
    
    public function getConfigFieldsValues()
    {
        $fields_values = array(
            'nbr'            => Configuration::get($this->_prefix_st.'NBR'),
            'order'          => Configuration::get($this->_prefix_st.'ORDER'),
            'name'           => Configuration::get($this->_prefix_st.'NAME'),
            'short_desc'     => Configuration::get($this->_prefix_st.'SHORT_DESC'),
            'recomended_producer'     => Configuration::get($this->_prefix_st.'RECOMENDED_PRODUCER'),
            'name_brand_featured'     => Configuration::get($this->_prefix_st.'NAME_BRAND_FEATURED'),
            'desc_brand_featured'     => Configuration::get($this->_prefix_st.'DESC_BRAND_FEATURED'),
            'name_letter'     => Configuration::get($this->_prefix_st.'NAME_LETTER'),
            'brand_list_show'     => Configuration::get($this->_prefix_st.'BRAND_LIST_SHOW'),
            'brand_list_search'     => Configuration::get($this->_prefix_st.'BRAND_LIST_SEARCH'),
            'image_brand'     => Configuration::get($this->_prefix_st.'IMAGE_BRAND'),
            'short_desc_letter'     => Configuration::get($this->_prefix_st.'SHORT_DESC_LETTER'),
            'brand_sticky'     => Configuration::get($this->_prefix_st.'BRAND_STICKY'),
      	    'alfabet_sticky_vertical'     => Configuration::get($this->_prefix_st.'ALFABET_STICKY_VERTICAL'),
			'brand_sticky_search'     => Configuration::get($this->_prefix_st.'BRAND_STICKY_SEARCH'),
            'loved_brand'     => Configuration::get($this->_prefix_st.'LOVED_BRAND'),
            'quantity_letter'     => Configuration::get($this->_prefix_st.'QUANTITY_LETTER'),
            'more_letter'     => Configuration::get($this->_prefix_st.'MORE_LETTER'),
            'brand_information'     => Configuration::get($this->_prefix_st.'BRAND_INFORMATION'),
       		'br_hide_direction_nav_on_mob'     => Configuration::get($this->_prefix_st.'BR_HIDE_DIRECTION_NAV_ON_MOB'),
			'br_hide_control_nav_on_mob'     => Configuration::get($this->_prefix_st.'BR_HIDE_CONTROL_NAV_ON_MOB'),
			'br_control_nav'     => Configuration::get($this->_prefix_st.'BR_CONTROL_NAV'),
			'br_direction_nav'     => Configuration::get($this->_prefix_st.'BR_DIRECTION_NAV'),
            
        
            'manufacturers'  => '',
            'all'            =>  Configuration::get($this->_prefix_st.'ALL'),
        ); 
        
        $manufacturers_html = '';
        foreach(StBrandsSliderClass::getByShop((int)$this->context->shop->id) AS $value)
        {
            $manufacturers_html .= '<li>'.Manufacturer::getNameById($value['id_manufacturer']).'
            <a href="javascript:;" class="del_manufacturer"><img src="../img/admin/delete.gif" /></a>
            <input type="hidden" name="id_manufacturer[]" value="'.$value['id_manufacturer'].'" /></li>';
        }
        
        $this->fields_form[0]['form']['input']['manufacturers']['desc'] = $this->getTranslator()->trans('Current manufacturers', array(), 'Modules.Stbrandsslider.Admin')
                .': <ul id="curr_manufacturers">'.$manufacturers_html.'</ul>';


        /*
            iWeb - 2019-05-09
        */
        foreach($this->fields_default_stsn_epresta AS $k=> $v) {
            $fields_values[$k] = Configuration::get($this->_prefix_stsn.strtoupper($k));
        }
        
        return array_merge(parent::getConfigFieldsValues(),$fields_values);
    }
    public function renderWidget($hookName = null, array $configuration = [])
    {
        return;
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
    public function get_prefix()
    {
        if (isset($this->_prefix_st) && $this->_prefix_st)
            return $this->_prefix_st;
        return false;
    }
    public function hookvcBeforeInit()
    {
        JsComposer::add_shortcode($this->name, array($this,'vc_shortcode_init'));
        if(isset($this->context->controller->admin_webpath) && !empty($this->context->controller->admin_webpath)) {
            $this->vc_map_init();
        }  
    }
    public function vc_shortcode_init($atts, $content = null)
    {
        extract(JsComposer::shortcode_atts(array(
            'hook_name' => '',
            'st_time' => '',
            ), $atts));
        if(!isset($this->vc_hooks[$hook_name]))
            return ;
        $hook = 'hook'.ucfirst($this->vc_hooks[$hook_name]);
        if (method_exists($this, $hook)) {
            return $this->$hook(array('st_time'=>$st_time));
        }
    }
    function vc_map_init()
    {
        $vc_hooks = array();
        foreach ($this->vc_hooks as $key => $value) {
            if($value=='displayLeftColumn' || $value=='displayStackedFooter1' || $value=='displayFooter')
                continue;
            $vc_hooks[$key] = $key;
        }
        $params = array(
            'name' => $this->displayName,
            'base' => $this->name,
            'icon' => 'icon-transformer',
            'category' => 'Transformer',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => 'hide_in_vc_editor',
                    'heading' => $this->getTranslator()->trans('Please select', array(), 'Admin.Theme.Transformer'),
                    'param_name' => 'hook_name',
                    'value' => $vc_hooks,
                    'std' => 'Block'
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'param_name' => 'st_time',
                    'value' => time(),
                ),
                array(
                    'type' => 'html',
                    'param_name' => 'st_conf_link_box',
                    'code' => '<a href="'.$this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&module_name='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'" target="_blank" class="st_conf_link">'.$this->getTranslator()->trans('Go to the configuration page of this module to change settings.', array(), 'Admin.Theme.Transformer').'</a>',
                ),
                array(
                    'type' => 'html',
                    'param_name' => 'st_refeash_link_box',
                    'code' => '<a href="javascript:;" class="st_refeash_link">'.$this->getTranslator()->trans('Refresh this window to get new data.', array(), 'Admin.Theme.Transformer').'</a>',
                ),
            )
        );
        vc_map($params);
    }
}