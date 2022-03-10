<?php 
require("koneksi.php");

$perintah = "SELECT * FROM dblaundry_13062";
$eksekusi = mysqli_query($koneksi, $perintah);
$cek = mysqli_affected_rows($koneksi);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id"] = $ambil -> id;
        $F["nama"] = $ambil -> nama;
        $F["alamat"] = $ambil -> alamat;
        $F["telepon"] = $ambil -> no_hp;
        $F["kota"] = $ambil -> kota;

        array_push($response["data"], $F);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Data tidak tersedia";
}

echo json_encode($response);
mysqli_close($koneksi);