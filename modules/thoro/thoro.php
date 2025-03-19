<?php

if (!defined('_PS_VERSION_')) exit;

require_once __DIR__ . '/ePrestaModule.php';
require_once __DIR__ . '/classes/ThoroShortcodes.php';
require_once __DIR__ . '/classes/ProductTemperatureClass.php';

class Thoro extends ePrestaModule_T {


	public function __construct() {
		$this->name = 'thoro';
		$this->version = '1.1.0';
		$this->tab = 'others';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('thoro.pl');
		$this->description = $this->l('Dodatkowe funkcjonalności sklepu');

	}

	public function install() {
		if (
			!parent::install() 
			|| !$this->registerHook('filterProductContent')

			|| !$this->registerHook('displaySmartProductCombinations')
			|| !$this->registerHook('actionAdminProductsListingFieldsModifier')
			)
			return false;


			Configuration::updateValue('ST_SHORTCODE_SPACING_BETWEEN', 24);
			Configuration::updateValue('STSN_SHORTCODE_ITEMS_COL', 3);
			Configuration::updateValue('STSN_SHORTCODE_PRO_PER_XXL', 3);
			Configuration::updateValue('STSN_SHORTCODE_PRO_PER_FW', 3);
			Configuration::updateValue('STSN_SHORTCODE_PRO_PER_XL', 3);
			Configuration::updateValue('STSN_SHORTCODE_PRO_PER_LG', 3);
			Configuration::updateValue('STSN_SHORTCODE_PRO_PER_MD', 3);
			Configuration::updateValue('STSN_SHORTCODE_PRO_PER_SM', 2);
			Configuration::updateValue('STSN_SHORTCODE_PRO_PER_XS', 2);

			Db::getInstance()->execute('
				CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'product_temperature` (
					`id_product_temperature` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
					`name` varchar(255) NULL,
					PRIMARY KEY (`id_product_temperature`)
				) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

			Db::getInstance()->execute('
				CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'product_temperature_lang` (
					`id_product_temperature` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
					`id_lang` int(10) UNSIGNED NOT NULL,
					`gallery_1` varchar(255) NULL,
					`gallery_2` varchar(255) NULL,
					`gallery_3` varchar(255) NULL,
					`gallery_4` varchar(255) NULL,
					`gallery_5` varchar(255) NULL,
					`gallery_6` varchar(255) NULL,
					`desc_1` TEXT NULL,
					`desc_2` TEXT NULL,
					PRIMARY KEY (`id_product_temperature`, `id_lang`)
				) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

		return true;
	}

