<?php
/**
 * Flyweight Pattern Example
 *
 * The Flyweight pattern allows sharing of objects to support large numbers of fine-grained objects efficiently.
 * In this example:
 * - Flyweight: Character represents a shared object (character formatting).
 * - Concrete Flyweight: CharacterFlyweight implements the Character interface.
 * - Flyweight Factory: CharacterFactory manages and creates flyweight objects.
 * - Client: Uses the flyweight objects to display formatted text.
 */

// Flyweight interface: Character
interface Character {
    public function render($font); // Extrinsic state
}

// Concrete Flyweight: CharacterFlyweight
class CharacterFlyweight implements Character {
    private $char; // Intrinsic state (shared)
    
    public function __construct($char) {
        $this->char = $char;
    }

    public function render($font) {
        echo "Character '{$this->char}' with font '{$font}'\n";
    }
}

// Flyweight Factory: CharacterFactory
class CharacterFactory {
    private $characters = [];

    public function getCharacter($char) {
        if (!isset($this->characters[$char])) {
            $this->characters[$char] = new CharacterFlyweight($char);
        }
        return $this->characters[$char];
    }
}

// Client code
$factory = new CharacterFactory();

$text = "Hello world!";
$chars = str_split($text);

foreach ($chars as $char) {
    $flyweight = $factory->getCharacter($char);
    // Simulating different fonts (extrinsic state)
    $font = rand(1, 3); // Random font number
    $flyweight->render("Font{$font}");
}
