<!-- Ryan Ramadhan || Kelompok 5 || Universitas Singaperbangsa Karawang || Fullstack Web Developer -->

<?php
    class Pegawai {
        //member1 variabel
        protected $nip;
        public $nama;
        public $jabatan;
        public $agama;
        public $status;

        public $gaji_Pokok;
        public $tunjanganJabatan;
        public $tunjanganKeluarga;
        public $gajiKotor;
        public $zakatProfesi;
        public $gajibersih;

        //member2 konstruktor (nip, nama, jabatan, agama, status)
        public function __construct($nip, $nama, $jabatan, $agama, $status){
            $this -> nip = $nip;
            $this -> nama = $nama;
            $this -> jabatan = $jabatan;
            $this -> agama = $agama;
            $this -> status = $status;

            $this -> setGajiPokok();
            $this -> setTunjab();
            $this -> setTunkel();
            $this -> setGajiKotor();
            $this -> setZakatProfesi();
            $this -> setGajiBersih();
        }

        //member3 fungsi setGajiPokok (gunakan switch case : manager=>15jt, asmen=>10jt, kabag=>7jt, staff=>4jt)
        private function setGajiPokok(){
            switch ($this->jabatan) {
                case 'Manager':
                    $this -> gaji_Pokok = 15000000;
                    break;
                case 'Asmen':
                    $this-> gaji_Pokok = 10000000;
                    break;
                case 'Kabag':
                    $this-> gaji_Pokok = 7000000;
                    break;
                case 'Staff':
                    $this-> gaji_Pokok = 4000000;
                    break;  
                default:
                    $this-> gaji_Pokok = 0;
                    break;
            }
        }

        //member3 fungsi setTunjab = 20% dari Gaji Pokok
        private function setTunjab(){
            $this -> tunjanganJabatan = $this -> gaji_Pokok * 20 / 100;
        }

        //member3 setTunkel= 10% dari Gaji Pokok untuk sudah menikah (ternary)
        private function setTunkel(){
            $this -> tunjanganKeluarga = ($this -> status == 'Menikah') ? $this -> gaji_Pokok * 0.1 : 0;
        }
        
        //member3 setGajiKotor = gapok + tunjab + tunkel
        private function setGajiKotor(){
            $this -> gajiKotor = $this -> gaji_Pokok + $this -> tunjanganJabatan + $this -> tunjanganKeluarga;
        }

        //member3 setZakatProfesi = 2,5% dari GajiPokok untuk muslim dan Gaji Kotor minimal 6jt
        private function setZakatProfesi(){
            $this -> zakatProfesi = ($this -> agama == 'Islam' && $this -> gajiKotor >= 6000000) ? $this -> gaji_Pokok * 0.025 : 0;
        }

        //member3 setGajiBersih 
        private function setGajiBersih(){
            $this -> gajibersih = $this -> gajiKotor - $this -> zakatProfesi;
        }

        //member3 mencetak => nip, nama, jabatan, agama, status, Gaji Pokok, Tunj Jab, Tunkel, Zakat, Gaji Bersih 
        public function mencetak(){
            echo '<br/>=====================================';
            echo '<br/>NIP : ' . $this -> nip;
            echo '<br/>Nama : ' . $this -> nama;
            echo '<br/>Jabatan : ' . $this -> jabatan;
            echo '<br/>Agama : ' . $this -> agama;
            echo '<br/>Status : ' . $this -> status;

            echo '<br/>Gaji Pokok : Rp' . number_format($this -> gaji_Pokok, 0, ',', '.');
            echo '<br/>Tunjangan Jabatan : Rp' . number_format($this -> tunjanganJabatan, 0, ',', '.');
            echo '<br/>Tunjangan Keluarga : Rp' . number_format($this -> tunjanganKeluarga, 0, ',', '.');
            echo '<br/>Zakat Profesi : - Rp' . number_format($this -> zakatProfesi, 0, ',', '.');
            echo '<br/><b>Gaji Bersih : Rp' . number_format($this -> gajibersih, 0, ',', '.') . '</b>';
            echo '<br/>=====================================';
        }
    }