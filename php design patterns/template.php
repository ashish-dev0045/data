<?php
/**
 * Template Method Pattern Example
 * 
 * Definition:
 * The Template Method Pattern is a behavioral design pattern that defines the skeleton of an algorithm
 * in a method, deferring some steps to subclasses. It allows subclasses to redefine certain steps of
 * the algorithm without changing its structure.
 * 
 * In this example:
 * - AbstractClass (Game): Defines the template method (play()), which outlines the algorithm for playing
 *   a game. It also includes abstract methods (initialize(), startPlay(), endPlay()) that subclasses
 *   must implement.
 * - ConcreteClass (Cricket and Football): Implements the abstract methods defined in AbstractClass to
 *   provide specific implementations for playing Cricket and Football games.
 * 
 * The client code demonstrates how the Template Method Pattern allows the overall algorithm (playing a game)
 * to be defined in a base class (AbstractClass), with specific implementation details (initialize, startPlay,
 * endPlay) left to be defined by subclasses (ConcreteClass).
 */

// Abstract class: Game
abstract class Game {
    // Abstract methods: to be implemented by subclasses
    abstract protected function initialize();
    abstract protected function startPlay();
    abstract protected function endPlay();
    // Template method: defines the skeleton of the algorithm
    public final function play() {
        $this->initialize();
        $this->startPlay();
        $this->endPlay();
    }
}

// Concrete class: Cricket
class Cricket extends Game {
    protected function initialize(): void {
        echo "Cricket Game Initialized! Start playing.<br>";
    }

    protected function startPlay(): void {
        echo "Cricket Game Started. Enjoy the game!<br>";
    }

    protected function endPlay(): void {
        echo "Cricket Game Finished!<br>";
    }
}

// Concrete class: Football
class Football extends Game {
    protected function initialize(): void {
        echo "Football Game Initialized! Start playing.<br>";
    }

    protected function startPlay(): void {
        echo "Football Game Started. Enjoy the game!<br>";
    }

    protected function endPlay(): void {
        echo "Football Game Finished!<br>";
    }
}

// Client code
// Create instances of concrete classes and execute the template method
$cricket = new Cricket();
$cricket->play(); // Outputs the sequence of steps defined in the template method

echo "<br>";

$football = new Football();
$football->play(); // Outputs the sequence of steps defined in the template method
