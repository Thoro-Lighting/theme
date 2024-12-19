{if isset($id_source) && $id_source}
{if $page.page_name == 'product'}
<div class="acc_header" id="acc_heading_loved">
<div data-toggle="collapse"   class="flex_container tabs-head collapsed">
<div class="flex_child"><a class="add_to_love {if isset($classname)} {$classname} {/if} btn-spin {if isset($fromnocache) && $fromnocache && isset($is_loved) && $is_loved} st_added {/if} love_{if isset($love_blog) && $love_blog}2{else}1{/if}_{$id_source} {if !isset($fromnocache) || !$fromnocache} love_from_cache_block {/if}" data-id-source="{$id_source}" data-type="{if isset($love_blog) && $love_blog}2{else}1{/if}" href="javascript:;" title="{l s='Love' d='Shop.Theme.Transformer'}" rel="nofollow"><i class="fto-heart-empty"></i><span class="add-loved">{l s='Add to favorites' d='Shop.Theme.Transformer'}</span><span class="remove-loved">{l s='Remove from favorites' d='Shop.Theme.Transformer'}</span></a>
</div>
</div>
</div>
{else}
<a class="add_to_love hover_fly_btn {if isset($classname)} {$classname} {/if} btn-spin pro_right_item {if isset($fromnocache) && $fromnocache && isset($is_loved) && $is_loved} st_added {/if} love_{if isset($love_blog) && $love_blog}2{else}1{/if}_{$id_source} {if !isset($fromnocache) || !$fromnocache} love_from_cache_block {/if}" data-id-source="{$id_source}" data-type="{if isset($love_blog) && $love_blog}2{else}1{/if}" href="javascript:;" title="{l s='Love' d='Shop.Theme.Transformer'}" rel="nofollow"><div class="hover_fly_btn_inner"><i class="fto-us icon_btn"></i><span class="btn_text btn-line-under">{l s='Love' d='Shop.Theme.Transformer'}</span>{if isset($loved_with_number) && $loved_with_number}<span class="amount_inline">{(int)$loved_total}</span>{/if}</div></a>
{/if}
{/if}

