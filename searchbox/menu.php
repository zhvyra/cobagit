<?php

require '../functions.php';

$keyword = $_GET['keyword'];
$query = "SELECT * FROM menu
            WHERE
          nama LIKE '%$keyword%' OR
          harga LIKE '%$keyword%'";

$menu = query($query);


?>

<!-- card -->
<div class="content row row-cols-1 row-cols-md-5 g-5 mx-2 text-center">
    <?php foreach ($menu as $m) : ?>
        <div class="col">
            <div class="card text-light mb-1 hover-zoom">
                <div class="card-head"><?= $m['nama']; ?></div>
                <div class="card-img">
                    <img src="img/<?= $m['gambar']; ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body rounded-bottom">
                    <p class="price">Rp. <?= $m['harga']; ?></p>
                    <button class="btn btn-dark" type="button">-</button>
                    <small class="text-muted">0</small>
                    <button class="btn btn-dark" type="button">+</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- end card -->