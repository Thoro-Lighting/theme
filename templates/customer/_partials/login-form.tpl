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
{block name='login_form'}
{if !$sttheme.auth_layout}<div class="sidebar_login_form">
<h3 class="page_heading  text-1 ">{l s='Login' d='Shop.Theme.Transformer'}</h3>
<p class="form_content_inner">{l s='Hello, if you already have an account, log in.' d='Shop.Theme.Transformer'}</p>
{/if}
<form id="login-form" action="{block name='login_form_actionurl'}{$action}{/block}" method="post" class="col-lg-12">

  <div class="form_content">
    <div class="form_content_inner {if !$sttheme.auth_layout}no-padding{/if}">
      {include file='_partials/form-errors.tpl' errors=$errors['']}

      {block name='login_form_fields'}
        {foreach from=$formFields item="field"}
          {block name='form_field'}
            {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
          {/block}
        {/foreach}
      {/block}
      <p class="forgot-password">
          {l s='Forgot your password?' d='Shop.Theme.Customeraccount'}
          <a href="{$urls.pages.password}" rel="nofollow" title="{l s='Reset password' d='Shop.Theme.Customeraccount'}">
            {l s='Reset password' d='Shop.Theme.Customeraccount'}
          </a>
      </p>
    </div>
  </div>
  
  
  {block name='login_form_footer'}
  <footer class="form-footer {if !$sttheme.auth_layout}no-padding{/if}">
    <input type="hidden" name="submitLogin" value="1">
    {block name='form_buttons'}
    <button class="btn btn-primary btn-main btn-large js-submit-active {if $sttheme.auth_layout}{if $arrow_buttons}btn_arrow{/if}{/if} btn-spin btn-full-width" data-link-action="sign-in" type="submit" id="SubmitLogin">
      {l s='Sign in' d='Shop.Theme.Actions'}
    </button>
    {/block}
  </footer>
  {/block}
   

</form>
{if !$sttheme.auth_layout}</div>{/if}
{/block}
