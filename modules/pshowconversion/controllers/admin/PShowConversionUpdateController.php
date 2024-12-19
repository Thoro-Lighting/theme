<?php

use Prestashow\PrestaCore\Controller\UpdateController;

require_once dirname(__FILE__) . "/../../config.php";

class PShowConversionUpdateController extends UpdateController {

    public $select_menu_tab = 'subtab-PShowConversionMain';

    public function __construct() {
        parent::__construct();

        global $smarty;
        $smarty->assign('lang_iso', $this->context->language->iso_code);
    }

}
