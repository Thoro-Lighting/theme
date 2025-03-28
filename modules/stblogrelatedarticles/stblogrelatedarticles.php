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
    
include_once(dirname(__FILE__).'/classes/StBlogRelatedArticlesClass.php');
include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseSlider.php');
class StBlogRelatedArticles extends BaseSlider
{
    public $_prefix_st = 'ST_B_RELATED_';
    public $_prefix_stsn = 'STSN_B_RELATED_';
    protected $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Date add: Desc', 'orderBy'=>'date_add', 'orderWay'=>'DESC'),
        2 => array('id' =>2 , 'name' => 'Date add: Asc', 'orderBy'=>'date_add', 'orderWay'=>'ASC'),
        3 => array('id' =>3 , 'name' => 'Date update: Desc', 'orderBy'=>'date_udp', 'orderWay'=>'DESC'),
        4 => array('id' =>4 , 'name' => 'Date update: Asc', 'orderBy'=>'date_udp', 'orderWay'=>'ASC'),
        5 => array('id' =>5 , 'name' => 'Position: Asc', 'orderBy'=>'position', 'orderWay'=>'DESC'),
        6 => array('id' =>6 , 'name' => 'Position ID: Desc', 'orderBy'=>'position', 'orderWay'=>'ASC'),
        7 => array('id' =>7 , 'name' => 'Blog ID: Asc', 'orderBy'=>'id_st_blog', 'orderWay'=>'DESC'),
        8 => array('id' =>8 , 'name' => 'Blog ID: Desc', 'orderBy'=>'id_st_blog', 'orderWay'=>'ASC'),
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
    
