$(document).ready(function () {
  if(typeof(stpaa)!='undefined' && stpaa.click_action){
    $(document).on('click', '.st_paa_pro', function(e){
      e.preventDefault();
      $('.product-actions input[name="id_product"]').val($(this).data('id-product'));
      prestashop.emit('updateProduct', {
        eventType: 'updatedProductCombination',
        event: e,
        // Following variables are not used anymore, but kept for backward compatibility
        resp: {},
        reason: {
          productUrl: prestashop.urls.pages.product || '',
        },
      });
      return false;
    });
  }
});