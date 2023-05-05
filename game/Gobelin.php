<?php

require_once('./classes/Ennemi.php');

class Gobelin extends Ennemi
{
    public function __construct()
    {
        $this->pol = 3;
        $this->name = "Gobelin";
        $this->power = 10;
        $this->constitution = 8;
        $this->speed = 7;
        $this->xp = 4;
        $this->gold = 10;
    }

    public function runaway()
    {
        //on met une valeur au hasard dans la variable
        $chanceToRunaway = random_int(1,4);

        if($chanceToRunaway == 2){
            return 1;
            //le gobelin fui
        }
        else{
            //le gobelin meurt
            return 0;
        }
    }
}