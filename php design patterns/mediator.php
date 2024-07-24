<?php
/**
 * Mediator Pattern Example
 * 
 * Definition:
 * The Mediator Pattern is a behavioral design pattern that defines an object (the Mediator) that
 * encapsulates how a set of objects (Colleagues) interact. It promotes loose coupling by keeping
 * objects from referring to each other explicitly and allows for more structured communication.
 * 
 * In this example:
 * - Mediator (ChatRoom): Defines an interface for communicating with Colleague objects.
 * - ConcreteMediator (ChatRoomImpl): Implements the Mediator interface and manages the communication
 *   between Colleague objects.
 * - Colleague (User): Defines an interface for interacting with the Mediator (ChatRoom).
 * - ConcreteColleague (UserImpl): Implements the Colleague interface and communicates with other
 *   Colleague objects through the Mediator.
 * 
 * The client code demonstrates how the Mediator Pattern allows objects (users) to communicate
 * through a mediator (chat room) without directly referencing each other, thus promoting loose coupling.
 */

// Mediator interface
interface Mediator {
    public function sendMessage($message, $colleague);
}

// Concrete Mediator: ChatRoom
class ChatRoom implements Mediator {
    public function sendMessage($message, $colleague) {
        echo "[" . date('Y-m-d H:i:s') . "] " . $colleague->getName() . " says: " . $message . "<br>";
    }
}

// Colleague interface
interface Colleague {
    public function setName($name);
    public function getName();
    public function send($message);
}

// Concrete Colleague: User
class User implements Colleague {
    private $name;
    private $mediator;

    public function __construct($mediator) {
        $this->mediator = $mediator;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function send($message) {
        $this->mediator->sendMessage($message, $this);
    }
}

// Client code
// Create a mediator (ChatRoom)
$chatRoom = new ChatRoom();

// Create users (Colleagues)
$user1 = new User($chatRoom);
$user1->setName("User1");

$user2 = new User($chatRoom);
$user2->setName("User2");

// Users send messages through the mediator (ChatRoom)
$user1->send("Hello, User2!");
$user2->send("Hi, User1! How are you?");

