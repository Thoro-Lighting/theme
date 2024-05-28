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
    <h3 class="page_heading login_form_heading {if $sttheme.auth_heading_align==1} text-2 {elseif $sttheme.auth_heading_align==2} text-3 {else} text-1 {/if}">{if $facebook_login || $google_login}{l s='or log in' d='Shop.Theme.Transformer'}{else}{l s='Sign in' d='Shop.Theme.Transformer'}{/if}:</h3>
       
<form id="steco_login_form" action="{url entity='module' name='steasycheckout' controller='default' params=['action' => 'update']}" method="post" class="steco_pi_form">

  <div class="form_content">
    <div class="form_content_inner">
      {include file='_partials/form-errors.tpl' errors=$errors['']}

      {block name='login_form_fields'}
        <div class="row steco_grid_view">
        
       {assign var="row_counter" value=0}
        {foreach from=$formFields item="field"}
          {block name='form_field'}
            {if $field.type != 'hidden'}<div class="col-lg-{if $steco.compact_forms}6 {if $row_counter%2==0} steco_first-item-of-large-line  steco_first-item-of-desktop-line steco_first-item-of-line {/if}{else}12{/if}">{$row_counter=$row_counter+1}{/if}
            {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
            {if $field.type != 'hidden'}</div>{/if}
          {/block}
        {/foreach}
        </div>
      {/block}
      <div class="steco_mb_16">
          <a href="{$steco_urls.password}" class="forgot-password" rel="nofollow" title="{l s='Forgot your password?' d='Shop.Theme.Transformer'}">
            {l s='Forgot your password?' d='Shop.Theme.Transformer'}
          </a>
      </div>
    </div>
  </div>
  {block name='login_form_footer'}
  <footer class="form-footer">
    <input type="hidden" name="submitLogin" value="1">
    {block name='form_buttons'}
    <button
      class="btn steco_btn steco-btn-spin btn-primary btn-large js-submit-active {if $sttheme.auth_layout}{if $arrow_buttons}btn_arrow{/if}{/if} btn-spin btn-full-width"
      name="steco_login"
      type="submit"
      value="1"
    >
     
      {l s='Sign in' d='Shop.Theme.Transformer'}
    </button>
    {/block}
  </footer>
  {/block}

</form>
{/block}
