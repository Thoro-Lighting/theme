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
class Order extends OrderCore
{
    public $sent_to_ga;

    public function __construct($id = null, $id_lang = null)
    {
        self::$definition['fields']['sent_to_ga'] = array('type' => self::TYPE_BOOL);
        parent::__construct($id, $id_lang);
    }
}