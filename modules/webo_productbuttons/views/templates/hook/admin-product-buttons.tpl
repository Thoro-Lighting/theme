<div class="row mt-4">
    <div class="col-md-12">
        <h2>{l s='Dodatkowe przycisku na karcie produktu' d='Modules.WeboProductbuttons.Admin'}</h2>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="three_dimensional">
                {l s='3D ID' d='Modules.WeboProductbuttons.Admin'}
            </label>
            <input type="text"
                   id="three_dimensional"
                   name="three_dimensional"
                   class="form-control js-webo-admin-products-input"
                   {if !empty($delivery_time_on_stock)}
                       value="{$delivery_time_on_stock}"
                   {/if}
            >
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-control-label" for="ar">
                {l s='AR ID' d='Modules.WeboProductbuttons.Admin'}
            </label>
            <input type="text"
                   id="ar"
                   name="ar"
                   class="form-control js-webo-admin-products-input"
                   {if !empty($ar)}
                       value="{$ar}"
                   {/if}
            >
        </div>
    </div>

    <input type="hidden" name="weboDeliveryTimeUpdateAfter" class="d-none js-webo-admin-products-input" value="0">
</div>
