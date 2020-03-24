<?php
class apitest{
    function __construct() {
        $self::mymethod();
    }

    public function mymethod(){

    	echo"test";
        //do your thing
    }
}

$class_object = new apitest();
?>