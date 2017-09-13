<?php 
// memasukan file db.php
include 'db.php';
include 'sanitasi.php';


// mengirim data $id dengan menggunakan metode GET
$id = angkadoang($_POST['id']);

$kode_barang = stringdoang($_POST['kode']);


$query = $db->query("DELETE FROM barang WHERE id = '$id'");

hapus_barang_cache($kode_barang);


 function hapus_barang_cache($kode_barang){

  include 'cache.class.php';

   // membuat objek cache
      $cache = new Cache();

    // setting default cache 
      $cache->setCache('produk');

  if ($cache->isCached($kode_barang)) {
    
   

    // hapus cache
      $cache->erase($kode_barang);
  }
}

      // logika => jika $query benar maka akan menuju file barang.php , jika salah maka failed
if ($query == TRUE)
{
echo "sukses";
}
else
{
	
}
//Untuk Memutuskan Koneksi Ke Database
mysqli_close($db);   
?>
