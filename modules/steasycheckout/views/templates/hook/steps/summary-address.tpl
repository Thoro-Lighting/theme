
<div class="row adress-summary {if $steco.coll_ex_address == 3}small{/if}">

<div class="col-md-6 adress_left">
{if $cart.id_address_delivery != $cart.id_address_invoice}<h3>{l s='Shipping information' d='Shop.Theme.Transformer'}</h3>{/if}
<ul>
<li><strong>{l s='Name' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].firstname}</li>
<li><strong>{l s='Last name' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].lastname}</li>
{if $customer.addresses[$cart.id_address_delivery].company}<li><strong>{l s='Company' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].company}</li>{/if}
{if $customer.addresses[$cart.id_address_delivery].vat_number}<li><strong>{l s='VAT number' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].vat_number}</li>{/if}
{if $customer.addresses[$cart.id_address_delivery].address1}<li><strong>{l s='Street' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].address1}</li>{/if}
{if $customer.addresses[$cart.id_address_delivery].address2}<li><strong>{l s='House number' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].address2}</li>{/if}
{if $customer.addresses[$cart.id_address_delivery].postcode}<li><strong>{l s='Postal Code' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].postcode}</li>{/if}
{if $customer.addresses[$cart.id_address_delivery].city}<li><strong>{l s='City' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].city}</li>{/if}
{if $customer.addresses[$cart.id_address_delivery].country}<li><strong>{l s='Country' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].country}</li>{/if}
{if $customer.addresses[$cart.id_address_delivery].phone}<li><strong>{l s='Phone' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_delivery].phone}</li>{/if}
<li><strong>{l s='E-mail adress' d='Shop.Theme.Transformer'}:</strong> {$customer.email}</li>
<li class="last"><a href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}?checkout" class="change-address"><i class="fto-pencil"></i><span class="btn-line-under">{l s='Change the data' d='Shop.Theme.Transformer'}</span></a></li>
</ul>
</div>
<div class="col-md-6 adress_right">
{if $cart.id_address_delivery != $cart.id_address_invoice}<h3>{l s='Data to buy' d='Shop.Theme.Transformer'}</h3>{/if}
<ul>{if $cart.id_address_delivery != $cart.id_address_invoice}
{if $customer.addresses[$cart.id_address_invoice].firstname}<li><strong>{l s='Name' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].firstname}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].lastname}<li><strong>{l s='Last name' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].lastname}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].company}<li><strong>{l s='Company' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].company}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].vat_number}<li><strong>{l s='VAT number' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].vat_number}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].address1}<li><strong>{l s='Street' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].address1}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].address2}<li><strong>{l s='House number' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].address2}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].postcode}<li><strong>{l s='Postal Code' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].postcode}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].city}<li><strong>{l s='City' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].city}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].country}<li><strong>{l s='Country' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].country}</li>{/if}
{if $customer.addresses[$cart.id_address_invoice].phone}<li><strong>{l s='Phone' d='Shop.Theme.Transformer'}:</strong> {$customer.addresses[$cart.id_address_invoice].phone}</li>{/if}
{/if}
<li><strong>{l s='E-mail adress' d='Shop.Theme.Transformer'}:</strong> {$customer.email}</li>
{if $cart.id_address_delivery == $cart.id_address_invoice}<li><strong>{l s='Shipping address' d='Shop.Theme.Transformer'}:</strong> {l s='The same as above' d='Shop.Theme.Transformer'}</li>{/if}
<li><strong>{l s='The proof of purchase' d='Shop.Theme.Transformer'}:</strong> {if !empty($cart_info.invoice)}{l s='Invoice' d='Shop.Theme.Transformer'}{else}{l s='Receipt' d='Shop.Theme.Transformer'}{/if}</li>
{if $steco.weight_products_sum == 1}<li><strong>{l s='The sum of the weight of the basket' d='Shop.Theme.Transformer'}:</strong> {$cart.weight} {$cart.weight_unit}</li>{/if}
<li><strong>{l s='The form of delivery' d='Shop.Theme.Transformer'}:</strong> {if !empty($delivery_option)}{$delivery_option.name}{else}-{/if}</li>
{if !empty($selected_paczkomat)}
	<li><strong>{l s='Paczkomat' d='Shop.Theme.Transformer'}:</strong> {$selected_paczkomat}</li>
{/if}
<li><strong>{l s='The chosen payment method' d='Shop.Theme.Transformer'}:</strong> {if !empty($selected_payment_name)}{$selected_payment_name}{else}-{/if}</li>
<li class="last"><a href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}"><i class="fto-pencil"></i><span class="btn-line-under">{l s='Change delivery and shipping method' d='Shop.Theme.Transformer'}</span></a></li>
</ul>
</div>

{if $steco.coll_ex_address == 3 && $steco.shadow_address == 1 }<div class="fade-out-content"></div>{/if}
</div>

{if $steco.coll_ex_address == 3}<p class="summary_down_line"><span class="close_summary_down btn-line-under"><span class="show">{l s='show full data' d='ShopThemeTransformer'} <i class="fto-angle-down"></i></span></span></p>{/if}
