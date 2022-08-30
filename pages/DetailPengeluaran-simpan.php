<?php
session_start();
$_SESSION['current_page'] = "Detail Pengeluaran";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
if (!isset($_POST["tblSimpan"])) {
    header("Location: DetailPengeluaran.php");
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
                    <h1 class="h2">Penyimpanan Data Detail Pengeluaran</h1>
                </div>
                <?php
                if (isset($_POST["tblSimpan"])) {
                    if ($mysqli->connect_errno == 0) {
                        $id_pengeluaran = $mysqli->escape_string($_POST["inputIdPengeluaran"]);
                        $stok_bahan = $mysqli->escape_string($_POST["inputStokBahan"]);
                        $harga_satuan = $mysqli->escape_string($_POST["inputHargaSatuan"]);
                        $qty = $mysqli->escape_string($_POST["inputQty"]);
                        
                        $add_qty = getListStok();
                        foreach ($add_qty as $value) {
                            if ($value["id_stok"] == $stok_bahan) {
                                $getQty = $value["qty"];
                            }
                        }
                        $getQty = $getQty + $qty;
                        $update = $mysqli->query("UPDATE stok_bahan SET qty='$getQty' WHERE id_stok='$stok_bahan'");

                        $totalHarga = getListPengeluaran();
                        foreach ($totalHarga as $value) {
                            if ($value["id_pengeluaran"] == $id_pengeluaran) {
                                $getTotalHarga = $value["total_harga"];
                            }
                        }
                        $getTotalHarga = $getTotalHarga + $harga_satuan;
                        $update = $mysqli -> query("UPDATE pengeluaran SET total_harga='$getTotalHarga' WHERE id_pengeluaran='$id_pengeluaran'");

                        $adaError = false;

                        $pesanSalah = '';

                        if ($id_pengeluaran == "") {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! ID Pengeluaran harus dipilih.                 
                                </div>";
                            $adaError = true;
                        }

                        if ($stok_bahan == "") {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! Stok bahan harus dipilih.                 
                                </div>";
                            $adaError = true;
                        }

                        if (!preg_match("/^[0-9]*$/", $harga_satuan)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan! format biaya bahan tidak boleh mengandung huruf.                 
                                </div>";
                            $adaError = true;
                        }
                        
                        

                        if ($adaError == false) {
                            $sql = "INSERT INTO detail_pengeluaran(id_pengeluaran, id_stok, harga_satuan) VALUES ('$id_pengeluaran', '$stok_bahan', '$harga_satuan')";
                            $res = $mysqli->query($sql);

                            if ($res) {
                                if ($mysqli->affected_rows > 0) {
                                    echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <strong>Berhasil!</strong> Data berhasil disimpan.    
                                        </div>
                                        <a href='DetailPengeluaran.php'>
                                                <button type='button' class='btn btn-success'>View Detail Pengeluaran</button>
                                        </a>";
                                }
                            } else {
                                echo "
                                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>Gagal!</strong> Data gagal disimpan, ID sudah ada udah ada.                 
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