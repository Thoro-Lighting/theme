{*
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
*}

<div class="pcomments_header col-md-4">
	<div class="review_deatils">
	<div class="article">
    <div class="flex_box flex_left mb-3">
        <span class="overall col-12 px-0"><p class="mb-0">{l s='Overall rating' d='Shop.Theme.Transformer'}</p></span>
        <div class="fs_lg general_right_border my-2 mr-3">{$averageTotal}</div>
        <div class="general_left_border ">
        {include file='module:stproductcomments/views/templates/hook/rating_box.tpl' is_aggregate=1 classname="mr-2"}
        <a class="ammount" href="{$pcomment_link}" title="{l s='View all reviews' d='Shop.Theme.Transformer'}" class="mr-2">{$nbComments} {if $nbComments==1}{l s='Review' d='Shop.Theme.Transformer'}{else}{l s='Reviews' d='Shop.Theme.Transformer'}{/if} <i class="fto-commenting-o fs_md mr-1"></i></a>
		</div>
        
    </div>

    <div class="flex_box">
    <div class="pcomments_score mr-2 ">
    {include file='module:stproductcomments/views/templates/hook/averages.tpl'}
    </div>
   {*
    <div class="pcomments_tags tags_block flex_child">
        {foreach $biaoqian as $tag}
        <span class="tag_item">{$tag.name nofilter}({$tag.total})</span>
        {/foreach}
    </div> *}
    
    </div>
    </div>

     <div class="pcomments_write flex_box flex_left">{if $can_comment}{include file='module:stproductcomments/views/templates/hook/pcomments_write_button.tpl' classname=""}{/if}</div>    
  
    </div>
    
   
</div>

