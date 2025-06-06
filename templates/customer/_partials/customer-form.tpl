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

<form action="{block name='customer_form_actionurl'}{$action}{/block}" id="customer-form" class="js-customer-form fields_border_{$input_fields_border}" method="post">
  <div class="form_content">
    <div class="form_content_inner">
    {block "form_fields"}
      <div class="row com_grid_view">
      
      {assign var="row_counter" value=0}
      {foreach from=$formFields item="field"}
        {if $sttheme.hide_gender && $field.name=='id_gender'}{continue}{/if}
        {block "form_field"}
        
         {assign var='ask_for_gender' value=Configuration::get('STECO_ASK_FOR_GENDER')}

    {if ($field.name =='id_gender' && $ask_for_gender == 1) || $field.name !='id_gender'}
        {if $field.type != 'hidden'}<div class="col-lg-12 {if $row_counter%2==0} first-item-of-large-line  first-item-of-desktop-line first-item-of-line {/if}">{$row_counter=$row_counter+1}{/if}
          {form_field field=$field file='module:steasycheckout/views/templates/hook/_partials/form-fields.tpl'}
        {if $field.type != 'hidden'}</div>{/if}{/if}
        {/block}
      {/foreach}
      
      </div>
      {$hook_create_account_form nofilter}
    {/block}
    </div>
  </div>
  {block name='customer_form_footer'}
    <footer class="form-footer">
      <input type="hidden" name="submitCreate" value="1">
      {block "form_buttons"}
        <button class="btn-main btn-full-width" data-link-action="save-customer" type="submit">
          {l s='Save' d='Shop.Theme.Actions'}
        </button>
      {/block}
    </footer>
  {/block}
</form>
{/block}