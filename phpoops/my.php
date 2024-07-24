<?php
class class1 {
     
    function __construct($num) {
        echo "This is constructor";
        echo "</br>";

        $this->x = $num;
    }

    public $x = 1; 
    function fun1() {
        echo "Hello fun1\n";
        echo $this->x;
    }

    function fun2() {
        echo "Hello fun2";
    }
}

$obj = new class1(2298);
$obj->fun1();
?>
