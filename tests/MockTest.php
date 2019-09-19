<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->getMockBuilder(Mailer::class)->getMock();

        $mock->method('sendMessage')
             ->willReturn(true);                
        
        $result = $mock->sendMessage('dave@example.com', 'Hello');
        
        $this->assertTrue($result);
    }
}