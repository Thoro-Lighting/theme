{if $sold_buyers}<p class="buyers-box">
	{$sold_buyers} {if $language.iso_code == 'gb'}{l s=Tools::odmien($sold_buyers, 'person bought', 'people bought', 'people bought') d='Shop.Theme.Transformer'}{/if}{if $language.iso_code == 'pl'}{l s=Tools::odmien($sold_buyers, 'osoba kupiła', 'osoby kupiły', 'osób kupiło') d='Shop.Theme.Transformer'}{/if} {$sold_count} {if $language.iso_code == 'gb'}{l s=Tools::odmien($sold_count, 'product', 'products', 'products') d='Shop.Theme.Transformer'}{/if}{if $language.iso_code == 'pl'}{l s=Tools::odmien($sold_count, 'produkt', 'produkty', 'produktów') d='Shop.Theme.Transformer'}{/if}
</p>
{/if}
