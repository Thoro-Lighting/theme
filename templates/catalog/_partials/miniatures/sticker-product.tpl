

{strip}
{assign var="has_sticker_static" value=0}
{if isset($stickers) && $stickers}
  {foreach $stickers as $ststicker}
  {if $ststicker.product_off == 0 OR $ststicker.product_off == 2}
   {if !in_array($ststicker.id_st_sticker, explode(',', str_replace(' ', '', $p_c.id_strickers)))} 
  
    {if in_array($ststicker.sticker_position, $sticker_position)}
      {if !$has_sticker_static}<div class="st_sticker_block">{$has_sticker_static=1}{/if}
      {if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}<a{else}<div{/if} {if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}href="{$ststicker.stickers_link}" title="{$ststicker.text}"{/if} class="st_sticker  position layer_btn position_{$ststicker.sticker_position} {if $ststicker.product_width}auto-width{/if} flag_{(int)$ststicker.is_flag} {if in_array(10,$sticker_position) || in_array(11,$sticker_position) || in_array(13,$sticker_position)} st_sticker_static {/if} st_sticker_{$ststicker.id_st_sticker} {if $ststicker.type} st_sticker_type_{$ststicker.type} {/if} {if $ststicker.image_multi_lang} st_sticker_img {/if} {if $ststicker.hide_on_mobile == 1} hidden-md-down {elseif $ststicker.hide_on_mobile == 2} hidden-lg-up {/if} {if $ststicker.text_tooltip}tooltip_{$ststicker.id_st_sticker}_{$product.id_product}{/if}" {if $ststicker.text_tooltip}data-tooltip-content="#tooltip_content_{$ststicker.id_st_sticker}_{$product.id_product}"{/if}>{if $ststicker.image_multi_lang}<img src="{$ststicker.image_multi_lang}" alt="{$ststicker.text}" title="{$ststicker.text}" width="{$ststicker.width}" height="{$ststicker.height}">{else}<span class="st_sticker_text">{$ststicker.text} </span>{/if}{if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}</a>{else}</div>{/if}
    
    
    {if $ststicker.text_tooltip}
<div class="tooltip_templates">
    <span id="tooltip_content_{$ststicker.id_st_sticker}_{$product.id_product}">
        {$ststicker.text_tooltip nofilter}
    </span>
</div>
<script>
    window.addEventListener('load', function(event) {
        $('.tooltip_{$ststicker.id_st_sticker}_{$product.id_product}').tooltipster({
    	   animation: 'fade',
    	   delay: 200,
    	   maxWidth: 450,
    	   theme: 'tooltipster',
    	   trigger: '{if $sttheme.is_mobile_device}click{else}hover{/if}'
    	});
    });
</script>
{/if}
    {/if}
    {/if}
    {/if}
  {/foreach}
{/if}
{if isset($ststickers) && $ststickers}
  {foreach $product.flags as $flag}
  	{foreach $ststickers as $ststicker}
  	{if $ststicker.product_off == 0 OR $ststicker.product_off == 2}
  	 {if !in_array($ststicker.id_st_sticker, explode(',', str_replace(' ', '', $p_c.id_strickers)))} 
	    {if in_array($ststicker.sticker_position, $sticker_position) && ( ($flag.type=='new' &&  $ststicker.type==1) || ($flag.type=='on-sale' &&  $ststicker.type==2) || ($flag.type=='online-only' &&  $ststicker.type==5) || ($flag.type=='pack' &&  $ststicker.type==6) )}
        {if !$has_sticker_static}<div class="st_sticker_block">{$has_sticker_static=1}{/if}
       {if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}<a{else}<div{/if} {if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}href="{$ststicker.stickers_link}" title="{$ststicker.text}"{/if} class="st_sticker layer_btn flag_{(int)$ststicker.is_flag} {if $ststicker.product_width}auto-width{/if} position_{$ststicker.sticker_position} {if in_array(10,$sticker_position) || in_array(11,$sticker_position) || in_array(13,$sticker_position)} st_sticker_static {/if} st_sticker_{$ststicker.id_st_sticker} {if $ststicker.type} st_sticker_type_{$ststicker.type} {/if} {if $ststicker.image_multi_lang} st_sticker_img {/if} {if $ststicker.hide_on_mobile == 1} hidden-md-down {elseif $ststicker.hide_on_mobile == 2} hidden-lg-up {/if} {if $ststicker.text_tooltip}tooltip_{$ststicker.id_st_sticker}_{$product.id_product}{/if}" {if $ststicker.text_tooltip}data-tooltip-content="#tooltip_content_{$ststicker.id_st_sticker}_{$product.id_product}"{/if}>{if $ststicker.image_multi_lang}<img src="{$ststicker.image_multi_lang}" alt="{$ststicker.text}" title="{$ststicker.text}"  width="{$ststicker.width}" height="{$ststicker.height}">{else}<span class="st_sticker_text">{$ststicker.text}</span>{/if}{if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}</a>{else}</div>{/if}
      
      
      {if $ststicker.text_tooltip}
<div class="tooltip_templates">
    <span id="tooltip_content_{$ststicker.id_st_sticker}_{$product.id_product}">
        {$ststicker.text_tooltip nofilter}
    </span>
</div>
<script>
    window.addEventListener('load', function(event) {
        $('.tooltip_{$ststicker.id_st_sticker}_{$product.id_product}').tooltipster({
    	   animation: 'fade',
    	   delay: 200,
    	   maxWidth: 450,
    	   theme: 'tooltipster',
    	   trigger: '{if $sttheme.is_mobile_device}click{else}hover{/if}'
    	});
    });
