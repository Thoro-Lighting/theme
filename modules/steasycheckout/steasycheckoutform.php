<?php
$fields_form = array();
$name = substr(strtolower(basename(__FILE__)), 0, -4);
$fields_form[0]['form'] = array(
    'input' => array(
      //  array(
      //      'type' => 'html',
       //     'id' => '',
      //      'label' => $this->l('One-click demo importer:', $name),
      //      'name' => '<button type="button" id="import_export" class="btn btn-default"><i class="icon process-icon-new-module"></i> '.$this->l('Import/export', $name).'</button>',
      //  ),
        array(
            'type' => 'switch',
            'label' => $this->l('Disable', $name),
            'name' => 'disable',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'disable_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
                array(
                    'id' => 'disable_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
    //    array(
     //       'type' => 'switch',
     //       'label' => $this->l('Go to checkout page directly, not showing shopping cart page.', $name),
     //       'name' => 'skip_shopping_cart',
      //      'default_value' => 1,
      //      'values' => array(
      //          array(
      //              'id' => 'skip_shopping_cart_1',
      //              'value' => 1,
      //              'label' => $this->l('YES', $name)),
      //          array(
       //             'id' => 'skip_shopping_cart_0',
       //             'value' => 0,
       //             'label' => $this->l('NO', $name)),
       //     ),
      //      'validation' => 'isUnsignedInt',
      //  ),
        array(
            'type' => 'hidden',
            'name' => 'id_tab_index',
            'default_value' => 0,
        ),
        array(
            'type' => 'textarea',
            'label' => $this->l('Custom CSS Code:', $name),
            'name' => 'custom_css',
            'cols' => 80,
            'rows' => 20,
            'validation' => 'isAnything',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[7]['form'] = array(
    'legend' => array(
        'title' => $this->l('Columns', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        /*'reset' => array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Layout preview.', $name),
            'name' => '<img src="'._MODULE_DIR_.$this->name.'/views/img/layout.jpg" />',
        ), */
        'columns' => array(
            'type' => 'html',
            'id' => 'columns',
            'label'=> $this->l('Set the width of columns:', $name),
            'name' => '',
              ),
      /*  array(
            'type' => 'text',
            'label' => $this->l('The width of gaps between columns:', $name),
            'name' => 'column_gap',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isNullOrUnsignedId',
        ),*/
        
        array(
            'type' => 'radio',
            'label' => $this->l('Beambar (steps):', $name),
            'name' => 'beambar_cart',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'beambar_cart_0',
                    'value' => 0,
                    'label' => $this->l('No', $name)),
                array(
                    'id' => 'beambar_cart_1',
                    'value' => 1,
                    'label' => $this->l('Yes, as text', $name)),
                array(
                    'id' => 'beambar_cart_2',
                    'value' => 2,
                    'label' => $this->l('Yes, as link', $name)),
                array(
                    'id' => 'beambar_cart_3',
                    'value' => 3,
                    'label' => $this->l('Yes, as text - (no numbers)', $name)),
                array(
                    'id' => 'beambar_cart_4',
                    'value' => 4,
                    'label' => $this->l('Yes, as link - (no numbers)', $name)),
               
            ),
            'validation' => 'isUnsignedInt',
           
        ),
         array(
            'type' => 'radio',
            'label' => $this->l('Cart summary + Place order button block:', $name),
            'name' => 'display_cart',
            'default_value' => 2,
            'values' => array(
                array(
                    'id' => 'display_cart_0',
                    'value' => 0,
                    'label' => $this->l('First column', $name)),
                array(
                    'id' => 'display_cart_1',
                    'value' => 1,
                    'label' => $this->l('Second column', $name)),
                array(
                    'id' => 'display_cart_2',
                    'value' => 2,
                    'label' => $this->l('Third column', $name)),
                array(
                    'id' => 'display_cart_3',
                    'value' => 3,
                    'label' => $this->l('Fourth column', $name)),
            ),
            'validation' => 'isUnsignedInt',
           
        ),
        
       
        /*array(
            'type' => 'radio',
            'label' => $this->l('Addresses block:', $name),
            'name' => 'addresses_block',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'addresses_block_0',
                    'value' => 0,
                    'label' => $this->l('First column', $name)),
                array(
                    'id' => 'addresses_block_1',
                    'value' => 1,
                    'label' => $this->l('Second column', $name)),
                array(
                    'id' => 'addresses_block_2',
                    'value' => 2,
                    'label' => $this->l('Third column', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),*/
        array(
            'type' => 'radio',
            'label' => $this->l('Delivery method block:', $name),
            'name' => 'delivery_block',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'delivery_block_0',
                    'value' => 0,
                    'label' => $this->l('First column', $name)),
                array(
                    'id' => 'delivery_block_1',
                    'value' => 1,
                    'label' => $this->l('Second column', $name)),
                array(
                    'id' => 'delivery_block_2',
                    'value' => 2,
                    'label' => $this->l('Third column', $name)),
                array(
                    'id' => 'delivery_block_3',
                    'value' => 3,
                    'label' => $this->l('Fourth column', $name)),
                array(
                    'id' => 'delivery_block_4',
                    'value' => 4,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'radio',
            'label' => $this->l('Payment method block:', $name),
            'name' => 'payment_block',
            'default_value' => 2,
            'values' => array(
                array(
                    'id' => 'payment_block_0',
                    'value' => 0,
                    'label' => $this->l('First column', $name)),
                array(
                    'id' => 'payment_block_1',
                    'value' => 1,
                    'label' => $this->l('Second column', $name)),
                array(
                    'id' => 'payment_block_2',
                    'value' => 2,
                    'label' => $this->l('Third column', $name)),
                array(
                    'id' => 'payment_block_3',
                    'value' => 3,
                    'label' => $this->l('Fourth column', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
         array(
            'type' => 'radio',
            'label' => $this->l('Login and addresses block:', $name),
            'name' => 'login_block',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'login_block_0',
                    'value' => 0,
                    'label' => $this->l('First column', $name)),
                array(
                    'id' => 'login_block_1',
                    'value' => 1,
                    'label' => $this->l('Second column', $name)),
                array(
                    'id' => 'login_block_2',
                    'value' => 2,
                    'label' => $this->l('Third column', $name)),
                array(
                    'id' => 'login_block_3',
                    'value' => 3,
                    'label' => $this->l('Fourth column', $name)),
                array(                    
                    'id' => 'login_block_4',
                    'value' => 4,
                    'label' => $this->l('Login', $name)),
                array(                    
                    'id' => 'login_block_5',
                    'value' => 5,
                    'label' => $this->l('No', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        
         array(
            'type' => 'radio',
            'label' => $this->l('Summary block:', $name),
            'name' => 'summary_block',
            'default_value' => 2,
            'values' => array(
                array(
                    'id' => 'summary_block_0',
                    'value' => 0,
                    'label' => $this->l('First column', $name)),
                array(
                    'id' => 'summary_block_1',
                    'value' => 1,
                    'label' => $this->l('Second column', $name)),
                array(
                    'id' => 'summary_block_2',
                    'value' => 2,
                    'label' => $this->l('Third column', $name)),
                array(
                    'id' => 'summary_block_3',
                    'value' => 3,
                    'label' => $this->l('Fourth column', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),

         array(
            'type' => 'radio',
            'label' => $this->l('Summary Address block:', $name),
            'name' => 'summary_address_block',
            'default_value' => 2,
            'values' => array(
                array(
                    'id' => 'summary_address_block_0',
                    'value' => 0,
                    'label' => $this->l('First column', $name)),
                array(
                    'id' => 'summary_address_block_1',
                    'value' => 1,
                    'label' => $this->l('Second column', $name)),
                array(
                    'id' => 'summary_address_block_2',
                    'value' => 2,
                    'label' => $this->l('Third column', $name)),
                array(
                    'id' => 'summary_address_block_3',
                    'value' => 3,
                    'label' => $this->l('Fourth column', $name)),
                 array(
                    'id' => 'summary_address_block_6',
                    'value' => 6,
                    'label' => $this->l('Six column', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),      
               
         array(
            'type' => 'radio',
            'label' => $this->l('A message to order', $name),
            'name' => 'message_order',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'message_order_0',
                    'value' => 0,
                    'label' => $this->l('No', $name)),
                array(
                    'id' => 'message_order_1',
                    'value' => 1,
                    'label' => $this->l('Under the shipping zone', $name)),
                array(
                    'id' => 'message_order_2',
                    'value' => 2,
                    'label' => $this->l('Under the basket', $name)),
                array(
                    'id' => 'message_order_3',
                    'value' => 3,
                    'label' => $this->l('In summary', $name)),
           
            ),
            'validation' => 'isUnsignedInt',
           
        ),
        
        
        array(
            'type' => 'radio',
            'label' => $this->l('Customer reassurance block:', $name),
            'name' => 'reassurance',
            'default_value' => 4,
            'values' => array(
                array(
                    'id' => 'reassurance_0',
                    'value' => 0,
                    'label' => $this->l('First column', $name)),
                array(
                    'id' => 'reassurance_1',
                    'value' => 1,
                    'label' => $this->l('Second column', $name)),
                array(
                    'id' => 'reassurance_2',
                    'value' => 2,
                    'label' => $this->l('Third column', $name)),
                array(
                    'id' => 'reassurance_3',
                    'value' => 3,
                    'label' => $this->l('Fourth column', $name)),
                array(
                    'id' => 'reassurance_4',
                    'value' => 4,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
           
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Column background:', $name),
            'name' => 'column_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Top and bottom paddings:', $name),
            'name' => 'column_tb_padding',
            'validation' => 'isNullOrUnsignedId',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Right and left paddings:', $name),
            'name' => 'column_rl_padding',
            'validation' => 'isNullOrUnsignedId',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ), 
        /*array(
            'type' => 'text',
            'label' => $this->l('The width of borders between columns:', $name),
            'name' => 'column_border',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isNullOrUnsignedId',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color:', $name),
            'name' => 'column_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),*/
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[11]['form'] = array(
    'legend' => array(
        'title' => $this->l('Font settings', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'switch',
            'label' => $this->l('Latin extended support:', $name),
            'name' => 'font_latin_support',
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'font_latin_support_on',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'font_latin_support_off',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'desc' => $this->l('You have to check whether your selected fonts support Latin extended here', $name).' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
            'validation' => 'isBool',
        ), 
        array(
            'type' => 'switch',
            'label' => $this->l('Cyrylic support:', $name),
            'name' => 'font_cyrillic_support',
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'font_cyrillic_support_on',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'font_cyrillic_support_off',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'desc' => $this->l('You have to check whether your selected fonts support Cyrylic here', $name).' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
            'validation' => 'isBool',
        ),  
        array(
            'type' => 'switch',
            'label' => $this->l('Vietnamese support:', $name),
            'name' => 'font_vietnamese',
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'font_vietnamese_on',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'font_vietnamese_off',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'desc' => $this->l('You have to check whether your selected fonts support Vietnamese here', $name).' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
            'validation' => 'isBool',
        ),  
        array(
            'type' => 'switch',
            'label' => $this->l('Greek support:', $name),
            'name' => 'font_greek_support',
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'font_greek_support_on',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'font_greek_support_off',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'desc' => $this->l('You have to check whether your selected fonts support Greek here', $name).' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
            'validation' => 'isBool',
        ), 
        array(
            'type' => 'switch',
            'label' => $this->l('Arabic support:', $name),
            'name' => 'font_arabic_support',
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'font_arabic_support_on',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'font_arabic_support_off',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'desc' => $this->l('You have to check whether your selected fonts support Arabic here', $name).' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
            'validation' => 'isBool',
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Font:', $name),
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
                    'label' => $this->l('Use default', $name)
                ),
            ),
            'desc' => '<p id="font_text_list_example" class="fontshow">Home Fashion</p>',
        ),
        'font_text'=>array(
            'type' => 'select',
            'label' => $this->l('Font weight:', $name),
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
            'label' => $this->l('Font size:', $name),
            'name' => 'font_body_size',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Content top spacing:', $name),
            'name' => 'top_spacing',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Content top spacing:', $name),
            'name' => 'bottom_spacing',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[14]['form'] = array(
    'legend' => array(
        'title' => $this->l('Check', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'fontello',
            'label' => $this->l('Check icon:', $name),
            'name' => 'tick_icon',
            'values' => $this->get_fontello(),
            'validation' => 'isAnything',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Show check icons for selected items only:', $name),
            'name' => 'tick_selected_only',
            'is_bool' => true,
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'tick_selected_only_on',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'tick_selected_only_off',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isBool',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Size:', $name),
            'name' => 'tick_size',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Check color:', $name),
            'name' => 'radio_checkbox_color_active',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'radio_checkbox_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
            'desc' => $this->l('Leave this empty to have transparent background.', $name),
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Active background color:', $name),
            'name' => 'radio_checkbox_bg_active',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color:', $name),
            'name' => 'tick_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Border size:', $name),
            'name' => 'tick_border_size',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[21]['form'] = array(
    'legend' => array(
        'title' => $this->l('Loading overlay', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Color:', $name),
            'name' => 'overlay_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Opacity:', $name),
            'name' => 'overlay_opacity',
            'validation' => 'isFloat',
            'class' => 'fixed-width-lg',
            'desc' => $this->l('From 0.0 (fully transparent) to 1.0 (fully opaque).', $name),
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[22]['form'] = array(
    'legend' => array(
        'title' => $this->l('Loading placehoder', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Color:', $name),
            'name' => 'placehoder_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background:', $name),
            'name' => 'placehoder_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Highlight background:', $name),
            'name' => 'placehoder_highlight_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
            'desc' => $this->l('Fill in the above Background option to make this option take effect.', $name),
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[8]['form'] = array(
    'legend' => array(
        'title' => $this->l('Color settings', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'text_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Link color:', $name),
            'name' => 'link_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Link hover color:', $name),
            'name' => 'link_hover_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'bg_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
         array(
            'type' => 'color',
            'label' => $this->l('Container background color:', $name),
            'name' => 'con_bg_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
        array(
            'type' => 'select',
            'label' => $this->l('Background pattern:', $name),
            'name' => 'section_bg_pattern',
            'options' => array(
                'query' => $this->getPatternsArray(),
                'id' => 'id',
                'name' => 'name',
                'default' => array(
                    'value' => 0,
                    'label' => $this->l('None', $name),
                ),
            ),
            'desc' => $this->getPatterns(),
            'validation' => 'isUnsignedInt',
        ),
        'section_bg_image_field' => array(
            'type' => 'file',
            'label' => $this->l('Upload your own pattern as background image:', $name),
            'name' => 'section_bg_image_field',
            'desc' => '',
        ),
        array(
            'type' => 'radio',
            'label' => $this->l('Repeat:', $name),
            'name' => 'section_bg_repeat',
            'values' => array(
                array(
                    'id' => 'section_bg_repeat_xy',
                    'value' => 0,
                    'label' => $this->l('Repeat xy', $name)),
                array(
                    'id' => 'section_bg_repeat_x',
                    'value' => 1,
                    'label' => $this->l('Repeat x', $name)),
                array(
                    'id' => 'section_bg_repeat_y',
                    'value' => 2,
                    'label' => $this->l('Repeat y', $name)),
                array(
                    'id' => 'section_bg_repeat_no',
                    'value' => 3,
                    'label' => $this->l('No repeat', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ), 
        array(
            'type' => 'radio',
            'label' => $this->l('Background Position:', $name),
            'name' => 'section_bg_position',
            'values' => array(
                array(
                    'id' => 'section_bg_repeat_left',
                    'value' => 0,
                    'label' => $this->l('Left', $name)),
                array(
                    'id' => 'section_bg_repeat_center',
                    'value' => 1,
                    'label' => $this->l('Center', $name)),
                array(
                    'id' => 'section_bg_repeat_right',
                    'value' => 2,
                    'label' => $this->l('Right', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Scale the background image:', $name),
            'name' => 'section_bg_cover',
            'is_bool' => true,
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'section_bg_cover_on',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'section_bg_cover_off',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'desc' => $this->l('Scale the background image to be as large as possible so that the window is completely covered by the background image. Some parts of the background image may not be in view within the window.', $name),
            'validation' => 'isBool',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Input text color:', $name),
            'name' => 'input_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Input background color:', $name),
            'name' => 'input_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Input border color:', $name),
            'name' => 'input_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        //
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[16]['form'] = array(
    'legend' => array(
        'title' => $this->l('Buttons', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Color:', $name),
            'name' => 'btn_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background:', $name),
            'name' => 'btn_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Border size:', $name),
            'name' => 'btn_border',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isNullOrUnsignedId',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color:', $name),
            'name' => 'btn_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Hover color:', $name),
            'name' => 'btn_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Hover background:', $name),
            'name' => 'btn_bg_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Hover border color:', $name),
            'name' => 'btn_border_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[25]['form'] = array(
    'legend' => array(
        'title' => $this->l('Checkout process bar', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Bar color:', $name),
            'name' => 'checkout_bar_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background:', $name),
            'name' => 'checkout_bar_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[9]['form'] = array(
    'legend' => array(
        'title' => $this->l('Block heading', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'heading_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Text size:', $name),
            'name' => 'heading_size',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'heading_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
        array(
            'type' => 'select',
            'label' => $this->l('Heading font:', $name),
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
                    'label' => $this->l('Use default', $name)
                ),
            ),
            'desc' => '<p id="font_heading_list_example" class="fontshow">Sample heading</p>',
        ),
        'font_heading'=>array(
            'type' => 'select',
            'label' => $this->l('Heading font weight:', $name),
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
            'type' => 'select',
            'label' => $this->l('Heading transform:', $name),
            'name' => 'font_heading_trans',
            'options' => array(
                'query' => self::$textTransform,
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'radio',
            'label' => $this->l('Heading alignment:', $name),
            'name' => 'heading_align',
            'values' => array(
                array(
                    'id' => 'heading_align_0',
                    'value' => 0,
                    'label' => $this->l('Left', $name)),
                array(
                    'id' => 'heading_align_1',
                    'value' => 1,
                    'label' => $this->l('Center', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ), 
     /*   'heading_paddings' => array(
            'type' => 'html',
            'id' => 'heading_paddings',
            'label'=> $this->l('Paddings', $name),
            'name' => '',
        ),*/
        array(
            'type' => 'radio',
            'label' => $this->l('Heading style:', $name),
            'name' => 'step_numbers',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'step_numbers_0',
                    'value' => 0,
                    'label' => $this->l('With step numbers', $name)),
                array(
                    'id' => 'step_numbers_1',
                    'value' => 1,
                    'label' => $this->l('With step icons', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'fontello',
            'label' => $this->l('Personal information block icon:', $name),
            'name' => 'pi_icon',
            'values' => $this->get_fontello(),
            'validation' => 'isAnything',
        ), 
        array(
            'type' => 'fontello',
            'label' => $this->l('Carrier block icon:', $name),
            'name' => 'carrier_icon',
            'values' => $this->get_fontello(),
            'validation' => 'isAnything',
        ), 
        array(
            'type' => 'fontello',
            'label' => $this->l('Payment method block icon:', $name),
            'name' => 'payment_icon',
            'values' => $this->get_fontello(),
            'validation' => 'isAnything',
        ), 
        array(
            'type' => 'fontello',
            'label' => $this->l('Cart summary block icon:', $name),
            'name' => 'cart_icon',
            'values' => $this->get_fontello(),
            'validation' => 'isAnything',
        ), 
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[24]['form'] = array(
    'legend' => array(
        'title' => $this->l('Settings for step icons and step numbers', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Color:', $name),
            'name' => 'step_number_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background:', $name),
            'name' => 'step_number_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Width:', $name),
            'name' => 'step_number_width',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Height:', $name),
            'name' => 'step_number_height',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Radius:', $name),
            'name' => 'step_number_radius',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Padding:', $name),
            'name' => 'step_number_padding',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Border size:', $name),
            'name' => 'step_number_border',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isNullOrUnsignedId',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color:', $name),
            'name' => 'step_number_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Font:', $name),
            'name' => 'font_step_number_list',
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
                    'label' => $this->l('Use default', $name)
                ),
            ),
            'desc' => '<p id="font_step_number_list_example" class="fontshow">123456789</p>',
        ),
        'font_step_number'=>array(
            'type' => 'select',
            'label' => $this->l('Font weight:', $name),
            'onchange' => 'handle_font_style(this);',
            'class' => 'fontOptions',
            'name' => 'font_step_number',
            'options' => array(
                'query' => array(),
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isAnything',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Text size:', $name),
            'name' => 'step_number_text_size',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[20]['form'] = array(
    'legend' => array(
        'title' => $this->l('Subheading', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'select',
            'label' => $this->l('Subheading font:', $name),
            'name' => 'font_subheading_list',
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
                    'label' => $this->l('Use default', $name)
                ),
            ),
            'desc' => '<p id="font_subheading_list_example" class="fontshow">123456789</p>',
        ),
        'font_subheading'=>array(
            'type' => 'select',
            'label' => $this->l('Subheading font weight:', $name),
            'onchange' => 'handle_font_style(this);',
            'class' => 'fontOptions',
            'name' => 'font_subheading',
            'options' => array(
                'query' => array(),
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isAnything',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Subheading text size:', $name),
            'name' => 'subheading_text_size',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Subheading color:', $name),
            'name' => 'subheading_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[10]['form'] = array(
    'legend' => array(
        'title' => $this->l('Column shadows', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'switch',
            'label' => $this->l('Shadows around columns', $name),
            'name' => 'column_shadow',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'column_shadow_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'column_shadow_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('H-shadow:', $name),
            'name' => 'column_h_shadow',
            'validation' => 'isInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'desc' => $this->l('The position of the horizontal shadow. Negative values are allowed.', $name),
        ),
        array(
            'type' => 'text',
            'label' => $this->l('V-shadow:', $name),
            'name' => 'column_v_shadow',
            'validation' => 'isInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'desc' => $this->l('The position of the vertical shadow. Negative values are allowed.', $name),
        ),
        array(
            'type' => 'text',
            'label' => $this->l('The blur distance of shadow:', $name),
            'name' => 'column_shadow_blur',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Shadow color:', $name),
            'name' => 'column_shadow_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Shadow opacity:', $name),
            'name' => 'column_shadow_opacity',
            'validation' => 'isFloat',
            'class' => 'fixed-width-lg',
            'desc' => $this->l('From 0.0 (fully transparent) to 1.0 (fully opaque).', $name),
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[1]['form'] = array(
    'legend' => array(
        'title' => $this->l('Personal information block', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->l('Default form:', $name),
            'name' => 'default_pi_form',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'default_pi_form_0',
                    'value' => 0,
                    'label' => $this->l('Login form', $name)),
                array(
                    'id' => 'default_pi_form_1',
                    'value' => 1,
                    'label' => $this->l('New csutomer', $name)),
               array(
                    'id' => 'default_pi_form_2',
                    'value' => 2,
                    'label' => $this->l('Both developed', $name)),
                array(
                    'id' => 'default_pi_form_3',
                    'value' => 3,
                    'label' => $this->l('Close all', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
         array(
            'type' => 'switch',
            'label' => $this->l('Standard version', $name),
            'name' => 'standard_version',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'standard_version_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'standard_version_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('In the standard version - above 768px, the forms are always developed', $name)
        ),
        
        
         array(
            'type' => 'switch',
            'label' => $this->l('Button option for drop-down forms', $name),
            'name' => 'button_form',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'button_form_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'button_form_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            
        ),
        
        
        
        
        array(
            'type' => 'radio',
            'label' => $this->l('Default account type:', $name),
            'name' => 'default_account',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'default_account_0',
                    'value' => 0,
                    'label' => $this->l('Private person', $name)),
                array(
                    'id' => 'default_account_1',
                    'value' => 1,
                    'label' => $this->l('Company account', $name)),
               
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        array(
            'type' => 'radio',
            'label' => $this->l('Display Log out button:', $name),
            'name' => 'display_logout',
            'default_value' => 2,
            'values' => array(
                array(
                    'id' => 'display_logout_2',
                    'value' => 2,
                    'label' => $this->l('YES, redirect to log in page after log out', $name)),
                array(
                    'id' => 'display_logout_1',
                    'value' => 1,
                    'label' => $this->l('YES, redirect to homepage after log out', $name)),
                array(
                    'id' => 'display_logout_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Compact mode for forms', $name),
            'name' => 'compact_forms',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'compact_forms_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'compact_forms_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('2 fields per row.', $name)
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Enable guest checkout', $name),
            'name' => 'guest_checkout_enabled',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'guest_checkout_enabled_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'guest_checkout_enabled_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('This is the same setting as the "Enable guest checkout" option on the "Order settings" page.', $name)
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Ask for birth date', $name),
            'name' => 'customer_birthdate',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'customer_birthdate_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'customer_birthdate_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('This is the same setting as the "Ask for birth date" option on the "Customer settings" page.', $name)
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Ask for social title (Mr , Mrs)', $name),
            'name' => 'ask_for_gender',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'ask_for_gender_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'ask_for_gender_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'radio',
            'label' => $this->l('Enable partner offers', $name),
            'name' => 'customer_optin',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'customer_optin_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'customer_optin_2',
                    'value' => 2,
                    'label' => $this->l('Yes, checked by default', $name)),
                array(
                    'id' => 'customer_optin_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('This is the same setting as the "Enable partner offers" option on the "Customer settings" page.', $name)
        ),
        array(
            'type' => 'radio',
            'label' => $this->l('Enable newsletter checkbox', $name),
            'name' => 'newsletter',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'newsletter_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'newsletter_2',
                    'value' => 2,
                    'label' => $this->l('Yes, checked by default', $name)),
                array(
                    'id' => 'newsletter_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
       /* array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'pi_text_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Link color:', $name),
            'name' => 'pi_link_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Link hover color:', $name),
            'name' => 'pi_link_hover_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'pi_bg_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),*/
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[17]['form'] = array(
    'legend' => array(
        'title' => $this->l('Login & register accordin', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Heading color:', $name),
            'name' => 'pi_heading_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Heading background:', $name),
            'name' => 'pi_heading_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Heading border size:', $name),
            'name' => 'pi_heading_border',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isNullOrUnsignedId',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Heading border color:', $name),
            'name' => 'pi_heading_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Actived heading color:', $name),
            'name' => 'pi_heading_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Actived heading background:', $name),
            'name' => 'pi_heading_bg_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Actived heading border color:', $name),
            'name' => 'pi_heading_border_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[6]['form'] = array(
    /*'description' => '<a href="https://www.sunnytoo.com/25679/get-client-ids-secrets-social-networks-social-login-feature" target="_blank">'.$this->l('How to get client IDs and Secrets of social networks for social login feature.', $name).'</a>',*/
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->l('Button style:', $name),
            'name' => 'social_button',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'social_button_1',
                    'value' => 1,
                    'label' => $this->l('Icon+Text', $name)),
                array(
                    'id' => 'social_button_0',
                    'value' => 0,
                    'label' => $this->l('Icon', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Facebook Login', $name),
            'name' => 'facebook_login',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'facebook_login_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'facebook_login_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Urls', $name),
            'name' => $this->l('App domain', $name).'<span class="social_url">'.$_SERVER['HTTP_HOST'].'</span><br/>'.$this->l('Site url', $name).'<span class="social_url">'.$this->context->shop->getBaseURL(true, false).'</span><br/>'.$this->l('Valid OAuth Redirect URIs', $name).'<span class="social_url">'.$this->context->link->getModuleLink(
                    $this->name,
                    'default',
                    array('steco_facebook'=>1),
                    (bool) Configuration::get('PS_SSL_ENABLED')
                ).'</span>',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Facebook App ID:', $name),
            'name' => 'facebook_id',
            'validation' => 'isGenericName',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Facebook App Secret:', $name),
            'name' => 'facebook_key',
            'validation' => 'isGenericName',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Paypal Login', $name),
            'name' => 'paypal_login',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'paypal_login_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'paypal_login_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('Since paypal changed API, they do not provide frist name and family name anymore, they just provide a full name. To get first name and family for a full name sometimes may not accurate.', $name),
        ),
        array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Url', $name),
            'name' => $this->l('Live Return URL', $name).'<span class="social_url">'.$this->context->link->getModuleLink(
                    $this->name,
                    'default',
                    array('steco_paypal'=>1),
                    (bool) Configuration::get('PS_SSL_ENABLED')
                ).'</span>',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Paypal Client ID:', $name),
            'name' => 'paypal_id',
            'validation' => 'isGenericName',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Paypal Secret Key:', $name),
            'name' => 'paypal_key',
            'validation' => 'isGenericName',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Google Login', $name),
            'name' => 'google_login',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'google_login_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'google_login_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Urls', $name),
            'name' => $this->l('Authorized JavaScript Origins', $name).'<span class="social_url">'.$this->context->shop->getBaseURL(true, false).'</span><br/>'.$this->l('Authorized redirect urls', $name).'<span class="social_url">'.$this->context->link->getModuleLink(
                    $this->name,
                    'default',
                    array('steco_google'=>1),
                    (bool) Configuration::get('PS_SSL_ENABLED')
                ).'</span>',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Google Client ID:', $name),
            'name' => 'google_id',
            'validation' => 'isGenericName',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Google Client Secret:', $name),
            'name' => 'google_key',
            'validation' => 'isGenericName',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Amazon Login', $name),
            'name' => 'amazon_login',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'amazon_login_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'amazon_login_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Url', $name),
            'name' => $this->l('Allowed Return URLs', $name).'<span class="social_url">'.$this->context->link->getModuleLink(
                    $this->name,
                    'default',
                    array('steco_amazon'=>1),
                    (bool) Configuration::get('PS_SSL_ENABLED')
                ).'</span>',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Amazon Client ID:', $name),
            'name' => 'amazon_id',
            'validation' => 'isGenericName',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Amazon Client Secret:', $name),
            'name' => 'amazon_key',
            'validation' => 'isGenericName',
        ),
        /*array(
            'type' => 'switch',
            'label' => $this->l('Twitter Login', $name),
            'name' => 'twitter_login',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'twitter_login_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'twitter_login_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Urls', $name),
            'name' => $this->l('Website', $name).'<span class="social_url">'.$this->context->shop->getBaseURL(true, false).'</span><br/>'.$this->l('Callback urls', $name).'<span class="social_url">'.$this->context->link->getModuleLink(
                    $this->name,
                    'default',
                    array('steco_twitter'=>1),
                    (bool) Configuration::get('PS_SSL_ENABLED')
                ).'</span>',
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Twitter Client ID:', $name),
            'name' => 'twitter_id',
            'validation' => 'isGenericName',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Twitter Client Secret:', $name),
            'name' => 'twitter_key',
            'validation' => 'isGenericName',
        ),*/
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[2]['form'] = array(
    'legend' => array(
        'title' => $this->l('Addresses block', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'text',
            'label' => $this->l('API key:', $name),
            'name' => 'gmap_api_key',
            'validation' => 'isGenericName',
            'class' => 'fixed-width-xxl',
            'desc' => array(
                    $this->l('Filling in an API key to use the Google address auto suggestion feature.', $name),
                    sprintf($this->l('Click on the first green "GET A KEY" button on %s this page %s to get a key:', $name), '<a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">','</a>', $name),
                ),
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Enable geolocate', $name),
            'name' => 'geolocate',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'geolocate_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'geolocate_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('This will make Google address auto suggestion be more accurate, but a popup window will show out when a user starts filling in an address to ask for permissions of getting the user\'s location', $name),
        ),
        'address_per' => array(
            'type' => 'html',
            'id' => 'address_per',
            'label'=> $this->l('Addresses per row:', $name),
            'name' => '',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'address_text_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'address_bg_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
       /* array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Address format.', $name),
            'name' => sprintf($this->l('Address format is different from conntry to country, so go to %s Countries %s page to manage address format under a certain country.', $name),'<a href="'.$this->context->link->getAdminLink('AdminCountries').'" target="_blank">','</a>'),
        ), */
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[18]['form'] = array(
    'legend' => array(
        'title' => $this->l('Address items', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        /*array(
            'type' => 'switch',
            'label' => $this->l('Compact mode', $name),
            'name' => 'compact_address',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'compact_address_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'compact_address_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('2 fields per row, except address 1 and address 2.', $name)
        ),*/
        array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'addresses_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'addresses_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Border size:', $name),
            'name' => 'addresses_border',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isNullOrUnsignedId',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color:', $name),
            'name' => 'addresses_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Text color of selected address:', $name),
            'name' => 'addresses_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color of selected address:', $name),
            'name' => 'addresses_bg_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color of selected address:', $name),
            'name' => 'addresses_border_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[97]['form'] = array(
    'legend' => array(
        'title' => $this->l('Address summary', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->l('Collapsing / expanding data', $name),
            'name' => 'coll_ex_address',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'coll_ex_address_0',
                    'value' => 0,
                    'label' => $this->l('No', $name)),
                array(
                    'id' => 'coll_ex_address_1',
                    'value' => 1,
                    'label' => $this->l('Expanded by default', $name)),
                 array(
                    'id' => 'coll_ex_address_2',
                    'value' => 2,
                    'label' => $this->l('Collapsed by default', $name)),
                  array(
                    'id' => 'coll_ex_address_3',
                    'value' => 3,
                    'label' => $this->l('Collapsed small', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('Option to hide customer data in the order summary and the mobile version.', $name)
        ),
        
        
        array(
            'type' => 'switch',
            'label' => $this->l('Shadow', $name),
            'name' => 'shadow_address',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'shadow_address_1',
                    'value' => 1,
                    'label' => $this->l('Yes', $name)),
                array(
                    'id' => 'shadow_address_0',
                    'value' => 0,
                    'label' => $this->l('No', $name)),
            
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('The effect of clarifying contact details before they are developed. It only works if you select the option above: Visible part of the address with the option to expand', $name)
        ),
        
       
        
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);


$fields_form[3]['form'] = array(
    'legend' => array(
        'title' => $this->l('Carriers block', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        'carrier_default' => array(
            'type' => 'select',
            'label' => $this->l('Default carrier:', $name),
            'name' => 'carrier_default',
            'options' => array(
                'query' => array(),
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isInt',
            'desc' => $this->l('This is the same setting as the "Default carrier" option on the "Shipping>Preferences" page.', $name)
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Sort by:', $name),
            'name' => 'carrier_default_sort',
            'options' => array(
                'query' => array(
                    array('id' => Carrier::SORT_BY_PRICE, 'name' => $this->l('Price', $name)),
                    array('id' => Carrier::SORT_BY_POSITION, 'name' => $this->l('Position', $name)),
                ),
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('This is the same setting as the "Sort by" option on the "Shipping>Preferences" page.', $name)
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Order by:', $name),
            'name' => 'carrier_default_order',
            'options' => array(
                'query' => array(
                    array('id' => Carrier::SORT_BY_ASC, 'name' => $this->l('Ascending', $name)),
                    array('id' => Carrier::SORT_BY_DESC, 'name' => $this->l('Descending', $name)),
                ),
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('This is the same setting as the "Default carrier" option on the "Shipping>Preferences" page.', $name)
        ),
        
         array(
            'type' => 'radio',
            'label' => $this->l('Show description of carrier', $name),
            'name' => 'carrier_method_description',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'carrier_method_description_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
                array(
                    'id' => 'carrier_method_description_1',
                    'value' => 1,
                    'label' => $this->l('YES, as text', $name)),
                array(
                    'id' => 'carrier_method_description_2',
                    'value' => 2,
                    'label' => $this->l('Yes, as tooltip', $name)),
            ),
            'validation' => 'isUnsignedInt',
             'desc' => $this->l('If you choose, the descriptions of the speed of delivery assigned in the edition of the courier will appear.', $name)
        ),
        
         array(
            'type' => 'switch',
            'label' => $this->l('Show carrier image', $name),
            'name' => 'show_carrier_image',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'show_carrier_image_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'show_carrier_image_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
             'desc' => $this->l('If you choose, the courier logos added in the editing of the given kureira or in the zone below will appear.', $name)
        ),
        
        
        
  /*    'carriers_per' => array(
          'type' => 'html',
         'id' => 'carriers_per',
          'label'=> $this->l('Carriers per row:', $name),
       'name' => '',
     ),
          array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'carriers_text_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'carriers_bg_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),*/
    ),
    
    
    
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[101]['form'] = array(
    'legend' => array(
        'title' => $this->l('Shipping and delivery time', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
    
    
        array(
            'type' => 'radio',
            'label' => $this->l('Visibility of the shipping date:', $name),
            'name' => 'ship_holiday',
            'default_value' => 1,
            'values' => array(
                  array(
                    'id' => 'ship_holiday_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
                array(
                    'id' => 'ship_holiday_1',
                    'value' => 1,
                    'label' => $this->l('Everywhere', $name)),
                array(
                    'id' => 'ship_holiday_2',
                    'value' => 2,
                    'label' => $this->l('Only in the basket', $name)),
                array(
                    'id' => 'ship_holiday_3',
                    'value' => 3,
                    'label' => $this->l('Only on the product card', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        array(
            'type' => 'radio',
            'label' => $this->l('Visibility of the date of delivery of the order:', $name),
            'name' => 'deli_holiday',
            'default_value' => 1,
            'values' => array(
                  array(
                    'id' => 'deli_holiday_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
                array(
                    'id' => 'deli_holiday_1',
                    'value' => 1,
                    'label' => $this->l('Everywhere', $name)),
                array(
                    'id' => 'deli_holiday_2',
                    'value' => 2,
                    'label' => $this->l('Only in the basket', $name)),
                array(
                    'id' => 'deli_holiday_3',
                    'value' => 3,
                    'label' => $this->l('Only on the product card', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
    
    array(
            'type' => 'text',
            'label' => $this->l('Cut-off time:', $name),
            'name' => 'hour_holidays',
            'validation' => 'isString',
            'class' => 'fixed-width-lg',
            'desc' => $this->l('The cut-off time by which orders are shipped on a given day. After this time, the content of the message about the shipping time that the customer sees changes.', $name),
        ),
    
       array(
            'type' => 'textarea',
            'label' => $this->l('Non-working days:', $name),
            'name' => 'date_holidays',
            'validation' => 'isString',
            'default' => '',
            'cols' => 5,
            'rows' => 20,
            'desc' => $this->l('Format: yyyy-mm-dd, each date on a new line.', $name),
        ),
        
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);


/*
    iWeb - 2023-04-03
*/
$carriers = Carrier::getCarriers(Context::getContext()->language->id);
foreach ($carriers as $carrier) {
    $fields_form[101]['form']['input'][] = array(
        'type' => 'text',
        'label' => $this->l('Cut-off time:', $name) . ' ' . $carrier['name'],
        'name' => 'hour_holidays_' . $carrier['id_reference'],
        'validation' => 'isString',
        'class' => 'fixed-width-lg',
        'desc' => $this->l('The cut-off time by which orders are shipped on a given day. After this time, the content of the message about the shipping time that the customer sees changes.', $name),
    );

     $fields_form[101]['form']['input'][] = array(
        'type' => 'switch',
        'label' => 'Inny opis ' . $carrier['name'],
        'name' => 'alt_desc_' . $carrier['id_reference'],
        'default_value' => 0,
        'values' => array(
            array(
                'id' => 'alt_desc_' . $carrier['id_reference'] . '_1',
                'value' => 1,
                'label' => $this->l('YES', $name)),
            array(
                'id' => 'alt_desc_' . $carrier['id_reference'] . '_0',
                'value' => 0,
                'label' => $this->l('NO', $name)),
        ),
        'validation' => 'isUnsignedInt',
    );
}

$fields_form[19]['form'] = array(
    'legend' => array(
        'title' => $this->l('Carrier items', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'carriers_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Price color:', $name),
            'name' => 'carriers_price_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'carriers_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Border size:', $name),
            'name' => 'carriers_border',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isNullOrUnsignedId',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color:', $name),
            'name' => 'carriers_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Text color of selected carrier:', $name),
            'name' => 'carriers_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background of selected carrier:', $name),
            'name' => 'carriers_bg_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color of selected carrier:', $name),
            'name' => 'carriers_border_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'select',
            'label' => $this->l('Carrier title font:', $name),
            'name' => 'font_carrier_list',
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
                    'label' => $this->l('Use default', $name)
                ),
            ),
            'desc' => '<p id="font_carrier_list_example" class="fontshow">123456789</p>',
        ),
        'font_carrier'=>array(
            'type' => 'select',
            'label' => $this->l('Carrier title font weight:', $name),
            'onchange' => 'handle_font_style(this);',
            'class' => 'fontOptions',
            'name' => 'font_carrier',
            'options' => array(
                'query' => array(),
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isAnything',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Carrier titl font size:', $name),
            'name' => 'carrier_title_size',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ), 
        'carrier_paddings' => array(
            'type' => 'html',
            'id' => 'carrier_paddings',
            'label'=> $this->l('Paddings', $name),
            'name' => '',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[12]['form'] = array(
    'input' => array(
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[4]['form'] = array(
    'legend' => array(
        'title' => $this->l('Payment methods block', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        'default_payment_method' => array(
            'type' => 'select',
            'label' => $this->l('Default payment module:', $name),
            'name' => 'default_payment_method',
            'options' => array(
                'query' => array(),
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isGenericName',
            'desc' => $this->l('If a module provides multiple payment methods, then the first payment method will be selected.', $name),
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Display payment logo', $name),
            'name' => 'show_payment_logo',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'show_payment_logo_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'show_payment_logo_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        array(
            'type' => 'switch',
            'label' => $this->l('Visibility of the name of the selected payment method in the button confirming the order', $name),
            'name' => 'show_payment_name',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'show_payment_name_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'show_payment_name_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),

        array(
            'type' => 'radio',
            'label' => $this->l('Show description of payment methods', $name),
            'name' => 'payment_method_description',
            'default_value' => 1,
            'values' => array(
                  array(
                    'id' => 'payment_method_description_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
                array(
                    'id' => 'payment_method_description_1',
                    'value' => 1,
                    'label' => $this->l('YES, as text', $name)),
                array(
                    'id' => 'payment_method_description_2',
                    'value' => 2,
                    'label' => $this->l('Yes, as tooltip', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        array(
            'type' => 'switch',
            'label' => $this->l('Show description of payment methods in summary', $name),
            'name' => 'payment_method_summary',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'payment_method_summary',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'payment_method_summary',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        
        
        array(
            'type' => 'switch',
            'label' => $this->l('Make Terms and conditions checked by default', $name),
            'name' => 'terms_conditions_checked',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'terms_conditions_checked_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'terms_conditions_checked_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
     /*   array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'payments_text_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'payments_bg_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),*/
        array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Ship to pay.', $name),
            'name' => sprintf($this->l('Go to %s Payment references %s page to manage ship to pay.', $name),'<a href="'.$this->context->link->getAdminLink('AdminPaymentPreferences').'" target="_blank">','</a>'),
        ), 
        array(
            'type' => 'text',
            'label' => $this->l('Payment methods which don\'t need the native submit method:', $name),
            'name' => 'payments_no_submit',
            'validation' => 'isAnything',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[13]['form'] = array(
    'legend' => array(
        'title' => $this->l('Payment method items', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'payments_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'payments_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Border size:', $name),
            'name' => 'payments_border',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isNullOrUnsignedId',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color:', $name),
            'name' => 'payments_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Text color of selected payment method:', $name),
            'name' => 'payments_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color of selected payment method:', $name),
            'name' => 'payments_bg_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Border color of selected payment method:', $name),
            'name' => 'payments_border_color_selected',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        
        array(
            'type' => 'select',
            'label' => $this->l('Payment method title font:', $name),
            'name' => 'font_payment_list',
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
                    'label' => $this->l('Use default', $name)
                ),
            ),
            'desc' => '<p id="font_payment_list_example" class="fontshow">123456789</p>',
        ),
        'font_payment'=>array(
            'type' => 'select',
            'label' => $this->l('Payment method title font weight:', $name),
            'onchange' => 'handle_font_style(this);',
            'class' => 'fontOptions',
            'name' => 'font_payment',
            'options' => array(
                'query' => array(),
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isAnything',
        ),
        array(
            'type' => 'text',
            'label' => $this->l('Payment method title font size:', $name),
            'name' => 'payment_title_size',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ), 
        'payment_paddings' => array(
            'type' => 'html',
            'id' => 'payment_paddings',
            'label'=> $this->l('Paddings', $name),
            'name' => '',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[5]['form'] = array(
    'legend' => array(
        'title' => $this->l('Cart block', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->l('How to display cart summary:', $name),
            'name' => 'cart_summary',
            'default_value' => 0,
            'values' => array(
             //   array(
             //       'id' => 'cart_summary_0',
              //      'value' => 0,
              //      'label' => $this->l('Cart summary', $name)),
                array(
                    'id' => 'cart_summary_1',
                    'value' => 1,
                    'label' => $this->l('Small editable cart summary', $name)),
                array(
                    'id' => 'cart_summary_2',
                    'value' => 2,
                    'label' => $this->l('Big editable cart summary', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('A small basket - ideal for a basket layout when the product zone is not on the entire width.<br>Large basket - ideal for a basket layout when the product area is on the entire width of the store.', $name),
 
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Display product image', $name),
            'name' => 'cart_pro_image',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'cart_pro_image_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'cart_pro_image_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        
 
       
        
               
        array(
            'type' => 'switch',
            'label' => $this->l('Display product combination', $name),
            'name' => 'cart_pro_name',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'cart_pro_name_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'cart_pro_name_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        array(
            'type' => 'switch',
            'label' => $this->l('Visibility of the rebate code zone', $name),
            'name' => 'vis_voucher_zone',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'vis_voucher_zone_1',
                    'value' => 1,
                    'label' => $this->l('Yes', $name)),
                array(
                    'id' => 'vis_voucher_zone_0',
                    'value' => 0,
                    'label' => $this->l('No', $name)),
            ),
            'validation' => 'isUnsignedInt',
            'desc' => $this->l('The discount code field is visible if the store has discount codes - the tab: Catalog> discounts. In the absence of discount codes, this zone is automatically covered. If rebate codes are created in the shop, you can hide this zone by selecting the option No.', $name),
        ),
        
         array(
            'type' => 'switch',
            'label' => $this->l('Visibility of promotion strickers', $name),
            'name' => 'promotion_strickers',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'promotion_strickers_1',
                    'value' => 1,
                    'label' => $this->l('Yes', $name)),
                array(
                    'id' => 'promotion_strickers_0',
                    'value' => 0,
                    'label' => $this->l('No', $name)),
            ),
            'validation' => 'isUnsignedInt',
            
        ),
        
              array(
            'type' => 'switch',
            'label' => $this->l('Visibility of old price', $name),
            'name' => 'promotion_price',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'promotion_price_1',
                    'value' => 1,
                    'label' => $this->l('Yes', $name)),
                array(
                    'id' => 'promotion_price_0',
                    'value' => 0,
                    'label' => $this->l('No', $name)),
            ),
            'validation' => 'isUnsignedInt',
            
        ),

      array(
            'type' => 'switch',
            'label' => $this->l('Visibility of price save', $name),
            'name' => 'promotion_save',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'promotion_save_1',
                    'value' => 1,
                    'label' => $this->l('Yes', $name)),
                array(
                    'id' => 'promotion_save_0',
                    'value' => 0,
                    'label' => $this->l('No', $name)),
            ),
            'validation' => 'isUnsignedInt',
            
        ),
        
         array(
            'type' => 'switch',
            'label' => $this->l('Show the weight of products', $name),
            'name' => 'weight_products',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'weight_products_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'weight_products_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
        array(
            'type' => 'switch',
            'label' => $this->l('Show the weight of products sum', $name),
            'name' => 'weight_products_sum',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'weight_products_sum_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'weight_products_sum_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        
               
         array(
           'type' => 'radio',
            'label' => $this->l('Presentation of the voucher code', $name),
            'name' => 'presentation_voucher',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'presentation_voucher_1',
                    'value' => 1,
                    'label' => $this->l('Visible', $name)),
                array(
                    'id' => 'presentation_voucher_0',
                    'value' => 0,
                    'label' => $this->l('Collapsed, visible after clicking', $name)),
            ),
            'validation' => 'isUnsignedInt',
         
        ),
        
        
        array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'cart_text_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Link color:', $name),
            'name' => 'cart_link_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Link hover color:', $name),
            'name' => 'cart_link_hover_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
       /* array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'cart_bg_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),*/
        array(
            'type' => 'color',
            'label' => $this->l('Price color:', $name),
            'name' => 'cart_price_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);
$fields_form[15]['form'] = array(
    'legend' => array(
        'title' => $this->l('Editable cart summary', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
        array(
            'type' => 'radio',
            'label' => $this->l('How to display quantity:', $name),
            'name' => 'cart_pro_quantity',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'cart_pro_quantity_0',
                    'value' => 0,
                    'label' => $this->l('As content without the possibility of changing the quantity', $name)),
                array(
                    'id' => 'cart_pro_quantity_1',
                    'value' => 1,
                    'label' => $this->l('Input', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
            'type' => 'switch',
            'label' => $this->l('Display remove button', $name),
            'name' => 'cart_pro_remove',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'cart_pro_remove_1',
                    'value' => 1,
                    'label' => $this->l('YES', $name)),
                array(
                    'id' => 'cart_pro_remove_0',
                    'value' => 0,
                    'label' => $this->l('NO', $name)),
            ),
            'validation' => 'isUnsignedInt',
        ),
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[23]['form'] = array(
    'legend' => array(
        'title' => $this->l('Custom content', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
       array(
            'type' => 'textarea',
            'label' => $this->l('Top custom content block:', $name),
            'name' => 'custom_content',
            'lang' => true,
            'autoload_rte' => true,
            'cols' => 60,
            'rows' => 2,
        ),
        array(
            'type' => 'textarea',
            'label' => $this->l('Bottom custom content block:', $name),
            'name' => 'bottom_custom_content',
            'lang' => true,
            'autoload_rte' => true,
            'cols' => 60,
            'rows' => 2,
        ),
      /*  array(
            'type' => 'color',
            'label' => $this->l('Text color:', $name),
            'name' => 'custom_content_text_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Link color:', $name),
            'name' => 'custom_content_link_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Link hover color:', $name),
            'name' => 'custom_content_link_hover_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        array(
            'type' => 'color',
            'label' => $this->l('Background color:', $name),
            'name' => 'custom_content_bg_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
    */
    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);


$fields_form[100]['form'] = array(
    'legend' => array(
        'title' => $this->l('Free shipping zone', $name),
        'icon' => 'icon-cogs'
    ),
    'input' => array(
    array(
            'type' => 'radio',
            'label' => $this->l('Graphical presentation of free delivery', $name),
            'name' => 'graphic_free',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'graphic_free_0',
                    'value' => 0,
                  'label' => $this->l('No', $name)),
                array(
                    'id' => 'graphic_free_1',
                    'value' => 1,
                    'label' => $this->l('Always visible', $name)),
                array(
                    'id' => 'graphic_free_2',
                    'value' => 2,
                    'label' => $this->l('Only in the dekstop version', $name)),
               array(
                    'id' => 'graphic_free_3',
                    'value' => 3,
                    'label' => $this->l('Only in the mobile version', $name)),
            ),
            'validation' => 'isUnsignedInt',
           
        ),
        
        array(
            'type' => 'radio',
            'label' => $this->l('Information about free shipping in text form', $name),
            'name' => 'text_free_delivery',
            'default_value' => 0,
            'values' => array(
                array(
                    'id' => 'text_free_delivery_0',
                    'value' => 0,
                  'label' => $this->l('No', $name)),
                array(
                    'id' => 'text_free_delivery_1',
                    'value' => 1,
                    'label' => $this->l('Yes', $name)),
            
            ),
            'validation' => 'isUnsignedInt',
           
        ),

    ),
    'submit' => array(
        'title' => $this->l('Save', $name),
    ),
);

$fields_form[29]['form'] = array(
    'input' => array(
        'information' => array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('General information', $name),
            'name' =>  '',
        ),
        'guides' => array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Guides & Support', $name),
            'name' =>  '',
        ),
        /*'registration' => array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Module registration:', $name),
            'name' => '',
        ),*/
        array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Module version:', $name),
            'name' => '<span class="st-module-version">v '.$this->version.' </span><a href="javascript:;" id="check_update" class="btn btn-default">'.$this->l('Check update', $name).'</a><div class="m_t_8">'.$this->l('This module checks update every day automatically.', $name).'</div><div class="wrap-version-message m_t_8"></div>',
        ),
        'update_module' => array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('1-click upgrade the theme:', $name),
            'name' => '',
        ),
        'ads' => array(
            'type' => 'html',
            'id' => '',
            'label' => $this->l('Other items created by ST-themes:', $name),
            'name' => '',
        ),
  )
);

global $license;
$if_needs_update = $license->checkUpdate(true);
$fields_form[29]['form']['input']['update_module']['name'] .= '<div class="st-needs-upgrade '.($if_needs_update ? 'show' : 'hide').'"><ol class="st_update_information st_info_list"><li class="important_info">'.$this->l('Make a full backup of your module files before upgrade.', $name).'</li><li class="important_info">'.$this->l('If you have modified any files directly, you will lose your modifications, you need to re-do them after upgrade.', $name).'</li><li>'.$this->l('The upgrade can take several minutes! Please do not close this page once the upgrade process is running!', $name).'</li><li>'.$this->l('Sometimes 1-click upgrade can not work, because of file permission problems or network contention problems, when that happens you can always perform a manual upgrade to upgrade the module.', $name).'</li></ol><a href="javascript:;" id="update_module" class="btn btn-default">'.$this->l('Click to upgrade this module', $name).'</a></div>';
$fields_form[29]['form']['input']['update_module']['name'] .= '<div class="st-does-not-needs-upgrade '.($if_needs_update===false ? 'show' : 'hide').'">'.$this->l('Your theme version is update to date.', $name).'</div><div class="st-theme-upgrading hide">'.$this->l('Theme is in upgrading, please don\'t leave the page...', $name).'</div>';
$fields_form[29]['form']['input']['update_module']['name'] .= '<div class="wrap-update-message m_t_8"></div>';

//
$st_general_information = $license->getNotice();
if($st_general_information)
    $fields_form[29]['form']['input']['information']['name'] .= '<div class="st-notifications">'.$st_general_information.'</div>';
else
    unset($fields_form[29]['form']['input']['information']);
//
$st_ads = $license->getAd();
if($st_ads)
    $fields_form[29]['form']['input']['ads']['name'] .= '<div class="st-advs">'.$st_ads.'</div>';
else
    unset($fields_form[29]['form']['input']['ads']);

return $fields_form;