{if $as_search.show_hide_crit_method eq 1 || $as_search.show_hide_crit_method eq 2}
	{assign var='criterion_can_hide' value=true}
{else}
	{assign var='criterion_can_hide' value=false}
{/if}
{assign var='hide_next_criterion' value=false}
<div id="PM_ASCriterionsOutput_{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}" class="PM_ASCriterionsOutput">
<div id="PM_ASCriterions_{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}" class="PM_ASCriterions{if $criterion_can_hide} PM_ASCriterionsToggle{if $as_search.show_hide_crit_method == 2}Click{/if}{if $as_search.show_hide_crit_method == 1}Hover{/if}{/if}">
{if $as_search.hide_empty_crit_group && $as_search.step_search && (!isset($as_search.criterions[$criterions_group.id_criterion_group]) || !sizeof($as_search.criterions[$criterions_group.id_criterion_group]))}
{else}
<p class="PM_ASCriterionsGroupTitle h4{if !empty($as_search.criterions_selected[$criterions_group.id_criterion_group])} open_search{/if} {if $criterions_group.max_display == 253}close_all{/if}" id="PM_ASCriterionsGroupTitle_{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}" rel="{$criterions_group.id_criterion_group|intval}">
	{if $criterions_group.icon}
		<img src="{$as_path nofilter}search_files/criterions_group/{$criterions_group.icon}" alt="{$criterions_group.name}" title="{$criterions_group.name}" id="PM_ASCriterionsGroupIcon_{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}" class="PM_ASCriterionsGroupIcon" />
	{/if}
	<span class="PM_ASCriterionsGroupName openfiltr">
		{$criterions_group.name} 
		{if !empty($as_search.criterions_selected[$criterions_group.id_criterion_group])}
			({count($as_search.criterions_selected[$criterions_group.id_criterion_group])})
		{/if}
		{if $as_search.reset_group|intval && isset($as_search.selected_criterion[$criterions_group.id_criterion_group]) && sizeof($as_search.selected_criterion[$criterions_group.id_criterion_group])}
{/if}
	</span>
	
	<span class="openfiltr">
		<svg class="filter-closed" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12 6.5L12 18.5M18 12.5L6 12.5" stroke="#181B1A" stroke-width="1.25" stroke-linecap="round"/>
		</svg>
		<svg class="filter-opened" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M18 12.5L6 12.5" stroke="#181B1A" stroke-width="1.25" stroke-linecap="round"/>
		</svg>
	</span>
</p>

<div class="PM_ASCriterionsGroupOuter">

{assign var='tpl_name' value='pm_advancedsearch_criterions_'|cat:$as_criteria_group_type_interal_name[$criterions_group.display_type]|cat:'.tpl'}
{include file=$as_obj->getTplPath($tpl_name)}
</div>

{/if}
{if $as_search.step_search
    && !isset($as_search.selected_criterion[$criterions_group.id_criterion_group])
    && empty($criterions_group.is_skipped)
    && !empty($as_search.criterions[$criterions_group.id_criterion_group])
    && empty($criterions_group.next_group_have_selected_values)
    && (($as_search.search_method != 2 && $as_search.search_method != 4) || $as_search.nb_visible_criterions_groups > 1)
}
	<a href="#" class="PM_ASSkipGroup" rel="{$criterions_group.id_criterion_group|intval}">
		{l s='Skip this step' mod='pm_advancedsearch4'}
	</a>
{/if}
</div>
</div>
{if $as_search.step_search}
	<input type="hidden" name="current_id_criterion_group" value="{$criterions_group.id_criterion_group|intval}" disabled="disabled" />
	{if !empty($criterions_group.is_skipped)}
		<input type="hidden" name="as4c[{$criterions_group.id_criterion_group|intval}][]" value="-1" />
	{else}
		<input type="hidden" name="as4c[{$criterions_group.id_criterion_group|intval}][]" value="-1" disabled="disabled" />
	{/if}
{/if}
