{*
*
* 2012-2018 Patryk Marek PrestaDev.pl
*
* Patryk Marek PrestaDev.pl - PD Ask about product Pro module © All rights reserved.
*
* DISCLAIMER
*
* Do not edit, modify or copy this file.
* If you wish to customize it, contact us at info@prestadev.pl.
*
* @author    Patryk Marek PrestaDev.pl <info@prestadev.pl>
* @copyright 2012-2018 Patryk Marek - PrestaDev.pl
* @license   License is for use in domain / or one multistore enviroment (do not modify or reuse this code or part of it) if you want any changes please contact with me at info@prestadev.pl
* @link      http://prestadev.pl
* @package   Ask about product Pro for Prestashop 1.5.x and 1.6.x and 1.7.x
* @version   2.0.1
* @date      06-01-2014
*
*}


{if $ps_version_16}
	<div class="form-horizontal clearfix">
        <fieldset class="panel">
			<div class="panel-heading">
				<i class="icon-cogs"></i> {l s='Instalation instruction extra hook on product list' mod='pdaskaboutproductpro'}
            </div>
            <div class="form-wrapper">
				<p>{l s='If you want to add "Ask about product" button on product list pages please add belowe line of code:' mod='pdaskaboutproductpro'}<br />
					<code>{ hook h='displayAAPProductList' id_product_hook=$product.id_product }</code><br />
					{l s='to tpl file of your theme located in:' mod='pdaskaboutproductpro'}
	               	<code>/themes/{$theme_name}/product-list.tpl</code>
	            </p>
            </div>
        </fieldset>
     </div>
{/if}