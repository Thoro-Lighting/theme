{*<p class="epresta-stars rating_box sticky_off mb-0" data-id="{$id_product}">
	<i class="fto-star-2{if $rate > 0.3} light on{/if}"></i>
	<i class="fto-star-2{if $rate > 1.3} light on{/if}"></i>
	<i class="fto-star-2{if $rate > 2.3} light on{/if}"></i>
	<i class="fto-star-2{if $rate > 3.3} light on{/if}"></i>
	<i class="fto-star-2{if $rate > 4.3} light on{/if}"></i>

	<span>{$count}</span> 
	<em class="grid-off">{l s=Tools::odmien({$count}, 'opinia', 'opinie', 'opinii') d='Shop.Theme.Transformer'}</em>*}


{if $comments_count}

	<p class="rating_box epresta-stars rating_box sticky_off">

		<span class="prod-rating">{$product_comments_avg}</span>

		<i class="fto-star-2{if $product_comments_avg > 0.3} light{/if}"></i>
		<i class="fto-star-2{if $product_comments_avg > 1.3} light{/if}"></i>
		<i class="fto-star-2{if $product_comments_avg > 2.3} light{/if}"></i>
		<i class="fto-star-2{if $product_comments_avg > 3.3} light{/if}"></i>
		<i class="fto-star-2{if $product_comments_avg > 4.3} light{/if}"></i>


		<span class="grid-off">
			<a class="reviews-more" href="{$url}#comments"
				title="{l s='See all reviews' d='Shop.Theme.Transformer'}" rel="nofollow">
				{$comments_count} 
				{if $language.iso_code == 'pl'}
					{l s=Tools::odmien($comments_count, 'opinia', 'opinie', 'opinii') d='Shop.Theme.Transformer'}
				{/if}
				{if $language.iso_code == 'gb'}
					{l s=Tools::odmien($comments_count, 'review', 'reviews', 'reviews') d='Shop.Theme.Transformer'}
				{/if}
			</a>
		</span>			
	</p>
{/if}