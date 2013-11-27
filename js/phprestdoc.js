function config_test()
{
	var alert_start = '<div class="alert alert-dismissable alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>';
	var alert_end = '</strong></div>';
	
	$('.alert').remove();
	$('.has-error').removeClass('has-error');
	
	// Empty MySQL Server
	if ($('#mysql_server').val() == '')
	{
		$('#mysql_server_parent').addClass('has-error');
		$('#mysql_server').focus();
		$('#mysql_server').after(alert_start + 'Don\'t forget your MySQL Server !' + alert_end);
		return;
	}
	
	// Empty MySQL Username
	if ($('#mysql_username').val() == '')
	{
		$('#mysql_username_parent').addClass('has-error');
		$('#mysql_username').focus();
		$('#mysql_username').after(alert_start + 'Don\'t forget your MySQL Username !' + alert_end);
		return;
	}
	
	// Empty MySQL Database
	if ($('#mysql_database').val() == '')
	{
		$('#mysql_database_parent').addClass('has-error');
		$('#mysql_database').focus();
		$('#mysql_database').after(alert_start + 'Don\'t forget your MySQL Database !' + alert_end);
		return;
	}
	
	// Empty MySQL Database
	if ($('#mysql_prefix').val() == '')
	{
		$('#mysql_prefix_parent').addClass('has-error');
		$('#mysql_prefix').focus();
		$('#mysql_prefix').after(alert_start + 'You need to enter a prefix for PhpRestDoc tables (i.e. "prd_").' + alert_end);
		return;
	}
	
	// Empty Administrator Name
	if ($('#user_name').val() == '')
	{
		$('#user_name_parent').addClass('has-error');
		$('#user_name').focus();
		$('#user_name').after(alert_start + 'You need to enter a name for the PhpRestDoc administrator account.' + alert_end);
		return;
	}
	
	// Empty Administrator Email
	if ($('#user_email').val() == '')
	{
		$('#user_email_parent').addClass('has-error');
		$('#user_email').focus();
		$('#user_email').after(alert_start + 'You need to enter an e-mail for the PhpRestDoc administrator account.' + alert_end);
		return;
	}
	
	// Empty Administrator Password
	if ($('#user_password').val() == '')
	{
		$('#user_password_parent').addClass('has-error');
		$('#user_password').focus();
		$('#user_password').after(alert_start + 'You need to enter a password for the PhpRestDoc administrator account.' + alert_end);
		return;
	}
	
	$('#button_install').addClass('hide');
	$('#button_testing').removeClass('hide');
	
	var data = 'mysql_server=' + $('#mysql_server').val() + '&mysql_username=' + $('#mysql_username').val() + '&mysql_password=' + $('#mysql_password').val() + '&mysql_database=' + $('#mysql_database').val();
	
	$.ajax({
		url : "ajax/installation_check.php",
		type: "POST",
		data : data,
		success: function(return_code)
		{
			if (return_code == 'mysql_connect')
			{
				$('#mysql_server_parent').addClass('has-error');
				$('#mysql_username_parent').addClass('has-error');
				$('#mysql_password_parent').addClass('has-error');
				$('#mysql_server').focus();
				$('#mysql_server').before(alert_start + 'We weren\'t able to connect to MySQL.<br>Please check again your Server Name, Username and Password :' + alert_end);
			}
			
			if (return_code == 'mysql_select_db')
			{
				$('#mysql_database_parent').addClass('has-error');
				$('#mysql_database').focus();
				$('#mysql_database').after(alert_start + 'This database doesn\'t seem to exist, manually create it if needed.' + alert_end);
			}
			
			if (return_code == 'writable')
			{
				$('#button_testing').after(alert_start + '"include" directory need to be writable !' + alert_end);
			}
			
			if (return_code == 'true')
			{
				data = data + '&mysql_prefix=' + $('#mysql_prefix').val() + '&user_name=' + $('#user_name').val() + '&user_email=' + $('#user_email').val() + '&user_password=' + $('#user_password').val();
				
				$.ajax({
					url : "ajax/install.php",
					type: "POST",
					data : data,
					success: function(return_code)
					{
						if (return_code == '') location.reload();
						else alert('Sorry but something went wrong... (3)');
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Sorry but something went wrong... (2)');
					}
				});
			}
			
			$('#button_testing').addClass('hide');
			$('#button_install').removeClass('hide');
		},
    error: function (jqXHR, textStatus, errorThrown)
    {
			alert('Sorry but something went wrong... (1)');
			
			$('#button_testing').addClass('hide');
			$('#button_install').removeClass('hide');
    }
	});
}