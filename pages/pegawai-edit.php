<?php
session_start();
$_SESSION['current_page'] = "Pegawai";
?>
<?php require_once '../functions/functions.php'; ?>
<?php
//checkLogin();
if (!isset($_POST["tblEdit"])) {
    header("Location: Pegawai.php");
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
                if (isset($_POST["tblEdit"])) {
                    if ($mysqli->connect_errno == 0) {
                        $idPegawai = $mysqli->escape_string($_POST["inputIdPegawai"]);
                        $namaPegawai = $mysqli->escape_string($_POST["inputNamaPegawai"]);
                        $alamat = $mysqli->escape_string($_POST["inputAlamat"]);
                        $noHp = $mysqli->escape_string($_POST["inputNoHp"]);
                        $adaError = false;
                        $pesanSalah = "";

                        // if (!preg_match("/^[B]{1}[A]{1}[0-9]{3}$/", $idPegawai)) {
                        //     $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        //             <strong>Gagal!</strong> Data gagal disimpan format id pegawai harus diawali huruf BA dan 3 angka.                 
                        //         </div>";
                        //     $adaError = true;
                        // }


                        if(strlen($namaPegawai) < 2){
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan nama pegawai harus lebih dari 2 karakter.                 
                                </div>";
                            $adaError = true;
                        }

                        $regexNama = "/^[a-z ,.'-]+$/i";
                        if (!preg_match($regexNama, $namaPegawai)) {
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, format nama tidak boleh angka.                 
                                </div>";
                            $adaError = true;
                        }

                        if(strlen($alamat) < 5){
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan nama alamat harus lebih dari 5 karakter.                 
                                </div>";
                            $adaError = true;
                        }

                        $regexNoHp = "/^(\+62|62|0)8[1-9][0-9]{6,9}$/";
                        if(!preg_match($regexNoHp, $noHp)){
                            $pesanSalah .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan format nomor hp harus diawali +62, 62, atau 0 dan terdiri dari 10-13 angka.                 
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
                        

                                // if (!preg_match("/^[A-Z0-9]*$/", $kdMatkul)) {
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
                        $sql = "UPDATE pegawai SET id_pegawai = '$idPegawai', nama_pegawai = '$namaPegawai', alamat='$alamat', no_hp='$noHp' WHERE id_pegawai = '$idPegawai'";
                        $res = $mysqli->query($sql);

                        if ($res) {
                            if ($mysqli->affected_rows > 0) {
                                echo "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Berhasil!</strong> Data berhasil disimpan.    
                                    </div>
                                    <a href='Pegawai.php'>
                                            <button type='button' class='btn btn-success'>View Pegawai</button>
                                    </a>";
                            }
                        } else {
                            echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Gagal!</strong> Data gagal disimpan, id pegawai sudah ada.                 
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