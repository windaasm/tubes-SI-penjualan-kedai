<?php
session_start();
$_SESSION['current_page'] = "Stok Bahan";
?>
<?php require_once('../functions/functions.php'); ?>
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Data Stok Bahan</h1>
                </div>

                <!-- <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="stok-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Stok Bahan</button></a>
                        </div>
                    </div>
                </div> -->
                <a href="stok-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Stok Bahan</button></a>

                <div class="table-responsive">
                    <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="dt-center">No</th>
                                <th scope="col" class="dt-center">ID Stok</th>
                                <th scope="col" class="dt-center">Nama Bahan</th>
                                <th scope="col" class="dt-center">Qty</th>
                                <th scope="col" class="dt-center">Satuan</th>
                                <th scope="col" class="dt-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dataStokBahan = getListStok();
                            $no = 1;
                            foreach ($dataStokBahan as $stok) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>.</td>
                                    <td class="text-center"><?php echo $stok["id_stok"]; ?></td>
                                    <td><?php echo $stok["nama_bahan"]; ?></td>
                                    <td class="text-center"><?php echo $stok["qty"]; ?></td>
                                    <td class="text-center"><?php echo $stok["satuan"]; ?></td>
                                    <td class="text-center">
                                        <a href="stok-form-edit.php?id_stok=<?php echo $stok["id_stok"] ?>" class="badge bg-info"><i class="fas fa-pen"></i></a>
                                        <a href="stok-konfirmasi-hapus.php?id_stok=<?php echo $stok["id_stok"] ?>" class="badge bg-danger"><i class="fas fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 1000);
            $('#example').DataTable({
                language : {
                    url : 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                }
            });
        });
    </script>
</body>

</html>