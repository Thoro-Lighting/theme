<!-- MODULE st owl carousel -->
{if isset($slide_group)}
    {foreach $slide_group as $group}
    {if $group.baner_category_adv == 0}
        {if isset($group['slide']) && count($group['slide'])}
            {if $group['is_full_width']}<div id="owl_carousel_container_{$group.id_st_owl_carousel_group}{if isset($st_time)}{$st_time}{/if}" class="mb-lg-6 owl_carousel_container_{$group.id_st_owl_carousel_group} owl_carousel_container full_container {if $group.hide_on_mobile == 1} hidden-sm-down {elseif $group.hide_on_mobile == 2} hidden-lg-up-991 {elseif $group.hide_on_mobile == 3} hidden-lg-big {elseif $group.hide_on_mobile == 4} hidden-lg-small {/if} block {if $group.templates == 3}no-margin{/if}  {if $group.classpluslink}privat_slider_full_{$group.classpluslink}{/if} {if $group.classpluslink == 4}{if $group.sticky_desktop == 0} box-sticky-off {/if}{/if} {if $group.pag_nav_text}text-naviagtion{/if}">{/if}
            <div id="st_owl_carousel_{$group.id_st_owl_carousel_group}{if isset($st_time)}{$st_time}{/if}" class="st_owl_carousel_{$group.id_st_owl_carousel_group} {if $group.category_slider == 1}category_group{/if} owl_carousel_wrap st_owl_carousel_{$group.templates} {if !$group['is_full_width']} block {/if} owl_images_slider {if $group.hide_on_mobile == 1} hidden-sm-down {elseif $group.hide_on_mobile == 2} hidden-lg-up-991 {elseif $group.hide_on_mobile == 3} hidden-lg-big {elseif $group.hide_on_mobile == 4} hidden-lg-small {/if} {if $group.templates == 3}no-margin{/if} {if $group.owl_coneat_page == 1 && !$group['is_full_width']}one_page_desc{/if} {if $group.owl_coneat_filtr == 0 && !$group['is_full_width']}hide_filter_page{/if}  {if $group.classpluslink}privat_slider_{$group.classpluslink}{/if} {if $group.classpluslink == 4}{if $group.sticky_desktop == 0} box-sticky-off {/if}{/if} {if $group.pag_nav_text}text-naviagtion{/if}">
             
    	        {if !empty($group.title)}<h3 class="title_block_inner">{$group.title nofilter}</h3>{/if}
	            {if !empty($group.subtitle)}<p>{$group.subtitle nofilter}</p>{/if}
            
                {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-{$group['templates']}.tpl" slides=$group}
            </div>
            {if $group['is_full_width']}</div>{/if}
        {/if}
       {/if}
        
    {/foreach}
{/if}
<!--/ MODULE st owl carousel -->

