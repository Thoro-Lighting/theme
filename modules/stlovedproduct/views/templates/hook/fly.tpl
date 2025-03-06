{if isset($id_source) && $id_source}
<a class="add_to_love hover_fly_btn {if isset($classname)} {$classname} {/if} btn-spin pro_right_item {if isset($fromnocache) && $fromnocache && isset($is_loved) && $is_loved} st_added {/if} love_{if isset($love_blog) && $love_blog}2{else}1{/if}_{$id_source} {if !isset($fromnocache) || !$fromnocache} love_from_cache_block {/if}" data-id-source="{$id_source}" data-type="{if isset($love_blog) && $love_blog}2{else}1{/if}" href="javascript:;" title="{l s='Love' d='Shop.Theme.Transformer'}" rel="nofollow">
    <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.64259 9.74825C7.67089 8.72026 9.06537 8.14277 10.5194 8.14277C11.9734 8.14277 13.3679 8.72026 14.3962 9.74825L16.0028 11.3535L17.6095 9.74825C18.1153 9.22453 18.7204 8.80678 19.3894 8.5194C20.0584 8.23202 20.7779 8.08075 21.506 8.07443C22.2341 8.0681 22.9562 8.20684 23.6301 8.48255C24.304 8.75826 24.9162 9.16543 25.431 9.68028C25.9459 10.1951 26.3531 10.8074 26.6288 11.4813C26.9045 12.1552 27.0432 12.8772 27.0369 13.6053C27.0306 14.3334 26.8793 15.0529 26.5919 15.7219C26.3045 16.3909 25.8868 16.996 25.3631 17.5018L16.0028 26.8635L6.64259 17.5018C5.6146 16.4735 5.03711 15.0791 5.03711 13.625C5.03711 12.171 5.6146 10.7765 6.64259 9.74825V9.74825Z" stroke="#181B1A" stroke-width="1.71358" stroke-linejoin="round"/>
    </svg>
</a>
{/if}

