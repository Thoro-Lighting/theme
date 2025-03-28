{capture name="displayFooterBottomLeft"}{hook h="displayFooterBottomLeft"}{/capture}
{capture name="displayFooterBottomRight"}{hook h="displayFooterBottomRight"}{/capture}
    {if $smarty.capture.displayFooterBottomLeft|trim
    || $smarty.capture.displayFooterBottomRight|trim}
    <div id="footer-bottom" class="{if $sttheme.f_info_center} footer_bottom_center {/if}">
        <div class="wide_container">
            <div class="container">
                <div class="row">
                      <aside id="footer_bottom_left" class="col-lg-6">
                        <svg class="footer-logo" width="329" height="75" viewBox="0 0 329 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M200.906 72.4406V1.64062H227.645C241.514 1.64062 250.055 9.9247 250.055 22.8324C250.055 33.8137 244.269 41.3271 233.615 43.35L253.546 72.4406H238.85L219.93 43.8316H213.397V72.4406H200.906ZM213.397 32.2724H227.186C233.891 32.2724 237.564 28.4194 237.564 22.8324C237.564 17.3418 233.891 13.3924 227.278 13.3924H213.397V32.2724Z" fill="#FBFAF8"/>
                            <path d="M60.0898 1.64062H72.5809V27.1792H99.1933V1.64062H111.684V72.4406H99.1933V38.7383H72.5809V72.4406H60.0898V1.64062Z" fill="#FBFAF8"/>
                            <path d="M0.5 1.64209H49.3162V13.7792H31.2455V72.442H18.7544V13.7792H0.5V1.64209Z" fill="#FBFAF8"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M155.866 74.0748C175.369 74.0748 191.18 57.4926 191.18 37.0374C191.18 16.5822 175.369 0 155.866 0C136.362 0 120.551 16.5822 120.551 37.0374C120.551 57.4926 136.362 74.0748 155.866 74.0748ZM155.862 62.2587C169.144 62.2587 179.911 50.9667 179.911 37.0372C179.911 23.1078 169.144 11.8158 155.862 11.8158C142.581 11.8158 131.814 23.1078 131.814 37.0372C131.814 50.9667 142.581 62.2587 155.862 62.2587Z" fill="#FBFAF8"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M293.184 74.0748C312.688 74.0748 328.499 57.4926 328.499 37.0374C328.499 16.5822 312.688 0 293.184 0C273.68 0 257.869 16.5822 257.869 37.0374C257.869 57.4926 273.68 74.0748 293.184 74.0748ZM293.181 62.2587C306.462 62.2587 317.229 50.9667 317.229 37.0372C317.229 23.1078 306.462 11.8158 293.181 11.8158C279.899 11.8158 269.132 23.1078 269.132 37.0372C269.132 50.9667 279.899 62.2587 293.181 62.2587Z" fill="#FBFAF8"/>
                        </svg>

                        	{$smarty.capture.displayFooterBottomLeft nofilter} 
    					</aside> 
    					
    					<aside id="footer_bottom_right" class="col-lg-6">
                        	{$smarty.capture.displayFooterBottomRight nofilter}
    					</aside> 
                    	
                      
                </div>
            </div>
        </div>
    </div>
    {/if}
    
    