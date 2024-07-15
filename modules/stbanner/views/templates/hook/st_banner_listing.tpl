<!-- MODULE st banner -->
{if isset($groups)}
    {foreach $groups as $group}
        {assign var='style' value=0}
        {if $group.baner_category_adv == 1}
        {if isset($group.style) && $group.style}{$style=1}{/if}
        {capture name="parallax_param"}{if $group.bg_img && $group.speed!=1 && !$group.mpfour} data-stellar-background-ratio="{$group.speed}" data-stellar-vertical-offset="{(int)$group.bg_img_v_offset}" {/if}{/capture}
        {capture name="video_background"}{if $group.mpfour} data-vide-bg="mp4: {$group.mpfour}{if $group.webm}, webm: {$group.webm}{/if}{if $group.ogg}, ogv: {$group.ogg}{/if}{if $group.video_poster}, poster: {$group.video_poster}{/if}" data-vide-options="loop: {if $group.loop}true{else}false{/if}, muted: {if $group.muted}true{else}false{/if}, position: 50% {(int)$group.video_v_offset}%" {/if}{/capture}
        {if (( empty($group['listing_page']) || $group['listing_page'] == $smarty.get.page ) OR ((empty($group['listing_page']) || $group['listing_page'] == 1) && $smarty.get.page < 2))}
	     <div id="st_banner_{$group.id_st_banner_group}{if isset($st_time)}{$st_time}{/if}" class="product_list_item st_banner_listing_{$group.id_st_banner_group} col-fw-{$group.row_per_listing_fw|replace:'.':'-'} col-xxl-{$group.row_per_listing_xxl|replace:'.':'-'} col-xl-{$group.row_per_listing_xl|replace:'.':'-'}  col-lg-{$group.row_per_listing_lg|replace:'.':'-'} col-md-{$group.row_per_listing_md|replace:'.':'-'} col-sm-{$group.row_per_listing_sm|replace:'.':'-'} col-xs-{$group.row_per_listing_xs|replace:'.':'-'} {if $group.classpluslink}privat_banner_{$group.classpluslink}{/if} st_banner_row st_banner_{$style} {if !$group.is_full_width} block {/if} {if $group.hide_on_mobile == 1} hidden-md-down {elseif $group.hide_on_mobile == 2} hidden-lg-up {/if}{if $group['hover_effect']} hover_effect_{$group['hover_effect']} {/if} {if isset($group.is_column) && $group.is_column} column_block {/if} {if $group.mpfour} video_bg_block {/if} {if $group.baner_coneat_page == 1 && !$group.is_full_width}one_page_desc{/if} {if $group.baner_coneat_filtr_list == 0 && !$group.is_full_width}hide_filter_page{/if} " {if !$group.is_full_width}{$smarty.capture.parallax_param nofilter} {$smarty.capture.video_background nofilter}{/if}>
                {if isset($group['banners']) && count($group['banners'])}
                    <div class="row block_content">
                        <div id="banner_box_{$group['id_st_banner_group']}" class="col-lg-12 banner_col" data-height="100">
                            {include file="module:stbanner/views/templates/hook/stbanner-block.tpl" banner_data=$group['banners'][0] banner_height=$group['height'] banner_style=$style}
                        </div>
                    </div>
                {elseif isset($group['columns'])}
                    {include file="module:stbanner/views/templates/hook/stbanner-column.tpl" columns_data=$group['columns'] banner_style=$style}
                {/if}
            </div>
        {/if}
        {/if}
    {/foreach}
{/if}
<!--/ MODULE st banner -->