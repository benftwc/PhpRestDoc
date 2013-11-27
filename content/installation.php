		<div class="well" style="width: 90%; max-width: 640px; margin: 0 auto; margin-top: 80px;">
			<form class="bs-example form-horizontal">
				<fieldset>
					<legend>One-Step-Installation</legend>
					<div id="mysql_server_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_server" class="form-control" placeholder="MySQL Server" type="text">
						</div>
					</div>
					<div id="mysql_username_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_username" class="form-control" placeholder="MySQL Username" type="text">
						</div>
					</div>
					<div id="mysql_password_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_password" class="form-control" placeholder="MySQL Password" type="password">
						</div>
					</div>
					<div id="mysql_database_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_database" class="form-control" placeholder="MySQL Database" type="text">
						</div>
					</div>
					<div id="mysql_prefix_parent" class="form-group">
						<div class="col-lg-12">
							<input id="mysql_prefix" class="form-control" placeholder="MySQL Tables Prefix (i.e. 'prd_')">
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
