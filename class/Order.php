<?php

class Order {

    public $amount = 0;
    public $quantity;
    public $unit_price;
    protected $gateway;

    // public function __construct(PaymentGateway $gateway) {
    //     $this->gateway = $gateway;
    // }

    public function __construct($quantity, $unit_price) {
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;

        $this->amount = $quantity * $unit_price;
    }

    public function process(PaymentGateway $gateway) {
        return $gateway->charge($this->amount);
    }
}
