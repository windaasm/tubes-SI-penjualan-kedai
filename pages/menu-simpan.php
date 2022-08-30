<?php
session_start();
$_SESSION['current_page'] = "Menu";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
if (!isset($_POST["tblSimpan"])) {
    header("Location: Menu.php");
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
                    <h1 class="h2">Penyimpanan Data Menu</h1>
                </div>
                <?php
                if (isset($_POST["tblSimpan"])) {
                    if ($mysqli->connect_errno == 0) {
                        $id_menu = $mysqli->escape_string($_POST["inputIdMenu"]);
                        $nama_menu = $mysqli->escape_string($_POST["inputNamaMenu"]);
                        $jenis_menu = $mysqli->escape_string($_POST["inputJenisMenu"]);
                        $adaError = false;


                        $pesanSalah = '';
            

                        if (strlen($nama_menu) < 2 ){
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! Nama menu harus lebih dari 2 karakter.                 
                                </div>";
                            $adaError = true;
                        } 


                        if (!preg_match("/^[M]{1}[0-9]{4}$/", $id_menu)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! Format Id menu harus diawali huruf M dan diikuti 4 angka.                 
                                </div>";
                            $adaError = true;
                        }
                        
                        if ($jenis_menu == 'defaultJenisMenu') {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! Pilih Jenis Menu terlebih dahulu.                 
                                </div>";
                            $adaError = true;
                        }
                       


                        if ($adaError == false) {
                            $sql = "INSERT INTO menu VALUES ('$id_menu', '$nama_menu', '$jenis_menu')";
                            $res = $mysqli->query($sql);

                            if ($res) {
                                if ($mysqli->affected_rows > 0) {
                                    echo "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Berhasil!</strong> Data berhasil disimpan.    
                                    </div>
                                    <a href='Menu.php'>
                                            <button type='button' class='btn btn-success'>View Data Menu</button>
                                    </a>";
                                }
                            } else {
                                echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, ID Menu sudah ada udah ada.                 
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