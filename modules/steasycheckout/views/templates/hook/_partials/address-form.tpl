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
{block name="address_form"}
<div class="js-address-form st_address_form_{$type} {if $type=='invoice' && !isset($st_ajax_load_address_form) && (!isset($use_same_address) || (isset($use_same_address) && $use_same_address))} steco_display_none{/if}">
  {if isset($address_form_errors)}{include file='_partials/form-errors.tpl' errors=$address_form_errors}{/if}

<p class="steco_sub_heading steco_mb_6">{if $type=='invoice'}{l s='Invoice address' d='Shop.Theme.Transformer'}{else}{*{l s='Address' d='Shop.Theme.Transformer'}*}{/if}</p>

  {block name="address_form_url"}
  <form
    method="POST"
    action="{url entity='address' params=['id_address' => $id_address]}"
    data-id-address="{$id_address}"
    data-refresh-url="{url entity='address' params=['ajax' => 1, 'action' => 'addressForm']}"
  >
  {/block}

  <input type="hidden" name="saveAddress" value="{$type}">
  <input type="hidden" name="use_as_delivery_invoice[]" value="{$type}">
  
    {block name="address_form_fields"}
      {assign var="row_counter" value=0}
      <section class="form-fields">
      <div class="form_content_inner">
        {block name='form_fields'}
            <div class="row steco_grid_view">
            {foreach from=$formFields item="field"}
              {block name='form_field'}
                {if $field.type != 'hidden'}<div class="{if ($field.name == company && $input_fields == 1) OR ($field.name == address1 && $input_fields == 1) }col-lg-7{elseif $field.name == alias }col-lg-12 alias{elseif ($field.name == vat_number && $input_fields == 1) OR ($field.name == address2 && $input_fields == 1) }col-lg-5{else}col-lg-12{/if} adres_padding {*col-lg-{if $steco.compact_address && $field.name!='address1' && $field.name!='address2' && !in_array($field.type, ['radio-buttons', 'checkbox'])}6 {if $row_counter%2==0} steco_first-item-of-large-line  steco_first-item-of-desktop-line steco_first-item-of-line {/if}{$row_counter=$row_counter+1}{else}6{$row_counter=0}{/if}*}{*if $field.name == 'id_country'} hidden{/if*}">{/if}
                {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
                {if $field.type != 'hidden'}</div>{/if}
              {/block}
            {/foreach}

            {*if $type!='invoice'}
              <div class="col-lg-12 adres_padding">
                <div class="form-group st_form_item_fake_email">
                  <label class="required">
                      {l s='E-mail adres' d='Shop.Theme.Transformer'}
                      <span class="label_required">{l s='*' d='Shop.Theme.Transformer'}</span>
                  </label>
                  <div>
                    <input class="form-control" name="fake_email" type="text" value="{$customer.email}" required autocomplete="disabled" />

                    {include file='module:steasycheckout/views/templates/hook/_partials/form-errors-for-js.tpl' name=fake_email}
                  </div>
              </div>
            {/if*}
          </div>
          {/block}
           </div>
           
              <p class="info-required reguired-adres"><span class="label_required">{l s='*' d='Shop.Theme.Transformer'} - {l s='required field' d='Shop.Theme.Transformer'}</span></p>
    
      </section>
    {/block}

    {block name="address_form_footer"}
    <footer class="form-footer">
      <input type="hidden" name="submitAddress" value="1">
      
  
      {block name='form_buttons'}
        <button class="btn btn-default steco_btn" type="submit" class="form-control-submit">
          {l s='Save the data' d='Shop.Theme.Transformer'}
        </button>
      {/block}
    </footer>
    {/block}
  </form>
</div>
{/block}