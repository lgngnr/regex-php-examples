  # EXAMPLES OF USING REGULAR EXPRESSION IN PHP
  
  ## PCRE [Pearl Compatible Regular Expression]

  **DELIMITERS**
 
When using the PCRE functions, it is required that the pattern is enclosed by delimiters. A delimiter can be any non-alphanumeric, non-backslash, non-whitespace character.

The following are all examples of valid delimited patterns.

- /foo bar/
- \#^[^0-9]$\#
- +php+
- %[a-zA-Z0-9_-]%



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
  