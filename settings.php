<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * payu enrolments plugin settings and presets.
 *
 * @package    enrol_payu
 * @copyright  2018
 * @author     Nilesh Pathade
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Sttings.
    $settings->add(new admin_setting_heading('enrol_payu_settings', '', get_string('pluginname_desc', 'enrol_payu')));
    $settings->add(new admin_setting_configtext('enrol_payu/payubusiness', get_string('businessemail', 'enrol_payu'), get_string('businessemail_desc', 'enrol_payu'), '', PARAM_EMAIL));
    $settings->add(new admin_setting_configtext('enrol_payu/merchantkey', get_string('merchantkey', 'enrol_payu'), get_string('merchantkey_desc', 'enrol_payu'), ''));
    $settings->add(new admin_setting_configtext('enrol_payu/merchantsalt', get_string('merchantsalt', 'enrol_payu'), get_string('merchantsalt_desc', 'enrol_payu'), ''));
    $settings->add(new admin_setting_configcheckbox('enrol_payu/mailstudents', get_string('mailstudents', 'enrol_payu'), '', 0));
    $settings->add(new admin_setting_configcheckbox('enrol_payu/mailteachers', get_string('mailteachers', 'enrol_payu'), '', 0));
    $settings->add(new admin_setting_configcheckbox('enrol_payu/mailadmins', get_string('mailadmins', 'enrol_payu'), '', 0));
    $options = array(
        ENROL_EXT_REMOVED_KEEP           => get_string('extremovedkeep', 'enrol'),
        ENROL_EXT_REMOVED_SUSPENDNOROLES => get_string('extremovedsuspendnoroles', 'enrol'),
        ENROL_EXT_REMOVED_UNENROL        => get_string('extremovedunenrol', 'enrol'),
    );
    $settings->add(new admin_setting_configselect('enrol_payu/expiredaction', get_string('expiredaction', 'enrol_payu'), get_string('expiredaction_help', 'enrol_payu'), ENROL_EXT_REMOVED_SUSPENDNOROLES, $options));

    // Enrol instance defaults.
    $settings->add(new admin_setting_heading('enrol_paypal_defaults',
        get_string('enrolinstancedefaults', 'admin'), get_string('enrolinstancedefaults_desc', 'admin')));

    $options = array(ENROL_INSTANCE_ENABLED  => get_string('yes'),
                     ENROL_INSTANCE_DISABLED => get_string('no'));
    $settings->add(new admin_setting_configselect('enrol_payu/status',
        get_string('status', 'enrol_payu'), get_string('status_desc', 'enrol_payu'), ENROL_INSTANCE_DISABLED, $options));

    $settings->add(new admin_setting_configtext('enrol_payu/cost', get_string('cost', 'enrol_payu'), '', 0, PARAM_FLOAT, 4));

    $paypalcurrencies = enrol_get_plugin('payu')->get_currencies();
    $settings->add(new admin_setting_configselect('enrol_payu/currency', get_string('currency', 'enrol_payu'), '', 'USD', $paypalcurrencies));

    if (!during_initial_install()) {
        $options = get_default_enrol_roles(context_system::instance());
        $student = get_archetype_roles('student');
        $student = reset($student);
        $settings->add(new admin_setting_configselect('enrol_payu/roleid',
            get_string('defaultrole', 'enrol_payu'), get_string('defaultrole_desc', 'enrol_payu'), $student->id, $options));
    }

    $settings->add(new admin_setting_configduration('enrol_payu/enrolperiod',
        get_string('enrolperiod', 'enrol_payu'), get_string('enrolperiod_desc', 'enrol_payu'), 0));
}
