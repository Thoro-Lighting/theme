<!-- Block user information module NAV  -->
{assign var='show_user_info_icons' value=Configuration::get('ST_SHOW_USER_INFO_ICONS')}
{assign var='welcome_logged' value=Configuration::get('STSN_WELCOME_LOGGED', $language.id)}
{assign var='welcome_link' value=Configuration::get('STSN_WELCOME_LINK', $language.id)}
{assign var='welcome' value=Configuration::get('STSN_WELCOME', $language.id)}
<ul id="userinfo_mod_mobile_menu-nav" class="mobile_menu_ul_full">
{if $logged}
	{*{if isset($welcome_logged) && trim($welcome_logged)}
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="{if $welcome_link}{$welcome_link}{else}javascript:;{/if}" rel="nofollow" class="mo_ma_level_0 {if !$welcome_link} ma_span{/if}" title="{$welcome_logged}">
            {$welcome_logged}
        </a>
    </li>
    {/if}*}
    <li class="mo_ml_level_0 mo_ml_column welcome">
        <a href="{$my_account_url}" rel="nofollow" class="mo_ma_level_0" title="{l s='View my customer account' d='Shop.Theme.Transformer'}">
           {$welcome_logged} {$customer.firstname}
        </a>
    </li>
    <li class="mo_ml_level_0 mo_ml_column account">
        <a href="{$my_account_url}" rel="nofollow" class="mo_ma_level_0" title="{l s='View my customer account' d='Shop.Theme.Transformer'}">
            <i class="fto-user mobilne_menu_account"></i>{l s='My account' d='Shop.Theme.Transformer'}
        </a>
    </li>
    <li class="mo_ml_level_0 mo_ml_column logout">
        <a href="{$logout_url}" rel="nofollow" class="mo_ma_level_0" title="{l s='Log me out' d='Shop.Theme.Transformer'}">
            {l s='Sign out' d='Shop.Theme.Transformer'} <i class="fto-logout-1 mobilne_menu_account"></i>
        </a>
    </li>
{else}
	
    <li class="mo_ml_level_0 mo_ml_column welcome">
        <a href="{if $welcome_link}{$welcome_link}{else}javascript:;{/if}" rel="nofollow" class="mo_ma_level_0 {if !$welcome_link} ma_span{/if}" title="{$welcome}">
            {$welcome_logged}
        </a>
    </li>
   
    <li class="mo_ml_level_0 mo_ml_column account">
        <a href="{$my_account_url}" title="{l s='Log in to your customer account' d='Shop.Theme.Transformer'}" rel="nofollow" class="mo_ma_level_0">
           <i class="fto-user mobilne_menu_account"></i>{l s='Login' d='Shop.Theme.Transformer'}
        </a>
    </li>
     <li class="mo_ml_level_0 mo_ml_column logout">
        <a href="{$urls.pages.register}" title="{l s='Log in to your customer account' d='Shop.Theme.Transformer'}" rel="nofollow" class="mo_ma_level_0">
           {l s='Registration' d='Shop.Theme.Transformer'}
        </a>
    </li>
{/if}
</ul>
<!-- /Block usmodule NAV -->
