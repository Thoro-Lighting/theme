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
include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseSlider.php');
include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogSliderClass.php');
include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php');
class StBlogFeaturedArticles extends BaseSlider
{
    protected static $cache_array = array();
    public  $fields_list;
    public $_prefix_st = 'ST_B_FEATURED_';
    public $_prefix_stsn = 'STSN_B_FEATURED_';
	public $spacer_size = '5';
    protected $fields_default_stsn = array();
    protected $type = 1;
    public $dropdownlistgroup_default = array(
        'pro_per_fw' => 0,
        'pro_per_xxl' => 5,
        'pro_per_xl' => 4,
        'pro_per_lg' => 4,
        'pro_per_md' => 3,
        'pro_per_sm' => 3,
        'pro_per_xs' => 2,
    );
    protected $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Date add: Desc', 'orderBy'=>'date_add', 'orderWay'=>'DESC'),
        2 => array('id' =>2 , 'name' => 'Date add: Asc', 'orderBy'=>'date_add', 'orderWay'=>'ASC'),
        3 => array('id' =>3 , 'name' => 'Date update: Desc', 'orderBy'=>'date_upd', 'orderWay'=>'DESC'),
        4 => array('id' =>4 , 'name' => 'Date update: Asc', 'orderBy'=>'date_upd', 'orderWay'=>'ASC'),
        5 => array('id' =>5 , 'name' => 'Blog ID: Desc', 'orderBy'=>'id_st_blog', 'orderWay'=>'DESC'),
        6 => array('id' =>6 , 'name' => 'Blog ID: Asc', 'orderBy'=>'id_st_blog', 'orderWay'=>'ASC'),
        7 => array('id' =>7 , 'name' => 'Position: Desc', 'orderBy'=>'position', 'orderWay'=>'DESC'),
        8 => array('id' =>8 , 'name' => 'Position: Asc', 'orderBy'=>'position', 'orderWay'=>'ASC'),
    );  
    
    
    
    protected $items_img = array(
        1 => array('id' =>1 , 'name' => '1'),
        2 => array('id' =>2 , 'name' => '2'),
        3 => array('id' =>3 , 'name' => '3'),
        4 => array('id' =>4 , 'name' => '4'),
        5 => array('id' =>5 , 'name' => '5'),
        6 => array('id' =>6 , 'name' => '6'),
        7 => array('id' =>7 , 'name' => '7'),
        8 => array('id' =>8 , 'name' => '8'),
       
       
        
    );
    
    public static $items = array(
		array('id' => 2, 'name' => '2'),
		array('id' => 3, 'name' => '3'),
		array('id' => 4, 'name' => '4'),
		array('id' => 5, 'name' => '5'),
		array('id' => 6, 'name' => '6'),
    );
    public static $location = array(
        24   => array('id' =>24 , 'name' => 'Blog homepage full width top' , 'hook' => 'StBlogFullWidthTop', 'is_blog' => 1),
        26   => array('id' =>26 , 'name' => 'Blog homepage top'         , 'hook' => 'StBlogHomeTop', 'is_blog' => 1),
        25   => array('id' =>25 , 'name' => 'Blog homepage'             , 'hook' => 'StBlogHome', 'is_blog' => 1),
        // 27   => array('id' =>27 , 'name' => 'Blog homepage bottom'      , 'hook' => 'StBlogHomeBottom', 'is_blog' => 1),
        28   => array('id' =>28 , 'name' => 'Blog homepage full width bottom' , 'hook' => 'StBlogFullWidthBottom', 'is_blog' => 1),
        29   => array('id' =>29 , 'name' => 'Blog left column'          , 'hook' => 'StBlogLeftColumn', 'column'=>1, 'is_blog' => 1),
        30   => array('id' =>30 , 'name' => 'Blog right column'         , 'hook' => 'StBlogRightColumn', 'column'=>1, 'is_blog' => 1),

        1   => array('id' =>1 , 'name' => 'Full width top'          , 'hook' => 'FullWidthTop', 'full_width' => 1, 'index_slider' => 1),
        2   => array('id' =>2 , 'name' => 'Full width top 2'        , 'hook' => 'FullWidthTop2', 'full_width' => 1, 'index_slider' => 1),
        3   => array('id' =>3 , 'name' => 'Homepage top'            , 'hook' => 'HomeTop'),
        4   => array('id' =>4 , 'name' => 'Homepage'                , 'hook' => 'Home'),
        5   => array('id' =>5 , 'name' => 'Homepage bottom'         , 'hook' => 'HomeBottom'),
        6   => array('id' =>6 , 'name' => 'Homepage left'           , 'hook' => 'HomeLeft'),
        7   => array('id' =>7 , 'name' => 'Homepage Right'          , 'hook' => 'HomeRight'),
        8   => array('id' =>8 , 'name' => 'Homepage first quarter'  , 'hook' => 'HomeFirstQuarter'),
        9   => array('id' =>9 , 'name' => 'Homepage second quarter' , 'hook' => 'HomeSecondQuarter'),
        10  => array('id' =>10 , 'name' => 'Homepage third quarter'  , 'hook' => 'HomeThirdQuarter'),
        11  => array('id' =>11 , 'name' => 'Homepage fourth quarter' , 'hook' => 'HomeFourthQuarter'),
        12  => array('id' =>12 , 'name' => 'Full width Bottom'       , 'hook' => 'FullWidthBottom', 'full_width' => 1, 'index_slider' => 1),
        13  => array('id' =>13   , 'name' => 'Left column'           , 'hook' => 'LeftColumn', 'column'=>1),
        14  => array('id' =>14 , 'name' => 'Right column'            , 'hook' => 'RightColumn', 'column'=>1),
        35  => array('id' =>35 , 'name' => 'Product left column'    , 'hook' => 'LeftColumnProduct', 'column'=>1),
        15  => array('id' =>15 , 'name' => 'Product right column'    , 'hook' => 'RightColumnProduct', 'column'=>1),
        
        16   => array('id' =>16 , 'name' => 'Stacked footer (Column 1)'  , 'hook' => 'StackedFooter1', 'is_stacked_footer'=>1),
        17   => array('id' =>17 , 'name' => 'Stacked footer (Column 2)'  , 'hook' => 'StackedFooter2', 'is_stacked_footer'=>1),
        18   => array('id' =>18 , 'name' => 'Stacked footer (Column 3)'  , 'hook' => 'StackedFooter3', 'is_stacked_footer'=>1),
        19   => array('id' =>19 , 'name' => 'Stacked footer (Column 4)'  , 'hook' => 'StackedFooter4', 'is_stacked_footer'=>1),
        20   => array('id' =>20 , 'name' => 'Stacked footer (Column 5)'  , 'hook' => 'StackedFooter5', 'is_stacked_footer'=>1),
        21   => array('id' =>21 , 'name' => 'Stacked footer (Column 6)'  , 'hook' => 'StackedFooter6', 'is_stacked_footer'=>1),
        
        241   => array('id' =>241 , 'name' => 'Stacked footer blog (Column 1)'  , 'hook' => 'FooterTopBlogStacked_1'),
        251   => array('id' =>251 , 'name' => 'Stacked footer blog (Column 2)'  , 'hook' => 'FooterTopBlogStacked_2'),
        
        22   => array('id' =>22 , 'name' => 'Footer'                     , 'hook' => 'Footer'),        
        23   => array('id' =>23 , 'name' => 'Footer after'               , 'hook' => 'FooterAfter'),
        150   => array('id' =>150 , 'name' => 'Footer home blog'          , 'hook' => 'FooterBlog'),
    );
    private $templateFile = array();
	function __construct()
	{
	    if (!$this->name) {
    	    $this->name           = 'stblogfeaturedarticles';
    		$this->version        = '1.0.1';
    		$this->author        = '';
            $this->displayName = $this->getTranslator()->trans('Blog Module - Article Slider', array(), 'Modules.Stblog.Admin');
    		$this->description = $this->getTranslator()->trans('Display articles from different categories.', array(), 'Modules.Stblog.Admin');   
                
	    }
	    
		parent::__construct();
        $this->templateFile = array(
            'module:stthemeeditor/views/templates/slider/header.tpl',
            'module:stblogfeaturedarticles/views/templates/hook/home.tpl',
            'module:stblogfeaturedarticles/views/templates/hook/footer.tpl',
            'module:stblogfeaturedarticles/views/templates/hook/tab.tpl',
            );
    }
	function install()
	{
		if (!parent::install() || !$this->registerHook('vcBeforeInit'))
			return false;
        $res = true;
		foreach(Shop::getShops(false) as $shop)
			$res &= $this->sampleData($shop['id_shop']);
        $this->prepareHooks();
        $this->clearSliderCache();
		return $res;
	}
	public function uninstall()
	{
        $this->clearSliderCache();
		// Delete configuration
		return parent::uninstall();
	}
    function sampleData($id_shop)
    {
        $ret = true;
        $samples = array(
            array(
                'type'                      => 1,
                'display_on'                => 5,
                'id_st_blog_category'       => 2,
                'id_shop'                   => (int)$id_shop,
                'direction_nav'             => 1,
                'hide_direction_nav_on_mob' => 1,
                'aw_display'                => 1,
                'nbr'                       => 8,
                'pro_per_xxl'               => 5,
                'pro_per_xl'                => 4,
                'pro_per_lg'                => 4,
                'pro_per_md'                => 3,
                'pro_per_sm'                => 2,
                'pro_per_xs'                => 1,
                'spacing_between'           => 16,
                's_speed'                   => 7000,
                'a_speed'                   => 400,
                'lazy'                      => 1,
                'speed'                     => 0.6,
            ),
        );
        
        
       
        
        
        foreach($samples AS $sample) {
            if (Db::getInstance()->getValue('SELECT COUNT(0) FROM `'._DB_PREFIX_.'st_blog_slider` 
                WHERE `type`='.(int)$sample['type'].' 
                AND `display_on`='.(int)$sample['display_on'].'
                AND `id_st_blog_category`='.(int)$sample['id_st_blog_category'].'
                AND `id_shop`='.(int)$sample['id_shop'])) {
                continue;
            }
            $module = new StBlogSliderClass;
            $module->type = $sample['type'];
            $module->display_on = $sample['display_on'];
            $module->id_st_blog_category = $sample['id_st_blog_category']; 
            $module->id_shop = $sample['id_shop'];
            $module->active = 1;
            $module->direction_nav = $sample['direction_nav'];
            $module->hide_direction_nav_on_mob = $sample['hide_direction_nav_on_mob'];
            $module->aw_display = $sample['aw_display'];
            $module->nbr = $sample['nbr'];
            $module->pro_per_xxl = $sample['pro_per_xxl'];
            $module->pro_per_xl = $sample['pro_per_xl'];
            $module->pro_per_lg = $sample['pro_per_lg'];
            $module->pro_per_md = $sample['pro_per_md'];
            $module->pro_per_sm = $sample['pro_per_sm'];
            $module->pro_per_xs = $sample['pro_per_xs'];
            $module->spacing_between = $sample['spacing_between'];
            $module->s_speed = $sample['s_speed'];
            $module->a_speed = $sample['a_speed'];
            $module->lazy = $sample['lazy'];
            $module->speed = $sample['speed'];
            
            
            $ret &= $module->add(); 
        }
        return $ret;
    }
    
     public function installDb()
	{
		
		  $return &= (bool)Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_slider_lang` (
                `id_st_blog_slider` int(10) UNSIGNED NOT NULL,
                `id_lang` int(10) unsigned NOT NULL ,
                `title` varchar(255) DEFAULT NULL,
                `subtitle` varchar(255) DEFAULT NULL,
                PRIMARY KEY (`id_st_blog_slider`, `id_lang`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}
    
    
    public function getContent()
	{
        $check_result = $this->_checkImageDir();
        $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');
		$id_st_blog_slider = (int)Tools::getValue('id_st_blog_slider');

        if(Tools::getValue('act')=='delete_slider_image' && $id = Tools::getValue('st_s_id'))
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $k = Tools::getValue('st_s_k');
            
            $blog_slider = new StBlogSliderClass((int)$id);
            if(Validate::isLoadedObject($blog_slider))
            {
                $blog_slider->$k = '';
                if($blog_slider->save())
                {
                    $result['r'] = true;
                }
            }
            die(json_encode($result));
        }
        if(Tools::getValue('act')=='delete_image' && $field=Tools::getValue('field'))
        {
            return $this->AjaxDeleteImage($field);
        }
		if (isset($_POST['save'.$this->name]) || isset($_POST['saves'.$this->name.'AndStay']))
		{
            $error = array();
            
			if ($id_st_blog_slider)
				$blog_slider = new StBlogSliderClass((int)$id_st_blog_slider);
			else
				$blog_slider = new StBlogSliderClass();
                
			$blog_slider->copyFromPost();
            if ($this->type == 1 && !Tools::getValue('id_st_blog_category')) {
                $error[] = $this->displayError($this->getTranslator()->trans('The field "Category" is required', array(), 'Modules.Stblog.Admin'));
            }
            $blog_slider->type=$this->type;
            $blog_slider->id_shop = (int)Shop::getContextShopID();

            if(Configuration::get($this->_prefix_st.'GRID')==1)
            {
                if(in_array($blog_slider->pro_per_fw, array(7,9,11)))
                    $blog_slider->pro_per_fw--;
                if(in_array($blog_slider->pro_per_xxl, array(7,9,11)))
                    $blog_slider->pro_per_xxl--;
                if(in_array($blog_slider->pro_per_xl, array(7,9,11)))
                    $blog_slider->pro_per_xl--;
                if(in_array($blog_slider->pro_per_lg, array(7,9,11)))
                    $blog_slider->pro_per_lg--;
                if(in_array($blog_slider->pro_per_md, array(7,9,11)))
                    $blog_slider->pro_per_md--;
                if(in_array($blog_slider->pro_per_sm, array(7,9,11)))
                    $blog_slider->pro_per_sm--;
                if(in_array($blog_slider->pro_per_xs, array(7,9,11)))
                    $blog_slider->pro_per_xs--;
            }
            
            $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));

			if (!count($error) && $blog_slider->validateFields(false) && $blog_slider->validateFieldsLang(false))
            {
                /*position*/
                $blog_slider->position = $blog_slider->checkPostion($this->type);
                
                $res = $this->stUploadImage('bg_img');
                if(count($res['error']))
                    $error = array_merge($error,$res['error']);
                elseif($res['image'])
                {
                    $blog_slider->bg_img = $res['image'];
                }

                $res = $this->stUploadImage('video_poster');
                if(count($res['error']))
                    $error = array_merge($error,$res['error']);
                elseif($res['image'])
                {
                    $blog_slider->video_poster = $res['image'];
                }
                
                if($blog_slider->save())
                {
                    $this->prepareHooks();
                    $this->clearSliderCache();
                    if(isset($_POST['save'.$this->name.'AndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_blog_slider='.$blog_slider->id.'&conf='.($id_st_blog_slider?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer').' '.($id_st_blog_slider ? $this->getTranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                        
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during ', array(), 'Modules.Stblog.Admin').' '.($id_st_blog_slider ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
		}
	    if (Tools::isSubmit('status'.$this->name))
        {
            $blog_slider = new StBlogSliderClass((int)$id_st_blog_slider);
            if($blog_slider->id && $blog_slider->toggleStatus())
            {
                $this->clearSliderCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_blog_slider') && (Tools::isSubmit('position')))
		{
		    $prduct_categories = new StBlogSliderClass((int)$id_st_blog_slider);
            if($prduct_categories->id && $prduct_categories->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position'), $this->type))
            {
                $this->clearSliderCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('Failed to update the position.', array(), 'Admin.Theme.Transformer'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
		if (Tools::isSubmit('update'.$this->name) || Tools::isSubmit('add'.$this->name))
		{
            $helper = $this->initForm();
            $this->_tabs = array(
                '0' => array('id'  => '0', 'name' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer')),
                '1,5' => array('id'  => '1,5', 'name' => $this->getTranslator()->trans('Other settings', array(), 'Admin.Theme.Transformer')),
                '15' => array('id'  => '15,16,17,18,19', 'name' => $this->getTranslator()->trans('Visibility of elements', array(), 'Admin.Theme.Transformer')),
                '2' => array('id'  => '2', 'name' => $this->getTranslator()->trans('Homepage', array(), 'Admin.Theme.Transformer')),
                '3' => array('id'  => '3', 'name' => $this->getTranslator()->trans('Left or right column', array(), 'Admin.Theme.Transformer')),
                '4' => array('id'  => '4', 'name' => $this->getTranslator()->trans('Footer', array(), 'Admin.Theme.Transformer')),
            );
            $this->smarty->assign(array(
                'bo_tabs' => $this->_tabs,
                'bo_tab_content' => $helper->generateForm($this->fields_form),
            ));
    
            return $this->_html.$this->fetch(_PS_MODULE_DIR_.'stblogfeaturedarticles/views/templates/hook/bo_tab_layout.tpl');
		}
		elseif (Tools::isSubmit('delete'.$this->name))
		{
			$blog_slider = new StBlogSliderClass((int)$id_st_blog_slider);
			if ($blog_slider->id)
                $blog_slider->delete();
            $this->prepareHooks();
            $this->clearSliderCache();
                
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
			$helper = $this->initList();
            $this->_html .= '<script type="text/javascript">var currentIndex="'.AdminController::$currentIndex.'&configure='.$this->name.'";</script>';
			return $this->_html.$helper->generateList(StBlogSliderClass::getListContent($this->type), $this->fields_list);
		}
	}
    // Override parent method.
    public function getFormFieldsDefault()
    {
        return array();
    }
    public static function getCategories()
    {
        $module = new StBlogFeaturedArticles();
        $root_category = StBlogCategory::getTopCategory();
        $category_arr = array();
        $module->getCategoryOption($category_arr,$root_category->id);
        return $category_arr;
    }
    
    
    
    private function getCategoryOption(&$category_arr,$id_st_blog_category = 1, $id_lang = false, $id_shop = false, $recursive = true,$selected_id_st_blog_category=0)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
        $id_shop = $id_shop ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$category = new StBlogCategory((int)$id_st_blog_category, (int)$id_lang, (int)$id_shop);

		if (is_null($category->id))
			return;

		if ($recursive)
		{
			$children = StBlogCategory::getChildren((int)$id_st_blog_category, (int)$id_lang, (int)$id_shop, false);
			$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category->level_depth);
		}

		$shop = (object) Shop::getShop((int)$id_shop);
		$category_arr[] = array(
            'id' => $category->id,
            'name' => (isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')',
        );
        
		if (isset($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr,(int)$child['id_st_blog_category'], (int)$id_lang, (int)$id_shop,$recursive,$selected_id_st_blog_category);
			}
	}
    public function createLinks()
    {
        return $this->getCategories();
    }
	protected function initForm()
	{
        $is_vc_installed = Module::isInstalled('jscomposer') && Module::isEnabled('jscomposer');
	    $id_st_blog_slider = (int)Tools::getValue('id_st_blog_slider');
		$blog_slider = new StBlogSliderClass($id_st_blog_slider);
	    $this->fields_form = array();
        $fields = $this->getFormFields();
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Blog article sldier', array(), 'Modules.Stblog.Admin'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                'category' => array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Blog category:', array(), 'Modules.Stblog.Admin'),
					'name' => 'id_st_blog_category',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->createLinks(),
        				'id' => 'id',
        				'name' => 'name',
						/*'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer')
						)*/
					),
				),
				'show_on' => array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Display on:', array(), 'Admin.Theme.Transformer'),
					'name' => 'display_on',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => self::$location,
        				'id' => 'id',
        				'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $is_vc_installed ? $this->getTranslator()->trans('For visual composer module', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
                        )
					),
				),
				
				
				 array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title',
                    'size' => 64,
                    'lang' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Subtitle:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'subtitle',
                    'size' => 64,
                    'lang' => true,
                ),
				
				
				array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
					'name' => 'active',
					'is_bool' => true,
                    'default_value' => 1,
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
					'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
					'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
				),
				
				
				
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
		
		$this->fields_form[15]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Visibility of elements', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
		
			'input' => array(	
			array(
            'label' => $this->getTranslator()->trans('Length of article names', array(), 'Modules.Stblog.Admin'),
            'name' => 'length_of_name',
            'type' => 'radio',
            'default_value' => 2,
            'validation' => 'isUnsignedInt',
            'values' => array(
              
			  array(
                    'id' => 'length_of_name_long',
                    'value' => 4,
                    'label' => $this->getTranslator()->trans('Own length - enter the number of characters in the field below', array(), 'Admin.Theme.Transformer')),
		        array(
                    'id' => 'length_of_name_full',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Full name', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'length_of_name_two',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Two lines, focus all blog names having the same height', array(), 'Modules.Stblog.Admin')),
            ),  ),
            
        array(
			'label' => $this->getTranslator()->trans('Own length of the article name - number of characters', array(), 'Admin.Theme.Transformer'),
            'name' => 'length_of_name_value',
			'validation' => 'isUnsignedInt',
            'default_value' => 40,
           	'type' => 'text',
            'class' => 'fixed-width-sm',
            
		),
		
		 array(
			'label' => $this->getTranslator()->trans('Own length of desc', array(), 'Admin.Theme.Transformer'),
            'name' => 'length_desc_article',
			'validation' => 'isUnsignedInt',
            'default_value' => 40,
           	'type' => 'text',
		   'class' => 'fixed-width-sm',
            
		),
		
		
		 array(
            'label' => $this->getTranslator()->trans('Display image post', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_image',
            'validation' => 'isBool',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_image_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_image_all',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Always first image', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_image_all',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Always second image', array(), 'Admin.Theme.Transformer')),
                  array(
                    'id' => 'display_image_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            
            'desc' => $this->trans('The second option blocks the individual setting of not displaying the article cover, if there is one on it, the picture will be shown in this zone.', array(), 'Admin.Theme.Transformer')
			
        ),
		      
        
        array(
            'label' => $this->getTranslator()->trans('Display viewcount on each post', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_viewcount',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_viewcount_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_viewcount_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_viewcount_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
               
        array(
            'label' => $this->getTranslator()->trans('Display the total number of comments', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_comment_count',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_comment_count_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_comment_count_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_comment_count_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
         array(
            'label' => $this->getTranslator()->trans('Display author name', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_author',
            'validation' => 'isBool',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_author_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_author_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_author_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        array(
            'label' => $this->getTranslator()->trans('Display the date', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_date_pos',
            'validation' => 'isBool',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_date_pos_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_date_pos_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                   array(
                    'id' => 'display_date_pos_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        
        array(
            'label' => $this->getTranslator()->trans('Display date icon', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_date_icon',
            'validation' => 'isBool',
            'default_value' => 1,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_date_icon_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_date_icon_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        
        array(
            'label' => $this->getTranslator()->trans('Date format', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_date',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_date_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, time in format: 2019-07-19', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_date_timeago',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Time Since Posted, like 2 days ago, 1 month ago', array(), 'Admin.Theme.Transformer')),
               ),
        ),
        
         array(
            'label' => $this->getTranslator()->trans('Display button for favorites', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_loved',
            'validation' => 'isUnsignedInt',
            'default_value' => 2,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_loved_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the cover of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_loved_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_loved_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
             
            ),
        ),
        array(
            'label' => $this->getTranslator()->trans('Display a read more button', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_read_more',
            'validation' => 'isUnsignedInt',
            'default_value' => 4,
            'type' => 'radio',
            'values' => array(
        
                 array(
                        'id' => 'display_read_more_4',
                        'value' => 4,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                 array(
                        'id' => 'display_read_more_0',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('Normal button', array(), 'Admin.Theme.Transformer')),
                   array(
                        'id' => 'display_read_more_1',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Normal text', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_read_more_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Border on hover', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_read_more_3',
                        'value' => 3,
                        'label' => $this->getTranslator()->trans('Border visible right away', array(), 'Admin.Theme.Transformer')),
                                    ),
               
            'desc' => $this->getTranslator()->trans('Read more buttons display along with short content, which means if a block does not showing short content, read more buttons would also do not show out in this block.', array(), 'Admin.Theme.Transformer'),
        ),
        
        array(
            'label' => $this->getTranslator()->trans('The position of the article cover in relation to the content', array(), 'Admin.Theme.Transformer'),
            'name' => 'img_text',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'img_text_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Photo at the top, content under the photo', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'img_text_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Photo on the left, content on the right', array(), 'Admin.Theme.Transformer')),
              
            ),
        ),
        
        
          'items_img' => array(
                'type' => 'select',
                'label' => $this->getTranslator()->trans('The width of the photo in the desktop version', array(), 'Admin.Theme.Transformer'),
                'name' => 'items_img',
                'options' => array(
                    'query' => $this->items_img,
                    'id' => 'id',
                    'name' => 'name',
                ),
                'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('This setting is taken into account only if the option is selected: Photo on the left, content on the right<br>The width of the setting content is automatically depending on the selected image width.', array(), 'Admin.Theme.Transformer'),
   
            ),
            
         			
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
		
		
		$this->fields_form[17]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Color settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			
			'input' => array(
			
			'home_blog_pro_shadow_element' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('On what element to apply the shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_shadow_element',
            'validation' => 'isUnsignedInt',
			'values' => array(
			    array(
					'id' => 'home_blog_pro_shadow_element_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('For the whole box', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'home_blog_pro_shadow_element_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only for content block', array(), 'Admin.Theme.Transformer')),
				
				
			),
			
		),  
		
		 'home_blog_pro_shadow_element_mwidth' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Maximum width of the box with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_shadow_element_mwidth',
			'validation' => 'isAnything',
			'prefix' => '%',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('This option should be used in the case of:<br>1. The product photo is set above the content.<br>2. We want to get the effect of a narrower boxing with the content from the photo.', array(), 'Admin.Theme.Transformer'),
		
			),
			
			
			 'home_blog_pro_shadow_element_margin' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin of the box with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_shadow_element_margin',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('This option should be used in the case of:<br>1. The product photo is set above the content.<br>2. We want to get the effect of a narrower boxing with the content from the photo.', array(), 'Admin.Theme.Transformer'),
		
			),
    
			
			'home_blog_pro_shadow_effec' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Shadows around product images:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'home_blog_pro_shadow_effect',
			'values' => array(
			    array(
					'id' => 'home_blog_pro_shadow_effect_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'home_blog_pro_shadow_effect_on',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'home_blog_pro_shadow_effect_hover',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Show shadows when mouseover', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		),  
		'home_blog_pro_h_shadow' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_h_shadow',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
		'home_blog_pro_v_shadow' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('V-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_v_shadow',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
		'home_blog_pro_shadow_blur' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The blur distance of shadow:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'home_blog_pro_shadow_blur',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		'home_blog_pro_shadow_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'home_blog_pro_shadow_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		'home_blog_pro_shadow_opacity' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_shadow_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
			
			
			'home_blog_border_color' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
         'home_blog_border_width' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Border size:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_border_width',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			 'text_alignment_in_box' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Text alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_alignment_in_box',
			'values' => array(
				array(
					'id' => 'text_alignment_in_box_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_in_box_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_in_box_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
			
			
		 'home_blog_color_title' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color of title article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_title',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
           
         'home_blog_color_hov_title' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color hover of title article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_hov_title',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
                 
         'home_blog_color_fonts_title' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Font size of title article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_color_fonts_title',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			'home_blog_color_fontsl_title' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Line height of title article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_color_fontsl_title',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			
			'home_blog_hov_border_title' => array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Border hover', array(), 'Admin.Theme.Transformer'),
                    'name' => 'home_blog_hov_border_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'home_blog_hov_border_title_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'home_blog_hov_border_title_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('On hover', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'home_blog_hov_border_title_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Visible right away', array(), 'Admin.Theme.Transformer')),
                               ), 
        ),
			
			'home_blog_color_fontsmt_title' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Article title margin:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_color_fontsmt_title',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
            'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_color_fontsmb_title' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Article title margin:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_color_fontsmb_title',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			
			'home_blog_color_desc' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color of description article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_desc',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
         'home_blog_fonts_desc' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Font size of description article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_fonts_desc',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			'home_blog_fontlh_desc' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Line height of description article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_fontlh_desc',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			'home_blog_fontmt_desc' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin of description article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_fontmt_desc',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_fontmb_desc' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin of description article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_fontmb_desc',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_color_blog_info' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color of additional information content, e.g. date, author:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_blog_info',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
			
			
		    'home_blog_color_blog_info' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color of additional information content, e.g. date, author:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_blog_info',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
            'home_blog_size_blog_info' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Font size of additional information content, e.g. date, author:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_size_blog_info',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			
			'home_blog_margint_blog_info' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin top of additional information:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_margint_blog_info',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_marginb_blog_info' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin top of additional information:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_marginb_blog_info',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
		    'home_blog_grid_bg' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Blog grid background:', array(), 'Modules.Stblog.Admin'),
            'name' => 'home_blog_grid_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
          
         'home_blog_grid_bg_img' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background image box:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_grid_bg_img',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         'home_blog_grid_bg_text' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background text box:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_grid_bg_text',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         'home_blog_grid_bg_text_hover' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background text box hover:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_grid_bg_text_hover',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
         'items_img_padding'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding zone cover:', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_img_padding',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
        ),
        
        'items_img_padding_h'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding zone cover:', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_img_padding_h',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
         'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
            
        ),
        
        
         'items_text_padding'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding zone content:', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_text_padding',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
           
        ),
        
        'items_text_padding_h'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding zone content:', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_text_padding_h',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
        
            
        ),
            
				
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
		
		
		$this->fields_form[18]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hover settings photo of the article', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
		
			'input' => array(
			           array(
			           
            'label' => $this->getTranslator()->trans('Photo enlargement on hover', array(), 'Admin.Theme.Transformer'),
            'name' => 'photo_on_hover',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'photo_on_hover',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'photo_on_hover',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
			
        'photo_on_hover_size' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The size of the magnification:', array(), 'Admin.Theme.Transformer'),
			'name' => 'photo_on_hover_size',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
		),
			
        
        'text_image_bg_all' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background full box:', array(), 'Admin.Theme.Transformer'),
            'name' => 'text_image_bg_all',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
         'text_image_bg_opacity_all' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background full box opacity:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_opacity_all',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
          
           ),
           
           'text_image_bg_opacity_all_hov' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background full box opacity hover:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_opacity_all_hov',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
          
           ), 
		
        
      
					
           array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
		
			
			
		
		$this->fields_form[16]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Additional settings for the option when the content is in the picture', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
		
			'input' => array(	
			array(
            'label' => $this->getTranslator()->trans('Display content on article cover', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_text_on_image',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_text_on_image_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_text_on_image_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
                
       'text_image_max_width'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Max width content with text', array(), 'Admin.Theme.Transformer'),
            'name' => 'text_image_max_width',
            'validation' => 'isUnsignedInt',
            'prefix' => '%',
            'class' => 'fixed-width-lg',
            
        ),
        
        'text_image_bg' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background content text:', array(), 'Admin.Theme.Transformer'),
            'name' => 'text_image_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
         'text_image_bg_opacity' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background content text opacity:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_opacity',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
          
           ), 
                
                     
            'text_image_hovertb' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Animation content text on hover:', array(), 'Admin.Theme.Transformer'),
            'name' => 'text_image_hovertb',
            'validation' => 'isBool',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'text_image_hovertb_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'text_image_hovertb_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            
            ),
        
			
        'text_image_hover_shift' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The size of the shift:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_image_hover_shift',
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-lg',
            'prefix' => 'px',
            'desc' => $this->getTranslator()->trans('Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
	
		),
        
		'text_alignment_hor' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Boxing location with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_alignment_hor',
			'values' => array(
				array(
					'id' => 'text_alignment_hor_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_hor_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_hor_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
        		
		    'text_alignment_ver' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Boxing align with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_alignment_ver',
			'values' => array(
				array(
					'id' => 'text_alignment_ver_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_ver_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_ver_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		 'text_image_max_alignment' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Text alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_image_max_alignment',
			'values' => array(
				array(
					'id' => 'text_image_max_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_image_max_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_image_max_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		 'text_image_bg_padding' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spaces in the content area (padding):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_padding',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isNullOrUnsignedId',
          			 'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
            ), 
            
            'text_image_bg_padding_lr' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spaces in the content area (padding):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_padding_lr',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isNullOrUnsignedId',
            		'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
            ), 
		
		'text_alignment_margin_external' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spaces in the content area (margin):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_alignment_margin_external',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
               'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
		), 
		
		
		
		'text_alignment_margin_external_m' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spaces in the content area (margin):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_alignment_margin_external_m',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
		), 
			
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
		
		
		$this->fields_form[19]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Newsletter form options', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
		
			'input' => array(
			
			
             
              'newsletter_betwen_height_el' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Height of the oldest item:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'newsletter_betwen_height_el',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    
                ), 
                
	      
					
           array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
		
		
        
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Other settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'                
            ),
            'input' => $fields['setting'],
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );
        
        $image_types_arr = array();
        $imagesTypes = StBlogImageClass::getDefImageTypes();
        foreach ($imagesTypes[1] as $k => $imageType) {
            if (!isset($imageType[0]) || !$imageType[0] || !isset($imageType[1]) || !$imageType[1]) {
                continue;
            }
            $image_types_arr[$k] = array('id' => $k, 'name' => $k.'('.$imageType[0].' x '.$imageType[1].')');
        }
        if ($blog_slider->id) {        
            $option = array(
                'spacing' => (int)$blog_slider->spacing_between,
                'per_lg'  => (int)$blog_slider->pro_per_lg,
                'per_xl'  => (int)$blog_slider->pro_per_xl,
                'per_xxl' => (int)$blog_slider->pro_per_xxl,
                'page'    => in_array($blog_slider->display_on, array(24,25,26,28,29,30)) ? 'module-stblog-article' : 'index',
            );
            $fields['home_slider']['image_type']['desc'] = $this->calcImageWidth($option);
        }
        $fields['home_slider']['image_type']['options']['query'] = $image_types_arr;
        $fields['home_slider']['image_type']['options']['default_value'] = 'medium';
        $fields['home_slider']['image_type']['options']['default'] = array(
            'value' => '',
            'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
        );
        
    //    $fields['home_slider']['grid']['label'] = $this->getTranslator()->trans('How to display articles:', array(), 'Admin.Theme.Transformer');
     //   $fields['home_slider']['grid']['values'] = array_merge($fields['home_slider']['grid']['values'], array(
    //        array(
     //           'id' => 'grid_liebiao',
     //           'value' => 3,
     //           'label' => $this->getTranslator()->trans('List', array(), 'Admin.Theme.Transformer')),
     //       array(
      //          'id' => 'grid_zuoyou',
      //          'value' => 4,
      //          'label' => $this->getTranslator()->trans('Meida image', array(), 'Admin.Theme.Transformer')),
      //      )
     //   );
        
               
        $fields['home_slider']['nbr']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['label'] = $this->getTranslator()->trans('Spacing between articles:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['display_sd']['label'] = $this->getTranslator()->trans('Display article short description:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['desc'][0] = $this->getTranslator()->trans('Distance between articles.', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['link_hover_color']['label'] = $this->getTranslator()->trans('Article name hover color:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['display_sd']['values'] = array_merge($fields['home_slider']['display_sd']['values'],
                array(
             //       array(
               //         'id' => 'display_sd_short',
              //          'value' => 3,
              //          'label' => $this->getTranslator()->trans('Short content, 120 characters', array(), 'Admin.Theme.Transformer')),
              //      array(
              //          'id' => 'display_sd_4',
               //         'value' => 4,
              //          'label' => $this->getTranslator()->trans('Content, 120 characters', array(), 'Admin.Theme.Transformer')),
              //      array(
              //          'value' => 5,
              //          'label' => $this->getTranslator()->trans('Content, 220 characters', array(), 'Admin.Theme.Transformer')),
               //     array(
               //         'id' => 'display_sd_6',
               //         'value' => 6,
               //         'label' => $this->getTranslator()->trans('Content, about 5 lines', array(), 'Admin.Theme.Transformer')),
                //    array(
               //         'id' => 'display_sd_7',
                //        'value' => 7,
                //        'label' => $this->getTranslator()->trans('Content, about 10 lines', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_sd_8',
                        'value' => 8,
                        'label' => $this->getTranslator()->trans('Own length of short description', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_sd_9',
                        'value' => 9,
                        'label' => $this->getTranslator()->trans('Own length of full description', array(), 'Admin.Theme.Transformer'))
                    )
                ); 

        unset($fields['home_slider']['price_color']);
        
        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Slider on homepage', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['home_slider'],
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
        $this->fields_form[2]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        $fields['column']['display_pro_col']['label'] = $this->getTranslator()->trans('How to display articles:', array(), 'Admin.Theme.Transformer');
        $fields['column']['nbr_col']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['column']['items_col']['label'] = $this->getTranslator()->trans('How many articles per view on compact slider:', array(), 'Admin.Theme.Transformer');
        unset($fields['column']['aw_display_col']);
		$this->fields_form[3]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Slide on the left column/right column/X quarter', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => $fields['column'],
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
        $this->fields_form[3]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        
        $fields['footer']['nbr_fot']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        //unset($fields['footer']['aw_display_fot']);
        $this->fields_form[4]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Footer', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => $fields['footer'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        $this->fields_form[4]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Video background', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'                
            ),
            'description' => $this->getTranslator()->trans('Video background feature can not work on both Android and IOS devices, which is due to restrictions on autoplay and performance, so you also need to upload a video thumbnail, the thumbnail will be displayed on mobile devices.', array(), 'Admin.Theme.Transformer'),
            'input' => $fields['video'],
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );
        $this->fields_form[5]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        if($blog_slider->id)
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_blog_slider');

            if ($blog_slider->bg_img)
            {
                StBlogSliderClass::fetchMediaServer($blog_slider->bg_img);
                $this->fields_form[2]['form']['input']['bg_img']['desc'][] = '<div class="image_thumb_block"><img src="'.($blog_slider->bg_img).'" class="st_thumb_nail" /><div><a class="btn btn-default delete_slider_image" href="javascript:;" data-s_id="'.(int)$blog_slider->id.'" data-s_k="bg_img"><i class="icon-trash"></i>'.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></div></div>';
            }
            if ($blog_slider->video_poster)
            {
                StBlogSliderClass::fetchMediaServer($blog_slider->video_poster);
                $this->fields_form[5]['form']['input']['video_poster']['desc'][] = '<div class="image_thumb_block"><img src="'.($blog_slider->video_poster).'" class="st_thumb_nail" /><div><a class="btn btn-default delete_slider_image" href="javascript:;" data-s_id="'.(int)$blog_slider->id.'" data-s_k="video_poster"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></div></div>';
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
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($blog_slider),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);       
        $name = $this->fields_form[2]['form']['input']['dropdownlistgroup']['name'];
        foreach ($this->fields_form[2]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
        {
            $dropdownlistgroup_key = $name.'_'.$v;
            $helper->tpl_vars['fields_value'][$dropdownlistgroup_key] = $blog_slider->id ? $blog_slider->$dropdownlistgroup_key : $this->dropdownlistgroup_default[$dropdownlistgroup_key];
        }

		return $helper;
	}
    public static function displayCategory($value, $row)
	{
        if(!$value)
            return '--';
        $id_lang = (int)Context::getContext()->language->id;
        $category = new StBlogCategory((int)$value,$id_lang);
        if($category->id)
            return $category->name;
		return '';
	}
    public static function displayShowOn($value, $row)
    {
        if (key_exists((int)$value, self::$location)) {
            return self::$location[$value]['name'];
        }
        $context = Context::getContext();
        return Module::isInstalled('jscomposer') && Module::isEnabled('jscomposer') ? $context->getTranslator()->trans('For visual composer module', array(), 'Admin.Theme.Transformer') : '--';
    }
	protected function initList()
	{
	    // Fix table drag bug.
        Media::addJsDef(array(
            'currentIndex' => AdminController::$currentIndex.'&configure='.$this->name,
        ));
		$this->fields_list = array(
			'id_st_blog_slider' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'id_st_blog_category' => array(
				'title' => $this->getTranslator()->trans('Blog category', array(), 'Admin.Theme.Transformer'),
				'width' => 140,
				'type' => 'text',
				'callback' => 'displayCategory',
				'callback_object' => get_class($this),
                'search' => false,
                'orderby' => false
			),
            'display_on' => array(
				'title' => $this->getTranslator()->trans('Show on', array(), 'Admin.Theme.Transformer'),
				'width' => 140,
				'type' => 'text',
				'callback' => 'displayShowOn',
				'callback_object' => get_class($this),
                'search' => false,
                'orderby' => false
			),
            'position' => array(
				'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
				'width' => 40,
				'position' => 'position',
				'align' => 'left',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
				'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
				'align' => 'center',
				'active' => 'status',
				'type' => 'bool',
				'width' => 25,
                'search' => false,
                'orderby' => false
            ),
		);

		if (Shop::isFeatureActive())
			$this->fields_list['id_shop'] = array(
                'title' => $this->getTranslator()->trans('ID Shop', array(), 'Admin.Theme.Transformer'), 
                'align' => 'center', 
                'width' => 25, 
                'type' => 'int',
                'search' => false,
                'orderby' => false
                );

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_blog_slider';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add new', array(), 'Admin.Theme.Transformer')
		);
		$helper->title = $this->displayName;
		$helper->table = $this->name;
		//$helper->orderBy = 'position';
		//$helper->orderWay = 'ASC';
	    //$helper->position_identifier = 'id_st_blog_slider';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
	public function hookDisplayHome($params, $func=0, $flag=0)
	{
	    $display_on = $this->getDisplayOn($func ? $func : __FUNCTION__);
        if (!$display_on) {
            return false;
        }
        $id_st_blog_slider = isset($params['id_st_blog_slider']) ? (int)$params['id_st_blog_slider'] : null;
        $cache_id = $display_on.($id_st_blog_slider ? (string)$id_st_blog_slider : '');
        if(!$this->isCached($this->templateFile[1], $this->stGetCacheId($cache_id)))
        {
            $this->_prepareHook('', $display_on,$id_st_blog_slider);
            $this->smarty->assign(array(
                'column_slider'         => false,
                'homeverybottom'         => ($flag==2 ? true : false),
            ));
        }
        return $this->fetch($this->templateFile[1], $this->stGetCacheId($cache_id));
	}    

    public function hookDisplayStBlogHome($params, $func=0, $flag=0)
    {
        $display_on = $this->getDisplayOn($func ? $func : __FUNCTION__);
        
        if (!$display_on) {
            return false;
        }
        $id_st_blog_slider = isset($params['id_st_blog_slider']) ? (int)$params['id_st_blog_slider'] : null;
        $cache_id = $display_on.($id_st_blog_slider ? (string)$id_st_blog_slider : '');
        if(!$this->isCached($this->templateFile[1], $this->stGetCacheId($cache_id)))
        {
            $this->_prepareHook('', $display_on, $id_st_blog_slider);
            $this->smarty->assign(array(
                'column_slider'         => false,
                'is_blog'         => true,
                'homeverybottom'         => ($flag==2 ? true : false),
            ));
        }
        return $this->fetch($this->templateFile[1], $this->stGetCacheId($cache_id));
    }  

	public function hookDisplayLeftColumn($params, $func=0)
	{
	    $display_on = $this->getDisplayOn($func ? $func : __FUNCTION__);
        if (!$display_on) {
            return false;
        }
        $id_st_blog_slider = isset($params['id_st_blog_slider']) ? (int)$params['id_st_blog_slider'] : null;
        $cache_id = $display_on.($id_st_blog_slider ? (string)$id_st_blog_slider : '');
	    if (!$this->isCached($this->templateFile[1], $this->stGetCacheId($cache_id)))
    	{
            $this->_prepareHook('col',$display_on, $id_st_blog_slider);
            $this->smarty->assign(array(
                'column_slider'         => true,
            ));
        }
		return $this->fetch($this->templateFile[1], $this->stGetCacheId($cache_id));
	}
    private function _prepareHook($ext='',$display_on=0, $ids=null)
    {        
        $ext = $ext ? '_'.strtolower($ext) : '';
        if (!$display_on) {
            return false;
        }
        $key = $this->type.'-'.$display_on.(is_array($ids) ? implode('-',$ids_array) : (string)$ids);
        if (isset(self::$cache_array[$key]) && self::$cache_array[$key])
            $result = self::$cache_array[$key];
        else
        {
            $result = StBlogSliderClass::getListContent($this->type, 1, $display_on, $ids);
            
            if(!is_array($result) || !count($result))     
                $result = array();
            include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
            include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogImageClass.php');
            foreach($result as $k=>&$v)
            {
                $order_by = isset($this->sort_by[$v['soby'.$ext]]) ? $this->sort_by[$v['soby'.$ext]]['orderBy'] : 'position';
                $order_way = isset($this->sort_by[$v['soby'.$ext]]) ? $this->sort_by[$v['soby'.$ext]]['orderWay'] : 'ASC';
                
                if ($this->type == 2) {
                    $v['link'] = '';
                    $v['name' ] = $this->getTranslator()->trans('Recent articles', array(), 'Shop.Theme.Transformer');
                    // $v['description' ] = '';
                    $v['blogs'] = StBlogClass::getRecentArticles((int)$v['nbr'.$ext], $order_by, $order_way);
                } else {
                    $category = new StBlogCategory((int)$v['id_st_blog_category'], (int)$this->context->language->id);
                    if(!$category->active)
                    {
                        unset($result[$k]);
                        continue;
                    }
                    $v['link'] = $category->getLink();
                    $v['is_root_category'] = $category->is_root_category;
                    $v['name' ] = $category->name;
                    // $v['description' ] = $category->description;
                    $v['blogs'] = $category->getBlogs((int)$this->context->language->id, 1, (int)$v['nbr'.$ext], $order_by, $order_way);
                }
                if ($v['video_poster']) {
                    $v['video_poster'] = $v['video_poster'];
                    $this->fetchMediaServer($v['video_poster']);
                }
                //basesldier did this job
                // $v['is_full_width'] = isset(self::$location[$v['location']]['full_width']);//the same code in displayHeader function
                // $v['is_stacked_footer'] = isset(self::$location[$v['location']]['is_stacked_footer']);
            }
            self::$cache_array[$key] = $result;
        }
        $this->smarty->assign(array(
            'blog_categories'      => $result,
            'title_align'          => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
            'hook_hash'            => $display_on,
            'blog_slider_type'            => $this->type,
        ));
        return true;
    }
    
    public function hookDisplayHeader($params)
    {
        if (!$this->isCached($this->templateFile[0], $this->getCacheId()))
        {
            $custom_css = '';
            $custom_css_arr = StBlogSliderClass::getOptions($this->type);
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                foreach ($custom_css_arr as $v) {
                    
                    $prefix = '#category_blogs_container_'.$v['id_st_blog_slider'];

                    if($v['grid']==1 OR $v['grid']==6 OR $v['grid']==7)
                    {
                        $custom_css .= $prefix.' .product_list .product_list_item{padding-left:'.ceil($v['spacing_between']/2).'px;padding-right:'.floor($v['spacing_between']/2).'px;}';
                        $custom_css .= $prefix.' .product_list .product_list_item{padding-bottom:'.ceil($v['spacing_between']/2).'px;}';
                        $custom_css .= $prefix.' .product_list {margin-left:-'.ceil($v['spacing_between']/2).'px;margin-right:-'.floor($v['spacing_between']/2).'px;}';
                    }
                    
                
                    
                    $group_css = '';
                    if ($v['bg_color'])
                        $group_css .= 'background-color:'.$v['bg_color'].';';
                    if ($v['bg_img'])
                    {
                        $this->fetchMediaServer($v['bg_img']);
                        $group_css .= 'background-image: url('.$v['bg_img'].');';
                    }
                    elseif ($v['bg_pattern'])
                    {
                        $img = _MODULE_DIR_.'stthemeeditor/patterns/'.$v['bg_pattern'].'.png';
                        $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                        $group_css .= 'background-image: url('.$img.');background-repeat: repeat;';
                    }
                    if ($v['bg_img_v_offset']) {
                        $custom_css .= $prefix.'.products_container{background-position:center -'.$v['bg_img_v_offset'].'px;}';
                    }
                    if($group_css)
                        $custom_css .= $prefix.'.products_container{'.$group_css.'}';
        
                    if ($v['top_padding'])
                        $custom_css .= '@media (min-width: 768px) {'.$prefix.'.products_container{padding-top:'.$v['top_padding'].'px;}}';
                    if ($v['bottom_padding'])
                        $custom_css .= '@media (min-width: 768px) {'.$prefix.'.products_container{padding-bottom:'.$v['bottom_padding'].'px;}}';
                        
                    if ($v['top_padding_mobile'])
                        $custom_css .= '@media (max-width: 767px) {'.$prefix.'.products_container{padding-top:'.$v['top_padding_mobile'].'px;}}';
                    if ($v['bottom_padding_mobile'])
                        $custom_css .= '@media (max-width: 767px) {'.$prefix.'.products_container{padding-bottom:'.$v['bottom_padding_mobile'].'px;}}';    
                        
        
                    if($v['top_margin'] || $v['top_margin']===0 || $v['top_margin']==='0')
                        $custom_css .= '@media (min-width: 768px) {'.$prefix.'.products_container{margin-top:'.$v['top_margin'].'px;}}';
                    if($v['bottom_margin'] || $v['bottom_margin']===0 || $v['bottom_margin']==='0')
                        $custom_css .= '@media (min-width: 768px) {'.$prefix.'.products_container{margin-bottom:'.$v['bottom_margin'].'px;}}';
                        
                        
                    if($v['top_margin_mobile'] || $v['top_margin_mobile']===0 || $v['top_margin_mobile']==='0')
                        $custom_css .= '@media (max-width: 767px) {'.$prefix.'.products_container{margin-top:'.$v['top_margin_mobile'].'px;}}';
                    if($v['bottom_margin_mobile'] || $v['bottom_margin_mobile']===0 || $v['bottom_margin_mobile_mobile']==='0')
                        $custom_css .= '@media (max-width: 767px) {'.$prefix.'.products_container{margin-bottom:'.$v['bottom_margin_mobile'].'px;}}';
        
                    if ($v['title_font_size'])
                         $custom_css .= $prefix.'.products_container .title_block_inner{font-size:'.$v['title_font_size'].'px;}';
                         
                    if ($v['subtitle_font_size'])
                         $custom_css .= $prefix.'.products_container .title_block_inner p {font-size:'.$v['subtitle_font_size'].'px;}';
        
                    if ($v['title_color'])
                        $custom_css .= $prefix.'.products_container .title_block_inner{color:'.$v['title_color'].';}';
                    
                    if ($v['subtitle_color'])
                        $custom_css .= $prefix.'.products_container .title_block_inner p{color:'.$v['subtitle_color'].';}';
                        
                    if ($v['title_hover_color'])
                        $custom_css .= $prefix.'.products_container .title_block_inner:hover{color:'.$v['title_hover_color'].';}';
        
        
                    if($v['title_bottom_border'] || $v['title_bottom_border']===0 || $v['title_bottom_border']==='0')
                    {
                        $custom_css .= $prefix.'.products_container .title_style_0,'.$prefix.'.products_container .title_style_0 .title_block_inner{border-bottom-width:'.$v['title_bottom_border'].'px;}'.$prefix.'.products_container .title_style_0 .title_block_inner{margin-bottom:'.$v['title_bottom_border'].'px;}';
                        $custom_css .= $prefix.'.products_container .title_style_1 .flex_child, '.$prefix.'.products_container .title_style_3 .flex_child{border-bottom-width:'.$v['title_bottom_border'].'px;}';
                        $custom_css .= $prefix.'.products_container .title_style_2 .flex_child{border-bottom-width:'.$v['title_bottom_border'].'px;border-top-width:'.$v['title_bottom_border'].'px;}';
                    }
                    
                    if($v['title_bottom_border_color'])
                        $custom_css .=$prefix.'.products_container .title_style_0, '.$prefix.'.products_container .title_style_1 .flex_child, '.$prefix.'.products_container .title_style_2 .flex_child, '.$prefix.'.products_container .title_style_3 .flex_child{border-bottom-color: '.$v['title_bottom_border_color'].';}'.$prefix.'.products_container .title_style_2 .flex_child{border-top-color: '.$v['title_bottom_border_color'].';}';  
                    if($v['title_bottom_border_color_h'])
                        $custom_css .=$prefix.'.products_container .title_style_0 .title_block_inner{border-color: '.$v['title_bottom_border_color_h'].';}';
        
                    
                    if ($v['text_color'])
                        $custom_css .= $prefix.' .block_blog .s_title_block a,
                        '.$prefix.' .block_blog .blog_info,
                        '.$prefix.' .block_blog .blok_blog_short_content{color:'.$v['text_color'].';}';
        
                    if ($v['link_hover_color'])
                        $custom_css .= $prefix.' .block_blog .s_title_block a:hover{color:'.$v['link_hover_color'].';}';
        
                    if ($v['home_blog_grid_bg_text'])
                        $custom_css .= $prefix.' .block_blog .pro_outer_box .pro_second_box{background-color:'.$v['home_blog_grid_bg_text'].';}';
                    if ($v['home_blog_grid_bg_text_hover'])
                        $custom_css .= $prefix.' .block_blog .pro_outer_box:hover .pro_second_box{background-color:'.$v['home_blog_grid_bg_text_hover'].';}';
                     
                     if ($v['home_blog_grid_bg_img'])
                        $custom_css .= $prefix.' .block_blog .pro_outer_box .pro_first_box{background-color:'.$v['home_blog_grid_bg_img'].';}';    
                        
                        
                    if ($v['direction_color'])
                        $custom_css .= $prefix.'.block .products_slider .swiper-button{color:'.$v['direction_color'].';}';
                    if ($v['direction_color_hover'])
                        $custom_css .= $prefix.'.block .products_slider .swiper-button:hover{color:'.$v['direction_color_hover'].';}';
                    if ($v['direction_color_disabled'])
                        $custom_css .= $prefix.'.block .products_slider .swiper-button.swiper-button-disabled, '.$prefix.'.block .products_slider .swiper-button.swiper-button-disabled:hover{color:'.$v['direction_color_disabled'].';}';
                    
                    if ($v['direction_bg'])
                        $custom_css .= $prefix.'.block .products_slider .swiper-button{background-color:'.$v['direction_bg'].';}';
                        
                    if ($v['home_blog_grid_bg'])
                        $custom_css .= $prefix.'.category_blogs_container .block_content .block_blog{background-color:'.$v['home_blog_grid_bg'].';}'; 
                        $custom_css .= $prefix.'.category_blogs_container .st_posts  .block_blog{background-color:'.$v['home_blog_grid_bg'].';}'; 
                     
                   if($v['items_img_padding'] || $v['items_img_padding']==0 || $v['items_img_padding']=='0')
                        $custom_css .= '@media (min-width: 768px) {'. $prefix.'.category_blogs_container .block_content .block_blog .pro_first_box {padding:'.$v['items_img_padding'].';}}'; 
                        $custom_css .= '@media (min-width: 768px) {'. $prefix.'.category_blogs_container .st_posts  .block_blog .pro_first_box {padding:'.$v['items_img_padding'].';}}'; 
                        
                   if($v['items_img_padding_h'] || $v['items_img_padding_h']==0 || $v['items_img_padding_h']=='0')
                        $custom_css .= '@media (max-width: 767px) {'. $prefix.'.category_blogs_container .block_content .block_blog .pro_first_box {padding:'.$v['items_img_padding_h'].';}}'; 
                        $custom_css .= '@media (max-width: 767px) {'. $prefix.'.category_blogs_container .st_posts  .block_blog .pro_first_box {padding:'.$v['items_img_padding_h'].';}}'; 
                 
                        
                   if($v['items_text_padding'] || $v['items_text_padding']==0 || $v['items_text_padding']=='0')
                        $custom_css .= '@media (min-width: 768px) {'. $prefix.'.category_blogs_container .block_content .block_blog .pro_second_box {padding:'.$v['items_text_padding'].';}}'; 
                        $custom_css .= '@media (min-width: 768px) {'. $prefix.'.category_blogs_container .st_posts  .block_blog .pro_second_box {padding:'.$v['items_text_padding'].';}}'; 
                        
                    if($v['items_text_padding_h'] || $v['items_text_padding_h']==0 || $v['items_text_padding_h']=='0')
                        $custom_css .= '@media (max-width: 767px) {'. $prefix.'.category_blogs_container .block_content .block_blog .pro_second_box {padding:'.$v['items_text_padding_h'].';}}'; 
                        $custom_css .= '@media (max-width: 767px) {'. $prefix.'.category_blogs_container .st_posts  .block_blog .pro_second_box {padding:'.$v['items_text_padding_h'].';}}'; 
                             
                        
                        
                        
                    if ($v['direction_hover_bg'])
                        $custom_css .= $prefix.'.block .products_slider .swiper-button:hover{background-color:'.$v['direction_hover_bg'].';}';
                    if ($v['direction_disabled_bg'])
                        $custom_css .= $prefix.'.block .products_slider .swiper-button.swiper-button-disabled, '.$prefix.'.block .products_slider .swiper-button.swiper-button-disabled:hover{background-color:'.$v['direction_disabled_bg'].';}';
                    /*else
                        $custom_css .= $prefix.' .products_slider .swiper-button.swiper-button-disabled, '.$prefix.' .products_slider .swiper-button.swiper-button-disabled:hover{background-color:transparent;}';*/
        
                    if($v['pag_nav_bg'])
                    {
                        $custom_css .= $prefix.' .swiper-pagination-bullet, '.$prefix.' .swiper-pagination-progress{background-color:'.$v['pag_nav_bg'].';}';
                        $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet{background-color:transparent;border-color:'.$v['pag_nav_bg'].';}';
                        $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet span{background-color:'.$v['pag_nav_bg'].';}';
                    }
                    if($v['pag_nav_bg_hover'])
                    {
                        $custom_css .= $prefix.' .swiper-pagination-bullet-active, '.$prefix.' .swiper-pagination-progress .swiper-pagination-progressbar{background-color:'.$v['pag_nav_bg_hover'].';}';
                        $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active{background-color:'.$v['pag_nav_bg_hover'].';border-color:'.$v['pag_nav_bg_hover'].';}';
                        $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active span{background-color:'.$v['pag_nav_bg_hover'].';}';
                    }
                    
                    if ($v['left_padding']) {
                    	
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .block_content {padding-left:'.$v['left_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .block_content .left_zone_visible {width:'.$v['left_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .swiper-container.position_buttons_0 {padding-left:'.$v['left_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .swiper-container.position_buttons_0 {margin-left:-'.$v['left_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .products_slider.display_as_grid {padding-left:'.$v['left_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .title_align_0 {padding-left:'.$v['left_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .more_align_desk_0 {padding-left:'.$v['left_padding'].'px;}}';
              
                 
              }
                              
              if ($v['right_padding']) {
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .block_content {padding-right:'.$v['right_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .block_content .right_zone_visible {width:'.$v['right_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .swiper-container.position_buttons_0 {padding-right:'.$v['right_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .swiper-container.position_buttons_0 {margin-right:-'.$v['right_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .products_slider.display_as_grid {padding-right:'.$v['right_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .title_align_2 {padding-right:'.$v['right_padding'].'px;}}';
                 $custom_css .= '@media (min-width: 992px) {'.$prefix.' .more_align_desk_2 {padding-right:'.$v['right_padding'].'px;}}';
                
              }       
              
                            
              if ($v['text_image_max_width']) {
            
                $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img .bottom_zone {max-width:'.$v['text_image_max_width'].'%;}';
                }
                
                if ($v['text_alignment_ver'] == 1) {
                $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img  {justify-content: start;}';         
                }
                
                if ($v['text_alignment_ver'] == 2) {
                $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img  {justify-content: center;}';         
                }
                
                if ($v['text_alignment_ver'] == 3) {
                $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img  {justify-content: end;}';         
                }
                
                if ($v['text_alignment_hor'] == 1) {
                $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img {align-items: flex-start;}';         
                }
                
                if ($v['text_alignment_hor'] == 2) {
                $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img  {align-items: center;}';         
                }
                
                if ($v['text_alignment_hor'] == 3) {
                $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img {align-items: flex-end;}';         
                }
                
                
                 if($v['bg_color']) {
            
                 $custom_css .= $prefix.' .left_zone_visible {background:'.$v['bg_color'].' !important;}';
                 $custom_css .= $prefix.' .right_zone_visible {background:'.$v['bg_color'].' !important;}';
  
                }
                
                if($v['text_image_max_color']) {
            
                 $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img a {color:'.$v['text_image_max_color'].';}';
                 $custom_css .= $prefix.' .pro_second_absolute .pro_second_box_img span {color:'.$v['text_image_max_color'].';}';
  
                }
                
                if($v['text_image_bg']) {
            
                 $text_image_bg = self::hex2rgb($v['text_image_bg']);
                 $custom_css .= $prefix.' .pro_second_box_img .bottom_zone {background-color: rgba('.$text_image_bg[0].','.$text_image_bg[1].','.$text_image_bg[2].','.$v['text_image_bg_opacity'].');}';
            
                }
              
                
                if ($v['text_image_bg_all']) {
            
                 $text_image_bg_all = self::hex2rgb($v['text_image_bg_all']);
                 $custom_css .= $prefix.' .pro_second_box_img  {background-color: rgba('.$text_image_bg_all[0].','.$text_image_bg_all[1].','.$text_image_bg_all[2].','.$v['text_image_bg_opacity_all'].');}';
                 $custom_css .= $prefix.' .product_list_item:hover .pro_second_box_img, .swiper-slide:hover .pro_second_box_img  {background-color: rgba('.$text_image_bg_all[0].','.$text_image_bg_all[1].','.$text_image_bg_all[2].','.$v['text_image_bg_opacity_all_hov'].');}';
                 $custom_css .= $prefix.' .swiper-slide:hover .pro_second_box_img  {background-color: rgba('.$text_image_bg_all[0].','.$text_image_bg_all[1].','.$text_image_bg_all[2].','.$v['text_image_bg_opacity_all_hov'].');}';
              
                }
                
                if ($v['text_image_bg_padding']) {
            	$custom_css .= '@media (min-width: 768px) {'. $prefix.' .pro_second_box_img .bottom_zone {padding:'.$v['text_image_bg_padding'].';}}';           
                }
                
                if ($v['text_alignment_margin_external_m']) {
            	$custom_css .= '@media (max-width: 767px) {'. $prefix.' .pro_second_box_img .bottom_zone {margin:'.$v['text_alignment_margin_external_m'].';}}';
            	}
                               
                if ($v['text_alignment_margin_external']) {
            	$custom_css .= '@media (min-width: 768px) {'. $prefix.' .pro_second_box_img .bottom_zone {margin:'.$v['text_alignment_margin_external'].';}}';           
                }
                
                if ($v['text_image_bg_padding_lr']) {
            	$custom_css .= '@media (max-width: 767px) {'. $prefix.' .pro_second_box_img .bottom_zone {padding:'.$v['text_image_bg_padding_lr'].';}}';
            	}

             if ($v['home_blog_pro_shadow_element'] == 0) {	
             if ($v['home_blog_pro_shadow_effect'] == 2) {
                $home_blog_pro_shadow_color = self::hex2rgb($v['home_blog_pro_shadow_color']);
            	$custom_css .= $prefix.' .block_blog {-webkit-box-shadow: '.$v['home_blog_pro_h_shadow'].'px '.$v['home_blog_pro_v_shadow'].'px '.$v['home_blog_pro_shadow_blur'].'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$v['home_blog_pro_shadow_opacity'].')}';
                $custom_css .= $prefix.' .block_blog {-moz-box-shadow: '.$v['home_blog_pro_h_shadow'].'px '.$v['home_blog_pro_v_shadow'].'px '.$v['home_blog_pro_shadow_blur'].'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$v['home_blog_pro_shadow_opacity'].')}';
               	$custom_css .= $prefix.' .block_blog {box-shadow: '.$v['home_blog_pro_h_shadow'].'px '.$v['home_blog_pro_v_shadow'].'px '.$v['home_blog_pro_shadow_blur'].'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$v['home_blog_pro_shadow_opacity'].')}';

             }	
             
             if ($v['home_blog_pro_shadow_effect'] == 1) {
                $home_blog_pro_shadow_color = self::hex2rgb($v['home_blog_pro_shadow_color']);
            	$custom_css .= $prefix.' .product_list_item:hover .block_blog {box-shadow: '.$v['home_blog_pro_h_shadow'].'px '.$v['home_blog_pro_v_shadow'].'px '.$v['home_blog_pro_shadow_blur'].'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$v['home_blog_pro_shadow_opacity'].')}';
              }	
             }
             
                if ($v['home_blog_pro_shadow_element'] == 1) {	
             if ($v['home_blog_pro_shadow_effect'] == 2) {
                $home_blog_pro_shadow_color = self::hex2rgb($v['home_blog_pro_shadow_color']);
            	$custom_css .= $prefix.' .block_blog .pro_second_box {-webkit-box-shadow: '.$v['home_blog_pro_h_shadow'].'px '.$v['home_blog_pro_v_shadow'].'px '.$v['home_blog_pro_shadow_blur'].'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$v['home_blog_pro_shadow_opacity'].')}';
                $custom_css .= $prefix.' .block_blog .pro_second_box {-moz-box-shadow: '.$v['home_blog_pro_h_shadow'].'px '.$v['home_blog_pro_v_shadow'].'px '.$v['home_blog_pro_shadow_blur'].'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$v['home_blog_pro_shadow_opacity'].')}';
               	$custom_css .= $prefix.' .block_blog .pro_second_box {box-shadow: '.$v['home_blog_pro_h_shadow'].'px '.$v['home_blog_pro_v_shadow'].'px '.$v['home_blog_pro_shadow_blur'].'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$v['home_blog_pro_shadow_opacity'].')}';

             }	
             
             if ($v['home_blog_pro_shadow_effect'] == 1) {
                $home_blog_pro_shadow_color = self::hex2rgb($v['home_blog_pro_shadow_color']);
            	$custom_css .= $prefix.' .product_list_item:hover .block_blog .pro_second_box  {box-shadow: '.$v['home_blog_pro_h_shadow'].'px '.$v['home_blog_pro_v_shadow'].'px '.$v['home_blog_pro_shadow_blur'].'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$v['home_blog_pro_shadow_opacity'].')}';
              }	
             }
             if ($v['home_blog_pro_shadow_element_mwidth']) {
                 $custom_css .= $prefix.' .block_blog .pro_second_box {max-width: '.$v['home_blog_pro_shadow_element_mwidth'].'%; z-index: 2; margin:'.$v['home_blog_pro_shadow_element_margin'].';}';     
         }
              
               if ($v['home_blog_pro_shadow_element'] == 0) {	
              if ($v['home_blog_border_width']) {
            	$custom_css .= $prefix.' .block_blog {border-width: '.$v['home_blog_border_width'].'; border-style: solid; border-color: '.$v['home_blog_border_color'].'}';
              }	
               }
               
                if ($v['home_blog_pro_shadow_element'] == 1) {	
              if ($v['home_blog_border_width']) {
            	$custom_css .= $prefix.' .block_blog .pro_second_box {border-width: '.$v['home_blog_border_width'].'; border-style: solid; border-color: '.$v['home_blog_border_color'].'}';
              }	
               }
              
              
              if ($v['home_blog_color_blog_info']) {
     
            	$custom_css .= $prefix.' .block_blog .blog_info span {color: '.$v['home_blog_color_blog_info'].'}';
            	$custom_css .= $prefix.' .block_blog .blog_info a {color: '.$v['home_blog_color_blog_info'].'}';
              }	
              
              
               if ($v['home_blog_size_blog_info']) {
     
            	$custom_css .= $prefix.' .block_blog .blog_info span {font-size: '.$v['home_blog_size_blog_info'].'px}';
            	$custom_css .= $prefix.' .block_blog .blog_info a {font-size: '.$v['home_blog_size_blog_info'].'px}';
              }	
              
              
              if ($v['home_blog_margint_blog_info']) {
     
            	$custom_css .= '@media (min-width: 768px) {'. $prefix.' .block_blog .blog_info {margin: '.$v['home_blog_margint_blog_info'].'}}';
            	
              }	
              
              if ($v['home_blog_marginb_blog_info']) {
                 	$custom_css .= '@media (max-width: 767px) {'. $prefix.' .block_blog .blog_info {margin: '.$v['home_blog_marginb_blog_info'].'}}';
            	
              }	
              
              if ($v['home_blog_color_title']) {
                $custom_css .= $prefix.' .block_blog .s_title_block a {color: '.$v['home_blog_color_title'].'}';
                $custom_css .= $prefix.' .block_blog .s_title_block span {color: '.$v['home_blog_color_title'].'}';
                 }	
              
              
              if ($v['home_blog_color_hov_title']) {
                 	$custom_css .= $prefix.' .block_blog:hover .s_title_block a {color: '.$v['home_blog_color_hov_title'].'}';
                 	$custom_css .= $prefix.' .block_blog:hover .s_title_block span {color: '.$v['home_blog_color_hov_title'].'}';
                }	
                
                
              if ($v['home_blog_color_fonts_title']) {
                 	$custom_css .= $prefix.' .block_blog .s_title_block a {font-size: '.$v['home_blog_color_fonts_title'].'px;}';
                 	$custom_css .= $prefix.' .block_blog .s_title_block span {font-size: '.$v['home_blog_color_fonts_title'].'px;}';
                }
                
                 if ($v['home_blog_color_fontsl_title']) {
                 	$custom_css .= $prefix.' .block_blog .s_title_block a {line-height: '.$v['home_blog_color_fontsl_title'].'px;}';
                 	$custom_css .= $prefix.' .block_blog .s_title_block span {line-height: '.$v['home_blog_color_fontsl_title'].'px;}';
                }
                
                 if ($v['home_blog_color_fontsmt_title']) {
                 	$custom_css .= '@media (min-width: 768px) {'. $prefix.' .block_blog .s_title_block  {margin: '.$v['home_blog_color_fontsmt_title'].';}}';
                }
                
                 if ($v['home_blog_color_fontsmb_title']) {
                 	$custom_css .= '@media (max-width: 767px) {'. $prefix.' .block_blog .s_title_block  {margin: '.$v['home_blog_color_fontsmb_title'].';}}';
                }
                
                 if ($v['home_blog_hov_border_title']) {
                 	$custom_css .= $prefix.' .block_blog .s_title_block   {padding-bottom: 4px;}';
                }
                
                if ($v['home_blog_color_desc']) {
                 	$custom_css .= $prefix.' .block_blog .blok_blog_short_content  {color: '.$v['home_blog_color_desc'].';}';
                }
                
                if ($v['home_blog_fonts_desc']) {
                 	$custom_css .= $prefix.' .block_blog .blok_blog_short_content  {font-size: '.$v['home_blog_fonts_desc'].'px;}';
                }
                
                if ($v['home_blog_fontlh_desc']) {
                 	$custom_css .= $prefix.' .block_blog .blok_blog_short_content  {line-height: '.$v['home_blog_fontlh_desc'].'px;}';
                }
                
                if ($v['home_blog_fontmt_desc']) {
                 	$custom_css .= '@media (min-width: 768px) {'. $prefix.' .block_blog .blok_blog_short_content  {margin: '.$v['home_blog_fontmt_desc'].';}}';
                }
                
                 if ($v['home_blog_fontmb_desc']) {
                 	$custom_css .= '@media (max-width: 767px) {'. $prefix.' .block_blog .blok_blog_short_content  {margin: '.$v['home_blog_fontmb_desc'].';}}';
                }
                
                 if ($v['photo_on_hover']) {
                 	$custom_css .= $prefix.' .product_list_item .block_blog .blog_image img  {vertical-align: bottom;  -webkit-transition: all 0.3s ease-in-out;  transition: all 0.3s ease-in-out;}';
                    $custom_css .= $prefix.' .product_list_item:hover .block_blog .blog_image img  {-webkit-transform: scale('.$v['photo_on_hover_size'].'); -ms-transform: scale('.$v['photo_on_hover_size'].'); transform: scale('.$v['photo_on_hover_size'].');}';
                    $custom_css .= $prefix.' .swiper-slide.block_blog .blog_image img  {vertical-align: bottom;  -webkit-transition: all 0.3s ease-in-out;  transition: all 0.3s ease-in-out;}';
                    $custom_css .= $prefix.' .swiper-slide.block_blog:hover .blog_image img  {-webkit-transform: scale('.$v['photo_on_hover_size'].'); -ms-transform: scale('.$v['photo_on_hover_size'].'); transform: scale('.$v['photo_on_hover_size'].');}';
          
                 }
                 
                if ($v['text_image_hovertb']) {
                 	$custom_css .= $prefix.' .product_list_item .block_blog .bottom_zone  {-webkit-transition: all 350ms ease; transition: all 350ms ease;}';
                    $custom_css .= $prefix.' .product_list_item:hover .block_blog .bottom_zone  {-webkit-transform: translate3d(0, '.$v['text_image_hover_shift'].'px, 0); transform: translate3d(0, '.$v['text_image_hover_shift'].'px, 0);-webkit-transition: all 350ms ease; transition: all 350ms ease;}';
          
                 }
                 
                if ($v['newsletter_betwen_height_el']) {
                 	$custom_css .= $prefix.' .product_list_item.big {height: '.$v['newsletter_betwen_height_el'].'px;}';
                 	$custom_css .= $prefix.' .product_list_item.half {height: '.ceil($v['newsletter_betwen_height_el']/2).'px;}';
                 
                 }
                 
                                                
                }
             }
            
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        
        return $this->fetch($this->templateFile[0], $this->getCacheId());
    }
    public function hookDisplayFooter($params, $func=0)
    {
        $display_on = $this->getDisplayOn($func ? $func : __FUNCTION__);
        if (!$display_on) {
            return false;
        }
        $id_st_blog_slider = isset($params['id_st_blog_slider']) ? (int)$params['id_st_blog_slider'] : null;
        $cache_id = $display_on.($id_st_blog_slider ? (string)$id_st_blog_slider : '');
	    if (!$this->isCached($this->templateFile[2], $this->stGetCacheId($cache_id)))
	    {
	        $this->_prepareHook('fot',$display_on,$id_st_blog_slider);
            $this->smarty->assign(array(
                'is_footer' => true,
    		));
	    }
		return $this->fetch($this->templateFile[2], $this->stGetCacheId($cache_id));
    }
    
    
   public function hookDisplayFooterTopBlogStacked_1($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    
   public function hookDisplayFooterTopBlogStacked_2($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    
public function hookDisplayFooterBlog($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    
	/**
	 * Return the list of fields value
	 *
	 * @param object $obj Object
	 * @return array
	 */
	public function getFieldsValueSt($obj,$fields_form="fields_form")
	{
		foreach ($this->$fields_form as $fieldset)
			if (isset($fieldset['form']['input']))
				foreach ($fieldset['form']['input'] as $input)
					if (!isset($this->fields_value[$input['name']]))
						if (isset($input['type']) && $input['type'] == 'shop')
						{
							if ($obj->id)
							{
								$result = Shop::getShopById((int)$obj->id, $this->identifier, $this->table);
								foreach ($result as $row)
									$this->fields_value['shop'][$row['id_'.$input['type']]][] = $row['id_shop'];
							}
						}
						elseif (isset($input['lang']) && $input['lang'])
							foreach (Language::getLanguages(false) as $language)
							{
								$fieldValue = $this->getFieldValueSt($obj, $input['name'], $language['id_lang']);
								if (empty($fieldValue))
								{
									if (isset($input['default_value']) && is_array($input['default_value']) && isset($input['default_value'][$language['id_lang']]))
										$fieldValue = $input['default_value'][$language['id_lang']];
									elseif (isset($input['default_value']))
										$fieldValue = $input['default_value'];
								}
								$this->fields_value[$input['name']][$language['id_lang']] = $fieldValue;
							}
						else
						{
							$fieldValue = $this->getFieldValueSt($obj, $input['name']);
							if ($fieldValue===false && isset($input['default_value']))
								$fieldValue = $input['default_value'];
							$this->fields_value[$input['name']] = $fieldValue;
						}

		return $this->fields_value;
	}
    
	/**
	 * Return field value if possible (both classical and multilingual fields)
	 *
	 * Case 1 : Return value if present in $_POST / $_GET
	 * Case 2 : Return object value
	 *
	 * @param object $obj Object
	 * @param string $key Field name
	 * @param integer $id_lang Language id (optional)
	 * @return string
	 */
	public function getFieldValueSt($obj, $key, $id_lang = null)
	{
		if ($id_lang)
			$default_value = ($obj->id && isset($obj->{$key}[$id_lang])) ? $obj->{$key}[$id_lang] : false;
		else
			$default_value = isset($obj->{$key}) ? $obj->{$key} : false;

		return Tools::getValue($key.($id_lang ? '_'.$id_lang : ''), $default_value);
	}
    
    private function getDisplayOn($func = '')
    {
        $ret = 0;
        if (!$func)
            return $ret;
        foreach(self::$location AS $value)
            if ('hookdisplay'.strtolower($value['hook']) == strtolower($func))
                return (int)$value['id'];
        return $ret;
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
    
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_blog_slider');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StBlogSliderClass((int)$pos[2]))
							if (isset($position) && $object->updatePosition($way, $position, $this->type))
								$msg = 'ok position '.(int)$position.' for ID '.(int)$pos[2]."\r\n";	
							else
								$msg = '{"hasError" : true, "errors" : "Can not update position"}';
						else
							$msg = '{"hasError" : true, "errors" : "This object ('.(int)$id.') can t be loaded"}';

						break;
					}
				}
                die($msg);
		}
	}
    public function prepareHooks()
    {
        $location = array();
        $rows = Db::getInstance()->executeS('SELECT display_on FROM `'._DB_PREFIX_.'st_blog_slider` 
            WHERE `type`='.$this->type.' 
            AND `id_shop`='.(int)$this->context->shop->id.' GROUP BY display_on'
        );
        foreach($rows AS $value) {
            if (key_exists($value['display_on'], self::$location) && isset(self::$location[$value['display_on']]['hook']))
                $location[$value['display_on']] = self::$location[$value['display_on']]['hook']; 
        }
        foreach(self::$location AS $local)
        {
            if (!isset($local['hook']))
                continue;
            $hook = 'display'.ucfirst($local['hook']);
            $id_hook = Hook::getIdByName($hook);
            if (count($location) && in_array($local['hook'], $location))
            {
                if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                    continue;
                if (!$this->isHookableOn($hook))
                    $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to ', array(), 'Modules.Stblog.Admin').$hook.'.';
                else
                    $this->registerHook($hook, Shop::getContextListShopID());
            }
            else
            {
                if($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                {
                    $this->unregisterHook($id_hook, Shop::getContextListShopID());
                    $this->unregisterExceptions($id_hook, Shop::getContextListShopID());
                } 
            }   
        }
        Cache::clean('hook_module_list');
        return true;
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
            'id_st_blog_slider' => 0,
            'st_time' => '',
            ), $atts));
        if(!isset($this->vc_hooks[$hook_name]))
            return ;
        $hook = 'hook'.ucfirst($this->vc_hooks[$hook_name]);
        if (method_exists($this, $hook)) {
            return $this->$hook(array('st_time'=>$st_time,'id_st_blog_slider'=>$id_st_blog_slider));
        }
    }
    function vc_map_init()
    {
        $sliders = array();
        $default = 0;
        $result = StBlogSliderClass::getListContent($this->type, 1, 0);
        if($result)
            foreach($result AS $v) {
                if ($this->type == 2) {
                    $name = $this->getTranslator()->trans('Recent articles', array(), 'Shop.Theme.Transformer');
                } else {
                    $category = new StBlogCategory((int)$v['id_st_blog_category'], (int)$this->context->language->id);
                    $name = $category->name;
                }
                $sliders[$this->getTranslator()->trans('ID:', array(), 'Admin.Theme.Transformer').$v['id_st_blog_slider'].' -- '.$name] = $v['id_st_blog_slider'];
                !$default && $default = $v['id_st_blog_slider']; 
            }
        $vc_hooks = array();
        foreach ($this->vc_hooks as $key => $value) {
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
                    'heading' => $this->getTranslator()->trans('Choose a article slider', array(), 'Modules.Stblog.Admin'),
                    'param_name' => 'id_st_blog_slider',
                    'value' => $sliders,
                    'std' => $default
                ),
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => 'hide_in_vc_editor',
                    'heading' => $this->getTranslator()->trans('How to display', array(), 'Admin.Theme.Transformer'),
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