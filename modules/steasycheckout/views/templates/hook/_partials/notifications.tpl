{if $step_errors}
<article class="alert alert-warning steco-warning" role="alert" data-alert="warning">
  <ul class="m-b-0">
    {foreach $step_errors as $notif}
      <li>{$notif nofilter}</li>
    {/foreach}
  </ul>
</article>
{/if}