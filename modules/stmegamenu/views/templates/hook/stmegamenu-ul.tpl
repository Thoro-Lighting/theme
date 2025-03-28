<ul class="st_mega_menu mu_level_0"> 
	{if isset($stvertical) && count($stvertical) && isset($is_mega_menu_main) && $is_mega_menu_main}
		{assign var='responsive_max' value=Configuration::get('STSN_RESPONSIVE_MAX')}
		
	
	<li id="st_menu_0" class="ml_level_0 {if Configuration::get('STSN_MENU_VER_OPEN')}menu_ver_open_{if $responsive_max==1}lg{elseif $responsive_max==2}xl{elseif $responsive_max==3}xxl{else}md{/if}{/if} menu_home">
			<a id="st_ma_0" href="javascript:;" class="ma_level_0 {if $mm.menucss_class}menu_privat_{$mm.menucss_class}{/if}" title="{l s='Categories' d='Shop.Theme.Transformer'}" rel="nofollow"><i class="fto-menu"></i>{l s='Categories' d='Shop.Theme.Transformer'}</a>
			<ul class="stmenu_sub stmenu_vertical col-md-3 {if Configuration::get('STSN_MENU_VER_SUB_STYLE')} stmenu_vertical_box {/if}">
				{foreach $stvertical as $mm}
				{if ($mm.vis_link == 1) || ($mm.vis_link == 2 && ($page.page_name == 'module-stblog-default' || $page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblog-article' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default')) || ($mm.vis_link == 3 && ($page.page_name != 'module-stblog-default' && $page.page_name != 'module-stblog-category' && $page.page_name != 'module-stblog-article' && $page.page_name != 'module-stblogarchives-default' && $page.page_name != 'module-stblogsearch-default')) || ($mm.vis_link == 4 && $page.page_name == 'index') || ($mm.vis_link == 5 && $page.page_name != 'index')}
	              {if !in_array($customer.id_default_group, explode(',', str_replace(' ', '', $mm.group_id)))}
					<li id="st_menu_{$mm.id_st_mega_menu}" class="mv_level_1 {if $mm.menucss_class}menu_privat_{$mm.menucss_class}{/if}"><a id="st_ma_{$mm.id_st_mega_menu}" href="{if $mm.m_link}{$mm.m_link}{else}javascript:;{/if}" class="mv_item{if isset($mm.column) && count($mm.column)} is_parent{/if} {if $mm.bg_pattern && $mm.hide_on_mobile_icone < 2}menu-patern-desk{/if}"{if !$menu_title} title="{$mm.m_name|strip_tags}"{/if}{if $mm.nofollow} rel="nofollow"{/if}{if $mm.new_window} target="_blank"{/if}>{if $mm.bg_pattern && $mm.hide_on_mobile_icone < 2}<img src="/modules/stthemeeditor/svg/{$mm.bg_pattern}.svg" alt="{$mm.m_name|strip_tags}" class="menu-svg-desk">{/if}{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{$mm.m_name nofilter}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</a>
						{if isset($mm.column) && count($mm.column)}
							{include file="module:stmegamenu/views/templates/hook/stmegamenu-sub.tpl" is_mega_menu_vertical=1}
						{/if}
					</li>
					{/if}
					{/if}
				{/foreach}
			</ul> 
		</li>{/if}
		
	
	{foreach $stmenu as $mm}
		{if $mm.hide_on_mobile == 2}{continue}{/if}
		
	
		{if ($mm.vis_link == 1) || ($mm.vis_link == 2 && ($page.page_name == 'module-stblog-default' || $page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblog-article' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default')) || ($mm.vis_link == 3 && ($page.page_name != 'module-stblog-default' && $page.page_name != 'module-stblog-category' && $page.page_name != 'module-stblog-article' && $page.page_name != 'module-stblogarchives-default' && $page.page_name != 'module-stblogsearch-default')) || ($mm.vis_link == 4 && $page.page_name == 'index') || ($mm.vis_link == 5 && $page.page_name != 'index')}
		{if !in_array($customer.id_default_group, explode(',', str_replace(' ', '', $mm.group_id)))}
		<li id="st_menu_{$mm.id_st_mega_menu}" class="ml_level_0 {if $mm.menucss_class}menu_privat_{$mm.menucss_class}{/if} m_alignment_{$mm.alignment} {if $mm.bg_pattern && $mm.hide_on_mobile_icone < 2}menu-patern-desk{/if}">
			<a id="st_ma_{$mm.id_st_mega_menu}" href="{if $mm.m_link}{$mm.m_link}{else}javascript:;{/if}" class="ma_level_0{if isset($mm.column) && count($mm.column)} is_parent{/if}{if $mm.m_icon} ma_icon{/if}"{if !$menu_title} title="{$mm.m_name|strip_tags}"{/if}{if $mm.nofollow} rel="nofollow"{/if}{if $mm.new_window} target="_blank"{/if}>{if $mm.bg_pattern && $mm.hide_on_mobile_icone < 2}<img src="/modules/stthemeeditor/svg/{$mm.bg_pattern}.svg" alt="{$mm.m_name|strip_tags}" class="menu-svg-desk">{/if}{if $mm.m_icon}{$mm.m_icon nofilter}{else}{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{$mm.m_name nofilter}{/if}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</a>
			{if isset($mm.column) && count($mm.column)}
				{include file="module:stmegamenu/views/templates/hook/stmegamenu-sub.tpl"}
			{/if}
		</li>{/if}{/if}
	{/foreach}
</ul>
{assign var='blurred_menu_bg' value=Configuration::get('STSN_BLURRED_MENU_BG')}
{if $blurred_menu_bg == 2}<div class="menu_blur color-bg"></div>{/if} 