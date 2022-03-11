<?php
session_start();
ob_start();


//koneksi database
$conn = mysqli_connect("localhost", "root", "", "kedai");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};


function tambah($data)
{
    global $conn;

    $nama = $data['nama'];
    $harga = $data['harga'];
    $kategori = $data['kategori'];
    $gambar = $data['gambar'];

    $query = "INSERT INTO menu
                VALUES
            ('', '$nama', '$harga', '$kategori', '$gambar')";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
};



function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM menu WHERE id = $id");

    return mysqli_affected_rows($conn);
};



function edit($data)
{
    global $conn;

    $id = $data['id'];
    $nama = $data['nama'];
    $harga = $data['harga'];
    $kategori = $data['kategori'];
    $gambar = $data['gambar'];

    $query = "UPDATE menu SET
                nama = '$nama',
                harga = '$harga',
                kategori = '$kategori',
                gambar = '$gambar'
              WHERE id = $id
                ";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
};
