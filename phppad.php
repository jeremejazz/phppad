<?php
/*PHP Pad*/

/*Turn off magic quotes before using */

?>

<!DOCTYPE html />

<html>
<head>
	<title>PHP Pad </title>
	<script src="codemirror/lib/codemirror.js"></script>
<link rel="stylesheet" href="codemirror/lib/codemirror.css">
<link rel="stylesheet" href="codemirror/theme/monokai.css">
    <script src="codemirror/mode/clike/clike.js"></script>
<script src="codemirror/mode/php/php.js"></script>

	<style type="text/css">
		.warning{
			border: dotted 1px red ;
			background-color: yellow;
			color:red;
		}
		#output{
			border: dotted 1px black;
			min-height: 100px;
			padding:10px;
		}

		.button { 
     border-top: 1px solid #96d1f8;
     background: #000896;
     background: -webkit-gradient(linear, left top, left bottom, from(#004be0), to(#000896));
     background: -moz-linear-gradient(top, #004be0, #000896);
     padding: 8px 16px;
     -webkit-border-radius: 11px;
     -moz-border-radius: 11px;
     border-radius: 11px;
     -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
     -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
     box-shadow: rgba(0,0,0,1) 0 1px 0;
     text-shadow: rgba(0,0,0,.4) 0 1px 0;
     color: white;
     font-size: 13px;
     font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
     text-decoration: none;
     vertical-align: middle;
     cursor:pointer;
  }
  .button:hover { 
     border-top-color: #000ea6;
     background: #000ea6;
     color: #ccc;
  }
  .button:active { 
     border-top-color: #1b435e;
     background: #1b435e;
  }
  .bottomtools{
  	text-align: right;
  }
	</style>

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
				eval( $_REQUEST['code']);

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