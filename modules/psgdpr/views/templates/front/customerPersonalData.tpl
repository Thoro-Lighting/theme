{*
* 2007-2018 PrestaShop
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2018 PrestaShop SA
* @license   http://addons.prestashop.com/en/content/12-terms-and-conditions-of-use
* International Registered Trademark & Property of PrestaShop SA
*}
{extends file='customer/page.tpl'}



{block name='page_content'}
{block name='page_title'}
      <h6 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i class="fto-angle-double-left side_close_left"></i></a>{l s='My personal data' d='Shop.Theme.Transformer'}</h6>
{/block}
<div class="">
    <section class="page_content">
        <div class="col-xs-12 psgdprinfo17 mt-0">
            <h3 class="hello_info pl-0 pr-0" >{l s='Access to my data' d='Shop.Theme.Transformer'}</h3>
            <p>{l s='At any time, you have the right to retrieve the data you have provided to our site. Click on "Get my data" to automatically download a copy of your personal data on a pdf or csv file.' d='Shop.Theme.Transformer'}.</p>
            <a id="exportDataToCsv" class="btn btn-main st_psgdprgetdatabtn17 ml-0 mb-2" target="_blank" href="{$psgdpr_csv_controller|escape:'htmlall':'UTF-8'}">{l s='GET MY DATA TO CSV' d='Shop.Theme.Transformer'}</a>
            <a id="exportDataToPdf" class="btn btn-main st_psgdprgetdatabtn17 mb-2 mx-sm-0" style="margin-left:0px;" target="_blank" href="{$psgdpr_pdf_controller|escape:'htmlall':'UTF-8'}">{l s='GET MY DATA TO PDF' d='Shop.Theme.Transformer'}</a>
        </div>
        <div class="col-xs-12 psgdprinfo17">
            <h3 class="hello_info  pl-0 pr-0">{l s='Rectification & Erasure requests' d='Shop.Theme.Transformer'}</h3>
            <p>{l s='You have the right to modify all the personal information found in the "My Account" page. For any other request you might have regarding the rectification and/or erasure of your personal data, please contact us through our' d='Shop.Theme.Transformer'} <a href="{$psgdpr_contactUrl|escape:'htmlall':'UTF-8'}">{l s='contact page' d='Shop.Theme.Transformer'}</a>. {l s='We will review your request and reply as soon as possible.' d='Shop.Theme.Transformer'}</p>
        </div>
    </section>
</div>
{literal}
<script type="text/javascript">
    var psgdpr_front_controller = "{/literal}{$psgdpr_front_controller|escape:'htmlall':'UTF-8'}{literal}";
    var psgdpr_id_customer = "{/literal}{$psgdpr_front_controller|escape:'htmlall':'UTF-8'}{literal}";
    var psgdpr_ps_version = "{/literal}{$psgdpr_ps_version|escape:'htmlall':'UTF-8'}{literal}";
</script>
{/literal}
{/block}

