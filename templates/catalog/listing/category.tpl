{extends file='catalog/listing/product-list.tpl'}
{block name='product_list_header'}
     {hook h='displayCategoryHeader'}
{/block}

{block name='product_list_footer'}
{if $sttheme.category_full_plus == 0 }{hook h='displayCategoryFooter'}{/if}
{/block}














