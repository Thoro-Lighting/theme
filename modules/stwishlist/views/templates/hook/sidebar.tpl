{*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<nav class="st-menu" id="side_wishlist">
    <div class="st-menu-header">
        <div class="st-menu-title">{l s='Wishlist' d='Shop.Theme.Transformer'}</div>
        <a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18 6L6 18M18 18L6 6" stroke="#181B1A" stroke-width="1.2" stroke-linecap="round"/>
				</svg> 
			</a>
    </div>
    
    <div id="side_wishlist_block" class="">
    {if $customer.is_logged && !$customer.is_guest}
     <div class="pad_10">
        <h3 class="page_heading">{l s='Save to wishlist' d='Shop.Theme.Transformer'}</h3>
        <ul id="select_wishlist" class="base_list_line">
        {if isset($wishlists) && count($wishlists)}
        {foreach $wishlists as $wishlist}
            {include file='module:stwishlist/views/templates/hook/item.tpl' id_st_wishlist=$wishlist.id_st_wishlist wishlist_name=$wishlist.name wishlist_total=$wishlist.total}
        {/foreach}
        {/if}
        </ul>
           </div></div>
           
        
        {else}<div class="pad_10"><p>{l s='Create an account to be able to add products to the wish list.' d='Shop.Theme.Transformer'}</p></div>
  			<div class="sidebar_button"><div class="text-center"><a href="{$urls.pages.authentication}" class="btn btn-default btn_full_width {if $arrow_buttons}btn_arrow{/if} btn-more-padding" title="{l s='Sign in' d='Shop.Theme.Transformer'}">{l s='Sign in' d='Shop.Theme.Transformer'}</a></div></div>
		{/if}
 
    
</nav>
{if $customer.is_logged && !$customer.is_guest}
<div class="sidebar_button side wishlist">
        <div class="form-group form-group-small">
            <div class="input-group">
              <input
                      class="form-control wishlist_widget"
                      name="name"
                      type="text"
                      placeholder="{l s='Create a wishlist' d='Shop.Theme.Transformer'}"
                      value="" />
              <span class="input-group-btn">
                <button
                  class="btn_send btn btn-default btn-spin"
                  type="submit"
                  id="side_wishlist_submit"
                >
                   <i class="fto-plus-2"></i>{l s='Create' d='Shop.Theme.Transformer'}
                </button>
              </span>
            </div>
            
            <div class="text-center m-t-1">
		        	<a href="{url entity='module' name='stwishlist' controller='mywishlist'}" class="btn btn-default btn_full_width {if $arrow_buttons}btn_arrow{/if} btn-more-padding" title="{l s='View all' d='Shop.Theme.Transformer'}" rel="nofollow">{l s='View all' d='Shop.Theme.Transformer'}</a>
		        </div>
        </div> </div>
        {/if}