    private $templateFile = array();
	function __construct()
	{
		$this->name           = 'stblogrelatedarticles';
		$this->version        = '1.0';
		$this->author        = '';
        $this->displayName = $this->getTranslator()->trans('Blog Module - Related articles', array(), 'Modules.Stblog.Admin');
		$this->description = $this->getTranslator()->trans('Add related articles on blog artice pages.', array(), 'Modules.Stblog.Admin');
		$this->secure_key = Tools::encrypt($this->name);
		parent::__construct();
        Shop::addTableAssociation('st_blog', array('type' => 'shop'));
        $this->templateFile = array(
            'module:stthemeeditor/views/templates/slider/header.tpl',
            'module:stthemeeditor/views/templates/slider/homepage.tpl',
            'module:stblog/views/templates/slider/footer.tpl',
            );
	}
    protected function initTabNames()
    {
        $this->_tabs = array(
            array('id'  => '0', 'name' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer')),
            array('id'  => '15', 'name' => $this->getTranslator()->trans('Visibility of elements', array(), 'Admin.Theme.Transformer')),
            array('id'  => '1', 'name' => $this->getTranslator()->trans('Slider', array(), 'Admin.Theme.Transformer')),
            array('id'  => '2', 'name' => $this->getTranslator()->trans('Left or right column', array(), 'Admin.Theme.Transformer')),
            array('id'  => '3', 'name' => $this->getTranslator()->trans('Hooks', array(), 'Admin.Theme.Transformer')),
        );
    }
    protected function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
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
        			'id' => 'displayStBlogArticleFooter',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayStBlogArticleFooter', array(), 'Admin.Theme.Transformer')
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
                ),
            )
        );
    }
	function install()
	{
		if (!parent::install()
			|| !$this->installDB()
			|| !$this->registerHook('actionObjectStBlogClassAddAfter')
			|| !$this->registerHook('actionObjectStBlogClassUpdateAfter')
			|| !$this->registerHook('actionObjectStBlogClassDeleteAfter')
            || !$this->registerHook('actionAdminStBlogFormModifier')
            || !$this->registerHook('displayStBlogArticleFooter')
            || !Configuration::updateValue($this->_prefix_st.'BY_TAG', 1)
            || !Configuration::updateValue($this->_prefix_st.'IMAGE_TYPE', 'medium')
        )
			return false;
		$this->clearSliderCache();
		return true;
	}
    private function installDB()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_related_articles` (                 
              `id_st_blog_1` int(10) unsigned NOT NULL DEFAULT 0,         
              `id_st_blog_2` int(10) unsigned NOT NULL DEFAULT 0,
			  PRIMARY KEY (`id_st_blog_1`,`id_st_blog_2`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
		return $return;
	}
	private function uninstallDB()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_blog_related_articles`');
	}	
	public function uninstall()
	{
		$this->clearSliderCache();
		if (!parent::uninstall() ||
			!$this->uninstallDB())
			return false;
		return true;
	}    
    public function getContent()
	{
        if (Tools::getValue('act') == 'gsbra' && Tools::getValue('ajax')==1)
        {
            if(!$q = Tools::getValue('q'))
                die;
            if(!$id_st_blog = Tools::getValue('id_st_blog'))
                die;
            $excludeIds = Tools::getValue('excludeIds');
            $result = Db::getInstance()->executeS('
			SELECT b.`id_st_blog`,bl.`name`
			FROM `'._DB_PREFIX_.'st_blog` b
            LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl
            ON (b.`id_st_blog` = bl.`id_st_blog`
            AND bl.`id_lang`='.(int)$this->context->language->id.')
            '.Shop::addSqlAssociation('st_blog', 'b').'
			WHERE bl.`name` LIKE \'%'.pSQL($q).'%\'
            AND b.`active` = 1
            AND b.`id_st_blog` != '.(int)$id_st_blog.'
            '.($excludeIds ? 'AND b.`id_st_blog` NOT IN('.$excludeIds.')' : '').'
    		');
            foreach ($result AS $value)
		      echo trim($value['name']).'|'.(int)($value['id_st_blog'])."\n";
            die;
        }
        $this->initHookArray();
        $this->initTabNames();
        $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');
        parent::getContent();
		$helper = $this->initForm();
        $this->smarty->assign(array(
            'bo_tabs' => $this->_tabs,
            'bo_tab_content' => $helper->generateForm($this->fields_form),
        ));
        return $this->_html.$this->display(__FILE__, 'bo_tab_layout.tpl');
	}

    public function initFieldsForm()
    {
		$fields = parent::getFormFields();

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
                    
                    )); 

		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Automatically generate related articles(using tags):', array(), 'Admin.Theme.Transformer'),
					'name' => 'by_tag',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'by_tag_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'by_tag_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
				), 
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
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
        $fields['home_slider']['image_type']['options']['query'] = $image_types_arr;
        $fields['home_slider']['image_type']['options']['default'] = array(
            'value' => '',
            'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
        );
        $option = array(
            'spacing' => (int)Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            'per_lg'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
            'per_xl'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
            'per_xxl' => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
            'page'    => 'module-stblog-article',
        );
     $fields['home_slider']['spacing_between']['label'] = $this->getTranslator()->trans('Spacing between articles:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['display_sd']['label'] = $this->getTranslator()->trans('Display articles short description:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['link_hover_color']['label'] = $this->getTranslator()->trans('Article name hover color:', array(), 'Admin.Theme.Transformer');
        unset($fields['home_slider']['price_color']);
		$this->fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Slide settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => $fields['home_slider'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
			)
		);
        $fields['column']['display_pro_col']['label'] = $this->getTranslator()->trans('How to display articles:', array(), 'Admin.Theme.Transformer');
        $fields['column']['nbr_col']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['column']['items_col']['label'] = $this->getTranslator()->trans('How many articles per view on compact slider:', array(), 'Admin.Theme.Transformer');
        $this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Column Slide Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => $fields['column'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
			)
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
            'default_value' => 0,
            'validation' => 'isUnsignedInt',
            'values' => array(
             //   array(
             //       'id' => 'length_of_name_normal',
             //       'value' => 0,
             //       'label' => $this->getTranslator()->trans('Normal(one line)', array(), 'Modules.Stblog.Admin')),
                
			  array(
                    'id' => 'length_of_name_long',
                    'value' => 4,
                    'label' => $this->getTranslator()->trans('Own length - enter the number of characters in the field below', array(), 'Admin.Theme.Transformer')),
			   //array(
                //    'id' => 'length_of_name_long',
               //     'value' => 1,
              //      'label' => $this->getTranslator()->trans('Long(70 characters)', array(), 'Modules.Stblog.Admin')),
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
            
		),
		
		 array(
			'label' => $this->getTranslator()->trans('Own length of desc', array(), 'Admin.Theme.Transformer'),
            'name' => 'length_desc_article',
			'validation' => 'isUnsignedInt',
            'default_value' => 40,
           	'type' => 'text',
            
		),
       
        
        array(
            'label' => $this->getTranslator()->trans('Display viewcount on each post', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_viewcount',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_viewcount_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_viewcount_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_viewcount_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        array(
            'label' => $this->getTranslator()->trans('Display image post', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_image',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_image_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_image_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        array(
            'label' => $this->getTranslator()->trans('Display the total number of comments', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_comment_count',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_comment_count_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_comment_count_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_comment_count_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
         array(
            'label' => $this->getTranslator()->trans('Display author name', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_author',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_author_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_author_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_author_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        array(
            'label' => $this->getTranslator()->trans('Display the date', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_date_pos',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_date_pos_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_date_pos_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_date_pos_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        
        array(
            'label' => $this->getTranslator()->trans('Display date icon', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_date_icon',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
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
            'default_value' => 2,
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
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_loved_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_loved_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_loved_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the cover of the article', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        array(
            'label' => $this->getTranslator()->trans('Display a read more button', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_read_more',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
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
            'label' => $this->getTranslator()->trans('Left and right side padding with cover', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_img_padding',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            
        ),
        
        'items_img_padding_h'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Top and bottom side padding with cover', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_img_padding_h',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            
        ),
        
        
         'items_text_padding'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Left and right side padding with content', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_text_padding',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            
        ),
        
        'items_text_padding_h'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Top and bottom side padding with content', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_text_padding_h',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            
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
		
		
		
        $this->fields_form[3]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
			'input' => $fields['hook'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
    }
    
    
    
    
    public function hookActionAdminStBlogFormModifier($params)
    {
        if(!$id_st_blog = Tools::getValue('id_st_blog'))
            return false;
        $fields_form['form'] = array(
			'legend' => array(
        	'title' => $this->getTranslator()->trans('Related articles', array(), 'Admin.Theme.Transformer'),
             'icon' => 'icon-cogs'
			),
			'input' => array(
                'relatedarticles' => array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Related articles:', array(), 'Modules.Stblog.Admin'),
					'name' => 'relatedarticles',
                    'autocomplete' => false,
                    'class' => 'fixed-width-xxl',
                    'desc' => $this->getTranslator()->trans('Begin typing the first letters of the artilce name, then select the article from the drop-down list.', array(), 'Modules.Stblog.Admin'),
				),
			),
			'buttons' => array(
                array(
    				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
                    'class' => 'btn btn-default pull-right',
                    'icon'  => 'process-icon-save',
    				'type' => 'submit'
                )
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
				'stay' => true
			),
		);
        
        $js = '<script type="text/javascript">var m_token = "'.Tools::getAdminTokenLite('AdminModules').'";</script>';
        $html = '';
        foreach(StBlogRelatedArticlesClass::getRelatedArticlesLight((int)$this->context->language->id,(int)$id_st_blog) AS $value)
        {
            $html .= '<li>'.$value['name'].'
            <a href="javascript:;" class="del_relatedarticles"><img src="../img/admin/delete.gif" /></a>
            <input type="hidden" name="id_relatedarticles[]" value="'.$value['id_st_blog_2'].'" /></li>';
        }
        
        $fields_form['form']['input']['relatedarticles']['desc'] .= '<br>'.$js.$this->getTranslator()->trans('Current articles', array(), 'Modules.Stblog.Admin')
                .': <ul id="curr_relatedarticles">'.$html.'</ul>';
        
        $this->context->controller->addJS($this->_path. 'views/js/admin.js');
        $gallery = array_pop($params['fields']);
        $params['fields'][] = $fields_form;
        $params['fields'][] = $gallery;
        $params['fields_value']['relatedarticles'] = '';
        
    }

    public function hookDisplayHeader($params)
    {
        if (!$this->isCached($this->templateFile[0], $this->stGetCacheId('header')))
        {
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
                $custom_css .= '.'.$classname.' .block_blog .s_title_block a,
                .'.$classname.' .block_blog .blog_info,
                .'.$classname.' .block_blog .blok_blog_short_content{color:'.$text_color.';}';
    
            if ($link_hover_color = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR'))
                $custom_css .= '.'.$classname.' .block_blog .s_title_block a{color:'.$link_hover_color.';}';
    
            if ($grid_hover_bg = Configuration::get($this->_prefix_st.'GRID_HOVER_BG'))
                $custom_css .= '.'.$classname.' block_blog .pro_outer_box:hover .pro_second_box{background-color:'.$grid_hover_bg.';}';
    
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
            
            if  ($home_blog_grid_bg = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG'))
                        $custom_css .= '.stblogrelatedarticles_container .block_content .block_blog{background-color:'.$home_blog_grid_bg.';}';
                        $custom_css .= '.stblogrelatedarticles_container .product_list_item .block_blog{background-color:'.$home_blog_grid_bg.';}';
                        
                        
            if  ($home_blog_grid_bg_img = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_IMG'))
                        $custom_css .= '.stblogrelatedarticles_container .block_content .pro_first_box{background-color:'.$home_blog_grid_bg_img.';}';
                        $custom_css .= '.stblogrelatedarticles_container .product_list_item .pro_first_box{background-color:'.$home_blog_grid_bg_img.';}';
            
                        
            if  ($home_blog_grid_bg_text = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_TEXT'))
                        $custom_css .= '.stblogrelatedarticles_container .block_content .pro_second_box{background-color:'.$home_blog_grid_bg_text.';}';
                        $custom_css .= '.stblogrelatedarticles_container .product_list_item .pro_second_box{background-color:'.$home_blog_grid_bg_text.';}';
            
            if  ($home_blog_grid_bg_text_hover = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_TEXT_HOVER'))
                        $custom_css .= '.stblogrelatedarticles_container .block_content .pro_outer_box:hover  .pro_second_box{background-color:'.$home_blog_grid_bg_text_hover.' !important;}';
                        $custom_css .= '.stblogrelatedarticles_container .product_list_item .pro_outer_box:hover  .pro_second_box{background-color:'.$home_blog_grid_bg_text_hover.' !important;}';
                                 
                        
                        
               $items_img_padding = Configuration::get($this->_prefix_st.'ITEMS_IMG_PADDING');
                        $custom_css .= '.stblogrelatedarticles_container .block_content .block_blog .pro_first_box{padding-left:'.$items_img_padding.'px;padding-right:'.$items_img_padding.'px;}'; 
                        $custom_css .= '.stblogrelatedarticles_container .product_list_item .block_blog .pro_first_box{padding-left:'.$items_img_padding.'px;padding-right:'.$items_img_padding.'px;}'; 
               
               $items_img_padding_h = Configuration::get($this->_prefix_st.'ITEMS_IMG_PADDING_H');
                        $custom_css .= '.stblogrelatedarticles_container .block_content .block_blog .pro_first_box{padding-top:'.$items_img_padding_h.'px;padding-bottom:'.$items_img_padding_h.'px;}';  
                        $custom_css .= '.stblogrelatedarticles_container .product_list_item .block_blog .pro_first_box{padding-top:'.$items_img_padding_h.'px;padding-bottom:'.$items_img_padding_h.'px;}';  
                        
               $items_text_padding = Configuration::get($this->_prefix_st.'ITEMS_TEXT_PADDING');
                        $custom_css .= '.stblogrelatedarticles_container .block_content .block_blog .pro_second_box{padding-left:'.$items_text_padding.'px;padding-right:'.$items_text_padding.'px;}'; 
                        $custom_css .= '.stblogrelatedarticles_container .product_list_item .block_blog .pro_second_box{padding-left:'.$items_text_padding.'px;padding-right:'.$items_text_padding.'px;}'; 
              
               $items_text_padding_h = Configuration::get($this->_prefix_st.'ITEMS_TEXT_PADDING_H');
                        $custom_css .= '.stblogrelatedarticles_container .block_content .block_blog .pro_second_box{padding-top:'.$items_text_padding_h.'px;padding-bottom:'.$items_text_padding_h.'px;}';  
                        $custom_css .= '.stblogrelatedarticles_container .product_list_item .block_blog .pro_second_box{padding-top:'.$items_text_padding_h.'px;padding-bottom:'.$items_text_padding_h.'px;}';  
                        $custom_css .= '.stblogrelatedarticles_container .block_blog .pro_first_box img.front-image {margin-bottom: 0px !important;}';  
                        
                        
            
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->fetch($this->templateFile[0], $this->stGetCacheId('header'));
    }
    private function _prepareHook($col=0, $id_product = 0)
    {            
        $ext = $col ? '_COL' : '';
        $nbr = Configuration::get($this->_prefix_st.'NBR'.$ext);
        if (!$nbr) {
            $nbr = 4;
        }
        
        $id_st_blog = Tools::getValue('id_st_blog');
        if (!$id_st_blog && !$id_product)
            return false;
        
        $order_by = 'id_st_blog';
        $order_way = 'DESC';
        $soby = (int)Configuration::get($this->_prefix_st.'SOBY'.$ext);if (key_exists($soby, $this->sort_by)) {
            $order_by = $this->sort_by[$soby]['orderBy'];
            $order_way = $this->sort_by[$soby]['orderWay'];
        }
        
        $id_st_blog_array = array();
        if ($id_product > 0)
        {
            $result = Db::getInstance()->executeS('
            SELECT `id_st_blog` FROM '._DB_PREFIX_.'st_blog_product_link
            WHERE `id_product` = '.(int)$id_product.'
            ');
            foreach($result AS $value)
                $id_st_blog_array[] = $value['id_st_blog'];
        }
        elseif( $id_st_blog && Configuration::get($this->_prefix_st.'BY_TAG') )
		{
            $result = Db::getInstance()->executeS('
            SELECT DISTINCT `id_st_blog` 
            FROM '._DB_PREFIX_.'st_blog_tag_map tm 
            LEFT JOIN '._DB_PREFIX_.'st_blog_tag t
            ON t.`id_st_blog_tag`=tm.`id_st_blog_tag`
            WHERE `id_lang` = '.(int)$this->context->language->id.'
            AND `id_st_blog` != '.(int)$id_st_blog.' 
            AND `name` IN(
            SELECT `name` FROM '._DB_PREFIX_.'st_blog_tag t1 
            LEFT JOIN '._DB_PREFIX_.'st_blog_tag_map tm1 
            ON t1.`id_st_blog_tag` = tm1.`id_st_blog_tag` 
            WHERE id_st_blog = '.(int)$id_st_blog.')
            ');
            foreach($result AS $value)
                $id_st_blog_array[] = $value['id_st_blog'];
		}
        
        if ($id_st_blog)
        {
            $result = Db::getInstance()->executeS('
            SELECT `id_st_blog_2` FROM '._DB_PREFIX_.'st_blog_related_articles
            WHERE `id_st_blog_1` = '.(int)$id_st_blog.'
            ');
            
            foreach($result AS $value)
                $id_st_blog_array[] = $value['id_st_blog_2'];    
        }
        
        if (!count($id_st_blog_array))
            return false;
            
        $id_st_blog_array = array_unique($id_st_blog_array);
        
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogImageClass.php');
        
        $sql = new DbQuery();
		$sql->select(
			'b.*, st_blog_shop.*, bl.*'
		);

		$sql->from('st_blog', 'b');
		$sql->join(Shop::addSqlAssociation('st_blog', 'b'));
		$sql->leftJoin('st_blog_lang', 'bl', '
			b.`id_st_blog` = bl.`id_st_blog`
			AND bl.`id_lang` = '.(int)$this->context->language->id
		);
		$sql->where('st_blog_shop.`active` = 1 AND b.`id_st_blog` IN ('.implode(',', $id_st_blog_array).')');

		$sql->groupBy('st_blog_shop.`id_st_blog`');

		$sql->orderBy($order_by && $order_way ? 'b.'.$order_by.' '.$order_way : 'b.`date_add` DESC');
		$sql->limit($nbr);
        
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

		if (!$result)
			return false;

		$articles = StBlogClass::getBlogsDetials((int)$this->context->language->id, $result);
        
        $slideshow = Configuration::get($this->_prefix_st.'SLIDESHOW'.$ext);
        
        $s_speed = Configuration::get($this->_prefix_st.'S_SPEED'.$ext);
        
        $a_speed = Configuration::get($this->_prefix_st.'A_SPEED'.$ext);
        
        $pause_on_hover = Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'.$ext);

        $rewind_nav = Configuration::get($this->_prefix_st.'REWIND_NAV'.$ext);
        
        $loop = Configuration::get($this->_prefix_st.'LOOP'.$ext);
        
        $move = Configuration::get($this->_prefix_st.'MOVE'.$ext);
        
        $items = Configuration::get($this->_prefix_st.'ITEMS_COL');
        
        $hide_mob = Configuration::get($this->_prefix_st.'HIDE_MOB'.$ext);

        $lazy_load      = Configuration::get($this->_prefix_st.'LAZY'.$ext);
        $aw_display      = Configuration::get($this->_prefix_st.'AW_DISPLAY'.$ext);
        

        $this->smarty->assign(array(
			'blogs' => $articles,
            'slider_slideshow' => $slideshow,
            'slider_s_speed' => $s_speed,
            'slider_a_speed' => $a_speed,
            'slider_pause_on_hover' => $pause_on_hover,
            'rewind_nav' => $rewind_nav,
            'slider_loop' => $loop,
            'slider_move' => $move,
            'slider_items' => $items,
			'hide_mob' => (int)$hide_mob,
            'lazy_load'             => $lazy_load,
            'aw_display'             => $aw_display,
            'title' => $this->getTranslator()->trans('Related articles', array(), 'Shop.Theme.Transformer'),

            'display_as_grid'       => Configuration::get($this->_prefix_st.'GRID'),
            'title_position'        => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
            'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'hide_direction_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
            'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
            'hide_control_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
            'spacing_between'       => Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            'display_sd'       => Configuration::get($this->_prefix_st.'DISPLAY_SD'),
            
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

            'view_more'             => (int)Configuration::get($this->_prefix_st.'VIEW_MORE'),

            'module'            => $this->name,
		));
        return true;
    }
    public function hookDisplayLeftColumn($params, $func=0)
	{
        $id_product = 0;
	    if(Dispatcher::getInstance()->getController() == 'product')
            $id_product = Tools::getValue('id_product');
            
        
        if(!$this->_prepareHook(1, $id_product))
                return false;

        $this->smarty->assign(array(
            'column_slider'         => true,
            'homeverybottom'   => false,
            'hook_hash'        => $this->getHookHash($func ? $func : __FUNCTION__),
        ));
		return $this->fetch($this->templateFile[1]);
	}
    public function hookDisplayStBlogArticleFooter($params)
    {
        $this->smarty->assign(array(
            'is_blog'            => true,
        ));
		return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayHome($params, $func=0)
    {
        $id_product = 0;
        if(Dispatcher::getInstance()->getController() == 'product')
            $id_product = Tools::getValue('id_product');
        
        if(!$this->_prepareHook(0, $id_product))
                return false;

        $this->smarty->assign(array(
            'column_slider'         => false,
            'homeverybottom'   => false,
            'hook_hash'        => $this->getHookHash($func ? $func : __FUNCTION__),
            'pro_per_fw'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_FW'),
            'pro_per_xxl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
            'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
            'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
            'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_MD'),
            'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_SM'),
            'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XS'),

            'blog_image_type'       => Configuration::get($this->_prefix_st.'IMAGE_TYPE'),
            'hide_direction_nav_on_mob'             => (int)Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
            'hide_control_nav_on_mob'             => (int)Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
        ));
        return $this->fetch($this->templateFile[1]);
    }
    public function hookDisplayProductLeftColumn($params)
	{
        return $this->hookDisplayLeftColumn($params);
	}
    public function hookDisplayProductRightColumn($params)
	{
        return $this->hookDisplayLeftColumn($params);
	}
	
    public function hookDisplayProductBottomZone($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
	public function hookActionObjectStBlogClassUpdateAfter($params)
	{        
        if (Tools::getValue('ajax') == 1)
            return false;
        if(!$id_st_blog = $params['object']->id)
            return false;
        
        StBlogRelatedArticlesClass::deleteRelatedArticles($id_st_blog);
		if ($related_articles = Tools::getValue('id_relatedarticles'))
		{
			$related_articles = array_unique($related_articles);
            if (in_array($id_st_blog, $related_articles))
                unset($related_articles[array_search($id_st_blog, $related_articles)]);
			if (count($related_articles))
				StBlogRelatedArticlesClass::saveRelatedArticles($id_st_blog, $related_articles);
		}    
		$this->_clearCache('stblogrelatedarticles.tpl');
        return ;
	}
    public function hookActionObjectStBlogClassAddAfter($params)
	{
	    $this->hookActionObjectStBlogClassUpdateAfter($params);
	}
	public function hookActionObjectStBlogClassDeleteAfter($params)
	{
	    if (Tools::getValue('ajax') == 1)
            return false;
        if(!$params['object']->id)
            StBlogRelatedArticlesClass::deleteRelatedArticles($params['object']->id);
		$this->_clearCache('stblogrelatedarticles.tpl');
        return;
	}
    public function getConfigFieldsValues()
    {
        $fields_values = parent::getConfigFieldsValues();
        $fields_values['by_tag'] = Configuration::get($this->_prefix_st.'BY_TAG');
        $fields_values['length_of_name'] = Configuration::get($this->_prefix_st.'LENGTH_OF_NAME');
        $fields_values['length_of_name_value'] = Configuration::get($this->_prefix_st.'LENGTH_OF_NAME_VALUE');
        $fields_values['length_desc_article'] = Configuration::get($this->_prefix_st.'LENGTH_DESC_ARTICLE');
        $fields_values['display_image'] = Configuration::get($this->_prefix_st.'DISPLAY_IMAGE');
        $fields_values['display_comment_count'] = Configuration::get($this->_prefix_st.'DISPLAY_COMMENT_COUNT');
        $fields_values['display_author'] = Configuration::get($this->_prefix_st.'DISPLAY_AUTHOR');
        $fields_values['display_date_pos'] = Configuration::get($this->_prefix_st.'DISPLAY_DATE_POS');
        $fields_values['display_date_icon'] = Configuration::get($this->_prefix_st.'DISPLAY_DATE_ICON');
        $fields_values['display_date'] = Configuration::get($this->_prefix_st.'DISPLAY_DATE');
        $fields_values['display_loved'] = Configuration::get($this->_prefix_st.'DISPLAY_LOVED');
        $fields_values['display_read_more'] = Configuration::get($this->_prefix_st.'DISPLAY_READ_MORE');
        $fields_values['img_text'] = Configuration::get($this->_prefix_st.'IMG_TEXT');
        $fields_values['items_img'] = Configuration::get($this->_prefix_st.'ITEMS_IMG');
        $fields_values['home_blog_grid_bg'] = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG');
        $fields_values['home_blog_grid_bg_img'] = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_IMG');
        $fields_values['home_blog_grid_bg_text'] = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_TEXT');
        $fields_values['home_blog_grid_bg_text_hover'] = Configuration::get($this->_prefix_st.'HOME_BLOG_GRID_BG_TEXT_HOVER');
        $fields_values['items_img_padding'] = Configuration::get($this->_prefix_st.'ITEMS_IMG_PADDING');
        $fields_values['items_img_padding_h'] = Configuration::get($this->_prefix_st.'ITEMS_IMG_PADDING_H');
        $fields_values['items_text_padding'] = Configuration::get($this->_prefix_st.'ITEMS_TEXT_PADDING');
        $fields_values['items_text_padding_h'] = Configuration::get($this->_prefix_st.'ITEMS_TEXT_PADDING_H');
        
        
        
        return $fields_values;
    }
}