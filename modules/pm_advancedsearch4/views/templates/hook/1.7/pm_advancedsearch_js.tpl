{if isset($as_searchs)}
    <script type="text/javascript">
        document.addEventListener('as4PluginReady', function(e) {
            const as4Plugin = e.detail;
            {foreach from=$as_searchs item=as_search name=as_searchs}
                if (typeof(as4Plugin.params[{$as_search.id_search|intval}]) == 'undefined') {ldelim}
                    as4Plugin.params[{$as_search.id_search|intval}] = {ldelim}
                        hookName: {$hookName|json_encode nofilter},
                        centerColumnCssClasses: {$as_search.search_results_selector_css|json_encode nofilter},
                        availableCriterionsGroups: {if isset($as_search.criterionsGroupsMini)}{$as_search.criterionsGroupsMini|json_encode nofilter}{else}{ldelim}{rdelim}{/if},
                        selectedCriterions: {if isset($as_search.criterions_selected)}{$as_search.criterions_selected|json_encode nofilter}{else}{ldelim}{rdelim}{/if},
                        stepSearch: {$as_search.step_search|intval},
                        searchMethod: {$as_search.search_method|intval},
                        keep_category_information: {if \AdvancedSearch\SearchEngineUtils::getCurrentCategory() || \AdvancedSearch\SearchEngineUtils::getCurrentManufacturer() || \AdvancedSearch\SearchEngineUtils::getCurrentSupplier() || \AdvancedSearch\SearchEngineUtils::getCurrentCMS()}{$as_search.keep_category_information|intval}{else}0{/if},
                        search_results_selector: {$as_search.search_results_selector|json_encode nofilter},
                        insert_in_center_column: {$as_search.insert_in_center_column|intval},
                        seo_criterion_groups: '{if isset($as_search.seo_criterion_groups) && is_array($as_search.seo_criterion_groups)}{","|implode:$as_search.seo_criterion_groups}{/if}',
                        as4_productFilterListData: {if isset($as4_productFilterListData) && !empty($as4_productFilterListData)}{$as4_productFilterListData|json_encode nofilter}{else}''{/if},
                        as4_productFilterListSource: {if isset($as4_productFilterListSource) && !empty($as4_productFilterListSource)}{$as4_productFilterListSource|json_encode nofilter}{else}''{/if},
                        scrollTopActive: {if isset($as_search.scrolltop_active) && $as_search.scrolltop_active}true{else}false{/if},
                        resetURL: {if is_array($as_search.selected_criterion) && sizeof($as_search.selected_criterion)}{\AdvancedSearch\SearchEngineUtils::generateURLFromCriterions($as_search.id_search)|json_encode nofilter}{else}''{/if}
                    {rdelim};
                {rdelim}

                    {if (empty($jsInitOnly))}
                        {if isset($as_location_name) && $as_location_name}
                            $(document).ready(function() {ldelim}
                                $('#PM_ASBlock_{$as_search.id_search|intval} .PM_ASResetSearch').html("{l s='Back to' mod='pm_advancedsearch4' js=1} {$as_location_name|escape:'javascript'}");
                            {rdelim});
                        {/if}
                        {if is_array($as_search.selected_criterion) && sizeof($as_search.selected_criterion) && $as_search.selected_criterion != $as_search.selected_criterion_from_emplacement && isset($ajaxMode) && $ajaxMode}
                            $(document).ready(function() {ldelim}
                                $('#PM_ASBlock_{$as_search.id_search|intval} .PM_ASResetSearch').css('display', 'block');
                            {rdelim});
                        {/if}
                        {if !empty($as4_localCacheKey)}
                            as4Plugin.localCacheKey = {$as4_localCacheKey|json_encode nofilter};
                        {/if}
                        {if isset($as4_localCache)}
                            as4Plugin.localCache = {$as4_localCache|json_encode nofilter};
                        {/if}
                        as4Plugin.blurEffect = {$as4_blurEffect|json_encode nofilter};
                        {if (isset($page_name) && $page_name == 'module-pm_advancedsearch4-searchresults') || (isset($page.page_name) && $page.page_name == 'module-pm_advancedsearch4-searchresults') || !empty($as_is_seo_page)}
                            {if !empty($orderby)}
                                as4Plugin.params[{$as_search.id_search|intval}].orderBy = {$orderby|json_encode nofilter};
                            {/if}
                            {if !empty($orderway)}
                                as4Plugin.params[{$as_search.id_search|intval}].orderWay = {$orderway|json_encode nofilter};
                            {/if}
                            as4Plugin.params[{$as_search.id_search|intval}].addBestSalesOption = true;
                        {/if}

                        as4Plugin.initSearchBlock({$as_search.id_search|intval},{$as_search.search_method|intval},{$as_search.step_search|intval});

                        {if isset($next_id_criterion_group)}
                            $(document).ready(function() {
                                {* Update nb product display *}
                                $('#PM_ASBlock_{$as_search.id_search|intval} .PM_ASBlockNbProductValue').html("({$as_search.total_products|intval} {if $as_search.total_products > 1}{l s='products' mod='pm_advancedsearch4'}{else}{l s='product' mod='pm_advancedsearch4'}{/if})");
                            {if $next_id_criterion_group && (!isset($as_search.criterions[$criterions_group.id_criterion_group]) || ! sizeof($as_search.criterions[$criterions_group.id_criterion_group]))}
                                as4Plugin.nextStep({$as_search.id_search|intval},$('#PM_ASCriterions_{$as_search.id_search|intval}_{$criterions_group.id_criterion_group|intval}'),true,{$as_search.search_method|intval});
                            {/if}
                            {if $as_search.search_method == 2 || $as_search.search_method == 4}
                                $('#PM_ASForm_{$as_search.id_search|intval}').ajaxForm(as4Plugin.getASFormOptions({$as_search.id_search|intval}));
                            {/if}
                            });
                        {/if}

                        as4Plugin.initSearchEngine();
                    {/if}
            {/foreach}

            {if (empty($jsInitOnly))}
                $(document).ready(function() {
                    {if isset($hideAS4Form) && $hideAS4Form == true}
                        as4Plugin.moveFormContainerForSEOPages();
                    {/if}
                    if (!$('.PM_ASSelectionsResults ul li').length) {
                        $('.PM_ASSelectionsResults').hide();
                    }
                });
            {/if}
        });

        {if (empty($jsInitOnly))}
            if (typeof(as4Plugin) !== 'undefined') {
                document.dispatchEvent(new CustomEvent('as4PluginReady', { detail: as4Plugin }));
            }
        {/if}
    </script>
{/if}
