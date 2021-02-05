<?php
namespace lsg\weapons;

    class Weapon{

        protected string $name;

        private int $minDamage;
        private int $maxDamage;
        private int $stamCost;
        private int $durability;

        /**
         * Weapon constructor.
         * @param string $name
         * @param int $minDamage
         * @param int $maxDamage
         * @param int $stamCost
         * @param int $durability
         */
        public function __construct(string $name, int $minDamage, int $maxDamage, int $stamCost, int $durability)
        {
            $this->name = $name;
            $this->minDamage = $minDamage;
            $this->maxDamage = $maxDamage;
            $this->stamCost = $stamCost;
            $this->durability = $durability;
        }


        /**
         * durability -1
         */
        public function use(): void
        {
            $this->setDurability($this->durability-1);
        }

        public function isBroken():bool
        {
            return $this->durability <=0;
        }

        /**
         * @param int $durability
         */
        public function setDurability(int $durability): void
        {
            $this->durability = $durability;
        }


        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @return int
         */
        public function getMinDamage(): int
        {
            return $this->minDamage;
        }

        /**
         * @return int
         */
        public function getMaxDamage(): int
        {
            return $this->maxDamage;
        }

        /**
         * @return int
         */
        public function getStamCost(): int
        {
            return $this->stamCost;
        }

        /**
         * @return int
         */
        public function getDurability(): int
        {
            return $this->durability;
        }

//affichage
    public function __toString():string
    {

       return
           $this->getName() .
           " (min:" . $this->getMinDamage() .
           " max:" .$this->getMaxDamage() .
           " stam:" . $this->getStamCost() .
           " dur:" . $this->getDurability() . ")" ;
    }


}
