{if $page.page_name != "index"}{block name='header_nav'}
  {capture name="displayNav1"}{hook h="displayNav1"}{/capture}
  {capture name="displayNav2"}{hook h="displayNav2"}{/capture}
  {capture name="displayNav3"}{hook h="displayNav3"}{/capture}
  {if $smarty.capture.displayNav1 || $smarty.capture.displayNav2 || $smarty.capture.displayNav3}
    <div id="top_bar" class="nav_bar hide_when_sticky" >
      <div class="wide_container">
        <div id="top_bar_container" class="container">
          <div id="top_bar_row" class="flex_container">
            <nav id="nav_left" class="flex_float_left"><div class="flex_box">{$smarty.capture.displayNav1 nofilter}</div></nav>
            <nav id="nav_center" class="flex_float_center"><div class="flex_box">{$smarty.capture.displayNav3 nofilter}</div></nav>
            <nav id="nav_right" class="flex_float_right"><div class="flex_box">{$smarty.capture.displayNav2 nofilter}</div></nav>
          </div>
        </div>          
      </div>
    </div>
  {/if}
{/block}
{/if}
{block name='mobile_header'}
  <section id="mobile_bar" class="animated fast text_hd_{$sttheme.mobile_header_text}">
    <div class="container">
      <div id="mobile_bar_top" class="flex_container">
          <div id="mobile_bar_left">
            <div class="flex_container">
            <a class="mobile_logo svg_logo" href="{$urls.base_url}" title="{$shop.name}">
              <img class="logo" src="/img/logo_thoro.svg" alt="{$shop.name}"/ width="135" height="35">
            </a>
            </div>
          </div>
          
          <div id="mobile_bar_right">
            <div class="flex_container">{hook h="displayMobileBarLeft"}{hook h="displayMobileBar"}</div>
          </div>
      </div>
      </div>
  </section>
{/block}
{block name='header_top'}
  <div id="header_primary">
    <div class="wide_container">
      <div id="header_primary_container" class="container">
        <div id="header_primary_row" class="flex_container logo_left">
          <div id="header_left" class="">
            <div class="flex_container header_box flex_left">
               <div class="logo_box">
                 <a class="shop_logo" href="{$urls.base_url}" title="{$shop.name}">
                <img class="logo" src="/img/logo_thoro.svg" alt="{$shop.name}" width="190px" height="65px"/>
                 </a>
             </div>
            </div>
          </div>
          <div id="header_right" class="">
            <div id="header_right_top" class="flex_container header_box flex_right">
                {hook h='displayTop'}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{/block}
