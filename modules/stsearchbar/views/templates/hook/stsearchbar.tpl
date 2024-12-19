<div class="search_widget_simple dropdown_wrap dropdown_wrap top_bar_item">
	<div class="black_bg_search"></div>
	<div class="dropdown_list {if $quick_search_open_style == 0 && $quick_search_simple ==2}search_open_down{elseif $quick_search_open_style == 1 && $quick_search_simple ==2}search_open_side{/if}">
		{include 'module:stsearchbar/views/templates/hook/stsearchbar-block.tpl'}
	</div>
	<div class="dropdown_tri header_item mobile_bar_item link_color search_mobile_bar_tri icone_top">
		<i class="icone_svg"></i>
  	</div>
</div>

