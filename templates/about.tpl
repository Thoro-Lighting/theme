{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
  {hook h='displayAbout'}

  <div class="static-page_form_content force-fullwidth">
    <div class="container">
      <div class="static-page_col_left">
        <h3>{l s='Contact us and lets talk about cooperation opportunities' d='Shop.Theme.Global'}</h3>
        <p>{l s='We will get back to you as soon as possible' d='Shop.Theme.Global'}</p>
        <div class="pipedriveWebForms" data-pd-webforms="https://webforms.pipedrive.com/f/czEr32OHvdEm8oKgKZLug7lMvkF3W29LCBspT9nlfPVcxRzlI9jwFZwwPQaJVh45q3">
          <script src="https://webforms.pipedrive.com/f/loader"></script>
        </div>
      </div>
      <div class="static-page_col_right">
        <img src="https://thoro.pl/img/cms/form_img.png" alt="lampa" />
      </div>
    </div>
  </div>

  {hook h='displayAboutBottom'}
  
{/block}

{* template

<section class="about_banner force-fullwidth">
  <div class="about_banner_container container">
    <div class="about_left_col">
      <div><span class="about_banner_tag">Poznaj Thoro</span>
        <h1>Tworzymy lampy, które oświetlają to, co dla Ciebie najcenniejsze.</h1>
      </div>
      <a href="https://thoro.pl/o-nas#kontakt">Współpracuj z nami</a>
    </div>
    <div class="about_right_col"><img src="https://thoro.pl/img/cms/o%20nas/banner_woman.png" alt="woman" width="720"
        height="641" /></div>
  </div>
</section>
<section class="about_bar force-fullwidth">
  <div class="inner-scroll-container hide-scrollbar">
    <ul class="about_bar_container container">
      <li><svg xmlns="http://www.w3.org/2000/svg" width="15" height="21" viewbox="0 0 15 21" fill="none">
          <path
            d="M5.1 20.1004H9.9M5.7 8.10039H9.3M1.5 6.90039C1.5 3.58668 4.18629 0.900391 7.5 0.900391C10.8137 0.900391 13.5 3.58668 13.5 6.90039C13.5 9.36077 12.0191 11.3745 9.9 12.3004V15.9004C9.9 16.5631 9.36274 17.1004 8.7 17.1004H6.3C5.63726 17.1004 5.1 16.5631 5.1 15.9004V12.4011C2.98091 11.4753 1.5 9.36077 1.5 6.90039Z"
            stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>Wyprodukowane w Polsce</li>
      <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewbox="0 0 23 21" fill="none">
          <path
            d="M10.9956 1.2143C11.2021 0.795754 11.799 0.795754 12.0055 1.2143L14.6795 6.63242C14.7616 6.79863 14.9201 6.91383 15.1036 6.94048L21.0828 7.80932C21.5447 7.87644 21.7291 8.44406 21.3949 8.76985L17.0683 12.9873C16.9355 13.1166 16.875 13.303 16.9063 13.4857L17.9277 19.4408C18.0066 19.9008 17.5237 20.2516 17.1106 20.0345L11.7626 17.2228C11.5986 17.1366 11.4026 17.1366 11.2385 17.2228L5.8905 20.0345C5.47737 20.2516 4.99453 19.9008 5.07343 19.4408L6.09481 13.4857C6.12614 13.303 6.06557 13.1166 5.93285 12.9873L1.60622 8.76985C1.27199 8.44406 1.45642 7.87644 1.91832 7.80932L7.89757 6.94048C8.08099 6.91383 8.23955 6.79863 8.32158 6.63242L10.9956 1.2143Z"
            stroke="#484540" stroke-width="1.5" stroke-linejoin="round"></path>
        </svg>Personalizacja produktu</li>
      <li><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewbox="0 0 21 21" fill="none">
          <path
            d="M4.50039 17.7005C2.51216 17.7005 0.900391 16.0887 0.900391 14.1005V6.90039C0.900393 4.91217 2.51217 3.30039 4.50039 3.30039H9.90039M14.7004 3.30039H16.5004C18.4886 3.30039 20.1004 4.91217 20.1004 6.90039V14.1005C20.1004 16.0887 18.4886 17.7005 16.5004 17.7005H8.70039M8.70039 17.7005L11.1004 15.3004M8.70039 17.7005L11.1004 20.1004M8.70039 5.70039L11.1004 3.30039L8.70039 0.900391"
            stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>Proekologiczne podejście - wymienne podzespoły</li>
      <li><svg xmlns="http://www.w3.org/2000/svg" width="15" height="21" viewbox="0 0 15 21" fill="none">
          <path
            d="M5.1 20.1004H9.9M5.7 8.10039H9.3M1.5 6.90039C1.5 3.58668 4.18629 0.900391 7.5 0.900391C10.8137 0.900391 13.5 3.58668 13.5 6.90039C13.5 9.36077 12.0191 11.3745 9.9 12.3004V15.9004C9.9 16.5631 9.36274 17.1004 8.7 17.1004H6.3C5.63726 17.1004 5.1 16.5631 5.1 15.9004V12.4011C2.98091 11.4753 1.5 9.36077 1.5 6.90039Z"
            stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>Wysokie parametry świetlne - CRI &lt; 90</li>
      <li><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewbox="0 0 21 21" fill="none">
          <path
            d="M13.642 8.48299L9.375 12.75L7.92049 11.2955M10.5 1.5C5.52944 1.5 1.5 5.52944 1.5 10.5C1.5 15.4706 5.52944 19.5 10.5 19.5C15.4706 19.5 19.5 15.4706 19.5 10.5C19.5 5.52944 15.4706 1.5 10.5 1.5Z"
            stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>Limitowana sieć dystrybucji</li>
    </ul>
  </div>
</section>
<section class="about_counter force-fullwidth">
  <div class="about_counter_container container">
    <div class="about_counter_col1 content_header container-prod-tab">
      <h2>Światło, które szanuje Twoją przestrzeń</h2>
    </div>
    <div class="about_counter_col2">
      <p>Z pasją kreujemy światłem przestrzeń, wierząc, że Twoje życie, jego istotne chwile i codzienne radości
        zasługują na pełną uwagę. <br /><br />Nasza historia zaczęła się od fascynacji nowoczesnym designem oraz
        skandynawskim minimalizmem, zaś w połączeniu z 20-letnim doświadczeniem i doskonałą znajomością branży
        oświetleniowej – pozwala na tworzenie oświetlenia wyjątkowej klasy, które dba o użytkowników.</p>
    </div>
  </div>
</section>
<section class="mission force-fullwidth">
  <div class="posi_rel">
    <div class="mission_container container">
      <div class="mission_col1 content_header container-prod-tab">
        <h2>Nasza misja i podejście</h2>
        <p>Tworzymy lampy, które oświetlają to, co dla Ciebie najcenniejsze. Oferujemy minimalistyczne oświetlenie
          wysokiej jakości, które wspiera Cię w codziennej aktywności, zarówno podczas pracy jak i relaksu, stając się
          nieodłącznym elementem Twojej życiowej przestrzeni.</p>
        <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
              <path
                d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
                stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>Tworzymy minimalistyczne oświetlenie najwyższej jakości, które harmonijnie uzupełnia każde wnętrze
          </li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
              <path
                d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
                stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg> Nasze oprawy są produkowane w Polsce, we współpracy z lokalnymi dostawcami i rzemieślnikami.</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
              <path
                d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
                stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg> Dbamy o wysoką funkcjonalność i długą żywotność opraw, realizując zasady zrównoważonego biznesu.</li>
        </ul>
      </div>
      <div class="mission_col2"><img src="https://thoro.pl/img/cms/o%20nas/lampa.png" alt="lampa" width="711"
          height="712" /></div>
    </div>
  </div>
</section>
<section class="banner_gradient">
  <div class="banner-gradient-circle force-fullwidth">
    <div class="container">
      <p>Nasza obietnica</p>
      <h3>W świetle THORO każda chwila może stać się wyjątkowa. Tworzymy atmosferę, Ty tworzysz wspomnienia. Nasze lampy
        szanują Twoją przestrzeń, oferując idealne oświetlenie bez zbędnych dodatków.</h3>
    </div>
  </div>
</section>
<section class="our_products">
  <div class="our_products_header content_header container-prod-tab">
    <h2>Nasze produkty</h2>
    <p>Oferujemy funkcjonalne oprawy w minimalistycznej formie, która wydobywa pełnię możliwości oświetleniowych,
      tworząc idealne warunki do pracy i odpoczynku. <br /><br />Nasze lampy posiadają wysokie parametry techniczne, w
      tym CRI (&gt;90), które zapewnia doskonałe odwzorowanie kolorów, nie powoduje olśnienia dla oka i wrażenia
      nadmiernej jaskrawości - dzięki temu światło rozpraszane jest równomiernie, zapewniając Użytkownikom lepsze
      samopoczucie i wysoki komfort przebywania w pomieszczeniu.</p>
  </div>
  <div class="swiper" data-js="swiper-tiles-default">
    <div class="swiper-wrapper">
      <div class="swiper-slide relative"><a href="/wiszace"> <img src="https://thoro.pl/img/cms/o%20nas/wiszace.png"
            alt="lampy-wiszace" class="size-full !absolute !inset-0" width="332" height="333" />
          <h3>Wiszące</h3>
        </a></div>
      <div class="swiper-slide"><a href="/plafony"> <img src="https://thoro.pl/img/cms/o%20nas/plafony.png"
            alt="plafony" width="332" height="333" />
          <h3>Plafony</h3>
        </a></div>
      <div class="swiper-slide"><a href="/kinkiety"> <img src="https://thoro.pl/img/cms/o%20nas/kinkiety.png"
            alt="kinkiety" width="332" height="333" />
          <h3>Kinkiety</h3>
        </a></div>
      <div class="swiper-slide"><a href="/zyrandole"> <img src="https://thoro.pl/img/cms/o%20nas/zyrandole.png"
            alt="zyrandole" width="332" height="333" />
          <h3>Żyrandole</h3>
        </a></div>
    </div>
    <div class="swiper-scrollbar"></div>
  </div>
</section>
<section class="meet_us force-fullwidth">
  <div class="meet_us_container container">
    <div class="meet_us_col1">
      <div class="meet_us_1"><img src="https://thoro.pl/img/cms/o%20nas/founders.png" alt="founders" width="448"
          height="486" /> <span>Kasia i Maciej, <br />Założyciele Thoro</span></div>
      <div class="meet_us_2"><img src="https://thoro.pl/img/cms/o%20nas/designer.png" alt="designers" width="333"
          height="348" /> <span>Łukasz Kwietniewski, <br />architekt i projektant lamp</span></div>
    </div>
    <div class="meet_us_col2 content_header container-prod-tab">
      <h2>Ludzie THORO</h2>
      <p>Marka THORO powstała z pasji i zaangażowania wielu osób, których doświadczenie, znajomość rynku oraz
        zamiłowanie do nowoczesnego wzornictwa pozwoliły stworzyć kolekcję funkcjonalnych opraw oświetleniowych. Łączą
        one minimalistyczny design z najwyższą jakością światła, wprowadzając nowe standardy na polskim rynku
        oświetleniowym.</p>
      <a href="/projektanci">Poznaj naszych projektantów<svg width="13" height="11" viewbox="0 0 13 11" fill="none"
          xmlns="http://www.w3.org/2000/svg" class="ml-1">
          <path
            d="M9.37491 4.98794L6.5269 2.17194L7.72691 0.939941L12.7029 5.89994L7.72691 10.8599L6.5269 9.62794L9.37491 6.81194H0.878906V4.98794H9.37491Z"
            fill="#3D4C99"></path>
        </svg></a>
    </div>
  </div>
</section>
<section id="kontakt">
  <div class="static-page_form_header force-fullwidth">
    <div class="container">
      <div class="content_header container-prod-tab">
        <div>
          <p>POZNAJ KORZYŚCI WSPÓŁPRACY</p>
          <h2>Dołącz do nas i odkryj, jak THORO może odmienić Twoją przestrzeń, tworząc idealnetło dla Twojego życia.
          </h2>
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
</section>

*}