{foreach $sidebar_items as $sidebar_item}
{if !$sidebar_item.native_modules}
{if $sidebar_item.dropdown_list == 0}
<div class="st-menu custom_sidebar" id="side_custom_sidebar_{$sidebar_item.id_st_sidebar}">
	<div class="st-menu-header">
		<div class="st-menu-title">{$sidebar_item.title}</div>
    	<a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
	</div>
	<div class="custom_sidebar_box pad_10 {if $sidebar_item.classpluslink}sidebar_custom_{$sidebar_item.classpluslink}{/if}">
		{$sidebar_item.content nofilter}
	</div>
</div>
{/if}
{elseif $sidebar_item.native_modules==7}
    <div class="st-menu" id="side_mobile_nav">
        <div class="st-menu-header">
            <div class="st-menu-title">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}</div>
            <a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
        </div>
      <div class="mobile_nav_box">
        <div class="mobile_nav_box_1 {if $sidebar_item.mobile_element ==0}nav_box_1_plus{/if}">{hook h="displayMobileNavSearch"}</div>
        {if $sidebar_item.mobile_element < 4}<div class="mobile_nav_box_2 element_{$sidebar_item.mobile_element}">{hook h="displayMobileNav"}</div>{/if}
        {if $sidebar_item.mobile_element == 4}<div class="mobile_nav_box_account">{hook h="displayMobileNavAccount"}</div>{/if}
        <div class="mobile_nav_box_3">{hook h="displayMobileNavMenu"}</div>
      </div>
    </div>
    
    {elseif $sidebar_item.native_modules==16}
    <div class="st-menu" id="side_mobile_nav_lan_cur">
        <div class="st-menu-header">
            <h3 class="st-menu-title">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}</h3>
            <a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
        </div>
      <div class="mobile_nav_box">
        {hook h="displayMobileNavLancur"}
      </div>
    </div>
    
{/if}
{/foreach}


 <div class="st-menu menu_blur" id="side_facets">
    <div class="st-menu-header">
        <div class="st-menu-title">{l s='Filter By' d='Shop.Theme.Actions'}</div>
        <a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
    </div>

    <div id="search_filters_wrapper" class="column_filter block column_block">
       	<div class="block_content">
    		{if $sttheme.is_mobile_device}
                <script>
                    window.addEventListener('load', function(event) {
                       jQuery('.PM_ASBlockOutput').appendTo('#side_facets')
                    });
                </script>
            {/if}
        </div>
    </div>
  
</div>


