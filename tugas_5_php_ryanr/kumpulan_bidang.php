<!-- Ryan Ramadhan || Kelompok 5 || Universitas Singaperbangsa Karawang || Fullstack Web Developer -->

<?php
    require_once 'Lingkaran.php';
    require_once 'PersegiPanjang.php';
    require_once 'Segitiga.php';

    // array judul
    $arr_title = ['No', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling Bidang'];

    $lingkaran_1 = new Lingkaran(7);
    $lingkaran_2 = new Lingkaran(14);
    $lingkaran_3 = new Lingkaran(21);
    $persegiPanjang_1 = new PersegiPanjang(32, 8);
    $persegiPanjang_2 = new PersegiPanjang(4, 14);
    $persegiPanjang_3 = new PersegiPanjang(5, 23);
    $segitiga_1 = new Segitiga(17, 3);
    $segitiga_2 = new Segitiga(8, 4);
    $segitiga_3 = new Segitiga(12, 9);

    // array assosiative
    $kumpulan_bidang = [$lingkaran_1, $lingkaran_2, $lingkaran_3, $persegiPanjang_1, $persegiPanjang_2,
                        $persegiPanjang_3, $segitiga_1, $segitiga_2, $segitiga_3];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Tugas 5 PHP || Ryan Ramadhan</title>
        <!-- import bootstrap -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
        crossorigin="anonymous"
        />
    </head>

    <body class="bg-primary text-light">
        <div class="container my-5">
            <h2 class="text-center text-warning">MACAM MACAM BIDANG DATAR</h2>
            <h6 class="text-center">Tugas 5 PHP || Ryan Ramadhan</h6>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr bgcolor='black' class="text-white text-center">
                        <?php
                        foreach ($arr_title as $title) {
                        ?>
                            <th><?= $title ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($kumpulan_bidang as $bidang) { ?>
                            <tr bgcolor='#F8EDE3'>
                                <td align="center"> <?= $no++; ?> </td>
                                <td> <?= $bidang -> namaBidang(); ?> </td>
                                <td> <?= $bidang -> keterangan(); ?> </td>
                                <td align="right"> <?= $bidang -> luasBidang(); ?> cm</td>
                                <td align="right"> <?= $bidang -> kelilingBidang(); ?> cm</td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- import bootstrap js -->
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"
        ></script>
    </body>
</html>