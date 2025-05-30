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
<div class="user-update-form">
<div class="js-address-form">
  {include file='_partials/form-errors.tpl' errors=$errors['']}

  {block name="address_form_url"}
  <form
    method="POST"
    action="{url entity='address' params=['id_address' => $id_address]}"
    data-id-address="{$id_address}"
    data-refresh-url="{url entity='address' params=['ajax' => 1, 'action' => 'addressForm']}"
  >
  {/block}
  
    {block name="address_form_fields"}
      <section class="form-fields">
        {block name='form_fields'}
        <div class="row com_grid_view">
          {assign var="row_counter" value=0}
          {foreach from=$formFields item="field"}
            {block name='form_field'}
              {if $field.type != 'hidden'}<div class="{if $field.name == alias}col-lg-12{else}col-lg-6{/if} {if $row_counter%2==0} first-item-of-large-line  first-item-of-desktop-line first-item-of-line {/if}">{$row_counter=$row_counter+1}{/if}
              {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
              {if $field.type != 'hidden'}</div>{/if}
            {/block}
          {/foreach}
        </div>
        {/block}
      </section>
    {/block}
 <p class="info-required"><span class="label_required">{l s='*' d='Shop.Theme.Transformer'} - {l s='required field' d='Shop.Theme.Transformer'}</span></p>
   
    {block name="address_form_footer"}
    <footer class="form-footer">
      <input type="hidden" name="submitAddress" value="1">
      {block name='form_buttons'}
        <button class="btn-main btn-full-width" type="submit" class="form-control-submit">
          {l s='Save' d='Shop.Theme.Actions'}
        </button>
      {/block}
    </footer>
    {/block}
  </form>
</div>
</div>
{/block}