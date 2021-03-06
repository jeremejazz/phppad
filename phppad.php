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


    <link rel="stylesheet" href="css/codemirror.css">
    <link rel="stylesheet" href="css/themes/monokai.css">

    <link rel="stylesheet" href="css/themes/neat.css">
    <link rel="stylesheet" href="css/themes/elegant.css">
    <link rel="stylesheet" href="css/themes/erlang-dark.css">
    <link rel="stylesheet" href="css/themes/night.css">
    <link rel="stylesheet" href="css/themes/monokai.css">
    <link rel="stylesheet" href="css/themes/cobalt.css">
    <link rel="stylesheet" href="css/themes/eclipse.css">
    <link rel="stylesheet" href="css/themes/rubyblue.css">
    <link rel="stylesheet" href="css/themes/lesser-dark.css">
    <link rel="stylesheet" href="css/themes/xq-dark.css">
    <link rel="stylesheet" href="css/themes/xq-light.css">
    <link rel="stylesheet" href="css/themes/ambiance.css">
    <link rel="stylesheet" href="css/themes/blackboard.css">
    <link rel="stylesheet" href="css/themes/vibrant-ink.css">
    <link rel="stylesheet" href="css/themes/solarized.css">
    <link rel="stylesheet" href="css/themes/twilight.css">
    <link rel="stylesheet" href="css/themes/midnight.css">

    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/codemirror/codemirror.js"></script>
    <script src="js/vendor/placeholder.js"></script>
    <script src="js/vendor/codemirror/addon/edit/matchbrackets.js"></script>
    <script src="js/vendor/codemirror/mode/css/css.js"></script>
    <script src="js/vendor/codemirror/mode/xml/xml.js"></script>
    <script src="js/vendor/codemirror/mode/javascript/javascript.js"></script>
    <script src="js/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>

    <script src="js/vendor/codemirror/mode/clike/clike.js"></script>
    <script src="js/vendor/codemirror/mode/php/php.js"></script>

    <script src="js/vendor/jquery-1.11.2.min.js"></script>
     <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    	

</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
   <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
    <div class="container">
    	 

    	<form id="padform" method="POST" action = "">
        
        
        
        <?php
        
        echo  $page['warning'];
        
        ?>

            <!-- Code window -->
    		<textarea id="codearea" name="code" rows="10" placeholder="Code goes here (ex. : &lt;php  ... ?&gt;)"><?php echo $_REQUEST['code']; ?></textarea> <br/>
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
        <footer>
        <small>Brought to you by <a href="http://jeremecausing.com">Jereme</a></small>
      </footer>
</div><!--.container -->

	<script type="text/javascript" src="js/phppad.js"></script>
</body>
</html>
