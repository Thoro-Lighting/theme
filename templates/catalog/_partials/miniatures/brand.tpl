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
 
{assign var='name_letter' value=Configuration::get('ST_BRANDS_NAME_LETTER')}
{assign var='short_desc_letter' value=Configuration::get('ST_BRANDS_SHORT_DESC_LETTER')}
{assign var='quantity_letter' value=Configuration::get('ST_BRANDS_QUANTITY_LETTER')}
{assign var='more_letter' value=Configuration::get('ST_BRANDS_MORE_LETTER')}
{assign var='brand_information' value=Configuration::get('ST_BRANDS_BRAND_INFORMATION')}
{assign var='image_brand' value=Configuration::get('ST_BRANDS_IMAGE_BRAND')}
{assign var='loved_brand' value=Configuration::get('ST_BRANDS_LOVED_BRAND')}

{assign var='pro_per_list_fw' value=Configuration::get('STSN_BRANDS_PRO_PER_LIST_FW')}
{assign var='pro_per_list_xxl' value=Configuration::get('STSN_BRANDS_PRO_PER_LIST_XXL')}
{assign var='pro_per_list_xl' value=Configuration::get('STSN_BRANDS_PRO_PER_LIST_XL')}
{assign var='pro_per_list_lg' value=Configuration::get('STSN_BRANDS_PRO_PER_LIST_LG')}
{assign var='pro_per_list_md' value=Configuration::get('STSN_BRANDS_PRO_PER_LIST_MD')}
{assign var='pro_per_list_sm' value=Configuration::get('STSN_BRANDS_PRO_PER_LIST_SM')}
{assign var='pro_per_list_xs' value=Configuration::get('STSN_BRANDS_PRO_PER_LIST_XS')}

 
{block name='brand_miniature_item'}

  <li class="brand {if $brand_information == 0}flex_container{/if} flex_start line_item 
    col-fw-{(12/$pro_per_list_fw)|replace:'.':'-'}
    col-xxl-{(12/$pro_per_list_xxl)|replace:'.':'-'}
   col-xl-{(12/$pro_per_list_xl)|replace:'.':'-'}
   col-lg-{(12/$pro_per_list_lg)|replace:'.':'-'}
   col-md-{(12/$pro_per_list_md)|replace:'.':'-'}
   col-sm-{(12/$pro_per_list_sm)|replace:'.':'-'}
   col-{(12/$pro_per_list_xs)|replace:'.':'-'}
   
">
    {if $image_brand == 1}<div class="brand-img {if $brand_information != 1}mr-3{/if} {if $brand_information == 1}bottom{/if}"><a href="{$brand.url}" title="{$brand.name}"><img src="{$brand.image}" alt="{$brand.name}" class="general_border" width="{$sttheme.brand_default.width}" height="{$sttheme.brand_default.height}"></a></div>{/if}
    <div class="flex_child">
      <div class="brand-infos">
      {if $name_letter == 1}
        <h3 class="s_title_block"><a href="{$brand.url}" title="{$brand.name}">{$brand.name}</a></h3>{/if}
      {if $short_desc_letter == 1}{$brand.text nofilter}{/if}
      </div>
      <div class="brand-products">
       {if $quantity_letter == 1}<p><a href="{$brand.url}" title="{l s='View products' d='Shop.Theme.Actions'}">{$brand.nb_products} {l s='pcs.' d='ShopThemeTransformer'}</a></p>{/if}
       {if $more_letter == 1} <a href="{$brand.url}" class="go" title="{l s='View products' d='Shop.Theme.Actions'}">{l s='View products' d='Shop.Theme.Actions'}</a>{/if}
      </div>
       {if $loved_brand}{hook h="displayCustomLovedIcon" type=4 id_source=$brand.id_manufacturer}{/if}
    </div>
  </li>
{/block}
