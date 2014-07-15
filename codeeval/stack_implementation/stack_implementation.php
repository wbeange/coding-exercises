<?php

	$file = fopen($argv[1], "r");

	while(($line = fgets($file)) !== FALSE)
	{
		$numbers = explode(" ", trim($line));
		$numbers_reverse = array_reverse($numbers);

		$output = "";
		foreach($numbers_reverse as $key => $number)
		{
			if($key % 2 == 0)
			{
				$output .= $number." ";
			}
		}
		print(trim($output)."\n");
	}

?>