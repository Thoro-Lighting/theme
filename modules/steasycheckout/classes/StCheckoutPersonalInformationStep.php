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
use PrestaShop\PrestaShop\Adapter\ServiceLocator;

class StCheckoutPersonalInformationStep extends StAbstractCheckoutStep
{
    protected $template = 'module:steasycheckout/views/templates/hook/steps/personal-information.tpl';
    private $loginForm;
    private $registerForm;

    private $show_login_form = false;
    private $socials = array(
        'Facebook' => array(
            'url' => 'https://graph.facebook.com/v2.3/me?fields=first_name,last_name,email',
            'scope' => 'email',
            'data' => array(
                'firstname' => 'first_name',
                'lastname'  => 'last_name',
                'email'     => 'email'
            ),
        ),
        'Google' => array(
            'url' => 'https://www.googleapis.com/oauth2/v1/userinfo',
            'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
            'data' => array(
                'firstname' => 'given_name',
                'lastname'  => 'family_name',
                'email'     => 'email'
            ),
        ),
        'Paypal' => array(
            'url' => 'https://api.paypal.com/v1/identity/openidconnect/userinfo/?schema=openid',
            'scope' => 'openid profile email address',
            'data' => array(
                'firstname' => 'name',
                // 'lastname'  => '',
                'email'     => 'email'
            ),
        ),
        'Amazon' => array(
            'url' => 'https://api.amazon.com/user/profile',
            'scope' => 'profile',
            'data' => array(
                'firstname' => 'name',
                // 'lastname'  => '',
                'email'     => 'email'
            ),
        ),
        'Twitter' => array(
            'url' => 'https://api.twitter.com/1.1/account/verify_credentials.json',
            'scope' => '',
            'data' => array(
                'firstname' => 'name',
                // 'lastname'  => '',
                'email'     => 'email'
            ),
        ),
    );

    public function __construct(
        Context $context,
        TranslatorInterface $translator,
        StEasyCheckout $module,
        CustomerLoginForm $loginForm,
        CustomerForm $registerForm
    ) {
        parent::__construct($context, $translator, $module);
        $this->loginForm = $loginForm;
        $this->registerForm = $registerForm;
    }

    public function handleRequest(array $requestParameters = array())
    {
        // personal info step is always reachable
        $this->step_is_reachable = true;

        $this->registerForm
            ->fillFromCustomer(
                $this
                    ->getCheckoutProcess()
                    ->getCheckoutSession()
                    ->getCustomer()
            )
        ;

        if (isset($requestParameters['submitCreate'])) {

            $idAddressDelivery = (int)$this->getCheckoutSession()->getIdAddressDelivery();
            $idAddressInvoice  = (int)$this->getCheckoutSession()->getIdAddressInvoice();

            $this->registerForm->fillWith($requestParameters);
            if ($this->registerForm->submit()) {
                // $this->context->controller->reInitAddresses();//
                $this->step_is_complete = true;


                $id_customer = (int)$this->getCheckoutSession()->getCustomer()->id;

                if ( $idAddressDelivery && $id_customer ) {
                    $address = new Address($idAddressDelivery);
                    $address->id_customer = $id_customer;
                    $address->save();

                    $this->getCheckoutSession()->setIdAddressDelivery($idAddressDelivery);
                }

                if ( $idAddressInvoice && $id_customer ) {
                    $address = new Address($idAddressInvoice);
                    $address->id_customer = $id_customer;
                    $address->save();

                    $this->getCheckoutSession()->setIdAddressInvoice($idAddressInvoice);
                }

                /*
                    iWeb - w przypadku jak kupujemy jako gość ale potem dodamy hasło to ogarniamy poprawnie grupe - 2022-04-24
                */
                $customer = $this->getCheckoutSession()->getCustomer();
                if ( !$customer->is_guest && $customer->id_default_group == Configuration::get('PS_GUEST_GROUP') ) {
                    $customer->cleanGroups();
                    $customer->addGroups([Configuration::get('PS_CUSTOMER_GROUP')]);
                    $customer->id_default_group = Configuration::get('PS_CUSTOMER_GROUP');
                    $customer->save();
                }

            } else {
                $this->step_is_complete = false;
                $this->setCurrent(true);
                $this->getCheckoutProcess()->setHasErrors(true)->setNextStepReachable();
                $this->show_login_form = (int)Tools::getValue('submitCreate');
            }
        } elseif (isset($requestParameters['submitLogin'])) {
            $this->loginForm->fillWith($requestParameters);
            if ($this->loginForm->submit()) {
                $this->step_is_complete = true;
            } else {
                $this->getCheckoutProcess()->setHasErrors(true);
                $this->show_login_form = 0;
            }
        } elseif (array_key_exists('login', $requestParameters)) {
            $this->show_login_form = 0;
            $this->step_is_current = true;
        }

        $this->logged_in = $this
            ->getCheckoutProcess()
            ->getCheckoutSession()
            ->customerHasLoggedIn()
        ;

        if ($this->logged_in && !$this->getCheckoutSession()->getCustomer()->is_guest) {
            $this->step_is_complete = true;
        }

        $this->setTitle(
            $this->module->l('Personal Information', 'StCheckoutPersonalInformationStep')
        );
        if(count($this->context->controller->errors))
            $this->errors = array_merge($this->errors, $this->context->controller->errors);
    }

