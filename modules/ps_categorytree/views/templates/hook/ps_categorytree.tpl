{*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{function name="categories" nodes=[] depth=0}
  {strip}
    {if $nodes|count}
      <ul class="category-sub-menu">
        {foreach from=$nodes item=node name=data}
        {if !in_array($node.id , explode(',', str_replace(' ', '', $sttheme.category_module_off)))}
          <li data-depth="{$depth}" class="{if isset($category) && is_array($category) && isset($category.id) && $category.id==$node.id} current_cate {/if} li_{$depth} {if $sttheme.category_module_qt && $depth == 0 && $smarty.foreach.data.iteration > $sttheme.category_module_qt && !in_array($category.id , explode(',', str_replace(' ', '', $sttheme.category_module_qt_off)))}category-more{/if}">
            <div class="acc_header flex_container acc_{$depth}">
              <a class="flex_child" href="{$node.link}" title="{$node.name}">{$node.name} {if $sttheme.category_qt}<span class="magnitude">({Category::countProducts($node['id'])})</span>{/if}</a>
              {if $node.children}
                <span class="acc_icon {if isset($category) && is_array($category) && isset($category.id) && $category.id==$node.id}{else}collapsed{/if}" data-toggle="collapse" data-target="#exCollapsingNavbar{$node.id}">
                  <i class="fto-plus-2 acc_open fs_xl"></i>
                  <i class="fto-minus acc_close fs_xl"></i>
                </span>
              {/if}
            </div>
            {if $node.children}
              <div class="{if isset($category) && is_array($category) && isset($category.id) && $category.id==$node.id}collapse show{else}collapse{/if} zonedepth" id="exCollapsingNavbar{$node.id}">
                {categories nodes=$node.children depth=$depth+1}
              </div>
            {/if}
          </li>
          
          {if $sttheme.category_module_qt && $depth == 0 && $smarty.foreach.data.iteration > $sttheme.category_module_qt && $smarty.foreach.data.last && !in_array($category.id , explode(',', str_replace(' ', '', $sttheme.category_module_qt_off)))}
          <li class="more_category" title="{l s='More categories' d='Shop.Theme.Transformer'}"><div><i class="fto-plus-2"></i> {l s='More categories' d='Shop.Theme.Transformer'}</div></li> 
          {/if}

        {/if}
        {/foreach}
        </ul>
    {/if}
  {/strip}
{/function}

{if count($categories.children)}
<div class="block-categories block column_block">
  <div class="title_block title_align_0 title_style_{(int)$sttheme.heading_style}">
   <div class="flex_child title_flex_left"></div>
   {if $page.page_name == 'category'}
   {foreach $breadcrumb.links as $path} 
   {if $path@index == count($breadcrumb.links) - 1}{if ($path@index <= $sttheme.category_module_title_level && $sttheme.category_module_title == 2) OR $sttheme.category_module_title == 0}<span class="title_block_inner">{l s='Categories' d='Shop.Theme.Transformer'}</span>{elseif $path@index > $sttheme.category_module_title_level && $sttheme.category_module_title == 2}<span class="title_block_inner">{l s='Subcategories' d='Shop.Theme.Transformer'}</span>{else}<span class="title_block_inner">{$categories.name}</span>{/if}{/if}
   {/foreach}
   {else}
         <span class="title_block_inner">{l s='Categories' d='Shop.Theme.Transformer'}</span>
   {/if}      
  <div class="flex_child title_flex_right"></div>
   {if $page.page_name == 'category' && $sttheme.category_back}
   {foreach $breadcrumb.links as $path} 
        	{if $path@index == count($breadcrumb.links) - 2}
				 {if $path@index == 0 && $sttheme.category_back_option == 2 && $sttheme.category_back_id}<div class="category-back">{if $sttheme.category_back_option_el}<i class="fto-angle-left"></i>{/if} {if $sttheme.category_back_option_el == 0 OR $sttheme.category_back_option_el == 2}{l s='back to' d='Shop.Theme.Transformer'}{/if} <a href="{url entity='category' id=$sttheme.category_back_id}" title="{l s='Show all categories' d='Shop.Theme.Transformer'}">{l s='all categories' d='Shop.Theme.Transformer'}</a></div>{elseif $path@index == 0 && $sttheme.category_back_option == 1}{if $sttheme.category_back_option_el}<div class="category-back"><i class="fto-angle-left"></i>{/if} {if $sttheme.category_back_option_el == 0 OR $sttheme.category_back_option_el == 2}{l s='back to' d='Shop.Theme.Transformer'}{/if} <a href="{$path.url}" title="{$path.additional_title}">{$path.title}</a></div>{elseif $path@index > 0}<div class="category-back">{if $sttheme.category_back_option_el}<i class="fto-angle-left"></i>{/if} {if $sttheme.category_back_option_el == 0 OR $sttheme.category_back_option_el == 2}{l s='back to' d='Shop.Theme.Transformer'}{/if} <a href="{$path.url}" title="{$path.additional_title}">{$path.title}</a></div>{/if}
        	{/if}
        {/foreach}
   
  {/if} 
 </div>
   
<div class="block_content">
    <div class="acc_box category-top-menu">
      {categories nodes=$categories.children}
    </div>
  </div>
</div>
{/if}
