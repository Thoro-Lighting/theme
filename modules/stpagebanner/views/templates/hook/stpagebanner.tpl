{if isset($banner) && $banner}
<div id="{if $banner}page_banner_container_{$banner.id_st_page_banner}{/if}"
  class="{if $banner.mobile_on == 0}hidden-sm-down{/if} breadcrumb_wrapper {if $sttheme.responsive_max!=3 && $breadcrumb_width} wide_container {/if} {if $breadcrumb_width == 1}close_baner{else}open_baner{/if}"
  {if $banner['image_multi_lang']} style="background-image:url({$banner['image_multi_lang']});" {/if}>
  {if !$banner.hide_breadcrumb || $banner.description}
    <div class="{if $sttheme.responsive_max!=3}container{else}container-fluid{/if}">
      <div class="row">
        <div class="col-12 {if $banner.text_align==2} text-2 {elseif $banner.text_align==3} text-3 {else} text-1 {/if}">
          {if $banner.description}
            <div class="style_content">
              {$banner.description nofilter}
            </div>
          {/if}
          {if !$banner.hide_breadcrumb}
            <nav data-depth="{$breadcrumb.count}" class="breadcrumb_nav">
              <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                {foreach from=$breadcrumb.links item=path name=breadcrumb}
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"
                      {if !empty($path.siblings)}class="dropdown_wrap dropdown_breadcrumb" {/if}>

                      {if !$smarty.foreach.breadcrumb.last}<a itemprop="item" href="{$path.url}"
                          class="text_color {if !empty($path.siblings) && $banner.breadcrumb_menu == 1}dropdown_tri dropdown_tri_in{/if}"
                          {if !empty($path.siblings) && $banner.breadcrumb_menu == 1}aria-haspopup="true" aria-expanded="false"
                          {/if} title="{$path.title}">
                        {/if}
                        <span
                          itemprop="name">{if $smarty.foreach.breadcrumb.first}{$banner.description_bred|strip_tags}{else}{$path.title}{/if}</span>
                        {if !empty($path.siblings) && $banner.breadcrumb_menu == 1}<i
                          class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i>{/if}
                        {if !$smarty.foreach.breadcrumb.last}</a>{/if}
                      <meta itemprop="position" content="{$smarty.foreach.breadcrumb.iteration}">


                      {if !empty($path.siblings) && $banner.breadcrumb_menu == 1}
                        <div class="dropdown_list" aria-labelledby="">
                          <ul class="dropdown_list_ul dropdown_box dropdown_list_breadcrumb">
                            {foreach $path.siblings as $row}
                              <li>
                                <a href="{$row.url}" title="{$row.title}" class="dropdown_list_item">{$row.title}</a>
                              </li>
                            {/foreach}
                          </ul>
                        </div>
                      {/if}
                      {if !$smarty.foreach.breadcrumb.last}
                        <span class="navigation-pipe">
                          <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.5L6 6.5L1 11.5" stroke="#73716D" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>
                        </span>
                      {/if}
                  </li>
                {/foreach}
              </ul>
            </nav>
          {/if}
        </div>
      </div>
    </div>
  {/if}
</div>
{/if}