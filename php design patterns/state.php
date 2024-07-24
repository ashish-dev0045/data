<?php
/**
 * State Pattern Example
 *
 * The State pattern allows an object to alter its behavior when its internal state changes.
 * This pattern is useful when an object's behavior depends on its state and needs to change
 * dynamically based on internal conditions. In this example:
 * - Context: LightSwitch represents an object whose behavior (turning on or off) changes based on its state.
 * - State: State interface defines methods for different states (OnState and OffState).
 * - Concrete States: OnState and OffState implement State interface and provide behavior specific to each state.
 */

// State interface
interface State {
    public function turnOn();
    public function turnOff();
}

// Concrete state 1: On state
class OnState implements State {
    public function turnOn() {
        echo "The light is already on.\n";
    }
    
    public function turnOff() {
        echo "Turning light off.\n";
        // Transition to Off state
        return new OffState();
    }
}

// Concrete state 2: Off state
class OffState implements State {
    public function turnOn() {
        echo "Turning light on.\n";
        // Transition to On state
        return new OnState();
    }
    
    public function turnOff() {
        echo "The light is already off.\n";
    }
}

// Context: Light switch
class LightSwitch {
    private $state;
    
    public function __construct() {
        // Initial state
        $this->state = new OffState();
    }
    
    public function turnOn() {
        $this->state = $this->state->turnOn();
    }
    
    public function turnOff() {
        $this->state = $this->state->turnOff();
    }
}

// Usage example
$switch = new LightSwitch();

$switch->turnOn(); // Turning light on.
$switch->turnOff(); // Turning light off.
$switch->turnOff(); // The light is already off.
$switch->turnOn(); // Turning light on.
$switch->turnOn(); // The light is already on.
