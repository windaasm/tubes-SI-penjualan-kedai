<?php
session_start();
$_SESSION['current_page'] = "Stok Bahan";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
if (!isset($_POST["tblSimpan"])) {
    header("Location: StokBahan.php");
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
                    <h1 class="h2">Penyimpanan Data Stok Bahan</h1>
                </div>
                <?php
                if (isset($_POST["tblSimpan"])) {
                    if ($mysqli->connect_errno == 0) {
                        // $kd_nilai = $mysqli->escape_string($_POST["inputKdNilai"]);
                        $id_stok = $mysqli->escape_string($_POST["inputIdStok"]);
                        $nama_bahan = $mysqli->escape_string($_POST["inputNamaBahan"]);
                        $qty = $mysqli->escape_string($_POST["inputQty"]);
                        $satuan = $mysqli->escape_string($_POST["inputSatuan"]);
                        $adaError = false;


                        $pesanSalah = '';

                        // validasi stok
                        
                        if (!preg_match("/^[S]{1}[0-9]{4}$/", $id_stok)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format id stok harus diawali huruf S dan 4 angka.                 
                                </div>";
                            $adaError = true;
                        }

                        $regexNama = "/^[a-z ,.'-]+$/i";
                        if (!preg_match($regexNama, $nama_bahan)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format nama bahan tidak boleh angka.                 
                                </div>";
                            $adaError = true;
                        }

                        if (!preg_match("/^[0-9]*$/", $qty)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format quantity tidak boleh mengandung huruf.                 
                                </div>";
                            $adaError = true;
                        }

                        $regexSatuan = "/^[a-z ,.'-]+$/i";
                        if (!preg_match($regexSatuan, $satuan)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format satuan tidak boleh angka.                 
                                </div>";
                            $adaError = true;
                        }



                        if ($adaError == false) {
                        $sql = "INSERT INTO stok_bahan VALUES ('$id_stok', '$nama_bahan', '$qty', '$satuan')";
                        $res = $mysqli->query($sql);

                        if ($res) {
                            if ($mysqli->affected_rows > 0) {
                                echo "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Berhasil!</strong> Data berhasil disimpan.    
                                    </div>
                                    <a href='StokBahan.php'>
                                            <button type='button' class='btn btn-success'>View Stok Bahan</button>
                                    </a>";
                            }
                        } else {
                            echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, ID Stok sudah ada.                 
                                </div>
                                <a href='javascript:history.back()'><button type='button' class='btn btn-primary'>Kembali</button></a>
                                ";
                        }
                        } else {
                ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $pesanSalah; ?>
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