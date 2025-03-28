{*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}

{assign var='languages_flags_sidebar' value=Configuration::get('ST_LANGUAGES_FLAGS_SIDEBAR')}
{assign var='languages_style_sidebar' value=Configuration::get('ST_LANGUAGES_STYLE_SIDEBAR')}
{assign var='languages_text_sidebar' value=Configuration::get('ST_LANGUAGES_TEXT_SIDEBAR')}
<div class="pad_10 base_list_line medium_list currency-lang">
{if !isset($languages_style_sidebar) || !$languages_style_sidebar}
	<div id="languages-block-top-mod" class="languages-block top_bar_item dropdown_wrap">{strip}
	
	
	
	{if $languages_text_sidebar == 1}<p class="choose_lc header_item">{l s='Choose language' d='Shop.Theme.Transformer'}:</p>{/if}
	
		<div class="dropdown_tri {if count($languages) > 1} dropdown_tri_in {/if} header_item">
            {if $display_flags_sidebar!=2}{$current_language.name_simple}{/if} {if $display_flags_sidebar!=1}<img src="{$urls.img_lang_url}{$current_language.id_lang}.jpg" alt="{$current_language.iso_code}" width="23" height="15" class="mar_r4" />{/if}
            <i class="fto-angle-down arrow_down arrow"></i>
          	<i class="fto-angle-up arrow_up arrow"></i>
	    </div>
	    {/strip}
		{if count($languages) > 1}
		<div class="dropdown_list" aria-labelledby="{l s='Language selector' d='Shop.Theme.Transformer'}">
			<ul class="dropdown_box dropdown_list_ul">
				{foreach from=$languages key=k item=language}
	        		{if $language.id_lang != $current_language.id_lang}
					<li>
						<a class="dropdown_list_item" href="{$link->getLanguageLink($language.id_lang)}" title="{$language.name_simple}" rel="alternate" hreflang="{$language.iso_code}">
					    {if $display_flags_sidebar!=2}{$language.name_simple}{/if} {if $display_flags_sidebar!=1}<img src="{$urls.img_lang_url}{$language.id_lang}.jpg" alt="{$language.iso_code}" width="23" height="15" class="mar_r4" />{/if}
						</a>
					</li>
					{/if}
				{/foreach}
			</ul>
		</div>
		{/if}
	</div>
{else}

{if $languages_text_sidebar == 1}<p class="choose_lc  header_item">{l s='Choose language' d='Shop.Theme.Transformer'}:</p>{/if}

	{foreach from=$languages key=k item=language}
		{if $language.id_lang != $current_language.id_lang}
			<a href="{$link->getLanguageLink($language.id_lang)}" title="{$language.name_simple}" rel="alternate" hreflang="{$language.iso_code}" class="top_bar_item language_selector">
			 <span class="header_item">{if $languages_flags_sidebar!=1}<img src="{$urls.img_lang_url}{$language.id_lang}.jpg" alt="{$language.iso_code}" width="23" height="15" class="mar_r4" />{/if}{if $languages_flags_sidebar!=2}{$language.name_simple}{/if}</span></a>{else}<span class="top_bar_item language_selector"><span class="header_item">{if $languages_flags_sidebar!=1}<img src="{$urls.img_lang_url}{$current_language.id_lang}.jpg" alt="{$current_language.iso_code}" width="23" height="15" class="mar_r4" />{/if}{if $languages_flags_sidebar!=2}{$current_language.name_simple}{/if}</span></span>
		{/if}
	{/foreach}
{/if}
</div>