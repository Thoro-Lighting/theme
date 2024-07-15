<?php

if (
    version_compare(_PS_VERSION_, '1.7.0.0', '<')
    && !defined('\GuzzleHttp\ClientInterface::MAJOR_VERSION')
    && !defined('\GuzzleHttp\ClientInterface::VERSION')
) {
    require_once dirname(__FILE__) . '/vendor_ps16/vendor/autoload.php';
}

require_once dirname(__FILE__) . "/vendor/autoload.php";

define('_PSHOWCONVERSION_SECURITY_KEY_', md5(getModulePath(__FILE__) . _COOKIE_KEY_));
