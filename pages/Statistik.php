<?php
session_start();
$_SESSION['current_page'] = "Statistik";
?>
<?php require_once('../functions/functions.php'); ?>
<?php
// checkLogin();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../index.php?error=4");
}

// chart
$rows = getCountJenisMenu();
foreach ($rows as $row) {
    $dataJenisMenu[] = $row["jenis_menu"];
    $dataJumlah[] = $row["jumlah"];
}

$dataPengeluaran = getCountPengeluaran();
foreach ($dataPengeluaran as $row) {
    $totalPengeluaran[] = $row["total"];
    $bulanPengeluaran[] = $row["bulan"];
    $tahunPengeluaran[] = $row["tahun"];
}

$dataPenjualan = getCountPenjualan();
foreach ($dataPenjualan as $row) {
    $totalPenjualan[] = $row["total"];
    $bulanPenjualan[] = $row["bulan"];
    $tahunPenjualan[] = $row["tahun"];
}


?>

<!doctype html>
<html lang="en">

<?php include_once("../head.php"); ?>
<style>
    th { white-space: nowrap; }
</style>

<body>
    <?php headers(); ?>
    
    <div class="container-fluid">
        <div class="row">
            <?php navbar(); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
                    <h1 class="h2">Statistik dan Detail Laporan</h1>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                    <div class="col-6">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>

                <!-- statistik ->  card box -->
                <!-- <div class="row mb-4">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                            <span class="h2 font-weight-bold mb-0">2,356</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last week</span>
                                    </p>
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                        <span class="h2 font-weight-bold mb-0">924</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                    <span class="text-nowrap">Since yesterday</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                        <span class="h2 font-weight-bold mb-0">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->


                
                <!-- <div class="row"> -->
                    <!-- <div class="col"> -->
                        <div class="table-responsive">
                            <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                <thead class="align-middle">
                                    <tr class="text-center">
                                        <th scope="col" class="dt-center">No</th>
                                        <th scope="col" class="dt-center">Id Pengeluaran</th>
                                        <th scope="col" class="dt-center">Tanggal Pengeluaran</th>
                                        <th scope="col" class="dt-center">Stok Bahan</th>
                                        <th scope="col" class="dt-center">Jumlah</th>
                                        <th scope="col" class="dt-center">Biaya Bahan</th>
                                        <th scope="col" class="dt-center">By Pegawai</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php
                                    $statistikPengeluaran = getStatistikPengeluaran();
                                    $no = 1;
                                    foreach ($statistikPengeluaran as $row) {
                                    ?>
                                        <tr class=" text-center">
                                            <td><?= $no++; ?>.</td>
                                            <td><?php echo $row["id_pengeluaran"]; ?></td>
                                            <td><?php echo formatTgl($row["tanggal"]); ?></td>
                                            <td><?php echo $row["nama_bahan"]; ?></td>
                                            <td><?php echo $row["jumlah_stok"]; ?></td>
                                            <td>Rp <?php echo number_format($row["harga_satuan"], 0, ",", "."); ?></td>
                                            <td><?php echo $row["nama_pegawai"]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <!-- </div> -->
                    <!-- <div class="col"> -->
                        <div class="table-responsive">
                            <table id="example2" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                <thead class="align-middle">
                                    <tr class="text-center">
                                        <th scope="col" class="dt-center">No</th>
                                        <th scope="col" class="dt-center">Id Penjualan</th>
                                        <th scope="col" class="dt-center">Tanggal Penjualan</th>
                                        <th scope="col" class="dt-center">Nama Menu</th>
                                        <th scope="col" class="dt-center">Jenis Menu</th>
                                        <th scope="col" class="dt-center">Harga Menu</th>
                                        <th scope="col" class="dt-center">By Pegawai</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php
                                    $statistikPenjualan = getStatistikPenjualan();
                                    $no = 1;
                                    foreach ($statistikPenjualan as $row) {
                                    ?>
                                        <tr class=" text-center">
                                            <td><?= $no++; ?>.</td>
                                            <td><?php echo $row["id_penjualan"]; ?></td>
                                            <td><?php echo formatTgl($row["tanggal"]); ?></td>
                                            <td><?php echo $row["nama_menu"]; ?></td>
                                            <td><?php echo $row["jenis_menu"]; ?></td>
                                            <td>Rp <?php echo number_format($row["harga_satuan"], 0, ",", "."); ?></td>
                                            <td><?php echo $row["nama_pegawai"]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <!-- </div> -->
                <!-- </div> -->
            </main>
        </div>
    </div>
    
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            
            data: {
                labels: <?php echo json_encode($dataJenisMenu); ?>,
                datasets: [{
                    label: ['# of Votes'],  
                    data: <?php echo json_encode($dataJumlah); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            axisY: {
                title: "Rupiah per bulan",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC"
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor:"pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Pengeluaran",
                legendText: "Pengeluaran",
                showInLegend: true, 
                dataPoints: [
                    <?php 
                        for ($i = 0; $i < count($bulanPengeluaran); $i++) {
                            echo "{ label : '" . $bulanPengeluaran[$i] . " " . $tahunPengeluaran[$i] . "', y : " . $totalPengeluaran[$i] . " }";
                            echo  ($i < count($bulanPengeluaran) - 1) ? ", " : "";
                        }    
                    ?>
                ]
            },
            {
                type: "column",	
                name: "Penjualan",
                legendText: "Penjualan",
                showInLegend: true,
                dataPoints: [
                    <?php 
                        for ($i = 0; $i < count($bulanPenjualan); $i++) {
                            echo "{ label : '" . $bulanPenjualan[$i] . " " . $tahunPenjualan[$i] . "', y : " . $totalPenjualan[$i] . " }";
                            echo  ($i < count($bulanPenjualan) - 1) ? ", " : "";
                        }    
                    ?>
                ]
            }]
        });
        chart.render();
        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }
        }
    </script>
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
                },
                scrollX: true,
            });
            $('#example2').DataTable({
                language : {
                    url : 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                },
                // footerCallback: function (row, data, start, end, display) {
                //     var api = this.api();
        
                //     // Remove the formatting to get integer data for summation
                //     var intVal = function (i) {
                //         return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                //     };
        
                //     // Total over all pages
                //     total = api
                //         .column(4)
                //         .data()
                //         .reduce(function (a, b) {
                //             return intVal(a) + intVal(b);
                //         }, 0);
        
                //     // Total over this page
                //     pageTotal = api
                //         .column(4, { page: 'current' })
                //         .data()
                //         .reduce(function (a, b) {
                //             return intVal(a) + intVal(b);
                //         }, 0);
        
                //     // Update footer
                //     $(api.column(4).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
                // },
                scrollX: true,
            });

        });
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>