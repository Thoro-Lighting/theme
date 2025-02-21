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
{if $sidebar_item.native_modules==1}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} icon_wrap with_text cart_mobile_bar_tri icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_products_cart" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='View my shopping cart' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5.40039 9.62394L10.2312 4.35394C11.1824 3.31626 12.8184 3.31626 13.7696 4.35394L18.6004 9.62394M21.1979 10.9209L18.4659 19.7209C18.336 20.1393 17.9489 20.4244 17.5108 20.4244H6.55597C6.12009 20.4244 5.73442 20.1421 5.60271 19.7266L2.81317 10.9266C2.60879 10.2819 3.09007 9.62442 3.76642 9.62442H20.2428C20.9167 9.62442 21.3977 10.2774 21.1979 10.9209Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Cart' d='Shop.Theme.Transformer'} {if $sidebar_item.show_ammount == 1}(<span class="ajax_cart_quantity {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>){/if}{/if}</span>
	        {if $sidebar_item.show_ammount == 2}<span class="ajax_cart_quantity amount_circle {if $cart.products_count == 0} simple_hidden {/if}{if $cart.products_count > 9} dozens {/if}">{$cart.products_count} </span>{/if}
	    </a>
	</div>
{elseif $sidebar_item.native_modules==2}
	<section id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="{$sidebar_item.url}" class="icon_wrap with_text phone_mobile_bar_tri icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}"  title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Call' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Call' d='Shop.Theme.Transformer'}{/if}</span>
	       </a>
	</section>
{elseif $sidebar_item.native_modules==3}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} icon_wrap with_text viewed_mobile_bar_tri icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_viewed" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Recently Viewed' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Viewed' d='Shop.Theme.Transformer'}{/if}</span>
	        <span class="products_viewed_nbr amount_circle {if $products_viewed_nbr > 9} dozens {/if}">{$products_viewed_nbr}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==4}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} qrcode_mobile_bar_tri icon_wrap with_text icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_qrcode" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='QR code' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='QR code' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==5}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	      
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" {else} href="#top_bar" class="to_top_btn{/if} to_top_wrap icon_wrap with_text icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Back to top' d='Shop.Theme.Transformer'}{/if}">
	    {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
        </a>
	</div>
{elseif $sidebar_item.native_modules==6}
	<div  id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
		<a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} menu_mobile_bar_tri icon_wrap with_text  icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_stmobilemenu" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}">
		    {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
		    <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	</div>
{elseif $sidebar_item.native_modules==7}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} customer_mobile_bar_tri icon_wrap with_text  icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_mobile_nav" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
	
	{elseif $sidebar_item.native_modules==16}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} langcur_mobile_bar_tri icon_wrap with_text  icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_mobile_nav_lan_cur" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==8}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} search_mobile_bar_tri icon_wrap with_text icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_search" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Search' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Search' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==9}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} share_mobile_bar_tri icon_wrap with_text  icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_share" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Share' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Share' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
	
	{elseif $sidebar_item.native_modules==13}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} side_wishlist icon_wrap with_text  icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_wishlist" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Wishlist' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Wishlist' d='Shop.Theme.Transformer'}{/if}</span>
	   {* <span class="products_wishlist_nbr amount_circle {if $products_wishlist_nbr > 9} dozens {/if}">{$products_wishlist_nbr}</span>*}
	    </a>
	</div>
	
	
	{elseif $sidebar_item.native_modules==14}
	

	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="{if $customer.is_logged == 1}user_login{/if} rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} myaccount_mobile_bar_tri  icon_wrap with_text  icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_stcustomersignin" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='My account' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='My account' d='Shop.Theme.Transformer'}{/if}</span>
	       </a>
	</div>
	
	{elseif $sidebar_item.native_modules==15}
		<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="{if $customer.is_logged == 1}user_login{/if} rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile} icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}">
	    <a href="{$urls.pages.my_account}" class="icon_wrap with_text myaccount_mobile_bar_tri icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if}"  data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='My account' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='My account' d='Shop.Theme.Transformer'}{/if}</span>
	       </a>
	</div>
	
{elseif $sidebar_item.native_modules==10}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} loved_mobile_bar_tri icon_wrap with_text  icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_loved" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Loved products' d='Shop.Theme.Transformer'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Loved' d='Shop.Theme.Transformer'}{/if}</span>
	       {if $sidebar_item.show_ammount == 1}<span class="products_loved_nbr amount_circle {if $products_viewed_nbr > 9} dozens {/if}">{$products_loved_nbr}</span>{/if}
	    </a>
	</div>
	
{elseif $sidebar_item.native_modules==17}
 {if !$configuration.is_catalog && $sidebar_item.zone_cart_mobile==0 && $page.page_name == 'product'}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <div class="rightbar_tri addtocart_mobile_bar_tri icon_wrap with_text fixed_add_animation icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Add to cart' d='Shop.Theme.Actions'}{/if}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Add to cart' d='Shop.Theme.Actions'}{/if}</span>
	  
	    </div>
	</div>
	{/if}
		
{elseif $sidebar_item.native_modules==11 || $sidebar_item.native_modules==12}
{else}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a {if isset($sidebar_item.url) && $sidebar_item.url} href="{$sidebar_item.url}" class=" {else} href="javascript:;" class="rightbar_tri {/if} custom_mobile_bar_tri icon_wrap with_text  icone_top {if  $sidebar_item.icone_hover == 1}icone_hover_on{/if} {if $sidebar_item.sidebar_off}open-sidebar{/if}" data-name="side_custom_sidebar_{$sidebar_item.id_st_sidebar}" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{$sidebar_item.title}">
	        {if $sidebar_item.show_icone == 1}<span class="icone_svg"></span>{/if}
	        <span class="icon_text {if $sidebar_item.show_title == 12}no_text_desc{/if} {if $sidebar_item.show_title == 13}no_text_mob{/if} {if $sidebar_item.show_title == 14}no_text{/if}">{$sidebar_item.title}</span>
	    </a>
	</div>
{/if}
