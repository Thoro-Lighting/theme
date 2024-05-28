{if !$sttheme.is_mobile_device}
<div class="container"><div class="row"><div class="col-lg-12 col-xl-12">
<div class="top-name">
{if $page.page_name == 'category'}
<div class="page_heading_box">
<h1 class="page_heading mb-3" data-ish>{$category.name}</h1>
</div>
{if $category.description}
<div class="show_category"><span class="more-desc" title="{l s='Show description' d='Shop.Theme.Transformer'}">{l s='Show description' d='Shop.Theme.Transformer'}</span></div>
{/if}
{/if}
{if $page.page_name != 'category'}
<div class="page_heading_box bg-top">

        <h1 class="page_heading mb-3" data-ish>{if $page.page_name == 'manufacturer'}{if $page.page_name== 'manufacturer' && isset($manufacturer)}{l s='Collections %brand_name%' sprintf=['%brand_name%' => $manufacturer.name] d='Shop.Theme.Catalog'}{else}{l s='Collections' d='Shop.Theme.Transformer'} {l s='Thoro' d='Shop.Theme.Transformer'}{/if}{else}{$listing.label}{/if}</h1>
        
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
<div class="show_category"><span class="more-desc" title="{l s='Show description' d='Shop.Theme.Transformer'}">{l s='Show description' d='Shop.Theme.Transformer'}</span></div>
{/if}{/if}
</div>

{/if}


</div></div></div>
{/if}