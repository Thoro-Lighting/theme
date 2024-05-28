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
{*this file is loaded before the theme editor module*}
{assign var='filter_position' value=Configuration::get('STSN_FILTER_POSITION')}
{assign var='filter_position_mobile' value=Configuration::get('STSN_FILTER_POSITION_MOBILE')}
<div id="js-active-search-filters" class="type_filter_{if $filter_position}{$filter_position}{else}0{/if} type_filter_mobile_{$filter_position_mobile} active_filters_box flex_container flex_start {if (!$filter_position && !$activeFilters|count && !$sttheme.is_mobile_device)} hidden-xs-up {/if}">
    {if ($filter_position == 2 && !$sttheme.is_mobile_device) || ($filter_position == 3 && !$sttheme.is_mobile_device) || ($filter_position_mobile == 2 && $sttheme.is_mobile_device) || ($filter_position_mobile == 3 && $sttheme.is_mobile_device)}{block name='active_filters_title'}<span class="active_filter_title font-weight-bold">{l s='Filter By' d='Shop.Theme.Actions'}</span>{/block}{/if}
    
   
    
    <div class="flex_child">
      <div class="active_filters {if $activeFilters|count}open_filters{/if}">
		{if $activeFilters|count}
	      	<a href="javascript:;" data-search-url="{$clear_all_link}" class="js-search-filters-clear-all active_filter_item" title="{l s='Clear all' d='Shop.Theme.Actions'}">
		        {l s='Clear all' d='Shop.Theme.Actions'}
		        <i class="fto-cancel-2"></i>
	      	</a>
	      {foreach from=$activeFilters name=data item="filter"}
          {block name='active_filters_item'}
          {if $smarty.foreach.data.iteration le 2}
          <a class="js-search-link active_filter_item sticky" href="{$filter.nextEncodedFacetsURL}" title="{$filter.label}">{l s='%1$s: ' d='Shop.Theme.Catalog' sprintf=[$filter.facetLabel]} {$filter.label}<i class="fto-cancel-2"></i></a>
           {/if}
           {if $smarty.foreach.data.last && $smarty.foreach.data.iteration > 2}<span class="sticky_plus">+ {$smarty.foreach.data.iteration - 2} {l s='more' d='Shop.Theme.Transformer'}</span>{/if}
          
           <a class="js-search-link active_filter_item" href="{$filter.nextEncodedFacetsURL}" title="{$filter.label}">{l s='%1$s: ' d='Shop.Theme.Catalog' sprintf=[$filter.facetLabel]} {$filter.label}<i class="fto-cancel-2"></i></a>
         
          
          {/block}
	      {/foreach}
	      
	      	      
		{/if}
		
		</div>
    </div>
    
     {if ($filter_position==4 && !$sttheme.is_mobile_device && $sttheme.filter_sticky > 1) OR ($filter_position_mobile==4 && $sttheme.is_mobile_device && ($sttheme.filter_sticky == 1 OR $sttheme.filter_sticky == 3))}
      <a id="rightbar_facet_search" data-name="side_facets" data-direction="open_bar_right" href="javascript:;" class="mobile_bar_tri" rel="nofollow" title="{l s='Filter By' d='Shop.Theme.Actions'}">
        <i class="fto-angle-down"></i> {l s='Filter By' d='Shop.Theme.Actions'} (<span class="filter_count"></span>)</a>
   {/if}
   
     
     {if (!empty($listing.rendered_facets) && !$filter_position && $sttheme.slide_lr_column && !$sttheme.is_mobile_device) OR (!empty($listing.rendered_facets) && !$filter_position_mobile && $sttheme.slide_lr_column && $sttheme.is_mobile_device)}
     
      <a href="javascript:;" id="search_filter_toggler" data-name="left_column" data-direction="open_column" class="mobile_bar_tri hidden-lg-up" title="{l s='Filter' d='Shop.Theme.Actions'}"><i class="fto-angle-down"></i> {l s='Filter By' d='Shop.Theme.Actions'} (<span class="filter_count"></span>)</a><!--to do how to know filters are in left column or right column-->
      
    {/if}
    
    {if ($filter_position>0 && $filter_position != 4 && !$sttheme.is_mobile_device) OR ($filter_position_mobile>0 && $filter_position_mobile != 4 && $sttheme.is_mobile_device)}
    <a class="toggle_btn active_filter_item {if $filter_position>1 && !$sttheme.is_mobile_device} st_show_on_mobile{/if} {if $filter_position_mobile>1 && $sttheme.is_mobile_device}st_show_on_mobile collapsed{/if} " data-toggle="collapse" href="#horizontal_filters" aria-expanded="{if $filter_position>1}false{else}true{/if}" aria-controls="horizontal_filters" title="{l s='Toggle filters' d='Shop.Theme.Transformer'}">
     <span>{l s='Toggle filters' d='Shop.Theme.Transformer'} (<span class="filter_count"></span>)</span>
      <i class="fto-angle-down"></i>
    </a>
    {/if}

    
    
    
  </div>
