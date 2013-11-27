<?php
	set_include_path(dirname(__FILE__) . PATH_SEPARATOR . get_include_path());
	require_once 'include/header.php';
?>
<!DOCTYPE html>
<html lang="en">
  
	<head>
    
		<meta charset="utf-8">
    <title>PhpRestDoc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- JQuery -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<!-- Bootstrap -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    
		<!-- Bootswatch : Yeti Theme -->
    <link href="//netdna.bootstrapcdn.com/bootswatch/3.0.2/yeti/bootstrap.min.css" rel="stylesheet">
    
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
		<!-- PhpRestDoc Javascript -->
		<script src="js/phprestdoc.js"></script>
		
	</head>
	
  <body>
		
		<div class="navbar navbar-default">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?">PhpRestDoc</a>
			</div>
			
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li<?php if ($_GET['c'] == 'documentation') echo ' class="active"' ?>><a href="?">Documentation</a></li>
<?php if (isset($_SESSION['user_id'])) { ?>
					<li<?php if ($_GET['c'] == 'administration') echo ' class="active"' ?>><a href="?c=administration">Administration</a></li>
<?php } ?>
				</ul>
<?php if (isset($_SESSION['user_id'])) { ?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="?a=user_disconnect">Disconnection</a></li>
				</ul>
<?php } else { ?>
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" placeholder="Email" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" placeholder="Password" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary btn-sm">SIGN IN</button>
				</form>
<?php } ?>
			</div>
			
		</div>
		
		<?php
			if (!isset($key_session) || isset($errors_config))
			{
				require_once 'content/installation.php';
			}
			else
			{
				require_once 'content/' . $_GET['c'] . '.php';
			}
		?>
		
  </body>
	
</html>
