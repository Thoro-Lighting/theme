{if $logged}
		{if $line_login == 0}{if isset($welcome_logged) && trim($welcome_logged)}{if $welcome_link}<a href="{$welcome_link}" class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}" rel="nofollow" title="{$welcome_logged}">{else}<span class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}">{/if}<span class="header_item">{$welcome_logged}</span>{if $welcome_link}</a>{else}</span>{/if}{/if}{/if}
		
	{if $line_login == 2}	
		<div class="welcome top_bar_item"><span class="header_item"><span class="header_item dropdown_tri">{$welcome_logged} {if $show_name == 0 }{$customer.firstname}{elseif $show_name == 1}{$customer.lastname}{else}{$customerName}{/if}</span></span></div>{/if}
		
		{if $userinfo_dropdown}
		
		
			<div class="quick_login my_account userinfo_mod_top {if $quick_login_option < 3}dropdown_wrap{/if} top_bar_item">
			
		
			{strip}
	            <a href="{if $quick_login_option < 3}{$my_account_url}{else}javascript:;{/if}" class="dropdown_tri_in header_item {if $quick_login_option == 3}mobile_bar_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" {if $quick_login_option == 3}data-name="side_stcustomersignin" data-direction="open_bar_{if $quick_login_side==2}left{else}right{/if}"{/if}  title="{l s='View my customer account' d='Shop.Theme.Transformer'}" rel="nofollow" aria-haspopup="true" aria-expanded="false">
	        	{if $line_login == 1 OR $line_login == 2}{if $icone_myaccount ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<span class="header_item header_item dropdown_tri {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{l s='My account' d='Shop.Theme.Transformer'}</span>{/if}{elseif $line_login == 4 OR $line_login == 0}{if $icone_user ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<span class="header_item header_item dropdown_tri {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{$customerName}</span>{/if}{/if}
		        {if $line_login == 5 OR $line_login == 6}{if $icone_myaccount ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<div class="one_line mobile_bar_tri_text">{if $line_login == 5}{$welcome_logged} {$customer.firstname}{elseif $line_login == 6}{$customerName}{/if}<br>{l s='My account' d='Shop.Theme.Transformer'}</div>{/if}{/if}
		        {if $show_arrows == 1}<i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i>{/if}
	            
	            
	            </a>
	            {/strip}
	            {if $quick_login_option < 3}
		        <div class="dropdown_list">
            		<ul class="dropdown_list_ul dropdown_box custom_links_list">
            		     <li class="line_name"><span>{$welcome_logged} {if $show_name == 0 }{$customer.firstname}{elseif $show_name == 1}{$customer.lastname}{else}{$customerName}{/if}</span></li>            		
            			<li><a href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Transformer'}" rel="nofollow" class="dropdown_list_item">{l s='My account' d='Shop.Theme.Transformer'}</a></li>
						{if $show_identity}<li><a href="{$urls.pages.identity}" rel="nofollow" class="dropdown_list_item" title="{l s='My data' d='Shop.Theme.Transformer'}">{l s='My data' d='Shop.Theme.Transformer'}</a></li>{/if}
					    {if $show_adres}<li><a href="{$urls.pages.addresses}" rel="nofollow" class="dropdown_list_item" title="{l s='My addresses' d='Shop.Theme.Transformer'}">{l s='My addresses' d='Shop.Theme.Transformer'}</a></li>{/if}
					    {if $show_order}<li><a href="{$urls.pages.history}" rel="nofollow" class="dropdown_list_item" title="{l s='Order history' d='Shop.Theme.Transformer'}">{l s='Order history' d='Shop.Theme.Transformer'}</a></li>{/if}
					    {if $show_order_follow && $configuration.return_enabled && !$configuration.is_catalog}<li><a href="{$urls.pages.order_follow}" rel="nofollow" class="dropdown_list_item" title="{l s='Merchandise returns' d='Shop.Theme.Transformer'}">{l s='Merchandise returns' d='Shop.Theme.Transformer'}</a></li>{/if}
					    {if $show_credit_slip}<li><a href="{$urls.pages.order_slip}" rel="nofollow" class="dropdown_list_item" title="{l s='Credit slips' d='Shop.Theme.Transformer'}">{l s='Credit slips' d='Shop.Theme.Transformer'}</a></li>{/if}
					    {if $show_coupon && $configuration.voucher_enabled && !$configuration.is_catalog}<li><a href="{$urls.pages.discount}" rel="nofollow" class="dropdown_list_item" title="{l s='My vouchers' d='Shop.Theme.Transformer'}">{l s='My vouchers' d='Shop.Theme.Transformer'}</a></li>{/if}
					    {if $show_p_coments && Module::isEnabled('stproductcomments')}<li><a href="{url entity='module' name='stproductcomments' controller='mycomments'}" rel="nofollow" class="dropdown_list_item" title="{l s='Product comments' d='Shop.Theme.Transformer'}">{l s='Product comments' d='Shop.Theme.Transformer'}</a></li>{/if}
                        {if $show_p_coments && Module::isEnabled('stproductcommentspro')}<li><a href="{url entity='module' name='stproductcommentspro' controller='mycomments'}" rel="nofollow" class="dropdown_list_item" title="{l s='Product comments' d='Shop.Theme.Transformer'}">{l s='Product comments' d='Shop.Theme.Transformer'}</a></li>{/if}
				        {if $show_b_coments && Module::isEnabled('stblogcomments')}<li><a href="{url entity='module' name='stblogcomments' controller='mycomments'}" rel="nofollow" class="dropdown_list_item" title="{l s='Blog comments' d='Shop.Theme.Transformer'}">{l s='Blog comments' d='Shop.Theme.Transformer'}</a></li>{/if}
						{if $show_love && Module::isEnabled('stlovedproduct')}<li><a href="{url entity='module' name='stlovedproduct' controller='myloved'}" rel="nofollow" class="dropdown_list_item" title="{l s='My loved items' d='Shop.Theme.Transformer'}">{l s='My loved items' d='Shop.Theme.Transformer'}</a></li>{/if}
						{if $show_wishlist && Module::isEnabled('stwishlist')}<li><a href="{url entity='module' name='stwishlist' controller='mywishlist'}" rel="nofollow" class="dropdown_list_item" title="{l s='My wishlists' d='Shop.Theme.Transformer'}">{l s='My wishlists' d='Shop.Theme.Transformer'}</a></li>{/if}
						{assign var='ma_customer_qty' value=Configuration::get('MA_CUSTOMER_QTY')}
						{if $show_mailalerts && Module::isEnabled('ps_emailalerts') && $ma_customer_qty == 1 }<li><a href="{url entity='module' name='ps_emailalerts' controller='account'}" rel="nofollow" class="dropdown_list_item" title="{l s='My alerts' d='Shop.Theme.Transformer'}">{l s='My alerts' d='Shop.Theme.Transformer'}</a></li>{/if}
						{if $show_rodo && Module::isEnabled('psgdpr')}<li><a href="{$link->getModuleLink('psgdpr', 'gdpr')}" rel="nofollow" class="dropdown_list_item" title="{l s='My personal data' d='Shop.Theme.Transformer'}">{l s='My personal data' d='Shop.Theme.Transformer'}</a></li>{/if}
						{if $show_logoff}<li class="logoff_last"><a href="{$logout_url}" rel="nofollow" class="dropdown_list_item {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}" title="{l s='Log me out' d='Shop.Theme.Transformer'}"><i class="fto-logout-1"></i> {l s='Sign out' d='Shop.Theme.Transformer'}</a></li>{/if}
		    	
		    		
		    		
		    		</ul>
		        </div>
		        {/if}
		    </div>
		   {if $show_link_account_logoff == 1}<a class="logout top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if}" href="{$logout_url}" rel="nofollow" title="{l s='Log me out' d='Shop.Theme.Transformer'}">{if $show_text == 1}<span class="header_item {if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{l s='Sign out' d='Shop.Theme.Transformer'}{/if}{if $icone_logoff ==1}<i class="fto-logout-us {if $css_header == 1}hover_icone{/if}"></i>{/if}</span></a>{/if}
	
		    
		{else}
		
		 {if $line_login == 5 OR $line_login == 6}
		 
		 <a href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Transformer'}" class="my_account top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" rel="nofollow">{if $icone_myaccount ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<div class="one_line mobile_bar_tri_text">{if $line_login == 5}{$welcome_logged} {$customer.firstname}{elseif $line_login == 6}{$customerName}{/if}<br>{l s='My account' d='Shop.Theme.Transformer'}</div>{/if}</a>
			
		 
		 {else}
		
			{if $line_login != 2}<a href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Transformer'}" class="my_account top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" rel="nofollow">{if $icone_myaccount ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<span class="header_item {if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{if $line_login == 1 OR $line_login == 2}{l s='My account' d='Shop.Theme.Transformer'}{else}{$customerName}{/if}</span>{/if}</a>{/if}
			{if $line_login == 2}<a href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Transformer'}" class="my_account top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" rel="nofollow">{if $icone_myaccount ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<span class="header_item {if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{l s='My account' d='Shop.Theme.Transformer'}</span>{/if}</a>{/if}
			{if $show_link_account_logoff == 1}<a class="logout top_bar_item" href="{$logout_url}" rel="nofollow" title="{l s='Log me out' d='Shop.Theme.Transformer'}">{if $show_text == 1}<span class="header_item {if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if}">{l s='Sign out' d='Shop.Theme.Transformer'}{/if}{if $icone_logoff ==1}<i class="fto-logout-us {if $css_header == 1}hover_icone{/if}"></i>{/if}</span></a>{/if}
		{/if}{/if}
{else}
		{if isset($welcome) && trim($welcome)}{if $welcome_link}<a href="{$welcome_link}" class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}" rel="nofollow" title="{$welcome}">{else}<span class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}">{/if}<span class="header_item">{$welcome}</span>{if $welcome_link}</a>{else}</span>{/if}{/if}
		{if $userinfo_login}
			{if $show_link_register == 1}<a class="registration top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" href="{$my_account_url}" rel="nofollow" title="{l s='Register in the store' d='Shop.Theme.Transformer'}"><span class="header_item">{if $icone_registration ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}">{/if}</span>{if $show_text == 1}<span class="{if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{l s='Registration' d='Shop.Theme.Transformer'}</span>{/if}</span></a>{/if}
		
			<div class="quick_login {if $quick_login_option == 1}dropdown_wrap{/if} top_bar_item">{strip}
	        	<a href="{if $quick_login_option == 1}{$my_account_url}{elseif $quick_login_option == 2}#inline_popup_content_login{else}javascript:;{/if}" class="{if $quick_login_option == 2}inline_popup_tri{/if} dropdown_tri_in header_item mobile_bar_tri {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" {if $quick_login_option == 3}data-name="side_stcustomersignin" data-direction="open_bar_{if $quick_login_side==2}left{else}right{/if}"{/if} aria-haspopup="true" aria-expanded="false" rel="nofollow" title="{l s='Log in to your customer account' d='Shop.Theme.Transformer'}">
		          {if $line_login != 5 && $line_login != 6}{if $icone_login ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<span class="header_item dropdown_tri {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{l s='Login' d='Shop.Theme.Transformer'}</span>{/if}{/if}
		           {if $line_login == 5 OR $line_login == 6}{if $icone_myaccount ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<div class="one_line mobile_bar_tri_text">{if $line_login == 5}{$welcome_logged}{elseif $line_login == 6}{l s='Registration' d='Shop.Theme.Transformer'}{/if}<br>{l s='Login' d='Shop.Theme.Transformer'}</div>{/if}{/if}
		           
		           {if $show_arrows == 1}<i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i>{/if}
	            </a>
				{/strip}
				
				 {if $quick_login_option == 1}
		        <div class="dropdown_list">
		            <div class="dropdown_box login_from_block">
		             <div class="sidebar_login_form">
		             <div class="head">{l s='Hello, if you already have an account, log in.' d='Shop.Theme.Transformer'}</div>
		    			<form action="{$authentication_url}" method="post">
						  <div class="form_content">
					        {foreach from=$formFields item="field"}
					            {form_field field=$field file='_partials/form-fields-1.tpl'}
					        {/foreach}
						      <div class="form-group forgot-password">
						          <a href="{$urls.pages.password}" rel="nofollow" title="{l s='Forgot your password?' d='Shop.Theme.Transformer'}">
						            {l s='Forgot your password?' d='Shop.Theme.Transformer'}
						          </a>
						      </div>
						  </div>
						  <div class="form-footer">
						    <input type="hidden" name="submitLogin" value="1">
						    <button class="btn btn-primary btn-spin btn-full-width" data-link-action="sign-in" type="submit">
						      {*<i class="fto-lock fto_small"></i>*}
						      {l s='Sign in' d='Shop.Theme.Transformer'}
						    </button>
						     </div>

						</form>
						</div>
						
						<div class="sidebar_auth_form">
						<div class="head">{l s='You are a new user?' d='Shop.Theme.Transformer'}</div>
						<a class="btn btn-border btn-full-width {if $arrow_buttons}btn_arrow black_arrow{/if} btn-spin js-submit-active" href="{$urls.pages.register}" rel="nofollow" title="{l s='Create an account' d='Shop.Theme.Transformer'}">
								{l s='Create an account' d='Shop.Theme.Transformer'}
							</a>
							</div>

		    		</div>
		        </div>
		        {elseif $quick_login_option == 2}
		        <div id="inline_popup_content_login" class="inline_popup_content mfp-hide mfp-with-anim">
		        
		             <div class="sidebar_login_form">
		             <div class="head">{l s='Hello, if you already have an account, log in.' d='Shop.Theme.Transformer'}</div>
		    			<form action="{$authentication_url}" method="post">
						  <div class="form_content">
					        {foreach from=$formFields item="field"}
					            {form_field field=$field file='_partials/form-fields-1.tpl'}
					        {/foreach}
						      <div class="form-group forgot-password">
						          <a href="{$urls.pages.password}" rel="nofollow" title="{l s='Forgot your password?' d='Shop.Theme.Transformer'}">
						            {l s='Forgot your password?' d='Shop.Theme.Transformer'}
						          </a>
						      </div>
						  </div>
						  <div class="form-footer">
						    <input type="hidden" name="submitLogin" value="1">
						    <button class="btn btn-primary btn-spin btn-full-width" data-link-action="sign-in" type="submit">
						      {*<i class="fto-lock fto_small"></i>*}
						      {l s='Sign in' d='Shop.Theme.Transformer'}
						    </button>
						     </div>

						</form>
						</div>
						
						<div class="sidebar_auth_form">
						<div class="head">{l s='You are a new user?' d='Shop.Theme.Transformer'}</div>
						<a class="btn btn-border btn-full-width {if $arrow_buttons}btn_arrow black_arrow{/if} btn-spin js-submit-active" href="{$urls.pages.register}" rel="nofollow" title="{l s='Create an account' d='Shop.Theme.Transformer'}">
								{l s='Create an account' d='Shop.Theme.Transformer'}
							</a>
							</div>

		    		</div>
		        
 
		        {/if}
		    </div>
		    {if $show_link_account == 1}<a class="my_account top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" href="{$my_account_url}" rel="nofollow" title="{l s='My account' d='Shop.Theme.Transformer'}">{if $icone_myaccount ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<span class="header_item {if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{l s='My account' d='Shop.Theme.Transformer'}</span>{/if}</a>{/if}
		
		  {else}
		 {if $line_login == 5 OR $line_login == 6}
		 <a class="registration top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" href="{$my_account_url}" rel="nofollow" title="{l s='Register in the store' d='Shop.Theme.Transformer'}">{if $icone_registration ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<div class="one_line mobile_bar_tri_text">{if $line_login == 5}{$welcome_logged}{elseif $line_login == 6}{l s='Registration' d='Shop.Theme.Transformer'}{/if}<br>{l s='Login' d='Shop.Theme.Transformer'}</div>{/if}</a>
		
		 {else} 
		  
		{if $show_link_register == 1}<a class="registration top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" href="{$my_account_url}" rel="nofollow" title="{l s='Register in the store' d='Shop.Theme.Transformer'}">{if $icone_registration ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<span class="header_item {if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}" >{l s='Registration' d='Shop.Theme.Transformer'}</span>{/if}</a>{/if}
		{if $show_link_login == 1}<a class="login top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" href="{$my_account_url}" rel="nofollow" title="{l s='Log in to your customer account' d='Shop.Theme.Transformer'}">{if $icone_login ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if} "></span>{/if}{if $show_text == 1}<span class="header_item {if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{l s='Login' d='Shop.Theme.Transformer'}</span>{/if}</a>{/if}
		{if $show_link_account == 1}<a class="my_account top_bar_item {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_item{/if}" href="{$my_account_url}" rel="nofollow" title="{l s='My account' d='Shop.Theme.Transformer'}">{if $icone_myaccount ==1}<span class="icone_svg_us {if $css_header == 1}hover_icone{/if}"></span>{/if}{if $show_text == 1}<span class="header_item {if $hookName == displayNav1 OR $hookName == displayNav2 OR $hookName == displayNav3}header_item dropdown_tri{/if} {if $hookName == displayHeaderLeft OR $hookName == displayHeaderCenter OR $hookName == displayTop}mobile_bar_tri_text {if $show_user_info_icons == 0}yes_device_1{else}yes_device_2{/if}{/if} {if $customer_border_hover == 1}btn-line{elseif $customer_border_hover == 2}btn-line-under{/if}">{l s='My account' d='Shop.Theme.Transformer'}</span>{/if}</a>{/if}
		{/if}
		
		{/if}
{/if}