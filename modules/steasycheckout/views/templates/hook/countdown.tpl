{assign var='ship_holiday' value=Configuration::get('STECO_SHIP_HOLIDAY')}
{if ($page.page_name != product && ($ship_holiday == 1 OR $ship_holiday == 2)) OR ($page.page_name == product && ($ship_holiday == 1 OR $ship_holiday == 3)) }
<div id="deliveryCountdownBlock" {if $page.page_name == product }class="product-quantity {if !$product.add_to_cart_url} hide_main_cart_button {/if}"{/if}>

	    <span class="head-info-text">{l s='Buy now' d='Shop.Theme.Transformer'} {$date_start}</span><br>
	    <span class="showdeliverytime_small showdeliverytime_small_bottom">
	    	{l s='shipping' d='Shop.Theme.Transformer'}
	    	{if $shipping_days == 0}
	    		{l s='today' d='Shop.Theme.Transformer'}
	    	{elseif $shipping_days == 1}
	    		{l s='already tomorrow' d='Shop.Theme.Transformer'}
	    	{elseif $shipping_days == 2}
	    		{l s='day after tomorrow' d='Shop.Theme.Transformer'}
	    	{else}
	    		{if $shipping_day_of_week == 1}
	    			{l s='on monday' d='Shop.Theme.Transformer'}
	    		{elseif $shipping_day_of_week == 2}
	    			{l s='on tuesday' d='Shop.Theme.Transformer'}
	    		{elseif $shipping_day_of_week == 3}
	    			{l s='on wednesday' d='Shop.Theme.Transformer'}
	    		{elseif $shipping_day_of_week == 4}
	    			{l s='thursday' d='Shop.Theme.Transformer'}
	    		{elseif $shipping_day_of_week == 5}
	    			{l s='on friday' d='Shop.Theme.Transformer'}
	    		{/if}
	    	{/if}
	    </span>
		<div class="showdeliverytime_clearfix"></div>

</div>
{/if}

{*

	$shipping_days - ilość dni między wysyłką do dostarczeniem
	$shipping_day_of_week - numer dnia tygdonia dostawy gdzie 0 (for Sunday) through 6 (for Saturday)

*}