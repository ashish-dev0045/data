<?php
/**
 * Bridge Pattern Example
 *
 * The Bridge pattern decouples an abstraction from its implementation so that both can vary independently.
 * In this example:
 * - Abstraction: Device defines the abstraction's interface for controlling devices.
 * - Refined Abstraction: Tv and Radio extend the Device interface with specific devices.
 * - Implementor: RemoteControl defines the interface for different types of remote controls.
 * - Concrete Implementors: BasicRemote and AdvancedRemote provide specific implementations of remote controls.
 */

// Implementor interface: RemoteControl
interface RemoteControl {
    public function powerOn();
    public function powerOff();
}

// Concrete Implementor 1: BasicRemote
class BasicRemote implements RemoteControl {
    public function powerOn() {
        echo "Basic Remote: Power ON\n";
    }

    public function powerOff() {
        echo "Basic Remote: Power OFF\n";
    }
}

// Concrete Implementor 2: AdvancedRemote
class AdvancedRemote implements RemoteControl {
    public function powerOn() {
        echo "Advanced Remote: Power ON\n";
        echo "Advanced Remote: Initiating advanced functions\n";
    }

    public function powerOff() {
        echo "Advanced Remote: Power OFF\n";
        echo "Advanced Remote: Cleaning up advanced functions\n";
    }
}

// Abstraction: Device
abstract class Device {
    protected $remoteControl;

    public function __construct(RemoteControl $remoteControl) {
        $this->remoteControl = $remoteControl;
    }

    abstract public function turnOn();
    abstract public function turnOff();
}

// Refined Abstraction 1: Tv
class Tv extends Device {
    public function turnOn() {
        $this->remoteControl->powerOn();
        echo "TV: Turning ON\n";
    }

    public function turnOff() {
        echo "TV: Turning OFF\n";
        $this->remoteControl->powerOff();
    }
}

// Refined Abstraction 2: Radio
class Radio extends Device {
    public function turnOn() {
        $this->remoteControl->powerOn();
        echo "Radio: Turning ON\n";
    }

    public function turnOff() {
        echo "Radio: Turning OFF\n";
        $this->remoteControl->powerOff();
    }
}

// Client code
$basicRemote = new BasicRemote();
$advancedRemote = new AdvancedRemote();

$tv = new Tv($basicRemote);
$tv->turnOn();
$tv->turnOff();

echo "\n";

$radio = new Radio($advancedRemote);
$radio->turnOn();
$radio->turnOff();