	public function getContent() {

		$input = [
			[
				'type' => 'text',
				'label' => $this->l('Nazwa:'),
				'name' => 'name',
                'size' => 64,
                'required'  => true,
			],
			[
				'type' => 'html',
				'html_content' => '<br><br>'
			],

		];

		foreach (range(1, 2) as $i) {
			$input[] = [
				'type' => 'file',
				'label' => $this->l('Galeria podwójna - obrazek ' . $i . ':'),
				'name' => 'image_' . $i,
				'dir' => _PS_UPLOAD_DIR_ . $this->name . '/image/' . $i . '/',
			'desc' => array(
                        $this->gettranslator()->trans('Wielkość wgrywanego obrazka powinna wynosić: 625px (szerokość) * 205px (wysokość)', array(), 'Modules.Stsidebar.Admin'),
         	),
                        ];

			$input[] = [
				'type' => 'current_image',
				'label' => $this->l('Galeria podwójna - obrazek ' . $i . ' - podgląd:'),
				'name' => 'current_image',
				'i' => $i
			];

			$input[] = [
				'type' => 'html',
				'html_content' => '<br><br>'
			];
		}

		$input[] = [
			'type' => 'html',
			'html_content' => '<br><br>'
		];

		foreach (range(1, 6) as $i) {
			$input[] = [
				'type' => 'file',
				'label' => $this->l('Galeria potrójna - obrazek ' . $i . ':'),
				'name' => 'g_' . $i,
				'dir' => _PS_UPLOAD_DIR_ . $this->name . '/gallery/' . $i . '/','desc' => array(
                        $this->gettranslator()->trans('Wielkość wgrywanego obrazka powinna wynosić: 1200px (szerokość) * 500px (wysokość)', array(), 'Modules.Stsidebar.Admin'),
         	),
                        ];
			

			$input[] = [
				'type' => 'current_gallery',
				'label' => $this->l('Galeria potrójna - obrazek ' . $i . ' - podgląd:'),
				'name' => 'current_gallery',
				'i' => $i
			];

			$input[] = [
				'type' => 'text',
				'label' => $this->l('Galeria potrójna ' . $i . ' - nazwa:'),
				'name' => 'gallery_' . $i,
	            'size' => 64,
	            'lang' => true,
			'desc' => array(
                        $this->gettranslator()->trans('Nazwa pojawiająca się na obrazku w galerii potrójnej', array(), 'Modules.Stsidebar.Admin'),
         	),
                        ];
			
		

			$input[] = [
				'type' => 'html',
				'html_content' => '<br><br>'
			];
		}


		$input[] = [
			'type' => 'textarea',
            'label' => $this->l('Opis 1'),
            'name' => 'desc_1',
            'rows' => 5,
            'cols' => 40,
	    	'lang' => true,
		    'desc' => array(
                        $this->gettranslator()->trans('Treść rozdzielająca strefy dla galerii pierwszej', array(), 'Modules.Stsidebar.Admin'),
         	),
                        ];
		
		

		$input[] = [
			'type' => 'textarea',
            'label' => $this->l('Opis 2'),
            'name' => 'desc_2',
            'rows' => 5,
            'cols' => 40,
	    	'lang' => true,
		'desc' => array(
                        $this->gettranslator()->trans('Treść rozdzielająca strefy dla galerii drugiej', array(), 'Modules.Stsidebar.Admin'),
         	),
                        ];


		$this->lists = array(
			'' => array(
					'identifier' => 'id_product_temperature',
					'table' => 'product_temperature',
					'class' => 'ProductTempareatureClass',
					'title' => 'Barwa światła',
					'actions' => array('edit', 'duplicate', 'delete'),
					'toolbar_btn' => array( 
						'new' => array (
							'href' => 'addproduct_temperature',
							'desc' => 'Dodaj'
						)
					),
					'fields_list' => array(
						'id_product_temperature' => array(
							'title' => $this->l('Id'),
							'width' => 120,
							'type' => 'text',
			                'search' => false,
			                'orderby' => false
						),
						'name' => array(
							'title' => $this->l('Name'),
							'width' => 200,
							'type' => 'text',
			                'search' => false,
			                'orderby' => false
						),
					),

					'fields_form' => array(
						array(
							'form' => array(
								'legend' => array(
									'title' => $this->l('Barwa światła'),
									'icon' => 'icon-cogs'
								),
								'input' => $input
							)

						)
					),
					'tpl_vars' => []
				),
		);

		$id_product_temperature = Tools::getValue('id_product_temperature');

		if ( $id_product_temperature ) {
			$obj = new ProductTempareatureClass($id_product_temperature);
		}


		if ( isset($obj) && Validate::isLoadedObject($obj) ) {

			foreach (range(1, 2) as $i) {
				$image = glob(_PS_UPLOAD_DIR_ . $this->name . '/image/' . $i . '/' .$obj->id . '.*');
				$this->lists['']['tpl_vars']['image_image'][$i] = !empty($image) ? '/upload/' . $this->name . '/image/' . $i . '/'.
				basename($image[0]) : '';
			}
			foreach (range(1, 6) as $i) {
				$image = glob(_PS_UPLOAD_DIR_ . $this->name . '/gallery/' . $i . '/' .$obj->id . '.*');
				$this->lists['']['tpl_vars']['image_gallery'][$i] = !empty($image) ? '/upload/' . $this->name . '/gallery/' . $i . '/'.basename($image[0]) : '';
			}
		}

		return 
        $this->importAttachments() . 
        $this->getContentParent();
	}


