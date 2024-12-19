<div class="quick_login my_account userinfo_mod_top dropdown_wrap top_bar_item">
			{strip}
	            <a href="{$my_account_url}" class="dropdown_tri_in header_item mobile_bar_item" title="{l s='View my customer account' d='Shop.Theme.Transformer'}" rel="nofollow" aria-haspopup="true" aria-expanded="false">
	        	<span class="icone_svg_us"></span>
	           </a>
	            {/strip}
	            <div class="dropdown_list">
	            <div class="dropdown_list_ul dropdown_box custom_links_list">
            		<p class="account-head"><a href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Transformer'}" rel="nofollow" class="dropdown_list_item">{l s='My account' d='Shop.Theme.Transformer'}</a></p>
            		<p class="account-head-mini">{if $logged}{$welcome_logged} {$customerName}{else}{l s='My data' d='Shop.Theme.Transformer'}{/if}</p>
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
            	  {if $logged}<p class="logoff_last"><a href="{$logout_url}" rel="nofollow" class="dropdown_list_item" title="{l s='Log me out' d='Shop.Theme.Transformer'}"><i class="fto-logout-1"></i>{l s='Sign out' d='Shop.Theme.Transformer'}</a></p>{else}
            	  <p class="login_last">
            	  <a class="btn btn-default login-customer" href="{$authentication_url}" rel="nofollow" title="{l s='Sign in' d='Shop.Theme.Transformer'}">{l s='Sign in' d='Shop.Theme.Transformer'}</a>
            	  <span class="new-client">{l s='New client?' d='Shop.Theme.Transformer'}</span>
            	  <a class="customer-register" href="{$urls.pages.register}" rel="nofollow" title="{l s='Create an account' d='Shop.Theme.Transformer'}">{l s='Create an account' d='Shop.Theme.Transformer'}</a></p>
            	  {/if}
		    	 </div>
		    </div>
</div>
		 