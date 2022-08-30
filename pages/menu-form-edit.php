<?php
session_start();
$_SESSION['current_page'] = "Menu";
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
                    <h1 class="h2">Edit Data Menu</h1>
                </div>
                <?php
                if (isset($_GET["id_menu"])) {
                    $id_menu = $mysqli->escape_string($_GET["id_menu"]);
                    // $data = getMahasiswa($nim);
                    if ($data = getDataMenu($id_menu)) {
                ?>
                        <form method="POST" name="form-edit-menu" action="menu-edit.php">
                            <div class="row mb-3">
                                <label for="inputIdMenu" class="col-sm-2 col-form-label">ID menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_menu" name="inputIdMenu" value="<?php echo $data["id_menu"]; ?>" placeholder="Diisi huruf 'M' diikuti 4 angka. Contoh: M1234" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNamaMenu" class="col-sm-2 col-form-label">Nama menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_menu" name="inputNamaMenu" value="<?php echo $data["nama_menu"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputJenisMenu" class="col-sm-2 col-form-label">Jenis Menu</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="inputJenisMenu" id="inputJenisMenu" required>
                                        <!-- <option value="">Pilih Jenis Menu</option> -->
                                        <option value="makanan" <?= "makanan" == $data['jenis_menu'] ? " selected" : ""; ?>>Makanan</option>
                                        <option value="minuman" <?= "minuman" == $data['jenis_menu'] ? " selected" : ""; ?>>Minuman</option>
                                        <option value="topping" <?= "topping" == $data['jenis_menu'] ? " selected" : ""; ?>>Topping</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Edit</button>
                            <a href="menu.php"><button type="button" class="btn btn-danger">Kembali</button></a>
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