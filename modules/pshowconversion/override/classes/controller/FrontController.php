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
class FrontController extends FrontControllerCore
{

    public static $pshowconversion_override_v = 2;

    protected function smartyOutputContent($content)
    {
        if (version_compare(_PS_VERSION_, '1.7.0', '<')) {
            ob_start();
            parent::smartyOutputContent($content);
            $html = ob_get_flush();
            if (strlen($html) == 0) {
                return;
            }
            ob_clean();

            Hook::exec('actionOutputHTMLBefore', array('html' => &$html));
            echo $html;
        } else {
            parent::smartyOutputContent($content);
        }
    }
}
