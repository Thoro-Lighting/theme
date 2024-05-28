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
{nocache}{strip}
{if is_array($facets) && count($facets)}
  {assign var=has_facets value=false}
  {foreach from=$facets item="facet"}
    {if $facet.displayed}
    {$has_facets = true}
    {break}
    {/if}
  {/foreach}
 {if $has_facets}
 {assign var='filter_position' value=Configuration::get('STSN_FILTER_POSITION')}
  {assign var='filter_position_mobile' value=Configuration::get('STSN_FILTER_POSITION_MOBILE')}
  {assign var='collapsing_filter' value=Configuration::get('STSN_COLLAPSING_FILTER')}
  {assign var='ps_layered_show_button' value=Configuration::get('PS_LAYERED_SHOW_BUTTON')}
  {assign var='ps_tooltip_color_on' value=Configuration::get('PS_TOOLTIP_COLOR_ON')}
  {assign var='width_size' value=Configuration::get('PSFS_WIDTH_SIZE')}
  {assign var='height_size' value=Configuration::get('PSFS_HEIGHT_SIZE')}
  <div id="search_filters" {if $collapsing_filter == 1}class="collaps_filter"{/if} data-tooltip-color="{$ps_tooltip_color_on}">
  
  
  {if $sttheme.is_mobile_device && !$filter_position_mobile }
  
  <div class="top_filter_nav">
	<div class="btn-line close_count"><a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}">{l s='Show results' d='Shop.Theme.Actions'}:</a>
    <div class="filter_count"></div></div>
    <div class="active_filters">
    <span>{l s='Clear all' d='Shop.Theme.Actions'} <i class="fto-cancel-2"></i></span>
	<a href="javascript:;" data-search-url="{$clear_all_link}" class="js-search-filters-clear-all active_filter_item" title="{l s='Clear all' d='Shop.Theme.Actions'}">
	{l s='Clear all' d='Shop.Theme.Actions'}
	<i class="fto-cancel-2"></i>
	</a>
	</div>
	</div>
	{/if}
	
      {*<span class="sticky_facet_title">{l s='Filter By' d='Shop.Theme.Actions'}</span>*}
      {foreach from=$facets item="facet"}
      {if $facet.displayed}
        <section class="facet clearfix {$facet.properties.filter_custom_value} {if in_array($facet.properties.filter_custom_value, array(22,33,44,66,11))}tags_filter{/if} {if in_array($facet.properties.filter_custom_value, array(1))}filtr_margin{/if} {if in_array($facet.properties.filter_custom_value, array(222,333,444,666))}filter_color{/if} style_{$facet.widgetType} type_{$facet.type}">
          {assign var=_expand_id value=10|mt_rand:100000}
          {assign var=_collapse value=true}
          {foreach from=$facet.filters item="filter"}
            {if $filter.active}{assign var=_collapse value=false}{/if} 
          {/foreach}
          
          
                   
          {if (!$sttheme.is_mobile_device && ($filter_position==2 || $filter_position==3)) OR ($sttheme.is_mobile_device && ($filter_position_mobile==2 || $filter_position_mobile==3)) OR ($filter_position==4 && $facet.widgetType == dropdown && !$sttheme.is_mobile_device) OR ($filter_position_mobile==4  && $facet.widgetType == dropdown && $sttheme.is_mobile_device) OR (!$filter_position && $facet.widgetType == dropdown && !$sttheme.is_mobile_device) OR (!$filter_position_mobile  && $facet.widgetType == dropdown && $sttheme.is_mobile_device) }
            <div class="dropdown_wrap facet_dropdown_item">
              <div class="dropdown_tri dropdown_tri_in flex_container flex_space_between link_color" aria-haspopup="true" aria-expanded="false">
                  <span>{$facet.label}</span>
                  <i class="fto-angle-down arrow_down arrow"></i>
                  <i class="fto-angle-up arrow_up arrow"></i>
              </div>
              <div class="dropdown_list" aria-labelledby="{$facet.label}">
                  <div class="facet-title-mobile toggle_btn {if $_collapse} collapsed {/if} {if $facet.properties.filter_show_limit == 1}collap_default{/if}" {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}data-target="#facet_{$_expand_id}"{/if} data-toggle="collapse" aria-expanded="{if $_collapse}false{else}true{/if}">
                    <div class="flex_container flex_space_between">
                      <span class="facet-title-mobile-inner">{$facet.label}:</span>
                     {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}<i class="fto-angle-down arrow_down arrow"></i>
                      <i class="fto-angle-up arrow_up arrow"></i>{/if}
                    </div>
                  </div>
                 {if $facet.widgetType !== 'dropdown'}
                    {block name='dropdown_facet_item_other'}
                    {if ((isset($price_range_slider) && $price_range_slider && $facet.type=='price') || (isset($weight_range_slider) && $weight_range_slider && $facet.type=='weight') || $facet.widgetType=='rangeslider') &&  count($facet.filters)}
                    <div class="st-range-box {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}collapse{/if}{if !$_collapse} in{/if} st-noUi-style-{$range_style} facet_filter_box" id="facet_{$_expand_id}">
                      {include file='catalog/_partials/facets-range-slider.tpl'}
                    </div>
                    {else}
                    
                       <ul id="facet_{$_expand_id}" class="facet_filter_box {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}collapse{/if}{if !$_collapse} in{/if}">
                      {include file='catalog/_partials/facets-input.tpl'}
                    </ul>
                    {/if}
                    {/block}
                  {else}
                  
                   {if ($filter_position==4 && $facet.widgetType == dropdown ) OR ($filter_position_mobile==4 && $facet.widgetType == dropdown) OR (!$filter_position && $facet.widgetType == dropdown ) OR (!$filter_position_mobile && $facet.widgetType == dropdown)}
                    <ul id="facet_{$_expand_id}" class="facet_filter_box {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}collapse{/if}{if !$_collapse} in{/if}">
                      {include file='catalog/_partials/facets-input-sidebar.tpl'}
                    </ul>
                    {else}
                    {block name='dropdown_facet_item_dropdown'}
                    <div id="facet_{$_expand_id}" class="facet_filter_box {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}collapse{/if}{if !$_collapse} in{/if}">
                      {include file='catalog/_partials/facets-select.tpl'}
                    </div>
                    {/block}
                    {/if}
                  {/if}

                  {*if !empty($ps_layered_show_button) && $facet.widgetType !== 'dropdown' && $facet.widgetType !== 'rangeslider' && $facet.multipleSelectionAllowed}
                    {include file='catalog/_partials/facets-buttons.tpl'}
                  {/if*}
              </div>
            </div>
          {else}  
            <div class="facet-title hidden-md-down"><span>{$facet.label}:</span></div>
            <div class="facet-title-mobile toggle_btn hidden-lg-up {if $_collapse} collapsed {/if} {if $facet.properties.filter_show_limit == 1}collap_default{/if}" {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}data-target="#facet_{$_expand_id}"{/if} data-toggle="collapse" aria-expanded="{if $_collapse}false{else}true{/if}">
              <div class="flex_container flex_space_between">
                <span class="facet-title-mobile-inner">{$facet.label}:</span>
                {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}<i class="fto-angle-down arrow_down arrow"></i>
                <i class="fto-angle-up arrow_up arrow"></i>{/if}
              </div>
            </div>
            {if $facet.widgetType !== 'dropdown'}
              {block name='facet_item_other'}
              {if ((isset($price_range_slider) && $price_range_slider && $facet.type=='price') || (isset($weight_range_slider) && $weight_range_slider && $facet.type=='weight') || $facet.widgetType=='rangeslider') &&  count($facet.filters)}
              <div class="st-range-box {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}collapse{/if}{if !$_collapse} in{/if} st-noUi-style-{$range_style} facet_filter_box" id="facet_{$_expand_id}">
                  {include file='catalog/_partials/facets-range-slider.tpl'}
              </div>
              {else}
              <ul id="facet_{$_expand_id}" class="facet_filter_box {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}collapse{/if}{if !$_collapse} in{/if}">
                {include file='catalog/_partials/facets-input.tpl'}
              </ul>
              {/if}
              {/block}
            {else}
              {block name='facet_item_dropdown'}
              <div id="facet_{$_expand_id}" class="facet_filter_box {if $filter_position_mobile && $filter_position_mobile !=4  || !$sttheme.is_mobile_device}collapse{/if}{if !$_collapse} in{/if}">
                {include file='catalog/_partials/facets-select.tpl'}
              </div>
              {/block}
            {/if}
          {/if}
        </section>
      {/if}
    {/foreach}
   
  </div>
  {/if}
{/if}
{/strip}{/nocache}

