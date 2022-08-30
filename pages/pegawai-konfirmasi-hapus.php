<?php
session_start();
$_SESSION['current_page'] = "Pegawai";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../index.php?error=4");
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
                    <h1 class="h2">Hapus Data Pegawai</h1>
                </div>
                <?php
                if (isset($_GET["id_pegawai"])) {
                    $idPegawai = $mysqli->escape_string($_GET["id_pegawai"]);
                    // $data = getMahasiswa($kd_mk);
                    if ($data = getDataPegawai($idPegawai)) {
                ?>
                        <form method="POST" name="form-hapus-mhs" action="pegawai-hapus.php">
                            <input type="hidden" name="id_pegawai" value="<?php echo $data["id_pegawai"]; ?>">
                            <div class="row mb-3">
                                <label for="inputIdPegawai" class="col-sm-2 col-form-label">ID Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputIdPegawai" readonly value="<?php echo $data["id_pegawai"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAlamatPegawai" class="col-sm-2 col-form-label">Alamat Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAlamatPegawai" readonly name="inputAlamatPegawai" value="<?php echo $data["alamat"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNamaPegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNamaPegawai" readonly name="inputNamaPegawai" value="<?php echo $data["no_hp"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                            <a href="Pegawai.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data kode mata kuliah tidak ditemukan</div>";
                    }
                    ?>
                <?php
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Data tidak ditemukan</div>";
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