<div class="title_block flex_container title_align_{if $column_slider}0{else}{(int)$title_position}{/if} title_style_{if isset($is_blog) && $is_blog}{(int)$stblog.heading_style}{else}{(int)$sttheme.heading_style}{/if}">
    <div class="flex_child title_flex_left"></div>
    {if (isset($title_link) && $title_link) || (isset($url_entity) && $url_entity)}
    <a href="{if isset($title_link) && $title_link}{$title_link}{else}{url entity=$url_entity}{/if}" class="title_block_inner" title="{$title}">{$title}</a>
    {else}
    <div class="title_block_inner">{$title}</div>
    {/if}
    <div class="flex_child title_flex_right"></div>
    {if $direction_nav && ((!$display_as_grid && $direction_nav==1) || $column_slider) && ((isset($products) && $products) || (isset($blogs) && $blogs))}
        <div class="swiper-button-tr {if $hide_direction_nav_on_mob} hidden-md-down {/if}"><div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>        
    {/if}
    
   {if isset($view_more) && $view_more == 2 && ((isset($title_link) && $title_link) || (isset($url_entity) && $url_entity))}<div class="view_more_top"><a href="{if isset($title_link) && $title_link}{$title_link}{else}{url entity=$url_entity}{/if}" class="btn btn-default" title="{l s='View more' d='Shop.Theme.Transformer'}">{l s='more' d='Shop.Theme.Transformer'}</a></div>{/if}
     
    
</div>