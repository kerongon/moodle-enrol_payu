--------------------------------------------------------------------------------

Description

--------------------------------------------------------------------------------

Enrolment in Moodle using Payu Money payment gateway for paid courses.



This plugin helps Moodle Users use PayUMoney as the payment gateway. PayUMoney

is one of the popular payment gateways. PayUMoney is supported Indian(INR) currency only.

This plugin has all the settings for development as well as for production usage.

It's easy to install, set up and effective.



--------------------------------------------------------------------------------

Installation

--------------------------------------------------------------------------------

Log in to your Moodle site as an “admin user” and follow the steps.



1) Upload the zip package from Site administration > Plugins > Install plugins.

Choose Plugin type 'Enrolment method (enrol)'. Upload the ZIP package, check the

acknowledgment and install.



2) Go to Enrolments > Manage enrol plugins > Enable 'PayU' from list



3) Click 'Settings' which will lead to the settings page of the plugin



4) Provide merchant credentials for payu. Note that, you will get all the details

from your merchant account. Now select the checkbox as per requirement.

Save the settings.



5) Select any course from course listing page.



6) Go to Course administration > Users > Enrolment methods > Add method 'payu' from

the drop-down. Set 'Custom instance name', 'Enrol cost' etc and add the method.



You can also download the package and upload it in the Install Plugin area. The enroll
plugin will be installed. You can download the package from moodle.org, or

Visit https://github.com/nileshnpathade/moodle-enrol_payu and download

moodle-enrol_payu folder.



This completes all the steps from the administrator end. Now registered users can

login to the Moodle site and view the course after a successful payment.



--------------------------------------------------------------------------------

Creating a Merchant Account

--------------------------------------------------------------------------------



1) Create the account at for test https://test.payumoney.com and for live https://www.payumoney.com.

At a time of sign up use your valid email.



2) Complete your merchant profile details from for test https://test.payumoney.com/merchant-dashboard/ and for live https://www.payumoney.com/merchant-dashboard/#/transactions.



3) Now copy Merchant key and Merchant Salt from Test Credentials for Sandbox and Live 

Credentials for live integration.



4) For test mode use Test Credentials API keys and for live mode use Live Credentials API keys.



Now you are done with merchant account set up.



--------------------------------------------------------------------------------

TODO

--------------------------------------------------------------------------------

1) PayU enrollment plugin will be support for International currency as well.