{extends file='catalog/listing/product-list.tpl'}
{block name='product_list_header'}
      {if $sttheme.is_mobile_device}
      <div class="page_heading_box bg-top">
          <h1 class="page_heading" data-ish>{$category.name}</h1>
          {if $category.description}
               <div id="category-description">
                    {$category.description nofilter}
               </div>
          {/if}
     </div>
      {/if}
     {hook h='displayCategoryHeader'}
{/block}

{block name='product_list_footer'}
{if $sttheme.category_full_plus == 0 }{hook h='displayCategoryFooter'}{/if}
{/block}














