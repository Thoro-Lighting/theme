<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_2_1_0()
{
    $result = true;
    
    if(Configuration::get('STECO_DELIVERY_BLOCK')==4)
        $result &= Configuration::updateGlobalValue('STECO_DELIVERY_BLOCK', 9);
    if(Configuration::get('STECO_REASSURANCE')==4)
        $result &= Configuration::updateGlobalValue('STECO_REASSURANCE', 9);
    if(Configuration::get('STECO_DEFAULT_PI_FORM')==2)
        $result &= Configuration::updateGlobalValue('STECO_DEFAULT_PI_FORM', 1);
    Configuration::updateGlobalValue('STECO_PAYMENTS_NO_SUBMIT', '');
    
	return $result;
}
