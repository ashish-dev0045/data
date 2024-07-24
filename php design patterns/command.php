<?php
/**
 * Command Pattern Example
 * 
 * Definition:
 * The Command Pattern is a behavioral design pattern that encapsulates a request as an object, 
 * thereby allowing for parameterization of clients with different requests, queueing of requests, 
 * and logging of requests. It decouples the sender and receiver of a request by wrapping the 
 * request in an object.
 * 
 * In this example:
 * - Command (Command interface): Declares the execute method that concrete commands will implement.
 * - Concrete Command (TurnOnCommand, TurnOffCommand): Implements specific commands (turn on and turn off).
 * - Receiver (Light): Performs the actual operations (turning on and off the light).
 * - Invoker (RemoteControl): Holds a command and executes it when requested (pressing a button).
 * 
 * The client code demonstrates how the Command Pattern allows decoupling between the sender 
 * (RemoteControl) and the receiver (Light) of a request by encapsulating requests (turn on and 
 * turn off) as command objects (TurnOnCommand and TurnOffCommand).
 */

// Command interface
interface Command {
    public function execute();
}

// Concrete Command: Turn on command
class TurnOnCommand implements Command {
    private $receiver;

    public function __construct($receiver) {
        $this->receiver = $receiver;
    }

    public function execute() {
        $this->receiver->turnOn();
    }
}

// Concrete Command: Turn off command
class TurnOffCommand implements Command {
    private $receiver;

    public function __construct($receiver) {
        $this->receiver = $receiver;
    }

    public function execute() {
        $this->receiver->turnOff();
    }
}

// Receiver: Light
class Light {
    public function turnOn() {
        echo "Light is turned on.<br>";
    }

    public function turnOff() {
        echo "Light is turned off.<br>";
    }
}

// Invoker: Remote control
class RemoteControl {
    private $command;

    public function setCommand(Command $command) {
        $this->command = $command;
    }

    public function pressButton() {
        echo "Pressing the button on the remote control...<br>";
        $this->command->execute();
    }
}

// Client code
// Create receiver
$light = new Light();

// Create commands
$turnOnCommand = new TurnOnCommand($light);
$turnOffCommand = new TurnOffCommand($light);

// Create invoker
$remoteControl = new RemoteControl();

// Set and execute commands
$remoteControl->setCommand($turnOnCommand);
$remoteControl->pressButton(); // Outputs: Light is turned on.

$remoteControl->setCommand($turnOffCommand);
$remoteControl->pressButton(); // Outputs: Light is turned off.
