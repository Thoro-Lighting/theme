<div class="steco_heading steco_flex_container {if $steco.heading_align} steco_flex_center {/if} {if $cloumn_name=="cart" && $steco.cart_summary==2}big_cart_on{/if}">
  {if $cloumn_name=="personal_information"}
  {$step_number = $steco.login_block}
  {$step_icon = $steco.pi_icon}
  {elseif $cloumn_name=="delivery"}
  {$step_number = $steco.delivery_block}
  {$step_icon = $steco.carrier_icon}
  {elseif $cloumn_name=="payment"}
  {$step_number = $steco.payment_block}
  {$step_icon = $steco.payment_icon}
  {elseif $cloumn_name=="summary"}
  {$step_number = $steco.summary_block}
  {elseif $cloumn_name=="summary_address"}
  {$step_number = $steco.summary_address_block}
  {$step_icon = $steco.summary_icon}
  {elseif $cloumn_name=="cart"}
  {$step_number = $steco.display_cart}
  {$step_icon = $steco.cart_icon}
  {/if}
  
 {if $steco.cart_summary==2}
  {if $steco.step_numbers}
    {if $step_icon}
    <div class="steco_step_number steco_mr_r6"><i class="{$step_icon}"></i></div>
    {/if}
  {else}
  {$column_number=0}
  {foreach $steco.columns as $c_key => $c_blocks}
    {if $c_key<=$step_number}
      {foreach $c_blocks as $block_key => $block_name}
      {$column_number=$column_number+1}
      {if $block_name==$cloumn_name}
        {break}
      {/if}
      {/foreach}
    {/if}
  {/foreach}
  {if $cloumn_name=="cart" && $steco.cart_summary==2}<div class="steco_card_number">{/if}<div class="steco_step_number steco_mr_r6">{$column_number}.</div>{if $cloumn_name=="cart" && $steco.cart_summary==2}</div>{/if}
  {/if}{/if}
  <div class="{if !$steco.heading_align} steco_flex_child {/if} {if $cloumn_name=="cart"}flex_container{/if}">
  {if $cloumn_name=="personal_information"}
  <div class="col-lg-12">{l s='Login' d='ShopThemeTransformer'}</div>
  {elseif $cloumn_name=="delivery"}
  <div class="col-lg-12">{l s='Delivery method' d='ShopThemeTransformer'}</div>
  {elseif $cloumn_name=="payment"}
  <div class="col-lg-12">{l s='Payment method' d='ShopThemeTransformer'}</div>
  {elseif $cloumn_name=="cart"}
  {if $steco.cart_summary==2}
  <div class="{if $steco.cart_pro_remove == 0}col-lg-7 col-md-4{else}col-lg-6 col-md-4{/if}"><span class="name_cart">{l s='Cart summary' d='ShopThemeTransformer'}</span><span class="name_summary">{l s='Your basket' d='ShopThemeTransformer'}</span></div>
  <div class="col-lg-2 col-md-2 cart_align_center">{l s='Price' d='ShopThemeTransformer'}</div>
  <div class="col-lg-2 col-md-2 cart_align_center">{l s='Quantity' d='ShopThemeTransformer'}</div>
  {if $steco.cart_pro_remove == 1}<div class="col-lg-1 col-md-1 cart_align_center remove"></div>{/if}
  <div class="col-lg-1 col-md-2 cart_align_center">{l s='Value' d='ShopThemeTransformer'}</div>
  {else}{if $steco.cart_summary==2}{l s='Cart summary' d='ShopThemeTransformer'}{/if}{/if}
  {elseif $cloumn_name=="summary"}
  <div class="col-lg-12">{l s='Confirm the order' d='ShopThemeTransformer'}</div>
  {elseif $cloumn_name=="summary_address"}
  <div class="col-lg-12">{l s='Summary Address' d='ShopThemeTransformer'} {if $steco.coll_ex_address > 0 && $steco.coll_ex_address < 3}<span class="close_summary {if $steco.coll_ex_address == 2}open{/if}"><span class="hide">{l s='hide data' d='ShopThemeTransformer'} <i class="fto-angle-down"></i></span><span class="show">{l s='open data' d='ShopThemeTransformer'} <i class="fto-angle-up"></i></span></span>{/if}</div>
  {/if}
  </div>
</div>