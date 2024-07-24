<?php

// Prototype interface
interface Prototype {
    public function clone();
}

// Concrete prototype class
class ConcretePrototype implements Prototype {
    private $property;

    public function __construct($property) {
        $this->property = $property;
    }

    // Implementing the clone method to create a new instance
    public function clone() {
        // Perform a shallow copy
        return clone $this;
    }

    public function getProperty() {
        return $this->property;
    }

    public function setProperty($property) {
        $this->property = $property;
    }
}

// Example usage
$prototype = new ConcretePrototype("Initial Property");

// Cloning the prototype
$clone1 = $prototype->clone();
$clone2 = $prototype->clone();

// Modifying the clones
$clone1->setProperty("Modified Property 1");
$clone2->setProperty("Modified Property 2");

// Output the properties
echo "Original Property: " . $prototype->getProperty() . "<br>"; // Outputs: Initial Property
echo "Clone 1 Property: " . $clone1->getProperty() . "<br>";     // Outputs: Modified Property 1
echo "Clone 2 Property: " . $clone2->getProperty() . "<br>";     // Outputs: Modified Property 2
