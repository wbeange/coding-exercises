import string, sys

#Constraints
TEST_MIN = 0
TEST_MAX = 20

A_MIN = 1
A_MAX = 20

B_MIN = 1
B_MAX = 20

N_MIN = 21
N_MAX = 100


#open and read file
#test all constraints
def canFizzBuzz():	
	txn = True
	msg = ""

	test_count = 0
	lines = []

	with open(sys.argv[1], "r") as f:
		for line in f:			
			
			#explode variables and cast
			(A, B, N) = string.split(line, ' ')	
			A = int(A)
			B = int(B)
			N = int(N)

			test_count += 1

			if test_count > TEST_MAX:
				txn = False
				msg = "Error: too many tests in input file"
				break
			elif A < A_MIN:
				txn = False
				msg = "Error: input %d A outside range" % test_count
				break
			elif A > A_MAX:
				txn = False
				msg = "Error: input %d A outside range" % test_count
				break
			elif B < B_MIN:
				txn = False
				msg = "Error: input %d B outside range" % test_count
				break
			elif B > B_MAX:
				txn = False
				msg = "Error: input %d B outside range" % test_count
				break
			elif N < N_MIN:
				txn = False
				msg = "Error: input %d N outside range" % test_count
				break
			elif N > N_MAX:
				txn = False
				msg = "Error: input %d N outside range" % test_count
				break
			
			#survived constraints
			lines.append(line)
		#end for

	if test_count < TEST_MIN:
		msg = "Error: empty input file"
		txn = False

	return {'txn':txn, 'msg':msg, 'data':lines}


#Code Eval Fizz Buzz Problem
def fizzBuzz():
	txn_result = canFizzBuzz()

	if txn_result['txn']:
		lines = txn_result['data']

		#run through each line of input
		for line in lines:

			#explode variables and cast
			(A, B, N) = string.split(line, ' ')	
			A = int(A)
			B = int(B)
			N = int(N)

			#build output
			output = ""
			for i in range(1, int(N)+1):
				if i % A == 0 and i % B == 0:
					output += "FB "
				elif i % A == 0:
					output += "F "
				elif i % B == 0:
					output += "B "
				else:
					output += str(i) + " "
			
			#remove trailing whitespace
			output = string.rstrip(output)

			print output
		exit(0)	

	else:
		print txn_result['msg']
		exit(1)


#main
fizzBuzz()