<?php
namespace lsg\weapons;

class Claw extends Weapon{

    private static string $NAME = "Bloody claw";

    /**
     * Claw constructor.
     */
    public function __construct()
    {
        $obj= new Weapon(self::$NAME,50,150,5,100);
    }



}
