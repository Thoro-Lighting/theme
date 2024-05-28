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
{if $field.type == 'hidden'}
  {block name='form_field_item_hidden'}
  <input type="hidden" name="{$field.name}" value="{$field.value}">
  {/block}
{else}

  <div class="form-group {if !empty($field.errors)}has-error{/if} st_form_item_{$field.name} {if $input_fields == 2}input_placeholder{/if} {if $input_fields == 1}input_label{/if} {if $input_fields == 3}animation_placeholder{/if} placeholder_error_{$placeholder_error} fields_border_{$input_fields_border} {$field.type}_style">
    {if $field.type !== 'checkbox' && $input_fields == 1}
    <label class="{if $field.required} required{/if}">
        {$field.label} {if $input_fields == 1 && $field.type === 'password'}<span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span>{/if}
        {block name='form_field_comment'}
          {if (!$field.required && !in_array($field.type, ['radio-buttons', 'checkbox'])) && $field.name != company && $field.name != vat_number}
           <span class="label_optional">{l s='(Optional)' d='Shop.Theme.Transformer'}</span>
          {else}
            <span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span>
          {/if}
        {/block}
    </label>
    {/if}
    <div class="{if ($field.type === 'radio-buttons')} form-control-valign{/if}">

    {if $field.type === 'select'}
        {block name='form_field_item_select'}
        <select class="form-control form-control-select" name="{$field.name}" {if $field.required}required{/if} autocomplete="disabled">
          <option value disabled selected>{l s='-- please choose --' d='Shop.Theme.Transformer'}</option>
          {foreach from=$field.availableValues item="label" key="value"}
            <option value="{$value}" {if $value eq $field.value} selected {/if}>{$label}</option>
          {/foreach}
        </select>
        {/block}

      {elseif $field.type === 'countrySelect'}
        {block name='form_field_item_country'}
        <select
          class="form-control form-control-select steco-country"
          name="{$field.name}"
          {if $field.required}required{/if}
          autocomplete="disabled"
        >
          <option value disabled selected>{l s='-- please choose --' d='Shop.Theme.Transformer'}</option>
          {foreach from=$field.availableValues item="label" key="value"}
            <option value="{$value}" {if $value eq $field.value} selected {/if}>{$label}</option>
          {/foreach}
        </select>
        {/block}
      {elseif $field.type === 'radio-buttons'}
        {block name='form_field_item_radio'}
        {foreach from=$field.availableValues item="label" key="value"}
          <label class="radio-inline">
            <span class="steco_flex_container steco_flex_start">
            <span class="steco-custom-input-box">
              <input  name  = "{$field.name}"
                      {if $field.required}required{/if}
                      type  = "radio"
                      value = "{$value}"
                      class = "steco-custom-input"
                      {if $field.value}checked="checked"{/if}
                      autocomplete="disabled"
              >
              <span class="steco-custom-input-item steco-custom-input-radio"><i class="eco-ok checkbox-checked"></i><i class="eco-spin5 steco-animate-spin"></i></span>
            </span>
            <span class="steco_flex_child">{$label}</span>
            </span>
          </label>
        {/foreach}
        {/block}
      {elseif $field.type === 'checkbox'}
        {block name='form_field_item_checkbox'}
        <label class="checkbox-inline steco_flex_container steco_flex_start">
        <span class="steco-custom-input-box">
          <input  name  = "{$field.name}"
                  {if $field.required}required{/if}
                  type  = "checkbox"
                  value = "1"
                  class = "steco-custom-input"
                  {if $field.value}checked="checked"{/if}
                  autocomplete="disabled"
          >
          <span class="steco-custom-input-item"><i class="eco-ok checkbox-checked"></i><i class="eco-spin5 steco-animate-spin"></i></span>
        </span>
       <span class="steco_flex_child"> {if $field.required}<span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span > {/if}{if $field.name == optin}{l s='I accept the' d='Shop.Theme.Transformer'} <a href="{url entity='cms' id=3 id_lang=1}" target="_blank">{l s='Privacy Policy' d='Shop.Theme.Transformer'}</a><br><span class="privacy-text">{l s='I consent to the transfer of my personal data in the form of an e-mail address and information about the order placed by me to Opineo (Ringier Axel Springer Polska Sp.z o.o.), in order to know my opinion on the purchase in the online store https://europ24. pl, which will be published on the Opineo.pl website' d='Shop.Theme.Transformer'}</span>{elseif $field.name == newsletter}{l s='I want to use the Newsletter service by e-mail, in accordance with' d='Shop.Theme.Transformer'} <a href="{url entity='cms' id=1 id_lang=1}" target="_blank">{l s='Regulations' d='Shop.Theme.Transformer'}</a> {l s='providing newsletter services' d='Shop.Theme.Transformer'}{else}{$field.label nofilter}{/if}
       </label>
        {/block}

      {elseif $field.type === 'date'}
        {block name='form_field_item_date'}
        <input name="{$field.name}" class="form-control" type="date" value="{$field.value}" placeholder="{if isset($field.availableValues.placeholder)}{$field.availableValues.placeholder}{/if}" autocomplete="disabled">
        {if isset($field.availableValues.comment)}
          <span class="form-control-comment">
            {$field.availableValues.comment}
          </span>
        {/if}
        {/block}

      {elseif $field.type === 'birthday'}
        {block name='form_field_item_birthday'}
        <div class="js-parent-focus">
          {html_select_date
          field_order=DMY
          time={$field.value}
          field_array={$field.name}
          prefix=false
          reverse_years=true
          field_separator='<br>'
          day_extra='class="form-control form-control-select"'
          month_extra='class="form-control form-control-select"'
          year_extra='class="form-control form-control-select"'
          day_empty={l s='-- day --' d='Shop.Theme.Transformer'}
          month_empty={l s='-- month --' d='Shop.Theme.Transformer'}
          year_empty={l s='-- year --' d='Shop.Theme.Transformer'}
          start_year={'Y'|date}-100 end_year={'Y'|date}
          }
        </div>
        {/block}
      {elseif $field.type === 'password'}

        {block name='form_field_item_password'}
          <div class="input-group">
            <input
              class="form-control js-child-focus js-visible-password"
              name="{$field.name}"
              type="password"
              value=""
              pattern=".{literal}{{/literal}5,{literal}}{/literal}"
              {if $field.required}required{/if}
              autocomplete="disabled"
              {if $input_fields == 2}placeholder="{l s='*' d='Shop.Theme.Transformer'} {$field.label} ..."{/if}
            >
            
             {if $input_fields == 3}
    <label class="{if $field.required} required{/if} form-control-placeholder">
       <span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span> {$field.label} </label>
       {/if}
       
       {if $placeholder_error == 3 || $placeholder_error == 5}<span class="has_error_icon"></span>{/if}
            
            <span class="input-group-btn">
              <button
                class="btn show_password"
                type="button"
                data-action="show-password"
                data-text-show="{l s='Show' d='Shop.Theme.Transformer'}"
                data-text-hide="{l s='Hide' d='Shop.Theme.Transformer'}"
              >
                <i class="eco-eye-off"></i>
              </button>
            </span>
          </div>
        {/block}
      {else}

        {block name='form_field_item_other'}
          <input
            class="form-control"
            name="{$field.name}"
            type="{$field.type}"
            value="{$field.value}"
            {if $field.name=="firstname" || $field.name=="lastname"}data-prev_value="{$field.value}"{/if}
            {if $field.name=="phone" || $field.name=="postcode"} pattern="[0-9-]*" inputmode="numeric"{/if}
            {if isset($field.availableValues.placeholder)}placeholder="{$field.availableValues.placeholder}"{/if}
            {if $field.maxLength}maxlength="{$field.maxLength}"{/if}
            {if $field.required || $field.name=="alias"}required{/if}
            autocomplete="disabled"
            {if $input_fields == 2}placeholder="{if (!$field.required && !in_array($field.type, ['radio-buttons', 'checkbox'])) && $field.name != company && $field.name != vat_number}{*<span class='label_optional'{l s='(Optional)' d='Shop.Theme.Transformer'}</span>*}{else}{l s='*' d='Shop.Theme.Transformer'}{/if} {$field.label} ..."{/if}
            
          >
          
           {if $input_fields == 3}
    <label class="{if $field.required} required{/if} form-control-placeholder">
        {if (!$field.required && !in_array($field.type, ['radio-buttons', 'checkbox'])) && $field.name != company && $field.name != vat_number}
           {*<span class="label_optional">{l s='(Optional)' d='Shop.Theme.Transformer'}</span>*}
          {else}
            <span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span>
          {/if}{$field.label}  
            </label>
       {/if}
       
       {if $placeholder_error == 3 || $placeholder_error == 5}<span class="has_error_icon"></span>{/if}

          
        {/block}

      {/if}
      {if isset($field.availableValues.comment)}
        <span class="form-control-comment">
          {$field.availableValues.comment nofilter}
        </span>
      {/if}

      {block name='form_field_errors'}
        {if $field.errors|count}
          {include file='module:steasycheckout/views/templates/hook/_partials/form-errors.tpl' errors=$field.errors}
        {else}
          {include file='module:steasycheckout/views/templates/hook/_partials/form-errors-for-js.tpl' name=$field.name}
        {/if}
      {/block}

      {* if $field.name=="email" || $field.name=="phone" || $field.name=="postcode" || $field.name=="birthday" || $field.name=="firstname" || $field.name=="lastname" *}

    </div>
    
    
  </div>
  
{/if}
