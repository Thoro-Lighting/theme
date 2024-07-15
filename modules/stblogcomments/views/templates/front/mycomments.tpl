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
{extends file='customer/page.tpl'}
{block name="page_content"}
{foreach $errors AS $error}
<div class="alert alert-warning">
{$error}
</div>
{/foreach}
<div id="stblogcomment">
	<h3 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i class="fto-angle-double-left side_close_left"></i></a>{l s='Blog comments' d='Shop.Theme.Transformer'}</h3>
	<div class="account_box_bg pad_rwd">
	<div class="head_account_bg">
			<div class="hello_info form-control-label">{l s='Upload a new avatar' d='Shop.Theme.Transformer'}</div>
			<p class="steco_sub_heading_mini">{l s='The size of the uploaded image .jpg 80x80px' d='Shop.Theme.Transformer'}:</p>
    </div>
	<div class="article">
	<form method="post" action="{$link->getModuleLink('stblogcomments','mycomments',array(),true)}" id="form_stblogcomments" enctype="multipart/form-data">
		<div class="clearfix mar_b1 row">
            <div id="avatar_left" class="fl col-md-2 col-sm-2 col-3">
                <img src="{$avatar}" class="img-polaroid" alt="{l s='Avatar' d='Shop.Theme.Transformer'}"" />
            </div>
			<div id="avatar_right" class="col-md-10 col-sm-9 col-9 row">
                <div class="form-group col-md-10 col-sm-10 col-12">
                 
                  <div class="">
                    <input type="file" id="avatar" name="avatar" class="filestyle" data-buttonText="{l s='Choose file' d='Shop.Theme.Actions'}" />
                  </div>
                </div>
				<input type="hidden" name="token" value="{$token}" />
                <div class="col-md-2 col-sm-2 col-12 mb-2"><input type="submit" name="submitAvatar" id="submitAvatar" value="{l s='Upload' d='Shop.Theme.Transformer'}" class="btn btn-default" /></div>
                {if $avatar && !preg_match('/stblogcomments|_default_/', $avatar)}<a href="{$link->getModuleLink('stblogcomments','mycomments',['act'=>'delavatar'])}" class="col-md-6 col-sm-6" title="{l s='Use default' d='Shop.Theme.Transformer'}"><span class="btn-line">{l s='Use default' d='Shop.Theme.Transformer'}</span></a>{/if}
			</div>
		</div>
	</form>
	</div>
	</div>
    {if $comments}
	<h3 class="page_heading">{l s='My Comments' d='Shop.Theme.Transformer'}</h3>
    <ul id="mycomments_list" class="base_list_line medium_list">    
        {foreach $comments as $comment}
        <li class="line_item">
           	<div class="item">
            <p>
                <span class="mar_r6">{dateFormat date=$comment.date_add full=0}</span>
                <span>{l s='-' d='Shop.Theme.Transformer'}&nbsp;<a href="{$link->getModuleLink('stblog', 'article',['id_st_blog'=>$comment['id_st_blog'],'rewrite'=>$comment['link_rewrite']])|escape:'html'}#comments" title="{$comment.name}">{$comment.name|truncate:70:'...'}</a></span>
            </p>
            <div>
                {$comment.content}
            </div>
            </div>
        </li>
        {/foreach}
    </ul>
    {/if}
</div>
{/block}