{***********
Range
************}

{if $criterions_group.display_type eq 8}
	{if isset($as_search.criterions[$criterions_group.id_criterion_group])}
		<div class="PM_ASCriterionStepEnable range-box">
		{if sizeof($as_search.criterions[$criterions_group.id_criterion_group])}
			{foreach from=$as_search.criterions[$criterions_group.id_criterion_group] item=criterion name=criterions}
				{if (isset($criterion.cur_min) && isset($criterion.cur_max) && $criterion.cur_min == 0 && $criterion.cur_max == 0) || (isset($criterion.min) && isset($criterion.max) && $criterion.min == 0 && $criterion.max == 0)}
					<p class="PM_ASCriterionNoChoice">{l s='No choice available on this group' mod='pm_advancedsearch4'}</p>
					<input type="hidden" name="as4c[{$criterions_group.id_criterion_group|intval}][]" id="PM_ASInputCritRange{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}" value="{if isset($criterion.cur_min)}{$criterion.cur_min|floatval}~{$criterion.cur_max|floatval}{/if}" />
				{else}
					<div class="row">
						<div class="col-xs-6 left range-box"><span class="range-name between">{l s='Between' mod='pm_advancedsearch4'}:</span>&nbsp;							<div class="input-group">
								{if isset($criterions_group.left_range_sign) && $criterions_group.left_range_sign != ''}<span class="input-group-addon">{$criterions_group.left_range_sign}</span>{/if}
								<input 	data-id-criterion-group="{$criterions_group.id_criterion_group|intval}" 
										type="number" 
										id="PM_ASInputCritRange{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}_min" 
										value="{if isset($criterion.cur_min)}{$criterion.cur_min|floatval}{else}{$criterion.min|floatval}{/if}" 
										class="form-control" 
										{if $criterions_group.criterion_group_type eq 'price'}min="0"{/if}
										max="{if isset($criterion.cur_max)}{$criterion.cur_max|floatval}{else}{$criterion.max|floatval}{/if}" 
										step="{$criterion.step|floatval}" />
								{if isset($criterions_group.right_range_sign) && $criterions_group.right_range_sign != ''}
									<span class="input-group-addon">{$criterions_group.right_range_sign}</span>
								{elseif isset($criterions_group.currency_symbol) && $criterions_group.currency_symbol != ''}
									<span class="input-group-addon">{$criterions_group.currency_symbol}</span>
								{/if}
							</div>
						</div>
						<div class="col-xs-6 right range-box"><span class="range-name and">{l s='and' mod='pm_advancedsearch4'}:</span>&nbsp;
							<div class="input-group">
								{if isset($criterions_group.left_range_sign) && $criterions_group.left_range_sign != ''}<span class="input-group-addon">{$criterions_group.left_range_sign}</span>{/if}
								<input 	data-id-criterion-group="{$criterions_group.id_criterion_group|intval}" 
										type="number" 
										id="PM_ASInputCritRange{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}_max" 
										value="{if isset($criterion.cur_max)}{$criterion.cur_max|floatval}{else}{$criterion.max|floatval}{/if}" 
										class="form-control" 
										{if $criterions_group.criterion_group_type eq 'price'}min="0"{/if}
										max="{if isset($criterion.cur_max)}{$criterion.cur_max|floatval}{else}{$criterion.max|floatval}{/if}" 
										step="{$criterion.step|floatval}"  />
								{if isset($criterions_group.right_range_sign) && $criterions_group.right_range_sign != ''}
									<span class="input-group-addon">{$criterions_group.right_range_sign}</span>
								{elseif isset($criterions_group.currency_symbol) && $criterions_group.currency_symbol != ''}
									<span class="input-group-addon">{$criterions_group.currency_symbol}</span>
								{/if}
							</div>
						</div>	
						{if $as_search.search_method == 2 || $as_search.search_method == 4}
		             	<div class="col-xs-2 text-center range-button"><input type="submit" value="{l s='Ok' mod='pm_advancedsearch4'}" name="submitAsearch" class="btn btn-primary PM_ASSubmitSearch" /></div>
		                {/if}
					</div>
					<input type="hidden" name="as4c[{$criterions_group.id_criterion_group|intval}][]" id="PM_ASInputCritRange{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}" 
					value="{if isset($criterion.cur_min)}{$criterion.cur_min|floatval}~{$criterion.cur_max|floatval}{/if}" />
				{/if}
			{/foreach}
		{else}
			<p class="PM_ASCriterionNoChoice">{l s='No choice available on this group' mod='pm_advancedsearch4'}</p>
		{/if}
		</div>
	{/if}
	{if $as_search.step_search}
		<div class="PM_ASCriterionStepDisable" {if isset($as_search.criterions[$criterions_group.id_criterion_group])} style="display:none;"{/if}>
			<div data-id-criterion-group="{$criterions_group.id_criterion_group|intval}" class="PM_ASCriterionStepDisable" {if isset($as_search.criterions[$criterions_group.id_criterion_group])} style="display:none;"{/if}>
				<p>{l s='Select above criteria' mod='pm_advancedsearch4'}</p>
			</div>
		</div>
	{/if}
{/if}
