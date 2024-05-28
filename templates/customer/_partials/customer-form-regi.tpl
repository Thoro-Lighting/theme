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
{extends file='customer/_partials/customer-form.tpl'}

        {block "form_field"}
        {if $field.type != 'hidden'}<div class="col-lg-12">{$row_counter=$row_counter+1}{/if}
        
        {assign var='ask_for_gender' value=Configuration::get('STECO_ASK_FOR_GENDER')}
         
        {if ($field.name =='id_gender' && $ask_for_gender == 1) || $field.name !='id_gender'}
          {form_field field=$field file='_partials/form-fields-1.tpl'}{/if}
        {if $field.type != 'hidden'}</div>{/if}
        {/block}
        
      {block "form_buttons"}
        <button class="btn btn-primary btn-large js-submit-active {if $arrow_buttons}btn_arrow{/if} btn-spin btn-full-width" data-link-action="save-customer" type="submit">
          {*<i class="fto-user icon_btn"></i>*}{l s='Create an account' d='Shop.Theme.Actions'}
        </button>
         <p class="info-required standard mt-3"><span class="label_required">{l s='*' d='Shop.Theme.Transformer'} - {l s='required field' d='Shop.Theme.Transformer'}</span></p>
   
      {/block}