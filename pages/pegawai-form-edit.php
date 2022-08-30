<?php
session_start();
$_SESSION['current_page'] = "Pegawai";
?>
<?php include_once("../functions/functions.php"); ?>
<?php
//checkLogin();
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
                    <h1 class="h2">Edit Data Pegawai</h1>
                </div>
                <?php
                if (isset($_GET["id_pegawai"])) {
                    $id_pegawai = $mysqli->escape_string($_GET["id_pegawai"]);
                    // $data = getMahasiswa($nim);
                    if ($data = getDataPegawai($id_pegawai)) {
                ?>
                        <form method="POST" name="form-edit-pegawai" action="pegawai-edit.php">
                            <div class="row mb-3">
                                <label for="inputIdPegawai" class="col-sm-2 col-form-label">ID Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" name="inputIdPegawai" class="form-control" value="<?php echo $data["id_pegawai"]; ?>" placeholder="Diisi huruf 'B' diikuti 3 angka. Contoh: B123" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNamaPegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNamaPegawai" name=" inputNamaPegawai" value="<?php echo $data["nama_pegawai"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAlamat" name="inputAlamat" value="<?php echo $data["alamat"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNoHp" class="col-sm-2 col-form-label">No HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNoHp" name="inputNoHp" value="<?php echo $data["no_hp"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Edit</button>
                            <a href="pegawai.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data nim tidak ditemukan</div>";
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