<?php
class StModuleLicense
{
	private static $instance;

	public static $prefix;

	private $api_url = 'https://www.sunnytoo.com/themelic.php';

	public $module;

	public $token;

	public function __construct($module)
	{
		$this->module = $module;
		self::$prefix = $this->module->_prefix_st;
		$this->checkGoumaima();
	}

	public static function getInstance($module)
	{
		if (!self::$instance) {
			self::$instance = new StModuleLicense($module);
		}
		return self::$instance;
	}

	public function validateLicense($goumaima = '')
	{
		if ($goumaima) {
			$param = $this->getLicenseParams('vallic', $goumaima);
			if ($data = $this->makeCall($param)) {
				$this->writeLog('vallic '.print_r($data, true));
				if (isset($data['err']) && !$data['err']) {
					return true;
				}
			}
		}
		return false;
	}

	public function registerLicense($goumaima = '')
	{
		if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP) {
			return false;
		}
		if ($goumaima) {
			$param = $this->getLicenseParams('reglic', $goumaima, true);
			if ($data = $this->makeCall($param)) {
				$this->writeLog('reglic '.print_r($data, true));
				if (isset($data['err']) && !$data['err']) {
					$this->token = $data['token'];
					return true;
				}
			}
		}
		return false;
	}

	public function unRegisterLicense() 
	{
		if ($token = $this->getGoumaimaToken()) {
			$param = $this->getLicenseParams('deregister', '');
			$param['token'] = $token;
			if ($data = $this->makeCall($param)) {
				$this->writeLog('deregister '.print_r($data, true));
				if (isset($data['err']) && !$data['err']) {
					return true;
				}
			}
		}
		return true;
	}

	public function validateGoumaima()
	{
		if ($token = $this->getGoumaimaToken()) {
			$param = $this->getLicenseParams('getbytoken', '');
			$param['token'] = $token;
			if ($data = $this->makeCall($param)) {
				$this->writeLog('getbytoken '.print_r($data, true));
				if (isset($data['err']) && !$data['err']) {
					foreach(Shop::getShops(false) as $shop) {
						$domain = str_replace('www.', '', $shop['domain']);
						if ($data['msg']['pc_domain'] == $domain) {
							return true;
						}	
					}
					return false;
				}
			} else {
				// Net or other erro, return true.
				return true;
			}
		}
		return false;
	}

	public function doValidateGoumai()
	{
		if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP) {
			return false;
		}
		if (!$this->validateGoumaima()) {
			Configuration::updateValue(self::$prefix.'GOUMAIMA_VALID', 0);
		} else {
			Configuration::updateValue(self::$prefix.'GOUMAIMA_VALID', 1);
		}
		Configuration::updateValue(self::$prefix.'GOUMAIMA_LAST_VALIDATE', time());
	}

	public function checkGoumaima()
	{
		if ($this->isRegistered() && (Configuration::get(self::$prefix.'GOUMAIMA_LAST_VALIDATE')===false || (time() - Configuration::get(self::$prefix.'GOUMAIMA_LAST_VALIDATE')) > 86400 * 15)) {
			$this->doValidateGoumai();
		}
	}

	public function GoumaimaIsValid()
	{
		if (!$this->isRegistered()) {
			if (!(bool)Configuration::get('PS_SHOP_ENABLE')) {
				return true;
			}
			return;
		}
		return (int)Configuration::get(self::$prefix.'GOUMAIMA_VALID') > 0;
	}

	public static function moduleIsValid()
	{
		if (!Configuration::get(self::$prefix.'GOUMAIMA')) {
			if (!(bool)Configuration::get('PS_SHOP_ENABLE')) {
				return true;
			}
			return;
		}
		return (int)Configuration::get(self::$prefix.'GOUMAIMA_VALID') > 0;
	}

	public function getLiceseInfo($goumaima = '')
	{
		if ($goumaima) {
			$param = $this->getLicenseParams('qurylic', $goumaima);
			if ($data = $this->makeCall($param)) {
				$this->writeLog('qurylic '.print_r($data, true));
				if (isset($data['err']) && !$data['err']) {
					return $data['msg'];
				}
			}
		}
		return false;
	}

	public function getLicenseParams($act, $goumaima, $need_domain = false)
	{
		$params = array(
			'pc' => $goumaima,
			'act' => $act,
			'ck_key' => defined('_COOKIE_KEY_') ? _COOKIE_KEY_ : '',
			'ck_iv' => defined('_COOKIE_IV_') ? _COOKIE_IV_ : '',
		);
		if ($need_domain) {
			$shop = (object)Shop::getShop((int)Context::getContext()->shop->id);
			$params['dm'] = $shop->domain;
		}
		return $params;
	}

	public function updateGoumaima($goumaima = null)
	{
		if ($goumaima) {
			Configuration::updateValue(self::$prefix.'GOUMAIMA', $goumaima);
			Configuration::updateValue(self::$prefix.'GOUMAIMA_TOKEN', $this->token);
			Configuration::updateValue(self::$prefix.'GOUMAIMA_VALID', 1);
			Configuration::updateValue(self::$prefix.'GOUMAIMA_LAST_VALIDATE', time());
		} else {
			Configuration::updateValue(self::$prefix.'GOUMAIMA', '');
			Configuration::updateValue(self::$prefix.'GOUMAIMA_TOKEN', '');
			Configuration::updateValue(self::$prefix.'GOUMAIMA_VALID', 0);
			Configuration::updateValue(self::$prefix.'GOUMAIMA_LAST_VALIDATE', 0);
		}
	}

	public function getGoumaima($with_mask = false)
	{
		$goumaima = Configuration::get(self::$prefix.'GOUMAIMA');
		if($goumaima=='')
			return '';
		if ($with_mask) {
			$mask = str_repeat('*', strlen($goumaima)-6);
			$goumaima = preg_replace('/^(\d{3})(.+)(\d{3})$/Us','${1}'.$mask.'${3}', $goumaima);
		}
		return $goumaima;
	}

	public function getGoumaimaToken()
	{
		return Configuration::get(self::$prefix.'GOUMAIMA_TOKEN');
	}

	public function isRegistered()
	{
		return $this->getGoumaima() ? true : false;
	}

	public function writeLog($content)
	{
		if ($content) {
			$date = date('Y-m-d H:i:s');
			@file_put_contents(_PS_MODULE_DIR_.$this->module->name.'/config/mod-ctl.log', $date.' '.$content."\n", FILE_APPEND);
		}
	}

	public function getVerInfo()
	{
		if (!isset($_SESSION['st_version_info']) || !$_SESSION['st_version_info']) {
			$api_url = 'http://biz236.inmotionhosting.com/~sunnyt7/version.php';
			$module = $this->getModule();
			$param = array(
				'theme' => $module,
				'ver_only' => false,
			);
			if ($data = $this->makeCall($param, $api_url)) {
				$_SESSION['st_version_info'] = $data;
			} else {
				$_SESSION['st_version_info'] = '';
			}
		}
		return $_SESSION['st_version_info'];
	}

	public function getByKey($key)
	{
		$data = $this->getVerInfo();
		if(!$data || !is_array($data))
			return false;
		return key_exists($key, $data) ? $data[$key] : false;
	}

	public function getModule($version = true)
	{
		$arr = explode('.', $this->module->version);
        $primary = array_shift($arr);
        return $version ? $this->module->name . $primary : $this->module->name;
	}

	public function checkUpdate($force = false)
    {
    	if($force || Configuration::get(self::$prefix.'LAST_CHECK_UPDATE')===false || (time() - Configuration::get(self::$prefix.'LAST_CHECK_UPDATE')) > 86400){
    		if (isset($_SESSION['st_version_info'])) {
    			unset($_SESSION['st_version_info']);
    		}
			Configuration::updateValue(self::$prefix.'LAST_CHECK_UPDATE', time());
    	}

        $remote_version = $this->getByKey('ver');
        if(!$remote_version || strpos($remote_version, '.') === false)
        	 return;
        if (Tools::version_compare($this->module->version, $remote_version)) {
            // If current version is lower than remote version, need update.
            return $remote_version;
        }
        return false;
    }

    public function getNotice()
    {
    	$html = '';
    	$remote_version = $this->checkUpdate();
    	if($remote_version===null){
    		$html .= $this->module->displayError(
                $this->module->l('Unable to get information from ST-themes.')
            );
    	}
    	if($remote_version){
    		$html .= $this->module->displayConfirmation(
                sprintf($this->module->l('A new version %s is available.'), $remote_version)
            );
    	}
    	$notices = $this->getByKey('notice');
    	if ($notices) {
	    	foreach($notices AS $val) {
	    		if (!isset($val['text']) || !$val['text']) {
	    			continue;
	    		}
	    		if ($val['type'] == 'error') {
	    			$html .= $this->module->displayError($val['text']);
	    		} elseif ($val['type'] == 'info') {
	    			$html .= $this->module->displayConfirmation($val['text']);
	    		} else{
	    			$html .= $val['text'];
	    		}
	    	}
    	}
    	return $html;
    }

    public function getAd()
    {
    	$html = '';
    	$ads = $this->getByKey('ad');
    	if($ads){
    		foreach($ads AS $val) {
	    		if (isset($val['html']) && $val['html']) {
	    			$html .= $val['html'];	
	    		}
	    	}
    	}
    	return $html;
    }

	public function makeCall($params = array(), $api_url = '', $method = 'GET') {
	    if (!$api_url) {
	    	$api_url = $this->api_url;
	    }
	    $params = (array)$params;
	    if (is_array($params) && count($params)) {
	        $param_string = '&' . http_build_query($params);
	    } else {
	        $param_string = null;
	    }
	    $api_url = $api_url . '?' . ('GET' === $method ? ltrim($param_string, '&') : null);
	    try {
	        $curl_connection = curl_init($api_url);
	        curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 60);
	        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);

	        if ('POST' == $method) {
	            curl_setopt($curl_connection, CURLOPT_POST, count($params));
	            curl_setopt($curl_connection, CURLOPT_POSTFIELDS, ltrim($param_string, '&'));
	        }
	        
	        $data = json_decode(curl_exec($curl_connection), true);
	        curl_close($curl_connection);
	        if ($data) {
	            return $data;
	        }
	        return false;
	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	* Update the module from server.
	*/
	public function upgrade()
	{
		/*if (!$this->GoumaimaIsValid()) {
			return $this->module->l('Your module is not registered, please register it first.');
		}*/
		// Need update ?
		$remote_version = $this->checkUpdate();
		if($remote_version === null){
			return $this->module->l('Unable to check update.');
		}
        if ($remote_version === false) {
        	return $this->module->l('Your module is already the latest version.');
        }
        $sandbox = _PS_CACHE_DIR_.'sandbox/';
        // Test sandbox is writeable ? 
		if (!$tmpfile = tempnam($sandbox, 'TMP0')) {
			return sprintf($this->module->l('Please ensure the %s folder is writable.'), $sandbox);
		}
		@unlink($tmpfile);
		$module = $this->getModule(false);
		$goumaima = $this->getGoumaima();
		// Get access
		$api_url = 'http://biz236.inmotionhosting.com/~sunnyt7/download-module-update.php';
		$param = $this->getLicenseParams('get_download_auth', $goumaima, true);
		$param['module'] = $module;
		$param['ver'] = $remote_version;
		
		if ($data = $this->makeCall($param, $api_url)) {
			if (isset($data['err']) && !$data['err']) {
				$token = $data['token'];
				$md5 = $data['md5'];
				// Download .zip file.
				$param = array(
					'act' => 'download_file',
					'ac_token' => $token,
					'module' => $module,
					'ver' => $remote_version,
				);
				// Download file.
				$download_link = $api_url.'?'.http_build_query($param);
				$fp = fopen($tmpfile, 'w');
				$ch = curl_init($download_link);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 360);
				curl_setopt($ch, CURLOPT_FILE, $fp);
				curl_exec($ch);
				curl_close($ch);
				fclose($fp);
				
		        // test file & check md5
		        if (!Tools::ZipTest($tmpfile) || $md5 != md5_file($tmpfile)) {
		        	@unlink($tmpfile);
		        	return $this->module->l('Package is broken.');
		        } elseif (!Tools::ZipExtract($tmpfile, _PS_MODULE_DIR_)) {
		        	@unlink($tmpfile);
		        	return $this->module->l('Unable to unzip package.');
		        } else {
		        	// Delete temp file.
		        	@unlink($tmpfile);
		        	// reset session
		        	unset($_SESSION['st_version_info']);
		        	return true;
		        }
			}
		} else {
			return $this->module->l('Unalbe to download.');
		}
	}
}