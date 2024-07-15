{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}


{assign var='length_of_name' value=Configuration::get('ST_B_RELATED_LENGTH_OF_NAME')}
{assign var='length_of_name_value' value=Configuration::get('ST_B_RELATED_LENGTH_OF_NAME_VALUE')}
{assign var='length_desc_article' value=Configuration::get('ST_B_RELATED_LENGTH_DESC_ARTICLE')}
{assign var='display_image' value=Configuration::get('ST_B_RELATED_DISPLAY_IMAGE')}
{assign var='display_comment_count' value=Configuration::get('ST_B_RELATED_DISPLAY_COMMENT_COUNT')}
{assign var='display_author' value=Configuration::get('ST_B_RELATED_DISPLAY_AUTHOR')}
{assign var='display_date_pos' value=Configuration::get('ST_B_RELATED_DISPLAY_DATE_POS')}
{assign var='display_date_icon' value=Configuration::get('ST_B_RELATED_DISPLAY_DATE_ICON')}
{assign var='display_date' value=Configuration::get('ST_B_RELATED_DISPLAY_DATE')}
{assign var='display_loved' value=Configuration::get('ST_B_RELATED_DISPLAY_LOVED')}
{assign var='display_viewcount' value=Configuration::get('ST_B_RELATED_DISPLAY_VIEWCOUNT')}
{assign var='display_read_more' value=Configuration::get('ST_B_RELATED_DISPLAY_READ_MORE')}
{assign var='img_text' value=Configuration::get('ST_B_RELATED_IMG_TEXT')}
{assign var='items_img' value=Configuration::get('ST_B_RELATED_ITEMS_IMG')}




{if !isset($blog_image_type) || !$blog_image_type}
    {if isset($for_w) && $for_w=='category' && ($category_layouts==1 || ($category_layouts==3 && $pro_per_lg==1))}
        {assign var='blog_image_type' value='large'}
    {else}
        {assign var='blog_image_type' value='medium'}
    {/if}
{/if}

