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
 * Block definition class for the block_pluginname plugin.
 *
 * @package   block_pluginname
 * @copyright Year, You Name <your@email.address>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_wing extends block_base {

    /**
     * Initialises the block.
     *
     * @return void
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_wing');
    }

    /**
     * Gets the block contents.
     *
     * @return string The block HTML.
     */
    public function get_content() {
        global $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
	$this->content->text = $this->get_search_results();
        $this->content->footer = '';

        return $this->content;
    }

    /**
     * search with google api
     *
     * @return search results
     */
    private function get_search_results(){
	// Search API key
	$api_key = 'AIzaSyAvvy9ajDnA3oomrijReJEX4GpwrkXFxdw';
	$cx      = '87fd501b81a744907';
	$query   = 'Moodle Blocks';

	$url = '';
	$params = [
	'q' => $query,
   	'key' => $api_key,
    	'cx' => $cx,
	];

	$url .= 'https://www.googleapis.com/customsearch/v1?' . http_build_query($params);

	// Failed to open stream: HTTP request failed! HTTP/1.1 403 Forbidden
	//$response = file_get_contents($url);
	$response = false;
	$links = '';

	if ($response !== false) {
    	    $results = json_decode($response, true);

    	    if (isset($results['items'])) {
        	foreach ($results['items'] as $item) {
            	    if (isset($item['link'])) {
                	$links .= $item['link'] . '<br>';
            	    }
        	}
    	    } else {
            	$links .= 'no results.';
            }
	} else {
            $links .= 'no results.';
        }
	return $links;
    }

    /**
     * Defines in which pages this block can be added.
     *
     * @return array of the pages where the block can be added.
     */
    public function applicable_formats() {
        return [
            'admin' => false,
            'site-index' => false,
            'course-view' => false,
            'mod' => false,
            'my' => true,
        ];
    }
}
