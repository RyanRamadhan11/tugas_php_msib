<!-- Ryan Ramadhan || Kelompok 5 || Universitas Singaperbangsa Karawang || Fullstack Web Developer -->

<?php
  // array scalar (satu dimensi)
  $mhs_1 = ['nim'=>'19001','nama'=>'Ryan Ramadhan','nilai'=>98];
  $mhs_2 = ['nim'=>'19002','nama'=>'Yulita Apriani','nilai'=>81];
  $mhs_3 = ['nim'=>'19003','nama'=>'Novari Indrayadi','nilai'=>70];
  $mhs_4 = ['nim'=>'19004','nama'=>'Muhammad Adif','nilai'=>66];
  $mhs_5 = ['nim'=>'19005','nama'=>'Nanda Febriyanti','nilai'=>76];
  $mhs_6 = ['nim'=>'19006','nama'=>'Ririn Fauziah','nilai'=>95];
  $mhs_7 = ['nim'=>'19007','nama'=>'Septian Bimo','nilai'=>52];
  $mhs_8 = ['nim'=>'19008','nama'=>'Gilang Maulidi','nilai'=>85];
  $mhs_9 = ['nim'=>'19009','nama'=>'Leni Maelani','nilai'=>90];
  $mhs_10 = ['nim'=>'19010','nama'=>'Abdul Hadi','nilai'=>38];

  // array assosiative
  $mahasiswa = [$mhs_1, $mhs_2, $mhs_3, $mhs_4, $mhs_5, $mhs_6, $mhs_7, $mhs_8, $mhs_9, $mhs_10];

  // array judul
  $arr_title = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];


  // aggregate function di array
  $kolom_nilai = array_column($mahasiswa,'nilai');
  $total_nilai = array_sum($kolom_nilai);
  $nilai_tertinggi = max($kolom_nilai);
  $nilai_terendah = min($kolom_nilai);
  $jumlah_siswa = count($mahasiswa);
  $nilai_ratarata = $total_nilai / $jumlah_siswa;

  // daftar aggregate nilai buat di keterangan tfoot
  $keterangan_tfoot = [
      'Nilai Tertinggi'=>$nilai_tertinggi,
      'Nilai Terendah'=>$nilai_terendah,
      'Nilai Rata-Rata'=>$nilai_ratarata,
      'Jumlah Siswa'=>$jumlah_siswa
  ];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 PHP || Ryan Ramadhan</title>

    <!-- import bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
  </head>

  <body class="bg-secondary">
    <!-- content header -->
    <div class="bg-black p-3 text-center text-white">
      <h3>Daftar Nilai Mahasiswa</h3>
      <h6>Tugas 3 PHP || Ryan Ramadhan</h6>
    </div>

    <!-- content table -->
    <div class="container my-5">
        <table class="table table-striped">
            <thead>
                <tr bgcolor="black">
                    <?php
                      foreach($arr_title as $title){
                    ?>
                    <th class="text-white"><?= $title ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                  //inisialisasi variabel no
                  $no = 1;

                  //looping array
                  foreach($mahasiswa as $mhs){

                      // Grade If multi kondisi
                      if($mhs['nilai'] >=85 && $mhs['nilai'] <= 100){
                        $grade = "A";
                      } else if($mhs['nilai'] >= 70 && $mhs['nilai'] < 85){
                        $grade = "B";
                      } else if($mhs['nilai'] >= 55 && $mhs['nilai'] < 70){
                        $grade = "C";
                      } else if($mhs['nilai'] >= 40 && $mhs['nilai'] < 55){
                        $grade = "D";
                      } else if ($mhs['nilai']  < 40) {
                        $grade = "E";
                      }

                      // Predikat Switch Case dari Grade
                      switch ($grade) {
                        case 'A':
                          $predikat = 'Memuaskan';
                          break;
                        case 'B':
                          $predikat = 'Baik';
                          break;
                        case 'C':
                          $predikat = 'Cukup';
                          break;
                        case 'D':
                          $predikat = 'Kurang';
                          break;
                        case 'E':
                          $predikat = 'Buruk';
                          break;
                        default:
                          break;
                      }
                      
                      // ternary keterangan nilai
                      $keterangan = ($mhs['nilai'] >= 60) ? 'Lulus' : 'Tidak Lulus';

                      // buat warna baris
                      $warna_baris = $no % 2 == 1 ? '#F8EDE3': '#F8EDE3';
                ?>
                <tr bgcolor="<?= $warna_baris ?>">
                    <td><?= $no ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['nilai'] ?></td>
                    <td><?= $keterangan ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
                <?php $no++; } ?>
            </tbody>
            <tfoot>
              <tr class="text-white" bgcolor="black">
                <th class="text-center" colspan="7">KETERANGAN</th>
              </tr>

              <?php
                foreach ($keterangan_tfoot as $ket => $hasil_nilai) {
              ?>
              <tr bgcolor="#C9BBCF">
                <th colspan="5" class="text-center"><?= $ket ?></th>
                <th colspan="2" ><?= $hasil_nilai ?></th>
              </tr>
              <?php } ?>
            </tfoot>
        </table>
    </div>

    <!-- content footer -->
    <div class="bg-black p-3 text-center text-white">
      <h5>Design By : Ryan Ramadhan || Kelompok 5</h5>
    </div>

    <!-- import js bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>