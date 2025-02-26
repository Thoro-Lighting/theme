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
<!-- MODULE st megamenu -->
{if !isset($is_mega_menu_column)}
	{assign var='is_mega_menu_column' value=0}
{/if}
{if isset($stmenu)}
<ul id="st_mobile_menu_ul" class="mo_mu_level_0">
<div class="menu-one menu-bottom">
	{foreach $stmenu as $mm}
	{if $mm.shortcuts == 0}
	{if !in_array($customer.id_default_group, explode(',', str_replace(' ', '', $mm.group_id)))}
		{if $mm.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
		<li class="mo_ml_level_0 mo_ml_column {if $mm.menucss_class}menumob_privat_{$mm.menucss_class}{/if} {if $mm.bg_pattern && $mm.hide_on_mobile_icone > 0}menu-patern{/if}">
		    {assign var='has_children' value=(isset($mm.column) && count($mm.column))}
			<div class="menu_a_wrap">
			{if $mm.m_link}
				<a id="st_mo_ma_{$mm.id_st_mega_menu}" href="{$mm.m_link}" class="mo_ma_level_0"{if !$menu_title} title="{$mm.m_name|strip_tags}"{/if}{if $mm.nofollow} rel="nofollow"{/if}{if $mm.new_window} target="_blank"{/if}>{if $mm.bg_pattern && $mm.hide_on_mobile_icone > 0}<img src="/modules/stthemeeditor/svg/{$mm.bg_pattern}.svg" alt="{$mm.m_name|strip_tags}" class="menu-svg">{/if}{if $mm.m_icon}{$mm.m_icon nofilter}{else}{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{if $mm.html_mobile}{$mm.m_name|strip_tags}{else}{$mm.m_name nofilter}{/if}{/if}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</a>
			{else}
				<span id="st_mo_ma_{$mm.id_st_mega_menu}" class="mo_ma_level_0"{if !$menu_title} title="{$mm.m_name|strip_tags}"{/if}{if $mm.nofollow} rel="nofollow"{/if}>{if $mm.bg_pattern && $mm.hide_on_mobile_icone > 0}<img src="/modules/stthemeeditor/svg/{$mm.bg_pattern}.svg" alt="{$mm.m_name|strip_tags}" class="menu-svg">{/if}{if $mm.m_icon}{$mm.m_icon nofilter}{else}{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{if $mm.html_mobile}{$mm.m_name|strip_tags}{else}{$mm.m_name nofilter}{/if}{/if}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</span>
			{/if}
			</div>
			<p class="mo_mu_level_1 mo_sub_ul show-all-cat"><a href="{if $mm.m_link}{$mm.m_link}{else}javascript:;{/if}" class="mo_sub_a" title="{l s='See all from' d='Shop.Theme.Transformer'}: {$mm.m_name nofilter}">{l s='See all from' d='Shop.Theme.Transformer'}: {$mm.m_name nofilter}</a></p>
			{if $has_children}
				{foreach $mm.column as $column}
					{if $column.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
					<div class="st_mobile_menu_page" data-js-sidemenu-btn="{$column.id_st_mega_column}">
							{if $column.title == 'Kategorie'}
								<img class="st_mobile_menu_img" src="{$urls.img_url}img_kategorie.png" />
							{elseif $column.title == 'Kolekcje'}
								<img class="st_mobile_menu_img" src="{$urls.img_url}img_kolekcje.png" />
							{/if}
						<div class="st_mobile_menu_page_title">
							<span>{$column.title}</span>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.71094 17.29L14.2909 12.2892L9.71094 7.29004" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
					</div>
					
					<div data-js-sidemenu="{$column.id_st_mega_column}">
						<div class="st-menu-header">
							<button data-js-sidemenu-close>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15 7L10 12L15 17" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</button>
							<div class="st-menu-title">{$column.title}</div>						
						</div>
						<div class="st_mobile_menu-content">
							<div class="st_mobile_menu-content__grid">
								{if isset($column.children) && count($column.children)}
									{foreach $column.children as $block}
										{if $block.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
										{if $block.item_t==1}
											{if $block.subtype==2  && isset($block.children)}
												<ul class="mo_mu_level_1 mo_sub_ul">
													<li class="mo_ml_level_1 mo_sub_li">
														{assign var='has_children' value=(isset($block.children.children) && is_array($block.children.children) && count($block.children.children))}
														<div class="menu_a_wrap">
														<a id="st_mo_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$block.children.name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
															{if $has_children}
															<span class="opener"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></span>
															{/if}
														</div>
														{if $has_children}
															<ul class="mo_mu_level_2 mo_sub_ul">
															{foreach $block.children.children as $product}
															<li class="mo_ml_level_2 mo_sub_li"><a href="{$product.link}"{if !$menu_title} title="{$product.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_2 mo_sub_a">{$product.name|truncate:45:'...'}</a></li>
															{/foreach}
															</ul>	
														{/if}
													</li>
												</ul>	
											{elseif $block.subtype==0  && isset($block.children.children) && count($block.children.children)}
												{foreach $block.children.children as $menu}
													<ul class="mo_mu_level_1 mo_sub_ul">
														<li class="mo_ml_level_1 mo_sub_li">
															{assign var='has_children' value=(isset($menu.children) && is_array($menu.children) && count($menu.children))}
															<div class="menu_a_wrap">
															<a href="{$menu.link}"{if !$menu_title} title="{$menu.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$menu.name}</a>
															{if $has_children}<span class="opener"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></span>{/if}
															</div>
															{if $has_children}
																{include file="module:stmegamenu/views/templates/hook/stmegamenu-category.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu.children m_level=2 ismobilemenu=true}
															{/if}
														</li>
													</ul>	
												{/foreach}
											{elseif $block.subtype==1 || $block.subtype==3}
												<a id="st_mo_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mobile-category-link">
													{if $block.children.id_image}
														<img src="{$urls.img_cat_url}{$block.children.id_image}.jpg" />
													{/if}
													<span>{$block.children.name}</span>
												</a>
											{/if}
										{elseif $block.item_t==2 && isset($block.children) && count($block.children)}
											<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column">
											<div class="products_sldier_swiper">
											{foreach $block.children as $product}
											<div class="m-b-1">
												{include file="catalog/_partials/miniatures/product.tpl" no_google_rich_snippets=true}
											</div>
											{/foreach}
											</div>
											</div>
										{elseif $block.item_t==3 && isset($block.children) && count($block.children)}
											{if isset($block.subtype) && $block.subtype}
												{foreach $block.children as $brand}
														<a href="{$brand.url}" title="{$brand.name}"{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mobile-category-link">
															{if $brand.image}
																<img src="{$brand.image}" />
															{/if}
															<span>{$brand.name}</span>
														</a>
												{/foreach}
											{else}
												<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column">
													{foreach $block.children as $brand}
														<div class="mo_brand_div">
															<a href="{$brand.url}" title="{$brand.name}"{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="st_menu_brand">
																<img src="{$brand.image}" alt="{$brand.name}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" />
															</a>
														</div>
													{/foreach}
												</div>
											{/if}
										{elseif $block.item_t==4}
											<ul class="mo_mu_level_1 mo_sub_ul">
												<li class="mo_ml_level_1 mo_sub_li">
													{assign var='has_children' value=(isset($block.children) && is_array($block.children) && count($block.children))}
													<div class="menu_a_wrap">
													<a  id="st_mo_ma_{$block.id_st_mega_menu}" href="{if $block.m_link}{$block.m_link}{else}javascript:;{/if}"{if !$menu_title} title="{$block.m_title}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a {if !$block.m_link} ma_span{/if}">{if $block.icon_class}<i class="{$block.icon_class}"></i>{/if}{$block.m_name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
													{if $has_children}
														{foreach $block.children as $menu}
															{if $menu.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
															<span class="opener"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></span>
															{break}
														{/foreach}
													{/if}
													</div>
													{if $has_children}
														{foreach $block.children as $menu}
															{if $menu.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
															<ul class="mo_mu_level_2 mo_sub_ul">
															{include file="module:stmegamenu/views/templates/hook/stmegamenu-link.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu m_level=2 ismobilemenu=true}
															</ul>
														{/foreach}
													{/if}
												</li>
											</ul>	
										{elseif $block.item_t==5 && $block.html}
											<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column style_content">
												{$block.html nofilter}
											</div>
										{/if}
									{/foreach}
								{/if}
							</div>
						</div>
					</div>
				{/foreach}
			{/if}
			
		</li>{/if}{/if}
	{/foreach}
</div>
<div class="shortcuts-box">

{* <div class="shortcuts-info" title="{l s='Shortcuts' d='Shop.Theme.Transformer'}">{l s='See also' d='Shop.Theme.Transformer'}</div> *}

				<div class="menu-one menu-shortcuts">
	{foreach $stmenu as $mm}
	{if !in_array($customer.id_default_group, explode(',', str_replace(' ', '', $mm.group_id)))}
	{if $mm.shortcuts == 1}
		{if $mm.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
		<li class="mo_ml_level_0 mo_ml_column {if $mm.menucss_class}menumob_privat_{$mm.menucss_class}{/if} {if $mm.bg_pattern && $mm.hide_on_mobile_icone > 0}menu-patern{/if}">
		    {assign var='has_children' value=(isset($mm.column) && count($mm.column))}
			<div class="menu_a_wrap">
			<a id="st_mo_ma_{$mm.id_st_mega_menu}" href="{if $mm.m_link}{$mm.m_link}{else}javascript:;{/if}" class="mo_ma_level_0 {if !$mm.m_link}open-slide-menu{/if}"{if !$menu_title} title="{$mm.m_name|strip_tags}"{/if}{if $mm.nofollow} rel="nofollow"{/if}{if $mm.new_window} target="_blank"{/if}>{if $mm.bg_pattern && $mm.hide_on_mobile_icone > 0}<img src="/modules/stthemeeditor/svg/{$mm.bg_pattern}.svg" alt="{$mm.m_name|strip_tags}" class="menu-svg">{/if}{if $mm.m_icon}{$mm.m_icon nofilter}{else}{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{if $mm.html_mobile}{$mm.m_name|strip_tags}{else}{$mm.m_name nofilter}{/if}{/if}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</a>
			{if $has_children}<span class="opener"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></span>{/if}
			</div>
			{if $has_children}
				{foreach $mm.column as $column}
					{if $column.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
					{if isset($column.children) && count($column.children)}
						{foreach $column.children as $block}
							{if $block.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
							{if $block.item_t==1}
								{if $block.subtype==2  && isset($block.children)}
									<ul class="mo_mu_level_1 mo_sub_ul">
										<li class="mo_ml_level_1 mo_sub_li">
											{assign var='has_children' value=(isset($block.children.children) && is_array($block.children.children) && count($block.children.children))}
											<div class="menu_a_wrap">
											<a id="st_mo_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$block.children.name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
												{if $has_children}
												<span class="opener"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></span>
												{/if}
											</div>
											{if $has_children}
												<ul class="mo_mu_level_2 mo_sub_ul">
												{foreach $block.children.children as $product}
												<li class="mo_ml_level_2 mo_sub_li"><a href="{$product.link}"{if !$menu_title} title="{$product.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_2 mo_sub_a">{$product.name|truncate:45:'...'}</a></li>
												{/foreach}
												</ul>	
											{/if}
										</li>
									</ul>	
								{elseif $block.subtype==0  && isset($block.children.children) && count($block.children.children)}
									{foreach $block.children.children as $menu}
										<ul class="mo_mu_level_1 mo_sub_ul">
											<li class="mo_ml_level_1 mo_sub_li">
												{assign var='has_children' value=(isset($menu.children) && is_array($menu.children) && count($menu.children))}
												<div class="menu_a_wrap">
												<a href="{$menu.link}"{if !$menu_title} title="{$menu.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$menu.name}</a>
												{if $has_children}<span class="opener"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></span>{/if}
												</div>
												{if $has_children}
													{include file="module:stmegamenu/views/templates/hook/stmegamenu-category.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu.children m_level=2 ismobilemenu=true}
												{/if}
											</li>
										</ul>	
									{/foreach}
								{elseif $block.subtype==1 || $block.subtype==3}
									<ul class="mo_mu_level_1 mo_sub_ul">
										<li class="mo_ml_level_1 mo_sub_li">
											{assign var='has_children' value=(isset($block.children.children) && count($block.children.children))}
											<div class="menu_a_wrap">
											<a  id="st_mo_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$block.children.name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
											{if $has_children}<span class="opener"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></span>{/if}
											</div>
    										{if $has_children}
												{include file="module:stmegamenu/views/templates/hook/stmegamenu-category.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$block.children.children m_level=2 ismobilemenu=true}
											{/if}
										</li>
									</ul>	
								{/if}
							{elseif $block.item_t==2 && isset($block.children) && count($block.children)}
								<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column">
								<div class="products_sldier_swiper">
								{foreach $block.children as $product}
								<div class="m-b-1">
									{include file="catalog/_partials/miniatures/product.tpl" no_google_rich_snippets=true}
								</div>
								{/foreach}
								</div>
								</div>
							{elseif $block.item_t==3 && isset($block.children) && count($block.children)}
								{if isset($block.subtype) && $block.subtype}
									{foreach $block.children as $brand}
    									<ul class="mo_mu_level_1 mo_sub_ul">
											<li class="mo_ml_level_1 mo_sub_li">
												<a href="{$brand.url}" title="{$brand.name}"{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$brand.name}</a>
											</li>
										</ul>	
									{/foreach}
								{else}
									<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column">
										{foreach $block.children as $brand}
	    									<div class="mo_brand_div">
												<a href="{$brand.url}" title="{$brand.name}"{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="st_menu_brand">
								                    <img src="{$brand.image}" alt="{$brand.name}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" />
								                </a>
											</div>
										{/foreach}
									</div>
								{/if}
							{elseif $block.item_t==4}
								<ul class="mo_mu_level_1 mo_sub_ul">
									<li class="mo_ml_level_1 mo_sub_li">
										{assign var='has_children' value=(isset($block.children) && is_array($block.children) && count($block.children))}
										<div class="menu_a_wrap">
										<a  id="st_mo_ma_{$block.id_st_mega_menu}" href="{if $block.m_link}{$block.m_link}{else}javascript:;{/if}"{if !$menu_title} title="{$block.m_title}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a {if !$block.m_link} ma_span{/if}">{if $block.icon_class}<i class="{$block.icon_class}"></i>{/if}{$block.m_name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
										{if $has_children}
											{foreach $block.children as $menu}
												{if $menu.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
												<span class="opener"><i class="fto-angle-down plus_sign"></i><i class="fto-angle-up minus_sign"></i></span>
												{break}
											{/foreach}
										{/if}
										</div>
										{if $has_children}
											{foreach $block.children as $menu}
												{if $menu.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
												<ul class="mo_mu_level_2 mo_sub_ul">
												{include file="module:stmegamenu/views/templates/hook/stmegamenu-link.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu m_level=2 ismobilemenu=true}
												</ul>
											{/foreach}
										{/if}
									</li>
								</ul>	
							{elseif $block.item_t==5 && $block.html}
								<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column style_content">
									{$block.html nofilter}
								</div>
							{/if}
						{/foreach}
					{/if}
				{/foreach}
			{/if}
		</li>
		{/if}{/if}
	{/foreach}
	</div>
	</div>
</ul>
{/if}
<!-- /MODULE st megamenu -->