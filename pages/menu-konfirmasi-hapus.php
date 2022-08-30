<?php
session_start();
$_SESSION['current_page'] = "Menu";
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
                    <h1 class="h2">Hapus Data Menu</h1>
                </div>
                <?php
                if (isset($_GET["id_menu"])) {
                    $id_menu = $mysqli->escape_string($_GET["id_menu"]);
                    // $data = getMahasiswa($kd_mk);
                    if ($data = getDataMenu($id_menu)) {
                ?>
                        <form method="POST" name="form-hapus-menu" action="menu-hapus.php">
                            <div class="row mb-3">
                                <label for="idMenu" class="col-sm-2 col-form-label">Id Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idMenu" name="idMenu" readonly value="<?php echo $data["id_menu"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="namaMenu" class="col-sm-2 col-form-label">Nama Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namaMenu" readonly name="namaMenu" value="<?php echo $data["nama_menu"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenisMenu" class="col-sm-2 col-form-label">Jenis Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jenisMenu" readonly name="jenisMenu" value="<?php echo $data["jenis_menu"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                            <a href="javascript:history.back()"><button type="button" class="btn btn-danger">Kembali</button></a>
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