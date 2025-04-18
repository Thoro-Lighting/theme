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
        <img
        src="https://thoro.webo.design/img/cms/dystr_form_img.png"
        alt="lampa"
        />
      </div>
    </div>
  </div>
{/block}