</script>
{/if}
{/if}
{/if}
{/if}
  	{/foreach}
  {/foreach}
  	{foreach $ststickers as $ststicker}
  	{if $ststicker.product_off == 0 OR $ststicker.product_off == 2}
  	 {if !in_array($ststicker.id_st_sticker, explode(',', str_replace(' ', '', $p_c.id_strickers)))} 
      {if in_array($ststicker.sticker_position, $sticker_position) && ($product.reduction && $product.show_price && !$sttheme.is_catalog &&  $ststicker.type==3)}
        {if !$has_sticker_static}<div class="st_sticker_block">{$has_sticker_static=1}{/if}
        {if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}<a{else}<div{/if} {if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}href="{$ststicker.stickers_link}" title="{$ststicker.text}"{/if} class="st_sticker layer_btn flag_{(int)$ststicker.is_flag} position_{$ststicker.sticker_position} {if $ststicker.product_width}auto-width{/if} {if in_array(10,$sticker_position) || in_array(11,$sticker_position) || in_array(13,$sticker_position)} st_sticker_static {/if} st_sticker_{$ststicker.id_st_sticker} {if $ststicker.type} st_sticker_type_{$ststicker.type} {/if} {if $ststicker.image_multi_lang} st_sticker_img {/if} {if $ststicker.hide_on_mobile == 1} hidden-md-down {elseif $ststicker.hide_on_mobile == 2} hidden-lg-up {/if} {if $ststicker.text_tooltip}tooltip_{$ststicker.id_st_sticker}_{$product.id_product}{/if}" {if $ststicker.text_tooltip}data-tooltip-content="#tooltip_content_{$ststicker.id_st_sticker}_{$product.id_product}"{/if}>{if $ststicker.image_multi_lang}<img src="{$ststicker.image_multi_lang}" alt="{$ststicker.text}" title="{$ststicker.text}"  width="{$ststicker.width}" height="{$ststicker.height}">{else}<span class="st_sticker_text">{$ststicker.text} {if $ststicker.promo_discount}<span class="st_reduce">{if $product.discount_type === 'percentage'}{$product.discount_percentage nofilter}{else}-{$product.discount_to_display nofilter}{/if}</span>{/if}</span>{/if}{if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}</a>{else}</div>{/if}
      {if $ststicker.text_tooltip}
<div class="tooltip_templates">
    <span id="tooltip_content_{$ststicker.id_st_sticker}_{$product.id_product}">
        {$ststicker.text_tooltip nofilter}
    </span>
</div>
<script>
    window.addEventListener('load', function(event) {
        $('.tooltip_{$ststicker.id_st_sticker}_{$product.id_product}').tooltipster({
    	   animation: 'fade',
    	   delay: 200,
    	   maxWidth: 450,
    	   theme: 'tooltipster',
    	   trigger: '{if $sttheme.is_mobile_device}click{else}hover{/if}'
    	});
    });
</script>
{/if}
      {/if}
      {if (!isset($is_from_product_page) || !$is_from_product_page) && in_array($ststicker.sticker_position, $sticker_position) && (($ststicker.type==4 && $sticker_quantity<=0 && !$sticker_allow_oosp && $sticker_quantity_all_versions<=0) || ($ststicker.type==7 && ($sticker_quantity || $sticker_allow_oosp || $sticker_quantity_all_versions)))}
	      {if !$has_sticker_static}<div class="st_sticker_block">{$has_sticker_static=1}{/if}
	      {if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}<a{else}<div{/if} {if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}href="{$ststicker.stickers_link}" title="{$ststicker.text}"{/if} class="st_sticker layer_btn flag_{(int)$ststicker.is_flag} position_{$ststicker.sticker_position} {if $ststicker.product_width}auto-width{/if} {if in_array(10,$sticker_position) || in_array(11,$sticker_position) || in_array(13,$sticker_position)} st_sticker_static {/if} st_sticker_{$ststicker.id_st_sticker} {if $ststicker.type} st_sticker_type_{$ststicker.type} {/if} {if $ststicker.image_multi_lang} st_sticker_img {/if} {if $ststicker.hide_on_mobile == 1} hidden-md-down {elseif $ststicker.hide_on_mobile == 2} hidden-lg-up {/if} {if $ststicker.text_tooltip}tooltip_{$ststicker.id_st_sticker}_{$product.id_product}{/if}" {if $ststicker.text_tooltip}data-tooltip-content="#tooltip_content_{$ststicker.id_st_sticker}_{$product.id_product}"{/if}>{if $ststicker.image_multi_lang}<img src="{$ststicker.image_multi_lang}" alt="{$sticker_stock_text}  title="{$sticker_stock_text}"  width="{$ststicker.width}" height="{$ststicker.height}">{else}<span class="st_sticker_text">{$sticker_stock_text}</span>{/if}{if $ststicker.stickers_link && ($ststicker.link_option == 0 OR $ststicker.link_option == 2)}</a>{else}</div>{/if}
	   {if $ststicker.text_tooltip}
<div class="tooltip_templates">
    <span id="tooltip_content_{$ststicker.id_st_sticker}_{$product.id_product}">
        {$ststicker.text_tooltip nofilter}
    </span>
</div>
<script>
    window.addEventListener('load', function(event) {
        $('.tooltip_{$ststicker.id_st_sticker}_{$product.id_product}').tooltipster({
    	   animation: 'fade',
    	   delay: 200,
    	   maxWidth: 450,
    	   theme: 'tooltipster',
    	   trigger: '{if $sttheme.is_mobile_device}click{else}hover{/if}'
    	});
    });
</script>
{/if}
	    {/if}
	    
	     {/if}
	     {/if}
  	{/foreach}
{/if}
{if $has_sticker_static}</div>{/if}
{/strip}