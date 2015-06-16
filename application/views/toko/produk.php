<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Produk</title>
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

		<?php if ($this->session->flashdata("success")): ?>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#modal_success').modal({
						keyboard: true,
						backdrop: "static"
					});
				});
			</script>
			<div class="modal fade" id="modal_success">
				<div class="modal-dialog">
					<div class="modal-content">a
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Info</h4>
						</div>
						<div class="modal-body">
							<span class="glyphicon glyphicon-info-sign-in" aria-hidden="true"></span> 
							<?php echo $this->session->flashdata("success") ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success btn-xs" data-dismiss="modal">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close
							</button>
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

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
					<li class="active"><a href="<?php echo site_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
					<li><a id="cart" href="<?php echo site_url('toko/keranjang') ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Basket <span class="badge" id="badge"><?php echo $this->cart->total_items(); ?></span></a></li>
					<?php if ($this->session->userdata("logged_in")): ?>
						<li>
							<a href="<?php echo site_url("toko/checkout") ?>">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Checkout</span>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url("toko/logout") ?>">
								<span class="glyphicon glyphicon-sign-out" aria-hidden="true"></span> Logout <span class="badge"><?php echo $this->session->userdata("username") ?></span>
							</a>
						</li>
					<?php else: ?>
						<?php if ($this->cart->total_items() > 0): ?>
							<li id="menu">
								<a href="<?php echo site_url("toko/login") ?>">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login
								</a>
							</li>
						<?php else: ?>
							<li id="menu"></li>
						<?php endif ?>
					<?php endif ?>
				</ul>
			</div>
		</nav>
		<div class="container">
		<?php if ($row->num_rows() > 0): ?>
			<?php foreach ($row->result() as $key => $value): ?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h3 class="panel-title"><?php echo $value->title; ?></h3>
						  </div>
						  <div class="panel-body">
						  	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						  		<img src="<?php echo $value->image; ?>" class="img-responsive" alt="Image">
						  	</div>
						  	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						  		<blackquote><?php echo $value->description ?></blackquote>
								<hr>
								Rp. <?php echo number_format($value->price,0,".",".") ?>
						  	</div>
						  </div>
						  <div class="panel-footer">
								<button type="button" class="btn-xs btn btn-success btn<?php echo $value->id ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart</button>
								<a href="<?php echo site_url("toko/produk/".$value->id) ?>" class="btn-xs btn btn-warning"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> More...</a>
						  </div>

						  <div class="modal fade" id="modal<?php echo $value->id ?>">
						  	<div class="modal-dialog">
						  		<div class="modal-content">
						  			<div class="modal-header">
						  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						  				<h4 class="modal-title"><?php echo $value->title; ?></h4>
						  			</div>
						  			<div class="modal-body">
						  				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						  					<img src="<?php echo $value->image; ?>" class="img-responsive" alt="Image" width="240">
						  				</div>
						  				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						  					<blackquote><?php echo word_limiter($value->description,27) ?></blackquote>
						  					<hr>
											Rp. <?php echo number_format($value->price,0,".",".") ?>
						  				</div>
						  				<div style="clear:both"></div>
						  			</div>
						  			<div class="modal-footer">
						  				<button id="<?php echo $value->id ?>" type="button" class="buy<?php echo $value->id ?> btn btn-danger btn-xs" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close</button>
						  				<a class="btn btn-warning btn-xs" href="<?php echo site_url('toko/keranjang'); ?>" role="button"><span class="glyphicon glyphicon-sign-out" aria-hidden="true"></span> Check out</a>
						  			</div>
						  		</div>
						  	</div>
						  </div>
						  	<script type="text/javascript">
								jQuery(document).ready(function($) {
									$(".btn<?php echo $value->id ?>").click(function(event) {
										$(this)
											.clone()
											.appendTo('body')
											.css({
												position: 'absolute',
												top: $(this).offset().top,
												left: $(this).offset().left,
												opacity:100
											})
											.animate({
												top: $("#badge").offset().top,
												left: $("#badge").offset().left,
												opacity: 0.5 
											},1000,function(){
												$(this).fadeOut();
												$('#badge').effect('highlight','',1000);
												$('#modal<?php echo $value->id ?>').modal({
													keyboard: true,
													backdrop: "static"
												});
											});

											$.ajax({
												url: '<?php echo site_url("toko/beli") ?>',
												type: 'POST',
												data: {id: $(".buy<?php echo $value->id ?>").attr("id")},
											})
											.done(function(str) {
												if (str) {
													$('#menu')
													.effect("highlight","",1000)
													.html('<a href="<?php echo site_url("toko/login") ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a>');

													$('#badge').effect("highlight","",1000).text(str);
												};
											})
											.fail(function() {
												console.log("error");
											})
											.always(function() {
												console.log("complete");
											});
											
									});
								});
							</script>

					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
		</div>
	</body>
</html>