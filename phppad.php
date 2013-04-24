<?php
/*PHP Pad*/

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
    	<form id="myform" method="POST" action = "">

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
	<script type="text/javascript">

	window.onkeydown = function(e){
  if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
    e.preventDefault();
    //your saving code
    alert('Unfortunately You cannot Save');
  }


}

	var myTextArea = document.getElementById('codearea');
var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
	    lineNumbers: true,
		  matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift",
        theme: "monokai"

});


	</script>
</body>
</html>