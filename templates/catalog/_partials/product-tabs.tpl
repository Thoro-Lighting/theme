{block name='product_tabs'}

{assign var="st_active_pro_tab" value=""}
<div class="product_info_tabs sttab_block mobile_tab {if $sttheme.prod_tabs_sticky && ($sttheme.product_tabs_style == 0 OR $sttheme.product_tabs_style == 2)}tabs-sticky{/if} {if $sttheme.product_tabs_style==0} sttab_2 sttab_2_2 {elseif $sttheme.product_tabs_style==2} sttab_2 sttab_2_3 {elseif $sttheme.product_tabs_style==3} sttab_3 sttab_3_2 flex_container flex_start {/if}">
<div class="product_tabs_nav">
  <ul class="nav nav-tabs {if !$sttheme.product_tabs} tab_lg {/if}">
    {if $product.description || ($sttheme.remove_product_details_tab == 3 && $product.grouped_features)}
    <li class="nav-item">
      <a class="nav-link{if !$st_active_pro_tab} active{/if}" data-toggle="tab" data="product_desc"  href="#description">{l s='Description' d='Shop.Theme.Catalog'}</a>
    </li>
    {if !$st_active_pro_tab}{assign var="st_active_pro_tab" value="description"}{/if}
    {/if}
    {if $product.grouped_features}
    {if !$sttheme.remove_product_details_tab}
    <li class="nav-item">
      <a class="nav-link{if !$st_active_pro_tab} active{/if}" data-toggle="tab"  href="#product-details">{l s='Technical data' d='Shop.Theme.Catalog'}</a>
    </li>
    {if !$st_active_pro_tab}{assign var="st_active_pro_tab" value="product-details"}{/if}
    {/if}{/if}
    {*{if $product.attachments}
    <li class="nav-item">
      <a class="nav-link{if !$st_active_pro_tab} active{/if}" data-toggle="tab"  href="#attachments">{l s='Attachments' d='Shop.Theme.Catalog'}</a>
    </li>
    {if !$st_active_pro_tab}{assign var="st_active_pro_tab" value="attachments"}{/if}
    {/if}*}
    {foreach from=$product.extraContent item=extra key=extraKey}
        {if $extra.moduleName == 'stproductlinknav' || $extra.moduleName == 'ststickers' || $extra.moduleName == 'stvideo'}{continue}{/if}
        {if $extra.moduleName == 'stthemeeditor'}
          {if $sttheme.display_pro_tags==1 && isset($extra.content.tags)}
            <li class="nav-item">
              <a class="nav-link{if !$st_active_pro_tab} active{/if}" data-toggle="tab"  data-module="{$extra.moduleName}" href="#porudct-tags-tab">{l s='Tags' d='Shop.Theme.Transformer'}</a>
            </li>
            {if !$st_active_pro_tab}{assign var="st_active_pro_tab" value="porudct-tags-tab"}{/if}
          {/if}
          {continue}
        {/if}
        {if $extra.moduleName == 'steasycontent'}
          {if isset($extra.content.tabs) && $extra.content.tabs}
            {foreach $extra.content.tabs as $es}
            <li class="nav-item">
              <a class="nav-link{if !$st_active_pro_tab} active{/if}" data-toggle="tab"  data-module="{$extra.moduleName}" href="#easycontent-tab-{$es.id_st_easy_content}">{$es.title}</a>
            </li>
            {if !$st_active_pro_tab}{assign var="st_active_pro_tab" value="easycontent-tab-`$es.id_st_easy_content`"}{/if}
            {/foreach}
          {/if}
          {continue}
        {/if}
        <li class="nav-item">
          <a class="nav-link{if !$st_active_pro_tab} active{/if}" data-toggle="tab"  data-module="{$extra.moduleName}" href="#extra-{$extraKey}">{$extra.title}</a>
          {if !$st_active_pro_tab}{assign var="st_active_pro_tab" value="extra-`$extraKey`"}{/if}
        </li>
    {/foreach}
    {if $product_comments|count}
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" title="{l s='Reviews' d='Shop.Theme.Transformer'}" href="#comments">
        {l s='Reviews' d='Shop.Theme.Transformer'}
      </a>
    </li>
    {/if}


  </ul>
