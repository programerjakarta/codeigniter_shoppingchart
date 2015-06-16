<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Checkout</title>
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
		<style type="text/css">.container{margin-top:90px;}</style>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
					<li class=""><a href="<?php echo site_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
					<li><a id="cart" href="<?php echo site_url('toko/keranjang') ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Basket <span class="badge"><?php echo $this->cart->total_items(); ?></span></a></li>
					<?php if ($this->session->userdata("logged_in")): ?>
						<li class="active">
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
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name.</th>
						<th>Image.</th>
						<th class="text-right">Qty.</th>
						<th class="text-right">Price.</th>
						<th class="text-right">Total.</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($this->cart->total() > 0): ?>
						<?php $i = 1; foreach ($this->cart->contents() as $key => $value): ?>
							<tr class="tr" id="tr<?php echo $value["id"] ?>">
								<td><?php echo $i ?>.</td>
								<td><?php echo $value["name"] ?></td>
								<td><img src="<?php echo $value['options']['image']; ?>" width="56"></td>
								<td class="text-right"><?php echo $value['qty']; ?></td>
								<td class="text-right"><?php echo number_format($value['price'],0,",",".") ?></td>
								<td class="text-right hasilUbah<?php echo $value["id"] ?>"><?php echo number_format($value['qty']*$value['price'],0,",",".") ?></td>
							</tr>
						<?php $i++; endforeach ?>
						<tr class="tr">
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th class="text-right">Subtotal</th>
							<th class="text-right"><?php echo number_format($this->cart->total(),0,".",".") ?></th>
						</tr>
						<tr class="tr">
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th class="text-right"></th>
							<th class="text-right">
								<a href="<?php echo site_url("toko/index") ?>" class="btn btn-default">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Continue Shopping
								</a>
								<a href="<?php echo site_url("toko/finish") ?>" class="btn btn-success">
									<span class="glyphicon glyphicon-off" aria-hidden="true"></span> Finish
								</a>
							</th>
						</tr>
					<?php else : ?>
						<tr><td colspan="6">Tidak ada product yang dibeli</td></tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</body>
</html>