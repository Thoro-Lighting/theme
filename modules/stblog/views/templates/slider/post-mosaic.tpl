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




{if !isset($blog_image_type) || !$blog_image_type}
    {if isset($for_w) && $for_w=='category' && ($category_layouts==1 || ($category_layouts==3 && $pro_per_lg==1))}
        {assign var='blog_image_type' value='large'}
    {else}
        {assign var='blog_image_type' value='medium'}
    {/if}
{/if}


{assign var='is_lazy' value=!isset($for_w) && isset($lazy_load) && $lazy_load}
<div class="block_blog {if isset($classname)} {$classname} {/if} mosaic">
    <div class="pro_outer_box pro_second_absolute {if $stblog.img_text == 1}row{/if} {if (isset($for_w) && $for_w=='category' && $category_layouts==2) || (isset($display_as_grid) && ($display_as_grid==2 || $display_as_grid==4))} blog_lr clearfix {/if}">
    {if ($blog.cover) || ($blog.cover_2.links.large.image)}
    <div class="pro_first_box {if $stblog.img_text == 1}col-md-{$stblog.items_img}{/if}">
  
            {if  $stblog.display_image > 1 || ($stblog.display_image == 1 && $blog.img_on_category < 3) || $stblog.display_text_on_image == 1}    
        {include file='module:stblog/views/templates/slider/post-cover-mosaic-category.tpl' show_video=1}
    {/if}
        {if isset($loved_position) && $stblog.display_loved == 2}
            {include file='module:stlovedproduct/views/templates/hook/icon.tpl' id_source=$blog.id_st_blog love_blog=true}
        {/if}
        
        
        
         <a  href="{$blog.link}" title="{$blog.name}" class="pro_second_box_img flex_container">
         <div class="bottom_zone text-{$stblog.text_image_max_alignment}">
         
          
         <div class="blog_info">
         {if $stblog.display_date_pos == 2}
            {strip}
            <span class="date-add top">{if $stblog.display_date_icon == 1}<i class="fto-clock mar_r4"></i>{/if}
           {if $stblog.display_date==2}
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
            
            {if $stblog.display_comment_count == 2 && isset($blog.comment_counter) && $blog.comment_counter}<span  class="com_info" title="{$blog.comment_counter} {if $blog.comment_counter>1}{l s='Comments' d='Shop.Theme.Transformer'}{else}{l s='Comment' d='Shop.Theme.Transformer'}{/if}"><i class="fto-chat-1 mar_r4"></i>{$blog.comment_counter}</span>{/if}
           </div>
         
         <p class="s_title_block {if isset($stblog.length_of_name)}{if $stblog.length_of_name==3} two_rows {elseif $stblog.length_of_name==1 || $stblog.length_of_name==2} nohidden {/if}{/if}"><span class="{if $stblog.home_blog_hov_border_title == 1}btn-line{elseif $stblog.home_blog_hov_border_title == 2}btn-line-under{/if}">{*{if isset($stblog.length_of_name) && $stblog.length_of_name==1}{$blog.name|truncate:$length_of_name:'...'}*}{if isset($stblog.length_of_name) && $stblog.length_of_name==4}{$blog.name|truncate:$stblog.length_of_name_value:'...'}{else}{$blog.name}{/if}</span></p>
         
         <div class="blog_info">
         {if $stblog.display_date_pos == 1}
            {strip}
            <span class="date-add">{if $stblog.display_date_icon == 1}<i class="fto-clock mar_r4"></i>{/if}
           {if $stblog.display_date==2}
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
            
            {if $stblog.display_comment_count == 1 && isset($blog.comment_counter) && $blog.comment_counter}<span class="com_info" title="{$blog.comment_counter} {if $blog.comment_counter>1}{l s='Comments' d='Shop.Theme.Transformer'}{else}{l s='Comment' d='Shop.Theme.Transformer'}{/if}"><i class="fto-chat-1 mar_r4"></i>{$blog.comment_counter}</span>{/if}
           </div>
         
         </div>
         </a>
      
        
    </div>
    {/if}
    
   </div>
    
    
</div>

  