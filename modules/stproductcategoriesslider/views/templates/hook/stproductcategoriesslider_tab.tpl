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
{assign var='border_tabs' value=Configuration::get('ST_PRO_CATE_BORDER_TABS')}
{*similar files homepage.tpl stblogfeaturedarticles/views/templates/hook/home.tpl stproductcategoriesslider.tpl stproductcategoriesslider_tab.tpl stfeaturedcategories.tpl ps_crossselling.tpl  ps_categroyproduct.tpl steasycontent-element-6.tpl pcomments_slider.tpl*}
{if isset($product_categories) && count($product_categories)}
    <div id="pc_slider_block_container_{$hook_hash}"
        class="pc_slider_block_container block force-fullwidth {if $tabs_class}privat_class_{$tabs_class}{/if} {if $border_tabs == 0}one_border{else}four_border{/if} {if $additional_option >0}desktop_tab{/if} mobile_tabs_{$additional_option} mobile_title_align_{$additional_option_title} mobile_tabs_align_{$additional_option_tabs} width_tabs_{$additional_option_full}"
        data-tab="{foreach $product_categories as $p_c}

            {if ((isset($p_c.products) && is_array($p_c.products)) || $p_c.aw_display) && $p_c@first}category_products_container_{$p_c.id_st_product_categories_slider}

            {/if}

        {/foreach}">
        <div class="container">
                <div class="sttab_block mobile_tab sttab_2">
                    <div class="title_block block">
                        {foreach $product_categories as $p_c}
                            {if (isset($p_c.products) && is_array($p_c.products)) || $p_c.aw_display}
                                <div id="category_products_container_{$p_c.id_st_product_categories_slider}-t"
                                    class="products_slider_tabs_header {if $p_c@first} active{/if} nav-header">
                                    <div>
                                        {if $p_c.subtitle}<p>{$p_c.subtitle}</p>{/if}
                                        <h2>{$p_c.title}</h2>
                                    </div>

                                    {if isset($p_c.view_more) && $p_c.view_more == 1 && isset($p_c.link) && $p_c.link}
                                        <div class="product_view_more_box">
                                            <a href="{$p_c.link}" class="btn-secondary hidden-md-down"
                                                title="{l s='Show more' d='Shop.Theme.Transformer'}">{l s='Show more' d='Shop.Theme.Transformer'}</a>
                                        </div>
                                    {/if}
                                </div>
                            {/if}
                        {/foreach}
                    </div>

                    <div class="flex_child title_flex_right swiper-container tabs_plus">
                        <ul
                            class="swiper-wrapper nav nav-tabs tab_lg flex_container {if $title_align==3 OR $title_align==2}flex_right{elseif $title_align == 4 OR $title_align==0}flex_left{else}flex_center{/if}">
                            {*to do what if the first is hidden ? *}
                            {foreach $product_categories as $p_c}
                                {if (isset($p_c.products) && is_array($p_c.products)) || $p_c.aw_display}
                                    <li class="nav-item swiper-slide">
                                        <a class="nav-link{if $p_c@first} active{/if} {if $p_c.hide_mob == 1} hidden-md-down {elseif $p_c.hide_mob == 2} hidden-lg-up {/if} text-uppercase"
                                            href="#category_products_container_{$p_c.id_st_product_categories_slider}"
                                            data-toggle="tab"
                                            aria-controls="category_products_container_{$p_c.id_st_product_categories_slider}">{$p_c.name}</a>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>

                        {if $sttheme.is_mobile_device}
                            <script>
                                //<![CDATA[
                                if (typeof(swiper_options) === 'undefined') var swiper_options = [];
                                swiper_options.push({
                                    speed: 400,
                                    loop: false,
                                    slidesPerView: 'auto',
                                    spaceBetween: 10,
                                    nextButton: '.tabs_plus .swiper-button-next',
                                    prevButton: '.tabs_plus .swiper-button-prev',
                                    id_st: '.tabs_plus'
                                });
                                //]]>
                            </script>
                        {/if}

                    </div>


                    <div class="tab-content">
                        {foreach $product_categories as $p_c}

                            {if (isset($p_c.products) && is_array($p_c.products)) || $p_c.aw_display}
                                <div role="tabpanel"
                                    class="block {$p_c.home_blog_add_class} products_container tab-pane {if $p_c@first} active st_open {/if} {if $p_c.hide_mob == 1} hidden-md-down {elseif $p_c.hide_mob == 2} hidden-lg-up {/if} {if $p_c.video_mpfour} video_bg_block {/if}"
                                    id="category_products_container_{$p_c.id_st_product_categories_slider}"
                                    {if $p_c.bg_img && $p_c.speed!=1} data-stellar-background-ratio="{$p_c.speed}"
                                        data-stellar-vertical-offset="{(int)$p_c.bg_img_v_offset}" {/if} {if $p_c.video_mpfour}
                                        data-vide-bg="mp4: {$p_c.video_mpfour}{if $p_c.video_webm}, video_webm: {$p_c.video_webm}{/if}{if $p_c.video_ogg}, ogv: {$p_c.video_ogg}{/if}{if $p_c.video_poster}, poster: {$p_c.video_poster}{/if}"
                                        data-vide-options="video_loop: {if $p_c.video_loop}true{else}false{/if}, video_muted: {if $p_c.video_muted}true{else}false{/if}, position: 50% {(int)$p_c.video_v_offset}%"
                                    {/if}>
                                    {if $additional_option == 0}<div class="mobile_tab_title p_c_slider"
                                            data-id="#category_products_container_{$p_c.id_st_product_categories_slider}">
                                            <a href="javascript:;" class="opener "><i class="fto-plus-2 plus_sign"></i><i
                                                    class="fto-minus minus_sign"></i></a>
                                            <div class="mobile_tab_name">{$p_c.name}</div>
                                    </div>{/if}
                                    <div class="tab-pane-body {if $p_c.countdown_on} s_countdown_block{/if}">
                                        {*    {if isset($p_c.view_more) && $p_c.view_more == 2 && isset($p_c.link) && $p_c.link}<div class="view_more_top"><a href="{$p_c.link}" class="btn btn-default" title="{l s='Show more' d='Shop.Theme.Transformer'}">{l s='more' d='Shop.Theme.Transformer'}</a></div>{/if}*}

                                        {if isset($p_c.products) && $p_c.products}
                                            {if !$p_c.grid || $column_slider}
                                                <div class="block_content products_slider">


                                                    {if $p_c.box_info_on == 1}<div class="row row_box_text">
                                                            <div
                                                                class="col-xl-{$p_c.box_info_width} col-md-{$p_c.box_info_width_md} box_category_info flex_container {if $p_c.box_info_visible == 1}hidden-sm-down{/if}">
                                                                <div
                                                                    class="text text-{$p_c.box_info_text_align} text-xs-{$p_c.box_info_mobile_text_align}">
                                                                    {$p_c.box_info_head nofilter}</div>
                                                            </div>
                                                            <div
                                                                class="col-xl-{if $p_c.box_info_width == 12}12{else}{12-$p_c.box_info_width}{/if} col-md-{if $p_c.box_info_width_md == 12}12{else}{12-$p_c.box_info_width_md}{/if} box_category_prod">
                                                            <div class="box_prod">{/if}
                                                                {include file="catalog/slider/product-slider.tpl" products=$p_c.products
                                                                lazy_load=$p_c.lazy
                                                                direction_nav=$p_c.direction_nav
                                                                control_nav=$p_c.control_nav
                                                                image_type=$p_c.image_type
                                                                hide_direction_nav_on_mob=$p_c.hide_direction_nav_on_mob
                                                                hide_control_nav_on_mob=$p_c.hide_control_nav_on_mob
                                                                display_sd=$p_c.display_sd
                                                                display_pro_col=$p_c.display_pro_col
                                                                slider_items=$p_c.items_col
                                                                position_buttons=$p_c.position_buttons
                                                                two_products=$p_c.two_products
                                                                }

                                                                {if $p_c.box_info_on == 1}</div>
                                                            </div>
                                                    </div>{/if}
                                                </div>
                                                {include file="catalog/slider/script.tpl" block_name="#category_products_container_{$p_c.id_st_product_categories_slider}"
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

                                            {elseif $p_c.grid==2}
                                                {include file="catalog/listing/product-list-simple.tpl" products=$p_c.products for_f='pro_cate' id='stproductcategoriesslider_grid'
                                                                pro_per_fw=$p_c.pro_per_fw 
                                                                pro_per_xxl=$p_c.pro_per_xxl 
                                                                pro_per_xl=$p_c.pro_per_xl 
                                                                pro_per_lg=$p_c.pro_per_lg 
                                                                pro_per_md=$p_c.pro_per_md 
                                                                pro_per_sm=$p_c.pro_per_sm
                                                                pro_per_xs=$p_c.pro_per_xs
                                                                }
                                            {else}
                                                {include file="catalog/_partials/miniatures/list-item.tpl" products=$p_c.products class='stproductcategoriesslider_grid' for_f='pro_cate' id='stproductcategoriesslider_grid' 
                                                                pro_per_fw=$p_c.pro_per_fw 
                                                                pro_per_xxl=$p_c.pro_per_xxl 
                                                                pro_per_xl=$p_c.pro_per_xl 
                                                                pro_per_lg=$p_c.pro_per_lg 
                                                                pro_per_md=$p_c.pro_per_md 
                                                                pro_per_sm=$p_c.pro_per_sm 
                                                                pro_per_xs=$p_c.pro_per_xs
                                                                image_type=$p_c.image_type
                                                                display_sd=$p_c.display_sd
                                                                }
                                            {/if}

                                            {if isset($p_c.view_more) && $p_c.view_more == 1 && isset($p_c.link) && $p_c.link}
                                                <div class="product_view_more_box">
                                                    <a href="{$p_c.link}" class="btn-secondary hidden-lg-up"
                                                        title="{l s='Show more' d='Shop.Theme.Transformer'}">{l s='Show more' d='Shop.Theme.Transformer'}</a>
                                                </div>
                                            {/if}


                                        {else}
                                            <p class="warning">{l s='No products' d='Shop.Theme.Transformer'}</p>
                                        {/if}
                                    </div>
                                </div>
                            {/if}
                        {/foreach}
                    </div>
                </div>
        </div>
    </div>
{/if}