<?php

$input = file("./input_8");
$instrictions  = $reg = [];
$i = 0;

foreach ($input as $value) {
	preg_match('/^(\w+)\s{1}(inc|dec)\s{1}(-?\d+)\s{1}if\s{1}(\w+)\s{1}(.{1,2})\s{1}(-?\d+)/', $value, $reg);

	$changeVal = ($reg[2] == 'dec')? (int)(0-$reg[3]) : (int)$reg[3];
	$instructions[$i]['register'] = $reg[1];
	$instructions[$i]['changeVal'] = $changeVal;
	$instructions[$i]['checkVar'] = $reg[4];
	$instructions[$i]['operator'] = $reg[5]; 
	$instructions[$i]['compVal'] = $reg[6];
	$i++;
}

function firstDay(Array $instructions) { 

	foreach ($instructions as $value) {
		$checkVar = $value['checkVar'];
		$operator = $value['operator'];
		$compVal = $value['compVal'];
		$register = $value['register'];

		if(!isset($reg[$register])) $reg[$register] = 0;
		if(!isset($reg[$checkVar])) $reg[$checkVar] = 0;
		eval('$c = ('.$reg[$checkVar].' '.$operator.' '.$compVal.');');
		if($c) $reg[$register] += $value['changeVal'];
	}

	echo "Max value: ".max($reg);
}

function secondDay(Array $instructions) { 
	$max = 0; 

	foreach ($instructions as $value) {
		$checkVar = $value['checkVar'];
		$operator = $value['operator'];
		$compVal = $value['compVal'];
		$register = $value['register'];

		if(!isset($reg[$register])) $reg[$register] = 0;
		if(!isset($reg[$checkVar])) $reg[$checkVar] = 0;
		eval('$c = ('.$reg[$checkVar].' '.$operator.' '.$compVal.');');
		if($c) $reg[$register] += $value['changeVal'];
		if($reg[$register] > $max) $max = $reg[$register];

	}

	echo "Highest value: ".$max;
}

