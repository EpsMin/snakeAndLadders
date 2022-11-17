<?php


class SnakesLadders
{
    public $fistPlayerPosition;
    public $secodPlayerPosition;
    public $player = 1;
    public $gameOver = false;


    function __construct()

    {
        $this->fistPlayerPosition = 0;
        $this->secodPlayerPosition = 0;

    }

    //проверка позиции на наличие змейки или лестницы
    public function check($position) {
        $snakesAndLadders = [2 => 38, 7 => 14, 8 => 31, 15 => 26, 21 => 42, 28 => 84, 36 => 44, 51 => 67, 71 => 91, 78 => 98, 87 => 94, 99 => 80, 95 => 75, 92 => 88,
            89 => 68, 74 => 53, 62 => 19, 64 => 60, 49 => 11, 46 => 25 , 16 => 6];
        $position > 100 ? $position = 100 - ($position-100) : null; // проверка на выход за пределы поля
        array_key_exists($position,$snakesAndLadders) ?  $position = $snakesAndLadders[$position] : null; // проверка на змейку или летсницу

        return $position;

    }

    //ход одного из игроков
    public function turn($die1,$die2) {

        $this->player == 1 ?   $this->fistPlayerPosition = $this->check($this->fistPlayerPosition += $die1 + $die2) :
            $this->secodPlayerPosition = $this->check($this->secodPlayerPosition += $die1 + $die2) ;
        if ($this->player == 1) {
            return[1, $this->fistPlayerPosition];
        } else {
            return[2, $this->secodPlayerPosition];
        }
    }


    public function play($die1, $die2)
    {
        if ($this->gameOver) { return "Game over!"; }

        $p = $this->turn($die1,$die2);
        $die1 == $die2 ? $this->player *= 1 : $this->player *= -1; //смена игрока
        if ($p[1] == 100) {
            $this->gameOver = true;
            return "Player $p[0] Wins!";
        } else {
            return "Player $p[0] is on square $p[1]";
        }


    }
}
 $game = new SnakesLadders();
$game->play(6,6);
$game->play(80,8);
$game->play(2,2);




//$game->play(6,3);
//$game->play(4,6);
//$game->play(2,3);
//$game->play(1,4);
//$game->play(6,4);
//$game->play(2,3);
//$game->play(5,6);
//$game->play(1,5);
//$game->play(3,1);
//$game->play(3,3);
//$game->play(5,2);
//$game->play(6,4);
//$game->play(1,6);
//$game->play(1,5);
//$game->play(2,5);
//$game->play(5,2);
//$game->play(1,3);
//$game->play(1,2);
//$game->play(5,1);
//$game->play(6,4);
//$game->play(4,1);
//$game->play(1,3);
//$game->play(6,1);
//$game->play(1,2);
//$game->play(2,4);
//$game->play(5,6);




//        if($this->player == 1) {
//            if ($die1 != $die2) {
//                $this->fistPlayerPosition += $die1 + $die2;
//                $this->fistPlayerPosition = $this->check($this->fistPlayerPosition);
//                $this->player += 1;
//                return "Player 1 is on square $this->fistPlayerPosition";
//            } else {
//                $this->fistPlayerPosition += $die1 + $die2;
//                $this->fistPlayerPosition = $this->check($this->fistPlayerPosition);
//                return "Player 1 is on square $this->fistPlayerPosition";
//            }
//        } else {
//            if ($die1 != $die2) {
//                $this->secodPlayerPosition += $die1 + $die2;
//                $this->secodPlayerPosition = $this->check($this->secodPlayerPosition);
//                $this->player -= 1;
//                return "Player 2 is on square $this->secodPlayerPosition";
//            } else {
//                $this->secodPlayerPosition += $die1 + $die2;
//                $this->secodPlayerPosition = $this->check($this->secodPlayerPosition);
//                return "Player 2 is on square $this->secodPlayerPosition";
//            }
//
//
//        }
//    }

