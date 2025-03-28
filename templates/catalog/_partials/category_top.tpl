
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-xl-12">
        <div class="top-name">
          {if $page.page_name == 'category'}
            <div class="page_heading_box">
              <h1 class="page_heading" data-ish>{$category.name}</h1>
              {if $category.description}
                <div id="category-description">
                  {$category.description nofilter}
                </div>
              {/if}
            </div>
          {/if}
          {if $page.page_name != 'category'}
            <div class="page_heading_box bg-top">
              <h1 class="page_heading" data-ish>
                {if $page.page_name == 'manufacturer'}
                  {if $page.page_name== 'manufacturer' && isset($manufacturer)}
                    {l s='Collections %brand_name%' sprintf=['%brand_name%' => $manufacturer.name] d='Shop.Theme.Catalog'}
                  {else}
                    {l s='Collections' d='Shop.Theme.Transformer'}
                    {l s='Thoro' d='Shop.Theme.Transformer'}
                  {/if}
                {else}{$listing.label}
                {/if}
              </h1>

              {if $page.page_name == 'search'}
                {if $listing.products|count}
                  <div class="search_tag">"{$search_string}"</div>
                {/if}
              {/if}

            </div>
            {if $page.page_name == 'search'}
              {if $listing.products|count}
                {if $sttheme.search_tag_visible_in == 1}
                  <div class="popular-search-tags tag-top"><span>{l s='Other popular searches' d='Shop.Theme.Transformer'}</span>
                    {$sttheme.search_tag nofilter}
                  </div>
                {/if}
              {else}
                <div class="no-search">
                  <span>{l s='Sorry, we couldnt find any search results for your query' d='Shop.Theme.Transformer'}:</span>
                  <p class="search_tag">"{$search_string}"</p>
                </div>
              {/if}
            {/if}

            {if $page.page_name== 'manufacturer' && isset($manufacturer)}
              {if $manufacturer.description}
                <div id="category-description">
                  {$manufacturer.description nofilter}
                </div>
              {/if}
            {/if}
            
          {/if}
        </div>
      </div>
    </div>
  </div>

  {if $page.page_name == 'category' || $page.page_name == 'manufacturer'}
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12">

          <div class=listing_swipers>
            <ul class="listing_btns" role="tablist">
              {foreach $menu_global[0].column as $column}
                <li data-js-tab-btn="listing-{$column.id_st_mega_column}" class="{if $column.id_st_mega_column == 4 && $page.page_name == 'category' || $column.id_st_mega_column == 5 && $page.page_name == 'manufacturer' }active{/if}">
                  {$column.title}
                </li>
              {/foreach}
            </ul>
            {foreach $menu_global[0].column as $column}
              <div data-js-tab="listing-{$column.id_st_mega_column}" class="{if $column.id_st_mega_column == 4 && $page.page_name == 'category' || $column.id_st_mega_column == 5 && $page.page_name == 'manufacturer' }active{/if}">
                <div class="swiper-basic-auto swiper-tiles-default swiper" data-js="swiper-basic-auto">
                  <div class="swiper-wrapper">

                    {foreach $column.children as $block}
                      {if $block.subtype == 1}
                        {foreach $block.children as $brand}
                          <div class="swiper-slide">
                        <a href="{$brand.url}" class="tile-category-link {if $brand.id_manufacturer == $manufacturer.id}current{/if}">
                              <img src="{$brand.image}" alt="{$brand.name}" />
                              <span>
                                {$brand.name}
                              </span>
                            </a>
                          </div>
                        {/foreach}
                      {else}
                        <div class="swiper-slide">
                          <a href="{$block.children.link}" class="tile-category-link {if $block.children.id == $category.id}current{/if}">
                            <img src="{$urls.img_cat_url}{$block.children.id_image}.jpg" alt="{$block.children.name}" />
                            <span>
                              {$block.children.name}
                            </span>
                          </a>
                        </div>
                      {/if}
                    {/foreach}
  
                  </div>
                  <div class="swiper-scrollbar"></div>
                  <div class="swiper_btns_wrapper hidden-md-down">
                    <button class="swiper-product-button-prev"></button>
                    <button class="swiper-product-button-next"></button>
                  </div>
                </div>                
              </div>
            {/foreach}


          </div>

        </div>
      </div>
    </div>

  {/if}
