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
		<style type="text/css">.container{margin-top:90px}</style>
		<script type="text/javascript">
		// http://goo.gl/tnBP7L
		function rupiah(nStr) {
		    nStr += '';
		    x = nStr.split('.');
		    x1 = x[0];
		    x2 = x.length > 1 ? '.' + x[1] : '';
		    var rgx = /(\d+)(\d{3})/;
		    while (rgx.test(x1)) {
		        x1 = x1.replace(rgx, '$1' + '.' + '$2');
		    }
		    return x1 + x2;
		}
		</script>
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
					<li class="active"><a id="cart" href="<?php echo site_url('toko/keranjang') ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Basket <span class="badge"><?php echo $this->cart->total_items(); ?></span></a></li>
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
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php if ($this->cart->total() > 0): ?>
						<?php $i = 1; foreach ($this->cart->contents() as $key => $value): ?>
							<tr id="tr<?php echo $value["id"] ?>">
								<td><?php echo $i ?>.</td>
								<td><?php echo $value["name"] ?></td>
								<td><img src="<?php echo $value['options']['image']; ?>" width="56"></td>
								<td class="text-right"><input type="text" name="<?php echo $value["price"] ?>" id="<?php echo $value["rowid"] ?>" class="input<?php echo $value["id"] ?> form-control" maxlength="3" value="<?php echo $value['qty']; ?>" size="5"></td>
								<td class="text-right"><?php echo number_format($value['price'],0,",",".") ?></td>
								<td class="text-right hasilUbah<?php echo $value["id"] ?>"><?php echo number_format($value['qty']*$value['price'],0,",",".") ?></td>
								<td class="text-right">
									<button type="button" class="btn btn-danger btn<?php echo $value["id"] ?>" id="<?php echo $value["rowid"] ?>">
										<span class="glyphicon glyphicon-trash class="text-right"" aria-hidden="true"></span>
									</button>
								</td>
							</tr>

							<div class="modal fade" id="modal<?php echo $value["id"] ?>">
							  	<div class="modal-dialog">
							  		<div class="modal-content">
							  			<div class="modal-header">
							  				<h4 class="modal-title">Info</h4>
							  			</div>
							  			<div class="modal-body">
											<code>
												<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> 
												Kuantitas Tidak Boleh Kosong!
											</code>
							  			</div>
							  			<div class="modal-footer">
							  				<button id="<?php echo $value["qty"] ?>" type="button" class="close<?php echo $value["id"] ?> btn btn-default" data-dismiss="modal">Close</button>
							  			</div>
							  		</div>
							  	</div>
							</div>

							<script type="text/javascript">
								// http://goo.gl/Fz4wn
								$(document).on("hide.bs.modal", "#modal<?php echo $value["id"] ?>", function(event) {
									var getOldQty = $(".close<?php echo $value["id"] ?>").attr("id");
									$(".input<?php echo $value["id"] ?>").effect("highlight","",3000).val(getOldQty);
								});

								$(".input<?php echo $value["id"] ?>").keyup(function(event) {
									var getNewQty = $(".input<?php echo $value["id"] ?>").val();
									
									if (getNewQty == "" || getNewQty == "0") {
										$('#modal<?php echo $value["id"] ?>').modal({
											keyboard: true,
											backdrop: "static"
										});
									} else {
										$.ajax({
											url: '<?php echo site_url("toko/ubah") ?>',
											type: 'POST',
											data: {
												get_rowid: $(".input<?php echo $value["id"] ?>").attr("id"),
												get_qty: getNewQty,
												get_price: $(".input<?php echo $value["id"] ?>").attr("name"),
											},
										})
										.done(function(str) {
											var data_array = str.split("/");

											$('.badge').effect("highlight","",3000).text(data_array[1]);
											$('.subtotal').effect("highlight","",3000).html(rupiah(data_array[0]));
											$('.hasilUbah<?php echo $value["id"] ?>').effect("highlight","",3000).html(rupiah(data_array[2]*data_array[3]));
										}).always(function() {
											console.log("complete");
										});
									};
								});

								$(".btn<?php echo $value["id"] ?>").click(function(event) {
									$.ajax({
										url: '<?php echo site_url("toko/hapus") ?>',
										type: 'POST',
										data: {rowid: $(".btn<?php echo $value["id"] ?>").attr("id")},
									})
									.done(function(str) {
										$("#tr<?php echo $value["id"] ?>").fadeOut(1000);

										var data_array = str.split("/");

										$('.badge').effect("highlight","",3000).text(data_array[1]);
										$('.subtotal').effect("highlight","",3000).html(rupiah(data_array[0]));
									})
									.fail(function() {
										console.log("error");
									});
								});
							</script>
						<?php $i++; endforeach ?>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th class="text-right">Subtotal</th>
							<th class="text-right subtotal"><?php echo number_format($this->cart->total(),0,".",".") ?></th>
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
	</body>
</html>