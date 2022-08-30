<?php
session_start();
$_SESSION['current_page'] = "Detail Pengeluaran";
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
                    <h1 class="h2">Data Detail Pengeluaran</h1>
                </div>

                <!-- <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="DetailPengeluaran-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Detail Pengeluaran</button></a>
                        </div>
                    </div>
                </div> -->
                <a href="DetailPengeluaran-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Detail Pengeluaran</button></a>


                <div class="table-responsive">
                    <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="dt-center">No</th>
                                <th scope="col" class="dt-center">ID Pengeluaran</th>
                                <th scope="col" class="dt-center">Stok Bahan</th>
                                <th scope="col" class="dt-center">Biaya Bahan</th>
                                <th scope="col" class="dt-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dataDetailPengeluaran = getListDetailPengeluaran();
                            $no = 1;
                            foreach ($dataDetailPengeluaran as $dpengeluaran) {
                            ?>
                                <tr class="text-center">
                                    <td><?= $no++; ?>.</td>
                                    <td><?php echo $dpengeluaran["id_pengeluaran"];
                                        ?></td>
                                    <td class="text-start"><?php echo $dpengeluaran["nama_bahan"] . " (" . $dpengeluaran["satuan"] . ")";
                                                            ?></td>
                                    <td>Rp <?php echo number_format($dpengeluaran["harga_satuan"], 0, ",", ".");
                                            ?></td>
                                    <td>
                                        <a href="detailpengeluaran-form-edit.php?id=<?php echo $dpengeluaran["id"];?>" class="badge bg-info"><i class="fas fa-pen"></i></a>
                                        <a href="detailpengeluaran-konfirmasi-hapus.php?id=<?php echo $dpengeluaran["id"]?>" class="badge bg-danger"><i class="fas fa-trash-can"></i></a>
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