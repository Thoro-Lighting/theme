{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
   {hook h='displayArchitecture'}

   <div class="static-page_form_content force-fullwidth" style="padding-top:64px;">
      <div class="container">
      <div class="static-page_col_left">
         <h3>{l s='Your project deserves the highest quality of service.' d='Shop.Theme.Global'}</h3>
         <p>{l s='We will get back to you as soon as possible' d='Shop.Theme.Global'}</p>
         {hook h='displayAskAboutProduct'}
      </div>
      <div class="static-page_col_right">
         <img
         src="https://thoro.pl/img/cms/form_img.png"
         alt="lampa"
         />
      </div>
      </div>
   </div>
{/block}

{* 
template
<section class="architect_banner force-fullwidth">
<div class="architect_col_left"><img src="https://thoro.webo.design/img/cms/strefa%20architekta/architect_banner.png" alt="banner-image" /></div>
<div class="architect_col_right container">
<div class="content_header container-prod-tab">
<div>
<h1>Twórz aranżacje wnętrz z autorskimi lampami</h1>
</div>
</div>
<div class="architect_banner_desc"><a href="https://thoro.pl/kontakt">Skontaktuj się z nami</a>
<p>Serdecznie zapraszamy do współpracy architektów, projektantów i dekoratorów wnętrz a także restauracje, sieci hoteli i deweloperów. Oferujemy warunki współpracy, aby Twoje projekty były jeszcze lepsze</p>
</div>
</div>
</section>
<section class="architect_bar force-fullwidth">
<ul class="architect_bar_container container">
<li><svg xmlns="http://www.w3.org/2000/svg" width="15" height="21" viewbox="0 0 15 21" fill="none"><path d="M5.1 20.1004H9.9M5.7 8.10039H9.3M1.5 6.90039C1.5 3.58668 4.18629 0.900391 7.5 0.900391C10.8137 0.900391 13.5 3.58668 13.5 6.90039C13.5 9.36077 12.0191 11.3745 9.9 12.3004V15.9004C9.9 16.5631 9.36274 17.1004 8.7 17.1004H6.3C5.63726 17.1004 5.1 16.5631 5.1 15.9004V12.4011C2.98091 11.4753 1.5 9.36077 1.5 6.90039Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>Wyprodukowane w Polsce</li>
<li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewbox="0 0 23 21" fill="none"><path d="M10.9956 1.2143C11.2021 0.795754 11.799 0.795754 12.0055 1.2143L14.6795 6.63242C14.7616 6.79863 14.9201 6.91383 15.1036 6.94048L21.0828 7.80932C21.5447 7.87644 21.7291 8.44406 21.3949 8.76985L17.0683 12.9873C16.9355 13.1166 16.875 13.303 16.9063 13.4857L17.9277 19.4408C18.0066 19.9008 17.5237 20.2516 17.1106 20.0345L11.7626 17.2228C11.5986 17.1366 11.4026 17.1366 11.2385 17.2228L5.8905 20.0345C5.47737 20.2516 4.99453 19.9008 5.07343 19.4408L6.09481 13.4857C6.12614 13.303 6.06557 13.1166 5.93285 12.9873L1.60622 8.76985C1.27199 8.44406 1.45642 7.87644 1.91832 7.80932L7.89757 6.94048C8.08099 6.91383 8.23955 6.79863 8.32158 6.63242L10.9956 1.2143Z" stroke="#484540" stroke-width="1.5" stroke-linejoin="round"></path></svg>Personalizacja produktu</li>
<li><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewbox="0 0 21 21" fill="none"><path d="M4.50039 17.7005C2.51216 17.7005 0.900391 16.0887 0.900391 14.1005V6.90039C0.900393 4.91217 2.51217 3.30039 4.50039 3.30039H9.90039M14.7004 3.30039H16.5004C18.4886 3.30039 20.1004 4.91217 20.1004 6.90039V14.1005C20.1004 16.0887 18.4886 17.7005 16.5004 17.7005H8.70039M8.70039 17.7005L11.1004 15.3004M8.70039 17.7005L11.1004 20.1004M8.70039 5.70039L11.1004 3.30039L8.70039 0.900391" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg><span>Proekologiczne podejście - wymienne podzespoły</span></li>
<li><svg xmlns="http://www.w3.org/2000/svg" width="15" height="21" viewbox="0 0 15 21" fill="none"><path d="M5.1 20.1004H9.9M5.7 8.10039H9.3M1.5 6.90039C1.5 3.58668 4.18629 0.900391 7.5 0.900391C10.8137 0.900391 13.5 3.58668 13.5 6.90039C13.5 9.36077 12.0191 11.3745 9.9 12.3004V15.9004C9.9 16.5631 9.36274 17.1004 8.7 17.1004H6.3C5.63726 17.1004 5.1 16.5631 5.1 15.9004V12.4011C2.98091 11.4753 1.5 9.36077 1.5 6.90039Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>Wysokie parametry świetlne - CRI &lt; 90</li>
<li><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewbox="0 0 21 21" fill="none"><path d="M13.642 8.48299L9.375 12.75L7.92049 11.2955M10.5 1.5C5.52944 1.5 1.5 5.52944 1.5 10.5C1.5 15.4706 5.52944 19.5 10.5 19.5C15.4706 19.5 19.5 15.4706 19.5 10.5C19.5 5.52944 15.4706 1.5 10.5 1.5Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>5 lat gwarancji</li>
</ul>
</section>
<section class="architect_about">
<div class="force-fullwidth">
<div class="architect_about_container container">
<div class="architect_about_header content_header container-prod-tab">
<h2>Jesteś doświadczonym architektem? Szukasz nowych wyzwań?</h2>
<p><strong>Klub Architekta Thoro Lighting</strong> to program współpracy dla architektów i projektantów wnętrz, który pozwala na osiągnięcie nowego poziomu sukcesu zawodowego. <br /><br />Buduj prestiż i wartość swojej marki w Klubie Architekta.</p>
</div>
</div>
</div>
<div class="force-fullwidth" style="background-color: #f7f5f1;">
<div class="architect_image_aside container"><img src="https://thoro.webo.design/img/cms/strefa%20architekta/lampa.png" alt="lampa" />
<div class="architect_about_col2">
<div class="content_header container-prod-tab">
<h2>Przestrzeń dla profejsonalistów</h2>
<ul>
<li>
<div class="architect_about_col2_subtitle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
<h3>Próbki oraz katalogi</h3>
</div>
<p>Przeglądaj aktualne katalogi bez wychodzenia z biura<br />– wszystko w jednym miejscu, bez zbędnego szukania.</p>
</li>
<li>
<div class="architect_about_col2_subtitle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
<h3>Dedykowany opiekun</h3>
</div>
<p>Każdy projekt jest wyjątkowy – dlatego masz wsparcie osobistego opiekuna, który pomoże Ci na każdym etapie współpracy i odpowie na wszystkie pytania.</p>
</li>
<li>
<div class="architect_about_col2_subtitle"><svg style="min-width: 24px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
<h3>Thoro Affiliates – prowizja za polecenia i sprzedaż</h3>
</div>
<p>Zarabiaj na współpracy! Otrzymuj prowizję za sprzedaż produktów Thoro dzięki przejrzystemu programowi afiliacyjnemu.</p>
</li>
<li>
<div class="architect_about_col2_subtitle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
<h3>Personalizacja produktów</h3>
</div>
<p>Dostosuj produkty Thoro do indywidualnych potrzeb klienta – wybieraj kolory, materiały i wykończenia, aby każdy projekt był niepowtarzalny.</p>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>
<section class="architect_swiper">
<div class="architect_swiper_header content_header container-prod-tab">
<div class="architect_swiper_left_col">
<h2>Baza modeli 3D</h2>
<a class="architect_3dmodels_btn desktop" href="#">Zobacz wszystkie modele 3D</a></div>
<p>Z myślą o Tobie i Twoich projektach – oraz ułatwieniu naszej współpracy – stale rozbudowujemy naszą bazę modeli 3D lamp w formacie dwg. <br /><br />Jeśli potrzebujesz modelu, którego nie mamy jeszcze na stronie – napisz do nas – postaramy się go dla Ciebie przygotować! W sprawach technicznych prosimy o kontakt na adres: <a href="mailto:biuro@thoro.pl">biuro@thoro.pl</a>.</p>
</div>
<div class="swiper" data-js="swiper-tiles-default">
<div class="swiper-wrapper">
<div class="swiper-slide relative"><a href="/wiszace"> <img src="https://thoro.webo.design/img/cms/strefa%20architekta/wiszace-2.png" alt="lampy-wiszace" class="size-full !absolute !inset-0" />
<h3>Wiszące</h3>
</a></div>
<div class="swiper-slide"><a href="/plafony"> <img src="https://thoro.webo.design/img/cms/strefa%20architekta/plafony.png" alt="plafony" />
<h3>Plafony</h3>
</a></div>
<div class="swiper-slide"><a href="/kinkiety"> <img src="https://thoro.webo.design/img/cms/strefa%20architekta/kinkiety.png" alt="kinkiety" />
<h3>Kinkiety</h3>
</a></div>
<div class="swiper-slide"><a href="/zyrandole"> <img src="https://thoro.webo.design/img/cms/strefa%20architekta/zyrandole.png" alt="zyrandole" />
<h3>Żyrandole</h3>
</a></div>
</div>
<div class="swiper-scrollbar architect_swiper"></div>
</div>
<a class="architect_3dmodels_btn_mobile" href="#">Zobacz wszystkie modele 3D</a></section>
*}