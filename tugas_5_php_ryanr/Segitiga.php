<!-- Ryan Ramadhan || Kelompok 5 || Universitas Singaperbangsa Karawang || Fullstack Web Developer -->

<?php
require_once 'Bentuk2D.php';
class Segitiga extends Bentuk2D
{
    //variabel
    protected $alas;
    protected $tinggi;

    //constuktor
    public function  __construct($alas, $tinggi){
        $this -> alas = $alas;
        $this -> tinggi = $tinggi;
    }

    //method namaBidang
    public function namaBidang(){
        echo 'Segitiga';
    }

    //method keterangan
    public function keterangan(){
        echo 'Alas = ' . $this -> alas . '<br>Tinggi = ' . $this -> tinggi;
    }

    //method luasBidang
    public function luasBidang(){
        // rumus luas segitiga = 1/2 * alas * tinggi
        echo 0.5 * ($this -> alas * $this -> tinggi);
    }

    //method kelilingBidang
    public function kelilingBidang(){
        $a = $this -> alas;
        $t = $this -> tinggi;

        //cari dulu panjang sisi miring dengan rumus pythagoras 
        $m = sqrt(pow($a, 2) + pow($t, 2));

        //rumus keliling segitiga = alas * tinggi * sisi miring
        echo $a + $t + $m;
    }
}