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
		
		<?php if (!isset($key_session) || isset($errors_config)) { ?>
		
		<div class="well" style="width: 90%; max-width: 640px; margin: 0 auto; margin-top: 80px;">
			<form class="bs-example form-horizontal">
				<fieldset>
					<legend>One Step Installation</legend>
					<div id="mysql_server_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_server" class="form-control" placeholder="MySQL Server" type="text" value="<?php echo $mysql_server; ?>">
						</div>
					</div>
					<div id="mysql_username_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_username" class="form-control" placeholder="MySQL Username" type="text" value="<?php echo $mysql_username; ?>">
						</div>
					</div>
					<div id="mysql_password_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_password" class="form-control" placeholder="MySQL Password" type="password" value="<?php echo $mysql_password; ?>">
						</div>
					</div>
					<div id="mysql_database_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_database" class="form-control" placeholder="MySQL Database" type="text" value="<?php echo $mysql_database; ?>">
						</div>
					</div>
					<div id="mysql_prefix_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_prefix" class="form-control" placeholder="MySQL Tables Prefix (i.e. 'prd_')" type="text" value="<?php echo $mysql_prefix; ?>">
						</div>
					</div>
					<div id="user_name_parent" class="form-group">
						<div class="col-lg-12">
							<input id="user_name" class="form-control" placeholder="Administrator Name" type="text">
						</div>
					</div>
					<div id="user_email_parent" class="form-group">
						<div class="col-lg-12">
							<input id="user_email" class="form-control" placeholder="Administrator E-mail" type="text">
						</div>
					</div>
					<div id="user_password_parent" class="form-group">
						<div class="col-lg-12">
							<input id="user_password" class="form-control" placeholder="Administrator Password" type="password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<span id="button_install" class="btn btn-primary" onclick="config_test();">INSTALL AND BEGIN »</span> 
							<span id="button_testing" class="btn btn-info hide">TESTING...</span> 
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		
		<?php
			} else {
				
				require_once 'content/' . $_GET['c'] . '.php';
				
			}
		?>
		
  </body>
	
</html>
