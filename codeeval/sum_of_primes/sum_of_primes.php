<?php

	//Write a program to determine the sum of the first 1000 prime numbers.
	//I will be using trial division, checking divisibility by even and
	//prime numbers less than sqrt(n) rounded up.

	$prime_limit = 1000;
	$prime_array = array();

	//base case
	$prime_array[] = 2;

	$n = 3;
	while(count($prime_array) < $prime_limit)
	{
		$sqrt = ceil(sqrt($n));

		//omit all even factors
		if($n % 2 == 1)
		{
			//check if any of our primes divide evenly into the number
			$divides_evenly = FALSE;
			foreach($prime_array as $prime)
			{
				if($n % $prime == 0)
				{
					$divides_evenly = TRUE;
					break;
				}
			}

			if($divides_evenly === FALSE)
			{
				$prime_array[] = $n;
			}
		}

		$n += 1;
	}

	//print( implode(", ", $prime_array)."\n" );
	print(array_sum($prime_array));

?>