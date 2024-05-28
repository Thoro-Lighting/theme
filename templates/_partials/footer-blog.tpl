{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}

{assign var='blog_width_footer_stacked' value=Configuration::get('ST_BLOG_BLOG_WIDTH_FOOTER_STACKED')}
{assign var='blog_footer_stacked_one' value=Configuration::get('ST_BLOG_BLOG_FOOTER_STACKED_ONE')}
{assign var='blog_footer_stacked_two' value=Configuration::get('ST_BLOG_BLOG_FOOTER_STACKED_TWO')}
{assign var='blog_footer_stacked_three' value=Configuration::get('ST_BLOG_BLOG_FOOTER_STACKED_THREE')}
{assign var='blog_footer_stacked_four' value=Configuration::get('ST_BLOG_BLOG_FOOTER_STACKED_FOUR')}
{assign var='blog_footer_stacked_five' value=Configuration::get('ST_BLOG_BLOG_FOOTER_STACKED_FIVE')}
{assign var='blog_footer_stacked_six' value=Configuration::get('ST_BLOG_BLOG_FOOTER_STACKED_SIX')}
{assign var='blog_footer_show' value=Configuration::get('ST_BLOG_BLOG_FOOTER_SHOW')}
{assign var='blog_footer_show_after' value=Configuration::get('ST_BLOG_BLOG_FOOTER_SHOW_AFTER')}
{assign var='blog_footer_top_width' value=Configuration::get('ST_BLOG_BLOG_FOOTER_TOP_WIDTH')}
{assign var='blog_footer_middle_width' value=Configuration::get('ST_BLOG_BLOG_FOOTER_MIDDLE_WIDTH')}
{assign var='blog_footer_bottom_width' value=Configuration::get('ST_BLOG_BLOG_FOOTER_BOTTOM_WIDTH')}
{assign var='blog_footer_stacked_width' value=Configuration::get('ST_BLOG_BLOG_FOOTER_STACKED_WIDTH')}
{assign var='blog_footer_stacked_zone' value=Configuration::get('ST_BLOG_BLOG_FOOTER_STACKED_ZONE')}
{assign var='blog_footer_author' value=Configuration::get('ST_BLOG_BLOG_FOOTER_AUTHOR')}


