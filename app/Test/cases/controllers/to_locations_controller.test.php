<?php
/* ToLocations Test cases generated on: 2011-06-16 13:49:23 : 1308224963*/
App::import('Controller', 'ToLocations');

class TestToLocationsController extends ToLocationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ToLocationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.to_location', 'app.tablet', 'app.arch_loc', 'app.arch_site', 'app.period', 'app.genre', 'app.month', 'app.year', 'app.collection', 'app.coll_museum', 'app.coll_city', 'app.coll_country', 'app.project', 'app.main_action', 'app.ruler', 'app.tablet_file', 'app.group', 'app.groups_tablet', 'app.keyword', 'app.keywords_tablet', 'app.language', 'app.languages_tablet', 'app.tag', 'app.tablets_tag', 'app.term', 'app.word_type', 'app.fish', 'app.tablets_term');

	function startTest() {
		$this->ToLocations =& new TestToLocationsController();
		$this->ToLocations->constructClasses();
	}

	function endTest() {
		unset($this->ToLocations);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
