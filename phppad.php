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
	<title>PHP Pad </title>
	<script src="codemirror/lib/codemirror.js"></script>
<link rel="stylesheet" href="codemirror/lib/codemirror.css">
<link rel="stylesheet" href="codemirror/theme/monokai.css">
<link rel="stylesheet" href="css/styles.css">
    <script src="codemirror/mode/clike/clike.js"></script>
<script src="codemirror/mode/php/php.js"></script>

	

</head>
<body>

	<h2>PHP PAD</h2>

	Code: 
	<div class="warning">Warning: Do not upload to public web server. For local use only</div>
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
        mode: "text/x-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift",
        theme: "monokai"

});


	</script>
</body>
</html>