</div>

  <div class="tab-content">
  {if $product.description || $sttheme.remove_product_details_tab == 3}
   <div role="tabpanel" class="tab-pane {if $st_active_pro_tab=='description'}active{/if} st_open" id="description">
      <div class="tab-pane-body">
         {block name='product_description'}
            <div class="product-description">
          <div class="style_content" {if $sttheme.google_rich_snippets} itemprop="description" {/if}>{$product.description nofilter}</div>
        
      
           {foreach from=$product.extraContent item=extra key=extraKey}
                {if $extra.moduleName == 'steasycontent' && isset($extra.content.description) && $extra.content.description}
                    {$extra.content.description nofilter}
                {/if}
            {/foreach}
           </div>
         {/block}
        </div>
        
   </div>
{/if}

   {block name='product_details'}
     {include file='catalog/_partials/product-details.tpl'}
   {/block}
   {block name='product_attachments'}
     {if $product.attachments}
      <div role="tabpanel" class="container-prod-tab tab-pane {if $st_active_pro_tab=='attachments'} active {if $sttheme.product_tabs_style==1} st_open {/if} {/if}" id="attachments">
        <div class="container-prod-tab__inner">
          <div class="mobile_tab_title" style="display: block;">
              <a href="javascript:;" class="opener" title="{l s='Attachments' d='Shop.Theme.Catalog'}">
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
                <div class="mobile_tab_name">{l s='Attachments' d='Shop.Theme.Catalog'}</div>
            </div>
          <div class="tab-pane-body">
          <section class="product-attachments base_list_line medium_list">
            {foreach from=$product.attachments item=attachment}
              <div class="attachment">
                <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}" title="{l s='Download' d='Shop.Theme.Actions'}" rel="nofollow">
                  <svg xmlns="http://www.w3.org/2000/svg" height="30" version="1.1" viewBox="-53 1 511 511.99906" width="25">
                    <g id="surface1">
                    <path d="M 276.410156 3.957031 C 274.0625 1.484375 270.84375 0 267.507812 0 L 67.777344 0 C 30.921875 0 0.5 30.300781 0.5 67.152344 L 0.5 444.84375 C 0.5 481.699219 30.921875 512 67.777344 512 L 338.863281 512 C 375.71875 512 406.140625 481.699219 406.140625 444.84375 L 406.140625 144.941406 C 406.140625 141.726562 404.65625 138.636719 402.554688 136.285156 Z M 279.996094 43.65625 L 364.464844 132.328125 L 309.554688 132.328125 C 293.230469 132.328125 279.996094 119.21875 279.996094 102.894531 Z M 338.863281 487.265625 L 67.777344 487.265625 C 44.652344 487.265625 25.234375 468.097656 25.234375 444.84375 L 25.234375 67.152344 C 25.234375 44.027344 44.527344 24.734375 67.777344 24.734375 L 255.261719 24.734375 L 255.261719 102.894531 C 255.261719 132.945312 279.503906 157.0625 309.554688 157.0625 L 381.40625 157.0625 L 381.40625 444.84375 C 381.40625 468.097656 362.113281 487.265625 338.863281 487.265625 Z M 338.863281 487.265625 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"/>
                    <path d="M 305.101562 401.933594 L 101.539062 401.933594 C 94.738281 401.933594 89.171875 407.496094 89.171875 414.300781 C 89.171875 421.101562 94.738281 426.667969 101.539062 426.667969 L 305.226562 426.667969 C 312.027344 426.667969 317.59375 421.101562 317.59375 414.300781 C 317.59375 407.496094 312.027344 401.933594 305.101562 401.933594 Z M 305.101562 401.933594 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"/>
                    <path d="M 194.292969 357.535156 C 196.644531 360.007812 199.859375 361.492188 203.320312 361.492188 C 206.785156 361.492188 210 360.007812 212.347656 357.535156 L 284.820312 279.746094 C 289.519531 274.796875 289.148438 266.882812 284.203125 262.308594 C 279.253906 257.609375 271.339844 257.976562 266.765625 262.925781 L 215.6875 317.710938 L 215.6875 182.664062 C 215.6875 175.859375 210.121094 170.296875 203.320312 170.296875 C 196.519531 170.296875 190.953125 175.859375 190.953125 182.664062 L 190.953125 317.710938 L 140 262.925781 C 135.300781 257.980469 127.507812 257.609375 122.5625 262.308594 C 117.617188 267.007812 117.246094 274.800781 121.945312 279.746094 Z M 194.292969 357.535156 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"/>
                    </g>
                  </svg>
                  {$attachment.name}
                </a>
              </div>
            {/foreach}
          </section>
          </div>
        </div>
       </div>
     {/if}
   {/block}
   {foreach from=$product.extraContent item=extra key=extraKey}
       {if $extra.moduleName == 'stproductlinknav' || $extra.moduleName == 'ststickers' || $extra.moduleName == 'stvideo'}{continue}{/if}
       {if $extra.moduleName == 'stthemeeditor'}
           {if $sttheme.display_pro_tags==1 && isset($extra.content.tags)}
            <div role="tabpanel" class="tab-pane {if $st_active_pro_tab=='porudct-tags-tab'} active {if $sttheme.product_tabs_style==1} st_open {/if} {/if}" id="porudct-tags-tab">
                <div class="mobile_tab_title">
                    <a href="javascript:;" class="opener" title="{l s='Tags' d='Shop.Theme.Transformer'}"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></a>
                      <div class="mobile_tab_name">{l s='Tags' d='Shop.Theme.Transformer'}</div>
                  </div>
                <div class="tab-pane-body">
              <p class="tab-head"><span>{l s='Tags' d='Shop.Theme.Catalog'}</span></p>
                  {foreach $extra.content.tags as $tag}
                      <a href="{url entity='search' params=['tag' => $tag|urlencode]}" title="{l s='More about' d='Shop.Theme.Transformer'} {$tag}" target="_top">{$tag}</a>{if !$tag@last}, {/if}
                  {/foreach}
                </div>
            </div>
            {/if}
          {continue}
        {/if}
        {if $extra.moduleName == 'steasycontent'}
          {if isset($extra.content.tabs) && $extra.content.tabs}
            {foreach $extra.content.tabs as $es}
            <div role="tabpanel" class="tab-pane {if $st_active_pro_tab=="easycontent-tab-`$es.id_st_easy_content`"} active {if $sttheme.product_tabs_style==1} st_open {/if} {/if}" id="easycontent-tab-{$es.id_st_easy_content}">
                <div class="mobile_tab_title">
                    <a href="javascript:;" class="opener" title="{$es.title}"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></a>
                      <div class="mobile_tab_name">{$es.title}</div>
                  </div>
                <div class="tab-pane-body">
               <p class="tab-head"><span>{$es.title}</span></p>
                    {$es.tab_content nofilter}
                </div>
           </div>
            {/foreach}
          {/if}
          {continue}
        {/if}
       <div role="tabpanel" class="tab-pane {$extra.attr.class} {if $st_active_pro_tab=="extra-`$extraKey`"} active {if $sttheme.product_tabs_style==1} st_open {/if} {/if}" id="extra-{$extraKey}" {foreach $extra.attr as $key => $val} {$key}="{$val}"{/foreach}>
            <div class="mobile_tab_title">
                <a href="javascript:;" class="opener" title="{$extra.title}"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></a>
                  <div class="mobile_tab_name">{$extra.title}</div>
              </div>
            <div class="tab-pane-body">
            <p class="tab-head"><span>{$extra.title}</span></p>
            {$extra.content nofilter}
            </div>
       </div>
   {/foreach}
   {if $product_comments|count}
   <div role="tabpanel" class="container-prod-tab st_open tab-pane{if count($product_comments) > 2} reviews_more{/if}" id="comments">
      <div class="content_header">
          <p>{l s='Get to know customer reviews' d='Shop.Theme.Transformer'}</p>
          <h2>{l s='Reviews' d='Shop.Theme.Transformer'} ({$product_comments|count})</h2>
      </div>
      <div class="tab-pane-body">
        <div class="comments-all">
        <div class="pcomments_header">
        <div class="box-center">
	    <div class="review_deatils">
        <p class="overall">{l s='Overall rating' d='Shop.Theme.Transformer'}</p>
        <div class="center-box">
        <div class="fs_lg general_right_border my-2 mr-3">{$product_comments_avg}<span> | 5</span></div>
        <div class="general_left_border">
          <span class="rating_box_inner">
           <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 1}light{else}fs_md{/if}"></i>
            <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 1.5}light{else}fs_md{/if}"></i>
            <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 2.5}light{else}fs_md{/if}"></i>
            <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 3.5}light{else}fs_md{/if}"></i>
            <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 4.5}light{else}fs_md{/if}"></i>     
          </span>
       <div class="ammount">{hook h='displayStarsMini' id_product=$product.id_product}</div>
		</div>
        </div>
        </div>
        {include file='catalog/_partials/reviews-scala.tpl'}
        </div>
        </div>
        
        <div itemprop="review" itemscope itemtype="https://schema.org/Review">
        <div class="st_product_comment_list base_list_line large_list mb-4">
          {foreach $product_comments as $row name=foo}
            <div class="coments-box line_item general_top_border py-3">
            <div class="pcomment-for-reply">
            <div class="pcomment_left">
            <div class="pcomment_left_left">
            <div class="rating_box pcomment_left_item mar_b6" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
            <span class="rating_box_inner">
            <i class="fto-star-2 icon_btn fs_md {if $row.rate >= 1}light{else}fs_md{/if}"></i>
            <i class="fto-star-2 icon_btn fs_md {if $row.rate >= 2}light{else}fs_md{/if}"></i>
            <i class="fto-star-2 icon_btn fs_md {if $row.rate >= 3}light{else}fs_md{/if}"></i>
            <i class="fto-star-2 icon_btn fs_md {if $row.rate >= 4}light{else}fs_md{/if}"></i>
            <i class="fto-star-2 icon_btn fs_md {if $row.rate >= 5}light{else}fs_md{/if}"></i>           
            </span>
            <meta itemprop="worstRating" content = "0" />
            <meta itemprop="ratingValue" content = "{$row.rate}" />
            <meta itemprop="bestRating" content = "5" />
            </div>
            <p class="purch-conf mb-4"><svg width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.2953 0.77002L4.1358 7.97002L1.69531 5.51574" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
             {l s='Purchase confirmed' d='Shop.Theme.Transformer'}</p>
            </div>
            <div class="pcomment_left_right">
            <div class="date-add">{$row.date_add}</div>
            <meta itemprop="datePublished" content="{$row.date_add}" />
            </div>
             </div>
            <div class="pcomment_right">
            <div class="pcomment_body mb-4" itemprop="reviewBody">{$row.content}</div>
            <div class="pcomment_rbr mb-1"><span class="mr-4">{l s='Helpful?' d='Shop.Theme.Transformer'}</span>
            <a href="#" data-id="{$row.id_product_comment}" class="usefulness_btn mr-2" title="{l s='Yes' d='Shop.Theme.Transformer'}" rel="nofollow">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.0195 8.37988H16.7835C17.1244 8.37989 17.4596 8.46703 17.7573 8.63301C18.0551 8.79899 18.3054 9.03831 18.4847 9.32825C18.6639 9.61819 18.766 9.94913 18.7814 10.2896C18.7968 10.6302 18.7249 10.969 18.5725 11.2739L15.0725 18.2739C14.9064 18.6063 14.6509 18.8859 14.3347 19.0813C14.0186 19.2767 13.6542 19.3801 13.2825 19.3799H9.26553C9.10253 19.3799 8.93953 19.3599 8.78053 19.3199L5.01953 18.3799M12.0195 8.37988V3.37988C12.0195 2.84945 11.8088 2.34074 11.4337 1.96567C11.0587 1.5906 10.55 1.37988 10.0195 1.37988H9.92453C9.42453 1.37988 9.01953 1.78488 9.01953 2.28488C9.01953 2.99888 8.80853 3.69688 8.41153 4.29088L5.01953 9.37988V18.3799M12.0195 8.37988H10.0195M5.01953 18.3799H3.01953C2.4891 18.3799 1.98039 18.1692 1.60532 17.7941C1.23024 17.419 1.01953 16.9103 1.01953 16.3799V10.3799C1.01953 9.84945 1.23024 9.34074 1.60532 8.96567C1.98039 8.5906 2.4891 8.37988 3.01953 8.37988H5.51953" stroke="#177637" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>({$row.vote_up})</span>
            </a>
            <a href="#" data-id="{$row.id_product_comment}" class="usefulness_btn mr-2" title="{l s='No' d='Shop.Theme.Transformer'}" rel="nofollow">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.0168 2.37988L11.2568 1.43988C11.0982 1.40013 10.9353 1.37998 10.7718 1.37988H6.75384C6.38235 1.3799 6.0182 1.48338 5.70221 1.67872C5.38623 1.87407 5.1309 2.15357 4.96484 2.48588L1.46484 9.48588C1.31247 9.7908 1.24056 10.1296 1.25594 10.4701C1.27132 10.8106 1.37348 11.1416 1.55271 11.4315C1.73195 11.7215 1.98231 11.9608 2.28004 12.1268C2.57776 12.2927 2.91297 12.3799 3.25384 12.3799H8.01784H10.0178M15.0168 2.37988L15.0178 11.3799L11.6258 16.4679C11.2288 17.0629 11.0178 17.7609 11.0178 18.4759C11.0178 18.9749 10.6128 19.3799 10.1128 19.3799H10.0168C9.48641 19.3799 8.9777 19.1692 8.60262 18.7941C8.22755 18.419 8.01684 17.9103 8.01684 17.3799V12.3799M15.0168 2.37988H17.0178C17.5483 2.37988 18.057 2.5906 18.4321 2.96567C18.8071 3.34074 19.0178 3.84945 19.0178 4.37988V10.3799C19.0178 10.9103 18.8071 11.419 18.4321 11.7941C18.057 12.1692 17.5483 12.3799 17.0178 12.3799H14.5178" stroke="#DB0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>({$row.vote_down})</span>
            </a>
            </div>
            </div>
             </div>
          
            </div>
          {/foreach}
          <p class="more-reviews mt-4"><span title="{l s='See all reviews' d='Shop.Theme.Transformer'}">{l s='See all reviews' d='Shop.Theme.Transformer'}  <i class="fto-down-open-big" title="{l s='See all reviews' d='Shop.Theme.Transformer'}"></i></span></p>
           <script>
      		window.addEventListener('load', function(event) {
	            $('.more-reviews').on('click', function() {
			        $( ".more-reviews").toggleClass('open');
			        $( ".st_product_comment_list").toggleClass('open');
		        }); 
	        });
	    </script>
          
          </div>
          </div>
        
        </div>
      </div>
</div>
  {/if}
  
   
</div>


</div>
{/block}