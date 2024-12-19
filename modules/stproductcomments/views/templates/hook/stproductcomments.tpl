{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{assign var='form_add_coments' value=Configuration::get('ST_PROD_C_FORM_ADD_COMENTS')}
{assign var='form_layout' value=Configuration::get('ST_PROD_C_FORM_LAYOUT')}

<section class="pccomment_block row">
<script>var st_product_comment_tag_prefilled='{$st_product_comment_tag_prefilled}';</script>
<div class="{if $nbComments}col-md-8 left_comments{else}col-md-12{/if}">
{if $nbComments}
    {include file='module:stproductcomments/views/templates/hook/pcomments_filters.tpl'}
    {include file='module:stproductcomments/views/templates/hook/pcomments_list.tpl'}
  
{else}
      {hook h='displayCommentsText'}
    {if $can_comment}<div class="mt-2 mb-3 col-12">{include file='module:stproductcomments/views/templates/hook/pcomments_write.tpl' classname="go" is_first_comment=1}</div>{/if}
  {*<div class="" role="alert" data-alert="warning">
    {l s='No comments' d='Shop.Theme.Transformer'}
  </div>*}
{/if}

{if isset($allow_guest) && $allow_guest && (!$logged || $logged && !$can_comment)}
<div class="st_product_comment_wrap {if $form_add_coments != 1}account_box_bg{/if}">

{if $form_add_coments == 1}<p class="mt-4 comments_poupap"><a class="inline_popup_tri" href="#inline_popup_addcomments" title="{l s='Add a review' d='Shop.Theme.Transformer'}" rel="nofollow"><span class="btn btn-default btn-middle">{l s='Add a review' d='Shop.Theme.Transformer'} <i class="fto-pencil"></i></span></a></p>{/if}
   <article {if $form_add_coments == 1}id="inline_popup_addcomments"{/if} class="{if $form_add_coments == 1}inline_popup_content mfp-hide mfp-with-anim{/if} product_add_comment">
   
	<h3 class="mb-4 page_heading">{l s='Add a review' d='Shop.Theme.Transformer'}</h3>
	<form name="st_product_comment_form_guest" method="post" action="{$link->getModuleLink('stproductcomments','default')}">
		{if $criterions2|@count > 0}
		<ul class="criterions_list li_fl clearfix row">
		{foreach from=$criterions2 item='criterion'}
		 	<li class="flex_left col-md-6 mb-1">
			    <span class="criterion_name mr-2 mb-1">{$criterion.name}:</span>
			    <div class="star_content clearfix">
					<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="1" />
					<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="2" />
					<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="3" />
					<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="4" />
					<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="5" checked="checked" />
				</div>
			</li>
		{/foreach}
		</ul>
		{/if}
	    <div class="form-group {if $form_layout == 0}row{/if} mb-3">
		    <label class="{if $form_layout == 0}col-md-2{/if} form-control-label re_label required {if $form_layout == 1}width_full{/if}">
		        {l s='Describe it:' d='Shop.Theme.Transformer'}
		    </label>
		    <div class="{if $form_layout == 0}col-md-10{/if} tag-wrap">
		        <input type="text" name="tags" placeholder="{l s='Use a comma to seperate words.' d='Shop.Theme.Transformer'}" class="tm-input form-control"/>
		        <div class="mt-2">{l s='Describe this product using simple and short words.' d='Shop.Theme.Transformer'}</div>
		    </div>
	    </div>
	    
	      
	    <div class="form-group {if $form_layout == 0}row{/if} {if $form_layout == 2}animation_placeholder {if $logged}st-not-empty{/if}{/if}">
		    <label class="{if $form_layout == 0}col-md-2{/if} form-control-label re_label {if $form_layout == 1}width_full{/if} {if $form_layout == 2}form-control-placeholder{/if}">
		        {if $form_layout == 2}{l s='Custom name:' d='Shop.Theme.Transformer'}<span class="placeholder_req">{l s='(required)' d='Shop.Theme.Transformer'}</span>{else}{l s='Custom name:' d='Shop.Theme.Transformer'}
		        <span class="bottom_required {if $form_layout == 1}normal_view{/if}">{l s='(required)' d='Shop.Theme.Transformer'}</span>{/if}
		    </label>
		    
		     {if $form_layout == 2}<span class="has_error_icon"></span>{/if}
		    <div class="{if $form_layout == 0}col-md-10{/if}">
		    	<input type="text" name="customer_name" class="form-control" value="{$customer_name}" required />
		    </div>
	    </div>
	    <div class="form-group {if $form_layout == 0}row{/if} {if $form_layout == 2}animation_placeholder{/if}">
		    <label class="{if $form_layout == 0}col-md-2{/if} form-control-label re_label {if $form_layout == 1}width_full{/if} {if $form_layout == 2}form-control-placeholder{/if}">
		        {if $form_layout == 2}{l s='Review:' d='Shop.Theme.Transformer'}<span class="placeholder_req">{l s='(required)' d='Shop.Theme.Transformer'}</span>{else}{l s='Review:' d='Shop.Theme.Transformer'}
		        <span class="bottom_required {if $form_layout == 1}normal_view{/if}">{l s='(required)' d='Shop.Theme.Transformer'}</span>{/if}
		  
		    </label>
		    <div class="{if $form_layout == 0}col-md-10{/if}">
		    	<textarea id="comment_content" name="content" rows="6" class="form-control st_comment_box" autocomplete="off"></textarea>
		    </div>
	    </div>
	    <div class="form-group {if $form_layout == 0}row{/if}">
		    {if $form_layout == 0}<div class="{if $form_layout == 0}col-md-2{/if} mb-2">{if isset($upload_image) && $upload_image}{l s='Upload images:' d='Shop.Theme.Transformer'}{/if}</div>{/if}
		    <div class="{if $form_layout == 0}col-md-10{/if}">
	        	{if isset($upload_image) && $upload_image}
		        <div class="st-dropzone" id="st_product_comment_uploader">
			        <div class="dz-message needsclick">
			            {l s='Drop images here or click to upload.' d='Shop.Theme.Transformer'}
			        </div>
		        </div>
		        <input name="image" type="hidden" value="" />
		        {/if}
		        <input name="id_product" type="hidden" value="{$id_product}" />
		        <input name="id_order_detail" type="hidden" value="0" />
		        <input name="id_order" type="hidden" value="0" />
		        <input name="id_parent" type="hidden" value="0" />
		        <input name="action" type="hidden" value="add_comment" />
		        {hook h='displayGDPRConsent' mod='psgdpr' id_module=$id_module}
		        <div>
		            <input type="submit" name="st_product_comment_submit" id="st_product_comment_submit" value="{l s='Post comment' d='Shop.Theme.Transformer'}" class="btn btn-default mar_r4" />
		        </div>
	      	</div>
	      </div>
	   </form>
	   
	</aticle>
	</div>
	

{/if}
  </div>

{if $nbComments}
	{include file='module:stproductcomments/views/templates/hook/pcomments_header.tpl'}
	{/if}

</section>