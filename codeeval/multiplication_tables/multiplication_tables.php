<?php
//Print out the grade school multiplication table upto 12*12.

$max_num = 12;
$padding = 4;

for($i=1; $i<=$max_num; $i++)
{
	for($j=1; $j<=$max_num; $j++)
	{
		$result = $i * $j;
		$output = str_pad($result, $padding, " ", STR_PAD_LEFT);
		print($output);
	}
	print("\n");
}

?>