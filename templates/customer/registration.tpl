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
 
  {assign var='auth_same_header' value=Configuration::get('STSN_AUTH_SAME_HEADER')}
 {assign var='auth_same_footer' value=Configuration::get('STSN_AUTH_SAME_FOOTER')}
  {assign var='foot_checkout_auth' value=Configuration::get('STSN_FOOT_CHECKOUT_AUTH')}
  
<!doctype html>
<html lang="{$language.iso_code}">

  <head>
    {block name='head'}
      {include file='_partials/head.tpl'}
    {/block}
  </head>

  <body id="{$page.page_name}" class="{$page.page_name} {$page.body_classes|classnames} lang_{$language.iso_code} {if $language.is_rtl} is_rtl {/if}
  {if $sttheme.is_mobile_device} mobile_device {else} desktop_device {/if}
  {block name='body_class'} hide-left-column hide-right-column {/block}">

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
      <header id="st_header" class="animated fast header_checkout">
      {block name='checkout_header'}
        {if $auth_same_header == 0}{include file='_partials/header.tpl'}{else}{include file='checkout/_partials/header.tpl'}{/if}
      {/block}
      </header>
    </div>
    {if $blurred_menu_bg == 1}<div class="menu_blur">{/if}
     {*{block name='breadcrumb'}
		{hook h='displayBreadcrumb' page_name=$page.page_name}
		<div class="breadcrumb_spacing"></div>
	  {/block}*}

    {block name='notifications'}
      {include file='_partials/notifications.tpl'}
    {/block}
    {if $blurred_menu_bg == 1}</div>{/if}
    <section id="wrapper" class="columns-container {if $blurred_menu_bg == 1}menu_blur{/if}">
      <div class="container">


{block name='page_title' hide}{/block}

{block name='page_content'}
    {block name='register_form_container'}
    {assign var="auth_login_width" value=6}
    {if $sttheme.auth_login_width}{$auth_login_width=$sttheme.auth_login_width}{/if}
      <div class="row">
        <section id="register_form_block" class="from_blcok block login_form_block">
          {if $sttheme.auth_heading_align!=3}<h3 class="page_heading {if $sttheme.auth_heading_align==1} text-2 {elseif $sttheme.auth_heading_align==2} text-3 {else} text-1 {/if}">{l s='Create an account' d='Shop.Theme.Customeraccount'}</h3>{/if}
          <div class="form_content">
            <div class="form_content_inner">
                <p>
                  {l s='Already have an account?' d='Shop.Theme.Customeraccount'} <a href="{$urls.pages.authentication}" rel="nofollow" title="{l s='Log in instead!' d='Shop.Theme.Customeraccount'}"><i class="fto-logout-1"></i> {l s='Log in instead!' d='Shop.Theme.Customeraccount'}</a>
                </p>
                {$hook_create_account_top nofilter}
            </div>
          </div>
          {render file='customer/_partials/customer-form-regi.tpl' ui=$register_form}            
        </section>
      </div>
    {/block}
{/block}
     
      </div>
    </section>

    {include file='_partials/footer.tpl'}
    {if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}</div>{/if}
  </main>
  <!-- off-canvas-begin -->
      <div id="st-content-inner-after" data-version="{if isset($sttheme.ps_version)}{$sttheme.ps_version|replace:'.':'-'}{/if}-{if isset($sttheme.theme_version)}{$sttheme.theme_version|replace:'.':'-'}{/if}"></div>
      </div><!-- /st-content-inner -->
    </div><!-- /st-content -->
    <div id="st-pusher-after"></div>
    </div><!-- /st-pusher -->

   {block name="side_bar"}  
   {hook h="displaySideBarCheckout"}
   {/block}

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
