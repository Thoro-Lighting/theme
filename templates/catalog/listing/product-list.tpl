{extends file=$layout}
{block name='content'}
  <section id="main">
    {block name='product_list_header'}
      {if $page.page_name == 'prices-drop'}{hook h='displayPromotion'}{/if}
      {if $page.page_name == 'search'}{hook h='displaySearch'}{/if}
      {if $page.page_name == 'new-products'}{hook h='displayNewproduct'}{/if}
      {if $page.page_name == 'best-sales'}{hook h='displayBestsales'}{/if}
    {/block}
    <section id="products">
      {if $listing.products|count}
        <div id="product-list-top-wrap">
          {block name='product_list_active_filters'}
            {$listing.rendered_active_filters nofilter}
          {/block}
          {block name='product_list_top'}
            {include file='catalog/_partials/products-top.tpl' listing=$listing}
          {/block}
        </div>
        <div id="product-list-wrap">
          {block name='product_list'}
            {include file='catalog/_partials/products.tpl' listing=$listing}
          {/block}
        </div>
        <div id="js-product-list-bottom-wrap">
          {block name='product_list_bottom'}
            {include file='catalog/_partials/products-bottom.tpl' listing=$listing}
          {/block}
        </div>
      {else}
        {if ($category.hide_products != 1 || $page.page_name == 'category') && (!isset($subcategories) || !count($subcategories))}
          {if $page.page_name != 'search' OR ($page.page_name == 'search' && $sttheme.search_page == 0)}
            <article class="alert alert-warning" role="alert" data-alert="warning">
              {l s='There are no products on the category.' d='Shop.Theme.Transformer'}
            </article>
          {else}
            <div class="row">
              <div class="col-md-12 search-subheader">{l s='Cant find what you are looking for?' d='Shop.Theme.Transformer'}
              </div>
              {if $sttheme.search_layout == 1}
                <div class="col-md-6 serach-text">
                  {hook h='displaySearchForm'}
                  {if $sttheme.search_tag_visible == 1}<div class="popular-search-tags">
                      <span>{l s='Popular tags' d='Shop.Theme.Transformer'}</span>
                      {$sttheme.search_tag nofilter}
                    </div>
                  {/if}
                </div>
              {/if}
              <div class="{if $sttheme.search_layout == 1}col-md-6{else}col-lg-6 offset-lg-3{/if} serach-form">
                {widget name="contactform"}
              </div>
            {/if}
          {/if}
        {/if}
    </section>
    {block name='product_list_footer'}
    {/block}
  </section>
{/block}