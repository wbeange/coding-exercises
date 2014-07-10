<?php
	/**
	*	www.hackerrank.com utopian-tree challenge, PHP submission
	* 
	* Utopian tree goes through 2 cycles of growth every year
	* - 1st during monsoon, doubles in height
	* - 2nd during summer, add 1 meter
	* - new tree planted at onset of monsoon at 1 meter
	*/
	
	function calcUtopianTreeHeight($number_cycles_n)
	{
		$N_MIN = 0;
		$N_MAX = 60;
		$TREE_BASE_HEIGHT = 1;		

		#check for cycle constraint
		if($N_MIN > $number_cycles_n OR $number_cycles_n > $N_MAX)
		{
			print("Cycle Constraint Error: $N_MIN > $number_cycles_n > $N_MAX");
			exit(1);
		}

		#cycle 0 starts at base height
		$tree_height = $TREE_BASE_HEIGHT;

		$current_cycle = 1;
		while($number_cycles_n >= $current_cycle)
		{
			#monsoon, double it
			if($current_cycle % 2 == 1)
			{
				$tree_height = $tree_height * 2;
			}
			#summer, add 1
			else
			{
				$tree_height += 1;
			}

			$current_cycle += 1;
		}

		print($tree_height);
	}
	
	#open test file
	$handle 							= fopen ("php://stdin","r");	
	$number_test_cases_t 	= (int)trim( fgets($handle) );

	$T_MIN = 1;
	$T_MAX = 10;	

	#check for test case constraint
	if($T_MIN > $number_test_cases_t OR $number_test_cases_t > $T_MAX)
	{
		print("Test Cases Constraint Error: $T_MIN > $number_test_cases_t > $T_MAX");
		exit(1);
	}

	#run through each test case
	for($i=1; $i<=$number_test_cases_t; $i++)
	{
		#calculate tree height
		$number_cycles_n = (int)trim( fgets($handle) );
		calcUtopianTreeHeight($number_cycles_n);
		print("\n");
	}

	fclose($handle);

?>