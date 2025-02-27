{if $mm.is_mega}
	<div class="{if !isset($is_mega_menu_vertical)}stmenu_sub{else}stmenu_vs{/if} style_wide {if $mm.alignment !=4}col-md-{($mm.width*10/10)|replace:'.':'-'}{/if}">
		<div class="style_wide_inner">
		
		{if $mm.alignment ==4}<div class="container menu-full-width"><div class="col-md-{($mm.width*10/10)|replace:'.':'-'}">{/if}
		<div class="row m_column_row">
			<div>
			{assign var='t_width_tpl' value=0}
			
			<ul class="stmenu_sub_tabs_btns" role="tablist">
				{foreach $mm.column as $column}
					<li data-js-tab-btn="{$column.id_st_mega_column}" class="stmenu_sub_tabs_name {if $column@index eq 0}active{/if}">
						<span>{$column.title}</span>
					</li>
				{/foreach}
			</ul>

			{foreach $mm.column as $column}
				{if $column.hide_on_mobile == 2}{continue}{/if}
				{if isset($column.children) && count($column.children)}
				{assign var="t_width_tpl" value=$t_width_tpl+$column.width}
				{if $t_width_tpl>$mm.t_width}
					{assign var="t_width_tpl" value=$column.width}
					</div><div class="row m_column_row">
				{/if}
				<div data-js-tab="{$column.id_st_mega_column}" class="stmenu_sub_tab {if $column@index eq 0}active{/if}">
					{foreach $column.children as $block}
						{if $block.hide_on_mobile == 2}{continue}{/if}
						{if $block.item_t==1}
							{if $block.subtype==2  && isset($block.children)}
								<div id="st_menu_block_{$block.id_st_mega_menu}">
									{if $block.show_cate_img}
										{include file="module:stmegamenu/views/templates/hook/stmegamenu-cate-img.tpl" menu_cate=$block.children nofollow=$block.nofollow new_window=$block.new_window}
									{/if}
									<ul class="mu_level_1">
										<li class="ml_level_1">
											<a id="st_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="ma_level_1 ma_item">{$block.children.name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
											{if isset($block.children.children) && is_array($block.children.children) && count($block.children.children)}
												<ul class="mu_level_2">
												{foreach $block.children.children as $product}
												<li class="ml_level_2"><a href="{$product.link}"{if !$menu_title} title="{$product.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if}  class="ma_level_2 ma_item"><i class="fto-angle-right list_arrow"></i>{$product.name|truncate:30:'...'}</a></li>
												{/foreach}
												</ul>	
											{/if}
										</li>
									</ul>	
								</div>
							{elseif $block.subtype==0  && isset($block.children.children) && count($block.children.children)}
								<div id="st_menu_block_{$block.id_st_mega_menu}">
								<div class="row">
								{foreach $block.children.children as $menu}
									<div class="col-md-{((12/$block.items_md)*10/10)|replace:'.':'-'}">
										{if $block.show_cate_img}
											{include file="module:stmegamenu/views/templates/hook/stmegamenu-cate-img.tpl" menu_cate=$menu nofollow=$block.nofollow new_window=$block.new_window}
										{/if}
										<ul class="mu_level_1">
											<li class="ml_level_1">
												<a href="{$menu.link}"{if !$menu_title} title="{$menu.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if}  class="ma_level_1 ma_item">{$menu.name}</a>
												{if isset($menu.children) && is_array($menu.children) && count($menu.children)}
													{assign var='granditem' value=0}
													{if isset($block.granditem) && $block.granditem}{$granditem=1}{/if}
													{include file="module:stmegamenu/views/templates/hook/stmegamenu-category.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu.children granditem=$granditem m_level=2}
												{/if}
											{if !$menu.children && $block.show_more == 2}
												<a href="{$menu.link}" {if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mega_show_more">{if $block.border_bottom_hover == 1}<span class="btn-line">{/if}{if $block.moretext}{$block.moretext}{else}{l s='Show more' d='Shop.Theme.Transformer'}{/if}{if $block.border_bottom_hover == 1}</span>{/if} {if $block.display_icone_more ==1}<i class="fto-angle-right list_arrow"></i>{/if}</a>
											{/if}
												
												{if $block.show_more == 1}<a href="{$menu.link}" {if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mega_show_more">{if $block.border_bottom_hover == 1}<span class="btn-line">{/if}{if $block.moretext}{$block.moretext}{else}{l s='Show more' d='Shop.Theme.Transformer'}{/if}{if $block.border_bottom_hover == 1}</span>{/if} {if $block.display_icone_more ==1}<i class="fto-angle-right list_arrow"></i>{/if}</a>{/if}
												
											</li>
										</ul>	
									</div>
									{if $menu@iteration%$block.items_md==0 && !$menu@last}
									</div><div class="row">
									{/if}
								{/foreach}
								</div>
								</div>
							{elseif $block.subtype==1 || $block.subtype==3}
								<a id="st_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="tile-category-link">
									<img src="{$urls.img_cat_url}{$block.children.id_image}.jpg" />
									<span>
										{$block.children.name}
									</span>
								</a>
							{/if}
						{elseif $block.item_t==2 && isset($block.children) && count($block.children)}
							<div id="st_menu_block_{$block.id_st_mega_menu}">
							<div class="products_sldier_swiper row">
							{foreach $block.children as $product}
								<div class="col-md-{((12/$block.items_md)*10/10)|replace:'.':'-'}">
									{include file="catalog/_partials/miniatures/product.tpl" no_google_rich_snippets=true}
								</div>
							{/foreach}
							</div>
							</div>
						{elseif $block.item_t==3 && isset($block.children) && count($block.children)}
							{if isset($block.subtype) && $block.subtype}
								{foreach $block.children as $brand}
									<a id="st_ma_{$block.id_st_mega_menu}" href="{$link->getmanufacturerLink($brand.id_manufacturer, $brand.link_rewrite)}{$link->getmanufacturerLink($brand.id_manufacturer, $brand.link_rewrite)}"{if !$menu_title} title="{$brand.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="tile-category-link">
										{if $brand.image}
											<img src="{$brand.image}" />
										{/if}
										<span>
											{$brand.name}
										</span>
									</a>			
								{/foreach}
							{else}
								<div id="st_menu_block_{$block.id_st_mega_menu}" class="row">
								{foreach $block.children as $brand}
									<div class="col-md-{((12/$block.items_md)*10/10)|replace:'.':'-'}">
										<a href="{$brand.url}" title="{$brand.name}"{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if}  class="st_menu_brand">
											<img src="{$brand.image}" alt="{$brand.name}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" />
										</a>
									</div>
								{/foreach}
								</div>
							{/if}
						{elseif $block.item_t==4}
							<div id="st_menu_block_{$block.id_st_mega_menu}">
								<ul class="mu_level_1">
									<li class="ml_level_1">
										<a id="st_ma_{$block.id_st_mega_menu}" href="{if $block.m_link}{$block.m_link}{else}javascript:;{/if}"{if !$menu_title} title="{$block.m_title}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if}  class="ma_level_1 ma_item {if !$block.m_link} ma_span{/if}">{if $block.icon_class}<i class="{$block.icon_class}"></i>{/if}{$block.m_name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
										{if isset($block.children) && is_array($block.children) && count($block.children)}
											<ul class="mu_level_2">
											{foreach $block.children as $menu}
												{if $menu.hide_on_mobile == 2}{continue}{/if}
												{include file="module:stmegamenu/views/templates/hook/stmegamenu-link.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu m_level=2}
											{/foreach}
											</ul>
										{/if}
									</li>
								</ul>	
							</div>
						{elseif $block.item_t==5 && $block.html}
							<div id="st_menu_block_{$block.id_st_mega_menu}" class="style_content">
								{$block.html nofilter}
							</div>
						{/if}
					{/foreach}
				</div>
				{/if}
			{/foreach}
			</div>
		</div>
		{if $mm.alignment ==4}</div></div>{/if}
		</div>
	</div>
	{else}
		<ul id="st_menu_multi_level_{$mm.id_st_mega_menu}" class="{if !isset($is_mega_menu_vertical)}stmenu_sub{else}stmenu_vs{/if} stmenu_multi_level">
		{strip}
		{foreach $mm.column as $column}
			{if $column.hide_on_mobile == 2}{continue}{/if}
			{if isset($column.children) && count($column.children)}
				{foreach $column.children as $block}
					{if $block.hide_on_mobile == 2}{continue}{/if}
					{if $block.item_t==1}
						{if $block.subtype==2  && isset($block.children) && count($block.children)}
							{if isset($block.children.children) && is_array($block.children.children) && count($block.children.children)}
								{foreach $block.children.children as $product}
								<li class="ml_level_1"><a href="{$product.link}"{if !$menu_title} title="{$product.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if}  class="ma_level_1 ma_item"><i class="fto-angle-right list_arrow"></i>{$product.name|truncate:30:'...'}</a></li>
								{/foreach}
							{/if}
						{elseif $block.subtype==0  && isset($block.children.children) && count($block.children.children)}
							{foreach $block.children.children as $menu} 
								<li class="ml_level_1">
									{assign var='has_children' value=(isset($menu.children) && is_array($menu.children) && count($menu.children))}
									<a href="{$menu.link}"{if !$menu_title} title="{$menu.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if}  class="ma_level_1 ma_item {if $has_children} has_children {/if}"><i class="fto-angle-right list_arrow"></i>{$menu.name}{if $has_children}<span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span>{/if}</a>
									{if $has_children}
										{include file="module:stmegamenu/views/templates/hook/stmegamenu-category.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu.children m_level=2}
									{/if}
								</li>
							{/foreach}
						{elseif $block.subtype==1 || $block.subtype==3}
							<li class="ml_level_1">
								{assign var='has_children' value=(isset($block.children.children) && count($block.children.children))}
								<a id="st_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if}  class="ma_level_1 ma_item {if $has_children} has_children {/if}"><i class="fto-angle-right list_arrow"></i>{$block.children.name}{if $has_children}<span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span>{/if}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
								{if $has_children}
									{include file="module:stmegamenu/views/templates/hook/stmegamenu-category.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$block.children.children m_level=2}
								{/if}
							</li>
						{/if}
					{elseif $block.item_t==4}
						<li class="ml_level_1">
							{assign var='has_children' value=(isset($block.children) && is_array($block.children) && count($block.children))}
							<a id="st_ma_{$block.id_st_mega_menu}" href="{if $block.m_link}{$block.m_link}{else}javascript:;{/if}"{if !$menu_title} title="{$block.m_title}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if}  class="ma_level_1 ma_item {if $has_children} has_children {/if}{if !$block.m_link} ma_span{/if}"><i class="{if $block.icon_class}{$block.icon_class}{else}fto-angle-right{/if} list_arrow"></i>{$block.m_name}{if $has_children}<span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span>{/if}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
							{if $has_children}
								<ul class="mu_level_2">
								{foreach $block.children as $menu}
									{if $menu.hide_on_mobile == 2}{continue}{/if}
									{include file="module:stmegamenu/views/templates/hook/stmegamenu-link.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu m_level=2}
								{/foreach}
								</ul>
							{/if}
						</li>
					{elseif $block.item_t==5 && $block.html}
						<li class="ml_level_1">
							<div id="st_menu_block_{$block.id_st_mega_menu}" class="style_content">
								{$block.html nofilter}
							</div>
						</li>
					{else}
						
					{/if}
				{/foreach}
			{/if}
		{/foreach}
		{/strip}
		</ul>
	{/if}