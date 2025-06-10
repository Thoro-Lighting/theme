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
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2015 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}

<div class="tabs sticky_off">
    <p class="mb-2 tittle-notification">{l s='Send notification' d='Shop.Theme.Transformer'}</p>
    <div class="js-mailalert-alerts"></div>
    <div class="js-mailalert" style="text-align:center;"
        data-url="{url entity='module' name='ps_emailalerts' controller='actions' params=['process' => 'add']}">
        {if isset($email) AND $email}
            <div class="form-group animation_placeholder st-is-empty">
                <div class="">
                    <input class="form-control" type="email">
                    <label class="form-control-placeholder">
                        E-mail
                    </label>
                </div>
            </div>
        {/if}
        {if isset($id_module)}
            {hook h='displayGDPRConsent' id_module=$id_module}
        {/if}
        <input type="hidden" value="{$id_product}" />
        <input type="hidden" value="{$id_product_attribute}" />
        <button class="btn btn-main w-100" type="submit" rel="nofollow"
            onclick="return addNotification();">{l s='Notify me when available' d='Shop.Theme.Transformer'}</button>
        <span style="display:none;padding:5px"></span>
    </div>
</div>