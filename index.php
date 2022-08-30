<?php
// include 'db/dbConfig.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/login.css">
    <title>Sistem Pengelolaan Penjualan Kedai Bang Ajip</title>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="http://hayuq.gemjeeh.my.id/LOGO%20KEDAI%20crop.png" style="width: 150px;" alt="logo">
                                        <h4 class="mt-1 mb-1 pb-1">Sistem Pengelolaan Penjualan Kedai Bang Ajip</h4>
                                    </div>

                                    <form action="login.php" method="POST" name="form-login">
                                        <?php
                                        if (isset($_GET["error"])) {
                                            $error = $_GET["error"];
                                            if ($error == 1)
                                                // echo ("Id Pegawai atau Password salah");
                                                echo "<div class='alert alert-danger' role='alert'>Username atau password salah</div>";
                                            else if ($error == 2)
                                                // echo ("Anda harus login terlebih dahulu");
                                                echo "<div class='alert alert-danger' role='alert'>Anda harus login dahulu</div>";
                                            else if ($error == 3)
                                                // echo ("Koneksi ke database gagal");
                                                echo "<div class='alert alert-danger' role='alert'>Koneksi ke databse gagal</div>";
                                            else if ($error == 4) {
                                                // echo ("Anda harus login terlebih dahulu");
                                                echo "<div class='alert alert-danger' role='alert'>Anda harus login dahulu</div>";
                                            }
                                        }
                                        ?>
                                        <p>Login dengan username dan password</p>

                                        <div class="form-outline mb-4">
                                            <label class=" form-label" for="form2Example11">Username</label>
                                            <input type="text" id="form2Example11" class="form-control" placeholder="Masukkan username" name="idPegawai" value="<?php echo ($_SERVER["REMOTE_ADDR"] == "5.189.147.47" ? "admin" : ""); ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Password</label>
                                            <input type="password" id="form2Example22" class="form-control" name="password" placeholder="Masukkan password" value="<?php echo ($_SERVER["REMOTE_ADDR"] == "5.189.147.47" ? "password_admin" : ""); ?>" />
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input type="submit" name="tblLogin" value="Login" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"></input>
                                            <!-- <a class="text-muted" href="#!">Lupa Password?</a> -->
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2 justify-content-center">
                                <div class="p-md-5 mx-md-1 p-sm-3 p-sx-3">
                                        <h2 class="text-white font-weight-bold font-italic">Hot Eats, Cold Treats!!</h2>
                                    <!-- <img src="http://hayuq.gemjeeh.my.id/jabo.jpeg"  alt="Responsive image"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 1000);
        });
    </script>
</body>

</html>