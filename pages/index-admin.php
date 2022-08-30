<?php require_once('../functions/functions.php'); ?>
<?php
session_start();
$_SESSION["current_page"] = "Index Admin";
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../index.php?error=4");
}
?>
<!doctype html>
<html lang="en">

<?php include_once("../head.php"); ?>
<style>
    .logo {
        width: 40rem;
    }
</style>
<body> 
    <?php headers() ?>;
    <div class="container-fluid">
        <div class="row ">
            <?php navbar() ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
                <div class="d-flex justify-content-righ flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-center "> 
                    <h1>Selamat Datang!</h1> 
                </div> 
                <div class="text-center">                 
                    <img src="http://hayuq.gemjeeh.my.id/LOGO%20KEDAI%20biru.png" class="rounded logo" alt="responsive image">
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../dashboard/dashboard.js"></script>
</body>

</html>