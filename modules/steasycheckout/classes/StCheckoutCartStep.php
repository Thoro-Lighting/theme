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

class StCheckoutCartStep extends StAbstractCheckoutStep
{
    protected $template = 'module:steasycheckout/views/templates/hook/cart-summary.tpl';
    private $selected_payment_option;

    public function __construct(
        Context $context,
        TranslatorInterface $translator,
        StEasyCheckout $module,
        ConditionsToApproveFinder $conditionsToApproveFinder
    ) {
        parent::__construct($context, $translator, $module);
        $this->conditionsToApproveFinder = $conditionsToApproveFinder;
    }

    public function handleRequest(array $requestParams = array())
    {
        $this->setTitle(
            $this->module->l('Cart Summary', 'StCheckoutCartStep')
        );
    }

    /**
     * @param array $extraParams
     * @return string
     */
    public function render(array $extraParams = array())
    {
        $conditionsToApprove = $this->conditionsToApproveFinder->getConditionsToApproveForTemplate();

        $assignedVars = array(
            'conditions_to_approve' => $conditionsToApprove,
            // 'selected_payment_option' => $this->selected_payment_option,
            'terms_conditions_checked' => Configuration::get($this->_prefix_st.'TERMS_CONDITIONS_CHECKED'),   
            'step_number' => Configuration::get($this->_prefix_st.'DISPLAY_CART'),   
            'delivery_message' => $this->getCheckoutSession()->getMessage(),
        );

        return $this->renderTemplate($this->getTemplate(), $extraParams, $assignedVars);
    }
}
