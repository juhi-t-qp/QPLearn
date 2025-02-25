<?php

class Customer {
    public $name;
    public $type; // "Regular", "Premium", "VIP"
    public $discount;

    public function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
        $this->setDiscount();
    }

    public function setDiscount() {
        if ($this->type === "Regular") {
            $this->discount = 0.05;
        } elseif ($this->type === "Premium") {
            $this->discount = 0.1;
        } elseif ($this->type === "VIP") {
            $this->discount = 0.2;
        } else {
            $this->discount = 0;
        }
    }
}

class Order {
    public $customer;
    public $items;
    public $prices;
    public $totalPrice;
    public $discountedPrice;

    public function __construct($customer) {
        $this->customer = $customer;
        $this->items = [];
        $this->prices = [];
        $this->totalPrice = 0;
        $this->discountedPrice = 0;
    }

    public function addItem($item, $price) {
        $this->items[] = $item;
        $this->prices[] = $price;
        $this->calculateTotal();
    }

    public function calculateTotal() {
        $this->totalPrice = array_sum($this->prices);
        $this->applyDiscount();
    }

    public function applyDiscount() {
        $this->discountedPrice = $this->totalPrice - ($this->totalPrice * $this->customer->discount);
    }

    public function printOrder() {
        echo "Customer: " . $this->customer->name . PHP_EOL;
        echo "Items: " . implode(", ", $this->items) . PHP_EOL;
        echo "Total Price: $" . $this->totalPrice . PHP_EOL;
        echo "Discounted Price: $" . $this->discountedPrice . PHP_EOL;
    }
}

class OrderManagementSystem {
    public static function main() {
        $customer = new Customer("John Doe", "VIP");
        $order = new Order($customer);

        $order->addItem("Laptop", 1000);
        $order->addItem("Mouse", 50);
        $order->addItem("Keyboard", 80);

        $order->printOrder();

        self::generateInvoice($order);
    }

    public static function generateInvoice($order) {
        echo "Generating Invoice..." . PHP_EOL;
        echo "Customer: " . $order->customer->name . PHP_EOL;
        echo "Total: $" . $order->totalPrice . PHP_EOL;
        echo "Discounted Total: $" . $order->discountedPrice . PHP_EOL;
        echo "Items: " . implode(", ", $order->items) . PHP_EOL;
        echo "Thank you for shopping with us!" . PHP_EOL;
    }
}
