{*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}

<a href="{if $link.pagename == registration}{$urls.pages.register}{elseif $link.pagename == logoff}{$urls.actions.logout}{else}{if $link.url}{$link.url}{else}javascript:;{/if}{/if}" class="{if $link.classpluslink != 1}stlinkgroups_plus_{$link.classpluslink}{/if} dropdown_list_item {if isset($link_extra_classes)} {$link_extra_classes} {/if}" title="{$link.title|strip_tags:false}" {if isset($link.nofollow) && $link.nofollow} rel="nofollow" {/if} {if $link.new_window} target="_blank" {/if}>
    {if $link.icon_class}<i class="{$link.icon_class} {if $link.label} list_arrow {/if} st_custom_link_icon"></i>{/if}<span class="multilink_span {if $link.border_hover == 1}btn-line{elseif $link.border_hover == 2}btn-line-under{/if}">{$link.label nofilter}</span>
</a>
{if $link.tooltip_group == 1 && $link.tooltip_text}<span class="tooltip_{$link.id_st_multi_link}" data-tooltip-content="#tooltip_content_{$link.id_st_multi_link}"><i class="fto-info-circled"></i></span>{/if}
         
    {if $link.tooltip_group == 1 && $link.tooltip_text}
<div class="tooltip_templates">
    <span id="tooltip_content_{$link.id_st_multi_link}">
       {$link.tooltip_text nofilter}
    </span>
</div>
<script>
    window.addEventListener('load', function(event) {
        $('.tooltip_{$link.id_st_multi_link}').tooltipster({
    	   animation: '{if $link.tooltip_efect == 0}fade{elseif $link.tooltip_efect == 1}grow{else}swing{/if}',
    	   delay: 200,
    	   {if $link.distance_tooltip} distance: {$link.distance_tooltip},{/if}
    	   {if $link.maxwidth_tooltip} maxWidth: {$link.maxwidth_tooltip},{/if}
    	   side: '{if $link.tooltip_side == 0}left{elseif $link.tooltip_side == 1}right{elseif $link.tooltip_side == 2}top{else $link.tooltip_side == 3}bottom{/if}',
    	   theme: '{if $link.tooltip_theme == 1}tooltipster-black{else}tooltipster{/if}',
    	   trigger: '{if $link.tooltip_open == 1}click{else}hover{/if}'
    	});
    });
</script>
{/if}