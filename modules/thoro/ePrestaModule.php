<?php 


/**
 *	Baza dla modułów dla PrestaShop
 *
 *	@author     Paweł Rymarczyk <biuro@infinityweb.pl>
 *  @version 	2.5.4
 */

if ( !class_exists('ePrestaModule_T') ) {
	
	class ePrestaModule_T extends Module {

		protected $list_url_part;

		protected $fields_options;
		protected $lists = array();

		public $bootstrap = true;

		public function __construct() {
			$this->author = 'InfinityWeb.pl';

			parent::__construct();
		}


		public function getContentParent() {
			if ( Tools::isSubmit('submitOptions'.$this->name) ) {
				$this->processUpdateOptions();
			}

			$this->processUpdateLists();
			$this->processStatus();
			

			$html = '';

			foreach ($this->getErrors() as $error) {
				$html .= $this->displayError($error);
			}

			foreach ($this->getConfirmations() as $string) {
				$html .= $this->displayConfirmation($string);
			}

			$html .= $this->displayLists();
			$html .= $this->displayOptions();

			$html .= $this->infoPanel();

			return $html;
		}


		/*
			Lists
		*/

		protected function displayLists() {
			$list = array();
			foreach ($this->lists as $key => $row) {

				if ( !empty($_POST) && Tools::isSubmit('submitReset'.$row['table'])) {
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                }

				$actions = array('add', 'update', 'delete', 'view');
				foreach ($actions as $action) {
					$method = 'action_' . $action.$row['table'];
					if ( Tools::isSubmit($action.$row['table']) && method_exists($this, $method) ) {
						return $this->$method();
					}
				}

				if ( $key ) {
					if ( Tools::isSubmit($key) ) {
						$list = $row;
						$this->list_url_part = $key;
					} else {
						$actions = array('add', 'update', 'delete', 'view');
						foreach ($actions as $action) {
							if ( Tools::isSubmit($action.$row['table']) ) {
								$list = $row;
								$this->list_url_part = $action.$row['table'];
							}
						}
					}
				}
			}

			if ( empty($list) && !empty($this->lists['']) ) {
				$list = $this->lists[''];
			}


			if ( !empty($list) ) {
				$id_object = (int)Tools::getValue($list['identifier']);
				
				if ( Tools::isSubmit('add'.$list['table']) || ( Tools::isSubmit('update'.$list['table']) && $id_object ) ) {
					$object = new $list['class']($id_object);

					$helper = new HelperForm();
					$helper->show_toolbar = false;
			        $helper->id = (int)$object->id;
					$helper->table = $list['table'];
					$helper->identifier = $list['identifier'];
					$helper->show_cancel_button = true;
					$helper->back_url = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules');
					$helper->module = $this;
					$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
					$helper->default_form_language = $lang->id;
					$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

					$helper->submit_action = 'save' . $list['table'];
					$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name . ( !empty($list['currentIndex']) ? '&' . $list['currentIndex'] : '');
					$helper->token = Tools::getAdminTokenLite('AdminModules');
					$helper->tpl_vars = array_merge(array(
						'fields_value' => $this->getFieldsValue($object, $list),
						'languages' => $this->context->controller->getLanguages(),
						'id_language' => $this->context->language->id,
						'link' => $this->context->link,
					), isset($list['tpl_vars']) ? $list['tpl_vars'] : array());

					foreach ($list['fields_form'] as &$fieldset) {
						$fieldset['form']['buttons'] = array(
			                array(
			                    'type' => 'submit',
			                    'title'=> $this->l(' Zapisz '),
			                    'icon' => 'process-icon-save',
			                    'class'=> 'pull-right',
			                    'name'=> $helper->submit_action
			                ),
			            );

			            $fieldset['form']['submit'] = array(
							'title' => $this->l(' Zapisz i zostań'),
			                'stay' => true
						);
					}

					return $helper->generateForm($list['fields_form']);
				}

				if ( Tools::isSubmit('delete'.$list['table']) && $id_object ) {
					$object = new $list['class']($id_object);
		            $object->delete();
					Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
				}

				if ( Tools::isSubmit('submitBulkdelete'.$list['table']) && !empty($_POST[$list['table'] . 'Box']) ) {
					foreach ($_POST[$list['table'] . 'Box'] as $id) {
						$object = new $list['class']($id);
		            	$object->delete();
					}
				}
				
				$helper = new HelperList();
				$helper->module = $this;
				$helper->shopLinkType = '';
				$helper->simple_header = false;
				$helper->identifier = $list['identifier'];
				$helper->actions = $list['actions'];
				if ( !empty($list['bulk_actions']) ) {
					$helper->bulk_actions = $list['bulk_actions'];
				}
				$helper->show_toolbar = true;
				$helper->imageType = 'jpg';
				$helper->listTotal = method_exists($list['class'], 'getTotal') ?  call_user_func($list['class'].'::getTotal', isset($list['id_parent']) ? $list['id_parent'] : 0) : 0;
				

				if ( !empty($list['toolbar_btn']) ) {
					foreach ($list['toolbar_btn'] as $btn => $row) {
						$helper->toolbar_btn[$btn] =  array(
							'href' => AdminController::$currentIndex.'&configure='.$this->name.'&' . $row['href'] . '&token='.Tools::getAdminTokenLite('AdminModules'),
							'desc' => $row['desc'],
						);
					}
				}


				$helper->title = $list['title'];
				$helper->table = $list['table'];
				$helper->token = Tools::getAdminTokenLite('AdminModules');
				$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

				$objects = array();

				if ( method_exists($list['class'], 'getAll') ) {

					if ( !empty($this->context->cookie->{$list['table'].'_pagination'}) ) {
		                $limit = $this->context->cookie->{$list['table'].'_pagination'};
		            } else {
		                $limit = 50;
		            }

					$limit = (int)Tools::getValue($list['table'].'_pagination', $limit);
			        if ( $limit != 50 ) {
			            $this->context->cookie->{$list['table'].'_pagination'} = $limit;
			        } else {
			            unset($this->context->cookie->{$list['table'].'_pagination'});
			        }

			        $start = 0;
			        if ((int)Tools::getValue('submitFilter'.$list['table'])) {
			            $start = ((int)Tools::getValue('submitFilter'.$list['table']) - 1) * $limit;
			        } elseif (empty($start) && isset($this->context->cookie->{$list['table'].'_start'}) && Tools::isSubmit('export'.$this->table)) {
			            $start = $this->context->cookie->{$list['table'].'_start'};
			        }

			        if ($start) {
			            $this->context->cookie->{$list['table'].'_start'} = $start;
			        } elseif (isset($this->context->cookie->{$list['table'].'_start'})) {
			            unset($this->context->cookie->{$list['table'].'_start'});
			        }

					$objects = call_user_func($list['class'].'::getAll', isset($list['id_parent']) ? $list['id_parent'] : 0, $limit, $start);
				}


				return $helper->generateList($objects, $list['fields_list']);
			}

		}

		protected function processStatus() {
			foreach ($this->lists as $list) {

				if ( Tools::isSubmit('status'.$list['table']) ) {

					$id_object = (int)Tools::getValue($list['identifier']);
					if ( $id_object ) {
						$object = new $list['class']($id_object);

						if ( Validate::isLoadedObject($object) ) {
							$object->toggleStatus();
						}
					}
				}

			}

	    }

		protected function processUpdateLists() {

			foreach ($this->lists as $list) {

				if ( Tools::isSubmit('save'.$list['table']) || Tools::isSubmit('save'.$list['table'].'AndStay') ) {
					
					$id_object = (int)Tools::getValue($list['identifier']);

					if ( $id_object ) {
						$object = new $list['class']($id_object);
					} else {
						$object = new $list['class']();
					}


					$this->copyFromPost($object, $list['identifier']);

					$error = $object->validateFields(false, true);
					if ( $error !== true ) {
						$this->_errors[] = Tools::displayError( $error );
					}

					$error = $object->validateFieldsLang(false, true);
					if ( $error !== true ) {
						$this->_errors[] = Tools::displayError( $error );
					}


					if ( empty($this->_errors) ) {

						if ( $object->save() && $this->postFile($object->id, $list) ) {

							$this->afterSave($object, $list);

							if ( Tools::isSubmit('save'.$list['table'].'AndStay') ) {
		                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&'.$list['identifier'].'='.$object->id.'&conf='.($id_object?4:3).'&update'.$list['table'].'&token='.Tools::getAdminTokenLite('AdminModules'));
		                    } else {
		                    	$this->_confirmations[] = $id_object ? 'Obiekt zaktualizowany' : 'Obiekt dodany';
		                    }
		                        
						} else {
							$this->_errors[] = Tools::displayError( 'Nieczekiwany błąd. Spróbuj ponownie później.' );
						}
					} else {
						$_GET[$id_object  ? 'update'.$list['table'] : 'add'.$list['table']] = 1;
					}

				}

			}

		}

		protected function postFile($id, $list) {

			foreach ($list['fields_form'] as $fieldset) {
				if ( isset($fieldset['form']['input']) ) {

					foreach ($fieldset['form']['input'] as $input) {
						if ( isset($input['type']) && $input['type'] == 'file' ) {

							
							
							if ( !empty($_FILES[$input['name']]['tmp_name']) && empty($_FILES[$input['name']]['error']) ) {

								$file_name = $id.'.'.substr($_FILES[$input['name']]['name'], strrpos($_FILES[$input['name']]['name'], '.')+1);
				
								$dir = $input['dir'];
								if ( !file_exists($dir) ) mkdir($dir, 0755, true);

								$files = glob(rtrim($dir, '/') . '/' . $id . '.*');
								if ( !empty($files) ) {
									foreach ($files as $file) {
										@unlink($file);
									}
								}

								move_uploaded_file($_FILES[$input['name']]['tmp_name'], rtrim($dir, '/') . '/' . $file_name);
							}

							
						}

					}
				}
			}

			return true;
		}


		protected function afterSave($object, $list) {

		}


		protected function copyFromPost(&$object, $identifier) {
			foreach ($_POST as $key => $value) {
				if (array_key_exists($key, $object) && $key != $identifier) {
					/* Do not take care of password field if empty */
					if ($key == 'passwd' && Tools::getValue($identifier) && empty($value))
						continue;
					/* Automatically encrypt password in MD5 */
					if ($key == 'passwd' && !empty($value))
						$value = Tools::encrypt($value);
					$object->{$key} = $value;
				}
			}
				

			/* Multilingual fields */
			$languages = Language::getLanguages(false);
			$class_vars = get_class_vars(get_class($object));
			$fields = array();
			if (isset($class_vars['definition']['fields']))
				$fields = $class_vars['definition']['fields'];

			foreach ($fields as $field => $params) {
				if (array_key_exists('lang', $params) && $params['lang']) {
					foreach ($languages as $language) {
						if (isset($_POST[$field.'_'.(int)$language['id_lang']])) {
							$object->{$field}[(int)$language['id_lang']] = $_POST[$field.'_'.(int)$language['id_lang']];
						}
					}
				}
			}

		}

		protected function getFieldsValue($obj, $list) {
			$fields_value = isset($list['fields_value']) ? $list['fields_value'] : array();

			foreach ($list['fields_form'] as $fieldset) {
				if ( isset($fieldset['form']['input']) ) {

					foreach ($fieldset['form']['input'] as $input) {
						if ( !isset($input['name']) ) continue;

						if ( !isset($fields_value[$input['name']]) ) {

							if ( isset($input['type']) && $input['type'] == 'shop')  {
								if ( $obj->id ) {
									$result = Shop::getShopById((int)$obj->id, $list['identifier'], $list['table']);
									foreach ($result as $row) {
										$fields_value['shop'][$row['id_'.$input['type']]][] = $row['id_shop'];
									}	
								}
									
							} elseif ( isset($input['lang']) && $input['lang'] ) {
								foreach (Language::getLanguages(false) as $language) {
									$fieldValue = $this->getFieldValue($obj, $input['name'], $language['id_lang']);
									if ( empty($fieldValue) ) {
										if ( isset($input['default_value']) && is_array($input['default_value']) && isset($input['default_value'][$language['id_lang']]) ) {
											$fieldValue = $input['default_value'][$language['id_lang']];
										} elseif (isset($input['default_value'])) {
											$fieldValue = $input['default_value'];
										}
									}

									$fields_value[$input['name']][$language['id_lang']] = $fieldValue;
								}
							} else {
								$fieldValue = $this->getFieldValue($obj, $input['name']);
								if ( $fieldValue === false && isset($input['default_value']) ) {
									$fieldValue = $input['default_value'];
								}

								$fields_value[$input['name']] = $fieldValue;
							}

						}

					}	
					
				}

			}
				
			return $fields_value;
		}

		protected function getFieldValue($obj, $key, $id_lang = null) {
			if ( $id_lang ) {
				$default_value = ($obj->id && isset($obj->{$key}[$id_lang])) ? $obj->{$key}[$id_lang] : false;
			} else {
				$default_value = isset($obj->{$key}) ? $obj->{$key} : false;
			}

			return Tools::getValue($key.($id_lang ? '_'.$id_lang : ''), $default_value);
		}


		/*
			Info
		*/

		protected function infoPanel($panels = array()) {
			if ( empty($panels) ) return '';

			$html = '';
			foreach ($panels as $row) {
				if ( version_compare(_PS_VERSION_, '1.6.0.0', '>=') ) {
					$html .= '	<div class="panel">
									<div class="panel-heading">
										<i class="' . ( isset($row['icon']) ? $row['icon'] : 'icon-cogs' ) . '"></i> ' . $row['header'] . ' 
									</div>
									' . ( isset($row['alert']) ? '<div class="alert alert-info">' . $row['alert'] . ' </div>' : '' ) . '
									' . ( isset($row['content']) ? $row['content'] : '' ) . '
								</div>';
				} else {
					$html .= '	<fieldset>
									<legend>
										' . $row['header'] . ' 
									</legend>
									' . ( isset($row['alert']) ? '<p>' . $row['alert'] . ' </p>' : '' ) . '
									' . ( isset($row['content']) ? $row['content'] : '' ) . '
								</fieldset>';
				}
				
			}

			return $html;

			
		}

		/*
			Options
		*/

		protected function displayOptions() {
			if ( !empty($this->fields_options) ) {


				foreach ($this->fields_options as &$options) {
					foreach ($options['fields'] as &$field) {
						if ( $field['type'] == 'file' && isset($field['thumb_path']) ) {
							
							$field['thumb'] = (Configuration::get($field['name']) && file_exists($field['dir'].Configuration::get($field['name']))) ? $field['thumb_path'].Configuration::get($field['name']) : '';
						}

						if ( !empty($field['values_after_post']) ) {
							foreach ($field['values_after_post'] as $key => $function) {

								if ( is_array($function) ) {
									$params = $function[1];
									$function = $function[0];
								} else {
									$params = null;
								}


								if ( method_exists($this, $function) ) {
									$field[$key] = $this->$function($params);
								}
							}
						}
					}
				}

				$helper = new HelperOptions($this);
				$helper->bootstrap = true;
				$helper->module = $this;
				$helper->table = $this->name;
				$helper->name_controller = $this->name;
				$helper->identifier = $this->identifier;
				$helper->id = version_compare(_PS_VERSION_, '1.6.0.0', '>=') ? $this->id : Tab::getIdFromClassName('Modules');
				$helper->token = Tools::getAdminTokenLite('AdminModules');
				$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name . ( !empty($this->list_url_part) ? '&' . $this->list_url_part : '' );

				$helper->languages = Language::getLanguages(false);
				$helper->default_form_language = (int)Configuration::get('PS_LANG_DEFAULT');
				$helper->allow_employee_form_lang = (int)Configuration::get('PS_LANG_DEFAULT');


				return $helper->generateOptions($this->fields_options);
			}

			return '';
		}

		protected function processUpdateOptions() {
			$languages = Language::getLanguages(false);

			$hide_multishop_checkbox = (Shop::getTotalShops(false, null) < 2) ? true : false;
			foreach ($this->fields_options as $category_data)
			{
				if (!isset($category_data['fields']))
					continue;

				$fields = $category_data['fields'];

				foreach ($fields as $field => $values)
				{
					if (isset($values['type']) && $values['type'] == 'selectLang')
					{
						foreach ($languages as $lang)
							if (Tools::getValue($field.'_'.strtoupper($lang['iso_code'])))
								$fields[$field.'_'.strtoupper($lang['iso_code'])] = array(
									'type' => 'select',
									'cast' => 'strval',
									'identifier' => 'mode',
									'list' => $values['list']
								);
					}
				}

				// Validate fields
				foreach ($fields as $field => $values)
				{
					// We don't validate fields with no visibility
					if (!$hide_multishop_checkbox && Shop::isFeatureActive() && isset($values['visibility']) && $values['visibility'] > Shop::getContext())
						continue;

					// Check if field is required
					if ((!Shop::isFeatureActive() && isset($values['required']) && $values['required']) 
						|| (Shop::isFeatureActive() && isset($_POST['multishopOverrideOption'][$field]) && isset($values['required']) && $values['required']))
						if (isset($values['type']) && $values['type'] == 'textLang')
						{
							foreach ($languages as $language)
								if (($value = Tools::getValue($field.'_'.$language['id_lang'])) == false && (string)$value != '0')
									$this->_errors[] = sprintf(Tools::displayError('field %s is required.'), $values['title']);
						}
						elseif (($value = Tools::getValue($field)) == false && (string)$value != '0')
							$this->_errors[] = sprintf(Tools::displayError('field %s is required.'), $values['title']);

					// Check field validator
					if (isset($values['type']) && $values['type'] == 'textLang')
					{
						foreach ($languages as $language)
							if (Tools::getValue($field.'_'.$language['id_lang']) && isset($values['validation']))
								if (!Validate::$values['validation'](Tools::getValue($field.'_'.$language['id_lang'])))
									$this->_errors[] = sprintf(Tools::displayError('field %s is invalid.'), $values['title']);
					}
					elseif (Tools::getValue($field) && isset($values['validation'])) {

						if ( $values['validation'] == 'isFloat' ) {
							$_POST[$field] = str_replace(',', '.', $_POST[$field]);
						}

						if ( !call_user_func("Validate::{$values['validation']}", Tools::getValue($field)) ) {
							$this->_errors[] = sprintf(Tools::displayError('field %s is invalid.'), $values['title']);
						}
					}

					// Set default value
					if (Tools::getValue($field) === false && isset($values['default']))
						$_POST[$field] = $values['default'];
				}

				if (!count($this->_errors))
				{
					foreach ($fields as $key => $options)
					{
						if (!$hide_multishop_checkbox && Shop::isFeatureActive() && isset($options['visibility']) && $options['visibility'] > Shop::getContext())
							continue;

						if (!$hide_multishop_checkbox && Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_ALL && empty($options['no_multishop_checkbox']) && empty($_POST['multishopOverrideOption'][$key]))
						{
							Configuration::deleteFromContext($key);
							continue;
						}

						// check if a method updateOptionFieldName is available
						$method_name = 'updateOption'.Tools::toCamelCase($key, true);

						if (method_exists($this, $method_name))
							$this->$method_name(Tools::getValue($key));
						elseif (isset($options['type']) && in_array($options['type'], array('textLang', 'textareaLang')))
						{
							$list = array();
							foreach ($languages as $language)
							{
								$key_lang = Tools::getValue($key.'_'.$language['id_lang']);
								$val = (isset($options['cast']) ? $options['cast']($key_lang) : $key_lang);
								if ($this->validateField($val, $options))
								{
									$list[$language['id_lang']] = $val;
								}
							}
							Configuration::updateValue($key, $list, true);
						}
						else
						{
							if ( $options['type'] == 'file' ) {
								$this->updateFile($options);
							} else {

								$val = (isset($options['cast']) ? $options['cast'](Tools::getValue($key)) : Tools::getValue($key));

								if ( $this->validateField($val, $options) ) {
									Configuration::updateValue($key, $val, true);
								}
							}
							
						}
					}
				}
			}

			if ( empty($this->_errors) ) {
				Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules') . '&conf=4');
				// $this->_confirmations[] = 'Ustawienia zostały pomyślnie zaktualizowane.';
			}
		}

		protected function validateField($value, $field) {
			if (isset($field['validation']))
			{
				$valid_method_exists = method_exists('Validate', $field['validation']);
				if ((!isset($field['empty']) || !$field['empty'] || (isset($field['empty']) && $field['empty'] && $value)) && $valid_method_exists)
				{
					if ( !call_user_func("Validate::{$field['validation']}", $value) )
					{
						$this->_errors[] = Tools::displayError($field['title'].' : Incorrect value');
						return false;
					}
				}
			}

			return true;
		}


		/*
			Upload file
		*/

		protected function updateFile($options) {
			$field_name = $options['name'];


			if ( isset($_FILES[$field_name]['tmp_name']) && $_FILES[$field_name]['tmp_name'] ) {

				if ( empty($_FILES[$field_name]['error']) ) {
					if ( ImageManager::isRealImage($_FILES[$field_name]['tmp_name'], $_FILES[$field_name]['type']) ) {

						if ($error = ImageManager::validateUpload($_FILES[$field_name], Tools::getMaxUploadSize())) {
							$this->_errors[] = $error;
							return false;
						}

					}

					$logo_name = ( !empty($options['file_name']) ? $options['file_name'] : strtolower($field_name) ).'.'.substr($_FILES[$field_name]['name'], strrpos($_FILES[$field_name]['name'], '.')+1);
					

					$dir = $options['dir'];
					if ( !file_exists($dir) ) mkdir($dir);

					$file_name = rtrim($dir, '/') . '/' . $logo_name;


					if ( !move_uploaded_file($_FILES[$field_name]['tmp_name'], $file_name) ) {
						$this->_errors[] = 'Błąd przy wczytywaniu pliku.';
						return false;
					}

					touch($file_name);

					return Configuration::updateValue($field_name, $logo_name);
				} else {
					$this->_errors[] = $this->codeToMessage($_FILES[$field_name]['error']);
				}

			}

				
		}

		protected function codeToMessage($code) {
	        switch ($code) {
	            case UPLOAD_ERR_INI_SIZE:
	                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
	                break;
	            case UPLOAD_ERR_FORM_SIZE:
	                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
	                break;
	            case UPLOAD_ERR_PARTIAL:
	                $message = "The uploaded file was only partially uploaded";
	                break;
	            case UPLOAD_ERR_NO_FILE:
	                $message = "No file was uploaded";
	                break;
	            case UPLOAD_ERR_NO_TMP_DIR:
	                $message = "Missing a temporary folder";
	                break;
	            case UPLOAD_ERR_CANT_WRITE:
	                $message = "Failed to write file to disk";
	                break;
	            case UPLOAD_ERR_EXTENSION:
	                $message = "File upload stopped by extension";
	                break;

	            default:
	                $message = "Unknown upload error";
	                break;
	        }
	        return $message;
	    } 


		/*
			Core
		*/

		public static function getToken() {
			return Tools::encrypt((function_exists('get_called_class') ? get_called_class() : 'ePrestaModule_T') . 'iW3b82vc7h7251D');
		}


		protected function getFileInfo($file) {
			$file = _PS_MODULE_DIR_ . $this->name . '/files/' . $file;

			$file = glob($file . '.*');

			if ( empty($file) ) {
				return 'Brak pliku na serwerze!';
			}

			$file = $file[0];

			return 'Plik wczytany: ' . date('Y-m-d H:i:s', filemtime($file)) . ' <a href="' . _MODULE_DIR_ . $this->name . '/files/' . basename($file) . '">pobierz</a>';
		}

	    protected function installTab($class, $name, $id_parent = 0) {
	        $tab = new Tab();
	        $tab->name = array();
			foreach (Language::getLanguages(true) as $lang)
				$tab->name[$lang['id_lang']] = $name;

	        $tab->class_name = $class;
	        $tab->module = $this->name;
	        $tab->id_parent = $id_parent;

	        if ( !$tab->save() ) {
	        	return false;
	        }
	            

	        return $tab->id;
	    }

	    protected function uninstallTab($class) {
	        if (  $id_tab = Tab::getIdFromClassName($class) ) {
	            $tab = new Tab($id_tab);
	            $tab->delete();
	            return true;
	        }

	        return false;
	    }
	}
}

