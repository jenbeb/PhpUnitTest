<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue() {
        $this->assertTrue(Mailer::send('dave@example.com', 'Hello!'));
    }
    
    public function testInvalidArgumentExceptionIfEmailIsEmpty() {

        $this->setExpectedException(InvalidArgumentException::class);     
            
        Mailer::send('', '');
    }      
}