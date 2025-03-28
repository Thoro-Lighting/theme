{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
<nav class="st-menu" id="side_products_cart">
	<div class="st-menu-header">
		<div class="st-menu-title">{l s='Your cart' d='Shop.Theme.Transformer'} <span class="sidebar_cart_quantity">- <span class="ajax_cart_quantity cart_icon_item">{$cart.products_count}</span>{l s='pcs.' d='ShopThemeTransformer'}</span></div>
    	<a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18 6L6 18M18 18L6 6" stroke="#181B1A" stroke-width="1.2" stroke-linecap="round"/>
				</svg> 
			</a>
	</div>
	<div id="side_cart_block" class="">
		{include file='module:stshoppingcart/views/templates/hook/stshoppingcart-list.tpl'}
	</div>
</nav>