    public function render(array $extraParams = array())
    {
        $guest_allowed = $this->getCheckoutSession()->isGuestAllowed();
        $default_pi_form = (int)Configuration::get($this->_prefix_st.'DEFAULT_PI_FORM');
        if(Configuration::get($this->_prefix_st.'NEWSLETTER')==2){
            if($this->registerForm->getField('ps_emailsubscription_newsletter'))
                $this->registerForm->setValue('ps_emailsubscription_newsletter', 1);
            elseif($this->registerForm->getField('stnewsletter_newsletter'))
                $this->registerForm->setValue('stnewsletter_newsletter', 1);
        }
        if(Configuration::get($this->_prefix_st.'CUSTOMER_OPTIN')==2 && $this->registerForm->getField('optin'))
            $this->registerForm->setValue('optin', 1);
        $steco_gdpr = $this->getGdpr();
        if(!$this->registerForm->getField('password')->isRequired())
            $this->registerForm->getField('password')->addAvailableValue('comment', $this->module->l('You can checkout as a guest if you do not fill in a password.', 'StCheckoutPersonalInformationStep'));
        return $this->renderTemplate(
            $this->getTemplate(), $extraParams, array(
                'show_login_form' =>  $this->show_login_form!==false ? $this->show_login_form : ($this->getCheckoutSession()->getCustomer()->is_guest ? 1 : $default_pi_form),
                'login_form' => $this->loginForm->getProxy(),
                'register_form' => $this->registerForm->getProxy(),
                'guest_allowed' => $guest_allowed,
                'empty_cart_on_logout' => !Configuration::get('PS_CART_FOLLOWING'),
                'facebook_login' => Configuration::get($this->_prefix_st.'FACEBOOK_LOGIN') && !empty(Configuration::get($this->_prefix_st.'FACEBOOK_ID')) && !empty(Configuration::get($this->_prefix_st.'FACEBOOK_KEY')),
                'google_login' => Configuration::get($this->_prefix_st.'GOOGLE_LOGIN') && !empty(Configuration::get($this->_prefix_st.'GOOGLE_ID')) && !empty(Configuration::get($this->_prefix_st.'GOOGLE_KEY')),
                'paypal_login' => Configuration::get($this->_prefix_st.'PAYPAL_LOGIN') && !empty(Configuration::get($this->_prefix_st.'PAYPAL_ID')) && !empty(Configuration::get($this->_prefix_st.'PAYPAL_KEY')),
                'amazon_login' => Configuration::get($this->_prefix_st.'AMAZON_LOGIN') && !empty(Configuration::get($this->_prefix_st.'AMAZON_ID')) && !empty(Configuration::get($this->_prefix_st.'AMAZON_KEY')),
                'twitter_login' => Configuration::get($this->_prefix_st.'TWITTER_LOGIN') && !empty(Configuration::get($this->_prefix_st.'TWITTER_ID')) && !empty(Configuration::get($this->_prefix_st.'TWITTER_KEY')),
                'step_number' => Configuration::get($this->_prefix_st.'LOGIN_BLOCK'),  
                'steco_gdpr' => $steco_gdpr,
                'display_logout' => Configuration::get($this->_prefix_st.'DISPLAY_LOGOUT'),

                /*
                    iWeb - 2018-12-30
                */
                'cart_info' => $this->getCheckoutSession()->getInvaoiceAndCompany()
            )
        );
    }
    public function getGdpr(){
        if(!Module::isInstalled('psgdpr') || !Module::isEnabled('psgdpr'))
            return false;
        require_once _PS_MODULE_DIR_.'psgdpr/classes/GDPRConsent.php';

        $active = GDPRConsent::getConsentActive($this->module->id);
        if ($active == false) {
            return;
        }
        $message = GDPRConsent::getConsentMessage($this->module->id, $this->context->language->id);

        $url = $this->context->link->getModuleLink('psgdpr', 'FrontAjaxGdpr', array(), true);

        $id_customer = $this->context->customer->id;
        $id_guest = 0;
        if ($id_customer == null) {
            $id_guest = $this->context->cart->id_guest;
            $id_customer = 0;
        }
        return array(
            'psgdpr_id_guest' => $id_guest,
            'psgdpr_id_customer' => $id_customer,
            'psgdpr_customer_token' => sha1($this->context->customer->secure_key),
            'psgdpr_guest_token' => sha1('psgdpr'.$id_guest.$_SERVER['REMOTE_ADDR'].date('Y-m-d')),
            'psgdpr_id_module' => $this->module->id,
            'psgdpr_consent_message' => $message,
            'psgdpr_front_controller' => $url,
        );
    }
    public function setSocialName($name)
    {
        $this->social_name = $name;

        return $this;
    }
    public function socialLogin(){
        if(!$this->social_name)
            return false;

        require_once(_PS_MODULE_DIR_ . 'steasycheckout/lib/http.php');
        require_once(_PS_MODULE_DIR_ . 'steasycheckout/lib/oauth_client.php');

        $client = new oauth_client_class;

        $client->redirect_uri = $this->context->link->getModuleLink('steasycheckout', 'default', array('steco_'.Tools::strtolower($this->social_name) => 1));

        $client->server = $this->social_name;
        $client->reauthenticate = false;
        $client->client_id = Configuration::get($this->_prefix_st.Tools::strtoupper($this->social_name).'_ID');
        $client->client_secret = Configuration::get($this->_prefix_st.Tools::strtoupper($this->social_name).'_KEY');
        $client->scope = $this->socials[$client->server]['scope'];
        if($this->social_name == 'Google')
            $client->offline = true;

        if(($success = $client->Initialize()))
        {
            if(($success = $client->Process()))
            {
                if(strlen($client->authorization_error))
                {
                    $client->error = $client->authorization_error;
                    $success = false;
                }
                elseif(strlen($client->access_token))
                {
                        $success = $client->CallAPI(
                        $this->socials[$client->server]['url'], 
                        'GET', array(), array('FailOnAccessError'=>true), $user);
                }
            }
            $success = $client->Finalize($success);
        }

        if($client->exit)
            exit;

        if($success){
            $customer = new Customer();
            $customer->getByEmail($user->email);
            if (!Validate::isLoadedObject($customer)) {

                foreach ($this->socials[$client->server]['data'] as $k => $v) {
                    if (property_exists($user, $v)) {
                        $customer->{$k} = $user->{$v};
                    }
                }
                if($client->server=='Paypal' || $client->server=='Twitter' || $client->server=='Amazon'){
                    $split_name = $this->splitName($customer->firstname);
                    $customer->firstname = $split_name[0];
                    $customer->lastname = $split_name[1];
                }
                $result = $this->createCustomer($customer);
            }else{
                $result = $this->signIn($customer);
            }
            if($result)
                echo '<script>window.opener.location.reload(true);window.opener.focus();window.close();</script>';
        }else{
            if($client->error)
                $this->errors[] = $client->error;
        }
        return $this->errors;
    }

