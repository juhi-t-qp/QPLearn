<?php class Order {
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
?>