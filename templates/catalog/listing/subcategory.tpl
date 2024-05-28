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
 
<div id="subcategory-sticky">
           <ul class="subcategory-sticky-list">
           <li class="clearfix first-subcategory"><a href="{url entity='category' id={$top_category->id} id_lang=$id_lang}">{$top_category->name} <i class="fto-angle-right"></i></a></li>
            {foreach $subcategories as $subcategory}
                <li class="clearfix">
                    {if $sttheme.subcaregory_img_sticky && $subcategory.image.bySize.category_default.url}
                    <a href="{$subcategory.url}" title="{$subcategory.name}" class="img">
                        <img src="{$subcategory.image.bySize.category_default.url}" {if $sttheme.retina && isset($subcategory.image.bySize.category_default_2x.url)} srcset="{$subcategory.image.bySize.category_default_2x.url} 2x" {/if} alt="{$subcategory.name}" width="{$subcategory.image.bySize.category_default.width}" height="{$subcategory.image.bySize.category_default.height}" />
                    </a>
                    {/if}
                    <a class="subcategory-name" href="{$subcategory.url}" title="{$subcategory.name}">{$subcategory.name}</a>  
                </li>
            {/foreach}
            </ul>
</div>

