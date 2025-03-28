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
{assign var='is_product_page' value=true}
{assign var='pagi_class' value='js-search-link'}
{if isset($is_blog_fengye)}
  {if (int)$is_blog_fengye==2}
    {$pagi_class='pc-search-link'}
  {else}
    {$is_product_page=false}
  {/if}
{/if}
{if count($pagination.pages) > 1}
<nav class="bottom_pagination flex_box flex_space_between mb-3 {if $pagination.pages[count($pagination.pages)-1].page==1} only_one_page{/if}">
  
  {assign var='product_count' value=Configuration::get('STSN_PRODUCT_COUNT')}
  {assign var='product_count_mobile' value=Configuration::get('STSN_PRODUCT_COUNT_MOBILE')}
    {if ($product_count == 1 && !$sttheme.is_mobile_device) OR ($product_count_mobile == 1 && $sttheme.is_mobile_device)}
  <div class="product_count" data-total="{$pagination.total_items}">
    {block name='pagination_summary'}
    {l s='Showing %from%-%to% of %total% item(s)' d='Shop.Theme.Catalog' sprintf=['%from%' => $pagination.items_shown_from ,'%to%' => $pagination.items_shown_to, '%total%' => $pagination.total_items]}
    {/block}
  </div>
  {/if}
  
  {assign var='pagination_bottom' value=Configuration::get('STSN_PAGINATION_BOTTOM')}
  {assign var='pagination_bottom_mobile' value=Configuration::get('STSN_PAGINATION_BOTTOM_MOBILE')}
   {if ($pagination_bottom == 1 && !$sttheme.is_mobile_device) OR ($pagination_bottom_mobile == 1 && $sttheme.is_mobile_device)}
  <nav aria-label="Page navigation">
    {block name='pagination_page_list'}
    <ul class="pagination">
      {foreach from=$pagination.pages item="page"}
        <li class="page-item {if $page.current} active {/if} {['disabled' => !$page.clickable]|classnames}">
          {if $page.type === 'spacer'}
            <span class="spacer">&hellip;</span>
          {else}
            <a
              rel="{if $page.type === 'previous'}prev{elseif $page.type === 'next'}next{else}nofollow{/if}"
              href="{$page.url}"
              class="page-link {if $page.type === 'previous'}previous {elseif $page.type === 'next'}next {/if}{['disabled' => !$page.clickable, $pagi_class => $is_product_page]|classnames}"
              {if $page.type === 'previous'} aria-label="Previous" {elseif $page.type === 'next'} aria-label="Next" {/if}
            >
              {if $page.type === 'previous'}
                <svg width="48" height="14" viewBox="0 0 48 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 12.8652L0.9987 7.12625M0.9987 7.12625L7.5 1.18261M0.9987 7.12625L46.5 7.12626" stroke="#3D4C99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="sr-only">{l s='Previous' d='Shop.Theme.Actions'}</span>
              {elseif $page.type === 'next'}
                <svg width="48" height="14" viewBox="0 0 48 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M40 1.18262L47.0013 6.92159M47.0013 6.92159L40.5 12.8652M47.0013 6.92159H1.5" stroke="#3D4C99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="sr-only">{l s='Next' d='Shop.Theme.Actions'}</span>
              {else}
                {$page.page}
              {/if}
            </a>
          {/if}
        </li>
      {/foreach}
    </ul>
    {/block}
  </nav>
  {/if}
</nav>
{/if}
