{if is_array($st_paa.attrs)}
	<div class="variant-box sticky_off mb-3">
		{foreach $st_paa.attrs as $attr}
		<div class="variant-box-padding">
			<span class="control-label">{$attr.group_name}</span>
			{if $attr.slider}
				<div class="swiper-container variants_plus variant_{$attr.id_st_pro_as_attr}">
					<div class="swiper-wrapper">
						{foreach $attr.products as $pro}
							<div class="swiper-slide {if $pro.short_name OR $attr.features_name}variants-name{/if}">
								<a href="{$pro.url}" data-id-product="{$pro.id_product}" class="variants_plus_pro {if $pro.active} variants_plus_pro_active {/if}" title="{$pro.name}">
									{if $pro.short_name}
										{$pro.short_name}
									{else}
										{if $attr.features_name}
											{if $pro.feature_value}{$pro.feature_value}{else}{$pro.name}{/if}
										{else}
											<img decoding="async" src="{$pro.cover}" alt="{$pro.name}" width="100" height="100">
										{/if}
									{/if}
								</a>
							</div>
						{/foreach}
					</div>
				<div class="swiper-button-prev button-sub"><i class="fto-angle-left"></i></div>
			    <div class="swiper-button-next button-sub"><i class="fto-angle-right"></i></div>
			    </div>
			    <script>
			            //<![CDATA[
			                if(typeof(swiper_options) ==='undefined') var swiper_options = [];
			                swiper_options.push({
			                    speed: 400,
			                    loop: false,
			                    slidesPerView: 'auto',
			                    spaceBetween: 10,
			                    nextButton: '.variant_{$attr.id_st_pro_as_attr} .swiper-button-next',
			                    prevButton: '.variant_{$attr.id_st_pro_as_attr} .swiper-button-prev',
			                    id_st: '.variant_{$attr.id_st_pro_as_attr}'
			                });
		            //]]>
		    	</script>
			{else}
				<div class="variants_plus box-cons">
					<ul class="clearfix row">
						{foreach $attr.products as $pro}
							<li class="{if $pro.short_name OR $attr.features_name}variants-name{else}col-fw-2 col-xxl-2 col-xl-3 col-lg-3 col-md-1 col-sm-2 col-3{/if}">
								<a href="{$pro.url}" data-id-product="{$pro.id_product}" class="variants_plus_pro {if $pro.active} variants_plus_pro_active {/if} {if $pro.short_name OR $attr.features_name}variants-link{/if}" title="{$pro.name}">
									{if $pro.short_name}
										{$pro.short_name}
									{else}
										{if $attr.features_name}
											{if $pro.feature_value}{$pro.feature_value}{else}{$pro.name}{/if}
										{else}
											<img decoding="async" src="{$pro.cover}" alt="{$pro.name}" width="100" height="100">
										{/if}
									{/if}
									
								</a>
							</li>
						{/foreach}
					</ul>
				</div>
			{/if}
			</div>
		{/foreach}
	</div>
{/if}