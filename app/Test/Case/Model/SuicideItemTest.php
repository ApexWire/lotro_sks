<?php
App::uses('SuicideItem', 'Model');

/**
 * SuicideItem Test Case
 *
 */
class SuicideItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.suicide_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SuicideItem = ClassRegistry::init('SuicideItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SuicideItem);

		parent::tearDown();
	}

}
