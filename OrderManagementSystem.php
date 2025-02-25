<?php 
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
?>