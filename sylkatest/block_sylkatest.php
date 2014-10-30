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
 *
 *
 * @package    block
 * @subpackage sylkatest
 * @author     Andrey Sylka <andreys75@inbox.ru>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 *
 * @subpackage sylkatest
 * @author     Andrey Sylka <andreys75@inbox.ru>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_sylkatest extends block_base {
    /**
     * block initializations
     */
    public function init() {
        $this->title   = get_string('pluginname', 'block_sylkatest');
    }

    /**
     * block contents
     *
     * @return object
     */
    public function get_content() {
        global $CFG, $USER, $DB, $OUTPUT, $PAGE;

        if ($this->content !== NULL) {
            return $this->content;
        }

        if (!isloggedin() or isguestuser()) {
            return '';      // Never useful unless you are logged in as real users
        }

        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->footer = '';

        $course = $this->page->course;

        if (!isset($this->config->display_picture) || $this->config->display_picture == 1) {
            $this->content->text .= '<div class="sylkatestitem picture">';
            $this->content->text .= $OUTPUT->user_picture($USER, array(
                'courseid'=>$course->id,
                'size'=>'100', 'class'=>'profilepicture'));  // The new class makes CSS easier
            $this->content->text .= '</div>';
        }

        $this->content->text .= '<div class="sylkatestitem username">'.get_string("display_username","block_sylkatest").": ".format_string($USER->username).'</div>';


        if(!isset($this->config->display_country) || $this->config->display_country == 1) {
            $countries = get_string_manager()->get_list_of_countries();
            if (isset($countries[$USER->country])) {
                $this->content->text .= '<div class="sylkatestitem country">';
                $this->content->text .= get_string('display_country','block_sylkatest') . ': ' . $countries[$USER->country];
                $this->content->text .= '</div>';
            }
        }

        if(!isset($this->config->display_first_name) || $this->config->display_first_name == 1) {
            $this->content->text .= '<div class="sylkatestitem first_name">';
            $this->content->text .= get_string('display_first_name','block_sylkatest') . ': ' . format_string($USER->firstname);
            $this->content->text .= '</div>';
        }

        if(!isset($this->config->display_last_name) || $this->config->display_last_name == 1) {
            $this->content->text .= '<div class="sylkatestitem last_name">';
            $this->content->text .=  get_string('display_last_name','block_sylkatest') . ': ' . format_string($USER->lastname);
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->moodle_version) || $this->config->moodle_version == 1) {
            $this->content->text .= '<div class="sylkatestitem moodle_version">';
            $this->content->text .= get_string('moodle_version','block_sylkatest') .":<br>". s($CFG->release);
            $this->content->text .= '</div>';
        }

        if(!empty($this->config->display_php_version) || $this->config->php_version == 1) {
            $this->content->text .= '<div class="sylkatestitem php_version">';
            $this->content->text .=  get_string('php_version','block_sylkatest') .":<br>". s(phpversion());
            $this->content->text .= '</div>';
        }



        return $this->content;
    }

    /**
     * allow the block to have a configuration page
     *
     * @return boolean
     */
    public function has_config() {
        return false;
    }

    /**
     * allow more than one instance of the block on a page
     *
     * @return boolean
     */
    public function instance_allow_multiple() {
        //allow more than one instance on a page
        return true;
    }

    /**
     * allow instances to have their own configuration
     *
     * @return boolean
     */
    function instance_allow_config() {
        //allow instances to have their own configuration
        return false;
    }

    /**
     * instance specialisations (must have instance allow config true)
     *
     */
    public function specialization() {
    }

    /**
     * displays instance configuration form
     *
     * @return boolean
     */
    function instance_config_print() {
        return false;

        /*
        global $CFG;

        $form = new block_sylkatest.phpConfigForm(null, array($this->config));
        $form->display();

        return true;
        */
    }

    /**
     * locations where block can be displayed
     *
     * @return array
     */
    public function applicable_formats() {
        return array('all'=>true);
    }

    /**
     * post install configurations
     *
     */
    public function after_install() {
    }

    /**
     * post delete configurations
     *
     */
    public function before_delete() {
    }

}
