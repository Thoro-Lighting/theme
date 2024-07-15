{*
* 2007-2012 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 17677 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file='customer/page.tpl'}
{block name="page_content"}

  <h6 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i class="fto-angle-double-left side_close_left"></i></a>{l s='Product comments' d='Shop.Theme.Transformer'}</h6>

{if isset($orders) && count($orders)}
{foreach $orders AS $order}
<div class="card card_trans block comments-block">
  <div class="card-header">
        <span>{l s='Order reference:' d='Shop.Theme.Transformer'} <a href="{$link->getPageLink('order-detail', null, null, ['id_order'=>$order.id_order])}">{$order.reference}</a></span>,
        <span>{l s='Payment:' d='Shop.Theme.Transformer'} {$order.payment}</span>,
        <span>{l s='Date:' d='Shop.Theme.Transformer'} {dateFormat date=$order.date_add full=0}</span>
  </div>
  <div class="card-block">
    {if isset($order.detail.products)}
    <div class="base_list_line large_list">
    {foreach $order.detail.products AS $product}
    <div class="line_item flex_box">
        <div class="col-md-1 col-sm-2 mb-3">
            {if isset($product.cover)}<img src="{$product.cover.bySize.cart_default.url}" width="{$product.cover.bySize.cart_default.width}" height="{$product.cover.bySize.cart_default.height}" alt="{$product.product_name}" />{/if}
        </div>
        <div class="col-md-8 col-sm-10">
            <span class="font-weight-bold">{$product.product_name}</span>
            <div class="mb-1">{l s='Quantity' d='Shop.Theme.Transformer'}: {$product.quantity}</div>
            {if $product.reference}<div class="mb-1">{l s='Reference' d='Shop.Theme.Transformer'}: {$product.reference}</div>{/if}
            <div class="mb-1">{$product.total nofilter}</div>
            
    
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="review_off flex_box">

                   <div class="comments_block flex_comment offset-sm-2 offset-md-0">
                   
                  {if isset($product.st_product_comment) && $product.st_product_comment}
                    <a href="{url entity='module' name='stproductcomments' controller='detail' params=['id_st_product_comment' => $product.st_product_comment.id_st_product_comment]}" title="{l s='View my review' d='Shop.Theme.Transformer'}"><i class="fto-comment-empty mar_r10 fs_md"></i><span class="btn-line-under">{l s='View my review' d='Shop.Theme.Transformer'}</span></a>
                    <a href="{url entity='module' name='stproductcomments' controller='mycomments' params=['secure_key'=>$secure_key, 'id_st_product_comment'=>$product.st_product_comment.id_st_product_comment, 'delete_comment'=>1]}" title="{l s='Delete' d='Shop.Theme.Transformer'}"><i class="fto-trash mar_r10 fs_md"></i><span class="btn-line-under">{l s='Delete' d='Shop.Theme.Transformer'}</span></a>
                    {elseif $product.order_approved}
                    <a href="{url entity='module' name='stproductcomments' controller='mycomments' params=['secure_key'=>$secure_key, 'add_comment'=>1, 'id_order'=>$product.id_order,'id_order_detail'=>$product.id_order_detail]}" title="{l s='Write a review' d='Shop.Theme.Transformer'}"><i class="fto-pencil mar_r10 fs_md"></i><span class="btn-line-under">{l s='Write a review' d='Shop.Theme.Transformer'}</span></a>
                    {else}
                    <span class="opacity"><i class="fto-spin5  mar_r10 fs_md"></i>{l s='Order is pending' d='Shop.Theme.Transformer'}</span>
                    {/if}
                   </div>
            </div>
        </div>
    </div>
    {/foreach}
    </div>
    {else}
        <div class="alert alert-warning" role="alert" data-alert="warning">{l s='No order items' d='Shop.Theme.Transformer'}</div>
    {/if}
  </div>
</div>
{/foreach}
{else}
<div class="alert alert-warning" role="alert" data-alert="warning">{l s='No orders' d='Shop.Theme.Transformer'}</div>
{/if}
{/block}