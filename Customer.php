<?php

class Customer {
    public readonly string $name;
    public readonly string $type; // "Regular", "Premium", "VIP"
    public readonly float $discount;

    public function __construct(string $name, string $type) {
        $this->name = $name;
        $this->type = $type;
        $this->setDiscount($type);
    }

    public function setDiscount($type) {
        switch($type){
            case "Regular":
                $this->discount = 0.05;
                break;
            case "Premium":
                $this->discount = 0.1;
                break;
            case "VIP":
                $this->discount = 0.2;
                break;
            default:
                $this->discount = 0;
        }
    }
}

?>

