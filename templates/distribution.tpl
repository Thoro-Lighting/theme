{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
    {hook h='displayDistribution'}
    
	<div class="static-page_form_content force-fullwidth">
    <div class="container">
      <div class="static-page_col_left">
        <h3>{l s='Contact us and lets talk about cooperation opportunities' d='Shop.Theme.Global'}</h3>
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

{* template

  <div>
    <div class="dyst_banner">
      <div class="content_header container-prod-tab">
        <div>
          <h2>Dystrybucja</h2>
        </div>
      </div>
      <p>
        Prowadzimy sprzedaż naszych lamp na terenie całej Polski. Zapraszamy do
        współpracy architektów i dystrybutorów:
      </p>
    </div>

    <div class="dyst_tabs">
      <h2>Wybierz województwo</h2>

      <div class="dyst_tabs_titles">
        <ul>
          <li
            data-js-voivodeship-title-trigger="zachodnio-pomorskie"
            class="isActive"
          >
            Zachodnio-Pomorskie
          </li>
          <li data-js-voivodeship-title-trigger="pomorskie">Pomorskie</li>
          <li data-js-voivodeship-title-trigger="warminsko-mazurskie">
            Warmińsko-Mazurskie
          </li>
          <li data-js-voivodeship-title-trigger="podlaskie">Podlaskie</li>
          <li data-js-voivodeship-title-trigger="lubuskie">Lubuskie</li>
          <li data-js-voivodeship-title-trigger="wielkopolska">Wielkopolska</li>
          <li data-js-voivodeship-title-trigger="kujawsko-pomorskie">
            Kujawsko-pomorskie
          </li>
          <li data-js-voivodeship-title-trigger="mazowieckie">Mazowieckie</li>
          <li data-js-voivodeship-title-trigger="lubelskie">Lubelskie</li>
          <li data-js-voivodeship-title-trigger="dolnoslaskie">Dolnośląskie</li>
          <li data-js-voivodeship-title-trigger="lodzkie">Łódzkie</li>
          <li data-js-voivodeship-title-trigger="slaskie">Śląskie</li>
          <li data-js-voivodeship-title-trigger="malopolskie">Małopolskie</li>
          <li data-js-voivodeship-title-trigger="podkarpackie">Podkarpackie</li>
        </ul>
      </div>

      <div class="dyst_tab_content_wrapper">
        <div
          data-js-voivodeship-tab="zachodnio-pomorskie"
          class="dyst_tab_content isVisible"
        >
          <h2>Zachodnio-Pomorskie</h2>
          <ul>
            <li>
              <h3>LampexBis Anna Magdalena Jabłonowska</h3>
              <p>biuro@light4u.pl<br />ul. Welecka 39<br />72-006 Mierzyn</p>
              <span>tel.: 91 483 20 82</span>
            </li>
            <li>
              <h3>Tomix Sp. z o.o. Sp. k.</h3>
              <p>
                faktury@tomix.pl<br />ul. Leopolda Staffa 31<br />71-149
                Szczecin
              </p>
              <span>tel.: 91 483 20 82</span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="pomorskie"
          class="dyst_tab_content"
        >
          <h2>Pomorskie</h2>
          <ul>
            <li>
              <h3>Atria Sztuka Światła Dagmara Rostowska</h3>
              <p>biuro@light4u.pl<br />ul. Welecka 39<br />72-006 Mierzyn</p>
              <span>tel.: 91 483 20 82</span>
            </li>
            <li>
              <h3>Nabak Design Agnieszka Nabakowska</h3>
              <p>
                biuro@nabak.pl<br />ul. Żwirki 44/H4 lok. 11 <br />83-110 Tczew
              </p>
              <span>tel.: 533 717 718 </span>
            </li>
            <li>
              <h3>Jaśniej.com</h3>
              <p>
                jasniejcom@gmail.com<br />
                ul. Stanisława Wyspiańskiego 2<br />
                81-827 Gdańsk
              </p>
              <span>tel.: 583 800 077 </span>
            </li>
            <li>
              <h3>Pracownia Światła Mariusz Pacholski</h3>
              <p>
                biuro@light4u.pl
                <br />
                ul. Welecka 39
                <br />
                81-581 Gdynia
              </p>
              <span>tel.: 736 812 848</span>
            </li>
            <li>
              <h3>Deska Design</h3>
              <p>
                gdynia@deskadesign.pl
                <br />
                ul. Wielkopolska 268
                <br />
                81-531 Gdynia
              </p>
              <span>tel.: 507 211 611 </span>
            </li>
            <li>
              <h3>Deska Design</h3>
              <p>
                gdansk@deskadesign.pl
                <br />
                Al. Grunwaldzka 303
                <br />
                80-314 Gdańsk
              </p>
              <span>tel.: 501 506 678 </span>
            </li>
            <li>
              <h3>EUROSTANDARD KLAUZO Sp. k</h3>
              <p>
                justynawk.projekty@eurostandard.biz
                <br />
                Topole 20
                <br />
                89-620 Chojnice
              </p>
              <span>tel.: 501 506 678 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="warminsko-mazurskie"
          class="dyst_tab_content"
        >
          <h2>Warmińsko-Mazurskie</h2>
          <ul>
            <li>
              <h3>Perfekt Market Maciej Borkowski</h3>
              <p>
                sklep@perfektmarket.pl
                <br />ul. Augustowska 12 <br />10-683 Olsztyn
              </p>
              <span>tel.: 791 749 434 </span>
            </li>
            <li>
              <h3>MAX DESIGN S.C.</h3>
              <p>
                biuro@max-design.pl
                <br />ul. Ogólna 27 <br />82-300 Elbląg
              </p>
              <span>tel.: 604 307 478 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="podlaskie"
          class="dyst_tab_content"
        >
          <h2>Podlaskie</h2>
          <ul>
            <li>
              <h3>BTS Hurtownia Elektrotechniczna Szymańscy Sp.j.</h3>
              <p>
                sprzedaz@bts.lomza.pl
                <br />ul. Wojska Polskiego 53 <br />18-400 Łomża
              </p>
              <span>tel.: 606 654 333 </span>
            </li>
            <li>
              <h3>LUME Salon Oświetleniowy</h3>
              <p>
                handlowy@lume.pl
                <br />ul. Antoniukowska 54a/9 <br />15-845 Białystok
              </p>
              <span>tel.: 85 71 81 132 </span>
            </li>
            <li>
              <h3>Radosław Fiszer</h3>
              <p>
                biuro@ecrystal.pl
                <br />ul. Hetmańska 44 <br />15-727 Białystok
              </p>
              <span>tel.: 85 68 81 717 </span>
            </li>
            <li>
              <h3>Maxi Oświetlenie Szyłejko Sp. j.</h3>
              <p>
                biuro@maxi.bialystok.pl
                <br />ul. Handlowa 7 <br />15-399 Białystok
              </p>
              <span>tel.: 609 182 620 </span>
            </li>
            <li>
              <h3>ŚWIATŁO Mariusz Mnich</h3>
              <p>
                karolmnich@zapalswiatlo.com
                <br />ul. Ryska 1H <br />15-008 Białystok
              </p>
              <span>tel.: 519 596 048 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="lubuskie"
          class="dyst_tab_content"
        >
          <h2>Lubuskie</h2>
          <ul>
            <li>
              <h3>Novalamp Leszek Nowakowski</h3>
              <p>
                biuro@novalamp.pl<br />
                EUROCOMMERCE - Novalamp
                <br />ul. Dekoracyjna 3 <br />65-155 Zielona Góra
              </p>
              <span>tel.: 730 222 556 </span>
            </li>
            <li>
              <h3>"WOMAG" Sp. z o.o. Sp. k.</h3>
              <p>
                oswietlenie@womagmeble.pl
                <br />ul. Trasa Północna 3 <br />65-001 Zielona Góra
              </p>
              <span>tel.: 603 402 314 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="wielkopolska"
          class="dyst_tab_content"
        >
          <h2>Wielkopolska</h2>
          <ul>
            <li>
              <h3>P. H. ELEKTRO-DOM Julian Dominiak</h3>
              <p>
                chodziez@elektro-dom.eu
                <br />ul. Żeromskiego 14 <br />64-800 Chodzież
              </p>
              <span>tel.: 730 222 556 </span>
            </li>
            <li>
              <h3>VOLTA Sp. z o.o.</h3>
              <p>
                m.zawieja@voltahurt.pl
                <br />ul. Poznańska 200 <br />63-800 Gostyń
              </p>
              <span>tel.: 65 521 00 13 </span>
            </li>
            <li>
              <h3>VOLTA Sp. z o.o.</h3>
              <p>
                m.zawieja@voltahurt.pl
                <br />ul. Śniadeckich 9a <br />63-800 Leszno
              </p>
              <span>tel.: 65 547 69 00 </span>
            </li>
            <li>
              <h3>Przedsiębiorstwo Handlowe A-T S.A. w restrukturyzacji</h3>
              <p>
                faktury.zakupowe@at-krotoszyn.pl
                <br />ul. Rawicka 54 <br />63-700 Krotoszyn
              </p>
              <span>tel.: 62 721 36 00 </span>
            </li>
            <li>
              <h3>Paulina Pawlicka P.P.H.U. DEKOR</h3>
              <p>
                biuro@centrumcolorhouse.pl
                <br />ul. Wrocławska 21 <br />63-400 Ostrów Wielkopolski
              </p>
              <span>tel.: 731 070 612 </span>
            </li>
            <li>
              <h3>DEKORIDUM Małgorzata Osuch</h3>
              <p>
                biuro@biuro@dekoridum.pl
                <br />ul. Azaliowa 9/1 <br />63-004 Tulce
              </p>
              <span>tel.: 509 099 536 </span>
            </li>
            <li>
              <h3>Kebe Meble s.c.</h3>
              <p>
                kebe.meble@gmail.com
                <br />ul. Wrocławska 46 <br />62-800 Kalisz
              </p>
              <span>tel.: 577 261 361 </span>
            </li>
            <li>
              <h3>Firma Handlowa Keke.net Sylwia Żabierek</h3>
              <p>
                info@lampydeccor.pl
                <br />ul. Lipowa 16 <br />62-571 Konin Stare Miasto
              </p>
              <span>tel.: 502 080 139 </span>
            </li>
            <li>
              <h3>Koncept Beautiful Inside inż. Szymon Kamiński</h3>
              <p>
                konceptbeautifulinside@gmail.com

                <br />ul. Hiacyntowa 1/10-S <br />62-510 Konin
              </p>
              <span>tel.: 725 074 882 </span>
            </li>
            <li>
              <h3>ŁAZIENKAPLUS.PL S.A.</h3>
              <p>
                sklep@lazienkaplus.pl <br />ul. Składowa 17 <br />62-023 Żerniki
              </p>
              <span>tel.: 61 899 55 00 </span>
            </li>
            <li>
              <h3>LUXURY LIGHT Sylwia Melka</h3>
              <p>
                biuro@luxury-light.pl
                <br />ul. Lipowa 1 <br />60-529 Dąbrówka
              </p>
              <span>tel.: 535 772 775 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="kujawsko-pomorskie"
          class="dyst_tab_content"
        >
          <h2>Kujawsko-pomorskie</h2>
          <ul>
            <li>
              <h3>MDECO Kamil Janiszewski</h3>
              <p>
                sandra@mlamp.pl
                <br />ul. Wincentego Witosa 4 <br />87-800 Włocławek
              </p>
              <span>tel.: 500 131 557 </span>
            </li>
            <li>
              <h3>FIRMA "BEHRENDT" GRUPA SBS MARIAN BEHRENDT</h3>
              <p>
                projekty@behrendt.pl
                <br />ul. Batalionów Chłopskich <br />87-300 Brodnica
              </p>
              <span>tel.: 887 334 401 </span>
            </li>
            <li>
              <h3>P.H.U. Pudlex</h3>
              <p>
                pudlex@pudlex.home.pl
                <br />ul. Szosa Lubicka 12/LH1 <br />87-100 Toruń
              </p>
              <span>tel.: 566 238 595 </span>
            </li>
            <li>
              <h3>Parkiet Styl - Selecti Sp. z o.o. s. k.</h3>
              <p>
                selecti@selecti.pl
                <br />ul. Polna 100 <br />87-100 Toruń
              </p>
              <span>tel.: 533 356 660 </span>
            </li>
            <li>
              <h3>Meble Włoskie</h3>
              <p>
                gosia@meblewloskie.com.pl
                <br />ul. Szajnochy 9B <br />86-050 Bydgoszcz
              </p>
              <span>tel.: 509 692 279 </span>
            </li>
            <li>
              <h3>Astera</h3>
              <p>
                dok@astera.com.pl
                <br />ul. Inowrocławska 8 <br />85-153 Bydgoszcz
                <span>tel.: 52 340 42 24 </span>
              </p>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="mazowieckie"
          class="dyst_tab_content"
        >
          <h2>Mazowieckie</h2>
          <ul>
            <li>
              <h3>INTERNO S.C.K. Ofat-Wojcieszak, R. Tomczak</h3>
              <p>
                radom@meblo-sfera.pl
                <br />ul. Warszawska 197 <br />26-600 Radom
              </p>
              <span>tel.: 48 365 33 00 </span>
            </li>
            <li>
              <h3>ASAJ Sp. z o.o.</h3>
              <p>
                dokumenty.elektroniczne@asaj.pl
                <br />ul. K. Przerwy-Tetmajera 1 <br />08-110 Siedlce
              </p>
              <span>tel.: 25 644 72 88 </span>
            </li>
            <li>
              <h3>"M-3" A.J.Jackiewicz s.c</h3>
              <p>
                m3jackiewicz@op.pl
                <br />ul. Białostocka 8A <br />07-200 Wyszków
              </p>
              <span>tel.: 29 742 30 84 </span>
            </li>
            <li>
              <h3>Green Bridge Agnieszka Beata Andrych</h3>
              <p>
                aga@abazur.pl
                <br />ul. Geodetów 8 <br />07-200 Wyszków
              </p>
              <span>tel.: 510 056 712 </span>
            </li>
            <li>
              <h3>Joanna Osiecka ASYMETRIA STUDIO ŁAZIENEK</h3>
              <p>
                asymetria@op.pl
                <br />ul. Wójtostwo 15 <br />06-500 Mława
              </p>
              <span>tel.: 791 502 113 </span>
            </li>
            <li>
              <h3>Ostrowski Handel Internetowy Sp. z o.o.</h3>
              <p>
                sklep@otolampy.pl
                <br />ul. Bieniewicka 43 <br />05-870 Błonie
              </p>
              <span>tel.: 22 731 24 73 </span>
            </li>
            <li>
              <h3>Agnieszka Orszulak NEFRYT Pracownia Architektury i Wnętrz</h3>
              <p>
                lampiszon@lampiszon.pl
                <br />ul. Wincentego Witosa 4 <br />05-077 Warszawa
              </p>
              <span>tel.: 501 258 112 </span>
            </li>
            <li>
              <h3>Led Home Karolina Cichocka</h3>
              <p>
                sandra@mlamp.pl
                <br />biuro@led-home.pl <br />02-495 Warszawa
              </p>
              <span>tel.: 606 630 883 </span>
            </li>
            <li>
              <h3>eNKa Dawid Serwiak</h3>
              <p>
                sandra@mlamp.pl
                <br />dawid@light-light.pl <br />02-495 Warszawa
              </p>
              <span>tel.: 517 174 545 </span>
            </li>
            <li>
              <h3>Hommie Decor J. Kowalczyk K. Krześniak s.c.</h3>
              <p>
                biuro@hommiedecor.pl <br />ul. Adama Mickiewicza 37/58
                <br />01-625 Warszawa
              </p>
            </li>
            <li>
              <h3>Dekorian Home</h3>
              <p>
                warszawa@dekorian.pl
                <br />ul. Burakowska 5/7 <br />01-066 Warszawa
              </p>
              <span>tel.: 22 631 04 33 </span>
            </li>
            <li>
              <h3>MKAEL PAWEŁ KRANZ MICHAŁ LITWIN S.C.</h3>
              <p>
                michallitwin@kael.eu
                <br />ul. Marszałkowska 1/160 <br />00-624 Warszawa
              </p>
              <span>tel.: 698 454 481 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="lubelskie"
          class="dyst_tab_content"
        >
          <h2>Lubelskie</h2>
          <ul>
            <li>
              <h3>ARDANT Sp. z o.o.</h3>
              <p>
                sklep@ardant.pl
                <br />ul. Piłsudskiego 85 <br />24-100 Puławy
              </p>
              <span>tel.: 793 266 561 </span>
            </li>
            <li>
              <h3>Baza Wnętrz Sp. z o.o.</h3>
              <p>
                bazawnetrz@gmail.com
                <br />ul. Wesoła <br />23-400 Biłograj
              </p>
              <span>tel.: 607 353 818 </span>
            </li>
            <li>
              <h3>Black Red White S. A.</h3>
              <p>
                edokumenty@brw.eu
                <br />ul. Krzeszowska 63 <br />23-400 Biłograj
              </p>
              <span>tel.: 84 685 02 02 </span>
            </li>
            <li>
              <h3>LUX Anna Kraczkowska</h3>
              <p>
                sklep@luxardi.pl
                <br />ul. Tęczowa 5 <br />23-400 Biłograj
              </p>
              <span>tel.: 667 833 103 </span>
            </li>
            <li>
              <h3>Dragon Tech Ewa Dragan</h3>
              <p>
                dragontechewa@gmail.com
                <br />ul. Witolda Pileckiego 34/41 <br />21-500 Biała Podlaska
              </p>
              <span>tel.: 511 983 382 </span>
            </li>
            <li>
              <h3>Exito Anna Tomaszczuk</h3>
              <p>
                sklep@exitodesign.pl
                <br />ul. Sidorska 83a <br />21-500 Biała Podlaska
              </p>
              <span>tel.: 88 552 05 21 </span>
            </li>
            <li>
              <h3>UMILIGHT Kinga Niedźwiedź</h3>
              <p>
                biuro@umilight.pl
                <br />ul. Szewska 1/12 <br />20-410 Lublin
              </p>
              <span>tel.: 721 049 437 </span>
            </li>
            <li>
              <h3>ONELIGHT Michał Warząchowski</h3>
              <p>
                biuro@onelight.pl
                <br />ul. Łęczycka 3a <br />20-309 Lublin
              </p>
              <span>tel.: 724 736 678 </span>
            </li>
            <li>
              <h3>ALELAMPA Sp. z o.o</h3>
              <p>
                kontakt@alelampa.com.pl
                <br />ul. Fabryczna 2/1.12 <br />20-301 Lublin
              </p>
              <span>tel.: 512 262 728 </span>
            </li>
            <li>
              <h3>ELMAX Sp. z o.o.</h3>
              <p>
                e.oleszczuk@elmax.pl
                <br />ul. Fabryczna 2d <br />20-301 Lublin
              </p>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="dolnoslaskie"
          class="dyst_tab_content"
        >
          <h2>Dolnośląskie</h2>
          <ul>
            <li>
              <h3>LAMPY2 Marek Chudy</h3>
              <p>
                biuro@lampy2.pl
                <br />ul. Drobnera 38/5 <br />50-257 Wrocław
              </p>
              <span>tel.: 731 995 665 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="lodzkie"
          class="dyst_tab_content"
        >
          <h2>Łódzkie</h2>
          <ul>
            <li>
              <h3>Firma "Wnętrza" Alicja Galewska</h3>
              <p>
                wnetrza@interia.pl
                <br />ul. Zamoście 94 <br />97-400 Bełchatów
              </p>
              <span>tel.: 509 034 750 </span>
            </li>
            <li>
              <h3>Standart Sp. z o.o.</h3>
              <p>
                handlowy@standart.com.pl
                <br />ul. 1-go Maja 19 <br />95-100 Zgierz
              </p>
              <span>tel.: 42 716 32 38 </span>
            </li>
            <li>
              <h3>M-FORM Sp. z o.o.</h3>
              <p>
                kontakt@lajtit.pl
                <br />ul. Pabianicka 163/165 <br />93-490 Łódź
              </p>
              <span>tel.: 604 688 227 </span>
            </li>
            <li>
              <h3>Forma+Światło Joanna Leszczynowicz</h3>
              <p>
                biuro@formaswiatlo.pl
                <br />ul. Rokicińska 62 <br />92-302 Łódź
              </p>
              <span>tel.: 607 038 928 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="slaskie"
          class="dyst_tab_content"
        >
          <h2>Śląskie</h2>
          <ul>
            <li>
              <h3>ESPRESSO Sp. z o.o.</h3>
              <p>
                info@designd10.pl
                <br />ul. Ksawerego Dunikowskiego 10 <br />44-100 Gliwice
              </p>
              <span>tel.: 604 793 773 </span>
            </li>
            <li>
              <h3>Phenomena Light Rafał Bleichert</h3>
              <p>
                kontakt@phenomena-light.pl
                <br />ul. Chorzowska 44C <br />44-100 Gliwice
              </p>
              <span>tel.: 665 497 218 </span>
            </li>
            <li>
              <h3>Galeria Lamp Anna Tyrc</h3>
              <p>
                bielsko@galerialamp.com.pl
                <br />ul. Partyzantów 51 <br />43-300 Bielsko-Biała
              </p>
              <span>tel.: 695 745 304 </span>
            </li>
            <li>
              <h3>ANDERKO LIGHTING Marcin Anderko</h3>
              <p>
                biuro@anderko.pl
                <br />ul. Targiela 72A <br />43-100 Tychy
              </p>
              <span>tel.: 607 275 855 </span>
            </li>
            <li>
              <h3>ELMAX-HURT ŻYWICKI SP. J.</h3>
              <p>
                faktury@elmax-hurt.pl
                <br />ul. Oświęcimska 83 <br />43-100 Tychy
              </p>
              <span>tel.: 885 853 264 </span>
            </li>
            <li>
              <h3>StrefaDlaDomu Maciej Gliwa</h3>
              <p>
                maciej@gliwa.com.pl
                <br />ul. Różana 17 <br />43-100 Tychy
              </p>
              <span>tel.: 696 454 588 </span>
            </li>
            <li>
              <h3>CENTRUM ŚWIATŁA Sp. z.o.o Sp. k.</h3>
              <p>
                biuro@centrumswiatla.com.pl
                <br />ul. Tartakowa 15/21 <br />42-202 Częstochowa
              </p>
              <span>tel.: 887 220 071 </span>
            </li>
            <li>
              <h3>ECOMMERCITY Sp. z o.o</h3>
              <p>
                biuro@blowupdesign.pl
                <br />Aleja Wojciecha Korfantego 191C <br />40-153 Katowice
              </p>
              <span>tel.: 666 669 559 </span>
            </li>
            <li>
              <h3>Lights4you Karol Baran</h3>
              <p>
                k.baran@lights4you.pl
                <br />ul. Marii Skłodowskiej-Curie 22 <br />40-058 Katowice
              </p>
              <span>tel.: 692 004 729 </span>
            </li>
            <li>
              <h3>STYLOWY KWADRAT Sp. z o.o.</h3>
              <p>
                info@stylowy-kwadrat.pl
                <br />ul. Henryka Dąbrowskiego 13/1 <br />40-032 Katowice
              </p>
              <span>tel.: 530 375 044 </span>
            </li>
            <li>
              <h3>MAX-FLIZ</h3>
              <p>
                robert.bielanin@max-fliz.pl
                <br />Al. Roździeńskiego 191 <br />40-314 Katowice
              </p>
              <span>tel.: 512 138 292 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="malopolskie"
          class="dyst_tab_content"
        >
          <h2>Małopolskie</h2>
          <ul>
            <li>
              <h3>P.H. "Amper" Sp. j.</h3>
              <p>
                iwona.m@amperns.pl
                <br />ul. Paderewskiego 39 <br />33-300 Nowy Sącz
              </p>
              <span>tel.: 18 441 52 40 </span>
            </li>
            <li>
              <h3>DESIGN AG Anna Guenther</h3>
              <p>
                partner@sfmeble.pl
                <br />ul. Jurajskie Wzgórze 14 <br />32-087 Bibice
              </p>
              <span>tel.: 12 384 87 48 </span>
            </li>
            <li>
              <h3>LUX HOME Sp. z o.o. Sp. k.</h3>
              <p>
                grzegorz.krawczyk@ceramcity.pl
                <br />ul. Zakopiańska 56A <br />30-418 Kraków
              </p>
              <span>tel.: 604 150 852 </span>
            </li>
            <li>
              <h3>Lean Logics Sp. z o.o.</h3>
              <p>
                shop@lunares.pl
                <br />ul. Samuela B. Lindego 1C <br />30-148 Kraków
              </p>
              <span>tel.: 515 574 581 </span>
            </li>
            <li>
              <h3>DESIGN AG Anna Guenther</h3>
              <p>
                partner@sfmeble.pl
                <br />ul. Jurajskie Wzgórze 14 <br />32-087 Bibice
              </p>
              <span>tel.: 12 384 87 48 </span>
            </li>
            <li>
              <h3>LUX HOME Sp. z o.o. Sp. k.</h3>
              <p>
                grzegorz.krawczyk@ceramcity.pl
                <br />ul. Zakopiańska 56A <br />30-418 Kraków
              </p>
              <span>tel.: 604 150 852 </span>
            </li>
            <li>
              <h3>Lean Logics Sp. z o.o.</h3>
              <p>
                shop@lunares.pl
                <br />ul. Samuela B. Lindego 1C <br />30-148 Kraków
              </p>
              <span>tel.: 515 574 581 </span>
            </li>
          </ul>
        </div>
        <div
          data-js-voivodeship-tab="podkarpackie"
          class="dyst_tab_content"
        >
          <h2>Podkarpackie</h2>
          <ul>
            <li>
              <h3>Pec Sp. z o.o.</h3>
              <p>
                sklep@bizpack.pl
                <br />ul. Nowa 46 <br />39-300 Mielec
              </p>
              <span>tel.: 605 737 500 </span>
            </li>
            <li>
              <h3>Firma Handlowo-Usługowa EssO Wenancjusz Matysek</h3>
              <p>
                esso.sklep@onet.pl
                <br />ul. Graniczna 41 <br />39-200 Dębica
              </p>
              <span>tel.: 517 416 168 </span>
            </li>
            <li>
              <h3>ILOVE.LIGHTING Jarosław Rewak</h3>
              <p>
                swietliscie@gmail.com
                <br />ul. Langiewicza 1/45 <br />38-500 Sanok
              </p>
              <span>tel.: 730 745 818 </span>
            </li>
            <li>
              <h3>Ebmeble Barbara Tudor-Nita</h3>
              <p>
                sklep@ebmeble.pl
                <br />ul. Sienkiewicza 27 <br />37-400 Nisko
              </p>
              <span>tel.: 515 574 581 </span>
            </li>
            <li>
              <h3>SZYMART Babiarz Stecko Sroczyk s.c.</h3>
              <p>
                biuro@szymart.com.pl
                <br />ul. Leopolda Lisa Kuli 7/4 <br />37-100 Łańcut
              </p>
              <span>tel.: 603 850 367 </span>
            </li>
            <li>
              <h3>SMD LED Sp. z o.o.</h3>
              <p>
                salon@smdled.pl
                <br />ul. Torowa 2 <br />35-205 Rzeszów
              </p>
              <span>tel.: 506 274 586 </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="force-fullwidth hidden-md-up"><img src="https://thoro.pl/img/cms/form_img.png" alt="lampa" class=""></div>
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