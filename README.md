  # EXAMPLES OF USING REGULAR EXPRESSION IN PHP
  
  ## PCRE [Pearl Compatible Regular Expression]

  **DELIMITERS**
 
When using the PCRE functions, it is required that the pattern is enclosed by delimiters. A delimiter can be any non-alphanumeric, non-backslash, non-whitespace character.

The following are all examples of valid delimited patterns.

- /foo bar/
- \#^[^0-9]$\#
- +php+
- %[a-zA-Z0-9_-]%

**METACHARACTERS**

There are two different sets of meta-characters: those that are recognized anywhere in the pattern except within square brackets, and those that are recognized in square brackets. Outside square brackets, the meta-characters are as follows:

Meta-characters outside square brackets:

- \	general escape character with several uses
- ^	assert start of subject (or line, in multiline mode)
- $	assert end of subject or before a terminating newline (or end of line, in multiline mode)
- .	match any character except newline (by default)
- [	start character class definition
- ]	end character class definition
- |	start of alternative branch
- (	start subpattern
- )	end subpattern
- ?	extends the meaning of (, also 0 or 1 quantifier, also makes greedy quantifiers lazy (see repetition)
- *	0 or more quantifier
- +	1 or more quantifier
- {	start min/max quantifier
- }	end min/max quantifier

Meta-characters inside square brackets:

- \	general escape character
- ^	negate the class, but only if the first character
- \-	indicates character range

---

## POSIX REGEX 
  > [As of PHP 5.3.0, the POSIX Regex extension is deprecated]
  
-  .       Any Character Except New Line
-  \d      Digit (0-9)
-  \D      Not a Digit (0-9)
-  \w      Word Character (a-z, A-Z, 0-9, _)
-  \W      Not a Word Character
-  \s      Whitespace (space, tab, newline)
-  \S      Not Whitespace (space, tab, newline)
 
-  \b      Word Boundary
-  \B      Not a Word Boundary
-  ^       Beginning of a String
-  $       End of a String
 
-  []      Matches Characters in brackets
-  [^ ]    Matches Characters NOT in brackets
-  |       Either Or
-  ( )     Group

  **Quantifiers:**
-  \*        0 or More
-  \+        1 or More
-  ?         0 or One
-  {3}       Exact Number
-  {3,4}     Range of Numbers (Minimum, Maximum)

-  [[:alpha:]] indica qualsiasi lettera, maiuscola o minuscola
-  [[:digit:]] indica qualsiasi cifra
-  [[:space:]] indica tutti i caratteri di spazio ( trn)
-  [[:upper:]] indica le lettere maiuscole
-  [[:lower:]] indica le lettere minuscole
-  [[:punct:]] indica i caratteri di punteggiatura
-  [[:xdigit:]] indica i valori esadecimali
  