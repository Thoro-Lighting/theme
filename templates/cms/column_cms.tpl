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


            {assign var='cols_md' value=12}
			{assign var='cols_lg' value=12}


			{capture "left_column"}{hook h='displayLeftColumnCms'}{/capture}
			{capture "right_column"}{hook h='displayRightColumnCms'}{/capture}

			{if $smarty.capture.left_column ne ""}
				{block name="left_column"}
					{$cols_md=($cols_md - $sttheme.left_column_size_md)}
					{$cols_lg=($cols_lg - $sttheme.left_column_size_lg)}
					<div id="left_column" class="main_column {if $sttheme.slide_lr_column} col-8 {else} col-12 {/if} col-lg-{$sttheme.left_column_size_md|replace:'.':'-'} col-xl-{$sttheme.left_column_size_lg|replace:'.':'-'}">
						<div class="wrapper-sticky">
							<div class="main_column_box">
								{$smarty.capture.left_column nofilter}
							</div>
						</div>
					</div>
					{!empty($left_column_size)}
				{/block}
			{/if}	

			{if $smarty.capture.right_column ne ""}
				{block name="right_column"}
					{$cols_md=($cols_md - $sttheme.right_column_size_md)}
					{$cols_lg=($cols_lg - $sttheme.right_column_size_lg)}
					<div id="right_column" class="main_column {if $sttheme.slide_lr_column} col-8 {else} col-12 {/if} col-lg-{$sttheme.right_column_size_md|replace:'.':'-'} col-xl-{$sttheme.right_column_size_lg|replace:'.':'-'}">
						<div class="wrapper-sticky">
							<div class="main_column_box">
								{$smarty.capture.right_column nofilter}
							</div>
						</div>
					</div>
				{/block}
			{/if}	

			{block name="content_wrapper"}
			  <div id="center_column" class="col-lg-{$cols_md|replace:'.':'-'} col-xl-{$cols_lg|replace:'.':'-'}">
			  	{hook h="displayContentWrapperTop"}
				{block name="content"}
				  <p>Hello world! This is HTML5 Boilerplate.</p>
				{/block}
				{hook h="displayContentWrapperBottom"}
			  </div>
			{/block}