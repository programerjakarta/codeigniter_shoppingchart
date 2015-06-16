<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url(); ?>">Dumet Store</a>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo site_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
					<li><a id="cart" href="<?php echo site_url('toko/keranjang') ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Basket <span class="badge"><?php echo $this->cart->total_items(); ?></span></a></li>
					<?php if ($this->cart->total_items() > 0): ?>
						<li class="active" id="menu">
							<a href="<?php echo site_url("toko/login") ?>">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login
							</a>
						</li>
					<?php else: ?>
						<li id="menu"></li>
					<?php endif ?>
				</ul>
			</div>
		</nav>
		<div class="container">
			<legend>Login</legend>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary" id="login">Login</button>
		</div>

		<div class="modal fade" id="modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Info</h4>
					</div>
					<div class="modal-body">
						<code>
							<span class="glyphicon glyphicon-sign-info" aria-hidden="true"></span> 
							Your Account Is Incorrect!
						</code>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#login").click(function(event) {
					var username = $("#username").val();
					var password = $("#password").val();

					$.ajax({
						url: '<?php echo site_url("toko/auth") ?>',
						type: 'POST',
						data: {user: username, pass: password},
					})
					.done(function(str) {
						if (str == "1") {
							window.location = "<?php echo base_url() ?>";
						} else if (str == "0") {
							$('#modal').modal({
								keyboard: true,
								backdrop: "static"
							});
						};
					})
					.fail(function() {
						console.log("error");
					});
				});
			});
		</script>

	</body>
</html>