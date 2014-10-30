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

/**
 * Form for editing profile block settings
 *
 * @package    block
 * @subpackage sylkatest
 * @author     Andrey Sylka <andreys75@inbox.ru>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_sylkatest_edit_form extends block_edit_form {
    protected function specific_definition($mform) {
     //   global $CFG;
        $mform->addElement('header', 'configheader', get_string('sylkatest_settings', 'block_sylkatest'));

        $mform->addElement('selectyesno', 'config_display_picture', get_string('display_picture', 'block_sylkatest'));
        if (isset($this->block->config->display_picture)) {
            $mform->setDefault('config_display_picture', $this->block->config->display_picture);
        } else {
            $mform->setDefault('config_display_picture', '1');
        }

        $mform->addElement('selectyesno', 'config_display_country', get_string('display_country', 'block_sylkatest'));
        if (isset($this->block->config->display_country)) {
            $mform->setDefault('config_display_country', $this->block->config->display_country);
        } else {
            $mform->setDefault('config_display_country', '1');
        }
        $mform->addElement('selectyesno', 'config_display_username', get_string('display_username', 'block_sylkatest'));
        if (isset($this->block->config->display_username)) {
            $mform->setDefault('config_display_username', $this->block->config->display_username);
        } else {
            $mform->setDefault('config_display_username', '1');
        }
        $mform->addElement('selectyesno', 'config_moodle_version', get_string('moodle_version', 'block_sylkatest'));
        if (isset($this->block->config->moodle_version)) {
            $mform->setDefault('config_moodle_version', $this->block->config->moodle_version);
        } else {
            $mform->setDefault('config_moodle_version', '1');
        }

        $mform->addElement('selectyesno', 'config_php_version', get_string('php_version', 'block_sylkatest'));
        if (isset($this->block->config->php_version)) {
            $mform->setDefault('config_php_version', $this->block->config->php_version);
        } else {
            $mform->setDefault('config_php_version', '1');
        }

        $mform->addElement('selectyesno', 'config_display_first_name', get_string('display_first_name', 'block_sylkatest'));
        if (isset($this->block->config->display_first_name)) {
            $mform->setDefault('config_display_first_name', $this->block->config->display_first_name);
        } else {
            $mform->setDefault('config_display_first_name', '0');
        }

        $mform->addElement('selectyesno', 'config_display_last_name', get_string('display_last_name', 'block_sylkatest'));
        if (isset($this->block->config->display_last_name)) {
            $mform->setDefault('config_display_last_name', $this->block->config->display_last_name);
        } else {
            $mform->setDefault('config_display_last_name', '0');
        }


    }
}