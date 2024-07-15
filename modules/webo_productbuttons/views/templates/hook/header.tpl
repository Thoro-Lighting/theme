{if !empty($three_dimensional)}
    {literal}

<style>body #arlity-card-container #arlity-card-modal{z-index:100;}</style>


<script src="https://thoro.cloud.arlity.com/viewer/embed/js/Viewer.min.js" defer type="module"></script>
 <script>
  var ARLITY_VIEWER_PRODUCT_UUID = '{/literal}{$three_dimensional}{literal}';
  var ARLITY_VIEWER_AUTOLOAD = 'no';
 </script>
 <style>
  button[data-toggle="arlity-viewer-open-modal"] {
   background-image: linear-gradient(45deg, #4f499b, #a6428f);
   border-width: 0;
   color: #FFF;
   border-radius: 4px;
   padding: 10px 16px 6px 16px;
   cursor: pointer;
   font-size: 16px;
   font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    margin: 0 !important;
  }
  button[data-toggle="arlity-viewer-open-modal"]:hover {
   background-image: linear-gradient(45deg, #a6428f, #a6428f);
  }
  #arlity-viewer-namespace{z-index: 1000;}
 </style>
    {/literal}

{/if}

{if !empty($ar)}
    {literal}
        <script src="https://thoro.cloud.arlity.com/mobile/embed/js/Card.min.js" defer type="module"></script>
        <script>
            var ARLITY_CARD_PRODUCT_UUID = '{/literal}{$ar}{literal}';
            var ARLITY_CARD_AUTOLOAD = 'no';
        </script>
<style>body #arlity-card-container #arlity-card-modal{z-index:100;}</style>
    {/literal}
{/if}
