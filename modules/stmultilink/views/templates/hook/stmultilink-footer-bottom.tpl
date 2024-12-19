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
<section id="multilink_{$link_group.id_st_multi_link_group}" class="{if $link_group.classplus != 1}footer_bottom_stlinkgroups_plus_{$link_group.classplus}{/if} stlinkgroups_links_footer_bottom {if $link_group.hide_on_mobile == 1} hidden-xs {elseif $link_group.hide_on_mobile==2} st_open{/if}">
    <ul class="li_fl clearfix custom_links_list">
    {if $link_group['links']}
    {foreach $link_group['links'] as $link}
    {if ($link.pagename == registration && $customer.is_logged)
      OR ($link.pagename == authentication && $customer.is_logged)
      OR ($link.pagename == logoff && !$customer.is_logged)}{else}
    	<li {if strpos($link.url, $smarty.server.REQUEST_URI) !== false} class="current"{/if}>
            {include file="module:stmultilink/views/templates/hook/stmultilink-item.tpl"}
    	</li>
    	{/if}
    {/foreach}
    {/if}
    </ul>
</section>
{/foreach}
