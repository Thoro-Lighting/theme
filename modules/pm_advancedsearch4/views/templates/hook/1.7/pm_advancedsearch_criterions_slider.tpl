{***********
Slider
************}
{if $criterions_group.display_type eq 5}
    {if isset($as_search.criterions[$criterions_group.id_criterion_group]) && (!$as_search.step_search || isset($as_search.selected_criterions[$criterions_group.id_criterion_group].is_selected))}
        <div class="PM_ASCriterionStepEnable">
        {if sizeof($as_search.criterions[$criterions_group.id_criterion_group])}
            {foreach from=$as_search.criterions[$criterions_group.id_criterion_group] item=criterion name=criterions}
                {if (isset($criterion.cur_min) && isset($criterion.cur_max) && $criterion.cur_min == 0 && $criterion.cur_max == 0) || (isset($criterion.min) && isset($criterion.max) && $criterion.min == 0 && $criterion.max == 0)}
                    <p class="PM_ASCriterionNoChoice">{l s='No choice available on this group' mod='pm_advancedsearch4'}</p>
                    <input type="hidden" name="as4c[{$criterions_group.id_criterion_group|intval}][]" id="PM_ASInputCritRange{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}" value="{if isset($criterion.cur_min)}{$criterion.cur_min|floatval}-{$criterion.cur_max|floatval}{/if}" />
                {else}

                    <div
                        class="PM_ASCritRange"
                        id="PM_ASCritRange{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}"
                        data-id-search="{$as_search.id_search|intval}"
                        data-id-criterion-group="{$criterions_group.id_criterion_group|intval}"
                        data-min="{$criterion.min|floatval}"
                        data-max="{$criterion.max|floatval}"
                        data-step="{$criterion.step|floatval}"
                        data-values="[ {if isset($criterion.cur_min)}{$criterion.cur_min|floatval}, {$criterion.cur_max|floatval}{else}{$criterion.min|floatval}, {$criterion.max|floatval}{/if} ]"
                        data-disabled="{if isset($as_search.selected_criterions[$criterions_group.id_criterion_group].is_selected) && !$as_search.selected_criterions[$criterions_group.id_criterion_group].is_selected}true{else}false{/if}"
                        data-left-range-sign="{if isset($criterions_group.left_range_sign)}{$criterions_group.left_range_sign|escape:'htmlall':'UTF-8'}{/if}"
                        data-right-range-sign="{if isset($criterions_group.right_range_sign)}{$criterions_group.right_range_sign|escape:'htmlall':'UTF-8'}{/if}"
                        data-currency-iso-code="{if isset($criterions_group.currency_iso_code)}{$criterions_group.currency_iso_code|escape:'htmlall':'UTF-8'}{/if}"
                        data-currency-precision="{if isset($criterions_group.currency_precision)}{$criterions_group.currency_precision|escape:'htmlall':'UTF-8'}{/if}"
                    ></div>
                    <div class=PM_ASCritRangeInputs>
                        <input class="PM_ASCritRangeInput-min" type="number" step="{$criterion.step|floatval}" min="{$criterion.min|floatval}" max="{if isset($criterion.cur_max)}{$criterion.cur_max|floatval}{else}{$criterion.max|floatval}{/if}" value="{if isset($criterion.cur_min)}{$criterion.cur_min|floatval}{else}{$criterion.min|floatval}{/if}">
                        <input class="PM_ASCritRangeInput-max" type="number" step="{$criterion.step|floatval}" min="{if isset($criterion.cur_min)}{$criterion.cur_min|floatval}{else}{$criterion.min|floatval}{/if}" max="{$criterion.max|floatval}" value="{if isset($criterion.cur_max)}{$criterion.cur_max|floatval}{else}{$criterion.max|floatval}{/if}">
                    </div>
                    
                    <input type="hidden" name="as4c[{$criterions_group.id_criterion_group|intval}][]" id="PM_ASInputCritRange{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}" value="{if isset($criterion.cur_min)}{$criterion.cur_min|floatval}~{$criterion.cur_max|floatval}{/if}" data-id-criterion-group="{$criterions_group.id_criterion_group|intval}" />
                    <script type="text/javascript">
                    if (typeof(as4Plugin) != 'undefined') {
                        as4Plugin.initSliders();
                    }
                    </script>
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

{if $as_search.search_method == 2 || $as_search.search_method == 4}
<p class="col-xs-12 text-right checkbox mt-3"><input type="submit" value="{l s='Search' mod='pm_advancedsearch4'}" name="submitAsearch" class="btn btn-primary PM_ASSubmitSearch" /></p>
{/if}
