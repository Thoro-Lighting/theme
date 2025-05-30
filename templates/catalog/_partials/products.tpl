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

<div id="js-product-list">
  {if in_array('layout-left-column', array_keys($page.body_classes))}
    {include file='catalog/_partials/miniatures/list-item-2-columns.tpl' products=$listing.products}
  {elseif in_array('layout-right-column', array_keys($page.body_classes))}
    {include file='catalog/_partials/miniatures/list-item-2-columns.tpl' products=$listing.products}
  {elseif in_array('layout-full-width', array_keys($page.body_classes))}
    {include file='catalog/_partials/miniatures/list-item.tpl' products=$listing.products}
  {elseif in_array('layout-both-columns', array_keys($page.body_classes))}
    {include file='catalog/_partials/miniatures/list-item-3-columns.tpl' products=$listing.products}
  {/if} 


  {block name='pagination'}
    {if $sttheme.infinite_scroll}
        {include file='_partials/pagination-infinite.tpl' pagination=$listing.pagination st_current_url=$listing.current_url}
    {else}
        {include file='_partials/pagination.tpl' pagination=$listing.pagination}
    {/if}
  {/block}
  
</div>