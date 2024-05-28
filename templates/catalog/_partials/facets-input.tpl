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
              {foreach from=$facet.filters key=filter_key item="filter" name=data}
              
               {if $filter.displayed}
                  <li class="facet_filter_item_li {if in_array($facet.properties.filter_custom_value, array(2,22,222))}col-lg-6 col-6{/if} {if in_array($facet.properties.filter_custom_value, array(3,33,333))}col-lg-4 col-4{/if} {if in_array($facet.properties.filter_custom_value, array(4,44,444))}col-lg-3 col-3{/if} {if in_array($facet.properties.filter_custom_value, array(6,66,666))}col-lg-2 col-2{/if} {if $facet.properties.filter_custom_value}filtr_float{/if} {if $smarty.foreach.data.iteration > $facet.properties.filter_show_limit && $facet.properties.filter_show_limit > 1 && $filter_position != 2}filtr-more{/if}">
                    <label class="facet-label checkbox-inline {if $filter.active} active {/if} flex_container flex_start" for="facet_input_{$_expand_id}_{$filter_key}">
                      {if $facet.multipleSelectionAllowed}
                      {if !in_array($facet.properties.filter_custom_value, array(22,33,44,66,11))}
                         <span class="custom-input-box {if ($filter.properties.color OR $filter.properties.texture) && $ps_tooltip_color_on > 0 && !$sttheme.is_mobile_device}tooltip_atr_{$filter_key}{/if}" {if ($filter.properties.color OR $filter.properties.texture) && $ps_tooltip_color_on > 0 && !$sttheme.is_mobile_device}data-tooltip-content="#tooltip_content_atr_{$filter_key}"{/if}>
                          <input
                            id="facet_input_{$_expand_id}_{$filter_key}"
                            data-search-url="{$filter.nextEncodedFacetsURL}"
                            type="checkbox"
                            class="custom-input"
                            {if $filter.active } checked {/if}
                          >
                          {if isset($filter.properties.color)}
                            <span class="custom-input-item custom-input-color"  style="background-color:{$filter.properties.color}"><i class="fto-ok-1 checkbox-checked"></i><i class="fto-spin5 animate-spin"></i></span>
                            {elseif isset($filter.properties.texture)}
                              <span class="custom-input-item custom-input-color texture" style="background-image:url({$filter.properties.texture})"><i class="fto-ok-1 checkbox-checked"></i><i class="fto-spin5 animate-spin"></i></span>
                            {else}
                            <span class="custom-input-item custom-input-checkbox {if !$js_enabled} ps-shown-by-js {/if}"><i class="fto-ok-1 checkbox-checked"></i><i class="fto-spin5 animate-spin"></i></span>
                          {/if}
                          
                            
                          
                          
                        </span>
                        {/if}
                      {else}
                      {if !in_array($facet.properties.filter_custom_value, array(22,33,44,66,11))}
                        <span class="custom-input-box">
                          <input
                            id="facet_input_{$_expand_id}_{$filter_key}"
                            data-search-url="{$filter.nextEncodedFacetsURL}"
                            type="radio"
                            class="custom-input "
                            name="filter {$facet.label}"
                            {if $filter.active } checked {/if}
                          >
                          <span class="custom-input-item custom-input-radio {if !$js_enabled} ps-shown-by-js {/if}"><i class="fto-ok-1 checkbox-checked"></i><i class="fto-spin5 animate-spin"></i></span>
                        </span>
                        {/if}
                      {/if}
                      {if !in_array($facet.properties.filter_custom_value, array(111,222,333,444,666))}
                      <a
                        href="{$filter.nextEncodedFacetsURL}"
                        class="_gray-darker search-link js-search-link flex_child {if ($filter.properties.color OR $filter.properties.texture) && $ps_tooltip_color_on > 0 && !$sttheme.is_mobile_device}tooltip_atr_{$filter_key}{/if}"
                        rel="nofollow"
                        {if ($filter.properties.color OR $filter.properties.texture) && $ps_tooltip_color_on > 0 && !$sttheme.is_mobile_device}data-tooltip-content="#tooltip_content_atr_{$filter_key}"{/if}
                      >
                        {$filter.label} 
                        {if $filter.magnitude && (!isset($ps_layered_show_qties) || (isset($ps_layered_show_qties) && $ps_layered_show_qties==1))}
                          <span class="magnitude">({$filter.magnitude})</span>
                        {/if}
                      </a> {/if}
                    </label>
                  </li>
     
                  
                {/if}
                
                
                {if $smarty.foreach.data.iteration > $facet.properties.filter_show_limit && $facet.properties.filter_show_limit > 1 && $smarty.foreach.data.last && $filter_position != 2}
                 <div class="more_filtr" ><i class="fto-plus-2"></i> {l s='More filters' d='Shop.Theme.Transformer'} <span>({$smarty.foreach.data.iteration-$facet.properties.filter_show_limit})</span></div>
                 {/if}
              
                
                {if ($filter.properties.color OR $filter.properties.texture) && $ps_tooltip_color_on > 0 && !$sttheme.is_mobile_device}
                           <div class="tooltip_templates">
                              <span id="tooltip_content_atr_{$filter_key}">
                              {if $ps_tooltip_color_on == 1 || $ps_tooltip_color_on == 3}<span class="{if $ps_tooltip_color_on == 3}filter_label_absolute{/if}">{$filter.label} {if $filter.magnitude && (!isset($ps_layered_show_qties) || (isset($ps_layered_show_qties) && $ps_layered_show_qties==1))}
                          <span class="magnitude">({$filter.magnitude})</span>{/if}</span>{/if}
                           {if $ps_tooltip_color_on == 2 || $ps_tooltip_color_on == 3}<div style="{if isset($filter.properties.color)}background-color:{$filter.properties.color}{elseif isset($filter.properties.texture)}background-image:url({$filter.properties.texture});background-repeat:no-repeat; background-size: cover{/if}; width: {if $width_size}{$width_size}{else}60{/if}px; height: {if $height_size}{$height_size}{else}60{/if}px;"></div>{/if}
                            </span>
                            </div>
               {/if}         
                
              {/foreach}