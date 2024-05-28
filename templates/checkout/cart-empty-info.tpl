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
 
  {assign var='empty_cart_page' value=Configuration::get('STSN_EMPTY_CART_PAGE')}

 
<!doctype html>
<html lang="{$language.iso_code}">

  <head>
    {block name='head'}
      {include file='_partials/head.tpl'}
    {/block}
  </head>

  <body id="{$page.page_name}" class="{$page.page_name} {$page.body_classes|classnames} lang_{$language.iso_code} {if $language.is_rtl} is_rtl {/if}
  {if $sttheme.is_mobile_device} mobile_device {if $sttheme.use_mobile_header==1} use_mobile_header {/if}{else} desktop_device {/if}
  {block name='body_class'} hide-left-column hide-right-column {/block} cart-empty {if $empty_cart_page == 1 OR $empty_cart_page == 3}empty-cart-header{/if}">

    {block name='hook_after_body_opening_tag'}
      {hook h='displayAfterBodyOpeningTag'}
    {/block}

  <div id="st-container" class="st-container st-effect-{$sttheme.sidebar_transition}">
    <div class="st-pusher">
    <div class="st-content"><!-- this is the wrapper for the content -->
      <div class="st-content-inner">
  <!-- off-canvas-end -->
  <main id="body_wrapper">
    {if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}<div id="page_wrapper">{/if}
    <div class="header-container">
      <header id="st_header" class="animated fast header_normal">
      {block name='checkout_header'}
        {if $empty_cart_page == 0 OR $empty_cart_page == 2}{include file='_partials/header.tpl'}{else}{include file='checkout/_partials/header.tpl'}{/if}
      {/block}
      </header>
    </div>
    
    {if $empty_cart_page == 0 OR $empty_cart_page == 2}
    {if $blurred_menu_bg == 1}<div class="menu_blur">{/if}
     {block name='breadcrumb'}
		{hook h='displayBreadcrumb' page_name=$page.page_name}
	 {/block}

    {block name='notifications'}
      {include file='_partials/notifications.tpl'}
    {/block}
    {if $blurred_menu_bg == 1}</div>{/if}
    {/if}
    <section id="wrapper" class="columns-container {if $blurred_menu_bg == 1}menu_blur{/if}">
      <div class="container">


{block name='page_title' hide}{/block}


{block name='content'}

  <section id="main">
  
  <!-- shipping informations -->
        {block name='hook_shopping_cart_footer'}
          <div class="empty_cart_box"><div class="mini_box">{hook h='displayShoppingCartEmpty'}
          <p class="empty-cart-login"><a href="{$urls.pages.authentication}" title="{l s='Log in instead!' d='Shop.Theme.Customeraccount'}">{l s='Log in instead!' d='Shop.Theme.Customeraccount'}</a> {l s='to see previously added products.' d='Shop.Theme.Transformer'}</p>
          {block name='continue_shopping'}
          <a href="{$urls.pages.index}" class="btn btn-border {if $arrow_buttons}btn_arrow black_arrow bt_left btn_blus{/if}" title="{l s='Continue shopping' d='Shop.Theme.Actions'}">
            {*<i class="fto-left-open">*}</i>{l s='Continue shopping' d='Shop.Theme.Actions'}
          </a>
        {/block}
          </div>
          </div>
        <div class="empty-cart-prod">
          {hook h='displayShoppingCartEmptyProd'}
        </div>  
        {/block}
         <!-- shipping informations -->
        

  </section>
{/block}

 </div>
    </section>

 {block name='checkout_footer'}
      {if $empty_cart_page == 0 OR $empty_cart_page == 1}
        {include file='_partials/footer.tpl'}
      {else}
        <footer id="footer" class="footer-container {if $blurred_menu_bg == 1}menu_blur{/if} footer_checkout">
    {block name='hook_footer_checkout'}
    {capture name="displayFooterCheckout"}{hook h="displayFooterCheckout"}{/capture}
    {if $smarty.capture.displayFooterCheckout|trim}
    <section id="footer-checkout">
		<div class="{if !$sttheme.footer_fullwidth && $sttheme.responsive_max!=3}wide_container{/if}">
			<div class="{if !$sttheme.footer_fullwidth && $sttheme.responsive_max!=3}container{else}container-fluid{/if}">
                <div class="row footer_first_level_row">
				    {$smarty.capture.displayFooterCheckout nofilter}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
       
        {include file='_partials/footer-bottom.tpl'}
        </footer>
      {/if}
    {/block}
    {if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}</div>{/if}
  </main>
  <!-- off-canvas-begin -->
      <div id="st-content-inner-after" data-version="{if isset($sttheme.ps_version)}{$sttheme.ps_version|replace:'.':'-'}{/if}-{if isset($sttheme.theme_version)}{$sttheme.theme_version|replace:'.':'-'}{/if}"></div>
      </div><!-- /st-content-inner -->
    </div><!-- /st-content -->
    <div id="st-pusher-after"></div>
    </div><!-- /st-pusher -->

    {block name="side_bar"}   
    {hook h="displaySideBar"}
    {/block}
    
    <div id="sidebar_box" class="flex_container menu_blur">
    {hook h="displayRightBar"}
    </div>

  </div><!-- /st-container -->
  <!-- off-canvas-end -->

    {block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}

    {block name='hook_before_body_closing_tag'}
      {hook h='displayBeforeBodyClosingTag'}
    {/block}

  </body>

</html>


