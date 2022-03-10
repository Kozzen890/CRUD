<?php 
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $kota = $_POST["kota"];

    $perintah = "INSERT INTO dblaundry_13062 (nama, alamat, no_hp, kota) VALUES('$nama', '$alamat', '$no_hp', '$kota')";
    $eksekusi = mysqli_query($koneksi,$perintah);
    $cek = mysqli_affected_rows($koneksi);

    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Data berhasil tersimpan";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menyimpan";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada post data";
}

echo json_encode($response);
mysqli_close($koneksi);