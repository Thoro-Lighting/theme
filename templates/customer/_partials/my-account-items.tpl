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


<!-- moje dane -->
<div class="center-account-box list-group-item">
	<h4 class="account-heading">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect x="4" y="6" width="16" height="12" rx="2" stroke="#181B1A" stroke-width="1.5" />
			<path d="M6 8.5H16" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" />
			<path d="M6 11.5H14" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" />
			<path d="M6 14.5H12" stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" />
		</svg>
		{l s='My data' d='Shop.Theme.Transformer'}
	</h4>
	<div class="center-account-box-item">
		<p>{l s='Update and manage your basic personal data.' d='Shop.Theme.Transformer'}</p>
		<li><a class="btn-line-under  identity-link" href="{$urls.pages.identity}"
				title="{l s='Update your data' d='Shop.Theme.Transformer'}">{l s='Update your data' d='Shop.Theme.Transformer'}</a>
		</li>
		<li><a class="btn-line-under  identity-link" href="{$urls.pages.identity}"
				title="{l s='Update password' d='Shop.Theme.Transformer'}">{l s='Update password' d='Shop.Theme.Transformer'}</a>
		</li>
		{if Module::isEnabled('psgdpr')}<li><a class="lnk_psgdpr btn-line-under"
					href="{$link->getModuleLink('psgdpr', 'gdpr')}"
					title="{l s='My personal data' d='Shop.Theme.Transformer'}">{l s='My personal data' d='Shop.Theme.Transformer'}</a>
		</li>{/if}
	</div>
</div>

<!-- adresy -->
{if $customer.addresses|count}
	<div class="center-account-box list-group-item">
		<h4 class="account-heading">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M20.3812 10.875L18.75 9.24488V5.25C18.75 4.63125 18.2438 4.125 17.625 4.125H16.5C15.8812 4.125 15.375 4.63125 15.375 5.25V5.87212L13.125 3.62438C12.8179 3.33413 12.5366 3 12 3C11.4634 3 11.1821 3.33413 10.875 3.62438L3.61875 10.875C3.26775 11.2406 3 11.5073 3 12C3 12.6334 3.486 13.125 4.125 13.125H5.25V19.875C5.25 20.4938 5.75625 21 6.375 21H8.625C9.24632 21 9.75 20.4963 9.75 19.875V15.375C9.75 14.7562 10.2562 14.25 10.875 14.25H13.125C13.7438 14.25 14.25 14.7562 14.25 15.375V19.875C14.25 20.4963 14.1912 21 14.8125 21H17.625C18.2438 21 18.75 20.4938 18.75 19.875V13.125H19.875C20.514 13.125 21 12.6334 21 12C21 11.5073 20.7322 11.2406 20.3812 10.875Z"
					stroke="#181B1A" stroke-width="1.5" stroke-linejoin="round" />
			</svg>
			{l s='My addresses' d='Shop.Theme.Transformer'}
		</h4>

		<div class="center-account-box-item">
			<p>{l s='Update and manage your address book.' d='Shop.Theme.Transformer'}</p>
			<li><a class="btn-line-under  addresses-link" href="{$urls.pages.addresses}"
					title="{l s='Your addresses' d='Shop.Theme.Transformer'}">{l s='Your addresses' d='Shop.Theme.Transformer'}</a>
			</li>
			<li><a class="btn-line-under  addresses-link" href="{$urls.pages.addresses}"
					title="{l s='Update address' d='Shop.Theme.Transformer'}">{l s='Update address' d='Shop.Theme.Transformer'}</a>
			</li>
			<li><a class="btn-line-under  addresses-link" href="{$urls.pages.address}"
					title="{l s='Add a new address' d='Shop.Theme.Transformer'}">{l s='Add a new address' d='Shop.Theme.Transformer'}</a>
			</li>
		</div>

	</div>
{else}
	<!-- adresy pierwszy adres-->
	<div class="center-account-box list-group-item">
		<h4 class="account-heading">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M20.3812 10.875L18.75 9.24488V5.25C18.75 4.63125 18.2438 4.125 17.625 4.125H16.5C15.8812 4.125 15.375 4.63125 15.375 5.25V5.87212L13.125 3.62438C12.8179 3.33413 12.5366 3 12 3C11.4634 3 11.1821 3.33413 10.875 3.62438L3.61875 10.875C3.26775 11.2406 3 11.5073 3 12C3 12.6334 3.486 13.125 4.125 13.125H5.25V19.875C5.25 20.4938 5.75625 21 6.375 21H8.625C9.24632 21 9.75 20.4963 9.75 19.875V15.375C9.75 14.7562 10.2562 14.25 10.875 14.25H13.125C13.7438 14.25 14.25 14.7562 14.25 15.375V19.875C14.25 20.4963 14.1912 21 14.8125 21H17.625C18.2438 21 18.75 20.4938 18.75 19.875V13.125H19.875C20.514 13.125 21 12.6334 21 12C21 11.5073 20.7322 11.2406 20.3812 10.875Z"
					stroke="#181B1A" stroke-width="1.5" stroke-linejoin="round" />
			</svg>
			{l s='My addresses' d='Shop.Theme.Transformer'}
		</h4>

		<div class="center-account-box-item">
			<p>{l s='Update and manage your address book.' d='Shop.Theme.Transformer'}</p>
			<li><a class="btn-line-under addresses-link" href="{$urls.pages.address}"
					title="{l s='Add the first address' d='Shop.Theme.Transformer'}">{l s='Add the first address' d='Shop.Theme.Transformer'}</a>
			</li>
		</div>

	</div>
{/if}

