<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>toko</title>
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
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url(); ?>">Dumet Store</a>
			</div>
		
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo site_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
					<li class=""><a id="cart" href="<?php echo site_url() ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Basket</a> <span class="badge">0</span></li>
				</ul>
				<!-- <ul class="nav navbar-nav navbar-right">
					<li><a href="#">Link</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li>
				</ul> -->
			</div><!-- /.navbar-collapse -->
		</nav>


		<div class="container">
		<?php if ($row->num_rows() > 0): ?>
			<?php foreach ($row->result() as $key => $value): ?>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h3 class="panel-title"><?php echo $value->title; ?></h3>
						  </div>
						  <div class="panel-body">
						  	<img src="<?php echo $value->image; ?>" class="img-responsive" alt="Image">
						  	<hr>
								<blackquote><?php echo word_limiter($value->description,22) ?></blackquote>
								Rp. <?php echo number_format($value->price,0,".",".") ?>
						  </div>
						  <div class="panel-footer">
								<button type="button" class="btn btn-success btn<?php echo $value->id ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to chart</button>
								<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>More...</button>
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
												top: $(".badge").offset().top,
												left: $(".badge").offset().left,
												opacity: 0.5 
											},1000,function(){
												$(this).fadeOut();
												$('.badge').effect('highlight','',3000);
											});
									});
								});
							</script>

					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
		</div>
		<!-- jQuery -->
		
		
	</body>
</html>