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

require_once dirname(__FILE__) . "/../../config/config.inc.php";
require_once dirname(__FILE__) . "/config.php";

session_start();

if (\Tools::getValue('return')) {
    $_SESSION['return_url'] = Tools::getValue('return');
}

$reportingApiService = \PShowConversion\Service\ReportingAPI::getInstance(
    Configuration::get('pshowconversion_oauth_clientId'),
    Configuration::get('pshowconversion_oauth_clientSecret')
);

$client = $reportingApiService->getClient();
$client->setRedirectUri(
    \Tools::getHttpHost(true) . '/modules/pshowconversion/oauth2callback.php'
);

// Handle authorization flow from the server.
if (!\Tools::getValue('code')) {
    $auth_url = $client->createAuthUrl();
    \Tools::redirectLink(filter_var($auth_url, FILTER_SANITIZE_URL));
    die();
}

$client->authenticate(\Tools::getValue('code'));
\Configuration::updateValue(
    'pshowconversion_oauth_accessToken',
    $client->getAccessToken()
);
\Tools::redirectLink(filter_var($_SESSION['return_url'], FILTER_SANITIZE_URL));