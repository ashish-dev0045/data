<?php
/**
 * Memento Pattern Example
 * 
 * Definition:
 * The Memento Pattern is a behavioral design pattern that allows an object (the originator) to capture
 * its internal state and save it externally in a Memento object. The originator can later restore its
 * state from the Memento object without violating encapsulation.
 * 
 * In this example:
 * - Originator (TextEditor): Represents the object whose state needs to be saved and restored.
 * - Memento (TextEditorMemento): Holds the state of the Originator.
 * - Caretaker (TextEditorCareTaker): Manages and saves the Memento objects.
 * 
 * The client code demonstrates how the Memento Pattern allows the state of an object (TextEditor) to be
 * saved (createMemento) and restored (restoreMemento) using a Memento object, preserving encapsulation.
 */

<?php

// Memento class to store the state
class Memento {
    private $state;

    public function __construct($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }
}

// Originator class with state management
class Originator {
    private $state;

    public function __construct($state) {
        $this->state = $state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }

    public function createMemento() {
        return new Memento($this->state);
    }

    public function restoreFromMemento(Memento $memento) {
        $this->state = $memento->getState();
    }
}

// Caretaker class to manage mementos
class Caretaker {
    private $mementos = [];

    public function saveMemento(Memento $memento) {
        $this->mementos[] = $memento;
    }

    public function getMemento($index) {
        return $this->mementos[$index] ?? null;
    }
}

// Example usage
$originator = new Originator('State1');
echo "Initial State: " . $originator->getState() . "\n";

$caretaker = new Caretaker();
$caretaker->saveMemento($originator->createMemento());

$originator->setState('State2');
echo "State after change: " . $originator->getState() . "\n";

$originator->restoreFromMemento($caretaker->getMemento(0));
echo "Restored State: " . $originator->getState() . "\n";

?>