<footer id="footer" class="footer-container footer_normal footer-blog">


    {if $blog_footer_author && $id_category_author}
    {block name='hook_footer_blog_autor'}
     <section id="footer-blog-autor">
		<div class="wide_container">
            {hook h="displayFooterBlogAutor"}
        </div>
    </section>
    {/block}
    {/if}
        
    {block name='hook_footer_top_blog_stacked'}
    {capture name="displayFooterTopBlogStacked_1"}{hook h="displayFooterTopBlogStacked_1"}{/capture}
    {capture name="displayFooterTopBlogStacked_2"}{hook h="displayFooterTopBlogStacked_2"}{/capture}
    {if $smarty.capture.displayFooterTopBlogStacked_1|trim || $smarty.capture.displayFooterTopBlogStacked_2|trim}
    <section id="footer-top-blog-stacked">
		<div class="{if $blog_footer_stacked_width == 0}wide_container{/if}">
			<div class="{if $blog_footer_stacked_width == 0}container{else}container-fluid{/if} style_footer_blog_stacked">
                <div class="row">
				    <div id="stacked_footer_blog_column_1" class="col-lg-{$blog_footer_stacked_zone|replace:'.':'-'}">{$smarty.capture.displayFooterTopBlogStacked_1 nofilter}</div>
				    <div id="stacked_footer_blog_column_1" class="col-lg-{12-$blog_footer_stacked_zone|replace:'.':'-'}">{$smarty.capture.displayFooterTopBlogStacked_2 nofilter}</div>
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
    
    
    {block name='hook_footer_top_blog'}
    {capture name="displayFooterTopBlog"}{hook h="displayFooterTopBlog"}{/capture}
    {if $smarty.capture.displayFooterTopBlog|trim}
    <section id="footer-top-blog">
		<div class="{if $blog_footer_top_width == 0}wide_container{/if}">
			<div class="{if $blog_footer_top_width == 0}container{else}container-fluid{/if} style_footer_top_blog">
                <div class="row footer_first_level_row">
				    {$smarty.capture.displayFooterTopBlog nofilter}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
        
        
    {block name='hook_stacked_footer'}
   {if ($HOOK_STACKED_FOOTER_1|trim && $blog_footer_stacked_one == 1) || ($HOOK_STACKED_FOOTER_2|trim && $blog_footer_stacked_two == 1) || ($HOOK_STACKED_FOOTER_3|trim && $blog_footer_stacked_three == 1) || ($HOOK_STACKED_FOOTER_4|trim && $blog_footer_stacked_four == 1) || ($HOOK_STACKED_FOOTER_5|trim && $blog_footer_stacked_five == 1) || ($HOOK_STACKED_FOOTER_6|trim && $blog_footer_stacked_six == 1)} <section id="footer-primary">
		<div class="{if $blog_width_footer_stacked == 0}wide_container{/if}">
            <div class="{if $blog_width_footer_stacked == 0}container{else}container-fluid{/if}">
                <div class="row footer_first_level_row">
                    {if $sttheme.stacked_footer_column_1 && $blog_footer_stacked_one == 1}<div id="stacked_footer_column_1" class="col-lg-{$sttheme.stacked_footer_column_1|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_1 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_2 && $blog_footer_stacked_two == 1}<div id="stacked_footer_column_2" class="col-lg-{$sttheme.stacked_footer_column_2|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_2 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_3 && $blog_footer_stacked_three == 1}<div id="stacked_footer_column_3" class="col-lg-{$sttheme.stacked_footer_column_3|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_3 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_4 && $blog_footer_stacked_four == 1}<div id="stacked_footer_column_4" class="col-lg-{$sttheme.stacked_footer_column_4|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_4 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_5 && $blog_footer_stacked_five == 1}<div id="stacked_footer_column_5" class="col-lg-{$sttheme.stacked_footer_column_5|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_5 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_6 && $blog_footer_stacked_six == 1}<div id="stacked_footer_column_6" class="col-lg-{$sttheme.stacked_footer_column_6|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_6 nofilter}</div>{/if}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
    
    
        
    
    {block name='hook_footer_middle_blog'}
    {capture name="displayFooterMiddleBlog"}{hook h="displayFooterMiddleBlog"}{/capture}
    {if $smarty.capture.displayFooterMiddleBlog|trim}
    <section id="footer-middle-blog">
		<div class="{if $blog_footer_middle_width == 0}wide_container{/if}">
			<div class="{if $blog_footer_middle_width == 0}container{else}container-fluid{/if} style_footer_middle_blog">
                <div class="row footer_first_level_row">
				    {$smarty.capture.displayFooterMiddleBlog nofilter}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
    
    {block name='hook_footer_bottom_blog'}
    {capture name="displayFooterBottomBlog"}{hook h="displayFooterBottomBlog"}{/capture}
    {if $smarty.capture.displayFooterBottomBlog|trim}
    <section id="footer-bottom-blog">
		<div class="{if $blog_footer_bottom_width == 0}wide_container{/if}">
			<div class="{if $blog_footer_bottom_width == 0}container{else}container-fluid{/if} style_footer_bottom_blog">
                <div class="row footer_first_level_row">
				    {$smarty.capture.displayFooterBottomBlog nofilter}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
    
   
    {block name='hook_footer'}
    {capture name="displayFooter"}{hook h="displayFooter"}{/capture}
    {if $smarty.capture.displayFooter|trim && $blog_footer_show == 1}
    <section id="footer-secondary">
		<div class="{if $blog_width_footer == 0}wide_container{/if}">
			<div class="{if $blog_width_footer == 0}container{else}container-fluid{/if}">
                <div class="row footer_first_level_row">
				    {$smarty.capture.displayFooter nofilter}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
    {block name='hook_footer_after'}
    {capture name="displayFooterAfter"}{hook h="displayFooterAfter"}{/capture}
    {if $smarty.capture.displayFooterAfter|trim && $blog_footer_show_after == 1}
    <section id="footer-tertiary">
		<div class="{if $blog_width_footer == 0}wide_container{/if}">
			<div class="{if $blog_width_footer == 0}container{else}container-fluid{/if}">
                <div class="row footer_first_level_row">
                	{$smarty.capture.displayFooterAfter nofilter}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}

    {include file='_partials/footer-bottom.tpl'}
</footer>