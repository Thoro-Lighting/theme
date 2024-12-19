{*
* 2007-2012 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 17677 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file='page.tpl'}

{block name='body_class' append} is_blog {/block}

{block name="full_width_top"}
  {hook h='displayStBlogArticleTop'}
{/block}

{block name='page_content_container'}
<section id="content" class="page-blog-article article_themes_{if $blog.article_blog_top == 0}{$stblog.def_article_blog_top}{else}{$blog.article_blog_top}{/if}">

{if isset($blog)}
	{if $blog.id}
        <div id="blog_primary_block" class="blog_detail_{$blog.id}" itemscope itemtype="http://schema.org/NewsArticle">
            <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
            <div class="hidden" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                  <meta itemprop="url" content="{$urls.shop_domain_url}{$shop.logo}">
                  {if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width}<meta itemprop="width" content="{$sttheme.st_logo_image_width}">{/if}
                  {if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height}<meta itemprop="height" content="{$sttheme.st_logo_image_height}">{/if}
                </div>
                <meta itemprop="name" content="{$shop.name}">
            </div>
            {if !isset($blog.author) || !$blog.author}
                <div class="hidden" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <meta itemprop="name" content="{$shop.name}">
                </div>
            {/if}


            {if  ($stblog.def_article_blog_top > 2 && $blog.article_blog_top == 0) || $blog.article_blog_top > 2}  
             <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
            {if (isset($blog.cover) && $blog.cover) || ($blog.type==3 && $blog.video)}
            <div class="m-b-1 blog_cover_box">
                {include file='module:stblog/views/templates/slider/post-cover-article.tpl' blog_image_type='large' is_lazy=0 show_video=1}  
                
            
            {if  (in_array($stblog.def_article_blog_top, array(5,6)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(5,6))}
           <div class="article_blog_right {if  (in_array($stblog.def_article_blog_top, array(1,2,3,4,5,6)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(1,2,3,4,5,6))}article_hidden{/if}">
           
           {if  (in_array($stblog.def_article_blog_top, array(5)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(5))}
                {if ($stblog.def_article_blog_loved == 1 && $blog.article_blog_loved == 0 ) || $blog.article_blog_loved == 1}{hook h='displayStBlogArticleInfo'}{/if}
                {/if}
            <h1 class="page_heading blog_heading" itemprop="headline">{$blog.name}</h1>
            
              <div class="blog_info_top">
            {if isset($blog.author) && $blog.author && (($stblog.def_article_blog_autor == 1 && $blog.article_blog_autor == 0)|| $blog.article_blog_autor == 1)}
             <span class="posted_author comma" itemprop="author" itemscope itemtype="https://schema.org/Person">{$blog.author}<meta itemprop="name" content="{$blog.author}"></span>{/if}{if ($stblog.def_article_blog_date == 1 && $blog.article_blog_date == 0 ) || $blog.article_blog_date == 1}{strip}<span class="date-add comma">{if $stblog.display_date==2}
                    {if !count($blog.timeago)}
                        {l s='Just now' d='Shop.Theme.Transformer'}
                    {else}
                        {if key($blog.timeago)=='y'}
                            {$blog.timeago['y']} {if $blog.timeago['y']>1}{l s='Year'  d='Shop.Theme.Transformer'}{else}{l s='Years'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='m'}
                            {$blog.timeago['m']} {if $blog.timeago['m']>1}{l s='Month'  d='Shop.Theme.Transformer'}{else}{l s='Months'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='w'}
                            {$blog.timeago['w']} {if $blog.timeago['w']>1}{l s='Week'  d='Shop.Theme.Transformer'}{else}{l s='Weeks'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='d'}
                            {$blog.timeago['d']} {if $blog.timeago['d']>1}{l s='Day'  d='Shop.Theme.Transformer'}{else}{l s='Days'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='h'}
                            {$blog.timeago['h']} {if $blog.timeago['h']>1}{l s='Hour'  d='Shop.Theme.Transformer'}{else}{l s='Hours'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='i'}
                            {$blog.timeago['i']} {if $blog.timeago['i']>1}{l s='Minute'  d='Shop.Theme.Transformer'}{else}{l s='Minutes'  d='Shop.Theme.Transformer'}{/if}
                        {/if}
                        &nbsp;{l s='ago'  d='Shop.Theme.Transformer'}
                    {/if}
                {else}
                {if ($stblog.def_article_blog_date_icon == 1 && $blog.article_blog_date_icon == 0 ) || $blog.article_blog_date_icon == 1}<i class="fto-clock"></i>{/if} {dateFormat date=$blog.date_add full=0}{/if}</span>
                <meta itemprop="datePublished" content="{dateFormat date=$blog.date_add full=0}"/>
                <meta itemprop="dateModified" content="{dateFormat date=$blog.date_upd full=0}"/>{/strip}{/if}{if ($stblog.def_article_blog_category == 1 && $blog.article_blog_category == 0 ) || $blog.article_blog_category == 1}<span class="category_top comma">{l s='category:'  d='Shop.Theme.Transformer'}</span>{foreach $blog_categories as $category} <a class="btn-line-under" href="{$link->getModuleLink('stblog','category',['blog_id_category'=>$category.id_st_blog_category,'rewrite'=>$category.link_rewrite])|escape:'html'}" title="{$category.name|escape:'html':'UTF-8'}">{$category.name|truncate:30:'...'|escape:'html':'UTF-8'}</a>{if !$category@last},{/if}{/foreach}{/if}{if (in_array($stblog.def_article_blog_top, array(5)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(5))}{if ($stblog.def_article_blog_view == 1 && $blog.article_blog_view_art == 0 ) || $blog.article_blog_view_art == 1}<span class="counter_top comma"><i class="fto-eye-2 mar_r4"></i>{$blog.counter}</span>{/if}
            {/if}
            </div>
            
            </div>
        {/if}
            
            
            
            </div>
            {/if}
            
            </div>
            
            
           
            {*{if $stblog.display_short_content}
                <div class="m-b-1 blog_short_content" itemprop="description">{$blog.content_short}</div>
            {/if}*}
            
            </div>
        
           {/if}
           
           
           {if  (in_array($stblog.def_article_blog_top, array(2,4,6)) && $blog.article_blog_top == 0 ) || (in_array($blog.article_blog_top, array(2,4,6)))} <div class="row article_border">
            <div class="col-lg-1 col-sm-2 col-12 article_left px-0 {if  (in_array($stblog.def_article_blog_top, array(1,2,3,4,5,6)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(1,2,3,4,5,6))}article_hidden{/if}">{if ($stblog.def_article_blog_loved == 1 && $blog.article_blog_loved == 0 ) || $blog.article_blog_loved == 1}{hook h='displayStBlogArticleInfo'}{/if}
            {if ($stblog.def_article_blog_view == 1 && $blog.article_blog_view_art == 0 ) || $blog.article_blog_view_art == 1}<span class="left_view"><i class="fto-eye-2 mar_r4"></i><span class="amount_inline">{$blog.counter}</span></span>{/if}{hook h='displayStBlogArticleFooterSocial'}</div>
            <div class="col-lg-10 col-sm-10 col-12 article_center">{/if}
           
            {if (in_array($stblog.def_article_blog_top, array(3,5)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(3,5))}
            <div class="blog_social_center m-b-1  {if  (in_array($stblog.def_article_blog_top, array(1,2,3,4,5,6)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(1,2,3,4,5,6))}article_hidden{/if}">{hook h='displayStBlogArticleFooterSocial'}</div>
            {/if}
            <div class="blog_social_center m-b-1 rwd rwd_article_visible">{hook h='displayStBlogArticleFooterSocial'}</div>
            <div class="blog_info_article_rwd {if  (in_array($stblog.def_article_blog_top, array(1,2,3,4,5,6)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(1,2,3,4,5,6))}rwd_article_visible{/if}">
            <span class="center_view comma "><i class="fto-eye-2 mar_r4"></i>{$blog.counter}</span>
            {if ($stblog.def_article_blog_loved == 1 && $blog.article_blog_loved == 0 ) || $blog.article_blog_loved == 1}{hook h='displayStBlogArticleInfo'}{/if}
            </div>
            
            {if  ($stblog.def_article_blog_top < 5 && $blog.article_blog_top == 0) || (in_array($blog.article_blog_top, array(1,2,3,4)))}
            <h1 class="page_heading blog_heading px-0" itemprop="headline">{$blog.name}</h1>
            {/if}
            <h1 class="page_heading blog_heading view56" itemprop="headline">{$blog.name}</h1>
            
            
            
            
            <div class="blog_info_article m-b-1 px-0 {if (in_array($stblog.def_article_blog_top, array( 5, 6)) && $blog.article_blog_top == 0) || (in_array($blog.article_blog_top, array(5,6)))}view56{/if}">
            
                {strip}
                
                {if isset($blog.author) && $blog.author && (($stblog.def_article_blog_autor == 1 && $blog.article_blog_autor == 0)|| $blog.article_blog_autor == 1)}
                   <span class="posted_author link_color comma" itemprop="author" itemscope itemtype="https://schema.org/Person">{$blog.author}<meta itemprop="name" content="{$blog.author}"></span>
                {/if}
                
                {if ($stblog.def_article_blog_date == 1 && $blog.article_blog_date == 0 ) || $blog.article_blog_date == 1}
                {strip}
                <span class="date-add comma">{if $stblog.display_date==2}
                    {if !count($blog.timeago)}
                        {l s='Just now' d='Shop.Theme.Transformer'}
                    {else}
                        {if key($blog.timeago)=='y'}
                            {$blog.timeago['y']} {if $blog.timeago['y']>1}{l s='Year'  d='Shop.Theme.Transformer'}{else}{l s='Years'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='m'}
                            {$blog.timeago['m']} {if $blog.timeago['m']>1}{l s='Month'  d='Shop.Theme.Transformer'}{else}{l s='Months'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='w'}
                            {$blog.timeago['w']} {if $blog.timeago['w']>1}{l s='Week'  d='Shop.Theme.Transformer'}{else}{l s='Weeks'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='d'}
                            {$blog.timeago['d']} {if $blog.timeago['d']>1}{l s='Day'  d='Shop.Theme.Transformer'}{else}{l s='Days'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='h'}
                            {$blog.timeago['h']} {if $blog.timeago['h']>1}{l s='Hour'  d='Shop.Theme.Transformer'}{else}{l s='Hours'  d='Shop.Theme.Transformer'}{/if}
                        {elseif key($blog.timeago)=='i'}
                            {$blog.timeago['i']} {if $blog.timeago['i']>1}{l s='Minute'  d='Shop.Theme.Transformer'}{else}{l s='Minutes'  d='Shop.Theme.Transformer'}{/if}
                        {/if}
                        &nbsp;{l s='ago'  d='Shop.Theme.Transformer'}
                    {/if}
                {else}{if ($stblog.def_article_blog_date_icon == 1 && $blog.article_blog_date_icon == 0 ) || $blog.article_blog_date_icon == 1}<i class="fto-clock"></i>{/if} {dateFormat date=$blog.date_add full=0}{/if}</span><meta itemprop="datePublished" content="{dateFormat date=$blog.date_add full=0}"/><meta itemprop="dateModified" content="{dateFormat date=$blog.date_upd full=0}"/>{/strip}{/if}{/if}{if ($stblog.def_article_blog_category == 1 && $blog.article_blog_category == 0 ) || $blog.article_blog_category == 1}<span class="category_center comma">{l s='category:'  d='Shop.Theme.Transformer'}</span>{foreach $blog_categories as $category} <a class="btn-line-under" href="{$link->getModuleLink('stblog','category',['blog_id_category'=>$category.id_st_blog_category,'rewrite'=>$category.link_rewrite])|escape:'html'}" title="{$category.name|escape:'html':'UTF-8'}">{$category.name|truncate:30:'...'|escape:'html':'UTF-8'}</a>{if !$category@last},{/if}{/foreach}{/if}{if (in_array($stblog.def_article_blog_top, array(1,3)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(1,3))}{if ($stblog.def_article_blog_view == 1 && $blog.article_blog_view_art == 0 ) || $blog.article_blog_view_art == 1}<span class="center_view comma"><i class="fto-eye-2 mar_r4"></i>{$blog.counter}</span>{/if}{/if}      
                {if (!in_array($stblog.def_article_blog_top, array(2, 4, 6)) && $blog.article_blog_top == 0) || (in_array($blog.article_blog_top, array(1,3,5)))}
                {if  (in_array($stblog.def_article_blog_top, array(1,2,3,4)) && $blog.article_blog_top == 0 ) || in_array($blog.article_blog_top, array(1,2,3,4))}
                {if ($stblog.def_article_blog_loved == 1 && $blog.article_blog_loved == 0 ) || $blog.article_blog_loved == 1}{hook h='displayStBlogArticleInfo'}{/if}
                {/if}
                {/if}
              

            </div>
            
            
            <div class="blog_content style_content m-b-1">
                {hook h='displayStBlogContent'}
                {$blog.content nofilter}
                
                               
            </div>
            {if (!in_array($stblog.def_article_blog_top, array(2, 4, 6)) && $blog.article_blog_top == 0) || (in_array($blog.article_blog_top, array(1,3,5)))}
            <div class="social_blog_bottom m-b-1">            
            {hook h='displayStBlogArticleFooterSocial'}
            </div>
            {/if}
            
            {if $blog_tags && $blog_tags|count}
                <div id="blog_tags" class="general_bottom_border m-b-1">
                    <span>{l s='Tag' d='Shop.Theme.Transformer'}:</span>
                    {foreach $blog_tags as $tag}
                        <a href="{url entity='module' name='stblogsearch' controller='default' params=['stb_search_query'=>$tag]}" title="{l s='More about' d='Shop.Theme.Transformer'} {$tag}">{$tag}</a>{*{if !$tag@last},{/if}*}
                    {/foreach}
                </div>
            {/if}
            
             
          {if  (in_array($stblog.def_article_blog_top, array(2,4,6)) && $blog.article_blog_top == 0 ) || (in_array($blog.article_blog_top, array(2,4,6)))} </div>
           {/if}
           
        </div>
        
        {hook h='displayStBlogArticleFooter'}
        
        {hook h='displayStBlogArticleSecondary'}
	
{/if}

</section>
{/block}