{*
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
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2015 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}



  
   
   
   
   <div class="pro_outer_box clearfix home_default">
            <div class="pro_first_box">
             <a class="product_image" href="{$mailAlert.link}" title="{$mailAlert.name}"><img src="{$mailAlert.cover_url}"/></a>
          
             <p class="remove_notifications"><a href="#"
     class="js-remove-email-alert"
     rel="js-id-emailalerts-{$mailAlert.id_product|intval}-{$mailAlert.id_product_attribute|intval}"
     data-url="{url entity='module' name='ps_emailalerts' controller='actions' params=['process' => 'remove']}" title="{l s='Remove from notifications' d='Shop.Theme.Transformer'}"><i class="fto-cancel mar_r4"></i></a></p>
             {if isset($countdown_v_alignment) && $countdown_v_alignment!=2}{include file='catalog/_partials/miniatures/countdown.tpl'}{/if}
            </div>
            
            <div class="pro_second_box pro_block_align_{$sttheme.pro_block_align}">
            
            <div class="flex_box flex_start mini_name">
            <h3 class="s_title_block flex_child">
            <a href="{$mailAlert.link}" title="{$mailAlert.name}">{$mailAlert.name}</a>
            </h3>
           
            </div>
            <div class="small_cart_attr">
            {$mailAlert.attributes_small}
            </div>
            
            </div>
                
   </div>   
   
   
  
   
          

