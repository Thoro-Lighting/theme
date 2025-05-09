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

{block name='page_title'}{/block}

{block name='page_content'}
  <section class="from_blcok block">
    <h3 class="page_heading">{l s='Forgot your password?' d='Shop.Theme.Customeraccount'}</h3>
    <div class="form_content">
      <div class="form_content_inner">
        <form action="{$urls.pages.password}" class="forgotten-password" method="post">

          <ul class="ps-alert-error">
            {foreach $errors as $error}
              <li class="item">
                <i>
                  <svg viewBox="0 0 24 24">
                    <path fill="#fff"
                      d="M11,15H13V17H11V15M11,7H13V13H11V7M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20Z">
                    </path>
                  </svg>
                </i>
                <p>{$error}</p>
              </li>
            {/foreach}
          </ul>

          <p class="send-renew-password-link">
            {l s='Please enter the email address you used to register. You will receive a temporary link to reset your password.' d='Shop.Theme.Customeraccount'}
          </p>

          <section class="form-fields">
            <div
              {$input_fields = 3}
              class="form-group form-group-small {if $input_fields == 2}input_placeholder{/if} {if $input_fields == 1}input_label{/if} {if $input_fields == 3}animation_placeholder{/if} placeholder_error_{$placeholder_error} fields_border_{$input_fields_border}">
              {if $input_fields == 1}<label
                class="form-control-label required">{l s='Email address' d='Shop.Forms.Labels'}</label>{/if}
              <div class="email">
                <input type="email" name="email" id="email"
                  value="{if isset($smarty.post.email)}{$smarty.post.email|stripslashes}{/if}" class="form-control"
                  {if $input_fields == 2}placeholder="{l s='Email address' d='Shop.Forms.Labels'} ..." {/if} required>
                {if $input_fields == 3}
                  <label class="{if $field.required} required{/if} form-control-placeholder">
                    {l s='Email address' d='Shop.Forms.Labels'}
                  </label>
                {/if}

                {if $placeholder_error == 3 || $placeholder_error == 5}<span class="has_error_icon"></span>{/if}

              </div>



            </div>
          </section>
          <footer class="form-footer flex_container">
            <a href="{$urls.pages.my_account}"
              class="account-link btn-secondary flex_child mar_r6">
              <span>{l s='Back to login' d='Shop.Theme.Actions'}</span>
            </a>
            <button class="form-control-submit btn-main flex_child"
              name="submit" type="submit">
              {l s='Send reset link' d='Shop.Theme.Actions'}
            </button>
          </footer>

        </form>
      </div>
    </div>
  </section>
{/block}

{block name='page_footer'}{/block}