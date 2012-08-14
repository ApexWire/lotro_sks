<?php
App::uses('Character', 'Model');

/**
 * Character Test Case
 *
 */
class CharacterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.character',
		'app.player',
		'app.status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Character = ClassRegistry::init('Character');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Character);

		parent::tearDown();
	}

}
