
{$with_other_columns = false}
{if count($steco.columns[$step_number])>1}
  {$with_other_columns = true}
{/if}
<div class="steco_layer"></div>
{*<p class="cart-name-top">1. {l s='Your cart' d='ShopThemeTransformer'} <span> - {l s='%product_count%' sprintf=['%product_count%' =>$cart.products_count] d='Shop.Theme.Checkout'} {l s='pcs.' d='Shop.Theme.Transformer'}</span> {hook h='displayCartShare'}<a href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}" class="summary_step_edit"><i class="fto-pencil"></i> <span class="btn-line-under">{l s='edit basket' d='ShopThemeTransformer'}</span></a></p>*}
<section id="js-checkout-summary" class="js-cart steco-checkout-summary steco_column_inner"
  data-refresh-url="{$steco_urls.cart}?ajax=1&action=refresh">
  <div class="checkout-summary-block">
    {hook h='displayCheckoutSummaryTop'}
    {block name='cart_summary_products'}
      <ul class="small_cart_product_list steco_base_list_line medium_list">
        {foreach from=$cart.products item=product}
          <li class="line_item {if $steco.cart_summary==2}big_cart_on{/if}" data-id-product="{$product.id_product}">
            {include file='module:steasycheckout/views/templates/hook/cart-product-line.tpl' product=$product}
          </li>
        {/foreach}


        <li class="last-info">{hook h='displayEstimatedDeliveryDate'}</li>

        <li>
          {hook h="displayClearCartBtn"}
        </li>

      </ul>
    {/block}
    {literal}
      <style>
        .configurator-contact #sendQuestionEmail {
          padding: 0 60px 0 25px !important;
          font-weight: 500;
          text-transform: none;
          margin-bottom: 5px;
        }

        .checkout-summary-block {
          padding-bottom: 15px;
        }

        .checkout-summary-block .remove-cart-button {
          margin-right: 15px;
        }
      </style>
    {/literal}
  </div>
  </div>
</section>