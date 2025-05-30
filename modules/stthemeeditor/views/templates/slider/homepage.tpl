
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
{*similar files homepage.tpl stblogfeaturedarticles/views/templates/hook/home.tpl stproductcategoriesslider.tpl stproductcategoriesslider_tab.tpl stfeaturedcategories.tpl ps_crossselling.tpl  ps_categroyproduct.tpl steasycontent-element-6.tpl pcomments_slider.tpl*}
{assign var="pro_or_blog_slider" value=0}
{if isset($products) && $products}{$pro_or_blog_slider=1}{/if}
{if isset($blogs) && $blogs}{$pro_or_blog_slider=2}{/if}
{if isset($homeverybottom) && $homeverybottom && !$pro_per_fw}{assign var="bu_full_width" value=true}{else}{assign var="bu_full_width" value=false}{/if}
{assign var="column_fix" value=""}
{if isset($column_slider) && $column_slider}{$column_fix="_column"}{/if}
{if $title_position==3 && $direction_nav==1}{$direction_nav=5}{/if}
{if $pro_or_blog_slider || (isset($aw_display) && $aw_display)}
<div id="{$module}_container_{$hook_hash}" class="{$module}_container {if $hide_mob} hidden-xs {/if} block {if $pro_or_blog_slider==1 && $countdown_on} s_countdown_block {/if} {if !$column_fix && $has_background_img && $speed} st_parallax_block {/if} products_container{$column_fix} {if $column_slider && !isset($is_quarter)} column_block {/if} {if !$column_fix && $video_mpfour} video_bg_block {/if}" 
{if !$column_fix && $has_background_img && $speed} data-stellar-background-ratio="{$speed}" {if $bg_img_v_offset} data-stellar-vertical-offset="{(int)$bg_img_v_offset}"{/if} {/if}
{if !$column_fix && $video_mpfour} data-vide-bg="mp4: {$video_mpfour}{if $video_webm}, webm: {$video_webm}{/if}{if $video_ogg}, ogv: {$video_ogg}{/if}{if $video_poster}, poster: {$video_poster}{/if}" data-vide-options="loop: {if $video_loop}true{else}false{/if}, muted: {if $video_muted}true{else}false{/if}, position: 50% {(int)$video_v_offset}%" {/if}>
{if $bu_full_width}<div class="wide_container">{/if}
{if isset($homeverybottom) && $homeverybottom}<div class="{if $bu_full_width}container{else}container-fluid{/if}">{/if}
<section class="products_section" >
    {if isset($title_io) && $title_io}
        {if $title_position!=3}{include file="module:stthemeeditor/views/templates/slider/heading.tpl"}{/if}
        {if isset($custom_content) && $custom_content}{$custom_content.1.content nofilter}{/if}
    {/if}
    <div class="row flex_lg_container flex_stretch">
        {if isset($custom_content) && $custom_content && $custom_content.10.width}
            {$custom_content.10.content nofilter}
        {/if}
        <div class="col-lg-{if isset($custom_content) && $custom_content}{12-$custom_content.10.width-$custom_content.30.width}{else}12{/if} {if $display_as_grid==1} display_as_grid {elseif $display_as_grid==2} display_as_simple {/if} products_slider"> <!-- to do what if the sum of left and right contents larger than 12 -->
    
    {if !isset($title_io) || !$title_io}
        {if $title_position!=3}{include file="module:stthemeeditor/views/templates/slider/heading.tpl"}{/if}
        {if isset($custom_content) && $custom_content}{$custom_content.1.content nofilter}{/if}
    {/if}

        {if $pro_or_blog_slider==1}
            {if !$display_as_grid || $column_slider}
            <div class="block_content">
                {include file="catalog/slider/product-slider.tpl"}
            </div>
            {include file="catalog/slider/script.tpl" block_name="#{$module}_container_{$hook_hash}"}
            {elseif $display_as_grid==2}
                {include file="catalog/listing/product-list-simple.tpl" for_f="{$module}"}
            {else}
                {include file="catalog/_partials/miniatures/list-item.tpl" class="{$module}_grid" for_f="{$module}"}
            {/if}
    	{elseif $pro_or_blog_slider==2}
            {if !$display_as_grid || $column_slider}
            <div class="block_content">
                {include file="module:stblog/views/templates/slider/slider-recent.tpl"}
            </div>
            {include file="catalog/slider/script.tpl" block_name="#{$module}_container_{$hook_hash}" is_product_slider=0}
            {else}
                {include file="module:stblog/views/templates/slider/list-item-recent.tpl" for_f="{$module}" }
            {/if}
        {/if}
        {if $pro_or_blog_slider}
            {if isset($view_more) && $view_more == 1 && ((isset($title_link) && $title_link) || (isset($url_entity) && $url_entity))}<div class="product_view_more_box more_align_desk_{$view_more_align_desk} more_align_mobile_{$view_more_align_mobile} {if $view_more_align_desk == 3}hidden-lg-up-991{/if} {if $view_more_align_mobile == 3}hidden-sm-down{/if}"><a href="{if isset($title_link) && $title_link}{$title_link}{else}{url entity=$url_entity}{/if}" class="{if $view_more_style == 0}btn btn-default btn-more-padding btn-large btn_arrow{elseif $view_more_style == 2}btn-line{elseif $view_more_style == 3}btn-line-under{/if}" title="{l s='View more' d='Shop.Theme.Transformer'}">{l s='View more' d='Shop.Theme.Transformer'}</a></div>{/if}
        {else}
            <div class="block_content">{l s='No items' d='Shop.Theme.Transformer'}</div>
    	{/if}

            {if isset($custom_content) && $custom_content}{$custom_content.2.content nofilter}{/if}
        </div>
        {if isset($custom_content) && $custom_content && $custom_content.30.width}
            {$custom_content.30.content nofilter}
        {/if}
    </div>
</section>
{if isset($homeverybottom) && $homeverybottom}</div>{/if}
{if $bu_full_width}</div>{/if}
</div>
{/if}