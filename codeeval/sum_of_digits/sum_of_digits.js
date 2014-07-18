//Given a positive integer, find the sum of its constituent digits.

var fs  = require("fs");
fs.readFileSync(process.argv[2]).toString().split('\n').forEach(function (line)
{
    if (line != "")
    {
        line = line.trim();

        for(var i=0; i<line.length; i++)
        {
        	var n = parseInt(line[i]);
        	console.log(n);
        }
        //console.log(answer_line);
    }
});