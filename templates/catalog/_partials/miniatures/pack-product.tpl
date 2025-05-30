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
{block name='pack_miniature_item'}
  <article class="line_item">
      <div class="pack-product-container flex_container">
          <a href="{$product.url}" title="{$product.name}">
            <img
              src="{$product.cover.small.url}"
              width="{$product.cover.small.width}"
              height="{$product.cover.small.height}"
              alt="{$product.cover.legend}"
              class="pack-product-image"
              data-full-size-image-url="{$product.cover.large.url}"
            >
          </a>
        <div class="pack-product-name flex_child">
          <a href="{$product.url}" title="{$product.name}">
            {$product.name}
          </a>
        </div>
        <div class="pack-product-price price">
          {$product.price}
        </div>
        <div class="pack-product-quantity">
          <span>x {$product.pack_quantity}</span>
        </div>
      </div>
  </article>
{/block}