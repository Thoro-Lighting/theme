{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
{if isset($sttheme.version_switching) && $sttheme.version_switching==1}
<style type="text/css">{literal}body{min-width:{/literal}{if $sttheme.responsive_max==2}1440{elseif $sttheme.responsive_max==1}1200{else}992{/if}{literal}px;}{/literal}</style>
{/if}

{assign var='color_browser' value=Configuration::get('STSN_COLOR_BROWSER')}

		<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="{$color_browser}">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="{$color_browser}">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="{$color_browser}">
