<?php
	
require 'functions.php';
use PHPUnit\Framework\TestCase; 

class FunctionTest extends \PHPUnit\Framework\TestCase {

	public function testAddReturnsTheCorrectSum() {
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(3, 5));        
    }

    public function testAddDoesNotReturnTheIncorrectSum() {
    	$this->assertNotEquals(5, add(2, 2));
	}    
}
	
?>