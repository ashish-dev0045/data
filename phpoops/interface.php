<?php
interface class1 {
    public function test1();
}

interface class2 {
    public function test2();
}
class class3 implements class1, class2 {
    public function test1() {
        echo "Test1";
    }

    public function test2() {
        echo "Test2";
    }
}


$obj = new class3();
$obj->test1();
$obj->test2();
?>
