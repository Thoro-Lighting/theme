<div class="steco_layer"></div>

<div class="cart-name-top">{l s='Personal data' d='ShopThemeTransformer'}</div>

<div id="{$identifier}"
          class = "steco_column_inner {[
                      'steco-step'        => true,
                      'steco-reachable'      => $step_is_reachable,
                      'steco-complete'       => $step_is_complete,
                      'steco-incomplete'       => !$step_is_complete
                  ]|classnames} 
                    {if $customer.is_logged} steco-is_logged {/if}
                    {if $customer.is_guest} steco-is_guest {/if}
                    ">
<div class="steco_incomplete_message alert alert-danger">{l s='Please complete persional information.' d='Shop.Theme.Transformer'}</div>
{include  file = 'module:steasycheckout/views/templates/hook/_partials/notifications.tpl'}
  {if $customer.is_logged && !$customer.is_guest}

    <div class="identity">
    <div class="row">
    <div class="col-md-6"> 
    <div class="hello_info">
      {l s='Welcome' d='Shop.Theme.Transformer'} <a href="{$steco_urls.identity}">{$customer.firstname} {$customer.lastname}</a>{if $display_logout},  <i class="fto-logout-1"></i><a href="{$steco_urls.logout}" class="steco_logout btn-line-under">{l s='Log out' d='Shop.Theme.Transformer'}</a>
        {if !isset($empty_cart_on_logout) || $empty_cart_on_logout}
          <p class="steco_display_none">{l s='If you sign out now, your cart will be emptied.' d='Shop.Theme.Transformer'}</p>
        {/if}
      {/if}
      </div>



      <div class="form_content_inner">
  <div class="row steco_grid_view">
      <div class="classpl_choose_company adres_padding col-lg-12 adres_padding_chekbox" style="z-index: 10">
      <div class="form-group st_form_item_id_choose_company">
       <div class="form-control-valign">

       <label class="radio-inline">
       <span class="steco_flex_container steco_flex_start">
       <span class="steco-custom-input-box">
       <input class="steco-custom-input" name="choose_company" type="radio" value="0" autocomplete="disabled" {if (isset($cart_info.company) && empty($cart_info.company)) || ( !isset($cart_info.company) && $steco.default_account == 0 )}checked=""{/if}>
       <span class="steco-custom-input-item steco-custom-input-radio">
       <i class="eco-ok checkbox-checked"></i>
       <i class="eco-spin5 steco-animate-spin"></i>
       </span>
       </span>
       <span class="steco_flex_child">{l s='Private person' d='Shop.Theme.Transformer'}</span>
       </span>
       </label>
       <label class="radio-inline">
       <span class="steco_flex_container steco_flex_start">
       <span class="steco-custom-input-box">
       <input class="steco-custom-input" name="choose_company" type="radio" value="1" autocomplete="disabled" {if (isset($cart_info.company) && !empty($cart_info.company)) || ( !isset($cart_info.company) && $steco.default_account == 1 )}checked=""{/if}>
       <span class="steco-custom-input-item steco-custom-input-radio">
       <i class="eco-ok checkbox-checked"></i>
       <i class="eco-spin5 steco-animate-spin"></i>
       </span>
       </span>
       <span class="steco_flex_child">{l s='Company' d='Shop.Theme.Transformer'}</span>
       </span>
       </label>
       
       </div>
      </div>
      </div>
      </div>
      </div>


      <div class="classpl_invoice adres_padding_chekbox col-lg-12">
        <div class="form-group">
        <label class="steco_flex_container steco_flex_start">
          <span class="steco-custom-input-box">
              <input class="steco-custom-input" name="invoice" type="checkbox" value="1"{if !empty($cart_info.invoice)} checked=""{/if}>
              <span class="steco-custom-input-item steco-custom-input-checkbox"><i class="fto-ok-1 checkbox-checked"></i></span>
          </span>
          <div class="invoice_consent_message steco_flex_child">
             {l s='I want to receive an invoice' d='Shop.Theme.Transformer'}
          </div>
        </label>
        </div>
      </div>
       </div>


<div class="col-md-12"> 


      <div class="steco_addresses steco_block"></div>
    </div>
    </div>
    </div>
    
  {else}
    
  

