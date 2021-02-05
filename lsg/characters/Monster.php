<?php
namespace lsg\characters;

class Monster extends Character {

    private static string $DEFAULT_NAME = "Monster"; //Nom par défaut

    private static int $INSTANCES_COUNT = 0;

    private static int $DEFAULT_MAX_LIFE = 10; //Nombre de points de vie défaut
    private static int $DEFAULT_MAX_STAMINA = 10; // Nombre de points d'action

    /**
     * Monster constructor.
     */
    public function __construct(string $name)
    {
        $name = self::$DEFAULT_NAME;
        if($name == self::$DEFAULT_NAME){
            self::$INSTANCES_COUNT++;
        }
        parent::__construct($name);
        parent::setMaxLife(self::$DEFAULT_MAX_LIFE);
        parent::setLife(self::$DEFAULT_MAX_LIFE);
        parent::setMaxStamina(self::$DEFAULT_MAX_STAMINA);
        parent::setStamina(self::$DEFAULT_MAX_STAMINA);

    }


}

?>
