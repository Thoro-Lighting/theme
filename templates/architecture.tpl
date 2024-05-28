{extends file='page.tpl'}
{block name='page_header_container'}{/block}
{block name='page_content'}
   {hook h='displayArchitecture'}
   <div class="architecture-contact">
   {hook h='displayAskAboutProduct'}
    </div>
   <div class="arch-bottom">{hook h='displayArchitectureBottom'}</div>
{/block}
