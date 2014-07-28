<?php

	//TO RUN: from command line run the following - 'php q3.php'

	//TODO: fairly untested and I'm not proud of this startegy at all
	//but it works. moving on and I'll come back if I have time.

	//assuming 'html is not valid' is restricted to
	// - there are mismatched pairs (most common strategy where would be using 2 queues)
	// - there are missing tags

	$html_string = "<html><body><div><a></a></div></body></html>";
	//$html_string = "<html><body><div></a></body></html>";
	//$html_string = "<html><body><div><a></div></a>";

	//TODO: seperating out html and parsing it, this is hacky
	$html_array = explode("><", $html_string);
	foreach($html_array as $i => $html)
	{
		$html_array[$i] = str_replace(array('<', '>'), '', $html);
	}

	//second queue, pop html off first array and push into second, will then compare
	$out_array 	= array();

	$whitespace = '';
	$output		= '';

	foreach($html_array as $html)
	{		
		if(strstr($html, '/') === FALSE)
		{
			array_unshift($out_array, $html);

			$output .= "$whitespace<$html>\n";

			$whitespace .= '  ';
		}
		else
		{
			$html2 = array_shift($out_array);
			$html2 = "/$html2";

			//TODO: this is weak
			//check for mismatched pairs / missing tags
			if(strcmp($html, $html2) != 0)
			{
				print("err\n");
				exit(1);
			}

			$whitespace = substr($whitespace, 0, -2);
			$output .= "$whitespace<$html>\n";
		}
	}

	print($output);

	exit(0);

?>