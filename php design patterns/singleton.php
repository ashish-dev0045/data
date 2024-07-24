<?php

class Singleton {
    // Hold the class instance.
    private static $instance = null;

    // The constructor is private to prevent initiation with outer code.
    private function __construct() {
        // The expensive process (e.g., database connection) goes here.
        echo "Singleton instance created.<br>";
    }

    // The getInstance method controls the access to the singleton instance.
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Example method of the singleton instance.
    public function doSomething() {
        echo "Doing something.<br>";
    }
}

// Example usage:
// Getting an instance of the Singleton class.
$instance1 = Singleton::getInstance();
// Calling a method of the Singleton instance.
$instance1->doSomething();

// Trying to create another instance, which will return the existing one.
$instance2 = Singleton::getInstance();

