<script type="text/javascript">
// <![CDATA[
{literal}
blog_flexslider_options = {
	{/literal}
    autoPlay : {if $ss_slideshow}{$ss_s_speed|default:5000}{else}false{/if},
    slideSpeed: {if !$ss_a_speed}0{else}{$ss_a_speed}{/if},
    stopOnHover: {if $ss_pause}true{else}false{/if},
    {literal}
};
{/literal}//]]>
</script>
