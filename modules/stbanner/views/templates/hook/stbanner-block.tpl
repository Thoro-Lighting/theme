{if $banner_data['url'] && !$banner_data['description_has_links'] OR $banner_data['new_window'] == 3}
    <a id="st_banner_block_{$banner_data['id_st_banner']}" href="{if $banner_data['new_window'] == 3}{$banner_data['image_multi_lang']}{else}{$banner_data['url']|escape:'html'}{/if}" class="{if $banner_data['new_window'] == 2}st_popup_video full_open mg-hover{/if} {if $banner_data['new_window'] == 3}st_popup_image mg-hover{/if} st_banner_block_{$banner_data['id_st_banner']} st_banner_block" {if $banner_data['new_window'] == 3}data-group="gallery"{/if} {if $banner_data['new_window'] == 1}target="_blank"{elseif $banner_data['new_window'] == 0}target="_self"{/if} title="{$banner_data['title']|escape:'htmlall':'UTF-8'}" style="{if !$banner_style}height:{$banner_height}px;{/if}">
{else}
    <div id="st_banner_block_{$banner_data['id_st_banner']}" class="st_banner_block_{$banner_data['id_st_banner']} st_banner_block" style="{if !$banner_style}height:{$banner_height}px;{/if}">
{/if}
    {if $banner_style}
        <img class="adveditor_image" loading="lazy" src="{$banner_data['image_multi_lang']}" alt="{$banner_data['title']|escape:'htmlall':'UTF-8'}" />
    {else}
        <div class="st_banner_image" style="{if isset($banner_data['image_multi_lang']) && $banner_data['image_multi_lang']}background-image:url({$banner_data['image_multi_lang']});{/if}{if isset($banner_data['bg_color']) && $banner_data['bg_color']}background-color:{$banner_data['bg_color']};{/if}"></div>
    {/if}
    
    {if $banner_data['url'] && $group.classpluslink == 2}<p class="collection-more"><span class="btn btn-default btn-more-padding btn-large btn_arrow">{l s='See more' d='Shop.Theme.Transformer'}</span></p>{/if}
    {if $banner_data['description'] && $banner_data['new_window'] < 2 && $banner_data['content_under'] == 0}
        <div class="st_image_layered_description {if $banner_data.hide_text_on_mobile == 3 } hidden-sm-down {elseif $banner_data.hide_text_on_mobile == 2} hidden-lg-up-991 {elseif $banner_data.hide_text_on_mobile == 1} hidden-lg-up-991 hidden-sm-down{/if} {if $banner_data.text_align==1} text-1 {elseif $banner_data.text_align==3} text-3 {else} text-2 {/if} {if $banner_data.text_position==1} flex_start flex_left {elseif $banner_data.text_position==2} flex_start flex_center {elseif $banner_data.text_position==3} flex_start flex_right {elseif $banner_data.text_position==4} flex_middle flex_left {elseif $banner_data.text_position==6} flex_middle flex_right {elseif $banner_data.text_position==7} flex_end flex_left {elseif $banner_data.text_position==8} flex_end flex_center {elseif $banner_data.text_position==9} flex_end flex_right {else} flex_middle flex_center {/if}">
        	<div class="st_image_layered_description_inner {if $banner_data.text_width} width_{$banner_data.text_width} {/if} style_content">
        	{$banner_data['description'] nofilter}
        </div>
        {if $banner_data['url'] && !$banner_data['description_has_links'] && $group.classpluslink == 1}<p class="collection-more"><span class="btn btn-default btn-more-padding btn-large btn_arrow">{l s='See more' d='Shop.Theme.Transformer'}</span></p>{/if}
        </div>
    {/if}
    
{if $banner_data['new_window'] == 3}<div class="overlay"><h2>{l s='Show gallery' d='Shop.Theme.Transformer'}</h2><p><span class="gallery"></span></p></div>{/if}
{if $banner_data['new_window'] == 2}<div class="overlay"><h2>{l s='Show video' d='Shop.Theme.Transformer'}</h2><p><span class="video"></span></p></div>{/if}
    
  {if $banner_data['url'] && !$banner_data['description_has_links'] OR $banner_data['new_window'] == 3}
{if $banner_data['content_under'] == 1 && $banner_style == 1}<div class="st_image_down_desc {if $banner_data.hide_text_on_mobile == 3 } hidden-sm-down {elseif $banner_data.hide_text_on_mobile == 2} hidden-lg-up-991 {elseif $banner_data.hide_text_on_mobile == 1} hidden-lg-up hidden-sm-down{/if} {if $banner_data.text_align==1} text-1 {elseif $banner_data.text_align==3} text-3 {else} text-2 {/if} {if $banner_data.text_position==1} flex_start flex_left {elseif $banner_data.text_position==2} flex_start flex_center {elseif $banner_data.text_position==3} flex_start flex_right {elseif $banner_data.text_position==4} flex_middle flex_left {elseif $banner_data.text_position==6} flex_middle flex_right {elseif $banner_data.text_position==7} flex_end flex_left {elseif $banner_data.text_position==8} flex_end flex_center {elseif $banner_data.text_position==9} flex_end flex_right {else} flex_middle flex_center {/if}">
        	<div class="st_image_down_desc_inner {if $banner_data.text_width} width_{$banner_data.text_width} {/if} style_content">
        	{$banner_data['description'] nofilter} 
        </div>
        
          {if $banner_data['url'] && !$banner_data['description_has_links'] && $group.classpluslink == 1}<p class="collection-more"><span class="btn btn-default btn-more-padding btn-large btn_arrow">{l s='See more' d='Shop.Theme.Transformer'}</span></p>{/if}
     
         </div>{/if}
        
      
       </a>
{else}
{if $banner_data['content_under'] == 1 AND $banner_style == 1}<div class="st_image_down_desc {if $banner_data.hide_text_on_mobile == 3 } hidden-sm-down {elseif $banner_data.hide_text_on_mobile == 2} hidden-lg-up-991 {elseif $banner_data.hide_text_on_mobile == 1} hidden-lg-up hidden-sm-down{/if} {if $banner_data.text_align==1} text-1 {elseif $banner_data.text_align==3} text-3 {else} text-2 {/if} {if $banner_data.text_position==1} flex_start flex_left {elseif $banner_data.text_position==2} flex_start flex_center {elseif $banner_data.text_position==3} flex_start flex_right {elseif $banner_data.text_position==4} flex_middle flex_left {elseif $banner_data.text_position==6} flex_middle flex_right {elseif $banner_data.text_position==7} flex_end flex_left {elseif $banner_data.text_position==8} flex_end flex_center {elseif $banner_data.text_position==9} flex_end flex_right {else} flex_middle flex_center {/if}">
        	<div class="st_image_down_desc_inner {if $banner_data.text_width} width_{$banner_data.text_width} {/if} style_content">
        	{$banner_data['description'] nofilter} 
        </div>
        
          {if $banner_data['url'] && !$banner_data['description_has_links'] && $group.classpluslink == 1}<p class="collection-more"><span class="btn btn-default btn-more-padding btn-large btn_arrow">{l s='See more' d='Shop.Theme.Transformer'}</span></p>{/if}
     
        </div>{/if}
      </div>
{/if}



