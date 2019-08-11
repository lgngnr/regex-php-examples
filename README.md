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
- \*	0 or more quantifier
- \+	1 or more quantifier
- {	start min/max quantifier
- }	end min/max quantifier

Meta-characters inside square brackets:

- \	general escape character
- ^	negate the class, but only if the first character
- \-	indicates character range

**Escape sequences \\**

If backslash is followed by a non-alphanumeric character, it takes away any special meaning that character may have. 

This use of **backslash as an escape character** applies both inside and outside character classes.

For example, if you want to match a "*" character, you write "\*" in the pattern. 

A **second use** of backslash provides a way of **encoding non-printing characters** in patterns in a visible manner. 

- \a alarm, that is, the BEL character (hex 07)
- \cx "control-x", where x is any character
- \e escape (hex 1B)
- \f formfeed (hex 0C)
- \n newline (hex 0A)
- \p{xx} a character with the xx property, see unicode properties for more info
- \P{xx} a character without the xx property, see unicode properties for more info
- \r carriage return (hex 0D)
- \R line break: matches \n, \r and \r\n
- \t tab (hex 09)
- \xhh character with hex code hh
- \ddd character with octal code ddd, or backreference

Inside a **character class**, or if the decimal number is greater than 9 and there have not been that many capturing subpatterns, PCRE re-reads up to three octal digits following the backslash, and generates a single byte from the least significant 8 bits of the value. Any subsequent digits stand for themselves. For example:

- \040 is another way of writing a space
- \40 is the same, provided there are fewer than 40 previous capturing subpatterns
- \7 is always a back reference
- \11 might be a back reference, or another way of writing a tab
- \011 is always a tab
- \0113 is a tab followed by the character "3"
- \113 is the character with octal code 113 (since there can be no more than 99 back references)
- \377 is a byte consisting entirely of 1 bits
- \81 is either a back reference, or a binary zero followed by the two characters "8" and "1"

The **third use** of backslash is for **specifying generic character types**:

- \d any decimal digit
- \D any character that is not a decimal digit
- \h any horizontal whitespace character (since PHP 5.2.4)
- \H any character that is not a horizontal whitespace character (since PHP 5.2.4)
- \s any whitespace character
- \S any character that is not a whitespace character
- \v any vertical whitespace character (since PHP 5.2.4)
- \V any character that is not a vertical whitespace character (since PHP 5.2.4)
- \w any "word" character
- \W any "non-word" character

Each pair of escape sequences partitions the complete set of characters into two disjoint sets. Any given character matches one, and only one, of each pair.

The **fourth use** of backslash is for **certain simple assertions**. An assertion specifies a condition that has to be met at a particular point in a match, without consuming any characters from the subject string. The use of subpatterns for more complicated assertions is described below. 

The **backslashed assertions** are:

- \b word boundary
- \B not a word boundary
- \A start of subject (independent of multiline mode)
- \Z end of subject or newline at end (independent of multiline mode)
- \z end of subject (independent of multiline mode)
- \G first matching position in subject

**Unicode character properties**

- \p{xx} a character with the xx property
- \P{xx} a character without the xx property
- \X an extended Unicode sequence

The property names represented by xx above are limited to the Unicode general category properties. Each character has exactly one such property, specified by a two-letter abbreviation. For compatibility with Perl, negation can be specified by including a circumflex between the opening brace and the property name. For example, \p{^Lu} is the same as \P{Lu}.

**Supported property codes**

- C	Other	 
- Cc	Control	 
- Cf	Format	 
- Cn	Unassigned	 
- Co	Private use	 
- Cs	Surrogate	 
- L	Letter	Includes the following properties: Ll, Lm, Lo, Lt and Lu.
- Ll	Lower case letter	 
- Lm	Modifier letter	 
- Lo	Other letter	 
- Lt	Title case letter	 
- Lu	Upper case letter	 
- M	Mark	 
- Mc	Spacing mark	 
- Me	Enclosing mark	 
- Mn	Non-spacing mark	 
- N	Number	 
- Nd	Decimal number	 
- Nl	Letter number	 
- No	Other number	 
- P	Punctuation	 
- Pc	Connector punctuation	 
- Pd	Dash punctuation	 
- Pe	Close punctuation	 
- Pf	Final punctuation	 
- Pi	Initial punctuation	 
- Po	Other punctuation	 
- Ps	Open punctuation	 
- S	Symbol	 
- Sc	Currency symbol	 
- Sk	Modifier symbol	 
- Sm	Mathematical symbol	 
- So	Other symbol	 
- Z	Separator	 
- Zl	Line separator	 
- Zp	Paragraph separator	 
- Zs	Space separator	

**Anchors \* \$**

- \^ Outside square brackets : assert start of subject (or line, in multiline mode)
[^0]  which means - all but 0 

- \^ Inside square brackets : negate the class, but only if the first character
[^A]  which means - all but A & so on

A dollar character ($) is an assertion which is TRUE only if the current matching point is at the end of the subject string, or immediately before a newline character that is the last character in the string (by default). Dollar ($) need not be the last character of the pattern if a number of alternatives are involved, but it should be the last item in any branch in which it appears. Dollar has no special meaning in a character class.

**DOT \.**

Outside a character class, a dot in the pattern matches any one character in the subject, including a non-printing character, but not (by default) newline. If the PCRE_DOTALL option is set, then dots match newlines as well. The handling of dot is entirely independent of the handling of circumflex and dollar, the only relationship being that they both involve newline characters. Dot has no special meaning in a character class.

**Character classes**

An opening square bracket introduces a character class, terminated by a closing square bracket. A closing square bracket on its own is not special. If a closing square bracket is required as a member of the class, it should be the first data character in the class (after an initial circumflex, if present) or escaped with a backslash.

- [a-z] lower case letters
- [0-9] numeric
- [A-Z] upper case letters
- [a-zA-z0-9] lowe upper case letters and numeric
- [aiu] alternation of a i u letters

- alnum	letters and digits
- alpha	letters
- ascii	character codes 0 - 127
- blank	space or tab only
- cntrl	control characters
- digit	decimal digits (same as \d)
- graph	printing characters, excluding space
- lower	lower case letters
- print	printing characters, including space
- punct	printing characters, excluding letters and digits
- space	white space (not quite the same as \s)
- upper	upper case letters
- word	"word" characters (same as \w)
- xdigit	hexadecimal digits

**Alternation |**


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
  