	/*
		2023-09-14
	*/
	protected function importAttachments() {

		if ( !empty($_FILES['file']['tmp_name']) ) {
			require_once __DIR__ . '/phpexcel/PHPExcel.php';
			$spreadsheet = PHPExcel_IOFactory::load($_FILES['file']['tmp_name']);
			$worksheet = $spreadsheet->getActiveSheet();
			$rows = [];
			foreach ($worksheet->getRowIterator() as $row) {
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false);
				$cells = [];
				foreach ($cellIterator as $cell) $cells[] = $cell->getValue();
				$rows[] = array_slice($cells, 0, 4);
			}

			$this->context->smarty->assign('import_html', $this->importAttachmentsAction($rows));
        }


		return $this->fetch('module:thoro/views/templates/admin/import-attachments.tpl');
	}

	protected function importAttachmentsAction($rows) {
		$languages = Language::getLanguages(false);

		$html = '<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Indeks</th>
                    <th>URL</th>
                    <th>Nazwa</th>
                    <th>Info</th>
                </tr>
            </thead>
        ';

		foreach ($rows as $row) {
			if ( empty($row[0]) ) continue;

			$id_product = (int)Db::getInstance()->getValue('
				SELECT `id_product` 
				FROM `' . _DB_PREFIX_ . 'product` 
				WHERE `reference` = "' . pSQL($row[0]) . '"
			');


			if ( !$id_product ) continue;

			do {
                $uniqid = sha1(microtime());
            } while (file_exists(_PS_DOWNLOAD_DIR_ . $uniqid));

            $curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $row[3]);

			curl_setopt($curl, CURLOPT_HTTPHEADER, [
				'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8'
			]);
			
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_REFERER, 'https://google.com');
			curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537');
			$fp = fopen(_PS_DOWNLOAD_DIR_ . $uniqid, 'wb');
			curl_setopt($curl, CURLOPT_FILE, $fp);
			curl_exec($curl);
			
			$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

			curl_close($curl);
			fclose($fp);

			$html .= '<tr><td>' . $id_product . '</td>';
            $html .= '<td><a href="' . $this->context->link->getProductLink($id_product) . '" target="_blank">' . $row[0] . '</a></td>';
            $html .= '<td><a href="' . $row[3] . '" target="_blank">' . $row[3] . '</a></td>';
            $html .= '<td>' . $row[2] . '</td>';
            $html .= '<td>';

            if ( $http_code != 200 ) {
				@unlink(_PS_DOWNLOAD_DIR_ . $uniqid);

				$html .= '<strong>Nie udało się pobrać pliku. HTTP CODE: ' . $http_code . '</strong>';
				continue;
			}

            $attachment = new Attachment();

            foreach ($languages as $lang) {
				$attachment->name[$lang['id_lang']] = $row[2];
				$attachment->description[$lang['id_lang']] = $row[2];
			}

            $attachment->file = $uniqid;
            $attachment->mime = mime_content_type(_PS_DOWNLOAD_DIR_ . $uniqid);
            $attachment->file_name = basename($row[3]);

            if ( $attachment->add() ) {
            	$attachment->attachProduct($id_product);
            	$html .= 'Dodano załącznik';
            } else {
            	$html .= '<i>Błąd...</i>';
            }


            $html .= '</td></tr>';
		}

		$html .= '</table>';

        file_put_contents(__DIR__ . '/logs/import_attachments/' . date('Y_m_d_H_i_s') . '.html','<!doctype html> <html> <head> <meta charset="utf-8"></head> <title>Raport</title> <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> </head><body><div class="container">' . $html . '</div></body></html>');

        return $html;
	}



	/*
		2023-09-05
	*/
	protected function displayLists() {

		if ( Tools::isSubmit('duplicateproduct_temperature') && ( $id_object = (int)Tools::getValue('id_product_temperature') ) ) {
			$object = new ProductTempareatureClass($id_object);
			$object->duplicate();

			// Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}


		return parent::displayLists();
	}

	protected function afterSave($object, $list) {

		foreach (range(1, 2) as $i) {
			if ( !empty($_POST['delete_image'][$i]) ) {
				$image = glob(_PS_UPLOAD_DIR_ . $this->name . '/image/' . $i . '/' .$object->id . '.*');
				if ( !empty($image) && file_exists($image[0]) ) unlink($image[0]);
			}
		}

		foreach (range(1, 6) as $i) {
			if ( !empty($_POST['delete_gallery'][$i]) ) {
				$image = glob(_PS_UPLOAD_DIR_ . $this->name . '/gallery/' . $i . '/' .$object->id . '.*');
				if ( !empty($image) && file_exists($image[0]) ) unlink($image[0]);
			}
		}

		

	}



	public function hookFilterProductContent($params) {
		$params['object']['description'] = ThoroShortcodes::run($params['object']['description'], $params['object']['id_product']);

		return ['object' => $params['object']];
	}





	/*
		2023-09-05
	*/
	public function hookDisplaySmartProductCombinations($params) {
		if ( empty($params['product']['connection_index']) ) return '';

		$database = Db::getInstance()->executeS('
			SELECT p.`id_product`, pa.`id_product_attribute`
			FROM `' . _DB_PREFIX_ . 'product` p
			JOIN `' . _DB_PREFIX_ . 'product_attribute` pa USING (`id_product`)

			WHERE p.`active` = 1 AND p.`connection_index` = "' . pSQL($params['product']['connection_index']) . '"
		');

		$current_combination = $this->getCombinations($params['product']['id_product_attribute']);
		$current_attribute = [];
		foreach ($current_combination as $row) {
			$current_attribute[$row['id_attribute_group']] = $row['id_attribute'];
		}

		$rows = [];
		$attributes = [];
		foreach ($database as $row) {
			$combinations = $this->getCombinations($row['id_product_attribute']);

			foreach ($combinations as $comb) {
				if ( !isset($attributes[$comb['id_attribute_group']]) ) {
					$attributes[$comb['id_attribute_group']] = [
						'id_attribute_group' => $comb['id_attribute_group'],
						'name' => $comb['group_name'],
						'type' => $comb['group_type'],
						'position' => $comb['group_position'],
						'values' => []
					];
				}

				if ( !isset($attributes[$comb['id_attribute_group']]['values'][$comb['id_attribute']]) ) {
					$attributes[$comb['id_attribute_group']]['values'][$comb['id_attribute']] = [
						'id_attribute' => $comb['id_attribute'],
						'name' => $comb['attribute_name'],
						'position' => $comb['attribute_position'],
						'selected' => false
					];
				}

				if ($comb['group_type'] == 'color') {
					$attributes[$comb['id_attribute_group']]['values'][$comb['id_attribute']]['color'] = $comb['color'];
				}

				if ( $row['id_product'] == $params['product']['id_product'] ) 
					$attributes[$comb['id_attribute_group']]['values'][$comb['id_attribute']]['selected'] = true;


				$attributes[$comb['id_attribute_group']]['values'][$comb['id_attribute']]['ids'][] = $row['id_product'];
			}


			$rows[] = $row;
		}

		foreach ($attributes as $id_attribute_group => $attribute) {
			foreach ($attribute['values'] as $id_attribute => $row) {
				$attributes[$id_attribute_group]['values'][$id_attribute]['id_product'] = $this->getCombinationProductId($id_attribute_group, $id_attribute, $attributes, $current_attribute);

				if ( $attributes[$id_attribute_group]['values'][$id_attribute]['id_product'] ) {


					/*
						2023-08-07
					*/
					$cover = Db::getInstance()->getRow('
						SELECT `link_rewrite`, `id_image`
						FROM `' . _DB_PREFIX_ . 'product_lang` pl
						JOIN `' . _DB_PREFIX_ . 'image` i ON i.`id_product` = pl.`id_product` AND i.`cover` = 1
						WHERE pl.`id_product` = ' . (int)$attributes[$id_attribute_group]['values'][$id_attribute]['id_product'] . ' AND `id_lang` = ' . (int)$this->context->language->id . '
					');

					$attributes[$id_attribute_group]['values'][$id_attribute]['image'] = !empty($cover) ? $this->context->link->getImageLink($cover['link_rewrite'], $cover['id_image'], 'cart_default') : '';


					$attributes[$id_attribute_group]['values'][$id_attribute]['url'] = $this->context->link->getProductLink($attributes[$id_attribute_group]['values'][$id_attribute]['id_product']);
				}


				$attributes[$id_attribute_group]['values'][$id_attribute]['hide'] = 0;
			}
		}

		foreach ($attributes as $id_attribute_group => $attribute) {
			foreach ($attribute['values'] as $id_attribute => $row) {
				if ( $row['selected'] ) {
					foreach ($attributes as $id_attribute_group_other => $attribute_other) {
						if ( $id_attribute_group == $id_attribute_group_other ) continue;
						foreach ($attribute_other['values'] as $id_attribute_other => $row_other) {
							if ( $row_other['selected'] ) continue;

							$attributes[$id_attribute_group_other]['values'][$id_attribute_other]['hide'] = !in_array($row_other['id_product'], $row['ids']);
						}
					}
				}
			}
		}

		usort($attributes, function($a, $b) {
			return $a['position'] > $b['position'];
		});

		foreach ($attributes as &$attribute) {
			if (isset($attribute['values']) && is_array($attribute['values'])) {
				usort($attribute['values'], function($a, $b) {
					return $a['position'] > $b['position'];
				});
			}
		}

		// if ( _PS_MODE_DEV_ ) {
		// 	echo '<pre>';
		// 	print_r($attributes);
		// 	echo '</pre>';
		// }


		$this->context->smarty->assign([
			'attributes' => $attributes
		]);


		
		return $this->fetch('module:thoro/views/templates/hook/combinations.tpl'); 
	}

	protected function getCombinationProductId($id_attribute_group, $id_attribute, $attributes, $current_attribute) {
		$ids = [];
		$ids[] = $attributes[$id_attribute_group]['values'][$id_attribute]['ids'];
		foreach ($current_attribute as $idg => $ia) {
			if ( $idg != $id_attribute_group ) $ids[] = $attributes[$idg]['values'][$ia]['ids'];
		}

		$idps = [];
		foreach ($ids as $values) {
			foreach ($values as $id_product) {
				if ( !isset($idps[$id_product]) ) $idps[$id_product] = 0;
				$idps[$id_product]++;
			}
		}

		foreach ($idps as $id_product => $value) {
			if ( $value == count($current_attribute) ) return $id_product;
		}


		return $ids[0][0];
	}

	protected function getCombinations($id_product_attribute) {
		return DB::getInstance()->executeS('
			SELECT a.`id_attribute`, ag.`id_attribute_group`, al.`name` AS attribute_name, agl.`name` AS group_name, a.`position` AS attribute_position, ag.`position` AS group_position, group_type, color

			FROM `' . _DB_PREFIX_ . 'product_attribute_combination` pac
			JOIN `' . _DB_PREFIX_ . 'attribute` a USING(`id_attribute`)
			JOIN `' . _DB_PREFIX_ . 'attribute_lang` al ON a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = ' . (int)$this->context->language->id . '

			JOIN `' . _DB_PREFIX_ . 'attribute_group` ag USING(`id_attribute_group`)
			JOIN `' . _DB_PREFIX_ . 'attribute_group_lang` agl ON ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = ' . (int)$this->context->language->id . '

			WHERE pac.`id_product_attribute` = ' . (int)$id_product_attribute . ' AND a.`id_attribute_group` != 0' // tutaj jest ID  	AP5-Pack
		);
	}


	public function hookActionAdminProductsListingFieldsModifier($params) {
		if ( isset($params['sql_select']) ) {

	        $params['sql_select']['connection_index'] = [
	        	'table' => 'p',
	        	'field' => 'connection_index',
	        	'filtering' => ' = %s'
	        ];

	    }
	}

}