<?php

	$a = 5;
	$b = 7;
	
	$c = sum($a, $b);
	echo "Sum = ".$c."";
	function sum($a, $b)
	{
		$c = $a + $b;
		return $c;
	}
?>