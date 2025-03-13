<div class="europ-stars sticky_off" data-id="{$id_product}">
	{*<span>{$count}</span> {l s=Tools::odmien({$count}, 'opinia', 'opinie', 'opinii') d='Shop.Theme.Transformer'}*}
	{if $comments_count}{$comments_count} {if $language.iso_code == 'pl'}{l s=Tools::odmien($comments_count, 'rezenacja', 'recenzje', 'recenzji') d='Shop.Theme.Transformer'}{/if}{if $language.iso_code == 'gb'}{l s=Tools::odmien({$count}, 'review', 'reviews', 'reviews') d='Shop.Theme.Transformer'}{/if}{/if}
</div>


