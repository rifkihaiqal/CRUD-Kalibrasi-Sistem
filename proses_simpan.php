<?php
// panggil file config.php untuk koneksi ke database
require_once "config/config.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $equipment              = $mysqli->real_escape_string(trim($_POST['equipment']));
    $area                   = $mysqli->real_escape_string(trim($_POST['area']));
    $actual                 = $mysqli->real_escape_string(trim($_POST['actual']));
    $caldate                = $mysqli->real_escape_string(trim(date('Y-m-d', strtotime($_POST['caldate']))));
    $frekuensi              = $mysqli->real_escape_string(trim($_POST['frekuensi']));
    $merk                   = $mysqli->real_escape_string(trim($_POST['merk']));
    $itemcheck              = $mysqli->real_escape_string(trim($_POST['itemcheck']));
    $nama_file              = $_FILES['foto']['name'];
    $tmp_file               =$_FILES ['foto']['tmp_name'];
    // Set path folder tempat menyimpan filenya
    $path               = "foto/".$nama_file;

    // perintah query untuk mengecek equipment
    $result = $mysqli->query("SELECT equipment FROM pegawai WHERE equipment='$equipment'")
                              or die('Ada kesalahan pada query tampil data equipment: '.$mysqli->error);
    $rows = $result->num_rows;
    // jika equipment sudah ada
    if ($rows > 0) {
        // tampilkan pesan gagal simpan data
        header("location: index.php?alert=4&equipment=$equipment");
    } 
    // jika equipment belum ada
    else {  
        // upload file
        if(move_uploaded_file($tmp_file, $path)) {
            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel pegawai
            $insert = $mysqli->query("INSERT INTO pegawai(equipment,area,actual,caldate,frekuensi,merk,itemcheck,foto)
                                      VALUES('$equipment','$area','$actual','$caldate','$frekuensi','$merk','$itemcheck','$nama_file')")
                                      or die('Ada kesalahan pada query insert : '.$mysqli->error); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: index.php?alert=1");
            }   
        }
    }
}
// tutup koneksi
$mysqli->close();   
?>