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

{if isset($brands) && count($brands)}
    <div id="brands_slider_container_{$hook_hash}" class="brands_slider_container">

        <div class="content_header">
            <div>
                <p>{l s='Product Brands' d='Shop.Theme.Transformer'}</p>
                <h2>{l s='Discover Product Brands' d='Shop.Theme.Transformer'}</h2>
            </div>
            <a href="{url entity='manufacturer'}"
                class="btn-secondary hidden-md-down">{l s='View all brands' d='Shop.Theme.Transformer'}</a>
        </div>


        <div class="swiper-tiles-default swiper" data-js="swiper-tiles-default">
            <div class="swiper-wrapper">
                {foreach $brands as $brand}
                    <div class="swiper-slide">
                        <a href="{$brand.url}" title="{$brand.name}">
                            <h3>{$brand.name}</h3>
                            <svg width="62" height="18" viewBox="0 0 62 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M51.7678 1.5L61 8.86861M61 8.86861L52.4271 16.5M61 8.86861H1" stroke="white"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <img src="{$brand.image}" alt="{$brand.name}" width="{$manufacturerSize.width}"
                                height="{$manufacturerSize.height}" />
                            <span class="gradient"></span>
                        </a>
                    </div>
                {/foreach}
            </div>
                <div class="swiper-scrollbar"></div>
                <div class="swiper_btns_wrapper hidden-md-down"><button class="swiper-product-button-prev"></button> <button
                        class="swiper-product-button-next"></button></div>
        </div>

        <a href="{url entity='manufacturer'}"
            class="btn-secondary hidden-lg-up">{l s='View all brands' d='Shop.Theme.Transformer'}</a>

    </div>
{/if}