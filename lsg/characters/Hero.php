<?php
namespace lsg\characters;

class Hero extends Character{
    private static string $DEFAULT_NAME = "Gregooninator"; //nom par défaut
    private static int $DEFAULT_MAX_LIFE = 100 ; //Nombre de points de vie par défaut
    private static int $DEFAULT_MAX_STAMINA = 50 ; //Nombre de points d'action par défaut

    /**
     * Hero constructor.
     */
    public function __construct(string $name)
    {
        $name=self::$DEFAULT_NAME;
        parent::__construct($name); //appel à une méthode de la superclasse
        parent::setMaxLife(self::$DEFAULT_MAX_LIFE);
        parent::setLife(self::$DEFAULT_MAX_LIFE);
        parent::setMaxStamina(self::$DEFAULT_MAX_STAMINA);
        parent::setStamina(self::$DEFAULT_MAX_STAMINA);
    }


}

?>