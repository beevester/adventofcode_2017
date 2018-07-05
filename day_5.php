<?php 

$input = file("./input_5");

function firstDay(Array $input) {
	$value = 0;
	$jumps = 0;
	
	while(array_key_exists($value, $input))
	{
		$jumps++;
		$input[$value] = intval($input[$value]);
		$jump = $input[$value];
		$input[$value]++;
		$value += $jump;
	}
	echo "Answer: ".$jumps;	

}

function secondDay(Array $input) {
	$value = 0;
	$jumps = 0;
	
	while(array_key_exists($value, $input))
	{
		$jumps++;
		$input[$value] = intval($input[$value]);
		$jump = $input[$value];
		$jump >= 3 ? $input[$value]-- : $input[$value]++;
		$value += $jump;
	}
	echo "Answer: ".$jumps;	
}
