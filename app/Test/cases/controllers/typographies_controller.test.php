<?php
/* Typographies Test cases generated on: 2011-05-19 10:10:54 : 1305792654*/
App::import('Controller', 'Typographies');

class TestTypographiesController extends TypographiesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TypographiesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.typography', 'app.tablet', 'app.arch_loc', 'app.arch_site', 'app.period', 'app.genre', 'app.month', 'app.year', 'app.collection', 'app.project', 'app.ruler', 'app.tablet_file', 'app.group', 'app.groups_tablet', 'app.keyword', 'app.keywords_tablet', 'app.language', 'app.languages_tablet', 'app.tag', 'app.tablets_tag', 'app.term', 'app.word_type', 'app.fish', 'app.tablets_term');

	function startTest() {
		$this->Typographies =& new TestTypographiesController();
		$this->Typographies->constructClasses();
	}

	function endTest() {
		unset($this->Typographies);
		ClassRegistry::flush();
	}

}
