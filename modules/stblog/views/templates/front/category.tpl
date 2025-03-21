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
{extends file='module:stblog/views/templates/front/blogs-list.tpl'}

{block name='blog_list_header'}
 {if isset($category)}
        {if $category->id AND $category->active}
            {if $category->visible_title == 1}<h1 class="page_heading m-b-1">{$category->name}</h1>{/if}
            {if $category->description}
                <div class="blog_cat_desc style_content m-b-1">
                    {$category->description}
                </div>
            {/if}
        {elseif $category->id}
            <p class="warning">{l s='This category is currently unavailable.' d='Shop.Theme.Transformer'}</p>
        {/if}
    {/if}
{/block}

