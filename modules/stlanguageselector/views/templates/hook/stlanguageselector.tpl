<div id="languages-block-top-mod" class="languages-block">
		{if count($languages) > 1}
		  <ul>
			{foreach from=$languages key=k item=language name=langmod}
	        	<li class="{if $language.id_lang == $current_language.id_lang}active{/if}">
				<a href="{$link->getLanguageLink($language.id_lang)}" title="{$language.name_simple}" rel="alternate" hreflang="{$language.iso_code}">{$language.iso_code}</a>{if !$smarty.foreach.langmod.last}/{/if}</li>
			{/foreach}
		</ul>
		{/if}
</div>