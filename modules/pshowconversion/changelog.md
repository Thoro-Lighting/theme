## v2.4.13 - 2023-11-21
### Fixed
- Fix - Notice: Undefined index: events

## v2.4.12 - 2023-11-20
### Fixed
- Disable sending campaign data to prevent campaign data from being overwritten in user sessions
- Fix missing data in the event view_item_list on Prestashop 1.6

## v2.4.11 - 2023-11-16
### Fixed
- Fix missing view_item event on prestashop 1.6

## v2.4.10 - 2023-11-15
### Added
- Campaign data is now sent to GA4 using the measurement protocol (only if the data was found by the module)
### Fixed
- Fixed other small bugs and warnings

## v2.4.9 - 2023-11-14
### Fixed
- Improve conversion delivery to Google Ads

## v2.4.8 - 2023-11-09
### Fixed
- Send purchases to GA4 and GAds using gtag

## v2.4.7 - 2023-11-06
### Fixed
- Improve determination of product variant name in events
- Improve determination of product categories in events

## v2.4.6 - 2023-11-02
### Fixed
- Fix for "refund" event
- Improve sending of events to google analytics 4 (using gtag)

## v2.4.5 - 2023-10-30
### Fixed
- Improve sending of events to google analytics 4 (using gtag)
- Improve tracking of path to purchase

## v2.4.4 - 2023-10-30
### Fixed
- Prevent view_item event duplication

## v2.4.3 - 2023-10-25
### Fixed
- Do not send transaction data to UA because it stopped processing new data
- Improve sending JS dataLayer data
- Improve google_tag_params data
- Fix migration - there was missing database column on some shops

## v2.4.2 - 2023-10-10
### Fixed
- Small fixes in data used by the measurement protocol

## v2.4.1 - 2023-10-10
### Added
- Added ecomm_pagetype to support google ads retail data segment

## v2.4.0 - 2023-10-02
### Added
- Restore ability to enter custom transaction sources to be ignored and choose which source (first/last) should be sent to google 
- Experimental method of sending campaign info (introduced in v2.3.1) is from now stable and always active

## v2.3.4 - 2023-08-31
### Fixed
- Fix hook actionGetProductPropertiesAfter deprecated since 1.7.8.0 - on prestashop versions 1.7.8 and above, after some time there was a slowdown of the store due to a large number of entries in the store log about an outdated hook 

## v2.3.3 - 2023-08-30
### Fixed
- Fix 'kernel container not available' error on some versions of Prestashop 1.7

## v2.3.2 - 2023-08-28
### Added
- Improve experimental method of sending campaign info (added in v2.3.1)
- Send hash of customer email to support enhanced conversion tracking for Google Ads

## v2.3.1 - 2023-08-16
### Added
- Experimental method of sending campaign info (determined by the module) using gtag - see in "module settings" tab

## v2.3.0 - 2023-08-14
### Added
- New option in GA configuration: Ability to exclude shipping cost from transaction data (applies to orders sent via Measurement Protocol to GA4)

## v2.2.0 - 2023-08-03
### Added
- Simplify module configuration
- GTM is no longer required to activate dataLayer and thus receive events in GA4
- DataLayer is no longer optional and will always be active
- The module sends events to all services whose IDs are specified in the module configuration (UA, GA4, GTM)
- Show a message indicating how the module works based on its configuration
### Fixed
- Fixed minor bugs

## v2.1.25 - 2023-08-02
### Fixed
- Prevent JS error: PShowConversionJS.shopping_cart is not iterable

## v2.1.24 - 2023-07-27
### Fixed
- Fix attribute duplication in item_variant in MP data
- Remove attributes from item_name in MP data

## v2.1.23 - 2023-07-26
### Fixed
- Fix undefined array key 'controller'
- Fix small error in data typing

## v2.1.21 - 2023-06-22
### Fixed
- Fix missing data in JS

## v2.1.20 - 2023-06-09
### Fixed
- Fix missing data - warnings appear in debug mode

## v2.1.19 - 2023-06-07
### Added
- Add warning about data duplication
### Fixed
- Fix missing client_id in the measurement protocol for GA4

