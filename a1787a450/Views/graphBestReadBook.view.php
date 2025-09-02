<?php
error_reporting(error_level: 5);
include __DIR__ .'/../session.php';
include __DIR__.'/../../librari/inc.conection.php';

$sql_best_book = "SELECT 
                    b.judul_buku,
                    b.keterangan_buku,
                    b.filegambar,
                    b.penerbit,
                    b.penulis,
                    COUNT(p.kd_buku) AS total_dibaca
                FROM 
                    tb_lib_peminjaman p
                INNER JOIN 
                    tb_lib_buku b ON p.kd_buku = b.kd_buku
                GROUP BY 
                    b.kd_buku, b.judul_buku, b.keterangan_buku
                ORDER BY 
                    total_dibaca DESC, b.judul_buku ASC
                LIMIT 10";

$result = mysqli_query($koneksi, $sql_best_book);

// ambil data dari query
$labels = [];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['judul_buku'];       // Judul buku untuk label chart
    $data[]   = $row['total_dibaca'];     // Total dibaca untuk nilai chart
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafik Buku Terbanyak Dibaca</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="width: 80%; margin: auto;">
    <canvas id="bar-chart"></canvas>
</div>

<script>
    var ctx = document.getElementById('bar-chart').getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,   // judul buku
            datasets: [{
                label: 'Jumlah Dibaca',
                data: <?php echo json_encode($data); ?>,   // jumlah peminjaman
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'y', // bikin grafik horizontal (biar judul panjang tetap kebaca)
            plugins: {
                title: {
                    display: true,
                    text: ' Buku Terbanyak Dibaca'
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
