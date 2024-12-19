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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!-- MODULE st easy content -->
{if $columns|@count > 0}
    {foreach $columns as $column}
        {if isset($column['columns']) && count($column['columns']) && (( empty($column['listing_page']) || $column['listing_page'] == $smarty.get.page ) OR ((empty($column['listing_page']) || $column['listing_page'] == 1) && $smarty.get.page < 2))}
			
	        	{foreach $column['columns'] as $sub_column}
	        	<div id="steasy_column_{$column['id_st_easy_content_column']}" class="product_list_item col-fw-{$column.row_per_listing_fw|replace:'.':'-'} col-xxl-{$column.row_per_listing_xxl|replace:'.':'-'} col-xl-{$column.row_per_listing_xl|replace:'.':'-'}  col-lg-{$column.row_per_listing_lg|replace:'.':'-'} col-md-{$column.row_per_listing_md|replace:'.':'-'} col-sm-{$column.row_per_listing_sm|replace:'.':'-'} col-xs-{$column.row_per_listing_xs|replace:'.':'-'} {if $column['hide_on_mobile'] == 1} hidden-md-down {elseif $column['hide_on_mobile'] == 2} hidden-lg-up {/if} {if $column['listing_page_filtr'] == 0}hide_filter_page{/if} {if $ec.privat_css}privat_easy_listing_{$ec.privat_css}{/if} box-listing">
	        	<div class="listing-easy-box">
	        	
	        	{if $ec.title}
                <div class="title_block">
                    {if $ec.url}<a href="{$ec.url}" title="{$ec.title}" class="title_block_inner">{else}<div class="title_block_inner">{/if}
                    {$ec.title}
                    {if $ec.url}</a>{else}</div>{/if}
                </div>
                {/if}
                {if $ec.text}
                <div class="style_content {if $ec.width} width_{$ec.width} {/if} block_content {if $ec.id_cms} cms_content {/if}">
                    <div class="easy_brother_block text-{$ec.text_align} text-md-{$ec.mobile_text_align}">{$ec.text nofilter}</div>
                    </div>{/if}
	        	
	        	<div class="row">
		        	{math assign="column_width" equation='(x*y)/y' x=$sub_column['width'] y=10} 
	                {if isset($sub_column['width_md'])}{if $sub_column['width_md']!=0}{math assign="column_width_md" equation='(x*y)/y' x=$sub_column['width_md'] y=10}{else}{math assign="column_width_md" equation='(x*y)/y' x=$sub_column['width'] y=10}{/if}{else}{assign var='column_width_md' value=12}{/if}
	                {if isset($sub_column['width_xs'])}{if $sub_column['width_xs']!=0}{math assign="column_width_xs" equation='(x*y)/y' x=$sub_column['width_xs'] y=10}{elseif $sub_column['width_md']!=0}{math assign="column_width_xs" equation='(x*y)/y' x=$sub_column['width_md'] y=10}{else}{math assign="column_width_xs" equation='(x*y)/y' x=$sub_column['width'] y=10}{/if}{else}{assign var='column_width_xs' value=12}{/if}
		            <div id="steasy_column_{$sub_column['id_st_easy_content_column']}" class="col-lg-{$column_width|replace:'.':'-'} col-sm-{$column_width_md|replace:'.':'-'} col-{$column_width_xs|replace:'.':'-'} steasy_column {if $sub_column['hide_on_mobile'] == 1} hidden-md-down {elseif $sub_column['hide_on_mobile'] == 2} hidden-lg-up {/if}"  >
	    				{if !$sub_column['element'] && isset($sub_column['columns']) && count($sub_column['columns'])}
		                	<div class="steasy_column_block">{include file="module:steasycontent/views/templates/hook/steasycontent-columns.tpl" columns=$sub_column['columns']}</div>
		                {elseif $sub_column['element'] && ( (isset($sub_column['elements']) && count($sub_column['elements'])) || $sub_column['element']==7)}{*Google map can be displayed without sub elements, the same code is also in the recurseCss function*}
		                	<div class="steasy_element_block">{include file="module:steasycontent/views/templates/hook/steasycontent-element-{$sub_column['element']}.tpl" sub_column=$sub_column}</div>
	            		{/if}
		            </div>
		               </div> </div>
			</div>
		  {/foreach}
		     
        {/if}   
    {/foreach}     
{/if}
<!-- MODULE st easy content -->