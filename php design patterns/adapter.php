<?php
/**
 * Adapter Pattern Example
 *
 * In this example:
 * - Target: Socket interface defines the contract expected by the client.
 * - Adaptee: AmericanPlug and EuropeanPlug represent existing classes with incompatible interfaces.
 * - Adapter: ElectricSocketAdapter adapts AmericanPlug and EuropeanPlug to work with the ElectricSocket.
 * - Client: Uses the Socket interface to connect plugs without needing to know the underlying adapters.
 */

// Target interface: Socket
interface Sockets {
    public function insertIntoSocket();
}

// Adaptee 1: AmericanPlug
class AmericanPlug {
    public function insertIntoAmericanSocket() {
        echo "Inserting into American socket.\n";
    }
}

// Adaptee 2: EuropeanPlug
class EuropeanPlug {
    public function insertIntoEuropeanSocket() {
        echo "Inserting into European socket.\n";
    }
}

// Adapter: ElectricSocketAdapter
class ElectricSocketAdapter implements Sockets {
    private $plug;

    public function __construct($plug) {
        $this->plug = $plug;
    }

    public function insertIntoSocket() {
        if ($this->plug instanceof AmericanPlug) {
            $this->plug->insertIntoAmericanSocket();
        } elseif ($this->plug instanceof EuropeanPlug) {
            $this->plug->insertIntoEuropeanSocket();
        } else {
            echo "Plug type not supported.\n";
        }
    }
}

// Client code
$americanPlug = new AmericanPlug();
$europeanPlug = new EuropeanPlug();

$socketAdapter1 = new ElectricSocketAdapter($americanPlug);
$socketAdapter1->insertIntoSocket(); // Inserting into American socket.

$socketAdapter2 = new ElectricSocketAdapter($europeanPlug);
$socketAdapter2->insertIntoSocket(); // Inserting into European socket.
