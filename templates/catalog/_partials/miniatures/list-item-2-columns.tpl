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
 {assign var='for_w' value='category'}
  {if isset($for_f) && $for_f}
    {$for_w=$for_f}
  {/if}
  {*to do do not use capture*}

  {* {if !isset($pro_per_fw_2)}{$pro_per_fw_2=$sttheme["{$for_w}_per_fw_2"]}{/if}
  {if !isset($pro_per_xxl_2)}{$pro_per_xxl_2=$sttheme["{$for_w}_per_xxl_2"]}{/if}
  {if !isset($pro_per_xl_2)}{$pro_per_xl_2=$sttheme["{$for_w}_per_xl_2"]}{/if}
  {if !isset($pro_per_lg_2)}{$pro_per_lg_2=$sttheme["{$for_w}_per_lg_2"]}{/if}
  {if !isset($pro_per_md_2)}{$pro_per_md_2=$sttheme["{$for_w}_per_md_2"]}{/if}
  {if !isset($pro_per_sm_2)}{$pro_per_sm_2=$sttheme["{$for_w}_per_sm_2"]}{/if}
  {if !isset($pro_per_xs_2)}{$pro_per_xs_2=$sttheme["{$for_w}_per_xs_2"]}{/if} *}

  {if !$pro_per_fw_2}{$pro_per_fw_2=4}{/if}
  {if !$pro_per_xxl_2}{$pro_per_xxl_2=4}{/if}
  {if !$pro_per_xl_2}{$pro_per_xl_2=4}{/if}
  {if !$pro_per_lg_2}{$pro_per_lg_2=4}{/if}
  {if !$pro_per_md_2}{$pro_per_md_2=2}{/if}
  {if !$pro_per_sm_2}{$pro_per_sm_2=2}{/if}
  {if !$pro_per_xs_2}{$pro_per_xs_2=1}{/if}


  {*define numbers of product per line in other page for tablet*}
  {assign var='big_next_variants' value=Configuration::get('STSN_BIG_NEXT_VARIANTS')}
  {assign var='nbLi' value=$products|@count}
  {assign var='nbLiNext' value=($nbLi+1)}
  {math equation="nbLi/nbItemsPerLineScreen" nbLi=$nbLi nbItemsPerLineScreen=$pro_per_fw_2 assign=nbLinesScreen}
  {math equation="nbLi/nbItemsPerLineLarge" nbLi=$nbLi nbItemsPerLineLarge=$pro_per_xxl_2 assign=nbLinesLarge}
  {math equation="nbLi/nbItemsPerLineDesktop" nbLi=$nbLi nbItemsPerLineDesktop=$pro_per_xl_2 assign=nbLinesDesktop}
  {math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$pro_per_lg_2 assign=nbLines}
  {math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$pro_per_md_2 assign=nbLinesTablet}
  {math equation="nbLi/nbItemsPerLineMobile" nbLi=$nbLi nbItemsPerLineMobile=$pro_per_sm_2 assign=nbLinesMobile}
  {math equation="nbLi/nbItemsPerLinePortrait" nbLi=$nbLi nbItemsPerLinePortrait=$pro_per_xs_2 assign=nbLinesPortrait}
  {capture name="product_gide_class"} col-fw-{(12/$pro_per_fw_2)|replace:'.':'-'} col-xxl-{(12/$pro_per_xxl_2)|replace:'.':'-'} col-xl-{(12/$pro_per_xl_2)|replace:'.':'-'} col-lg-{(12/$pro_per_lg_2)|replace:'.':'-'} col-md-{(12/$pro_per_md_2)|replace:'.':'-'} col-sm-{(12/$pro_per_sm_2)|replace:'.':'-'} col-{(12/$pro_per_xs_2)|replace:'.':'-'} {/capture}
  

  <div class="products product_list {if $sttheme.infinite_scroll==1} waypoint {/if}{if $for_w=='category' && $sttheme.list_grid} list {else} row grid {/if}" data-classnames="{$smarty.capture.product_gide_class}">
    {foreach $products as $index => $product}
    {assign var="curr_index" value=$index}
    {assign var="curr_iteration" value=$index+1}
    {if $for_w=="category" && $sttheme.infinite_scroll && $sttheme.from_infi}
      {$curr_index = $curr_index+$listing.pagination.items_shown_from-1}
      {$curr_iteration = $curr_iteration+$listing.pagination.items_shown_from-1}
    {/if}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_fw_2 assign=totModuloScreen}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_xxl_2 assign=totModuloLarge}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_xl_2 assign=totModuloDesktop}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_lg_2 assign=totModulo}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_md_2 assign=totModuloTablet}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_sm_2 assign=totModuloMobile}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_xs_2 assign=totModuloPortrait}
    {if $totModuloScreen == 0}{assign var='totModuloScreen' value=$pro_per_fw_2}{/if}
    {if $totModuloLarge == 0}{assign var='totModuloLarge' value=$pro_per_xxl_2}{/if}
    {if $totModuloDesktop == 0}{assign var='totModuloDesktop' value=$pro_per_xl_2}{/if}
    {if $totModulo == 0}{assign var='totModulo' value=$pro_per_lg_2}{/if}
    {if $totModuloTablet == 0}{assign var='totModuloTablet' value=$pro_per_md_2}{/if}
    {if $totModuloMobile == 0}{assign var='totModuloMobile' value=$pro_per_sm_2}{/if}
    {if $totModuloPortrait == 0}{assign var='totModuloPortrait' value=$pro_per_xs_2}{/if}
      <div class="product_list_item {if $for_w!='category' || ($for_w=='category' && !$sttheme.list_grid)} {$smarty.capture.product_gide_class} {else} clearfix {/if}
    {if $curr_iteration%$pro_per_fw_2 == 0} last-item-of-screen-line{elseif $curr_iteration%$pro_per_fw_2 == 1} first-item-of-screen-line{/if}{if $curr_iteration > ($nbLi - $totModuloScreen)} last-screen-line{/if}{if $curr_index < $pro_per_fw_2} first-screen-line{/if}
    {if $curr_iteration%$pro_per_xxl_2 == 0} last-item-of-large-line{elseif $curr_iteration%$pro_per_xxl_2 == 1} first-item-of-large-line{/if}{if $curr_iteration > ($nbLi - $totModuloLarge)} last-large-line{/if}{if $curr_index < $pro_per_xxl_2} first-large-line{/if}
    {if $curr_iteration%$pro_per_xl_2 == 0} last-item-of-desktop-line{elseif $curr_iteration%$pro_per_xl_2 == 1} first-item-of-desktop-line{/if}{if $curr_iteration > ($nbLi - $totModuloDesktop)} last-desktop-line{/if}{if $curr_index < $pro_per_xl_2} first-desktop-line{/if}
    {if $curr_iteration%$pro_per_lg_2 == 0} last-in-line{elseif $curr_iteration%$pro_per_lg_2 == 1} first-in-line{/if}{if $curr_iteration > ($nbLi - $totModulo)} last-line{/if}{if $curr_index < $pro_per_lg_2} first-line{/if}
    {if $curr_iteration%$pro_per_md_2 == 0} last-item-of-tablet-line{elseif $curr_iteration%$pro_per_md_2 == 1} first-item-of-tablet-line{/if}{if $curr_iteration > ($nbLi - $totModuloTablet)} last-tablet-line{/if}{if $curr_index < $pro_per_md_2} first-tablet-line{/if}
    {if $curr_iteration%$pro_per_sm_2 == 0} last-item-of-mobile-line{elseif $curr_iteration%$pro_per_sm_2 == 1} first-item-of-mobile-line{/if}{if $curr_iteration > ($nbLi - $totModuloMobile)} last-mobile-line{/if}{if $curr_index < $pro_per_sm_2} first-mobile-line{/if}
    {if $curr_iteration%$pro_per_xs_2 == 0} last-item-of-portrait-line{elseif $curr_iteration%$pro_per_xs_2 == 1} first-item-of-portrait-line{/if}{if $curr_iteration > ($nbLi - $totModuloPortrait)} last-portrait-line{/if}{if $curr_index < $pro_per_xs_2} first-portrait-line{/if}" style="order: {$curr_iteration};">
      {block name='product_miniature'}
        {include file='catalog/_partials/miniatures/product.tpl' product=$product}
      {/block}
      </div>
    {/foreach}
    {hook h='displayCategoryHeaderListing'}
    {hook h='displayManufacturerHeaderListing'}
    {if $page.page_name == 'prices-drop'}{hook h='displayPromotionListing'}{/if}
    {if $page.page_name == 'search'}{hook h='displaySearchListing'}{/if}
    {if $page.page_name == 'new-products'}{hook h='displayNewproductListing'}{/if}
    {if $page.page_name == 'best-sales'}{hook h='displayBestsalesListing'}{/if}
    {if $sttheme.big_next && $for_w=="category" && !$sttheme.infinite_scroll && count($listing.pagination.pages)>3 && $listing.pagination.items_shown_to<$listing.pagination.total_items}
      <div class="product_list_item {$smarty.capture.product_gide_class}
      {if $curr_iteration%$pro_per_fw_2 == 0} last-item-of-screen-line{elseif $curr_iteration%$pro_per_fw_2 == 1} first-item-of-screen-line{/if}{if $curr_iteration > ($nbLi - $totModuloScreen)} last-screen-line{/if}{if $curr_index < $pro_per_fw_2} first-screen-line{/if}
      {if $curr_iteration%$pro_per_xxl_2 == 0} last-item-of-large-line{elseif $curr_iteration%$pro_per_xxl_2 == 1} first-item-of-large-line{/if}{if $curr_iteration > ($nbLi - $totModuloLarge)} last-large-line{/if}{if $curr_index < $pro_per_xxl_2} first-large-line{/if}
      {if $curr_iteration%$pro_per_xl_2 == 0} last-item-of-desktop-line{elseif $curr_iteration%$pro_per_xl_2 == 1} first-item-of-desktop-line{/if}{if $curr_iteration > ($nbLi - $totModuloDesktop)} last-desktop-line{/if}{if $curr_index < $pro_per_xl_2} first-desktop-line{/if}
      {if $curr_iteration%$pro_per_lg_2 == 0} last-in-line{elseif $curr_iteration%$pro_per_lg_2 == 1} first-in-line{/if}{if $curr_iteration > ($nbLi - $totModulo)} last-line{/if}{if $curr_index < $pro_per_lg_2} first-line{/if}
      {if $curr_iteration%$pro_per_md_2 == 0} last-item-of-tablet-line{elseif $curr_iteration%$pro_per_md_2 == 1} first-item-of-tablet-line{/if}{if $curr_iteration > ($nbLi - $totModuloTablet)} last-tablet-line{/if}{if $curr_index < $pro_per_md_2} first-tablet-line{/if}
      {if $nbLiNext%$pro_per_sm_2 == 0} last-item-of-mobile-line{elseif $nbLiNext%$pro_per_sm_2 == 1} first-item-of-mobile-line{/if}{if $nbLiNext > ($nbLi - $totModuloMobile)} last-mobile-line{/if}{if $nbLi < $pro_per_sm_2} first-mobile-line{/if}
      {if $nbLiNext%$pro_per_xs_2 == 0} last-item-of-portrait-line{elseif $nbLiNext%$pro_per_xs_2 == 1} first-item-of-portrait-line{/if}{if $nbLiNext > ($nbLi - $totModuloPortrait)} last-portrait-line{/if}{if $nbLi < $pro_per_xs_2} first-portrait-line{/if} big_page_next_wrap" style="order: 100000">
            {foreach from=$listing.pagination.pages item="page"}
           
              {if $page.type === 'next' && $page.clickable}{if $big_next_variants == 1}
            <a href="{$page.url}" title="{l s='Next' d='Shop.Theme.Actions'}" class="big_page_next">
              <img src="{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-large_default.jpg" alt="{l s='Next' d='Shop.Theme.Actions'}" title="{l s='Next' d='Shop.Theme.Actions'}" width="{$sttheme.large_default.width}" height="{$sttheme.large_default.height}" />
              <div class="st_image_layered_description flex_center ">
                <div>{*must have*}
                  <span class="mar_r4 btn-line">{l s='Next' d='Shop.Theme.Actions'}</span>
                  <i class="fto-angle-right"></i>
                </div>
              </div>
            </a>{else}<a href="{$urls.pages.contact}" title="{l s='Contact us' d='Shop.Theme.Actions'}" class="big_page_contact">{hook h='displayButtonNextText'}{/if}
              {/if}
            {/foreach}

      </div>
    {/if}
  </div>
  {if $sttheme.infinite_scroll}<div class="hidden text-center infinite-spin"><i class="fto-spin5 animate-spin fs-xl"></i></div>{/if}