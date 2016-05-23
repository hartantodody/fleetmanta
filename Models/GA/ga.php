<?php
class GA {

	var $population;			//Objects array (same classes)
	var $fitness_function;		//The fitness function name (string)
	var $crossover_functions;	//The crossover function name (string) or array
	var $mutation_function;		//The mutation function name (string)
	var $mutation_rate;			//Mutation rate per child (%)
	var $generations;			//Number of generations
	var $num_couples;			//Number of couples for each generation
	var $death_rate;			//Number of killed objects for each generation

	function crossover($parent1,$parent2,$cross_functions) {
		$class = get_class($parent1);
		if ($class != get_class($parent2)) return false;
		if (!is_array($cross_functions)) {
			$cross_function = $cross_functions;
			$cross_functions = array();
		}
		$child = new $class();
		$properties = get_object_vars($parent1);
		foreach ($properties as $propertie => $value) {
			if ($cross_function) $cross_functions[$propertie] = $cross_function;
			if (function_exists($cross_functions[$propertie]))
				$child->$propertie = $cross_functions[$propertie]($parent1->$propertie,$parent2->$propertie);
		}
		return $child;
	}

	function mutate(&$object,$mutation_function) {
		$properties = get_object_vars($object);
		foreach ($properties as $propertie => $value) {
				$object->$propertie = $mutation_function($object->$propertie);
		}
	}

	function fitness($object,$fitness_function) {
		return $fitness_function($object);
	}

	//PRIVATE
	function best($a, $b) {
   		if ($a[1] == $b[1]) return 0;
    	return ($a[1] < $b[1]) ? 1 : -1;
    }


	function select($objects,$fitness_function,$n=2) {
		foreach ($objects as $object) {
			$selection[] = array($object,$fitness_function($object));
		}
		usort($selection,array("GA", "best"));
		$selection = array_slice($selection,0,$n);
		foreach ($selection as $selected) {
			$winners[] = $selected[0];
		}
		return $winners;
	}

	//PRIVATE
	function worst($a, $b) {
   		if ($a[1] == $b[1]) return 0;
    	return ($a[1] < $b[1]) ? -1 : 1;
    }

	function kill(&$objects,$fitness_function,$n=2) {
		foreach ($objects as $object) {
			$selection[] = array($object,$fitness_function($object));
		}
		usort($selection,array("GA", "worst"));
		$selection = array_slice($selection,0,count($selection)-$n);
		$objects = array();
		foreach ($selection as $selected) {
			$objects[] = $selected[0];
		}
	}

	//PRIVATE
	function mass_crossover($objects,$cross_functions) {
		foreach ($objects as $object) {
			if (!$obj1) $obj1 = $object;
			else {
				$children[] = $this->crossover($obj1,$object,$this->crossover_functions);
				$obj1 = null;
			}
		}
		return $children;
	}

	//PRIVATE
	function mass_mutation(&$objects) {
		foreach($objects as $key => $object) {
			if (rand(1,100) <= $this->mutation_rate) $this->mutate($objects[$key],$this->mutation_function);
		}
	}

	function evolve() {
		for ($i=0;$i<$this->generations;$i++) {
			$couples = $this->select($this->population,$this->fitness_function,2*min($this->num_couples,floor(count($this->population)/2)));
			$children = $this->mass_crossover($couples,$this->crossover_functions);
			$this->mass_mutation($children);
			$this->population = array_merge($this->population,$children);
			$this->kill($this->population,$this->fitness_function,min($this->death_rate,count($this->population)-2));
		}
	}
}
?>
