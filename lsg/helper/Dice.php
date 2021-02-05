<?php
namespace lsg\helper;


/**
 * Classe représentant un dé.
 * Génère des nombres aléatoires compris entre 0 et le nombre de faces -1.
 *
 * @author Messie
 *
 */
class Dice {
    private int $faces; //Nombre de valeurs possibles

    /**
     * Dice constructor.
     * @param int $faces
     */
    public function __construct(int $faces)
    {
        $this->faces = $faces;

    }

    /**
     * @return int
     * @throws Exception
     */
    public function roll(): int
    {
        return random_int(1,$this->faces);
    }


}

function testDice()
{
    $dice = new Dice(50);
    $val = $dice->roll();
    $min = $val;
    $max = $val;
    for($i=0; $i<500; $i++){
        echo $val ." ";
        $val = $dice->roll();
        if ($val > $max) $max = $val;
        if ($val < $min) $min =$val;
    }
    echo "<hr>";
    echo "Min : $min <br> Max : $max";
}

