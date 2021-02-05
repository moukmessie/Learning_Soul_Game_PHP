<?php
namespace lsg\weapons;

class Sword extends Weapon{
    private static string $NAME= "Basic Sword";

    /**
     * Sword constructor.
     */
    public function __construct()
    {
        $obj= new Weapon(self::$NAME,5,10,20,100);
    }


}
