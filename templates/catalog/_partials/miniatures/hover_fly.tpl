{assign var='text_fl_buttons' value=Configuration::get('STSN_TEXT_FL_BUTTONS')}
<div class="{if $sttheme.flyout_buttons==3}hover_fly_hover_fly_vertical{else}hover_fly{/if} {if $text_fl_buttons == 0}fly_span_text{/if} hover_fly_{(int)$sttheme.flyout_buttons_style} {if $sttheme.flyout_buttons !=3}flex_container{/if} {if $sttheme.flyout_buttons_on_mobile==1} mobile_hover_fly_show {elseif $sttheme.flyout_buttons_on_mobile==2} mobile_hover_fly_cart {else} mobile_hover_fly_hide {/if}">
          {if !$sttheme.display_add_to_cart && $sttheme.pro_quantity_input!=1 && $sttheme.pro_quantity_input!=3}
            {if $has_add_to_cart}
              {include file='catalog/_partials/miniatures/btn-add-to-cart.tpl'}
            {else}
              {include file='catalog/_partials/miniatures/btn-view-more.tpl'}{*is_select_options=true to do find a way to tell products can not have add to cart button just because of they have attributes *}
            {/if}
          {/if}
          {if !$sttheme.use_view_more_instead && ((!$sttheme.display_add_to_cart && $has_add_to_cart) || $sttheme.display_add_to_cart)}{include file='catalog/_partials/miniatures/btn-view-more.tpl'}{/if}
          {if $page.page_name != 'module-stlovedproduct-myloved'}
          {if isset($loved_position) && !$loved_position}
            {include file='module:stlovedproduct/views/templates/hook/fly.tpl' id_source=$product.id_product}
          {/if}
          {/if}
</div>