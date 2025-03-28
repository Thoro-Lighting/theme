{extends file='page.tpl'}

	{block name='breadcrumb'}
	{/block}
    {block name='page_content_container'}
      <section id="content" class="page-home">
        {block name='page_content_top'}{/block}
        {block name='page_content'}

          {hook h="displayHomeTop"}

          {block name='hook_home'}
            {$HOOK_HOME nofilter}
          {/block}

          {capture name="displayHomeRight"}{hook h="displayHomeRight"}{/capture}
          {capture name="displayHomeLeft"}{hook h="displayHomeLeft"}{/capture}
         
          {if $smarty.capture.displayHomeRight || $smarty.capture.displayHomeLeft}
            <div id="home_secondary_row" class="row">
              <div id="home_secondary_left">
                {$smarty.capture.displayHomeLeft nofilter}
              </div>
              <div id="home_secondary_right">
                {$smarty.capture.displayHomeRight nofilter}
              </div>
            </div>
          {/if}
          
          {hook h="displayHomeBottom"}

        {/block}
      </section>
    {/block}
