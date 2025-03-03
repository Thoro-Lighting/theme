{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
 


 
<div class="swiper-tiles-default swiper swiper-container" data-js="swiper-tiles-default">
	
	<div class="swiper-wrapper">
	{block name='slider_content'}
	{if isset($column_slider) && $column_slider && !$display_pro_col}
		{foreach $products as $product}
			{if $product@first || $product@index is div by $slider_items}
		    <article class="swiper-slide base_list_line medium_list">
		    {/if}
			{include file="catalog/_partials/miniatures/product-slider-item-compact.tpl"}
    		{if $product@last || $product@iteration is div by $slider_items}
			</article>
			{/if}
		{/foreach}
	{elseif !empty($two_products)}
		{foreach $products as $product}
			{if $product@first || $product@index is div by 2}
		    	<div class="swiper-slide">
		    {/if}
			
				{include file="catalog/_partials/miniatures/product.tpl" for_w=''}
			{if $product@last || $product@iteration is div by 2}
				</div>
			{/if}
		{/foreach}
	{else}
		{foreach $products as $product}
			{include file="catalog/_partials/miniatures/product.tpl"}
		{/foreach}
	{/if}
	{/block}
	</div>
	<div class="swiper-scrollbar"></div>

  {if $position_buttons == 0}
	<div class="left_zone_visible"></div>
    <div class="right_zone_visible"></div>{/if}
	
	{if $direction_nav>1 && (!isset($column_slider) || !$column_slider)}
		<div class="swiper_btns_wrapper hidden-md-down">
			<button class="swiper-product-button-prev"></button> 
			<button class="swiper-product-button-next"></button>
		</div>
    {/if}
</div>
{if $control_nav}
<div class="swiper-pagination {if $control_nav==2} swiper-pagination-st-custom {elseif $control_nav==4} swiper-pagination-st-round {/if}{if $hide_control_nav_on_mob} hidden-md-down {/if}"></div>
{/if}