## v2.1.18 - 2023-05-18
### Added
- Add session linking to events sent by measurement protocol

## v2.1.17 - 2023-05-17
### Added
- Send timestamp with event data using Measurement Protocol

## v2.1.16 - 2023-05-16
### Fixed
- Improve sending of client ID with transactions

## v2.1.15 - 2023-04-28
### Fixed
- Some versions of Prestashop did not add JS scripts for GTM tracking

## v2.1.14 - 2023-04-27
### Fixed
- Fix typo

## v2.1.13 - 2023-04-27
### Fixed
- Improved user id linking

## v2.1.12 - 2023-04-26
### Fixed
- Improved client id linking - important fix for transactions source attribution

## v2.1.11 - 2023-04-26
### Fixed
- Fix CRON info in the module configuration

## v2.1.10 - 2023-04-25
### Fixed
- Improved GTM configuration file ready to import for GA4 tracking - from now it contains only one tag with all events
- Improve module configuration

## v2.1.9 - 2023-04-21
### Fixed
- Small fix in JS code

## v2.1.8 - 2023-04-15
### Added
- Allow enhanced conversion tracking for Google Ads

## v2.1.7 - 2023-04-14
### Fixed
- Fix missing variables in JS dataLayer tracking code [in Prestashop 1.6 only]

## v2.1.6 - 2023-04-14
### Added
- Improve support for UTM parameters tracking for Google Analytics 4

## v2.1.5 - 2023-04-13
### Added
- Add support for Prestashop 8.0 and PHP 8.1

## v2.1.4 - 2023-03-09
### Fixed
- Security patches

## v2.1.3 - 2023-03-08
### Added
- Add image with marked GA4 measurement ID to prevent confusion

## v2.1.2 - 2023-03-06
### Fixed
- Small dataLayer fixes for prestashop 1.6

## v2.1.1 - 2023-02-03
### Fixed
- The problem with file access

## v2.1.0 - 2023-01-18
### Added
- Add a GA4-compatible dataLayer data structure

## v2.0.3 - 2022-12-08
### Fixed
- Display GA4 data on the order view page in the back-office

## v2.0.2 - 2022-12-02
### Fixed
- Small fix to ignore clicking on product link with class `gmlightbox`

## v2.0.1 - 2022-11-09
### Fixed
- Allow char `-` in the GA4 secret key

## v2.0.0 - 2022-10-21
Important: Universal Analytics will stop processing data on 2023-07-01. You should migrate to Google Analytics 4 as soon as possible.
### Added
- Send transactions (purchase and refund) to Google Analytics 4 using Measurement Protocol

## v1.33.7 - 2022-08-22
### Fixed
- Fix missing guzzle lib on PrestaShop 1.6 and older

## v1.33.6 - 2022-07-25
### Fixed
- Fix support for multiple coupon codes added to the order
- Improve support for 'supercheckout' module

## v1.33.5 - 2022-07-13
### Fixed
- Fix issue which cause that module is sending total product prices instead of unit prices to GTM

## v1.33.4 - 2022-07-11
### Fixed
- The javascript code blocking removal of products from shopping cart in prestashop 1.7

## v1.33.3 - 2022-06-20
### Fixed
- Update and adjust google services api packages
- Highly optimized total module size

## v1.33.2 - 2022-06-19
### Fixed
- Fix missing database tables/columns

## v1.33.1 - 2022-06-13
### Fixed
- Automatically move executions of this module in the hook to run before any other modules

