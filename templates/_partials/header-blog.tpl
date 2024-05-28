{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
 
 {assign var='blog_width_header' value=Configuration::get('ST_BLOG_BLOG_WIDTH_HEADER')}
 {assign var='blog_header_style' value=Configuration::get('ST_BLOG_BLOG_HEADER_STYLE')}
 {assign var='blog_topbar_show' value=Configuration::get('ST_BLOG_BLOG_TOPBAR_SHOW')}
 {assign var='blog_width_topbar' value=Configuration::get('ST_BLOG_BLOG_WIDTH_TOPBAR')}
 {assign var='blog_header_logo' value=Configuration::get('ST_BLOG_BLOG_HEADER_LOGO')}
 {assign var='blog_header_left_alignment' value=Configuration::get('ST_BLOG_BLOG_HEADER_LEFT_ALIGNMENT')}
 {assign var='blog_header_center_alignment' value=Configuration::get('ST_BLOG_BLOG_HEADER_CENTER_ALIGNMENT')}
 {assign var='blog_header_right_alignment' value=Configuration::get('ST_BLOG_BLOG_HEADER_RIGHT_ALIGNMENT')}
 {assign var='blog_header_right_bottom_alignment' value=Configuration::get('ST_BLOG_BLOG_HEADER_RIGHT_BOTTOM_ALIGNMENT')}
 {assign var='blog_sticky_primary_header' value=Configuration::get('ST_BLOG_BLOG_STICKY_PRIMARY_HEADER')}
 {assign var='blog_sticky_primary_topbar' value=Configuration::get('ST_BLOG_BLOG_STICKY_PRIMARY_TOPBAR')}
 {assign var='blog_logo_image_field' value=Configuration::get('ST_BLOG_BLOG_LOGO_IMAGE_FIELD')}
 {assign var='logo_mobile_svg' value=Configuration::get('STSN_LOGO_MOBILE_SVG')}

{block name='header_banner'}
  {capture name="displayBanner"}{hook h="displayBanner"}{/capture}
  {if $smarty.capture.displayBanner}
  <div id="displayBanner" class="header-banner">
    {$smarty.capture.displayBanner nofilter}
  </div>
  {/if}
{/block}

{block name='header_nav'}
  {capture name="displayNav1blog"}{hook h="displayNav1blog"}{/capture}
  {capture name="displayNav2blog"}{hook h="displayNav2blog"}{/capture}
  {capture name="displayNav3blog"}{hook h="displayNav3blog"}{/capture}
  {if ($smarty.capture.displayNav1blog || $smarty.capture.displayNav2blog || $smarty.capture.displayNav3blog) && $blog_topbar_show ==1}
    <div id="top_bar" class="blog-topbar nav_bar {$sttheme.header_topbar_sep_type|default:'vertical-s'} {if !$blog_sticky_primary_topbar} hide_when_sticky {/if}" >
      <div class="{if $blog_width_topbar == 0}wide_container{/if}">
        <div id="top_bar_container" class="{if $blog_width_topbar == 0}container{else}container-fluid{/if}">
          <div id="top_bar_row" class="flex_container">
            <nav id="nav_left" class="flex_float_left"><div class="flex_box">{$smarty.capture.displayNav1blog nofilter}</div></nav>
            <nav id="nav_center" class="flex_float_center"><div class="flex_box">{$smarty.capture.displayNav3blog nofilter}</div></nav>
            <nav id="nav_right" class="flex_float_right"><div class="flex_box">{$smarty.capture.displayNav2blog nofilter}</div></nav>
          </div>
        </div>          
      </div>
    </div>
  {/if}
{/block}


{block name='mobile_header'}
{*similar code in the checkout/_partials/header.tpl*}
  <section id="mobile_bar" class="animated fast text_hd_{$sttheme.mobile_header_text}">
    <div class="container">
      <div id="mobile_bar_top" class="flex_container">
        {capture name="mobile_shop_logo"}
          <a class="mobile_logo {if $logo_mobile_svg}svg_logo{/if}" href="{$urls.base_url}" title="{$shop.name}" >
              {if $logo_mobile_svg == 1}<img class="logo" src="/img/presta-logo-demosklepu.svg" alt="{$shop.name}"/>{else}
              <img class="logo" src="{if $sttheme.mobile_logo_src}{$sttheme.mobile_logo_src}{else}{$shop.logo}{/if}" {if $sttheme.retina && $sttheme.retina_logo_src } srcset="{$sttheme.retina_logo_src} 2x"{/if} alt="{$shop.name}"{if $sttheme.mobile_logo_src && $sttheme.mobile_logo_width} width="{$sttheme.mobile_logo_width}"{elseif isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width} width="{$sttheme.st_logo_image_width}"{/if}{if $sttheme.mobile_logo_src && $sttheme.mobile_logo_height} height="{$sttheme.mobile_logo_height}"{elseif isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height} height="{$sttheme.st_logo_image_height}"{/if}/>
              {/if}
            
            </a>
        {/capture}
          <div id="mobile_bar_left">
            <div class="flex_container">
              {hook h="displayMobileBarLeft"}
            	{if $sttheme.sticky_mobile_header%2!=0}
                  {$smarty.capture.mobile_shop_logo nofilter}
              	{/if}
              </div>
          </div>
          <div id="mobile_bar_center" class="flex_child">
            <div class="flex_container {if $sttheme.sticky_mobile_header%2==0} flex_center {/if}">{*center content when logo is in center*}
            	{if $sttheme.sticky_mobile_header%2==0}
                  {$smarty.capture.mobile_shop_logo nofilter}
              	{/if}
              {hook h="displayMobileBarCenter"}
            </div>
          </div>
          <div id="mobile_bar_right">
            <div class="flex_container">{hook h="displayMobileBar"}</div>
          </div>
      </div>
      <div id="mobile_bar_bottom" class="flex_container">
        {hook h="displayMobileBarBottom"}
      </div>
    </div>
  </section>
{/block}
{block name='header_top'}
{*similar code in the checkout/_partials/header.tpl*}

<div id="header_primary" class="header-blog h-blog_{$blog_header_style} {if !$blog_sticky_primary_header} hide_when_sticky {/if}">
    <div class="{if $blog_width_header == 0}wide_container{/if}">
      <div id="header_primary_container" class="{if $blog_width_header == 0}container{else}container-fluid{/if}">
        <div id="header_primary_row" class="flex_container {if !isset($blog_header_logo) || !$blog_header_logo} logo_left {else} logo_center {/if}">
        {capture name="displaySlogan1Blog"}{hook h="displaySlogan1Blog"}{/capture}
        {capture name="displaySlogan2Blog"}{hook h="displaySlogan2Blog"}{/capture}
        {capture name="shop_logo"}
        <div class="logo_box">
          <div class="slogan_horizon">
            <a class="shop_logo" href="{$urls.base_url}" title="{$shop.name}">
                <img class="logo" src="{$shop.logo}" {if $sttheme.retina && $sttheme.retina_logo_src } srcset="{$sttheme.retina_logo_src} 2x"{/if} alt="{$shop.name}"{if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width} width="{$sttheme.st_logo_image_width}"{/if}{if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height} height="{$sttheme.st_logo_image_height}"{/if}/>
            </a>
            {if $smarty.capture.displaySlogan1Blog}<div class="slogan_box_beside">{$smarty.capture.displaySlogan1Blog nofilter}</div>{/if}
          </div>
          {if $smarty.capture.displaySlogan2Blog}<div class="slogan_box_under">{$smarty.capture.displaySlogan2Blog nofilter}</div>{/if}
        </div>
        {/capture}
          <div id="header_left" class="">
            <div class="flex_container header_box {if $blog_header_left_alignment==1} flex_center {elseif $blog_header_left_alignment==2} flex_right {else} flex_left {/if}">
              {if !isset($blog_header_logo) || !$blog_header_logo}
                  {if $blog_logo_image_field}<a class="shop_logo" href="{$urls.base_url}" title="{$shop.name}"><img src="/upload/{$blog_logo_image_field}" alt="{$shop.name}"></a>{else}{$smarty.capture.shop_logo nofilter}{/if}
              {/if}
              {if isset($HOOK_HEADER_LEFT_BLOG) && $HOOK_HEADER_LEFT_BLOG|trim}
                {$HOOK_HEADER_LEFT_BLOG nofilter}
              {/if}
            </div>
          </div>
            <div id="header_center" class="">
              <div class="flex_container header_box {if $blog_header_center_alignment==1} flex_center {elseif $blog_header_center_alignment==2} flex_right {else} flex_left {/if}">
              {if isset($blog_header_logo) && $blog_header_logo}
                {if $blog_logo_image_field}<a class="shop_logo" href="{$urls.base_url}" title="{$shop.name}"><img src="/upload/{$blog_logo_image_field}" alt="{$shop.name}"></a>{else}{$smarty.capture.shop_logo nofilter}{/if}
              {/if}
              
              
              
             
              {if isset($HOOK_HEADER_CENTER_BLOG) && $HOOK_HEADER_CENTER_BLOG|trim}
                  {$HOOK_HEADER_CENTER_BLOG nofilter}
                {/if}
              </div>
            </div>
          <div id="header_right" class="">
            <div id="header_right_top" class="flex_container header_box {if $blog_header_right_alignment==1} flex_center {elseif $blog_header_right_alignment==2} flex_right {else} flex_left {/if}">
                {hook h='displayTopBlog'}
            </div>
            
           
            {if isset($HOOK_HEADER_BOTTOM_BLOG) && $HOOK_HEADER_BOTTOM_BLOG|trim}
                <div id="header_right_bottom" class="flex_container header_box {if $blog_header_right_bottom_alignment==1} flex_center {elseif $blog_header_right_bottom_alignment==2} flex_right {else} flex_left {/if}">
                    {$HOOK_HEADER_BOTTOM_BLOG nofilter}
                </div>
            {/if}
          </div>
        </div>
      </div>
    </div>
  </div>
  {hook h='displayNavFullWidth'}
{/block}
{block name='header_menu'}
  {capture name="displayMainMenuBlog"}{hook h="displayMainMenuBlog"}{/capture}
  {capture name="displayMainMenuWidgetBlog"}{hook h="displayMainMenuWidgetBlog"}{/capture}
  {assign var='has_widgets' value=0}
  {if isset($smarty.capture.displayMainMenuWidgetBlog) && $smarty.capture.displayMainMenuWidgetBlog|trim}{$has_widgets=1}{/if}
    {if (isset($smarty.capture.displayMainMenuBlog) && $smarty.capture.displayMainMenuBlog|trim) || $has_widgets}
    <section id="top_extra" class="main_menu_has_widgets_{$has_widgets}">
      {if !$sttheme.megamenu_width}<div class="wide_container boxed_megamenu">{/if}
      <div class="st_mega_menu_container animated fast">
      <div class="container">
        <div id="top_extra_container" class="flex_container {if $sttheme.megamenu_position==1} flex_center {elseif $sttheme.megamenu_position==2} flex_right {/if}">
            {if isset($smarty.capture.displayMainMenuBlog)}{$smarty.capture.displayMainMenuBlog nofilter}{/if}
            {if $has_widgets}
              <div id="main_menu_widgets">
                <div class="flex_box">
                  {if isset($smarty.capture.displayMainMenuWidgetBlog)}{$smarty.capture.displayMainMenuWidgetBlog nofilter}{/if}
                </div>
              </div>
            {/if}
        </div>
      </div>
      </div>
      {if !$sttheme.megamenu_width}</div>{/if} 
  </section>
  {/if}
{/block}