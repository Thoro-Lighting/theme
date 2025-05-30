<?php
/*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

use PrestaShop\PrestaShop\Core\Addon\Theme\ThemeManagerBuilder;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Core\Product\ProductExtraContent;

//for products
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
//

require_once _PS_MODULE_DIR_.'steasycontent/classes/StEasyContentClass.php';
require_once _PS_MODULE_DIR_.'steasycontent/classes/StEasyContentColumnClass.php';
require_once _PS_MODULE_DIR_.'steasycontent/classes/StEasyContentElementClass.php';
require_once _PS_MODULE_DIR_.'steasycontent/classes/StEasyContentSettingClass.php';
require_once _PS_MODULE_DIR_.'steasycontent/classes/StEasyContentFontClass.php';

class StEasyContent extends Module implements WidgetInterface
{
    public  $fields_list;
    public  $list_data = array();
    public  static $text_width = array();
    public  $fields_value;
    public  $fields_form;
    public  $id_st_easy_content;
    public  $id_st_easy_content_column;
    protected $_elements = array();
	private $_html = '';
    private $_pages = array();
    private $spacer_size = '5';
    protected static $access_rights = 0775;
    public static $location = array(
        // 36   => array('id' =>36 , 'name' => 'Full width top boxed'    , 'hook' => 'FullWidthTop', 'full_width' => 1, 'index_slider' => 1),
        98   => array('id' =>98 , 'name' => 'Full width top'          , 'hook' => 'FullWidthTop', 'stretched' => 1, 'full_width' => 1, 'index_slider' => 1),
        // 86   => array('id' =>86 , 'name' => 'Full width top 2 boxed'  , 'hook' => 'FullWidthTop2', 'full_width' => 1, 'index_slider' => 1),
        87   => array('id' =>87 , 'name' => 'Full width top 2'        , 'hook' => 'FullWidthTop2', 'stretched' => 1, 'full_width' => 1, 'index_slider' => 1),
        // 35   => array('id' =>35 , 'name' => 'Top column'              , 'hook' => 'TopColumn', 'index_slider' => 1),
        16   => array('id' =>16 , 'name' => 'Homepage top'            , 'hook' => 'HomeTop'),
        1    => array('id' =>1   , 'name' => 'Homepage'                , 'hook' => 'Home'),
        17   => array('id' =>17 , 'name' => 'Homepage bottom'         , 'hook' => 'HomeBottom'),
        /*14   => array('id' =>14 , 'name' => 'Homepage secondary left' , 'hook' => 'HomeSecondaryLeft'),
        15   => array('id' =>15 , 'name' => 'Homepage secondary right', 'hook' => 'HomeSecondaryRight'),*/
        29   => array('id' =>29 , 'name' => 'Homepage left'  , 'hook' => 'HomeLeft'),
        30   => array('id' =>30 , 'name' => 'Homepage Right'  , 'hook' => 'HomeRight'),
        53   => array('id' =>53 , 'name' => 'Homepage first quarter'  , 'hook' => 'HomeFirstQuarter'),
        54   => array('id' =>54 , 'name' => 'Homepage second quarter' , 'hook' => 'HomeSecondQuarter'),
        58   => array('id' =>58 , 'name' => 'Homepage third quarter'  , 'hook' => 'HomeThirdQuarter'),
        59   => array('id' =>59 , 'name' => 'Homepage fourth quarter' , 'hook' => 'HomeFourthQuarter'),
        // 28   => array('id' =>28 , 'name' => 'Bottom column'           , 'hook' => 'BottomColumn'),
        // 37   => array('id' =>37 , 'name' => 'Full width Bottom boxed' , 'hook' => 'FullWidthBottom', 'full_width' => 1),
        99   => array('id' =>99 , 'name' => 'Full width Bottom'       , 'hook' => 'FullWidthBottom', 'stretched' => 1, 'full_width' => 1, 'index_slider' => 1),
        80   => array('id' =>80 , 'name' => 'Full width bottom 2(Footer before)'       , 'hook' => 'FooterBefore', 'stretched' => 1, 'full_width' => 1, 'index_slider' => 1),
        2    => array('id' =>2   , 'name' => 'Left column except the produt page'            , 'hook' => 'LeftColumn', 'column'=>1),
        10   => array('id' =>10 , 'name' => 'Right column except the produt page'            , 'hook' => 'RightColumn', 'column'=>1),
        33   => array('id' =>33 , 'name' => 'Left column on the product page only'  , 'hook' => 'LeftColumnProduct'),
        32   => array('id' =>32 , 'name' => 'Right column on the product page only' , 'hook' => 'RightColumnProduct'),
        110   => array('id' =>110 , 'name' => 'Left column on all pages' , 'hook' => ''),
        111   => array('id' =>111 , 'name' => 'Right column on all pages'   , 'hook' => ''),
         220 => array('id' =>220 , 'name' => 'Banner for promotion page', 'hook' => 'Promotion', 'auto_height' => 1),
        221 => array('id' =>221 , 'name' => 'Banner for search page', 'hook' => 'Search', 'auto_height' => 1),
        222 => array('id' =>222 , 'name' => 'Banner for new products page', 'hook' => 'Newproduct', 'auto_height' => 1),
        223 => array('id' =>223 , 'name' => 'Banner for bestseller page', 'hook' => 'Bestsales', 'auto_height' => 1),
        
        322    => array('id' =>322 , 'name' => 'Footer top (3/12 wide)'    , 'hook' => 'FooterTop'),
        4322   => array('id' =>4322 , 'name' => 'Footer top (2/12 wide)'    , 'hook' => 'FooterTop'),
        5622   => array('id' =>5622 , 'name' => 'Footer top (2.4/12 wide)'  , 'hook' => 'FooterTop'),
        4422   => array('id' =>4422 , 'name' => 'Footer top (4/12 wide)'    , 'hook' => 'FooterTop'),
        4522   => array('id' =>4522 , 'name' => 'Footer top (5/12 wide)'    , 'hook' => 'FooterTop'),
        4622   => array('id' =>4622 , 'name' => 'Footer top (6/12 wide)'    , 'hook' => 'FooterTop'),
        8122   => array('id' =>8122 , 'name' => 'Footer top (7/12 wide)'    , 'hook' => 'FooterTop'),
        8222   => array('id' =>8222 , 'name' => 'Footer top (8/12 wide)'    , 'hook' => 'FooterTop'),
        8322   => array('id' =>8322 , 'name' => 'Footer top (9/12 wide)'    , 'hook' => 'FooterTop'),
        8422   => array('id' =>8422 , 'name' => 'Footer top (10/12 wide)'   , 'hook' => 'FooterTop'),
        4722   => array('id' =>4722 , 'name' => 'Footer top (12/12 wide)'   , 'hook' => 'FooterTop'),
        
        
        241123   => array('id' =>241123 , 'name' => 'Stacked footer blog (Column 1)'  , 'hook' => 'FooterTopBlogStacked_1'),
        251123   => array('id' =>251123 , 'name' => 'Stacked footer blog (Column 2)'  , 'hook' => 'FooterTopBlogStacked_2'),
        
         32243    => array('id' =>32243 , 'name' => 'Footer top blog (3/12 wide)'    , 'hook' => 'FooterTopBlog'),
        432243   => array('id' =>432243 , 'name' => 'Footer top blog (2/12 wide)'    , 'hook' => 'FooterTopBlog'),
        562243   => array('id' =>562243 , 'name' => 'Footer top blog (2.4/12 wide)'  , 'hook' => 'FooterTopBlog'),
        442243   => array('id' =>442243 , 'name' => 'Footer top blog (4/12 wide)'    , 'hook' => 'FooterTopBlog'),
        452243   => array('id' =>452243 , 'name' => 'Footer top blog (5/12 wide)'    , 'hook' => 'FooterTopBlog'),
        462243   => array('id' =>462243 , 'name' => 'Footer top blog (6/12 wide)'    , 'hook' => 'FooterTopBlog'),
        812243   => array('id' =>812243 , 'name' => 'Footer top blog (7/12 wide)'    , 'hook' => 'FooterTopBlog'),
        822243   => array('id' =>822243 , 'name' => 'Footer top blog (8/12 wide)'    , 'hook' => 'FooterTopBlog'),
        832243   => array('id' =>832243 , 'name' => 'Footer top blog (9/12 wide)'    , 'hook' => 'FooterTopBlog'),
        842243   => array('id' =>842243 , 'name' => 'Footer top blog (10/12 wide)'   , 'hook' => 'FooterTopBlog'),
        472243   => array('id' =>472243 , 'name' => 'Footer top blog (12/12 wide)'   , 'hook' => 'FooterTopBlog'),
        
        
        32244    => array('id' =>32244 , 'name' => 'Footer middle blog (3/12 wide)'    , 'hook' => 'FooterMiddleBlog'),
        432244   => array('id' =>432244 , 'name' => 'Footer middle blog (2/12 wide)'    , 'hook' => 'FooterMiddleBlog'),
        562244   => array('id' =>562244 , 'name' => 'Footer middle blog (2.4/12 wide)'  , 'hook' => 'FooterMiddleBlog'),
        442244   => array('id' =>442244 , 'name' => 'Footer middle blog (4/12 wide)'    , 'hook' => 'FooterMiddleBlog'),
        452244   => array('id' =>452244 , 'name' => 'Footer middle blog (5/12 wide)'    , 'hook' => 'FooterMiddleBlog'),
        462244   => array('id' =>462244 , 'name' => 'Footer middle blog (6/12 wide)'    , 'hook' => 'FooterMiddleBlog'),
        812244   => array('id' =>812244 , 'name' => 'Footer middle blog (7/12 wide)'    , 'hook' => 'FooterMiddleBlog'),
        822244   => array('id' =>822244 , 'name' => 'Footer middle blog (8/12 wide)'    , 'hook' => 'FooterMiddleBlog'),
        832244   => array('id' =>832244 , 'name' => 'Footer middle blog (9/12 wide)'    , 'hook' => 'FooterMiddleBlog'),
        842244   => array('id' =>842244 , 'name' => 'Footer middle blog (10/12 wide)'   , 'hook' => 'FooterMiddleBlog'),
        472244   => array('id' =>472244 , 'name' => 'Footer middle blog (12/12 wide)'   , 'hook' => 'FooterMiddleBlog'),
        
        32245    => array('id' =>32245 , 'name' => 'Footer bottom blog (3/12 wide)'    , 'hook' => 'FooterBottomBlog'),
        432245   => array('id' =>432245 , 'name' => 'Footer bottom blog (2/12 wide)'    , 'hook' => 'FooterBottomBlog'),
        562245   => array('id' =>562245 , 'name' => 'Footer bottom blog (2.4/12 wide)'  , 'hook' => 'FooterBottomBlog'),
        442245   => array('id' =>442245 , 'name' => 'Footer bottom blog (4/12 wide)'    , 'hook' => 'FooterBottomBlog'),
        452245   => array('id' =>452245 , 'name' => 'Footer bottom blog (5/12 wide)'    , 'hook' => 'FooterBottomBlog'),
        462245   => array('id' =>462244 , 'name' => 'Footer bottom blog (6/12 wide)'    , 'hook' => 'FooterBottomBlog'),
        812245   => array('id' =>812245 , 'name' => 'Footer bottom blog (7/12 wide)'    , 'hook' => 'FooterBottomBlog'),
        822245   => array('id' =>822245 , 'name' => 'Footer bottom blog (8/12 wide)'    , 'hook' => 'FooterBottomBlog'),
        832245   => array('id' =>832245 , 'name' => 'Footer bottom blog (9/12 wide)'    , 'hook' => 'FooterBottomBlog'),
        842245   => array('id' =>842245 , 'name' => 'Footer bottom blog (10/12 wide)'   , 'hook' => 'FooterBottomBlog'),
        472245   => array('id' =>472245 , 'name' => 'Footer bottom blog (12/12 wide)'   , 'hook' => 'FooterBottomBlog'),
        
        3272   => array('id' =>3272 , 'name' => 'Footer checkout (3/12 wide)'    , 'hook' => 'FooterCheckout'),
        4372   => array('id' =>4372 , 'name' => 'Footer checkout (2/12 wide)'    , 'hook' => 'FooterCheckout'),
        5672   => array('id' =>5672 , 'name' => 'Footer checkout (2.4/12 wide)'  , 'hook' => 'FooterCheckout'),
        4472   => array('id' =>4472 , 'name' => 'Footer checkout (4/12 wide)'    , 'hook' => 'FooterCheckout'),
        4572   => array('id' =>4572 , 'name' => 'Footer checkout (5/12 wide)'    , 'hook' => 'FooterCheckout'),
        4672   => array('id' =>4672 , 'name' => 'Footer checkout (6/12 wide)'    , 'hook' => 'FooterCheckout'),
        8172   => array('id' =>8172 , 'name' => 'Footer checkout (7/12 wide)'    , 'hook' => 'FooterCheckout'),
        8722   => array('id' =>8722 , 'name' => 'Footer checkout (8/12 wide)'    , 'hook' => 'FooterCheckout'),
        8372   => array('id' =>8372 , 'name' => 'Footer checkout (9/12 wide)'    , 'hook' => 'FooterCheckout'),
        8472   => array('id' =>8472 , 'name' => 'Footer checkout (10/12 wide)'   , 'hook' => 'FooterCheckout'),
        4772   => array('id' =>4772 , 'name' => 'Footer checkout (12/12 wide)'   , 'hook' => 'FooterCheckout'),
        
        13   => array('id' =>13 , 'name' => 'Stacked footer (Column 1)'  , 'hook' => 'StackedFooter1', 'is_stacked_footer'=>1),
        38   => array('id' =>38 , 'name' => 'Stacked footer (Column 2)'  , 'hook' => 'StackedFooter2', 'is_stacked_footer'=>1),
        55   => array('id' =>55 , 'name' => 'Stacked footer (Column 3)'  , 'hook' => 'StackedFooter3', 'is_stacked_footer'=>1),
        39   => array('id' =>39 , 'name' => 'Stacked footer (Column 4)'  , 'hook' => 'StackedFooter4', 'is_stacked_footer'=>1),
        40   => array('id' =>40 , 'name' => 'Stacked footer (Column 5)'  , 'hook' => 'StackedFooter5', 'is_stacked_footer'=>1),
        41   => array('id' =>41 , 'name' => 'Stacked footer (Column 6)'  , 'hook' => 'StackedFooter6', 'is_stacked_footer'=>1),
        
        3    => array('id' =>3 , 'name' => 'Footer (3/12 wide)'     , 'hook' => 'Footer'),
        43   => array('id' =>43 , 'name' => 'Footer (2/12 wide)'    , 'hook' => 'Footer'),
        56   => array('id' =>56 , 'name' => 'Footer (2.4/12 wide)'  , 'hook' => 'Footer'),
        44   => array('id' =>44 , 'name' => 'Footer (4/12 wide)'    , 'hook' => 'Footer'),
        45   => array('id' =>45 , 'name' => 'Footer (5/12 wide)'    , 'hook' => 'Footer'),
        46   => array('id' =>46 , 'name' => 'Footer (6/12 wide)'    , 'hook' => 'Footer'),
        81   => array('id' =>81 , 'name' => 'Footer (7/12 wide)'    , 'hook' => 'Footer'),
        82   => array('id' =>82 , 'name' => 'Footer (8/12 wide)'    , 'hook' => 'Footer'),
        83   => array('id' =>83 , 'name' => 'Footer (9/12 wide)'    , 'hook' => 'Footer'),
        84   => array('id' =>84 , 'name' => 'Footer (10/12 wide)'   , 'hook' => 'Footer'),
        47   => array('id' =>47 , 'name' => 'Footer (12/12 wide)'   , 'hook' => 'Footer'),
        
        12   => array('id' =>12 , 'name' => 'Footer after (3/12 wide)'     , 'hook' => 'FooterAfter'),
        48   => array('id' =>48 , 'name' => 'Footer after (2/12 wide)'     , 'hook' => 'FooterAfter'),
        57   => array('id' =>57 , 'name' => 'Footer after (2.4/12 wide)'   , 'hook' => 'FooterAfter'),
        49   => array('id' =>49 , 'name' => 'Footer after (4/12 wide)'     , 'hook' => 'FooterAfter'),
        50   => array('id' =>50 , 'name' => 'Footer after (5/12 wide)'     , 'hook' => 'FooterAfter'),
        51   => array('id' =>51 , 'name' => 'Footer after (6/12 wide)'     , 'hook' => 'FooterAfter'),
        91   => array('id' =>91 , 'name' => 'Footer after (7/12 wide)'     , 'hook' => 'FooterAfter'),
        92   => array('id' =>92 , 'name' => 'Footer after (8/12 wide)'     , 'hook' => 'FooterAfter'),
        93   => array('id' =>93 , 'name' => 'Footer after (9/12 wide)'     , 'hook' => 'FooterAfter'),
        94   => array('id' =>94 , 'name' => 'Footer after (10/12 wide)'    , 'hook' => 'FooterAfter'),
        52   => array('id' =>52 , 'name' => 'Footer after (12/12 wide)'    , 'hook' => 'FooterAfter'),
        
        96   => array('id' =>96 , 'name' => 'Above contact us form'   , 'hook' => 'AboveContactForm'),
        88   => array('id' =>88 , 'name' => 'Right side of contact us form'   , 'hook' => 'ContactFormRight'),
        108   => array('id' =>108 , 'name' => 'Below contact us form'   , 'hook' => 'BelowContactForm'),
        // 95   => array('id' =>95 , 'name' => 'Below contact us form'),
        // 4 => array('id' =>4 , 'name' => 'Product right column'    , 'hook' => 'ProductRightColumn'),
        // 5    => array('id' =>5 , 'name' => 'Category no products'),
        6    => array('id' =>6 , 'name' => '404 page not found', 'hook'=>'NotFound'),
        9    => array('id' =>9 , 'name' => 'Website maintenance'         , 'hook' => 'Maintenance'),
        // 11   => array('id' =>11 , 'name' => 'Shopping cart is empty'),
        97   => array('id' =>97 , 'name' => 'Shopping cart footer'      , 'hook' => 'ShoppingCartFooter'),
        1002   => array('id' =>1002 , 'name' => 'Shopping cart empty footer'      , 'hook' => 'ShoppingCartEmpty'),
        104   => array('id' =>104 , 'name' => 'Blog full width top'       , 'hook' => 'StBlogFullWidthTop', 'stretched' => 1, 'full_width' => 1, 'is_blog' => 1),
        20   => array('id' =>20 , 'name' => 'Blog homepage top'         , 'hook' => 'StBlogHomeTop', 'is_blog' => 1),
        19   => array('id' =>19 , 'name' => 'Blog homepage'             , 'hook' => 'StBlogHome', 'is_blog' => 1),
        105   => array('id' =>105 , 'name' => 'Blog full width Bottom'       , 'hook' => 'StBlogFullWidthBottom', 'stretched' => 1, 'full_width' => 1, 'is_blog' => 1),
        // 21   => array('id' =>21 , 'name' => 'Blog homepage bottom'      , 'hook' => 'StBlogHomeBottom', 'is_blog' => 1),
        22   => array('id' =>22 , 'name' => 'Blog left column'          , 'hook' => 'StBlogLeftColumn', 'column'=>1, 'is_blog' => 1),
        23   => array('id' =>23 , 'name' => 'Blog right column'         , 'hook' => 'StBlogRightColumn', 'column'=>1, 'is_blog' => 1),
        
        27   => array('id' =>27 , 'name' => 'Header left'               , 'hook' => 'HeaderLeft', 'header_item'=>1),
        62   => array('id' =>62 , 'name' => 'Header center'             , 'hook' => 'HeaderCenter', 'header_item'=>1),    
        60   => array('id' =>60 , 'name' => 'Header right'              , 'hook' => 'Top', 'header_item'=>1),
        61   => array('id' =>61 , 'name' => 'Header right bottom'       , 'hook' => 'HeaderBottom', 'header_item'=>1), 

        27222   => array('id' =>27222 , 'name' => 'Header left blog'               , 'hook' => 'HeaderLeftBlog', 'header_item'=>1),
               62222   => array('id' =>62222 , 'name' => 'Header center blog'             , 'hook' => 'HeaderCenterBlog', 'header_item'=>1),    
               60222   => array('id' =>60222 , 'name' => 'Header right blog'              , 'hook' => 'TopBlog', 'header_item'=>1),
               61222   => array('id' =>61222 , 'name' => 'Header right bottom blog'       , 'hook' => 'HeaderBottomBlog', 'header_item'=>1),
        
        102   => array('id' =>102 , 'name' => 'Checkout page header'       , 'hook' => 'CheckoutHeader', 'header_item'=>1),
        999 => array('id' =>999 , 'name' => 'Topbar checkout header'  , 'hook' => 'InfoCheckout'),   
        
        79   => array('id' =>79 , 'name' => 'Slogan(beside the logo)'   , 'hook' => 'Slogan1', 'header_item'=>1),        
        78   => array('id' =>78 , 'name' => 'Slogan(Under the logo)'    , 'hook' => 'Slogan2', 'header_item'=>1), 

        7977   => array('id' =>7977 , 'name' => 'Slogan blog(beside the logo)'   , 'hook' => 'Slogan1Blog', 'header_item'=>1),        
        7877   => array('id' =>7877 , 'name' => 'Slogan blog(Under the logo)'    , 'hook' => 'Slogan2Blog', 'header_item'=>1), 
        
        34   => array('id' =>34 , 'name' => 'Most top of the page'                            , 'hook' => 'Banner', 'full_width' => 1),
        70   => array('id' =>70 , 'name' => 'After checkout(PaymentReturn)'                   , 'hook' => 'PaymentReturn'),
        // 69   => array('id' =>69 , 'name' => 'Coming soon page'                                , 'hook' => 'ComingSoon'),
        101  => array('id' =>101 , 'name' => 'Reassurance info on shopping cart and checkout pages.', 'hook' => 'Reassurance'),
        103  => array('id' =>103 , 'name' => 'My account dashboard', 'hook' => 'MyAccountDashboard'),

        106   => array('id' =>106 , 'name' => 'Order confirmation page'         , 'hook' => 'OrderConfirmation2'),
        
        108801   => array('id' =>108801 , 'name' => 'Product in section'   , 'hook' => 'ProductSection', 'stretched' => 1, 'full_width' => 1),
        
        122 => array('id' =>122 , 'name' => 'Footer last' , 'hook' => 'FooterBottomRight'),
        123 => array('id' =>123 , 'name' => 'Footer bottom (Align left)'  , 'hook' => 'FooterBottomLeft'),
        
        125 => array('id' =>125 , 'name' => 'Topbar left - displayNav1' , 'hook' => 'Nav1'),
        126 => array('id' =>126 , 'name' => 'Topbar right - displayNav2'  , 'hook' => 'Nav2'),
        127 => array('id' =>127 , 'name' => 'Topbar center - displayNav3'  , 'hook' => 'Nav3'),
        1253 => array('id' =>1253 , 'name' => 'Topbar left blog - displayNav1' , 'hook' => 'Nav1blog'),
		1263 => array('id' =>1263 , 'name' => 'Topbar right blog - displayNav2'  , 'hook' => 'Nav2blog'),
		1273 => array('id' =>1273 , 'name' => 'Topbar center blog - displayNav3'  , 'hook' => 'Nav3blog'),
        998 => array('id' =>998 , 'name' => 'Text in the registration box'  , 'hook' => 'RegisterText'),
        1001 => array('id' =>1001 , 'name' => 'Text in manufacturer page'  , 'hook' => 'BrandsText'),
        997 => array('id' =>997 , 'name' => 'The last product in the category'  , 'hook' => 'ButtonNextText'),
        1014   => array('id' =>1014 , 'name' => 'After registartion text'      , 'hook' => 'RegisterOn'),
        1015   => array('id' =>1015 , 'name' => 'Mini cart empty' , 'hook' => 'CartEmpty'),
        1016   => array('id' =>1016 , 'name' => 'Cart top text' , 'hook' => 'CartTopText', 'full_width' => 1),
        1017   => array('id' =>1017 , 'name' => 'Cart checkout bottom' , 'hook' => 'CartCheckoutBottom', 'full_width' => 1),
        101771   => array('id' =>101771 , 'name' => 'Comment box text' , 'hook' => 'CommentsText', 'full_width' => 1),
        101772   => array('id' =>101772 , 'name' => 'Left side of epmty search formform'   , 'hook' => 'SearchForm'),
        101773   => array('id' =>101773 , 'name' => 'Strona o nas'   , 'hook' => 'About'),
		101774   => array('id' =>101774 , 'name' => 'Strona dystrybutorów'   , 'hook' => 'Distribution'),
		101775   => array('id' =>101775 , 'name' => 'Strefa architekta'   , 'hook' => 'Architecture'),
		101776   => array('id' =>101776 , 'name' => 'Strefa architekta - dolna strefa'   , 'hook' => 'ArchitectureBottom'),
		101777   => array('id' =>101777 , 'name' => 'Strona konfiguratora'   , 'hook' => 'Configurator'),
		101778   => array('id' =>101778 , 'name' => 'Strona aplikacji'   , 'hook' => 'Application'),
		101779   => array('id' =>101779 , 'name' => 'Strona projektantów'   , 'hook' => 'Designers'),
        101780   => array('id' =>101780 , 'name' => 'Strona o nas - dolna strefa'   , 'hook' => 'AboutBottom'),

        
    );
    // key: type+00
    public static $location_extra = array(
        '300' => array('hook' => 'CMSExtra'),
        '400' => array('hook' => 'CategoryHeader'),
        '500' => array('hook' => 'CategoryFooter', 'full_width' => 1),
        '600' => array('hook' => 'ProductRightColumn'),
        '700' => array('hook' => 'FooterProduct'),
        '800' => array('hook' => 'ProductCenterColumn'),
        '900' => array('hook' => 'ProductExtraContent'),
        '1000' => array('hook' => 'ProductExtraContent'),
        '1500' => array('hook' => 'ManufacturerHeader'),
        '1600' => array('hook' => 'ManufacturerFooter'),
        '2000' => array('hook' => 'StBlogArticleTop'),
        '2100' => array('hook' => 'StBlogContent'),
    );
    public static $module = array();
    public static $type = array();
    public static $cookie_location = array();
    public static $_width = array(
        array('id'=>1, 'name'=> '1/12'),
        array('id'=>1.2, 'name'=> '1.2/12'),
        array('id'=>1.5, 'name'=> '1.5/12'),
        array('id'=>2, 'name'=> '2/12'),
        array('id'=>2.4,'name'=> '2.4/12'),
        array('id'=>3,'name'=> '3/12'),
        array('id'=>4, 'name'=> '4/12'),
        array('id'=>5, 'name'=> '5/12'),
        array('id'=>6, 'name'=> '6/12'),
        array('id'=>7, 'name'=> '7/12'),
        array('id'=>8, 'name'=> '8/12'),
        array('id'=>9, 'name'=> '9/12'),
        array('id'=>10, 'name'=> '10/12'),
        array('id'=>11, 'name'=> '11/12'),
        array('id'=>12, 'name'=> '12/12'),
    );
     public static $privatCss = array(
        1 => array('id' =>1 , 'name' => 'Treść środkowa w górnej belce'),
        2 => array('id' =>2 , 'name' => 'Treść prawa w górnej belce'),
        3 => array('id' =>3 , 'name' => 'Treść o firmie - strona główna'),
        4 => array('id' =>4 , 'name' => 'Treść na stronie szukania - brak wyników wyszukiwania'),
        5 => array('id' =>5 , 'name' => 'Treść o firmie - stopka'),
		6 => array('id' =>6 , 'name' => 'Linki socialne - stopka'),
		7 => array('id' =>7 , 'name' => 'Płatności i wysyłka w stopce'),
		8 => array('id' =>8 , 'name' => 'Strefa architekta w stopce'),
		9 => array('id' =>9 , 'name' => 'Boks kontaktowy na karcie produktu'),
		10 => array('id' =>10 , 'name' => 'Motto na stronie głównej'),
		11 => array('id' =>11 , 'name' => 'Strona konfiguratora'),
		
    
    );
    
    public $googleFonts;
    public $stblog_status = true;
    public static $span_map = array(
        3  => '3',
        43 => '2',
        56 => '2-4',
        44 => '4',
        45 => '5',
        46 => '6',
        81 => '7',
        82 => '8',
        83 => '9',
        84 => '10',
        47 => '12',
        
        322  => '3',
        4322 => '2',
        5622 => '2-4',
        4422 => '4',
        4522 => '5',
        4622 => '6',
        8122 => '7',
        8222 => '8',
        8322 => '9',
        8422 => '10',
        4722 => '12',
        
        3272  => '3',
        4372 => '2',
        5672 => '2-4',
        4472 => '4',
        4572 => '5',
        4672 => '6',
        8172 => '7',
        8272 => '8',
        8372 => '9',
        8472 => '10',
        4772 => '12',
        
        
        32243    => '3',
        432243   => '2',
        562243   => '2-4',
        442243   => '4',
        452243   => '5',
        462243   => '6',
        812243   => '7',
        822243   => '8',
        832243   => '9',
        842243   => '10',
        472243   => '12',
        
        
        32244    => '3',
        432244   => '2',
        562244   => '2-4',
        442244   => '4',
        452244   => '5',
        462244   => '6',
        812244   => '7',
        822244   => '8',
        832244   => '9',
        842244   => '10',
        472244   => '12',
        
        32245    => '3',
        432245   => '2',
        562245   => '2-4',
        442245   => '4',
        452245   => '5',
        462245   => '6',
        812245   => '7',
        822245   => '8',
        832245   => '9',
        842245   => '10',
        472245   => '12',
		
        

        12 => '3',
        48 => '2',
        57 => '2-4',
        49 => '4',
        50 => '5',
        51 => '6',
        91 => '7',
        92 => '8',
        93 => '9',
        94 => '10',
        52 => '12',
    );
    public $vc_hooks;
    protected $templatePath;
	function __construct()
	{
		$this->name          = 'steasycontent';
		$this->tab           = 'front_office_features';
		$this->version       = '1.6.9';
		$this->author        = 'PrestaShop';
		$this->need_instance = 0;
        $this->bootstrap     = true;
        
		parent::__construct();

		$this->displayName = $this->getTranslator()->trans('Advanced custom content', array(), 'Modules.Steasycontent.Admin');
		$this->description = $this->getTranslator()->trans('This module is used to create tabs, accordions, FAQ, parallax block, products sliders, lists, textbox sliders, testimonials and more.', array(), 'Modules.Steasycontent.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        
        $this->googleFonts = include(_PS_MODULE_DIR_.'stthemeeditor/googlefonts.php');//this got to be here, child classes use it

        $this->id_st_easy_content = (int)Tools::getValue('id_st_easy_content');
        $this->id_st_easy_content_column = (int)Tools::getValue('id_st_easy_content_column');
        $this->initElements();

        self::$text_width = array(
            array('id' => 90, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 90%'),
            array('id' => 91, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 90%'),
            array('id' => 92, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 90%'),
            array('id' => 80, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 80%'),
            array('id' => 81, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 80%'),
            array('id' => 82, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 80%'),
            array('id' => 70, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 70%'),
            array('id' => 71, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 70%'),
            array('id' => 72, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 70%'),
            array('id' => 60, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 60%'),
            array('id' => 61, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 60%'),
            array('id' => 62, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 60%'),
            array('id' => 50, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 50%'),
            array('id' => 51, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 50%'),
            array('id' => 52, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 50%'),
            array('id' => 30, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 30%'),
            array('id' => 31, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 30%'),
            array('id' => 32, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 30%'),
            array('id' => 20, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 20%'),
            array('id' => 21, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 20%'),
            array('id' => 22, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 20%'),
            array('id' => 10, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 10%'),
            array('id' => 11, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 10%'),
            array('id' => 12, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 10%'),
        );
        
        self::$module = array(
            array('id' => 'stfeaturedslider', 'name' => $this->getTranslator()->trans('Featured products slider', array(), 'Modules.Steasycontent.Admin')),
            array('id' => 'sthomenew', 'name' => $this->getTranslator()->trans('New products slider', array(), 'Modules.Steasycontent.Admin')),
            // array('id' => 'stproductcategoriesslider', 'name' => $this->getTranslator()->trans('Product slider for each category', array(), 'Modules.Steasycontent.Admin')),
            array('id' => 'stspecialslider', 'name' => $this->getTranslator()->trans('Special products slider', array(), 'Modules.Steasycontent.Admin')),
            array('id' => 'stbestsellers', 'name' => $this->getTranslator()->trans('Top-sellers slider', array(), 'Modules.Steasycontent.Admin')),
            // array('id' => 'stswiper', 'name' => $this->getTranslator()->trans('Swiper', array(), 'Modules.Steasycontent.Admin')),
            // array('id' => 'stowlcarousel', 'name' => $this->getTranslator()->trans('Owl carousel', array(), 'Modules.Steasycontent.Admin')),
            array('id' => 'stbrandsslider', 'name' => $this->getTranslator()->trans('Brands slider', array(), 'Modules.Steasycontent.Admin')),
            array('id' => 'stfeaturedcategories', 'name' => $this->getTranslator()->trans('Featured categories', array(), 'Modules.Steasycontent.Admin')),
        );
        
        self::$type = array(
            1 => array('value' => 1, 'id' => 'type_1', 'label' => $this->getTranslator()->trans('Hook', array(), 'Modules.Steasycontent.Admin')),
            2 => array('value' => 2, 'id' => 'type_2', 'label' => $this->getTranslator()->trans('Module', array(), 'Modules.Steasycontent.Admin')),
            3 => array('value' => 3, 'id' => 'type_3', 'label' => $this->getTranslator()->trans('CMS page', array(), 'Modules.Steasycontent.Admin')),
            4 => array('value' => 4, 'id' => 'type_4', 'label' => $this->getTranslator()->trans('Category page header', array(), 'Modules.Steasycontent.Admin')),
            5 => array('value' => 5, 'id' => 'type_5', 'label' => $this->getTranslator()->trans('Category page footer', array(), 'Modules.Steasycontent.Admin')),
            6 => array('value' => 6, 'id' => 'type_6', 'label' => $this->getTranslator()->trans('Product right column', array(), 'Modules.Steasycontent.Admin')),
            7 => array('value' => 7, 'id' => 'type_7', 'label' => $this->getTranslator()->trans('Product footer', array(), 'Modules.Steasycontent.Admin')),
            8 => array('value' => 8, 'id' => 'type_8', 'label' => $this->getTranslator()->trans('Product center column', array(), 'Modules.Steasycontent.Admin')),
            9 => array('value' => 9, 'id' => 'type_9', 'label' => $this->getTranslator()->trans('Product tab', array(), 'Modules.Steasycontent.Admin')),
            10 => array('value' => 10, 'id' => 'type_10', 'label' => $this->getTranslator()->trans('Product description', array(), 'Modules.Steasycontent.Admin')),
            15 => array('value' => 15, 'id' => 'type_15', 'label' => $this->getTranslator()->trans('Manufacture page header', array(), 'Modules.Steasycontent.Admin')),
            16 => array('value' => 16, 'id' => 'type_16', 'label' => $this->getTranslator()->trans('Manufacture page Footer', array(), 'Modules.Steasycontent.Admin')),
            20 => array('value' => 20, 'id' => 'type_20', 'label' => $this->getTranslator()->trans('Blog article top', array(), 'Modules.Steasycontent.Admin')),
            21 => array('value' => 21, 'id' => 'type_21', 'label' => $this->getTranslator()->trans('Blog article content', array(), 'Modules.Steasycontent.Admin')),
        );
        
        self::$cookie_location = array(
            0 => array('id' => 0, 'name'=>$this->getTranslator()->trans('Page top', array(), 'Modules.Steasycontent.Admin')),
            1 => array('id' => 1, 'name'=>$this->getTranslator()->trans('Page bottom', array(), 'Modules.Steasycontent.Admin')),
            2 => array('id' => 2, 'name'=>$this->getTranslator()->trans('Page left', array(), 'Modules.Steasycontent.Admin')),
            3 => array('id' => 3, 'name'=>$this->getTranslator()->trans('Page right', array(), 'Modules.Steasycontent.Admin')),
            4 => array('id' => 4, 'name'=>$this->getTranslator()->trans('Page Center', array(), 'Modules.Steasycontent.Admin')),
        );
        
        if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog')) {
            $this->stblog_status = false;
        } 
        if($this->stblog_status)
        {
            require_once (_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
            require_once (_PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php');
        } else {
            // Remove blog from show on list.
            unset(self::$type[20]);
        }
        $this->vc_hooks = array(
            $this->getTranslator()->trans('Full width block', array(), 'Admin.Theme.Transformer') => 'displayFullWidthTop',
            $this->getTranslator()->trans('Block', array(), 'Admin.Theme.Transformer') => 'displayHome',
            $this->getTranslator()->trans('Column block', array(), 'Admin.Theme.Transformer') => 'displayLeftColumn',
            $this->getTranslator()->trans('Footer block', array(), 'Admin.Theme.Transformer') => 'displayStackedFooter1',
        );
        $this->templatePath = 'module:'.$this->name.'/views/templates/hook/';
	}
    
    private function initTabNames()
    {
        $this->_tabs = array(
            array('id'  => '0,1,2', 'name' => $this->getTranslator()->trans('General settings', array(), 'Modules.Steasycontent.Admin')),
            array('id'  => '5,6,7', 'name' => $this->getTranslator()->trans('Style settings', array(), 'Modules.Steasycontent.Admin')),
        );
    }
    private function initElements()
    {
        $this->_elements = array(
                5 => array(
                    'id' => 5,
                    'name' => $this->getTranslator()->trans('Text banner', array(), 'Modules.Steasycontent.Admin'),
                ),
                1 => array(
                    'id' => 1,
                    'name' => $this->getTranslator()->trans('Icon with text', array(), 'Modules.Steasycontent.Admin'),
                    'tab' => array(
                        array('id'  => '0', 'name' => $this->getTranslator()->trans('General settings', array(), 'Modules.Steasycontent.Admin')),
                        array('id'  => '5,6,7', 'name' => $this->getTranslator()->trans('Style settings', array(), 'Modules.Steasycontent.Admin')),
                    ),
                ),
                2 => array(
                    'id' => 2,
                    'name' => $this->getTranslator()->trans('Plain text, Text with image', array(), 'Modules.Steasycontent.Admin'),
                ),
                8 => array(
                    'id' => 8,
                    'name' => $this->getTranslator()->trans('Teams, Text sliders, Testimonals', array(), 'Modules.Steasycontent.Admin'),
                ),
                3 => array(
                    'id' => 3,
                    'name' => $this->getTranslator()->trans('Accordions, FAQ', array(), 'Modules.Steasycontent.Admin'),
                ),
                4 => array(
                    'id' => 4,
                    'name' => $this->getTranslator()->trans('Tabs', array(), 'Modules.Steasycontent.Admin'),
                ),
                6 => array(
                    'id' => 6,
                    'name' => $this->getTranslator()->trans('Products', array(), 'Modules.Steasycontent.Admin'),
                    'tab' => array(
                        array('id'  => '0,1,2', 'name' => $this->getTranslator()->trans('General settings', array(), 'Modules.Steasycontent.Admin')),
                        array('id'  => '5', 'name' => $this->getTranslator()->trans('Slider settings', array(), 'Modules.Steasycontent.Admin')),
                    ),
                ),
                7 => array(
                    'id' => 7,
                    'name' => $this->getTranslator()->trans('Google Map', array(), 'Modules.Steasycontent.Admin'),
                ),
                /*9 => array(
                    'id' => 9,
                    'name' => $this->getTranslator()->trans('Cookie law', array(), 'Modules.Steasycontent.Admin'),
                ),*/
                10 => array(
                    'id' => 10,
                    'name' => $this->getTranslator()->trans('Lists and social icons', array(), 'Modules.Steasycontent.Admin'),
                ),
                11 => array(
                    'id' => 11,
                    'name' => $this->getTranslator()->trans('Separators', array(), 'Modules.Steasycontent.Admin'),
                ),
                /*
                12 => array(
                    'id' => 12,
                    'name' => $this->getTranslator()->trans('Videos', array(), 'Modules.Steasycontent.Admin'),
                ),*/
            );
    }
    
	function install()
	{
		$res = parent::install() &&
			$this->installDB() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displayCMSExtra') &&
            $this->registerHook('actionShopDataDuplication') &&
            $this->registerHook('displayModuleCustomContent') &&
            $this->registerHook('vcBeforeInit') &&
            $this->add_quick_access();
			
		if ($res)
			foreach(Shop::getShops(false) as $shop)
				$res &= $this->sampleData($shop['id_shop']);
        $this->prepareHooks();
        $this->clearEasyContentCache();
        return $res;
	}

	public function installDB()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_easy_content` (
				`id_st_easy_content` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `type` tinyint(3) unsigned NOT NULL DEFAULT 1,
                `location` int(10) unsigned NOT NULL DEFAULT 0, 
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `id_cms` int(10) unsigned NOT NULL DEFAULT 0,
                `id_product` varchar(255) DEFAULT NULL,
                `id_manufacturer` int(10) unsigned NOT NULL DEFAULT 0,
                `id_st_blog` int(10) unsigned NOT NULL DEFAULT 0,
                `module` varchar(64) DEFAULT NULL,
                `module_align` varchar(32) DEFAULT NULL,
                `display_on` int(10) unsigned NOT NULL DEFAULT 0,
                `text_color` varchar(7) DEFAULT NULL,
                `link_color` varchar(7) DEFAULT NULL,
                `link_hover` varchar(7) DEFAULT NULL,
                `text_bg` varchar(7) DEFAULT NULL,
                `text_align` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `mobile_text_align` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `margin_top` int(10) unsigned NOT NULL DEFAULT 0,
                `margin_bottom` int(10) unsigned NOT NULL DEFAULT 0,
                `margin_top_mobile` int(10) unsigned NOT NULL DEFAULT 0,
                `margin_bottom_mobile` int(10) unsigned NOT NULL DEFAULT 0,
                `width` tinyint(2) unsigned NOT NULL DEFAULT 0,
                `btn_color` varchar(7) DEFAULT NULL,
                `btn_bg` varchar(7) DEFAULT NULL,
                `btn_hover_color` varchar(7) DEFAULT NULL,
                `btn_hover_bg` varchar(7) DEFAULT NULL,
                `top_spacing` varchar(10) DEFAULT NULL,
                `bottom_spacing` varchar(10) DEFAULT NULL,
                `top_spacing_mobile` varchar(10) DEFAULT NULL,
                `bottom_spacing_mobile` varchar(10) DEFAULT NULL,
                `bg_pattern` tinyint(2) unsigned NOT NULL DEFAULT 0,
                `bg_img` varchar(255) DEFAULT NULL,
                `bg_img_width` int(10) unsigned NOT NULL DEFAULT 0,
                `bg_img_height` int(10) unsigned NOT NULL DEFAULT 0,
                `speed` float(4,1) unsigned NOT NULL DEFAULT 0.6,
                `bg_img_v_offset` int(10) unsigned NOT NULL DEFAULT 0,
                `video_v_offset` int(10) unsigned NOT NULL DEFAULT 0,
                `video_poster` varchar(255) DEFAULT NULL,
                `mpfour` varchar(255) DEFAULT NULL,
                `webm` varchar(255) DEFAULT NULL,
                `ogg` varchar(255) DEFAULT NULL,
                `loop` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `height_full_zone` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `height_full_zone_align` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `muted` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `title_align` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `title_font_size` int(10) unsigned NOT NULL DEFAULT 0,
                `title_color` varchar(7) DEFAULT NULL,
                `title_bottom_border_color` varchar(7) DEFAULT NULL,
                `title_bottom_border_color_h` varchar(7) DEFAULT NULL,
                `title_bottom_border` varchar(10) DEFAULT NULL,
                `full_screen` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `easy_coneat_page` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `easy_coneat_filtr` tinyint(1) unsigned NOT NULL DEFAULT 1,
                
				PRIMARY KEY (`id_st_easy_content`),
                KEY `index_type` (`type`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_easy_content_lang` (
				`id_st_easy_content` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`id_lang` int(10) unsigned NOT NULL ,
                `title` varchar(255) DEFAULT NULL,
                `name` varchar(255) DEFAULT NULL,
    			`url` varchar(255) DEFAULT NULL,
				`text` text DEFAULT NULL,
				PRIMARY KEY (`id_st_easy_content`, `id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_easy_content_shop` (
				`id_st_easy_content` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_easy_content`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_easy_content_column` (
                `id_st_easy_content_column` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_st_easy_content` int(10) unsigned NOT NULL DEFAULT 0,
                `id_parent` int(10) unsigned NOT NULL DEFAULT 0,
                `name` varchar(255) DEFAULT NULL, 
                `width` float(3,1) unsigned NOT NULL DEFAULT 0,
                `width_md` float(3,1) unsigned NOT NULL DEFAULT 0,
                `width_xs` float(3,1) unsigned NOT NULL DEFAULT 12,
                `margin_top` int(10) unsigned DEFAULT 0,
                `margin_bottom` int(10) unsigned DEFAULT 0,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `element` int(10) unsigned NOT NULL DEFAULT 0,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `bg_image` varchar(255) DEFAULT NULL,
                `bg_color` varchar(7) DEFAULT NULL,
                PRIMARY KEY (`id_st_easy_content_column`),
                KEY `id_st_easy_content` (`id_st_easy_content`),
                KEY `element` (`element`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');

        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_easy_content_element` (
                `id_st_easy_content_element` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_st_easy_content_column` int(10) unsigned NOT NULL DEFAULT 0,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                PRIMARY KEY (`id_st_easy_content_element`),
                KEY `id_st_easy_content_column` (`id_st_easy_content_column`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');
        
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_easy_content_setting` (
                `id_st_easy_content_setting` int(10) unsigned NOT NULL DEFAULT 0,
                `setting_k` varchar(64) NOT NULL,
                `setting_v` text DEFAULT NULL,
                `setting_type` tinyint(1) unsigned NOT NULL DEFAULT 1,
                PRIMARY KEY (`id_st_easy_content_setting`, `setting_k`, `setting_type`),
                KEY `setting_k` (`setting_k`),
                KEY `setting_type` (`setting_type`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');
            
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_easy_content_font` (
                `id_st_easy_content` int(10) unsigned NOT NULL,
                `font_name` varchar(255) NOT NULL
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');

		return $return;
	}
    public function sampleData($id_shop)
    {
        $data = @file_get_contents($this->local_path.'install_data.txt');
        if (!$data) {
            return false;
        }
        require_once $this->local_path.'classes/SampleData.php';
        $object = new SampleData;
        $object->import($id_shop, unserialize($data));
        return true;
    }
    public function dumpSampleData($id_shop)
    {
        $file = $this->local_path.'install_data.txt';
        require_once $this->local_path.'classes/SampleData.php';
        $object = new SampleData;
        $object->export($id_shop, $file);
        return true;
    }
	public function uninstall()
	{
	    $this->clearEasyContentCache();
		// Delete configuration
		return $this->uninstallDB() && parent::uninstall();
	}

	public function uninstallDB()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_easy_content`,`'._DB_PREFIX_.'st_easy_content_lang`,`'._DB_PREFIX_.'st_easy_content_shop`,`'._DB_PREFIX_.'st_easy_content_font`,`'._DB_PREFIX_.'st_easy_content_column`,`'._DB_PREFIX_.'st_easy_content_setting`,`'._DB_PREFIX_.'st_easy_content_element`,`'._DB_PREFIX_.'st_easy_content_item`');
	}
    
	public function getContent()
	{ 
		/*$this->registerHook('displayCategoryHeaderListing');
		$this->registerHook('displayManufacturerHeader');
		$this->registerHook('displayManufacturerHeaderListing');
		$this->registerHook('displayPromotion');
		$this->registerHook('displayPromotionListing');
		$this->registerHook('displayNewproduct');
		$this->registerHook('displayNewproductListing');
		$this->registerHook('displaySearch');
		$this->registerHook('displaySearchListing');
		$this->registerHook('displayBestsales');
		$this->registerHook('displayBestsalesListing');
		$this->registerHook('displayCategoryHeaderListing');*/
	    $id_st_easy_content = $this->id_st_easy_content;
        if(Tools::getValue('act')=='delete_image' && $id = (int)Tools::getValue('st_s_id'))
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $k = Tools::getValue('st_s_k');
            $t = Tools::getValue('st_s_t');
            if ($t == 1) {
                // Columns images.
                $easycontent_column = new StEasyContentColumnClass($id);
                if ($easycontent_column->id) {
                    $easycontent_column->bg_image = '';
                    if ($easycontent_column->save())
                        $result['r'] = true;
                }
            } elseif ($t == 2) {
                // Elements images.
                if(StEasyContentSettingClass::updateSetting($id, $k, '', $t))
                    $result['r'] = true;    
            } else {
                $easycontent = new StEasyContentClass($id);
                if (Validate::isLoadedObject($easycontent)) {
                    $easycontent->$k = '';
                    if ($easycontent->save()) {
                        $result['r'] = true;
                    }
                }
            }
            die(json_encode($result));
        }

		$this->context->controller->addJS($this->_path. 'views/js/admin.js');
        $this->context->controller->addCss($this->_path.'views/css/admin.css');
        $this->_html .= '<script type="text/javascript">var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';var go_to_advanced_confirm="'.$this->getTranslator()->trans('Did you save all changes you just made? Unsaved changes will lose.', array(), 'Modules.Steasycontent.Admin').'"</script>';
		
		if (isset($_POST['savesteasycontent']) || isset($_POST['savesteasycontentAndStay']))
		{
			if ($id_st_easy_content)
				$easy_content = new StEasyContentClass((int)$id_st_easy_content);
			else
				$easy_content = new StEasyContentClass();
                
			$easy_content->copyFromPost();
            $easy_content->location = 0;                
            $easy_content->id_category = 0;
            $easy_content->id_manufacturer = 0;
            $easy_content->id_product = '';
            $easy_content->id_cms = 0;
            $easy_content->id_st_blog = 0;
            $easy_content->module = '';
            
            switch((int)Tools::getValue('type')) {
                case 1:
                    $easy_content->location = (int)Tools::getValue('location');
                    break;
                case 2:
                    if ($module = Tools::getValue('module')) {
                        list($module, $algin) = explode('_', $module);
                        if ($module && $algin) {
                            $easy_content->module = $module;
                            $easy_content->module_align = $algin;
                        }
                    }
                    break;
                case 3:
                    $easy_content->id_cms = (int)Tools::getValue('id_cms');
                    break;
                case 4:
                case 5:
                    $easy_content->id_category = (int)Tools::getValue('id_category');
                    break;
                case 6:
                case 7:
                case 8:
                case 9:
                case 10:
                    if ($filter = Tools::getValue('id_category_brand'))
                    {
                        list($in, $id) = explode('_', $filter);
                        if ($in > 0 && $id > 0)
                            if ($in == 1) {
                                if ($ids = Tools::getValue('st_id_product')) {
                                    $easy_content->id_product = ','.implode(',', $ids).',';
                                }
                            }
                            elseif ($in == 2)
                                $easy_content->id_category = $id;
                            elseif($in == 3)
                                $easy_content->id_manufacturer = $id;
                    }
                    break;
                case 15:
                case 16:
                    $easy_content->id_manufacturer = (int)Tools::getValue('id_manufacturer');
                    break;
                case 20:
                case 21:
                    $easy_content->id_st_blog = (int)Tools::getValue('id_st_blog');
                    break;
                default:;
            }
            
            $error = array();

            $res = $this->stUploadImage('bg_img');
            if(count($res['error']))
                $error = array_merge($error,$res['error']);
            elseif($res['image'])
            {
                $easy_content->bg_img = $res['image'];
                $easy_content->bg_img_width = $res['width'];
                $easy_content->bg_img_height = $res['height'];
            }

            $res = $this->stUploadImage('video_poster');
            if(count($res['error']))
                $error = array_merge($error,$res['error']);
            elseif($res['image'])
            {
                $easy_content->video_poster = $res['image'];
            }

			if (!count($error) && $easy_content->validateFields(false) && $easy_content->validateFieldsLang(false))
            {
                $shop_ids = $easy_content->getShopIds();
                $easy_content->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_easy_content')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $easy_content->id_shop_list = array_unique($id_shop_list);
                if($easy_content->save())
                {
                    $jon = trim(Tools::getValue('google_font_name'),'¤');
                    StEasyContentFontClass::deleteByContent($easy_content->id);
                    $jon_arr = array_unique(explode('¤', $jon));
                    if (count($jon_arr))
                        StEasyContentFontClass::changeContentFont($easy_content->id, $jon_arr);
                    
                    $this->prepareHooks();
                    $this->clearEasyContentCache();
                    if(isset($_POST['savesteasycontentAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content='.$easy_content->id.'&conf='.($id_st_easy_content?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));  
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Custom content', array(), 'Admin.Theme.Transformer').' '.($id_st_easy_content ? $this->getTranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                }
                else {
                    $easy_content->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during custom content', array(), 'Admin.Theme.Transformer').' '.($id_st_easy_content ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                } 
            }
			else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
		}
        if (isset($_POST['savesteasycontentrow']) || isset($_POST['savesteasycontentrowAndStay']))
		{
            if ($this->id_st_easy_content_column)
				$column = new StEasyContentColumnClass($this->id_st_easy_content_column);
			else
				$column = new StEasyContentColumnClass();
            $error = array();
    		$column->copyFromPost();
            // Set the column width to 0 as virtual row.
            $column->width = 0;
            
            $res = $this->stUploadImage('bg_image');
            if ($res['error']) {
                $error = array_merge($error, $res['error']);
            } elseif($res['image']) {
                $column->bg_image = $res['image'];
            }
            
            // add sub columns if exists.
            $name_array = $this->digPost('id_st_easy_content_name_');
            $width_array = $this->digPost('id_st_easy_content_width_');
            if (!$column->id && !count($width_array)) {
                $error[] = $this->getTranslator()->trans('Column width is required.', array(), 'Modules.Steasycontent.Admin');
            }
            
			if (!count($error) && $column->validateFields(false))
            {
                if($column->save())
                {
                    foreach($width_array AS $key => $width) {
                        if (!$width) {
                            continue;
                        }
                        $data = array(
                            'id_st_easy_content' => $column->id_st_easy_content,
                            'id_parent' => $column->id,
                            'name' => key_exists($key, $name_array) ? $name_array[$key] : '',
                            'width' => $width,
                            'margin_top' => $column->margin_top,
                            'margin_bottom' => $column->margin_bottom,
                            'position' => (int)$key
                        );
                        Db::getInstance()->insert('st_easy_content_column', $data, true);
                    }
                    
                    $this->clearEasyContentCache();
                    if(isset($_POST['savesteasycontentrowAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.$column->id.'&conf='.($this->id_st_easy_content_column?4:3).'&update'.$this->name.'row&row_edit&token='.Tools::getAdminTokenLite('AdminModules'));  
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf='.($this->id_st_easy_content_column?4:3).'&'.($column->id_parent?'id_st_easy_content_column='.$column->id_parent.'&viewsteasycontentcolumn':'id_st_easy_content='.$column->id_st_easy_content.'&viewsteasycontent').'&token='.Tools::getAdminTokenLite('AdminModules'));
                }                    
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during column', array(), 'Admin.Theme.Transformer').' '.($id_st_banner_group ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
            $this->clearEasyContentCache();
        }
        if (isset($_POST['savesteasycontentcolumn']) || isset($_POST['savesteasycontentcolumnAndStay']))
		{
            if ($this->id_st_easy_content_column)
				$column = new StEasyContentColumnClass($this->id_st_easy_content_column);
			else
				$column = new StEasyContentColumnClass();
            $error = array();
            if (!Tools::getValue('width')) {
                $error[] = $this->getTranslator()->trans('Column width is required.', array(), 'Modules.Steasycontent.Admin');
            }
    		$column->copyFromPost();
            $res = $this->stUploadImage('bg_image');
            if ($res['error']) {
                $error = array_merge($error, $res['error']);
            } elseif($res['image']) {
                $column->bg_image = $res['image'];
            }
			if (!count($error) && $column->validateFields(false))
            {
                if($column->save())
                {
                    $column->clearPosition();
                    $this->clearEasyContentCache();
                    if(isset($_POST['savesteasycontentcolumnAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.$column->id.'&conf='.($this->id_st_easy_content_column?4:3).'&update'.$this->name.'column&token='.Tools::getAdminTokenLite('AdminModules'));  
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.$this->buildQueryString($column).'&conf='.($this->id_st_easy_content_column?4:3).'&token='.Tools::getAdminTokenLite('AdminModules'));
                }                    
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during column', array(), 'Admin.Theme.Transformer').' '.($id_st_banner_group ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
            $this->clearEasyContentCache();
        }
        if (isset($_POST['savesteasycontentelement']) || isset($_POST['savesteasycontentelementAndStay']))
        {
            $id_st_easy_content_element = Tools::getValue('id_st_easy_content_element');
            if ($id_st_easy_content_element)
				$element = new StEasyContentElementClass($id_st_easy_content_element);
			else
				$element = new StEasyContentElementClass();
            $error = array();
    		$element->copyFromPost();
            
			if (!count($error) && $element->validateFields(false))
            {
                if($element->save())
                {
                    // Update element for column.
                    if ($selected_element = Tools::getValue('element')) {
                        // Assign default value for some elements.
                        $default = array(
                            1 => 'st_el_icon_with_text',
                            2 => 'st_el_text_block',
                            3 => 'st_el_accordion',
                            4 => 'st_el_tab',
                            5 => 'st_el_text_banner',
                            8 => 'st_el_textboxes',
                            10 => 'st_el_social',
                            11 => 'st_el_divider',
                        );
                        if (key_exists($selected_element, $default) && !isset($_POST[$default[$selected_element]])) {
                            $_POST[$default[$selected_element]] = '1_1';                            
                        }
                        StEasyContentColumnClass::updateElement($element->id_st_easy_content_column, $selected_element); 
                    }
                    
                    // upload images.
                    $images = $this->uploadSettingImages();
                    // Save meta data.
                    $this->SaveSettings($element, 2, $images);
                    // Generate google fonts.
                    StEasyContentFontClass::cacheFonts();
                    $this->clearEasyContentCache();
                    if(isset($_POST['savesteasycontentelementAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_element='.$element->id.'&conf='.($id_st_easy_content_element?4:3).'&update'.$this->name.'element&token='.Tools::getAdminTokenLite('AdminModules'));  
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf='.($id_st_easy_content_element?4:3).'&id_st_easy_content_column='.$element->id_st_easy_content_column.'&view'.$this->name.'column&token='.Tools::getAdminTokenLite('AdminModules'));
                }                    
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during element', array(), 'Admin.Theme.Transformer').' '.($id_st_banner_group ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savesteasycontentelementsetting']) || isset($_POST['savesteasycontentelementsettingAndStay']))
        {
			$column = new StEasyContentColumnClass($this->id_st_easy_content_column);
            
			if ($column->element || $element = Tools::getValue('element'))
            {
                // upload images.
                $images = $this->uploadSettingImages();
                // Save meta data.
                $this->SaveSettings($column, 1, $images);
                // Update element for column.
                if (!$column->element) {
                    StEasyContentColumnClass::updateElement($this->id_st_easy_content_column, $element); 
                }
                // Generate google fonts if necessary.
                //StEasyContentFontClass::cacheFonts();
                $this->clearEasyContentCache();
                if(isset($_POST['savesteasycontentelementsettingAndStay'])) {
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.$column->id.'&element='.($column->element?$column->element:$element).'&conf=4&set'.$this->name.'element&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else {
                    $query_string = '&id_st_easy_content_column='.$this->id_st_easy_content_column.'&viewsteasycontentcolumn&element='.($column->element?$column->element:$element);
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules'));
                }   
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Parameters error.', array(), 'Modules.Steasycontent.Admin'));
        }
	    if (Tools::isSubmit('statussteasycontent'))
        {
            $easy_content = new StEasyContentClass($this->id_st_easy_content);
            if($easy_content->id && $easy_content->toggleStatus())
            {
                $this->clearEasyContentCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            } 
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('statussteasycontentcolumn'))
        {
            $easycontent_column = new StEasyContentColumnClass($this->id_st_easy_content_column);
            if($easycontent_column->id && $easycontent_column->toggleStatus())
            {
                $this->clearEasyContentCache();
                if (!Tools::isSubmit('is_row')) {
                    $easycontent_column = new StEasyContentColumnClass($easycontent_column->id_parent); 
                }
			    if ($easycontent_column->id_parent) {
                $query_string = '&id_st_easy_content_column='.$easycontent_column->id_parent.'&viewsteasycontentcolumn';
                } else {
                    $query_string = '&id_st_easy_content='.$easycontent_column->id_st_easy_content.'&viewsteasycontent';
                }
    			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules'));
            } 
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('statussteasycontentelement'))
		{
            $easycontent_element= new StEasyContentElementClass(Tools::getValue('id_st_easy_content_element'));
            if ($easycontent_element->id) {
                $easycontent_element->toggleStatus();
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.$easycontent_element->id_st_easy_content_column.'&viewsteasycontentcolumn&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        if (Tools::isSubmit('deletesteasycontent'))
		{
			$easy_content = new StEasyContentClass((int)$id_st_easy_content);
            $top_columns = StEasyContentColumnClass::getSub(0, 0, $easy_content->id);
            
			if ($easy_content->id && $easy_content->delete()) {
                if(!$easy_content->hasMultishopEntries()) {
                    // Delete coluns and settings.
                    foreach($top_columns AS $value) {
                        // Delete top column.
                        StEasyContentColumnClass::deleteById($value['id_st_easy_content_column']);
                        foreach($subs = StEasyContentColumnClass::recurseTree($value['id_st_easy_content_column'], 0, 0, 0, 1) AS $sub) {
                            StEasyContentColumnClass::deleteById($sub['id_st_easy_content_column']);
                        }
                    }
                }
			}
            $this->prepareHooks();
            $this->clearEasyContentCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        if (Tools::isSubmit('deletesteasycontentcolumn'))
		{
            // Get all sub items.
            $subs = StEasyContentColumnClass::recurseTree($this->id_st_easy_content_column, 0, 0, 0, 1);
			$easy_content_column = new StEasyContentColumnClass($this->id_st_easy_content_column);
            $id_parent = $easy_content_column->id_parent;
			if ($easy_content_column->id && StEasyContentColumnClass::deleteById($easy_content_column->id)) {
                // Deleete subs.
                foreach($subs AS $column) {
                    StEasyContentColumnClass::deleteById($column['id_st_easy_content_column']);
                }
                $easy_content_column->clearPosition();
			}
            $this->prepareHooks();
            $this->clearEasyContentCache();
            
            if (Tools::isSubmit('delete_row')) {
                $easycontent_column = $easy_content_column;
            } else {
                // Parent column
                $easycontent_column = new StEasyContentColumnClass($id_parent);    
            }            
            if ($easycontent_column->id_parent) {
                $query_string = '&id_st_easy_content_column='.$easycontent_column->id_parent.'&viewsteasycontentcolumn';
            } else {
                $query_string = '&id_st_easy_content='.$easycontent_column->id_st_easy_content.'&viewsteasycontent';
            }
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        if (Tools::isSubmit('submitBulkdeletesteasycontent'))
        {
            if ($id_array = Tools::getValue('steasycontentBox')) {
                foreach($id_array AS $id) {
                    $easy_content = new StEasyContentClass((int)$id);
                    $top_columns = StEasyContentColumnClass::getSub(0, 0, $easy_content->id);
                    
        			if ($easy_content->id && $easy_content->delete()) {
                        if(!$easy_content->hasMultishopEntries()) {
                            // Delete coluns and settings.
                            foreach($top_columns AS $value) {
                                // Delete top column.
                                StEasyContentColumnClass::deleteById($value['id_st_easy_content_column']);
                                foreach($subs = StEasyContentColumnClass::recurseTree($value['id_st_easy_content_column'], 0, 0, 0, 1) AS $sub) {
                                    StEasyContentColumnClass::deleteById($sub['id_st_easy_content_column']);
                                }
                            }
                        }
        			} 
                }
            }
            $this->prepareHooks();
            $this->clearEasyContentCache();
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        if (Tools::isSubmit('submitBulkdeletesteasycontentcolumn'))
        {
            $query_string = '';
            if ($id_array = Tools::getValue('steasycontentcolumnBox')) {
                $id_parent = 0;
                foreach($id_array AS $id) {
                    $subs = StEasyContentColumnClass::recurseTree($id, 0, 0, 0, 1);
        			$easy_content_column = new StEasyContentColumnClass($id);
                    $easy_content_column->id && $id_parent = $easy_content_column->id_parent;
        			if ($easy_content_column->id && StEasyContentColumnClass::deleteById($easy_content_column->id)) {
                        // Deleete subs.
                        foreach($subs AS $column) {
                            StEasyContentColumnClass::deleteById($column['id_st_easy_content_column']);
                        }
        			}
                }
                $easycontent_column = new StEasyContentColumnClass($id_parent);
                if ($easycontent_column->id_parent) {
                    $query_string = '&id_st_easy_content_column='.$easycontent_column->id_parent.'&viewsteasycontentcolumn';
                } else {
                    $query_string = '&id_st_easy_content='.$easycontent_column->id_st_easy_content.'&viewsteasycontent';
                }
                
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        if (Tools::isSubmit('deletesteasycontentelement'))
		{
            $easycontent_element= new StEasyContentElementClass(Tools::getValue('id_st_easy_content_element'));
            $element = 0;
            if ($easycontent_element->id) {
                $easycontent_column = new StEasyContentColumnClass($easycontent_element->id_st_easy_content_column);
                $element = $easycontent_column->element;
            }
            if ($easycontent_element->id && $easycontent_element->delete()) {
                StEasyContentSettingClass::deleteById($easycontent_element->id, 2);
                // If there is no elements any more, update column element.
                if (!StEasyContentElementClass::getByColumnId($easycontent_element->id_st_easy_content_column)) {
                    StEasyContentColumnClass::updateElement($easycontent_element->id_st_easy_content_column, 0);
                }
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.$easycontent_element->id_st_easy_content_column.'&element='.$element.'&viewsteasycontentcolumn&token='.Tools::getAdminTokenLite('AdminModules'));
        }
	if (Tools::isSubmit('submitBulkdeletesteasycontentelement'))
        {
            if ($id_array = Tools::getValue('steasycontentelementBox')) {
                foreach($id_array AS $id) {
                    $id_st_easy_content_column = 0;
                    $easycontent_element= new StEasyContentElementClass($id);
                    if ($easycontent_element->id && $easycontent_element->delete()) {
                        $id_st_easy_content_column = $easycontent_element->id_st_easy_content_column;
                        StEasyContentSettingClass::deleteById($easycontent_element->id, 2);
                        // If there is no elements any more, update column element.
                        if (!StEasyContentElementClass::getByColumnId($easycontent_element->id_st_easy_content_column)) {
                            StEasyContentColumnClass::updateElement($easycontent_element->id_st_easy_content_column, 0);
                        }
                    }
                }
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.$id_st_easy_content_column.'&viewsteasycontentcolumn&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        if (Tools::isSubmit('copysteasycontent'))
        {
            if ($this->CopyStEasyContent(Tools::getValue('id_st_easy_content'))) {
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules')); 
            }
        }
        if (Tools::isSubmit('copysteasycontentelement'))
        {
            $easycontent_element = new StEasyContentElementClass(Tools::getValue('id_st_easy_content_element'));
            if ($this->CopyStEasyContentElement($easycontent_element->id)) {
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.$easycontent_element->id_st_easy_content_column.'&viewsteasycontentcolumn&token='.Tools::getAdminTokenLite('AdminModules')); 
            }
        }
		if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
        if (Tools::isSubmit('updatesteasycontent') || Tools::isSubmit('addsteasycontent'))
		{
			$helper = $this->initForm();
			return $this->_html.$helper->generateForm($this->fields_form);
		}
        elseif(Tools::isSubmit('viewsteasycontent') || Tools::isSubmit('viewsteasycontentcolumn'))
        {
            $id_st_easy_content_column = $this->id_st_easy_content_column;
            if(!$id_st_easy_content_column && !$id_st_easy_content)
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            $this->_html .= $this->getNavigate();
            $add_row_botton = '<div class="panel"><a class="btn btn-primary" href="'.AdminController::$currentIndex.'&configure='.$this->name.
            '&add'.$this->name.'row&'.($id_st_easy_content_column?'id_st_easy_content_column='.$id_st_easy_content_column:'id_st_easy_content='.$id_st_easy_content).
            '&token='.Tools::getAdminTokenLite('AdminModules').'">'.
            $this->getTranslator()->trans('Create a new row', array(), 'Modules.Steasycontent.Admin').
            '</a></div>';
            
            $rows = array();
            if(!$id_st_easy_content_column) {
                $rows = StEasyContentColumnClass::getSub(0, 0, $id_st_easy_content, true);
            }
            else {
                $rows = StEasyContentColumnClass::getSub($id_st_easy_content_column, 0, 0, true);
            }
            $query_string = '';
            if ($id_st_easy_content_column) {
                // Parent column
                $easycontent_column = new StEasyContentColumnClass($id_st_easy_content_column);
                $query_string = $this->buildQueryString($easycontent_column);
            }
            // Have sub columns.
            if ($rows) {
                $this->_html .= $add_row_botton;
                foreach ($rows as $column) {
                    $this->list_data = StEasyContentColumnClass::getSub($column['id_st_easy_content_column']);
                    $helper = $this->initColumnList($column['id_st_easy_content_column'], $query_string, $column);
                    $this->_html .= $helper->generateList($this->list_data, $this->fields_list).$this->displayWarning($this->getTranslator()->trans('Click on the View button at the end of each column to add content or to add more nested rows.', array(), 'Modules.Steasycontent.Admin'));
                }    
            } elseif($id_st_easy_content_column) {
                $easycontent_column = new StEasyContentColumnClass($id_st_easy_content_column);
                // Load element lists.
                if (($element = Tools::getValue('element')) || $easycontent_column->element) {
                    if ($element) {
                        $easycontent_column->element = $element;
                    }

                    $this->_html .= $this->displayWarning($this->getTranslator()->trans('If you want to change element type, you have to delete all items you have added here.', array(), 'Modules.Steasycontent.Admin'));
                    $this->_html .= $this->loadElementList($easycontent_column);
                    
                } elseif ($easycontent_column->id) {

                    $this->_html .= $this->displayWarning($this->getTranslator()->trans('You can continue to create rows to have a mixed content block, or choose an element below to display information on your site', array(), 'Modules.Steasycontent.Admin'));
                    $this->_html .= $add_row_botton;
                    // Select item type.
                    $element_list = '<div class="panel">
                                <ul class="easy_image_list clearfix">';
                    foreach($this->_elements as $v)
                        $element_list .= '<li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&view'.$this->name.'column&id_st_easy_content_column='.$easycontent_column->id.'&element='.$v['id'].'&token='.Tools::getAdminTokenLite('AdminModules').'" title="'.$v['name'].'"><img src="'.$this ->_path.'/views/img/e_'.$v['id'].'.jpg" /><div class="easy_image_name">'.$v['name'].'</div></a></li>';
                    $element_list .= '</ul></div>';
                    
                    // Back button
                    $back_button = '<div class="panel-footer">
                    	<a id="desc-steasycontentcolumn-back" class="btn btn-default" href="'.AdminController::$currentIndex.'&configure='.$this->name.$this->buildQueryString($easycontent_column).'&token='.Tools::getAdminTokenLite('AdminModules').'">
                    		<i class="process-icon-back "></i> <span>Back to parent</span>
                    	</a>
                    </div>';
                    $this->_html .= $element_list.$back_button;
                } else {
                    // Parameters error.
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                }
            } elseif ($this->id_st_easy_content) {
                // On the top list, show a empty list.
                $this->_html .= $add_row_botton;
                $helper = $this->initColumnList(0, $query_string);
                $this->_html .= $helper->generateList(array(), $this->fields_list);    
            }
            $this->_html .= $this->showHelp();
            return $this->_html;
        }
        elseif (Tools::isSubmit('updatesteasycontentelement') || Tools::isSubmit('addsteasycontentelement'))
        {
            $element = Tools::getValue('element');
            $id_st_easy_content_element = Tools::getValue('id_st_easy_content_element');
            if (!$element && $id_st_easy_content_element) {
                $element = (int)StEasyContentElementClass::getElement($id_st_easy_content_element);
            }
            if (!$element) {
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
			if ($id_st_easy_content_element) {
                $object = new StEasyContentElementClass($id_st_easy_content_element);
                $this->id_st_easy_content_column = $object->id_st_easy_content_column;
            }
            $this->_html .= $this->getNavigate();
            $extra_form = $this->loadExtraForm('formElement'.$element, 'initFormElement');

            if(isset($this->_elements[$element]['tab'])){
                $this->smarty->assign(array(
                    'ins_tabs' => $this->_elements[$element]['tab'],
                    'ins_tab_content' => $extra_form,
                ));
                $this->_html .= $this->display(__FILE__, 'bo_tab_layout.tpl');
            } else {
                $this->_html .= $extra_form;
            }

            return $this->_html;
        }
        elseif (Tools::isSubmit('setsteasycontentelement'))
        {
            $element = Tools::getValue('element');
            $easycontent_column = new StEasyContentColumnClass($this->id_st_easy_content_column);
            if (!$element && !$easycontent_column->element) {
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            if ($this->id_st_easy_content_column) {
                $this->_html .= $this->getNavigate();
            }
            $this->_html .= $this->loadExtraForm('formElement'.($element?$element:$easycontent_column->element), 'initFormElementSetting');
            return $this->_html;
        }
        elseif (Tools::isSubmit('updatesteasycontentcolumn') || Tools::isSubmit('addsteasycontentcolumn'))
        {
            if ($this->id_st_easy_content_column) {
                $this->_html .= $this->getNavigate();
            }
            $this->_html .= $this->loadExtraForm('formColumn');
            return $this->_html;
        }
        elseif(Tools::isSubmit('updatesteasycontentrow') || Tools::isSubmit('addsteasycontentrow'))
        {
            $this->_html .= $this->loadExtraForm('formRow');
            return $this->_html;
        }
		else
		{
            require_once(_PS_MODULE_DIR_.'stthemeeditor/classes/ThemeLicense.php');
            if (!ThemeLicense::themeIsValid()) {
                $this->_html = '<div class="panel">'.$this->getTranslator()->trans('You can\'t use this module, because of you\'ve not registered your theme yet, click %1%here%2% to register your theme in the Theme editor module.',  array('%1%'=>'<a href="'.AdminController::$currentIndex.'&configure=stthemeeditor&token='.Tools::getAdminTokenLite('AdminModules').'">','%2%'=>'</a>'), 'Admin.Theme.Transformer').'</div>';
                return $this->_html;
            }
            $this->list_data = StEasyContentClass::getListContent();
			$helper = $this->initList();
			return $this->_html.$helper->generateList($this->list_data, $this->fields_list).$this->displayWarning($this->getTranslator()->trans('Click on the View button at the end of each line to use the Advanced content editor.', array(), 'Modules.Steasycontent.Admin'));
		}
	}
	
	 public function CopyStEasyContent($id_st_easy_content = 0)
    {
        if (!$id_st_easy_content) {
            return false;
        }
        $easy_content = new StEasyContentClass($id_st_easy_content);
        if (!$easy_content->id) {
            return false;
        }
        $easy_content_new = clone $easy_content;
        $easy_content_new->id = 0;
        $easy_content_new->id_st_easy_content = 0;
        $shop_ids = $easy_content->getShopIds();
        $id_shop_list = array();
        foreach ($shop_ids as  $row) {
            $id_shop_list[] = $row['id_shop'];
        }
        if (!$id_shop_list) {
            $id_shop_list = array(Context::getContext()->shop->id);
        }
        $easy_content_new->id_shop_list = array_unique($id_shop_list);
        if ($easy_content_new->save()) {
            foreach(StEasyContentColumnClass::getSub(0, 0, $easy_content->id) as $row) {
                $this->CopyStEasyContentColumn($row['id_st_easy_content_column'], 0, $easy_content_new->id);    
            }
            $this->prepareHooks();
            $this->clearEasyContentCache();
        }
        return true;
    }

    public function CopyStEasyContentColumn($id_column_old, $id_column_new, $id_st_easy_content = 0)
    {
        if (!$id_column_old || !$id_column_new && !$id_st_easy_content) {
            return false;
        }
        $column = new StEasyContentColumnClass((int)$id_column_old);
        if (!$column->id) {
            return false;
        }
        $column_new = clone $column;
        $column_new->id = 0;
        $column_new->id_st_easy_content_column = 0;
        $column_new->id_st_easy_content = (int)$id_st_easy_content;
        $column_new->id_parent = (int)$id_column_new;
        if ($column_new->save()) {
            // Leaf node.
            if ($column_new->element) {
                // Load settings
                $this->LoadSettingsToObject($column, 1);
                $_POST = get_object_vars($column);
                $settings = StEasyContentSettingClass::digPost();
                foreach($settings AS $key => $setting) {
                    if (is_array($setting)) {
                        foreach($setting AS $k => $v) {
                            $v && $_POST[$key.'_'.$k] = $v;
                        }
                        unset($_POST[$key]);
                    }
                }
                $this->SaveSettings($column_new, 1);
                // Copy elements.
                foreach(StEasyContentElementClass::getByColumnId($column->id) as $row) {
                    $this->CopyStEasyContentElement($row['id_st_easy_content_element'], $column_new->id);    
                } 
            } else {
                foreach(StEasyContentColumnClass::getSub($column->id, 0, 0) as $row) {
                    $this->CopyStEasyContentColumn($row['id_st_easy_content_column'], $column_new->id, $id_st_easy_content);    
                }    
            }
        }
        return true;
    }

    public function CopyStEasyContentElement($st_easy_content_element, $id_st_easy_content_column = 0)
    {
        if (!$st_easy_content_element) {
            return false;
        }
        $element = new StEasyContentElementClass($st_easy_content_element);
        if (!$element->id) {
            return false;
        }
        $element_new = clone $element;
        $element_new->id = 0;
        $element_new->id_st_easy_content_element = 0;
        if ((int)$id_st_easy_content_column) {
            $element_new->id_st_easy_content_column = (int)$id_st_easy_content_column;    
        }
        if ($element_new->save()) {
            $this->LoadSettingsToObject($element, 2);
            $_POST = get_object_vars($element);
            $settings = StEasyContentSettingClass::digPost();
            foreach($settings AS $key => $setting) {
                if (is_array($setting)) {
                    foreach($setting AS $k => $v) {
                        $v && $_POST[$key.'_'.$k] = $v;
                    }
                    unset($_POST[$key]);
                }
            }
            $this->SaveSettings($element_new, 2);
        }
        return true;
    }

    public function showHelp(){
        $html = '<div class="st_help_block panel"><div class="panel-heading">'.$this->getTranslator()->trans('Help', array(), 'Modules.Steasycontent.Admin').'</div>';
        //$html .= '<p><a class="st_show_help btn btn-default" href="javascript:;">'.$this->getTranslator()->trans('Click here to get help', array(), 'Modules.Steasycontent.Admin').'</a><ol class="st_help_box"></p>';
        $html .= '<div class="alert alert-info">';
        $html .= '<p>'.$this->getTranslator()->trans('1. Create a new row with columns first, and then you can create elemtns like tabs, icons, lists in the columns. You can create as many rows as you want.', array(), 'Modules.Steasycontent.Admin').'</p>';
        $html .= '<p>'.$this->getTranslator()->trans('2. If you have already mastered the Advanced banner module, then you know how to use this module, cause they are logically the same.', array(), 'Modules.Steasycontent.Admin').'</p>';
        $html .= '<p>'.$this->getTranslator()->trans('3. You can learn how to use this module within few minutes, after that you wound find that it has unlimted possibility, you can create various custom block and put them everywhere you want. With it you can even create a responsive CMS page with a lot of fancy elements.', array(), 'Modules.Steasycontent.Admin').'</p>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }
    
	protected function initForm()
	{
        $id_st_easy_content = $this->id_st_easy_content;
		$easy_content = new StEasyContentClass($id_st_easy_content);
        
	    $google_font_name_html = $google_font_name =  $google_font_link = '';
        if(Validate::isLoadedObject($easy_content)){
            $jon_arr = StEasyContentFontClass::getByContent($easy_content->id);
            if(is_array($jon_arr) && count($jon_arr))
                foreach ($jon_arr as $key => $value) {
                    $google_font_name_html .= '<li id="#'.str_replace(' ', '_', strtolower($value['font_name'])).'_li" class="form-control-static"><button type="button" class="delGoogleFont btn btn-default" name="'.$value['font_name'].'"><i class="icon-remove text-danger"></i></button>&nbsp;<span style="'.$this->fontstyles($value['font_name']).'">style="'.$this->fontstyles($value['font_name']).'"</span></li>';

                    $google_font_name .= $value['font_name'].'¤';

                    $google_font_link .= '<link id="'.str_replace(' ', '_', strtolower($value['font_name'])).'_link" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $value['font_name']).'" />';
                }
        }
        
        $theme_repository = (new ThemeManagerBuilder($this->context, Db::getInstance()))->buildRepository();
        $theme = $theme_repository->getInstanceByName($this->context->shop->theme->getName());
        $page_layouts = $theme->getPageLayouts();
        
        $is_vc_installed = Module::isInstalled('jscomposer') && Module::isEnabled('jscomposer');
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs'                
			),
			'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Show on:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'type',
                    'required' => true,
                    'default_value' => 1,
                    'class' => 'show_on_type',
                    'values' => self::$type,
                    //To do move hook position preview to somewhere else
                    // 'desc' => '<div class="alert alert-info"><a href="javascript:;" onclick="$(\'#des_page_layout\').toggle();return false;">'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Modules.Steasycontent.Admin').'</a><div id="des_page_layout" style="display:none;"><img src="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" /></div></div>',
                ),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a hook:', array(), 'Modules.Steasycontent.Admin'),
					'name' => 'location',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->getApplyHook(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => 0,
							'label' => $is_vc_installed ? $this->getTranslator()->trans('For visual composer module', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
						)
					),
				),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a module:', array(), 'Modules.Steasycontent.Admin'),
					'name' => 'module',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->getApplyModule(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('--', array(), 'Modules.Steasycontent.Admin')
						)
					),
				),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a CMS page:', array(), 'Modules.Steasycontent.Admin'),
					'name' => 'id_cms',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->getApplyCms(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')
						)
					),
				),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a category:', array(), 'Modules.Steasycontent.Admin'),
					'name' => 'id_category',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->getApplyCategory(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')
						)
					),
				),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a manufacture:', array(), 'Modules.Steasycontent.Admin'),
					'name' => 'id_manufacturer',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->getApplyManufacture(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')
						)
					),
				),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a blog:', array(), 'Modules.Steasycontent.Admin'),
					'name' => 'id_st_blog',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->getApplyBlog(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')
						)
					),
				),
                array(
					'type' => 'select',
        			'label' => $this->getTranslator()->trans('Choose products/category/manufacturer:', array(), 'Modules.Steasycontent.Admin'),
                    'onchange' => 'handle_apply_to(this);',
        			'name' => 'id_category_brand',
                    'class' => 'fixed-width-xxl',
                    'options' => array(
                        'optiongroup' => array (
							'query' => $this->createLinks(),
							'label' => 'name'
						),
						'options' => array (
							'query' => 'query',
							'id' => 'id',
							'name' => 'name'
						),
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')
						),
        			),
				),
				
			array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Name of the own css class:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'privat_css',
                    'options' => array(
                        'query' => self::$privatCss,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
                        ),
                       
                    ),
                     'desc' => $this->getTranslator()->trans('After choosing one of the options for the main element will be added class privat_easy_#.<br>Deleting a classy or selecting another one may change the appearance of the item.', array(), 'Admin.Theme.Transformer'),
    
                ),
                
                array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Advanced category banners:', array(), 'Admin.Theme.Transformer'),
			'name' => 'baner_category_adv',
			'is_bool' => true,
            'default_value' => 0,
			'values' => array(
				array(
					'id' => 'baner_category_adv_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'baner_category_adv_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			    'desc' => $this->getTranslator()->trans('This option works if a given group of banners is to be displayed in a selected category.<br>It allows you to create banners between the products on the category listing.<br>If you set it to "yes", configure the group settings in the "Advanced category banners" zone.', array(), 'Admin.Theme.Transformer'),
      
		    ),
				
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Full screen:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'full_screen',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'full_screen_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'full_screen_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'desc' => $this->getTranslator()->trans('This option works for custom content blocks on FullWidth* hooks, cms pages, blog pages, most top of the page and blocks for visual composer.', array(), 'Modules.Steasycontent.Admin'),
                ),
                
                 array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Content visible only on the first page of the category:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'easy_coneat_page',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'easy_coneat_page_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'easy_coneat_page_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'desc' => $this->getTranslator()->trans('The option applies only to the selection of the content presentation on the selected category page.', array(), 'Admin.Theme.Transformer'),
                ),
                
                
                array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Item visible when filtering is enabled:', array(), 'Admin.Theme.Transformer'),
			'name' => 'easy_coneat_filtr',
			'is_bool' => true,
            'default_value' => 1,
			'values' => array(
				array(
					'id' => 'easy_coneat_filtr_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'easy_coneat_filtr_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			    'desc' => $this->getTranslator()->trans('The option applies only to the selection of the content presentation on the selected category page.', array(), 'Admin.Theme.Transformer'),
      
		    ),
                
                'products' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Specific products:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'ac_products',
                    'autocomplete' => false,
                    'class' => 'fixed-width-xxl',
                    'desc' => '',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Name:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'name',
                    'lang' => true,
                    'size' => 64,
                    'desc' => $this->getTranslator()->trans('For a reminder, show on backoffice only.', array(), 'Modules.Steasycontent.Admin'),
                ),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
					'name' => 'title',
					'lang' => true,
					'size' => 64,
                    'desc' => $this->getTranslator()->trans('Show on front office.', array(), 'Modules.Steasycontent.Admin'),
				),
				array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Link:', array(), 'Admin.Theme.Transformer'),
					'name' => 'url',
					'lang' => true,
					'size' => 64,
				),
                'go_to_advanced' => array(
                    'type' => 'html',
                    'label' => $this->getTranslator()->trans('Advanced content editor:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => '',  
                    'desc' => '<strong>'.$this->getTranslator()->trans('You can use this feature to easily add Icon boxs, Tabs, Accordins, Testimonals, FAQ, Text boxes, Social Icons, Typography and more. This is different with the Content Editor below.', array(), 'Modules.Steasycontent.Admin').'</strong>',
                ),
				array(
					'type' => 'textarea',
					'label' => $this->getTranslator()->trans('Content:', array(), 'Admin.Theme.Transformer'),
					'lang' => true,
					'name' => 'text',
					'cols' => 40,
					'rows' => 10,
					'autoload_rte' => true,
                    'required' => false,
                    'desc' => array(
                            '<strong>'.$this->getTranslator()->trans('You can leave this empty, use the Advanced content editor feature above to edit content.', array(), 'Modules.Steasycontent.Admin').'</strong>',
                            $this->getTranslator()->trans('Format your entry with some basic HTML. Click on Flash/Bolt button to use predefined templates.', array(), 'Modules.Steasycontent.Admin'),
                            $this->getTranslator()->trans('Usefull class names:', array(), 'Modules.Steasycontent.Admin').'font-weight-normal, font-italic, text-uppercase, text-capitalize, width_81, width_82, width_83, m-b-0, m-b-1, m-b-2, m-r-1, m-r-2, fs_md, fs_lg, fs_xl, fs_2x, drop-cap, link_color, heading_color, heading_font, go',
                            '<div class="alert alert-info"><a href="javascript:;" onclick="$(\'#how_to_use_gf\').toggle();return false;">'.$this->getTranslator()->trans('How to use google fonts? Click here.', array(), 'Modules.Steasycontent.Admin').'</a><div id="how_to_use_gf" style="display:none;"><img src="'.$this->_path.'views/img/how_to_use_gf.jpg" /></div></div>',
                        ),
				),
                array(
                    'type' => 'go_to_adv_editor',
                    'label' => '',
                    'name' => Context::getContext()->link->getModuleLink(
                                'stbanner', 'adveditor', array('caller_module'=>$this->name,'adveditor_target'=>'text')),
                    'name_blank' => Context::getContext()->link->getModuleLink(
                                'stbanner', 'adveditor', array('caller_module'=>$this->name,'adveditor_window'=>'blank','adveditor_target'=>'text')),
                ),
                array(
                    'type' => 'fontello_list',
                    'label' => $this->getTranslator()->trans('Click here to see all available icons:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'icon_class',
                    'values' => $this->get_fontello(),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Google fonts:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'google_font_select',
                    'onchange' => 'handle_font_change(this);',
                    'class' => 'fontOptions',
                    'options' => array(
                        'query' => $this->fontOptions(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
                ),
                'font_text'=>array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Font weight:', array(), 'Admin.Theme.Transformer'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'fontOptions',
                    'name' => 'google_font_weight',
                    'options' => array(
                        'query' => array(),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isAnything',
                    'desc' => '<p>'.$this->getTranslator()->trans('Once a font has been added, you can use it everywhere without adding it again.', array(), 'Modules.Steasycontent.Admin').'</p><a id="add_google_font" class="btn btn-default btn-block fixed-width-md" href="javascript:;">'.$this->getTranslator()->trans('Add', array(), 'Admin.Theme.Transformer').'</a><br/><p id="google_font_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p><ul id="curr_google_font_name">'.$google_font_name_html.'</ul>'.$google_font_link,
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'google_font_name',
                    'default_value' => '',
                ),
                array(
					'type' => 'radio',
					'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
					'name' => 'hide_on_mobile',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'hide_on_mobile_0',
							'value' => 0,
							'label' => $this->getTranslator()->trans('Visible', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_4',
                            'value' => 4,
                            'label' => $this->getTranslator()->trans('Open (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Hide on small screen devices (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_3',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Hide on small screen devices (screen width < 768px)', array(), 'Admin.Theme.Transformer')),
                        array(
							'id' => 'hide_on_mobile_2',
							'value' => 2,
							'label' => $this->getTranslator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
					),
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
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
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
                'title' => $this->getTranslator()->trans('Other settings', array(), 'Modules.Steasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
            
              array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Height of the entire zone:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'height_full_zone',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'height_full_zone_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'height_full_zone_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                
          array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Boxing location with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'height_full_zone_align',
			'values' => array(
			    array(
					'id' => 'height_full_zone_align_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'height_full_zone_align_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Middle', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'height_full_zone_align_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer')),
				
			),
			'validation' => 'isUnsignedInt',
		),  
                
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title_font_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
                ), 
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Title color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title bottom border height:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'title_bottom_border',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Title border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title_bottom_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Title border highlight color:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'title_bottom_border_color_h',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title_align',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'title_align_left',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Align left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'title_align_center',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Align center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'title_align_right',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Align right', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'title_align_none',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Hide', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'link_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'link_hover',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_bg',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_bg',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button hover background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_bg',
                    'size' => 33,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'margin_top',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
     
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'margin_bottom',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
     
                ),
                
                 array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'margin_top_mobile',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
     
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'margin_bottom_mobile',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
     
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'top_spacing',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
     
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bottom_spacing',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
     
                ),
                  array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'top_spacing_mobile',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
     
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bottom_spacing_mobile',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
     
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'width',
                    'options' => array(
                        'query' => self::$text_width,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => '0',
                            'label' => $this->getTranslator()->trans('100%', array(), 'Modules.Steasycontent.Admin')
                        )
                    ),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Content alignment:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'text_align',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'text_align_left',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_center',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_right',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Content alignment on small screen devices (screen width < 992px):', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'mobile_text_align',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'mobile_text_align_default',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('The same as on large screen devices', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'mobile_text_align_left',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'mobile_text_align_center',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'mobile_text_align_right',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('', array(), 'Modules.Steasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'description' => $this->getTranslator()->trans('Parallax background image feature can not work fine on mobile devices, so it will be disalbed on mobile devices, the background image you uploaded below will be displayed as a static, centered background image, no parallax effect.', array(), 'Modules.Steasycontent.Admin'),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_pattern',
                    'options' => array(
                        'query' => $this->getPatternsArray(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
                ),
                'bg_img_field' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Background image:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'bg_img',
                    'desc' => array(
                            $this->getTranslator()->trans('Generally a background image should be higher than the height of this block.', array(), 'Modules.Steasycontent.Admin'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Parallax speed factor:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'speed',
                    'default_value' => 0.2,
                    'desc' => $this->getTranslator()->trans('Speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling.', array(), 'Modules.Steasycontent.Admin'),
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background image vertical offset:', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'bg_img_v_offset',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                    'desc' => array(
                            $this->getTranslator()->trans('Unsigned int, like 0, 110, 300.', array(), 'Modules.Steasycontent.Admin'),
                            $this->getTranslator()->trans('This field is used to move the backgroumd image up.', array(), 'Modules.Steasycontent.Admin')
                        ),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
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
                'title' => $this->getTranslator()->trans('Video background', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'                
            ),
            'description' => $this->getTranslator()->trans('Video background feature can not work on both Android and IOS devices, which is due to restrictions on autoplay and performance, so you also need to upload a video thumbnail, the thumbnail will be displayed on mobile devices.', array(), 'Admin.Theme.Transformer'),
            'input' => array(
            
            
         array(
               'type' => 'color',
                    'label' => $this->getTranslator()->trans('The color of the transparent background above the video:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'video_bg_color',
                    'validation' => 'isColor',
                    'size' => 33,
	             	
                ),
                
		 
		 array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Boxing background color with content opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'video_bg_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
		),
            
                'video_poster_field' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Video thumbnail image(Required):', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'video_poster',
                    'desc' => array(
                            $this->getTranslator()->trans('Upload a image here, it will be displayed on mobile devices, because of the video background feature can not work on mobile devices, otherwise a transparent background will be apply to this block on mobile devices.', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                'video_poster_field' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Video thumbnail image(Required):', array(), 'Modules.Steasycontent.Admin'),
                    'name' => 'video_poster',
                    'desc' => array(
                            $this->getTranslator()->trans('Upload a image here, it will be displayed on mobile devices, because of the video background feature can not work on mobile devices, otherwise a transparent background will be apply to this block on mobile devices.', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('MP4 format(Required):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'mpfour',
                    'size' => 64,
                    'desc' => array(
                        $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.mp4', array(), 'Admin.Theme.Transformer'),
                        $this->getTranslator()->trans('MP4 is supported by major browsers like Firefox, Opera, Chrome, Safari and Internet Explorer 9+. So you do not have to prepare .webm and .ogv, it is okay to leave the follow to fields empty.', array(), 'Admin.Theme.Transformer'),
                        $this->getTranslator()->trans('You can convert your videos online or using tools like "Miro Video Converter" to convert them into different formats.', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('WebM format(Optional):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'webm',
                    'size' => 64,
                    'desc' => array(
                            $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.webm, Firefox, Chrome and Opera prefer WebM / Ogg formats', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Ogv or ogg format(Optional):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'ogg',
                    'size' => 64,
                    'desc' => array(
                        $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.ogv, Firefox, Chrome and Opera prefer WebM / Ogv formats', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'loop',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'loop_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'loop_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Muted:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'muted',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'muted_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'muted_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Video vertical offset:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'video_v_offset',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => '%',
                    'desc' => array(
                            $this->getTranslator()->trans('From 0 to 100', array(), 'Admin.Theme.Transformer'),
                            $this->getTranslator()->trans('This field is used to move the video up.', array(), 'Admin.Theme.Transformer')
                        ),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );


		if (Shop::isFeatureActive())
		{
			$this->fields_form[0]['form']['input'][] = array(
				'type' => 'shop',
				'label' => $this->getTranslator()->trans('Shop association:', array(), 'Admin.Theme.Transformer'),
				'name' => 'checkBoxShopAsso',
			);
		}
        $this->fields_form[0]['form']['input'][] = $this->fields_form[1]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        
        if($easy_content->id)
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_easy_content');
            $this->fields_form[0]['form']['input']['go_to_advanced']['name'] = '<strong>'.$this->getTranslator()->trans('Save your modifications before using this feature.', array(), 'Modules.Steasycontent.Admin').'</strong><a id="go_to_advanced" class="btn btn-primary btn-block fixed-width-xl" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content='.$easy_content->id.'&viewsteasycontent&token='.Tools::getAdminTokenLite('AdminModules').'">'.$this->getTranslator()->trans('Advanced content editor', array(), 'Modules.Steasycontent.Admin').'</a>';
            if ($easy_content->bg_img)
            {
                $image_url = $this->name.'/'.$easy_content->bg_img;
                $this->fetchMediaServer($image_url);
                $this->fields_form[2]['form']['input']['bg_img_field']['desc'][] = '<span class="image_thumb_block"><img src="'.($image_url).'" /><a class="btn btn-default st_delete_image" href="javascript:;" data-s_id="'.(int)$easy_content->id.'" data-s_k="bg_img"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></span>';
            }
            if ($easy_content->video_poster)
            {
                $image_url = $this->name.'/'.$easy_content->video_poster;
                $this->fetchMediaServer($image_url);
                $this->fields_form[3]['form']['input']['video_poster_field']['desc'][] = '<span class="image_thumb_block"><img src="'.($image_url).'" /><a class="btn btn-default st_delete_image" href="javascript:;" data-s_id="'.(int)$easy_content->id.'" data-s_k="video_poster"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></span>';
            }

            $products_html = '';
            foreach(explode(',', trim($easy_content->id_product, ',')) AS $id_product)
            {
                if (!(int)$id_product) {
                    continue;
                }
                $product = new Product((int)$id_product, false, Context::getContext()->language->id);
                $products_html .= '<li>'.$product->name.'['.$product->reference.']
                <a href="javascript:;" class="del_product"><img src="../img/admin/delete.gif" /></a>
                <input type="hidden" name="st_id_product[]" value="'.$id_product.'" /></li>';
            }
            $this->fields_form[0]['form']['input']['products']['desc'] = $this->getTranslator()->trans('Type product name to add prodcuts:', array(), 'Modules.Steasycontent.Admin').'<br/>'.$this->getTranslator()->trans('Current products', array(), 'Admin.Theme.Transformer')
                .': <ul id="curr_products">'.$products_html.'</ul>';
        }
        else
        {
            $this->fields_form[0]['form']['input']['go_to_advanced']['name'] = '<strong>'.$this->getTranslator()->trans('Save this custom content block first to use the Advanced content editor feature.', array(), 'Modules.Steasycontent.Admin').'</strong>';
        }



        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->id = (int)$id_st_easy_content;
        $helper->module = $this;
		$helper->table =  'st_easy_content';        
		$helper->identifier = 'id_st_easy_content';
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->submit_action = 'save'.$this->name;
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($easy_content),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
        
        if ($easy_content->id) {
            if (in_array($easy_content->type, array(6,7,8,9,10))) {
                if ($easy_content->id_product) {
                    $helper->tpl_vars['fields_value']['id_category_brand'] = '1_1';
                }elseif ($easy_content->id_category) {
                    $helper->tpl_vars['fields_value']['id_category_brand'] = '2_'.$easy_content->id_category;
                } elseif ($easy_content->id_manufacturer) {
                    $helper->tpl_vars['fields_value']['id_category_brand'] = '3_'.$easy_content->id_manufacturer;
                }    
            } elseif ($easy_content->type == 2) {
                $helper->tpl_vars['fields_value']['module'] = $easy_content->module.'_'.$easy_content->module_align;
            }
        }
        
        $helper->tpl_vars['fields_value']['google_font_name'] = $google_font_name;
        
		return $helper;
	}

    public function getPatterns()
    {
        $html = '';
        foreach(range(1,28) as $v)
            $html .= '<div class="parttern_wrap" style="background:url('._MODULE_DIR_.'stthemeeditor/patterns/'.$v.'.png);"><span>'.$v.'</span></div>';
        $html .= '<div>Pattern credits:<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>';
        return $html;
    }
    
    public function getPatternsArray()
    {
        $arr = array();
        for($i=1;$i<=28;$i++)
            $arr[] = array('id'=>$i,'name'=>$i); 
        return $arr;   
    }

    
    public function createLinks()
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
		$this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
        
        foreach($category_arr AS &$value) {
            $value['id'] = '2_'.$value['id'];
        }
        
        $product_arr[] = array('id'=>'1_1','name'=>$this->getTranslator()->trans('Specify some products', array(), 'Modules.Steasycontent.Admin'));
            
        $manufacturer_arr = array();
		$manufacturers = Manufacturer::getManufacturers(false, $id_lang);
		foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>'3_'.$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
        
        $links = array(
            array('name'=>$this->getTranslator()->trans('Product', array(), 'Admin.Theme.Transformer'),'query'=>$product_arr),
            array('name'=>$this->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer'),'query'=>$category_arr),
            array('name'=>$this->getTranslator()->trans('Manufacturer', array(), 'Admin.Theme.Transformer'),'query'=>$manufacturer_arr)
        );
        return $links;
    }
    
    public function getCategoryOption(&$category_arr, $id_category = 1, $id_lang = false, $id_shop = false, $recursive = true)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);

		if (is_null($category->id))
			return;

		if ($recursive)
		{
			$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
			$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category->level_depth);
		}

		$shop = (object) Shop::getShop((int)$category->getShopID());
		$category_arr[] = array('id'=>(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

		if (isset($children) && is_array($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr, (int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
			}
	}

    public function getBlogOption(&$blog_arr, $blog_categories)
    {
        foreach($blog_categories as $category)
        {
            foreach($this->getBlogPage((int)$category['id_st_blog_category']) AS $blog)
            {
                $blog_arr[] = array('id'=>(int)$blog['id_st_blog'],'name'=>$blog['name']);
            }
            
            if(isset($category['child']) && is_array($category['child']) && count($category['child']))
            {
                $this->getBlogOption($blog_arr, $category['child']);
            }
        }
    }
    
    public function getBlogPage($id_st_blog_category=0, $id_shop=false, $id_lang=false)
    {
        return StBlogClass::getCategoryBlogs($id_st_blog_category);
    }
    
	public function getCMSOptions(&$cms_arr, $parent = 0, $depth = 1, $id_lang = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$pages = $this->getCMSPages((int)$parent, false, (int)$id_lang);
		foreach ($pages as $page)
            $cms_arr[] = array('id'=>$page['id_cms'],'name'=>$page['meta_title']);
	}

	public function getCMSPages($id_cms_category, $id_shop = false, $id_lang = false)
	{
		$id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		$sql = 'SELECT c.`id_cms`, cl.`meta_title`, cl.`link_rewrite`
			FROM `'._DB_PREFIX_.'cms` c
			INNER JOIN `'._DB_PREFIX_.'cms_shop` cs
			ON (c.`id_cms` = cs.`id_cms`)
			INNER JOIN `'._DB_PREFIX_.'cms_lang` cl
			ON (c.`id_cms` = cl.`id_cms`)
			WHERE cs.`id_shop` = '.(int)$id_shop.'
            AND cl.`id_shop` = '.(int)$id_shop.' 
			AND cl.`id_lang` = '.(int)$id_lang.'
			AND c.`active` = 1
			ORDER BY `position`';

		return Db::getInstance()->executeS($sql);
	}
    
    public static function displayType($value, $tr)
    {
        if (key_exists($value, self::$type)) {
            $result = self::$type[$value]['label'];
        } else {
            $result = Context::getContext()->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer');    
        }
        return $result;
    }
    
    public static function displayLocation($value, $tr)
    {
        $context = Context::getContext();
        $result = Module::isInstalled('jscomposer') && Module::isEnabled('jscomposer') ? $context->getTranslator()->trans('For visual composer module', array(), 'Admin.Theme.Transformer') : $context->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer');
        switch((int)$tr['type']) {
            case 1:
                if(isset(self::$location[$value])) {
                    $result =  self::$location[$value]['name'];
                }
                break;
            case 2:
                static $module;
                if (!$module) {
                    $module = new StEasyContent();    
                }
                foreach(self::$module AS $v) {
                    if ($v['id'] == $tr['module']) {
                        foreach($module->getApplyModule() AS $value) {
                            if ($v['id'].'_'.$tr['module_align'] == $value['id']) {
                                $result = $value['name'];
                                break;
                            }
                        }
                        break;
                    }
                }
                break;
            case 3:
                $cms = new CMS((int)$tr['id_cms'], Context::getContext()->language->id);
                if ($cms->id) {
                    $result = $cms->meta_title;
                } else {
                    $result = $context->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer');
                }
                break;
            case 4:
            case 5:
                $category = new Category((int)$tr['id_category'], Context::getContext()->language->id);
                if ($category->id) {
                    $result = $category->name;
                } else {
                    $result = $context->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer');
                }
                break;
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
                if ($tr['id_category']) {
                    $category = new Category((int)$tr['id_category'], Context::getContext()->language->id);
                    if ($category->id) {
                        $result = $category->name;
                    }
                }
                if ($tr['id_manufacturer']) {
                    $manufacturer = new Manufacturer((int)$tr['id_manufacturer'], Context::getContext()->language->id);
                    if ($manufacturer->id) {
                        $result = $manufacturer->name;
                    }
                }
                if ($tr['id_product']) {
                    foreach(explode(',', $tr['id_product']) AS $id_product) {
                        $product = new Product((int)$id_product, false, Context::getContext()->language->id);
                        $result .= '<li>'.$product->name.'</li>';
                    }
                }
                if (!$tr['id_category'] && !$tr['id_manufacturer'] && !$tr['id_product']) {
                    $result = $context->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer');
                }
                break;
            case 15:
            case 16:
                $manufacturer = new Manufacturer((int)$tr['id_manufacturer'], Context::getContext()->language->id);
                if ($manufacturer->id) {
                    $result = $manufacturer->name;
                } else {
                    $result = $context->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer');
                }
                break;
            case 20:
                if (Module::isInstalled('stblog') && Module::isEnabled('stblog')) {
                    $blog = new StBlogClass((int)$tr['id_st_blog'], Context::getContext()->language->id);
                    $result = $blog->name;
                } else {
                    $result = $context->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer');
                }
                break;
            default:;
        }
        if (isset($tr['name']) && $tr['name']) {
            $result = '<div>'.$tr['name'].'</div>'.$result;
        }
        return $result;
    }
    public static function displayContent($value, $tr)
    {
        $html = '<div title="'.strip_tags(stripslashes($value)).'">'.Tools::truncateString(strip_tags(stripslashes($value)), 80).'</div>';
        if (!isset($tr['id_st_easy_content']) || !$tr['id_st_easy_content']) {
            return $html;
        }
        $top_columns = StEasyContentColumnClass::getSub(0, 0, $tr['id_st_easy_content']);
        $elements = array();
		if ($top_columns) {
            foreach($top_columns AS $value) {
                if ($value['element']) {
                    $elements[$value['element']] = (int)$value['element'];
                }
                foreach($subs = StEasyContentColumnClass::recurseTree($value['id_st_easy_content_column'], 0, 0, 0, 1) AS $sub) {
                    if ($sub['element']) {
                        $elements[$sub['element']] = (int)$sub['element'];
                    }
                }
            }
        }
        if ($elements) {
            $module = new StEasyContent;
            $html .= '<div class="pstaggerTagsWrapper">';
            foreach($elements AS $ele) {
                if (key_exists($ele, $module->_elements)) {
                    $html .= '<span class="pstaggerTag">'.$module->_elements[$ele]['name'].'</span>';
                }
            }
            $html .= '</div>';
        }
        return $html;
    }
    public static function showDividerInfo($value, $tr)
    {       
        return $value ? '<code>'.htmlspecialchars(stripslashes($value)).'</code>' : '-';
    }
    public static function showTextWithImageInfo($value, $tr)
    {
        return $value.($value ? '<br/>' : '').($tr['st_el_text'] ? '<div title="'.strip_tags(stripslashes($tr['st_el_text'])).'">'.Tools::truncateString(strip_tags(stripslashes($tr['st_el_text'])), 80).'</div>' : '');
    }
    public static function showIconWithTextInfo($value, $tr)
    {       
        $info = '';
        $tr['st_el_header'] && $info .= $tr['st_el_header'].'<br/>';
        $tr['st_el_sub_header'] && $info .= $tr['st_el_sub_header'].'<br/>';
        $tr['st_el_text'] && $info .= '<div title="'.strip_tags(stripslashes($tr['st_el_text'])).'">'.Tools::truncateString(strip_tags(stripslashes($tr['st_el_text'])), 80).'</div>';
        return $info;
    }
    public static function showTextBoxesInfo($value, $tr)
    {       
        $info = '';
        $tr['st_el_header'] && $info .= $tr['st_el_header'].'<br/>';
        $tr['st_el_sub_header'] && $info .= $tr['st_el_sub_header'].'<br/>';
        $tr['st_el_text'] && $info .= '<div title="'.strip_tags(stripslashes($tr['st_el_text'])).'">'.Tools::truncateString(strip_tags(stripslashes($tr['st_el_text'])), 80).'</div>';
        return $info;
    }
    public static function showIconWithTextWidth($value, $tr)
	{	    
        return $value.'/12';
	}
    public static function showCookieLawLocation($value, $tr)
	{	    
        if (key_exists($value, self::$cookie_location)) {
            return self::$cookie_location[$value]['name'];
        }
        $context = Context::getContext();
        return $context->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer');
	}
    protected function initList()
    {
        $this->fields_list = array(
            'id_st_easy_content' => array(
                'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
                'width' => 120,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'type' => array(
                'title' => $this->getTranslator()->trans('Type', array(), 'Admin.Theme.Transformer'),
                'width' => 140,
                'type' => 'text',
                'callback' => 'displayType',
                'callback_object' => 'StEasyContent',
                'search' => false,
                'orderby' => false
            ),
            'location' => array(
                'title' => $this->getTranslator()->trans('Name / Show on', array(), 'Admin.Theme.Transformer'),
                'width' => 140,
                'type' => 'text',
                'callback' => 'displayLocation',
                'callback_object' => 'StEasyContent',
                'search' => false,
                'orderby' => false
            ),
            'text' => array(
                'title' => $this->getTranslator()->trans('Content', array(), 'Admin.Theme.Transformer'),
                'width' => 200,
                'type' => 'text',
                'callback' => 'displayContent',
                'callback_object' => 'StEasyContent',
                'search' => false,
                'orderby' => false
            ),
            'position' => array(
                'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
                'width' => 40,
                'position' => 'position',
                'align' => 'center',
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

     $helper = new HelperList();
        $helper->module = $this;
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->listTotal = count($this->list_data);
        $helper->identifier = 'id_st_easy_content';
        $helper->actions = array('view', 'edit', 'delete', 'duplicate');
        $helper->show_toolbar = true;
        $helper->toolbar_btn['new'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add new', array(), 'Admin.Theme.Transformer')
        );
        $helper->bulk_actions['delete'] = array(
            'text'=>$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer'),
            'confirm'=>$this->getTranslator()->trans('Do you want to delete selected rows and their children ?', array(), 'Modules.Steasycontent.Admin')
        );
        $helper->title = $this->displayName;
        $helper->table = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        return $helper;
    }
    public static function displayColumnInfo($value, $row)
    {       
        $result = '<ul class="element_info_list">';

        $steasycontent = new StEasyContent();

        $result .= '<li><span>'.$steasycontent->getTranslator()->trans('Type', array(), 'Admin.Theme.Transformer').'</span>'.$steasycontent->_elements[$value]['name'].'</li>';

        $result .= '</ul>';
        return $result;
    }
    protected function initColumnList($id_parent = 0, $query_string = '', $row=array())
    {
        // Fix table drag bug.
        Media::addJsDef(array(
            'currentIndex' => AdminController::$currentIndex.'&configure='.$this->name,
        ));
        $this->fields_list = array(
            'id_st_easy_content_column' => array(
                'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
                'width' => 120,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'name' => array(
                'title' => $this->getTranslator()->trans('Name', array(), 'Admin.Theme.Transformer'),
                'width' => 200,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'element' => array(
                'title' => $this->getTranslator()->trans('Element type', array(), 'Modules.Steasycontent.Admin'),
                'width' => 200,
                'type' => 'text',
                'callback' => 'displayElementInfo',
                'callback_object' => 'StEasyContent',
                'search' => false,
                'orderby' => false
            ),
            'width' => array(
                'title' => $this->getTranslator()->trans('Width', array(), 'Admin.Theme.Transformer'),
                'width' => 200,
                'type' => 'text',
                'callback' => 'displayWidth',
                'callback_object' => 'StEasyContent',
                'search' => false,
                'orderby' => false
            ),
            'position' => array(
                'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
                'width' => 40,
                'position' => 'position',
                'align' => 'center',
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
        
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->module = $this;
        $helper->listTotal = count($this->list_data);
        $helper->identifier = 'id_st_easy_content_column';
        $helper->actions = array('view','edit', 'delete');
        $helper->show_toolbar = false;
        $helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
        $helper->position_identifier = 'id_st_easy_content_column';
        $link_status = '';
        if ($id_parent) {
            $helper->toolbar_btn['new'] =  array(
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'column&id_parent='.(int)$id_parent.'&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->getTranslator()->trans('Add a column', array(), 'Modules.Steasycontent.Admin')
            );
            $helper->toolbar_btn['edit'] =  array(
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&update'.$this->name.'row&row_edit&id_st_easy_content_column='.(int)$id_parent.'&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->getTranslator()->trans('Edit row', array(), 'Modules.Steasycontent.Admin')
            );
            $helper->toolbar_btn['delete'] =  array(
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&delete_row&delete'.$this->name.'column&id_st_easy_content_column='.(int)$id_parent.'&token='.Tools::getAdminTokenLite('AdminModules'),
                'js' => 'if (confirm(\''.$this->getTranslator()->trans('Delete all columns on the list, are you sure ?', array(), 'Modules.Steasycontent.Admin').'\')){return true;}else{event.preventDefault();}',
                'desc' => $this->getTranslator()->trans('Delete all columns', array(), 'Modules.Steasycontent.Admin')
            );
        
            if ($row['active']) {
                $link_status = '';
            } else {
                $link_status = '<a class="action-disabled" title="'.$this->getTranslator()->trans('Disabled', array(), 'Modules.Steasycontent.Admin').'" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&status'.$this->name.'column&id_st_easy_content_column='.
                    (int)$id_parent.'&is_row&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-remove"></i></a>';
            }
        }
        $helper->toolbar_btn['back'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Back to parent', array(), 'Modules.Steasycontent.Admin')
        );
        $helper->bulk_actions['delete'] = array(
            'text'=>$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer'),
            'confirm'=>$this->getTranslator()->trans('Do you want to delete selected columns and their children ?', array(), 'Modules.Steasycontent.Admin')
        );
        
        $helper->title = (isset($row['name']) && $row['name'] ? $row['name'] : $this->getTranslator()->trans('Column list', array(), 'Modules.Steasycontent.Admin')).($link_status ? '['.$link_status.']' : '');
        $helper->table = $this->name.'column';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        return $helper;
    }
    
    private function _prepareHook($identify, $type=1, $vc=null)
    {
        $easy_content = StEasyContentClass::getListContent($identify, $type, 1);
        if(!$easy_content)
            $easy_content = array();
        $controller = '';
        if ($type == 1 && $easy_content) {
            $controller = Dispatcher::getInstance()->getController();
        }

        foreach ($easy_content as $key => &$value) {
            if ($type == 1 && $controller != 'index' && isset(self::$location[$value['location']]['index_slider'])) {
                unset($easy_content[$key]);
                continue;
            }
            $value['span'] = array_key_exists($value['location'], self::$span_map) ? self::$span_map[$value['location']] : 3;
            // $value['stretched'] = isset(self::$location[$value['location']]['stretched']);//using full_screen instead.
            $value['is_full_width'] = isset(self::$location[$value['location']]['full_width']) || $value['id_cms'] || $value['id_st_blog'] || isset(self::$location_extra[$value['type'].'00']['full_width']);//the same code in displayHeader function
            if(!is_null($vc) && isset($vc['is_full_width']) && $vc['is_full_width'])
                $value['is_full_width'] = true;
            $value['is_header_item'] = isset(self::$location[$value['location']]['header_item']);
            $value['is_stacked_footer'] = isset(self::$location[$value['location']]['is_stacked_footer']);
            if(!is_null($vc) && isset($vc['is_stacked_footer']) && $vc['is_stacked_footer'])
                $value['is_stacked_footer'] = true;
            $value['is_blog'] = isset(self::$location[$value['location']]['is_blog']);
            $value['columns'] = StEasyContentColumnClass::recurseLightTree(0, 1, (int)$value['id_st_easy_content']);

            if($value['columns'])
            {
                $value['columns'] = $this->_prepareProducts($value['columns']);
            }

            if ($value['video_poster']) {
                $value['video_poster'] = $this->name.'/'.$value['video_poster'];
                $this->fetchMediaServer($value['video_poster']);
            }
        }
        $is_column = false;
        if ($type==100) {
            $is_column = !is_null($vc) && isset($vc['is_column']) && $vc['is_column'];
        }else{
            if(is_array($identify))
                $identify = array_shift($identify);
            $is_column = isset(self::$location[(int)$identify]['column']);
        }
		$this->smarty->assign(
            array(
                'easy_content' => $easy_content,
                'is_column' => $is_column,
                'is_product_tab' => false,
                'easy_image_path' => context::getContext()->link->protocol_content.(Tools::usingSecureMode() ? Tools::getShopDomainSSL() : Tools::getShopDomain())._THEME_PROD_PIC_DIR_.$this->name.'/',
            )
        );
        return $easy_content;//for displayModuleCustomContent and ProductExtraContent
    }
    private function _prepareProducts($columns)
    {
        if(is_array($columns) && count($columns))
        {
            foreach ($columns as $k=>$v) {
                if(isset($v['columns']) && count($v['columns']))
                    $columns[$k]['columns'] = $this->_prepareProducts($v['columns']);
                elseif($v['element']==6 && isset($v['elements']) && $v['elements'] && count($v['elements']))
                {
                    foreach ($v['elements'] as $i=>$element) {
                        $productIds = array();
                        if (isset($element['st_id_product']) && $element['st_id_product']) {
                            $productIds = explode(',', $element['st_id_product']);
                        }
                        $columns[$k]['elements'][$i]['products'] = $this->getProducts($productIds);
                    }
                }
            }
        }
        return $columns;
    }

    //copy from stviewedproducts.php
    public function getProducts($productIds){
        if (count($productIds))
        {
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

            $productsViewed = array();

            if (is_array($productIds) && count($productIds)) {
                foreach ($productIds as $productId) {
                    if(!$productId)
                        continue;
                    $product = new Product($productId);
                    if (!$product->id) {
                        continue;
                    }
                    $productsViewed[] = $presenter->present(
                        $presentationSettings,
                        $assembler->assembleProduct(array('id_product' => $productId)),
                        $this->context->language
                    );
                }
            }

            if (!count($productsViewed))
                return false;
            else
                return $productsViewed;
        }
        else
            return false;
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->registerJavascript('modules-steasycontent', 'modules/'.$this->name.'/views/js/steasycontent.js');
        if (!$this->isCached($this->templatePath.'header.tpl', $this->getCacheId()))
        {
            $custom_css_arr = StEasyContentClass::getCustomCss();
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                $custom_css = '';
                foreach ($custom_css_arr as $v) {
                    $classname = isset(self::$location[$v['location']]['full_width']) || $v['id_cms'] ? '#easycontent_container_'.$v['id_st_easy_content'].' ' : '#easycontent_'.$v['id_st_easy_content'].' ';
                    $classnameplus = isset(self::$location[$v['location']]['full_width']) || $v['id_cms'] ? '#easycontent_container_'.$v['id_st_easy_content'].'' : '#easycontent_'.$v['id_st_easy_content'].'';
                   
                    $v['text_bg'] && $custom_css .= $classname.'{background-color:'.$v['text_bg'].';}';

                    if ($v['title_font_size'])
                        $custom_css .= $classname.' .title_block_inner{font-size:'.$v['title_font_size'].'px;}';

                    if ($v['title_color'])
                        $custom_css .= $classname.' .title_block_inner{color:'.$v['title_color'].';}';
                    if($v['title_bottom_border'] || $v['title_bottom_border']==='0' || $v['title_bottom_border']===0)
                        $custom_css .= $classname.' .title_block,'.$classname.' .title_block_inner{border-bottom-width:'.$v['title_bottom_border'].'px;}'.$classname.' .title_block_inner{margin-bottom:'.$v['title_bottom_border'].'px;}';
                    
                    if($v['title_bottom_border_color'])
                        $custom_css .=$classname.' .title_block {border-bottom-color: '.$v['title_bottom_border_color'].';}';  
                    if($v['title_bottom_border_color_h'])
                        $custom_css .=$classname.' .title_block_inner{border-bottom-color: '.$v['title_bottom_border_color_h'].';}';  


                    $v['text_color'] && $custom_css .= $classname.'.style_content,
                    '.$classname.'.style_content a{color:'.$v['text_color'].';}
                    '.$classname.'.icon_line:after, '.$classname.'.icon_line:before{background-color:'.$v['text_color'].';}
                    '.$classname.'.line{border-color:'.$v['text_color'].';}';

                    $v['link_color'] && $custom_css .= $classname.'.style_content a{color:'.$v['link_color'].';}';
                    
                    $v['link_hover'] && $custom_css .= $classname.'.style_content a:hover{color:'.$v['link_hover'].';}';
                    $v['margin_top'] && $custom_css .= '@media (min-width: 768px) { '.$classname.'{padding-top:'.$v['margin_top'].'px !important;}}';
                    $v['margin_bottom'] && $custom_css .= '@media (min-width: 768px) { '.$classname.'{padding-bottom:'.$v['margin_bottom'].'px !important;}}';
     				$v['margin_top_mobile'] && $custom_css .= '@media (max-width: 767px) { '.$classname.'{padding-top:'.$v['margin_top_mobile'].'px !important;}}';
                    $v['margin_bottom_mobile'] && $custom_css .= '@media (max-width: 767px) { '.$classname.'{padding-bottom:'.$v['margin_bottom_mobile'].'px !important;}}';
                    
                    if(isset($v['top_spacing']) && ($v['top_spacing'] || $v['top_spacing']==='0'))
                        $custom_css .= '@media (min-width: 768px) { '.$classname.'{margin-top:'.(int)$v['top_spacing'].'px !important;}}';
                    if(isset($v['bottom_spacing']) && ($v['bottom_spacing'] || $v['bottom_spacing']==='0'))
                        $custom_css .= '@media (min-width: 768px) { '.$classname.'{margin-bottom:'.(int)$v['bottom_spacing'].'px !important;}}';
                        
                    if(isset($v['top_spacing_mobile']) && ($v['top_spacing_mobile'] || $v['top_spacing_mobile']==='0'))
                        $custom_css .= '@media (max-width: 767px) { '.$classname.'{margin-top:'.(int)$v['top_spacing_mobile'].'px !important;}}';
                    if(isset($v['bottom_spacing_mobile']) && ($v['bottom_spacing_mobile'] || $v['bottom_spacing_mobile']==='0'))
                        $custom_css .= '@media (max-width: 767px) { '.$classname.'{margin-bottom:'.(int)$v['bottom_spacing_mobile'].'px !important;}}';

                    if($v['btn_color'])
                        $custom_css .= $classname.'.style_content .btn{color:'.$v['btn_color'].';}';
                    if($v['btn_color'] && !$v['btn_bg'])
                        $custom_css .= $classname.'.style_content .btn{border-color:'.$v['btn_color'].';}';
                    if($v['btn_bg'])
                        $custom_css .= $classname.'.style_content .btn{background-color:'.$v['btn_bg'].';border-color:'.$v['btn_bg'].';}';
                    if($v['btn_hover_color'])
                        $custom_css .= $classname.'.style_content .btn:hover{color:'.$v['btn_hover_color'].';}';
                    if ($v['btn_hover_bg']) {
                        $custom_css .= $classname.'.style_content .btn:hover{border-color:'.$v['btn_hover_bg'].';}';
                        $btn_fill_animation = $v['btn_bg'] ? 0 : (int)Configuration::get('STSN_BTN_FILL_ANIMATION');
                        if($btn_fill_animation)
                            $custom_css .= $classname.'.style_content .btn{-webkit-box-shadow: inset 0 0 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 0 0 0 0 '.$v['btn_hover_bg'].';}';
                        switch ($btn_fill_animation) {
                            case 1:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: inset 0 100px 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 0 100px 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 2:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: inset 0 -100px 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 0 -100px 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 3:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: inset 300px 0 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 300px 0 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 4:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: inset -300px 0 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset -300px 0 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            default:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: none; box-shadow: none;background-color: '.$v['btn_hover_bg'].';}';
                                break;
                        }
                    }

                    if ($v['bg_img']) {
                        $v['bg_img'] = $this->name.'/'.$v['bg_img'];
                        $this->fetchMediaServer($v['bg_img']);
                        $custom_css .= $classname.'{background-image:url('.$v['bg_img'].');}';
                    }
                    elseif ($v['bg_pattern'])
                    {
                        $img = _MODULE_DIR_.'stthemeeditor/patterns/'.$v['bg_pattern'].'.png';
                        $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                        $custom_css .= $classname.'{background-image:url('.$img.');background-repeat:repeat;}';
                    }
                    if ($v['bg_img_v_offset']) {
                        $custom_css .= $classname.'{background-position:center -'.$v['bg_img_v_offset'].'px;}';
                        $custom_css .= $classname.'.st_parallax_left{background-position:left -'.$v['bg_img_v_offset'].'px;}';
                        $custom_css .= $classname.'.st_parallax_right{background-position:right -'.$v['bg_img_v_offset'].'px;}';
                    }
                    
                    if($v['height_full_zone']) 
					$custom_css .= $classname.'{height: 100%;}'; 
					
                if($v['height_full_zone'] == 1) {
				if($v['height_full_zone_align'] == 0) 
					$custom_css .= $classnameplus.'.easycontent.full_height {align-items: start;}'; 
				if($v['height_full_zone_align'] == 1) 
					$custom_css .= $classnameplus.'.easycontent.full_height {align-items: center;}'; 
				if($v['height_full_zone_align'] == 2) 
					$custom_css .= $classnameplus.'.easycontent.full_height {align-items: end;}'; 
			    }
			    
                if($v['video_bg_color']) {            	
            	$video_bg_color = self::hex2rgb($v['video_bg_color']);
           		$custom_css .= $classnameplus.'.video_bg_block:after {background-color: rgba('.$video_bg_color[0].','.$video_bg_color[1].','.$video_bg_color[2].','.$v['video_bg_opacity'].');}}';
           		 }

                    if(isset($v['columns']) && count($v['columns']))
                        $custom_css .= $this->recurseCss($v['columns']);
                }
                if($custom_css)
                    $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
            }
        }
        
        return $this->fetch($this->templatePath.'header.tpl', $this->getCacheId());
    }
    public function recurseCss($columns){
        $custom_css = '';

        foreach ($columns as $k => $v) {
            if(isset($v['bg_color']) && $v['bg_color'])
                $custom_css .= '#steasy_column_'.$v['id_st_easy_content_column'].'{background-color: '.$v['bg_color'].';}';
           if(isset($v['margin_top']) && $v['margin_top']!=='')
                $custom_css .= '#steasy_column_'.$v['id_st_easy_content_column'].'{padding-top: '.(int)$v['margin_top'].'px;}';
           if(isset($v['margin_bottom']) && $v['margin_bottom']!=='')
                $custom_css .= '#steasy_column_'.$v['id_st_easy_content_column'].'{padding-bottom: '.(int)$v['margin_bottom'].'px;}';
           
        if (Configuration::get('STSN_INFINITE_SCROLL')) {
                    	
                    if(isset($v['order_fw']) && $v['order_fw']!=='')
                    $custom_css .= '@media (min-width: 1600px) { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)((($v['listing_page']-1)*(Configuration::get('STSN_PRODUCTS_PER_PAGE')))+$v['order_fw']-1).';}}';
           			if(isset($v['order_xxl']) && $v['order_xxl']!=='')
             	    $custom_css .= '@media (min-width: 1440px) { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)((($v['listing_page']-1)*(Configuration::get('STSN_PRODUCTS_PER_PAGE')))+$v['order_xxl']-1).';}}';
          			if(isset($v['order_xl']) && $v['order_xl']!=='')
                    $custom_css .= '@media (min-width:1200px) and (max-width:1439px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)((($v['listing_page']-1)*(Configuration::get('STSN_PRODUCTS_PER_PAGE')))+$v['order_xl']-1).';}}';
                    if(isset($v['order_lg']) && $v['order_lg']!=='')
                	$custom_css .= '@media (min-width:992px) and (max-width:1199px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)((($v['listing_page']-1)*(Configuration::get('STSN_PRODUCTS_PER_PAGE')))+$v['order_lg']-1).';}}';
          			if(isset($v['order_md']) && $v['order_md']!=='')
           		    $custom_css .= '@media (min-width:768px) and (max-width:991px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)((($v['listing_page']-1)*(Configuration::get('STSN_PRODUCTS_PER_PAGE')))+$v['order_md']-1).';}}';
        		    if(isset($v['order_sm']) && $v['order_sm']!=='')
                    $custom_css .= '@media (min-width:480px) and (max-width:767px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)((($v['listing_page']-1)*(Configuration::get('STSN_PRODUCTS_PER_PAGE')))+$v['order_sm']-1).';}}';
                    if(isset($v['order_col']) && $v['order_col']!=='')
                    $custom_css .= '@media (max-width:479px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)((($v['listing_page']-1)*(Configuration::get('STSN_PRODUCTS_PER_PAGE')))+$v['order_col']-1).';}}';
         
                    	}
                    if (Configuration::get('STSN_INFINITE_SCROLL') == 0) {
                    	
                    if(isset($v['order_fw']) && $v['order_fw']!=='')
                    $custom_css .= '@media (min-width: 1600px) { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)($v['order_fw']-1).';}}';
           			if(isset($v['order_xxl']) && $v['order_xxl']!=='')
             	    $custom_css .= '@media (min-width: 1440px) { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)($v['order_xxl']-1).';}}';
          			if(isset($v['order_xl']) && $v['order_xl']!=='')
                    $custom_css .= '@media (min-width:1200px) and (max-width:1439px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)($v['order_xl']-1).';}}';
                    if(isset($v['order_lg']) && $v['order_lg']!=='')
                	$custom_css .= '@media (min-width:992px) and (max-width:1199px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)($v['order_lg']-1).';}}';
          			if(isset($v['order_md']) && $v['order_md']!=='')
           		    $custom_css .= '@media (min-width:768px) and (max-width:991px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)($v['order_md']-1).';}}';
        		    if(isset($v['order_sm']) && $v['order_sm']!=='')
                    $custom_css .= '@media (min-width:480px) and (max-width:767px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)($v['order_sm']-1).';}}';
                    if(isset($v['order_col']) && $v['order_col']!=='')
                    $custom_css .= '@media (max-width:479px)  { #steasy_column_'.$v['id_st_easy_content_column'].'{order: '.(int)($v['order_col']-1).';}}';
         
                    	}   
                
                
                
           if (isset($v['bg_image']) && $v['bg_image']) {
                $v['bg_image'] = $this->name.'/'.$v['bg_image'];
                $this->fetchMediaServer($v['bg_image']);
                $custom_css .= '#steasy_column_'.$v['id_st_easy_content_column'].'{background-image:url('.$v['bg_image'].');}';
            }
            if(isset($v['columns']) && count($v['columns']))                
                $custom_css .= $this->recurseCss($v['columns']);
            elseif($v['element'])
            {
               if(isset($v['st_element_bg']) && $v['st_element_bg'])
                    $custom_css .= '#steasy_column_'.$v['id_st_easy_content_column'].'{background-color: '.$v['st_element_bg'].';}';
               if(isset($v['st_element_top_padding']) && $v['st_element_top_padding']!=='')
                    $custom_css .= '#steasy_column_'.$v['id_st_easy_content_column'].' .steasy_element_block{padding-top: '.(int)$v['st_element_top_padding'].'px;}';
               if(isset($v['st_element_bottom_padding']) && $v['st_element_bottom_padding']!=='')
                    $custom_css .= '#steasy_column_'.$v['id_st_easy_content_column'].' .steasy_element_block{padding-bottom: '.(int)$v['st_element_bottom_padding'].'px;}'; 
                if(method_exists($this, 'write_css_element_'.$v['element']) && ((isset($v['elements']) && count($v['elements'])) || $v['element']==7)) //the same code is also in the steasycontent-columns.tpl
                    $custom_css .= $this->{'write_css_element_'.$v['element']}($v);
            }
        }

        return $custom_css;
    }
    public function write_css_element_3($column){
        //accordion
        $custom_css = '';

        $prefix = '#steasy_column_'.$column['id_st_easy_content_column']; 
        if(isset($column['st_header_color']) && $column['st_header_color'])
            $custom_css .= $prefix.' .acc_header a.collapsed{color: '.$column['st_header_color'].';}';
        if(isset($column['st_header_hover_color']) && $column['st_header_hover_color'])
            $custom_css .= $prefix.' .acc_header a.collapsed:hover, '.$prefix.' .acc_header a{color: '.$column['st_header_hover_color'].';}';
        if(isset($column['st_header_bg']) && $column['st_header_bg'])
            $custom_css .= $prefix.' .acc_header a.collapsed{background-color: '.$column['st_header_bg'].';}';
        if(isset($column['st_header_hover_bg']) && $column['st_header_hover_bg'])
            $custom_css .= $prefix.' .acc_header a.collapsed:hover, '.$prefix.' .acc_header a{background-color: '.$column['st_header_hover_bg'].';border-color: '.$column['st_header_hover_bg'].';}';
        if(isset($column['st_header_border']) && $column['st_header_border'])
            $custom_css .= $prefix.' .acc_header a, '.$prefix.' .acc_box, '.$prefix.' .collapse{border-color: '.$column['st_header_border'].';}';

        if(isset($column['st_icon_color']) && $column['st_icon_color'])
            $custom_css .= $prefix.' .acc_header a.collapsed .acc_icon{color: '.$column['st_icon_color'].';}'; 
        if(isset($column['st_icon_hover_color']) && $column['st_icon_hover_color'])
            $custom_css .= $prefix.' .acc_header a.collapsed:hover .acc_icon, '.$prefix.' .acc_header a .acc_icon{color: '.$column['st_icon_hover_color'].';}';
        if(isset($column['st_icon_bg']) && $column['st_icon_bg'])
            $custom_css .= $prefix.' .acc_header a.collapsed .acc_icon{background-color: '.$column['st_icon_bg'].';}'; 
        if(isset($column['st_icon_hover_bg']) && $column['st_icon_hover_bg'])
            $custom_css .= $prefix.' .acc_header a.collapsed:hover .acc_icon, '.$prefix.' .acc_header a .acc_icon{background-color: '.$column['st_icon_hover_bg'].';}';

        if(isset($column['st_icon_font_size']) && $column['st_icon_font_size'])
            $custom_css .= $prefix.' .acc_header a .acc_icon{font-size: '.(int)$column['st_icon_font_size'].'px;}';
        if(isset($column['st_icon_size']) && $column['st_icon_size'])
            $custom_css .= $prefix.' .acc_header a .acc_icon{width: '.(int)$column['st_icon_size'].'px;height: '.(int)$column['st_icon_size'].'px;line-height: '.(int)$column['st_icon_size'].'px;}';


        if(isset($column['st_content_color']) && $column['st_content_color'])
            $custom_css .= $prefix.' .acc_content{color: '.$column['st_content_color'].';}';
        if(isset($column['st_content_bg']) && $column['st_content_bg'])
            $custom_css .= $prefix.' .acc_content{background-color: '.$column['st_content_bg'].';}';
        if(isset($column['st_content_padding_lr']) && ($column['st_content_padding_lr'] || $column['st_content_padding_lr']==='0' || $column['st_content_padding_lr']===0))
            $custom_css .= $prefix.' .acc_content{padding-left: '.(int)$column['st_content_padding_lr'].'px;padding-right: '.(int)$column['st_content_padding_lr'].'px;}';
        if(isset($column['st_content_padding_tb']) && ($column['st_content_padding_tb'] || $column['st_content_padding_tb']==='0' || $column['st_content_padding_tb']===0))
            $custom_css .= $prefix.' .acc_content{padding-top: '.(int)$column['st_content_padding_tb'].'px;padding-bottom: '.(int)$column['st_content_padding_tb'].'px;}';

        return $custom_css;
    }
    public function write_css_element_4($column){
        //tab
        $custom_css = '';

        $prefix = '#steasy_column_'.$column['id_st_easy_content_column']; 
        if(isset($column['st_header_color']) && $column['st_header_color'])
            $custom_css .= $prefix.' .nav-tabs .nav-link{color: '.$column['st_header_color'].';}';
        if(isset($column['st_header_hover_color']) && $column['st_header_hover_color'])
            $custom_css .= $prefix.' .nav-tabs .nav-link:hover, '.$prefix.' .nav-tabs .nav-link.active{color: '.$column['st_header_hover_color'].';}';
        if(isset($column['st_header_bg']) && $column['st_header_bg'])
            $custom_css .= $prefix.' .nav-tabs .nav-link{background-color: '.$column['st_header_bg'].';}';
        if(isset($column['st_header_hover_bg']) && $column['st_header_hover_bg'])
        {
            $custom_css .= $prefix.' .nav-tabs .nav-link:hover, '.$prefix.' .nav-tabs .nav-link.active{background-color: '.$column['st_header_hover_bg'].';}';
            $custom_css .= $prefix.' .sttab_2 .nav-tabs .nav-link{border-bottom-color: '.$column['st_header_hover_bg'].';}';
        }
        if(isset($column['st_header_border']) && $column['st_header_border'])
            $custom_css .= $prefix.' .nav-tabs, '.$prefix.' .nav-tabs .nav-link{border-color: '.$column['st_header_border'].';}';
        if(isset($column['st_header_active_border']) && $column['st_header_active_border']){
            $custom_css .= $prefix.' .sttab_1_2 .nav-link:hover, '.$prefix.' .sttab_1_2 .nav-link.active, '.$prefix.' .sttab_1_2 .nav-link:focus, '.$prefix.' .sttab_2_2 .nav-link:hover, '.$prefix.' .sttab_2_2 .nav-link.active, '.$prefix.' .sttab_2_2 .nav-link:focus{border-top-color: '.$column['st_header_active_border'].';}';
            $custom_css .= $prefix.' .sttab_1_3 .nav-link:hover, '.$prefix.' .sttab_1_3 .nav-link.active, '.$prefix.' .sttab_1_3 .nav-link:focus, '.$prefix.' .sttab_2_3 .nav-link:hover, '.$prefix.' .sttab_2_3 .nav-link.active, '.$prefix.' .sttab_2_3 .nav-link:focus{border-bottom-color: '.$column['st_header_active_border'].';}';
            // $custom_css .= $prefix.' .sttab_1_4 .nav-link:hover, '.$prefix.' .sttab_1_4 .nav-link.active, '.$prefix.' .sttab_1_4 .nav-link:focus, '.$prefix.' .sttab_2_4 .nav-link:hover, '.$prefix.' .sttab_2_4 .nav-link.active, '.$prefix.' .sttab_2_4 .nav-link:focus{border-color: '.$column['st_header_active_border'].';}';
            $custom_css .= $prefix.' .sttab_3_2 .nav-link:hover, '.$prefix.' .sttab_3_2 .nav-link.active, '.$prefix.' .sttab_3_2 .nav-link:focus{border-left-color: '.$column['st_header_active_border'].';}';
        }
        $st_tab_bottom_border = isset($column['st_tab_bottom_border']) ? $column['st_tab_bottom_border'] : false;
        if($st_tab_bottom_border || $st_tab_bottom_border===0 || $st_tab_bottom_border==='0')
        {
            $custom_css .= $prefix.' .sttab_2 .nav-tabs, '.$prefix.' .sttab_2 .nav-tabs .nav-link{border-bottom-width: '.$column['st_tab_bottom_border'].'px;}';
            $custom_css .= $prefix.' .sttab_2 .nav-item{margin-bottom: -'.$column['st_tab_bottom_border'].'px;}';
            $custom_css .= $prefix.' .sttab_1_2 .nav-tabs .nav-link{border-top-width: '.$column['st_tab_bottom_border'].'px;}';
            $custom_css .= $prefix.' .sttab_1_3 .nav-tabs .nav-link{border-bottom-width: '.$column['st_tab_bottom_border'].'px;}';
            $custom_css .= $prefix.' .sttab_3_2 .nav-tabs .nav-link{border-left-width: '.$column['st_tab_bottom_border'].'px;}';
        }
        
        if(isset($column['st_tab_font_size']) && $column['st_tab_font_size'])
            $custom_css .= $prefix.' .nav-tabs .nav-link{font-size: '.$column['st_tab_font_size'].'px;}';
        
        //
        if(isset($column['st_content_color']) && $column['st_content_color'])
            $custom_css .= $prefix.' .tab-pane-body{color: '.$column['st_content_color'].';}';
        if(isset($column['st_content_bg']) && $column['st_content_bg'])
            $custom_css .= $prefix.' .tab-pane-body{background-color: '.$column['st_content_bg'].';}';
        if(isset($column['st_content_border']) && $column['st_content_border'])
            $custom_css .= $prefix.' .tab-pane-body{border: 1px solid '.$column['st_content_border'].';}';
        if(isset($column['st_content_padding']) && ($column['st_content_padding'] || $column['st_content_padding']===0 || $column['st_content_padding']==='0'))
            $custom_css .= $prefix.' .tab-pane-body{padding: '.(int)$column['st_content_padding'].'px;}';
        if(isset($column['st_content_padding_top']) && ($column['st_content_padding_top'] || $column['st_content_padding_top']===0 || $column['st_content_padding_top']=='0'))
            $custom_css .= $prefix.' .tab-pane-body{padding-top: '.(int)$column['st_content_padding_top'].'px;}';


        return $custom_css;
    }

    public function write_css_element_10($column){
        //social
        $custom_css = '';

        $prefix = '#steasy_column_'.$column['id_st_easy_content_column']; 
        if(isset($column['st_icon_spacing']) && $column['st_icon_spacing'])
        {
            $custom_css .= $prefix.' .stsocial_2_1 li,'.$prefix.' .stsocial_2_2 li,'.$prefix.' .stsocial_2_3 li{padding-bottom: '.(int)$column['st_icon_spacing'].'px;}';
            $custom_css .= $prefix.' .stsocial_1_1 li,'.$prefix.' .stsocial_1_2 li,'.$prefix.' .stsocial_1_3 li{padding-right: '.(int)$column['st_icon_spacing'].'px;}';
        }
        
        
        if (isset($column['st_title_font_size']) && $column['st_title_font_size'])
            $custom_css .= $prefix.' .title_block_inner{font-size:'.$column['st_title_font_size'].'px;}';
 		if (isset($column['st_title_color']) && $column['st_title_color'])
            $custom_css .= $prefix.' .title_block_inner{color:'.$column['st_title_color'].';}';  
            
            if (isset($column['st_title_color']) && $column['st_title_color'])
                $custom_css .= $prefix.' .title_block_inner{color:'.$column['st_title_color'].';}';
            if(isset($column['st_title_bottom_border']) && ($column['st_title_bottom_border'] || $column['st_title_bottom_border']==='0' || $column['st_title_bottom_border']===0))
                $custom_css .= $prefix.' .title_block,'.$prefix.' .title_block_inner{border-bottom-width:'.$column['st_title_bottom_border'].'px;}'.$prefix.' .title_block_inner{margin-bottom:'.$column['st_title_bottom_border'].'px;}';
            
            
        if(isset($column['st_title_bottom_border_color']) && $column['st_title_bottom_border_color'])
            $custom_css .=$prefix.' .title_block {border-bottom-color: '.$column['st_title_bottom_border_color'].'; border-bottom-style: solid;}';  
        if(isset($column['st_title_bottom_border_color_h']) && $column['st_title_bottom_border_color_h'])
            $custom_css .=$prefix.' .title_block_inner{border-bottom-color: '.$column['st_title_bottom_border_color_h'].'; border-bottom-style: solid;}'; 
        if(isset($column['st_icon_color']) && $column['st_icon_color'])
            $custom_css .= $prefix.' .stsocial_list a .social_wrap{color: '.$column['st_icon_color'].';}'; 
        if(isset($column['st_icon_hover_color']) && $column['st_icon_hover_color'])
            $custom_css .= $prefix.' .stsocial_list a:hover .social_wrap{color: '.$column['st_icon_hover_color'].';}';
        if(isset($column['st_icon_bg']) && $column['st_icon_bg'])
            $custom_css .= $prefix.' .stsocial_list a .social_wrap{background-color: '.$column['st_icon_bg'].';}'; 
        if(isset($column['st_icon_hover_bg']) && $column['st_icon_hover_bg'])
            $custom_css .= $prefix.' .stsocial_list a:hover .social_wrap{background-color: '.$column['st_icon_hover_bg'].';border-color: '.$column['st_icon_hover_bg'].';}';
        $icon_border_size = isset($column['st_icon_border_size']) ? $column['st_icon_border_size'] : '';
        if($icon_border_size!=='')
            $custom_css .= $prefix.' .stsocial_list a .social_wrap{border: '.(int)$icon_border_size.'px solid transparent;}'; 
        if(isset($column['st_icon_border_color']) && $column['st_icon_border_color'])
            $custom_css .= $prefix.' .stsocial_list a .social_wrap{border-color: '.$column['st_icon_border_color'].';}';
        if(isset($column['st_icon_border_radius']) && $column['st_icon_border_radius']!=='')
            $custom_css .= $prefix.' .stsocial_list a .social_wrap{border-radius: '.(int)$column['st_icon_border_radius'].'px;}';   
        if(isset($column['st_icon_size']) && $column['st_icon_size'])
            $custom_css .= $prefix.' .stsocial_list a .social_wrap{font-size: '.(int)$column['st_icon_size'].'px;}';
        if(isset($column['st_icon_block']) && $column['st_icon_block']){
            $custom_css .= $prefix.' .stsocial_list a .social_wrap{width: '.(int)$column['st_icon_block'].'px;height: '.(int)$column['st_icon_block'].'px;line-height: '.((int)$column['st_icon_block']-(int)$icon_border_size*2).'px;}';
        }

        if(isset($column['st_header_color']) && $column['st_header_color'])
            $custom_css .= $prefix.' .stsocial_list a .social_header{color: '.$column['st_header_color'].';}';
        if(isset($column['st_header_hover_color']) && $column['st_header_hover_color'])
            $custom_css .= $prefix.' .stsocial_list a:hover .social_header{color: '.$column['st_header_hover_color'].';}';
        if(isset($column['st_header_size']) && $column['st_header_size'])
            $custom_css .= $prefix.' .stsocial_list a .social_header{font-size: '.(int)$column['st_header_size'].'px;}';

        foreach ($column['elements'] as $element) {

            $element_prefix = $prefix.' #stsocial_item_'.$element['id_st_easy_content_element']; 

            if(isset($element['st_icon_color']) && $element['st_icon_color'])
                $custom_css .= $element_prefix.' .social_wrap{color: '.$element['st_icon_color'].';}'; 
            if(isset($element['st_icon_hover_color']) && $element['st_icon_hover_color'])
                $custom_css .= $element_prefix.':hover .social_wrap{color: '.$element['st_icon_hover_color'].';}';
            if(isset($element['st_icon_bg']) && $element['st_icon_bg'])
                $custom_css .= $element_prefix.' .social_wrap{background-color: '.$element['st_icon_bg'].';}'; 
            if(isset($element['st_icon_hover_bg']) && $element['st_icon_hover_bg'])
                $custom_css .= $element_prefix.':hover .social_wrap{background-color: '.$element['st_icon_hover_bg'].';border-color: '.$element['st_icon_hover_bg'].';}';
            $icon_border_size = isset($element['st_icon_border_size']) ? $element['st_icon_border_size'] : '';
            if(isset($element['st_icon_border_color']) && $element['st_icon_border_color'])
                $custom_css .= $element_prefix.' .social_wrap{border-color: '.$element['st_icon_border_color'].';}';
        }

        return $custom_css;
    }

    public function write_css_element_7($column){
        //google map
        $custom_css = '';

        $prefix = '#steasy_column_'.$column['id_st_easy_content_column']; 
        
        if(isset($column['st_gmap_height']) && $column['st_gmap_height'])
            $custom_css .= $prefix.' .st_map_block{height: '.(int)$column['st_gmap_height'].'px;}';

        return $custom_css;
    }

    public function write_css_element_1($column){
        $custom_css = '';

        foreach ($column['elements'] as $element) {

            $prefix = '#steasy_element_'.$element['id_st_easy_content_element'].' .easy_icon_with_text_'.$element['st_el_icon_with_text']; 
            if(isset($element['st_icon_color']) && $element['st_icon_color'])
                $custom_css .= $prefix.' .easy_icon{color: '.$element['st_icon_color'].';}'; 
            if(isset($element['st_icon_hover_color']) && $element['st_icon_hover_color'])
                $custom_css .= $prefix.':hover .easy_icon{color: '.$element['st_icon_hover_color'].';}'; 
            if(isset($element['st_icon_bg']) && $element['st_icon_bg'])
                $custom_css .= $prefix.' .easy_icon{background-color: '.$element['st_icon_bg'].';}'; 
            if(isset($element['st_icon_hover_bg']) && $element['st_icon_hover_bg'])
                $custom_css .= $prefix.':hover .easy_icon{background-color: '.$element['st_icon_hover_bg'].';}'; 
            if(isset($element['st_icon_border_size']) && ($element['st_icon_border_size'] || $element['st_icon_border_size']===0 || $element['st_icon_border_size']==='0'))
            {
                $custom_css .= $prefix.' .easy_icon{border: '.(int)$element['st_icon_border_size'].'px solid transparent;}';
                if($element['st_el_icon_with_text']=='1_1')
                {
                    if($element['st_icon_border_size'])
                        $custom_css .= $prefix.' .easy_icon{box-shadow: 0 0 0 '.(int)$element['st_icon_border_size'].'px '.(isset($element['st_icon_border_color']) && $element['st_icon_border_color'] ? $element['st_icon_border_color'] : '#444444').' inset;}'; 
                    else
                        $custom_css .= $prefix.' .easy_icon{box-shadow: none;}';//shadow still visible when 0px so set it to none
                }
            }
            if(isset($element['st_icon_border_color']) && $element['st_icon_border_color'])
                $custom_css .= $prefix.' .easy_icon{border-color: '.$element['st_icon_border_color'].';}'; 
            if(isset($element['st_icon_border_radius']) && $element['st_icon_border_radius']!=='')
                $custom_css .= $prefix.' .easy_icon{border-radius: '.(int)$element['st_icon_border_radius'].'px;}'; 
            if(isset($element['st_icon_size']) && $element['st_icon_size'])
                $custom_css .= $prefix.' .easy_icon{font-size: '.(int)$element['st_icon_size'].'px;}';
            if(isset($element['st_icon_block']) && $element['st_icon_block']){
                $icon_border_size = isset($element['st_icon_border_size']) ? (int)$element['st_icon_border_size'] : 0;
                $custom_css .= $prefix.' .easy_icon{width: '.(int)$element['st_icon_block'].'px;height: '.(int)$element['st_icon_block'].'px;line-height: '.((int)$element['st_icon_block']-$icon_border_size*2).'px;}';
            }
            $st_icon_top_margin = isset($element['st_icon_top_margin']) ? $element['st_icon_top_margin'] : false;
            if($st_icon_top_margin || $st_icon_top_margin===0 || $st_icon_top_margin==='0')
                $custom_css .= $prefix.' .easy_icon{margin-top: '.$element['st_icon_top_margin'].'px;}';
            $st_icon_bottom_margin = isset($element['st_icon_bottom_margin']) ? $element['st_icon_bottom_margin'] : false;
            if($st_icon_bottom_margin || $st_icon_bottom_margin===0 || $st_icon_bottom_margin==='0')
                $custom_css .= $prefix.' .easy_icon{margin-bottom: '.$element['st_icon_bottom_margin'].'px;}';

            //
            if(isset($element['st_header_color']) && $element['st_header_color'])
                $custom_css .= $prefix.' .easy_header{color: '.$element['st_header_color'].';}';
            if(isset($element['st_header_hover_color']) && $element['st_header_hover_color'])
            {
                $custom_css .= $prefix.':hover .easy_header{color: '.$element['st_header_hover_color'].';}';
                $custom_css .= $prefix.' .easy_header:hover{color: '.$element['st_header_hover_color'].';}';
            }
            if(isset($element['st_header_size']) && $element['st_header_size'])
                $custom_css .= $prefix.' .easy_header{font-size: '.(int)$element['st_header_size'].'px;}';
            $st_header_bottom_margin = isset($element['st_header_bottom_margin']) ? $element['st_header_bottom_margin'] : false;
            if($st_header_bottom_margin || $st_header_bottom_margin===0 || $st_header_bottom_margin==='0')
                $custom_css .= $prefix.' .easy_header{padding-bottom: '.$element['st_header_bottom_margin'].'px;}';

            if(isset($element['st_sub_header_color']) && $element['st_sub_header_color'])
                $custom_css .= $prefix.' .easy_sub_header{color: '.$element['st_sub_header_color'].';}';
            if(isset($element['st_sub_header_size']) && $element['st_sub_header_size'])
                $custom_css .= $prefix.' .easy_sub_header{font-size: '.(int)$element['st_sub_header_size'].'px;}';
            $st_sub_header_bottom_margin = isset($element['st_sub_header_bottom_margin']) ? $element['st_sub_header_bottom_margin'] : false;
            if($st_sub_header_bottom_margin || $st_sub_header_bottom_margin===0 || $st_sub_header_bottom_margin==='0')
                $custom_css .= $prefix.' .easy_sub_header{padding-bottom: '.$element['st_sub_header_bottom_margin'].'px;}';

            if(isset($element['st_header_font_select']) && $element['st_header_font_select'])
                $custom_css .= $prefix.' .easy_header'.(isset($element['st_sub_header_font']) && $element['st_sub_header_font'] ? ','.$prefix.' .easy_sub_header' : '').($element['st_text_font'] ? ','.$prefix.' .easy_text' : '').'{font-family: '.$element['st_header_font_select'].';}';
            if(isset($element['st_header_font_weight']) && $element['st_header_font_weight'])
                $custom_css .= $prefix.' .easy_header'.(isset($element['st_sub_header_font']) && $element['st_sub_header_font'] ? ','.$prefix.' .easy_sub_header' : '').'{'.$this->fontWeight($element['st_header_font_weight']).'}';
            if(isset($element['st_text_color']) && $element['st_text_color'])
                $custom_css .= $prefix.' .easy_text{color: '.$element['st_text_color'].';}';
            if(isset($element['st_text_size']) && $element['st_text_size'])
                $custom_css .= $prefix.' .easy_text{font-size: '.(int)$element['st_text_size'].'px;}';            
            $st_text_bottom_margin = isset($element['st_text_bottom_margin']) ? $element['st_text_bottom_margin'] : false;
            if($st_text_bottom_margin || $st_text_bottom_margin===0 || $st_text_bottom_margin==='0')
                $custom_css .= $prefix.' .easy_text{padding-bottom: '.$element['st_text_bottom_margin'].'px;}';

            if(isset($element['st_link_color']) && $element['st_link_color'])
                $custom_css .= $prefix.' .easy_link{color: '.$element['st_link_color'].';}';
            if(isset($element['st_link_hover_color']) && $element['st_link_hover_color'])
                $custom_css .= $prefix.' .easy_link:hover{color: '.$element['st_link_hover_color'].';}';
            //
            $prefix_item = '#steasy_element_'.$element['id_st_easy_content_element'].' .steasy_element_item';
            if(isset($element['st_item_bg']) && $element['st_item_bg'])
                $custom_css .= $prefix_item.'{background-color: '.$element['st_item_bg'].';}';
            if(isset($element['st_item_top_padding']) && $element['st_item_top_padding']!=='')
                $custom_css .= $prefix_item.'{padding-top: '.(int)$element['st_item_top_padding'].'px;}';
            if(isset($element['st_item_bottom_padding']) && $element['st_item_bottom_padding']!=='')
                $custom_css .= $prefix_item.'{padding-bottom: '.(int)$element['st_item_bottom_padding'].'px;}'; 
            if(isset($element['st_item_lr_padding']) && $element['st_item_lr_padding']!=='')
                $custom_css .= $prefix_item.'{padding-left: '.(int)$element['st_item_lr_padding'].'px;padding-right: '.(int)$element['st_item_lr_padding'].'px;}'; 
            if(isset($element['st_item_border_size']) && $element['st_item_border_size'])
                $custom_css .= $prefix_item.'{border: '.(int)$element['st_item_border_size'].'px solid transparent;}'; 
            if(isset($element['st_item_border_color']) && $element['st_item_border_color'])
                $custom_css .= $prefix_item.'{border-color: '.$element['st_item_border_color'].';}'; 
            if(isset($element['st_item_border_radius']) && $element['st_item_border_radius']!=='')
                $custom_css .= $prefix_item.'{border-radius: '.(int)$element['st_item_border_radius'].'px;}'; 

        }

        return $custom_css;
    }
    public function write_css_element_8($column){
        $custom_css = '';

        $column_prefix = '#steasy_column_'.$column['id_st_easy_content_column']; 
        if(isset($column['st_spacing']) && $column['st_spacing']!=='')
            $custom_css .= $column_prefix.' .steasy_element_item{padding: '.(int)$column['st_spacing'].'px;}'; 

        if (isset($column['st_direction_color']) && $column['st_direction_color'])
            $custom_css .= $column_prefix.' .swiper-button{color:'.$column['st_direction_color'].';}';
        if (isset($column['st_direction_color_hover']) && $column['st_direction_color_hover'])
            $custom_css .= $column_prefix.' .swiper-button:hover{color:'.$column['st_direction_color_hover'].';}';
        if (isset($column['st_direction_color_disabled']) && $column['st_direction_color_disabled'])
            $custom_css .= $column_prefix.' .swiper-button.swiper-button-disabled, '.$column_prefix.' .swiper-button.swiper-button-disabled:hover{color:'.$column['st_direction_color_disabled'].';}';
        
        if (isset($column['st_direction_bg']) && $column['st_direction_bg'])
            $custom_css .= $column_prefix.' .swiper-button{background-color:'.$column['st_direction_bg'].';}';
        if (isset($column['st_direction_hover_bg']) && $column['st_direction_hover_bg'])
            $custom_css .= $column_prefix.' .swiper-button:hover{background-color:'.$column['st_direction_hover_bg'].';}';
        if (isset($column['st_direction_disabled_bg']) && $column['st_direction_disabled_bg'])
            $custom_css .= $column_prefix.' .swiper-button.swiper-button-disabled, '.$column_prefix.' .swiper-button.swiper-button-disabled:hover{background-color:'.$column['st_direction_disabled_bg'].';}';
        /*else
            $custom_css .= $column_prefix.' .swiper-button.swiper-button-disabled, '.$column_prefix.' .swiper-button.swiper-button-disabled:hover{background-color:transparent;}';*/

        if (isset($column['st_pag_nav_bg']) && $column['st_pag_nav_bg'])
        {
            $custom_css .= $column_prefix.' .swiper-pagination-bullet, '.$column_prefix.' .swiper-pagination-progress{background-color:'.$column['st_pag_nav_bg'].';}';
            $custom_css .= $column_prefix.' .swiper-pagination-st-round .swiper-pagination-bullet{background-color:transparent;border-color:'.$column['st_pag_nav_bg'].';}';
            $custom_css .= $column_prefix.' .swiper-pagination-st-round .swiper-pagination-bullet span{background-color:'.$column['st_pag_nav_bg'].';}';
        }
        if (isset($column['st_pag_nav_bg_hover']) && $column['st_pag_nav_bg_hover'])
        {
            $custom_css .= $column_prefix.' .swiper-pagination-bullet-active, '.$column_prefix.' .swiper-pagination-progress .swiper-pagination-progressbar{background-color:'.$column['st_pag_nav_bg_hover'].';}';
            $custom_css .= $column_prefix.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active{background-color:'.$column['st_pag_nav_bg_hover'].';border-color:'.$column['st_pag_nav_bg_hover'].';}';
            $custom_css .= $column_prefix.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active span{background-color:'.$column['st_pag_nav_bg_hover'].';}';
        }

        foreach ($column['elements'] as $element) {

            $prefix = '#steasy_element_'.$element['id_st_easy_content_element'].' .textboxes_'.$element['st_el_textboxes']; 

            if(isset($element['st_el_text_style_color']) && $element['st_el_text_style_color'])
            {
                $custom_css .= $prefix.' .blockquote {border-left-color: '.$element['st_el_text_style_color'].';}';  
                $custom_css .= $prefix.' .blockquote_1>p:first-of-type:before, '.$prefix.' .blockquote_1>p:first-of-type:after {color: '.$element['st_el_text_style_color'].';}';  
            }

            $image_border_size = isset($element['st_image_border_size']) ? (int)$element['st_image_border_size'] : '';
            if($image_border_size || $image_border_size===0 || $image_border_size==='0')
                $custom_css .= $prefix.' .easy_image{border: '.(int)$image_border_size.'px solid transparent;}'; 
            if(isset($element['st_image_border_color']) && $element['st_image_border_color'])
                $custom_css .= $prefix.' .easy_image{border-color: '.$element['st_image_border_color'].';}'; 
            if(isset($element['st_image_border_radius']) && $element['st_image_border_radius']!=='')
                $custom_css .= $prefix.' .easy_image{border-radius: '.(int)$element['st_image_border_radius'].'px;}'; 
            if(isset($element['st_image_width']) && $element['st_image_width'])
                $custom_css .= $prefix.' .easy_image{width: '.(int)$element['st_image_width'].'px;}'; 
            //
            if(isset($element['st_header_color']) && $element['st_header_color'])
                $custom_css .= $prefix.' .easy_header{color: '.$element['st_header_color'].';}';
            if(isset($element['st_header_size']) && $element['st_header_size'])
                $custom_css .= $prefix.' .easy_header{font-size: '.(int)$element['st_header_size'].'px;}';
            if(isset($element['st_sub_header_color']) && $element['st_sub_header_color'])
                $custom_css .= $prefix.' .easy_sub_header{color: '.$element['st_sub_header_color'].';}';
            if(isset($element['st_sub_header_size']) && $element['st_sub_header_size'])
                $custom_css .= $prefix.' .easy_sub_header{font-size: '.(int)$element['st_sub_header_size'].'px;}';
            if(isset($element['st_header_font_select']) && $element['st_header_font_select'])
                $custom_css .= $prefix.' .easy_header, '.$prefix.' .easy_sub_header'.($element['st_text_font'] ? ','.$prefix.' .easy_text,'.$prefix.' .easy_additional_info' : '').'{font-family: '.$element['st_header_font_select'].';}';
            if(isset($element['st_header_font_weight']) && $element['st_header_font_weight'])
                $custom_css .= $prefix.' .easy_header, '.$prefix.' .easy_sub_header{'.$this->fontWeight($element['st_header_font_weight']).'}';
            if(isset($element['st_star_color']) && $element['st_star_color'])
                $custom_css .= $prefix.' .stars_box i.star_off{color: '.$element['st_star_color'].';}';
            if(isset($element['st_star_light_color']) && $element['st_star_light_color'])
                $custom_css .= $prefix.' .stars_box i.star_on{color: '.$element['st_star_light_color'].';}';
            if(isset($element['st_text_color']) && $element['st_text_color'])
                $custom_css .= $prefix.' .easy_text{color: '.$element['st_text_color'].';}';
            if(isset($element['st_text_size']) && $element['st_text_size'])
                $custom_css .= $prefix.' .easy_text{font-size: '.(int)$element['st_text_size'].'px;}';
            if(isset($element['st_el_info_color']) && $element['st_el_info_color'])
                $custom_css .= $prefix.' .easy_additional_info{color: '.$element['st_el_info_color'].';}';
            if(isset($element['st_el_info_size']) && $element['st_el_info_size'])
                $custom_css .= $prefix.' .easy_additional_info{font-size: '.(int)$element['st_el_info_size'].'px;}';
            if(isset($element['st_link_color']) && $element['st_link_color'])
                $custom_css .= $prefix.' .easy_link{color: '.$element['st_link_color'].';}';
            if(isset($element['st_link_hover_color']) && $element['st_link_hover_color'])
                $custom_css .= $prefix.' .easy_link:hover{color: '.$element['st_link_hover_color'].';}';
            if(isset($element['st_link_bg']) && $element['st_link_bg'])
                $custom_css .= $prefix.' .easy_link{background-color: '.$element['st_link_bg'].';border-color: '.$element['st_link_bg'].';box-shadow:none;}';//btn-defaults use shadow as background, have to set shadow to none here to show background colors out.
            if(isset($element['st_link_hover_bg']) && $element['st_link_hover_bg'])
                $custom_css .= $prefix.' .easy_link:hover{background-color: '.$element['st_link_hover_bg'].';border-color: '.$element['st_link_hover_bg'].';}';
            //
            $prefix_item = '#steasy_element_'.$element['id_st_easy_content_element'].' .steasy_element_item';
            if(isset($element['st_item_bg']) && $element['st_item_bg'])
                $custom_css .= $prefix_item.'{background-color: '.$element['st_item_bg'].';}';
            if(isset($element['st_item_top_padding']) && $element['st_item_top_padding']!=='')
                $custom_css .= $prefix_item.'{padding-top: '.(int)$element['st_item_top_padding'].'px;}';
            if(isset($element['st_item_bottom_padding']) && $element['st_item_bottom_padding']!=='')
                $custom_css .= $prefix_item.'{padding-bottom: '.(int)$element['st_item_bottom_padding'].'px;}'; 
            if(isset($element['st_item_border_size']) && $element['st_item_border_size'])
                $custom_css .= $prefix_item.'{border: '.(int)$element['st_item_border_size'].'px solid transparent;}'; 
            if(isset($element['st_item_border_color']) && $element['st_item_border_color'])
                $custom_css .= $prefix_item.'{border-color: '.$element['st_item_border_color'].';}'; 
            if(isset($element['st_item_border_radius']) && $element['st_item_border_radius']!=='')
                $custom_css .= $prefix_item.'{border-radius: '.(int)$element['st_item_border_radius'].'px;}'; 

        }

        return $custom_css;
    }
    public function write_css_element_6($column){
        $custom_css = '';

        $column_prefix = '#steasy_column_'.$column['id_st_easy_content_column']; 

        foreach ($column['elements'] as $element) {

        $prefix = '#easy_products_container_'.$element['id_st_easy_content_element']; 

            if(isset($element['st_grid']) && $element['st_grid']==1 && isset($element['st_spacing']) && ($element['st_spacing'] || $element['st_spacing']===0 || $element['st_spacing']==='0'))
            {
                $custom_css .= $prefix.' .product_list.grid .product_list_item{padding-left:'.ceil($element['st_spacing']/2).'px;padding-right:'.floor($element['st_spacing']/2).'px;}';
                $custom_css .= $prefix.' .product_list.grid{margin-left:-'.ceil($element['st_spacing']/2).'px;margin-right:-'.floor($element['st_spacing']/2).'px;}';
            }

            if (isset($element['st_text_color']) && $element['st_text_color'])
                $custom_css .= $prefix.' .ajax_block_product .s_title_block a,
                '.$prefix.' .ajax_block_product .old_price,
                '.$prefix.' .ajax_block_product .product_desc{color:'.$element['st_text_color'].';}';
    
            if (isset($element['st_price_color']) && $element['st_price_color'])
                $custom_css .= $prefix.' .ajax_block_product .price{color:'.$element['st_price_color'].';}';
            if (isset($element['st_link_hover_color']) && $element['st_link_hover_color'])
                $custom_css .= $prefix.' .ajax_block_product .s_title_block a:hover{color:'.$element['st_link_hover_color'].';}';
    
            if (isset($element['st_grid_bg']) && $element['st_grid_bg'])
                $custom_css .= $prefix.' .pro_outer_box .pro_second_box{background-color:'.$element['st_grid_bg'].';}';
            if (isset($element['st_grid_hover_bg']) && $element['st_grid_hover_bg'])
                $custom_css .= $prefix.' .pro_outer_box:hover .pro_second_box{background-color:'.$element['st_grid_hover_bg'].';}';

            if (isset($element['st_direction_color']) && $element['st_direction_color'])
                $custom_css .= $prefix.'.block .products_slider .swiper-button{color:'.$element['st_direction_color'].';}';
            if (isset($element['st_direction_color_hover']) && $element['st_direction_color_hover'])
                $custom_css .= $prefix.'.block .products_slider .swiper-button:hover{color:'.$element['st_direction_color_hover'].';}';
            if (isset($element['st_direction_color_disabled']) && $element['st_direction_color_disabled'])
                $custom_css .= $prefix.'.block .products_slider .swiper-button.swiper-button-disabled, '.$prefix.'.block .products_slider .swiper-button.swiper-button-disabled:hover{color:'.$element['st_direction_color_disabled'].';}';
            
            if (isset($element['st_direction_bg']) && $element['st_direction_bg'])
                $custom_css .= $prefix.'.block .products_slider .swiper-button{background-color:'.$element['st_direction_bg'].';}';
            if (isset($element['st_direction_hover_bg']) && $element['st_direction_hover_bg'])
                $custom_css .= $prefix.'.block .products_slider .swiper-button:hover{background-color:'.$element['st_direction_hover_bg'].';}';
            if (isset($element['st_direction_disabled_bg']) && $element['st_direction_disabled_bg'])
                $custom_css .= $prefix.'.block .products_slider .swiper-button.swiper-button-disabled, '.$prefix.'.block .products_slider .swiper-button.swiper-button-disabled:hover{background-color:'.$element['st_direction_disabled_bg'].';}';
            /*else
                $custom_css .= $prefix.' .products_slider .swiper-button.swiper-button-disabled, '.$prefix.' .products_slider .swiper-button.swiper-button-disabled:hover{background-color:transparent;}';*/

            if (isset($element['st_pag_nav_bg']) && $element['st_pag_nav_bg'])
            {
                $custom_css .= $prefix.' .swiper-pagination-bullet, '.$prefix.' .swiper-pagination-progress{background-color:'.$element['st_pag_nav_bg'].';}';
                $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet{background-color:transparent;border-color:'.$element['st_pag_nav_bg'].';}';
                $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet span{background-color:'.$element['st_pag_nav_bg'].';}';
            }
            if (isset($element['st_pag_nav_bg_hover']) && $element['st_pag_nav_bg_hover'])
            {
                $custom_css .= $prefix.' .swiper-pagination-bullet-active, '.$prefix.' .swiper-pagination-progress .swiper-pagination-progressbar{background-color:'.$element['st_pag_nav_bg_hover'].';}';
                $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active{background-color:'.$element['st_pag_nav_bg_hover'].';border-color:'.$element['st_pag_nav_bg_hover'].';}';
                $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active span{background-color:'.$element['st_pag_nav_bg_hover'].';}';
            }
            
            //
            if(isset($element['st_item_bg']) && $element['st_item_bg'])
                $custom_css .= $prefix.'{background-color: '.$element['st_item_bg'].';}';
            if(isset($element['st_item_top_padding']) && $element['st_item_top_padding']!=='')
                $custom_css .= $prefix.'{padding-top: '.(int)$element['st_item_top_padding'].'px;}';
            if(isset($element['st_item_bottom_padding']) && $element['st_item_bottom_padding']!=='')
                $custom_css .= $prefix.'{padding-bottom: '.(int)$element['st_item_bottom_padding'].'px;}'; 
            

            if(isset($element['st_title_font_size']) && $element['st_title_font_size'])
                 $custom_css .= $prefix.' .title_block_inner{font-size:'.$element['st_title_font_size'].'px;}';
            if(isset($element['st_title_color']) && $element['st_title_color'])
                 $custom_css .= $prefix.' .title_block_inner{color:'.$element['st_title_color'].';}';
            if(isset($element['st_title_hover_color']) && $element['st_title_hover_color'])
                 $custom_css .= $prefix.' .title_block_inner:hover{color:'.$element['st_title_hover_color'].';}';
    
    
            if(isset($element['st_title_bottom_border']) && ($element['st_title_bottom_border'] || $element['st_title_bottom_border']===0 || $element['st_title_bottom_border']==='0'))
            {
                $custom_css .=  $prefix.' .title_style_0,'.$prefix.' .title_style_0 .title_block_inner{border-bottom-width:'.$element['st_title_bottom_border'].'px;}'.$prefix.' .title_style_0 .title_block_inner{margin-bottom:-'.$element['st_title_bottom_border'].'px;}';
                $custom_css .=  $prefix.' .title_style_1 .flex_child, '.$prefix.' .title_style_3 .flex_child{border-bottom-width:'.$element['st_title_bottom_border'].'px;}';
                $custom_css .=  $prefix.' .title_style_2 .flex_child{border-bottom-width:'.$element['st_title_bottom_border'].'px;border-top-width:'.$element['st_title_bottom_border'].'px;}';
            }
            
            if(isset($element['st_title_bottom_border_color']) && $element['st_title_bottom_border_color'])
                $custom_css .= $prefix.' .title_style_0, '.$prefix.' .title_style_1 .flex_child, '.$prefix.' .title_style_2 .flex_child, '.$prefix.' .title_style_3 .flex_child{border-bottom-color: '.$element['st_title_bottom_border_color'].';}'.$prefix.' .title_style_2 .flex_child{border-top-color: '.$element['st_title_bottom_border_color'].';}';  
            if(isset($element['st_title_bottom_border_color_h']) && $element['st_title_bottom_border_color_h'])
                $custom_css .= $prefix.' .title_style_0 .title_block_inner{border-color: '.$element['st_title_bottom_border_color_h'].';}';  

        }

        return $custom_css;
    }
    public function write_css_element_2($column){
        $custom_css = '';

        foreach ($column['elements'] as $element) {

            $prefix = '#steasy_element_'.$element['id_st_easy_content_element'].'.sttext_block'; 

            if (isset($element['st_title_font_size']) && $element['st_title_font_size'])
                $custom_css .= $prefix.' .title_block_inner{font-size:'.$element['st_title_font_size'].'px;}';

            if (isset($element['st_title_color']) && $element['st_title_color'])
                $custom_css .= $prefix.' .title_block_inner{color:'.$element['st_title_color'].';}';
            if(isset($element['st_title_bottom_border']) && ($element['st_title_bottom_border'] || $element['st_title_bottom_border']==='0' || $element['st_title_bottom_border']===0))
                $custom_css .= $prefix.' .title_block,'.$prefix.' .title_block_inner{border-bottom-width:'.$element['st_title_bottom_border'].'px;}'.$prefix.' .title_block_inner{margin-bottom:'.$element['st_title_bottom_border'].'px;}';
            
            if(isset($element['st_title_bottom_border_color']) && $element['st_title_bottom_border_color'])
                $custom_css .=$prefix.' .title_block {border-bottom-color: '.$element['st_title_bottom_border_color'].'; border-bottom-style: solid;}';  
            if(isset($element['st_title_bottom_border_color_h']) && $element['st_title_bottom_border_color_h'])
                $custom_css .=$prefix.' .title_block_inner{border-bottom-color: '.$element['st_title_bottom_border_color_h'].'; border-bottom-style: solid;}'; 

            if (isset($element['st_el_text_size']) && $element['st_el_text_size'])
                $custom_css .= $prefix.' .sttext_item_content{font-size:'.$element['st_el_text_size'].'px;}';

            if(isset($element['st_el_text_style_color']) && $element['st_el_text_style_color'])
            {
                $custom_css .= $prefix.' .dropcap>p:first-of-type::first-letter{color: '.$element['st_el_text_style_color'].';}'; 
                $custom_css .= $prefix.' .blockquote {border-left-color: '.$element['st_el_text_style_color'].';}';  
                $custom_css .= $prefix.' .blockquote_1>p:first-of-type:before, '.$prefix.' .blockquote_1>p:first-of-type:after {color: '.$element['st_el_text_style_color'].';}';  
            }
            
            $border_size = isset($element['st_image_border_size']) ? $element['st_image_border_size'] : '';
            if($border_size || $border_size===0 || $border_size==='0')
                $custom_css .= $prefix.' .sttext_item_image_inner img{border: '.(int)$border_size.'px solid transparent;}'; 
            if(isset($element['st_image_border_color']) && $element['st_image_border_color'])
                $custom_css .= $prefix.' .sttext_item_image_inner img{border-color: '.$element['st_image_border_color'].';}'; 
            if(isset($element['st_image_border_radius']) && $element['st_image_border_radius']!=='')
                $custom_css .= $prefix.' .sttext_item_image_inner img{border-radius: '.(int)$element['st_image_border_radius'].'px;}'; 

            if(isset($element['st_content_color']) && $element['st_content_color'])
                $custom_css .= $prefix.'{color: '.$element['st_content_color'].';}';
            if(isset($element['st_content_link']) && $element['st_content_link'])
                $custom_css .= $prefix.' a{color: '.$element['st_content_link'].';}';
            if(isset($element['st_content_hover_link']) && $element['st_content_hover_link'])
                $custom_css .= $prefix.' a:hover{color: '.$element['st_content_hover_link'].';}';
            if(isset($element['st_content_bg']) && $element['st_content_bg'])
                $custom_css .= $prefix.'{background-color: '.$element['st_content_bg'].';}';

            if(isset($element['st_item_top_padding']) && $element['st_item_top_padding']!=='')
                $custom_css .= $prefix.'{padding-top: '.(int)$element['st_item_top_padding'].'px;}';
            if(isset($element['st_item_bottom_padding']) && $element['st_item_bottom_padding']!=='')
                $custom_css .= $prefix.'{padding-bottom: '.(int)$element['st_item_bottom_padding'].'px;}'; 
        }

        return $custom_css;
    }


    public function write_css_element_5($column){
        $custom_css = '';

        foreach ($column['elements'] as $element) {

            $prefix = '#steasy_element_'.$element['id_st_easy_content_element']; 
            $prefix_text = '#steasy_element_'.$element['id_st_easy_content_element'].' .sttext_banner_text'; 
            $prefix_first_btn = '#steasy_element_'.$element['id_st_easy_content_element'].' .sttext_banner_first_btn'; 
            $prefix_second_btn = '#steasy_element_'.$element['id_st_easy_content_element'].' .sttext_banner_second_btn'; 
            
            if(isset($element['st_first_btn_font_size']) && $element['st_first_btn_font_size'])
                $custom_css .= $prefix_first_btn.'{font-size: '.(int)$element['st_first_btn_font_size'].'px;}';
            if(isset($element['st_first_btn_height']) && $element['st_first_btn_height'])
                $custom_css .= $prefix_first_btn.'{height: '.(int)$element['st_first_btn_height'].'px;line-height: '.((int)$element['st_first_btn_height']-2).'px;}';
            if(isset($element['st_first_btn_lr_padding']) && $element['st_first_btn_lr_padding'])
                $custom_css .= $prefix_first_btn.'{padding-left: '.((int)$element['st_first_btn_lr_padding']+16).'px;padding-right: '.((int)$element['st_first_btn_lr_padding']+16).'px;}';
            if(isset($element['st_first_btn_color']) && $element['st_first_btn_color'])
                $custom_css .= $prefix_first_btn.'{color: '.$element['st_first_btn_color'].';}';
            if(isset($element['st_first_btn_hover_color']) && $element['st_first_btn_hover_color'])
                $custom_css .= $prefix_first_btn.':hover{color: '.$element['st_first_btn_hover_color'].';}';
            if(isset($element['st_first_btn_border_color']) && $element['st_first_btn_border_color'])
                $custom_css .= $prefix_first_btn.'{border-color: '.$element['st_first_btn_border_color'].';}';
            if(isset($element['st_first_btn_bg']) && $element['st_first_btn_bg'])
                $custom_css .= $prefix_first_btn.'{background-color: '.$element['st_first_btn_bg'].';border-color: '.$element['st_first_btn_bg'].';}';
            if(isset($element['st_first_btn_hover_bg']) && $element['st_first_btn_hover_bg']) {
                $custom_css .= $prefix_first_btn.':hover{border-color:'.$element['st_first_btn_hover_bg'].';}';
                $btn_fill_animation = isset($element['st_first_btn_bg']) && $element['st_first_btn_bg'] ? 0 : (int)Configuration::get('STSN_BTN_FILL_ANIMATION');
                if($btn_fill_animation)
                    $custom_css .= $prefix_first_btn.'{-webkit-box-shadow: inset 0 0 0 0 '.$v['st_first_btn_hover_bg'].'; box-shadow: inset 0 0 0 0 '.$v['st_first_btn_hover_bg'].';}';
                
                switch ($btn_fill_animation) {
                    case 1:
                        $custom_css .= $prefix_first_btn.':hover{-webkit-box-shadow: inset 0 100px 0 0 '.$element['st_first_btn_hover_bg'].'; box-shadow: inset 0 100px 0 0 '.$element['st_first_btn_hover_bg'].';background-color:transparent;}';
                        break;
                    case 2:
                        $custom_css .= $prefix_first_btn.':hover{-webkit-box-shadow: inset 0 -100px 0 0 '.$element['st_first_btn_hover_bg'].'; box-shadow: inset 0 -100px 0 0 '.$element['st_first_btn_hover_bg'].';background-color:transparent;}';
                        break;
                    case 3:
                        $custom_css .= $prefix_first_btn.':hover{-webkit-box-shadow: inset 300px 0 0 0 '.$element['st_first_btn_hover_bg'].'; box-shadow: inset 300px 0 0 0 '.$element['st_first_btn_hover_bg'].';background-color:transparent;}';
                        break;
                    case 4:
                        $custom_css .= $prefix_first_btn.':hover{-webkit-box-shadow: inset -300px 0 0 0 '.$element['st_first_btn_hover_bg'].'; box-shadow: inset -300px 0 0 0 '.$element['st_first_btn_hover_bg'].';background-color:transparent;}';
                        break;
                    default:
                        $custom_css .= $prefix_first_btn.':hover{-webkit-box-shadow: none; box-shadow: none;background-color: '.$element['st_first_btn_hover_bg'].';}';
                        break;
                }
            }

            if(isset($element['st_second_btn_font_size']) && $element['st_second_btn_font_size'])
                $custom_css .= $prefix_second_btn.'{font-size: '.(int)$element['st_second_btn_font_size'].'px;}';
            if(isset($element['st_second_btn_height']) && $element['st_second_btn_height'])
                $custom_css .= $prefix_second_btn.'{height: '.(int)$element['st_second_btn_height'].'px;line-height: '.((int)$element['st_second_btn_height']-2).'px;}';
            if(isset($element['st_second_btn_lr_padding']) && $element['st_second_btn_lr_padding'])
                $custom_css .= $prefix_second_btn.'{padding-left: '.((int)$element['st_second_btn_lr_padding']+16).'px;padding-right: '.((int)$element['st_second_btn_lr_padding']+16).'px;}';
            if(isset($element['st_second_btn_color']) && $element['st_second_btn_color'])
                $custom_css .= $prefix_second_btn.'{color: '.$element['st_second_btn_color'].';}';
            if(isset($element['st_second_btn_hover_color']) && $element['st_second_btn_hover_color'])
                $custom_css .= $prefix_second_btn.':hover{color: '.$element['st_second_btn_hover_color'].';}';
            if(isset($element['st_second_btn_border_color']) && $element['st_second_btn_border_color'])
                $custom_css .= $prefix_second_btn.'{border-color: '.$element['st_second_btn_border_color'].';}';
            if(isset($element['st_second_btn_bg']) && $element['st_second_btn_bg'])
                $custom_css .= $prefix_second_btn.'{background-color: '.$element['st_second_btn_bg'].';border-color: '.$element['st_second_btn_bg'].';}';
            if(isset($element['st_second_btn_hover_bg']) && $element['st_second_btn_hover_bg']) {
                $custom_css .= $prefix_second_btn.':hover{border-color:'.$element['st_second_btn_hover_bg'].';}';
                $btn_fill_animation = isset($element['st_second_btn_bg']) && $element['st_second_btn_bg'] ? 0 : (int)Configuration::get('STSN_BTN_FILL_ANIMATION');
                if($btn_fill_animation)
                    $custom_css .= $prefix_first_btn.'{-webkit-box-shadow: inset 0 0 0 0 '.$v['st_second_btn_hover_bg'].'; box-shadow: inset 0 0 0 0 '.$v['st_second_btn_hover_bg'].';}';
                
                switch ($btn_fill_animation) {
                    case 1:
                        $custom_css .= $prefix_second_btn.':hover{-webkit-box-shadow: inset 0 100px 0 0 '.$element['st_second_btn_hover_bg'].'; box-shadow: inset 0 100px 0 0 '.$element['st_second_btn_hover_bg'].';background-color:transparent;}';
                        break;
                    case 2:
                        $custom_css .= $prefix_second_btn.':hover{-webkit-box-shadow: inset 0 -100px 0 0 '.$element['st_second_btn_hover_bg'].'; box-shadow: inset 0 -100px 0 0 '.$element['st_second_btn_hover_bg'].';background-color:transparent;}';
                        break;
                    case 3:
                        $custom_css .= $prefix_second_btn.':hover{-webkit-box-shadow: inset 300px 0 0 0 '.$element['st_second_btn_hover_bg'].'; box-shadow: inset 300px 0 0 0 '.$element['st_second_btn_hover_bg'].';background-color:transparent;}';
                        break;
                    case 4:
                        $custom_css .= $prefix_second_btn.':hover{-webkit-box-shadow: inset -300px 0 0 0 '.$element['st_second_btn_hover_bg'].'; box-shadow: inset -300px 0 0 0 '.$element['st_second_btn_hover_bg'].';background-color:transparent;}';
                        break;
                    default:
                        $custom_css .= $prefix_second_btn.':hover{-webkit-box-shadow: none; box-shadow: none;background-color: '.$element['st_second_btn_hover_bg'].';}';
                        break;
                }
            }

            if(isset($element['st_text_margin_bottom']) && $element['st_text_margin_bottom']!=='')
                $custom_css .= $prefix_text.'{margin-bottom: '.(int)$element['st_text_margin_bottom'].'px;}';
            if(isset($element['st_content_color']) && $element['st_content_color'])
                $custom_css .= $prefix_text.'{color: '.$element['st_content_color'].';}';
            if(isset($element['st_content_link']) && $element['st_content_link'])
                $custom_css .= $prefix_text.' a{color: '.$element['st_content_link'].';}';
            if(isset($element['st_content_hover_link']) && $element['st_content_hover_link'])
                $custom_css .= $prefix_text.' a:hover{color: '.$element['st_content_hover_link'].';}';
            if(isset($element['st_content_bg']) && $element['st_content_bg'])
                $custom_css .= $prefix.'{background-color: '.$element['st_content_bg'].';}';

            if(isset($element['st_item_top_padding']) && $element['st_item_top_padding']!=='')
                $custom_css .= $prefix.'{padding-top: '.(int)$element['st_item_top_padding'].'px;}';
            if(isset($element['st_item_bottom_padding']) && $element['st_item_bottom_padding']!=='')
                $custom_css .= $prefix.'{padding-bottom: '.(int)$element['st_item_bottom_padding'].'px;}'; 
        }

        return $custom_css;
    }

    public function write_css_element_11($column){
        $custom_css = '';

        foreach ($column['elements'] as $element) {

            $prefix = '#steasy_element_'.$element['id_st_easy_content_element']; 
            if(isset($element['st_text_size']) && $element['st_text_size'])
                $custom_css .= $prefix.'{font-size: '.$element['st_text_size'].'px;}'; 
            $st_border_size = isset($element['st_border_size']) ? $element['st_border_size'] : false;
            if($st_border_size || $st_border_size==='0' || $st_border_size===0)
            {
                $custom_css .= $prefix.' .steasy_divider_item{border-bottom-width: '.$element['st_border_size'].'px;}'; 
                $custom_css .= $prefix.'.steasy_divider_1_2 .steasy_divider_item{border-top-width: '.$element['st_border_size'].'px;}'; 
            }
            if(isset($element['st_border_style']) && $element['st_border_style'])
            {
                $custom_css .= $prefix.' .steasy_divider_item{border-bottom-style: '.($element['st_border_style']==1 ? 'dotted' : 'dashed').';}';
                $custom_css .= $prefix.'.steasy_divider_1_2 .steasy_divider_item{border-top-style: '.($element['st_border_style']==1 ? 'dotted' : 'dashed').';}';
            }
            $st_margin_top = isset($element['st_margin_top']) ? $element['st_margin_top'] : false;
            if($st_margin_top || $st_margin_top===0 || $st_margin_top==='0')
                $custom_css .= $prefix.'{margin-top: '.$st_margin_top.'px;}';             
            $st_margin_bottom = isset($element['st_margin_bottom']) ? $element['st_margin_bottom'] : false;
            if($st_margin_bottom || $st_margin_bottom===0 || $st_margin_bottom==='0')
                $custom_css .= $prefix.'{margin-bottom: '.$st_margin_bottom.'px;}'; 
            if(isset($element['st_text_color']) && $element['st_text_color'])
                $custom_css .= $prefix.'{color: '.$element['st_text_color'].';}'; 
            if(isset($element['st_border_color']) && $element['st_border_color'])
                $custom_css .= $prefix.' .steasy_divider_item{border-color: '.$element['st_border_color'].';}'; 
            if(isset($element['st_width']) && $element['st_width'])
            {
                $custom_css .= $prefix.'{width: '.$element['st_width'].'px;}'; 
                if(isset($element['st_text_align']) && $element['st_text_align'])
                    $custom_css .= $prefix.'{'.($element['st_text_align']==1 ? 'margin-left' : 'margin-right').': 0;}';
            }

        }

        return $custom_css;
    }
    public function hookDisplayStackedFooter1($params)
    {
        $id_st_easy_content = isset($params['id_st_easy_content']) ? (int)$params['id_st_easy_content'] : null;
        $cache_id = '13'.($id_st_easy_content ? '-'.(string)$id_st_easy_content : '');
        if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId($cache_id)))
        {
            if(!is_null($id_st_easy_content))
            {
                $this->_prepareHook($id_st_easy_content,100,array('is_stacked_footer'=>true));
            }
            else
                $this->_prepareHook(13);
        }
        return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayStackedFooter2($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(38)))
            $this->_prepareHook(38);
        return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(38));
    }
    public function hookDisplayStackedFooter3($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(55)))
            $this->_prepareHook(55);
        return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(55));
    }
    public function hookDisplayStackedFooter4($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(39)))
            $this->_prepareHook(39);
        return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(39));
    }
    public function hookDisplayStackedFooter5($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(40)))
            $this->_prepareHook(40);
        return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(40));
    }
	public function hookDisplayStackedFooter6($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(41)))
    		$this->_prepareHook(41);
		return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(41));
	}
		
    public function hookdisplayInfoCheckout($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId(999)))
            $this->_prepareHook(999);
        return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId(999));
    }
    
public function hookdisplayButtonNextText($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId(997)))
            $this->_prepareHook(997);
        return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId(997));
    }
	
    
     public function hookDisplayFooterTop($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(322)))
    		$this->_prepareHook(array(322, 4322, 4422, 4522, 4622,8122,8222,8322,8422, 4722,5622));
		return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(322));
	}
	
	
	
	public function hookDisplayFooterTopBlog($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(32243)))
    		$this->_prepareHook(array(32243, 432243, 442243, 452243, 462243,812243,822243,832243,842243, 472243,562243));
		return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(32243));
	}
	
    public function hookDisplayFooterMiddleBlog($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(32244)))
    		$this->_prepareHook(array(32244, 432244, 442244, 452244, 462244,812244,822244,832244,842244, 472244,562244));
		return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(32244));
	}	
	
	
     public function hookDisplayFooterBottomBlog($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(32245)))
    		$this->_prepareHook(array(32245, 432245, 442245, 452245, 462245,812245,822245,832245,842245, 472245,562245));
		return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(32245));
	}
	
	

         public function hookDisplayFooterCheckout($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(3272)))
    		$this->_prepareHook(array(3272, 4372, 4472, 4572, 4672,8172,8272,8372,8472, 4772,5672));
		return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(3272));
	}
	
	public function hookDisplayFooter($params)
	{
        $id_st_easy_content = isset($params['id_st_easy_content']) ? (int)$params['id_st_easy_content'] : null;
        $cache_id = '3'.($id_st_easy_content ? '-'.(string)$id_st_easy_content : '');
		if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId($cache_id)))
        {
            if(!is_null($id_st_easy_content))
            {
                $vc = array();
                $this->_prepareHook($id_st_easy_content,100,$vc);
            }
            else
    		  $this->_prepareHook(array(3, 43, 44, 45, 46,81,82,83,84, 47,56), 1);
        }
		return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId($cache_id));
	}

	public function hookDisplayFooterAfter($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(12)))
    		$this->_prepareHook(array(12, 48, 49, 50, 51,91,92,93,94, 52,57));
		return $this->fetch($this->templatePath.'steasycontent-footer.tpl', $this->stGetCacheId(12));
	}
	
	
    public function hookDisplayFooterTopBlogStacked_1($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId(241123)))
    		$this->_prepareHook(array(241123));
		return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId(241123));
	}
	
    public function hookDisplayFooterTopBlogStacked_2($params)
	{
		if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId(251123)))
    		$this->_prepareHook(array(251123));
		return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId(251123));
	}
	
	
    public function hookDisplayProductRightColumn($params)
    {
        $id_product = Tools::getValue('id_product');
        if (!$id_product) {
            return false;
        }
        $cache_id = '6-'.$id_product;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
		  $this->_prepareHook(0, 6);
		return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayFooterProduct($params)
    {
        $id_product = Tools::getValue('id_product');
        if (!$id_product) {
            return false;
        }
        $cache_id = '7-'.$id_product;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,7);
		return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayCategoryHeader($params)
    {
        $id_category = Tools::getValue('id_category');

        /*
			iWeb - 2023-02-03
        */
        if ( !$id_category ) $id_category = Tools::getValue('id_category_search');

        if ( !$id_category ) return false;

        $cache_id = '4-'.$id_category;
        if (!$this->isCached($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,4);
		return $this->fetch($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId($cache_id));
    }
    
	public function hookDisplayCategoryHeaderListing($params)
    {
        $id_category = (int)Tools::getValue('id_category');
        if(!$id_category)
            return false;
		if (!$this->isCached($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId($id_category,'category_list_column','steasycontent')))
            $this->_prepareHook($id_category,4,0);
		return $this->fetch($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId($id_category,'category_list_column','steasycontent'));
    }
    
    public function hookDisplayCategoryFooter($params)
    {
        $id_category = Tools::getValue('id_category');
        if (!$id_category) {
            return false;
        }
        $cache_id = '5-'.$id_category;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,5);
		return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayManufacturerHeader($params)
    {
        $id_manufacturer = Tools::getValue('id_manufacturer');
        if (!$id_manufacturer) {
            return false;
        }
        $cache_id = '15-'.$id_manufacturer;
        if (!$this->isCached($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,15);
		return $this->fetch($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId($cache_id));
    }
    
    public function hookDisplayManufacturerHeaderListing($params)
    {
        $id_manufacturer = Tools::getValue('id_manufacturer');
        if (!$id_manufacturer) {
            return false;
        }
        $cache_id = '15-'.$id_manufacturer;
        if (!$this->isCached($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,15);
		return $this->fetch($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId($cache_id));
    }
    
public function hookDisplayPromotion($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(220),1);
        return $this->fetch($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId(0));
    }
    
   public function hookDisplayPromotionListing($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(220),1);
        return $this->fetch($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId(0));
    }
    
   public function hookDisplaySearch($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(221),1);
        return $this->fetch($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId(0));
    }
    
   public function hookDisplaySearchListing($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(221),1);
        return $this->fetch($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId(0));
    }
    
  public function hookDisplayNewproduct($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(222),1);
        return $this->fetch($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId(0));
    }
    
   public function hookDisplayNewproductListing($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(222),1);
        return $this->fetch($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId(0));
    }
    
  public function hookDisplayBestsales($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(223),1);
        return $this->fetch($this->templatePath.'steasycontent-category.tpl', $this->stGetCacheId(0));
    }
    
   public function hookDisplayBestsalesListing($params)
    {
        if (!$this->isCached($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(223),1);
        return $this->fetch($this->templatePath.'steasycontent-listing.tpl', $this->stGetCacheId(0));
    }
    
    public function hookDisplayManufacturerFooter($params)
    {
        $id_manufacturer = Tools::getValue('id_manufacturer');
        if (!$id_manufacturer) {
            return false;
        }
        $cache_id = '16-'.$id_manufacturer;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,16);
		return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayProductCenterColumn($params)
    {
        $id_product = Tools::getValue('id_product');
        if (!$id_product) {
            return false;
        }
        $cache_id = '8-'.$id_product;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,8);
        return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    /*public function hookProductTab($params)
	{
		$id_product = Tools::getValue('id_product');
        if (!$id_product) {
            return false;
        }
        $cache_id = $id_product.'-9';
        if (!$this->isCached($this->templatePath.'steasycontent-tab.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,9);
        return $this->fetch($this->templatePath.'steasycontent-tab.tpl', $this->stGetCacheId($cache_id));
	}

    public function hookProductTabContent($params)
    {
		$id_product = Tools::getValue('id_product');
        if (!$id_product) {
            return false;
        }
        $cache_id = $id_product.'-9';
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,9);
        return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
	}*/
    public function hookDisplayReassurance($params)
    {
        $page = Dispatcher::getInstance()->getController();
        if ($page == 'product') {
            return false;
        }
        $cache_id = '101-'.$page;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,101);
        return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayCMSExtra($params){
        $id_cms = Tools::getValue('id_cms');
        if (!$id_cms) {
            return false;
        }
        $cache_id = '3-'.$id_cms;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,3);
        return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayStBlogArticleTop($params){
        $id_st_blog = Tools::getValue('id_st_blog');
        if (!$id_st_blog) {
            return false;
        }
        $cache_id = '20-'.$id_st_blog;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,20);
        return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayStBlogContent($params){
        $id_st_blog = Tools::getValue('id_st_blog');
        if (!$id_st_blog) {
            return false;
        }
        $cache_id = '21-'.$id_st_blog;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,21);
        return $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
    }
    public function hookDisplayProductExtraContent($params)
    {
        $extraContent = new ProductExtraContent();
        
        if(!isset($params['product']))
            return $extraContent;
        $id_product = $params['product']->id;
        $description = '';
        $cache_id = '10-'.$id_product;
        if (!$this->isCached($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(0,10);
        $description = $this->fetch($this->templatePath.'steasycontent.tpl', $this->stGetCacheId($cache_id));
        
        $tabs = $this->_prepareHook(0,9);
        if($tabs)
        {
            foreach ($tabs as &$value) {
                $this->smarty->assign(
                    array(
                        'easy_content' => array($value),
                        'is_column' => false,
                        'is_product_tab' => true,
                        'easy_image_path' => context::getContext()->link->protocol_content.(Tools::usingSecureMode() ? Tools::getShopDomainSSL() : Tools::getShopDomain())._THEME_PROD_PIC_DIR_.$this->name.'/',
                    )
                );
                $value['tab_content'] = $this->fetch($this->templatePath.'steasycontent.tpl');


                /*
                    iWeb - 2020-09-01
                */
                if ( !class_exists('CustomTagsClass') ) require_once _PS_MODULE_DIR_ . 'customtags/classes/CustomTagsClass.php';
                $value['tab_content'] = CustomTagsClass::replace($value['tab_content']);
            }
        }

        $extraContent->setContent(array(
            'description' => $description,
            'tabs' => $tabs,
        ));

        return array($extraContent);
    }

    public function hookDisplayModuleCustomContent($params){
        $result = array(
            1 => array('width'=>0, 'content'=>''),
            2 => array('width'=>0, 'content'=>''),
            10 => array('width'=>0, 'content'=>''),
            30 => array('width'=>0, 'content'=>''),
            );
        if(isset($params['type']) && key_exists($params['type'], self::$type) && isset($params['identify']))
        {

            foreach ($result as $key => $value) {
                $data = $this->_prepareHook(array(
                        'identify' => $params['identify'],
                        'module_align' => $key,
                    ), $params['type']);
                
                if($data)
                {
                    $result[$key]['content'] = $this->fetch($this->templatePath.'steasycontent.tpl');

                    foreach ($data as $v) {
                        if($v['module_align']>10 && $v['module_align']<23 && ($v['module_align']-10)>$result[$key]['width'])
                            $result[$key]['width'] = $v['module_align']-10;
                        elseif($v['module_align']>30 && $v['module_align']<43 && ($v['module_align']-30)>$result[$key]['width'])
                            $result[$key]['width'] = $v['module_align']-30;
                    }                    
                }
            }
        }
        return $result;
    }
public function hookActionShopDataDuplication($params)
	{
        Db::getInstance()->execute('
        INSERT IGNORE INTO '._DB_PREFIX_.'st_easy_content_shop (id_st_easy_content, id_shop)
        SELECT id_st_easy_content, '.(int)$params['new_id_shop'].'
        FROM '._DB_PREFIX_.'st_easy_content_shop
        WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearEasyContentCache();
    }
	protected function stGetCacheId($key,$type='location',$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key.'_'.$type;
	}
	private function clearEasyContentCache()
	{
        $this->_clearCache('*');
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
                        elseif (isset($input['type']) && $input['type'] == 'dropdownlistgroup')
                        {
                                foreach ($input['values']['medias'] as $media=>$mv)
                                {
                                    $dropdownlistgroup_key = $input['name'].'_'.$media;
                                    $fieldValue = $obj->id ? $this->getFieldValueSt($obj, $dropdownlistgroup_key) : $mv;
                                    $this->fields_value[$dropdownlistgroup_key] = $fieldValue;
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
    public function get_fontello()
    {
        $res= array(
            'css' => '',
            'theme_name' => '',
            'module_name' => $this->_path,
            'classes' => array(),
        );

        $theme_path = _PS_THEME_DIR_;

        $theme_name = Context::getContext()->shop->theme->getName();
        $res['theme_name'] = $theme_name;

        if (_THEME_NAME_ != $theme_name)
            $theme_path = _PS_ROOT_DIR_.'/themes/'.$theme_name.'/';

        if (file_exists($theme_path.'font-fontello/config.json'))
        {
            $icons = Tools::jsonDecode(Tools::file_get_contents($theme_path.'font-fontello/config.json'));
            if($icons && is_array($icons->glyphs))
                foreach ($icons->glyphs as $icon) {
                    $res['classes'][] = 'fto-'.$icon->css;
                }
        }
        if (file_exists($theme_path.'font-fontello/icons.scss'))
        {
            $icons_css = Tools::file_get_contents($theme_path.'font-fontello/icons.scss');
            $res['css'] .= $icons_css;
        }

        return $res;
    }
    
    public function fontOptions() {
        $google = array();
        foreach($this->googleFonts as $v)
            $google[] = array('id'=>$v['family'],'name'=>$v['family']);
        return $google;
    }
    
    public function fontstyles($font_name = null)
    {
        $style = '';
        if (!$font_name)
            return $style;
        
        $name = $variant = '';
        if (strpos($font_name, ':') !== false)
            list($name, $variant) = explode(':', $font_name);
        else
            $name = $font_name;
        
        $style .= 'font-family:\''.$name.'\';';
        
        $style .= $this->fontWeight($variant);

        return $style;
    }
    public function fontWeight($variant)
    {
        $style = '';
        if ($variant == 'regular')
        {
            $style .= 'font-weight:normal;';
        }
        elseif($variant)
        {
            if (preg_match('/(\d+)/iS', $variant, $math))
            {
                if (!isset($math[1]))
                    $math[1] = '400';
                $style .= 'font-weight:'.$math[1].';';
            }
            if (preg_match('/([^\d]+)/iS', $variant, $math))
            {
                if (!isset($math[1]))
                    $math[1] = 'normal';
                $style .= 'font-style:'.$math[1].';';
            }
        }
        return $style;
    }
    public function prepareHooks()
    {
        $hooks = $this->getAvailableHooks();
        $location = array();
        $rows = Db::getInstance()->executeS('SELECT `location`,`type` FROM `'._DB_PREFIX_.'st_easy_content` ec
            LEFT JOIN `'._DB_PREFIX_.'st_easy_content_shop` ecs
            ON ec.`id_st_easy_content` = ecs.`id_st_easy_content`
            WHERE ecs.`id_shop`='.(int)$this->context->shop->id);
        foreach($rows AS $value)
        {
            if ($value['type'] > 1) {
                $value['location'] = $value['type'].'00';
            }
            if (key_exists($value['location'], $hooks) && $hooks[$value['location']])
                $location[$value['location']] = $hooks[$value['location']];
            // For column on all pages
            if ($value['location'] == 110) {
                $location[2] = $hooks[2];
                $location[33] = $hooks[33];
                unset($location[110]);
            }
            if ($value['location'] == 111) {
                $location[10] = $hooks[10];
                $location[32] = $hooks[32];
                unset($location[111]);
            }
        }
        
        foreach($hooks AS $_hook)
        {
            if (!$_hook)
                continue;
            $hook = 'display'.ucfirst($_hook);
            $id_hook = Hook::getIdByName($hook);
            if (count($location) && in_array($_hook, $location))
            {
                if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                    continue;
                if (!$this->isHookableOn($hook))
                    $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to %hook%.', array('%hook%'=>$hook), 'Modules.Steasycontent.Admin');
                else {
                    $this->registerHook($hook, Shop::getContextListShopID());
                }  
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
    
    protected function getAvailableHooks()
    {
        $hooks = array();
        foreach(self::$location AS $key => $value) {
            if (isset($value['hook']) && $value['hook']) {
                $hooks[$key] = $value['hook'];
            }
        }
        foreach(self::$location_extra AS $key => $value) {
            if (isset($value['hook']) && $value['hook']) {
                $hooks[$key] = $value['hook'];
            }
        }
        return $hooks;
    }
    
    public function renderWidget($hookName = null, array $configuration = [])
    {
        $hooks = $this->getAvailableHooks();
        if (strpos($hookName, 'display') === false || !in_array(ucfirst(str_replace('display', '', $hookName)), $hooks)) {
            return false;
        }
        $identify = array();
        foreach (self::$location as $k=>$v) {
            if (!isset($v['hook'])) {
                continue;
            }
            if ('display'.Tools::strtolower($v['hook'])==Tools::strtolower($hookName)) {
                if (isset($v['is_blog']) && !$this->stblog_status) {
                    return false;
                }
                if (isset($v['index_slider']) && $v['index_slider'] && !isset($v['is_blog']) && Dispatcher::getInstance()->getController()!='index') {
                    return false;
                }
                $identify = $this->getIdentifyByHook($v['hook']);
                break;
            }
        }
        $hookName = Tools::strtolower($hookName);
        if ($hookName == 'displayleftcolumn' || $hookName == 'displayleftcolumnproduct') {
            $identify[] = 110;
        }
        if ($hookName == 'displayrightcolumn' || $hookName == 'displayrightcolumnproduct') {
            $identify[] = 111;
        }
        if (!$identify) {
            return false;
        }
        $id_st_easy_content = isset($configuration['id_st_easy_content']) ? (int)$configuration['id_st_easy_content'] : null;
        $cache_id = implode('-', $identify).($id_st_easy_content ? '-'.(string)$id_st_easy_content : '');
        $tpl = $this->templatePath.'steasycontent.tpl';
        if (!$this->isCached($tpl, $this->stGetCacheId($cache_id)))
        {
            if(!is_null($id_st_easy_content))
            {
                $this->_prepareHook($id_st_easy_content,100, array('is_full_width'=> $hookName == 'displayfullwidthtop', 'is_column'=> $hookName == 'displayleftcolumn'));
            }
            else
                $this->_prepareHook($identify,1);
        }
        return $this->fetch($tpl, $this->stGetCacheId($cache_id));
    }
    
    public function displayByContentId($identify)
    {
        if (!$identify) {
            return false;
        }
        $identify = (array)$identify;
        $cache_id = implode('-', $identify).'-100';
        $tpl = $this->templatePath.'steasycontent.tpl';
        if (!$this->isCached($tpl, $this->stGetCacheId($cache_id)))
            $this->_prepareHook($identify, 100);
        return $this->fetch($tpl, $this->stGetCacheId($cache_id));
    }
    
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
    
    public function loadExtraForm($class, $method='', $fields_form = 'fields_form')
    {
        $file = _PS_MODULE_DIR_.$this->name.'/form/'.$class.'.php';
        if (!file_exists($file)) {
            echo sprintf($this->getTranslator()->trans('File %s got lost or damaged.', array(), 'Modules.Steasycontent.Admin'), $file);
            die;
        }
        require($file);
        $form = new $class();
        if (!$method) {
            $method = 'init'.ucfirst($class);
        }
        if ($method && method_exists($form, $method)) {
            $helper = $form->$method();
            return $helper->generateForm($form->$fields_form);
        } else {
            echo $this->getTranslator()->trans('Method %method% not exists.', array('%method%'=>$method), 'Modules.Steasycontent.Admin');
            die;
        }
    }
    
    public function loadElementList(StEasyContentColumnClass $column)
    {
        if(!$column->id || !$column->element) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        $file = _PS_MODULE_DIR_.$this->name.'/config/list-'.(int)$column->element.'.php';
        if (!file_exists($file)) {
            echo sprintf($this->getTranslator()->trans('File %s got lost or damaged.', array(), 'Modules.Steasycontent.Admin'), $file);
            die;
        }
        $parameters = array();
        $fields_list = include($file);
        if (isset($fields_list['parameters'])) {
            $parameters = $fields_list['parameters'];
            unset($fields_list['parameters']);
        }
        
        $data = StEasyContentElementClass::getByColumnId($column->id);
        foreach($data AS &$v) {
            $v = array_merge($v, StEasyContentSettingClass::getSetting($v['id_st_easy_content_element'], 2, true, $this->context->language->id));
        }
        
        // If there is no elements, use can switch to other elements, upadte current element.
        if (!count($data)) {
            // Update element to current viewed one.
            if (!StEasyContentElementClass::getByColumnId($column->id)) {
                StEasyContentColumnClass::updateElement($column->id, $column->element);    
            }
            // Select item type.
            $html = '<div class="st_help_block panel">';
            $html .= '<div class="panel-heading">'.$this->getTranslator()->trans('Change element type', array(), 'Modules.Steasycontent.Admin').'</div><p><a class="st_show_help btn btn-primary" href="javascript:;">'.$this->getTranslator()->trans('Change element type', array(), 'Modules.Steasycontent.Admin').'</a></p>';
            $html .= '<div class="st_help_box">
                        <ul class="easy_image_list clearfix">';
            foreach($this->_elements as $v)
                $html .= '<li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&view'.$this->name.'column&id_st_easy_content_column='.$column->id.'&element='.$v['id'].'&switch_element&token='.Tools::getAdminTokenLite('AdminModules').'" 
                title="'.$v['name'].'"
                onclick="return confirm(\''.$this->getTranslator()->trans('All settings you made for the previous element will be removed, are you sure ?', array(), 'Modules.Steasycontent.Admin').'\');"
                >
                <img src="'.$this ->_path.'/views/img/e_'.$v['id'].'.jpg" /><div class="easy_image_name">'.$v['name'].'</div></a></li>';
            $html .= '</ul></div></div>';
            $this->_html .= $html;
            
            if (Tools::getValue('switch_element')) {
                StEasyContentSettingClass::deleteById($column->id, 1);
            }
        }        
        
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->module = $this;
        $helper->simple_header = false;
        $helper->listTotal = count($data);
        $helper->identifier = 'id_st_easy_content_element';
        $helper->actions = array('edit', 'delete', 'duplicate');
        $helper->show_toolbar = false;
        $helper->toolbar_btn['new'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'element&id_st_easy_content_column='.(int)$column->id.'&element='.(int)$column->element.'&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => isset($parameters['new_label']) ? $parameters['new_label'] : $this->getTranslator()->trans('Add an element', array(), 'Modules.Steasycontent.Admin')
        );
        if (!isset($parameters['show_setting_link']) || $parameters['show_setting_link']) {
            $helper->toolbar_btn['edit'] =  array(
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'element&id_st_easy_content_column='.(int)$column->id.'&element='.(int)$column->element.'&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->getTranslator()->trans('Settings', array(), 'Modules.Steasycontent.Admin')
            );    
        }
        $helper->toolbar_btn['back'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.$this->buildQueryString($column).'&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Back to parent', array(), 'Modules.Steasycontent.Admin')
        );
        $helper->bulk_actions['delete'] = array(
            'text'=>$this->getTranslator()->trans('Delete', array(), 'Modules.Steasycontent.Admin'),
            'confirm'=>$this->getTranslator()->trans('Do you want to delete selected elements ?', array(), 'Modules.Steasycontent.Admin')
        );

        $helper->title = $this->_elements[$column->element]['name'];
        $helper->table = $this->name.'element';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        return $helper->generateList($data, $fields_list);
    }
    
 public function displayDuplicateLink($token, $id, $name)
    {
        return '<li class="divider"></li><li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&copy'.$this->name.(Tools::getvalue('id_st_easy_content_column') ? 'element&id_st_easy_content_element=' : '&id_st_easy_content=').(int)$id.'&token='.$token.'"><i class="icon-copy"></i>'.$this->getTranslator()->trans(' Duplicate ', array(), 'Admin.Theme.Transformer').'</a></li>';
    }
    
    public static function displayWidth($value, $row)
    {
        return ($value*10/10).'/12';
    }
    
    public static function displayElementInfo($value, $row)
    {
        $html = '';
        $elements = array();
        if ($row['element']) {
            $elements[$row['element']] = (int)$row['element'];
        }
        foreach($subs = StEasyContentColumnClass::recurseTree((int)$row['id_st_easy_content_column'], 0, 0, 0, 1) AS $sub) {
            if ($sub['element']) {
                $elements[$sub['element']] = (int)$sub['element'];
            }
        }
        if ($elements) {
            $module = new StEasyContent;
            $html .= '<div class="pstaggerTagsWrapper">';
            foreach($elements AS $ele) {
                if (key_exists($ele, $module->_elements)) {
                    $html .= '<span class="pstaggerTag">'.$module->_elements[$ele]['name'].'</span>';
                }
            }
            $html .= '</div>';
        }
        return $html;
    }
    
    public static function displayElementProd($value, $row)
    {
        $html = '<ul>';
        if (isset($row['st_id_product']) && $row['st_id_product']) {
            foreach(explode(',', $row['st_id_product']) AS $id_product) {
                $product = new Product((int)$id_product, false, Context::getContext()->language->id);
                $html .= '<li>'.$product->name.'</li>';
            }
        }
        return $html.'</ul>';
    }            
    
    public function digPost($prefix= '')
    {
        if (!$prefix) {
            return false;
        }
        $result = array();
        foreach($_POST AS $key => $value) {
            if (strpos($key, $prefix) === 0) {
                $result[trim($key, $prefix)] =  $value;
            }
        }
        return $result;
    }
    
    public function buildQueryString(StEasyContentColumnClass $easycontent_column)
    {
        if (!is_object($easycontent_column)) {
            return '';
        }
        $easycontent_column = new StEasyContentColumnClass($easycontent_column->id_parent);
        if ($easycontent_column->id_parent) {
            $query_string = '&id_st_easy_content_column='.$easycontent_column->id_parent.'&viewsteasycontentcolumn';
        } else {
            $query_string = '&id_st_easy_content='.$easycontent_column->id_st_easy_content.'&viewsteasycontent';
        }
        return $query_string;
    }
    
    protected function stUploadImage($item)
    {
        $result = array(
            'error' => array(),
            'image' => '',
        );
        if (isset($_FILES[$item]) && isset($_FILES[$item]['tmp_name']) && !empty($_FILES[$item]['tmp_name']))
		{
			$type = strtolower(substr(strrchr($_FILES[$item]['name'], '.'), 1));
            $name = str_replace(strrchr($_FILES[$item]['name'], '.'), '', $_FILES[$item]['name']);
			$imagesize = array();
			$imagesize = @getimagesize($_FILES[$item]['tmp_name']);
			if (!empty($imagesize) &&
				in_array(strtolower(substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg', 'gif', 'jpeg', 'png')) &&
				in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
			{
				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
				$salt = $name ? Tools::str2url($name) : sha1(microtime());
                $c_name = $salt;
				if ($upload_error = ImageManager::validateUpload($_FILES[$item]))
					$result['error'][] = $upload_error;
				elseif (!$this->_checkImageDir() || !$temp_name || !move_uploaded_file($_FILES[$item]['tmp_name'], $temp_name))
					$result['error'][] = $this->getTranslator()->trans('An error occurred during the image upload.', array(), 'Modules.Steasycontent.Admin');
				else{
				   $infos = getimagesize($temp_name);
                   if(!ImageManager::resize($temp_name, _PS_UPLOAD_DIR_.$this->name.'/'.$c_name.'.'.$type, null, null, $type))
				       $result['error'][] = $this->getTranslator()->trans('An error occurred during the image upload.', array(), 'Modules.Steasycontent.Admin');
				} 
				if (isset($temp_name))
					@unlink($temp_name);
                    
                if(!count($result['error']))
                {
                    $result['image'] = $c_name.'.'.$type;
                    $result['width'] = $imagesize[0];
                    $result['height'] = $imagesize[1];
                }
                return $result;
			}
        }
        else
            return $result;
    }
    
    private function _checkImageDir()
    {
        if (!file_exists(_PS_UPLOAD_DIR_.$this->name))
        {
            return @mkdir(_PS_UPLOAD_DIR_.$this->name, self::$access_rights, true)
						|| @chmod(_PS_UPLOAD_DIR_.$this->name, self::$access_rights);
        }

        if (!is_writable(_PS_UPLOAD_DIR_)) {
            return false;
        }
        
        return true;
    }
    
    public function fetchMediaServer(&$image)
    {
        if (strpos($image, '/modules/') !== false) {
            $image = __PS_BASE_URI__.strstr($image, 'modules/');
        } else {
            $image = _THEME_PROD_PIC_DIR_.$image;    
        }
        $image = context::getContext()->link->protocol_content.Tools::getMediaServer($image).$image;
    }
    
    public function SaveSettings($object, $type=1, $extra = array())
    {
        if (!is_object($object) || !$object->id) {
            return false;
        }
        $settings = StEasyContentSettingClass::digPost();
        if (is_array($extra) && count($extra)) {
            $settings = array_merge($settings, $extra);
        }
        return StEasyContentSettingClass::saveSetting($object->id, $settings, (int)$type);
    }
    
    public function LoadSettingsToObject($object, $type=1)
    {
        if (!is_object($object) || !$object->id) {
            return false;
        }
        $settings = StEasyContentSettingClass::getSetting($object->id, (int)$type);
        StEasyContentSettingClass::copyFromData($object, $settings);
    }
    
    public function ApplyPredefinedSettings($object, $settings, $type=1)
    {
        if (!is_object($object) || !$object->id) {
            return false;
        }
        StEasyContentSettingClass::deleteById($object->id, $type);
        StEasyContentSettingClass::saveSetting($object->id, $settings, $type);
        $this->clearEasyContentCache();
    }
    
    public function loadFormHelper($table='st_easy_content', $action='', $object)
    {
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = $object->id;
        $helper->module = $this;
        $helper->table =  $table;        
        $helper->identifier = 'id_'.$table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'save'.$this->name.$action;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($object),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        return $helper;
    }
    
    public function uploadSettingImages()
    {
        $result = array();
        foreach($_FILES AS $key => $value) {
            $res = $this->stUploadImage($key);
            if(!count($res['error']) && $res['image']) {
                $result[$key] = $res['image'];
                $result[$key.'_width'] = $res['width'];
                $result[$key.'_height'] = $res['height'];
            }   
        }
        return $result;
    }
    
    public function loadImageFieldsDesc(&$fields_form = array(), $object)
    {
        if (!is_array($fields_form) || !$fields_form || !is_object($object)) {
            return false;
        }
        foreach($fields_form AS &$field) {
            if (isset($field['type']) && $field['type'] == 'file') {
                $_field = $field['name'];
                if (isset($object->$_field) && $image = $object->$_field) {
                    $image = $this->name.'/'.$image;
                    $this->fetchMediaServer($image);
                    $field['desc'] = '<span class="image_thumb_block"><img src="'.($image).'" /><a class="btn btn-default st_delete_image" data-s_id="'.$object->id.'" data-s_t="'.$object->type.'" data-s_k="'.$field['name'].'" href="javascript:;"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Modules.Steasycontent.Admin').'</a></span>';
                }
            }
        }
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
    
    
    public function getNavigate()
    {
        $navs = array();
        $id_lang = $this->context->language->id;
        if ($this->id_st_easy_content) {
            $navs = new StEasyContentClass($this->id_st_easy_content, $id_lang);
            $navs = array(get_object_vars($navs));
        } else {
            $navs = StEasyContentColumnClass::getParents($this->id_st_easy_content_column);
        }
        $navs = array_reverse($navs);
        $html = '<ul class="breadcrumb">';
        $row_name = '';
        foreach($navs AS $key => $nav) {
            if ($key == 0) {
                $html .= '<li><i class="icon-home"></i><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">'.$this->getTranslator()->trans(' Home ', array(), 'Modules.Steasycontent.Admin').'</a></li>';
            }
            if (!isset($nav['id_st_easy_content_column'])) {
                $html .= '<li><span>'.($nav['title'] ? $nav['title'] : $this->getTranslator()->trans('Row(s)', array(), 'Modules.Steasycontent.Admin')).'</span></li>';
                break;
            } else {
                // Is top columns ?
                if (!$nav['id_parent'] && $nav['id_st_easy_content']) {
                    $easycontent= new StEasyContentClass($nav['id_st_easy_content'], $id_lang);
                    $html .= '<li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content='.(int)$easycontent->id.'&viewsteasycontent&token='.Tools::getAdminTokenLite('AdminModules').'">'.($easycontent->title ? $easycontent->title : $this->getTranslator()->trans('Row(s)', array(), 'Modules.Steasycontent.Admin')).'</a></li>';
                }
                // Skip virtual row.
                if ($key % 2 && $nav['width']) {
                    if ($key == count($navs)-1) {
                        $siblings = StEasyContentColumnClass::getSub($nav['id_parent']);
                        $html .= '<li>'.$row_name.$this->buildNavColumnDropDown($nav['id_st_easy_content_column'], $siblings).'</li>';
                        
                        /*if (Tools::isSubmit('updatesteasycontentelement') && $id_st_easy_content_element = Tools::getValue('id_st_easy_content_element')) {
                            // Add nav for element edit page.
                            $data = StEasyContentElementClass::getByColumnId($this->id_st_easy_content_column);
                            foreach($data AS &$v) {
                                $v = array_merge($v, StEasyContentSettingClass::getSetting($v['id_st_easy_content_element'], 2, true, $this->context->language->id));
                            }
                            $html .= '<li>'.$this->buildNavElementDropDown($id_st_easy_content_element, $data).'</li>';
                        }*/                        
                    } else {
                        $html .= '<li>'.$row_name.'<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.(int)$nav['id_st_easy_content_column'].'&viewsteasycontentcolumn&token='.Tools::getAdminTokenLite('AdminModules').'">'.($nav['name'] ? $nav['name'] : $this->getTranslator()->trans('Column', array(), 'Modules.Steasycontent.Admin')).'</a></li>';      
                    }
                    $row_name = '';  
                } else {
                    $row_name = $nav['name'] ? $nav['name'].' > ' : '';
                }
            }
        }
    	$html .= '</ul>';
        return $html;
    }
    
    public function buildNavColumnDropDown($id=0, $data=array())
    {
        $title = '';
        $item = '';
        foreach($data AS $value) {
            if ($value['id_st_easy_content_column'] == (int)$id) {
               $title = $value['name'] ? $value['name'] : $this->getTranslator()->trans('Column', array(), 'Modules.Steasycontent.Admin');
            } else {
                $action = Tools::getIsset('updatesteasycontentcolumn')?'updatesteasycontentcolumn':'viewsteasycontentcolumn';
                $item .= '<li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_column='.(int)$value['id_st_easy_content_column'].'&'.$action.'&token='.Tools::getAdminTokenLite('AdminModules').'" class="dropdown-item">
                <i class="icon-chevron-right icon-fw"></i>'.($value['name'] ? $value['name'] : $this->getTranslator()->trans('Column', array(), 'Modules.Steasycontent.Admin')).'
    			</a></li>';
            }
        }
        $dropdwon_list = '
            <div class="dropdown breadcrumb_dropdown">
    			<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">'.$title.'<i class="icon-caret-down"></i></a>
    			<ul  class="dropdown-menu">
                '.$item.'
        	</ul ></div>';
         return $item ? $dropdwon_list : $title;
    }
    
    public function buildNavElementDropDown($id=0, $data=array())
    {
        $title = '';
        $item = '';
        foreach($data AS $value) {
            if ($value['id_st_easy_content_element'] == (int)$id) {
               $title = isset($value['name']) && $value['name'] ? $value['name'] : $this->getTranslator()->trans('Element', array(), 'Modules.Steasycontent.Admin');
            } else {
                $item .= '<li>
                <a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_easy_content_element='.(int)$value['id_st_easy_content_element'].'&updatesteasycontentelement&token='.Tools::getAdminTokenLite('AdminModules').'">
                <i class="icon-chevron-right icon-fw"></i>'.($value['name'] ? $value['name'] : $this->getTranslator()->trans('Element', array(), 'Modules.Steasycontent.Admin')).'
    			</a></li>';
            }
        }
        $dropdwon_list = '
            <ul><li class="dropdown">
    			<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">'.$title.'<i class="icon-caret-down"></i></a>
    			<ul class="dropdown-menu">
                '.$item.'
        	</ul></li></ul>';
         return $item ? $dropdwon_list : $title;
    }
    
    public function getApplyHook()
    {
        $location = array();
        foreach(self::$location as $v)
            $location[] = array('id'=>$v['id'],'name'=>$v['name']);
        return $location;
    }
    
    public function getApplyModule()
    {
        $modules = array();
        foreach(self::$module as $v) {
            foreach(array(1 => 'top', 2 => 'bottom') AS $_k=>$_v) {
                $modules[] = array('id'=>$v['id'].'_'.$_k, 'name' => $v['name'].' '.$_v);
            }
            foreach(array(10 => 'left', 30 => 'right') AS $_k=>$_v) {
                for ($i = 1; $i <= 12; $i++) {
                    $modules[] = array('id'=>$v['id'].'_'.($_k+$i), 'name' => $v['name'].' '.$_v.' '.($i).'/12');
                }
            }
        }
        return $modules;
    }
    
    public function getApplyCms()
    {
        $cms_arr = array();
		$this->getCMSOptions($cms_arr, 0, 1, $this->context->language->id);
        return $cms_arr;
    }
    
    public function getApplyCategory()
    {
        $category_arr = array();
		$this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$this->context->language->id, (int)Shop::getContextShopID(), true);
        return $category_arr;
    }
    
    public function getApplyManufacture()
    {
        $manufacturer_arr = array();
		$manufacturers = Manufacturer::getManufacturers(false, $this->context->language->id);
		foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
        return $manufacturer_arr;
    }
    
    public function getApplyBlog()
    {
        $blog_arr = array();
        if($this->stblog_status)
		{
            $blog_categories = StBlogCategory::getCategories(0, $this->context->language->id, true);
            $this->getBlogOption($blog_arr, $blog_categories);
        }
        return $blog_arr;
    }
    
    public function getIdentifyByHook($hook = '')
    {
        if (!$hook){
            return $hook;
        }
        $result = array();
        foreach(self::$location AS $value) {
            if (!isset($value['hook'])) {
                continue;
            }
            if (strtolower($hook) == strtolower($value['hook'])) {
                $result[] = $value['id'];
            }
        }
        return $result;
    }
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_easy_content_column');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StEasyContentColumnClass((int)$pos[2]))
							if (isset($position) && $object->updatePosition($way, $position))
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
    public function add_quick_access()
    {
        if(!Db::getInstance()->getRow('SELECT id_quick_access FROM '._DB_PREFIX_.'quick_access WHERE link LIKE "%configure=steasycontent%"') && class_exists('QuickAccess'))
        {
            $quick_access = new QuickAccess();
            $quick_access->link = 'index.php?controller=AdminModules&configure=steasycontent';
            $quick_access->new_window = 0;
            foreach (Language::getLanguages(false) as $lang)
            {
				$quick_access->name[$lang['id_lang']] = $this->getTranslator()->trans('Advanced custom content', array(), 'Modules.Steasycontent.Admin');
            }
            $quick_access->add();
        }
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
            'id_st_easy_content' => 0,
            'st_time' => '',
            ), $atts));
        if(!isset($this->vc_hooks[$hook_name]))
            return ;
        $hook = $this->vc_hooks[$hook_name];
        if (method_exists($this, 'hook'.ucfirst($hook)))
        {
            $hook_name_string = 'hook'.ucfirst($hook);
            return $this->$hook_name_string(array('st_time'=>$st_time,'id_st_easy_content'=>$id_st_easy_content));
        }
        else {
            return $this->renderWidget($hook, array('st_time'=>$st_time,'id_st_easy_content'=>$id_st_easy_content));
        }
    }
    function vc_map_init()
    {
        $content = array();
        $default = 0;
        foreach(StEasyContentClass::getListContent(0, 1, 1) AS $tr) {
            $key = $this->getTranslator()->trans('ID:', array(), 'Admin.Theme.Transformer').$tr['id_st_easy_content'];
            if($tr['title'])
                $key .= '|'.$tr['title'];
            elseif($tr['text'])
                $key .= '|'.Tools::truncateString(strip_tags(stripslashes($tr['text'])), 20);
            else{
                $top_columns = StEasyContentColumnClass::getSub(0, 0, $tr['id_st_easy_content']);
                $elements = array();
                if ($top_columns) {
                    foreach($top_columns AS $value) {
                        if ($value['element']) {
                            $elements[$value['element']] = (int)$value['element'];
                        }
                        foreach($subs = StEasyContentColumnClass::recurseTree($value['id_st_easy_content_column'], 0, 0, 0, 1) AS $sub) {
                            if ($sub['element']) {
                                $elements[$sub['element']] = (int)$sub['element'];
                            }
                        }
                    }
                }
                if ($elements) {
                    foreach($elements AS $ele) {
                        if (key_exists($ele, $this->_elements)) {
                            $key .= '|'.$this->_elements[$ele]['name'];
                        }
                    }
                }
            }            
            $content[$key] = $tr['id_st_easy_content'];
            !$default && $default = (int)$tr['id_st_easy_content'];
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
                    'heading' => $this->getTranslator()->trans('Choose a block', array(), 'Admin.Theme.Transformer'),
                    'param_name' => 'id_st_easy_content',
                    'value' => $content,
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