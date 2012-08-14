<?php
App::uses('Lorebook', 'Model');

/**
 * Lorebook Test Case
 *
 */
class LorebookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lorebook'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lorebook = ClassRegistry::init('Lorebook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lorebook);

		parent::tearDown();
	}

}
