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
<div class="pcomments_item line_item align_pc_{$home_cooments_align}">

{if $home_img == 1}<div class="mb-2">
  <a href="{$node.product.url}" title="{$node.product.name}"><img src="{$node.product.cover.bySize.medium_default.url}" width="{$node.product.cover.bySize.medium_default.width}" height="{$node.product.cover.bySize.medium_default.height}" alt="{if !empty($node.product.cover.legend)}{$node.product.cover.legend}{else}{$node.product.name}{/if}" class="" /></a>
</div>{/if}

{if $home_name_pr ==1}<h3 class="s_title_block nohidden"><a href="{$node.product.url}" title="{$node.product.name}" class="{if $home_cooments_hover == 1}btn-line{elseif $home_cooments_hover == 2}btn-line-under{/if}">{$node.product.name}</a></h3>{/if}
{if $home_star_pr == 1}{include file='module:stproductcomments/views/templates/hook/rating_box.tpl' averageTotal=$node.grade classname="mb-2 fs_lg" g_rich_snippets=false}{/if}
{if $node.tags && $home_tag_pr == 1}
<div class="tags_block">
    {foreach $node.tags as $tag}
    <span class="tag_item">{$tag.name nofilter}</span>
    {/foreach}
</div>
{/if}
{if $home_cooments > 0}<div class="mb-2 fs_md comment_text {if $home_cooments == 1}blockquote_1{/if}"><p>{if $home_cooments_lenght == 0}{$node.content|nl2br nofilter}{elseif $home_cooments_lenght == 1}{$node.content|truncate:50:'...'}{elseif $home_cooments_lenght == 2}{$node.content|truncate:120:'...'}{/if}</p></p></div>{/if}
<div>{if $home_cust_add == 1}<span class="mr-2 pc_testi_author">{l s='By' d='Shop.Theme.Transformer'}: {$node.customer_name}</span>{/if}{if $home_date_add == 1}<span class="pc_testi_date">{include file='module:stproductcomments/views/templates/hook/timeago.tpl' timeago=$node.timeago date_add=$node.date_add}</span>{/if}</div>
</div>