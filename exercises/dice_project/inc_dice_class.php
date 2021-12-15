<?php
class DiceCore {

	// To save the outcome of each dice roll
	private $rolls = array();

	private $faces;

	public function __construct ($aFaces=6){
		$this->faces = $aFaces;
	}
	// Roll the dice
	public function rollDice($aTimes){
		
		for($i = 0; $i < $aTimes; $i++) {
			$this->rolls[$i] = rand(1, $this->faces);
		}
	}

	public function getRolls(){
		return $this->rolls;
	}

	public function getFaces(){
		return $this->faces;
	}

	public function printDice() {
		// Print out the results
		echo implode(", ", $this->rolls);
	}
}