{*
* 2007-2018 PrestaShop
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2018 PrestaShop SA
* @license   http://addons.prestashop.com/en/content/12-terms-and-conditions-of-use
* International Registered Trademark & Property of PrestaShop SA
*}

{assign var='psgdpr_url' value=$link->getModuleLink('psgdpr', 'gdpr')}
<li>
  <a class="lnk_psgdpr btn-line{if $urls.current_url == $psgdpr_url} page-current{/if}" href="{$psgdpr_url}" title="{l s='My personal data' d='Shop.Theme.Catalog'}">
    {l s='My personal data' d='Shop.Theme.Transformer'}
  </a>
</li>