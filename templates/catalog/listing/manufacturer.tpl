{extends file='catalog/listing/product-list.tpl'}
{block name='product_list_header'}
  {if $sttheme.is_mobile_device}<div class="page_heading_box bg-top">
      <h1 class="page_heading mb-3">
        {l s='Collections %brand_name%' sprintf=['%brand_name%' => $manufacturer.name] d='Shop.Theme.Catalog'}</h1>
        {if $manufacturer.description}
          <div id="category-description">
            {$manufacturer.description nofilter}
          </div>
        {/if}
    </div>
  {/if}
  {hook h='displayManufacturerHeader'}
{/block}
{block name='product_list_footer'}
  {hook h='displayManufacturerFooter'}
{/block}