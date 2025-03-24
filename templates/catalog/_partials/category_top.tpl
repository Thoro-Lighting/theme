{if !$sttheme.is_mobile_device}
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

          {assign var='categories' value=Category::getSimpleCategories($language.id)}
          {assign var='manufacturers' value=Manufacturer::getLiteManufacturersList($language.id)}
          <div class=listing_swipers>
            <ul class="listing_btns" role="tablist">
              <li data-js-tab-btn="cat" class="active">
                {l s='Categories' d='Shop.Theme.Transformer'}
              </li>
              <li data-js-tab-btn="manufacturers" class="">
                {l s='Manufacturers' d='Shop.Theme.Transformer'}
              </li>
            </ul>
            <div data-js-tab="cat" class="active">
              {foreach from=$categories item=category}
                {assign var='categories' value=Category::getLink($category.id)}
                <div class="listing-item">
                  <a href="{$category.url}">
                    {$category.name}
                    {if isset($category.image)}
                      <img src="{$category.image.medium.url}" alt="{$category.name}">
                    {/if}
                  </a>
                </div>
              {/foreach}
            </div>
            <div data-js-tab="manufacturers" class="">
              {foreach from=$manufacturers item=manufacturer}
                <div class="listing-item">
                  <a href="{$manufacturer.url}">
                    {$manufacturer.name}
                    {if isset($manufacturer.image)}
                      <img src="{$manufacturer.image.medium.url}" alt="{$category.name}">
                    {/if}
                  </a>
                </div>
              {/foreach}

            </div>
          </div>

        </div>
      </div>
    </div>

  {/if}


{/if}