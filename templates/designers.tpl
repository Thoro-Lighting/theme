{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
  {hook h='displayDesigners'}

  <div class="static-page_form_content force-fullwidth">
    <div class="container">
      <div class="static-page_col_left">
        <h3>{l s='Contact us and lets talk about cooperation opportunities' d='Shop.Theme.Global'}</h3>
        <p>{l s='We will get back to you as soon as possible' d='Shop.Theme.Global'}</p>
        {hook h='displayAskAboutProduct'}
      </div>
      <div class="static-page_col_right">
        <img src="https://thoro.pl/img/cms/form_img.png" alt="lampa" />
      </div>
    </div>
  </div>
{/block}


<div class="designers_banner force-fullwidth">
  <div class="designers_col_left">
    <img src="https://thoro.webo.design/img/cms/projektanci/designers-banner.jpg" alt="banner-image" width="500" height="667"/>
  </div>
  <div class="designers_col_right container">
    <h1>Gdzie wizja spotyka światło.</h1>
    <div class="designers_banner_desc">
      <p>Odkryj historie i inspiracje naszych projektantów, którzy łączą innowacyjny design z funkcjonalnością, tworząc
        lampy Thoro, które oświetlają Twoje życie. Poznaj ich wizję i zobacz, jak ich kreatywność przekłada się na
        piękne i praktyczne rozwiązania oświetleniowe</p>
    </div>
  </div>
</div>

<div>
  <div class="designers_list">
    <div class="content_header">
      <h2>Poznaj naszych projektantów</h2>
    </div>
    <div class="designers_list_item">
      <div class="designers_list_item_img_container">
        <img src="https://thoro.webo.design/img/cms/projektanci/Piotr.png" alt="Piotr Żydowski" width="375"
          height="375" />
      </div>
      <div class="designers_list_item_desc">
        <h3>Piotr Żydowski</h3>
        <div class="designers_list_item_desc_inner">
          <p>Założyciel gdańskiego Jaśniej, załozyciel i&nbsp;główny projektant Totem Light. Z&nbsp;wykształcenia prawnik
            z&nbsp;pasji i&nbsp;drogi życiowej specjalista od technikaliów, i&nbsp;historii oświetleniowego wzornictwa.
            Propagator kultury oświetlenia (jego wpływu na zdrowie, życie i&nbsp;środowisko) i&nbsp;idei uczciwego, zrównoważonego produktu.</p>
          <p>Oświetlenie traktuje jako najważniejszą, ale jednak składową zorganizowanej architektonicznej przestrzeni.
            Projektowanie lampy w tym kontekście to przede wszystkim nadanie światłu funkcji, które ma spełniać wobec
            użytkownika.</p>
          <p>Doskonale gdy ta użyteczność ubrana jest w przyjemną formę, wyprodukowaną lokalnie.</p>
        </div>
      </div>
      <div class="designers_list_item_collections">
        <p>Autor kolekcji:</p>
        <ul>
          <li><a href="https://thoro.pl/biscuit"><img src="https://thoro.pl/img/m/26-brand_default.jpg" alt="Biscuit" />
              <span>Biscuit</span></a></li>
        </ul>
      </div>
    </div>
    <div class="designers_list_item">
      <div class="designers_list_item_img_container">
        <img src="https://thoro.webo.design/img/cms/projektanci/Lukasz.png" alt="Łukasz Kwietniewski" width="375"
          height="375" />
      </div>
      <div class="designers_list_item_desc">
        <h3>Łukasz Kwietniewski</h3>
        <div class="designers_list_item_desc_inner">
          <p>Architekt wnętrz z międzynarodowym doświadczeniem. Mieszka i&nbsp;pracuje w Warszawie. Właściciel autorskiej
            pracowni. Wraz ze swoim zespołem realizuje projekty domów, apartamentów, biur a także ekskluzywnych butików.
          </p>
          <p>Jego projekty cechuje funkcjonalność, nowoczesność i&nbsp;dbałość o detal. Zamiłowanie do scenografii
            zainspirowało go do stworzenia projektów lamp, które wyróżnia nie tylko unikalny design, ale przede
            wszystkim możliwość stworzenia niepowtarzalnej atmosfery w każdym wnętrzu.</p>
          <p>A to wszystko z potrzeby kreowania piękna.</p>
        </div>
      </div>
      <div class="designers_list_item_collections">
        <p>Autor kolekcji:</p>
        <ul>
          <li><a href="https://thoro.pl/lehdet"><img src="https://thoro.pl/img/m/2-brand_default.jpg" alt="Lahdet" />
              <span>Lahdet</span></a></li>
          <li><a href="https://thoro.pl/kukkia"><img src="https://thoro.pl/img/m/3-brand_default.jpg" alt="Kukkia" />
              <span>Kukkia</span></a></li>
          <li><a href="https://thoro.pl/valo"><img src="https://thoro.pl/img/m/4-brand_default.jpg" alt="Valo" />
              <span>Valo</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="force-fullwidth hidden-md-up"><img src="https://thoro.pl/img/cms/form_img.png" alt="lampa"
    class="" /></div>
<div class="static-page_form_header force-fullwidth">
  <div class="container">
    <div class="content_header">
      <div>
        <p>POZNAJ KORZYŚCI WSPÓŁPRACY</p>
        <h2>Jesteś projektantem i jesteś zainteresowany współpracą z nami?</h2>
      </div>
    </div>
    <ul>
      <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
          <path
            d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
            stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg> Próbki oraz katalogi</li>
      <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
          <path
            d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
            stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg> Aplikacja Thoro</li>
      <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
          <path
            d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
            stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg> Dedykowany opiekun</li>
      <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
          <path
            d="M9.6 21.5999H14.4M10.2 9.5999H13.8M6 8.3999C6 5.08619 8.68629 2.3999 12 2.3999C15.3137 2.3999 18 5.08619 18 8.3999C18 10.8603 16.5191 12.874 14.4 13.7999V17.3999C14.4 18.0626 13.8627 18.5999 13.2 18.5999H10.8C10.1373 18.5999 9.6 18.0626 9.6 17.3999V13.9006C7.48091 12.9748 6 10.8603 6 8.3999Z"
            stroke="#484540" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg> Modele 3D</li>
    </ul>
  </div>
</div>