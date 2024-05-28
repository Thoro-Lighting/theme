{extends file='catalog/listing/product-list.tpl'}
{block name='product_list_header'}
 {if $sttheme.is_mobile_device}<div class="page_heading_box bg-top">
  <h1 class="page_heading mb-3">{l s='Collections %brand_name%' sprintf=['%brand_name%' => $manufacturer.name] d='Shop.Theme.Catalog'}</h1>
   <a href="/" class="back-category" title="{l s='Go to:' d='Shop.Theme.Transformer'} {l s='Home' d='Shop.Theme.Transformer'}"><i class="fto-angle-left"></i></a>
      </div> 
{/if}      
  {hook h='displayManufacturerHeader'}
{/block}
{block name='product_list_footer'}
{if $manufacturer.description}
<div id="category-description" class="style_content mb-3 desc-bottom one_page_desc">
     {$manufacturer.description nofilter}
</div>
{/if}
{hook h='displayManufacturerFooter'}
{/block}