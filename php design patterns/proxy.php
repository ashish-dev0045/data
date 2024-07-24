<?php
/**
 * Proxy Pattern Example
 *
 * The Proxy pattern provides a surrogate or placeholder for another object to control access to it.
 * In this example:
 * - Subject: Door represents the interface of the real object and proxy.
 * - Real Subject: LabDoor represents the real object that the proxy controls access to.
 * - Proxy: Security implements the same interface as the Real Subject and controls access to it.
 * - Client: Uses the proxy to access the real object indirectly.
 */

// Subject interface: Door
interface Door {
    public function open();
    public function close();
}

// Real Subject: LabDoor
class LabDoor implements Door {
    public function open() {
        echo "Opening lab door\n";
    }

    public function close() {
        echo "Closing lab door\n";
    }
}

// Proxy: Security
class Security implements Door {
    private $door;

    public function __construct(Door $door) {
        $this->door = $door;
    }
    
    private function authenticate() {
        // Simulated authentication logic
        $authorized = rand(0, 1); // Randomly authorize or deny access
        return $authorized == 1;
    }

    public function open() {
        if ($this->authenticate()) {
            $this->door->open();
        } else {
            echo "Access denied. Cannot open the lab door.\n";
        }
    }

    public function close() {
        $this->door->close();
    }

}

// Client code
$labDoor = new LabDoor();
$secureDoor = new Security($labDoor);

// Authorized access
$secureDoor->open(); // Output: Opening lab door

// Unauthorized access
$secureDoor->open(); // Output: Access denied. Cannot open the lab door.
