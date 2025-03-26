<div id="js-product-list-top" class="products-selection general_top_border general_bottom_border">
  <div class="flex_container">
    <a id="rightbar_facet_search" data-name="side_facets" data-direction="open_bar_right" href="javascript:;"
    class="mobile_bar_tri m_filtr_fixed" rel="nofollow" title="{l s='Filter By' d='Shop.Theme.Actions'}">
      <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.46154 12.1826H17.5385M4 7.18262H20M10.1538 17.1826H13.8462" stroke="#181B1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span>{l s='Filters' d='Shop.Theme.Transformer'}</span>
    </a>

    {if $sttheme.product_view_swither}
      <div class="list_grid_switcher {if $sttheme.product_view_swither_mobile == 0}hidden-sm-down{/if}">
        <div class="grid {if !$sttheme.list_grid} selected {/if}" title="{l s='Grid view' d='Shop.Theme.Transformer'}"><i
            class="fto-th-large-1"></i></div>
        <div class="list {if $sttheme.list_grid} selected {/if}" title="{l s='List view' d='Shop.Theme.Transformer'}"><i
            class="fto-th-list-1"></i></div>
      </div>
    {/if}

    <div class="flex_child">
    </div>
    {block name='sort_by'}
      {include file='catalog/_partials/sort-orders.tpl' sort_orders=$listing.sort_orders}
    {/block}
  </div>

      {assign var='pagination_top' value=Configuration::get('STSN_PAGINATION_TOP')}
      {if !$sttheme.is_mobile_device}
        {if $pagination_top == 0}
        {include file='_partials/pagination-sample.tpl' pagination=$listing.pagination}{elseif $pagination_top == 1}
          {include file='_partials/pagination.tpl' pagination=$listing.pagination}
        {/if}
      {/if}
      {assign var='pagination_top_mobile' value=Configuration::get('STSN_PAGINATION_TOP_MOBILE')}
      {if $sttheme.is_mobile_device}
        {if $pagination_top_mobile == 0}
        {include file='_partials/pagination-sample.tpl' pagination=$listing.pagination}{elseif $pagination_top_mobile == 1}
          {include file='_partials/pagination.tpl' pagination=$listing.pagination}
        {/if}
      {/if}
  
</div>