{if $product.show_price}
  <div class="product-prices">{*important refresh*}
    {block name='product_countdown'}
      {if isset($countdown_active) && $countdown_active}
        {if $product.show_price && !$sttheme.is_catalog && $product.has_discount}
          {if ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $product.specific_prices.from && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' < $product.specific_prices.to)}
          <div class="countdown_outer_box">
            <div class="countdown_heading">{l s='Limited time offer' d='Shop.Theme.Transformer'}:</div>
            <div class="countdown_box">
              <i class="icon-clock"></i><span class="countdown_pro c_countdown_timer" data-countdown="{$product.specific_prices.to|date_format:'%Y/%m/%d %H:%M:%S'}" data-gmdate="{gmdate('Y/m/d H:i:s',strtotime($product.specific_prices.to))}" data-id-product="{$product.id|intval}"></span>
            </div>
          </div>
          {elseif ($product.specific_prices.to == '0000-00-00 00:00:00') && ($product.specific_prices.from == '0000-00-00 00:00:00') && $countdown_title_aw_display}
            <div class="countdown_outer_box countdown_pro_perm" data-id-product="{$product.id|intval}">
              <div class="countdown_box">
                <i class="icon-clock"></i><span>{l s='Limited special offer' d='Shop.Theme.Transformer'}</span>
              </div>
            </div>
          {/if}
        {/if}
      {/if}
    {/block}
    {block name='product_price'}
   
      <div
        class="product-price"
        {if $sttheme.google_rich_snippets}
        itemprop="offers"
        itemscope
        itemtype="https://schema.org/Offer"
        {/if}
      >
      
        {if $sttheme.google_rich_snippets}<link itemprop="availability" href="{if isset($product.seo_availability)}{$product.seo_availability}{else}https://schema.org/{if $product.availability=='unavailable'}OutOfStock{else}InStock{/if}{/if}"/>{/if}
        {if $sttheme.display_pro_condition && $product.condition && $sttheme.google_rich_snippets}<link itemprop="itemCondition" href="{$product.condition.schema_url}"/>{/if}
        {if $sttheme.google_rich_snippets}<meta itemprop="priceCurrency" content="{$currency.iso_code}">
                                          <meta itemprop="url" content="{$product.url}">
                                           <meta  itemprop="priceValidUntil" content="{if $product.specific_prices.to}{$product.specific_prices.to|date_format:'%d-%m-%Y'}{else}{$startDate|date_format:"%Y-%m-%d"}{/if}" />
            {/if}

        <div class="current-price">
          <span class="price {if $product.has_discount}promo_price{/if}" {if $sttheme.google_rich_snippets} itemprop="price" content="{$product.price_amount}" {/if}>{$product.price nofilter} {if $sttheme.tax_label_price  == 1}<span class="name_price big sticky_mobile_off">{if $sttheme.type_tax_name  == 1}{l s='(price includes VAT)' d='Shop.Theme.Transformer'}{else}{$product.labels.tax_long}{/if}</span>{/if}</span>
          {if $sttheme.two_prices_price == 1}<p class="price_netto">{$product.price_other nofilter} {if $sttheme.tax_label_price  == 1}<span class="name_price small sticky_mobile_off">{$product.labels.tax_long_other}</span>{/if}</p>{/if}

           {if $sttheme.old_price_form > 0}   
           <p class="info_discount">
          {block name='product_discount'}
            {if $product.has_discount}
                {hook h='displayProductPriceBlock' product=$product type="old_price"}
                {if $sttheme.old_price_form == 1 || $sttheme.old_price_form == 3}<label>{l s='Old price:' d='Shop.Theme.Transformer'}</label>{/if} {if $sttheme.old_price_form < 5 }<span class="regular-price">{$product.regular_price nofilter}</span>{/if}
            {/if}
          {/block}
          {if $sttheme.old_price_form == 1 || $sttheme.old_price_form == 2 || $sttheme.old_price_form > 4}
          {if $product.has_discount}
          {if !$sttheme.hide_discount}
            {if $product.discount_type === 'percentage'}
             {if in_array($sttheme.old_price_form , array(4,5,6))}{l s='save' d='Shop.Theme.Transformer'}{/if} {if $sttheme.old_price_form != 7}<span class="discount discount-percentage">{$product.discount_percentage nofilter}</span>{/if}
            {else}
              {if in_array($sttheme.old_price_form , array(4,5,6))}{l s='save' d='Shop.Theme.Transformer'}{/if} {if $sttheme.old_price_form != 7}<span class="discount discount-amount">{if $sttheme.old_price_form < 4}-{/if}{$product.discount_to_display nofilter}</span>{/if}
            {/if}
          {/if}
          {/if}
          {/if}
          {if $sttheme.old_price_form == 6 }<span class="regular-price">{$product.regular_price nofilter}</span>{/if}
          </p>
          {/if}
        </div>

        
      </div>
    {/block}

    {block name='product_without_taxes'}
      {if $priceDisplay == 2}
        <div class="product-without-taxes">{l s='%price% tax excl.' d='Shop.Theme.Catalog' sprintf=['%price%' => $product.price_tax_exc]}</div>
      {/if}
    {/block}

    {block name='product_pack_price'}
      {if $displayPackPrice}
        <div class="product-pack-price"><span>{l s='Instead of %price%' d='Shop.Theme.Catalog' sprintf=['%price%' => $noPackPrice]}</span></div>
      {/if}
    {/block}

    {block name='product_ecotax'}
      {if $product.ecotax.amount > 0}
        <div class="price-ecotax">{l s='Including %amount% for ecotax' d='Shop.Theme.Catalog' sprintf=['%amount%' => $product.ecotax.value]}
          {if $product.has_discount}
            {l s='(not impacted by the discount)' d='Shop.Theme.Catalog'}
          {/if}
        </div>
      {/if}
    {/block}

    {hook h='displayProductPriceBlock' product=$product type="weight" hook_origin='product_sheet'}
  </div>
{/if}
