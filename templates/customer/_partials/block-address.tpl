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
{block name='address_block_item'}
<article id="address-{$address.id}" class="address card card_trans mb-3" data-id-address="{$address.id}">
  <label class="radio-block steco_address_label">
    
    {block name='address_block_item_actions'}
 
  <span class="address-alias">{$address.alias}</span>
   <div class="steco_address_actions"><a href="{url entity=address id=$address.id}" data-link-action="edit-address" class="inline_block mar_r6">
      <i class="fto-pencil mar_r4 fs_md"></i>{*{l s='Update' d='Shop.Theme.Actions'}*}
    </a>
    <a href="{url entity=address id=$address.id params=['delete' => 1, 'token' => $token]}" data-link-action="delete-address" class="inline_block">
      <i class="fto-trash mar_r4 fs_md"></i>{*{l s='Delete' d='Shop.Theme.Actions'}*}
    </a>
    </div>
  
  {/block}
    
    <address class="address">{$address.formatted nofilter}</address>
  </label>
  
</article>
{/block}