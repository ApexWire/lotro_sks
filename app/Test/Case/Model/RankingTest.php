<?php
App::uses('Ranking', 'Model');

/**
 * Ranking Test Case
 *
 */
class RankingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ranking',
		'app.raid',
		'app.player',
		'app.status',
		'app.character'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ranking = ClassRegistry::init('Ranking');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ranking);

		parent::tearDown();
	}

}
