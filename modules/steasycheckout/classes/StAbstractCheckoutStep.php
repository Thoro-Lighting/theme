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

abstract class StAbstractCheckoutStep implements StCheckoutStepInterface
{
    public $_prefix_st = 'STECO_';
    private $smarty;
    private $translator;
    protected $module;

    /**
     * @var CheckoutProcess
     */
    private $checkoutProcess;

    private $title;
    protected $errors=array();

    protected $step_is_reachable = false;
    protected $step_is_complete = false;
    protected $step_is_current = false;
    protected $context;

    protected $template;
    protected $unreachableStepTemplate = 'checkout/_partials/steps/unreachable.tpl';

    public function __construct(Context $context, TranslatorInterface $translator, StEasyCheckout $module)
    {
        $this->context = $context;
        $this->smarty = $context->smarty;
        $this->module = $module;
        $this->translator = $translator;
    }

    public function setTemplate($templatePath)
    {
        $this->template = $templatePath;

        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
        /*if ($this->isReachable()) {
            return $this->template;
        } else {
            return $this->unreachableStepTemplate;
        }*/
    }

    protected function getTranslator()
    {
        return $this->translator;
    }

    protected function renderTemplate($template, array $extraParams = array(), array $params = array())
    {
        $defaultParams = array(
            'title' => $this->getTitle(),
            'step_is_complete' => (int) $this->isComplete(),
            'step_is_reachable' => (int) $this->isReachable(),
            'step_is_current' => (int) $this->isCurrent(),
            'step_errors' => $this->errors,
            'steco' => $this->module->getVals('smarty_val'),
            'identifier' => $this->getIdentifier(),
            'steco_urls' => array(
                'logout' => $this->context->link->getModuleLink('steasycheckout','default',array('steco_logout'=>1), $this->context->controller->ssl),
                'identity' => $this->context->link->getPageLink('identity', $this->context->controller->ssl),
                'password' => $this->context->link->getPageLink('password', $this->context->controller->ssl),
                'cart' => $this->context->link->getPageLink('cart', $this->context->controller->ssl),
            ),
        );

        $scope = $this->smarty->createData(
            $this->smarty
        );

        $scope->assign(array_merge($defaultParams, $extraParams, $params));

        $tpl = $this->smarty->createTemplate(
            $template,
            $scope
        );

        return $tpl->fetch();
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setCheckoutProcess(StCheckoutProcess $checkoutProcess)
    {
        $this->checkoutProcess = $checkoutProcess;

        return $this;
    }

    public function getCheckoutProcess()
    {
        return $this->checkoutProcess;
    }

    public function getCheckoutSession()
    {
        return $this->getCheckoutProcess()->getCheckoutSession();
    }

    public function setReachable($step_is_reachable)
    {
        $this->step_is_reachable = $step_is_reachable;

        return $this;
    }

    public function isReachable()
    {
        return $this->step_is_reachable;
    }

    public function setComplete($step_is_complete)
    {
        $this->step_is_complete = $step_is_complete;

        return $this;
    }

    public function isComplete()
    {
        return $this->step_is_complete;
    }

    public function setCurrent($step_is_current)
    {
        $this->step_is_current = $step_is_current;

        return $this;
    }

    public function isCurrent()
    {
        return $this->step_is_current;
    }

    public function getIdentifier()
    {
        // SomeClassNameLikeThis => some-class-name-like-this
        return Tools::camelCaseToKebabCase(get_class($this));
    }

    public function getDataToPersist()
    {
        return array();
    }

    public function restorePersistedData(array $data)
    {
        return $this;
    }
}
