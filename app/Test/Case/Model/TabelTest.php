<?php
App::uses('Tabel', 'Model');

/**
 * Tabel Test Case
 *
 */
class TabelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tabel',
		'app.arch_loc',
		'app.tablet',
		'app.object_type',
		'app.shape',
		'app.corner',
		'app.size_class',
		'app.edge',
		'app.collection',
		'app.coll_museum',
		'app.coll_city',
		'app.coll_country',
		'app.period',
		'app.arch_site',
		'app.genre',
		'app.month',
		'app.year',
		'app.project',
		'app.ruler',
		'app.official',
		'app.tablet_file',
		'app.tablet_term',
		'app.term',
		'app.tablets_term',
		'app.word',
		'app.word_type',
		'app.words_word_type',
		'app.terms_word',
		'app.reading_tablet',
		'app.reading',
		'app.sign',
		'app.sign_type',
		'app.readings',
		'app.readings_tablet',
		'app.tag',
		'app.tablets_tag',
		'app.sign_paleo',
		'app.sign_paleos_tablet',
		'app.from_person',
		'app.from_people_tablet',
		'app.to_person',
		'app.tablets_to_person',
		'app.from_location',
		'app.from_locations_tablet',
		'app.to_location',
		'app.tablets_to_location',
		'app.language',
		'app.languages_tablet',
		'app.group',
		'app.groups_tablet',
		'app.keyword',
		'app.keywords_tablet',
		'app.transac',
		'app.main_action',
		'app.verb',
		'app.main_topic',
		'app.good',
		'app.tablets_transac',
		'app.local_ruler',
		'app.action',
		'app.actions_tablet',
		'app.reference',
		'app.references_tablet'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tabel = ClassRegistry::init('Tabel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tabel);

		parent::tearDown();
	}

}
