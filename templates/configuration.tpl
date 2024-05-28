{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
	{*<div class="top-name">
		<div class="page_heading_box">
			<h1 class="page_heading mb-3">{l s='Configurator' d='Shop.Theme.Global'}</h1>
		</div>
	</div>*}


  {hook h='displayConfigurator'}
	{literal}
		<script src="https://configurator-thoro.cloud.arlity.com/embed/js/Configurator.min.js" defer type="module"></script>
		<script>
			const ARLITY_CONFIGURATOR_UUID = '7El7uJRk';
			const ARLITY_AUTOLOAD = 0;
		</script>

		<script>

			window.addEventListener('load', function(e) {
				jQuery('[data-toggle="arlity-open-fullscreen"]').on('click', function(e) {
					e.preventDefault();
				})
			});

			window.addEventListener('arlity-added-to-cart', ( e ) => {
				$.post('{/literal}{$link->getPageLink("configuration")}{literal}',{uuid:e.detail.uuid}, function(json){
					console.log('ok', json);

					if ( json.message == 'ok' ) {
						$('#arlity-calculation-details-modal [data-dismiss="modal"]').trigger('click');
						window.location = $('.st_shopping_cart.header_item').attr('href');
					}
				});
			});
		</script>	
	{/literal}
    
{/block}
