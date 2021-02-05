<?php
namespace lsg\characters ;

use lsg\helper\Dice ;
use lsg\weapons\Weapon;

 class Character
 {
     private static string $MSG_ALIVE = "(ALIVE)";
     private static string $MSG_DEAD = "(DEAD)";

     private string $name; //nom du personnage

     private int $maxLife, $life; //Nombre de points de vie restants
     private int $maxStamina, $stamina;  //Nombre de points d'action restants


     /**
      * Character constructor.
      * @param String $name
      */
     public function __construct(string $name)
     {
         $this->name = $name;
         $this->dice101 = new Dice(101);
     }

     /**
      * @return int
      */
     public function getMaxStamina(): int
     {
         return $this->maxStamina;
     }

     /**
      * @param int $maxStamina
      */
     public function setMaxStamina(int $maxStamina): void
     {
         $this->maxStamina = $maxStamina;
     }


     private Weapon $weapon;

     /**
      * @return String
      */
     public function getName(): string
     {
         return $this->name;
     }

     /**
      * @param String $name
      */
     public function setName(string $name): void
     {
         $this->name = $name;
     }

     /**
      * @return int
      */
     public function getMaxLife(): int
     {
         return $this->maxLife;
     }

     /**
      * @param int $maxLife
      */
     public function setMaxLife(int $maxLife): void
     {
         $this->maxLife = $maxLife;
     }

     /**
      * @return int
      */
     public function getLife(): int
     {
         return $this->life;
     }

     /**
      * @param int $life
      */
     public function setLife(int $life): void
     {
         $this->life = $life;
     }

     /**
      * @return int
      */
     public function getStamina(): int
     {
         return $this->stamina;
     }

     /**
      * @param int $stamina
      */
     public function setStamina(int $stamina): void
     {
         $this->stamina = $stamina;
     }

     private Dice $dice101;

     /**
      * fonction returne l'etat dead ou Alive
      * @return bool
      */

     public function isAlive(): bool
     {
         return $this->life > 0;
     }

     public function printStats(): void
     {
         echo($this);
     }

     /***
      * la fonction toString()
      *
      */
     public function __toString():string
     {
         $classe = new \ReflectionClass(get_called_class());
         $life = sprintf("%5d", $this->getLife());
         $stam = sprintf("%5d",$this->getStamina());

         $msg = sprintf("%-20s %20s LIFE:%-10s  STAMINA:%-10s"," [ " . $classe .  "]", $this->getName(), $life, $stam);

         $status = ($this->isAlive()) ? self::$MSG_ALIVE : self::$MSG_DEAD;

         /*  if($this->isAlive()){
             $status = '<span class="alive">'
             . sprintf("%7s", self::$MSG_ALIVE)
            . '</span>  ';
         }else{
             $status = '<span class="dead">'
                        . sprintf("%7",self::$MSG_DEAD)
                .'</span>';
         }*/
         return $msg .$status;
     }






     public function attack(): int
     {
          return $this->attack($this->getWeapon());
     }
     /**
      * Calcule une attaque en fonction d'une arme.
      * Le calcul dépend des statistiques de l'arme et de la stamina (restante) du personnage
      *
      * @param Weapon $weapon l'arme utilisée.
      * @return int la valeur de l'attaque; 0 si l'arme est cassée.
      */
 private function attackWith(Weapon $weapon): int
 {
     $min = $weapon->getMinDamage();
     $max = $weapon->getMaxDamage();
     $cost = $weapon->getStamCost();

     $attack = 0;

     if(!$weapon.isBroken()){
         $attack= $min + round(($max-$min) * $this->dice101->roll() /100);
        $stam = $this->getStamina();

        if($cost <= $stam){
            $this->setStamina($this->getStamina()-$cost);
        }else{
            $attack = round(($attack * (floatval($stam) /$cost)));
            $this->setStamina(0);
        }

        $this->weapon->use();
     }
     return $attack;
 }

     /**
      * @return Weapon
      */
     public function getWeapon(): Weapon
     {
         return $this->weapon;
     }

     /**
      * @param Weapon $weapon
      */
     public function setWeapon(Weapon $weapon): void
     {
         $this->weapon = $weapon;
     }
     /**
      * Calcule le nombre de PV retires
      * @param value : le montant des degats reçus
      * @return le nombre de PV effectivement retires (value si assez de vie ; le reste de la vie sinon)
      */

     public function getHitWith($value): int
     {
          $life= $this->getLife();
          $dmg=($life > $value)? $value : $life; //if ternaire
         $this->setLife($life-$dmg);

         return $dmg;
     }


 }



