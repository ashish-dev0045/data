<?php
/**
 * Decorator Pattern Example
 *
 * The Decorator pattern allows behavior to be added to objects dynamically at runtime.
 * In this example:
 * - Component: Coffee defines the interface for coffee objects.
 * - Concrete Component: SimpleCoffee represents a basic coffee without any additional ingredients.
 * - Decorator: CoffeeDecorator is the abstract decorator class that implements the Coffee interface.
 * - Concrete Decorators: Milk and Whip add extra ingredients to the coffee dynamically.
 * - Client: Orders and decorates coffees using decorators.
 */

// Component interface: Coffee
interface Coffee {
    public function cost();
    public function description();
}

// Concrete Component: SimpleCoffee
class SimpleCoffee implements Coffee {
    public function cost() {
        return 5; // $5 for simple coffee
    }

    public function description() {
        return "Simple Coffee";
    }
}

// Decorator: CoffeeDecorator
abstract class CoffeeDecorator implements Coffee {
    protected $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function cost() {
        return $this->coffee->cost();
    }

    public function description() {
        return $this->coffee->description();
    }
}

// Concrete Decorator: Milk
class Milk extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 2; // $2 for milk
    }

    public function description() {
        return $this->coffee->description() . ", Milk";
    }
}

// Concrete Decorator: Whip
class Whip extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 3; // $3 for whip
    }

    public function description() {
        return $this->coffee->description() . ", Whip";
    }
}

// Client code
$simpleCoffee = new SimpleCoffee();
echo "Cost: $" . $simpleCoffee->cost() . "\n"; // Output: Cost: $5
echo "Description: " . $simpleCoffee->description() . "\n"; // Output: Description: Simple Coffee

$milkCoffee = new Milk($simpleCoffee);
echo "Cost: $" . $milkCoffee->cost() . "\n"; // Output: Cost: $7
echo "Description: " . $milkCoffee->description() . "\n"; // Output: Description: Simple Coffee, Milk

$whipCoffee = new Whip($simpleCoffee);
echo "Cost: $" . $whipCoffee->cost() . "\n"; // Output: Cost: $8
echo "Description: " . $whipCoffee->description() . "\n"; // Output: Description: Simple Coffee, Whip

$milkAndWhipCoffee = new Milk(new Whip($simpleCoffee));
echo "Cost: $" . $milkAndWhipCoffee->cost() . "\n"; // Output: Cost: $10
echo "Description: " . $milkAndWhipCoffee->description() . "\n"; // Output: Description: Simple Coffee, Whip, Milk
