{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
    {hook h='displayDistribution'}
    <div class="form-contact">
        {hook h='displayAskAboutProduct'}
    </div>
{/block}

{* template
<div>
<p>Strona Głowna > Dystrybucja</p>
<div class="dyst_banner">
  <h1>Dystrybucja</h1>
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
        data-js-wojewodztwo-title-trigger="zachodnio-pomorskie"
        class="isActive"
      >
        Zachodnio-Pomorskie
      </li>
      <li data-js-wojewodztwo-title-trigger="pomorskie">Pomorskie</li>
      <li data-js-wojewodztwo-title-trigger="warminsko-mazurskie">
        Warmińsko-Mazurskie
      </li>
    </ul>
  </div>

  <div class="dyst_tab_content_wrapper">
    <div
      data-js-wojewodztwo-tab="zachodnio-pomorskie"
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
        <li>
          <h3>Tomix Sp. z o.o. Sp. k.</h3>
          <p>
            faktury@tomix.pl<br />ul. Leopolda Staffa 31<br />71-149
            Szczecin
          </p>
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
      data-js-wojewodztwo-tab="pomorskie"
      class="dyst_tab_content"
    >
      <h2>Pomorskie</h2>
      <ul>
        <li>
          <h3>Atria Sztuka Światła Dagmara Rostowska</h3>
          <p>biuro@light4u.pl<br />ul. Welecka 39<br />72-006 Mierzyn</p>
          <span>tel.: 91 483 20 82</span>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="dyst_form">
  <span>poznaj korzyści współpracy</span>
  <h2>Twój projekt zasługuje na najwyższą jakość obsługi.</h2>
</div>
</div> *}