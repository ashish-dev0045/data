<?php
/**
 * Visitor Pattern Example
 *
 * The Visitor pattern allows adding new operations to existing classes without modifying them.
 * In this example:
 * - Visitor: ShippingCostVisitor defines methods for calculating shipping costs for different components.
 * - Concrete Visitors: Each concrete visitor (MonitorVisitor, KeyboardVisitor) implements the logic to calculate
 *   shipping costs for specific components.
 * - Element: ComputerComponent declares an accept() method that takes a visitor and calls the visitor's visit()
 *   method, passing itself as an argument.
 * - Concrete Elements: Monitor, Keyboard, Mouse are concrete elements that implement the ComputerComponent interface.
 * - Client: Uses visitors to perform operations on elements, in this case, calculating shipping costs for computer components.
 */

// Visitor interface
interface Visitor {
    public function visitMonitor(Monitor $monitor);
    public function visitKeyboard(Keyboard $keyboard);
    // Other visit methods for different types of components can be added here
}

// Concrete Visitor 1: ShippingCostVisitor
class ShippingCostVisitor implements Visitor {
    private $totalCost = 0;

    public function visitMonitor(Monitor $monitor) {
        $this->totalCost += 10; // Example shipping cost calculation for a monitor
    }

    public function visitKeyboard(Keyboard $keyboard) {
        $this->totalCost += 5; // Example shipping cost calculation for a keyboard
    }

    public function getTotalCost() {
        return $this->totalCost;
    }
}

// Element interface
interface ComputerComponent {
    public function accept(Visitor $visitor);
}

// Concrete Element 1: Monitor
class Monitor implements ComputerComponent {
    public function accept(Visitor $visitor) {
        $visitor->visitMonitor($this);
    }
}

// Concrete Element 2: Keyboard
class Keyboard implements ComputerComponent {
    public function accept(Visitor $visitor) {
        $visitor->visitKeyboard($this);
    }
}

// Client code
$components = [
    new Monitor(),
    new Keyboard(),
    // Add more components as needed
];

$visitor = new ShippingCostVisitor();

foreach ($components as $component) {
    $component->accept($visitor);
}

echo "Total shipping cost: $" . $visitor->getTotalCost() . "\n";
