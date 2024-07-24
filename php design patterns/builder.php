<?php

// Product class (the complex object we want to build)
class Pizza {
    private $dough;
    private $sauce;
    private $toppings = [];

    public function setDough($dough) {
        $this->dough = $dough;
    }

    public function setSauce($sauce) {
        $this->sauce = $sauce;
    }

    public function addTopping($topping) {
        $this->toppings[] = $topping;
    }

    public function getDetails() {
        $toppingsList = implode(', ', $this->toppings);
        return "Pizza with {$this->dough} dough, {$this->sauce} sauce, and toppings: {$toppingsList}.";
    }
}

// Builder interface
interface PizzaBuilder {
    public function buildDough();
    public function buildSauce();
    public function buildToppings();
    public function getPizza();
}

// Concrete builder for a specific type of pizza
class HawaiianPizzaBuilder implements PizzaBuilder {
    private $pizza;

    public function __construct() {
        $this->pizza = new Pizza();
    }

    public function buildDough() {
        $this->pizza->setDough('pan');
    }

    public function buildSauce() {
        $this->pizza->setSauce('tomato');
    }

    public function buildToppings() {
        $this->pizza->addTopping('ham');
        $this->pizza->addTopping('pineapple');
    }

    public function getPizza() {
        return $this->pizza;
    }
}

// Director class (optional, used to construct objects using a builder)
class PizzaDirector {
    public function buildPizza(PizzaBuilder $builder) {
        $builder->buildDough();
        $builder->buildSauce();
        $builder->buildToppings();
        return $builder->getPizza();
    }
}

// Usage example
// Create a director
$director = new PizzaDirector();

// Create a specific builder
$builder = new HawaiianPizzaBuilder();

// Build a pizza using the director and the builder
$pizza = $director->buildPizza($builder);

// Get details of the built pizza
echo $pizza->getDetails(); // Outputs: Pizza with pan dough, tomato sauce, and toppings: ham, pineapple.
