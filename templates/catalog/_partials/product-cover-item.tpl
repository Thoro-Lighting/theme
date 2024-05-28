<div class="swiper-slide{if $image.drawing} drawing{/if}">
                <div class="easyzoom--overlay {if $sttheme.enable_zoom} easyzoom {/if} {if $sttheme.enable_zoom==2} disable_easyzoom_on_mobile {/if}">
                    <a href="{if $sttheme.enable_zoom==1 || ($sttheme.enable_zoom==2 && !$sttheme.is_mobile_device) || $sttheme.enable_thickbox}{$image.bySize.superlarge_default.url}{else}javascript:;{/if}" class="{if $sttheme.enable_thickbox} st_popup_image st_pro_popup_image {/if} {if $sttheme.retina && isset($image.bySize.superlarge_default_2x.url)} replace-2x {/if}" {if $sttheme.enable_thickbox} data-group="pro_gallery_popup" {/if} title="{if $image.legend}{$image.legend}{else}{$product.name}{/if} - {$image.id_image}">
                        <img
                          class="pro_gallery_item {if !$sttheme.is_ajax && !$sttheme.lazyload_main_gallery}swiper-lazy{/if}"
                          {if !$sttheme.is_ajax && !$sttheme.lazyload_main_gallery}data-{/if}src="{$image.bySize.{$sttheme.gallery_image_type}.url}"
                          {if $sttheme.retina && isset($image.bySize.{$sttheme.gallery_image_type|cat:'_2x'}.url)} {if !$sttheme.is_ajax && !$sttheme.lazyload_main_gallery}data-{/if}srcset="{$image.bySize.{$sttheme.gallery_image_type|cat:'_2x'}.url} 2x" {/if}
                          alt="{if $image.legend}{$image.legend}{else}{$product.name}{/if} - {$image.id_image}"
                          width="{$image.bySize.{$sttheme.gallery_image_type}.width}"
                          height="{$image.bySize.{$sttheme.gallery_image_type}.height}"
                          data-id_image="{$image.id_image}"
                          {if $sttheme.google_rich_snippets} itemprop="image" content="{$image.bySize.{$sttheme.gallery_image_type}.url}" {/if}
                        />
                    </a>
                </div>
</div>