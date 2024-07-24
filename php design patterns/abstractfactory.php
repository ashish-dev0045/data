<?php

// Abstract Product: Car interface
interface Car {
    public function getMake();
}

// Concrete Products: Different types of cars
class EconomyCar implements Car {
    public function getMake() {
        return "Economy Car";
    }
}

class LuxuryCar implements Car {
    public function getMake() {
        return "Luxury Car";
    }
}

// Abstract Factory: CarFactory interface
interface CarFactory {
    public function createCar();
}

// Concrete Factories: Different factories producing different types of cars
class EconomyCarFactory implements CarFactory {
    public function createCar() {
        return new EconomyCar();
    }
}

class LuxuryCarFactory implements CarFactory {
    public function createCar() {
        return new LuxuryCar();
    }
}

// Client code: Uses the abstract factory to create cars
class CarShop {
    private $carFactory;

    public function __construct($carFactory) {
        $this->carFactory = $carFactory;
    }

    public function orderCar() {
        $car = $this->carFactory->createCar();
        echo "Here's your {$car->getMake()}!<br>";
    }
}

// Usage example
// Create an economy car shop
$economyCarFactory = new EconomyCarFactory();
$economyCarShop = new CarShop($economyCarFactory);
$economyCarShop->orderCar(); // Outputs: Here's your Economy Car!

// Create a luxury car shop
$luxuryCarFactory = new LuxuryCarFactory();
$luxuryCarShop = new CarShop($luxuryCarFactory);
$luxuryCarShop->orderCar(); // Outputs: Here's your Luxury Car!
