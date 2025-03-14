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
      <a class="nav-link{if !$st_active_pro_tab} active{/if}" data-toggle="tab"  href="#product-details">{l s='Data sheet' d='Shop.Theme.Catalog'}</a>
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
        ({$product_comments|count})
        
        <div class="rating_box mb-0">
          <i class="fto-star-2 icon_btn fs_md light"></i>
          <i class="fto-star-2 icon_btn fs_md light"></i>
          <i class="fto-star-2 icon_btn fs_md light"></i>
          <i class="fto-star-2 icon_btn fs_md light"></i>
          <i class="fto-star-2 icon_btn fs_md light"></i>
        </div>
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
      <div role="tabpanel" class="tab-pane {if $st_active_pro_tab=='attachments'} active {if $sttheme.product_tabs_style==1} st_open {/if} {/if}" id="attachments">
        <div class="mobile_tab_title" style="display: block;">
            <a href="javascript:;" class="opener" title="{l s='Attachments' d='Shop.Theme.Catalog'}"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></a>
              <div class="mobile_tab_name">{l s='Attachments' d='Shop.Theme.Catalog'}</div>
          </div>
        <div class="tab-pane-body">
        <p class="tab-head"><span>{l s='Attachments' d='Shop.Theme.Catalog'}</span></p>
         <section class="product-attachments base_list_line medium_list">
           {foreach from=$product.attachments item=attachment}
             <div class="attachment line_item flex_box">
               <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}" title="{l s='Download' d='Shop.Theme.Actions'}" rel="nofollow" class="mar_r6 font-weight-bold">{$attachment.name}</a>
               <div class="flex_child mar_r6">{$attachment.description}</div>
               <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}" title="{l s='Download' d='Shop.Theme.Actions'}" rel="nofollow">
                 {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted})
               </a>
             </div>
           {/foreach}
         </section>
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
   <div role="tabpanel" class="tab-pane{if count($product_comments) > 2} reviews_more{/if}" id="comments">
      <div class="mobile_tab_title">
        <a href="javascript:;" class="opener" title="{l s='Properties' d='Shop.Theme.Transformer'}"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></a>
          <div class="mobile_tab_name">
            {l s='Reviews' d='Shop.Theme.Transformer'} 
            ({$product_comments|count})
            <div class="rating_box">
              <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 1}light{else}fs_md{/if}"></i>
              <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 1.75}light{else}fs_md{/if}"></i>
              <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 2.75}light{else}fs_md{/if}"></i>
              <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 3.75}light{else}fs_md{/if}"></i>
              <i class="fto-star-2 icon_btn fs_md {if $product_comments_avg >= 4.75}light{else}fs_md{/if}"></i>
            </div>
          </div>
      </div>
      <div class="tab-pane-body">
        <h2 class="tab-head"><span>{l s='Reviews' d='Shop.Theme.Transformer'} ({$product_comments|count})</span></h2>
        <div class="comments-all">
        <div class="pcomments_header">
        <div class="box-center">
	    <div class="review_deatils">
        <p class="overall mb-0">{l s='Overall rating' d='Shop.Theme.Transformer'}</p>
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
            <div class="coments-box line_item general_top_border pt-3 pb-4">
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
            <p class="purch-conf"><i class="fto-ok-1"></i> {l s='Purchase confirmed' d='Shop.Theme.Transformer'}</p>
            </div>
            <div class="pcomment_left_right">
            <div class="pcomment_author pcomment_left_item" itemprop="author">{$row.name}</div>
            <div class="date-add txt-small">{$row.date_add}</div>
            <meta itemprop="datePublished" content="{$row.date_add}" />
            </div>
             </div>
            <div class="pcomment_right">
            <div class="pcomment_body mb-2" itemprop="reviewBody">{$row.content}</div>
            <div class="pcomment_rbr mb-1 txt-small"><span class="mr-2">{l s='Helpful?' d='Shop.Theme.Transformer'}</span>
            <a href="#" data-id="{$row.id_product_comment}" class="usefulness_btn mr-2" title="{l s='Yes' d='Shop.Theme.Transformer'}" rel="nofollow">
              <i class="fto-thumbs-up fs_md mr-1"></i><span>({$row.vote_up})</span>
            </a>
            <a href="#" data-id="{$row.id_product_comment}" class="usefulness_btn mr-2" title="{l s='No' d='Shop.Theme.Transformer'}" rel="nofollow">
              <i class="fto-thumbs-down fs_md mr-1"></i><span>({$row.vote_down})</span>
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