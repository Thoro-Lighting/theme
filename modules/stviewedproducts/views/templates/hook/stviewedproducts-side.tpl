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
<nav class="st-menu" id="side_viewed">
	<div class="st-menu-header">
		<div class="st-menu-title">{l s='Recently Viewed' d='Shop.Theme.Transformer'}</div>
    	<a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18 6L6 18M18 18L6 6" stroke="#181B1A" stroke-width="1.2" stroke-linecap="round"/>
				</svg> 
			</a>
	</div>
	<div id="side_viewed_block" class="pad_10 base_list_line medium_list">
		{if isset($viewed_products) && count($viewed_products)}
			{foreach $viewed_products as $product}
	            {include file="catalog/_partials/miniatures/product-slider-item-compact.tpl" no_google_rich_snippets=true}
	        {/foreach}
		{else}
			<div class="viewed_products_no_products">
				{l s='No products' d='Shop.Theme.Transformer'}
			</div>
		{/if}
	</div>
</nav>