<nav id="side_stcustomersignin" class="st-menu {if $logged}bg_white{/if}">
	<div class="st-menu-header">
		<div class="st-menu-title">{l s='My account' d='Shop.Theme.Transformer'}</div>
		<a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M18 6L6 18M18 18L6 6" stroke="#181B1A" stroke-width="1.2" stroke-linecap="round" />
			</svg>
		</a>
	</div>
	<div class="quick_login my_account userinfo_mod_top dropdown_wrap top_bar_item">
		<div class="dropdown_list_ul dropdown_box custom_links_list">
			<p class="account-head"><a href="{$my_account_url}"
					title="{l s='View my customer account' d='Shop.Theme.Transformer'}" rel="nofollow"
					class="dropdown_list_item">{if $customer.is_logged}{l s='Welcome' d='Shop.Theme.Transformer'}
					{$customer.firstname}!{else}
						{l s='My account' d='Shop.Theme.Transformer'}
					{/if}</a></p>

			<ul class="customer-links">
				<li><a href="{$urls.pages.identity}" rel="nofollow" class="dropdown_list_item"
						title="{l s='My data' d='Shop.Theme.Transformer'}"><svg width="18" height="14"
							viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="1" y="0.75" width="16" height="12" rx="2" stroke="#181B1A" stroke-width="1.5" />
							<path d="M3 3.25H13" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" />
							<path d="M3 6.25H11" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" />
							<path d="M3 9.25H9" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" />
						</svg>
						{l s='My data' d='Shop.Theme.Transformer'}</a>
				</li>
				<li><a href="{$urls.pages.addresses}" rel="nofollow" class="dropdown_list_item"
						title="{l s='My addresses' d='Shop.Theme.Transformer'}"><svg width="20" height="20"
							viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M18.3812 9.125L16.75 7.49488V3.5C16.75 2.88125 16.2438 2.375 15.625 2.375H14.5C13.8812 2.375 13.375 2.88125 13.375 3.5V4.12212L11.125 1.87438C10.8179 1.58413 10.5366 1.25 10 1.25C9.46338 1.25 9.18213 1.58413 8.875 1.87438L1.61875 9.125C1.26775 9.49062 1 9.75725 1 10.25C1 10.8834 1.486 11.375 2.125 11.375H3.25V18.125C3.25 18.7438 3.75625 19.25 4.375 19.25H6.625C7.24632 19.25 7.75 18.7463 7.75 18.125V13.625C7.75 13.0062 8.25625 12.5 8.875 12.5H11.125C11.7438 12.5 12.25 13.0062 12.25 13.625V18.125C12.25 18.7463 12.1912 19.25 12.8125 19.25H15.625C16.2438 19.25 16.75 18.7438 16.75 18.125V11.375H17.875C18.514 11.375 19 10.8834 19 10.25C19 9.75725 18.7322 9.49062 18.3812 9.125Z"
								stroke="#181B1A" stroke-width="1.5" stroke-linejoin="round" />
						</svg>
						{l s='My addresses' d='Shop.Theme.Transformer'}</a>
				</li>
			</ul>
			<ul class="customer-links border-icon">
				<li><a href="{$urls.pages.history}" rel="nofollow" class="dropdown_list_item"
						title="{l s='Order history' d='Shop.Theme.Transformer'}"><svg width="18" height="20"
							viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M3.59941 0.75L0.899414 4.35V16.95C0.899414 17.4274 1.08906 17.8852 1.42662 18.2228C1.76419 18.5604 2.22202 18.75 2.69941 18.75H15.2994C15.7768 18.75 16.2346 18.5604 16.5722 18.2228C16.9098 17.8852 17.0994 17.4274 17.0994 16.95V4.35L14.3994 0.75H3.59941Z"
								stroke="#181B1A" stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round" />
							<path
								d="M12.5994 7.94922C12.5994 8.904 12.2201 9.81967 11.545 10.4948C10.8699 11.1699 9.95419 11.5492 8.99941 11.5492C8.04463 11.5492 7.12896 11.1699 6.45383 10.4948C5.7787 9.81967 5.39941 8.904 5.39941 7.94922"
								stroke="#181B1A" stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M0.899414 4.34961H17.0994" stroke="#181B1A" stroke-width="1.35"
								stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						{l s='Order history' d='Shop.Theme.Transformer'}</a></li>
				{if Module::isEnabled('stlovedproduct')}<li><a
							href="{url entity='module' name='stlovedproduct' controller='myloved'}" rel="nofollow"
							class="dropdown_list_item" title="{l s='My loved items' d='Shop.Theme.Transformer'}"><svg
								width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M1.98194 2.42349C2.75316 1.6525 3.79903 1.21938 4.88954 1.21938C5.98005 1.21938 7.02591 1.6525 7.79714 2.42349L9.00212 3.62745L10.2071 2.42349C10.5865 2.0307 11.0403 1.71739 11.542 1.50186C12.0438 1.28632 12.5834 1.17287 13.1295 1.16812C13.6756 1.16338 14.2171 1.26743 14.7225 1.47422C15.228 1.681 15.6871 1.98638 16.0733 2.37252C16.4594 2.75866 16.7648 3.21784 16.9716 3.72326C17.1784 4.22868 17.2824 4.77022 17.2777 5.31629C17.2729 5.86236 17.1595 6.40201 16.9439 6.90376C16.7284 7.40551 16.4151 7.85932 16.0223 8.23869L9.00212 15.2599L1.98194 8.23869C1.21095 7.46747 0.777832 6.4216 0.777832 5.33109C0.777832 4.24058 1.21095 3.19472 1.98194 2.42349V2.42349Z"
									stroke="#181B1A" stroke-width="1.28518" stroke-linejoin="round" />
						</svg>{l s='My loved items' d='Shop.Theme.Transformer'}</a></li>{/if}
			</ul>
			<ul class="customer-links border-icon border-bottom">
				<li><a href="{$urls.pages.discount}" rel="nofollow" class="dropdown_list_item"
						title="{l s='My vouchers' d='Shop.Theme.Transformer'}"><svg width="22" height="22"
							viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M7.3999 14.3504L14.5999 7.15039M7.9538 7.69973L7.93965 7.68544M14.0643 13.8731L14.0502 13.8588M6.92276 3.13772L5.90485 3.19971C4.58341 3.28019 3.5297 4.3339 3.44922 5.65534L3.38723 6.67325C3.35167 7.25716 3.12169 7.81236 2.73395 8.25039L2.05802 9.014C1.18053 10.0053 1.18053 11.4955 2.05802 12.4868L2.73395 13.2504C3.12169 13.6884 3.35167 14.2436 3.38723 14.8275L3.44922 15.8454C3.5297 17.1669 4.58342 18.2206 5.90485 18.3011L6.92276 18.3631C7.50667 18.3986 8.06187 18.6286 8.4999 19.0163L9.26351 19.6923C10.2548 20.5698 11.745 20.5698 12.7363 19.6923L13.4999 19.0163C13.9379 18.6286 14.4931 18.3986 15.077 18.3631L16.0949 18.3011C17.4164 18.2206 18.4701 17.1669 18.5506 15.8454L18.6126 14.8275C18.6481 14.2436 18.8781 13.6884 19.2658 13.2504L19.9418 12.4868C20.8193 11.4955 20.8193 10.0053 19.9418 9.01399L19.2658 8.25039C18.8781 7.81236 18.6481 7.25715 18.6126 6.67325L18.5506 5.65534C18.4701 4.3339 17.4164 3.28019 16.0949 3.19971L15.077 3.13772C14.4931 3.10215 13.9379 2.87218 13.4999 2.48444L12.7363 1.80851C11.745 0.931018 10.2548 0.931018 9.26351 1.80851L8.4999 2.48444C8.06187 2.87218 7.50667 3.10215 6.92276 3.13772Z"
								stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" />
						</svg>{l s='My vouchers' d='Shop.Theme.Transformer'}</a></li>
			</ul>
		</div>
		<div class="quick_login_footer">
			{if $customer.is_logged}
				<a href="{url entity=index params=['mylogout'=>'']}" rel="nofollow"
					class="btn-secondary"
					title="{l s='Log me out' d='Shop.Theme.Transformer'}">{l s='Sign out' d='Shop.Theme.Transformer'}</a>
			{else}
				<p class="login_last">
					<a class="btn-main login-customer" href="{$authentication_url}" rel="nofollow"
						title="{l s='Sign in' d='Shop.Theme.Transformer'}">{l s='Sign in' d='Shop.Theme.Transformer'}</a>
					<span class="new-client">{l s='New client?' d='Shop.Theme.Transformer'}</span>
					<a class="customer-register" href="{$urls.pages.register}" rel="nofollow"
						title="{l s='Create an account' d='Shop.Theme.Transformer'}">{l s='Create an account' d='Shop.Theme.Transformer'}</a>
				</p>
			{/if}
		</div>

	</div>

</nav>