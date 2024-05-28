<div class="steco_layer"></div>
<div id="{$identifier}"
          class = "steco_column_inner {[
                      'steco-step'        => true,
                      'steco-reachable'      => $step_is_reachable,
                      'steco-complete'       => $step_is_complete,
                      'steco-incomplete'       => !$step_is_complete
                  ]|classnames}">
<div class="steco_incomplete_message alert alert-danger">{l s='Please complete address information.' d='Shop.Theme.Transformer'}</div>
{include  file = 'module:steasycheckout/views/templates/hook/_partials/notifications.tpl'}
<form
  method="POST"
  action="{url entity='module' name='steasycheckout' controller='default' params=['action' => 'update', 'items'=>28]}"
  class="steco_addresses_from {if $show_delivery_address_form || $show_invoice_address_form} steco_display_none{/if}"
>
      <p class="steco_sub_heading steco_mb_6">{l s='Shipping Address' d='Shop.Theme.Transformer'}</p>
      <p class="steco_sub_heading_mini">{l s='Choose an address to send from your address book' d='Shop.Theme.Transformer'}.</p>
      
     

    {if $customer.addresses|count > 0}
       {* {if $use_same_address && !$cart.is_virtual}
        <p>
          {l s='The selected address will be used both as your personal address (for invoice) and as your delivery address.' d='Shop.Theme.Transformer'}
        </p>
      {elseif $use_same_address && $cart.is_virtual}
        <p>
          {l s='The selected address will be used as your personal address (for invoice).' d='Shop.Theme.Transformer'}
        </p>
      {/if}*}

        <div id="delivery-addresses" class="address-selector js-address-selector">
          {include  file        = 'module:steasycheckout/views/templates/hook/address-selector-block.tpl'
                    addresses   = $customer.addresses
                    name        = "id_address_delivery"
                    selected    = $id_address_delivery
                    type        = "delivery"
                    interactive = !$show_delivery_address_form and !$show_invoice_address_form
                    not_valid_addresses = $not_valid_addresses
          }
        </div>
        {if isset($delivery_address_error)}
          <p class="alert alert-danger js-address-error" name="alert-delivery" id="id-failure-address-{$delivery_address_error.id_address}">{$delivery_address_error.exception}</p>
        {else}
          <p class="alert alert-danger js-address-error" name="alert-delivery" style="display: none">{l s='Your address is incomplete, please update it.' d='Shop.Theme.Transformer'}</p>
        {/if}



      
        {if !$cart.is_virtual}

          <input  id    = "use_same_address"
                  name  = "use_same_address"
                  type  = "checkbox"
                  value = "1"
                  class = "steco-custom-input"
                  style="display: none !important"
                  {if $use_same_address} checked="checked"{/if}
          >
         
          <div class="steco_flex_container steco_flex_start{* invv_adress*}">
            <label>
              <span class="steco-custom-input-box">
                <input  name  = "use_same_address_proxy"
                        type  = "checkbox"
                        value = "1"
                        class = "steco-custom-input"
                        {if !$use_same_address} checked="checked"{/if}
                >
                <span class="steco-custom-input-item steco-custom-input-checkbox"><i class="eco-ok checkbox-checked"></i></span>
              </span>
              {l s='Invoice address differs from shipping address' d='Shop.Theme.Transformer'}
            </label>
          </div>

        <div class="invoice-addresses-container {if $use_same_address} steco_display_none{/if}">
        
         <p class="steco_sub_heading steco_mb_6">{l s='Your Invoice Address' d='Shop.Theme.Transformer'}</p>
          <p class="steco_sub_heading_mini">{l s='Select the invoice address from your address book' d='Shop.Theme.Transformer'}.</p>
        
          <div id="invoice-addresses" class="address-selector js-address-selector">
            {include  file        = 'module:steasycheckout/views/templates/hook/address-selector-block.tpl'
                      addresses   = $customer.addresses
                      name        = "id_address_invoice"
                      selected    = $id_address_invoice
                      type        = "invoice"
                      interactive = !$show_delivery_address_form and !$show_invoice_address_form
                      not_valid_addresses = $not_valid_addresses
            }
          </div>
          {if isset($invoice_address_error)}
            <p class="alert alert-danger js-address-error" name="alert-invoice" id="id-failure-address-{$invoice_address_error.id_address}">{$invoice_address_error.exception}</p>
          {else}
            <p class="alert alert-danger js-address-error" name="alert-invoice" style="display: none">{l s='Your address is incomplete, please update it.' d='Shop.Theme.Transformer'}</p>
          {/if}
        </div>
        {/if}
      {/if}
      <div class="add-address steco_mt_10 steco_text_center">
        <a href="{$new_address_delivery_url}" class="steco_address_btn btn btn-border steco_btn_more_padding btn_arrow black_arrow btn-spin js-submit-active" title="{l s='Add new address' d='Shop.Theme.Transformer'}">{l s='Add new address' d='Shop.Theme.Transformer'}</a>
      </div>

      <br>
</form>

<input type="hidden" id="not-valid-addresses" value="{if isset($not_valid_addresses)}{','|implode:$not_valid_addresses}{/if}">
<div class="steco_addresses_form">
  {if !$customer.is_logged || $customer.is_guest || $show_delivery_address_form || $show_invoice_address_form}

    {if $show_invoice_address_form && !$show_delivery_address_form}
      {render file                      = 'module:steasycheckout/views/templates/hook/address-form.tpl'
              ui                        = $address_form_invoice
              use_same_address          = 0
              type                      = "invoice"
              show_delivery_address_form                      = $show_delivery_address_form
              show_invoice_address_form                      = $show_invoice_address_form
              is_logged                      = $customer.is_logged
              is_guest                      = $customer.is_guest
              addresses_count                      = $addresses_count
      }
    {else}
      {render file                      = 'module:steasycheckout/views/templates/hook/address-form.tpl'
              ui                        = $address_form
              use_same_address          = $use_same_address
              type                      = "delivery"
              show_delivery_address_form                      = $show_delivery_address_form
              show_invoice_address_form                      = $show_invoice_address_form
              is_logged                      = $customer.is_logged
              is_guest                      = $customer.is_guest
              addresses_count                      = $addresses_count
      }
    {/if}
  {/if}
  {if !$customer.is_logged || $customer.is_guest}
    {if isset($address_form_invoice)}{$temp_address_form=$address_form_invoice}{else}{$temp_address_form=$address_form}{/if} 
    {render file                      = 'module:steasycheckout/views/templates/hook/address-form.tpl'
            ui                        = $temp_address_form
            use_same_address          = $use_same_address
            type                      = "invoice"
            show_delivery_address_form                      = $show_delivery_address_form
            show_invoice_address_form                      = $show_invoice_address_form
            is_logged                      = $customer.is_logged
            is_guest                      = $customer.is_guest
            addresses_count                      = $addresses_count
    }
  {/if}
</div>
</div>