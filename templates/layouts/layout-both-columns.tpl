<!doctype html>
<html lang="{$language.iso_code}">

  <head>
	{block name='head'}
	  {include file='_partials/head.tpl'}
	{/block}
  </head>
  <body id="{$page.page_name}" class="{$page.page_name} {$page.body_classes|classnames} {if $page.page_name== 'manufacturer' && isset($manufacturer)} manufacturer-id-{$manufacturer.id}{else}collection-page{/if} lang_{$language.iso_code} {if $sttheme.is_mobile_device} mobile_device {if $sttheme.use_mobile_header==1} use_mobile_header {/if}{else} desktop_device {/if}{if $sttheme.slide_lr_column} slide_lr_column {/if}
  {if $sttheme.use_mobile_header==2} use_mobile_header {/if}
	{block name='body_class'} hide-left-column hide-right-column {/block} hide_width_{$sttheme.left_column_size_lg|replace:'.':'-'} hide_width_lg_{$sttheme.left_column_size_md|replace:'.':'-'}">{*similar code in checkout/checkout.tpl*}
	{block name='hook_after_body_opening_tag'}
      {hook h='displayAfterBodyOpeningTag'}
    {/block}
<div id="st-container" class="st-container st-effect-{$sttheme.sidebar_transition}">
	  <div class="st-pusher">
		<div class="st-content"><!-- this is the wrapper for the content -->
		  <div class="st-content-inner">
	<!-- off-canvas-end -->

	<main id="body_wrapper">
	  {block name='product_activation'}
		{include file='catalog/_partials/product-activation.tpl'}
	  {/block}
	  <div class="header-container header_normal {if $sttheme.transparent_header}transparent-header{/if}">
	  <header id="st_header" class="animated fast">
		
		{assign var='blog_header' value=Configuration::get('ST_BLOG_BLOG_HEADER')}
		{block name='header'}
		{if ($page.page_name == 'module-stblog-default' || $page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblog-article' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default') && $blog_header == 1}
		  {include file='_partials/header-blog.tpl'}
		  {else}{include file='_partials/header.tpl'}{/if}
		{/block}
	  </header>
	  </div>
	  <div class="menu_blur">
	  {block name='breadcrumb'}
		{hook h='displayBreadcrumb' page_name=$page.page_name}
	  {/block}
	  {block name='notifications'}
		{include file='_partials/notifications.tpl'}
	  {/block}
	  
	

	  {block name="full_width_top"}
		  {hook h='displayFullWidthTop'}
		  {hook h='displayFullWidthTop2'}
		  {hook h="displayWrapperTop"}
	  {/block}
	  {if ($page.page_name == 'category' || $page.page_name == 'prices-drop' || $page.page_name == 'search' || $page.page_name == 'manufacturer' || $page.page_name == 'new-products' || $page.page_name == 'best-sales')}
      {include file='catalog/_partials/category_top.tpl'}
      {/if}
      </div>
      <section id="wrapper" class="columns-container menu_blur">
		<div id="columns" class="container">
		 <div class="row">
	
            
			{if $page.page_name == 'cms'}{include file='cms/column_cms.tpl'}{else}
           	{assign var='cols_md' value=12}
			{assign var='cols_lg' value=12}


            {assign var='left_column_size_blog' value=Configuration::get('ST_BLOG_LEFT_COLUMN_SIZE_BLOG')}
            {assign var='deafult_blog_column' value=Configuration::get('ST_BLOG_DEAFULT_BLOG_COLUMN')}
            {assign var='category_blog_column' value=Configuration::get('ST_BLOG_CATEGORY_BLOG_COLUMN')}
            {assign var='article_blog_column' value=Configuration::get('ST_BLOG_ARTICLE_BLOG_COLUMN')}
            
            
            
						{block name="left_column"}
							{$cols_md=($cols_md - $sttheme.left_column_size_md)}
							{$cols_lg=($cols_lg - $sttheme.left_column_size_lg)}
						  <div id="left_column" class="main_column {if $sttheme.slide_lr_column} col-8 {else} col-12 {/if} col-xl-{$sttheme.left_column_size_lg|replace:'.':'-'} col-lg-{$sttheme.left_column_size_md|replace:'.':'-'}">
							  <div class="wrapper-sticky">
							  	<div class="main_column_box">
										{if $page.page_name == 'product'}
										{hook h='displayLeftColumnProduct'}
										{elseif $page.page_name =='cms'}
										{hook h='displayLeftColumnCms'}
										{else}
										{hook h="displayLeftColumn"}
										{/if}
							  	</div>
							  </div>
						  </div>
						{/block}
          
           {if ($deafult_blog_column == 1 && $page.page_name == 'module-stblog-default') || ($article_blog_column == 1 && $page.page_name == 'module-stblog-article') || ($category_blog_column == 1 && ($page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default'))}
			{block name="left_column"}
			 <div id="left_column" class="main_column blog_left {if $sttheme.slide_lr_column} col-8 {else} col-12 {/if} col-xl-{$left_column_size_blog|replace:'.':'-'} col-lg-{$left_column_size_blog|replace:'.':'-'}">
			  <div class="wrapper-sticky">
			  	<div class="main_column_box">
                   {hook h='displayStBlogLeftColumn'}
			  	</div>
			  </div>
			  </div>
			{/block}
          {/if}
          

          {if !in_array($page.page_name, array('module-stblog-default', 'module-stblog-category', 'module-stblog-article', 'module-stblogarchives-default', 'module-stblogsearch-default'))}
					{block name="right_column"}
						{$cols_md=($cols_md - $sttheme.right_column_size_md)}
						{$cols_lg=($cols_lg - $sttheme.right_column_size_lg)}
					  <div id="right_column" class="main_column {if $sttheme.slide_lr_column} col-8 {else} col-12 {/if} col-xl-{$sttheme.right_column_size_lg|replace:'.':'-'} col-lg-{$sttheme.right_column_size_md|replace:'.':'-'}">
						  <div class="wrapper-sticky">
						  	<div class="main_column_box">
									{if $page.page_name == 'product'}
										{hook h='displayRightColumnProduct'}
									{elseif $page.page_name =='cms'}
										{hook h='displayRightColumnCms'}
									{else}
										{hook h="displayRightColumn"}
									{/if}
						  	</div>
						  </div>
					  </div>
					{/block}
			{/if}
			
			
			{if ($deafult_blog_column == 1 && $page.page_name == 'module-stblog-default') || ($article_blog_column == 1 && $page.page_name == 'module-stblog-article') || ($category_blog_column == 1 && ($page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default'))}
			
			{block name="right_column"}
			  <div id="right_column" class="main_column blog_right {if $sttheme.slide_lr_column} col-8 {else} col-12 {/if} col-xl-{$left_column_size_blog|replace:'.':'-'} col-lg-{$left_column_size_blog|replace:'.':'-'}">
			  <div class="wrapper-sticky">
			  	<div class="main_column_box">
				{hook h='displayStBlogRightColumn'}
				</div>
			  </div>
			  </div>
			{/block}
           {/if}


			{block name="content_wrapper"}
			  <div id="center_column" class="{if $page.page_name == 'module-stblog-default' || $page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblog-article' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default'}{if ($deafult_blog_column != 1 && $page.page_name == 'module-stblog-default') || ($article_blog_column != 1 && $page.page_name == 'module-stblog-article') || ($category_blog_column != 1 && ($page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default'))}col-xl-12 col-lg-12 {else} col-xl-{12-$left_column_size_blog|replace:'.':'-'} col-lg-{12-$left_column_size_blog|replace:'.':'-'}{/if} {else} col-xl-{$cols_lg|replace:'.':'-'} col-lg-{$cols_md|replace:'.':'-'}{/if}">
			  	{hook h="displayContentWrapperTop"}
				{block name="content"}
				  <p>Hello world! This is HTML5 Boilerplate.</p>
				{/block}
				{hook h="displayContentWrapperBottom"}
			  </div>
			{/block}
			{/if}
		   
		  </div>
		  </div>
		   
		   
	  </section>
	  <div class="menu_blur">
	  	{block name="full_width_bottom"}
		  {hook h="displayFullWidthBottom"}
		  {hook h="displayWrapperBottom"}
		  {hook h="displayFooterBefore"}
		{/block}
		
		{assign var='blog_footer' value=Configuration::get('ST_BLOG_BLOG_FOOTER')}
		{block name="footer"}
		{if ($page.page_name == 'module-stblog-default' || $page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblog-article' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default') && $blog_footer == 1}
		  {include file="_partials/footer-blog.tpl"}{else}
		  {include file="_partials/footer.tpl"}{/if}
		{/block}
		</div>
	  <!-- #page_wrapper -->
	</main>
	<!-- off-canvas-begin -->
			<div id="st-content-inner-after" data-version="{if isset($sttheme.ps_version)}{$sttheme.ps_version|replace:'.':'-'}{/if}-{if isset($sttheme.theme_version)}{$sttheme.theme_version|replace:'.':'-'}{/if}"></div>
		  </div><!-- /st-content-inner -->
		</div><!-- /st-content -->
		<div id="st-pusher-after"></div>
	  </div><!-- /st-pusher -->
	  {block name="side_bar"}		
		{hook h="displaySideBar"}
	  {/block}
	 
	
		<div id="sidebar_box" class="flex_container menu_blur">
		{block name="right_left_bar"}
			{if $page.page_name == 'cms'}
			{block name='right_left_bar_left_column'}
				{if $sttheme.slide_lr_column}
				<div id="switch_left_column_wrap" class="rightbar_wrap hidden-lg-up">
					<a href="javascript:;" id="switch_left_column" data-name="left_column" data-direction="open_column" class="left_mobile_bar_tri icone_top icone_hover_on rightbar_tri icon_wrap with_text" title="{l s='Toggle left column' d='Shop.Theme.Transformer'}">
					<span class="icone_svg"></span>
					<span class="icon_text">{l s='Left column' d='Shop.Theme.Transformer'}</span></a>   
				</div>
				{/if}
			{/block}
			{/if}
			{hook h="displayRightBar"}
			{if $page.page_name != 'cms'}
			{block name='right_left_bar_right_column'}
				{if $sttheme.slide_lr_column}
				<div id="switch_right_column_wrap" class="rightbar_wrap hidden-lg-up">
					<a href="javascript:;" id="switch_right_column" data-name="right_column" data-direction="open_column" class="right_mobile_bar_tri icone_top icone_hover_on rightbar_tri icon_wrap with_text" title="{l s='Toggle right column' d='Shop.Theme.Transformer'}">
					<span class="icon_text">{l s='Blog' d='Shop.Theme.Transformer'}</span>
					<span class="icone_svg"></span></a>   
				</div>
				{/if}
			{/block}{/if}
		{/block}
		</div>
		<div class="loading-filtr"></div>
	</div><!-- /st-container -->
	<!-- off-canvas-end -->
	<div id="popup_go_login" class="inline_popup_content small_popup mfp-with-anim mfp-hide text-center">
	  <p class="fs_md">{l s='Please sign in first.' d='Shop.Theme.Transformer'}</p>
	  <a href="{$urls.pages.authentication}" class="go" title="{l s='Sign in' d='Shop.Theme.Transformer'}">{l s='Sign in' d='Shop.Theme.Transformer'}</a> 
	</div>
	{if isset($sttheme.tracking_code) && $sttheme.tracking_code}{$sttheme.tracking_code nofilter}{/if}
	{block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}
    {if isset($sttheme.custom_js) && $sttheme.custom_js}
      <script type="text/javascript" src="{$sttheme.custom_js}"></script>
    {/if}
	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    {if isset($sttheme.tracking_code) && $sttheme.tracking_code}{$sttheme.tracking_code nofilter}{/if}
	{block name='hook_before_body_closing_tag'}
      {hook h='displayBeforeBodyClosingTag'}
    {/block}
  </body>

</html>
