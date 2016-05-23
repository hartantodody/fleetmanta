<?php
require_once('ga.php');
class Test {
	var $p1;
	var $p2;

	function Test($p1=0,$p2=0) {
		$this->p1 = $p1;
		$this->p2 = $p2;
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
//This will be the fitness function. Is just the sum of all properties.
function total($obj) {
	return $obj->p1 + $obj->p2;
}

$t1 = new Test(1,4);
$t2 = new Test(3,2);
$ga = new GA();
$ga->population = array($t1,$t2);
$ga->fitness_function = 'total';	//Uses the 'total' function as fitness function
$ga->num_couples = 1;				//1 couple per generation
$ga->death_rate = 0;				//1 death per generation
$ga->generations = 10;				//Executes 10 generations
$ga->crossover_functions = 'max';   //Uses the 'max' (built-in) function as crossover function
$ga->mutation_function = 'inc';		//Uses the 'inc' function as mutation function
$ga->mutation_rate = 1;				//1% mutation rate
$ga->evolve();						//Run
debug($ga->population);
?>
