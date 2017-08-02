<?php
require_once 'includes/dbh.php';
include 'header.php';

define('TAXRATE', 0.13);

if ($cart_id != '') {
	$cartQ = $conn->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
	$result = mysqli_fetch_assoc($cartQ);
	$items = json_decode($result['items'], true);
	$i = 1;
	$sub_total = 0;
	$item_count = 0;
}
?>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous">
</script>

 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


<style type="text/css">
	.tth th {
		text-align: center;
	}
</style>

<div class="col-md-10" style="padding-top: 50px; margin-left: 150px;">
	<div class="row">
		<h2 class="text-center">My Shopping Cart</h2><hr>
		<?php if ($cart_id == '') : ?>
			<div class="bg-danger">
				<p class="text-center text-danger">Your shopping cart is empty!</p>
			</div>
		<?php else: ?>
			<table class="table table-bordered table-condensed table-striped">
				<thead><th>#</th><th>Item</th><th>Price</th><th>Quantity</th><th>Size</th><th>Sub Total</th></thead>
				<tbody>
					<?php
						foreach ($items as $item) {
							$product_id = $item['id'];
							$productQ = $conn->query("SELECT * FROM products WHERE id = '{$product_id}'");
							$product = mysqli_fetch_assoc($productQ);
							$sArray = array($product['size1'], $product['size2'], $product['size3']);
							?>

							<tr>
								<td><?= $i; ?></td>
								<td><?= $product['title']; ?></td>
								<td><?= $product['price']; ?> kn</td>
								<td>

								<button class="btn btn-xs btn-default" onclick="update_cart('removeone','<?= $product['id']; ?>', '<?= $item['size']; ?>');">-</button>
									<?= $item['quantity']; ?>
								<button class="btn btn-xs btn-default" onclick="update_cart('addone','<?= $product['id']; ?>', '<?= $item['size']; ?>');">+</button>

								</td>
								<td><?= $item['size']; ?></td>
								<td><?= $item['quantity'] * $product['price']; ?></td>
							</tr>
						<?php 
						$i++;
						$item_count += $item['quantity'];
						$sub_total += ($product['price'] * $item['quantity']);
						} 

						$tax = TAXRATE * $sub_total;
						$tax = number_format($tax, 2);
						$grand_total = number_format($tax + $sub_total, 2);
						?>
				</tbody>
			</table>

			<table class="table table-bordered table-condensed text-right">
				<legend>Totals</legend>
				<thead class="tth"><th>Total Items</th><th>Sub Total</th><th>Tax</th><th>Grand Total</th></thead>
				<tbody>
					<tr>
						<td><?= $item_count; ?></td>
						<td><?= $sub_total; ?> kn</td>
						<td><?= $tax; ?> kn</td>
						<td class="bg-success"><?= $grand_total; ?> kn</td>
					</tr>
				</tbody>
			</table>

			<!-- Checkout button -->
			<button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#checkoutModal">
			  <span class="glyphicon glyphicon-shopping-cart"></span> Check Out
			</button>
			
			<!-- Modal -->
			<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="checkoutModalLabel">Shipping Address</h4>
			      </div>
			      <div class="modal-body">
			      	<div class="row">
			        	<form action="thankYou.php" method="post" id="payment-form">
			        		<span class="bg-danger" id="payment-errors"></span>
			        		<div id="step1" style="display: block;">

			        			<div class="form-group col-md-6">
			        				<label for="full_name">Full Name:</label>
			        				<input class="form-control" id="full_name" name="full_name" type="text">
			        			</div>
			        			<div class="form-group col-md-6">
			        				<label for="email">Email::</label>
			        				<input class="form-control" id="email" name="email" type="email">
			        			</div>
			        			<div class="form-group col-md-6">
			        				<label for="street">Street Address:</label>
			        				<input class="form-control" id="street" name="street" type="text">
			        			</div>
			        			<div class="form-group col-md-6">
			        				<label for="city">City:</label>
			        				<input class="form-control" id="city" name="city" type="text">
			        			</div>
			        			<div class="form-group col-md-6">
			        				<label for="zip_code">Zip Code:</label>
			        				<input class="form-control" id="zip_code" name="zip_code" type="text">
			        			</div>
			        			<div class="form-group col-md-6">
			        				<label for="country">Country:</label>
			        				<input class="form-control" id="country" name="country" type="text">
			        			</div>

			        		</div>
			        		<div id="step2" style="display: none;">

			        			<div class="form-group col-md-3">
			        				<label for="name">Name on Card:</label>
			        				<input type="text" id="name" class="form-control">
			        			</div>
			        			<div class="form-group col-md-3">
			        				<label for="number">Card number:</label>
			        				<input type="text" id="number" class="form-control">
			        			</div>
			        			<div class="form-group col-md-2">
			        				<label for="cvc">CVC:</label>
			        				<input type="text" id="cvc" class="form-control">
			        			</div>
			        			<div class="form-group col-md-2">
			        				<label for="exp-month">Expire month:</label>
			        				<select id="exp-month" class="form-control">
			        					<option value=""></option>
			        					<?php for($i=1; $i<13; $i++) : ?>
			        						<option value="<?= $i; ?>"><?= $i; ?></option>
			        					<?php endfor; ?>
			        				</select>
			        			</div>
			        			<div class="form-group col-md-2">
			        				<label for="exp-year">Expire year:</label>
			        				<select id="exp-year" class="form-control">
			        					<option value=""></option>
			        					<?php $yr = date("Y"); ?>
			        					<?php for($i=0; $i<11; $i++) : ?>
			        						<option value="<?= $yr + $i; ?>"><?= $yr + $i; ?></option>
			        					<?php endfor; ?>
			        				</select>
			        			</div>
			        		</div>
			        </div> 
			      </div> 
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary" onclick="check_address();" id="next_button">Next</button>
			        <button type="button" class="btn btn-primary" onclick="back_address();" id="back_button" style="display: none;"><< Back</button>
			        <button type="submit" class="btn btn-primary" id="checkout_button" style="display: none;">Check Out
			        </button>
			        </form>
			      </div>
			    </div>
			  </div>
			</div>

		<?php endif; ?>
	</div>
