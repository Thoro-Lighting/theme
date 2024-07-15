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

include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseSlider.php');
include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
class StBlogEditor extends BaseSlider implements WidgetInterface
{
    protected static $cache_products = array();
    public $googleFonts;
    public $variants = array();
    public $google_font_link = '';
    public $_prefix_st = 'ST_BLOG_';
    public $_prefix_stsn = 'STSN_BLOG_';
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
    protected $fields_default_stsn = array(
        'pro_per_fw' => 0,
        'pro_per_xxl' => 5,
        'pro_per_xl' => 4,
        'pro_per_lg' => 4,
        'pro_per_md' => 3,
        'pro_per_sm' => 3,
        'pro_per_xs' => 2,
        
        'pro_per_grid_fw' => 0,
        'pro_per_grid_xxl' => 5,
        'pro_per_grid_xl' => 4,
        'pro_per_grid_lg' => 4,
        'pro_per_grid_md' => 3,
        'pro_per_grid_sm' => 3,
        'pro_per_grid_xs' => 2,
        
        'pro_per_rel_fw' => 0,
        'pro_per_rel_xxl' => 5,
        'pro_per_rel_xl' => 4,
        'pro_per_rel_lg' => 4,
        'pro_per_rel_md' => 3,
        'pro_per_rel_sm' => 3,
        'pro_per_rel_xs' => 2,
    );
    
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
    
     protected $left_column_size_blog = array(
        1 => array('id' =>1 , 'name' => '1/12'),
        2 => array('id' =>2 , 'name' => '2/12'),
        3 => array('id' =>3 , 'name' => '3/12'),
        4 => array('id' =>4 , 'name' => '4/12'),
        5 => array('id' =>5 , 'name' => '5/12'),
        6 => array('id' =>6 , 'name' => '6/12'),
        7 => array('id' =>7 , 'name' => '7/12'),
        8 => array('id' =>8 , 'name' => '8/12'),
        9 => array('id' =>9 , 'name' => '9/12'),
        10 => array('id' =>10 , 'name' => '10/12'),
        11 => array('id' =>11 , 'name' => '11/12'),
        
        
        );
        
