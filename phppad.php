<?php
/*PHP Pad*/

error_reporting(E_ERROR);
/*Disable magic quotes if turned on */
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

?>

<!DOCTYPE html />

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PHP Pad </title>
	<script src="codemirror/lib/codemirror.js"></script>
<link rel="stylesheet" href="codemirror/lib/codemirror.css">
<link rel="stylesheet" href="codemirror/theme/monokai.css">
<link rel="stylesheet" href="css/styles.css">
<script src="codemirror/mode/clike/clike.js"></script>
<script src="codemirror/mode/php/php.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>

	

</head>
<body>
    <div class="header">
    <div class="logo"></div>
    </div>
    <div class="content">
    	Code: 
        <?php

        if(!$_REQUEST['submit']){
        ?>
    	<div class="warning">Warning: Do not upload to public web server. For local use only</div>
        <?php
    }
        ?>
    	<form id="padform" method="POST" action = "">

    		<textarea id="codearea" name="code" rows="10"><?php echo $_REQUEST['code']; ?></textarea> <br/>
    		<div class="bottomtools"><input type="submit" name="submit" value="submit" class="button" /></div>
    	</form>	

    	Output: 
    	<div id="output">
    		<?php 

                if($_REQUEST['submit']){
                eval( '?>' . $_REQUEST['code']);

                }

    		?>
    	</div>
</div>
	<script type="text/javascript" src="js/phppad.js"></script>
</body>
</html>
