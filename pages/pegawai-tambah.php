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
                    <h1 class="h2">Tambah Data Pegawai</h1>
                </div>
                <form method="POST" name="form-tambah-pegawai" action="pegawai-simpan.php">
                    <div class="row mb-3">
                        <label for="inputIdPegawai" class="col-sm-2 col-form-label">ID Pegawai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputIdPegawai" name="inputIdPegawai" placeholder="Diisi huruf 'BA' diikuti 3 angka. Contoh: BA123" required>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pegawai" name="inputNamaPegawai" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="inputAlamat" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="noHp" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="noHp" name="inputNoHp" placeholder="Format no hp diawali dengan +62 / 62 / 08. Contoh 081xxxx" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblSimpan">Simpan</button>
                    <a href="Pegawai.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                </form>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../dashboard/dashboard.js"></script>
</body>

</html>