{*
* 2007-2016 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if $easy_content|@count > 0}
    {foreach $easy_content as $ec}
        <section id="easycontent_{$ec.id_st_easy_content}"
            class="{if $ec.hide_on_mobile == 1} hidden-md-down {elseif $ec.hide_on_mobile == 2} hidden-lg-up {/if} easycontent {if $ec.privat_css}privat_easy_{$ec.privat_css}{/if} {if !$ec.is_stacked_footer}col-lg-{if $ec.span}{$ec.span}{/if}{/if} footer_block block {if $ec.hide_on_mobile==4} st_open{/if} {if $ec.height_full_zone == 1}flex_container full_height{/if}">
            {if $ec.title && $ec.title_align!=3}
                <div class="title_block">
                    {if $ec.url}<a href="{$ec.url}" class="title_block_inner" title="{$ec.title}">
                    {else}<div
                            class="title_block_inner">{/if}
                            {$ec.title}
                            {if $ec.url}</a>{else}</div>{/if}
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
            <div
                class="style_content footer_block_content {if !$ec.title} keep_open{/if}  {if $ec.width} width_{$ec.width} {/if}">
                {if $ec.text}<div class="easy_brother_block text-{$ec.text_align} text-md-{$ec.mobile_text_align}">
                    {$ec.text nofilter}</div>{/if}
                {if isset($ec.columns) && count($ec.columns)}{include file="module:steasycontent/views/templates/hook/steasycontent-columns.tpl" columns=$ec.columns}{/if}
            </div>
        </section>
    {/foreach}
{/if}