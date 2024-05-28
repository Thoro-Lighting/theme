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
 
 <!-- lewa kolumna -->
 <div class="lc lc-off">
	  	  <div class="list-group-item ">
	      <a class="btn-line  landing-link" href="{$urls.pages.my_account}" title="{l s='Dashboard' d='Shop.Theme.Transformer'}">
	          <i class="fto-cog mar_r4 fs_lg"></i>{l s='Dashboard' d='Shop.Theme.Transformer'}
	      </a>
	      </div>

	      <div class="list-group-item">
	      <a class="btn-line  identity-link" href="{$urls.pages.identity}" title="{l s='My data' d='Shop.Theme.Transformer'}">
	          <i class="fto-vcard-1 mar_r4 fs_lg"></i>{l s='My data' d='Shop.Theme.Transformer'}
	      </a>
	      </div>

	      {if $customer.addresses|count}
	        <div class="list-group-item">
	        <a class="btn-line  addresses-link" href="{$urls.pages.addresses}" title="{l s='My addresses' d='Shop.Theme.Transformer'}">
	            <i class="fto-location-2 mar_r4 fs_lg"></i>{l s='My addresses' d='Shop.Theme.Transformer'}
	        </a>
	        </div>
	      {else}
	        <div class="list-group-item">
	        <a class="btn-line  address-link" href="{$urls.pages.address}" title="{l s='Add first address' d='Shop.Theme.Transformer'}">
	            <i class="fto-location-2 mar_r4 fs_lg"></i>{l s='Add first address' d='Shop.Theme.Transformer'}
	        </a>
	        </div>
	      {/if}

	      {if !$configuration.is_catalog}
	        <div class="list-group-item">
	        <a class="btn-line  history-link" href="{$urls.pages.history}" title="{l s='Order history' d='Shop.Theme.Transformer'}">
	            <i class="fto-calendar-1 mar_r4 fs_lg"></i>{l s='Order history' d='Shop.Theme.Transformer'}
	        </a>
	        </div>
	      {/if}

           {if $configuration.return_enabled && !$configuration.is_catalog}
	        <div class="list-group-item">
	        <a class="btn-line  returns-link" href="{$urls.pages.order_follow}" title="{l s='Merchandise returns' d='Shop.Theme.Transformer'}">
	            <i class="fto-paper-plane mar_r4 fs_lg"></i>{l s='Merchandise returns' d='Shop.Theme.Transformer'}
	        </a>
	        </div>
	      {/if} 

	      {if !$configuration.is_catalog}
	        <div class="list-group-item">
	        <a class="btn-line  order-slips-link" href="{$urls.pages.order_slip}" title="{l s='Credit slips' d='Shop.Theme.Transformer'}">
	            <i class="fto-dot-circled mar_r4 fs_lg"></i>{l s='Credit slips' d='Shop.Theme.Transformer'}
	        </a>
	        </div>
	      {/if}

	      {if $configuration.voucher_enabled && !$configuration.is_catalog}
	        <div class="list-group-item">
	        <a class="btn-line  discounts-link" href="{$urls.pages.discount}" title="{l s='My vouchers' d='Shop.Theme.Transformer'}">
	            <i class="fto-tag-2 mar_r4 fs_lg"></i>{l s='My vouchers' d='Shop.Theme.Transformer'}
	        </a>
	        </div>
	      {/if}

	     

	     {block name='display_customer_account'}
	        {hook h='displayCustomeraccount'}
	      {/block}
	      
	      {if $customer.is_logged}
	       <div class="list-group-item">
	        <a href="{url entity=index params=['mylogout'=>'']}" class="sign-out-link btn-line-under" title="{l s='Sign out' d='Shop.Theme.Actions'}"><i class="fto-logout-1 mar_r4 fs_lg"></i>{l s='Sign out' d='Shop.Theme.Actions'} - {$customer.firstname}</a>
         </div>
         {/if}
 </div>
 
         
  <!-- center kolumna -->
               

		  <!-- moje dane -->
	      <div class="center-account-box list-group-item">
		      <h4 class="account-heading">
		          <i class="fto-vcard-1 mar_r4 fs_lg"></i>{l s='My data' d='Shop.Theme.Transformer'}
		      </h4>
	      	  <div class="center-account-box-item">
	      	  		<p>{l s='Update and manage your basic personal data.' d='Shop.Theme.Transformer'}</p>
	      	  		<li><a class="btn-line-under  identity-link" href="{$urls.pages.identity}" title="{l s='Update your data' d='Shop.Theme.Transformer'}">{l s='Update your data' d='Shop.Theme.Transformer'}</a></li>
	     		    <li><a class="btn-line-under  identity-link" href="{$urls.pages.identity}" title="{l s='Update password' d='Shop.Theme.Transformer'}">{l s='Update password' d='Shop.Theme.Transformer'}</a></li>
	     		   {if Module::isEnabled('psgdpr')}<li><a class="lnk_psgdpr btn-line-under" href="{$link->getModuleLink('psgdpr', 'gdpr')}" title="{l s='My personal data' d='Shop.Theme.Transformer'}">{l s='My personal data' d='Shop.Theme.Transformer'}</a></li>{/if}	     		    
	     	  </div>
	      </div>

		  <!-- adresy -->
	      {if $customer.addresses|count}
	      <div class="center-account-box list-group-item">
		       <h4 class="account-heading">
		           <i class="fto-location-2 mar_r4 fs_lg"></i>{l s='My addresses' d='Shop.Theme.Transformer'}
		       </h4>
	        
	           <div class="center-account-box-item">
	           		<p>{l s='Update and manage your address book.' d='Shop.Theme.Transformer'}</p>
					<li><a class="btn-line-under  addresses-link" href="{$urls.pages.addresses}" title="{l s='Your addresses' d='Shop.Theme.Transformer'}">{l s='Your addresses' d='Shop.Theme.Transformer'}</a></li>	           
	      	  		<li><a class="btn-line-under  addresses-link" href="{$urls.pages.addresses}" title="{l s='Update address' d='Shop.Theme.Transformer'}">{l s='Update address' d='Shop.Theme.Transformer'}</a></li>
	     		    <li><a class="btn-line-under  addresses-link" href="{$urls.pages.address}" title="{l s='Add a new address' d='Shop.Theme.Transformer'}">{l s='Add a new address' d='Shop.Theme.Transformer'}</a></li>
	           </div>
	                
	        </div>
	      {else}
		  <!-- adresy pierwszy adres-->	      
	      <div class="center-account-box list-group-item">
		        <h4 class="account-heading">
		            <i class="fto-location-2 mar_r4 fs_lg"></i>{l s='My addresses' d='Shop.Theme.Transformer'}
		        </h4>
	        
	           <div class="center-account-box-item">
					<p>{l s='Update and manage your address book.' d='Shop.Theme.Transformer'}</p>
					<li><a class="btn-line-under addresses-link" href="{$urls.pages.address}" title="{l s='Add the first address' d='Shop.Theme.Transformer'}">{l s='Add the first address' d='Shop.Theme.Transformer'}</a></li>	           
	         </div>	        
	        
	      </div>
	      {/if}

		  <!-- zamowienia, zwroty, korekty, rabaty-->	 	      
	      <div class="center-account-box list-group-item">
		        <h4 class="account-heading">
		            <i class="fto-calendar-1 mar_r4 fs_lg"></i>{l s='Order history' d='Shop.Theme.Transformer'}
		        </h4>
	        
	           <div class="center-account-box-item">
					<p>{l s='Browse the host of all your orders.' d='Shop.Theme.Transformer'}</p>
					{if !$configuration.is_catalog}<li><a class="btn-line-under  addresses-link" href="{$urls.pages.history}" title="{l s='Order history' d='Shop.Theme.Transformer'}">{l s='Order history' d='Shop.Theme.Transformer'}</a></li>{/if}	           
	     	  		{if $configuration.return_enabled && !$configuration.is_catalog}<li><a class="btn-line-under returns-link" href="{$urls.pages.order_follow}" title="{l s='Merchandise returns' d='Shop.Theme.Transformer'}">{l s='Merchandise returns' d='Shop.Theme.Transformer'}</a></li>{/if}
	     	   		{if !$configuration.is_catalog}<li><a class="btn-line-under order-slips-link" href="{$urls.pages.order_slip}" title="{l s='Credit slips' d='Shop.Theme.Transformer'}">{l s='Credit slips' d='Shop.Theme.Transformer'}</a></li>{/if}
					{if $configuration.voucher_enabled && !$configuration.is_catalog}<li><a class="btn-line-under discounts-link" href="{$urls.pages.discount}" title="{l s='My vouchers' d='Shop.Theme.Transformer'}">{l s='My vouchers' d='Shop.Theme.Transformer'}</a></li>{/if}    	   	
	     	  </div>		        
	        	        
	      </div>
          {if Module::isEnabled('stlovedproduct') OR Module::isEnabled('stwishlist') OR Module::isEnabled('ps_emailalerts')}
		  <!-- ulubione, schowki, powiadomienia-->
	      <div class="center-account-box list-group-item">	
		        <h4 class="account-heading">
		            <i class="fto-calendar-1 mar_r4 fs_lg"></i>{l s='My products' d='Shop.Theme.Transformer'}
		        </h4>
		        <div class="center-account-box-item">
					<p>{l s='Manage your favorite products and notifications.' d='Shop.Theme.Transformer'}</p>		        
					{if Module::isEnabled('stlovedproduct')}<li><a class="love-link btn-line-under" href="{url entity='module' name='stlovedproduct' controller='myloved'}" title="{l s='My loved products' d='Shop.Theme.Transformer'}">{l s='My loved items' d='Shop.Theme.Transformer'}</a></li>{/if}		        
		    	    {if Module::isEnabled('stwishlist')}<li><a class="wishlist-link btn-line-under" href="{url entity='module' name='stwishlist' controller='mywishlist'}" title="{l s='My wishlists' d='Shop.Theme.Transformer'}">{l s='My wishlists' d='Shop.Theme.Transformer'}</a></li>{/if} 
				    {assign var='ma_customer_qty' value=Configuration::get('MA_CUSTOMER_QTY')}
					{if Module::isEnabled('ps_emailalerts') && $ma_customer_qty == 1}<li><a class="emailsalerts-link btn-line-under" href="{url entity='module' name='ps_emailalerts' controller='account'}" title="{l s='My alerts' d='Shop.Theme.Catalog'}">{l s='My alerts' d='Shop.Theme.Transformer'}</a></li>{/if}
		           </div>    
	      
	      </div>
	      {/if}
	      
	      
	      {if Module::isEnabled('stproductcomments') OR Module::isEnabled('stblogcomments') OR Module::isEnabled('stproductcommentspro')}
		  <!-- komentarze i opinie-->
	      <div class="center-account-box list-group-item">	
		        <h4 class="account-heading">
		            <i class="fto-calendar-1 mar_r4 fs_lg"></i>{l s='My comments' d='Shop.Theme.Transformer'}
		        </h4>
		        <div class="center-account-box-item">
					<p>{l s='Rate and comment on your favorite products and articles.' d='Shop.Theme.Transformer'}</p>		        
					{if Module::isEnabled('stproductcommentspro')}<li><a class="lnk_stproductcomments btn-line-under" href="{url entity='module' name='stproductcommentspro' controller='mycomments'}" title="{l s='Product comments' d='Shop.Theme.Transformer'}">{l s='Product comments' d='Shop.Theme.Transformer'}</a></li>{/if}
					{if Module::isEnabled('stproductcomments')}<li><a class="lnk_stproductcomments btn-line-under" href="{url entity='module' name='stproductcomments' controller='mycomments'}" title="{l s='Product comments' d='Shop.Theme.Transformer'}">{l s='Product comments' d='Shop.Theme.Transformer'}</a></li>{/if}
					{if Module::isEnabled('stblogcomments')}<li><a class="lnk_stblogcomments btn-line-under" href="{url entity='module' name='stblogcomments' controller='mycomments'}" title="{l s='Blog comments' d='Shop.Theme.Transformer'}">{l s='Blog comments' d='Shop.Theme.Transformer'}</a></li>{/if}		        
		        </div>
	      
	      </div>	      	      	  		
	     {/if}

	      
	      <div class="center-account-box list-group-item">
	      	    <h4 class="account-heading">
		            <i class="fto-calendar-1 mar_r4 fs_lg"></i>{l s='Sign out' d='Shop.Theme.Actions'}
		        </h4> 
	   			<div class="center-account-box-item">
	      			 <p>{l s='Log out securely from your account.' d='Shop.Theme.Transformer'}</p>	
	       			<li><a href="{url entity=index params=['mylogout'=>'']}" class="sign-out-link btn-line-under" title="{l s='Sign out' d='Shop.Theme.Actions'}"><i class="fto-logout-1 mar_r4 fs_lg"></i>{l s='Sign out' d='Shop.Theme.Actions'} - {$customer.firstname}</a></li>
        		 </div>
           </div>
         
       
	      