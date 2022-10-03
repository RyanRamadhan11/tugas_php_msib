<!-- Ryan Ramadhan || Kelompok 5 || Universitas Singaperbangsa Karawang || Fullstack Web Developer -->

<?php
require_once 'Bentuk2D.php';

//class turunan dari class Bentuk2D
class Lingkaran extends Bentuk2D{
    //variabel
    protected $jari2;

    //constuktor
    public function  __construct($jari2){
        $this -> jari2 = $jari2;
    }

    //method namaBidang
    public function namaBidang(){
        echo 'Lingkaran';
    }

    //method keterangan
    public function keterangan(){
        echo 'Jari-Jari = ' . $this -> jari2;
    }

    //method luasBidang
    public function luasBidang(){
        //rumus luas lingkaran = 3.14 * r * r
        echo 3.14 * $this -> jari2 * $this -> jari2;
    }

    //method kelilingBidang
    public function kelilingBidang(){
        //rumus keliling lingkaran = 2 * 3.14 * r 
        echo 2 * 3.14 * $this -> jari2;
    }
}