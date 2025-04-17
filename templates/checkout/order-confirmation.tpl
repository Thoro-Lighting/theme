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

{assign var='order_conf_page' value=Configuration::get('STSN_ORDER_CONF_PAGE')}


<!doctype html>
<html lang="{$language.iso_code}">

<head>
  {block name='head'}
    {include file='_partials/head.tpl'}
  {/block}
  <link rel="stylesheet" href="{$urls.base_url}/themes/epresta/modules/steasycheckout/views/css/front.css" media="all">
</head>

<body id="{$page.page_name}" class="{$page.page_name} {$page.body_classes|classnames} lang_{$language.iso_code} {if $language.is_rtl} is_rtl {/if}
  {if $sttheme.is_mobile_device} mobile_device {if $sttheme.use_mobile_header==1} use_mobile_header {/if}{else} desktop_device {/if}
  {block name='body_class'} hide-left-column hide-right-column {/block}">

  {block name='hook_after_body_opening_tag'}
    {hook h='displayAfterBodyOpeningTag'}
  {/block}

  <div id="st-container" class="st-container st-effect-{$sttheme.sidebar_transition}">
    <div class="st-pusher">
      <div class="st-content">
        <!-- this is the wrapper for the content -->
        <div id="module-steasycheckout-default" class="st-content-inner">
          <!-- off-canvas-end -->
          <main id="body_wrapper" class="order_confirmation">
            {if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}<div id="page_wrapper">{/if}
              <div class="header-container">
                <header id="st_header" class="animated fast header_checkout">
                  {block name='checkout_header'}
                    {if $order_conf_page == 0 OR $order_conf_page == 2}{include file='_partials/header.tpl'}{else}{include file='checkout/_partials/header.tpl'}{/if}
                  {/block}
                </header>
              </div>
              {if $blurred_menu_bg == 1}<div class="menu_blur">{/if}

                {block name='notifications'}
                  {include file='_partials/notifications.tpl'}
                {/block}
                {if $blurred_menu_bg == 1}</div>{/if}
              <section id="wrapper" class="columns-container {if $blurred_menu_bg == 1}menu_blur{/if}">
                <div class="container">


                  {block name='page_title' hide}{/block}

                  {block name='page_content_container' prepend}
                    <div id="wrapper">
                      <section id="head_steps" class="checkout_wrapper">
                        <div class="">
                          <div class="steps flex_container">
                            <div class="line_1 line_all"><a href="" class="step_link"><span>1.
                                  {l s='Your cart' d='ShopThemeTransformer'} <i class="fto-ok"></i></span></a></div>
                            <div class="line_2 line_all"><a href="" class="step_link next"><span>2.
                                  {l s='Shipping' d='ShopThemeTransformer'} <i class="fto-ok"></i></span></a></div>
                            <div class="line_3 line_all"><a href="" class="step_link next"><span>3.
                                  {l s='Summary' d='ShopThemeTransformer'} <i class="fto-ok"></i></span></a></div>
                          </div>
                      </section>
                    </div>

                    <section id="content-hook_order_confirmation" class="card card_trans">
                      <div class="card-block">
                        <div class="row">
                          <div class="col-md-12">
                            {block name='order_confirmation_header'}
                              <h5 class="page_heading">
                                {l s='Your order is confirmed' d='Shop.Theme.Checkout'}
                              </h5>
                            {/block}
                            <div class="order-mail-info">
                              {l s='An email has been sent to your mail address <span>%email%</span>.' d='Shop.Theme.Checkout' sprintf=['%email%' => $customer.email]}
                              {if $order.details.invoice_url}
                                {* [1][/1] is for a HTML tag. *}
                                {l
                      s='You can also [1]download your invoice[/1]'
                      d='Shop.Theme.Checkout'
                      sprintf=[
                        '[1]' => "<a href='{$order.details.invoice_url}'>",
                                '[/1]' => "</a>"
                                ]
                                }
                              {/if}
                            </div>
                            {block name='hook_order_confirmation'}
                              {$HOOK_ORDER_CONFIRMATION nofilter}
                            {/block}
                          </div>
                        </div>
                      </div>
                    </section>
                  {/block}

                  {block name='page_content_container'}
                    <section id="content" class="page-content page-order-confirmation card card_trans">
                      <div class="card-block">
                        <div class="row">
                          {block name='order_confirmation_table'}
                            <div id="order-items" class="col-md-12">
                              {include
                file='checkout/_partials/order-confirmation-table.tpl'
                products=$order.products
                subtotals=$order.subtotals
                totals=$order.totals
                labels=$order.labels
                add_product_link=false
              }
                            </div>
                          {/block}
                          {block name='order_details'}
                            <div id="order-details" class="col-md-12">
                              <div class="row details-items">
                                <h6 class="page_heading col-md-6">{l s='Order details' d='Shop.Theme.Checkout'}:</h6>
                                <ul class="col-md-6">
                                  <li class="heading_color">
                                    {l s='Order reference: <b>%reference%</b>' d='Shop.Theme.Checkout' sprintf=['%reference%' => $order.details.reference]}
                                  </li>
                                  <li>
                                    {l s='Payment method: <b>%method%</b>' d='Shop.Theme.Checkout' sprintf=['%method%' => $order.details.payment]}
                                  </li>
                                  {if !$order.details.is_virtual}
                                    <li>
                                      {l s='Shipping method: %method%' d='Shop.Theme.Checkout' sprintf=['%method%' => $order.carrier.name]}<br>
                                      <b>{$order.carrier.delay}</b>
                                    </li>
                                  {/if}
                                </ul>
                              </div>
                            </div>
                          {/block}
                        </div>
                      </div>
                    </section>


                    {block name='hook_payment_return'}
                      {if ! empty($HOOK_PAYMENT_RETURN)}
                        <section id="content-hook_payment_return" class="card card_trans definition-list">
                          <div class="card-block">
                            <div class="row">
                              <div class="col-md-12">
                                {$HOOK_PAYMENT_RETURN nofilter}
                              </div>
                            </div>
                          </div>
                        </section>
                      {/if}
                    {/block}
                    {* {block name='customer_registration_form'}

                      {if $customer.is_guest}
          <div id="registration-form" class="card card_trans mb-3">
            <div class="card-block">
              <h4 class="h4">
                        {l s='Save time on your next order, sign up now' d='Shop.Theme.Checkout'}</h4>

                        {render file='customer/_partials/customer-form.tpl' ui=$register_form}
            </div>
          </div>

                      {/if}

                    {/block}*}

                    {block name='hook_order_confirmation_1'}
                      {hook h='displayOrderConfirmation1'}
                    {/block}

                    {block name='hook_order_confirmation_2'}
                      <section id="content-hook-order-confirmation-footer">
                        {hook h='displayOrderConfirmation2'}
                      </section>
                    {/block}


                  {/block}

                </div>
              </section>

              {block name='checkout_footer'}
                {include file='_partials/footer-checkout.tpl'}
              {/block}
              {if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}
            </div>{/if}
          </main>
          <!-- off-canvas-begin -->
          <div id="st-content-inner-after"
            data-version="{if isset($sttheme.ps_version)}{$sttheme.ps_version|replace:'.':'-'}{/if}-{if isset($sttheme.theme_version)}{$sttheme.theme_version|replace:'.':'-'}{/if}">
          </div>
        </div><!-- /st-content-inner -->
      </div><!-- /st-content -->
      <div id="st-pusher-after"></div>
    </div><!-- /st-pusher -->

    {block name="side_bar"}


      {if $auth_same_footer}
        {hook h="displaySideBar"}
      {else}
        <div class="st-menu" id="checkout_mobile_nav">
          <div class="mobile_nav_box">
            <div class="st-menu-header">
              <h3 class="st-menu-title">{l s='Menu' d='Shop.Theme.Transformer'}</h3>
              <a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18 6L6 18M18 18L6 6" stroke="#181B1A" stroke-width="1.2" stroke-linecap="round" />
                </svg>
              </a>
            </div>
            {hook h="displayCheckoutMobileNav"}
          </div>
        </div>
      {/if}
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