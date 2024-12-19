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
<!-- Block currencies module -->

{assign var='currencies_text_sidebar' value=Configuration::get('ST_CURRENCIES_TEXT_SIDEBAR')}
{assign var='currencies_style_sidebar' value=Configuration::get('ST_CURRENCIES_STYLE_SIDEBAR')}
{assign var='currencies_label_sidebar' value=Configuration::get('ST_CURRENCIES_LABEL_SIDEBAR')}

<div class="pad_10 base_list_line medium_list currency-lang">

{if !isset($currencies_style_sidebar) || !$currencies_style_sidebar}
	<div id="currencies_block_top_mod" class="dropdown_wrap top_bar_item">{strip}
	
	
	{if $currencies_text_sidebar == 1}<p class="choose_lc header_item">{l s='Choose currency' d='Shop.Theme.Transformer'}:<p>{/if}
	
	    <div class="dropdown_tri {if count($currencies) > 1} dropdown_tri_in {/if} header_item">
	        {if $currencies_label_sidebar!=1}{$current_currency.sign}&nbsp;{/if}{if $currencies_label_sidebar!=2}{$current_currency.iso_code}{/if}
            <i class="fto-angle-down arrow_down arrow"></i>
          	<i class="fto-angle-up arrow_up arrow"></i>
	    </div>
	    {/strip}
	    {if count($currencies) > 1}
		<div class="dropdown_list" aria-labelledby="{l s='Currency selector' d='Shop.Theme.Transformer'}">
	        <ul class="dropdown_list_ul dropdown_box">
				{foreach from=$currencies key=k item=f_currency}
	            	{if !$f_currency.current}
					<li>
						<a class="dropdown_list_item" href="{$f_currency.url}" title="{$f_currency.name}" rel="nofollow">{if $currencies_label_sidebar!=1}{$f_currency.sign}&nbsp;{/if}{if $currencies_label_sidebar!=2}{$f_currency.iso_code}{/if}</a>
					</li>
	            	{/if}
				{/foreach}
			</ul>
	    </div>
	    {/if}
	</div>
{else}

{if $currencies_text_sidebar == 1}<p class="choose_lc  header_item">{l s='Choose currency' d='Shop.Theme.Transformer'}:<p>{/if}
	{foreach from=$currencies key=k item=f_currency}
	    {if !$f_currency.current}
			<a href="{$f_currency.url}" title="{$f_currency.name}" rel="nofollow" class="top_bar_item currency_selector"><span class="header_item">{if $currencies_label_sidebar!=1}{$f_currency.sign}&nbsp;{/if}{if $currencies_label_sidebar!=2}{$f_currency.iso_code}{/if}</span></a>
		{else}
			<span class="top_bar_item currency_selector"><span class="header_item"><span class="header_item">{if $currencies_label_sidebar!=1}{$f_currency.sign}&nbsp;{/if}{if $currencies_label_sidebar!=2}{$f_currency.iso_code}{/if}</span></span>
		{/if}
	{/foreach}
{/if}
</div>
<!-- /Block currencies module -->