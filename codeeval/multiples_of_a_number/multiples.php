<?php

	//Given numbers x and n, where n is a power of 2, 
	//print out the smallest multiple of n which is greater than or equal to x. 
	//Do not use division or modulo operator.
	
	//open file
	$file = fopen($argv[1], "r");

	//run through each test case
	while(($line = fgets($file)) !== FALSE)
	{
		//get test data of x and n
		list($x, $n) = explode(",", trim($line));

		$x = (int)$x;
		$n = (int)$n;

		if($n < 1)
		{
			continue;
		}

		//increase multiples of n until larger than x
		if($x > $n)
		{
			while($x > $n)
			{
				$n = $n << 1;
			}
		}
		//decrease multiples of n until smaller and then revert back 1	
		elseif($x < $n)
		{
			while(true)
			{
				$cur_n = $n;
				
				$n = $n >> 1;

				if($x > $n)
				{
					$n = $cur_n;
					break;
				}
			}
		}	

		print("$n\n");
	}

?>