<div id="search_block_menu">
<form id="searchbox_menu" method="get" action="{$link->getPageLink('search',true)|escape:'html':'UTF-8'}" >
	<input type="hidden" name="controller" value="search" />
	<input type="hidden" name="orderby" value="position" />
	<input type="hidden" name="orderway" value="desc" />
	<input class="search_query form-control" type="text" id="search_query_menu" name="search_query" placeholder="{l s='Search here' d='Shop.Theme.Transformer'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" />
	<button type="submit" name="submit_search" title="{l s='Search' d='Shop.Theme.Transformer'}" class="button-search">
		<i class="icon-search-1 icon-0x"></i>
	</button>
	<div class="hidden more_prod_string">{l s='More products »' d='Shop.Theme.Transformer'}</div>
</form>
</div>
<script type="text/javascript">
// <![CDATA[
{literal}
jQuery(function($){
    $('#searchbox_menu').submit(function(){
        var search_query_menu_val = $.trim($('#search_query_menu').val());
        if(search_query_menu_val=='' || search_query_menu_val==$.trim($('#search_query_menu').attr('placeholder')))
        {
            $('#search_query_menu').focusout();
            return false;
        }
        return true;
    });
});
{/literal}
//]]>
</script>