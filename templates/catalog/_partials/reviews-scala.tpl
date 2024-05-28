<div class="review-scala sticky_off">
	{foreach $product_comments_rate as $rate => $count}
		<div class="rev-box">
	        <span class="rev-rating mr-1">{$rate}</span> 
	        <span class="rating_box_inner">
	        	<i class="fto-star-2 icon_btn fs_md{if $rate >= 1} light{/if}"></i>
				<i class="fto-star-2 icon_btn fs_md{if $rate >= 2} light{/if}"></i>
				<i class="fto-star-2 icon_btn fs_md{if $rate >= 3} light{/if}"></i>
				<i class="fto-star-2 icon_btn fs_md{if $rate >= 4} light{/if}"></i>
				<i class="fto-star-2 icon_btn fs_md{if $rate >= 5} light{/if}"></i>
	        </span>
	        <div class="rev-line"><div class="line-color" style="width:{if !empty($product_comments)}{($count/count($product_comments))*100}{else}0{/if}%"></div></div>
	        <span class="rev-qt ml-3">({$count})</span>
	    </div>
	{/foreach}
	
	
</div>
<p class="info-reviews mt-4 sticky_off">
	<span><i class="fto-ok-1"></i> {l s='Opinions are issued by customers after purchasing the product.' d='Shop.Theme.Transformer'}</span>
</p>