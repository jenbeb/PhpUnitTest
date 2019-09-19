<?php
	
use PHPUnit\Framework\TestCase; 

class Test extends \PHPUnit\Framework\TestCase {

	public function testAddingTwoPlustwoResultsInFour() {
		$this->assertEquals(4, 2+2);
	}
}
	
?>