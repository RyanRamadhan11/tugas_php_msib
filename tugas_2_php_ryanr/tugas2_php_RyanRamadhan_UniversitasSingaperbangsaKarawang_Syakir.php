<!-- Ryan Ramadhan || Kelompok 5 || Universitas Singaperbangsa Karawang || Fullstack Web Developer -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tugas 1 PHP || Ryan Ramadhan</title>

        <!-- import bootstrap -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
        crossorigin="anonymous"
        />

        <!-- import css eksternal -->
        <link rel="stylesheet" type="text/css" href="css/style_tgs2_php.css" />

    </head>
    <body>
        <!-- content header -->
        <div class="judul" >
            <h3>FORM DATA PEGAWAI</h3>
            <h6>Tugas 2 PHP || Ryan Ramadhan</h6>
        </div>

        <!-- content form -->
        <div class="container my-5">
            <form method="POST">
                <div class="konten_input">
                    <label for="namaPegawai" class="form-label fw-bold">Nama Pegawai</label>
                    <input type="text" class="form-control" name="namaPegawai">
                </div>
                <div class="konten_input">
                    <label for="agama" class="form-label fw-bold">Agama</label>
                    <select class="form-select" name="agama">
                        <option selected value="-">-- Silahkan Pilih Agama --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="konten_input">
                    <label class="form-label fw-bold">Jabatan :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jabatan" value="Manager">
                        <label class="form-check-label" for="manager">
                            Manager
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jabatan" value="Asisten">
                        <label class="form-check-label" for="asisten">
                            Asisten
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jabatan" value="Kabag">
                        <label class="form-check-label" for="kabag">
                            Kabag
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jabatan" value="Staff">
                        <label class="form-check-label" for="staff">
                            Staff
                        </label>
                    </div>
                </div>
                <div class="konten_input">
                    <label class="form-label fw-bold">Status :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Menikah">
                        <label class="form-check-label" for="menikah">
                            Menikah
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Belum Menikah">
                        <label class="form-check-label" for="belum-menikah">
                            Belum Menikah
                        </label>
                    </div>
                </div>
                <div class="konten_input">
                    <label for="jumlahAnak" class="form-label fw-bold">Jumlah Anak </label>
                    <input type="number" class="form-control" name="jumlahAnak">
                </div>
                <button type="submit" name="proses" class="btn">Simpan</button>
            </form>
            
            <!-- php -->
            <?php 
                if(isset($_POST['proses'])){ 
                    //tangkap 
                    $nama_Pegawai = $_POST['namaPegawai'];
                    $agama = $_POST['agama'];
                    $jabatan = $_POST['jabatan'];
                    $status = $_POST['status'];
                    $jumlah_Anak = $_POST['jumlahAnak'];
                    
                    //struktur kondisi switch case gaji pokok
                    switch ($jabatan) {
                        case 'Manager':
                            $gaji_Pokok = 20000000;
                            break;
                        case 'Asisten':
                            $gaji_Pokok = 15000000;
                            break;
                        case 'Kabag':
                            $gaji_Pokok = 10000000;
                            break;
                        case 'Staff':
                            $gaji_Pokok = 4000000;
                            break;
                        default:
                            $gaji_Pokok = 0; 
                            break;
                    }

                    //Tunjangan jabatan = 20% dari gaji pokok
                    $tunjangan_Jabatan = ($gaji_Pokok * 20) / 100;

                    // tunjangan keluarga (if multi kondisi)
                    if($status == "Menikah" && $jumlah_Anak <= 2){
                        $tunjangan_Keluarga = ( $gaji_Pokok * 5 ) / 100;
                    } else if ($status == "Menikah" && ($jumlah_Anak >= 3 && $jumlah_Anak <= 5)){
                        $tunjangan_Keluarga = ( $gaji_Pokok * 10 ) / 100;
                    } else if ($status == "Menikah" && $jumlah_Anak >= 5){
                        $tunjangan_Keluarga = ( $gaji_Pokok * 15 ) / 100;
                    } else {
                        $tunjangan_Keluarga = 0;
                    }
                    
                    // gaji kotor = gapok + tunjab + tunkel
                    $gaji_Kotor = $gaji_Pokok + $tunjangan_Jabatan + $tunjangan_Keluarga;
                    
                    // zakat_profesi (ternary)
                    $zakat_Profesi = ($agama == "Islam" && $gaji_Kotor >= 6000000) ? ( $gaji_Kotor * 2.5 ) / 100 : 0;
                    
                    // take home pay = gator - zakat
                    $take_Home_Pay = $gaji_Kotor - $zakat_Profesi;
            ?>
        
            <div class="modal fade" id="outputModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success ">
                            <h5 class="modal-title text-white " id="exampleModalLabel">Data Gaji Pegawai</h5>
                            <button type="button" class="btn-close bg-light " data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-light">
                            <div class="alert alert-success" role="alert">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama</th>
                                            <th scope="row">:</th>
                                            <td><?= $nama_Pegawai ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Agama</th>
                                            <th scope="row">:</th>
                                            <td><?= $agama ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jabatan</th>
                                            <th scope="row">:</th>
                                            <td><?= $jabatan ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status</th>
                                            <th scope="row">:</th>
                                            <td><?= $status ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jumlah Anak</th>
                                            <th scope="row">:</th>
                                            <td><?= $jumlah_Anak ?></td>
                                        </tr>
                                            <tr>
                                            <th scope="row">Gaji Pokok</th>
                                            <th scope="row">:</th>
                                            <td align="right">Rp<?= number_format($gaji_Pokok, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tunjangan Jabatan</th>
                                            <th scope="row">:</th>
                                            <td align="right">RP<?= number_format($tunjangan_Jabatan, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tunjangan Keluarga</th>
                                            <th scope="row">:</th>
                                            <td align="right">RP<?= number_format($tunjangan_Keluarga, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gaji Kotor</th>
                                            <th scope="row">:</th>
                                            <td align="right">RP<?= number_format($gaji_Kotor, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Zakat Profesi</th>
                                            <th scope="row">:</th>
                                            <td align="right">RP<?= number_format($zakat_Profesi, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Take Home Pay</th>
                                            <th scope="row">:</th>
                                            <td align="right" class="fw-bold">RP<?= number_format($take_Home_Pay, 2, ',', '.') ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer bg-success">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
                <?php } ?>
        </div>

        <!-- content footer -->
        <div class="judul" >
            <h5>Design By : Ryan Ramadhan || Kelompok 5</h5>
        </div>

        <!-- import jquery eksternal -->
        <script src="js/jquery-3.6.1.min.js"></script>
    
        <!-- js custom -->
        <script src="js/tugas2_php.js"></script>
    
        <!-- import js bootstrap -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
    </body>
</html>