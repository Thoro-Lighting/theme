<div class="steco_heading steco_flex_container">
  <div class="steco_flex_child">{l s='Cart summary' d='Shop.Theme.Checkout'}</div>
</div>
<div class="steco_layer"></div>
<div class="steco_column_inner">
{include file='checkout/_partials/cart-detailed.tpl' cart=$cart}
{include file='checkout/_partials/cart-detailed-totals.tpl' cart=$cart}
</div>