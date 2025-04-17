{extends file='module:steasycheckout/views/templates/hook/_partials/address-form.tpl'}

{block name='form_field'}
  {if $field.name eq "alias" && (!$is_logged || $is_guest)}
    {* we don't ask for alias here *}
  {else}
    {$smarty.block.parent}
  {/if}
{/block}

{block name="address_form_url"}

    <form
      method="POST"
      action="{url entity='module' name='steasycheckout' controller='default' params=['action' => 'update', 'id_address' => $id_address, 'items'=>30]}"
      data-id-address="{$id_address}"
      data-refresh-url="{url entity='module' name='steasycheckout' controller='default' params=['action' => 'addressForm']}"
      class="steco_new_address_form col-md-6 {if $input_fields == 3}animation_form{/if}"
    >

{/block}



{block name='form_buttons'}
  {if $is_logged && !$is_guest}
    <button type="submit" class="btn btn-main steco_btn steco-btn-spin btn_arrow btn_full_width step_down new_adress"><i class="eco-spin5 fs_md steco_mr_r4"></i>{l s='Save the address' d='Shop.Theme.Transformer'}</button>
    {if isset($addresses_count) && $addresses_count}<div class="cancel-address steco_mt_10 steco_text_center"><a class="steco-cancel-address btn black_arrow bt_left continue_shop" href="javascript:;">{l s='Go back' d='Shop.Theme.Transformer'}</a></div>{/if}
  {/if}
{/block}
