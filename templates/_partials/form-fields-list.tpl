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
      {if $field.type === 'select'}
        {block name='form_field_item_select'}
        <select class="form-control form-control-select" name="{$field.name}" {if $field.required}required{/if}>
          <option value disabled selected>{l s='-- please choose --' d='Shop.Forms.Labels'}</option>
          {foreach from=$field.availableValues item="label" key="value"}
            <option value="{$value}" {if $value eq $field.value} selected {/if}>{$label}</option>
          {/foreach}
        </select>
        {/block}

      {elseif $field.type === 'countrySelect'}
        {block name='form_field_item_country'}
        <select
          class="form-control form-control-select js-country"
          name="{$field.name}"
          {if $field.required}required{/if}
        >
          <option value disabled selected>{l s='-- please choose --' d='Shop.Forms.Labels'}</option>
          {foreach from=$field.availableValues item="label" key="value"}
            <option value="{$value}" {if $value eq $field.value} selected {/if}>{$label}</option>
          {/foreach}
        </select>
        {/block}
      {elseif $field.type === 'radio-buttons'}
        {block name='form_field_item_radio'}
        {foreach from=$field.availableValues item="label" key="value"}
          <label class="radio-inline">
            <span class="custom-radio">
              <input
                name="{$field.name}"
                type="radio"
                value="{$value}"
                {if $field.required}required{/if}
                {if $value eq $field.value} checked {/if}
              >
              <span></span>
            </span>
            <span>{$label}</span>
          </label>
        {/foreach}
        {/block}
      {elseif $field.type === 'checkbox'}
        {block name='form_field_item_checkbox'}
        <label class="checkbox-inline flex_container flex_start">
        <span class="custom-input-box">
          <input class="custom-input" name="{$field.name}" type="checkbox" value="1" {if $field.value}checked="checked"{/if} {if $field.required}required{/if}>
          <span class="custom-input-item custom-input-checkbox"><i class="fto-ok-1 checkbox-checked"></i></span>
        </span>
        <span class="flex_child">{$field.label nofilter}</span >
        </label>
        {/block}

      {elseif $field.type === 'date'}
        {block name='form_field_item_date'}
        <input name="{$field.name}" class="form-control" type="date" value="{$field.value}" placeholder="{if isset($field.availableValues.placeholder)}{$field.availableValues.placeholder}{/if}">
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
          day_empty={l s='-- day --' d='Shop.Forms.Labels'}
          month_empty={l s='-- month --' d='Shop.Forms.Labels'}
          year_empty={l s='-- year --' d='Shop.Forms.Labels'}
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
              {if $input_fields == 2}placeholder="{l s='*' d='Shop.Theme.Transformer'} {$field.label} ..."{/if}
            >
            
               {if $input_fields == 3}
    <label class="{if $field.required} required{/if} form-control-placeholder">
        <span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span> {$field.label} <span>...</span> 
            </label>
       {/if}
       
       {if $placeholder_error == 3 || $placeholder_error == 5}<span class="has_error_icon"></span>{/if}
            
            <span class="input-group-btn">
              <button
                class="btn show_password"
                type="button"
                data-action="show-password"
                data-text-show="{l s='Show' d='Shop.Theme.Actions'}"
                data-text-hide="{l s='Hide' d='Shop.Theme.Actions'}"
              >
                <i class="fto-eye-off"></i>
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
            {if isset($field.availableValues.placeholder)}placeholder="{$field.availableValues.placeholder}"{/if}
            {if $field.maxLength}maxlength="{$field.maxLength}"{/if}
            {if $field.required}required{/if}
            {if $input_fields == 2}placeholder=" {if (!$field.required && !in_array($field.type, ['radio-buttons', 'checkbox']))}{*{l s='(Optional)' d='Shop.Forms.Labels'}*}{else}{l s='*' d='Shop.Theme.Transformer'}{/if} {$field.label} ..."{/if}
          >
          
           {if $input_fields == 3}
    <label class="{if $field.required} required{/if} form-control-placeholder">
         {if (!$field.required && !in_array($field.type, ['radio-buttons', 'checkbox']))}{*{l s='(Optional)' d='Shop.Forms.Labels'}*}{else}<span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span> {/if}{$field.label} <span>...</span> 
            </label>
       {/if}
       
       {if $placeholder_error == 3 || $placeholder_error == 5}<span class="has_error_icon"></span>{/if}
    </label>
          {if isset($field.availableValues.comment)}
            <span class="form-control-comment">
              {$field.availableValues.comment}
            </span>
          {/if}
        {/block}

      {/if}

      {block name='form_field_errors'}
        {include file='_partials/form-errors.tpl' errors=$field.errors name=$field.name}
      {/block}