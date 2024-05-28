{block name='checkout_mobile_header'}
  <section id="mobile_bar" class="animated fast bar_checkout">
    <div class="container">
      <div id="mobile_bar_top" class="flex_container">
          <div id="mobile_bar_left" class="flex_child">
          {hook h="displayMobileBarLeft"}
            <a class="mobile_logo svg_logo" href="{$urls.base_url}" title="{$shop.name}">
              <img class="logo" src="/img/logo_thoro.svg" alt="{$shop.name}"/ width="135" height="35">
            </a>
          </div>
           <div id="mobile_bar_right">
            <div class="flex_container">
             <div class="safe-top">{l s='Safe payments<br>thanks to SSL encryption' d='Shop.Theme.Transformer'}</div>
            </div>
          </div>
      </div>
    </div>
  </section>
{/block}
{block name='checkout_header'}
<header id="header_primary" class="checkout_header hide_when_sticky">
  <div class="wide_container">
      <div class="container">
        <div id="checkout_header_wrap" class="flex_container">
            <div class="flex_child"><a class="checkout-shop" href="/"><i class="fto-angle-left"></i> {l s='Return to the shop' d='Shop.Theme.Transformer'}</a></div>
             <a class="shop_logo" href="{$urls.base_url}" title="{$shop.name}">
                <img class="logo" src="/img/logo_thoro.svg" alt="{$shop.name}" width="190px" height="65px"/>
                 </a>
           <div class="flex_child">
              <div class="checkout_header_right flex_container flex_right ">
                <div class="safe-top">{l s='Safe payments<br>thanks to SSL encryption' d='Shop.Theme.Transformer'}</div>
              </div>
          </div>
        </div>
    </div>
  </div>
</header>
{/block}
