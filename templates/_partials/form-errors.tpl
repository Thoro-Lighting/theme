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
{if $errors|count}
  <div class="help-block alert alert-danger">
    {block name='form_errors'}
    <ul class="m-b-0">
      {foreach $errors as $error}
        <li>{$error}</li>
      {/foreach}
    </ul>
    {/block}
  </div>
{/if}

{if isset($name)}
  <div class="help-block help-block-for-js alert alert-danger">
    <ul class="steco_mb_0">
        <li>
    		{if $name === 'password' or $name === 'new_password'}{l s='The password must be at least five characters long.' d='Shop.Theme.Transformer'}{elseif $name=="phone" OR $name=="phone_mobile"}{l s='The telephone number must be at least four characters long. Allowed numbers and signs - ().' d='Shop.Theme.Transformer'}{else}{l s='This field is invalid.' d='Shop.Theme.Transformer'}{/if}
            {if $name=='firstname' || $name=='lastname'}
                {l s='Can\'t contains numbers and special characters.' d='Shop.Theme.Errors'}
            {/if} 
        </li>
    </ul>
  </div>
{/if}