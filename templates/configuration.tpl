{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
	{*<div class="top-name">
		<div class="page_heading_box">
			<h1 class="page_heading mb-3">{l s='Configurator' d='Shop.Theme.Global'}</h1>
		</div>
	</div>*}


  {hook h='displayConfigurator'}

	<div class="static-page_form_content force-fullwidth">
		<div class="container">
			<div class="static-page_col_left">
				<h3>{l s='Contact us and lets talk about cooperation opportunities' d='Shop.Theme.Global'}</h3>
				<p>{l s='We will get back to you as soon as possible' d='Shop.Theme.Global'}</p>
				{hook h='displayAskAboutProduct'}
			</div>
			<div class="static-page_col_right">
				<img
				src="https://thoro.webo.design/img/cms/dystr_form_img.png"
				alt="lampa"
				/>
			</div>
		</div>
	</div>


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

{* 
<div>
  	<div class="configurator_banner force-fullwidth">
  		<div class="configurator_col_left">
			<img src="https://thoro.webo.design/img/cms/configurator_banner.png" alt="banner-image" width="480" height="641" />
		</div>
  		<div class="configurator_col_right container">
  			<div class="content_header container-prod-tab">
  				<div>
  					<h1>Skorzystaj z konfiguratora lamp <span>na szynoprzewodach</span></h1>
  				</div>
  			</div>
  			<div class="configurator_banner_desc"><a href="#" data-toggle="arlity-open-fullscreen">Przejdź do
  					konfiguratora 3D</a>
  				<p>Stwórz swoje wymarzone oświetlenie dzięki naszemu łatwemu i intuicyjnemu konfiguratorowi . Dzięki niemu będziesz miał pełną kontrolę nad każdym aspektem swojego oświetlenia.</p>
  			</div>
  		</div>
  	</div>
  	<div class="configurator_steps">
  		<div class="content_header container-prod-tab">
  			<div>
  				<h2>Stwórz oświetlenie dla Twojego projektu w 3 krokach</h2>
  			</div>
  			<p>Chcesz sprawdzić jak to działa? <a href="#"> Zobacz wideo <svg width="20" height="21"
  						viewbox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
  						<path
  							d="M13.3744 11.2588L12.9652 10.6303L12.9547 10.6371L12.9445 10.6442L13.3744 11.2588ZM13.3744 9.96867L12.9296 10.5726L12.9631 10.5972L12.9991 10.618L13.3744 9.96867ZM8.20366 6.16122L8.64837 5.55728L8.62721 5.5417L8.605 5.52764L8.20366 6.16122ZM7.11966 6.72991L7.86977 6.72774L7.8695 6.71461L7.11966 6.72991ZM7.14134 14.209L6.39134 14.2112L6.3914 14.2324L6.39266 14.2536L7.14134 14.209ZM8.26509 14.8323L8.62825 15.4885L8.66269 15.4694L8.69494 15.4469L8.26509 14.8323ZM10 18.75C5.44365 18.75 1.75 15.0563 1.75 10.5H0.25C0.25 15.8848 4.61522 20.25 10 20.25V18.75ZM18.25 10.5C18.25 15.0563 14.5563 18.75 10 18.75V20.25C15.3848 20.25 19.75 15.8848 19.75 10.5H18.25ZM10 2.25C14.5563 2.25 18.25 5.94365 18.25 10.5H19.75C19.75 5.11522 15.3848 0.75 10 0.75V2.25ZM10 0.75C4.61522 0.75 0.25 5.11522 0.25 10.5H1.75C1.75 5.94365 5.44365 2.25 10 2.25V0.75ZM13.7835 11.8874C14.1754 11.6323 14.6202 11.2085 14.6194 10.5941C14.6185 9.96286 14.1525 9.55216 13.7496 9.31931L12.9991 10.618C13.0526 10.649 13.0908 10.6759 13.1169 10.6972C13.1431 10.7186 13.1537 10.7314 13.1553 10.7334C13.1566 10.7351 13.1472 10.7235 13.1375 10.6981C13.1326 10.6853 13.128 10.6699 13.1246 10.6521C13.1213 10.6342 13.1194 10.6154 13.1194 10.5961C13.1194 10.5769 13.1212 10.5588 13.1242 10.5424C13.1272 10.5261 13.1312 10.5127 13.135 10.5024C13.1425 10.482 13.1485 10.4757 13.1432 10.4829C13.1377 10.4903 13.1229 10.5082 13.093 10.5348C13.0632 10.5613 13.0216 10.5936 12.9652 10.6303L13.7835 11.8874ZM13.8191 9.36474L8.64837 5.55728L7.75895 6.76515L12.9296 10.5726L13.8191 9.36474ZM8.605 5.52764C8.19845 5.2701 7.64787 5.13503 7.13794 5.37312C6.58659 5.63055 6.35846 6.18913 6.36981 6.74522L7.8695 6.71461C7.86788 6.63528 7.88351 6.62042 7.87226 6.64195C7.86648 6.65301 7.85531 6.67004 7.83655 6.68819C7.81771 6.70642 7.79564 6.72148 7.77255 6.73227C7.72532 6.75432 7.69584 6.74913 7.70204 6.75C7.70925 6.75101 7.74482 6.75837 7.80232 6.7948L8.605 5.52764ZM6.36966 6.73208L6.39134 14.2112L7.89133 14.2068L7.86965 6.72774L6.36966 6.73208ZM6.39266 14.2536C6.4211 14.7312 6.5845 15.3144 7.12631 15.6037C7.66038 15.889 8.22972 15.709 8.62825 15.4885L7.90193 14.1761C7.85059 14.2045 7.80915 14.2229 7.77759 14.2344C7.74589 14.2459 7.72775 14.2492 7.72211 14.25C7.71677 14.2507 7.7267 14.2487 7.74825 14.2518C7.75906 14.2534 7.77223 14.2562 7.78707 14.261C7.80196 14.2659 7.81746 14.2723 7.83296 14.2806C7.84847 14.2889 7.86272 14.2983 7.87544 14.3084C7.88812 14.3184 7.89832 14.3283 7.90622 14.3371C7.92206 14.3548 7.92665 14.3658 7.92494 14.3621C7.92305 14.3581 7.91596 14.3415 7.9084 14.3076C7.90087 14.2739 7.89373 14.2269 7.89001 14.1644L6.39266 14.2536ZM8.69494 15.4469L13.8042 11.8734L12.9445 10.6442L7.83524 14.2177L8.69494 15.4469Z"
  							fill="#3D4C99"></path>
  					</svg> </a></p>
  		</div>
  		<div class="configurator_steps_tiles">
  			<div class="configurator_tile">
  				<div class="configurator_tile_img"><img src="https://thoro.webo.design/img/cms/configurator_tile1.png"
  						alt="tablet" width="286" height="206" /></div>
  				<span>KROK 1</span>
  				<h3>Uruchom konfigurator</h3>
  				<p>Nasze narzędzie umożliwia pełną personalizację oświetlenia szynowego, pozwalając Ci stworzyć oprawę
  					idealnie dopasowaną do projektu.</p>
  			</div>
  			<div class="configurator_tile">
  				<div class="configurator_tile_img"><img src="https://thoro.webo.design/img/cms/configurator_tile2.png"
  						alt="tablet" width="286" height="206" /></div>
  				<span>KROK 2</span>
  				<h3>Dopasuj każdy detal</h3>
  				<p>Dopasuj konfigurację oświetlenia do swojego wnętrza i podkreśl jego charakter. Wybierz oprawy o
  					odpowiedniej mocy, barwie i kącie rozsyłu światła. Określ precyzyjne wymiary lampy zgodnie z
  					potrzebami przestrzeni. Znajdź optymalne miejsce podłączenia zasilania szynoprzewodu.</p>
  			</div>
  			<div class="configurator_tile">
  				<div class="configurator_tile_img"><img src="https://thoro.webo.design/img/cms/configurator_tile3.png"
  						alt="tablet" width="286" height="206" /></div>
  				<span>KROK 3</span>
  				<h3>Sprawdź wizualizację i dokonaj zakupu</h3>
  				<p>Sprawdź jak Twoje wybory prezentują się w przestrzeni - w razie potrzeby możesz wrócić na każdy
  					wcześniejszy etap projektowania i dokonać zmiany w dokonanych wyborach. Po zakończeniu
  					konfiguracji oświetlenia możesz od razu dokonać zakupu online, pobrać specyfikację lub
  					skonsultować się z naszym zespołem. Możesz też przesłać projekt Klientowi – jeśli dokona zakupu,
  					otrzymasz prowizję w ramach Klubu Architekta.</p>
  			</div>
  		</div>
  		<div class="configurator_tile_btn"><a href="#" data-toggle="arlity-open-fullscreen">Przejdź do konfiguratora
  				3D</a></div>
  	</div>
	<div class="force-fullwidth hidden-md-up"><img src="https://thoro.webo.design/img/cms/dystr_form_img.png" alt="lampa" class=""></div>
  	<div class="static-page_form_header force-fullwidth">
  		<div class="container">
  			<div class="content_header container-prod-tab">
  				<div>
  					<p>POZNAJ KORZYŚCI WSPÓŁPRACY</p>
  					<h2>Twój projekt zasługuje na najwyższą jakość obsługi.</h2>
  				</div>
  			</div>
  			<ul>
  				<li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
  						<path
  							d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
  							stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
  					</svg> 5 lat gwarancji</li>
  				<li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
  						<path
  							d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
  							stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
  					</svg> 100 dni na zwrot</li>
  				<li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
  						<path
  							d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
  							stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
  					</svg> Gwarancja satysfakcji</li>
  				<li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
  						<path
  							d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
  							stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
  					</svg> Szybki czas realizacji zamówienia</li>
  			</ul>
  		</div>
  	</div>
</div>
*}