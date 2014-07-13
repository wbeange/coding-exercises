<?php

	//Write a program to reverse the words of an input sentence.

	$file = fopen($argv[1], "r");
	
	while(($line = fgets($file)) !== FALSE)
	{
		$line = trim($line);

		//allow for empty lines
		if(empty($line) === TRUE)
		{
			continue;
		}

		$words_array = explode(" ", $line);
		$reverse_array = array_reverse($words_array);
		$output = implode(" ", $reverse_array);
		print($output."\n");
	}

?>