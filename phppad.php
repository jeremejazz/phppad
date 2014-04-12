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
$page = array();
 
?>

<!DOCTYPE html />

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PHP Pad </title>
	<script src="codemirror/lib/codemirror.js"></script>
<link rel="stylesheet" href="codemirror/lib/codemirror.css">
<link rel="stylesheet" href="codemirror/theme/monokai.css">

    <link rel="stylesheet" href="codemirror/theme/neat.css">
    <link rel="stylesheet" href="codemirror/theme/elegant.css">
    <link rel="stylesheet" href="codemirror/theme/erlang-dark.css">
    <link rel="stylesheet" href="codemirror/theme/night.css">
    <link rel="stylesheet" href="codemirror/theme/monokai.css">
    <link rel="stylesheet" href="codemirror/theme/cobalt.css">
    <link rel="stylesheet" href="codemirror/theme/eclipse.css">
    <link rel="stylesheet" href="codemirror/theme/rubyblue.css">
    <link rel="stylesheet" href="codemirror/theme/lesser-dark.css">
    <link rel="stylesheet" href="codemirror/theme/xq-dark.css">
    <link rel="stylesheet" href="codemirror/theme/xq-light.css">
    <link rel="stylesheet" href="codemirror/theme/ambiance.css">
    <link rel="stylesheet" href="codemirror/theme/blackboard.css">
    <link rel="stylesheet" href="codemirror/theme/vibrant-ink.css">
    <link rel="stylesheet" href="codemirror/theme/solarized.css">
    <link rel="stylesheet" href="codemirror/theme/twilight.css">
    <link rel="stylesheet" href="codemirror/theme/midnight.css">


<link rel="stylesheet" href="css/styles.css">
<script src="codemirror/mode/clike/clike.js"></script>
<script src="codemirror/mode/php/php.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>

	

</head>
<body>

    <div class="header">


    <div id = "themechooser">
                <iframe src="http://ghbtns.com/github-btn.html?user=jeremejazz&repo=phppad&type=fork"
  allowtransparency="true" frameborder="0" scrolling="0" width="62" height="20"></iframe>
         Select a theme: 
        <select  id="cmbtheme">
            <option selected>default</option>
            <option>ambiance</option>
            <option>blackboard</option>
            <option>cobalt</option>
            <option>eclipse</option>
            <option>elegant</option>
            <option>erlang-dark</option>
            <option>lesser-dark</option>
            <option>midnight</option>
            <option selected>monokai</option>
            <option>neat</option>
            <option>night</option>
            <option>rubyblue</option>
            <option>solarized dark</option>
            <option>solarized light</option>
            <option>twilight</option>
            <option>vibrant-ink</option>
            <option>xq-dark</option>
            <option>xq-light</option>
        </select>
        </div>
    
    <div class="logo"></div>
     
    
    </div>
    <div class="content">
    	Code: 

    	<form id="padform" method="POST" action = "">
        
        
        
 

            <!-- Code window -->
    		<textarea id="codearea" name="code" rows="8"><?php echo $_REQUEST['code']; ?></textarea> <br/>
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
