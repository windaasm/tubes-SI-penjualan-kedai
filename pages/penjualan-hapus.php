<?php
session_start();
$_SESSION['current_page'] = "Penjualan";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
if (!isset($_POST["tblHapus"])) {
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
                    <h1 class="h2">Hapus Data Penjualan</h1>
                </div>
                <?php
                if (isset($_POST["tblHapus"])) {
                    if ($mysqli->connect_errno == 0) {
                        $idPenjualan = $mysqli->escape_string($_POST["idPenjualan"]);

                        $sql = "DELETE FROM penjualan WHERE id_penjualan='$idPenjualan'";
                        $res = $mysqli->query($sql);

                        if ($res) {
                            if ($mysqli->affected_rows > 0) {
                                echo "
                                    <div class='alert alert-success' role='alert'>
                                        Data berhasil dihapus
                                    </div>
                                    <a href='Penjualan.php'>
                                        <button type='button' class='btn btn-success'>View Penjualan</button>
                                    </a>
                                ";
                            }
                        } else {
                            echo "
                            <div class='alert alert-danger' role='alert'>
                                Data gagal dihapus
                            </div>
                            <a href='javascript:history.back()'><button type='button' class='btn btn-primary'>Kembali</button></a>
                            ";
                        }
                    } else {
                        echo "Gagal koneksi"  . $mysqli->connect_error   . "<br>";
                    }
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