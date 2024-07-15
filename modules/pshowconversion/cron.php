<?php
/**
 * File from https://prestashow.pl
 *
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future.
 *
 * @authors     PrestaShow.pl <kontakt@prestashow.pl>
 * @copyright   2018 PrestaShow.pl
 * @license     https://prestashow.pl/license
 */

use PShowConversion\Service\MeasurementProtocolService;
use PShowConversion\Service\ReportingAPI;
use PShowConversion\Service\SourceService;

require_once dirname(__FILE__) . "/../../config/config.inc.php";
require_once dirname(__FILE__) . "/config.php";

// check access token to prevent unauthorized access
if (Tools::getValue('token') != _PSHOWCONVERSION_SECURITY_KEY_) {
    header("Location: " . __PS_BASE_URI__);
    die();
}

if (Tools::getValue('debug')) {
    @ini_set('display_errors', 'on');
    @error_reporting(E_ALL | E_STRICT);
}

// check if set to send transactions using cron task
if (!Configuration::get('pshowconversion_use_cron')) {
    // throw result
    die(json_encode(array('status' => 'failed')));
}

Configuration::updateValue('pshowconversion_cron_last_run', date('Y-m-d H:i:s'));

Context::getContext()->currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));

$shops = Shop::getShops(true, null, true);
foreach ($shops as $shop_id) {

    // init shop by id
    $_GET['id_shop'] = (int)$shop_id;
    Context::getContext()->shop = Shop::initialize();
    Context::getContext()->cart = new Cart();
    Cache::clean('*');

    // check if module is enabled in the current shop
    if (!Module::isEnabled('pshowconversion')) {
        continue;
    }

    // get orders which statuses were changed today
    $sql = 'SELECT DISTINCT oh.`id_order` '
        . 'FROM `' . _DB_PREFIX_ . 'order_history` oh '
        . 'JOIN `' . _DB_PREFIX_ . 'orders` o ON (o.`id_order` = oh.`id_order` AND o.`id_shop` = ' . (int)$shop_id . ') '
        . 'WHERE oh.`date_add` >= \'' . date('Y-m-d', strtotime('-1 day')) . ' 00:00:00\' '
        . 'AND oh.`date_add` <= \'' . date('Y-m-d') . ' 23:59:59\'';
    $orders = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    foreach ($orders as $order) {
        // try to hit transaction to GA
        MeasurementProtocolService::getInstance()->hitPurchase((int)$order['id_order']);
    }
}

$oauthAccessToken = Configuration::get('pshowconversion_oauth_accessToken');
if ($oauthAccessToken && class_exists('Google_AuthHandler_AuthHandlerFactory')) {
    $reportingApiService = ReportingAPI::getInstance(
        Configuration::get('pshowconversion_oauth_clientId'),
        Configuration::get('pshowconversion_oauth_clientSecret'),
        $oauthAccessToken
    );
    try {
        $transactions = $reportingApiService->getTransactions(Configuration::get('pshowconversion_oauth_viewId'));
        $q = "UPDATE `" . _DB_PREFIX_ . "orders` SET `sent_to_ga` = 1 "
            . "WHERE `id_order` IN (" . implode(',', array_filter($transactions, 'intval')) . ")";
        Db::getInstance()->execute($q);
    } catch (Google_Exception $e) {
    }
}

SourceService::getInstance()->removeOldUnusedSources();

// throw result
die(json_encode(array('status' => 'success')));
