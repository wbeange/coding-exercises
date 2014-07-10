<?php

	$handle = fopen("php://stdin", "r");
	$cases = (int) trim( fgets($handle) );

	$cases_min = 1;
	$cases_max = 100;

	if($cases_min > $cases OR $cases > $cases_max)
	{
		print("Test Cases Error: Outside range $cases_min > $cases > $cases_max.\n");
		exit(1);
	}

	$rock_len_max = 100;
	$unique_gems_master = array();
	$first_rock = TRUE;

	#run through each case given
	for($i=1; $i<=$cases; $i++)
	{
		#get rock from stdin
		$rock = trim( fgets($handle) );

		#check length constraint
		if(strlen($rock) > $rock_len_max)
		{
			print("Rock Composition Error: String length is greater than $rock_len_max.'\n");
			exit(1);
		}
		#check if all chars in string are lowercase letteres
		if(ctype_lower($rock) === FALSE)
		{
			print("Rock Composition Error: not correct format 'a' - 'z': $rock");
			exit(1);
		}

		$unique_gems = array();
		for($j=0; $j<strlen($rock); $j++)
		{
			$unique_gems[ $rock[$j] ] = $rock[$j];
		}
		
		#for first rock, populate tracking array with each character that appears
		if($first_rock === TRUE)
		{			
			$unique_gems_master = $unique_gems;
			$first_rock = FALSE;
		}
		#for the rest, unset character from tracking array if it doesn't exist
		else
		{
			foreach($unique_gems_master as $c)
			{
				if(isset($unique_gems[$c]) === FALSE)
				{
					unset($unique_gems_master[$c]);
				}
			}
		}
	}

	print( count($unique_gems_master)."\n" );
	fclose($handle);
	exit(0);

?>