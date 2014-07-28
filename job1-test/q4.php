<?php

	//TO RUN: from command line run the following - 'php q4.php'

	function recursiveQuestion4($in_array, $out_array=array(), $whitespace="")
	{
		//going out
		if(empty($in_array) === FALSE)
		{
			$letter = array_shift($in_array);

			$output = "$whitespace<$letter>\n";
			print($output);
			
			$whitespace .= " ";

			array_unshift($out_array, $letter);

			return recursiveQuestion4($in_array, $out_array, $whitespace);
		}
		//going in
		elseif(empty($out_array) === FALSE)
		{
			$letter = array_shift($out_array);

			//TODO: ugly, I'd use space padding next time
			$whitespace = substr($whitespace, 0, -1);

			$output = "$whitespace</$letter>\n";
			print($output);

			return recursiveQuestion4($in_array, $out_array, $whitespace);
		}
		else
		{
			//done
			return TRUE;
		}
	}

	$letters_array = array(
		'a',
		'b',
		'c',
		'd',
		'e',
		'f',
	);

	recursiveQuestion4($letters_array);

	exit(0);

?>