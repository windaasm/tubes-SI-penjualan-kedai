<?php
session_start();
$_SESSION['current_page'] = "Menu";
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
                    <h1 class="h2">Data Menu</h1>
                </div>

                <!-- <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="menu-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Menu</button></a>
                        </div>
                    </div>
                </div>  -->
                <a href="menu-tambah.php"><button type="button" class="btn btn-primary mb-4">Tambah Data Menu</button></a>

                <div class="table-responsive">
                    <table id="example" class="uk-table uk-table-hover uk-table-striped " style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" class="dt-center">No</th>
                                <th scope="col" class="dt-center">Id Menu</th>
                                <th scope="col" class="dt-center">Nama Menu</th>
                                <th scope="col" class="dt-center">Jenis Menu</th>
                                <th scope="col" class="dt-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dataMenu = getListMenu();
                            $no = 1;
                            foreach ($dataMenu as $menu) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>.</td>
                                    <td class="text-center"><?php echo $menu["id_menu"]; ?></td>
                                    <td><?php echo $menu["nama_menu"]; ?></td>
                                    <td class="text-center"><?php echo $menu["jenis_menu"]; ?></td>
                                    <td class="text-center">
                                        <a href="menu-form-edit.php?id_menu=<?php echo $menu["id_menu"] ?>" class="badge bg-info"><i class="fas fa-pen"></i></a>
                                        <a href="menu-konfirmasi-hapus.php?id_menu=<?php echo $menu["id_menu"] ?>" class="badge bg-danger"><i class="fas fa-trash-can"></i></a>
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