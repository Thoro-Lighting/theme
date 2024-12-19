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
{*similar files homepage.tpl stblogfeaturedarticles/views/templates/hook/home.tpl stproductcategoriesslider.tpl stproductcategoriesslider_tab.tpl stfeaturedcategories.tpl ps_crossselling.tpl  ps_categroyproduct.tpl steasycontent-element-6.tpl pcomments_slider.tpl*}
{assign var="column_fix" value=""}
{if isset($column_slider) && $column_slider}{$column_fix="_column"}{/if}

{if isset($blog_categories) && count($blog_categories)}
    {foreach $blog_categories as $p_c}
        {if (isset($p_c.blogs) && is_array($p_c.blogs)) || (!$column_fix && $p_c.aw_display) || ($column_fix && $p_c.aw_display_col)}
        <div id="category_blogs_container_{$p_c.id_st_blog_slider}" class="category_blogs_container {if $p_c.hide_mob == 1} hidden-md-down {elseif $p_c.hide_mob == 2} hidden-lg-up {/if} block {if $p_c.countdown_on} s_countdown_block{/if} products_container{$column_fix} {if $column_slider && !isset($is_quarter)} column_block {/if} {if $p_c.video_mpfour} video_bg_block {/if}" 
        {if $p_c.bg_img && $p_c.speed!=1} data-stellar-background-ratio="{$p_c.speed}" data-stellar-vertical-offset="-{2*(int)$p_c.bg_img_v_offset}" {/if} 
        {if $p_c.video_mpfour} data-vide-bg="mp4: {$p_c.video_mpfour}{if $p_c.video_webm}, webm: {$p_c.video_webm}{/if}{if $p_c.video_ogg}, ogv: {$p_c.video_ogg}{/if}{if $p_c.video_poster}, poster: {$p_c.video_poster}{/if}" data-vide-options="loop: {if $p_c.video_loop}true{else}false{/if}, muted: {if $p_c.video_muted}true{else}false{/if}, position: 50% {(int)$p_c.video_v_offset}%" {/if}>
        {if isset($homeverybottom) && $homeverybottom && !$p_c.pro_per_fw}{assign var="bu_full_width" value=true}{else}{assign var="bu_full_width" value=false}{/if}
        {if $bu_full_width}<div class="wide_container">{/if}
        {if isset($homeverybottom) && $homeverybottom}<div class="container">{/if}
        <section class="products_section" >
            <div class="products_slider {if $p_c.grid==1 || $p_c.grid==6} display_as_grid {elseif $p_c.grid==2} display_as_simple {/if}">
              
                {if $p_c.title_align!=3}
                <div class="title_block flex_container title_align_{if $column_slider}0{else}{(int)$p_c.title_align}{/if} title_style_{if isset($is_blog) && $is_blog}{(int)$stblog.heading_style}{else}{(int)$sttheme.heading_style}{/if}">
                    <div class="flex_child title_flex_left"></div>
                    
                    {if $p_c.link}<a href="{if isset($p_c.is_root_category) && $p_c.is_root_category}/blog{else}{$p_c.link}{/if}" title="{$p_c.name}" class="title_block_inner">{else}<div class="title_block_inner">{/if}
                        {if $blog_slider_type==2}
                            {if $p_c.title}{$p_c.title}{else}{l s='Recent articles' d='Shop.Theme.Transformer'}{/if}
                        {else}
                            {*{if isset($p_c.is_root_category) && $p_c.is_root_category}{l s='Featured articles' d='Shop.Theme.Transformer'}{else}*}{if $p_c.title}{$p_c.title}{else}{$p_c.name}{/if}{*{/if}*}
                        {/if}
                        
                        {if $p_c.subtitle}<p class="subtitle">{$p_c.subtitle}</p>{/if}
                        
                    {if $p_c.link}</a>{else}</div>{/if}
                    
                    <div class="flex_child title_flex_right"></div>
                    {if $p_c.direction_nav && ((!$p_c.grid && $p_c.direction_nav==1) || $column_slider) && isset($p_c.blogs) && $p_c.blogs}
                        <div class="swiper-button-tr {if $p_c.hide_direction_nav_on_mob} hidden-md-down {/if}"><div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>        
                    {/if}
                    
                     {if $p_c.title_align !=2}{if isset($p_c.view_more) && $p_c.view_more == 2 && isset($p_c.link) && $p_c.link}<div class="view_more_top"><a href="{if isset($p_c.is_root_category) && $p_c.is_root_category}/blog{else}{$p_c.link}{/if}" class="btn btn-default" title="{l s='View more' d='Shop.Theme.Transformer'}">{l s='more' d='Shop.Theme.Transformer'}</a></div>{/if}{/if}
         
                    
                </div>
                {elseif $p_c.direction_nav==1}
                    {$p_c.direction_nav=5}
                {/if}

                {if isset($p_c.blogs) && $p_c.blogs}
                    {if !$p_c.grid || $column_slider}
                    <div class="block_content">
                        {include file="module:stblog/views/templates/slider/slider-home.tpl" blogs=$p_c.blogs
                        lazy_load=$p_c.lazy
                        direction_nav=$p_c.direction_nav
                        control_nav=$p_c.control_nav
                        display_sd=$p_c.display_sd
                        display_as_grid=$p_c.grid
                        pro_per_lg=$p_c.pro_per_lg 
                        display_pro_col=$p_c.display_pro_col 
                        slider_items=$p_c.items_col 
                        blog_image_type=$p_c.image_type
                        hide_direction_nav_on_mob=$p_c.hide_direction_nav_on_mob
                        hide_control_nav_on_mob=$p_c.hide_control_nav_on_mob
                        position_buttons=$p_c.position_buttons
                        }
                    </div>
                    {include file="catalog/slider/script.tpl"
                    is_product_slider=0
                    block_name="#category_blogs_container_{$p_c.id_st_blog_slider}"
                    slider_s_speed=$p_c.s_speed 
                    slider_slideshow=$p_c.slideshow
                    slider_a_speed=$p_c.a_speed
                    slider_pause_on_hover=$p_c.pause_on_hover
                    rewind_nav=$p_c.rewind_nav
                    lazy_load=$p_c.lazy
                    direction_nav=$p_c.direction_nav
                    control_nav=$p_c.control_nav
                    slider_move=$p_c.move
                    spacing_between=$p_c.spacing_between
                    pro_per_fw=$p_c.pro_per_fw 
                    pro_per_xxl=$p_c.pro_per_xxl 
                    pro_per_xl=$p_c.pro_per_xl 
                    pro_per_lg=$p_c.pro_per_lg 
                    pro_per_md=$p_c.pro_per_md 
                    pro_per_sm=$p_c.pro_per_sm 
                    pro_per_xs=$p_c.pro_per_xs
                    }
                    {else}
                        {include file="module:stblog/views/templates/slider/list-item-home.tpl" blogs=$p_c.blogs for_f='blog_cate' blog_image_type=$p_c.image_type
                        display_as_grid=$p_c.grid 
                        display_sd=$p_c.display_sd
                        pro_per_fw=$p_c.pro_per_fw 
                        pro_per_xxl=$p_c.pro_per_xxl 
                        pro_per_xl=$p_c.pro_per_xl 
                        pro_per_lg=$p_c.pro_per_lg 
                        pro_per_md=$p_c.pro_per_md 
                        pro_per_sm=$p_c.pro_per_sm 
                        pro_per_xs=$p_c.pro_per_xs
                        }
                    {/if}
                     {if isset($p_c.view_more) && $p_c.view_more == 1 && isset($p_c.link) && $p_c.link}<div class="product_view_more_box more_align_desk_{$p_c.view_more_align_desk} more_align_mobile_{$p_c.view_more_align_mobile} {if $p_c.view_more_align_desk == 3}hidden-lg-up-991{/if} {if $p_c.view_more_align_mobile == 3}hidden-sm-down{/if}"><a href="{if isset($p_c.is_root_category) && $p_c.is_root_category}/blog{else}{$p_c.link}{/if}" class="{if $p_c.view_more_style == 0}btn btn-default btn-more-padding btn-large btn_arrow{elseif $p_c.view_more_style == 2}btn-line{elseif $p_c.view_more_style == 3}btn-line-under{/if}" title="{l s='See more' d='Shop.Theme.Transformer'}">{l s='See more' d='Shop.Theme.Transformer'}</a></div>{/if}
      
                   {else}
                    <p class="warning">{l s='No posts' d='Shop.Theme.Transformer'}</p>
                {/if}
            </div>
        </section>
        {if isset($homeverybottom) && $homeverybottom}</div>{/if}
        {if $bu_full_width}</div>{/if}
        </div>




        {if $p_c.grid == 6}
        <script>
            window.addEventListener('load', function(event) {
                  new Masonry('.list_masonry_{$p_c.id_st_blog_slider}', {
                  itemSelector: '.product_list_item',                                 
              });
            });
        </script>
      {/if}

        {/if}
    {/foreach}
{/if}