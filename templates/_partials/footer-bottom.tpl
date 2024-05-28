{capture name="displayFooterBottomLeft"}{hook h="displayFooterBottomLeft"}{/capture}
{capture name="displayFooterBottomRight"}{hook h="displayFooterBottomRight"}{/capture}
    {if $smarty.capture.displayFooterBottomLeft|trim
    || $smarty.capture.displayFooterBottomRight|trim}
    <div id="footer-bottom" class="{if $sttheme.f_info_center} footer_bottom_center {/if}">
        <div class="wide_container">
            <div class="container">
                <div class="row">
                      <aside id="footer_bottom_left" class="col-lg-9">
                        	{$smarty.capture.displayFooterBottomLeft nofilter} 
    					</aside> 
    					
    					<aside id="footer_bottom_right" class="col-lg-3">
                        	{$smarty.capture.displayFooterBottomRight nofilter}
    					</aside> 
                    	
                      
                </div>
            </div>
        </div>
    </div>
    {/if}
    
    