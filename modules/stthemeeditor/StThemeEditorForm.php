<?php
$fields_form = array();
$fields_form[0]['form'] = array(
	'input' => array(
	/*	array(
			'type' => 'html',
			'id' => '',
			'label' => $this->getTranslator()->trans('One-click demo importer:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '<button type="button" id="import_export" class="btn btn-default"><i class="icon process-icon-new-module"></i> '.$this->getTranslator()->trans('Import/export', array(), 'Modules.Stthemeeditor.Admin').'</button><input type="hidden" name="id_tab_index" value="0" />',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display switch back to desktop version link on mobile devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'version_switching',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'version_switching_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'version_switching_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('This option allows visitors to manually switch between mobile and desktop versions on mobile devices.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Maximum Page Width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'responsive_max',
			'values' => array(
				array(
					'id' => 'responsive_max_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('992', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'responsive_max_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('1200', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'responsive_max_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('1440', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'responsive_max_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full screen', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Maximum width of the page', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Box style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'boxstyle',
			'values' => array(
				array(
					'id' => 'boxstyle_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'boxstyle_off',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Boxed', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You can change the shadow around the main content when in boxed style under the "Color" tab.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		'left_column_size' => array(
			'type' => 'html',
			'id' => 'left_column_size',
			'label'=> $this->getTranslator()->trans('Left column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('This setting is used to change the width of left column, it would not enable the left column.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		'right_column_size' => array(
			'type' => 'html',
			'id' => 'right_column_size',
			'label'=> $this->getTranslator()->trans('Right column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('This setting is used to change the width of right column, it would not enable the right column.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Slide left/right column:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'slide_lr_column',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'slide_lr_column_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'slide_lr_column_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Click the "Left"/"right" button to slide the left/right column out on mobile devices.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		'quarter' => array(
			'type' => 'html',
			'id' => 'quarter',
			'label'=> $this->getTranslator()->trans('Set the width of columns/quarters on homepage:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('The sum of them should be 12. For example if you only need two columns, then set the width of 3rd quarter and 4th quareter to 0:', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Page top spacing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'top_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Page bottom spacing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'bottom_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
	//	array(
	//		'type' => 'text',
	//		'label' => $this->getTranslator()->trans('Block spacing:', array(), 'Admin.Theme.Transformer'),
	//		'name' => 'block_spacing',
	//		'validation' => 'isUnsignedInt',
	//		'prefix' => 'px',
	//		'class' => 'fixed-width-lg',
	//		'desc' => $this->getTranslator()->trans('This is used to change spacings between blocks', array(), 'Modules.Stthemeeditor.Admin'),
	//	),
		/*'hometab_pro_per' => array(
			'type' => 'html',
			'id' => 'hometab_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns for Homepage tab', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),*/

		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Enable animation:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'animation',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'animation_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'animation_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Cart icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_icon',
			'values' => $this->get_fontello(),
		),
		/*
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Wishlist icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'wishlist_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Love icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'love_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Compare icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'compare_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Quick view icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'quick_view_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('View icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'view_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Login icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sign_icon',
			'values' => $this->get_fontello(),
		), */
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Guest welcome message:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'welcome',
			'size' => 64,
			'lang' => true,
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logged welcome message:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'welcome_logged',
			'size' => 64,
			'lang' => true,
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Add a link to welcome message:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'welcome_link',
			'size' => 64,
			'lang' => true,
		),
		
	
	/*Welcome to Transformer themearray(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Copyright text:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'copyright_text',
			'lang' => true,
			'cols' => 60,
			'rows' => 2,
		),
		/*	array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Search label:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'search_label',
			'lang' => true,
			'required' => true,
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Newsletter label:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'newsletter_label',
			'lang' => true,
			'required' => true,
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Iframe background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'lb_bg_color',
			'size' => 33,
			'desc' => $this->getTranslator()->trans('Set iframe background if transparency is not allowed.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		
		'payment_icon' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Payment icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_image_field',
			'desc' => '',
		),*/
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Navigation pipe:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'navigation_pipe',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Used for the navigation path: Store Name > Category Name > Product Name.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Custom fonts:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'custom_fonts',
			'class' => 'fixed-width-xxl',
			'desc' => $this->getTranslator()->trans('Each font name has to be separated by a comma (","). Please refer to the Documenation to lear how to add custom fonts.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
		
		array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Browser color:', array(), 'Modules.Stthemeeditor.Admin'),
                    'name' => 'color_browser',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fits popup images vertically:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'popup_vertical_fit',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'popup_vertical_fit_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'popup_vertical_fit_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Popup images will be resized down to be in full screen vertically, if they are larger than the height of screen.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to open drop down lists:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'drop_down',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'drop_down_click',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Click', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'drop_down_hover',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Mouse hover', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isBool',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fits product popup images vertically:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_popup_vertical_fit',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_popup_vertical_fit_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_popup_vertical_fit_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => $this->getTranslator()->trans('This setting is For product thumbnail images on the product page.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Enable responsive layout:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'responsive',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'responsive_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'responsive_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => array(
					 $this->getTranslator()->trans('Enable responsive design for mobile devices.', array(), 'Modules.Stthemeeditor.Admin'),
					 $this->getTranslator()->trans('If this option is off, the Maximum Page Width of your site is 1440px, which means you can not have a full screen site if this option is off.', array(), 'Modules.Stthemeeditor.Admin'),
				),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('keep product variables in ajax search response:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'remove_products_variable',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'remove_products_variable_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'remove_products_variable_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Refer to the documentation to know more about this option, generally just keep it off.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('The style of input fields in forms:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'input_fields',
			'values' => array(
							array(
					'id' => 'input_fields_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Label', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'input_fields_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Placeholder', array(), 'Modules.Stthemeeditor.Admin')),
				
				 array(
					'id' => 'input_fields_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Animation Placeholder', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		), 
		
		  array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('The style of border input fields in forms:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'input_fields_border',
			'values' => array(
							array(
					'id' => 'input_fields_border_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('One border', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'input_fields_border_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Four border', array(), 'Modules.Stthemeeditor.Admin')),

                array(
					'id' => 'input_fields_border_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No border', array(), 'Modules.Stthemeeditor.Admin')),
				 array(
					'id' => 'input_fields_border_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('No border whith shadow', array(), 'Modules.Stthemeeditor.Admin')),
				 			
			),
			'validation' => 'isUnsignedInt',
	         	), 
	         	
	         	
	         	 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('The error messages in the form for the animated placeholder', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'placeholder_error',
			'values' => array(
				array(
					'id' => 'placeholder_error_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only graphic icon in text', array(), 'Modules.Stthemeeditor.Admin')),

               array(
					'id' => 'placeholder_error_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Only graphic icon in input', array(), 'Modules.Stthemeeditor.Admin')),
				 array(
					'id' => 'placeholder_error_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Only text', array(), 'Modules.Stthemeeditor.Admin')),
				 array(
					'id' => 'placeholder_error_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('Graphic icon in input and text', array(), 'Modules.Stthemeeditor.Admin')),
				 array(
					'id' => 'placeholder_error_6',
					'value' => 6,
					'label' => $this->getTranslator()->trans('Graphic icon in text and text', array(), 'Modules.Stthemeeditor.Admin')),
				 			
			),
			'validation' => 'isUnsignedInt',
	         	), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Copyright ep:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'copyright_ep',
			'values' => array(
							array(
					'id' => 'copyright_ep_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'copyright_ep_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Logo black', array(), 'Modules.Stthemeeditor.Admin')),
				array(
                     'id' => 'copyright_ep_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Logo red', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'copyright_ep_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Text', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 

	array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('My account page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'my_account',
			'values' => array(
							array(
					'id' => 'my_account_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('With left column', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'my_account_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('No left column', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		), 
	),
	
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[23]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Product block settings', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'description' => $this->getTranslator()->trans('Settings here are for products in product sliders and products on product listings. You need to clear the Smarty cache after making changes here.', array(), 'Modules.Stthemeeditor.Admin'),
	'input' => array( 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Retina:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'retina',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'retina_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'retina_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Retina support for logo and product images.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		/*
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Yotpo Star Rating:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'yotpo_sart',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'yotpo_sart_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'yotpo_sart_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */
		
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Whether to display the tax label:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'price_tax',
			'values' => array(
				array(
					'id' => 'price_tax_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'price_tax_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			
		), 
		
		  array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Do display two prices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'two_prices',
			'values' => array(
				array(
					'id' => 'two_prices_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'two_prices_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			
			
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Do display the price tag from:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'prices_tag_from',
			'values' => array(
				array(
					'id' => 'prices_tag_from_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Yes, price from for products with attributes, for other products price', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'prices_tag_from_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Price for all products', array(), 'Modules.Stthemeeditor.Admin')),
                array(
					'id' => 'prices_tag_from_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only price for products with attributes', array(), 'Modules.Stthemeeditor.Admin')),
                 array(
					'id' => 'prices_tag_from_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
		                   ),
			'validation' => 'isUnsignedInt',
			
			
		), 
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Tax label in the cart:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'price_tax_cart',
			'values' => array(
				array(
					'id' => 'price_tax_cart_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'price_tax_cart_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			
			
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Tax label in the cart products:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'price_tax_cart_products',
			'values' => array(
				array(
					'id' => 'price_tax_cart_products_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'price_tax_cart_products_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Always', array(), 'Modules.Stthemeeditor.Admin')),
                                array(
					'id' => 'price_tax_cart_products_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only big cart', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			
			
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show the manufacturer in the cart:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'manufacturer_cart',
			'values' => array(
				array(
					'id' => 'manufacturer_cart_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'manufacturer_cart_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Always', array(), 'Modules.Stthemeeditor.Admin')),
                                array(
					'id' => 'manufacturer_cart_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only big cart', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			
			
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Quantity input in top cart - sidebar', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_quantity_input',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'cart_quantity_input_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			
				array(
					'id' => 'cart_quantity_input_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes, with the possibility of changing the quantity', array(), 'Modules.Stthemeeditor.Admin')),
                                array(
					'id' => 'cart_quantity_input_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes, as information under the product', array(), 'Modules.Stthemeeditor.Admin')),

                                array(
					'id' => 'cart_quantity_input_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Yes, as information on the side of the product', array(), 'Modules.Stthemeeditor.Admin')),

			),
			'validation' => 'isUnsignedInt',
			
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('The product reference number in the basket:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ref_cart_products',
			'values' => array(
				array(
					'id' => 'ref_cart_products_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'ref_cart_products_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Always', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'ref_cart_products_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only big cart', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			
			
		),
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display product images on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tm_slider_cate',
			'values' => array(
				array(
					'id' => 'pro_tm_slider_cate_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display the cover images only', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_cate_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display all images in a slider', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_cate_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display all images in a slider with thumbnails below', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_cate_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display all images in a slider with thumbnails below on hover', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => array(
				$this->getTranslator()->trans('Hover image feature and zoom feature would not work when images are in a slider', array(), 'Modules.Stthemeeditor.Admin'),
				$this->getTranslator()->trans('If the cover image you set for a product is not in the images for the default combination, then prestashop will use the first image for the default combination to be the cover image.', array(), 'Modules.Stthemeeditor.Admin'),
			),
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display product images on other places:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tm_slider',
			'values' => array(
				array(
					'id' => 'pro_tm_slider_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display the cover images only', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display all images in a slider', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display all images in a slider with thumbnails below', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display all images in a slider with thumbnails below on hover', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => array(
				$this->getTranslator()->trans('Hover image feature and zoom feature would not work when images are in a slider', array(), 'Modules.Stthemeeditor.Admin'),
				$this->getTranslator()->trans('If the cover image you set for a product is not in the images for the default combination, then prestashop will use the first image for the default combination to be the cover image.', array(), 'Modules.Stthemeeditor.Admin'),
			),
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product info alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_block_align',
			'values' => array(
				array(
					'id' => 'pro_block_align_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_block_align_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Length of product names:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'length_of_product_name',
			'values' => array(
				array(
					'id' => 'length_of_product_name_normal',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Normal(one line)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'length_of_product_name_long',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Long(70 characters)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'length_of_product_name_full',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Full name', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'length_of_product_name_two',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Two lines, focus all product names having the same height', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Product name font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_name_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Modules.Stthemeeditor.Admin')
				),
			),
			'desc' => '<p id="pro_name_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'pro_name'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Product name font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'pro_name',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product name color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 's_title_block_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Product name transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_name_transform',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Product name size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_name_size',
			'validation' => 'isUnsignedInt',
			'default_value' => 0,
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show fly-out buttons:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons',
			'values' => array(
				array(
					'id' => 'flyout_buttons_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Right below product image', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_buttons_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('At the bottom of product image when mouse hover', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_buttons_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('At the very bottom of product', array(), 'Modules.Stthemeeditor.Admin')),
				
				
  array(
					'id' => 'flyout_buttons_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('At the left in product image when mouse hover', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		), 
		
		       array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display text in fly-out buttons', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'text_fl_buttons',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'text_fl_buttons_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'text_fl_buttons_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Lenght of fly-out buttons:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_style',
			'values' => array(
				array(
					'id' => 'flyout_buttons_style_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Buttons have the same length', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_buttons_style_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Uneven length, stretch buttons', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'default_value' => 0,
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Fly-out buttons on mobile devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_on_mobile',
			'values' => array(
				array(
					'id' => 'flyout_buttons_on_mobile_show',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Show them all the time', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_buttons_on_mobile_hide',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Hide', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_buttons_on_mobile_cart',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display "Add to cart" button only if it is in fly-out', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display "Add to cart" buttons:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_add_to_cart',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'display_add_to_cart_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display as buttons, show out when mouse hover', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Display as links, show out when mouse hover', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display as buttons', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('Display as links', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display in fly-out buttons', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Hide', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
			//'desc' => $this->getTranslator()->trans('The first two options may be affected by the setting of how to displaying View more buttons. If view buttons are set to be shown out, then add to cart buttons will so be shown out, the "show out when mouse hover" would not take effect.', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display "Add to cart" buttons in grid view on mobile device:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mobile_add_to_cart',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'mobile_add_to_cart_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'mobile_add_to_cart_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Quantity input', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_quantity_input',
			'default_value' => 2,
			'values' => array(
				array(
					'id' => 'pro_quantity_input_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display quantity inputs along with "Add to cart" buttons', array(), 'Modules.Stthemeeditor.Admin')),
			
				array(
					'id' => 'pro_quantity_input_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('If this setting is enable and the add to cart button is in the fly-out, then the add to cart button will be moved down to the product name.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display the "Quick view" button in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_quickview',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'flyout_quickview_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_quickview_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isBool',
		),
	 
		/*
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display the "Add to wishlist" button in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_wishlist',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'flyout_wishlist_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_wishlist_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),

		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display the "Love" button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_love',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'display_love_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display in the fly-out button', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_love_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display on the top left hand side corner', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_love_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display on the top right hand side corner', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		*/
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display the "View more" button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'use_view_more_instead',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'use_view_more_instead_fly_out',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Yes, in the fly-out button', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'use_view_more_instead_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display the "View more" button below the product name', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'use_view_more_instead_always',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display the "View more" button below the product name when mouse hover over', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'use_view_more_instead_off',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('The sencond options may be affected by the setting of how to displaying Add to cart buttons. If Add to cart buttons are set to be shown out, then View more buttons will so be shown out, the "show out when mouse hover" would not take effect.', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		
		  array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Button style see more:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'view_more_button_style',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'view_more_button_style_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Button with the icon', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'view_more_button_style_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Button without icon', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'view_more_button_style_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Button with an arrow', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'view_more_button_style_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('As content', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'view_more_button_style_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Lower border after moving the mouse (border)', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'view_more_button_style_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('Lower border visible immediately', array(), 'Admin.Theme.Transformer')),
  

 ),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('These options apply to the button located in the bottom zone of the box.', array(), 'Modules.Stthemeeditor.Admin'),
	
		),
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('On which pages should you see the button? See more:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'view_more_button_page',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'view_more_button_page_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('On all pages', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'view_more_button_page_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only on the home page', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'view_more_button_page_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('On all pages beyond the home page', array(), 'Admin.Theme.Transformer')),
				
  

 ),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('These options apply to the button located in the bottom zone of the box.', array(), 'Modules.Stthemeeditor.Admin'),
	
	
		),
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('View information on availability and shipping time:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_avail_info_cat',
			'values' => array(
			    array(
					'id' => 'show_avail_info_cat_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_avail_info_cat_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display all information', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_avail_info_cat_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display only stock information', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_avail_info_cat_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display only the shipping time information', array(), 'Admin.Theme.Transformer')),
				
				
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('On which pages should you show availability and shipping information:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'avail_shipp_page',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'avail_shipp_page_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('On all pages', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'avail_shipp_page_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only on the home page', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'avail_shipp_page_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('On all pages beyond the home page', array(), 'Admin.Theme.Transformer')),
				
  

         ),
			'validation' => 'isUnsignedInt',
			
	
	
		),
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display social share links in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_share',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'flyout_share_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_share_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display the "Add to compare" button in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_comparison',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'flyout_comparison_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_comparison_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display product short descriptions:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_short_desc_on_grid',
			'values' => array(
				array(
					'id' => 'show_short_desc_on_grid_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_short_desc_on_grid_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes, 200 characters', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_short_desc_on_grid_full',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes, full short description', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 

		/*array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show product attributes:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_pro_attr',
			'values' => array(
				array(
					'id' => 'display_pro_attr_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_attr_all',
					'value' => 1,
					'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_attr_in_stock',
					'value' => 2,
					'label' => $this->getTranslator()->trans('In stock only', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), */
		 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Hide discount info(Like -5%, -8$):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'hide_discount',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'hide_discount_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'hide_discount_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show product colors out:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_color_list',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_color_list_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_color_list_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display product attribute on other page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'att_presentation',
			'values' => array(
		array(
					'id' => 'att_presentation_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'att_presentation_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Visible immediately', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'att_presentation_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Visible like a hover', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		), 


		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display product attribute on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'att_presentation_cat',
			'values' => array(
		 array(
					'id' => 'att_presentation_cat_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'att_presentation_cat_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Visible immediately', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'att_presentation_cat_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Visible like a hover', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show manufacturer/brand name:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_list_display_brand_name',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_list_display_brand_name_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes, as content', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_list_display_brand_name_img',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes, as a picture', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_list_display_brand_name_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show default category name:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_display_category_name',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_display_category_name_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_display_category_name_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_display_category_name_ondesk',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Hide on mobile (screen width < 767px)', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_display_category_name_onmob',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Hide on PC (screen width > 768px)', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		
		       array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Content with the default category: Category', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_desc_text_info',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'category_desc_text_info_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_desc_text_info_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
  

 ),
			'validation' => 'isUnsignedInt',
		),
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('On which pages should the product default category be shown:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'default_category_page',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'default_category_page_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('On all pages', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'default_category_page_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only on the home page', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'default_category_page_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('On all pages beyond the home page', array(), 'Admin.Theme.Transformer')),
				
  

 ),
			'validation' => 'isUnsignedInt',
			
	
		),
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Zoom product images on hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_img_hover_scale',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_img_hover_scale_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_img_hover_scale_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Border size:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_border_size',
			'validation' => 'isUnsignedInt',
			'default_value' => 0,
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_border_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Shadows around product images:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_shadow_effect',
			'values' => array(
				array(
					'id' => 'pro_shadow_effect_hover',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Show shadows when mouseover', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_shadow_effect_on',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_shadow_effect_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),  
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_h_shadow',
			'validation' => 'isInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The position of the horizontal shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('V-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_v_shadow',
			'validation' => 'isInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The position of the vertical shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The blur distance of shadow:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_shadow_blur',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_shadow_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_shadow_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[1]['form'] = array(
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Default product listing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_view',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_view_grid',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Grid', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_view_list',
					'value' => 1,
					'label' => $this->getTranslator()->trans('List', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),  
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Headlines for the entire width of the page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_full',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'category_full_1',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_full_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Standard width', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Additional description at the bottom of the category (from the additional content module):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_full_plus',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'category_full_plus_1',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Width of the area with products', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_full_plus_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('The entire width of the store', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Category description developed:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_desc_open',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'category_desc_open_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Visible always', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_desc_open_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Always rolled up', array(), 'Admin.Theme.Transformer')),
                                array(
					'id' => 'category_desc_open_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Hide on small screen devices (screen width < 768px)', array(), 'Admin.Theme.Transformer')),
                                array(
					'id' => 'category_desc_open_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Hide on PC (screen width > 768px)', array(), 'Admin.Theme.Transformer')),
			              


 ),
			'validation' => 'isUnsignedInt',
		),
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Option to hide the left column on devices above 992px', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'left_column_hide',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'left_column_hide_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Do not show this option', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'left_column_hide_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('The left column is visible by default', array(), 'Admin.Theme.Transformer')),
                                array(
					'id' => 'left_column_hide_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('The left column is hidden by default', array(), 'Admin.Theme.Transformer')),
                               
			              

 ),
			'validation' => 'isUnsignedInt',
		),
		
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Category description only on the first page of the category:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'desc_cat_first',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'desc_cat_first_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'desc_cat_first_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isBool',
		), 
		
		   array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Top description visible when filtering is enabled:', array(), 'Admin.Theme.Transformer'),
			'name' => 'desc_filtr_active',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'desc_filtr_active_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'desc_filtr_active_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
        
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Default product view for mobile devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_view_mobile',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'product_view_mobile_grid',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_view_mobile_list',
					'value' => 1,
					'label' => $this->getTranslator()->trans('List view', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display a swither so customers can decide using grid or list:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_view_swither',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'product_view_swither_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_view_swither_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isBool',
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display a swither so customers can decide using grid or list in mobile:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_view_swither_mobile',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'product_view_swither_mobile_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_view_swither_mobile_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Spacing between products in grid view:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_spacing_grid',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value 15.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Pagination:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'infinite_scroll',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'infinite_scroll_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Pagination', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'infinite_scroll_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Infinite scroll', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'infinite_scroll_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Load more button', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),  
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Pagination top desktop:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_top',
			'default_value' => 0,
			'values' => array(
		array(
					'id' => 'pagination_top_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pagination_top_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Small pagination', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pagination_top_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Big pagination', array(), 'Modules.Stthemeeditor.Admin')),
			
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Pagination top mobile:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_top_mobile',
			'default_value' => 0,
			'values' => array(
		array(
					'id' => 'pagination_top_mobile_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pagination_top_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Small pagination', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pagination_top_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Big pagination', array(), 'Modules.Stthemeeditor.Admin')),
			
			),
			'validation' => 'isUnsignedInt',
		), 
		
		
		 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Pagination bottom desktop:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_bottom',
			'default_value' => 0,
			'values' => array(
		array(
					'id' => 'pagination_bottom_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pagination_bottom_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Pagination bottom mobile:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_bottom_mobile',
			'default_value' => 0,
			'values' => array(
		array(
					'id' => 'pagination_bottom_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pagination_bottom_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		), 
		
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Product count desktop:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_count',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_count_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_count_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			
			),
			'validation' => 'isUnsignedInt',
		),  

		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Product count mobile:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_count_mobile',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_count_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_count_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			
			),
			'validation' => 'isUnsignedInt',
		), 
		
		
		      array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Product sort desktop:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_sort_ds',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_sort_ds_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_sort_ds_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			
			),
			'validation' => 'isUnsignedInt',
		), 
		
		  array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Product sort mobile:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_sort_mobile',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_sort_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_sort_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			
			),
			'validation' => 'isUnsignedInt',
		), 


		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Products per page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'products_per_page',
			'class' => 'fixed-width-lg',
			'desc' => array(
					$this->getTranslator()->trans('Number of products displayed per page.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This is the same setting as the "Products per page" on the "Product settings" page.', array(), 'Modules.Stthemeeditor.Admin'),
				),
			'validation' => 'isUnsignedInt',
		),

		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Lazy load images:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cate_pro_lazy',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cate_pro_lazy_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cate_pro_lazy_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Dose not work for displaying images in sliders', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Features on product list:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'feature_pr_list',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'feature_pr_list_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'feature_pr_list_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		
		),
		
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Id of the features to be displayed:', array(), 'Admin.Theme.Transformer'),
			'name' => 'id_feature_box',
			'validation' => 'isAnything',
			'class' => 'fixed-width-lg',
			),
		
		    array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('On what pages to show product features:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'feature_box_page',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'feature_box_page_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('On all pages', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'feature_box_page_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only on the home page', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'feature_box_page_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('On all pages beyond the home page', array(), 'Admin.Theme.Transformer')),
				
  

 ),
			'validation' => 'isUnsignedInt',
			
	
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Sticky left or right column:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_column',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'sticky_column_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'sticky_column_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Sticky left column', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_column_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Sticky right column', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isGenericName',
		),  
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display filters in desktop (Faceted search module):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'filter_position',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'filter_position_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left/right column', array(), 'Modules.Stthemeeditor.Admin')),
			//	array(
			//		'id' => 'filter_position_1',
			//		'value' => 1,
			//		'label' => $this->getTranslator()->trans('List all filter out on main column.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_position_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display filters as drop down lists on main column.', array(), 'Modules.Stthemeeditor.Admin')),
			//	array(
			//		'id' => 'filter_position_3',
			//		'value' => 3,
			//		'label' => $this->getTranslator()->trans('Display filters as drop down lists on main column, sticky when page scrolls down.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_position_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Display filters in sidebar.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isGenericName',
			'desc' => array(
				$this->getTranslator()->trans('Make sure the Faceted search module is enabled.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		), 
		
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display filters in mobile (Faceted search module):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'filter_position_mobile',
			'default_value' => 1,
			'values' => array(
			//	array(
			//		'id' => 'filter_position_mobile_0',
			//		'value' => 0,
			//		'label' => $this->getTranslator()->trans('Left/right column', array(), 'Modules.Stthemeeditor.Admin')),
			//	array(
			//		'id' => 'filter_position_mobile_1',
			//		'value' => 1,
			//		'label' => $this->getTranslator()->trans('List all filter out on main column.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_position_mobile_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display filters as drop down lists on main column.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_position_mobile_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Display filters in sidebar.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isGenericName',
			'desc' => array(
				$this->getTranslator()->trans('Make sure the Faceted search module is enabled.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		), 
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Collapsing filter option', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'collapsing_filter',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'collapsing_filter_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'collapsing_filter_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                                
			              

 ),
			'validation' => 'isUnsignedInt',
 'desc' => array(
				$this->getTranslator()->trans('This option applies to devices over 992px screen width.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Sidebar mobile button position:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sidebar_mobile_bt_pos',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'sidebar_mobile_bt_pos_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('In the upper zone - next to the pagination', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sidebar_mobile_bt_pos_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('As a button standing above the bottom bar', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		),  
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display filters: sticky:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'filter_sticky',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'filter_sticky_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No sticky', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_sticky_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Sticky mobile', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_sticky_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Sticky dektop', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_sticky_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Sticky dektop and mobile', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isGenericName',
		
		), 

	//	array(
		//	'type' => 'color',
		//	'label' => $this->getTranslator()->trans('Sticky filters background:', array(), 'Modules.Stthemeeditor.Admin'),
		//	'name' => 'sticky_filter_bg',
		//	'class' => 'color',
		//	'size' => 20,
		//	'validation' => 'isColor',
		//),
		//array(
		//	'type' => 'text',
		//	'label' => $this->getTranslator()->trans('Sticky filters background opacity:', array(), 'Modules.Stthemeeditor.Admin'),
		//	'name' => 'sticky_filter_bg_opacity',
		//	'validation' => 'isFloat',
		//	'class' => 'fixed-width-lg',
		//	'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Modules.Stthemeeditor.Admin'),
	//	), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show category title on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_category_title',
			'values' => array(
				array(
					'id' => 'display_category_title_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_category_title_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_category_title_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_category_title_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Right', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show category description on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_category_desc',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_category_desc_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_category_desc_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show full category description on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_cate_desc_full',
			'values' => array(
				array(
					'id' => 'display_cate_desc_full_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_cate_desc_full_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes, at the top of product listing', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_cate_desc_full_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes, at the bottom of product listing', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_cate_desc_full_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Yes, at the bottom of product listing - full width', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show category image on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_category_image',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_category_image_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_category_image_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show subcategories:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_subcate',
			'values' => array(
				array(
					'id' => 'display_subcate_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_subcate_gird',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_subcate_gird_fullname',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Grid view(Display full category name)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_subcate_list',
					'value' => 2,
					'label' => $this->getTranslator()->trans('List view', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		'categories_per' => array(
			'type' => 'html',
			'id' => 'categories_per',
			'label'=> $this->getTranslator()->trans('Subcategories per row in grid view:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Can show a picture of the subcategory;', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'subcaregory_img',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'subcaregory_img_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'subcaregory_img_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Sub-category option in the mobile version as sticky:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'subcaregory_sticky',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'subcaregory_sticky_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'subcaregory_sticky_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Can show a picture of the subcategory in sticky:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'subcaregory_img_sticky',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'subcaregory_img_sticky_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'subcaregory_img_sticky_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display "Show all" button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_show_all_btn',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'category_show_all_btn_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_show_all_btn_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),*/
		/*'cate_sortby_name' => array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Show sort by:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cate_sortby_name',
			'options' => array(
				'query' => $this->_category_sortby,
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => '',
					'label' => $this->getTranslator()->trans('Please select', array(), 'Modules.Stthemeeditor.Admin'),
				),
			),
			'desc' => '',
		),
		array(
			'type' => 'hidden',
			'name' => 'cate_sortby',
			'default_value' => '',
			'validation' => 'isAnything',
		),*/
		'category_per' => array(
			'type' => 'html',
			'id' => 'category_per',
			'label'=> $this->getTranslator()->trans('The number of products per row on listing page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		
		'category_per' => array(
			'type' => 'html',
			'id' => 'category_per',
			'label'=> $this->getTranslator()->trans('The number of products per row on listing page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		
		'category_per_2' => array(
			'type' => 'html',
			'id' => 'category_per_2',
			'label'=> $this->getTranslator()->trans('The number of columns for two columns products listing page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		'category_per_3' => array(
			'type' => 'html',
			'id' => 'category_per_3',
			'label'=> $this->getTranslator()->trans('The number of columns for three columns products listing page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		
		'cate_pro_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Set a different image type for the categor page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cate_pro_image_type',
			'default_value' => 'home_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
			'desc' => $this->getTranslator()->trans('This option would be useful, if you want to show products on homepage and category pages in defferent sizes.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Enable big next button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'big_next_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'big_next_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Last product: link to the next page / link to the contact form:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_variants',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'big_next_variants_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Button next', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'big_next_variants_2',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Contact form', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
	                'desc' => $this->getTranslator()->trans('It works if you enable the: Enable big next button option.', array(), 'Modules.Stthemeeditor.Admin'),
	
		),
		
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Big next button color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Big next button hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Big next button background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Big next button background hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[2]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Color general', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Body font color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('General links color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('General link hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Price color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'price_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ), 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Old price color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'old_price_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ), 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Discount color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'discount_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('For discounts on compact view and product page. Use the Stickers module to manage the layout of discounts on products grid view and list view.', array(), 'Modules.Stthemeeditor.Admin'),
		 ), 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Discount background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'discount_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('For discounts on compact view and product page. Use the Stickers module to manage the layout of discounts on products grid view and list view.', array(), 'Modules.Stthemeeditor.Admin'),
		 ), 
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Primary buttons text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'p_btn_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Primary buttons text hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'p_btn_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Primary buttons background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'p_btn_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Primary buttons background hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'p_btn_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('General border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'base_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('General background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'form_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product grid background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_grid_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product grid hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_grid_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Starts color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'starts_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Right panel background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'side_panel_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Right panel heading color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'side_panel_heading',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Right panel heading background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'side_panel_heading_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[31]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Header cart icon', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(    
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Bag-like cart icon border color or  Cart icon color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_icon_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart icon background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_icon_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_number_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_number_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_number_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
/*$fields_form[41]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Moblie header cart icon', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(    
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Bag-like cart icon border color or  Cart icon color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_icon_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart icon background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_icon_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_number_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_number_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_number_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);*/

$fields_form[32]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Icons', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array( 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon text hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon disabled text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_disabled_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Circle number color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'circle_number_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),  
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Circle number background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'circle_number_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),  
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Right vertical panel border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'right_panel_border',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),    
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[33]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Buttons', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array( 
	
	
	array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Arrows in buttons:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'arrow_buttons',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'arrow_buttons_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'arrow_buttons_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'btn_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button text hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'btn_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button background:', array(), 'Admin.Theme.Transformer'),
			'name' => 'btn_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('Button fill animation would not take effect if this option is filled.', array(), 'Modules.Stthemeeditor.Admin'),
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'btn_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button background & border color when mouse hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'btn_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Button font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'btn_font_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button text hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button background & border color when mouse hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Button fill animation:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'btn_fill_animation',
			'values' => array(
				array(
					'id' => 'btn_fill_animation_fade',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Fade', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'btn_fill_animation_tb',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top to bottom', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'btn_fill_animation_bt',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Bottom to top', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'btn_fill_animation_lr',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Left to right', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'btn_fill_animation_rl',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Right to left', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('This option would not take effect if the above "Button background" field is filled.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Button transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'btn_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout buttons color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout buttons hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout buttons background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout buttons hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout separators color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_separators_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Flyout font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_font_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
/*$fields_form[34]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Breadcrumb', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array( 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Breadcrumb font color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Breadcrumb link hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Breadcrumb width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_width',
			'values' => array(
				array(
					'id' => 'breadcrumb_width_fullwidth',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'breadcrumb_width_normal',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Boxed', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Breadcrumb background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Breadcrumb border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_border',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Breadcrumb border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_border_height',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'default_value' => '',
			'validation' => 'isNullOrUnsignedId',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Modules.Stthemeeditor.Admin'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);*/
$fields_form[20]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Product sliders', array(), 'Admin.Theme.Transformer'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons disabled color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_color_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons disabled background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_bg_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons disabled color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_color_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons disabled background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_bg_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Navigation color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ps_pag_nav_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Navigation hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ps_pag_nav_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[36]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Pagination', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination disabled color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_color_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination disabled background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_bg_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[40]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Boxed style', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show a shadow effect:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'boxed_shadow_effect',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'boxed_shadow_effect_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'boxed_shadow_effect_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'boxed_h_shadow',
			'validation' => 'isInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The position of the horizontal shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('V-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'boxed_v_shadow',
			'validation' => 'isInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The position of the vertical shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow blur distance:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'boxed_shadow_blur',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'boxed_shadow_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'boxed_shadow_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[3]['form'] = array(
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Latin extended support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_latin_support',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_latin_support_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_latin_support_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Latin extended here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Cyrylic support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_cyrillic_support',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_cyrillic_support_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_cyrillic_support_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Cyrylic here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		),  
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Vietnamese support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_vietnamese',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_vietnamese_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_vietnamese_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Vietnamese here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		),  
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Greek support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_greek_support',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_greek_support_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_greek_support_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Greek here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Arabic support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_arabic_support',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_arabic_support_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_arabic_support_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Arabic here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Body font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_text_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_text_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'font_text'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Body font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_text',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Body font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_body_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[27]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Headings', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'description' => $this->getTranslator()->trans('Some settings in this section would be overrided by other modules.', array(), 'Modules.Stthemeeditor.Admin'),
	'input' => array(
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Heading font:', array(), 'Admin.Theme.Transformer'),
			'name' => 'font_heading_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_heading_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'font_heading'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Heading font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_heading',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Heading font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_heading_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Footer heading font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_heading_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Heading transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_heading_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Heading border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bottom_border',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		/*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'headings_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),*/
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'block_headings_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bottom_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading border highlight color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bottom_border_color_h',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_style',
			'values' => array(
				array(
					'id' => 'heading_style_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Under line', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'heading_style_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('One line. Can not have background image', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'heading_style_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('One dashed line. Can not have background image', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'heading_style_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Two lines', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'heading_style_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('One short line. Can not have background image', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'icon_path' => $this->_path,
			'desc' => $this->getTranslator()->trans('Pay attention to the "Heading border height" setting above.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Heading background pattern:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(7),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Modules.Stthemeeditor.Admin'),
				),
			),
			'desc' => $this->getPatterns(7,'heading_bg'),
			'validation' => 'isUnsignedInt',
		),
		'heading_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Heading background image:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bg_image_field',
			'desc' => '',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

/*$fields_form[29]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Headings on the left/right column ', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Heading bottom border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_column_bottom_border',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);*/
$fields_form[28]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Others', array(), 'Admin.Theme.Transformer'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Price font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_price_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_price_list_example" class="fontshow">$12345.67890</p>',
		),
		'font_price'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Price font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_price',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Price font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_price_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Price font size for the main price on the product page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_main_price_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Old price font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_old_price_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Add to cart button font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_cart_btn_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_cart_btn_list_example" class="fontshow">Add to cart</p>',
		),
		'font_cart_btn'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Add to cart button font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_cart_btn',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[65]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Font size', array(), 'Admin.Theme.Transformer'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H1 size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cms_h1_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Force the size of h1 tags on cms page, blog pages and product descriptions.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H2 size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cms_h2_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Force the size of h2 tags on cms page, blog pages and product descriptions.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H3 size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cms_h3_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Force the size of h3 tags on cms page, blog pages and product descriptions.', array(), 'Modules.Stthemeeditor.Admin'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[4]['form'] = array(
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'fullwidth_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'fullwidth_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'fullwidth_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header left alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_left_alignment',
			'values' => array(
				array(
					'id' => 'header_left_alignment_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_left_alignment_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_left_alignment_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header center alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_center_alignment',
			'values' => array(
				array(
					'id' => 'header_center_alignment_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_center_alignment_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_center_alignment_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header right alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_right_alignment',
			'values' => array(
				array(
					'id' => 'header_right_alignment_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_right_alignment_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_right_alignment_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header right bottom alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_right_bottom_alignment',
			'values' => array(
				array(
					'id' => 'header_right_bottom_alignment_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_right_bottom_alignment_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_right_bottom_alignment_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
        'mobile_logo_image_field' => array(
            'type' => 'file',
            'label' => $this->getTranslator()->trans('Mobile logo:', array(), 'Modules.Stthemeeditor.Admin'),
            'name' => 'mobile_logo_image_field',
            'desc' => $this->getTranslator()->trans('If you want to have a different logo for mobile, then uplaod a logo here.', array(), 'Modules.Stthemeeditor.Admin'),
        ),
		'retina_logo_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Retina logo:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'retina_logo_image_field',
			'desc' => $this->getTranslator()->trans('The size of retina logo should be twice of your logo/mobile logo or at least keep the same ratio.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		
		'logo_mobile_svg' =>  array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Logo mobile type svg:', array(), 'Admin.Theme.Transformer'),
			'name' => 'logo_mobile_svg',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'logo_mobile_svg_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'logo_mobile_svg_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		'logo_height' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Primary header height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_height',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('Header includes topbar, primary header and menu. Primary header is the section where the logo is located.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('If the value you set is smaller than the height of your logo, your logo would not be resized down automatically, you need to use the "Logo width" under the "logo" tab to reduce the size of your logo to make everything look fine.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('The height of your logo is', array(), 'Modules.Stthemeeditor.Admin').Configuration::get('SHOP_LOGO_HEIGHT'),
				),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Header bottom spacing on the homepage:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bottom_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The default value is.', array(), 'Modules.Stthemeeditor.Admin').' 12px',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Header text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Header text transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_text_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Dropdown text hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'dropdown_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Dropdown background hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'dropdown_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'header_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_repeat',
			'values' => array(
				array(
					'id' => 'header_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_position',
			'values' => array(
				array(
					'id' => 'header_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bottom_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bottom_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[30]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Top-bar', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width top-bar:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'fullwidth_topbar',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'fullwidth_topbar_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'fullwidth_topbar_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Top-bar in checkout, login and register page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'checkout_topbar',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'checkout_topbar_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'checkout_topbar_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		
		
		
		
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar link hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar link hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_link_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Topbar height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top bar background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_topbar_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Bottom border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_b_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Bottom border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_b_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Top bar separators style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_topbar_sep_type',
			'values' => array(
				array(
					'id' => 'header_topbar_sep_type_vertical',
					'value' => 'vertical-s',
					'label' => $this->getTranslator()->trans('Vertical', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_topbar_sep_type_horizontal',
					'value' => 'horizontal-s',
					'label' => $this->getTranslator()->trans('Horizontal', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_topbar_sep_type_horizontal_fullheight',
					'value' => 'horizontal-s-fullheight',
					'label' => $this->getTranslator()->trans('Vertical full height', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'header_topbar_sep_space',
					'value' => 'space-s',
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isGenericName',
		), 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top bar separators color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_topbar_sep',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[5]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Main menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Megamenu position:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'megamenu_position',
			'values' => array(
				array(
					'id' => 'megamenu_position_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_position_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_position_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_position_full',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full width, all main menu items have even width', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => array(
				$this->getTranslator()->trans('This seting would not take effect if your menu is in header.', array(), 'Modules.Stthemeeditor.Admin'),
				$this->getTranslator()->trans('This seting also would not take effect if you put Cart block or Search box or any other content along with the menu.', array(), 'Modules.Stthemeeditor.Admin'),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Megamenu effects:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'megamenu_hover',
			'values' => array(
				array(
					'id' => 'megamenu_hover_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_hover_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Arrows', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_hover_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Moving border', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_hover_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Booth', array(), 'Admin.Theme.Transformer')),
			),
			
			'validation' => 'isUnsignedInt',
		),
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Automatically highlight current category in menu:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_highlight',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'menu_highlight_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_highlight_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			), 
			'desc' => $this->getTranslator()->trans('Turning this setting on may slow your page load time.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		),*/
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Megamenu width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'megamenu_width',
			'values' => array(
				array(
					'id' => 'megamenu_width_normal',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Boxed', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_width_fullwidth',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
	//		'desc' => $this->getTranslator()->trans('Set this optoin to Full with, when menu is not on displayMainMenu hook.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Hide the "title" text of menu items when mouse over:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_title',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'menu_title_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_title_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Blurred background under the menu:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'blurred_menu_bg',
			'is_bool' => true,
			'values' => array(
                                array(
					'id' => 'blurred_menu_bg_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'blurred_menu_bg_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Blurred background and elements', array(), 'Admin.Theme.Transformer')),
				
				array(
				       'id' => 'blurred_menu_bg_bg',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Tinted background', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How do submenus appear:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'submemus_animation',
			'values' => array(
		
				array(
					'id' => 'submemus_animation_fadein',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Slide in', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'submemus_animation_slidedown',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Slide down', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Menu height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'st_menu_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The value of this field should be greater than 22', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu bottom border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_bottom_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu bottom border color when mouse hovers over:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_bottom_border_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The height of menu bottom border:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_bottom_border',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		'main_menu_spacing' => array(
			'type' => 'html',
			'id' => 'main_menu_spacing',
			'label'=> $this->getTranslator()->trans('The spacing between main menu items', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu item color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu item hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu container background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu item hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu block background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'top_extra_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Main menu block top spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'top_extra_top_spacing',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Main menu block bottom spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'top_extra_bottom_spacing',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main menu block bottom border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'top_extra_bottom_border',
			'options' => array(
				'query' => array_slice(self::$border_style_map,0,10),
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu block bottom border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'top_extra_bottom_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main menu font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_menu_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main menu font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Main menu font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main menu text transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_menu_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('2nd level color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_menu_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('2nd level hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_menu_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('2nd level font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="second_font_menu_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'second_font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('2nd level font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'second_font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('2nd level font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('3rd level color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_menu_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('3rd level hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_menu_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('3rd level font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="third_font_menu_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'third_font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('3rd level font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'third_font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('3rd level font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[51]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Mobile menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items1_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items1_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('2nd level color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items2_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('2nd level background color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items2_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('3rd level color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items3_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('3rd level background color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items3_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[52]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Multi level menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Sub menus background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_multi_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Sub menus hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_multi_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[53]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Dropdown vertical menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Automatically open the menu on homepage:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_open',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'menu_ver_open_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_ver_open_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to show sub menus:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_sub_style',
			'values' => array(
				array(
					'id' => 'menu_ver_sub_style_1',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Normal', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_ver_sub_style_2',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Sub menus align to the top and have the same height as the vertical menu.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Width of the vertical menu title:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_title_width',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Vertical menu title alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_title_align',
			'values' => array(
				array(
					'id' => 'menu_ver_title_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_ver_title_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_ver_title_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu title color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_title',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu title hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_hover_title',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu title background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu title hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Vertical menu items font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ver_font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="ver_font_menu_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'ver_font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Vertical menu items font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'ver_font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Vertical menu items font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ver_font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu items color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_item_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu items background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_item_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu items hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_item_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu items hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_item_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[21]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Left/right column menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
		   'type' => 'color',
		   'label' => $this->getTranslator()->trans('Menu background:', array(), 'Modules.Stthemeeditor.Admin'),
		   'name' => 'c_menu_bg_color',
		   'class' => 'color',
		   'size' => 20,
		   'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Menu items font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="c_font_menu_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'c_font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Menu items font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'c_font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Menu items font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
        array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Main menu text transform:', array(), 'Modules.Stthemeeditor.Admin'),
            'name' => 'c_menu_font_trans',
            'options' => array(
                'query' => self::$textTransform,
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'column_block_headings_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'heading_column_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu left border color when mouse hovers over:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_border_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[6]['form'] = array(
	'input' => array(
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'body_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'body_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'body_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'body_bg_repeat',
			'values' => array(
				array(
					'id' => 'body_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'body_bg_position',
			'values' => array(
				array(
					'id' => 'body_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'body_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'body_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Scale the background image:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'body_bg_cover',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'body_bg_cover_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_cover_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Scale the background image to be as large as possible so that the window is completely covered by the background image. Some parts of the background image may not be in view within the window.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Body background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'body_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Content background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'body_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('Actually only for boxed layout.', array(), 'Modules.Stthemeeditor.Admin'),
		 ),
		/*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Column container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'main_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[7]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Stacked footer', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		'stacked_footer_column' => array(
			'type' => 'html',
			'id' => 'stacked_footer_column',
			'label'=> $this->getTranslator()->trans('Set the width of stacked footers:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_fullwidth',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'f_top_fullwidth_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_fullwidth_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'f_top_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_bg_repeat',
			'values' => array(
				array(
					'id' => 'f_top_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_bg_position',
			'values' => array(
				array(
					'id' => 'f_top_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'f_top_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'f_top_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_primary_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_primary_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_primary_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_h_align',
			'values' => array(
				array(
					'id' => 'f_top_h_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_h_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_h_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_h_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_top_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_top_con_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_top_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_top_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[8]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Footer', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_fullwidth',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'footer_fullwidth_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_fullwidth_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'footer_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_bg_repeat',
			'values' => array(
				array(
					'id' => 'footer_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_bg_position',
			'values' => array(
				array(
					'id' => 'footer_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'footer_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_h_align',
			'values' => array(
				array(
					'id' => 'footer_h_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_h_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_h_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_h_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),        
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[9]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Footer after', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_fullwidth',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'f_secondary_fullwidth_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_fullwidth_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'f_secondary_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_bg_repeat',
			'values' => array(
				array(
					'id' => 'f_secondary_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_bg_position',
			'values' => array(
				array(
					'id' => 'f_secondary_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'f_secondary_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'f_secondary_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_tertiary_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_tertiary_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_tertiary_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_h_align',
			'values' => array(
				array(
					'id' => 'f_secondary_h_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_h_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_h_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_h_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_secondary_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_secondary_con_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_tertiary_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_tertiary_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ), 
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[10]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Copyright', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_fullwidth',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'f_info_fullwidth_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_fullwidth_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Center layout:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'f_info_center',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'f_info_center_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_center_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'f_info_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_bg_repeat',
			'values' => array(
				array(
					'id' => 'f_info_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_bg_position',
			'values' => array(
				array(
					'id' => 'f_info_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'f_info_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'f_info_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('The content at the bottom of the store - where I am visible', array(), 'Admin.Theme.Transformer'),
			'name' => 'bottom_shop_content',
			'values' => array(
				array(
					'id' => 'bottom_shop_content_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('On all pages', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'bottom_shop_content_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only index page', array(), 'Admin.Theme.Transformer')),
				
			),
			'validation' => 'isUnsignedInt',
		    ), 
		
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'second_footer_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'second_footer_link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'second_footer_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_info_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_info_con_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_info_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_info_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[11]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Cross selling', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		'cs_pro_per' => array(
			'type' => 'html',
			'id' => 'cs_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns', array(), 'Admin.Theme.Transformer'),
			'name' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_slideshow',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'cs_slide_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_slide_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Once, has no effect in loop mode', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_slide_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_s_speed',
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_a_speed',
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Spacing between products:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_spacing_between',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		'cs_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Image type:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cs_image_type',
			'default_value' => 'home_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Stop autoplay after interaction:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_pause_on_hover',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cs_pause_on_hover_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_pause_on_hover_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Autoplay will not be disabled after user interactions (swipes). Turn this option off, this slider will be restarted every time after interaction', array(), 'Admin.Theme.Transformer'),
		),
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Presentation of the product slider from the left side:', array(), 'Admin.Theme.Transformer'),
			'name' => 'position_buttons_cross',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'position_buttons_cross_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'position_buttons_cross_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		),
		
		'left_padding_cross' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Left padding:', array(), 'Admin.Theme.Transformer'),
                'name' => 'left_padding_cross',
                'validation' => 'isUnsignedInt',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>These values ​​are taken into account only in desktop devices (screen width > 992px).', array(), 'Admin.Theme.Transformer'),
            ),
            
            
            'right_padding_cross' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Right padding:', array(), 'Admin.Theme.Transformer'),
                'name' => 'right_padding_cross',
                'validation' => 'isUnsignedInt',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>These values ​​are taken into account only in desktop devices (screen width > 992px).', array(), 'Admin.Theme.Transformer'),
            ),
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Title text align:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_title',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'cs_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_direction_nav',
			'default_value' => 3,
			'values' => array(
				array(
					'id' => 'cs_none',
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_top_right',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_full_height',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Full height', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_full_height_hover',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full height, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_square',
					'value' => 4,
					'label' =>$this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_square_hover',
					'value' => 5,
					'label' =>$this->getTranslator()->trans('Square, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_circle',
					'value' => 6,
					'label' =>$this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_circle_hover',
					'value' => 7,
					'label' =>$this->getTranslator()->trans('Circle, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_direction_nav_arrow',
					'value' => 8,
					'label' =>$this->getTranslator()->trans('Arrow', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_direction_nav_arrow_hover',
					'value' => 9,
					'label' =>$this->getTranslator()->trans('Arrow, show out when mouseover', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
        array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Hide "next" and "prev" buttons on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'cs_hide_direction_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'cs_hide_direction_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'cs_hide_direction_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show pagination:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_control_nav',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'cs_control_nav_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_control_nav_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Number', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_control_nav_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Progress', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_control_nav_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
        array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Hide navigation on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'cs_hide_control_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'cs_hide_control_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'cs_hide_control_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_loop',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cs_loop_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_loop_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_lazy',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cs_lazy_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_lazy_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport wont be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Move:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_move',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'cs_move_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Scroll per page', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_move_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Scroll per item', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_move_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Free mode', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[12]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Products category', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
	   'pc_pro_per' => array(
			'type' => 'html',
			'id' => 'pc_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns', array(), 'Admin.Theme.Transformer'),
			'name' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_slideshow',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'pc_slide_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_slide_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Once, has no effect in loop mode', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_slide_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_s_speed',
			'default_value' => 7000,
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_a_speed',
			'default_value' => 400,
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Spacing between products:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_spacing_between',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		'pc_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Image type:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pc_image_type',
			'default_value' => 'home_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Stop autoplay after interaction:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_pause_on_hover',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pc_pause_on_hover_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_pause_on_hover_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Autoplay will not be disabled after user interactions (swipes). Turn this option off, this slider will be restarted every time after interaction', array(), 'Admin.Theme.Transformer'),
		),
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Presentation of the product slider from the left side:', array(), 'Admin.Theme.Transformer'),
			'name' => 'position_buttons_cat',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'position_buttons_cat_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'position_buttons_cat_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		),
		
		'left_padding_pcat' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Left padding:', array(), 'Admin.Theme.Transformer'),
                'name' => 'left_padding_pcat',
                'validation' => 'isNullOrUnsignedId',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>These values ​​are taken into account only in desktop devices (screen width > 992px).', array(), 'Admin.Theme.Transformer'),
            ),
            
            
            'right_padding_pcat' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Right padding:', array(), 'Admin.Theme.Transformer'),
                'name' => 'right_padding_pcat',
                'validation' => 'isNullOrUnsignedId',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.<br>These values ​​are taken into account only in desktop devices (screen width > 992px).', array(), 'Admin.Theme.Transformer'),
            ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Title text align:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_title',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'pc_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_direction_nav',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'pc_none',
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_top_right',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_full_height',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Full height', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_full_height_hover',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full height, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_square',
					'value' => 4,
					'label' =>$this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_square_hover',
					'value' => 5,
					'label' =>$this->getTranslator()->trans('Square, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_circle',
					'value' => 6,
					'label' =>$this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_circle_hover',
					'value' => 7,
					'label' =>$this->getTranslator()->trans('Circle, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_direction_nav_arrow',
					'value' => 8,
					'label' =>$this->getTranslator()->trans('Arrow', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_direction_nav_arrow_hover',
					'value' => 9,
					'label' =>$this->getTranslator()->trans('Arrow, show out when mouseover', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
        array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Hide "next" and "prev" buttons on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'pc_hide_direction_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'pc_hide_direction_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'pc_hide_direction_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show pagination:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_control_nav',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'pc_control_nav_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_control_nav_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Number', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_control_nav_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Progress', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_control_nav_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
        array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Hide navigation on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'pc_hide_control_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'pc_hide_control_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'pc_hide_control_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_loop',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pc_loop_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_loop_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_lazy',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pc_lazy_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_lazy_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Move:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_move',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'pc_move_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Scroll per page', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_move_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Scroll per item', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_move_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Free mode', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

/*$fields_form[13]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Accessories', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		'ac_pro_per' => array(
			'type' => 'html',
			'id' => 'ac_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns', array(), 'Admin.Theme.Transformer'),
			'name' => '',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_slideshow',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'ac_slide_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_slide_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_s_speed',
			'default_value' => 7000,
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_a_speed',
			'default_value' => 400,
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Pause On Hover:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_pause_on_hover',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'ac_pause_on_hover_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_pause_on_hover_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Title text align:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_title',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'ac_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_direction_nav',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'ac_none',
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_top-right',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_square',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_circle',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show pagination:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_control_nav',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'ac_control_nav_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_control_nav_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Rewind to first after the last slide:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_loop',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'ac_loop_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_loop_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_lazy',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'ac_lazy_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_lazy_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Move:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_move',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'ac_move_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('1 item', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_move_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('All visible items', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);*/

$fields_form[14]['form'] = array(
	'input' => array(
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Custom CSS Code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'custom_css',
			'cols' => 80,
			'rows' => 20,
			'desc' => $this->getTranslator()->trans('Override css with your custom code', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Custom JAVASCRIPT Code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'custom_js',
			'cols' => 80,
			'rows' => 20,
			'desc' => $this->getTranslator()->trans('Remove all script tags', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Tracking code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'tracking_code',
			'cols' => 80,
			'rows' => 20,
			'validation' => 'isAnything',
			'desc' => $this->getTranslator()->trans('Code added here is injected before the closing body tag on every page in your site. Turn off the "Use HTMLPurifier Library" setting on the Preferences > General page if you want to put html codes into this field.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Head code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'head_code',
			'cols' => 80,
			'rows' => 20,
			'desc' => $this->getTranslator()->trans('Code added here is injected into the head tag on every page in your site. Turn off the "Use HTMLPurifier Library" setting on the Preferences > General page if you want to put html tags into this field.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[16]['form'] = array(
	'input' => array(
		'pro_image_column' => array(
			'type' => 'html',
			'id' => 'pro_image_column',
			'label'=> $this->getTranslator()->trans('Image column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('The default image type of the main product image is "medium_default" 420px in wide. When the image column width is larger that 4, "large_default" image type will be applied, it is 700px in wide. You may need to change the size of those image types to make images look sharpe.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		'pro_primary_column' => array(
			'type' => 'html',
			'id' => 'pro_primary_column',
			'label'=> $this->getTranslator()->trans('Primary column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('Sum of the three columns has to be equal 12, for example: 4 + 5 + 3, or 6 + 6 + 0.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		'pro_secondary_column' => array(
			'type' => 'html',
			'id' => 'pro_secondary_column',
			'label'=> $this->getTranslator()->trans('Secondary column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('You can set them to 0 to hide the secondary column.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		/*array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Page layout on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_page_layout',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_page_layout_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left layout, default', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_page_layout_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center layout', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),*/
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Buy box:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_buy',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_buy_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('On product center column', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_buy_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('On product right column', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		),
		
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product weight on the product card:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_weight',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_weight_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_weight_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Buy button and Buy Now button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_buy_button',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_buy_button_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Inline', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			'validation' => 'isUnsignedInt',
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Button style add to cart:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'add_cart_button_style',
			'values' => array(
			    array(
					'id' => 'add_cart_button_style_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Only text', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'add_cart_button_style_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Content with icon (medium)', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'add_cart_button_style_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Content with icon (content on the left, icon on the right)', array(), 'Admin.Theme.Transformer')),
				
			),
			'validation' => 'isUnsignedInt',
		), 
		

		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Buy Now button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'buy_now',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'buy_now_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'buy_now_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 

		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main product name:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_product_name_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_product_name_list_example" class="fontshow">'.$this->getTranslator()->trans('Example Title', array(), 'Admin.Theme.Transformer').'</p>',
		),
		'font_product_name'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main product name font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_product_name',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Main product name font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_product_name_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main product name transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_product_name_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main product name color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_product_name_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		/*array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How many images per row in the main product image gallery:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_gallery_top_per_view',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'pro_gallery_top_per_view_0',
					'value' => 1,
					'label' => $this->getTranslator()->trans('One.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_gallery_top_per_view_1',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Two', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),*/
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product gallerys:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_gallerys',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_gallerys_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display images of the current combination only.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_gallerys_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display images of the current combination with a show all images button', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_gallerys_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Show all images, highlight images of the current combination.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		
		  array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Navigation to change photos in the product gallery', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'button_prod_gallery',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'button_prod_gallery_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'button_prod_gallery_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product thumbnails on desktop devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_thumbnails',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_thumbnails_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Horizontal slider', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_6',
					'value' => 6,
					'label' => $this->getTranslator()->trans('Horizontal slider, do not show out if a product only has one image', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left side vertical slider', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right side vertical slider', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_thumbnails_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		),
		
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Number of photos visible in the product gallery slider:', array(), 'Admin.Theme.Transformer'),
			'name' => 'slider_thumbnails_maxwidth',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'default_value' => 0,
			'desc' => array(
				$this->getTranslator()->trans('Only applies to the horizontal option of the product gallery slider on devices above 991px', array(), 'Admin.Theme.Transformer')
				),
		),
		
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Intervals between photos in the product gallery slider:', array(), 'Admin.Theme.Transformer'),
			'name' => 'slider_thumbnails_zone',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'default_value' => 0,
			'desc' => array(
				$this->getTranslator()->trans('Only applies to the horizontal option of the product gallery slider on devices above 991px', array(), 'Admin.Theme.Transformer')
				),
		),
		
		  array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Navigation arrows in the gallery after the photo area:', array(), 'Admin.Theme.Transformer'),
			'name' => 'slider_thumbnails_hook',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'slider_thumbnails_hook_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'slider_thumbnails_hook_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Only applies to the horizontal option of the product gallery slider on devices above 991px', array(), 'Admin.Theme.Transformer'),
		), 
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product thumbnails on mobile devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_thumbnails_mobile',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_thumbnails_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('The same as they are on desktop devices.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_mobile_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Horizontal slider', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_thumbnails_mobile_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('Horizontal slider, do not show out if a product only has one image', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_thumbnails_mobile_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_thumbnails_mobile_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The width of thumbnail images for grid view and horizontal thumbnails slider:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'grid_thumbnails_width',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'default_value' => 0,
			'desc' => array(
				$this->getTranslator()->trans('Set it to 0 to use the default 70px width.', array(), 'Modules.Stthemeeditor.Admin')
				),
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Vertical thumbnails slider width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'gallery_thumbnails_width_v',                    
			'default_value' => 3,
			'options' => array(
				'query' => self::$grid_width,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Vertical thumbnails slider height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'gallery_thumbnails_height_v',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'default_value' => 0,
			'desc' => array(
				$this->getTranslator()->trans('Set it to 0 to use the default 360px width.', array(), 'Modules.Stthemeeditor.Admin')
				),
		),
		'thumb_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Thumbnail image type:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'thumb_image_type',
			'default_value' => 'cart_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		'pro_thumnbs_per' => array(
			'type' => 'html',
			'id' => 'pro_thumnbs_per',
			'label'=> $this->getTranslator()->trans('How many images per view on the product main gallery', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Spacing between images on the product main gallery:', array(), 'Admin.Theme.Transformer'),
			'name' => 'gallery_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		'gallery_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Gallery image type:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'gallery_image_type',
			'default_value' => 'medium_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Do not lazy load gallery images:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'lazyload_main_gallery',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'lazyload_main_gallery_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'lazyload_main_gallery_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('For seo purposes, you can stop using lazy loading for gallery images', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('View information on availability, shipping time and product quantity:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_avail_info',
			'values' => array(
			    array(
					'id' => 'show_avail_info_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_avail_info_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display all information', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_avail_info_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display only stock information', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_avail_info_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display information on stock and shipping time', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_avail_info_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Display only the shipping time information', array(), 'Admin.Theme.Transformer')),
				
				
			),
			'validation' => 'isUnsignedInt',
		),  
		
		
		
		  array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Location of the product price in the desktop version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_price_desktop',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_price_desktop_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('In the upper zone', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_price_desktop_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Above the button to the basket', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			
			'validation' => 'isUnsignedInt',
		), 
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Location of the product price in mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_price_mobile',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_price_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('In the upper zone', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_price_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Above the button to the basket', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Do display the price tag from:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'prices_tag_from_prod',
			'values' => array(
				array(
					'id' => 'prices_tag_from_prod_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Yes, price from for products with attributes, for other products price', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'prices_tag_from_prod_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Price for all products', array(), 'Modules.Stthemeeditor.Admin')),
                array(
					'id' => 'prices_tag_from_prod_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only price for products with attributes', array(), 'Modules.Stthemeeditor.Admin')),
                 array(
					'id' => 'prices_tag_from_prod_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
		                   ),
			'validation' => 'isUnsignedInt',
			
			
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Whether to display the tax label at the main product price:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'tax_label_price',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'tax_label_price_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'tax_label_price_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Whether to display two prices - net and gross:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'two_prices_price',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'two_prices_price_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'two_prices_price_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		), 
		
		
		   array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Form of presentation of the tax name:', array(), 'Admin.Theme.Transformer'),
			'name' => 'type_tax_name',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'type_tax_name_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('As the inscription "gross"', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'type_tax_name_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('As an inscription (the price includes VAT)', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			
			'validation' => 'isUnsignedInt',
		), 
		
		  array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Presentation of the old price and discount on the product card:', array(), 'Admin.Theme.Transformer'),
			'name' => 'old_price_form',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'old_price_form_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'old_price_form_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Presentation in the form: Old price: PLN 100 -30%', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'old_price_form_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Presentation in the form: 100 PLN -30%', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'old_price_form_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Presentation in the form: Old price: PLN 100', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'old_price_form_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Presentation in the form: PLN 100', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'old_price_form_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('Form of presentation: you save PLN 100', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'old_price_form_6',
					'value' => 6,
					'label' => $this->getTranslator()->trans('Form of presentation: you save PLN 100 100PN', array(), 'Modules.Stthemeeditor.Admin')),
					array(
					'id' => 'old_price_form_7',
					'value' => 7,
					'label' => $this->getTranslator()->trans('Old price for a new price - no discount value', array(), 'Admin.Theme.Transformer')),
				
			),
			
			'validation' => 'isUnsignedInt',
		),
		
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Whether to display the short description on the desktop version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_description_dekstop',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_description_dekstop_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_description_dekstop_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('To view button see more upper product area leading to product description:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_button_more',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_button_more_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_button_more_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes, with the product description (if any)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_button_more_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('In another place', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('This option is visible only in stationary devices.', array(), 'Modules.Stthemeeditor.Admin'),
	
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Whether to display the short description on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_description_mobile',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_description_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_description_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		), 
		
		  array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Short description length:', array(), 'Admin.Theme.Transformer'),
			'name' => 'short_desc_lenght',
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-lg',
			),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show brand logo on product page in desktop version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_brand_logo',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_brand_logo_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_brand_logo_name',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display brand name above the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_logo_logo',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display brand name under the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				 // array(
				// 	'id' => 'show_brand_logo_name_1',
				// 	'value' => 4,
				// 	'label' => $this->getTranslator()->trans('Display brand name under the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				// array(
				// 	'id' => 'show_brand_logo_logo_1',
				// 	'value' => 5,
				// 	'label' => $this->getTranslator()->trans('Display brand logo under the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_logo_on_secondary_column',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display brand name on the product secondary column.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		    array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show items:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_brand_elements',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_brand_elements_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Only name', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_brand_elements_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Name plus the prefix manufacturer', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_elements_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only logo', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_elements_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Logo and prefix manufacturer', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => $this->getTranslator()->trans('What elements display information about the manufacturer in the desktop version', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		
		
		  array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show brand logo on product page in mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_brand_logo_mobile',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_brand_logo_mobile_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_brand_logo_mobile_name',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display brand name above the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_logo_mobile_logo',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display brand name under the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				 // array(
				// 	'id' => 'show_brand_logo_mobile_name_1',
				// 	'value' => 4,
				// 	'label' => $this->getTranslator()->trans('Display brand name under the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				// array(
				// 	'id' => 'show_brand_logo_mobile_logo_1',
				// 	'value' => 5,
				// 	'label' => $this->getTranslator()->trans('Display brand logo under the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_logo_mobile_on_secondary_column',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display brand name on the product secondary column.', array(), 'Modules.Stthemeeditor.Admin')),
			),
				'validation' => 'isUnsignedInt',
		), 
		
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show items:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_brand_elements_mobile',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_brand_elements_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Only name', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_brand_elements_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Name plus the prefix manufacturer', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_elements_mobile_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only logo', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_elements_mobile_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Logo and prefix manufacturer', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => $this->getTranslator()->trans('What elements display information about the manufacturer in the mobile version', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Whether to display information about the manufacturer in an additional place:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_brand_extra',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_brand_extra_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_brand_extra_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		), 
		
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show items:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_brand_elements_extra',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_brand_elements_extra_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Only name', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_brand_elements_extra_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Name plus the prefix manufacturer', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_elements_extra_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only logo', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_elements_extra_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Logo and prefix manufacturer', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => $this->getTranslator()->trans('What elements to display in an additional place', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product tabs position:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_tabs',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_tabs_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('At the bottom of product information.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('On the product center column.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product tabs style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_tabs_style',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_tabs_style_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Tab title left aligned.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_style_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Accordions with the first item open.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_style_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Accordions, all closed.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_style_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Tab title center aligned.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_style_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Vertical tab.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Sticky tabs option:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'prod_tabs_sticky',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'prod_tabs_sticky_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'prod_tabs_sticky_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			
		), 
		 
		 array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Featured on product card in top zone:', array(), 'Admin.Theme.Transformer'),
			'name' => 'id_feature_list_top',
			'validation' => 'isAnything',
			'class' => 'fixed-width-lg',
			),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Features on the product card:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'remove_product_details_tab',
			'values' => array(
				array(
					'id' => 'remove_product_details_tab_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Do not display', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'remove_product_details_tab_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display in a separate tab', array(), 'Admin.Theme.Transformer')),
		  	array(
					'id' => 'remove_product_details_tab_down',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display in the product description tab', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Id of the features to be not displayed:', array(), 'Admin.Theme.Transformer'),
			'name' => 'id_feature_list',
			'validation' => 'isAnything',
			'class' => 'fixed-width-lg',
			),
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Feature presentation:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'details_tab_feature_presentation',
			'values' => array(
				array(
					'id' => 'details_tab_feature_presentation_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Normally', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'details_tab_feature_presentation_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('As grouped features (if the feature grouping module is installed)', array(), 'Admin.Theme.Transformer')),
		  	
			),
			'validation' => 'isUnsignedInt',
		),
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Feature code presentation:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'details_tab_feature_presentation_code',
			'values' => array(
				array(
					'id' => 'details_tab_feature_presentation_code_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('As ul, li', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'details_tab_feature_presentation_code_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('As dl, dd, dt', array(), 'Admin.Theme.Transformer')),
		  	
			),
			'validation' => 'isUnsignedInt',
		),
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Feature value distributor (option only for dl, dd, dt)', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'details_tab_feature_presentation_dec',
			'values' => array(
				array(
					'id' => 'details_tab_feature_presentation_dec_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Each value after the decimal point', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'details_tab_feature_presentation_dec_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Each value from a new line', array(), 'Admin.Theme.Transformer')),
		  	
			),
			'validation' => 'isUnsignedInt',
		),
		
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Description width and features:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'details_tab_feature_presentation_width',
			'default_value' => 6,
			'options' => array(
				'query' => self::$width_map,
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => '',
				),
			),
			'validation' => 'isUnsignedInt',
		),
		
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display product condition:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_pro_condition',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_pro_condition_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_condition_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('New, used, refurbished', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display product reference code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_pro_reference',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_pro_reference_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_reference_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Where to display the product reference number:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_ref_product',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_ref_product_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Under the product name.', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_ref_product_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Above the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_ref_product_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('In the central column of the product card', array(), 'Modules.Stthemeeditor.Admin')),
				
			),
			
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display product tags:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_pro_tags',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'display_pro_tags_disable',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_tags_as_a_tab',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Tags tab', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_pro_tags_at_bottom_of_description',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display tags with product information.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Zoom:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'enable_zoom',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'enable_zoom_disable',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'enable_zoom_enable',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'disable_zoom_on_mobile',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Disable zoom for touch devices.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Enable Thickbox:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'enable_thickbox',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'enable_thickbox_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'enable_thickbox_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display tax label:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_tax_label',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_tax_label_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_tax_label_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('In order to display the tax incl label, you need to activate taxes (Localization -> taxes -> Enable tax), make sure your country displays the label (Localization -> countries -> select your country -> display tax label) and to make sure the group of the customer is set to display price with taxes (BackOffice -> customers -> groups).', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Google rich snippets for product:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'google_rich_snippets',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'google_rich_snippets_disable',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'google_rich_snippets_enable',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				/*array(
					'id' => 'google_rich_snippets_except_for_review_aggregate',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Enable except for Review-aggregate', array(), 'Modules.Stthemeeditor.Admin')),*/
			),
			'validation' => 'isUnsignedInt',
		),/*
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show a print button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_show_print_btn',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_show_print_btn_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_show_print_btn_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */

		
		/*'packitems_pro_per' => array(
			'type' => 'html',
			'id' => 'packitems_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns for Pack items', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),*/
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product availability info color for available:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_available_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product availability info color for unavailable:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_unavailable_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product availability info color for last items:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_last_items',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);



$fields_form[61]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Settings for one column product page', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Make the first section to be full screen:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_first_full_screen',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_page_first_full_screen_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_page_first_full_screen_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Frist section is where the buy button, product thumbnails and product name located.', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('First section background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_first_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		
		
		 array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Maximum zone width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'first_zone_max_width',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
				),
		
		 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Make the second section to be full screen:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_second_full_screen',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_page_second_full_screen_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_page_second_full_screen_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('The section with the tabs (if displayed there).', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		
		
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Second section background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_second_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('The section with the tabs (if displayed there).', array(), 'Modules.Stthemeeditor.Admin'),
		),
		
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Maximum zone width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_zone_max_width',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
				),
				
				
			array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Should the entered width apply to the entire zone or only the fields with the content of tabs:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_second_full_screen_tabs',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_page_second_full_screen_tabs_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_page_second_full_screen_tabs_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('The section with the tabs (if displayed there).', array(), 'Modules.Stthemeeditor.Admin'),
		), 
				
				array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Make the third section to be full screen:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_third_full_screen',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_page_third_full_screen_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_page_third_full_screen_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('The section with the tabs slider products.', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Third section background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_third_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('The section with the tabs slider products.', array(), 'Modules.Stthemeeditor.Admin'),
		    ),
		
		 array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Maximum zone width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_zone_max_width',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
				),
	
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[35]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Product info tabs or accordions', array(), 'Modules.Stthemeeditor.Admin'),
	),
	
	'input' => array(
	
	  array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Tab width with content:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'details_tab_width_left',
			'default_value' => 6,
			'options' => array(
				'query' => self::$width_map,
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => '',
				),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('This option is taken into account if related products are displayed on the side of the tabs.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Active tab text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_active_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_border_clolor',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab highlight border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab active background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_active_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab content background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_content_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[38]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Product images slider', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('"Next" and "prev" buttons for product thumbs:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'thumbs_direction_nav',
			'default_value' => 3,
			'values' => array(
				array(
					'id' => 'thumbs_direction_nav_square',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'thumbs_direction_nav_circle',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'thumbs_direction_nav_arrow',
					'value' => 2,
					'label' =>$this->getTranslator()->trans('Arrow', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('The main image sliders transition style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_main_image_trans',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'pro_main_image_trans_slide',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Slide', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_main_image_trans_fade',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Fade', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons disabled color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_color_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons background:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons hover background:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons disabled background:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_bg_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Navigation color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_pag_nav_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Navigation hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_pag_nav_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[37]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Sticky header/menu', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Sticky:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_option',
			'values' => array(
				array(
					'id' => 'sticky_option_no',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'sticky_option_menu',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Sticky menu', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_option_menu_animation',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Sticky menu (with animation)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_option_header',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Sticky header block', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_option_header_animation',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Sticky header block (with animation)', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => array(
				$this->getTranslator()->trans('Header block include "Topbar", "Header" and "Menu".', array(), 'Modules.Stthemeeditor.Admin'),
				$this->getTranslator()->trans('Sticky menu option does not work for menu in header.', array(), 'Modules.Stthemeeditor.Admin'),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display topbar on sticky header block:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_topbar',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'sticky_topbar_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'sticky_topbar_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display header on sticky header block:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_primary_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'sticky_primary_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'sticky_primary_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Primary header height in sticky header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_header_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Header includes topbar, primary header and menu. Primary header is the section where the logo is located.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Sticky header/menu background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Sticky header/menu background opacity:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Transparent header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'transparent_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'transparent_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Transparent header background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_header_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transparent header background opacity:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_header_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow blur distance:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_shadow_blur',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_shadow_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'sticky_shadow_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[39]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Mobile header', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_mobile_header',
			'values' => array(
				array(
					'id' => 'sticky_mobile_header_no_center',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Logo center', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_mobile_header_no_left',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Logo left', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_mobile_header_yes_center',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Sticky, logo center', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_mobile_header_yes_left',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Sticky, logo left', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('If you choose the Logo left or Sticky, logo left, you have to transplant the Megamenu to the displayMobileBar hook to make the menu icon show up on mobile devices.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Use mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'use_mobile_header',
			'values' => array(
				array(
					'id' => 'use_mobile_header_small_devices',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Small devices(Screen width < 992px)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'use_mobile_header_mobile',
					'value' => 1,
					'label' => $this->getTranslator()->trans('All mobile devices (Android phone and tablet, iPhone, iPad)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'use_mobile_header_all',
					'value' => 2,
					'label' => $this->getTranslator()->trans('All devices, mobile and desktop devices', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Mobile header text align', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mobile_header_text',
			'values' => array(
				array(
					'id' => 'mobile_header_text_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Normal', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'mobile_header_text_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('All center', array(), 'Modules.Stthemeeditor.Admin')),
		
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('Small devices (Screen width < 448px)', array(), 'Admin.Theme.Transformer'),
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display a text "menu" along with the menu icon on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_icon_with_text',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'menu_icon_with_text_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_icon_with_text_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Mobile header height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_mobile_header_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text and icons color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_mobile_header_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text and icons background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_mobile_header_text_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'sticky_mobile_header_background',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Background color opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'sticky_mobile_header_background_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Transparent mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_mobile_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'transparent_mobile_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'transparent_mobile_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Transparent header text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_mobile_header_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Transparent header background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_mobile_header_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transparent header background opacity:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_mobile_header_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[60]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Logo', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display logo on center or left of the header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_position',
			'values' => array(
				array(
					'id' => 'logo_position_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'logo_position_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logo block width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_width',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('The width of your logo is', array(), 'Modules.Stthemeeditor.Admin').Configuration::get('SHOP_LOGO_WIDTH'),
					$this->getTranslator()->trans('You can use this setting to resizing your logo, your logo would keep the same radius.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('If your logo is larger than 220px in wide, it will be resized down to 220px', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This setting would not scale your logo up, it means if the vaule you filled in is large than the width of your logo, then your logo will displayed at its original size.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logo block width on sticky header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_width_sticky_header',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('You can use this setting to resizing your logo, your logo would keep the same radius.', array(), 'Modules.Stthemeeditor.Admin'),
					// $this->getTranslator()->trans('Your logo is 160px in wide in sticky header by default', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This setting would not scale your logo up, it means if the vaule you filled in is large than the width of your logo, then your logo will displayed at its original size.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logo width on mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_width_mobile_header',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('You can use this setting to resizing your logo, your logo would keep the same radius.', array(), 'Modules.Stthemeeditor.Admin'),
					// $this->getTranslator()->trans('Your logo is 160px in wide in mobile header by default', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This setting would not scale your logo up, it means if the vaule you filled in is large than the width of your logo, then your logo will displayed at its original size.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),
		/*array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logo width on sticky mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_width_sticky_mobile_header',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('You can use this setting to resizing your logo, your logo would keep the same radius.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('Your logo is 160px in wide in sticky mobile header by default', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This setting would not scale your logo up, it means if the vaule you filled in is large than the width of your logo, then your logo will displayed at its original size.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('Set it to 0 to use the defualt value.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),*/
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);



$fields_form[223]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Search page', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
            'input' => array(
                         array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Individual search page - no results:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'search_page',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'search_page_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'search_page_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Page layout:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'search_layout',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'search_layout_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('One column, login form only', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'search_layout_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Two columns', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Id contact:', array(), 'Admin.Theme.Transformer'),
			'name' => 'search_id_contact',
			'validation' => 'isAnything',
			'class' => 'fixed-width-lg',
		'desc' => $this->getTranslator()->trans('Enter the contact id to which messages from the search form will be sent.<br>You can check the contact id in the Preferences > Contacts tab.<br>You can enter several contact ids, thanks to which the customer will be able to select a given contact from the drop-down field.<br>Enter the values ​​and separate them with commas, for example: 1,2,3.', array(), 'Modules.Stthemeeditor.Admin'),
			),
			
			 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Visibility of the field with the choice of topic:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'search_theme',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'search_theme_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'search_theme_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('If you enter only one contact id, you can hide the field with the selection of this contact and set this option to yes<br>If more than one contact ID is specified, the evaluation must be set to No.', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Visibility of dedicated tags on the page with positive search results:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'search_tag_visible_in',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'search_tag_visible_in_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'search_tag_visible_inoff',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Visibility of serach tag:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'search_tag_visible',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'search_tag_visible_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'search_tag_visible_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Tagi search:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'search_tag',
			'size' => 512,
			'lang' => true,
		'desc' => $this->getTranslator()->trans('If you want, you can redirect Clients to dedicated search results by suggesting popular search terms.<br>Enter your search terms, separated by commas. In the case of a page with no search results, the customer will be able to click on them and go to the search results dedicated by you.', array(), 'Modules.Stthemeeditor.Admin'),
		),


	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[62]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Login page', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		
	array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Use the same header as other pages:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_same_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'auth_same_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_same_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Use the same footer as other pages:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_same_footer',
			'is_bool' => true,
			'values' => array(
		   		array(
					'id' => 'auth_same_footer_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No footer', array(), 'Admin.Theme.Transformer')),
		
				array(
					'id' => 'auth_same_footer_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Standard footer', array(), 'Admin.Theme.Transformer')),
				
					array(
					'id' => 'auth_same_footer_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Indyvidual footer', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
	  
	
	array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Page layout:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_layout',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'auth_layout_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('One column, login form only', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'auth_layout_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Two columns', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Login block width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_login_width',
			'default_value' => 6,
			'options' => array(
				'query' => self::$width_map,
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => '',
				),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Remove social title from registration:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'hide_gender',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'hide_gender_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'hide_gender_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_padding_top',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_padding_bottom',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_heading_align',
			'values' => array(
				array(
					'id' => 'auth_heading_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_heading_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_heading_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_heading_align_none',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_heading_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_heading_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Login from background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'auth_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'auth_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'auth_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'auth_bg_repeat',
			'values' => array(
				array(
					'id' => 'auth_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'auth_bg_position',
			'values' => array(
				array(
					'id' => 'auth_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),

		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_btn_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button text hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_btn_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_btn_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_btn_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[63]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Checkout page', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Use the same header as other pages:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'checkout_same_header',
			'is_bool' => true,
			'values' => array(
                                array(
					'id' => 'checkout_same_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'checkout_same_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('In all steps', array(), 'Admin.Theme.Transformer')),
                                array(
					'id' => 'checkout_same_header_step',
					'value' => 2,
					'label' => $this->getTranslator()->trans('In the last 2 steps', array(), 'Admin.Theme.Transformer')),


				
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Use the same footer as other pages:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'checkout_same_footer',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'checkout_same_footer_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'checkout_same_footer_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('In all steps', array(), 'Admin.Theme.Transformer')),
                                array(
					'id' => 'checkout_same_footer_step',
					'value' => 2,
					'label' => $this->getTranslator()->trans('In the last 2 steps', array(), 'Admin.Theme.Transformer')),
 
			),
			'validation' => 'isUnsignedInt',
		), 
		
		 array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Use the same footer and header as order confirmation page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'order_conf_page',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'order_conf_page_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'order_conf_page_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only header', array(), 'Admin.Theme.Transformer')),
                                array(
					'id' => 'order_conf_page_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only footer', array(), 'Admin.Theme.Transformer')),
                                 array(
					'id' => 'order_conf_page_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Footer and header', array(), 'Admin.Theme.Transformer')),
 
			),
			'validation' => 'isUnsignedInt',
		     ), 
		
		      array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Individual header and footer on an empty cart page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'empty_cart_page',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'empty_cart_page_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'empty_cart_page_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Only header', array(), 'Admin.Theme.Transformer')),
                                array(
					'id' => 'empty_cart_page_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Only footer', array(), 'Admin.Theme.Transformer')),
                                 array(
					'id' => 'empty_cart_page_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Footer and header', array(), 'Admin.Theme.Transformer')),
 
			),
			'validation' => 'isUnsignedInt',
		     ), 
		
		array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Visibility title menu mobile:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'show_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'show_title_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_title_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Always - inline', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_title_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Always - block', array(), 'Admin.Theme.Transformer')),
                            
                       array(
                            'id' => 'show_title_4',
                            'value' => 4,
                            'label' => $this->getTranslator()->trans('Mobile (480px < screen width > 992px) - inline', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_title_5',
                            'value' => 5,
                            'label' => $this->getTranslator()->trans('Mobile (480px < screen width > 992px) - block', array(), 'Admin.Theme.Transformer')),
							
						array(
                            'id' => 'show_title_7',
                            'value' => 7,
                            'label' => $this->getTranslator()->trans('Mobile (screen width < 480px) - inline', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_title_8',
                            'value' => 8,
                            'label' => $this->getTranslator()->trans('Mobile (screen width < 480px) - block', array(), 'Admin.Theme.Transformer')),
                        	array(
                            'id' => 'show_title_9',
                            'value' => 9,
                            'label' => $this->getTranslator()->trans('Mobile (480px < screen width > 992px) - inline, Mobile (screen width < 480px) - block', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_title_10',
                            'value' => 10,
                            'label' => $this->getTranslator()->trans('Mobile 480px < screen width > 992px) - block, Mobile (screen width < 480px) - inline', array(), 'Admin.Theme.Transformer')),
                        
                     	),
			'validation' => 'isUnsignedInt',
                          
                        
                
                    ),
		
	// array(
	//		'type' => 'color',
	//		'label' => $this->getTranslator()->trans('Background color:', array(), 'Modules.Stthemeeditor.Admin'),
	//		'name' => 'checkout_bg',
	//		'class' => 'color',
	//		'size' => 20,
	//		'validation' => 'isColor',
	//	 ),
	//	 array(
	//		'type' => 'color',
	//		'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
	//		'name' => 'checkout_con_bg',
	//		'class' => 'color',
	//		'size' => 20,
	//		'validation' => 'isColor',
	//	 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[64]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('CMS page', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cms_font_size',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Hide cms page title:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cms_title',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cms_title_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cms_title_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[225]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Category block', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Whether to show the navigation bar - return:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_back',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'category_back_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_back_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			), 

			
			array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Boxing header presentation:', array(), 'Admin.Theme.Transformer'),
			'name' => 'category_module_title',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'category_module_title_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Always the Categories header', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_module_title_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Always the name of the category', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_module_title_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Name of categories and subcategories', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		
			 array(
 			'type' => 'text',
			'label' => $this->getTranslator()->trans('Header change level:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_module_title_level',
			'size' => 64,
			'desc' => $this->getTranslator()->trans('The entered number will mark the level in the category tree, which will be followed by changing the name of the header from Categories to subcategories. this setting is taken into account only for Box header presentation: Category name (for main categories) and subcategories (for subcategories).', array(), 'Admin.Theme.Transformer'),
		     'validation' => 'isAnything',
		),
			array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Option to return to the top level of the category:', array(), 'Admin.Theme.Transformer'),
			'name' => 'category_back_option',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'category_back_option_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Dont show at all', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_back_option_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Return to the home page of the store', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_back_option_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('To the selected category', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Elements in the return beam:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_back_option_el',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'category_back_option_el_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Just text back to.', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_back_option_el_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Just an arrow.', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_back_option_el_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Return arrow and text return to', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		
		 array(
 			'type' => 'text',
			'label' => $this->getTranslator()->trans('Top-level category id:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_back_id',
			'size' => 64,
			'desc' => $this->getTranslator()->trans('If you choose the option to return to the selected category, you must enter the ID of the category to which you want to return.', array(), 'Admin.Theme.Transformer'),
		     'validation' => 'isAnything',
		),
		
		
		
		 array(
 			'type' => 'text',
			'label' => $this->getTranslator()->trans('Number of categories shown by default:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_module_qt',
			'size' => 64,
			'desc' => $this->getTranslator()->trans('Enter the number of leading categories by default - the remaining categories will be visible as show more.', array(), 'Admin.Theme.Transformer'),
		 	'validation' => 'isAnything',
		  
		 ),
		 
		 array(
 			'type' => 'text',
			'label' => $this->getTranslator()->trans('Exclude categories from visible by default:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_module_qt_off',
			'size' => 640,
			'desc' => $this->getTranslator()->trans('Enter the id of the category separated by commas for which the option of the number of default visible categories should be omitted.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isAnything',
		
		 
		),
		
		 array(
 			'type' => 'text',
			'label' => $this->getTranslator()->trans('Dont show categories:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_module_off',
			'size' => 640,
			'desc' => $this->getTranslator()->trans('Enter the category id separated by commas that should not be visible in the category tree.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isAnything',
		),
		
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Whether to show the number of products in categories:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_qt',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'category_qt_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_qt_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			),  
	), 
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[222]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Brand page', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		
		 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Manufacturer swebsite in the form of an alphabet', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'brand_alphabet',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'brand_alphabet_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'brand_alphabet_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[18]['form'] = array(
	'input' => array(
		'icon_iphone_57_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Iphone/iPad Favicons 57 (PNG):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_iphone_57_field',
			'desc' => '',
		),
		'icon_iphone_72_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Iphone/iPad Favicons 72 (PNG):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_iphone_72_field',
			'desc' => '',
		),
		'icon_iphone_114_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Iphone/iPad Favicons 114 (PNG):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_iphone_114_field',
			'desc' => '',
		),
		'icon_iphone_144_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Iphone/iPad Favicons 144 (PNG):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_iphone_144_field',
			'desc' => '',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[99]['form'] = array(
	'input' => array(
	/*	array(
			'type' => 'html',
			'id' => '',
			'label' => '',
			'name' =>  '<div class="st_welcome">'.$this->getTranslator()->trans('Welcome to Transformer theme', array(), 'Modules.Stthemeeditor.Admin').'</div>',
		),
		'information' => array(
			'type' => 'html',
			'id' => '',
			'label' => $this->getTranslator()->trans('General information', array(), 'Modules.Stthemeeditor.Admin'),
			'name' =>  '',
		),
		'guides' => array(
			'type' => 'html',
			'id' => '',
			'label' => $this->getTranslator()->trans('Guides & Support', array(), 'Modules.Stthemeeditor.Admin'),
			'name' =>  '',
		), */
		'registration' => array(
			'type' => 'html',
			'id' => '',
			'label' => $this->getTranslator()->trans('Theme registration:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
	/*	array(
			'type' => 'html',
			'id' => '',
			'label' => $this->getTranslator()->trans('Theme version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '<span class="st-theme-version">v '.$this->version.'</span><a href="javascript:;" id="check_update" class="btn btn-default">'.$this->getTranslator()->trans('Check update', array(), 'Modules.Stthemeeditor.Admin').'</a><div class="m_t_8">'.$this->getTranslator()->trans('This module checks update every day automatically.', array(), 'Modules.Stthemeeditor.Admin').'</div><div class="wrap-version-message m_t_8"></div>',
		),
		'update_theme' => array(
			'type' => 'html',
			'id' => '',
			'label' => $this->getTranslator()->trans('1-click upgrade the theme:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		'ads' => array(
			'type' => 'html',
			'id' => '',
			'label' => $this->getTranslator()->trans('Other items created by ST-themes:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		), */
  )
);
$is_goumainma_valid = $license->GoumaimaIsValid();

$fields_form[99]['form']['input']['registration']['name'] .= '<div class="st-not-activated '.($is_goumainma_valid===null ? 'show' : 'hide').'"><div class="alert alert-danger st_register_alert">'.$this->getTranslator()->trans('Your theme is NOT registered, and some features are restricted on backoffice. Please register this copy of theme.', array(), 'Modules.Stthemeeditor.Admin').'</div><ol class="st_info_list"><li>'.$this->getTranslator()->trans('Please contact us for the template access code.', array(), 'Modules.Stthemeeditor.Admin').'</li></ol><div class="st-reg-container"><input type="text" class="purchase_code_input m_b_8" name="purchase_code" value="" autocomplete="off"><a href="javascript:;" class="btn btn-primary btn-purchase-code">'.$this->getTranslator()->trans('Register theme', array(), 'Modules.Stthemeeditor.Admin').'</a></div></div>';


$fields_form[99]['form']['input']['registration']['name'] .= '<div class="st-activated '.($is_goumainma_valid ? 'show' : 'hide').'"><div class="alert alert-success st_register_alert">'.$this->getTranslator()->trans('Theme is Registered! Your purchase code is', array(), 'Modules.Stthemeeditor.Admin').' <span class="st_masked_pruchase_code">'.$license->getGoumaima(true).'</span></div><a href="javascript:;" class="de-regist-theme btn btn-default">'.$this->getTranslator()->trans('De-register theme', array(), 'Modules.Stthemeeditor.Admin').'</a></div>';
$fields_form[99]['form']['input']['registration']['name'] .= '<div class="st-invalid '.($is_goumainma_valid===false ? 'show' : 'hide').'"><div class="alert alert-danger st_register_alert">'.$this->getTranslator()->trans('Your registration is invalid.', array(), 'Modules.Stthemeeditor.Admin').$this->getTranslator()->trans('The purchase code %1% does not match your current domain. You can try deregister, and then re-register.', array('%1%'=>'<span class="st_masked_pruchase_code">'.$license->getGoumaima(true).'</span>'), 'Modules.Stthemeeditor.Admin').'</div><a href="javascript:;" class="de-regist-theme btn btn-default">'.$this->getTranslator()->trans('De-register theme', array(), 'Modules.Stthemeeditor.Admin').'</a></div>';

$fields_form[99]['form']['input']['registration']['name'] .= '<div class="st-res-message"></div>';

//
$if_needs_update = $license->checkUpdate();
$fields_form[99]['form']['input']['update_theme']['name'] .= '<div class="st-not-activated '.(!$is_goumainma_valid ? 'show' : 'hide').'">'.$this->getTranslator()->trans('Register your theme to use this feature.', array(), 'Modules.Stthemeeditor.Admin').'</div>';
$fields_form[99]['form']['input']['update_theme']['name'] .= '<div class="st-activated '.($is_goumainma_valid ? 'show' : 'hide').'">';
$fields_form[99]['form']['input']['update_theme']['name'] .= '<div class="st-needs-upgrade '.($if_needs_update ? 'show' : 'hide').'"><ol class="st_update_information st_info_list"><li class="important_info">'.$this->getTranslator()->trans('Make a full backup of your site include your site files and your database before upgrade.', array(), 'Modules.Stthemeeditor.Admin').'</li><li class="important_info">'.$this->getTranslator()->trans('If you have modified any theme files directly, you will lose your modifications, you need to re-do them after upgrade.', array(), 'Modules.Stthemeeditor.Admin').'</li><li>'.$this->getTranslator()->trans('The upgrade can take several minutes! Please do not close this page once the upgrade process is running!', array(), 'Modules.Stthemeeditor.Admin').'</li><li>'.$this->getTranslator()->trans('Sometimes 1-click upgrade can not work, because of file permission problems or network contention problems, when that happens you can always perform a manual upgrade to upgrade your site.', array(), 'Modules.Stthemeeditor.Admin').'</li></ol><a href="javascript:;" id="update_theme" class="btn btn-default">'.$this->getTranslator()->trans('Click to upgrade the theme', array(), 'Modules.Stthemeeditor.Admin').'</a></div>';
$fields_form[99]['form']['input']['update_theme']['name'] .= '<div class="st-does-not-needs-upgrade '.($if_needs_update===false ? 'show' : 'hide').'">'.$this->getTranslator()->trans('Your theme version is update to date.', array(), 'Modules.Stthemeeditor.Admin').'</div><div class="st-theme-upgrading hide">'.$this->getTranslator()->trans('Theme is in upgrading, please don\'t leave the page...', array(), 'Modules.Stthemeeditor.Admin').'</div>';
$fields_form[99]['form']['input']['update_theme']['name'] .= '</div>';
$fields_form[99]['form']['input']['update_theme']['name'] .= '<div class="wrap-update-message m_t_8"></div>';

//
$st_general_information = $license->getNotice();
if($st_general_information)
	$fields_form[99]['form']['input']['information']['name'] .= '<div class="st-notifications">'.$st_general_information.'</div>';
else
	unset($fields_form[99]['form']['input']['information']);
//
$st_ads = $license->getAd();
if($st_ads)
	$fields_form[99]['form']['input']['ads']['name'] .= '<div class="st-advs">'.$st_ads.'</div>';
else
	unset($fields_form[99]['form']['input']['ads']);

$fields_form[99]['form']['input']['guides']['name'] .= '<ul class="st_info_list"><li><a href="http://transformer2.sunnytoo.com/doc">'.$this->getTranslator()->trans('Online documentation', array(), 'Modules.Stthemeeditor.Admin').'</a></li><li><a href="https://www.sunnytoo.com/blogs?term=46&orderby=date&order=desc">'.$this->getTranslator()->trans('Transformer theme tutorials', array(), 'Modules.Stthemeeditor.Admin').'</a></li><li><a href="https://www.sunnytoo.com/blogs?term=46&orderby=date&order=desc">'.$this->getTranslator()->trans('Prestashop tutorials', array(), 'Modules.Stthemeeditor.Admin').'</a></li></ul>';

return $fields_form;