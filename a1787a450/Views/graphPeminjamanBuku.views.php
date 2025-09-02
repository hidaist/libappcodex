<?php

error_reporting(error_level: 5);
include __DIR__ .'/../session.php';
include '../librari/inc.conection.php';
// Timezone & inisialisasi array
date_default_timezone_set('Asia/Jakarta');
$bulan_labels = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

$data_jml_total_buku_bulanan = array(); // untuk grafik bulanan 
$data_jml_total_buku_tahunan = array(); // untuk grafik tahunan 

// =========================
// 1) Hitung per Bulan 
// =========================
$tahun_sekarang = (int)date('Y');

for ($bulan = 1; $bulan <= 12; $bulan++) {
    // Hitung jumlah peminjaman per bulan & tahun berjalan
    // Tidak perlu join ke tabel lain untuk sekadar menghitung jumlah pinjam
    $sql_count_pinjam = "
        SELECT COUNT(tb_lib_peminjaman.kd_pinjam) AS total_buku
        FROM tb_lib_peminjaman
        WHERE MONTH(tb_lib_peminjaman.date_pinjam) = $bulan
          AND YEAR(tb_lib_peminjaman.date_pinjam)  = $tahun_sekarang
    ";

    $result = mysqli_query($koneksi, $sql_count_pinjam);
    if (!$result) {
        die('Query error (bulanan): ' . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
    $total_buku_bulan = (int)($row['total_buku'] ?? 0);

    // Simpan dengan key label bulan (supaya urut & mudah dibaca)
    $data_jml_total_buku_bulanan[$bulan_labels[$bulan - 1]] = $total_buku_bulan;
}

// =========================
// 2) Hitung per Tahun 
// =========================
$tahun_awal = $tahun_sekarang - 9; //(banyak tahun)

for ($tahun = $tahun_awal; $tahun <= $tahun_sekarang; $tahun++) {

    $sql_total_pinjam_tahun = "
        SELECT COUNT(tb_lib_peminjaman.kd_pinjam) AS total_buku
        FROM tb_lib_peminjaman
        WHERE YEAR(tb_lib_peminjaman.date_pinjam) = $tahun
    ";

    $result = mysqli_query($koneksi, $sql_total_pinjam_tahun);
    if (!$result) {
        die('Query error (tahunan): ' . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
    $total_buku_tahun = (int)($row['total_buku'] ?? 0);

    // Simpan dengan key tahun
    $data_jml_total_buku_tahunan[$tahun] = $total_buku_tahun;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Grafik Peminjaman Buku</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width: 52%; float: left;">
        <canvas id="chartBulanan"></canvas>
    </div>
    <div style="width: 52%; float: left;">
        <canvas id="chartTahunan"></canvas>
    </div>

    <script>
    // Chart Bulanan
    var ctxBulanan = document.getElementById('chartBulanan').getContext('2d');
    var chartBulanan = new Chart(ctxBulanan, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($bulan_labels); ?>,
            datasets: [{
                label: 'Peminjaman Buku Tahun <?php echo $tahun_sekarang; ?>',
                data: <?php echo json_encode(array_values($data_jml_total_buku_bulanan)); ?>,
                backgroundColor: 'rgba(150, 15, 0, 0.5)',
                borderColor: 'rgba(255, 0, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Peminjaman Buku Bulanan'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Jumlah Peminjaman'
                    },
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Chart Tahunan
    var ctxTahunan = document.getElementById('chartTahunan').getContext('2d');
    var chartTahunan = new Chart(ctxTahunan, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($data_jml_total_buku_tahunan)); ?>,
            datasets: [{
                label: 'Peminjaman Buku',
                data: <?php echo json_encode(array_values($data_jml_total_buku_tahunan)); ?>,
                backgroundColor: 'rgba(0, 15, 150, 0.5)',
                borderColor: 'rgba(0, 0, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Peminjaman Buku Tahunan'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tahun'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Jumlah Peminjaman'
                    },
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>

</body>

</html>
