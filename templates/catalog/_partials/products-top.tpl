<div id="js-product-list-top" class="products-selection flex_container general_top_border general_bottom_border">
      {block name='sort_by'}
        {include file='catalog/_partials/sort-orders.tpl' sort_orders=$listing.sort_orders}
      {/block}
  {if $sttheme.product_view_swither}
  <div class="list_grid_switcher {if $sttheme.product_view_swither_mobile == 0}hidden-sm-down{/if}">
    <div class="grid {if !$sttheme.list_grid} selected {/if}" title="{l s='Grid view' d='Shop.Theme.Transformer'}"><i class="fto-th-large-1"></i></div>
    <div class="list {if $sttheme.list_grid} selected {/if}" title="{l s='List view' d='Shop.Theme.Transformer'}"><i class="fto-th-list-1"></i></div>
  </div>
  {/if}

  <div class="flex_child">
  </div>
  {assign var='pagination_top' value=Configuration::get('STSN_PAGINATION_TOP')}
  {if !$sttheme.is_mobile_device}{if $pagination_top == 0}
  {include file='_partials/pagination-sample.tpl' pagination=$listing.pagination}{elseif $pagination_top == 1}
  {include file='_partials/pagination.tpl' pagination=$listing.pagination}
  {/if}{/if}
  {assign var='pagination_top_mobile' value=Configuration::get('STSN_PAGINATION_TOP_MOBILE')}
  {if $sttheme.is_mobile_device}{if $pagination_top_mobile == 0}
  {include file='_partials/pagination-sample.tpl' pagination=$listing.pagination}{elseif $pagination_top_mobile == 1}
  {include file='_partials/pagination.tpl' pagination=$listing.pagination}
  {/if}{/if}
  <a id="rightbar_facet_search" data-name="side_facets" data-direction="open_bar_right" href="javascript:;" class="mobile_bar_tri m_filtr_fixed" rel="nofollow" title="{l s='Filter By' d='Shop.Theme.Actions'}">
  <span>{l s='Filters' d='Shop.Theme.Transformer'}</span> (<span class="filter_count"></span>)</a>
</div>