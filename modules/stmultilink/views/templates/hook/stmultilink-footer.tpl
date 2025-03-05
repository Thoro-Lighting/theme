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

{foreach $link_groups as $link_group}
    <section id="multilink_{$link_group.id_st_multi_link_group}"
        class="{if $link_group.classplus != 1}footer_stlinkgroups_plus_{$link_group.classplus}{/if} stlinkgroups_links_footer {if !$link_group.is_stacked_footer}col-lg-{if $link_group.span}{$link_group.span}{else}3{/if}{/if} footer_block block {if $link_group.hide_on_mobile==1} hidden-md-down {elseif $link_group.hide_on_mobile==2 || !$link_group.name} st_open{/if}">
        {if $link_group.name}
            <div class="title_block {if $link_group.link_align} text-center {/if}">
                {if $link_group.url}<a href="{$link_group.url}" class="title_block_inner"
                        title="{$link_group.name|strip_tags:false}" {if isset($link_group.nofollow) && $link_group.nofollow}
                            rel="nofollow" {/if} {if isset($link_group.new_window) && $link_group.new_window} target="_blank"
                        {/if}>
                        {else}<div class="title_block_inner">
                        {/if}
                            {if $link_group.icon_class}<i
                                class="{$link_group.icon_class} st_custom_link_icon icon-mar-r4"></i>{/if}{$link_group.name nofilter}
                            {if $link_group.tooltip_group == 1 && $link_group.tooltip_text}<span
                                    class="tooltip_{$link_group.id_st_multi_link_group}"
                                    data-tooltip-content="#tooltip_content_{$link_group.id_st_multi_link_group}"><i
                                    class="fto-info-circled"></i></span>{/if}
                            {if $link_group.url}</a>{else}</div>{/if}
                <div class="opener">
                    <div class="plus_sign"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 1L7 13M13 7L1 7" stroke="#FBFAF8" stroke-width="1.25" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="minus_sign"><svg width="14" height="14" viewBox="0 0 14 2" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 1L1 1" stroke="#FBFAF8" stroke-width="1.25" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                </div>
            {/if}
            <ul class="footer_block_content bullet custom_links_list {if $link_group.link_align} text-center {/if}">
                {if $link_group['links']}
                    {foreach $link_group['links'] as $link}
                        {if ($link.pagename == registration && $customer.is_logged)
                      OR ($link.pagename == authentication && $customer.is_logged)
                  OR ($link.pagename == logoff && !$customer.is_logged)}{else}
                        <li {if strpos($link.url, $smarty.server.REQUEST_URI) !== false} class="current" {/if}>
                            {include file="module:stmultilink/views/templates/hook/stmultilink-item.tpl"}
                        </li>
                    {/if}
                {/foreach}
            {/if}
        </ul>
    </section>
    {if $link_group.tooltip_group == 1 && $link_group.tooltip_text}
        <div class="tooltip_templates">
            <span id="tooltip_content_{$link_group.id_st_multi_link_group}">
                {$link_group.tooltip_text nofilter}
            </span>
        </div>
        <script>
            window.addEventListener('load', function(event) {
            $('.tooltip_{$link_group.id_st_multi_link_group}').tooltipster({
            animation: '{if $link_group.tooltip_efect == 0}fade{elseif $link_group.tooltip_efect == 1}grow{else}swing{/if}',
            delay: 200,
            {if $link_group.distance_tooltip} distance: {$link_group.distance_tooltip},{/if}
            {if $link_group.maxwidth_tooltip} maxWidth: {$link_group.maxwidth_tooltip},{/if}
            side: '{if $link_group.tooltip_side == 0}left{elseif $link_group.tooltip_side == 1}right{elseif $link_group.tooltip_side == 2}top{else $link_group.tooltip_side == 3}bottom{/if}',
            theme: '{if $link_group.tooltip_theme == 1}tooltipster-black{else}tooltipster{/if}',
            trigger: '{if $link_group.tooltip_open == 1}click{else}hover{/if}'
            });
            });
        </script>
    {/if}
{/foreach}