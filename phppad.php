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

ob_start();
        if(!$_REQUEST['submit']){
        ?>
        <div class="warning">Warning: Do not upload to public web server. For local use only</div>
        <?php
          }
    
    $page['warning'] = ob_get_contents();
    ob_end_clean();


?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Pad </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">

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
    <script src="js/vendor/jquery-1.11.2.min.js"></script>
            <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    	

</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PHPPad</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right" role="form">
            <div class="form-group  ">
                   <label  >Theme:</label>
                    <select class="form-control" id="cmbtheme">
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
             
             
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>


    <div class="header">
    <div id = "themechooser">
        
        </div>
    

     
    
    </div>
    <div class="content">
    	Code: 

    	<form id="padform" method="POST" action = "">
        
        
        
        <?php
        
        echo  $page['warning'];
        
        ?>

            <!-- Code window -->
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
