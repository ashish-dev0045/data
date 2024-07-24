<?php
/**
 * Composite Pattern Example
 *
 * The Composite pattern allows you to compose objects into tree-like structures.
 * In this example:
 * - Component: FileSystemComponent defines the interface for both files and directories.
 * - Leaf: File represents leaf objects (files).
 * - Composite: Directory represents composite objects (directories containing files and subdirectories).
 * - Client: Manipulates objects in the composition through the FileSystemComponent interface.
 */

// Component interface: FileSystemComponent
interface FileSystemComponent {
    public function getName();
    public function getSize();
    public function ls();
}

// Leaf: File
class File implements FileSystemComponent {
    private $name;
    private $size;

    public function __construct($name, $size) {
        $this->name = $name;
        $this->size = $size;
    }

    public function getName() {
        return $this->name;
    }

    public function getSize() {
        return $this->size;
    }

    public function ls() {
        echo "{$this->getName()} ({$this->getSize()} bytes)\n";
    }
}

// Composite: Directory
class Directory implements FileSystemComponent {
    private $name;
    private $components = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getSize() {
        $totalSize = 0;
        foreach ($this->components as $component) {
            $totalSize += $component->getSize();
        }
        return $totalSize;
    }

    public function ls() {
        echo "Directory: {$this->getName()}\n";
        foreach ($this->components as $component) {
            $component->ls();
        }
    }

    public function add($component) {
        $this->components[] = $component;
    }
}

// Client code
$file1 = new File("file1.txt", 1024);
$file2 = new File("file2.jpg", 2048);

$dir1 = new Directory("Folder 1");
$dir1->add($file1);

$dir2 = new Directory("Folder 2");
$dir2->add($file2);

$rootDir = new Directory("Root");
$rootDir->add($dir1);
$rootDir->add($dir2);

// Displaying the directory structure
$rootDir->ls();

// Output total size of the root directory
echo "Total Size: {$rootDir->getSize()} bytes\n";
