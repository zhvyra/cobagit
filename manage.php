<?php
require 'template.php';


?>



<!-- Tablee -->
<div class="container d-flex">
    <table class="table table-hover table-responsive table-borderless text-center align-middle">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($menu as $m) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><img src="img/<?= $m['gambar']; ?>" alt=""></td>
                    <td><?= $m['nama']; ?></td>
                    <td><?= number_format($m['harga'], 2, ",", "."); ?></td>
                    <td><?= $m['kategori']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $m['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $m['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>







<?php

require 'footer.php'

?>