</div>


<script>
function check_address(){
		var data = {
			'full_name' : jQuery('#full_name').val(),
			'email' : jQuery('#email').val(),
			'street' : jQuery('#street').val(),
			'city' : jQuery('#city').val(),
			'zip_code' : jQuery('#zip_code').val(),
			'country' : jQuery('#country').val()
		};
		jQuery.ajax({
			url : '/masa/check_address.php',
			method : 'POST',
			data : data,
			success : function(data){
				if (data != 'passed'){
					jQuery('#payment-errors').html(data);
				}
				if (data == 'passed') {
					jQuery('#payment-errors').html("");
					jQuery('#step1').css("display", "none");
					jQuery('#step2').css("display", "block");
					jQuery('#next_button').css("display", "none");
					jQuery('#back_button').css("display", "inline-block");
					jQuery('#checkout_button').css("display", "inline-block");
					jQuery('#checkoutModalLabel').html("Enter Your Card Details");
				}
			},
			error : function(){alert("Something went wrong.");},
		});
	}

    function update_cart(mode, edit_id, edit_size) {
        var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
        jQuery.ajax({
            url : '/masa/update_cart.php',
            method : "post",
            data : data,
            success : function(){location.reload();},
            error : function(){alert("Something went wrong!");},
        });
    }

	function back_address() {
		jQuery('#payment-errors').html("");
		jQuery('#step1').css("display", "block");
		jQuery('#step2').css("display", "none");
		jQuery('#next_button').css("display", "inline-block");
		jQuery('#back_button').css("display", "none");
		jQuery('#checkout_button').css("display", "none");
		jQuery('#checkoutModalLabel').html("Shipping Address");
	}
</script>