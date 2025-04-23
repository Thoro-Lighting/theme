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
{if isset($news_letter_array) && count($news_letter_array)}
	{foreach $news_letter_array as $ec}
		{if $ec.visibility_cart != 0 }

			<section id="st_news_letter_{$ec.id_st_news_letter}"
				class="st_news_letter_{$ec.id_st_news_letter} {if $ec.hide_on_mobile == 1} hidden-sm-down {elseif $ec.hide_on_mobile == 2} st_open {elseif $ec.hide_on_mobile == 3} hidden-lg-up-991 {elseif $ec.hide_on_mobile == 4} hidden-lg-up-991 st_open{/if} footer_block block {if !$ec.is_stacked_footer} col-lg-{if $ec.span}{$ec.span}{else}3{/if} {/if}">
				{if $ec.title_align!=3}
					<div class="title_block title_align_{(int)$ec.title_align}">
						<div class="title_block_inner">{l s='Newsletter' d='Shop.Theme.Transformer'}</div>
						<div class="opener">
							<div class="plus_sign"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M7 1L7 13M13 7L1 7" stroke="#FBFAF8" stroke-width="1.25" stroke-linecap="round" />
								</svg>
							</div>
							<div class="minus_sign"><svg width="14" height="14" viewBox="0 0 14 2" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M13 1L1 1" stroke="#FBFAF8" stroke-width="1.25" stroke-linecap="round" />
								</svg>
							</div>
						</div>
					</div>
				{/if}
				<div
					class="footer_block_content {if $ec.title_align==3}keep_open{/if} {if !$ec.template} text-{$ec.text_align} {/if}">
					<div class="st_news_letter_box">
						<div
							class="news_letter_{$ec.template} {if $ec.template} flex_container flex_column_md {if $ec.text_align==2} flex_center {elseif $ec.text_align==3} flex_right {else} flex_left {/if} text-md-2 {/if}">
							{if $ec.content}<div
									class="st_news_letter_content style_content flex_child_md {if $ec.template} mar_r10 {/if}">
								{$ec.content nofilter}</div>{/if}
							<div class="alert alert-danger hidden"></div>
							<div class="alert alert-success hidden"></div>
							{if $ec.show_newsletter}
								<form action="{$ajax_url}" method="post" class="st_news_letter_form flex_child">
									{if isset($ec.show_gender) && $ec.show_gender}
										<div class="st_news_letter_gender">
											{foreach Gender::getGenders() key=k item=gender}
												<label for="id_gender{$gender->id}" class="radio-inline">
													<input type="radio" name="id_gender" id="id_gender{$gender->id}"
														value="{$gender->id|intval}"
														{if isset($smarty.post.id_gender) && $smarty.post.id_gender == $gender->id}checked="checked"
														{/if} />
													{$gender->name}</label>
											{/foreach}
										</div>
									{/if}
									<div class="st_news_letter_form_bg">
										<div class="st_news_letter_form_inner">
											<p class="st_news_above_input">{l s='Input your e-mail below' d='Shop.Theme.Transformer'}</p>
											<div class="input-group round_item js-parent-focus input-group-with-border">
												<input class="form-control input_newsletter st_news_letter_input js-child-focus"
													type="text" name="email" value="{if isset($value) && $value}{$value}{/if}"
													placeholder="{l s='Your e-mail' d='Shop.Theme.Transformer'}" />

											</div>
										</div>
									</div>
									{hook h='displayGDPRConsent' mod='psgdpr' id_module=$id_module}
									<input type="hidden" name="action" value="0" />
									<span class="input-group-btn">
										<button type="submit" name="submitStNewsletter"
											class="btn-outline st_news_letter_submit">
											{l s='Subscribe' d='Shop.Theme.Transformer'}
										</button>
									</span>

								</form>
							{/if}
						</div>
					</div>
				</div>
			</section>
		{/if}
	{/foreach}
{/if}