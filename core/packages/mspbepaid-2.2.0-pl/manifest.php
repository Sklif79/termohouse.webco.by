<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'This file shows the changes in recent releases of mspBePaid.

mspBePaid 2.2.0-pl (December 3, 2017)
====================================
- Added two new methods of payment: Halva and ERIP
- Added new system settings for support new payment methods
- API version updated to 2.1

mspBePaid 2.1.0-pl (February 3, 2017)
====================================
- Added support different API versions of bePaid service 

mspBePaid 2.0.0-pl (February 2, 2017)
====================================
- Change BYR to BYN

mspBePaid 1.1.3-pl (February 9, 2016)
====================================
- Fixed lexicons for system settings

mspBePaid 1.1.2-pl (October 8, 2015)
====================================
- Added translates of system setting for English
- Fixed some minor bugs

mspBePaid 1.1.1-pl (October 8, 2015)
====================================
- Fixed resolver for install options

mspBePaid 1.1.0-pl (October 7, 2015)
====================================
- Moved order description to lexicon for easy tuning
- Added options for tune statuses after successful or failed payment request
- Sorted system setting, for less mess
- Added license info to all files of component
- Added script for install package from cli, for dev purposes
- Test mode by default, fixes in setup options
- Rewritten resolver for system settings
- Rewritten handler of answers from payment system
- Added method for calc right units of amount for checkout
- Added country for payments by default (bePaid required country for billing data)

mspBePaid 1.0.6-beta (July 16, 2015)
====================================
- Added require of minimal php version

mspBePaid 1.0.6-beta (July 16, 2015)
====================================
- Copy of mspWebPay
',
    'license' => 'The MIT License (MIT)

Copyright (c) 2017 Ivan Klimchuk <ivan@klimchuk.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
',
    'readme' => 'Payment\'s plugin for e-commerce based on miniShop2 through the bePaid payment system.

Details and docs there: http://docs.modx.pro/components/minishop2/payment-modules/mspbepaid
',
    'requires' => 
    array (
      'php' => '>=5.5',
      'modx' => '>=2.4',
      'miniShop2' => '>=2.4',
    ),
    'setup-options' => 'mspbepaid-2.2.0-pl/setup-options.php',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'cbf34bbb86473ebfbdaa6ba566d7c04d',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/3b089df96be012434ce257405a6eb45e.vehicle',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '716bf4e6f19ba10e81317dd6cb5a677c',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/013d7526d0e3317b393f54ae92f4a544.vehicle',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '7cae54cfefed5494153d7714f1ab0f80',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/4b9d10fb045777a55e10dd6a3aff66ab.vehicle',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'fd45ff720ca7338f6372f76cdbe5b424',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/6dfb73e18d4ea1b3e960df3035d69944.vehicle',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'c694eacc7bf9b267d06b224e5f1e3c5c',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/713b3bdde663f63abdf3d30a46ac7498.vehicle',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '0ad32ee8dda6761a5ae550ec11fe91eb',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/07c81136667e34820ecf8b159096ffda.vehicle',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4885f640a7b532ed2fbf2f23b98bb0f4',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/d5a2fb597e46402b8995dac1e06e7dc7.vehicle',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'c5c4388cd9962571a42dd0c316c9eb62',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/901da7b08348c58d49b2282ad07b6d8f.vehicle',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '6b8279f4ccc80e981747042cb57fe030',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/0fc50dffee8ce7f28862d229a2b6c4d7.vehicle',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '8ad1efef2b80f86cd6743e21c8c17ae9',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/2e502f1d63528e9dda3809ce888aa3db.vehicle',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '71e2e01a7ef025a26ffc5e356869a547',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/0d76a35e7e5e16ded7297f7899ebf87a.vehicle',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '162a3f8577d7495a3755df137b977a38',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/63c14c9060f16742500fa767c554dda2.vehicle',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'cc661cdc1853a0b8dd248edb9581f5c4',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/a746b1d19cf3e8cec9d34d8580b737b4.vehicle',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'ae43b7fd059b325b5e9a7dd920bdda7c',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/be9fa279a530f4224d6214df29e19c34.vehicle',
    ),
    14 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '810257744992e680a54d24a3094a9d38',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/ec47910216fba4d38ef9c2770292ec88.vehicle',
    ),
    15 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'b5dbbb7b4d9837e513ca8dfb09df4637',
      'native_key' => NULL,
      'filename' => 'modSystemSetting/6eae66e06d3e2ff30b80b3a6e1d02d2d.vehicle',
    ),
    16 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'msPayment',
      'guid' => 'd7764d438bf549596dcb3313d01b8d37',
      'native_key' => NULL,
      'filename' => 'msPayment/40558208af55a8d4d75d22e2646fda86.vehicle',
    ),
    17 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'msPayment',
      'guid' => '03acd62f8e3c04a988462c8ebdfafa83',
      'native_key' => NULL,
      'filename' => 'msPayment/8c9890d84bf84953e9f56dd5cc62a3c8.vehicle',
    ),
    18 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'msPayment',
      'guid' => '50587bf2949c18eca284cfcfbbfef520',
      'native_key' => NULL,
      'filename' => 'msPayment/f355824bd55ce7d66c95f272fc258f4c.vehicle',
    ),
    19 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '53b5dee6404af77dc193b5cae073d795',
      'native_key' => NULL,
      'filename' => 'modCategory/0c453a9860610b7db2cd12421b2d25a4.vehicle',
    ),
  ),
);