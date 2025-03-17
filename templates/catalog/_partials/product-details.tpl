 {if $product.grouped_features}

   <div class="content_header container-prod-tab" >
     <div>
       <p>{l s='Learn about the technical specifications' d='Shop.Theme.Catalog'}</p>
       <h2>{l s='Technical specifications' d='Shop.Theme.Catalog'}</h2>
     </div>
   </div>

   <div role="tabpanel"
     class="container-prod-tab tab-pane active st_open {if $sttheme.remove_product_details_tab} product-tab-hide {/if}"
      id="product-details" data-product="{$product.embedded_attributes|json_encode}">
     <div class="container-prod-tab__inner">
       <div class="mobile_tab_title" style="display: block;">
         <a href="javascript:;" class="opener" title="{l s='Data sheet' d='Shop.Theme.Catalog'}">
           <div class="plus_sign"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
               xmlns="http://www.w3.org/2000/svg">
               <path d="M7 1L7 13M13 7L1 7" stroke="#181B1A" stroke-width="1.25" stroke-linecap="round" />
             </svg>
           </div>
           <div class="minus_sign"><svg width="14" height="14" viewBox="0 0 14 2" fill="none"
               xmlns="http://www.w3.org/2000/svg">
               <path d="M13 1L1 1" stroke="#181B1A" stroke-width="1.25" stroke-linecap="round" />
             </svg>
           </div>
         </a>
         <div class="mobile_tab_name">{l s='Data sheet' d='Shop.Theme.Catalog'}</div>
       </div>
       <div class="tab-pane-body">
         {block name='product_features'}
           <section class="product-features">
             <div class="product-features-box">
               <div>
                 {foreach from=$product.grouped_features item=feature}
                   {if !in_array($feature.id_feature, explode(',', str_replace(' ', '', $sttheme.id_feature_list)))}
                     <dl class="data-sheet flex_container">
                       <dt class="name">{$feature.name}</dt>
                       <dd class="value flex_child">
                         {if $sttheme.details_tab_feature_presentation_dec == 0}{$feature.value|escape:'htmlall'|nl2br nofilter}{else}{$feature.value|escape:'htmlall'|nl2br|replace:"<br />":","}{/if}
                       </dd>
                     </dl>
                   {/if}
                 {/foreach}
               </div>
             </div>
           </section>
         {/block}
       </div>
     </div>
   </div>
{/if}