        protected $blog_footer_stacked_zone = array(
        1 => array('id' =>1 , 'name' => '1/12'),
        2 => array('id' =>2 , 'name' => '2/12'),
        3 => array('id' =>3 , 'name' => '3/12'),
        4 => array('id' =>4 , 'name' => '4/12'),
        5 => array('id' =>5 , 'name' => '5/12'),
        6 => array('id' =>6 , 'name' => '6/12'),
        7 => array('id' =>7 , 'name' => '7/12'),
        8 => array('id' =>8 , 'name' => '8/12'),
        9 => array('id' =>9 , 'name' => '9/12'),
        10 => array('id' =>10 , 'name' => '10/12'),
        11 => array('id' =>11 , 'name' => '11/12'),
        
        
        );
        
        
        protected $blog_topbar_b_border = array(
        0 => array('id' =>0 , 'name' => 'None'),
        1 => array('id' =>1 , 'name' => '1px height'),
        2 => array('id' =>2 , 'name' => '2px height'),
        3 => array('id' =>3 , 'name' => '3px height'),
        4 => array('id' =>4 , 'name' => '4px height'),
        5 => array('id' =>5 , 'name' => '5px height'),
        6 => array('id' =>6 , 'name' => '6px height'),
        7 => array('id' =>7 , 'name' => '7px height'),
        8 => array('id' =>8 , 'name' => '8px height'),
        9 => array('id' =>9 , 'name' => '9px height'),
       
        
        
        );
        
        
         protected $blog_header_style = array(
        0 => array('id' =>0 , 'name' => 'None'),
        1 => array('id' =>1 , 'name' => 'Style 1'),
        2 => array('id' =>2 , 'name' => 'Style 2'),
        3 => array('id' =>3 , 'name' => 'Style 3'),
   
      
        
        );
        
           
    private $templateFile = array();
	function __construct()
	{
		$this->name           = 'stblogeditor';
		$this->version        = '1.0.0';
		$this->author        = '';
        $this->displayName    = $this->getTranslator()->trans('Blog editor', array(), 'Modules.Stblog.Admin');
		$this->description    = $this->getTranslator()->trans('Change blog settings.', array(), 'Modules.Stblog.Admin');

		parent::__construct();
        $this->templateFile = array(
            'module:stthemeeditor/views/templates/slider/header.tpl',
            'module:stthemeeditor/views/templates/slider/homepage.tpl',
            'module:stblog/views/templates/slider/footer.tpl',
            );
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
    
    protected function initTabNames()
    {
        $this->_tabs = array(
            array('id'  => '0,4', 'name' => $this->getTranslator()->trans('General setting', array(), 'Admin.Theme.Transformer')),
            array('id'  => '88,89', 'name' => $this->getTranslator()->trans('Header setting', array(), 'Admin.Theme.Transformer')),
            array('id'  => '90,94,91,92,93', 'name' => $this->getTranslator()->trans('Footer setting', array(), 'Admin.Theme.Transformer')),
            array('id'  => '7,1', 'name' => $this->getTranslator()->trans('Related products', array(), 'Admin.Theme.Transformer')),
            // array('id'  => '2', 'name' => $this->getTranslator()->trans('Slider on blog homepage', array(), 'Admin.Theme.Transformer')),
            array('id'  => '5,15,17,18,16,19', 'name' => $this->getTranslator()->trans('Category page', array(), 'Admin.Theme.Transformer')),
            array('id'  => '6', 'name' => $this->getTranslator()->trans('Article page', array(), 'Admin.Theme.Transformer')),
            array('id'  => '99', 'name' => $this->getTranslator()->trans('Author Page Settings', array(), 'Admin.Theme.Transformer')),
            array('id'  => '100', 'name' => $this->getTranslator()->trans('Boxing category', array(), 'Admin.Theme.Transformer')),
            array('id'  => '3', 'name' => $this->getTranslator()->trans('Images settings', array(), 'Admin.Theme.Transformer')),
        );
    }
	function install()
	{
        $res = parent::install() &&
            $this->registerHook('displayStBlogArticleFooter');
	    $this->clearSliderCache();
		return $res;
	}
    function getContent()
    {
        if (Tools::getValue('act') == 'regeneratethumb' && Tools::getValue('ajax')==1)
        {
            $this->regenerateThumbails();
            die;
        }
        $this->initTabNames();
        $this->googleFonts = include(_PS_MODULE_DIR_.'stthemeeditor/googlefonts.php');
        parent::getContent();
        Media::addJsDef(array(
            'module_name' => $this->name,
        ));
        $this->context->controller->addCSS(_PS_MODULE_DIR_.'stthemeeditor/views/css/admin-slider.css');
        $this->context->controller->addJS(_PS_MODULE_DIR_.'stthemeeditor/views/js/admin.js');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');
        $this->_html .= '<script type="text/javascript">var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';</script>';
        $helper = $this->initForm();
        $this->smarty->assign(array(
            'bo_tabs' => $this->_tabs,
            'bo_tab_content' => $helper->generateForm($this->fields_form),
        ));
        
        return $this->_html.$this->fetch(_PS_MODULE_DIR_.'stthemeeditor/views/templates/hook/bo_tab_layout.tpl');
    }
    public function getConfigFieldsValues()
    {
        $fields_values = parent::getConfigFieldsValues();
        $languages = Language::getLanguages(false);    
		foreach ($languages as $language)
        {
            $fields_values['meta_title'][$language['id_lang']] = Configuration::get($this->_prefix_st.'META_TITLE', $language['id_lang']);
            $fields_values['meta_keywords'][$language['id_lang']] = Configuration::get($this->_prefix_st.'META_KEYWORDS', $language['id_lang']);
            $fields_values['meta_description'][$language['id_lang']] = Configuration::get($this->_prefix_st.'META_DESCRIPTION', $language['id_lang']);
            $fields_values['rount_name'][$language['id_lang']] = Configuration::get($this->_prefix_st.'ROUNT_NAME', $language['id_lang']);
        }
        $fields_values['name_font_select'] = Configuration::get($this->_prefix_st.'NAME_FONT_SELECT');
        $fields_values['name_font_weight'] = Configuration::get($this->_prefix_st.'NAME_FONT_WEIGHT');
        return $fields_values;
    }
    public function saveForm()
    {
        if (parent::saveForm()) {
            $font_name = Configuration::get($this->_prefix_st.'NAME_FONT_SELECT');
            $font_weight = Configuration::get($this->_prefix_st.'NAME_FONT_WEIGHT');
            if ($font_name && $font_weight) {
                Configuration::updateValue('STSN_FONT_MODULE_'.strtoupper($this->name), $font_name.':'.$font_weight);
            }
        }
    }
    public function initFieldsForm()
    {
        $variants_default = ['400'=>'400', '700'=>'700', 'italic'=>'italic', '700italic'=>'700italic'];
        if($name_font = Configuration::get($this->_prefix_st.'NAME_FONT_SELECT')){
            $temp = $this->googleFonts[str_replace(' ', '_', $name_font)]['variants'];
            foreach ($temp as $v) {
                $variants_default[$v] = $v;
            }
            $name_font_weight = Configuration::get($this->_prefix_st.'name_font_weight');
            $this->google_font_link .= '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $name_font).':'.$name_font_weight.'" />';
        }
        foreach($variants_default AS $value) {
            $this->variants[] = array('id'=>$value,'name'=>$value);
        }
        array_unshift($this->variants, array('id'=>'','name'=>'--'));
        $fields = $this->getFormFields();
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('General setting', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['setting'],
            'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
			),
        );
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Related products', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['home_slider'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
            ),
        );
        $this->fields_form[7]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Style settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['home_slider_setting'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
            ),
        );
        
        /*$this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Slider on blog homepage', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
			),
			'input' => $fields['slideshow'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);*/
        
        $this->fields_form[3]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Images settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['image'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        $this->fields_form[4]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Blog block settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_block'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        
         $this->fields_form[88]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Header settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_header'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[90]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Footer settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_footer'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[99]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Author Page Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['author_page'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[100]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Category box settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['author_page_category'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        
         $this->fields_form[94]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Footer blog stacked settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_footer_stacked'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
         $this->fields_form[91]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Footer top blog settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_footer_top'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[92]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Footer middle blog settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_footer_middle'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[93]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Footer bottom blog settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_footer_bottom'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
       
        
        $this->fields_form[89]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Topabar settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_topbar'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Category page', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['category'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[15]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Visibility of elements', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['category_visilbe'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[17]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Color settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['category_color'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[18]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Hover settings photo of the article', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['category_img_hover'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[16]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Additional settings for the option when the content is in the picture', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['category_img_on_content'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[19]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Newsletter form options', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['newaletter_form_option'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        
        $this->fields_form[6]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Article page', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['article'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
    }
    public function getFormFields()
    {
        $fields = parent::getFormFields();
        $form_fields = include(dirname(__FILE__).'/formFields.php');
        
        $fields['home_slider']['grid']['label'] = $this->getTranslator()->trans('How to display articles:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['nbr']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['label'] = $this->getTranslator()->trans('Spacing between articles:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['desc'][0] = $this->getTranslator()->trans('Distance between articles.', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['link_hover_color']['label'] = $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['soby']['default_value'] = 1;
        unset($fields['home_slider']['view_more']);
        unset($fields['setting']['aw_display']);
        $fields['home_slider']['display_sd_rel_pro'] = $fields['home_slider']['display_sd'];
        $fields['home_slider']['display_sd_rel_pro']['name'] = 'display_sd_rel_pro';
        unset($fields['home_slider']['display_sd']);
        
        // $form_fields['related'] = $this->addFieldsSuffix($fields['home_slider'], '_rel');
        // $form_fields['slideshow'] = $fields['home_slider'];
        // Image type widht recommended.
        $option = array(
            'spacing' => (int)Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            'per_lg'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
            'per_xl'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
            'per_xxl' => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
            'page'    => 'module-stblog-article',
        );
        $fields['home_slider']['image_type']['desc'] = $this->calcImageWidth($option);
        
        $option = array(
            'spacing' => 15,
            'per_lg'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_GRID_LG'),
            'per_xl'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_GRID_XL'),
            'per_xxl' => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_GRID_XXL'),
            'page'    => 'module-stblog-category',
        );
        $form_fields['category']['blog_image_type']['desc'] = $this->calcImageWidth($option);
        
        $form_fields['home_slider'] = $fields['home_slider'];
        $form_fields['home_slider_setting'] = $fields['setting'];
        return $form_fields;
    }
    public function regenerateThumbails()
	{
	    $result = array(
            'r' => false,
            'm' => ''
        );
        
        if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP)
            $id_shop = Shop::getContextListShopID();
        else
            $id_shop = array((int)Shop::getContextShopID());
        
        $images = Db::getInstance()->executeS('
        SELECT i.* FROM '._DB_PREFIX_.'st_blog_image `i`
        INNER JOIN '._DB_PREFIX_.'st_blog_image_shop `is`
        ON `i`.`id_st_blog_image` = `is`.`id_st_blog_image`
        WHERE `id_shop` IN ('.implode(',', $id_shop).')
        ORDER BY `type`
        ');
        
        if ($images)
        {
            $path = _PS_UPLOAD_DIR_.'stblog/';
            $ext  = 'jpg';
            if (!is_dir($path) || !is_writable($path))
                $result['m'] = $path.$this->getTranslator()->trans(' is not writable', array(), 'Modules.Stblog.Admin');
            else
            {
                $max_execution_time = (int)ini_get('max_execution_time');
                set_time_limit(10*60);
                foreach($images AS $image)
                {
                    $file = $path.$image['type'].'/'.$image['id_st_blog'].'/'.$image['id_st_blog_image'].'/'.$image['id_st_blog'].$image['id_st_blog_image'].'.'.$ext;
                    if (!file_exists($file))
                    {
                        $result['m'] .= $file."\n";
                        continue;
                    }
                    $this->resizeImage($file, $image['type'], $image['id_st_blog'].$image['id_st_blog_image'], $ext); 
                }
                set_time_limit($max_execution_time);
                $result['r'] = true;
                if ($result['m'])
                    $result['m'] = $this->getTranslator()->trans('The following origin file not exists:'."\n", array(), 'Modules.Stblog.Admin').$result['m'];
            }
        }
        else
            $result['r'] = true;
		
        echo Tools::jsonEncode($result);
	}
    
    public function resizeImage($src_file, $image_type = 1, $basename = '', $ext = 'jpg')
    {
        if (!file_exists($src_file))
            return false;
        $ret = true;
        $types = StBlogImageClass::getDefImageTypes();
        if (!count($types) || !key_exists($image_type, $types))
            return false;
        foreach($types[$image_type] AS $key => $type)
        {
            if (!is_array($type) && count($type) < 2)
                continue;
                
            // Is image smaller than dest? fill it with white!
            $tmp_file_new = $src_file;
            list($src_width, $src_height) = getimagesize($src_file);
            if (!$src_width || !$src_height)
                continue;
            
            $width  = (int)$type[0];
            $height = $type[1] > 0 ? (int)$type[1] : $src_height;
            if ($src_width < $width || $src_height < $height)
            {
                $tmp_file_new = $src_file.'_new';
                ImageManager::resize($src_file, $tmp_file_new, $width, $height);
            }
                
            $options = array('jpegQuality' => Configuration::get('PS_JPEG_QUALITY') ? Configuration::get('PS_JPEG_QUALITY') : 80);
            $thumb = PhpThumbFactory::create($tmp_file_new, $options);
            if (!$type[1])
                $thumb->adaptiveResizeWidth($width);
            else
                $thumb->adaptiveResize($width, $height);
            $folder = dirname($src_file).'/';
            $thumb->save($folder.$basename.$key.'.'.$ext);
            $ret &= ImageManager::isRealImage($folder.$basename.$key.'.'.$ext);
        }
        if (file_exists($src_file.'_new'))
            @unlink($src_file.'_new');
        return $ret;
    }

    public function getPatterns($amount=27,$type='')
    {
        $html = '';
        foreach(range(1,$amount) as $v)
            $html .= '<div class="parttern_wrap '.($type=='heading_bg' ? ' repeat_x ' : '').'" style="background-image:url('._MODULE_DIR_.'stthemeeditor/patterns'.($type ? '/'.$type : '').'/'.$v.'.png);"><span>'.$v.'</span></div>';
        $html .= '<div>'.$this->getTranslator()->trans('Pattern credits', array(), 'Modules.Stblog.Admin').':<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>';
        return $html;
    }
    public function getPatternsArray($amount=27)
    {
        $arr = array();
        for($i=1;$i<=$amount;$i++)
            $arr[] = array('id'=>$i,'name'=>$i); 
        return $arr;   
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return ;
    }
    public function renderWidget($hookName = null, array $configuration = [])
    {
        return ;
    }

    public function hookDisplayHeader($params)
    {
        // $this->context->controller->addJS(($this->_path).'views/js/jquery.fitvids.js');
        // $this->context->controller->addJS(($this->_path).'views/js/stblog.js');
        // $this->context->controller->addCSS(($this->_path).'views/css/stblog.css');
        /*$this->smarty->assign(array(
            'ss_slideshow' => (int)Configuration::get('ST_BLOG_SS_SLIDESHOW'),
            'ss_s_speed' => Configuration::get('ST_BLOG_SS_S_SPEED'),
            'ss_a_speed' => Configuration::get('ST_BLOG_SS_A_SPEED'),
            'ss_pause' => (int)Configuration::get('ST_BLOG_SS_PAUSE'),
        ));*/
        if (!$this->isCached($this->templateFile[0], $this->stGetCacheId('header')))
        {
            $css = '';

            
    
            if($post_font_size = Configuration::get($this->_prefix_st.'POST_FONT_SIZE'))
                $css .= '.blog_content, .blog_short_content{font-size:'.(round($post_font_size/12*100,2) / 100).'em;}';
            if($post_heading_size = Configuration::get($this->_prefix_st.'POST_HEADING_SIZE'))
                $css .= '.page_heading.blog_heading{font-size:'.(round($post_heading_size/12*100,2) / 100).'em;}';

            if($name_font_select = Configuration::get($this->_prefix_st.'NAME_FONT_SELECT'))
                $css .='.block_blog .s_title_block a{font-family: "'.$name_font_select.'";}';
            if($name_font_weight = Configuration::get($this->_prefix_st.'NAME_FONT_WEIGHT')){
                preg_match_all('/^(\d*)([a-z]*)$/', $name_font_weight, $nameFontArr);
                if($nameFontArr[1][0])
                    $css .='.block_blog .s_title_block a{font-weight: '.$nameFontArr[1][0].';}';
                if($nameFontArr[2][0])
                    $css .='.block_blog .s_title_block a{font-style: '.$nameFontArr[2][0].';}';
            }
            if($name_transform = (int)Configuration::get($this->_prefix_st.'NAME_TRANSFORM'))
                $css .='.block_blog .s_title_block a{text-transform: '.self::$textTransform[$name_transform]['name'].';}';
            
           


            if($font_heading_size = Configuration::get($this->_prefix_st.'FONT_HEADING_SIZE'))
                $css .='.is_blog .title_block .title_block_inner{font-size: '.$font_heading_size.'px;}';
            if($font_heading_trans = Configuration::get($this->_prefix_st.'FONT_HEADING_TRANS'))
                $css .='.is_blog .title_block .title_block_inner{text-transform: '.self::$textTransform[$font_heading_trans]['name'].';}';  
            if(Configuration::get($this->_prefix_st.'BLOCK_HEADINGS_COLOR'))
                $css .='.is_blog .title_block .title_block_inner{color: '.Configuration::get($this->_prefix_st.'BLOCK_HEADINGS_COLOR').';}';

            $heading_style = (int)Configuration::get($this->_prefix_st.'HEADING_STYLE');
            $heading_bottom_border = Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER');

            if($heading_bottom_border || $heading_bottom_border===0 || $heading_bottom_border==='0')
            {
                if($heading_style==1){
                    $css .= '.is_blog .title_style_1 .flex_child,.is_blog .title_style_4 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                }elseif($heading_style==3){
                    $css .= '.is_blog .title_style_3 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                }elseif($heading_style==2){
                    $css .= '.is_blog .title_style_2 .flex_child{border-top-width:'.$heading_bottom_border.'px;border-bottom-width:'.$heading_bottom_border.'px;}';
                }else{
                    $css .= '.is_blog .title_style_0, .is_blog .title_style_0 .title_block_inner{border-bottom-width:'.$heading_bottom_border.'px;}.is_blog .title_style_0 .title_block_inner{margin-bottom:-'.$heading_bottom_border.'px;}';
                }
            }
            if(Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER_COLOR'))
                $css .='.is_blog .title_style_0, .is_blog .title_style_1 .flex_child, .is_blog .title_style_2 .flex_child, .is_blog .title_style_3 .flex_child{border-color: '.Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER_COLOR').';}';  
            if(Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER_COLOR_H'))
                $css .='.is_blog .title_style_0 .title_block_inner{border-color: '.Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER_COLOR_H').';}';  
            if(Configuration::get($this->_prefix_st.'HEADING_COLUMN_BG'))
                $css .='.is_blog #left_column .title_block,.is_blog #right_column .title_block{background-color: '.Configuration::get($this->_prefix_st.'HEADING_COLUMN_BG').';padding-left:6px;}';  

            $bg_pattern = Configuration::get($this->_prefix_st.'HEADING_BG_PATTERN');
            if ($bg_pattern && Configuration::get($this->_prefix_st.'HEADING_BG_IMAGE')=="") {
                $bg_pattern = _MODULE_DIR_.'stthemeeditor/patterns/heading_bg/'.$bg_pattern.'.png';
                $bg_pattern = $this->context->link->protocol_content.Tools::getMediaServer($bg_pattern).$bg_pattern;
            }
            $css .= '.is_blog .title_style_0 .flex_child,.is_blog .title_style_2 .flex_child,.is_blog .title_style_3 .flex_child{background-image: '.($bg_pattern ? 'url('.$bg_pattern.')' : 'none').';}';
            
            if ($bg_img = Configuration::get($this->_prefix_st.'HEADING_BG_IMAGE')) {
                $bg_img = _THEME_PROD_PIC_DIR_.$bg_img;
                $bg_img = $this->context->link->protocol_content.Tools::getMediaServer($bg_img).$bg_img;
                $css .= '.is_blog .title_style_0 .flex_child,.is_blog .title_style_2 .flex_child,.is_blog .title_style_3 .flex_child{background-image:url('.$bg_img.');}';    
            }
                
           
            //related products
            $classname = $this->name.'_container';
            
            $custom_css = '';
    
            if(Configuration::get($this->_prefix_st.'GRID')==1)
            {
                $spacing_between = Configuration::get($this->_prefix_st.'SPACING_BETWEEN');
                $custom_css .= '.'.$classname.' .product_list.grid .product_list_item{padding-left:'.ceil($spacing_between/2).'px;padding-right:'.floor($spacing_between/2).'px;}';
                $custom_css .= '.'.$classname.' .product_list.grid{margin-left:'.ceil($spacing_between/2).'px;margin-right:'.floor($spacing_between/2).'px;}';
            }
            
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
                $custom_css .= '.'.$classname.'.products_container{'.$group_css.'}';
            /*if ($bg_img_v_offset = (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET')) {
                $custom_css .= '.'.$classname.'.products_container{background-position:center -'.$bg_img_v_offset.'px;}';
            }*/
    
            if ($top_padding = (int)Configuration::get($this->_prefix_st.'TOP_PADDING'))
                $custom_css .= '.'.$classname.'.products_container  .products_slider{padding-top:'.$top_padding.'px;}';
            if ($bottom_padding = (int)Configuration::get($this->_prefix_st.'BOTTOM_PADDING'))
                $custom_css .= '.'.$classname.'.products_container  .products_slider{padding-bottom:'.$bottom_padding.'px;}';
    
            $top_margin = Configuration::get($this->_prefix_st.'TOP_MARGIN');
            if($top_margin || $top_margin===0 || $top_margin==='0')
                $custom_css .= '.'.$classname.'.products_container{margin-top:'.$top_margin.'px;}';
            $bottom_margin = Configuration::get($this->_prefix_st.'BOTTOM_MARGIN');
            if($bottom_margin || $bottom_margin===0 || $bottom_margin==='0')
                $custom_css .= '.'.$classname.'.products_container{margin-bottom:'.$bottom_margin.'px;}';
    
            if ($title_font_size = (int)Configuration::get($this->_prefix_st.'TITLE_FONT_SIZE'))
                 $custom_css .= '.'.$classname.'.products_container .title_block_inner{font-size:'.$title_font_size.'px;}';
    
            if ($title_color = Configuration::get($this->_prefix_st.'TITLE_COLOR'))
                $custom_css .= '.'.$classname.'.products_container .title_block_inner{color:'.$title_color.';}';
            if ($title_hover_color = Configuration::get($this->_prefix_st.'TITLE_HOVER_COLOR'))
                $custom_css .= '.'.$classname.'.products_container .title_block_inner:hover{color:'.$title_hover_color.';}';
    
    
            $heading_bottom_border = Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER');
            if($heading_bottom_border || $heading_bottom_border===0 || $heading_bottom_border==='0')
            {
                $custom_css .= '.'.$classname.'.products_container .title_style_0,.'.$classname.'.products_container .title_style_0 .title_block_inner{border-bottom-width:'.$heading_bottom_border.'px;}.'.$classname.'.products_container .title_style_0 .title_block_inner{margin-bottom:'.$heading_bottom_border.'px;}';
                $custom_css .= '.'.$classname.'.products_container .title_style_1 .flex_child, .'.$classname.'.products_container .title_style_3 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                $custom_css .= '.'.$classname.'.products_container .title_style_2 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;border-top-width:'.$heading_bottom_border.'px;}';
            }
            
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR'))
                $custom_css .='.'.$classname.'.products_container .title_style_0, .'.$classname.'.products_container .title_style_1 .flex_child, .'.$classname.'.products_container .title_style_2 .flex_child, .'.$classname.'.products_container .title_style_3 .flex_child{border-bottom-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}.'.$classname.'.products_container .title_style_2 .flex_child{border-top-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}';  
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H'))
                $custom_css .='.'.$classname.'.products_container .title_style_0 .title_block_inner{border-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H').';}';  
    
    
            if ($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR'))
                $custom_css .= '.'.$classname.' .ajax_block_product .s_title_block a,
                .'.$classname.' .ajax_block_product .old_price,
                .'.$classname.' .ajax_block_product .product_desc{color:'.$text_color.';}';
    
            if ($price_color = Configuration::get($this->_prefix_st.'PRICE_COLOR'))
                $custom_css .= '.'.$classname.' .ajax_block_product .price{color:'.$price_color.';}';
            if ($link_hover_color = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR'))
                $custom_css .= '.'.$classname.' .ajax_block_product .s_title_block a:hover{color:'.$link_hover_color.';}';
    
            if ($grid_hover_bg = Configuration::get($this->_prefix_st.'GRID_HOVER_BG'))
                $custom_css .= '.'.$classname.' .pro_outer_box:hover .pro_second_box{background-color:'.$grid_hover_bg.';}';
    
            if ($direction_color = Configuration::get($this->_prefix_st.'DIRECTION_COLOR'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button{color:'.$direction_color.';}';
            if ($direction_color_hover = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_HOVER'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button:hover{color:'.$direction_color_hover.';}';
            if ($direction_color_disabled = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_DISABLED'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button.swiper-button-disabled, .'.$classname.'.block .products_slider .swiper-button.swiper-button-disabled:hover{color:'.$direction_color_disabled.';}';
            
            if ($direction_bg = Configuration::get($this->_prefix_st.'DIRECTION_BG'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button{background-color:'.$direction_bg.';}';
            if ($direction_hover_bg = Configuration::get($this->_prefix_st.'DIRECTION_HOVER_BG'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button:hover{background-color:'.$direction_hover_bg.';}';
            if ($direction_disabled_bg = Configuration::get($this->_prefix_st.'DIRECTION_DISABLED_BG'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button.swiper-button-disabled, .'.$classname.'.block .products_slider .swiper-button.swiper-button-disabled:hover{background-color:'.$direction_disabled_bg.';}';
            /*else
                $custom_css .= '.'.$classname.' .products_slider .swiper-button.swiper-button-disabled, .'.$classname.' .products_slider .swiper-button.swiper-button-disabled:hover{background-color:transparent;}';*/
    
            if ($pag_nav_bg = Configuration::get($this->_prefix_st.'PAG_NAV_BG')){
                $custom_css .= '.'.$classname.' .swiper-pagination-bullet,.'.$classname.' .swiper-pagination-progress{background-color:'.$pag_nav_bg.';}';
                $custom_css .= '.'.$classname.' .swiper-pagination-st-round .swiper-pagination-bullet{background-color:transparent;border-color:'.$pag_nav_bg.';}';
                $custom_css .= '.'.$classname.' .swiper-pagination-st-round .swiper-pagination-bullet span{background-color:'.$pag_nav_bg.';}';
            }
            if ($pag_nav_bg_hover = Configuration::get($this->_prefix_st.'PAG_NAV_BG_HOVER')){
                $custom_css .= '.'.$classname.' .swiper-pagination-bullet-active, .'.$classname.' .swiper-pagination-progress .swiper-pagination-progressbar{background-color:'.$pag_nav_bg_hover.';}';
                $custom_css .= '.'.$classname.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active{background-color:'.$pag_nav_bg_hover.';border-color:'.$pag_nav_bg_hover.';}';
                $custom_css .= '.'.$classname.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active span{background-color:'.$pag_nav_bg_hover.';}';
            }
            
       
            if ($blog_topbar_text_color = Configuration::get($this->_prefix_st.'BLOG_TOPBAR_TEXT_COLOR')){
             $css .='#top_bar.blog-topbar .top_bar_item .header_item {color: '.$blog_topbar_text_color.';}';
     
            }
            
            if ($blog_topbar_link_hover_color = Configuration::get($this->_prefix_st.'BLOG_TOPBAR_LINK_HOVER_COLOR')){
             $css .='#top_bar.blog-topbar .top_bar_item .header_item:hover {color: '.$blog_topbar_link_hover_color.';}';
     
            }
            
        if ($blog_topbar_header_link_hover_bg = Configuration::get($this->_prefix_st.'BLOG_TOPBAR_HEADER_LINK_HOVER_BG')){
             $css .='#top_bar.blog-topbar .top_bar_item:hover {background-color: '.$blog_topbar_header_link_hover_bg.';}';
             $css .='#top_bar.blog-topbar .dropdown_wrap.open .dropdown_tri {background-color: '.$blog_topbar_header_link_hover_bg.';}';
     
            }
            
            
        if ($blog_topbar_height = Configuration::get($this->_prefix_st.'BLOG_TOPBAR_HEIGHT')){
             $css .='#top_bar.blog-topbar .top_bar_item .header_item {height: '.$blog_topbar_height.'px; line-height: '.$blog_topbar_height.'px;}';
            $css .='#top_bar.blog-topbar .mobile_bar_tri_text {height: '.$blog_topbar_height.'px; line-height: '.$blog_topbar_height.'px;}';
     
            }
            
        if ($blog_header_topbar_bg = Configuration::get($this->_prefix_st.'BLOG_HEADER_TOPBAR_BG')){
             $css .='#top_bar.blog-topbar {background-color: '.$blog_header_topbar_bg.';}';
           
            }
            
        if ($blog_topbar_b_border = Configuration::get($this->_prefix_st.'BLOG_TOPBAR_B_BORDER')){
             $css .='#top_bar.blog-topbar {border-bottom: '.$blog_topbar_b_border.'px solid;}';
             $css .='#top_bar.blog-topbar {border-color: '.Configuration::get($this->_prefix_st.'BLOG_TOPBAR_B_BORDER_COLOR').';}';
         }
            
        if ($blog_header_bg_color = Configuration::get($this->_prefix_st.'BLOG_HEADER_BG_COLOR')){
             $css .='.is_blog .header-container #st_header {background-color: '.Configuration::get($this->_prefix_st.'BLOG_HEADER_BG_COLOR').';}';
         }
            
            
        if ($blog_header_con_bg_color = Configuration::get($this->_prefix_st.'BLOG_HEADER_CON_BG_COLOR')){
              $css .='.is_blog #st_header .wide_container {background-color: '.Configuration::get($this->_prefix_st.'BLOG_HEADER_CON_BG_COLOR').';}';
              $css .='.page_blog #top_extra .wide_container {background-color: '.Configuration::get($this->_prefix_st.'BLOG_HEADER_CON_BG_COLOR').';}';
        }
            
            
        if ($blog_header_bottom_border = Configuration::get($this->_prefix_st.'BLOG_HEADER_BOTTOM_BORDER')){
             $css .='.is_blog #header_primary .wide_container {border-bottom: '.$blog_header_bottom_border.'px solid;}';
             $css .='.is_blog #header_primary .wide_container {border-color: '.Configuration::get($this->_prefix_st.'BLOG_HEADER_BOTTOM_BORDER_COLOR').';}';
         }  
          
         if ($blog_logo_height = Configuration::get($this->_prefix_st.'BLOG_LOGO_HEIGHT')){
             $css .='.is_blog #st_header #header_primary_container {height: '.$blog_logo_height.'px;}';
        }  
        
        if ($blog_header_text_color = Configuration::get($this->_prefix_st.'BLOG_HEADER_TEXT_COLOR')){
        
            $css .= '.is_blog #header_primary .top_bar_item .header_item, .is_blog #header_primary .mobile_bar_tri_text {color:'.$blog_header_text_color.';}';
         }
         
         if ($blog_header_link_hover_color = Configuration::get($this->_prefix_st.'BLOG_HEADER_LINK_HOVER_COLOR')){
            $css .='.is_blog #header_primary .top_bar_item .header_item:hover, .is_blog #header_primary .mobile_bar_tri:hover  .mobile_bar_tri_text, .is_blog #header_primary .dropdown_wrap.open .dropdown_tri {color:'.$blog_header_link_hover_color.';}';
        }
        
        
        if ($blog_header_text_trans = Configuration::get($this->_prefix_st.'BLOG_HEADER_TEXT_TRANS')){
            $css .='.is_blog #st_header .header_item, .is_blog #header_primary .mobile_bar_tri_text {text-transform: '.self::$textTransform[(int)Configuration::get('ST_BLOG_BLOG_HEADER_TEXT_TRANS')]['name'].';}';
        }
        
        if ($blog_footer_stacked_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_COLOR')){
        
            $css .= '.is_blog #footer #footer-top-blog-stacked {background-color:'.$blog_footer_stacked_color.';}';
         }
         
        if ($blog_footer_stacked_width_max = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_WIDTH_MAX')){
        
            $css .= '.is_blog #footer #footer-top-blog-stacked .container {max-width:'.$blog_footer_stacked_width_max.'px;}';
         }
         
        if ($blog_footer_stacked_color_con = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_COLOR_CON')){
        
            $css .= '.is_blog #footer #footer-top-blog-stacked .style_footer_blog_stacked {background-color:'.$blog_footer_stacked_color_con.';}';
         }
         
         
        if ($blog_footer_stacked_link_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_LINK_COLOR')){
        
            $css .= '.is_blog #footer #footer-top-blog-stacked .style_footer_blog_stacked a {color:'.$blog_footer_stacked_link_color.';}';
         }
         
        if ($blog_footer_stacked_hover_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_HOVER_COLOR')){
        
            $css .= '.is_blog #footer #footer-top-blog-stacked .style_footer_blog_stacked a:hover {color:'.$blog_footer_stacked_hover_color.';}';
         }
         
        if ($blog_footer_stacked_text_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_TEXT_COLOR')){
        
            $css .= '.is_blog #footer #footer-top-blog-stacked .style_footer_blog_stacked  {color:'.$blog_footer_stacked_text_color.';}';
         }
         
        if ($blog_footer_stacked_padding_top = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_PADDING_TOP')){
        
            $css .= '@media (min-width: 768px) {.is_blog #footer #footer-top-blog-stacked .style_footer_blog_stacked  {padding:'.$blog_footer_stacked_padding_top.'}}';
         }
         
        if ($blog_footer_stacked_padding_bottom = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_PADDING_BOTTOM')){
        
            $css .= '@media (max-width: 767px) {.is_blog #footer #footer-top-blog-stacked .style_footer_blog_stacked  {padding:'.$blog_footer_stacked_padding_bottom.'}}';
         }
         
        if ($blog_footer_stacked_padding_left = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_PADDING_LEFT')){
        
            $css .= '@media (min-width: 768px) {.is_blog #footer #footer-top-blog-stacked   {padding:'.$blog_footer_stacked_padding_left.'}}';
         }
         
        if ($blog_footer_stacked_padding_right = Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_PADDING_RIGHT')){
        
            $css .= '@media (max-width: 767px) {.is_blog #footer #footer-top-blog-stacked   {padding:'.$blog_footer_stacked_padding_right.'}}';
         }
         
         
         if ($blog_footer_top_color_con = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_COLOR_CON')){
        
            $css .= '.is_blog #footer #footer-top-blog .style_footer_top_blog {background-color:'.$blog_footer_top_color_con.';}';
         }
         
         
        if ($blog_footer_top_link_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_LINK_COLOR')){
        
            $css .= '.is_blog #footer #footer-top-blog .style_footer_top_blog a {color:'.$blog_footer_top_link_color.';}';
         }
         
        if ($blog_footer_top_hover_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_HOVER_COLOR')){
        
            $css .= '.is_blog #footer #footer-top-blog .style_footer_top_blog a:hover {color:'.$blog_footer_top_hover_color.';}';
         }
         
        if ($blog_footer_top_text_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_TEXT_COLOR')){
        
            $css .= '.is_blog #footer #footer-top-blog .style_footer_top_blog  {color:'.$blog_footer_top_text_color.';}';
         }
         
       
         if ($blog_footer_top_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_COLOR')){
        
            $css .= '.is_blog #footer #footer-top-blog {background-color:'.$blog_footer_top_color.';}';
            
         }
            
         if ($blog_footer_top_width_max = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_WIDTH_MAX')){
        
            $css .= '.is_blog #footer #footer-top-blog .container {max-width:'.$blog_footer_top_width_max.'px;}';
         }
         
         
         if ($blog_footer_top_padding_top = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_PADDING_TOP')){
        
            $css .= '@media (min-width: 768px) {.is_blog #footer #footer-top-blog .style_footer_top_blog  {padding:'.$blog_footer_top_padding_top.';}}';
         }
         
        if ($blog_footer_top_padding_bottom = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_PADDING_BOTTOM')){
        
            $css .= '@media (max-width: 767px) {.is_blog #footer #footer-top-blog .style_footer_top_blog  {padding:'.$blog_footer_top_padding_bottom.';}}';
         }
         
         
        if ($blog_footer_top_padding_left = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_PADDING_LEFT')){
        
            $css .= '@media (min-width: 768px) {.is_blog #footer #footer-top-blog  {padding:'.$blog_footer_top_padding_left.';}}';
         }
         
        if ($blog_footer_top_padding_right = Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_PADDING_RIGHT')){
        
            $css .= '@media (max-width: 767px) {.is_blog #footer #footer-top-blog  {padding:'.$blog_footer_top_padding_right.';}}';
         }
         
         
         if ($blog_footer_middle_color_con = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_COLOR_CON')){
        
            $css .= '.is_blog #footer #footer-middle-blog .style_footer_middle_blog {background-color:'.$blog_footer_middle_color_con.';}';
         }
         
         
        if ($blog_footer_middle_link_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_LINK_COLOR')){
        
            $css .= '.is_blog #footer #footer-middle-blog .style_footer_middle_blog a {color:'.$blog_footer_middle_link_color.';}';
         }
         
        if ($blog_footer_middle_hover_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_HOVER_COLOR')){
        
            $css .= '.is_blog #footer #footer-middle-blog .style_footer_middle_blog a:hover {color:'.$blog_footer_middle_hover_color.';}';
         }
         
        if ($blog_footer_middle_text_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_TEXT_COLOR')){
        
            $css .= '.is_blog #footer #footer-middle-blog .style_footer_middle_blog {color:'.$blog_footer_middle_text_color.';}';
         }
         
       
         if ($blog_footer_middle_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_COLOR')){
        
            $css .= '.is_blog #footer #footer-middle-blog {background-color:'.$blog_footer_middle_color.';}';
         }
         
        if ($blog_footer_middle_width_max = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_WIDTH_MAX')){
        
            $css .= '.is_blog #footer #footer-middle-blog .container {max-width:'.$blog_footer_middle_width_max.'px;}';
         }
         
         if ($blog_footer_middle_padding_top = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_PADDING_TOP')){
        
            $css .= '@media (min-width: 768px) {.is_blog #footer #footer-middle-blog .style_footer_middle_blog {padding:'.$blog_footer_middle_padding_top.'}}';
         }
         
        if ($blog_footer_middle_padding_bottom = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_PADDING_BOTTOM')){
        
            $css .= '@media (max-width: 767px) {.is_blog #footer #footer-middle-blog .style_footer_middle_blog  {padding:'.$blog_footer_middle_padding_bottom.'}}';
         }
         
         if ($blog_footer_middle_padding_left = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_PADDING_LEFT')){
        
            $css .= '@media (min-width: 768px) {.is_blog #footer #footer-middle-blog  {padding:'.$blog_footer_middle_padding_left.'}}';
         }
         
        if ($blog_footer_middle_padding_right = Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_PADDING_RIGHT')){
        
            $css .= '@media (max-width: 767px) {.is_blog #footer #footer-middle-blog   {padding:'.$blog_footer_middle_padding_right.'}}';
         }
      
         
          if ($blog_footer_bottom_color_con = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_COLOR_CON')){
        
            $css .= '.is_blog #footer #footer-bottom-blog .style_footer_bottom_blog {background-color:'.$blog_footer_bottom_color_con.';}';
         }
         
         
        if ($blog_footer_bottom_link_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_LINK_COLOR')){
        
            $css .= '.is_blog #footer #footer-bottom-blog .style_footer_bottom_blog a {color:'.$blog_footer_bottom_link_color.';}';
         }
         
        if ($blog_footer_bottom_hover_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_HOVER_COLOR')){
        
            $css .= '.is_blog #footer #footer-bottom-blog .style_footer_bottom_blog a:hover {color:'.$blog_footer_bottom_hover_color.';}';
         }
         
        if ($blog_footer_bottom_text_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_TEXT_COLOR')){
        
            $css .= '.is_blog #footer #footer-bottom-blog .style_footer_bottom_blog {color:'.$blog_footer_bottom_text_color.';}';
         }
         
       
         if ($blog_footer_bottom_color = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_COLOR')){
        
            $css .= '.is_blog #footer #footer-bottom-blog {background-color:'.$blog_footer_bottom_color.';}';
         }
         
        if ($blog_footer_bottom_width_max = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_WIDTH_MAX')){
        
            $css .= '.is_blog #footer #footer-bottom-blog .container {max-width:'.$blog_footer_bottom_width_max.'px;}';
         }
         
         
         if ($blog_footer_bottom_padding_top = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_PADDING_TOP')){
        
            $css .= '@media (min-width: 768px) {.is_blog #footer #footer-bottom-blog .style_footer_bottom_blog  {padding:'.$blog_footer_bottom_padding_top.'}}';
         }
         
        if ($blog_footer_bottom_padding_bottom = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_PADDING_BOTTOM')){
        
            $css .= '@media (max-width: 767px) {.is_blog #footer #footer-bottom-blog .style_footer_bottom_blog  {padding'.$blog_footer_bottom_padding_bottom.'}}';
         }
         
         
        if ($blog_footer_bottom_padding_left = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_PADDING_LEFT')){
        
            $css .= '@media (min-width: 768px) {.is_blog #footer #footer-bottom-blog   {padding:'.$blog_footer_bottom_padding_left.'}}';
         }
         
        if ($blog_footer_bottom_padding_right = Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_PADDING_RIGHT')){
        
            $css .= '@media (max-width: 767px) {.is_blog #footer #footer-bottom-blog   {padding:'.$blog_footer_bottom_padding_right.'}}';
         }
         
        if ($blog_default_column_max_width = Configuration::get($this->_prefix_st.'BLOG_DEFAULT_COLUMN_MAX_WIDTH')){
        
            $css .= '#module-stblog-default #wrapper #columns.container  {max-width:'.$blog_default_column_max_width.'px;}';
         }
         
        if ($blog_category_column_max_width = Configuration::get($this->_prefix_st.'BLOG_CATEGORY_COLUMN_MAX_WIDTH')){
        
            $css .= '#module-stblog-category #wrapper #columns.container, #module-stblogarchives-default #wrapper #columns.container, #module-stblogsearch-default #wrapper #columns.container, #module-stblog-category .breadcrumb_wrapper .container, #module-stblogarchives-default .breadcrumb_wrapper .container, #module-stblogsearch-default .breadcrumb_wrapper .container   {max-width:'.$blog_category_column_max_width.'px;}';
         }
         
        if ($blog_article_column_max_width = Configuration::get($this->_prefix_st.'BLOG_ARTICLE_COLUMN_MAX_WIDTH')){
        
            $css .= '#module-stblog-article #wrapper #columns.container, #module-stblog-article .breadcrumb_wrapper .container  {max-width:'.$blog_article_column_max_width.'px;}';
         }
         
         
        if ($blog_default_bg_center = Configuration::get($this->_prefix_st.'BLOG_DEFAULT_BG_CENTER')){
        
            $css .= '#module-stblog-default #wrapper.columns-container  {background-color:'.$blog_default_bg_center.';}';
         }
         
        if ($blog_default_column_padding = Configuration::get($this->_prefix_st.'BLOG_DEFAULT_COLUMN_PADDING')){
         	$css  .= '@media (min-width: 768px) {#module-stblog-default #wrapper.columns-container  {padding: '.$blog_default_column_padding.';}}';        
           }
           
        if ($blog_default_column_padding_mob = Configuration::get($this->_prefix_st.'BLOG_DEFAULT_COLUMN_PADDING_MOB')){
         	$css  .= '@media (max-width: 767px) {#module-stblog-default #wrapper.columns-container  {padding: '.$blog_default_column_padding_mob.';}}';        
           }
         
        if ($blog_category_bg_center = Configuration::get($this->_prefix_st.'BLOG_CATEGORY_BG_CENTER')){
        
            $css .= '#module-stblog-category #wrapper.columns-container, #module-stblogarchives-default #wrapper.columns-container, #module-stblogsearch-default #wrapper.columns-container   {background-color:'.$blog_category_bg_center.';}';
         }
         
        if ($blog_category_column_padding = Configuration::get($this->_prefix_st.'BLOG_CATEGORY_COLUMN_PADDING')){
         	$css  .= '@media (min-width: 768px) {#module-stblog-category #wrapper.columns-container, #module-stblogarchives-default #wrapper.columns-container, #module-stblogsearch-default #wrapper.columns-container {padding: '.$blog_category_column_padding.';}}';        
           }
           
        if ($blog_category_column_padding_mob = Configuration::get($this->_prefix_st.'BLOG_CATEGORY_COLUMN_PADDING_MOB')){
         	$css  .= '@media (max-width: 767px) {#module-stblog-category #wrapper.columns-container, #module-stblogarchives-default #wrapper.columns-container, #module-stblogsearch-default #wrapper.columns-container {padding: '.$blog_category_column_padding_mob.';}}';        
           }
         
        if ($blog_article_bg_center = Configuration::get($this->_prefix_st.'BLOG_ARTICLE_BG_CENTER')){
        
            $css .= '#module-stblog-article #wrapper.columns-container {background-color:'.$blog_article_bg_center.';}';
         }
         
         if ($blog_article_column_padding = Configuration::get($this->_prefix_st.'BLOG_ARTICLE_COLUMN_PADDING')){
         	$css  .= '@media (min-width: 768px) {#module-stblog-article #wrapper.columns-container {padding: '.$blog_article_column_padding.';}}';        
           }
           
         if ($blog_article_column_padding_mob = Configuration::get($this->_prefix_st.'BLOG_ARTICLE_COLUMN_PADDING_MOB')){
         	$css  .= '@media (max-width: 767px) {#module-stblog-article #wrapper.columns-container {padding: '.$blog_article_column_padding_mob.';}}';        
           }
         
         
         
          $home_blog_pro_shadow_color = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_COLOR');
            $home_blog_pro_h_shadow = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_H_SHADOW');
            $home_blog_pro_v_shadow = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_V_SHADOW');
            $home_blog_pro_shadow_blur = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_BLUR');
            $home_blog_pro_shadow_opacity = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_OPACITY');
            $home_blog_pro_shadow_color = self::hex2rgb($home_blog_pro_shadow_color);
            $home_blog_pro_shadow_element = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT');
            
        if ($home_blog_pro_shadow_element = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT') == 0) {  
        if ($home_blog_pro_shadow_effect = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_EFFECT') == 2){
            $css .= '.cat_blog_art .block_blog {-webkit-box-shadow: '.$home_blog_pro_h_shadow.'px '.$home_blog_pro_v_shadow.'px '.$home_blog_pro_shadow_blur.'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$home_blog_pro_shadow_opacity.')}';     
         }
         
         if ($home_blog_pro_shadow_effect = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_EFFECT') == 1){
            $css .= '.cat_blog_art:hover .block_blog {-webkit-box-shadow: '.$home_blog_pro_h_shadow.'px '.$home_blog_pro_v_shadow.'px '.$home_blog_pro_shadow_blur.'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$home_blog_pro_shadow_opacity.')}';     
         }
        }
        
        if ($home_blog_pro_shadow_element = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT') == 1) {  
        if ($home_blog_pro_shadow_effect = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_EFFECT') == 2){
            $css .= '.cat_blog_art .block_blog .pro_second_box {-webkit-box-shadow: '.$home_blog_pro_h_shadow.'px '.$home_blog_pro_v_shadow.'px '.$home_blog_pro_shadow_blur.'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$home_blog_pro_shadow_opacity.')}';     
         }
         
         if ($home_blog_pro_shadow_effect = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_EFFECT') == 1){
            $css .= '.cat_blog_art:hover .block_blog .pro_second_box {-webkit-box-shadow: '.$home_blog_pro_h_shadow.'px '.$home_blog_pro_v_shadow.'px '.$home_blog_pro_shadow_blur.'px rgba('.$home_blog_pro_shadow_color[0].','.$home_blog_pro_shadow_color[1].','.$home_blog_pro_shadow_color[2].','.$home_blog_pro_shadow_opacity.')}';     
         }
        }
         
         if ($category_box_spaces = Configuration::get($this->_prefix_st.'CATEGORY_BOX_SPACES')/2){
            $css .= '.product_list.grid .product_list_item.cat_blog_art {padding-left: '.$category_box_spaces.'px; padding-right: '.$category_box_spaces.'px;}';     
            $css .= '.category_list.st_posts.product_list.row  {margin-left: -'.$category_box_spaces.'px; margin-right: -'.$category_box_spaces.'px;}';     
       
         }
         
        if ($category_box_padding = Configuration::get($this->_prefix_st.'CATEGORY_BOX_PADDING')){
            $css .= '.product_list.grid .product_list_item.cat_blog_art {padding-bottom: '.$category_box_padding.'px; padding-top: 0px;}';
        } else {
            $css .= '.product_list.grid .product_list_item.cat_blog_art {padding-bottom: 0px; padding-top: 0px;}';    
          }
         
          if ($home_blog_pro_shadow_element = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT') == 0) { 
         $home_blog_border_width = Configuration::get($this->_prefix_st.'HOME_BLOG_BORDER_WIDTH');
        if ($home_blog_border_color = Configuration::get($this->_prefix_st.'HOME_BLOG_BORDER_COLOR')){
            $css .= '.cat_blog_art .block_blog {border-width: '.$home_blog_border_width.'; border-style: solid; border-color: '.$home_blog_border_color.';}';     
         }
          }
          
        if ($home_blog_pro_shadow_element = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT') == 1) { 
         $home_blog_border_width = Configuration::get($this->_prefix_st.'HOME_BLOG_BORDER_WIDTH');
        if ($home_blog_border_color = Configuration::get($this->_prefix_st.'HOME_BLOG_BORDER_COLOR')){
            $css .= '.cat_blog_art .block_blog .pro_second_box {border-width: '.$home_blog_border_width.'; border-style: solid; border-color: '.$home_blog_border_color.';}';     
         }
          }
          
        $home_blog_pro_shadow_element_margin = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT_MARGIN');
        if ($home_blog_pro_shadow_element_mwidth = Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT_MWIDTH')){
            $css .= '.cat_blog_art .block_blog .pro_second_box {max-width: '.$home_blog_pro_shadow_element_mwidth.'%; z-index: 2; margin:'.$home_blog_pro_shadow_element_margin.';}';     
         }
          
         
         if ($home_blog_hov_border_title = Configuration::get($this->_prefix_st.'HOME_BLOG_HOV_BORDER_TITLE')){
         	$css .= '.cat_blog_art .block_blog .s_title_block a  {margin-bottom: 4px; display: inline-block;}';
         	$css .= '.cat_blog_art .block_blog .s_title_block span {margin-bottom: 4px; display: inline-block;}';
         }
         
        if ($home_blog_color_title = Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_TITLE')){
        	$css .= '.cat_blog_art .block_blog .s_title_block a  {color: '.$home_blog_color_title.'}';
        	$css .= '.cat_blog_art .block_blog .s_title_block  span {color: '.$home_blog_color_title.'}';
         }	
        if ($home_blog_color_hov_title = Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_HOV_TITLE')){
        	$css .= '.cat_blog_art .block_blog:hover .s_title_block a  {color: '.$home_blog_color_hov_title.'}';
        	$css .= '.cat_blog_art .block_blog:hover .s_title_block span {color: '.$home_blog_color_hov_title.'}';
         }	
         if ($home_blog_color_fonts_title = Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTS_TITLE')){   
         	$css .= '.cat_blog_art .block_blog .s_title_block a {font-size: '.$home_blog_color_fonts_title.'px;}';
         	$css .= '.cat_blog_art .block_blog .s_title_block span {font-size: '.$home_blog_color_fonts_title.'px;}';
         }
         if ($home_blog_color_fontsl_title = Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSL_TITLE')){
         	$css .= '.cat_blog_art .block_blog .s_title_block a  {line-height: '.$home_blog_color_fontsl_title.'px;}';
         	$css .= '.cat_blog_art .block_blog .s_title_block span {line-height: '.$home_blog_color_fontsl_title.'px;}';      	
         }
         
         if ($home_blog_color_fontsmt_title = Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMT_TITLE')){
              $css .= '@media (min-width: 768px) {.cat_blog_art .block_blog .s_title_block  {margin: '.$home_blog_color_fontsmt_title.';}}';
             }
          
         if ($home_blog_color_fontsmb_title = Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMB_TITLE')){
              $css .= '@media (max-width: 767px) {.cat_blog_art .block_blog .s_title_block  {margin: '.$home_blog_color_fontsmb_title.';}}';
             }
             
          if ($home_blog_color_desc = Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_DESC')){
                 	$css .= '.cat_blog_art .block_blog .blok_blog_short_content  {color: '.$home_blog_color_desc.';}';
                }
          if ($home_blog_fonts_desc = Configuration::get($this->_prefix_st.'HOME_BLOG_FONTS_DESC')){
                 	$css  .= '.cat_blog_art .block_blog  .blok_blog_short_content  {font-size: '.$home_blog_fonts_desc.'px;}';
                }
          if ($home_blog_fontlh_desc = Configuration::get($this->_prefix_st.'HOME_BLOG_FONTLH_DESC')){
                 	$css  .= '.cat_blog_art .block_blog .blok_blog_short_content  {line-height: '.$home_blog_fontlh_desc.'px;}';
                }
          if ($home_blog_fontmt_desc = Configuration::get($this->_prefix_st.'HOME_BLOG_FONTMT_DESC')){
                 	$css  .= '@media (min-width: 768px) {.cat_blog_art .block_blog  .blok_blog_short_content  {margin: '.$home_blog_fontmt_desc.';}}';
                }
         if ($home_blog_fontmb_desc = Configuration::get($this->_prefix_st.'HOME_BLOG_FONTMB_DESC')){
                 	$css  .= '@media (max-width: 767px) {.cat_blog_art .block_blog  .blok_blog_short_content  {margin: '.$home_blog_fontmb_desc.';}}';
                }
                
         if ($home_blog_color_blog_info = Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_BLOG_INFO')){
                $css  .= '.cat_blog_art .block_blog .blog_info span {color: '.$home_blog_color_blog_info.'}';
            	$css  .= '.cat_blog_art .block_blog .blog_info a {color: '.$home_blog_color_blog_info.'}';
              }	
              
         if ($home_blog_size_blog_info = Configuration::get($this->_prefix_st.'HOME_BLOG_SIZE_BLOG_INFO')){
            	$css .= '.cat_blog_art .blog_info span {font-size: '.$home_blog_size_blog_info.'px}';
            	$css .= '.cat_blog_art .blog_info a {font-size: '.$home_blog_size_blog_info.'px}';
              }	 
              
         if ($home_blog_margint_blog_info = Configuration::get($this->_prefix_st.'HOME_BLOG_MARGINT_BLOG_INFO')){
             $css .= '@media (min-width: 768px) {.cat_blog_art .block_blog .blog_info {margin: '.$home_blog_margint_blog_info.';}}';
              }  
               
         if ($home_blog_marginb_blog_info = Configuration::get($this->_prefix_st.'HOME_BLOG_MARGINB_BLOG_INFO')){
             $css .= '@media (max-width: 767px) {.cat_blog_art .block_blog .blog_info {margin: '.$home_blog_marginb_blog_info.';}}';
              }	
              
         if ($home_blog_grid_bg = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG')){    
             $css .= '.cat_blog_art .block_blog {background-color:'.$home_blog_grid_bg.';}'; 
              }
              
         if ($home_blog_grid_bg_img = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_IMG')){     
             $css .= '.cat_blog_art .block_blog .pro_outer_box .pro_first_box {background-color:'.$home_blog_grid_bg_img.';}';    
             } 

         if ($home_blog_grid_bg_text = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_TEXT')){  
             $css .= '.cat_blog_art .block_blog .pro_outer_box .pro_second_box{background-color:'.$home_blog_grid_bg_text.';}';
             }
             
         if ($home_blog_grid_bg_text_hover = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_TEXT_HOVER')){  
             $css .= '.cat_blog_art .block_blog .pro_outer_box:hover .pro_second_box{background-color:'.$home_blog_grid_bg_text_hover.';}';
             }
             
             
         if ($items_img_padding = Configuration::get($this->_prefix_st.'ITEMS_IMG_PADDING')) {
             $css .= '@media (min-width: 768px) {.cat_blog_art .block_blog  .pro_first_box {padding:'.$items_img_padding.';}}'; 
             }  
             
         if  ($items_img_padding_h = Configuration::get($this->_prefix_st.'ITEMS_IMG_PADDING_H')) {
             $css .= '@media (max-width: 767px) {.cat_blog_art .block_blog  .pro_first_box {padding:'.$items_img_padding_h.';}}'; 
             }   

          if  ($items_text_padding = Configuration::get($this->_prefix_st.'ITEMS_TEXT_PADDING')) {
             $css .= '@media (min-width: 768px) {.cat_blog_art .block_blog  .pro_second_box {padding:'.$items_text_padding.';}}'; 
             }  
             
         if  ($items_text_padding_h = Configuration::get($this->_prefix_st.'ITEMS_TEXT_PADDING_H')) {
             $css .= '@media (max-width: 767px) {.cat_blog_art .block_blog  .pro_second_box {padding:'.$items_text_padding_h.';}}'; 
             }  
             
             $photo_on_hover_size = Configuration::get($this->_prefix_st.'PHOTO_ON_HOVER_SIZE');
        if  ($photo_on_hover = Configuration::get($this->_prefix_st.'PHOTO_ON_HOVER')) {
            $css .= '.cat_blog_art .block_blog .blog_image img  {vertical-align: bottom;  -webkit-transition: all 0.3s ease-in-out;  transition: all 0.3s ease-in-out;}';
            $css .= '.cat_blog_art:hover .block_blog .blog_image img  {-webkit-transform: scale('.$photo_on_hover_size.'); -ms-transform: scale('.$photo_on_hover_size.'); transform: scale('.$photo_on_hover_size.');}';
             }
        
              $text_image_bg_opacity_all = Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_OPACITY_ALL');
              $text_image_bg_opacity_all_hov = Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_OPACITY_ALL_HOV');
              $photo_on_hover_size = Configuration::get($this->_prefix_st.'PHOTO_ON_HOVER_SIZE');
        if  ($text_image_bg_all = Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_ALL')) {
                 $text_image_bg_all = self::hex2rgb($text_image_bg_all);
                 $css  .= '.cat_blog_art .pro_second_box_img  {background-color: rgba('.$text_image_bg_all[0].','.$text_image_bg_all[1].','.$text_image_bg_all[2].','.$text_image_bg_opacity_all.');}';
                 $css  .= '.cat_blog_art:hover  .pro_second_box_img  {background-color: rgba('.$text_image_bg_all[0].','.$text_image_bg_all[1].','.$text_image_bg_all[2].','.$text_image_bg_opacity_all_hov.');}';
                }
                
        if  ($text_image_max_width = Configuration::get($this->_prefix_st.'TEXT_IMAGE_MAX_WIDTH')) {  
                $css .= '.cat_blog_art .pro_second_absolute .pro_second_box_img .bottom_zone {max-width:'.$text_image_max_width.'%;}';
                }
                
              $text_image_bg_opacity = Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_OPACITY');
        if  ($text_image_bg = Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG')) { 
                 $text_image_bg = self::hex2rgb($text_image_bg);
                 $css .= '.cat_blog_art .pro_second_box_img .bottom_zone {background-color: rgba('.$text_image_bg[0].','.$text_image_bg[1].','.$text_image_bg[2].','.$text_image_bg_opacity.');}';
              }
       
             $text_image_hover_shift = Configuration::get($this->_prefix_st.'TEXT_IMAGE_HOVER_SHIFT');
        if  ($text_image_hovertb = Configuration::get($this->_prefix_st.'TEXT_IMAGE_HOVERTB')) { 
                    $css .= ' .cat_blog_art .pro_second_box_img .bottom_zone  {-webkit-transition: all 350ms ease; transition: all 350ms ease;}';
                    $css .= ' .cat_blog_art.product_list_item:hover .pro_second_box_img .bottom_zone  {-webkit-transform: translate3d(0, '.$text_image_hover_shift.'px, 0); transform: translate3d(0, '.$text_image_hover_shift.'px, 0);-webkit-transition: all 350ms ease; transition: all 350ms ease;}';
                 }
                
        if ($text_alignment_hor = Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_HOR') == 1) {         
                $css .= '.cat_blog_art .pro_second_absolute .pro_second_box_img {align-items: flex-start;}';         
                }
                
        if ($text_alignment_hor = Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_HOR') == 2) {  
                $css .= '.cat_blog_art .pro_second_absolute .pro_second_box_img  {align-items: center;}';         
                }
                
        if ($text_alignment_hor = Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_HOR') == 3) {  
                $css .= '.cat_blog_art .pro_second_absolute .pro_second_box_img {align-items: flex-end;}';         
                }

        if ($text_alignment_ver = Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_VER') == 1) {  
                $css .= '.cat_blog_art .pro_second_absolute .pro_second_box_img  {justify-content: start;}';         
                }
                
        if ($text_alignment_ver = Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_VER') == 2) {  
                $css .= '.cat_blog_art .pro_second_absolute .pro_second_box_img  {justify-content: center;}';         
                }
                
         if ($text_alignment_ver = Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_VER') == 3) {  
                $css .= '.cat_blog_art .pro_second_absolute .pro_second_box_img  {justify-content: end;}';         
                }       
                
                
         if  ($text_image_bg_padding = Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_PADDING')) { 
            	$css .= '@media (min-width: 768px) {.cat_blog_art .pro_second_box_img .bottom_zone {padding:'.$text_image_bg_padding.';}}';           
                }
                
         if  ($text_alignment_margin_external_m = Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_MARGIN_EXTERNAL_M')) { 
                $css .= '@media (max-width: 767px) {.cat_blog_art .pro_second_box_img .bottom_zone {margin:'.$text_alignment_margin_external_m.';}}';
            	}
            	
         if  ($text_alignment_margin_external= Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_MARGIN_EXTERNAL')) {       
            	$css .= '@media (min-width: 768px) {.cat_blog_art .pro_second_box_img .bottom_zone {margin:'.$text_alignment_margin_external.';}}';           
                }
                
         if  ($text_image_bg_padding_lr = Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_PADDING_LR')) { 
            	$css .= '@media (max-width: 767px) {.cat_blog_art .pro_second_box_img .bottom_zone {padding:'.$text_image_bg_padding_lr.';}}';
            	}
         
          if  ($newsletter_betwen_height_el = Configuration::get($this->_prefix_st.'NEWSLETTER_BETWEN_HEIGHT_EL')) {  
                 	$css .= '.cat_blog_art.product_list_item.big {height: '.$newsletter_betwen_height_el.'px;}';
                 	$css .= '.cat_blog_art.product_list_item.half {height: '.ceil($newsletter_betwen_height_el/2).'px;}';
                 
                 }
        
             
            $css .= $custom_css;

            if($css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $css));
        }
        $vars = array(
            'length_of_name' => Configuration::get($this->_prefix_st.'LENGTH_OF_NAME'),
            'length_of_name_value' => Configuration::get($this->_prefix_st.'LENGTH_OF_NAME_VALUE'),
            'length_desc_article' => Configuration::get($this->_prefix_st.'LENGTH_DESC_ARTICLE'),
            'display_image' => Configuration::get($this->_prefix_st.'DISPLAY_IMAGE'),
      	    'display_viewcount' => Configuration::get($this->_prefix_st.'DISPLAY_VIEWCOUNT'),
            'display_comment_count' => Configuration::get($this->_prefix_st.'DISPLAY_COMMENT_COUNT'),
      	    'display_author' => Configuration::get($this->_prefix_st.'DISPLAY_AUTHOR'),
      	    'display_date_pos' => Configuration::get($this->_prefix_st.'DISPLAY_DATE_POS'),
       	    'display_date_icon' => Configuration::get($this->_prefix_st.'DISPLAY_DATE_ICON'),
      	    'display_loved' => Configuration::get($this->_prefix_st.'DISPLAY_LOVED'),
       	    'display_read_more' => Configuration::get($this->_prefix_st.'DISPLAY_READ_MORE'),
            'img_text' => Configuration::get($this->_prefix_st.'IMG_TEXT'),
            'items_img' => Configuration::get($this->_prefix_st.'ITEMS_IMG'),
            'home_blog_pro_shadow_effect' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_EFFECT'),
      	    'home_blog_pro_h_shadow' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_H_SHADOW'),
      	    'home_blog_pro_v_shadow' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_V_SHADOW'),
      	    'home_blog_pro_shadow_blur' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_BLUR'),
     	    'home_blog_pro_shadow_color' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_COLOR'),
    	    'home_blog_pro_shadow_opacity' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_COLOR_OPACITY'),
    	    'home_blog_border_color' => Configuration::get($this->_prefix_st.'HOME_BLOG_BORDER_COLOR'),
   	        'home_blog_border_width' => Configuration::get($this->_prefix_st.'HOME_BLOG_BORDER_WIDTH'),
            'category_box_spaces' => Configuration::get($this->_prefix_st.'CATEGORY_BOX_SPACES'),
            'text_alignment_in_box' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_IN_BOX'),
        	'home_blog_color_title' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_IN_BOX'),
        	'home_blog_color_hov_title' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_IN_BOX'),
        	'home_blog_color_fonts_title' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_IN_BOX'),
        	'home_blog_color_fontsl_title' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_IN_BOX'),
            'home_blog_hov_border_title' => Configuration::get($this->_prefix_st.'HOME_BLOG_HOV_BORDER_TITLE'),
            'home_blog_color_fontsmt_title' => Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMT_TITLE'),
            'home_blog_color_fontsmb_title' => Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMB_TITLE'),
            'home_blog_color_desc' => Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMB_TITLE'),
       		'home_blog_fonts_desc' => Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMB_TITLE'),
       	    'home_blog_fontlh_desc' => Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMB_TITLE'),
            'home_blog_fontmt_desc' => Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMB_TITLE'),
            'home_blog_fontmb_desc' => Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_FONTSMB_TITLE'),
            'home_blog_color_blog_info' => Configuration::get($this->_prefix_st.'HOME_BLOG_COLOR_BLOG_INFO'),
            'home_blog_size_blog_info' => Configuration::get($this->_prefix_st.'HOME_BLOG_SIZE_BLOG_INFO'),
      		'home_blog_margint_blog_info' => Configuration::get($this->_prefix_st.'HOME_BLOG_MARGINT_BLOG_INFO'),
     	    'home_blog_marginb_blog_info' => Configuration::get($this->_prefix_st.'HOME_BLOG_MARGINB_BLOG_INFO'),
    	    'home_blog_grid_bg' => Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG'),
   		    'home_blog_grid_bg_img' => Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_IMG'),
            'home_blog_grid_bg_text' => Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_TEXT'),
            'home_blog_grid_bg_text_hover' => Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_TEXT_HOVER'),
            'items_img_padding' => Configuration::get($this->_prefix_st.'ITEMS_IMG_PADDING'),
            'items_img_padding_h' => Configuration::get($this->_prefix_st.'ITEMS_IMG_PADDING_H'),
            'items_text_padding' => Configuration::get($this->_prefix_st.'ITEMS_TEXT_PADDING'),
            'items_text_padding_h' => Configuration::get($this->_prefix_st.'ITEMS_TEXT_PADDING_H'),
            'photo_on_hover' => Configuration::get($this->_prefix_st.'PHOTO_ON_HOVER'),
            'photo_on_hover_size' => Configuration::get($this->_prefix_st.'PHOTO_ON_HOVER_SIZE'),
            'text_image_bg_all' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_ALL'),
            'text_image_bg_opacity_all' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_OPACITY_ALL'),
            'text_image_bg_opacity_all_hov' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_OPACITY_ALL_HOV'),
            'category_box_padding' => Configuration::get($this->_prefix_st.'CATEGORY_BOX_PADDING'),
            'home_blog_pro_shadow_element' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT'),
            'home_blog_pro_shadow_element_mwidth' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT_MWIDTH'),
            'home_blog_pro_shadow_element_margin' => Configuration::get($this->_prefix_st.'HOME_BLOG_PRO_SHADOW_ELEMENT_MARGIN'),
            'display_text_on_image' => Configuration::get($this->_prefix_st.'DISPLAY_TEXT_ON_IMAGE'),
            'text_image_max_width' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_MAX_WIDTH'),
            'text_image_bg' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG'),
            'text_image_bg_opacity' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_OPACITY'),
       		'text_image_hovertb' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_HOVERTB'),
            'text_image_hover_shift' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_HOVER_SHIFT'),
            'text_alignment_hor' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_HOR'),
            'text_alignment_ver' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_VER'),
            'text_image_max_alignment' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_MAX_ALIGNMENT'),
            'text_image_bg_padding' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_PADDING'),
            'text_image_bg_padding_lr' => Configuration::get($this->_prefix_st.'TEXT_IMAGE_BG_PADDING_LR'),
            'text_alignment_margin_external' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_MARGIN_EXTERNAL'),
            'text_alignment_margin_external_m' => Configuration::get($this->_prefix_st.'TEXT_ALIGNMENT_MARGIN_EXTERNAL_M'),
            'newsletter_betwen_height_el' => Configuration::get($this->_prefix_st.'NEWSLETTER_BETWEN_HEIGHT_EL'),
        
       

            'related_display_price' => Configuration::get('ST_BLOG_RELATED_DISPLAY_PRICE'),
            'display_viewcount' => Configuration::get($this->_prefix_st.'DISPLAY_VIEWCOUNT'),
            'display_comment_count' => Configuration::get($this->_prefix_st.'DISPLAY_COMMENT_COUNT'),
            'display_author' => Configuration::get($this->_prefix_st.'DISPLAY_AUTHOR'),
            'display_date' => Configuration::get($this->_prefix_st.'DISPLAY_DATE'),
            'display_read_more' => Configuration::get($this->_prefix_st.'DISPLAY_READ_MORE'),
            'display_sd' => Configuration::get($this->_prefix_st.'DISPLAY_SD'),
            'length_desc_article' => Configuration::get($this->_prefix_st.'LENGTH_DESC_ARTICLE'),
            'blog_block_align' => Configuration::get($this->_prefix_st.'BLOG_BLOCK_ALIGN'),
            'heading_style' => Configuration::get($this->_prefix_st.'HEADING_STYLE'),
            'display_short_content' => Configuration::get($this->_prefix_st.'DISPLAY_SHORT_CONTENT'),
            'def_article_blog_autor' => Configuration::get($this->_prefix_st.'DEF_ARTICLE_BLOG_AUTOR'),
            'def_article_blog_date' => Configuration::get($this->_prefix_st.'DEF_ARTICLE_BLOG_DATE'),
            'def_article_blog_date_icon' => Configuration::get($this->_prefix_st.'DEF_ARTICLE_BLOG_DATE_ICON'),
            'def_article_blog_view' => Configuration::get($this->_prefix_st.'DEF_ARTICLE_BLOG_VIEW'),
            'def_article_blog_loved' => Configuration::get($this->_prefix_st.'DEF_ARTICLE_BLOG_LOVED'),
            'def_article_blog_category' => Configuration::get($this->_prefix_st.'DEF_ARTICLE_BLOG_CATEGORY'),
            'def_article_blog_top' => Configuration::get($this->_prefix_st.'DEF_ARTICLE_BLOG_TOP'),
            'blog_header' => Configuration::get($this->_prefix_st.'BLOG_HEADER'),
            'blog_footer' => Configuration::get($this->_prefix_st.'BLOG_FOOTER'),
            'blog_width_header' => Configuration::get($this->_prefix_st.'BLOG_WIDTH_HEADER'),
            'blog_topbar_show' => Configuration::get($this->_prefix_st.'BLOG_TOPBAR_SHOW'),
            'blog_width_topbar' => Configuration::get($this->_prefix_st.'BLOG_WIDTH_TOPBAR'),
            'blog_header_logo' => Configuration::get($this->_prefix_st.'BLOG_HEADER_LOGO'),
            'blog_header_left_alignment' => Configuration::get($this->_prefix_st.'BLOG_HEADER_LEFT_ALIGNMENT'),
            'blog_header_center_alignment' => Configuration::get($this->_prefix_st.'BLOG_HEADER_CENTER_ALIGNMENT'),
            'blog_header_right_alignment' => Configuration::get($this->_prefix_st.'BLOG_HEADER_RIGHT_ALIGNMENT'),
            'blog_header_right_bottom_alignment' => Configuration::get($this->_prefix_st.'BLOG_HEADER_RIGHT_BOTTOM_ALIGNMENT'),
            'blog_sticky_primary_header' => Configuration::get($this->_prefix_st.'BLOG_STICKY_PRIMARY_HEADER'),
            'blog_sticky_primary_topbar' => Configuration::get($this->_prefix_st.'BLOG_STICKY_PRIMARY_TOPBAR'),
            'blog_topbar_text_color' => Configuration::get($this->_prefix_st.'BLOG_TOPBAR_TEXT_COLOR'),
            'blog_topbar_link_hover_color' => Configuration::get($this->_prefix_st.'BLOG_TOPBAR_LINK_HOVER_COLOR'),
            'blog_topbar_header_link_hover_bg' => Configuration::get($this->_prefix_st.'BLOG_TOPBAR_HEADER_LINK_HOVER_BG'),
            'blog_topbar_height' => Configuration::get($this->_prefix_st.'BLOG_TOPBAR_HEIGHT'),
            'blog_header_topbar_bg' => Configuration::get($this->_prefix_st.'BLOG_HEADER_TOPBAR_BG'),
            'blog_topbar_b_border' => Configuration::get($this->_prefix_st.'BLOG_TOPBAR_B_BORDER'),
            'blog_header_style' => Configuration::get($this->_prefix_st.'BLOG_HEADER_STYLE'),
            'blog_topbar_b_border_color' => Configuration::get($this->_prefix_st.'BLOG_TOPBAR_B_BORDER_COLOR'),
            'blog_header_bg_color' => Configuration::get($this->_prefix_st.'BLOG_HEADER_BG_COLOR'),
            'blog_header_con_bg_color' => Configuration::get($this->_prefix_st.'BLOG_HEADER_CON_BG_COLOR'),
            'blog_header_bottom_border' => Configuration::get($this->_prefix_st.'BLOG_HEADER_BOTTOM_BORDER'),
            'blog_header_bottom_border_color' => Configuration::get($this->_prefix_st.'BLOG_HEADER_BOTTOM_BORDER_COLOR'),
            'blog_logo_height' => Configuration::get($this->_prefix_st.'BLOG_LOGO_HEIGHT'),
            'blog_header_text_trans' => Configuration::get($this->_prefix_st.'BLOG_HEADER_TEXT_TRANS'),
            'blog_header_text_color' => Configuration::get($this->_prefix_st.'BLOG_HEADER_TEXT_COLOR'),
            'blog_header_link_hover_color' => Configuration::get($this->_prefix_st.'BLOG_HEADER_LINK_HOVER_COLOR'),
            'blog_logo_image_field'    => Configuration::get($this->_prefix_st.'BLOG_LOGO_IMAGE_FIELD'),
            'deafult_blog_column'    => Configuration::get($this->_prefix_st.'DEAFULT_BLOG_COLUMN'),
            'category_blog_column'    => Configuration::get($this->_prefix_st.'CATEGORY_BLOG_COLUMN'),
            'article_blog_column'    => Configuration::get($this->_prefix_st.'ARTICLE_BLOG_COLUMN'),
            'blog_responsive_max'    => Configuration::get($this->_prefix_st.'BLOG_RESPONSIVE_MAX'), 
            'blog_width_footer_stacked' => Configuration::get($this->_prefix_st.'BLOG_WIDTH_FOOTER_STACKED'),
            'blog_footer_stacked_one' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_ONE'),
            'blog_footer_stacked_two' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_TWO'),
            'blog_footer_stacked_three' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_THREE'),
            'blog_footer_stacked_four' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_FOUR'),
            'blog_footer_stacked_five' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_FIVE'),
            'blog_footer_stacked_six' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_SIX'),
            'blog_footer_show' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_SHOW'),
            'blog_footer_after' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_AFTER'),
            'blog_footer_top_width' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_WIDTH'),
            'blog_footer_middle_width' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_WIDTH'),
            'blog_footer_bottom_width' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_WIDTH'),
            'blog_footer_stacked_width' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_WIDTH'),
            'blog_footer_stacked_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_COLOR'),
            'blog_footer_stacked_zone' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_ZONE'),
            'blog_footer_top_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_COLOR'),
            'blog_footer_stacked_color_con' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_COLOR_CON'),
            'blog_footer_stacked_text_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_TEXT_COLOR'),
            'blog_footer_stacked_link_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_LINK_COLOR'),
            'blog_footer_stacked_hover_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_HOVER_COLOR'),
            'blog_footer_top_color_con' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_COLOR_CON'),
            'blog_footer_top_text_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_TEXT_COLOR'),
            'blog_footer_top_link_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_LINK_COLOR'),
            'blog_footer_top_hover_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_HOVER_COLOR'),
            'blog_footer_middle_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_COLOR'),
            'blog_footer_middle_color_con' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_COLOR_CON'),
            'blog_footer_middle_text_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_TEXT_COLOR'),
            'blog_footer_middle_link_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_LINK_COLOR'),
            'blog_footer_middle_hover_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_HOVER_COLOR'),
            'blog_footer_bottom_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_COLOR'),
            'blog_footer_bottom_color_con' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_COLOR_CON'),
            'blog_footer_bottom_text_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_TEXT_COLOR'),
            'blog_footer_bottom_link_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_LINK_COLOR'),
            'blog_footer_bottom_hover_color' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_HOVER_COLOR'),
            'blog_footer_stacked_width_max' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_WIDTH_MAX'),
            'blog_footer_top_width_max' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_WIDTH_MAX'),
            'blog_footer_middle_width_max' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_WIDTH_MAX'),
            'blog_footer_bottom_width_max' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_WIDTH_MAX'),
            'blog_footer_stacked_padding_top' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_PADDING_TOP'),
            'blog_footer_stacked_padding_bottom' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_PADDING_BOTTOM'),
            'blog_footer_stacked_padding_left' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_PADDING_LEFT'),
            'blog_footer_stacked_padding_right' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_STACKED_PADDING_RIGHT'), 
            'blog_footer_top_padding_top' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_PADDING_TOP'),
            'blog_footer_top_padding_bottom' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_PADDING_BOTTOM'),
            'blog_footer_top_padding_left' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_PADDING_LEFT'),
            'blog_footer_top_padding_right' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_TOP_PADDING_RIGHT'),
            'blog_footer_middle_padding_top' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_PADDING_TOP'),
            'blog_footer_middle_padding_bottom' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_PADDING_BOTTOM'),
            'blog_footer_middle_padding_left' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_PADDING_LEFT'),
            'blog_footer_middle_padding_right' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_MIDDLE_PADDING_RIGHT'),
            'blog_footer_bottom_padding_top' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_PADDING_TOP'),
            'blog_footer_bottom_padding_bottom' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_PADDING_BOTTOM'),
            'blog_footer_bottom_padding_left' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_PADDING_LEFT'),
            'blog_footer_bottom_padding_right' => Configuration::get($this->_prefix_st.'BLOG_FOOTER_BOTTOM_PADDING_RIGHT'),
            'blog_image_type' => Configuration::get($this->_prefix_st.'BLOG_IMAGE_TYPE'),
            'blog_default_column_max_width' => Configuration::get($this->_prefix_st.'BLOG_DEFAULT_COLUMN_MAX_WIDTH'),
            'blog_category_column_max_width' => Configuration::get($this->_prefix_st.'BLOG_CATEGORY_COLUMN_MAX_WIDTH'),
            'blog_article_column_max_width' => Configuration::get($this->_prefix_st.'BLOG_ARTICLE_COLUMN_MAX_WIDTH'),
            'blog_default_bg_center' => Configuration::get($this->_prefix_st.'BLOG_DEFAULT_BG_CENTER'),
            'blog_category_bg_center' => Configuration::get($this->_prefix_st.'BLOG_CATEGORY_BG_CENTER'),
            'blog_article_bg_center' => Configuration::get($this->_prefix_st.'BLOG_ARTICLE_BG_CENTER'),
            
        
       
        
            );
        $this->context->smarty->assign('stblog', $vars);
        return $this->fetch($this->templateFile[0], $this->stGetCacheId('header'));
        // return $this->display(__FILE__, 'header.tpl');
    }
    public function fontOptions() {
        $google = array();
        foreach($this->googleFonts as $v)
            $google[] = array('id'=>$v['family'],'name'=>$v['family']);
        return $google;
    }
    public function hookDisplayStBlogArticleFooter($params)
    {
        $id_st_blog = (int)Tools::getValue('id_st_blog');
        if(!$id_st_blog)
            return;
        $blog = new StBlogClass($id_st_blog, $this->context->language->id, $this->context->shop->id);
        $related_products = $blog->getLinkProducts();
            
        $this->smarty->assign(array(
                'products' => $related_products,

                'slider_slideshow' => Configuration::get($this->_prefix_st.'SLIDESHOW'),
                'slider_s_speed' => Configuration::get($this->_prefix_st.'S_SPEED'),
                'slider_a_speed' => Configuration::get($this->_prefix_st.'A_SPEED'),
                'slider_pause_on_hover' => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
                'rewind_nav' => Configuration::get($this->_prefix_st.'REWIND_NAV'),
                'slider_loop' => Configuration::get($this->_prefix_st.'LOOP'),
                'slider_move' => Configuration::get($this->_prefix_st.'MOVE'),
                'hide_mob' => Configuration::get($this->_prefix_st.'HIDE_MOB'),
                'lazy_load'             => Configuration::get($this->_prefix_st.'LAZY'),

                'display_as_grid'       => Configuration::get($this->_prefix_st.'GRID'),
                'title_position'        => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
                'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
                'hide_direction_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
                'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
                'hide_control_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
                'spacing_between'       => Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
                'display_sd'       => Configuration::get($this->_prefix_st.'DISPLAY_SD_REL_PRO'),
                'length_desc_article'       => Configuration::get($this->_prefix_st.'LENGTH_DESC_ARTICLE'),
                
                'has_background_img'    => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
                'speed'                 => Configuration::get($this->_prefix_st.'SPEED'),
                'bg_img_v_offset'       => (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET'),

                'video_mpfour'          => '',
                'video_webm'            => '',
                'video_ogg'             => '',
                'video_loop'            => '',
                'video_muted'           => '',
                'video_poster'          => '',
                'video_v_offset'        => '',

                'view_more'             => false,//related prducts module does not have view more
                'countdown_on' => false,//to do add this option countdown_on is in baseproductsldier 

                'module'            => $this->name,
                'title' => $this->getTranslator()->trans('Related products', array(), 'Shop.Theme.Transformer'),

                //
                'column_slider'         => false,
                'is_blog'         => true,
                'homeverybottom'   => false,
                'hook_hash'        => $this->getHookHash(__FUNCTION__),
                'pro_per_fw'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_FW'),
                'pro_per_xxl'      => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
                'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
                'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
                'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_MD'),
                'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_SM'),
                'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XS'),
                'pro_per_xxs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXS'),
            ));

        return $this->fetch($this->templateFile[1]); 
    }
    
    public function hookDisplayStBlogArticleFooterSocial($params)
    {
        return $this->hookDisplayStBlogArticleFooter($params, __FUNCTION__);        
    }
    

}