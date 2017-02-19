#Wattpad Coding Challenge

## Tests

If you have Ant installed, the supplied build will run both PHPSpec unit tests and PHPUnit integration tests

    ant
    
Otherwise you can run them separately using the following commands

    bin/phpunit
    bin/phpspec run
    
## Task

Wattpad automatically flags comments and messages that are deemed offensive. This is done by detecting key phrases in the text and assigning it a score. If the score is over a certain threshold, it is flagged as offensive.

Write a program in Go or PHP that reads input files of potentially offensive text and writes to an output file with scores for each of the text files (details below).


You are given two files with lists of offensive phrases. One file contains "low risk" phrases and the other, "high risk" phrases, one phrase per line. You are also given a set of 15 input files, each one containing some possibly offensive text that your program will score. The offensive score is defined as:

`(number of low risk phrases) + (number of high risk phrases * 2)`
    
Your program should write out one output file containing the scores of each input file in order, in the format:

    <input-filename-1>:<score-1>
    <input-filename-2>:<score-2>
    ...        