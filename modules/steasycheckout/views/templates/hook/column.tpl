{foreach $steco_column as $column_key => $cloumn_name}
{if $cloumn_name=="personal_information" || $cloumn_name=="delivery" || $cloumn_name=="summary" || $cloumn_name=="summary_address" || $cloumn_name=="payment" || ($column_key==0 && $cloumn_name=="cart")}
  <div class="steco_column_section {$cloumn_name}-box {if $cloumn_name == summary_address && ($steco.coll_ex_address == 1 OR $steco.coll_ex_address == 2)}summary_mb{/if}">
{elseif $column_key==0 && $cloumn_name=="reassurance"}
  <div class="steco_column_section">
{/if}
<div class="steco_{$cloumn_name} steco_block  {if $cloumn_name == summary_address && $steco.coll_ex_address == 2}collapse{elseif $cloumn_name == summary_address && $steco.coll_ex_address == 1}collapse show{/if}">{if $cloumn_name=='reassurance'}{hook h='displayReassurance'}{elseif !$column_key}{include file='module:steasycheckout/views/templates/hook/placeholder.tpl'}{/if}</div>
{*if $cloumn_name=='personal_information'}<div class="steco_addresses steco_block {if !$customer.is_logged && !$customer.is_guest && $steco.default_pi_form!=1} steco_display_none{/if}"></div>{/if*}
{if $cloumn_name@last || (!$cloumn_name@last && ($steco_column[$column_key+1]=="personal_information" || $steco_column[$column_key+1]=="delivery" || $steco_column[$column_key+1]=="summary" || $steco_column[$column_key+1]=="summary_address" || $steco_column[$column_key+1]=="payment"))}
  </div>
{/if}
{/foreach}