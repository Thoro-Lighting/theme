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
{extends file='page.tpl'}

{block name='page_content'}
<div class="col-lg-6 offset-lg-3">
<section class="from_blcok block">
{block name='page_title'}
   <h3 class="page_heading">{l s='Forgot your password?' d='Shop.Theme.Customeraccount'}</h3>
{/block}
<div class="container-fluid">
  <ul class="ps-alert-success">
    {foreach $successes as $success}
      <li class="item">
        <i>
          <svg viewBox="0 0 24 24">
            <path fill="#fff" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
          </svg>
        </i>
        <p>{$success}</p>
      </li>
    {/foreach}
  </ul>
    {block name='page_footer'}
  <p><a href="{$urls.pages.authentication}" class="btn-main btn" title="{l s='Back to Login' d='Shop.Theme.Actions'}">{l s='Back to Login' d='Shop.Theme.Actions'}</a></p>
{/block}
</div>
</section>
  </div>
{/block}


