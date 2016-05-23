<?php
require_once('ga.php');
class Human {
	var $strength;
	var $dexterity;
	var $resistance;
	var $intelligence;

	function Human($strength=0,$dexterity=0,$resistance=0,$intelligence=0) {
		$this->strength = $strength;
		$this->dexterity = $dexterity;
		$this->resistance = $resistance;
		$this->intelligence = $intelligence;
	}
}

function debug($x) {
	echo "<pre style='border: 1px solid black'>";
	print_r($x);
	echo '</pre>';
}

//This will be the mutation function. Just increments the property.
function inc($x) {
	return $x+1;
}
//This will be the crossover function. Is just the average of all properties.
function avg($a,$b) {
	return round(($a+$b)/2);
}
//This will be the fitness function. Is just the sum of all properties.
function total($obj) {
	return $obj->strength + $obj->dexterity + $obj->resistance + $obj->intelligence;
}

$adam = new Human(4,2,3,1);
$eve = new Human(1,4,2,3);
$ga = new GA();
$ga->population = array($adam,$eve);
debug($ga->population);
$ga->fitness_function = 'total';	//Uses the 'total' function as fitness function
$ga->num_couples = 1;				//4 couples per generation (when possible)
$ga->death_rate = 0;				//No kills per generation
$ga->generations = 100;				//Executes 100 generations
$ga->crossover_functions = 'avg';   //Uses the 'avg' function as crossover function
$ga->mutation_function = 'inc';		//Uses the 'inc' function as mutation function
$ga->mutation_rate = 10;			//10% mutation rate
$ga->evolve();						//Run
debug($ga->population);
debug(GA::select($ga->population,'total',1)); //The best
?>
