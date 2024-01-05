<?php

// access modifier
// static, public, private, protected

class Car {

    public $a = 1;

    // function __construct($a)
    // {
    //     $this->a = $a;
    // }

    function index()
    {
        $b = 1;

        return "Hello World Pokhara";
    }

    function add($a, $b)
    {
        return $a + $b;
    }

}

$car = new Car();
echo $car->index();
echo "<br />";
echo $car->add(1, 2);

?>