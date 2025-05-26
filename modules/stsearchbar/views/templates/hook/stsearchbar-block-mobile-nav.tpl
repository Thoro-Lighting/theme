<div class="search_widget_block search_widget_{$quick_search_simple} search_mobile_nav">
	<div class="search_widget" data-search-controller-url="{$search_controller_url}">
		<form method="get" action="{$search_controller_url}" class="search_widget_form">
			<input type="hidden" name="controller" value="search">
			<div class="search_widget_form_inner input-group round_item js-parent-focus input-group-with-border">
				<span class="input-group-btn">
					<button class="btn btn-search btn-spin search_widget_btn"
						title="{l s='Search' d='Shop.Theme.Transformer'}" type="submit">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M16.1057 16.2L19 19M18.0667 11.5333C18.0667 15.1416 15.1416 18.0667 11.5333 18.0667C7.92507 18.0667 5 15.1416 5 11.5333C5 7.92507 7.92507 5 11.5333 5C15.1416 5 18.0667 7.92507 18.0667 11.5333Z" stroke="#9E9D9A" stroke-width="2.5" stroke-linecap="round"/>
						</svg>
					</button>
				</span>
				<input type="text" class="form-control search_widget_text js-child-focus" name="s"
					value="{$search_string}" placeholder="{l s='Search our catalog' d='Shop.Theme.Transformer'}">
				<button type="button" class="search_btn_clear">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18 6L6 18M18 18L6 6" stroke="#181B1A" stroke-width="1.2" stroke-linecap="round" />
					</svg>
				</button>
			</div>
		</form>
		
		{if $sttheme.search_tag_visible_in == 1}
			<div class="popular-search-tags"><span class="popular-tag-heading">{l s='Other popular searches' d='Shop.Theme.Transformer'}</span>
				{$sttheme.search_tag nofilter}
			</div>
		{/if}

		<div
			class="search_results {if $quick_search_as_results&1} search_show_img {/if}{if $quick_search_as_results&2} search_show_name {/if}{if $quick_search_as_results&4} search_show_price {/if} {if $quick_search_as_results&8} search_show_tax {/if}">
		</div>
		<div class="display_none search_no_products">{l s='No produts were found.' d='Shop.Theme.Transformer'}</div>
	</div>


</div>