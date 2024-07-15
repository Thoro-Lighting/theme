<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class StBlogSliderClass extends ObjectModel
{
	/** @var integer reinsurance id*/
	public $id;
	
    /** @var integer */
	public $type;
    
    /** @var integer */
	public $subtype;
    
	/** @var integer */
	public $id_shop;
    
	/** @var integer */
	public $id_st_blog_category;
	/** @var integer*/
	public $active;
	
	/** @var integer */
	public $position;
	
	   
	/** @var integer */
	public $display_on;
    /** @var string */
    public $top_margin; 
    /** @var string */
    public $bottom_margin; 
    /** @var string */
    public $top_margin_mobile; 
    /** @var string */
    public $bottom_margin_mobile; 

  	public $top_padding;
  	public $bottom_padding;
  	public $top_padding_mobile;
  	public $bottom_padding_mobile;
  	public $bg_pattern;
  	public $bg_img;
  	public $bg_color;
    public $speed;
  	public $bg_img_v_offset;
  	public $title_color;
  	public $subtitle_color;
  	public $title_hover_color;
  	public $text_color;
  	public $price_color;
  	public $grid_bg;
    public $grid_hover_bg;
  	public $link_hover_color;
  	public $direction_color;
  	public $direction_color_hover;
  	public $direction_color_disabled;
  	public $direction_bg;
  	public $direction_hover_bg;
  	public $direction_disabled_bg;
  	public $title_align;
  	public $title_font_size;
  	public $subtitle_font_size;
  	public $direction_nav;
    public $hide_direction_nav_on_mob;
  	public $control_nav;
    public $hide_control_nav_on_mob;
    public $pag_nav_bg;
    public $pag_nav_bg_hover;
    public $title_bottom_border;
    public $title_bottom_border_color;
    public $title_bottom_border_color_h;
    public $text_alignment_in_box;
    
    public $grid;
    public $random;
	public $nbr;
	public $soby;
    public $spacing_between;
    public $image_type;
    public $slideshow;
    public $s_speed;
    public $a_speed;
    public $pause_on_hover;
    public $rewind_nav;
    public $lazy;
    public $move;
    public $hide_mob;
    public $display_sd;
    public $countdown_on;
    public $aw_display;
    
    public $display_pro_col;
    public $nbr_col;
    public $soby_col;
    public $items_col;
    public $slideshow_col;
    public $s_speed_col;
    public $a_speed_col;
    public $pause_on_hover_col;
    public $rewind_nav_col;
    public $lazy_col;
    public $move_col;
    public $hide_mob_col;
    // public $countdown_on_col;
    public $aw_display_col;
    
    public $nbr_fot;
    public $soby_fot;
    public $aw_display_fot;
    public $hide_mob_fot;
    public $footer_wide;
    
  	public $pro_per_fw;
  	public $pro_per_xxl;
  	public $pro_per_xl;
  	public $pro_per_lg;
  	public $pro_per_md;
  	public $pro_per_sm;
  	public $pro_per_xs;

    /** @var string */
    public $video_poster;
    /** @var integer */
    public $video_v_offset;
    /** @var string */
    public $video_mpfour;
    /** @var string */
    public $video_webm;
    /** @var string */
    public $video_ogg;
    /** @var boolen */  
    public $video_loop;
    /** @var boolen */
    public $video_muted;
    /** @var boolen */
    public $view_more;
    
    /** @var integer */
	public $length_of_name;
	/** @var integer */
	public $display_viewcount;
	/** @var integer */
	public $display_comment_count;
	/** @var integer */
	public $display_autho;
	/** @var integer */
	public $display_date;
	/** @var integer */
	public $display_read_more;
	/** @var integer */
	public $display_loved;
	/** @var integer */
	public $display_image;
	/** @var integer */
	public $items_img;
	/** @var integer */
	public $img_text;
	/** @var integer */
	public $home_blog_grid_bg;
	/** @var integer */
	public $items_img_padding;
	/** @var integer */
	public $items_text_padding;
	/** @var integer */
	public $display_date_pos;
	/** @var integer */
	public $display_date_icon;
	/** @var integer */
	public $length_of_name_value;
	/** @var integer */
	public $length_desc_article;
	/** @var integer */
	public $items_img_padding_h;
	/** @var integer */
	public $items_text_padding_h;
	/** @var integer */
	public $home_blog_grid_bg_img;
	/** @var integer */
	public $home_blog_grid_bg_text;
	/** @var integer */
	public $home_blog_grid_bg_text_hover;

	public $title;
    public $subtitle;

    /** @var integer */
    public $position_buttons;
    /** @var string */
    public $left_padding; 
    /** @var string */
    public $right_padding;
    /** @var string */
    public $display_text_on_image;
    /** @var integer */
    public $text_image_max_width;
    /** @var integer */
    public $text_image_max_alignment;
    /** @var integer */
    public $text_alignment_ver;
    /** @var integer */
    public $text_alignment_hor;
    /** @var integer */
    public $text_alignment_margin_external;
    /** @var integer */
    public $text_alignment_margin_external_m;
    /** @var integer */
    public $text_image_max_color; 
    /** @var integer */
    public $text_image_bg;
    /** @var integer */
    public $text_image_bg_all;
    /** @var integer */
    public $text_image_bg_padding;
    /** @var integer */
    public $text_image_bg_padding_lr;
    /** @var integer */
    public $text_image_bg_opacity;
    /** @var integer */
    public $text_image_bg_opacity_all;
    /** @var integer */
    public $text_image_bg_opacity_all_hov;
    /** @var integer */
    public $home_blog_pro_shadow_effect;
    /** @var integer */
    public $home_blog_pro_h_shadow;
    /** @var integer */
    public $home_blog_pro_v_shadow;
    /** @var integer */
    public $home_blog_pro_shadow_blur;
    /** @var integer */
    public $home_blog_pro_shadow_color;
    /** @var integer */
    public $home_blog_pro_shadow_opacity;
    /** @var integer */
    public $home_blog_border_width;
    /** @var integer */
    public $home_blog_border_color;
    /** @var integer */
    public $home_blog_color_blog_info;
     /** @var integer */
    public $home_blog_size_blog_info;
    /** @var integer */
    public $home_blog_margint_blog_info;
     /** @var integer */
    public $home_blog_marginb_blog_info;
     /** @var integer */
    public $home_blog_color_title;
    /** @var integer */
    public $home_blog_color_hov_title;
    /** @var integer */
    public $home_blog_color_fonts_title;
    /** @var integer */
    public $home_blog_color_fontsl_title;
    /** @var integer */
    public $home_blog_color_fontsmt_title;
    /** @var integer */
    public $home_blog_color_fontsmb_title;
    /** @var integer */
    public $home_blog_hov_border_title;
    /** @var integer */
    public $home_blog_color_desc;
    /** @var integer */
    public $home_blog_fonts_desc;
    /** @var integer */
    public $home_blog_fontlh_desc;
    /** @var integer */
    public $home_blog_fontmt_desc;
    /** @var integer */
    public $home_blog_fontmb_desc;
    /** @var integer */
    public $photo_on_hover;
    /** @var integer */
    public $photo_on_hover_size;
    /** @var integer */
    public $text_image_hovertb;
    /** @var integer */
    public $text_image_hover_shift;
    /** @var integer */
    public $newsletter_betwen_el;
    /** @var integer */
    public $newsletter_betwen_el_col;
    /** @var integer */
    public $home_blog_pro_shadow_element;
    /** @var integer */
    public $home_blog_pro_shadow_element_mwidth;
    /** @var integer */
    public $home_blog_pro_shadow_element_margin;
    /** @var integer */
    public $newsletter_betwen_height_el;
    
    	
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_blog_slider',
		'primary'   => 'id_st_blog_slider',
        'multilang' => true,
		'fields'    => array(
	        'home_blog_fontmt_desc'    => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_fontmb_desc'    => array('type' => self::TYPE_STRING, 'size' => 64),
            'home_blog_pro_shadow_element'    => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_pro_shadow_element_mwidth'    => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_pro_shadow_element_margin'    => array('type' => self::TYPE_STRING, 'size' => 64),
         	'home_blog_fonts_desc'    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	        'home_blog_fontlh_desc'    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	        'home_blog_color_desc'          => array('type' => self::TYPE_STRING, 'size' => 7),	
	        'home_blog_hov_border_title'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'home_blog_color_fontsl_title'    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	        'home_blog_color_fontsmt_title'    => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_color_fontsmb_title'    => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_color_fonts_title'    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	        'home_blog_color_title'          => array('type' => self::TYPE_STRING, 'size' => 7),
	        'home_blog_color_hov_title'      => array('type' => self::TYPE_STRING, 'size' => 7),
	        'home_blog_margint_blog_info'    => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_marginb_blog_info'    => array('type' => self::TYPE_STRING, 'size' => 64),
			'id_shop'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
            'type'                     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'subtype'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_st_blog_category'      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'active'                   => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'position'                 => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
	        'display_on'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'top_margin'               => array('type' => self::TYPE_STRING, 'size' => 10),
			'bottom_margin'            => array('type' => self::TYPE_STRING, 'size' => 10),
			'top_padding'              => array('type' => self::TYPE_STRING, 'size' => 10),
			'bottom_padding'           => array('type' => self::TYPE_STRING, 'size' => 10),
	
	        'top_margin_mobile'               => array('type' => self::TYPE_STRING, 'size' => 10),
			'bottom_margin_mobile'            => array('type' => self::TYPE_STRING, 'size' => 10),
			'top_padding_mobile'              => array('type' => self::TYPE_STRING, 'size' => 10),
			'bottom_padding_mobile'           => array('type' => self::TYPE_STRING, 'size' => 10),
	
			'bg_pattern'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'bg_img'                   => array('type' => self::TYPE_STRING, 'size' => 255),
			'bg_color'                 => array('type' => self::TYPE_STRING, 'size' => 7),
			'speed'                    => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'bg_img_v_offset'          => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'title_color'              => array('type' => self::TYPE_STRING, 'size' => 7),
	        'subtitle_color'              => array('type' => self::TYPE_STRING, 'size' => 7),
			'title_hover_color'        => array('type' => self::TYPE_STRING, 'size' => 7),
			'text_color'               => array('type' => self::TYPE_STRING, 'size' => 7),
			'price_color'              => array('type' => self::TYPE_STRING, 'size' => 7),
			'grid_bg'            => array('type' => self::TYPE_STRING, 'size' => 7),
            'grid_hover_bg'            => array('type' => self::TYPE_STRING, 'size' => 7),
			'link_hover_color'         => array('type' => self::TYPE_STRING, 'size' => 7),
        	'text_image_max_color'         => array('type' => self::TYPE_STRING, 'size' => 7),
        	'home_blog_border_color'         => array('type' => self::TYPE_STRING, 'size' => 7),
	        'home_blog_color_blog_info'         => array('type' => self::TYPE_STRING, 'size' => 7),
	        'photo_on_hover_size'               =>array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
	        'text_image_hovertb'              => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	     	'text_image_hover_shift'    => array('type' => self::TYPE_INT, ),
	        'newsletter_betwen_height_el'          => array('type' => self::TYPE_STRING, 'size' => 7),
	
	
	        'text_image_bg'         => array('type' => self::TYPE_STRING, 'size' => 7),
	        'text_image_bg_all'         => array('type' => self::TYPE_STRING, 'size' => 7),
	    	'direction_color'          => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_color_hover'    => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_color_disabled' => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_bg'             => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_hover_bg'       => array('type' => self::TYPE_STRING, 'size' => 7),
            'direction_disabled_bg'    => array('type' => self::TYPE_STRING, 'size' => 7),
			'title_align'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
	       	'title_font_size'          => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'subtitle_font_size'          => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'direction_nav'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hide_direction_nav_on_mob'=> array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'control_nav'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hide_control_nav_on_mob'  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'pag_nav_bg'               => array('type' => self::TYPE_STRING, 'size' => 7),
			'pag_nav_bg_hover'         => array('type' => self::TYPE_STRING, 'size' => 7),
            'title_bottom_border'      => array('type' => self::TYPE_STRING, 'size' => 10),
            'title_bottom_border_color'    => array('type' => self::TYPE_STRING, 'size' => 7),
	        'home_blog_pro_shadow_color'    => array('type' => self::TYPE_STRING, 'size' => 7),
	        'title_bottom_border_color_h'  => array('type' => self::TYPE_STRING, 'size' => 7),
            
            'grid'                          => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'random'                        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'nbr'                           => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'soby'                          => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'spacing_between'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'image_type'                    => array('type' => self::TYPE_STRING),
            'slideshow'                     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            's_speed'                       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'a_speed'                       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'pause_on_hover'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'rewind_nav'                    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'lazy'                          => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'move'                          => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'hide_mob'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'display_sd'                    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'countdown_on'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'aw_display'                    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            
            'display_pro_col'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'nbr_col'                       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'soby_col'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'items_col'                     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'slideshow_col'                 => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            's_speed_col'                   => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'a_speed_col'                   => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'pause_on_hover_col'            => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'rewind_nav_col'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'lazy_col'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'move_col'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'hide_mob_col'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            // 'countdown_on_col'              => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'aw_display_col'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            
            'nbr_fot'                       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'soby_fot'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'aw_display_fot'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'hide_mob_fot'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'footer_wide'                   => array('type' => self::TYPE_STRING, 'size' => 3),
            
			'pro_per_fw'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_xxl'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_xl'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_lg'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_md'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_sm'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_xs'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),

            'video_poster'             => array('type' => self::TYPE_STRING, 'validate' => 'isAnything', 'size' => 255),
            'video_v_offset'           => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'video_mpfour'             => array('type' => self::TYPE_STRING, 'size' => 255),
            'video_webm'               => array('type' => self::TYPE_STRING, 'size' => 255),
            'video_ogg'                => array('type' => self::TYPE_STRING, 'size' => 255),
            'video_loop'               => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'video_muted'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'view_more'                => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
        	'view_more_align_desk'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'view_more_align_mobile'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'view_more_style'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	
	        'length_of_name'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
        	'text_image_max_alignment'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'text_alignment_in_box'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'text_alignment_ver'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'text_alignment_hor'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	       	'display_viewcount'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'display_comment_count'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
        	'display_author'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'home_blog_pro_shadow_effect'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	
	
			'display_date'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'display_date_icon'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
        	'length_of_name_value'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'text_image_bg_opacity'     =>array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
	        'home_blog_pro_shadow_opacity'     =>array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
	        'text_image_bg_opacity_all'     =>array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
        	'text_image_bg_opacity_all_hov'     =>array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
	        'length_desc_article'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	
	
	
	        'display_date_pos'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'display_date_icon'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'display_read_more'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'display_loved'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'display_image'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'items_img'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'img_text'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'home_blog_grid_bg'            => array('type' => self::TYPE_STRING, 'size' => 7),
			'items_img_padding'               => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_size_blog_info'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),

			'items_text_padding'               => array('type' => self::TYPE_STRING, 'size' => 64),
	        'text_image_bg_padding'               => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_border_width'               => array('type' => self::TYPE_STRING, 'size' => 64),
	    	'text_image_bg_padding_lr'               => array('type' => self::TYPE_STRING, 'size' => 64),
	        'text_image_max_width'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	        'text_alignment_margin_external'               => array('type' => self::TYPE_STRING, 'size' => 64),
	        'text_alignment_margin_external_m'               => array('type' => self::TYPE_STRING, 'size' => 64),
	        'home_blog_pro_h_shadow'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	        'home_blog_pro_v_shadow'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	        'home_blog_pro_shadow_blur'               =>array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
	
	
	        'items_img_padding_h'               => array('type' => self::TYPE_STRING, 'size' => 64),
	        'items_text_padding_h'              => array('type' => self::TYPE_STRING, 'size' => 64),
			'home_blog_grid_bg_img'            => array('type' => self::TYPE_STRING, 'size' => 7),
			'home_blog_grid_bg_text'            => array('type' => self::TYPE_STRING, 'size' => 7),
	        'home_blog_grid_bg_text_hover'            => array('type' => self::TYPE_STRING, 'size' => 7),
	        'position_buttons'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
			'left_padding'              => array('type' => self::TYPE_STRING, 'size' => 10),
			'right_padding'              => array('type' => self::TYPE_STRING, 'size' => 10),
	        'display_text_on_image'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
	        'photo_on_hover'     => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),

            'title'                       =>    array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
            'subtitle'                       =>    array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
		
		)
	);
	public static function getListContent($type=1,$active=0,$display_on=null, $ids=null, $id_lang = 0)
	{
        if (!is_null($ids) && !is_array($ids)) {
            $ids_array = (array)$ids;
        }

        if ( !$id_lang ) $id_lang = Context::getContext()->language->id;

		return  Db::getInstance()->executeS('
			SELECT sbsl.*, sbs.*
			FROM `'._DB_PREFIX_.'st_blog_slider` sbs
             LEFT JOIN `'._DB_PREFIX_.'st_blog_slider_lang` sbsl ON sbs.`id_st_blog_slider` = sbsl.`id_st_blog_slider` AND sbsl.`id_lang` = '.(int)$id_lang.'
			WHERE `type`='.(int)$type.
            Shop::addSqlRestrictionOnLang('').
            ($active ? ' AND `active`=1 ' : '').
            (!is_null($display_on) && is_null($ids) ? ' AND `display_on`='.(int)$display_on : '').
            (!is_null($ids) ? ' AND sbs.`id_st_blog_slider` IN ('.implode(',',$ids_array).')' : '').'
            ORDER BY `position`');
	}
	public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) AND $key != 'id_'.$this->table && !isset($_FILES[$key]))
				$this->{$key} = $value;

        if (sizeof($this->fieldsValidateLang))
        {
            $languages = Language::getLanguages(false);
            foreach ($languages AS $language)
                foreach ($this->fieldsValidateLang AS $field => $validation)
                    if (isset($_POST[$field.'_'.(int)($language['id_lang'])]) && !isset($_FILES[$field.'_'.(int)($language['id_lang'])]))
                        $this->{$field}[(int)($language['id_lang'])] = $_POST[$field.'_'.(int)($language['id_lang'])];
        }
	}
    public function updatePosition($way, $position,$type=1)
	{
		if (!$res = Db::getInstance()->executeS('
			SELECT `id_st_blog_slider`, `position`
			FROM `'._DB_PREFIX_.'st_blog_slider`
            WHERE `type`='.(int)$type.'
			ORDER BY `position` ASC'
		))
			return false;

		foreach ($res as $item)
			if ((int)$item['id_st_blog_slider'] == (int)$this->id)
				$moved_item = $item;

		if (!isset($moved_item) || !isset($position))
			return false;

		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_blog_slider`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `type`='.(int)$type.' AND `position`
			'.($way
				? '> '.(int)$moved_item['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_item['position'].' AND `position` >= '.(int)$position))
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_blog_slider`
			SET `position` = '.(int)$position.'
			WHERE `id_st_blog_slider` = '.(int)$moved_item['id_st_blog_slider']));
	}
    public function checkPostion($type=1)
    {
        $check = Db::getInstance()->getValue('
			SELECT count(0)
			FROM `'._DB_PREFIX_.'st_blog_slider` 
			WHERE `type`='.(int)$type.' AND `position`='.$this->position.
            ($this->id ? ' AND `id_st_blog_slider`!='.$this->id : '')
		);
        if($check)
            return Db::getInstance()->getValue('
    			SELECT `position`+1
    			FROM `'._DB_PREFIX_.'st_blog_slider` 
                WHERE `type`='.(int)$type.'
                ORDER BY `position` DESC'
    		);
        return $this->position;
    }
    public static function getOptions($type=1)
    {
        return Db::getInstance()->executeS('
            SELECT * 
            FROM `'._DB_PREFIX_.'st_blog_slider` 
            WHERE `active` = 1
            AND `type`='.(int)$type.'
            AND `id_shop` = '.(int)Context::getContext()->shop->id.'
        ');
    }
    public static function fetchMediaServer(&$banner)
    {
        $fields = array('image_multi_lang');
        if (is_string($banner) && $banner)
        {
            if (strpos($banner, '/upload/') === false && strpos($banner, '/modules/') === false)
                $banner = _THEME_PROD_PIC_DIR_.$banner;
            $banner = context::getContext()->link->protocol_content.Tools::getMediaServer($banner).$banner;
            return $banner;
        }
        foreach($fields AS $field)
        {
            if (is_array($banner) && isset($banner[$field]) && $banner[$field])
            {
                if (strpos($banner[$field], '/upload/') === false && strpos($banner[$field], '/modules/') === false )
                    $banner[$field] = _THEME_PROD_PIC_DIR_.$banner[$field];
                $banner[$field] = context::getContext()->link->protocol_content.Tools::getMediaServer($banner[$field]).$banner[$field];
            }
        }
    }
}