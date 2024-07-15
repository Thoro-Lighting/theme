<?php
/**
 * File from https://prestashow.pl
 *
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future.
 *
 * @authors     PrestaShow.pl <kontakt@prestashow.pl>
 * @copyright   2019 PrestaShow.pl
 * @license     https://prestashow.pl/license
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once dirname(__FILE__) . "/config.php";

class PShowConversion extends \PShowConversion\Module
{

    public function customMod_transactionTagProduct(int $productId, float &$price, int &$quantity): void
    {
        // you can modify product price and quantity here
    }

    /**
     * @param Order $order
     * @return bool Return false to ignore order
     */
    public function customMod_filterPurchase(Order $order): bool
    {
        // you can filter purchases here
        return true;
    }

}
