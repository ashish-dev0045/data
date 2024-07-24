<?php
/**
 * Factory Method Pattern Example
 *
 * This example demonstrates a simplified implementation of the Factory Method pattern
 * where different types of vehicles are created using a factory method.
 */

// Product interface: Vehicle
interface Vehicle {
    public function drive();
}

// Concrete Products: Car and Motorcycle
class Car implements Vehicle {
    public function drive() {
        echo "Driving a Car\n";
    }
}

class Motorcycle implements Vehicle {
    public function drive() {
        echo "Riding a Motorcycle\n";
    }
}

// Creator: VehicleFactory (abstract)
abstract class VehicleFactory {
    abstract public function createVehicle(): Vehicle;

    public function deliver() {
        $vehicle = $this->createVehicle();
        $vehicle->drive();
    }
}

// Concrete Creators: CarFactory and MotorcycleFactory
class CarFactory extends VehicleFactory {
    public function createVehicle(): Vehicle {
        return new Car();
    }
}

class MotorcycleFactory extends VehicleFactory {
    public function createVehicle(): Vehicle {
        return new Motorcycle();
    }
}

// Client code
$carFactory = new CarFactory();
$carFactory->deliver(); // Output: Driving a Car

$motorcycleFactory = new MotorcycleFactory();
$motorcycleFactory->deliver(); // Output: Riding a Motorcycle
