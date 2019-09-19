<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function testReturnsFullName() {
        $user = new User;                

        $user->first_name = "Teresa";
        $user->surname = "Green";
        
        $this->assertEquals('Teresa Green', $user->getFullName());        
    }
        
    public function testFullNameIsEmptyByDefault() {
        $user = new User;
        
        $this->assertEquals('', $user->getFullName());                    
    }

    /**
     * @test
    **/
    public function user_has_first_name() {
        $user = new User;
        
        $user->first_name = "Teresa";
        
        $this->assertEquals('Teresa', $user->first_name);                        
    }

    public function testNotificationIsSent() {
        $user = new User;

        $mock = $this->getMockBuilder(Mailer::class)->getMock();

        $mock->expects($this->once())
             ->method('sendMessage')
             ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
             ->willReturn(true);

        $user->setMailer($mock);
        
        $user->email = "dave@example.com";
        $this->assertTrue($user->notify("Hello"));                     
    }

    public function testCannotNotifyUserWithNoEmail() {
        $user = new User;

        $mock = $this->getMockBuilder(Mailer::class)
                     ->setMethods(null)
                     ->getMock();

        $user->setMailer($mock);

        $this->setExpectedException(Exception::class);     
        $user->notify("Hello");
    }
}