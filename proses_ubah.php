<?php
// panggil file config.php untuk koneksi ke database
require_once "config/config.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    if (isset($_POST['equipment'])) {
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


        // jika foto tidak diubah
        if (empty($nama_file)) {
            // perintah query untuk mengubah data pada tabel pegawai
            $update = $mysqli->query("UPDATE pegawai SET equipment     = '$equipment',
                                                         area          = '$area',
                                                         actual        = '$actual',
                                                         caldate       = '$caldate',
                                                         frekuensi     = '$frekuensi',
                                                         merk          = '$merk',
                                                         itemcheck     = '$itemcheck'
                                                   WHERE equipment     = '$equipment'")
                                      or die('Ada kesalahan pada query update : '.$mysqli->error);
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                header("location: index.php?alert=2");
            }
        }
        // jika foto diubah
        else {
            // upload file
            if(move_uploaded_file($tmp_file, $path)) {
                // Jika file berhasil diupload, Lakukan : 
                // perintah query untuk mengubah data pada tabel pegawai
                $update = $mysqli->query("UPDATE pegawai SET equipment   =  '$equipment',
                                                             area        =  '$area',
                                                             actual      =  '$actual',
                                                             caldate     =  '$caldate',
                                                             frekuensi   =  '$frekuensi',
                                                             merk        = '$merk',
                                                            itemcheck         = '$itemcheck',
                                                       WHERE equipment            = '$equipment'")
                                          or die('Ada kesalahan pada query update : '.$mysqli->error);
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: index.php?alert=2");
                }   
            }
        }
    }
}
// tutup koneksi
$mysqli->close();   
?>