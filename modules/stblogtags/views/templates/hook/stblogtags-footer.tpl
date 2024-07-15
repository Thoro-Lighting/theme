{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{assign var='tags_align' value=Configuration::get('ST_BLOG_TAGS_ALIGN')}
{assign var='tags_title_align' value=Configuration::get('ST_BLOG_TAGS_TITLE_ALIGN')}


<div id="blog_tags_block" class="block tags_block footer_blog col-lg-12">
{if $tags_title_align != 3}
    <div class="title_block flex_container title_align_{$tags_title_align} title_style_{(int)$stblog.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner">{l s='Popular tags' d='Shop.Theme.Transformer'}</div>
        <div class="flex_child title_flex_right"></div>
    </div>
    {/if}
	<div class="block_content tags_wrap {if $tags_align == 0}text-1{elseif $tags_align == 1}text-2{elseif $tags_align == 2}text-3{/if}">
    {if $tags}
        {foreach $tags as $tag}
    		<a href="{url entity='module' name='stblogsearch' controller='default' params=['stb_search_query' => $tag.name]}" title="{l s='More about' d='Shop.Theme.Transformer'} {$tag.name}" class="{$tag.class} {if $tag@last}last_item{elseif $tag@first}first_item{else}item{/if}">{$tag.name}</a>
    	{/foreach}
    {else}
    	{l s='No tags' d='Shop.Theme.Transformer'}
    {/if}
	</div>
</div>