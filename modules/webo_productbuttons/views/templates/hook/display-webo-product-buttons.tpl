{if !empty($three_dimensional_link) || !empty($ar_linkx)}
    <div class="product-buttons">
        <div class="product-buttons__wrapper">
            {if !empty($three_dimensional_link)}
                <div class="product-buttons__item">
                    <button type="button" data-toggle="arlity-viewer-open-modal">
                        {l s='Pokaż w 3D' d='Modules.Webodelivery.Front'}
                    </button>
                </div>
            {/if}
            {if !empty($ar_link)}
                <div class="product-buttons__item">
                    <a data-href="{$ar_link}" target="_blank" rel="noopener noreferrer" data-toggle="arlity-card-open-modal">{l s='Pokaż w AR' d='Modules.Webodelivery.Front'}</a>
                </div>
            {/if}
        </div>

    </div>
{/if}