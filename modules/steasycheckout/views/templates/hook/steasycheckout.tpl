{extends file='checkout/checkout.tpl'}
{block name='content'}
{block name='head_steps'}
			<div class="col-md-12">
			<section id="head_steps" class="{if $steco.beambar_cart == 3 OR $steco.beambar_cart == 4}head-no-numbers{/if}">
			<div class="row">
			<div class="col-md-6 steps flex_container">
			<div class="flex_container line_1 line_all"><a href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}" class="step_link"><p>1. {l s='Your cart' d='ShopThemeTransformer'} <i class="fto-ok"></i></p></a></div>
			<div class="flex_container line_2 line_all"><a  href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}?checkout" class="step_link next"><p>2. {l s='Shipping' d='ShopThemeTransformer'} <i class="fto-ok"></i></p></a></div>
			<div class="flex_container line_3 line_all"><a  href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}?checkout" class="step_link next"><p>3. {l s='Summary' d='ShopThemeTransformer'} <i class="fto-ok"></i></p></a></div>
			</div>
		   </section>
			</div>
	 {/block}
	<section id="content" class="steco_container">
		<div class="row steco_row steco_divider steco_flex_center">
			<div class="col-lg-8 steco_col steco_col_1 step_cart big_cart_on">
			    <div class="steco_column">
					{include file='module:steasycheckout/views/templates/hook/column.tpl' steco_column=$steco.columns[0]}
				</div>
			</div>
		<div class="col-lg-4 steco_col big_cart_on">
				<div class="row steco_row steco_divider">
			        <div class="col-lg-{$steco.column_2} steco_col steco_col_2 step_one big_cart_on" id="summary_sticky">
						{if isset($steco.columns[1])}
						<div class="steco_column">
						{include file='module:steasycheckout/views/templates/hook/column.tpl' steco_column=$steco.columns[1]}
						</div>
						{/if}
				</div>
				</div>
			</div>
		</div>
	</section>
{/block}