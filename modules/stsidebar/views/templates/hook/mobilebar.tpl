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



{if count($mobilebar)}
	{foreach $mobilebar as $sidebar_item}
	{if $sidebar_item.native_modules==1}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" data-refresh-url="{$refresh_url}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='View my shopping cart' d='Shop.Theme.Transformer'}{/if}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class="{if $isMobile} js-open-cart-anchor {/if} {else} href="javascript:;" class="blockcart mobile_bar_tri {/if} cart_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} shopping_cart_style_2 icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on {if !$isMobile}js-open-cart-anchor{/if}{/if}" data-name="side_products_cart" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}">
	
				{if $sidebar_item.show_ammount == 2}<span class="ajax_cart_quantity amount_circle {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>{/if}
				<span class="ajax_cart_bg_handle"></span>
				{if $sidebar_item.show_icone == 1}
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.40039 9.62394L10.2312 4.35394C11.1824 3.31626 12.8184 3.31626 13.7696 4.35394L18.6004 9.62394M21.1979 10.9209L18.4659 19.7209C18.336 20.1393 17.9489 20.4244 17.5108 20.4244H6.55597C6.12009 20.4244 5.73442 20.1421 5.60271 19.7266L2.81317 10.9266C2.60879 10.2819 3.09007 9.62442 3.76642 9.62442H20.2428C20.9167 9.62442 21.3977 10.2774 21.1979 10.9209Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Cart' d='Shop.Theme.Transformer'}{/if} {if $sidebar_item.show_ammount == 1}(<span class="ajax_cart_quantity {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>){/if}</span>
		</a>
	
	{elseif $sidebar_item.native_modules==2}
	
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" href="{$sidebar_item.url}" class="phone_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='call' d='Shop.Theme.Transformer'}{/if}">
		   {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Call' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	
	{elseif $sidebar_item.native_modules==3}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} viewed_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if}" data-name="side_viewed" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Recently Viewed' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_ammount == 2}<span class="amount_circle">{$products_viewed_nbr}</span>{/if}
		   {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Viewed' d='Shop.Theme.Transformer'}{/if} {if $sidebar_item.show_ammount == 1}({$products_viewed_nbr}){/if}</span>
		</a>
	{elseif $sidebar_item.native_modules==4}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} qrcode_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if}" data-name="side_qrcode" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='QR code' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='QR code' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	{elseif $sidebar_item.native_modules==5}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" class="to_top_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}"  href="{if isset($sidebar_item.url) && $sidebar_item.url}{$sidebar_item.url}{else}#top_bar{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Top' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Top' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	{elseif $sidebar_item.native_modules==6}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} menu_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sttheme.menu_icon_with_text==1} with_text{/if}" data-name="side_stmobilemenu" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	{elseif $sidebar_item.native_modules==7}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} customer_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" data-name="side_mobile_nav" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" href="javascript:;" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M20 18H4M20 12H4M20 6H4" stroke="black" stroke-width="2" stroke-linecap="round"/>
				</svg>
			{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	
		{elseif $sidebar_item.native_modules==16}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} langcur_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" data-name="side_mobile_nav_lan_cur" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" href="javascript:;" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	
	{elseif $sidebar_item.native_modules==8}
		{if !isset($quick_search_mobile) || !$quick_search_mobile}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" data-name="side_search" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} search_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Search' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.1057 16.2L19 19M18.0667 11.5333C18.0667 15.1416 15.1416 18.0667 11.5333 18.0667C7.92507 18.0667 5 15.1416 5 11.5333C5 7.92507 7.92507 5 11.5333 5C15.1416 5 18.0667 7.92507 18.0667 11.5333Z" stroke="#242525" stroke-width="1.5" stroke-linecap="round"/>
				</svg>
			{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Search' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
		{else}
		{include 'module:stsearchbar/views/templates/hook/stsearchbar-block-mobile-open.tpl'}
		{/if}
	{elseif $sidebar_item.native_modules==9}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" data-name="side_share" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} share_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Share' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Share' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	
		{elseif $sidebar_item.native_modules==13}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" data-name="side_wishlist" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} side_wishlist {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Wishlist' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Wishlist' d='Shop.Theme.Transformer'}{/if}{*{if $sidebar_item.show_ammount == 1} (<span class="products_wishlist_nbr">{$products_wishlist_nbr}</span>){/if}*}</span>
		</a>
	
	{elseif $sidebar_item.native_modules==10}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" data-name="side_loved" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} loved_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Loved' d='Shop.Theme.Transformer'}{/if}">
			 {if $sidebar_item.show_ammount == 2}<span class="products_loved_nbr amount_circle">{$products_loved_nbr}</span>{/if}
			{if $sidebar_item.show_icone == 1}
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4.98145 7.17435C5.75268 6.40336 6.79854 5.97024 7.88905 5.97024C8.97956 5.97024 10.0254 6.40336 10.7966 7.17435L12.0016 8.37831L13.2066 7.17435C13.586 6.78155 14.0398 6.46825 14.5416 6.25271C15.0433 6.03717 15.583 5.92372 16.129 5.91898C16.6751 5.91423 17.2166 6.01829 17.7221 6.22507C18.2275 6.43186 18.6867 6.73723 19.0728 7.12337C19.4589 7.50951 19.7643 7.96869 19.9711 8.47411C20.1779 8.97954 20.2819 9.52108 20.2772 10.0671C20.2724 10.6132 20.159 11.1529 19.9435 11.6546C19.7279 12.1564 19.4146 12.6102 19.0218 12.9895L12.0016 20.0108L4.98145 12.9895C4.21046 12.2183 3.77734 11.1725 3.77734 10.0819C3.77734 8.99144 4.21046 7.94557 4.98145 7.17435V7.17435Z" stroke="black" stroke-width="1.28518" stroke-linejoin="round"/>
				</svg>
			{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Loved' d='Shop.Theme.Transformer'}{/if}{if $sidebar_item.show_ammount == 1} (<span class="products_loved_nbr">{$products_loved_nbr}</span>){/if}</span>
		</a>
	
	{elseif $sidebar_item.native_modules==18}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" {*data-name="side_loved" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}"*} {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="{$stcompare.url}" class="{/if} stcompare_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='Compare' d='Shop.Theme.Transformer'}{/if}">
			 {if $sidebar_item.show_ammount == 2}<span class="stcompare_quantity amount_circle">{$stcompare.total}</span>{/if}
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='Compare' d='Shop.Theme.Transformer'}{/if}{if $sidebar_item.show_ammount == 1} (<span class="stcompare_quantity">{$stcompare.total}</span>){/if}</span>
		</a>
	
	{elseif $sidebar_item.native_modules==14}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" data-name="side_stcustomersignin" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" {else} href="javascript:;" class="mobile_bar_tri {/if} {if $customer.is_logged == 1}user_login{/if} myaccount_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='My account' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M3 19.9804C3 16.4408 5.95714 13.5714 12 13.5714C18.0429 13.5714 21 16.4408 21 19.9804C21 20.5435 20.5892 21 20.0824 21H3.91765C3.41084 21 3 20.5435 3 19.9804Z" stroke="black" stroke-width="1.40625"/>
					<path d="M15.375 6.375C15.375 8.23896 13.864 9.75 12 9.75C10.136 9.75 8.625 8.23896 8.625 6.375C8.625 4.51104 10.136 3 12 3C13.864 3 15.375 4.51104 15.375 6.375Z" stroke="black" stroke-width="1.40625"/>
				</svg>
			{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='My account' d='Shop.Theme.Transformer'}{/if}</span>
	
	
	</a>
	
	{elseif $sidebar_item.native_modules==15}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}"   href="{$urls.pages.my_account}" class="{if $customer.is_logged == 1}user_login{/if} myaccount_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='My account' d='Shop.Theme.Transformer'}{/if}">
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{else}{l s='My account' d='Shop.Theme.Transformer'}{/if}</span>
	
	
	</a>
	
	
	{elseif $sidebar_item.native_modules==11 || $sidebar_item.native_modules==12 || $sidebar_item.native_modules==17}
	{else}
	
	   {if $sidebar_item.dropdown_list == 0}
		<a id="rightbar_{$sidebar_item.id_st_sidebar}" data-name="side_custom_sidebar_{$sidebar_item.id_st_sidebar}" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="{/if} custom_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.classpluslink}sidebar_custom_{$sidebar_item.classpluslink}{/if}" rel="nofollow" title="{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}">
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
			<span class="{if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}</span>
		</a>
		{else}
		<div class="dropdown_wrap custom_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.classpluslink}sidebar_custom_{$sidebar_item.classpluslink}{/if}">
		 {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
		{if isset($sidebar_item.url) && $sidebar_item.url}<a href="{$sidebar_item.url}" rel="nofollow"{else}<div{/if} title="{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}" id="rightbar_{$sidebar_item.id_st_sidebar}"  class="dropdown_tri_in {if in_array($sidebar_item.location, array(7,8,9))}header_item dropdown_tri {if $sidebar_item.show_title == 11}no_title_topbar{/if}{else}mobile_bar_tri_text yes_device_{$sidebar_item.show_title}{/if} {if $sidebar_item.border_hover == 1}btn-line{elseif $sidebar_item.border_hover == 2}btn-line-under{/if} {if $sidebar_item.title && $sidebar_item.titlesecond}one_line{/if}">{$sidebar_item.title}{if $sidebar_item.titlesecond}<br>{$sidebar_item.titlesecond}{/if}{if isset($sidebar_item.url) && $sidebar_item.url}</a>{else}</div>{/if}
		<div class="dropdown_list">
		<div class="dropdown_box pad_10">{$sidebar_item.content nofilter}</div>
		</div>
		</div>
		{/if}
	{/if}
	
	{/foreach}
	{/if}
	
	
	