<!-- zamowienia, zwroty, korekty, rabaty-->
<div class="center-account-box list-group-item">
	<h4 class="account-heading">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M6.59844 3L3.89844 6.6V19.2C3.89844 19.6774 4.08808 20.1352 4.42565 20.4728C4.76321 20.8104 5.22105 21 5.69844 21H18.2984C18.7758 21 19.2337 20.8104 19.5712 20.4728C19.9088 20.1352 20.0984 19.6774 20.0984 19.2V6.6L17.3984 3H6.59844Z"
				stroke="#181B1A" stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round" />
			<path
				d="M15.5984 10.2002C15.5984 11.155 15.2192 12.0706 14.544 12.7458C13.8689 13.4209 12.9532 13.8002 11.9984 13.8002C11.0437 13.8002 10.128 13.4209 9.45285 12.7458C8.77772 12.0706 8.39844 11.155 8.39844 10.2002"
				stroke="#181B1A" stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round" />
			<path d="M3.89844 6.59961H20.0984" stroke="#181B1A" stroke-width="1.35" stroke-linecap="round"
				stroke-linejoin="round" />
		</svg>
		{l s='Order history' d='Shop.Theme.Transformer'}
	</h4>

	<div class="center-account-box-item">
		<p>{l s='Browse the host of all your orders.' d='Shop.Theme.Transformer'}</p>
		{if !$configuration.is_catalog}<li><a class="btn-line-under  addresses-link" href="{$urls.pages.history}"
					title="{l s='Order history' d='Shop.Theme.Transformer'}">{l s='Order history' d='Shop.Theme.Transformer'}</a>
		</li>{/if}
		{if $configuration.return_enabled && !$configuration.is_catalog}<li><a class="btn-line-under returns-link"
					href="{$urls.pages.order_follow}"
					title="{l s='Merchandise returns' d='Shop.Theme.Transformer'}">{l s='Merchandise returns' d='Shop.Theme.Transformer'}</a>
		</li>{/if}
		{if !$configuration.is_catalog}<li><a class="btn-line-under order-slips-link" href="{$urls.pages.order_slip}"
					title="{l s='Credit slips' d='Shop.Theme.Transformer'}">{l s='Credit slips' d='Shop.Theme.Transformer'}</a>
		</li>{/if}
		{if $configuration.voucher_enabled && !$configuration.is_catalog}<li><a class="btn-line-under discounts-link"
					href="{$urls.pages.discount}"
					title="{l s='My vouchers' d='Shop.Theme.Transformer'}">{l s='My vouchers' d='Shop.Theme.Transformer'}</a>
		</li>{/if}
	</div>