## v1.33.0 - 2022-05-04
### Added
- Prevent sending URL containing email address to GA (@see https://support.google.com/analytics/answer/6366371#page-url)

## v1.32 - 2021-10-22
- fix problem with price rounding on some PS versions

## v1.31 - 2021-09-13
- improve price rounding

## v1.30 - 2021-08-26
- you can choose that you want to send net or gross prices to google analytics together with the transaction
- added dataLayer support for the przelewy24 module, 
  after making a payment and after clicking "Pay by Przelewy24"
- added google_tag_params section to dataLayer for retargeting
  (ecomm_prodid, ecomm_totalvalue, ecomm_pagetype, ecomm_pagename, 
  ecomm_brand, ecomm_category, ecomm_model, ecomm_quantity)
- improved dataLayer functionality

## v1.29 - 2021-03-31
- you can enter Google Ads conversion id and conversion label in the module configuration tab: Google Ads

## v1.28 - 2020-12-28
- added possibility to enter tracking code for Google Analytics 4
  https://developers.google.com/analytics/devguides/collection/ga4/basic-tag?technology=gtagjs#set_up_the_basic_page_tag

## v1.27 - 2020-12-17
- fixed an error that caused the order amount not to include the cart rule value
- improved support for PrestaShop 1.7.7

## v1.26 - 2020-12-07
- fixed bugs related to the transaction data

## v1.25 - 2020-10-22
- possibility to send profit from sales instead of product prices
- module is sending more information to GTM using dataLayer

## v1.24 - 2020-09-14
- updated google oauth config - approval_prompt
- error causing lack of information about product sales in Google Analytics has been fixed

## v1.23 - 2020-03-02
- you can disable Global Site Tag, so you can use other 
modules for tracking user activity in the shop
- disabled GTM event 'purchase' to prevent duplicated transactions

## v1.22 - 2019-12-19
- from now, you can enter custom source & medium while creating the order in the back-office

## v1.21 - 2019-10-04
- fixed missing 'cid' parameter

## v1.20 - 2019-09-19
- Important! You must update your dataLayer configuration!   
Edit tags which uses event actions: `impressions, detail, checkout, checkoutOption, purchase, refund`   
and set: Non-interactive = True
- added support for OPC module 'supercheckout' for PrestaShop 1.7
- added configuration file ready to import in tagmanager.google.com
- fixed bug related to PayU payment module (Jakarta user-agent)

## v1.19 - 2019-08-12
- fixed bugs in the traffic source tracking

## v1.18 - 2019-08-06
- fixed tracking order steps in PrestaShop 1.7

## v1.17 - 2019-06-28
- NEW! introduced integration with Google Reporting API. 
From now the module will check that transactions were sent to and exists in the Google Analytics.
- fixed bug with currencies
- fixed bugs

## v1.16 - 2019-05-08
- NEW! allow to configure transaction sources which should be ignored
- fixed bugs reported by users

## v1.15 - 2018-12-12
- NEW! you can use CRON job to send transactions to GA
- NEW! the module allows to collect data by dataLayer from Google Tag Manager -
    measuring product impressions, clicks, checkout steps, purchases and many more

## v1.14 - 2018-05-28
- improved tracking of user activity using php measurement protocol
- improved sending of customer data with transaction to GA
- allow to anonymize customer ip address
- official js tracking code is now associated with data sending using measurement protocol 

## v1.13 - 2018-02-23
- added Google Tag Manager noscript tag (module reinstallation required)

## v1.12 - 2018-02-16
- NEW! added data which will be sent to GA on the order page in the back-office
- fixed bug in sending order to GA while first status is add to order

## v1.11 - 2018-02-14
- improved traffic sources

## v1.10 - 2018-01-31
- adwords tracking improved

## v1.9 - 2018-01-24
- improved module configuration
- improved searching of traffic sources
- since this version module is fully working with multistore mode
- NEW! added Google Tag Manager tracking code

## v1.8 - 2017-12-18
- improved tracking

## v1.7 - 2017-12-07 - Update your module configuration after update to this version
- NEW! added support for google optimize
- NEW! google analytics measurement protocol is used for page tracking (instead of analytics.js)

## v1.6 - 2017-11-16
- improved connection with GA

## v1.5 - 2017-11-13
- improved client tracking

## v1.4 - 2017-11-03
- NEW! option in module configuration: Display tracking code in the store
- NEW! option in module configuration: Expiration of traffic sources
- improved getting of traffic sources
- big changes in traffic sources management

## v1.3 - 2017-10-27
- fixed bug in creating new shopping carts

## v1.2 - 2017-09-20
- fixed client id
- improved order sending to Google Analytics

## v1.1 - 2017-06-07
- fixed many bugs reported by clients

## v1.0 - 2016-09-30
- initial version
