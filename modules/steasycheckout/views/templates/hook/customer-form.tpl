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
{block name='customer_form'}
  {block name='customer_form_errors'}
    {include file='_partials/form-errors.tpl' errors=$errors['']}
  {/block}
  
  
    <div class="form_content_inner">
    <div class="addres-head">1. {l s='Personal data' d='Shop.Theme.Transformer'}</div>
  <div class="row steco_grid_view">
      <div class="classpl_choose_company adres_padding col-lg-12 adres_padding_chekbox adres_padding" style="z-index: 1">
      <div class="form-group st_form_item_id_choose_company">
       <div class="form-control-valign">

       <label class="radio-inline">
       <span class="steco_flex_container steco_flex_start">
       <span class="steco-custom-input-box">
       <input class="steco-custom-input" name="choose_company" type="radio" value="0" autocomplete="disabled" {if (isset($cart_info.company) && empty($cart_info.company)) || ( !isset($cart_info.company) && $steco.default_account == 0 )}checked=""{/if}>
       <span class="steco-custom-input-item steco-custom-input-radio">
       <i class="eco-ok checkbox-checked"></i>
       <i class="eco-spin5 steco-animate-spin"></i>
       </span>
       </span>
       <span class="steco_flex_child">{l s='Private person' d='Shop.Theme.Transformer'}</span>
       </span>
       </label>
       <label class="radio-inline">
       <span class="steco_flex_container steco_flex_start">
       <span class="steco-custom-input-box">
       <input class="steco-custom-input" name="choose_company" type="radio" value="1" autocomplete="disabled" {if (isset($cart_info.company) && !empty($cart_info.company)) || ( !isset($cart_info.company) && $steco.default_account == 1 )}checked=""{/if}>
       <span class="steco-custom-input-item steco-custom-input-radio">
       <i class="eco-ok checkbox-checked"></i>
       <i class="eco-spin5 steco-animate-spin"></i>
       </span>
       </span>
       <span class="steco_flex_child">{l s='Company' d='Shop.Theme.Transformer'}</span>
       </span>
       </label>
       
       </div>
      </div>
      </div>
      </div>
      </div>