</div>

{if Module::isEnabled('stlovedproduct') OR Module::isEnabled('stwishlist') OR Module::isEnabled('ps_emailalerts')}
	<!-- ulubione, schowki, powiadomienia-->
	<div class="center-account-box list-group-item">
		<h4 class="account-heading">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd"
					d="M4.98145 7.17447C5.75268 6.40348 6.79854 5.97036 7.88905 5.97036C8.97956 5.97036 10.0254 6.40348 10.7966 7.17447L12.0016 8.37843L13.2066 7.17447C13.586 6.78168 14.0398 6.46837 14.5416 6.25283C15.0433 6.0373 15.583 5.92385 16.129 5.9191C16.6751 5.91436 17.2166 6.01841 17.7221 6.2252C18.2275 6.43198 18.6867 6.73735 19.0728 7.12349C19.4589 7.50964 19.7643 7.96881 19.9711 8.47424C20.1779 8.97966 20.2819 9.5212 20.2772 10.0673C20.2724 10.6133 20.159 11.153 19.9435 11.6547C19.7279 12.1565 19.4146 12.6103 19.0218 12.9897L12.0016 20.0109L4.98145 12.9897C4.21046 12.2184 3.77734 11.1726 3.77734 10.0821C3.77734 8.99156 4.21046 7.94569 4.98145 7.17447V7.17447Z"
					stroke="#181B1A" stroke-width="1.28518" stroke-linejoin="round" />
			</svg>
			{l s='My products' d='Shop.Theme.Transformer'}
		</h4>
		<div class="center-account-box-item">
			<p>{l s='Manage your favorite products and notifications.' d='Shop.Theme.Transformer'}</p>
			{if Module::isEnabled('stlovedproduct')}<li><a class="love-link btn-line-under"
						href="{url entity='module' name='stlovedproduct' controller='myloved'}"
						title="{l s='My loved products' d='Shop.Theme.Transformer'}">{l s='My loved items' d='Shop.Theme.Transformer'}</a>
			</li>{/if}
			{if Module::isEnabled('stwishlist')}<li><a class="wishlist-link btn-line-under"
						href="{url entity='module' name='stwishlist' controller='mywishlist'}"
						title="{l s='My wishlists' d='Shop.Theme.Transformer'}">{l s='My wishlists' d='Shop.Theme.Transformer'}</a>
			</li>{/if}
			{assign var='ma_customer_qty' value=Configuration::get('MA_CUSTOMER_QTY')}
			{if Module::isEnabled('ps_emailalerts') && $ma_customer_qty == 1}<li><a class="emailsalerts-link btn-line-under"
						href="{url entity='module' name='ps_emailalerts' controller='account'}"
						title="{l s='My alerts' d='Shop.Theme.Catalog'}">{l s='My alerts' d='Shop.Theme.Transformer'}</a></li>
			{/if}
		</div>

	</div>
{/if}


<div class="center-account-box list-group-item">
	<h4 class="account-heading">
		<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M15.2194 20.6504L18.9253 20.6504C19.487 20.6504 20.0256 20.4291 20.4227 20.0353C20.8199 19.6415 21.043 19.1073 21.043 18.5504L21.043 5.95039C21.043 5.39344 20.8199 4.85929 20.4227 4.46547C20.0256 4.07164 19.487 3.85039 18.9253 3.85039L15.2194 3.85039M14.9563 12.2504L2.95625 12.2504M2.95625 12.2504L7.5414 17.0504M2.95625 12.2504L7.5414 7.45039"
				stroke="#181B1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		{l s='Sign out' d='Shop.Theme.Actions'}
	</h4>
	<div class="center-account-box-item">
		<p>{l s='Log out securely from your account.' d='Shop.Theme.Transformer'}</p>
		<li><a href="{url entity=index params=['mylogout'=>'']}" class="sign-out-link btn-line-under"
				title="{l s='Sign out' d='Shop.Theme.Actions'}">{l s='Sign out' d='Shop.Theme.Actions'}</a></li>
	</div>
</div>