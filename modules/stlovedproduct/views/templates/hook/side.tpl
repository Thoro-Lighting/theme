<nav class="st-menu" id="side_loved">
	<div class="st-menu-header">
		<div class="st-menu-title">{l s='Loved' d='Shop.Theme.Transformer'}</div>
		<a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M18 6L6 18M18 18L6 6" stroke="#181B1A" stroke-width="1.2" stroke-linecap="round" />
			</svg>
		</a>
	</div>
	<div id="side_loved_block" class="px-3 pt-5 pb-3">
		{if $loved_login == 0 || $customer.is_logged}

			{assign var='has_love_items' value=0}
			{if isset($products) && count($products)}
				{$has_love_items=1}
				<div class="base_list_line medium_list">
					{foreach $products as $product}
						{include file="catalog/_partials/miniatures/product-slider-item-compact.tpl" lazy_load=false}
					{/foreach}
				</div>
			{/if}
			{if isset($blogs) && count($blogs)}
				<h3 class="page_heading blog">{l s='Loved articles' d='Shop.Theme.Transformer'}</h3>
				{$has_love_items=1}
				<div class="base_list_line medium_list">
					{foreach $blogs as $blog}
						{include file="module:stblog/views/templates/slider/simple.tpl" lazy_load=false}
					{/foreach}
				</div>
			{/if}
			{if !$has_love_items}
				<div class="loved_products_no_products">
					{l s='No items' d='Shop.Theme.Transformer'}
				</div>
			{/if}

		{else}
			<p>{l s='Create a free account to save loved products and articles.' d='Shop.Theme.Transformer'}</p>
		</div>
		<div class="sidebar_button">
			<div class="text-center"><a href="{$urls.pages.authentication}"
					class="btn btn-default btn_full_width {if $arrow_buttons}btn_arrow{/if} btn-more-padding"
					title="{l s='Sign in' d='Shop.Theme.Transformer'}">{l s='Sign in' d='Shop.Theme.Transformer'}</a></div>
		</div>
	{/if}

	</div>
</nav>

{if $has_love_items}
	<div class="sidebar_button side loved">
		<div class="text-center">
			<button class="btn-secondary w-100 delete_all_loved_products mb-3">
				{l s='Clear all loved' d='Shop.Theme.Transformer'}
			</button>
			<a href="{url entity='module' name='stlovedproduct' controller='myloved'}"
				class="btn btn-main btn_full_width {if $arrow_buttons}btn_arrow{/if} btn-more-padding"
				title="{l s='View all' d='Shop.Theme.Transformer'}"
				rel="nofollow">{l s='View all' d='Shop.Theme.Transformer'}</a>
		</div>
	</div>
{/if}