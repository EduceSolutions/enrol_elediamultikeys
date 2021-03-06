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


defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    //--- general settings -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_elediamultikeys_settings', '', get_string('pluginname_desc', 'enrol_elediamultikeys')));

    //--- enrol instance defaults ----------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_elediamultikeys_defaults',
        get_string('enrolinstancedefaults', 'admin'), get_string('enrolinstancedefaults_desc', 'admin')));

    $settings->add(new admin_setting_configcheckbox('enrol_elediamultikeys/defaultenrol',
        get_string('defaultenrol', 'enrol'), get_string('defaultenrol_desc', 'enrol'), 1));

    $options = array(ENROL_INSTANCE_ENABLED  => get_string('yes'),
                     ENROL_INSTANCE_DISABLED => get_string('no'));
    $settings->add(new admin_setting_configselect('enrol_elediamultikeys/status',
        get_string('status', 'enrol_elediamultikeys'), get_string('status_desc', 'enrol_elediamultikeys'), ENROL_INSTANCE_DISABLED, $options));

    if (!during_initial_install()) {
        $options = get_default_enrol_roles(context_system::instance());
        $student = get_archetype_roles('student');
        $student = reset($student);
        $settings->add(new admin_setting_configselect('enrol_elediamultikeys/roleid',
            get_string('defaultrole', 'enrol_elediamultikeys'), get_string('defaultrole_desc', 'enrol_elediamultikeys'), $student->id, $options));
    }

    $settings->add(new admin_setting_configtext('enrol_elediamultikeys/enrolperiod',
        get_string('enrolperiod', 'enrol_elediamultikeys'), get_string('enrolperiod_desc', 'enrol_elediamultikeys'), 0, PARAM_INT));

    $options = array(0 => get_string('never'),
                     1800 * 3600 * 24 => get_string('numdays', '', 1800),
                     1000 * 3600 * 24 => get_string('numdays', '', 1000),
                     365 * 3600 * 24 => get_string('numdays', '', 365),
                     180 * 3600 * 24 => get_string('numdays', '', 180),
                     150 * 3600 * 24 => get_string('numdays', '', 150),
                     120 * 3600 * 24 => get_string('numdays', '', 120),
                     90 * 3600 * 24 => get_string('numdays', '', 90),
                     60 * 3600 * 24 => get_string('numdays', '', 60),
                     30 * 3600 * 24 => get_string('numdays', '', 30),
                     21 * 3600 * 24 => get_string('numdays', '', 21),
                     14 * 3600 * 24 => get_string('numdays', '', 14),
                     7 * 3600 * 24 => get_string('numdays', '', 7));
    $settings->add(new admin_setting_configselect('enrol_elediamultikeys/longtimenosee',
        get_string('longtimenosee', 'enrol_elediamultikeys'), get_string('longtimenosee_help', 'enrol_elediamultikeys'), 0, $options));

    $settings->add(new admin_setting_configtext('enrol_elediamultikeys/maxenrolled',
        get_string('maxenrolled', 'enrol_elediamultikeys'), get_string('maxenrolled_help', 'enrol_elediamultikeys'), 0, PARAM_INT));

    $settings->add(new admin_setting_configcheckbox('enrol_elediamultikeys/sendcoursewelcomemessage',
        get_string('sendcoursewelcomemessage', 'enrol_elediamultikeys'), get_string('sendcoursewelcomemessage_help', 'enrol_elediamultikeys'), 1));

    $settings->add(new admin_setting_configtext('enrol_elediamultikeys/infomail',
        get_string('infomail', 'enrol_elediamultikeys'), get_string('infomail_help', 'enrol_elediamultikeys'), '', PARAM_EMAIL, 60));
}
