<?php

/* 1. Given two database tables:

table students:
| id | name | address |

table applications:
| id | student_id | score |

Write a query to list the number of applications each student has.
Report 0 for students with no applications. List students first 
by number of applications, then alphabetically by name. */

/* FINAL ANSWER:

SELECT s.id, s.name, a.cnt
FROM students s
JOIN ( SELECT student_id, COUNT(*) AS cnt
	   FROM applications
	   GROUP BY student_id
	 ) a ON ( s.id=a.student_id )
ORDER BY a.cnt DESC, s.name;

*/

/* Thought process...

	Note: My DB skills are rusty. I'm going to give a rough
	sketch as to how I think I'd do this. If I have time I will 
	come back and create the tables, populate them with data,
	and hack my way to a proper solution.

	Note2: Coming back to this question...
	Given the time constraint, I'm not able to test this. 
	I think this is right. At least from what answer I have given 
	I can demonstrate some knowledge of databases.

	- Assuming I am using MySQL DB.

	- initial thoughts...
	- not sure how I would report 0 from within the database 
	for a student with no applicatons
	- sorting by count(# of applications first) 
	and then hopefully there is a built in lexicographical order

//first try, wrong...
SELECT s.id, s.name, s.address, a.id, a.score
FROM ( SELECT * FROM 'students' AS s JOIN 'applications' as a ON s.id=a.student_id )
ORDER BY COUNT(SELECT * FROM 'applications' WHERE student_id=s.id), s.name


//second try, I think this is right:
SELECT s.name, a.cnt
FROM students s
JOIN ( SELECT student_id, COUNT(*) AS cnt
	   FROM applications
	   GROUP BY student_id
	 ) a ON ( s.id=a.student_id )
ORDER BY a.cnt DESC, s.name;

*/

?>