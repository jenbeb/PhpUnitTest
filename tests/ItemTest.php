<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty() {
        $item = new Item;
        
        $this->assertNotEmpty($item->getDescription());                    
    }
    
    public function testIDisAnInteger() {
        $item = new ItemChild;
        
        $this->assertInternalType("int",$item->getID());
    }    

    public function testTokenIsAString() {
        $item = new Item;

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);
        
        $this->assertInternalType("string",$result);        
    }    

    public function testPrefixedTokenStartsWithPrefix() {
        $item = new Item;

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, array('example'));
        
        $this->assertStringStartsWith("example",$result);        
    }    
}
