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
  {if $sttheme.is_mobile_device} mobile_device {if $sttheme.use_mobile_header==1} use_mobile_header {/if}{else} desktop_device {/if}
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
{assign var="auth_login_width" value=6}
{if $sttheme.auth_login_width}{$auth_login_width=$sttheme.auth_login_width}{/if}
    <div class="row">
    {if $sttheme.auth_layout}
    {block name='new_customers_container'}
      <div class="col-lg-{12-$auth_login_width} {if $sttheme.auth_layout == 1}register_two_columns{/if}">
        <section id="create_account_block" class="from_blcok block login_form_block">
          {if $sttheme.auth_heading_align!=3}<h3 class="page_heading login_form_heading {if $sttheme.auth_heading_align==1} text-2 {elseif $sttheme.auth_heading_align==2} text-3 {else} text-1 {/if}">{l s='New customers?' d='Shop.Theme.Transformer'}</h3>{/if}
          <div class="form_content">
          <div class="form_content_inner">
              <div class="p-b-1">{hook h='displayRegisterText'}</div>
          </div>
          
                   
          
          {if isset($oasl_login_disable) && $oasl_login_disable == 2}{$HOOK_OASL_CUSTOM nofilter}{/if}
          </div>
          <footer class="form-footer">
              <a class="btn btn-primary btn-large js-btn-active {if $arrow_buttons}btn_arrow{/if} btn-spin btn-full-width" href="{$urls.pages.register}" data-link-action="display-register-form" id="SubmitCreate" rel="nofollow">
                  {*<i class="fto-user icon_btn"></i>*}
                  {l s='Create an account' d='Shop.Theme.Actions'}
              </a>
          </footer>
        </section>
      </div>
    {/block}
    {/if}
    {block name='login_form_container'}
      <div class="{if $sttheme.auth_layout == 1}login_two_columns{/if} {if $sttheme.auth_layout} col-lg-{$auth_login_width} {else} col-lg-{$auth_login_width} {if $layout=='layouts/layout-full-width.tpl'}offset-lg-{floor((12-$auth_login_width)/2)}{/if} {/if}">{*to do looking for a better way to tell if has columns*}
        <section id="login_form_block" class="from_blcok block login_form_block {if !$sttheme.auth_layout} one_column_login {/if}">
          {if $sttheme.auth_layout}{if $sttheme.auth_heading_align!=3}<h3 class="page_heading {if $sttheme.auth_heading_align==1} text-2 {elseif $sttheme.auth_heading_align==2} text-3 {else} text-1 {/if}">{l s='Registered customers' d='Shop.Theme.Transformer'}</h3>{/if}{/if}
          {render file='customer/_partials/login-form.tpl' ui=$login_form}
          {if !$sttheme.auth_layout}
          <div class="sidebar_auth_form">
          <h5>{l s='You are a new user?' d='Shop.Theme.Transformer'}</h5>
          <div class="form_content_inner text-center p-t-1">
          {*  <h6 class="fs_lg heading_color heading_font">{l s='New customers?' d='Shop.Theme.Transformer'}</h6>
            <div class="p-b-1">{l s='It\'s quick and easy to create an account to shop faster and save your order to account.' d='Shop.Theme.Transformer'}</div>*}
          </div>
          {if isset($oasl_login_disable) && $oasl_login_disable == 2}{$HOOK_OASL_CUSTOM nofilter}{/if}
          <footer class="form-footer text-center">
            <a href="{$urls.pages.register}" class="no_account btn btn-border btn-full-width {if $arrow_buttons}btn_arrow black_arrow{/if} btn-spin js-submit-active" data-link-action="display-register-form" title="{l s='No account? Create one here' d='Shop.Theme.Customeraccount'}">
              {*<i class="fto-user icon_btn"></i>*}{l s='Create an account' d='Shop.Theme.Actions'}
            </a>
          </footer>
          </div>
          {/if}  
        </section>
      </div>
    {/block}
    </div>
    {block name='display_after_login_form'}
      {hook h='displayCustomerLoginFormAfter'}
    {/block}
{/block}
     
      </div>
    </section>

    {block name='checkout_footer'}
      {if $auth_same_footer == 1}
        {include file='_partials/footer.tpl'}
      {else}
        <footer id="footer" class="footer-container {if $blurred_menu_bg == 1}menu_blur{/if} footer_checkout">
    {if $auth_same_footer != 0}
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
    {/block}{/if}
       
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