{foreach from=$formFields item="field"}
      {if in_array($field.type, ['radio-buttons', 'checkbox'])}
        {block "form_field"}
          {if ($field.name=='id_gender' && $ask_for_gender == 1) }
  
           {if $field.type != 'hidden'}<div data-ddd="{$field.name}" class="form_content_inner classpl_{$field.name}  {if in_array($field.type, ['radio-buttons', 'checkbox'])}col-lg-12 adres_padding_chekbox{/if} adres_padding col-lg-{if $steco.compact_forms && !in_array($field.type, ['radio-buttons', 'checkbox'])}6 {if $row_counter%2==0} steco_first-item-of-large-line  steco_first-item-of-desktop-line steco_first-item-of-line {/if}{$row_counter=$row_counter+1}{else}6{$row_counter=0}{/if}{if $field.name == 'id_country'} hidden{/if}">{/if}
            {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
            {if $field.type != 'hidden'}</div>{/if}
          {/if}
        {/block}
        {/if}
      {/foreach}
      
 

  <div class="steco_addresses steco_block"></div>
  
  


<form action="{url entity='module' name='steasycheckout' controller='default' params=['action' => 'update']}" id="steco_customer_form_{$pi_type}" method="post" class="steco_pi_form">
  <div class="form_content">
    <div class="form_content_inner checkbox-zone-bottom">
    {block "form_fields"}
      <div class="row steco_grid_view">
      
      <div style="display: none;">
      {assign var="row_counter" value=0}
      {foreach from=$formFields item="field"}
      {if !in_array($field.type, ['radio-buttons', 'checkbox']) }
        {block "form_field"}
          {if ($field.name=='id_gender' && !$ask_for_gender) || ($field.name=='newsletter' && !$newsletter)}
          {else}
            {if $field.name === 'password' and !$guest_allowed}
              {$field.required=true}
            {/if}
            {if $field.type != 'hidden'}<div class="classpl_{$field.name} adres_padding {if in_array($field.type, ['radio-buttons', 'checkbox'])}col-lg-12 adres_padding_chekbox{/if} adres_padding col-lg-{if $steco.compact_forms && !in_array($field.type, ['radio-buttons', 'checkbox'])}6 {if $row_counter%2==0} steco_first-item-of-large-line  steco_first-item-of-desktop-line steco_first-item-of-line {/if}{$row_counter=$row_counter+1}{else}6{$row_counter=0}{/if}{if $field.name == 'id_country'} hidden{/if}">{/if}
            {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
            {if $field.type != 'hidden'}</div>{/if}
          {/if}
        {/block}
        {/if}
      {/foreach}
      </div>
      
      
      <div class="checkbox_zone">
           
        
           
       {block name='form_fields' append}
       
  

  {*if !$is_logged || $is_guest || true}
    {if $type=="invoice"}
      <input type="hidden" name="use_as_delivery_invoice[]" value="invoice">
    {else}
      <input type="hidden" name="use_as_delivery_invoice[]" value="delivery">
      *}

      <div class="adres_padding_chekbox col-lg-12">
      <div class="form-group">

          <input name  = "show_invoice_button"
                  type  = "checkbox"
                  value = "1"
                  class = "steco-custom-input"
                  {if $cart.id_address_delivery == $cart.id_address_invoice} checked{/if}
                  style="display:none !important"
          >
        
          <label class="choose_invoice"><span class="steco-custom-input-box">
            <input name  = "show_invoice_button_proxy"
                    type  = "checkbox"
                    value = "1"
                    class = "steco-custom-input"
                    {if $cart.id_address_delivery != $cart.id_address_invoice} checked{/if}
            >
            <span class="steco-custom-input-item steco-custom-input-checkbox"><i class="eco-ok checkbox-checked"></i></span>
          </span>{l s='Use this address for invoice' d='Shop.Theme.Transformer'}</label>
       </div>
      </div>

    {*/if}
  {/if*}
  {if $is_logged && !$is_guest && isset($show_delivery_address_form) && isset($show_invoice_address_form)}
    <div class="form-group row">
      <div class="col-md-9 col-md-offset-3">
        <label><span class="steco-custom-input-box">
          <input name  = "use_as_delivery_invoice[]"
                  type  = "checkbox"
                  value = "delivery"
                  class = "steco-custom-input"
                  {if $show_delivery_address_form} checked {/if}
          >
          <span class="steco-custom-input-item steco-custom-input-checkbox"><i class="eco-ok checkbox-checked"></i></span>
        </span>
        {l s='Use this address for delivery' d='Shop.Theme.Transformer'}</label>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-9 col-md-offset-3">
        <label><span class="steco-custom-input-box">
          <input name  = "use_as_delivery_invoice[]"
                  type  = "checkbox"
                  value = "invoice"
                  class = "steco-custom-input"
                  {if $show_invoice_address_form} checked {/if}
          >
          <span class="steco-custom-input-item steco-custom-input-checkbox"><i class="eco-ok checkbox-checked"></i></span>
        </span>
        {l s='Use this address for invoice' d='Shop.Theme.Transformer'}</label>
      </div>
    </div>
  {/if}
{/block}    
           
           
      <div class="classpl_invoice adres_padding_chekbox col-lg-12">
        <div class="form-group">
        <label class="steco_flex_container steco_flex_start">
          <span class="steco-custom-input-box">
              <input class="steco-custom-input" name="invoice" type="checkbox" value="1"{if !empty($cart_info.invoice)} checked=""{/if}>
              <span class="steco-custom-input-item steco-custom-input-checkbox"><i class="fto-ok-1 checkbox-checked"></i></span>
          </span>
          <div class="invoice_consent_message steco_flex_child">
             {l s='I want to receive an invoice' d='Shop.Theme.Transformer'}
          </div>
        </label>
        {include file='module:steasycheckout/views/templates/hook/_partials/form-errors-for-js.tpl' name="invoice"}
        </div>
      </div>
      
      
      {if $guest_allowed}
      <div class="classpl_password adres_padding_chekbox col-lg-12">
        <div class="form-group">
        <label class="steco_flex_container steco_flex_start">
          <span class="steco-custom-input-box">
              <input class="steco-custom-input" name="register_account" type="checkbox" value="1">
              <span class="steco-custom-input-item steco-custom-input-checkbox"><i class="fto-ok-1 checkbox-checked"></i></span>
          </span>
          <div class="password_message steco_flex_child">
             {l s='Create an account with a password' d='Shop.Theme.Transformer'}  
          </div>
        </label>
        {include file='module:steasycheckout/views/templates/hook/_partials/form-errors-for-js.tpl' name=""}
        </div>
        
        <div class="show_passwords collapse">
      {foreach from=$formFields item="field"}
      {if $field.name === 'password'}
        {block "form_field"}
          {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
        {/block}
        {/if}
      {/foreach}
      </div>
        
      
        
      </div>
      {/if}
            
    <div class="zone-checkbox-top"></div>
       <div class="addres-head mini">{l s='2. Regulations and returns' d='Shop.Theme.Transformer'}</div>
       <div class="addres-head">{l s='Information on the processed data' d='Shop.Theme.Transformer'}</div>
       
       {if $steco_gdpr && !$is_logged}<div class="classpl_gdpr adres_padding_chekbox col-lg-12">
        <div class="form-group">
        <label class="steco_flex_container steco_flex_start">
          <span class="steco-custom-input-box">
              <input class="steco-custom-input" name="steco_psgdpr_consent_checkbox" type="checkbox" value="1" 
              data-front_controller="{$steco_gdpr.psgdpr_front_controller}"
              data-id_customer="{$steco_gdpr.psgdpr_id_customer}"
              data-customer_token="{$steco_gdpr.psgdpr_customer_token}"
              data-id_guest="{$steco_gdpr.psgdpr_id_guest}"
              data-guest_token="{$steco_gdpr.psgdpr_guest_token}"
              data-id_module="{$steco_gdpr.psgdpr_id_module}"
              >
              <span class="steco-custom-input-item steco-custom-input-checkbox"><i class="fto-ok-1 checkbox-checked"></i></span>
          </span>
          <div class="psgdpr_consent_message steco_flex_child"><span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span> {$steco_gdpr.psgdpr_consent_message nofilter}
          </div>
        </label>
        {include file='module:steasycheckout/views/templates/hook/_partials/form-errors-for-js.tpl' name="gdpr"}
        </div>
      </div>{/if}
       {assign var="row_counter" value=0}
      {foreach from=$formFields item="field"}
      {if in_array($field.type, ['radio-buttons', 'checkbox'])}
        {block "form_field"}
          {if $field.name=='id_gender' || ($field.name=='newsletter' && !$newsletter)}
          {else}
           {if $field.type != 'hidden'}<div data-ddd="{$field.name}" class="classpl_{$field.name}  adres_padding {if in_array($field.type, ['radio-buttons', 'checkbox'])}col-lg-12 adres_padding_chekbox{/if} adres_padding col-lg-{if $steco.compact_forms && !in_array($field.type, ['radio-buttons', 'checkbox'])}6 {if $row_counter%2==0} steco_first-item-of-large-line  steco_first-item-of-desktop-line steco_first-item-of-line {/if}{$row_counter=$row_counter+1}{else}6{$row_counter=0}{/if}{if $field.name == 'id_country'} hidden{/if}">{/if}
            {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
            {if $field.type != 'hidden'}</div>{/if}
          {/if}
        {/block}
        {/if}
      {/foreach}

     {hook h='displayPdCeneoZaufaneOpinieCustom'}
      {hook h='displayPdOpineoOpinieCustom'}
      
     
      </div>
      
     <p class="info-required"><span class="label_required">{l s='*' d='Shop.Theme.Transformer'} - {l s='required field' d='Shop.Theme.Transformer'}</span></p>
       {$hook_create_account_form nofilter}
      </div>
    {/block}
    </div>
  </div>
  {block name='customer_form_footer'}
    <footer class="form-footer">
      <input type="hidden" name="submitCreate" value="{if $pi_type=='guest'}2{else}1{/if}">
      {block "form_buttons"}{/block}
    </footer>
  {/block}


</form>
{/block}