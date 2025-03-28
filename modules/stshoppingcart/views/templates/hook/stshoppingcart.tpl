<div class="blockcart {if $hover_display_cp}dropdown_wrap{/if} top_bar_item shopping_cart_style_4 clearfix" data-refresh-url="{$refresh_url}">{strip}
  <a href="{$cart_url}" title="{l s='View my shopping cart' d='Shop.Theme.Transformer'}" rel="nofollow" class="st_shopping_cart header_item mobile_bar_tri cart_mobile_bar_tri mobile_bar_item icone_top" data-name="side_products_cart" data-direction="open_bar_{if $click_on_header_cart==2}left{else}right{/if}">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M5.40039 9.62394L10.2312 4.35394C11.1824 3.31626 12.8184 3.31626 13.7696 4.35394L18.6004 9.62394M21.1979 10.9209L18.4659 19.7209C18.336 20.1393 17.9489 20.4244 17.5108 20.4244H6.55597C6.12009 20.4244 5.73442 20.1421 5.60271 19.7266L2.81317 10.9266C2.60879 10.2819 3.09007 9.62442 3.76642 9.62442H20.2428C20.9167 9.62442 21.3977 10.2774 21.1979 10.9209Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>	
   <span class="ajax_cart_quantity amount_circle {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>
  </a>{strip}
</div>
