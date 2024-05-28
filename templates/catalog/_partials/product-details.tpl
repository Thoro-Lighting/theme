 {if $product.grouped_features}
    
<div role="tabpanel" class="tab-pane {if !$sttheme.remove_product_details_tab && isset($st_active_pro_tab) && $st_active_pro_tab=='product-details'} active {if $sttheme.product_tabs_style==1} st_open {/if} {/if} {if $sttheme.remove_product_details_tab} product-tab-hide {/if}"
     id="product-details"
     data-product="{$product.embedded_attributes|json_encode}"
  >
    <div class="mobile_tab_title">
        <a href="javascript:;" class="opener" title="{l s='Data sheet' d='Shop.Theme.Catalog'}"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></a>
        <div class="mobile_tab_name">{l s='Data sheet' d='Shop.Theme.Catalog'}</div>
    </div>
    <div class="tab-pane-body">
   <p class="tab-head"><span>{l s='Data sheet' d='Shop.Theme.Catalog'}</span></p>
        {block name='product_features'}
          <section class="product-features">
            <div class="product-features-box">
              <div>
               {foreach from=$product.grouped_features item=feature}
                {if !in_array($feature.id_feature, explode(',', str_replace(' ', '', $sttheme.id_feature_list)))} 
                 <dl class="data-sheet flex_container">
                 <dt class="name">{$feature.name}:</dt>
                 <dd class="value flex_child">{if $sttheme.details_tab_feature_presentation_dec == 0}{$feature.value|escape:'htmlall'|nl2br nofilter}{else}{$feature.value|escape:'htmlall'|nl2br|replace:"<br />":","}{/if}</dd>
                 </dl>
                 {/if}
              {/foreach}
              </div>           
             </div>
        </section>
  {/block}
</div>
</div>
{/if}
