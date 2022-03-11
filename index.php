<?php

require 'template.php';

if (isset($_POST["add_to_cart"])) {
	if (isset($_SESSION["shopping_cart"])) {
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if (!in_array($_GET["id"], $item_array_id)) {
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		} else {
			$_SESSION['fail'] = "Item Sudah Ada Di Keranjang, Remove Item Jika Ingin Menambahkan Item";
			header('location: index.php');
		}
	} else {
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "delete") {
		foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			if ($values["item_id"] == $_GET["id"]) {
				unset($_SESSION["shopping_cart"][$keys]);
				$_SESSION['success'] = "Item Berhasil Di Hapus Dari Keranjang";
				header('location: index.php');
			}
		}
	} else if ($_GET["action"] == "clearall") {
		unset($_SESSION["shopping_cart"]);
		$_SESSION['success'] = "Keranjang Berhasil Di Hapus";
		header('location: index.php');
	}
}




?>






<!-- card -->
<div class="content row row-cols-1 row-cols-md-5 g-5 mx-2 text-center mb-5">
	<?php foreach ($menu as $m) : ?>
		<div class="col">
			<div class="card text-light mb-1 hover-zoom pt-2">
				<div class="card-head"><?= $m['nama']; ?></div>
				<div class="card-img">
					<img src="img/<?= $m['gambar']; ?>" class="card-img-top" alt="...">
				</div>
				<div class="card-foot">

					<p class="price">Rp. <?= number_format($m['harga'], 2, ",", "."); ?></p>
					<form method="post" action="index.php?action=add&id=<?php echo $m["id"]; ?>">
						<div class="mx-4 px-2 me-3 ms-4">
							<input type="number" value="0" min="0" max="1000" step="1" name="quantity" />
						</div>
						<input type="hidden" name="hidden_name" id="hidden_name" value="<?= $m['nama']; ?>">
						<input type="hidden" name="hidden_price" id="hidden_price" value="<?= $m['harga']; ?>">
						<button type="submit" name="add_to_cart" id="add_to_cart" class="btn btn-orange py-2 mt-2 px-3 ms-2">Add to Cart </button>
					</form>
				</div>

			</div>
		</div>
	<?php endforeach; ?>
</div>
<!-- end card -->



<?php
if (!empty($_SESSION["shopping_cart"])) {
	$total = 0;

?>
	<div class="container p-5">
		<h2>Order Details</h2>
		<div class="table-responsive table-total">
			<table class="table table-hover table-responsive text-center align-middle">
				<tr>
					<th width="40%">Item Name</th>
					<th width="10%">Quantity</th>
					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
				</tr>

				<?php foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>

					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>Rp. <?php echo number_format($values["item_price"], 2, ',', '.'); ?></td>
						<td>Rp. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2, ',', '.'); ?></td>
						<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn btn-outline-danger">Remove</span></a></td>
					</tr>
				<?php
					$total = $total + ($values["item_quantity"] * $values["item_price"]);
				}
				?>
				<tr>
					<td colspan="3">Total</td>
					<td>Rp. <?php echo number_format($total, 2, ',', '.'); ?></td>
					<td><a href="index.php?action=clearall"><span class="btn btn-outline-success">Hapus Semua</span></a></td>
				</tr>
			<?php
		}
			?>

			</table>
		</div>
	</div>




	<?php

	require 'footer.php';

	?>