<?php
//memanggil variabel milik php
echo 'Dokumen php saya ada di: '.$_SERVER['DOCUMENT_ROOT'];
echo '<br/>Nama file ini:  '.$_SERVER['SCRIPT_FILENAME'];

//diketahui
$jari2 = 15;
define('PHI',3.14);
$luas = PHI * $jari2 * $jari2;
//cetak
echo '<hr/>Luas lingkaran dengan jari-jari '.$jari2.' = '.$luas;
?>
