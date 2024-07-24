<?php
class class1 {
     
    function __construct() {
        echo "This is parent constructor\n";
        $this->x = 1;
    }

    function fun1() {
        echo "Hello fun1\n";
    }
}

class class2 extends class1 {
    function __construct() {
        // parent::__construct(); # used to striclty invoke the parent constructor with the child constructor also. Just like super key in pyhon.
        echo "This is child constructor\n";
    }
}

$obj = new class2();
$obj->fun1();
?>
