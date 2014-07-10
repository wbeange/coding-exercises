#write a program which sorts numbers
#accept first argument as path to filename
import sys

file_name = sys.argv[1]

with open(file_name, "r") as f:
	for line in f:
		
		line = line.rstrip()
		if len(line) == 0:
			continue

		#explode numbers into list, cast, and sort
		numbers = line.split()
		numbers = [float(n) for n in numbers]
		numbers.sort()

		#format and ouput
		output = ""
		for n in numbers:
			output += str(n) + " "
		output = output.strip()
		print output

f.close()

exit(0)