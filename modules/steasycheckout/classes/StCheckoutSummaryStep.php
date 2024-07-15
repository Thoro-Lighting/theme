<?php
/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */


use Symfony\Component\Translation\TranslatorInterface;

class StCheckoutSummaryStep extends StAbstractCheckoutStep
{
    protected $template = 'module:steasycheckout/views/templates/hook/steps/summary.tpl';

    protected $selected_payment_name;
    protected $selected_payment_subtitle;
    protected $selected_payment_confirming;

    public function __construct(
        Context $context,
        TranslatorInterface $translator,
        StEasyCheckout $module,
        ConditionsToApproveFinder $conditionsToApproveFinder
    ) {
        parent::__construct($context, $translator, $module);

        $this->conditionsToApproveFinder = $conditionsToApproveFinder;
    }


    public function handleRequest(array $requestParams = array()) {
        
        $this->setTitle(
            $this->module->l('Summary', 'StCheckoutSummaryStep')
        );
    }


    public function render(array $extraParams = array()) {
        $conditionsToApprove = $this->conditionsToApproveFinder->getConditionsToApproveForTemplate();

        $assignedVars = array(
            'conditions_to_approve' => $conditionsToApprove,
            'terms_conditions_checked' => Configuration::get($this->_prefix_st.'TERMS_CONDITIONS_CHECKED'),  
            'selected_payment_subtitle' => $this->selected_payment_subtitle,
            'selected_payment_confirming' => $this->selected_payment_confirming,
            'selected_payment_name' => $this->selected_payment_name
        );

        return $this->renderTemplate($this->getTemplate(), $extraParams, $assignedVars);
    }


    public function restorePersistedData(array $data, array $all_data = array()) {
        if (array_key_exists('selected_payment_name', $all_data['st-checkout-payment-step'])) {
            $this->selected_payment_name = $all_data['st-checkout-payment-step']['selected_payment_name'];
        }
        if (array_key_exists('selected_payment_subtitle', $all_data['st-checkout-payment-step'])) {
            $this->selected_payment_subtitle = $all_data['st-checkout-payment-step']['selected_payment_subtitle'];
        }
        
       if (array_key_exists('selected_payment_confirming', $all_data['st-checkout-payment-step'])) {
            $this->selected_payment_confirming = $all_data['st-checkout-payment-step']['selected_payment_confirming'];
        }

        return $this;
    }


}
