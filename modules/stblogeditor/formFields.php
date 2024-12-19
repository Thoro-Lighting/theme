<?php
$image_types_arr = array();
$imagesTypes = StBlogImageClass::getDefImageTypes();
foreach ($imagesTypes[1] as $k => $imageType) {
    if (!isset($imageType[0]) || !$imageType[0] || !isset($imageType[1]) || !$imageType[1]) {
        continue;
    }
    $image_types_arr[$k] = array('id' => $k, 'name' => $k.'('.$imageType[0].' x '.$imageType[1].')');
}

return array(
	'setting' => array(
        'rount_name' => array(
			'label' => $this->getTranslator()->trans('Route name', array(), 'Modules.Stblog.Admin'),
            'name' => 'rount_name',
			'lang' => true,
			'size' => 60,                        
			'type' => 'text',
            'desc' => $this->getTranslator()->trans('Default is "blog",for example: www.domain.com/blog', array(), 'Modules.Stblog.Admin'),                        
		),
		
		
		 'blog_responsive_max' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Maximum Page Width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_responsive_max',
			'values' => array(
				array(
					'id' => 'blog_responsive_max_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('992', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'blog_responsive_max_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('1200', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'blog_responsive_max_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('1440', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'blog_responsive_max_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full screen', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Maximum width of the page', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		
       //  'show_all' => array(
       //     'label' => $this->getTranslator()->trans('Show all articles on blog homepage using the same category page settings', array(), 'Modules.Stblog.Admin'),
       //     'name' => 'show_all',
        //    'validation' => 'isBool',
       //     'default_value' => 0,
        //    'type' => 'switch',
        //    'values' => array(
       //         array(
       //             'id' => 'show_all_on',
        //            'value' => 1,
       //             'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
        //        array(
        //            'id' => 'show_all_off',
        //            'value' => 0,
        //            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
        //    ),
       // ),
        'meta_title' => array(
            'label' => $this->getTranslator()->trans('Meta title', array(), 'Modules.Stblog.Admin'),
            'name' => 'meta_title',
            'lang' => true,
            'type' => 'text',
            'size' => 60,
        ),
        'meta_keywords' => array(
            'label' => $this->getTranslator()->trans('Meta keywords', array(), 'Modules.Stblog.Admin'),
            'name' => 'meta_keywords',
            'lang' => true,
            'size' => 60,
            'type' => 'text',
        ),
        'meta_description' => array(
            'label' => $this->getTranslator()->trans('Meta desciption', array(), 'Modules.Stblog.Admin'),
            'name' => 'meta_description',
            'lang' => true,
            'type' => 'textarea',
            'cols' => 60,
            'rows' => 6,
        ),
        
       
        
        'left_column_size_blog' => array(
                'type' => 'select',
                'label'=> $this->getTranslator()->trans('Left or right column width:', array(), 'Modules.Stthemeeditor.Admin'),
                'name' => 'left_column_size_blog',
                'options' => array(
                    'query' => $this->left_column_size_blog,
                    'id' => 'id',
                    'name' => 'name',
                ),
                'validation' => 'isUnsignedInt',
                    
   
            ),
            
             'deafult_blog_column'=>array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Arrangement of blog homepage columns:', array(), 'Modules.Stblog.Admin'),
            'name' => 'deafult_blog_column',
            'values' => array(
                array(
                    'id' => 'deafult_blog_column_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('1 column', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'deafult_blog_column_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('2 column', array(), 'Modules.Stblog.Admin')),
                
            ),
            
            'validation' => 'isUnsignedInt',
        ), 
        
         'blog_default_column_max_width'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Homepage blog center column max width:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_default_column_max_width',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
          ),
          
          
          'blog_default_column_padding'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_default_column_padding',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
          ),
          
          'blog_default_column_padding_mob'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_default_column_padding_mob',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
          ),
          
          'blog_default_bg_center'=> array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Homepage blog center column background:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_default_bg_center',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
          
        
        'category_blog_column'=>array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Arrangement of columns for blog category pages:', array(), 'Modules.Stblog.Admin'),
            'name' => 'category_blog_column',
            'values' => array(
                array(
                    'id' => 'category_blog_column_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('1 column', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'category_blog_column_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('2 column', array(), 'Modules.Stblog.Admin')),
                
            ),
            
            'validation' => 'isUnsignedInt',
        ), 
        
               
        'blog_category_column_max_width'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Category blog center column max width:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_category_column_max_width',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
          ),
          
           'blog_category_column_padding'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_category_column_padding',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
          ),
          
          'blog_category_column_padding_mob'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_category_column_padding_mob',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
          ),
          
          
           'blog_category_bg_center'=> array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Category center column background:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_category_bg_center',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
            
        'article_blog_column'=>array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Arrangement of blog article page columns:', array(), 'Modules.Stblog.Admin'),
            'name' => 'article_blog_column',
            'values' => array(
                array(
                    'id' => 'article_blog_column_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('1 column', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'article_blog_column_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('2 column', array(), 'Modules.Stblog.Admin')),
                
            ),
            
            'validation' => 'isUnsignedInt',
        ), 
        
       
        
        'blog_article_column_max_width'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Article blog center column max width:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_article_column_max_width',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
          ),
          
           'blog_article_bg_center'=> array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Article center column background:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_article_bg_center',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
            
        'blog_article_column_padding'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_article_column_padding',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
          ),
          
          'blog_article_column_padding_mob'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_article_column_padding_mob',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
          ),
        
        
       
        'font_heading_size'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Heading font size:', array(), 'Modules.Stblog.Admin'),
            'name' => 'font_heading_size',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ), 
        'font_heading_trans'=>array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Heading transform:', array(), 'Modules.Stblog.Admin'),
            'name' => 'font_heading_trans',
            'options' => array(
                'query' => self::$textTransform,
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
        ),
        'heading_bottom_border'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Heading border height:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bottom_border',
            'validation' => 'isNullOrUnsignedId',
            'prefix' => 'px',
            'default_value' => '',
            'class' => 'fixed-width-lg',
        ),
        'block_headings_color'=>array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Heading color:', array(), 'Modules.Stblog.Admin'),
            'name' => 'block_headings_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
         'heading_bottom_border_color'=>array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Heading border color:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bottom_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
        'heading_bottom_border_color_h'=> array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Heading border highlight color:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bottom_border_color_h',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
        'heading_style'=>array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Heading style:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_style',
            'values' => array(
                array(
                    'id' => 'heading_style_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Default, under line', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'heading_style_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('One line. Can not have background image', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'heading_style_4',
                    'value' => 4,
                    'label' => $this->getTranslator()->trans('One dashed line. Can not have background image', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'heading_style_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Two lines', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'heading_style_3',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('One short line. Can not have background image', array(), 'Modules.Stblog.Admin')),
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ), 
        'heading_bg_pattern'=>array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Heading background pattern:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bg_pattern',
            'options' => array(
                'query' => $this->getPatternsArray(6),
                'id' => 'id',
                'name' => 'name',
                'default' => array(
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('None', array(), 'Modules.Stblog.Admin'),
                ),
            ),
            'desc' => $this->getPatterns(6,'heading_bg'),
            'validation' => 'isUnsignedInt',
        ),
        'heading_bg_image' => array(
            'type' => 'file',
            'label' => $this->getTranslator()->trans('Heading background image:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bg_image',
            'desc' => '',
        ),
	),
    'related' => array(),
    'slideshow' => array(),
    'image' => array(
        'img_gallery_lg_w' => array(
			'label' => $this->getTranslator()->trans('Large width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_lg_w',
			'validation' => 'isUnsignedInt',
            'default_value' => 870,
            'hint' => $this->getTranslator()->trans('Images dimension of large width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
        'img_gallery_lg_h' => array(
			'label' => $this->getTranslator()->trans('Large height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_lg_h',
			'validation' => 'isUnsignedInt',
            'default_value' => 450,
            'hint' => $this->getTranslator()->trans('Images dimension of large height', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
        'img_gallery_bg_w' => array(
            'label' => $this->getTranslator()->trans('Big width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_bg_w',
            'validation' => 'isUnsignedInt',
            'default_value' => 400,
            'hint' => $this->getTranslator()->trans('This is not used by default. If you have two different sizes of posts on the homepage, you can aplly this to one and Medium to another. Check the documenation for more info.', array(), 'Modules.Stblog.Admin'),
            'type' => 'text',
            'suffix' => 'px'
        ),
        'img_gallery_bg_h' => array(
            'label' => $this->getTranslator()->trans('Big height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_bg_h',
            'validation' => 'isUnsignedInt',
            'default_value' => 300,
            'hint' => $this->getTranslator()->trans('This is not used by default. If you have two different sizes of posts on the homepage, you can aplly this to one and Medium to another. Check the documenation for more info.', array(), 'Modules.Stblog.Admin'),
            'type' => 'text',
            'suffix' => 'px'
        ),
        'img_gallery_md_w' => array(
            'label' => $this->getTranslator()->trans('Medium width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_md_w',
            'validation' => 'isUnsignedInt',
            'default_value' => 580,
            'hint' => $this->getTranslator()->trans('Images dimension of medium width', array(), 'Modules.Stblog.Admin'),
            'type' => 'text',
            'suffix' => 'px'
        ),
        'img_gallery_md_h' => array(
            'label' => $this->getTranslator()->trans('Medium height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_md_h',
            'validation' => 'isUnsignedInt',
            'default_value' => 400,
            'hint' => $this->getTranslator()->trans('Images dimension of medium height', array(), 'Modules.Stblog.Admin'),
            'type' => 'text',
            'suffix' => 'px'
        ),
        'img_gallery_sm_w' => array(
			'label' => $this->getTranslator()->trans('Small width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_sm_w',
			'validation' => 'isUnsignedInt',
            'default_value' => 180,
            'hint' => $this->getTranslator()->trans('Images dimension of small width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
		    'img_gallery_sm_h' => array(
			'label' => $this->getTranslator()->trans('Small height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_sm_h',
			'validation' => 'isUnsignedInt',
            'default_value' => 124,
            'hint' => $this->getTranslator()->trans('Images dimension of small height', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
		
		'img_gallery_ho_w' => array(
			'label' => $this->getTranslator()->trans('Home width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_ho_w',
			'validation' => 'isUnsignedInt',
            'default_value' => 240,
            'hint' => $this->getTranslator()->trans('Images dimension of small width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
		
		'img_gallery_ho_h' => array(
			'label' => $this->getTranslator()->trans('Home height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_ho_h',
			'validation' => 'isUnsignedInt',
            'default_value' => 240,
            'hint' => $this->getTranslator()->trans('Images dimension of small width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
		
		'img_gallery_hl_w' => array(
			'label' => $this->getTranslator()->trans('Article half width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_hl_w',
			'validation' => 'isUnsignedInt',
            'default_value' => 240,
            'hint' => $this->getTranslator()->trans('Images dimension of small width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
		
		'img_gallery_hl_h' => array(
			'label' => $this->getTranslator()->trans('Article half height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_hl_h',
			'validation' => 'isUnsignedInt',
            'default_value' => 240,
            'hint' => $this->getTranslator()->trans('Images dimension of small width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
		
        'img_gallery_xs_w' => array(
			'label' => $this->getTranslator()->trans('Thumb width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_xs_w',
			'validation' => 'isUnsignedInt',
            'default_value' => 70,
            'hint' => $this->getTranslator()->trans('Images dimension of thumb width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
        'img_gallery_xs_h' => array(
			'label' => $this->getTranslator()->trans('Thumb height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_xs_h',
			'validation' => 'isUnsignedInt',
            'default_value' => 70,
            'hint' => $this->getTranslator()->trans('Images dimension of thumb height', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px',
            'desc' => '<br><br><div class="alert alert-info">
				'.$this->getTranslator()->trans('Regenerates thumbnails for all existing blog images', array(), 'Modules.Stblog.Admin').'<br>
				'.$this->getTranslator()->trans('Please be patient. This can take several minutes.', array(), 'Modules.Stblog.Admin').'<br>
				'.$this->getTranslator()->trans('Be careful! Manually uploaded thumbnails will be erased and replaced by automatically generated thumbnails.', array(), 'Modules.Stblog.Admin').'
			</div>
            <script type="text/javascript">var c_msg = "'.$this->getTranslator()->trans('Are you sure ?', array(), 'Modules.Stblog.Admin').'";</script>
            <div id="progress-warning" class="alert alert-warning" style="display: none">
        		'.$this->getTranslator()->trans('In progress, Please do not leave this page...', array(), 'Modules.Stblog.Admin').'
        	</div>
            <div id="ajax-message-ok" class="conf ajax-message alert alert-success" style="display: none">
            	<span class="message">'.$this->getTranslator()->trans('Regenerate thumbails successfully.', array(), 'Modules.Stblog.Admin').'</span>
            </div>
            <div id="ajax-message-ko" class="error ajax-message alert alert-danger" style="display: none">
            	<span class="message"></span>
            </div>
            <button type="button" name="submitRegenerateimage_type" class="btn btn-default pull-left" id="btn_regenerate_thumbs">
				<i class="process-icon-cogs"></i>'.$this->getTranslator()->trans('Regenerate thumbnails', array(), 'Modules.Stblog.Admin').'
			</button>'
		),
	),
    'blog_block' => array(
       
        'name_font_select' => array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Google fonts:', array(), 'Admin.Theme.Transformer'),
            'name' => 'name_font_select',
            'onchange' => 'handle_font_change(this);',
            'options' => array(
                'query' => $this->fontOptions(),
                'id' => 'id',
                'name' => 'name',
                'default' => array(
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer'),
                ),
            ),
            'default_value' => '',
            'validation' => 'isGenericName',
        ),
        'name_font_weight'=>array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Font weight:', array(), 'Admin.Theme.Transformer'),
            'onchange' => 'handle_font_style(this);',
            'name' => 'name_font_weight',
            'default_value' => 700,
            'options' => array(
                'query' => $this->variants,
                'id' => 'id',
                'name' => 'name',
            ),
            'default_value' => '',
            'validation' => 'isAnything',
            'desc' => '<p id="google_font_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>'.$this->google_font_link,
        ),
        'name_transform' => array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Name transform:', array(), 'Modules.Stblog.Admin'),
            'name' => 'name_transform',
            'default_value' => 0,
            'options' => array(
                'query' => self::$textTransform,
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
        ),
       
            

       
    ),
    'category' => array(
        'cate_layouts' => array(
            'label' => $this->getTranslator()->trans('Category layout', array(), 'Modules.Stblog.Admin'),
            'name' => 'cate_layouts',
            'type' => 'radio',
            'default_value' => 1,
            'validation' => 'isUnsignedInt',
             'values' => array(
            //    array(
            //       'id' => 'cate_layouts_1',
            //       'value' => 1,
            //        'label' => $this->getTranslator()->trans('List', array(), 'Modules.Stblog.Admin')),
            //    array(
            //        'id' => 'cate_layouts_2',
            //        'value' => 2,
            //        'label' => $this->getTranslator()->trans('Medium image', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'cate_layouts_3',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Grid', array(), 'Modules.Stblog.Admin')),
                array(
                     'id' => 'cate_layouts_6',
                     'value' => 6,
                     'label' => $this->getTranslator()->trans('Masonry layout - only for blog', array(), 'Admin.Theme.Transformer')),
                array(
                     'id' => 'cate_layouts_7',
                      'value' => 7,
                      'label' => $this->getTranslator()->trans('Mosaic layout - only for blog', array(), 'Admin.Theme.Transformer')),
           
            ),
        ),
        
        
        
        'blog_image_type'=>array(
                'type' => 'select',
                'label' => $this->getTranslator()->trans('Image type:', array(), 'Admin.Theme.Transformer'),
                'name' => 'blog_image_type',
                'default_value' => '',
                'options' => array(
                    'query' => $image_types_arr,
                    'id' => 'id',
                    'name' => 'name',
                    'default' => array(
                        'value' => '',
                        'label' => '-',
                    ),
                ),
                'validation' => 'isGenericName',
            ),
        'per_page' => array(
            'label' => $this->getTranslator()->trans('Blogs per page', array(), 'Modules.Stblog.Admin'),
            'name' => 'per_page',
            'default_value' => 10,
            'validation' => 'isUnsignedInt',
            'type' => 'text',
            'class' => 'fixed-width-sm',
            'desc' => $this->getTranslator()->trans('Number of blogs displayed per page. Default is 10.', array(), 'Modules.Stblog.Admin'),
        ),
        'cate_sort_by' => array(
            'label' => $this->getTranslator()->trans('Default sort by', array(), 'Modules.Stblog.Admin'),
            'name' => 'cate_sort_by',
            'validation' => 'isUnsignedInt',
            'type' => 'select',
            'options' => array(
                'query' => $this->sort_by,
                'id' => 'id',
                'name' => 'name',
            ),
        ),
        
        'category_box_spaces' => array(
			'label' => $this->getTranslator()->trans('Spacing between articles:', array(), 'Admin.Theme.Transformer'),
            'name' => 'category_box_spaces',
			'validation' => 'isUnsignedInt',
            'default_value' => 16,
           	'type' => 'text',
            'class' => 'fixed-width-sm',
            
		),
		
		'category_box_padding' => array(
			'label' => $this->getTranslator()->trans('Padding bottom box:', array(), 'Admin.Theme.Transformer'),
            'name' => 'category_box_padding',
			'default_value' => 16,
           	'type' => 'text',
            'class' => 'fixed-width-sm',
		    'validation' => 'isAnything',
            
		),
        
        'dropdownlistgroup' => array(
            'type' => 'dropdownlistgroup',
            'label' => $this->getTranslator()->trans('Articles per row in grid view:', array(), 'Admin.Theme.Transformer'),
            'name' => 'pro_per_grid',
            'values' => array(
                    'maximum' => 12,
                    'medias' => array('fw','xxl','xl','lg','md','sm','xs'),
                ),
            'desc' => $this->getTranslator()->trans('7, 9 and 11 can not be used in grid view, they will be automatically decreased to 6, 8 and 10. Set a value for the "Full width" drop down list to make this module fullwidth in the fullwidth* hooks, but the value of "Full width" drop down menu would not take effect in grid view.', array(), 'Admin.Theme.Transformer'),
        ), 
                 
         
     ),
     
     'category_visilbe' => array(
     
       'length_of_name' => array(
            'label' => $this->getTranslator()->trans('Length of article names', array(), 'Modules.Stblog.Admin'),
            'name' => 'length_of_name',
            'type' => 'radio',
            'default_value' => 2,
            'validation' => 'isUnsignedInt',
            'values' => array(
              
			  array(
                    'id' => 'length_of_name_long',
                    'value' => 4,
                    'label' => $this->getTranslator()->trans('Own length - enter the number of characters in the field below', array(), 'Admin.Theme.Transformer')),
		        array(
                    'id' => 'length_of_name_full',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Full name', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'length_of_name_two',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Two lines, focus all blog names having the same height', array(), 'Modules.Stblog.Admin')),
            ),  ),
            
        'length_of_name_value' => array(
			'label' => $this->getTranslator()->trans('Own length of the article name - number of characters', array(), 'Admin.Theme.Transformer'),
            'name' => 'length_of_name_value',
			'validation' => 'isUnsignedInt',
            'default_value' => 40,
           	'type' => 'text',
            'class' => 'fixed-width-sm',
            
		),
		
		
		'display_sd' => array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Display blog short content:', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_sd',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'display_sd_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_short',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Short content, 120 characters', array(), 'Admin.Theme.Transformer')),
           //     array(
           //         'id' => 'display_sd_on',
           //         'value' => 1,
           //        'label' => $this->getTranslator()->trans('Short content, 220 characters', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_full',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Full short content', array(), 'Admin.Theme.Transformer')),
           //     array(
           //         'id' => 'display_sd_4',
           //         'value' => 4,
           //         'label' => $this->getTranslator()->trans('Content, 120 characters', array(), 'Admin.Theme.Transformer')),
           //     array(
           //         'id' => 'display_sd_5',
           //        'value' => 5,
           //         'label' => $this->getTranslator()->trans('Content, 220 characters', array(), 'Admin.Theme.Transformer')),
           //     array(
           //         'id' => 'display_sd_6',
           //         'value' => 6,
           //         'label' => $this->getTranslator()->trans('Content, about 5 lines', array(), 'Admin.Theme.Transformer')),
           //     array(
           //         'id' => 'display_sd_7',
           //         'value' => 7,
           //         'label' => $this->getTranslator()->trans('Content, about 10 lines', array(), 'Admin.Theme.Transformer')),
                array(
                        'id' => 'display_sd_8',
                        'value' => 8,
                        'label' => $this->getTranslator()->trans('Own length of short description', array(), 'Admin.Theme.Transformer')),
                array(
                        'id' => 'display_sd_9',
                        'value' => 9,
                        'label' => $this->getTranslator()->trans('Own length of full description', array(), 'Admin.Theme.Transformer'))
            ),
            'validation' => 'isUnsignedInt',
        ),
        
		
		 'length_desc_article' => array(
			'label' => $this->getTranslator()->trans('Own length of desc', array(), 'Admin.Theme.Transformer'),
            'name' => 'length_desc_article',
			'validation' => 'isUnsignedInt',
            'default_value' => 40,
           	'type' => 'text',
           'class' => 'fixed-width-sm',
            
		),
		
		 'display_image' => array(
            'label' => $this->getTranslator()->trans('Display image post', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_image',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_image_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_image_all',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Always first image', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_image_all',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Always second image', array(), 'Admin.Theme.Transformer')),
                  array(
                    'id' => 'display_image_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            
            'desc' => $this->trans('The second option blocks the individual setting of not displaying the article cover, if there is one on it, the picture will be shown in this zone.', array(), 'Admin.Theme.Transformer')
			
        ),
        
         'display_viewcount' => array(
            'label' => $this->getTranslator()->trans('Display viewcount on each post', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_viewcount',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_viewcount_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_viewcount_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_viewcount_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
               
        'display_comment_count' => array(
            'label' => $this->getTranslator()->trans('Display the total number of comments', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_comment_count',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_comment_count_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_comment_count_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_comment_count_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
         'display_author' => array(
            'label' => $this->getTranslator()->trans('Display author name', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_author',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_author_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_author_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_author_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        'display_date_pos' => array(
            'label' => $this->getTranslator()->trans('Display the date', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_date_pos',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_date_pos_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_date_pos_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                   array(
                    'id' => 'display_date_pos_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        
        'display_date_icon' => array(
            'label' => $this->getTranslator()->trans('Display date icon', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_date_icon',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_date_icon_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_date_icon_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        'display_date' => array(
            'label' => $this->getTranslator()->trans('Display the date', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_date',
            'validation' => 'isUnsignedInt',
            'default_value' => 2,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_date_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, time in format: 2019-07-19', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_date_timeago',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Time Since Posted, like 2 days ago, 1 month ago', array(), 'Admin.Theme.Transformer')),
              //  array(
                //    'id' => 'display_date_off',
                //    'value' => 0,
                //    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        
        'display_loved' => array(
            'label' => $this->getTranslator()->trans('Display button for favorites', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_loved',
            'validation' => 'isUnsignedInt',
            'default_value' => 2,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_loved_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, on the cover of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_loved_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, under the name of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_loved_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
             
            ),
        ),
        'display_read_more' => array(
            'label' => $this->getTranslator()->trans('Display a read more button', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_read_more',
            'validation' => 'isUnsignedInt',
            'default_value' => 4,
            'type' => 'radio',
            'values' => array(
        
                 array(
                        'id' => 'display_read_more_4',
                        'value' => 4,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                 array(
                        'id' => 'display_read_more_0',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('Normal button', array(), 'Admin.Theme.Transformer')),
                   array(
                        'id' => 'display_read_more_1',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Normal text', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_read_more_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Border on hover', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_read_more_3',
                        'value' => 3,
                        'label' => $this->getTranslator()->trans('Border visible right away', array(), 'Admin.Theme.Transformer')),
                                    ),
               
            'desc' => $this->getTranslator()->trans('Read more buttons display along with short content, which means if a block does not showing short content, read more buttons would also do not show out in this block.', array(), 'Admin.Theme.Transformer'),
        ),
        
         'img_text' => array(
            'label' => $this->getTranslator()->trans('The position of the article cover in relation to the content', array(), 'Admin.Theme.Transformer'),
            'name' => 'img_text',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'img_text_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Photo at the top, content under the photo', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'img_text_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Photo on the left, content on the right', array(), 'Admin.Theme.Transformer')),
              
            ),
        ),
        
        
          'items_img' => array(
                'type' => 'select',
                'label' => $this->getTranslator()->trans('The width of the photo in the desktop version', array(), 'Admin.Theme.Transformer'),
                'name' => 'items_img',
                'options' => array(
                    'query' => $this->items_img,
                    'id' => 'id',
                    'name' => 'name',
                ),
                'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('This setting is taken into account only if the option is selected: Photo on the left, content on the right<br>The width of the setting content is automatically depending on the selected image width.', array(), 'Admin.Theme.Transformer'),
         ),
   
    ),
    
    'category_color' => array(
    
       'home_blog_pro_shadow_element' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('On what element to apply the shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_shadow_element',
            'validation' => 'isUnsignedInt',
			'values' => array(
			    array(
					'id' => 'home_blog_pro_shadow_element_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('For the whole box', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'home_blog_pro_shadow_element_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only for content block', array(), 'Admin.Theme.Transformer')),
				
				
			),
			
		),  
		
		 'home_blog_pro_shadow_element_mwidth' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Maximum width of the box with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_shadow_element_mwidth',
			'validation' => 'isAnything',
			'prefix' => '%',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('This option should be used in the case of:<br>1. The product photo is set above the content.<br>2. We want to get the effect of a narrower boxing with the content from the photo.', array(), 'Admin.Theme.Transformer'),
		
			),
			
			
			 'home_blog_pro_shadow_element_margin' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin of the box with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_shadow_element_margin',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('This option should be used in the case of:<br>1. The product photo is set above the content.<br>2. We want to get the effect of a narrower boxing with the content from the photo.', array(), 'Admin.Theme.Transformer'),
		
			),
    
            'home_blog_pro_shadow_effect' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Shadows around product images:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'home_blog_pro_shadow_effect',
            'validation' => 'isUnsignedInt',
			'values' => array(
			    array(
					'id' => 'home_blog_pro_shadow_effect_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'home_blog_pro_shadow_effect_on',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'home_blog_pro_shadow_effect_hover',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Show shadows when mouseover', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			
		),  
		
		'home_blog_pro_h_shadow' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_h_shadow',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
		'home_blog_pro_v_shadow' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('V-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_v_shadow',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
		'home_blog_pro_shadow_blur' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The blur distance of shadow:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'home_blog_pro_shadow_blur',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		'home_blog_pro_shadow_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'home_blog_pro_shadow_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		'home_blog_pro_shadow_opacity' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_pro_shadow_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
			
			
			'home_blog_border_color' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
         'home_blog_border_width' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Border size:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_border_width',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			 'text_alignment_in_box' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Text alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_alignment_in_box',
			'values' => array(
				array(
					'id' => 'text_alignment_in_box_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_in_box_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_in_box_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		 'home_blog_color_title' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color of title article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_title',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
           
         'home_blog_color_hov_title' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color hover of title article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_hov_title',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
                 
         'home_blog_color_fonts_title' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Font size of title article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_color_fonts_title',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			'home_blog_color_fontsl_title' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Line height of title article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_color_fontsl_title',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			'home_blog_hov_border_title' => array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Border hover', array(), 'Admin.Theme.Transformer'),
                    'name' => 'home_blog_hov_border_title',
                    'default_value' => 0,
			        'validation' => 'isUnsignedInt',
                    'values' => array(
                        array(
                            'id' => 'home_blog_hov_border_title_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'home_blog_hov_border_title_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('On hover', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'home_blog_hov_border_title_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Visible right away', array(), 'Admin.Theme.Transformer')),
                               ), 
               ),
               
             'home_blog_color_fontsmt_title' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Article title margin:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_color_fontsmt_title',
            'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
            'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_color_fontsmb_title' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Article title margin:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_color_fontsmb_title',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_color_desc' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color of description article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_desc',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
            ),
         
         
            'home_blog_fonts_desc' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Font size of description article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_fonts_desc',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			'home_blog_fontlh_desc' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Line height of description article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_fontlh_desc',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			'home_blog_fontmt_desc' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin of description article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_fontmt_desc',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_fontmb_desc' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin of description article:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_fontmb_desc',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_color_blog_info' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Font color of additional information content, e.g. date, author:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_color_blog_info',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
            ),
			
			'home_blog_size_blog_info' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Font size of additional information content, e.g. date, author:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_size_blog_info',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			),
			
			
			'home_blog_margint_blog_info' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin top of additional information:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_margint_blog_info',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
			'home_blog_marginb_blog_info' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Margin top of additional information:', array(), 'Admin.Theme.Transformer'),
			'name' => 'home_blog_marginb_blog_info',
			'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
			
		    'home_blog_grid_bg' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Blog grid background:', array(), 'Modules.Stblog.Admin'),
            'name' => 'home_blog_grid_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
          
         'home_blog_grid_bg_img' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background image box:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_grid_bg_img',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         'home_blog_grid_bg_text' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background text box:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_grid_bg_text',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         'home_blog_grid_bg_text_hover' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background text box hover:', array(), 'Admin.Theme.Transformer'),
            'name' => 'home_blog_grid_bg_text_hover',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         'items_img_padding'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding zone cover:', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_img_padding',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
        ),
        
        'items_img_padding_h'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding zone cover:', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_img_padding_h',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
         'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
         ),
        
        
         'items_text_padding'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding zone content:', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_text_padding',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
        ),
        
        'items_text_padding_h'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Padding zone content:', array(), 'Admin.Theme.Transformer'),
            'name' => 'items_text_padding_h',
            'validation' => 'isAnything',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
           'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
              
        ),
         
			
    
    
    ),
     
     
    'category_img_hover' => array(
    
       'photo_on_hover'=> array(
			           
            'label' => $this->getTranslator()->trans('Photo enlargement on hover', array(), 'Admin.Theme.Transformer'),
            'name' => 'photo_on_hover',
            'validation' => 'isAnything',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'photo_on_hover',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'photo_on_hover',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
         'photo_on_hover_size' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The size of the magnification:', array(), 'Admin.Theme.Transformer'),
			'name' => 'photo_on_hover_size',
			'validation' => 'isAnything',
			'class' => 'fixed-width-lg',
		),
			
        
        'text_image_bg_all' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background full box:', array(), 'Admin.Theme.Transformer'),
            'name' => 'text_image_bg_all',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
         'text_image_bg_opacity_all' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background full box opacity:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_opacity_all',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isAnything',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
          
           ),
           
           'text_image_bg_opacity_all_hov' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background full box opacity hover:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_opacity_all_hov',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isAnything',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
          
           ), 
    
    ),
    
    'category_img_on_content' => array(
    
    'display_text_on_image' => array(
            'label' => $this->getTranslator()->trans('Display content on article cover', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_text_on_image',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_text_on_image_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'display_text_on_image_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
     'text_image_max_width'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Max width content with text', array(), 'Admin.Theme.Transformer'),
            'name' => 'text_image_max_width',
            'validation' => 'isAnything',
            'prefix' => '%',
            'class' => 'fixed-width-lg',
            
        ),
        
        'text_image_bg' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Background content text:', array(), 'Admin.Theme.Transformer'),
            'name' => 'text_image_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         
         
         'text_image_bg_opacity' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background content text opacity:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_opacity',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isAnything',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
          
           ), 
           
            'text_image_hovertb' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Animation content text on hover:', array(), 'Admin.Theme.Transformer'),
            'name' => 'text_image_hovertb',
            'validation' => 'isAnything',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'text_image_hovertb_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'text_image_hovertb_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            
            ),
        
			
        'text_image_hover_shift' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The size of the shift:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_image_hover_shift',
			'validation' => 'isAnything',
			'class' => 'fixed-width-lg',
            'prefix' => 'px',
            'desc' => $this->getTranslator()->trans('Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
	
		),
		
		'text_alignment_hor' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Boxing location with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_alignment_hor',
			'values' => array(
				array(
					'id' => 'text_alignment_hor_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_hor_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_hor_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isAnything',
		), 
        		
		    'text_alignment_ver' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Boxing align with content:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_alignment_ver',
			'values' => array(
				array(
					'id' => 'text_alignment_ver_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_ver_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_alignment_ver_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isAnything',
		), 
		
		 'text_image_max_alignment' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Text alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'text_image_max_alignment',
			'values' => array(
				array(
					'id' => 'text_image_max_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_image_max_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_image_max_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isAnything',
		), 
		
		
		'text_image_bg_padding' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spaces in the content area (padding):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_padding',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isAnything',
          			 'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
            ), 
            
            'text_image_bg_padding_lr' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spaces in the content area (padding):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_image_bg_padding_lr',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isAnything',
            		'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
            ), 
		
		'text_alignment_margin_external' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spaces in the content area (margin):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_alignment_margin_external',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isAnything',
               'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
		), 
		
		
		
		'text_alignment_margin_external_m' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spaces in the content area (margin):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_alignment_margin_external_m',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isAnything',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
		), 

    ),
    
    'newaletter_form_option' => array(
    
           'newsletter_betwen_height_el' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Height of the oldest item:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'newsletter_betwen_height_el',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isAnything',
                    
                ),
    
    ),
    
    'article' => array(
     
     
      'def_article_blog_top' => array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Default article content layout:', array(), 'Admin.Theme.Transformer'),
            'name' => 'def_article_blog_top',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'def_article_blog_top_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('No photo, photo gallery, video', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_top_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('No photo, photo gallery, video + two column content', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_top_3',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Photo, photo gallery, video on the entire width of the article', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_top_4',
                    'value' => 4,
                    'label' => $this->getTranslator()->trans('Photo, photo gallery, video on the entire width of the article + two column content', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_top_5',
                    'value' => 5,
                    'label' => $this->getTranslator()->trans('Photo, photo gallery, half width video + article title on the right', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_top_6',
                    'value' => 6,
                    'label' => $this->getTranslator()->trans('Photo, photo gallery, half width video + article title on the right + two column content', array(), 'Admin.Theme.Transformer')),
               
                
            ),
            'validation' => 'isUnsignedInt',
        ),
     
     
            'def_article_blog_autor' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Author of the article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'def_article_blog_autor',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'def_article_blog_autor_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_autor_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
     
        
        'def_article_blog_date' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Date of the article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'def_article_blog_date',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'def_article_blog_date_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_date_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        
        
        'def_article_blog_date_icon' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Date of the article icon:', array(), 'Admin.Theme.Transformer'),
            'name' => 'def_article_blog_date_icon',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'def_article_blog_date_icon_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_date_icon_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
          'def_article_blog_view' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Number of article views:', array(), 'Admin.Theme.Transformer'),
            'name' => 'def_article_blog_view',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'def_article_blog_view_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_view_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        'def_article_blog_loved' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Ability to add to favorites:', array(), 'Admin.Theme.Transformer'),
            'name' => 'def_article_blog_loved',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'def_article_blog_loved_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_loved_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        
           'def_article_blog_category' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Category of the article:', array(), 'Admin.Theme.Transformer'),
            'name' => 'def_article_blog_category',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'def_article_blog_category_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'def_article_blog_category_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
     
        'post_heading_size' => array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Blog heading size:', array(), 'Admin.Theme.Transformer'),
            'name' => 'post_heading_size',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
            'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
        ),
        'post_font_size' => array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Font size:', array(), 'Admin.Theme.Transformer'),
            'name' => 'post_font_size',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
            'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
        ),
      //  'display_short_content' => array(
       //     'label' => $this->getTranslator()->trans('Display short content at the top of content', array(), 'Modules.Stblog.Admin'),
      //      'name' => 'display_short_content',
      //      'validation' => 'isBool',
       //     'default_value' => 0,
       //     'type' => 'switch',
       //     'values' => array(
      //          array(
       //             'id' => 'display_short_content_on',
       //             'value' => 1,
       //             'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
       //         array(
       //             'id' => 'display_short_content_off',
       //             'value' => 0,
         //           'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
       //     ),
      //  ),
        
    ),


 'blog_header' => array(
     
     'blog_header' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Individual blog page header:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_header',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_header_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_header_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        'blog_header_style' => array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Blog header style:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_header_style',
			'options' => array(
                    'query' => $this->blog_header_style,
                    'id' => 'id',
                    'name' => 'name',
                ),
			'validation' => 'isUnsignedInt',
			'validation' => 'isUnsignedInt',
		),
        
        
        'blog_width_header' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_width_header',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_width_header_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_width_header_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
            'blog_sticky_primary_header' => array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display header on sticky header block:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_sticky_primary_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'blog_sticky_primary_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_sticky_primary_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('This option works when the sticky header option is selected in the template setting.', array(), 'Admin.Theme.Transformer')
			
		),  
        
        'blog_header_logo' => array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Display logo on center or left of the header:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_header_logo',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_header_logo_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'blog_header_logo_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        'blog_logo_height' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Primary header height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_logo_height',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('Header includes topbar, primary header and menu. Primary header is the section where the logo is located.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('If the value you set is smaller than the height of your logo, your logo would not be resized down automatically, you need to use the "Logo width" under the "logo" tab to reduce the size of your logo to make everything look fine.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('The height of your logo is', array(), 'Modules.Stthemeeditor.Admin').Configuration::get('SHOP_LOGO_HEIGHT'),
				),
		),
        
        
        'blog_header_bg_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_header_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		'blog_header_con_bg_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_header_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		'blog_header_bottom_border' => array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_header_bottom_border',
			'options' => array(
                    'query' => $this->blog_topbar_b_border,
                    'id' => 'id',
                    'name' => 'name',
                ),
			'validation' => 'isUnsignedInt',
			'validation' => 'isUnsignedInt',
		),
		'blog_header_bottom_border_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_header_bottom_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 'blog_header_text_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Header text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_header_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 'blog_header_link_hover_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_header_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		'blog_header_text_trans' => array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Header text transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_header_text_trans',
			'options' => array(
                'query' => self::$textTransform,
                'id' => 'id',
                'name' => 'name',
            ),
			'validation' => 'isUnsignedInt',
		),
		
		
		'blog_logo_image_field' => array(
            'type' => 'file',
            'label' => $this->getTranslator()->trans('Blog logo:', array(), 'Modules.Stthemeeditor.Admin'),
            'name' => 'blog_logo_image_field',
            'desc' => $this->getTranslator()->trans('Upload your logo if you want a different logo on your blog pages than on other store pages.', array(), 'Modules.Stthemeeditor.Admin'),
        ),
        
        
            'blog_header_left_alignment' => array(
            'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header left alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_header_left_alignment',
			'values' => array(
				array(
					'id' => 'blog_header_left_alignment_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_header_left_alignment_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_header_left_alignment_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		
		    'blog_header_center_alignment' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header center alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_header_center_alignment',
			'values' => array(
				array(
					'id' => 'blog_header_center_alignment_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_header_center_alignment_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_header_center_alignment_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		
		'blog_header_right_alignment' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header right alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_header_right_alignment',
			'values' => array(
				array(
					'id' => 'blog_header_right_alignment_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_header_right_alignment_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_header_right_alignment_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		
		'blog_header_right_bottom_alignment' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header right bottom alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_header_right_bottom_alignment',
			'values' => array(
				array(
					'id' => 'blog_header_right_bottom_alignment_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_header_right_bottom_alignment_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_header_right_bottom_alignment_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
        
        
        ),
     
        
        
        'blog_topbar' => array(
            'blog_topbar_show' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Show topbar:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_topbar_show',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_topbar_show_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_topbar_show_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    
            ),
            'validation' => 'isUnsignedInt',
        ),
        
                
        'blog_width_topbar' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_width_topbar',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_width_topbar_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_width_topbar_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
         'blog_sticky_primary_topbar' => array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display topbar on sticky header block:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_sticky_primary_topbar',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'blog_sticky_primary_topbar_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_sticky_primary_topbar_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('This option works when the sticky header option is selected in the template setting.', array(), 'Admin.Theme.Transformer')
			
		),  
		
		
		'blog_topbar_text_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_topbar_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		
		'blog_topbar_link_hover_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar link hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_topbar_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 'blog_topbar_header_link_hover_bg' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar link hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_topbar_header_link_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 'blog_topbar_height' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Topbar height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_topbar_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		
		
		'blog_header_topbar_bg' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top bar background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_header_topbar_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		
		 
		 'blog_topbar_b_border' => array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Bottom border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_topbar_b_border',
			'options' => array(
                    'query' => $this->blog_topbar_b_border,
                    'id' => 'id',
                    'name' => 'name',
                ),
			'validation' => 'isUnsignedInt',
		),
		 'blog_topbar_b_border_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Bottom border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_topbar_b_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		
        
        ),
      

        'author_page' => array(
     
          
        'author_category_id' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Blog authors main author category id:', array(), 'Admin.Theme.Transformer'),
			'name' => 'author_category_id',
            'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-lg',
     	
			
		),
		
		'blog_cat_author_info' => array(
            'label' => $this->getTranslator()->trans('Presentation of information about the author on the page with his articles:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_cat_author_info',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'blog_cat_author_info_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'blog_cat_author_info_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
           ),
           
           
           'author_page_category' => array(
     
          
       'blog_cat_author' => array(
            'label' => $this->getTranslator()->trans('Whether to show the zone with the authors in the category box:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_cat_author',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'blog_cat_author_on',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'blog_cat_author_off',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
        'blog_cat_author_on' => array(
            'label' => $this->getTranslator()->trans('Whether the zone with authors should be expanded by default:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_cat_author_on',
            'validation' => 'isUnsignedInt',
            'default_value' => 1,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'blog_cat_author_on_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                 array(
                    'id' => 'blog_cat_author_on_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
         'blog_cat_author_style' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('The form of presenting the zone with the authors:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_cat_author_style',
			'values' => array(
				array(
					'id' => 'blog_cat_author_style_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('In bulleted form', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_cat_author_style_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('In the form of a cloud of tags', array(), 'Admin.Theme.Transformer')),
					),
			
			'validation' => 'isUnsignedInt',
		), 
		
		'blog_cat_author_qt' => array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Presentation of the number of articles:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_cat_author_qt',
			'values' => array(
				array(
					'id' => 'blog_cat_author_qt_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_cat_author_qt_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Always', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_cat_author_qt_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only in the authors', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blog_cat_author_qt_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Only in categories', array(), 'Admin.Theme.Transformer')),
					),
			
			'validation' => 'isUnsignedInt',
		), 
        
          
        
           ),
           
           
           


'blog_footer' => array(
     
          
        'blog_footer' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Individual blog page footer:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
      
        
         'blog_width_footer_stacked' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_width_footer_stacked',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_width_footer_stacked_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_width_footer_stacked_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
       
        
        'blog_footer_stacked_one' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Will show a stacked zone 1:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_stacked_one',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_stacked_one_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_stacked_one_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
         'blog_footer_stacked_two' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Will show a stacked zone 2:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_stacked_two',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_stacked_two_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_stacked_two_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        'blog_footer_stacked_three' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Will show a stacked zone 3:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_stacked_three',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_stacked_three_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_stacked_three_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
         'blog_footer_stacked_four' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Will show a stacked zone 4:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_stacked_four',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_stacked_four_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_stacked_four_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),

         'blog_footer_stacked_five' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Will show a stacked zone 5:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_stacked_five',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_stacked_five_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_stacked_five_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        'blog_footer_stacked_six' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Will show a stacked zone 6:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_stacked_six',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_stacked_six_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_stacked_six_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
         'blog_footer_show' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Will show a standard footer:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_show',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_show_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_show_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        'blog_footer_show_after' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Will show a standard footer after:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_show_after',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_show_after_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_show_after_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
     
        
        
        'blog_footer_author' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Whether to show the zone with the authors:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_author',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_author_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_author_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        ),
        
        'blog_footer_top' => array(
     
          
        'blog_footer_top_width' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_top_width',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_top_width_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_top_width_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        'blog_footer_top_width_max' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Max width zone:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_footer_top_width_max',
            'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	
			
		),
		
		'blog_footer_top_padding_top' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Middle zone spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_top_padding_top',
		     'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			),
		
		 'blog_footer_top_padding_bottom' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Middle zone spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_top_padding_bottom',
		    'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
   		),
		
		
		'blog_footer_top_padding_left' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Padding the entire zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_top_padding_left',
		    'validation' => 'isAnything',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
		),
		
		 'blog_footer_top_padding_right' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Padding the entire zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_top_padding_right',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
         	'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
        
        'blog_footer_top_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_top_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
        
		 'blog_footer_top_color_con' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_footer_top_color_con',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 
		 'blog_footer_top_text_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_top_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 'blog_footer_top_link_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_top_link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 'blog_footer_top_hover_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_top_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 
        
        ),
        
        'blog_footer_middle' => array(
    
        'blog_footer_middle_width' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_middle_width',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_middle_width_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_middle_width_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
         'blog_footer_middle_width_max' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Max width zone:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_footer_middle_width_max',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	'validation' => 'isUnsignedInt',
			
		),
		
		
		'blog_footer_middle_padding_top' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Middle zone spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_middle_padding_top',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
		
		 'blog_footer_middle_padding_bottom' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Middle zone spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_middle_padding_bottom',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
		
		
		'blog_footer_middle_padding_left' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Padding the entire zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_middle_padding_left',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
		
		 'blog_footer_middle_padding_right' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Padding the entire zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_middle_padding_right',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
          	'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
        
        'blog_footer_middle_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_middle_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
        
		 'blog_footer_middle_color_con' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_footer_middle_color_con',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 
		 'blog_footer_middle_text_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_middle_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 'blog_footer_middle_link_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_middle_link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 'blog_footer_middle_hover_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_middle_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
        
        ),
        
        
        'blog_footer_bottom' => array(
    
        'blog_footer_bottom_width' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_bottom_width',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_bottom_width_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_bottom_width_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
         'blog_footer_bottom_width_max' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Max width zone:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_footer_bottom_width_max',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	'validation' => 'isUnsignedInt',
			
		),
		
		'blog_footer_bottom_padding_top' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Middle zone spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_bottom_padding_top',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
		
		 'blog_footer_bottom_padding_bottom' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Middle zone spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_bottom_padding_bottom',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
		
		
		'blog_footer_bottom_padding_left' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Padding the entire zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_bottom_padding_left',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
          	'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
		
		 'blog_footer_bottom_padding_right' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Padding the entire zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_bottom_padding_right',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
         	'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
		
        'blog_footer_bottom_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_bottom_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
        
		 'blog_footer_bottom_color_con' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_footer_bottom_color_con',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 
		 'blog_footer_bottom_text_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_bottom_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 'blog_footer_bottom_link_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_bottom_link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 'blog_footer_bottom_hover_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_bottom_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
        
        ),
        
        'blog_footer_stacked' => array(
    
        'blog_footer_stacked_width' => array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
            'name' => 'blog_footer_stacked_width',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'blog_footer_stacked_width_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_footer_stacked_width_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
               
                
                
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        'blog_footer_stacked_width_max' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Max width zone:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_footer_stacked_width_max',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	'validation' => 'isUnsignedInt',
			
		),
        
        'blog_footer_stacked_zone' => array(
                'type' => 'select',
                'label' => $this->getTranslator()->trans('The width of the first column in the zone:', array(), 'Admin.Theme.Transformer'),
                'name' => 'blog_footer_stacked_zone',
                'options' => array(
                    'query' => $this->blog_footer_stacked_zone,
                    'id' => 'id',
                    'name' => 'name',
                ),
                'validation' => 'isAnything',
               
            ),
            
        'blog_footer_stacked_padding_top' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Middle zone spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_stacked_padding_top',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'validation' => 'isAnything',
            'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
		
		 'blog_footer_stacked_padding_bottom' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Middle zone spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_stacked_padding_bottom',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'validation' => 'isAnything',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
		),
		
		
		'blog_footer_stacked_padding_left' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Padding the entire zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_stacked_padding_left',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
     	    'validation' => 'isAnything', 
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width > 768px)', array(), 'Admin.Theme.Transformer'),
    
		),
		
		 'blog_footer_stacked_padding_right' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Padding the entire zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_stacked_padding_right',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
          	'validation' => 'isAnything',
		    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>Device size (screen width < 768px)', array(), 'Admin.Theme.Transformer'),
    
			
		),
        
        'blog_footer_stacked_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_stacked_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 'blog_footer_stacked_color_con' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blog_footer_stacked_color_con',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 
		 'blog_footer_stacked_text_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_stacked_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 'blog_footer_stacked_link_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_stacked_link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 'blog_footer_stacked_hover_color' => array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'blog_footer_stacked_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		   
        
        
        ),
      
);