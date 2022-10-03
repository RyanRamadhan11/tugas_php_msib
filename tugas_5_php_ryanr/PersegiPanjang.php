<!-- Ryan Ramadhan || Kelompok 5 || Universitas Singaperbangsa Karawang || Fullstack Web Developer -->

<?php
require_once 'Bentuk2D.php';
//class turunan dari class Bentuk2D

class PersegiPanjang extends Bentuk2D{
    //variabel
    protected $panjang;
    protected $lebar;

    //constuktor
    public function  __construct($panjang, $lebar){
        $this -> panjang = $panjang;
        $this -> lebar = $lebar;
    }

    //method namaBidang
    public function namaBidang(){
        echo 'Persegi Panjang';
    }

    //method keterangan
    public function keterangan(){
        echo 'Panjang = ' . $this -> panjang . '<br>Lebar = ' . $this -> lebar;
    }

    //method luasBidang
    public function luasBidang(){
        //rumus luas persegi panjang = p * l
        echo $this -> panjang * $this -> lebar;
    }

    //method kelilingBidang
    public function kelilingBidang(){
        //rumus keliling persegi panjang = 2* (p + l)
        echo 2 * ($this -> panjang + $this -> lebar);
    }
}