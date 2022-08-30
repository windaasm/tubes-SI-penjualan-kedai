<?php
session_start();
$_SESSION['current_page'] = "Stok Bahan";
?>
<?php require_once '../functions/functions.php'; ?>
<?php
//checkLogin();
if (!isset($_POST["tblEdit"])) {
    header("Location: StokBahan.php");
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
                    <h1 class="h2">Edit Data Stok</h1>
                </div>
                <?php
                if (isset($_POST["tblEdit"])) {
                    if ($mysqli->connect_errno == 0) {
                        $idStok = $mysqli->escape_string($_POST["inputIdStok"]);
                        $namaBahan = $mysqli->escape_string($_POST["inputNamaBahan"]);
                        $qty = $mysqli->escape_string($_POST["inputQty"]);
                        $satuan = $mysqli->escape_string($_POST["inputSatuan"]);
                        $adaError = false;

                        $pesanSalah = '';

                        // validasi stok
                        
                        if (!preg_match("/^[S]{1}[0-9]{4}$/", $idStok)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format id stok harus diawali huruf S dan 4 angka.                 
                                </div>";
                            $adaError = true;
                        }

                        $regexNama = "/^[a-z ,.'-]+$/i";
                        if (!preg_match($regexNama, $namaBahan)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format nama bahan tidak boleh angka.                 
                                </div>";
                            $adaError = true;
                        }

                        if (!preg_match("/^[0-9]*$/", $qty)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format quantity tidak boleh mengandung huruf.                 
                                </div>";
                            $adaError = true;
                        }

                        $regexNama = "/^[a-z ,.'-]+$/i";
                        if (!preg_match($regexNama, $satuan)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format satuan tidak boleh angka.                 
                                </div>";
                            $adaError = true;
                        }
                        
                        //         // validasi kode matkul
                        //         $pesanSalah = '';
                        //         if (strlen($kdMatkul) > 7 || strlen($kdMatkul) < 7) {
                        //             $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //                     <strong>Gagal!</strong> Data gagal disimpan kode mata kuliah harus 7 karakter.                 
                        //                 </div>";
                        //             $adaError = true;
                        //         }

                        //         if (!preg_match("/^[A-Z0-9]*$/", $kdMatkul)) {
                        //             $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //                     <strong>Gagal!</strong> Data gagal disimpan, format mata kuliah harus kapital.                 
                        //                 </div>";
                        //             $adaError = true;
                        //         }

                        //         $jurusan = substr($kdMatkul, 0, 2);
                        //         if (($jurusan != 'IF') && ($jurusan != 'TI') && ($jurusan != 'SI') && ($jurusan != 'MI') && ($jurusan != 'KA') && ($jurusan != 'TE')) {
                        //             $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //                     <strong>Gagal!</strong> Data gagal disimpan, 2 huruf pertama kode mata kuliah harus IF/TI/SI/MI/KA/TE.                 
                        //                 </div>";
                        //             $adaError = true;
                        //         }


                        //         //validasi nama matkul
                        //         if (strlen($namaMatkul) < 5) {
                        //             $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //                     <strong>Gagal!</strong> Data gagal disimpan nama mata kuliah tidak valid.                 
                        //                 </div>";
                        //             $adaError = true;
                        //         }
                    }

                    if ($adaError == false) {
                        $sql = "UPDATE stok_bahan SET id_stok = '$idStok', nama_bahan = '$namaBahan', qty = '$qty', satuan='$satuan' WHERE id_stok = '$idStok'";
                        $res = $mysqli->query($sql);

                        if ($res) {
                            if ($mysqli->affected_rows > 0) {
                                echo "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Berhasil!</strong> Data berhasil disimpan.    
                                    </div>
                                    <a href='StokBahan.php'>
                                            <button type='button' class='btn btn-success'>View Stok</button>
                                    </a>";
                            }
                        } else {
                            echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, id stok sudah ada.                 
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
                } else {
                    echo "Gagal koneksi"  . $mysqli->connect_error   . "<br>";
                }
                ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
</body>

</html>