<div id="steco_pi_forms" class="stacc_block stacc_1_3 flex_container all_form container" role="tablist" aria-multiselectable="false">
<div class="row all-form_step2">
  <div class="card col-md-12 create_zone type_input_{$input_fields}">
  <div class="card-header {if $steco.standard_version == 1}off_desktop{/if} {if $show_login_form == 2}off_all_device{/if}" role="tab" id="acc_heading_register">
        <div data-toggle="collapse" data-target="#collapse_register" aria-expanded="{if $show_login_form==1}active{else}false{/if}" aria-controls="collapse_register" class="{if $show_login_form!=1} collapsed{/if} {if $steco.button_form == 1}btn btn-border btn-full-width btn_arrow black_arrow btn-spin{else}normal-text{/if}">
      
        {if $steco.button_form == 1}{l s='<span>You do not have an account?</span> Click here to enter your details.' d='Shop.Theme.Transformer'}{else}{l s='First login' d='Shop.Theme.Transformer'}, <span>{l s='enter your details' d='Shop.Theme.Transformer'}<i class="fto-angle-right"></i></span>{/if}</div>
    </div>
  
  <div id="collapse_register" class="collapse {if $show_login_form==1 OR $show_login_form==2}show in{/if} {if $steco.standard_version == 1}show_desktop{/if}" role="tabpanel" aria-labelledby="acc_heading_register" data-parent="#steco_pi_forms">
        <section id="create_account_block" class="from_blcok block login_form_block {if $input_fields == 2}addres_placeholder{/if} fields_border_{$input_fields_border}">

    
    <h3 class="page_heading login_form_heading {if $sttheme.auth_heading_align==1} text-2 {elseif $sttheme.auth_heading_align==2} text-3 {else} text-1 {/if}">{l s='First login' d='Shop.Theme.Transformer'}</h3>
   
      {render file='module:steasycheckout/views/templates/hook/customer-form.tpl' ui=$register_form guest_allowed=$guest_allowed ask_for_gender=$steco.ask_for_gender newsletter=$steco.newsletter pi_type='register' steco_gdpr=$steco_gdpr is_logged=$customer.is_logged cart_info=$cart_info}


        {if $customer.is_logged && !$customer.is_logged }
          <div class="steco_addresses steco_block"></div>
        {/if}

    <div class="btn_register">
        <button class="btn steco_btn btn-primary btn-large steco_register btn_arrow btn_full_width step_down" type="button">{if $customer.is_logged && $customer.is_guest}{l s='Go further' d='Shop.Theme.Transformer'}{else}{l s='Go to the order' d='Shop.Theme.Transformer'}{/if}</button>
    </div> 
     </section>
    </div>

   

   
  </div>

   <div class="card col-md-12 login_zone">
   <div class="{if $steco.standard_version == 1}off_desktop{/if} {if $show_login_form == 2}off_all_device{/if}" role="tab" id="acc_heading_login">
        <div data-toggle="collapse" data-target="#collapse_login" aria-expanded="{if !$show_login_form}active{else}false{/if}" aria-controls="collapse_login" class="{if $show_login_form} collapsed{/if} btn btn-border btn-full-width btn_arrow black_arrow btn-spin">
       
        {if $steco.button_form == 1}{l s='<span>You have an account.</span> Log in to do shopping faster.' d='Shop.Theme.Transformer'}{else}{l s='If you already have an account' d='Shop.Theme.Transformer'}, <span>{l s='Log in here' d='Shop.Theme.Transformer'}<i class="fto-angle-right"></i></span>{/if}</div>
    </div>

     <div id="collapse_login" class="collapse {if !$show_login_form OR $show_login_form==2}show in{/if} {if $steco.standard_version == 1}show_desktop{/if}" role="tabpanel" aria-labelledby="acc_heading_login"  data-parent="#steco_pi_forms">
      <section id="login_form_block" class="from_blcok block login_form_block">
      
    
   {if $facebook_login || $google_login} 
    <div class="steco_social_login_box steco_mb_20  steco_social_button_1">
      <p class="page_heading login_form_heading social_login text-1 mb-2">{l s='Log in or create an account using' d='Shop.Theme.Transformer'}:</p>
      {include file = 'module:steasycheckout/views/templates/hook/_partials/social_login_1.tpl'}
    </div>
    {/if}
  
  
  
  
        {render file='module:steasycheckout/views/templates/hook/login-form.tpl' ui=$login_form steco_urls=$steco_urls}
        
       
        
         </section>
    </div>
   

  </div>
   </div>
 </div>
  {/if}
</div>


{if Context::getOneTimeDataLayer()}
    <script>
      dataLayer.push({ ecommerce: null });
      dataLayer.push({
        event: '{Context::getOneTimeDataLayer(true)}',
        ecommerce: {
          method: 'Google'
        }
      });
    </script> 
{/if}