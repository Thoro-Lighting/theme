{extends file='catalog/listing/product-list.tpl'}
{block name='product_list_header'}
      {if $sttheme.is_mobile_device}
      <div class="page_heading_box bg-top">
      {if !empty($category.parent)}<a href="{$category.parent.url}" class="back-category" title="{l s='Go to:' d='Shop.Theme.Transformer'} {$category.parent.name}"><i class="fto-angle-left"></i></a>{else}<a href="/" class="back-category" title="{l s='Go to:' d='Shop.Theme.Transformer'} {l s='Home' d='Shop.Theme.Transformer'}"><i class="fto-angle-left"></i></a>{/if}
      <h1 class="page_heading mb-3" data-ish>{$category.name}</h1>
      </div>
      {/if}
     {hook h='displayCategoryHeader'}
{/block}

{block name='product_list_footer'}
{if $category.description}
    <div id="category-description" class="style_content mb-3 desc-bottom one_page_desc">
     {$category.description nofilter}</div>
{/if}
{if $sttheme.category_full_plus == 0 }{hook h='displayCategoryFooter'}{/if}
{/block}














