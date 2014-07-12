
<?php
	//Read a multiple line text file and write the 'N' longest lines to stdout.
	//Strategy: run through each line and manage longest in an array
	//replacing with longer ones as needed
	
	//helper fn. - sort array by shortest to longest string length
	function sort_array($longest_array)
	{
		usort($longest_array, function($a, $b) {
			if(strlen($a) == strlen($b))
			{
				return 0;
			}
			elseif(strlen($a) > strlen($b))
			{
				return -1;
			}
			else
			{
				return 1;
			}
		});

		return $longest_array;
	}	

	//helper fn. - replace shortest item
	function pop_shortest($longest_array, $line)
	{
		//reset array pointer to be safe
		end($longest_array);

		//grab first el in array, as we are sorting shortest to longest
		$shortest_key = key($longest_array);

		if(strlen($longest_array[$shortest_key]) < strlen($line))
		{
			$longest_array[$shortest_key] = $line;
		}

		return sort_array($longest_array);
	}

	$file = fopen($argv[1], "r");

	$n_longest = NULL;
	$longest_array = array();

	while(true)
	{
		$line = trim(fgets($file));

		//break loop if $line is an empty line
		if(empty($line) === TRUE)
		{
			break;
		}
		//first line in file specifying n longest
		elseif($n_longest === NULL)
		{
			$n_longest = $line;
			continue;
		}
		else
		{
			//push first n lines into array
			if(count($longest_array) < $n_longest)
			{
				$longest_array[] = $line;
				$longest_array = sort_array($longest_array);
			}
			//replace with longer line if needed
			else
			{
				$longest_array = pop_shortest($longest_array, $line);
			}
		}
	}

	//output
	foreach($longest_array as $line)
	{
		print($line."\n");
	}

?>