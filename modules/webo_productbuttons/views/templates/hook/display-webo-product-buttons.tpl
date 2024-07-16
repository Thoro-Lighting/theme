{if !empty($three_dimensional_link) || !empty($ar_link)}
    <div class="product-buttons">
        <div class="product-buttons__wrapper">
            {if !empty($three_dimensional_link)}
                <div class="product-buttons__item">
                    <button type="button" data-toggle="arlity-viewer-open-modal" class="btn_arrow">
                        Pokaż w 3D
                    </button>
                </div>
            {/if}
            {if !empty($ar_link)}
                <div class="product-buttons__item">
                    <a data-href="{$ar_link}" target="_blank" rel="noopener noreferrer" data-toggle="arlity-card-open-modal" class="btn_arrow">{l s='Pokaż w AR' d='Modules.Webodelivery.Front'}</a>
                </div>
            {/if}
        </div>

    </div>
{/if}