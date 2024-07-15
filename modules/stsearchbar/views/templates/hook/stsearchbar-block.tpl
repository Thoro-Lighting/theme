<div class="search_widget_block search_widget_{$quick_search_simple} {if $quick_search_center == 1 && $quick_search_simple!=2}search_center{/if} search_border_{$quick_search_border}">
<div class="search_widget" data-search-controller-url="{$search_controller_url}">
	<form method="get" action="{$search_controller_url}" class="search_widget_form">
		<input type="hidden" name="controller" value="search">
		<div class="search_widget_form_inner input-group round_item js-parent-focus input-group-with-border">
	     {if $quick_search_button == 0 & $quick_search_button_element != 3}<span class="input-group-btn {if $quick_search_button_end == 1}button_end_left{/if}">
	        <button class="btn btn-search btn-spin search_widget_btn link_color icon_btn left {if $quick_search_button_element == 2}search_inline{/if} {if $quick_search_border_button == 1}border_on{/if} {if $quick_search_button_hover ==1}hover_on{/if}" title="{l s='Search' d='Shop.Theme.Transformer'}" type="submit">
	        {if $quick_search_button_element == 0 OR $quick_search_button_element == 2}<i class="icone_svg fto-search-1"></i>{/if}
	        {if $quick_search_button_element == 1 OR $quick_search_button_element == 2}<span class="icon_text">{l s='Search' d='Shop.Theme.Transformer'}</span>{/if}
	        </button>
	      </span>{/if}
	      <input type="text" class="form-control search_widget_text js-child-focus" name="s" value="{$search_string}" placeholder="{l s='Search our catalog' d='Shop.Theme.Transformer'}">
	      {if $quick_search_button == 1 & $quick_search_button_element != 3}<span class="input-group-btn {if $quick_search_button_end == 1}button_end_right{/if}">
	        <button class="btn btn-search btn-spin search_widget_btn link_color icon_btn  {if $quick_search_button_element == 2}search_inline{/if} {if $quick_search_border_button == 1}border_on{/if} {if $quick_search_button_hover ==1}hover_on{/if}" title="{l s='Search' d='Shop.Theme.Transformer'}" type="submit">
	        {if $quick_search_button_element == 0 OR $quick_search_button_element == 2}<i class="icone_svg fto-search-1"></i>{/if}
	        {if $quick_search_button_element == 1 OR $quick_search_button_element == 2}<span class="icon_text">{l s='Search' d='Shop.Theme.Transformer'}</span>{/if}
	        </button>
	      </span>{/if}
	    </div>

	</form>
	<div class="search_results {if $quick_search_as_results&1} search_show_img {/if}{if $quick_search_as_results&2} search_show_name {/if}{if $quick_search_as_results&4} search_show_price {/if} {if $quick_search_as_results&8} search_show_tax {/if}"></div>
	<a href="javascript:;" title="{l s='More products.' d='Shop.Theme.Transformer'}" rel="nofollow" class="display_none search_more_products go">{l s='Click for more products.' d='Shop.Theme.Transformer'} (<span class="all-search"></span>)</a>
	<div class="display_none search_no_products">{l s='No produts were found.' d='Shop.Theme.Transformer'}</div>
</div>
</div>

