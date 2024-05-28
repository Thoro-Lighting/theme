{extends file=$layout}
{block name='content'}
  <section id="main">
    {block name='brand_header'}
    {if $sttheme.is_mobile_device}<div class="page_heading_box bg-top">
      <h1 class="page_heading">{l s='Collections' d='Shop.Theme.Transformer'} {l s='Thoro' d='Shop.Theme.Transformer'}</h1>
       <a href="/" class="back-category" title="{l s='Go to:' d='Shop.Theme.Transformer'} {l s='Home' d='Shop.Theme.Transformer'}"><i class="fto-angle-left"></i></a>
       </div>
    {/if}
    {/block}
     {hook h='displayBrandsText'}
  </section>
{/block}
