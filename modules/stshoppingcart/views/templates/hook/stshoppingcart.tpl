<div class="blockcart {if $hover_display_cp}dropdown_wrap{/if} top_bar_item shopping_cart_style_4 clearfix" data-refresh-url="{$refresh_url}">{strip}
  <a href="{$cart_url}" title="{l s='View my shopping cart' d='Shop.Theme.Transformer'}" rel="nofollow" class="st_shopping_cart header_item mobile_bar_tri cart_mobile_bar_tri mobile_bar_item icone_top" data-name="side_products_cart" data-direction="open_bar_{if $click_on_header_cart==2}left{else}right{/if}">
  <span class="icone_svg"></span>
   <span class="ajax_cart_quantity amount_circle {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>
  </a>{strip}
</div>
