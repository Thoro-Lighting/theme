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
 <section id="main" class="register_info">
  

         <!-- shipping informations -->
        {block name='hook_shopping_cart_footer'}
          {hook h='displayRegisterOn'}
        {/block}
         <!-- shipping informations -->
        

        {block name='continue_shopping'}
          <a href="{$urls.pages.index}" class="btn btn-main w-100 {if $arrow_buttons}btn_arrow black_arrow bt_left btn_blus{/if}" title="{l s='Continue shopping' d='Shop.Theme.Actions'}">
            {*<i class="fto-left-open">*}</i>{l s='Home' d='Shop.Theme.Global'}
          </a>
        {/block}

      
     

      

 
  </section>
  
{/block}
