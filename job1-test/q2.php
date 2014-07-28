<?php

	//TO USE: from command line run the following - 'php q2.php q2_input.txt'
	//Note: Unit tests can be uncommented below

	class Polygon
	{
		function __construct($name, $length)
		{
			$this->length = $length;
			$this->name = $name;
			$this->side = 'side';
		}

		function talk($perimeter, $area)
		{
			$name 	= $this->name;
			$length = $this->length;
			$side 	= $this->side;

			$output = "A $name with $side length $length u ";
			$output .= "has a perimeter of $perimeter u ";
			$output .= "and an area of $area u^2\n";

			print($output);
		}
	}

	class Triangle extends Polygon
	{
		function calcPerimeter()
		{
			return ( $this->length * 3 );
		}

		function calcArea()
		{
			return round((sqrt(3) / 4) * ($this->length * $this->length), 2);
		}
	}

	class Square extends Polygon
	{
		function calcPerimeter()
		{
			return ( $this->length * 4 );
		}

		function calcArea()
		{
			return round(($this->length * $this->length), 2);
		}
	}

	class Pentagon extends Polygon
	{
		function calcPerimeter()
		{
			return ( $this->length * 5 );
		}

		function calcArea()
		{
			$area = (0.25 * sqrt(5*(5+(2*sqrt(5)))) * ($this->length*$this->length));

			return round($area, 2);
		}	
	}

	class Circle extends Polygon
	{
		function __construct($name, $length)
		{
			$this->length = $length;
			$this->name = $name;
			$this->side = 'radius';
		}		

		function calcPerimeter()
		{
			return round((2 * pi() * $this->length), 2);
		}

		function calcArea()
		{
			return round((pi() * $this->length * $this->length), 2);
		}
	}

	//check for valid polygon
	function _isValidPolygon($polygon)
	{
		$result = FALSE;

		$validp_array = array(
			'triangle',
			'square',
			'pentagon',
			'circle',
		);

		foreach($validp_array as $validp)
		{
			if(strcmp($validp, $polygon) == 0)
			{
				//print("matches to a $polygon\n");
				$result = TRUE;
				break;
			}
		}

		return $result;
	}

	//this is a little overboard, but in the past
	//when I can I write server code in a 
	//do / canDo style when applicable
	function _canCreatePolygon($polygon, $length)
	{
		$txn = FALSE;
		$msg = '';

		if(empty($polygon) === TRUE)
		{
			$msg = 'err: invalid polygon';
		}
		elseif(_isValidPolygon($polygon) === FALSE)
		{
			$msg = 'err: invalid polygon';
		}
		elseif(empty($length) === TRUE)
		{
			$msg = 'err: invalid length';
		}
		elseif($length < 1)
		{
			$msg = 'err: length is too short';
		}		
		else
		{
			$txn = TRUE;
		}

		return array('txn'=>$txn, 'msg'=>$msg);
	}

	//work function
	function createPolygon($polygon, $length)
	{
		$txn_array = _canCreatePolygon($polygon, $length);

		if($txn_array['txn'] === TRUE)
		{
			//print("valid input $polygon $length\n");

			if(strcmp($polygon, 'triangle') == 0)
			{
				$shape = new Triangle($polygon, $length);
			}
			elseif(strcmp($polygon, 'square') == 0)
			{
				$shape = new Square($polygon, $length);
			}
			elseif(strcmp($polygon, 'pentagon') == 0)
			{
				$shape = new Pentagon($polygon, $length);
			}			
			elseif(strcmp($polygon, 'circle') == 0)
			{
				$shape = new Circle($polygon, $length);
			}
			else
			{
				//given prev validation, this will never happen
				print("hmm\n");
				exit(1);
			}

			$shape->talk($shape->calcPerimeter(), $shape->calcArea());
		}
		//there was an error with the input
		else
		{
			print($txn_array['msg']."\n");
		}

		return $txn_array;
	}

	//TODO: I've run out of time, time to move on
	function main($argv)
	{
		//TODO: use php csv specific file functions
		$file = fopen($argv[1], 'r');

		while(($line = fgets($file)) !== FALSE)
		{
			$line = trim($line);

			list($polygon, $length) = explode(',', $line);	

			$result = createPolygon($polygon, $length);
		}

		exit(0);		
	}

	//Note: Honestly I haven't worked with unit testing in any official sense,
	//But from what Google just told me, I just need to test all the edge cases
	//And stuff...
	function unitTests()
	{
		$shapes_array = array(
			'',
			'triangle',
			'square',
			'pentagon',
			'circle',
			'foobar',
		);

		$lengths_array = array(
			-100,
			-1,
			0,
			1,
			5,
			10,
			99,
			100,
			101,
			3.5,
			45.874,
		);

		foreach($shapes_array as $shape)
		{
			foreach($lengths_array as $length)
			{
				createPolygon($shape, $length);
			}
		}
	}

	main($argv);
	//unitTests();

?>