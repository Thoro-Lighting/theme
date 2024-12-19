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
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{if $sidebar_item.titlesecond} {$sidebar_item.titlesecond}{/if}{else}{l s='View my shopping cart' d='Shop.Theme.Transformer'}{/if}" {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="mobile_bar_tri {/if} cart_mobile_bar_tri {if in_array($sidebar_item.location, array(7,8,9))}top_bar_item{else}mobile_bar_item{/if} shopping_cart_style_2 icone_top {if $sidebar_item.icone_hover == 1}icone_hover_on{/if}" data-name="side_products_cart" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}">
		
			{if $sidebar_item.show_ammount == 2}<span class="ajax_cart_quantity amount_circle {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>{/if}
			<span class="ajax_cart_bg_handle"></span>
			{if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
		
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
	    {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
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
	    {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
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
	    {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
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
	    {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
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


