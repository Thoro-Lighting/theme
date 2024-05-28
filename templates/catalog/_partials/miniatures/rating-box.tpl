{assign var='mobile_rating' value=Configuration::get('ST_PROD_C_MOBILE_RATING')}
{if $product.stproductcomments.display_as_link}

<a href="{url entity='module' name='stproductcomments' controller='list' params=['id_product' => $product.id_product]}" title="{l s='View all reviews' d='Shop.Theme.Transformer'}"
{else}
<div
{/if}
class="pad_tb4 rating_box {if $product.stproductcomments.average > 0 && $product.stproductcomments.average < 1}one{/if} {if $product.stproductcomments.average > 1 && $product.stproductcomments.average < 2}two{/if} {if $product.stproductcomments.average > 2 && $product.stproductcomments.average < 3}three{/if} {if $product.stproductcomments.average > 3 && $product.stproductcomments.average < 4}four{/if} {if $product.stproductcomments.average > 4 && $product.stproductcomments.average < 5}five{/if} {if $mobile_rating == 0}hidden-sm-down{/if}" {*{if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="aggregateRating"  itemscope itemtype="http://schema.org/AggregateRating">{/if}*}
  <span class="rating_box_inner">
      {for $foo=1 to round($product.stproductcomments.average)}
          <i class="fto-star-2 icon_btn fs_md light"></i>
      {/for}
      {if round($product.stproductcomments.average)<5}
          {for $foo=round($product.stproductcomments.average)+1 to 5}
              <i class="fto-star-2 icon_btn fs_md"></i>
          {/for}
      {/if}
      
      {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)}
        <meta itemprop="worstRating" content = "1">
        <meta  itemprop="ratingValue" content="{$product.stproductcomments.average}" />
        <meta  itemprop="reviewCount" content="{$product.stproductcomments.total}" />
        <meta itemprop="bestRating" content = "5">
        {/if}
        
        
      
  </span>
  
 
  
  {if $product.stproductcomments.display_rating==3 || $product.stproductcomments.display_rating==4}<span class="ml-1"><span class="mini">(</span>{$product.stproductcomments.total}<span class="mini">)</span></span>{/if}
{if $product.stproductcomments.display_as_link}
</a>
{else}
</div>
{/if}