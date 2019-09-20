<?php

class User {

    public $first_name;
    public $surname;
    public $email;
    protected $mailer;
    protected $mailer_callable;

    public function __construct($email) {
        $this->email = $email;
    }

    public function getFullName() {
        return trim("$this->first_name $this->surname");
    }

    public function setMailer($mailer) {
        $this->mailer = $mailer;        
    }

    public function notify($message) {
        //return call_user_func($this->mailer_callable, $this->email, $message);
        return Mailer::send($this->email, $message);     
    }

    public function setMailerCallable($mailer_callable) {
        $this->mailer_callable = $mailer_callable;
    }     
}