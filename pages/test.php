<?php require_once('../functions/functions.php'); ?>
<?php
// checkLogin();

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

for ($i = 0; $i < count($bulanPengeluaran); $i++) {
    echo "{ label : " . $bulanPengeluaran[$i] . " " . $tahunPengeluaran[$i] . ", y : " . $totalPengeluaran[$i] . " }";
    echo  ($i < count($bulanPengeluaran) - 1) ? ", " : "";
}

$dataPenjualan = getCountPenjualan();
foreach ($dataPenjualan as $row) {
    $totalPenjualan[] = $row["total"];
    $bulanPenjualan[] = $row["bulan"];
    $tahunPenjualan[] = $row["tahun"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.uikit.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.uikit.min.css">
        <script src="https://kit.fontawesome.com/81efd83dc2.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-6">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
        <div class="col-6">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($dataJenisMenu); ?>,
                datasets: [{
                    label: '# of Votes',
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
            title:{
                text: "Crude Oil Reserves vs Production, 2016"
            },	
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
                                        // echo "{ label : '" . $bulanPenngeluaran[$i] . "', y : " . $totalPengeluaran[$i] . " }";
                                        // echo  ($i < count($bulanPengeluaran) - 1) ? ", " : "";
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
                                        // echo "{ label : '" . $bulanPenjualan[$i] . ", y : " . $totalPenjualan[$i] . " }";
                                        // echo  ($i < count($bulanPenjualan) - 1) ? ", " : "";
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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>