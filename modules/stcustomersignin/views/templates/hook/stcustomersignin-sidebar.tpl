<nav id="side_stcustomersignin" class="st-menu {if $logged}bg_white{/if}">
<div class="st-menu-header">
            <div class="st-menu-title">{if $customer.is_logged}{l s='My account' d='Shop.Theme.Transformer'}{else}{l s='Login' d='Shop.Theme.Transformer'}{/if}</div>
            <a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18 6L6 18M18 18L6 6" stroke="#181B1A" stroke-width="1.2" stroke-linecap="round"/>
				</svg> 
			</a>
        </div>
<div class="quick_login my_account userinfo_mod_top dropdown_wrap top_bar_item">
		<div class="dropdown_list_ul dropdown_box custom_links_list">
            		<p class="account-head"><a href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Transformer'}" rel="nofollow" class="dropdown_list_item">{if $customer.is_logged}{l s='Welcome' d='Shop.Theme.Transformer'} {$customer.firstname} - {/if}{l s='My account' d='Shop.Theme.Transformer'}</a></p>

            	  	<p class="custom-account-button"><a href="{url entity='module' name='steasycheckout' controller='default'}" class="btn btn-default btn-full-width" rel="nofollow" title="{l s='Shopping cart' d='Shop.Theme.Transformer'}">{l s='Your current cart' d='Shop.Theme.Transformer'}</a></p> 
             
                  <ul class="customer-links">
              	  <li><a href="{$urls.pages.identity}" rel="nofollow" class="dropdown_list_item" title="{l s='My data' d='Shop.Theme.Transformer'}">{l s='My data' d='Shop.Theme.Transformer'}</a></li>
				  <li><a href="{$urls.pages.addresses}" rel="nofollow" class="dropdown_list_item" title="{l s='My addresses' d='Shop.Theme.Transformer'}">{l s='My addresses' d='Shop.Theme.Transformer'}</a></li>
			      </ul>
                  <ul class="customer-links border-icon">
                  <li><a href="{$urls.pages.history}" rel="nofollow" class="dropdown_list_item" title="{l s='Order history' d='Shop.Theme.Transformer'}"><i class="fto-export"></i>{l s='Order history' d='Shop.Theme.Transformer'}</a></li>  
                 {if Module::isEnabled('stlovedproduct')}<li><a href="{url entity='module' name='stlovedproduct' controller='myloved'}" rel="nofollow" class="dropdown_list_item" title="{l s='My loved items' d='Shop.Theme.Transformer'}"><i class="fto-heart-empty"></i>{l s='My loved items' d='Shop.Theme.Transformer'}</a></li>{/if}
				  </ul>
				  <ul class="customer-links border-icon border-bottom">
              	  <li><a href="{$urls.pages.discount}" rel="nofollow" class="dropdown_list_item" title="{l s='My vouchers' d='Shop.Theme.Transformer'}"><i class="fto-smile"></i>{l s='My vouchers' d='Shop.Theme.Transformer'}</a></li>
				  </ul>
            	  {if $customer.is_logged}<p class="logoff_last"><a href="{url entity=index params=['mylogout'=>'']}" rel="nofollow" class="dropdown_list_item" title="{l s='Log me out' d='Shop.Theme.Transformer'}"><i class="fto-logout-1"></i>{l s='Sign out' d='Shop.Theme.Transformer'}</a></p>{else}
            	  <p class="login_last">
            	  <a class="btn btn-default login-customer" href="{$authentication_url}" rel="nofollow" title="{l s='Sign in' d='Shop.Theme.Transformer'}">{l s='Sign in' d='Shop.Theme.Transformer'}</a>
            	  <span class="new-client">{l s='New client?' d='Shop.Theme.Transformer'}</span>
            	  <a class="customer-register" href="{$urls.pages.register}" rel="nofollow" title="{l s='Create an account' d='Shop.Theme.Transformer'}">{l s='Create an account' d='Shop.Theme.Transformer'}</a></p>
            	  {/if}
		    	 </div>
		    </div>
		    
</nav>

