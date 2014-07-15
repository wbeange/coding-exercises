<?php
//Your goal is to find the percentage ratio of lowercase and uppercase letters.

$file = fopen($argv[1], "r");

while(($line = fgets($file)) !== FALSE)
{
	$line 	= trim($line);
	$len 	 	= strlen($line);
	$lower 	= 0;
	$upper 	= 0;

	for($i=0; $i<$len; $i++)
	{
		$char = $line[$i];

		if(preg_match("/^[a-z]+$/", $char) === 1)
		{
			$lower += 1;
		}
		elseif(preg_match("/^[A-Z]+$/", $char) === 1)
		{
			$upper += 1;
		}
		else
		{
			//print("$char - test input error\n");
			//exit(1);
		}
	}

	$lowercase = number_format(round((($lower/$len)*100), 2), 2);
	$uppercase = number_format(round((($upper/$len)*100), 2), 2);

	print("lowercase: $lowercase uppercase: $uppercase\n");
}

exit(0);
?>