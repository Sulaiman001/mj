<?php
/**
 * WS PHP Framework
 *
 * @version 1.0.0
 */

###
# 1. Configuration
###

### This definition is so that any included scripts can check against it and if this isn't defined they won't run.
define("mj",1);
#require_once("lib/config.php");
#require_once("lib/ws-php-library.php");

### Variables you can change
$site_title = "MJ";

### Start the Session
session_start();
$sessid = session_id();

### php.ini configurations
# If you use .htaccess, add the following to increase upload size (There's other values in the ini_set() syntax below)
# php_value upload_max_filesize 15M
# php_value post_max_size 15M
#
# If you want to use the built in ini_set() function, uncomment the following to allow larger uploads and other options.
# ini_set("upload_max_filesize","15M"); ### Change upload size
# ini_set("post_max_size","15M"); ### Change upload size
# ini_set("max_execution_time","86400"); ### Set script timeout in seconds
# ini_set("max_input_time","86400"); ### Set max input time in seconds
# ini_set("memory_limit","32M"); ### Change the memory limit

### MySQL Database Configuration
#$my['username'] = "mysql username";
#$my['password'] = "mysql password";
#$my['hostname'] = "mysql hostname";
#$my['port_number'] = "mysql port number";
#$my['database'] = "mysql database";
#
#$myid = mysql_pconnect($my['hostname'].":".$my['port_number'],$my['username'],$my['password']);
#mysql_select_db($my['database'],$myid);

### Retrieving POST and GET requests
### Usage: get_param("variable_name",[string POST|GET,[boolean TRUE|FALSE]]);
### get_param() takes 1 argument for the variable name (required). The second parameter is optional
### and can be GET or POST depending on which request you need. The third parameter which is optional
### can be set to TRUE or FALSE. If TRUE, which is by default, the opposite request method will be
### tried if the other request method is NULL. If FALSE, only the specified request method will be tried.
### Really you would only set the third argument to FALSE and nothing else if you use it.
###
### You can also just use $_POST and $_GET
#$var_post = get_param("var_post",POST,TRUE); # this is the same thing as get_param("var_post")
#$var_get = get_param("var_get",GET,FALSE);
#$action = get_param("action");

### Retrieving command line arguments in Command Line Interface (CLI) mode
### Usage at command line: php myscript.php argument1 argument2
#$arg1 = $_SERVER['argv'][1]; # If using CLI mode, this is the first argument. 0 is the script itself.
#$arg1 = $_SERVER['argv'][2]; # If using CLI mode, this is the second argument.

### Initialize any variables here.
$html = $page_content = "";

###
# 2. Functions
###

### css.php and javascript.php are to generate dynamic css and javascript that populates
### either <style type="text/css">$css</style> or <script type="text/javascript">$javascript</script>
#require_once("lib/css.php");
#require_once("lib/javascript.php");

###
# 3. Actions
###

### You could contain a login process here.
#require_once("lib/login.php");
### Include any other files that contain actions. Usually stuff to process input.
#require_once("lib/myprogram.php");

# Example
# if($action == "foo")
# {
# 	# I use ".=" so that we always append to $page_content
# 	$page_content .= myfunc("bar");
# }

### Put everything that will go between <body> and </body> in the $page_content variable.
$page_content = <<<eof
<div id="grid"></div>
eof;

###
# 4. Output
###

### $html is the variable that should be printed at the very end of the script. This is the actual HTML page.
$html .= <<<eof
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>{$site_title}</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!--<link rel="stylesheet" href="css/default.css" type="text/css" />-->
<style type="text/css">
/* CSS goes here */
/* The css variable below is populated via ssi/css.php if you need dynamic css. Throughly test in needed browsers. */
{$css}
</style>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.mines.js" type="text/javascript"></script>
<script src="js/jquery.dump.js" type="text/javascript"></script>
<script src="js/phpjs.wsams.pack.js" type="text/javascript"></script>
<script type="text/javascript">
/* JavaScript goes here */
/* The javascript variable below is populated via lib/javascript.php */
{$javascript}
</script>
</head>
<body oncontextmenu="return false;">
<div id="container">
{$page_content}
</div><!--container-->
</body>
</html>
eof;

print($html);
?>
