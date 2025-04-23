{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
    {hook h='displayAbout'}

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

    {capture name="displayHomeRight"}{hook h="displayHomeRight"}{/capture}
    {capture name="displayHomeLeft"}{hook h="displayHomeLeft"}{/capture}

    {if $smarty.capture.displayHomeRight || $smarty.capture.displayHomeLeft}

      <div class="style_content  block_content " style="padding-top:64px;">
        <div class="easy_brother_block text-1 text-md-0">
          <div class="content_header">
            <p>{l s='Meet Thoro' d='Shop.Theme.Global'}</p>
            <h2>{l s='Highlighting what’s most important to you' d='Shop.Theme.Global'}</h2>
          </div>
        </div>                  
      </div>
      
      <div id="home_secondary_row" class="row">
        <div id="home_secondary_left">
          {$smarty.capture.displayHomeLeft nofilter}
        </div>
        <div id="home_secondary_right">
          {$smarty.capture.displayHomeRight nofilter}
        </div>
      </div>
    {/if}
{/block}

{* template

  <section class="about_banner">
    <div class="about_banner_container">
      <div class="about_left_col">
        <div>
          <span class="about_banner_tag">Poznaj Thoro</span>
          <h1>Tworzymy lampy, które oświetlają to, co dla Ciebie najcenniejsze.</h1>
        </div>
        <a href="/wspolpraca">Współpracuj z nami</a>
      </div>
      <div class="about_right_col">
        <img src="https://thoro.webo.design/img/cms/o%20nas/banner_woman.png" alt="woman">
      </div>
    </div>
  </section>

  <section class="counter">
    <div class="counter_container">
      <div class="counter_col1 content_header container-prod-tab">
        <h2>Światło, które szanuje Twoją przestrzeń</h2>
      </div>
      <div class="counter_col2">
        <p>
          Z pasją kreujemy światłem przestrzeń, wierząc, że Twoje życie, jego istotne chwile i codzienne radości zasługują na pełną uwagę.
          <br>
          <br>
          Nasza historia zaczęła się od fascynacji nowoczesnym designem oraz skandynawskim minimalizmem, zaś w połączeniu z 20-letnim doświadczeniem i doskonałą znajomością branży oświetleniowej – pozwala na tworzenie oświetlenia wyjątkowej klasy, które dba o użytkowników.
        </p>
        <div class="counter_wrapper">
          <div class="counter_1">
            <p class="couter_qty">20 lat</p>
            <p class="counter_desc">doświadczenia  w branży</p>
          </div>
          <div class="counter_1">
            <p class="couter_qty">98,9%</p>
            <p class="counter_desc">zrealizowanych projektów</p>
          </div>
          <div class="counter_1">
            <p class="couter_qty">256+</p>
            <p class="counter_desc">zrealizowanych projektów</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mission">
    <div class="mission_container">
      <div class="mission_col1 content_header container-prod-tab">
        <h2>Nasza misja i podejście</h2>
        <p>Tworzymy lampy, które oświetlają to, co dla Ciebie najcenniejsze. Oferujemy minimalistyczne oświetlenie wysokiej jakości, które wspiera Cię w codziennej aktywności, zarówno podczas pracy jak i relaksu, stając się nieodłącznym elementem Twojej życiowej przestrzeni. </p>
        
        <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>Tworzymy minimalistyczne oświetlenie najwyższej jakości, które harmonijnie uzupełnia każde wnętrze
          </li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg> Nasze oprawy są produkowane w Polsce, we współpracy z lokalnymi dostawcami i rzemieślnikami.
          </li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg> Dbamy o wysoką funkcjonalność i długą żywotność opraw, realizując zasady zrównoważonego biznesu.
          </li>
        </ul>
      </div>
      
      <div class="mission_col2">
        <img src="https://thoro.webo.design/img/cms/o%20nas/lampa.png" alt="lampa">
      </div>
    </div>
  </section>

  <section class="banner_gradient">
    <div class="banner-gradient-circle force-fullwidth">
      <div class="container">
        <p>Nasza filozofia</p>
        <h3>Fascynacja designem oraz skandynawskim minimalizmem a także ponad 20 - letnie doświadczenie zdobyte na rynku oświetleniowym, daje początek i tworzy DNA marki THORO.</h3>
      </div>
    </div>                  
  </section>

  <section class="our_products">
    <div class="our_products_header content_header container-prod-tab">
      <h2>Nasze produkty</h2>
      <p>
        Oferujemy funkcjonalne oprawy w minimalistycznej formie, która wydobywa pełnię możliwości oświetleniowych, tworząc idealne warunki do pracy i odpoczynku. 
        <br>
        <br>
        Nasze lampy posiadają wysokie parametry techniczne, w tym CRI (>90), które zapewnia doskonałe odwzorowanie kolorów, nie powoduje olśnienia dla oka i wrażenia nadmiernej jaskrawości - dzięki temu światło rozpraszane jest równomiernie, zapewniając Użytkownikom lepsze samopoczucie i wysoki komfort przebywania w pomieszczeniu.
      </p>
    </div>
    <div class="swiper" data-js="swiper-product-about">
      <div class="swiper-wrapper">
        <div class="swiper-slide relative">
          <a href="/wiszace">
            <img src="https://thoro.webo.design/img/cms/o%20nas/wiszace.png" alt="lampy-wiszace" class="size-full !absolute !inset-0">
            <h3>Wiszące</h3>
          </a>
        </div>
        <div class="swiper-slide">
          <a href="/plafony">
            <img src="https://thoro.webo.design/img/cms/o%20nas/plafony.png" alt="plafony">
            <h3>Plafony</h3>
          </a>
        </div>
        <div class="swiper-slide">
          <a href="/kinkiety">
            <img src="https://thoro.webo.design/img/cms/o%20nas/kinkiety.png" alt="kinkiety">
            <h3>Kinkiety</h3>
          </a>
        </div>
        <div class="swiper-slide">
          <a href="/zyrandole">
            <img src="https://thoro.webo.design/img/cms/o%20nas/zyrandole.png" alt="zyrandole">
            <h3>Żyrandole</h3>
          </a>
        </div>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </section>

  <section class="meet_us">
    <div class="meet_us_container">
      <div class="meet_us_col1">
        <div class="meet_us_1">
          <img src="https://thoro.webo.design/img/cms/o%20nas/founders.png" alt="founders">
          <span>imiona i nazwiska właścicieli, <br> Założyciele Thoro</span>
        </div>
        <div class="meet_us_2">
          <img src="https://thoro.webo.design/img/cms/o%20nas/designer.png" alt="designers">
          <span>Łukasz Kwietniewski, <br> architekt i projektant lamp</span>
        </div>
      </div>
      <div class="meet_us_col2 content_header container-prod-tab">
        <h2>Poznaj ludzi THORO</h2>
        <p>Autorska marka THORO powstała dzięki pasji i zaangażowaniu wielu osób. Ich ogromne doświadczenie, znajomość rynku oraz fascynacja nowoczesnym wzornictwem pozwoliły zrealizować wizję wprowadzenia na polski rynek oświetleniowy, kolekcji funkcjonalnych opraw łączących minimalistyczny design z doskonałą jakością światła.</p>
        <a href="/wspolpraca">Czytaj o naszych projektantach</a>
      </div>
    </div>
  </section>

  <section>
    <div class="static-page_form_header force-fullwidth">
      <div class="container">
        <div class="content_header container-prod-tab">
          <div>
          <p>POZNAJ KORZYŚCI WSPÓŁPRACY</p>
          <h2>Twój projekt zasługuje na najwyższą jakość obsługi.</h2>
        </div>
      </div>
      <ul>
        <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg> 5 lat gwarancji</li>
        <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg> 100 dni na zwrot</li>
        <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg> Gwarancja satysfakcji</li>
        <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"> <path d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z" stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg> Szybki czas realizacji zamówienia</li>
      </ul>
    </div>
  </section>

*}