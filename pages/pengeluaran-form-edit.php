<?php
session_start();
$_SESSION['current_page'] = "Pengeluaran";
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
                    <h1 class="h2">Edit Data Pengeluaran</h1>
                </div>
                <?php
                if (isset($_GET["id_pengeluaran"])) {
                    $id_pengeluaran = $mysqli->escape_string($_GET["id_pengeluaran"]);
                    // $data = getMahasiswa($nim);
                    if ($dataD = getDataPengeluaran($id_pengeluaran)) {
                ?>
                       <form method="POST" name="form-edit-pengeluaran" action="pengeluaran-edit.php">
                            <div class="row mb-3">
                                <label for="inputIdPengeluaran" class="col-sm-2 col-form-label">ID Pengeluaran</label>
                                <div class="col-sm-10">
                                    <input type="text" name="inputIdPengeluaran" id="inputIdPengeluaran" class="form-control" value="<?php echo $dataD["id_pengeluaran"]; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputTanggal" name="inputTanggal" value="<?php echo $dataD["tanggal"]; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputIdPegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputIdPegawai" name="inputIdPegawai">
                                        <!-- <option value="defaultNamaPegawai">Pilih Nama Pegawai</option> -->
                                        <?php
                                            $data = getListPegawai();
                                            foreach ($data as $row) {
                                                echo "<option value=\"" . $row["id_pegawai"] . "\"";
                                                if ($row["id_pegawai"] == $dataD["id_pegawai"]) {
                                                    echo " selected";
                                                }
                                                echo ">" . $row["nama_pegawai"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Edit</button>
                            <a href="Pengeluaran.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data menu tidak ditemukan</div>";
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