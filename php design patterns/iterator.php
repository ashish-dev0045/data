<?php
/**
 * Iterator Pattern Example
 *
 * The Iterator pattern provides a way to access elements of an aggregate object sequentially
 * without exposing its underlying representation. In this example:
 * - Aggregate: BookCollection defines an interface for creating an Iterator object.
 * - Iterator: BookIterator defines methods for traversing elements in the collection.
 * - Concrete Aggregate: ArrayBookCollection implements the BookCollection interface to create
 *   a specific Iterator (BookIterator) for an array of books.
 * - Concrete Iterator: BookIterator implements the Iterator interface for traversing books.
 */

// Iterator interface
interface IteratorInterface {
    public function hasNext();
    public function next();
    public function current();
}

// Aggregate interface
interface BookCollection {
    public function createIterator(): IteratorInterface;
}

// Concrete Iterator: BookIterator
class BookIterator implements IteratorInterface {
    private $books;
    private $position;

    public function __construct(array $books) {
        $this->books = $books;
        $this->position = 0;
    }

    public function hasNext() {
        return isset($this->books[$this->position]);
    }

    public function next() {
        $book = $this->books[$this->position];
        $this->position++;
        return $book;
    }

    public function current() {
        return $this->books[$this->position];
    }
}

// Concrete Aggregate: ArrayBookCollection
class ArrayBookCollection implements BookCollection {
    private $books;

    public function __construct(array $books) {
        $this->books = $books;
    }

    public function createIterator() {
        return new BookIterator($this->books);
    }
}

// Usage example
$books = [
    "Design Patterns: Elements of Reusable Object-Oriented Software",
    "Clean Code: A Handbook of Agile Software Craftsmanship",
    "The Pragmatic Programmer: Your Journey to Mastery",
    "Refactoring: Improving the Design of Existing Code",
];

$collection = new ArrayBookCollection($books);
$iterator = $collection->createIterator();

echo "Iterating over books:\n";
while ($iterator->hasNext()) {
    echo $iterator->current() . "\n";
    $iterator->next();
}
