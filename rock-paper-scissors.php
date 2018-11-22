<?php

// Create class Game
class Game {
	
	// Number of rounds
    private $playRounds = 3;
	
	/**
		"object" => "thing that object can beat"
		You can add more with the same pattern
	*/
    private $handOptions = array(
        "rock" => "scissors",
        "paper" => "rock",
        "scissors" => "paper"
    );
	
    public function __construct() {
        print "<strong>--- GAME STARTED ---</strong><br /><br />";
    }
	
	// Draw rand hand
    private function randHand() {
        $randHand = rand(0, count($this->handOptions) - 1);
        $keys = array_keys($this->handOptions);
        return $keys[$randHand];
    }
	
	// Create Play function
    private function Play() {
        $firstPlayerHand = $this->randHand();
        $secondPlayerHand = $this->randHand();
        $winner = "Second player";
		
		// Print players hands - using ucfirst() for better look :)
        print "First player hand: " . "<strong>" . ucfirst($firstPlayerHand) . "</strong><br />";
        print "Second player hand: " . "<strong>" . ucfirst($secondPlayerHand) . "</strong><br />";
		
        if ($firstPlayerHand === $secondPlayerHand) {
            print "<br /><i><span style='color:red;'>Draw.</span> Round started again.</i><br /><br />";
            return $this->Play();
        } else {
            $tempBeats = $this->handOptions[$firstPlayerHand];
            if ($tempBeats === $secondPlayerHand) {
                $winner = "First player";
            }
        }
		
        print "<br /><strong>ROUND WINNER: <i>" . $winner . "</i></strong><br /><br />";
		
        return $winner;
    }
	
	// Create Winner function
    public function Winner() {
        $playersScores = array(
			"First player" => 0, 
			"Second player" => 0
		);
		
        $finalWinner = "";
        $tempScore = 0;
        for ($i = 1; $i <= $this->playRounds; $i++) {
            print "--- ROUND " . $i . " ---<br />";
            $winnerRound = $this->Play();
            $playersScores[$winnerRound]++;
            print "-----------------------------<br />";
        }
		
        print "--- RESULTS ---<br />";
		
        foreach ($playersScores as $key => $value) {
            print $key . " - " . $value . "<br />";
            if ($tempScore < $value) {
                $tempScore = $value;
                $finalWinner = $key;
            }
        }
		
        print "<br />The winner is: <span style='color: green; font-weight: bold;'><i>" . $finalWinner . "</i></span>";
		print "<br />-----------------------------";
    }
	
}

$testGame = new Game;
$testGame->Winner();