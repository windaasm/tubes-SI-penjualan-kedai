<?php
session_start();
$_SESSION['current_page'] = "Penjualan";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
if (!isset($_POST["tblSimpan"])) {
    header("Location: Penjualan.php");
}
?>
<!doctype html>
<html lang="en">

<?php include_once("../head.php"); ?>

<body>
    <?php headers() ?>;
    <div class="container-fluid">
        <div class="row">
            <?php navbar() ?>;
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Penyimpanan Data Penjualan</h1>
                </div>
                <?php
                if (isset($_POST["tblSimpan"])) {
                    if ($mysqli->connect_errno == 0) {
                        $id_penjualan = $mysqli->escape_string($_POST["inputIdPenjualan"]);
                        $tanggal = $mysqli->escape_string($_POST["inputTanggal"]);
                        $id_pegawai = $mysqli->escape_string($_POST["inputIdPegawai"]);
                        $adaError = false;


                        $pesanSalah = '';

                        //validasi penjualan
                        if (!preg_match("/^[P]{1}[0-9]{4}$/", $id_penjualan)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! format id penjualan harus diawali huruf P dan 4 angka.                 
                                </div>";
                            $adaError = true;
                        }

                        // if (!preg_match("/^[0-9]*$/", $total_harga)) {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan! format total harga tidak boleh mengandung huruf.                 
                        //         </div>";
                        //     $adaError = true;
                        // }

                        if ($tanggal > date('Y-m-d')) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! format tanggal penjualan yang dipilih melebihi tanggal sekarang.                 
                                </div>'";
                            $adaError = true;
                        }

                        if ($id_pegawai == "defaultNamaPegawai") {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! Pilih Nama Pegawai terlebih dahulu.                 
                                </div>";
                            $adaError = true;
                        } 

                        if ($adaError == false) {
                        $sql = "INSERT INTO penjualan(id_penjualan, tanggal, id_pegawai) VALUES ('$id_penjualan', '$tanggal', '$id_pegawai')";
                        $res = $mysqli->query($sql);

                        if ($res) {
                            if ($mysqli->affected_rows > 0) {
                                echo "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Berhasil!</strong> Data berhasil disimpan.    
                                    </div>
                                    <a href='Penjualan.php'>
                                            <button type='button' class='btn btn-success'>View Penjualan</button>
                                    </a>";
                            }
                        } else {
                            echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, ID Penjualan sudah ada.                 
                                </div>
                                <a href='javascript:history.back()'><button type='button' class='btn btn-primary'>Kembali</button></a>
                                ";
                        }
                        } else {
                ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $pesanSalah; 
                                    ?>
                                </div>
                                <a href='javascript:history.back()'><button type='button' class='btn btn-primary'>Kembali</button></a>
                            </div>
                        </div>
                <?php
                        }
                    }
                } else {
                    echo "Gagal koneksi"  . $mysqli->connect_error   . "<br>";
                }
                ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../dashboard/dashboard.js"></script>
</body>


</html>

</html>