{assign var='is_lazy' value=!isset($for_w) && isset($lazy_load) && $lazy_load}
<div class="block_blog {if isset($classname)} {$classname} {/if}">
    <div class="pro_outer_box {if $img_text == 1}row{/if} {if (isset($for_w) && $for_w=='category' && $category_layouts==2) || (isset($display_as_grid) && ($display_as_grid==2 || $display_as_grid==4))} blog_lr clearfix {/if}">
    {if $blog.cover && $display_image == 1}
    <div class="pro_first_box {if $img_text == 1}col-md-{$items_img}{/if}">
        {include file='module:stblog/views/templates/slider/post-cover.tpl' show_video=1}
        {if isset($loved_position) && $display_loved == 2}
            {include file='module:stlovedproduct/views/templates/hook/icon.tpl' id_source=$blog.id_st_blog love_blog=true}
        {/if}
    </div>
    {/if}
    <div class="pro_second_box pro_block_align_{$stblog.blog_block_align} {if $img_text == 1}col-md-{12-$items_img}{/if}">
       {* {if isset($length_of_name) && $length_of_name==1}
            {assign var="length_of_name" value=70}
        {/if}*}
        

        
        {if $display_date_pos || $display_comment_count || $display_viewcount || $display_author || $display_loved}
        <div class="blog_info">
            {if $display_author == 2 && $blog.author}<span class="posted_by mar_r4">{l s='Posted on' d='Shop.Theme.Transformer'} {l s='by' d='Shop.Theme.Transformer'}</span><span class="link_color">{$blog.author}</span>{/if}
            {if $display_comment_count == 2 && isset($blog.comment_counter) && $blog.comment_counter}<a href="{$blog.link}#comments" title="{$blog.comment_counter} {if $blog.comment_counter>1}{l s='Comments' d='Shop.Theme.Transformer'}{else}{l s='Comment' d='Shop.Theme.Transformer'}{/if}"><i class="fto-chat-1 mar_r4"></i>{$blog.comment_counter}</a>{/if}
            {if $display_viewcount == 2}<span><i class="fto-eye-2 mar_r4"></i>{$blog.counter}</span>{/if}
            {if $display_date_pos == 2}
            {strip}
            <span class="date-add">{if $display_date_icon == 1}<i class="fto-clock mar_r4"></i>{/if}
           {if $display_date==2}
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
            {else}{dateFormat date=$blog.date_add full=0}{/if}</span>
            {/strip}
            {/if}
            {if isset($loved_position) && $display_loved == 3}
              {include file='module:stlovedproduct/views/templates/hook/fly.tpl' id_source=$blog.id_st_blog classname="btn_inline" love_blog=true}
            {/if}
            
            </div>
        {/if}
        
        <p class="s_title_block {if isset($length_of_name)}{if $length_of_name==3} two_rows {elseif $length_of_name==1 || $length_of_name==2} nohidden {/if}{/if}"><a href="{$blog.link}" title="{$blog.name}" >{*{if isset($length_of_name) && $length_of_name==1}{$blog.name|truncate:$length_of_name:'...'}*}{if isset($length_of_name) && $length_of_name==4}{$blog.name|truncate:$length_of_name_value:'...'}{else}{$blog.name}{/if}</a></p>


        {if $display_date_pos || $display_comment_count || $display_viewcount || $display_author}
        <div class="blog_info">
            {if $display_author == 1 && $blog.author}<span class="posted_by mar_r4">{l s='Posted on' d='Shop.Theme.Transformer'} {l s='by' d='Shop.Theme.Transformer'}</span><span class="link_color">{$blog.author}</span>{/if}
            {if $display_comment_count == 1 && isset($blog.comment_counter) && $blog.comment_counter}<a href="{$blog.link}#comments" title="{$blog.comment_counter} {if $blog.comment_counter>1}{l s='Comments' d='Shop.Theme.Transformer'}{else}{l s='Comment' d='Shop.Theme.Transformer'}{/if}"><i class="fto-chat-1 mar_r4"></i>{$blog.comment_counter}</a>{/if}
            {if $display_viewcount == 1}<span><i class="fto-eye-2 mar_r4"></i>{$blog.counter}</span>{/if}
            {if $display_date_pos == 1}
            {strip}
            <span class="date-add">{if $display_date_icon == 1}<i class="fto-clock mar_r4"></i>{/if}
           {if $display_date==2}
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
            {else}{dateFormat date=$blog.date_add full=0}{/if}</span>
            {/strip}
            {/if}
            {if isset($loved_position) && $display_loved == 1}
              {include file='module:stlovedproduct/views/templates/hook/fly.tpl' id_source=$blog.id_st_blog classname="btn_inline" love_blog=true}
            {/if}
            
           
        </div>
        {/if}
       
        {if $display_sd && $blog.content_short}
        <div class="blok_blog_short_content fs_md pad_b6">
            {if $display_sd==2}{$blog.content_short nofilter}
            {elseif $display_sd==3}{$blog.content_short|strip_tags:false|truncate:120:'...' nofilter}
            {elseif $display_sd==1}{$blog.content_short|strip_tags:false|truncate:220:'...' nofilter}
            {elseif $display_sd==4}{$blog.content|strip_tags:false|truncate:120:'...' nofilter}
            {elseif $display_sd==5}{$blog.content|strip_tags:false|truncate:220:'...' nofilter}
            {elseif $display_sd==6}{$blog.content|strip_tags:false|truncate:600:'...' nofilter}
            {elseif $display_sd==7}{$blog.content|strip_tags:false|truncate:1200:'...' nofilter}
            {elseif $display_sd==8}{$blog.content_short|strip_tags:false|truncate:{$length_desc_article}:'...' nofilter}
            {elseif $display_sd==9}{$blog.content|strip_tags:false|truncate:{$length_desc_article}:'...' nofilter}
            {/if}
            
         
        </div>
        {if $display_read_more < 4}<a href="{$blog.link}" title="{l s='Read more' d='Shop.Theme.Transformer'}" class="{if $display_read_more == 1}go{elseif $display_read_more == 0}btn btn-default{elseif $display_read_more == 2}btn-line{elseif $display_read_more == 3}btn-line-under{/if}">{l s='Read more' d='Shop.Theme.Transformer'}</a>{/if}
        {/if}
        
    </div>
    </div>
    
    
</div>

  