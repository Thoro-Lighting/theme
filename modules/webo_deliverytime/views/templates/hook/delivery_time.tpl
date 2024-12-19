{if !empty($deliveryTimeSum)}
{literal}
<style>
#summary_sticky .estimated-delivery span:last-child,
.checkout-summary-block .estimated-delivery span:last-child{font-weight:600;}
.steco-delivery-option .carrier-name .estimated-delivery span:first-child{font-weight:400;}
.checkout-summary-block .estimated-delivery span:last-child{magin-left:0;}
@media only screen and (min-width: 768px) {
    .steco-delivery-option .carrier-name .estimated-delivery span:first-child {
        padding-left: 0;
    }
}
</style>
{/literal}
{if $page.page_name == 'product'}
		<div class="estimated-delivery-product product-quantity {if !$product.add_to_cart_url} hide_main_cart_button {/if} sticky_off">
			<p class="estimated-bottom">
				{l s='Order now and you will receive the package' d='Shop.Theme.Transformer'}: 
				<span>{l s='%s dni robocze' sprintf = ['%s' => $deliveryTimeSum] d='Modules.Webideliverytime.Front'}</span>
			</p>
		</div>
{elseif $page.page_name == 'module-steasycheckout-default'}
		<div class="estimated-delivery">
			<span>{l s='Estimated delivery date of the order' d='Shop.Theme.Transformer'}: </span><br><span>{l s='%s dni robocze' sprintf = ['%s' => $deliveryTimeSum] d='Modules.Webideliverytime.Front'}</span>
		</div>
{else}
	<div class="estimated-delivery category">
		<p class="estimated-bottom">
			{l s='Order now and you will receive the package' d='Shop.Theme.Transformer'}: 
			<span>{l s='%s dni robocze' sprintf = ['%s' => $deliveryTimeSum] d='Modules.Webideliverytime.Front'}</span>
		</p>
	</div>
{/if}
{else}
				<div class="estimated-delivery"></div>
{/if}

