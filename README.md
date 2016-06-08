# Profanity Checker
**Table of Contents** 
  1. [Overview:](#overview)
  2. [Modes:](#modes)
  3. [Installation:](#installation)
  4. [Demo:](#demo)

####Overview:
Profanity Checker is a simple PHP application that scans large blocks of text to prevent you from using NSFW words. 
Input could be either in the form of a .txt file or raw text.
Inspired from the [What Do You Love](https://en.wikipedia.org/wiki/WDYL_(search_engine)) Project by Google (this has now been depreciated), it enables you to perform checks across several modes including the [ones](https://gist.github.com/jamiew/1112488) deemed not fit by Google originally!

####Modes
  1. Standard Mode: This mode checks against the WDYL words maintained [here](https://gist.github.com/jamiew/1112488)
  2. Create Custom Check: Allows user to create a custom database of words that the user may deem inappropriate to avoid entering same set of words again and again.
  3. Selective Check: Allows user to check for a particular set of words for exactly one instance. The words are NOT stored in a database.

####Installation 
  Save connection.inc.php.sample as connection.inc.php and change variables according to your database settings and you are good to go.

####Demo:
![](screengrab/screenshot.gif?raw=true)

