{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
{extends file="helpers/form/form.tpl"}

{block name="field"}
	{if $input.type == 'fontello'}
		<div class="fontello_wrap">
			<a id="btn_{$input.name}" class="btn btn-default" data-toggle="modal" href="#" data-target="#modal_{$input.name}">
				<i class="{if $fields_value[$input.name]}{$fields_value[$input.name]}{/if}"></i>{l s='Edit' mod='steasycheckout'}
			</a>
			<div class="modal fade" id="modal_{$input.name}" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">{l s='Icon' mod='steasycheckout'}</h4>
					</div>
					<div class="modal-body">
						<ul class="fontello_list clearfix">
							<li>
								<label>
									<input type="radio"	name="{$input.name}" id="{$input.name}" value=""{if $fields_value[$input.name] == ''} checked="checked"{/if}/>
									{l s='None' mod='steasycheckout'}
								</label>
							</li>
							{foreach $input.values.classes AS $code=>$class}
								<li>
								<label>
								<input type="radio"	name="{$input.name}" id="{$input.name}_{$class}" data-classname="{$class}" value="{$class}"{if $fields_value[$input.name] == {$class}} checked="checked"{/if}/>
									<i class="{$class}"></i>
								</label>
								</li>
							{/foreach}
						</ul>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">{l s='OK' mod='steasycheckout'}</button>
					</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(function($){
					$("input[name={$input.name}]").change(function() { 
						$("#btn_{$input.name} i").removeClass().addClass($("input[name={$input.name}]:checked").data('classname'));
					});
				});
			</script>
		</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}