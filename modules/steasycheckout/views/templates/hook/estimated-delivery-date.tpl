{if false}{* disable all bottom *}
{if $page.page_name == 'product'}
	{if $deli_holiday == 1 OR $deli_holiday == 3}
		<div class="estimated-delivery-product product-quantity {if !$product.add_to_cart_url} hide_main_cart_button {/if} sticky_off">
			<p class="estimated-top mb-0">
				{if $deadline > 0}
					{if $ship_holiday_form == 0}
					{l s='Buy within' d='Shop.Theme.Transformer'}<span class="time-delivery" data-deadline="{$deadline}">{$deadline_text}</span>
				{else}
				{l s='Buy up to an hour' d='Shop.Theme.Transformer'}<span class="time-delivery" data-deadline="{$deadline}">{$hour}.00</span>
				{/if}
				{else}
					{l s='Buy now' d='Shop.Theme.Transformer'}
				{/if}
			</p>
			<p class="estimated-bottom">
				{l s='Order now and you will receive the package' d='Shop.Theme.Transformer'}: 
				<span>{$date_start} - {$date_end}</span>
			</p>

		</div>
	{/if}

{elseif $page.page_name == 'module-steasycheckout-default'}
	{if $deli_holiday == 1 OR $deli_holiday == 2}
		<div class="estimated-delivery">
			{l s='Estimated delivery date of the order' d='Shop.Theme.Transformer'}:<br><span>{$date_start} - {$date_end}</span>
		</div>
	{/if}
	{*<p>
				{if $alt_desc}
					Tak
				{else}
					Nie
				{/if}
			</p>*}
{else}
	<div class="estimated-delivery category">
		<p class="estimated-top mb-0">
			{if $deadline > 0}
				{if $ship_holiday_form == 0}
					{l s='Buy within' d='Shop.Theme.Transformer'}<span class="time-delivery" data-deadline="{$deadline}">{$deadline_text}</span>
				{else}
				{l s='Buy up to an hour' d='Shop.Theme.Transformer'}<span class="time-delivery" data-deadline="{$deadline}">{$hour}.00</span>
				{/if}
			{else}
				{l s='Buy now' d='Shop.Theme.Transformer'}
			{/if}
		</p>
		<p class="estimated-bottom">
			{l s='Order now and you will receive the package' d='Shop.Theme.Transformer'}: 
			<span>{$date_start} - {$date_end}</span>
		</p>
	</div>
{/if}
{/if}
