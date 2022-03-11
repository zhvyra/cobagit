<?php

require 'functions.php';

$id = $_GET['id'];




if (hapus($id) > 0) {
    $_SESSION['success'] = "Data Berhasil Di Hapus";
    header('location: manage.php');
} else {
    $_SESSION['fail'] = "Data Gagal Di Hapus";
    header('location: manage.php');
}
