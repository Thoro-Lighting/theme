<?php

/**
 * File from https://prestashow.pl
 *
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future.
 *
 *  @authors     PrestaShow.pl <kontakt@prestashow.pl>
 *  @copyright   2018 PrestaShow.pl
 *  @license     https://prestashow.pl/license
 */
class AdminOrdersController extends AdminOrdersControllerCore {

    public function __construct() {
        parent::__construct();

        $this->_select = '
		a.id_currency,
		a.id_order AS id_pdf,
		CONCAT(LEFT(c.`firstname`, 1), \'. \', c.`lastname`) AS `customer`,
		osl.`name` AS `osname`,
		os.`color`,
                a.`sent_to_ga`,
		IF((SELECT so.id_order FROM `' . _DB_PREFIX_ . 'orders` so WHERE so.id_customer = a.id_customer AND so.id_order < a.id_order LIMIT 1) > 0, 0, 1) as new,
		country_lang.name as cname,
		IF(a.valid, 1, 0) badge_success';

        $this->fields_list = array_merge($this->fields_list, array(
            'sent_to_ga' => array(
                'title' => $this->l('Sent to GA'),
                'active' => 'sent_to_ga',
                'align' => 'text-center',
                'type' => 'bool',
                'class' => 'fixed-width-sm',
            ),
        ));
    }

}
