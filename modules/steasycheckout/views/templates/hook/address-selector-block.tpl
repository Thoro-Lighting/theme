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
{block name='address_selector_blocks'}
<div class="steco_addresses row steco_grid_view">
{foreach $addresses as $address}
  <div class="test {if $steco.address_per_xl}col-xl-{(12/$steco.address_per_xl)|replace:'.':'-'}{/if} col-lg-{(12/$steco.address_per_lg)|replace:'.':'-'} col-md-{(12/$steco.address_per_md)|replace:'.':'-'} col-sm-12 {*{(12/$steco.address_per_sm)|replace:'.':'-'}*} col-{(12/$steco.address_per_xs)|replace:'.':'-'} {if $steco.address_per_xl && $address@iteration%$steco.address_per_xl == 1} first-item-of-desktop-line{/if}{if $address@iteration%$steco.address_per_lg == 1} first-item-of-line{/if}{if $address@iteration%$steco.address_per_md == 1} first-item-of-tablet-line{/if}{if $address@iteration%$steco.address_per_sm == 1} first-item-of-mobile-line{/if}{if $address@iteration%$steco.address_per_xs == 1} first-item-of-portrait-line{/if}">
  <article
    class="steco-address-item {if $address.id == $selected} steco_selected{/if}"
    id="{$name|classname}-address-{$address.id}"
  >
        <label class="radio-block steco_address_label">
          <span class="steco-custom-input-box steco-tick">
            <input
              type="radio"
              class="steco-custom-input "
              name="{$name}"
              value="{$address.id}"
              {if in_array($address.id, $not_valid_addresses)}disabled{elseif $address.id == $selected}checked{/if}
            >
            <span class="steco-custom-input-item steco-custom-input-radio"><i class="eco-ok checkbox-checked"></i><i class="eco-spin5 steco-animate-spin"></i></span>
          </span>
          <span class="address-alias">{$address.alias}</span>
          <div class="address">{$address.formatted nofilter}</div>
        </label>
        {if in_array($address.id, $not_valid_addresses)}<p class="alert alert-danger js-address-error">{l s='This address is incomplete, please update it.' d='Shop.Theme.Transformer'}</p>{/if}
      <div class="steco_address_actions">
          <a
            class="edit-address steco_mr_r6 steco_address_btn steco-btn-spin"
            data-link-action="edit-address"
            href="{url entity='module' name='steasycheckout' controller='default' params=['action' => 'addresses','id_address' => $address.id, 'editAddress' => $type, 'token' => $token]}"
            title="{l s='Edit' d='Shop.Theme.Transformer'}"
          >
            <i class="fto-pencil fs_md steco_mr_r4"></i><span>{l s='Edit' d='Shop.Theme.Transformer'}</span>
          </a>
          <a
            class="delete-address steco_address_btn steco-btn-spin"
            data-link-action="delete-address"
            href="{url entity='module' name='steasycheckout' controller='default' params=['action' => 'addresses','id_address' => $address.id, 'deleteAddress' => true, 'token' => $token]}"
            title="{l s='Delete' d='Shop.Theme.Transformer'}"
          >
            <i class="fto-trash fs_md steco_mr_r4"></i><span>{l s='Delete' d='Shop.Theme.Transformer'}</span>
          </a>
      </div>
  </article>
  </div>
{/foreach}
</div>
{/block}