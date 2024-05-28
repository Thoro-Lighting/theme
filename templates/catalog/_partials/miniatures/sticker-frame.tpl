{strip}
{assign var="has_sticker_static" value=0}
{if isset($stickers) && $stickers}
  {foreach $stickers as $ststicker}
  {if !in_array($ststicker.id_st_sticker, explode(',', str_replace(' ', '', $p_c.id_strickers)))} 
    {if in_array($ststicker.sticker_position, $sticker_position)}
 {if $ststicker.frame_info == 1 && $ststicker.border_width_iframe > 0}<div class="sticker_border_{$ststicker.id_st_sticker} sticker-border"></div>{/if}  {/if}
  {/if}
  {/foreach}
{/if}
{if isset($ststickers) && $ststickers}
  {foreach $product.flags as $flag name=data}
  	{foreach $ststickers as $ststicker}
  	{if !in_array($ststicker.id_st_sticker, explode(',', str_replace(' ', '', $p_c.id_strickers)))} 
	    {if in_array($ststicker.sticker_position, $sticker_position) && ( ($flag.type=='new' &&  $ststicker.type==1) || ($flag.type=='on-sale' &&  $ststicker.type==2) || ($flag.type=='online-only' &&  $ststicker.type==5) || ($flag.type=='pack' &&  $ststicker.type==6) )}
     {if $ststicker.frame_info == 1 && $ststicker.border_width_iframe > 0}<div class="sticker_border_{$ststicker.id_st_sticker} sticker-border"></div>{/if} {/if}
  	{/if}
  	{/foreach}
  {/foreach}
  	{foreach $ststickers as $ststicker}
  	{if !in_array($ststicker.id_st_sticker, explode(',', str_replace(' ', '', $p_c.id_strickers)))} 
      {if in_array($ststicker.sticker_position, $sticker_position) && ($product.reduction && $product.show_price && !$sttheme.is_catalog &&  $ststicker.type==3)}
     {if $ststicker.frame_info == 1 && $ststicker.border_width_iframe > 0}<div class="sticker_border_{$ststicker.id_st_sticker} sticker-border"></div>{/if}{/if}
      {if (!isset($is_from_product_page) || !$is_from_product_page) && in_array($ststicker.sticker_position, $sticker_position) && (($ststicker.type==4 && $sticker_quantity<=0 && !$sticker_allow_oosp && $sticker_quantity_all_versions<=0) || ($ststicker.type==7 && ($sticker_quantity || $sticker_allow_oosp || $sticker_quantity_all_versions)))}
	  {if $ststicker.frame_info == 1 && $ststicker.border_width_iframe > 0}<div class="sticker_border_{$ststicker.id_st_sticker} sticker-border"></div>{/if} {/if}
  	{/if}
  	{/foreach}
{/if}
{if $has_sticker_static}</div>{/if}
{/strip}
    