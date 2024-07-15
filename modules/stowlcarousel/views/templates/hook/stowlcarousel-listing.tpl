<!-- MODULE st owl carousel -->
{if isset($slide_group)}
    {foreach $slide_group as $group}
    {if $group.baner_category_adv == 1}
        {if isset($group['slide']) && count($group['slide']) && (( empty($group['listing_page']) || $group['listing_page'] == $smarty.get.page ) OR ((empty($group['listing_page']) || $group['listing_page'] == 1) && $smarty.get.page < 2))}
			<div id="st_owl_carousel_{$group.id_st_owl_carousel_group}{if isset($st_time)}{$st_time}{/if}" class="st_slider_listing_{$group.id_st_owl_carousel_group} product_list_item col-fw-{$group.row_per_listing_fw|replace:'.':'-'} col-xxl-{$group.row_per_listing_xxl|replace:'.':'-'} col-xl-{$group.row_per_listing_xl|replace:'.':'-'}  col-lg-{$group.row_per_listing_lg|replace:'.':'-'} col-md-{$group.row_per_listing_md|replace:'.':'-'} col-sm-{$group.row_per_listing_sm|replace:'.':'-'} col-xs-{$group.row_per_listing_xs|replace:'.':'-'} st_owl_carousel_{$group.id_st_owl_carousel_group} {if $group.category_slider == 1}category_group{/if} owl_carousel_wrap st_owl_carousel_{$group.templates} {if !$group['is_full_width']} block {/if} owl_images_slider {if $group.hide_on_mobile == 1} hidden-sm-down {elseif $group.hide_on_mobile == 2} hidden-lg-up-991 {elseif $group.hide_on_mobile == 3} hidden-lg-big {elseif $group.hide_on_mobile == 4} hidden-lg-small {/if} {if $group.templates == 3}no-margin{/if}  col-lg-12 {if $group.baner_coneat_filtr_list == 0 && !$group['is_full_width']}hide_filter_page{/if}  {if $group.classpluslink}privat_slider_{$group.classpluslink}{/if} {if $group.classpluslink == 4}{if $group.sticky_desktop == 0} box-sticky-off {/if}{/if} slider-listing">
    	        {if !empty($group.title)}<h3 class="title_block_inner">{$group.title nofilter}</h3>{/if}
	            {if !empty($group.subtitle)}<p>{$group.subtitle nofilter}</p>{/if}
                {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-{$group['templates']}.tpl" slides=$group}
            </div>
        {/if}
      {/if}
    {/foreach}
{/if}
<!--/ MODULE st owl carousel -->