<?php

require 'template.php';

$id = $_GET['id'];

$item = query("SELECT * FROM menu WHERE id = $id")[0];




if (isset($_POST['edit'])) {

    if (edit($_POST) > 0) {
        $_SESSION['success'] = "Data Berhasil Di Ubah";
        header('location: manage.php');
    } else {
        $_SESSION['fail'] = "Data Gagal Di Ubah";
        header('location: manage.php');
    }
}
?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card card-edit">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Edit Item</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $item['id']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Item</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $item['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $item['harga']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori">
                            <option selected><?= $item['kategori']; ?> </option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Ice Cream">IceCream</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="gambar" aria-describedby="emailHelp" name="gambar" value="<?= $item['gambar']; ?>">
                        <div id="emailHelp" class="form-text">Pastikan Format Gambar Sesuai</div>
                    </div>
                    <div class="modal-footer">
                        <a href="manage.php" type="button" class="btn btn-secondary" href="manage.php">Cancel</a>
                        <button type="submit" class="btn btn-orange" name="edit">Edit Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<?php

require 'footer.php'

?>