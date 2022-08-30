<?php
session_start();
$_SESSION['current_page'] = "Pegawai";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
if (!isset($_POST["tblSimpan"])) {
    header("Location: Pegawai.php");
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
                    <h1 class="h2">Penyimpanan Data Pegawai</h1>
                </div>
                <?php
                if (isset($_POST["tblSimpan"])) {
                    if ($mysqli->connect_errno == 0) {
                        $id_pegawai = $mysqli->escape_string($_POST["inputIdPegawai"]);
                        $nama_pegawai = $mysqli->escape_string($_POST["inputNamaPegawai"]);
                        $alamat = $mysqli->escape_string($_POST["inputAlamat"]);
                        $nohp = $mysqli->escape_string($_POST["inputNoHp"]);
                        $adaError = false;


                        $pesanSalah = '';


                        if (!preg_match("/^[B]{1}[A]{1}[0-9]{3}$/", $id_pegawai)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan format id pegawai harus diawali huruf BA dan 3 angka.                 
                                </div>";
                            $adaError = true;
                        }


                        if(strlen($nama_pegawai) < 2){
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan nama pegawai harus lebih dari 2 karakter.                 
                                </div>";
                            $adaError = true;
                        }

                        $regexNama = "/^[a-z ,.'-]+$/i";
                        if (!preg_match($regexNama, $nama_pegawai)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format nama tidak boleh angka.                 
                                </div>";
                            $adaError = true;
                        }

                        if(strlen($alamat) < 5){
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan nama alamat harus lebih dari 5 karakter.                 
                                </div>";
                            $adaError = true;
                        }

                        $regexNoHp = "/^(\+62|62|0)8[1-9][0-9]{6,9}$/";
                        if(!preg_match($regexNoHp, $nohp)){
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan format nomor hp harus diawali +62, 62, atau 0 dan terdiri dari 10-13 angka.                 
                                </div>";
                            $adaError = true;
                        }


                        if ($adaError == false) {
                            $sql = "INSERT INTO pegawai(id_pegawai, nama_pegawai, alamat, no_hp) VALUES ('$id_pegawai', '$nama_pegawai', '$alamat', '$nohp')";
                            $res = $mysqli->query($sql);

                            if ($res) {
                                if ($mysqli->affected_rows > 0) {
                                    echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Berhasil!</strong> Data berhasil disimpan.    
                                    </div>
                                    <a href='Pegawai.php'>
                                            <button type='button' class='btn btn-success'>View Pegawai</button>
                                    </a>";
                                }
                            } else {
                                echo "
                                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, ID Pegawai sudah ada.                 
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