{assign var='recomended_producer' value=Configuration::get('ST_BRANDS_RECOMENDED_PRODUCER')}
{assign var='name_brand_featured' value=Configuration::get('ST_BRANDS_NAME_BRAND_FEATURED')}
{assign var='desc_brand_featured' value=Configuration::get('ST_BRANDS_DESC_BRAND_FEATURED')}
{assign var='position_buttons' value=Configuration::get('ST_BRANDS_POSITION_BUTTONS')}

{assign var='pro_per_rec_fw' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_FW')}
{assign var='pro_per_rec_xxl' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_XXL')}
{assign var='pro_per_rec_xl' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_XL')}
{assign var='pro_per_rec_lg' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_LG')}
{assign var='pro_per_rec_md' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_MD')}
{assign var='pro_per_rec_sm' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_SM')}
{assign var='pro_per_rec_xs' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_XS')}

{if isset($brands) && count($brands)}
    <div id="brands_slider_container_{$hook_hash}" class="brands_slider_container_page block products_container">
        <section id="brands_slider_{$hook_hash}" class="brands_slider">
            <div class="brands-list">
                {foreach $brands as $brand}
                    <a href="{$brand.url}" title="{$brand.name}" class="tile-category-link ">
                        <img src="{$brand.image}" alt="{$brand.name}" />
                        <span class="brand-name">{$brand.name}</span>
                        <svg width="62" height="18" viewBox="0 0 62 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M51.7678 1.5L61 8.86861M61 8.86861L52.4271 16.5M61 8.86861H1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <div class="gradient"></div>
                        {if strtotime($brand.date_add) > strtotime("-1 week")}
                            <span class="new-tag">{l s='New' d='Shop.Theme.Global'}</span>
                        {/if}
                    </a>
                {/foreach}
            </div>
        </section>
    </div>
{/if}