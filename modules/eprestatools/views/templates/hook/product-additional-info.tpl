<div class="inline_popup_wrap pro_right_item">
<a class="inline_popup_tri " href="#inline_popup_content_ship" title="{l s='Check shipping costs' d='Shop.Theme.Transformer'}" rel="nofollow">
{l s='Free shipping' d='Shop.Theme.Transformer'}
{*{if $cart_carrier_cost_amount <= 0}
            {l s='Free shipping' d='Shop.Theme.Transformer'}
         {else}
            {l s='Shipping from' d='Shop.Theme.Transformer'}: {$min_cost}
         {/if}*} <span class="more_ship">({l s='read more' d='Shop.Theme.Transformer'})</span><i class="fto-angle-right"></i>
</a>

<div id="inline_popup_content_ship" class="inline_popup_content mfp-hide mfp-with-anim">
<p class="h-top">{l s='Shipping costs' d='Shop.Theme.Transformer'}</p>
      {if !empty($cart_carrier->id)}
         <div id="carrier_top" class="mb-4">
            <p class="mb-0">{l s='Currently your selected courier is' d='Shop.Theme.Transformer'} {$cart_carrier->name}: 
            <span class="carrier-cost">{if $cart_carrier_cost_amount > 0}{$cart_carrier_cost}{else}{l s='Free shipping' d='Shop.Theme.Transformer'}{/if}</span></p>
         
         {if $cart_remaining_amount > 0}
            <p id="carrier_top_free" class="mb-0">{l s='Missing free delivery' d='Shop.Theme.Transformer'}: <span>{$cart_remaining}</span></p>
         {/if}
         </div>
      {/if}

      {foreach $carriers as $carrier}
         <div class="mb-0 flex_container flex_box flex_left mb-3">
            {if $carrier.img}<div><img decoding="async" src="{$carrier.img}" alt="{$carrier.name}" width="60px" height="41px" class="mr-3"></div>{/if}
            <div class="flex_child">
               {$carrier.name}: 
               <span class="carrier-cost">{if $carrier.cost_amount > 0}{$carrier.cost}{else}Darmowa wysyłka{/if}</span>
               {*<small>{$carrier.delay}</small>*}
               {if $carrier.remaining_amount > 0}
                  <p id="carrier_bottom_free" class="mb-0">
                     {l s='Missing free delivery' d='Shop.Theme.Transformer'}: <span>{$carrier.remaining}</span>
                  </p>
               {/if}
            </div>
         </div>
      {/foreach}
</div>
</div>
