<!-- Ryan Ramadhan || Kelompok 5 || Universitas Singaperbangsa Karawang || Fullstack Web Developer -->

<?php
    require 'Pegawai.php';

    // public function __construct($nip, $nama, $jabatan, $agama, $status)
    // 5 instance object pegawai
    $objek_pegawai_1 = new Pegawai('19001', 'Ryan Ramadhan', 'Manager', 'Islam', 'Menikah');
    $objek_pegawai_2 = new Pegawai('19002', 'Adun', 'Asmen', 'Hindu', 'Belum Menikah');
    $objek_pegawai_3 = new Pegawai('19003', 'Yulita Apriani', 'Kabag', 'Konghuchu', 'Belum Menikah');
    $objek_pegawai_4 = new Pegawai('19004', 'Gilang Syahrul', 'Staff', 'Kristen Protestan', 'Menikah');
    $objek_pegawai_5 = new Pegawai('19005', 'Abdul Hadi', 'Asmen', 'Buddha', 'Belum Menikah');

    // cetaklah semua struktur gaji pegawai
    $objek_pegawai_1 -> mencetak();
    $objek_pegawai_2 -> mencetak();
    $objek_pegawai_3 -> mencetak();
    $objek_pegawai_4 -> mencetak();
    $objek_pegawai_5 -> mencetak();