    protected function splitName($name){
        $name = trim($name);
        if(strpos($name, ' ') === false)
            return array($name, $name);
        $parts = explode(" ", $name);
        $last_name = array_pop($parts);
        $first_name = implode(" ", $parts);
        return array($first_name, $last_name);
    }
    protected function signIn(Customer $customer){
        Hook::exec('actionAuthenticationBefore');

        if (isset($customer->active) && !$customer->active) {
            $this->errors[] = $this->module->l('Your account isn\'t available at this time, please contact us', 'StCheckoutPersonalInformationStep');
            return false;
        } elseif (!$customer->id || $customer->is_guest) {
            $this->errors[] = $this->module->l('Authentication failed.', 'StCheckoutPersonalInformationStep');
            return false;
        } else {
            $this->context->updateCustomer($customer);

            Hook::exec('actionAuthentication', ['customer' => $this->context->customer]);

            // Login information have changed, so we check if the cart rules still apply
            CartRule::autoRemoveFromCart($this->context);
            CartRule::autoAddToCart($this->context);
            return true;
        }
    }
    protected function createCustomer(Customer $customer){
        $crypto = ServiceLocator::get('\\PrestaShop\\PrestaShop\\Core\\Crypto\\Hashing');
        $clearTextPassword = $crypto->hash(
            microtime(),
            _COOKIE_KEY_
        );

        $customer->passwd = $crypto->hash(
            $clearTextPassword,
            _COOKIE_KEY_
        );

        if (Customer::customerExists($customer->email, false, true)) {
            $this->errors[] = $this->module->l('An account was already registered with this email address', 'StCheckoutPersonalInformationStep');
            return false;
        }

        $ok = $customer->save();

        if ($ok) {
            $this->context->updateCustomer($customer);
            $this->context->cart->update();
            $this->sendConfirmationMail($customer, $clearTextPassword);
            Hook::exec('actionCustomerAccountAdd', array(
                'newCustomer' => $customer,
            ));
        }

        return $ok;
    }
    private function sendConfirmationMail(Customer $customer, $clearTextPassword)
    {
        if (!Configuration::get('PS_CUSTOMER_CREATION_EMAIL')) {
            return true;
        }

        return Mail::Send(
            $this->context->language->id,
            'account',
            $this->module->l('Welcome!', 'StCheckoutPersonalInformationStep'),
            array(
                '{firstname}' => $customer->firstname,
                '{lastname}' => $customer->lastname,
                '{email}' => $customer->email,
                '{password}' => $clearTextPassword,
            ),
            $customer->email,
            $customer->firstname.' '.$customer->lastname
        );
    }
}
