<?php
 namespace lsg;

 use lsg\characters\Hero;
 use lsg\characters\Monster;
 use lsg\weapons\Sword;
 use lsg\weapons\Claw;


class LearningSoulsGame{
    private Hero $hero;
    private Monster $monster;

    private function init():void{
        $this->hero = new Hero();
        $this->hero->setWeapon(new Sword());

        $this->monster = new Monster();
        $this->monster->setWeapon(new Claw());

    }
    public function play_v1(): void
    {
        $this->init();
        $this->fightv1();
    }

    private function refresh():void
    {
        $this->hero->printStats();
        $this->monster->printStats();
    }

    private function fightv1(): void
    {
        echo <<<EOT
            <h1 class="lsg-titre">
            {$this->hero->getName()} Vs {$this->monster->getName()}: Fight !
        </h1>
        EOT;
        $this->refresh();

        $agressor = $this->hero;
        $target = $this->monster;

        $action = null; //TODO sera effectivement utilise dans une autre version

        while ($this->hero->isAlive() && $this->monster->isAlive()){//boucle infinie si 0 stamina...

            $attack =$agressor->attack();
            $hit = $target->getHitWith();

            echo "<div class='lsg-attack'>"
                . sprintf("%s attacks %s with %s (ATTACK : %d | DMG : %d)",
                    $agressor->getName(),
                    $target->getName(),
                    $agressor->getWeapon()->getName(),
                    $attack,
                    $hit)
                ."</div>";


             $this->refresh();

             $tmp = $agressor;
             $agressor = $target;
             $target = $tmp;
            }

            $winner = ($this->hero->isAlive())? $this->hero : $this->monster;

        echo "<h1 class='lsg-win'>~~~~" . $winner->getName() . "WINS !!! ~~~~~</h1>";
    }

}

?>
