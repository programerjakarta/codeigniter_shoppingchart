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
		<style type="text/css">.container{margin-top: 90px;}</style>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
					<li class=""><a href="<?php echo site_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
					<li class="active"><a id="cart" href="<?php echo site_url('toko/keranjang') ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Basket <span class="badge"><?php echo $this->cart->total_items(); ?></span></a></li>
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
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name.</th>
						<th class="text-right">Qty.</th>
						<th class="text-right">Price.</th>
						<th class="text-right">Total.</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php if ($this->cart->total() > 0): ?>
						<?php $i = 1; foreach ($this->cart->contents() as $key => $value): ?>
							<tr id="tr<?php echo $value['id']; ?>">
								<td><?php echo $i ?></td>
								<td><?php echo $value["name"] ?><hr><img src="<?php echo $value['options']['image']; ?>" width="96"></td>
								<td class="text-right"><input type="text" name="" id="qty<?php echo $value['id']; ?>" class="form-control" value="<?php echo $value['qty']; ?>" required="required" pattern="" title="">	</td>
								<td class="text-right"><?php echo number_format($value['price'],0,",",".") ?></td>
								<td class="text-right"><?php echo number_format($value['qty']*$value['price'],0,",",".") ?></td>
								<td class="text-right">
									<button type="button" class="btn btn-danger btn<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
										<span class="glyphicon glyphicon-trash class="text-right"" aria-hidden="true"></span>
									</button>
								</td>
							</tr>
							<script type="text/javascript">
							$(".btn<?php echo $value['id']; ?>").click(function(event) {
								console.log($(".btn<?php echo $value['id']; ?>").attr('id'));
								$.ajax({
									url: '<?php echo site_url("toko/hapus") ?>',
									type: 'POST',
									data: {rowid: $(".btn<?php echo $value['id']; ?>").attr('id')},
								})
								.done(function(str) {
									$("#tr<?php echo $value['id']; ?>").fadeOut(1000);
									var data = str.split('/');
									console.log(data[1]);
									console.log(data[0]);
									$('.badge').effect("highlight","",3000).text(data[1]);
									$('.subtotal').effect("highlight","",3000).text(data[0]);
								})
								.fail(function() {
									console.log("error");
								})
								.always(function() {
									console.log("complete");
								});
								
							});
							</script>
						<?php $i++; endforeach ?>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th class="text-right">Subtotal</th>
							<th class="text-right subtotal"><?php echo number_format($this->cart->total(),0,".",",") ?></th>
							<th></th>
						</tr>
					<?php else : ?>
						<tr>
							<td colspan="6">Tidak ada product yang dibeli</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
		<!-- jQuery -->
		
		
	</body>
</html>