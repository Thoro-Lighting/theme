<script async src="https://geowidget.easypack24.net/js/sdk-for-javascript.js"></script>
<link rel="stylesheet" href="https://geowidget.easypack24.net/css/easypack.css"/>

<script type="text/javascript">
  window.easyPackAsyncInit = function () {
    easyPack.init({});

    if ( typeof steco_delivery != 'undefined' ) steco_delivery.managePaczkomaty();
  };

  jQuery(document).on('click', '.paczkomaty-close', function() {
    jQuery('.paczkomaty-wrapper').hide();
  })
</script>

<div class="paczkomaty-info">
  <div class="btn small_cart_btn btn-default steco_btn btn_arrow btn_blus voucher">{l s='Please choose' d='ShopThemeTransformer'}:</span> 
  <span>{$selected_paczkomat}</span></div>
</div>

<div class="steco_paczkomaty_message alert alert-danger">{l s='Please choose.' d='ShopThemeTransformer'}</div>

<div class="paczkomaty-wrapper">
  <div>
    <div id="easypack-map"></div>

    <span class="paczkomaty-close btn" title="{l s='Close window' d='ShopThemeTransformer'}">{l s='Close window' d='ShopThemeTransformer'}</span>
  </div>
</div>