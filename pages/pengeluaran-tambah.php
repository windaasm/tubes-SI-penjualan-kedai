<?php
session_start();
$_SESSION['current_page'] = "Pengeluaran";
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
                    <h1 class="h2">Tambah Data Pengeluaran</h1>
                </div>
                <form method="POST" name="form-tambah-pengeluaran" action="pengeluaran-simpan.php">
                    <div class="row mb-3">
                        <label for="inputIdPengeluaran" class="col-sm-2 col-form-label">ID Pengeluaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputIdPengeluaran" name="inputIdPengeluaran" placeholder="Diisi dengan 'K' diikuti 4 angka. Contoh: K1234" requiired>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputTanggal" name="inputTanggal" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputIdPegawai" class="col-sm-2 col-form-label">ID Pegawai</label>
                        <!-- <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputIdPegawai" name="inputIdPegawai" required>
                        </div> --> 
                        <div class="col-sm-10">
                                    <select class="form-control" id="inputIdPegawai" name="inputIdPegawai">
                                        <option value="">Pilih Nama Pegawai</option>
                                        <?php
                                            $data = getListPegawai();
                                            foreach ($data as $row) {
                                                echo "<option value=\"" . $row["id_pegawai"] . "\">" . $row["nama_pegawai"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblSimpan">Simpan</button>
                    <a href="pengeluaran.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                </form>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../dashboard/dashboard.js"></script>
</body>

</html>