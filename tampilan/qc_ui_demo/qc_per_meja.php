<?php
// DATA INI HANYA DUMMY QC-12
$rows = [

['meja'=>'Gerindra','type'=>'QC-01','ok'=>180,'ng'=>20],
['meja'=>'Gerindra','type'=>'QC-01','ok'=>160,'ng'=>40],
['meja'=>'Gerindra','type'=>'QC-01','ok'=>170,'ng'=>30],
['meja'=>'Cek Ulang','type'=>'QC-01','ok'=>95,'ng'=>5],
['meja'=>'Cek Ulang','type'=>'QC-01','ok'=>90,'ng'=>10],
['meja'=>'Cek Ulang','type'=>'QC-01','ok'=>85,'ng'=>15],
['meja'=>'Perbaikan','type'=>'QC-01','ok'=>130,'ng'=>70],
['meja'=>'Perbaikan','type'=>'QC-01','ok'=>140,'ng'=>60],
['meja'=>'Perbaikan','type'=>'QC-01','ok'=>150,'ng'=>50],

['meja'=>'Gerindra','type'=>'QC-02','ok'=>190,'ng'=>10],
['meja'=>'Gerindra','type'=>'QC-02','ok'=>195,'ng'=>5],
['meja'=>'Gerindra','type'=>'QC-02','ok'=>185,'ng'=>15],
['meja'=>'Cek Ulang','type'=>'QC-02','ok'=>80,'ng'=>20],
['meja'=>'Cek Ulang','type'=>'QC-02','ok'=>85,'ng'=>15],
['meja'=>'Cek Ulang','type'=>'QC-02','ok'=>75,'ng'=>25],
['meja'=>'Perbaikan','type'=>'QC-02','ok'=>160,'ng'=>40],
['meja'=>'Perbaikan','type'=>'QC-02','ok'=>155,'ng'=>45],
['meja'=>'Perbaikan','type'=>'QC-02','ok'=>165,'ng'=>35],

];

// target per type nya (BISA DIGANTI NANTI YA DARI DATABASE :) )
$targetPerType = [
    'QC-01' => 200,
    'QC-02' => 300
];

// GROUP BY MEJA -> TYPE
$group = [];

foreach ($rows as $r) {
    if ($r['type'] === 'QC-01' || $r['type'] === 'QC-02') {
        $group[$r['meja']][$r['type']][] = $r;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan QC-12</title>

<link rel="stylesheet" href="assets/css/base.css">
<link rel="stylesheet" href="assets/css/qc-per-meja.css">
<link rel="stylesheet" href="assets/css/header-qc.css">
<link rel="stylesheet" href="assets/css/search-clear.css">

<style>
.no-col {
    color:#c00000;
    font-weight:bold;
}
.total-row td {
    background:#d9ead3 !important;
    font-weight:bold;
}
</style>
</head>

<body>

<script src="assets/js/header.js"></script>

<main class="page">

<div class="tab-bar">
    <a href="qc_per_meja.php" class="tab active">Laporan Per-Meja</a>
    <a href="qc_per_type.php" class="tab">Laporan Per-Type</a>
</div>

<div class="card filter-card">

    <div class="shift-info">
        <span class="shift-label">Shift yang sedang berjalan :</span>
        <div class="shift-group">
            <span class="shift-badge active">Shift B</span>
            <span class="shift-badge">Shift C</span>
        </div>
    </div>

    <select id="mejaFilter">
        <option value="ALL">SEMUA MEJA</option>
        <option value="GERINDRA">GERINDRA</option>
        <option value="CEK ULANG">CEK ULANG</option>
        <option value="PERBAIKAN">PERBAIKAN</option>
    </select>

    <div class="search">
        <input type="text" id="searchInput" placeholder="Find meja / operator">
        <span class="clear-btn" id="clearBtn">✕</span>
    </div>

</div>

<div class="card table-card">
<table>
<thead>
<tr>
<th>NO</th>
<th>MEJA</th>
<th>TARGET</th>
<th>AKTUAL</th>
<th>%</th>
<th>BAGUS</th>
<th>%</th>
<th>AFKIR</th>
<th>%</th>
</tr>
</thead>

<tbody>

<?php
foreach ($group as $meja => $qcList):
foreach ($qcList as $qc => $data):

$counter = 1;
$totalTarget = 0;
$totalAktual = 0;
$totalOK = 0;
$totalNG = 0;
$prefix = ($qc === 'QC-01') ? 100 : 200;

foreach ($data as $r):

$no = $prefix + $counter;

$target = $targetPerType[$qc]; // target fix
$aktual = $r['ok'] + $r['ng']; // aktual sebenarnya dari data

$pctAktual = round(($aktual / $target) * 100);
$pctOK = round(($r['ok'] / $aktual) * 100);
$pctNG = round(($r['ng'] / $aktual) * 100);

// emot berdassarkan pencapaian aktual terhadap target
$emoji = ($pctAktual < 80) ? "😟" : "😄";

$totalTarget += $target;
$totalAktual += $aktual;
$totalOK += $r['ok'];
$totalNG += $r['ng'];
?>

<tr data-meja="<?= strtoupper($meja) ?>">
<td class="no-col"><?= $no ?></td>
<td><?= $emoji ?> <?= $r['meja'] ?></td>
<td><?= $target ?></td>
<td><?= $aktual ?></td>
<td><?= $pctAktual ?>%</td>
<td><?= $r['ok'] ?></td>
<td><?= $pctOK ?>%</td>
<td><?= $r['ng'] ?></td>
<td><?= $pctNG ?>%</td>
</tr>

<?php
$counter++;
endforeach;

$totalPctAktual = round(($totalAktual / $totalTarget) * 100);
$totalPctOK = round(($totalOK / $totalAktual) * 100);
$totalPctNG = round(($totalNG / $totalAktual) * 100);


?>

<tr class="total-row" data-meja="<?= strtoupper($meja) ?>">
<td></td>
<td>TOTAL</td>
<td><?= $totalTarget ?></td>
<td><?= $totalAktual ?></td>
<td><?= $totalPctAktual ?>%</td>
<td><?= $totalOK ?></td>
<td><?= $totalPctOK ?>%</td>
<td><?= $totalNG ?></td>
<td><?= $totalPctNG ?>%</td>
</tr>

<?php endforeach; endforeach; ?>

</tbody>
</table>
</div>

</main>

<script>
const searchInput = document.getElementById("searchInput");
const mejaFilter = document.getElementById("mejaFilter");
const clearBtn = document.getElementById("clearBtn");



//--FUNGSI: applyFilter()--//
// Fungsi utama untuk memfilter tabel berdasarkan:
// 1. Dropdown pilihan meja
// 2. Keyword pencarian (search input)
// Akan menyembunyikan atau menampilkan baris sesuai filter
// Lalu memanggil refreshRowColor() agar warna tetap rapi

function applyFilter() {
    const keyword = searchInput.value.toLowerCase();
    const mejaVal = mejaFilter.value;

    document.querySelectorAll(".table-card tbody tr")
        .forEach(row => {

            const mejaData = row.getAttribute("data-meja");
            const rowText = row.innerText.toLowerCase();

            const matchMeja =
                mejaVal === "ALL" ||
                mejaData === mejaVal;

            const matchSearch =
                rowText.includes(keyword);

            row.style.display =
                (matchMeja && matchSearch) ? "" : "none";
        });

    refreshRowColor(); //penting
}



//--FUNGSI: refreshRowColor()--//
// Mengatur ulang warna baris tabel (striping effect)
// - Melewati baris yang di-hide
// - Melewati baris total (tetap hijau)
// - Memberikan warna selang-seling putih & biru muda

function refreshRowColor() {

    const rows = document.querySelectorAll(".table-card tbody tr");
    let visibleIndex = 0;

    rows.forEach(row => {

        // skip yang di-hide
        if (row.style.display === "none") return;

        // skip total row biar tetap hijau
        if (row.classList.contains("total-row")) return;

        if (visibleIndex % 2 === 0) {
            row.style.background = "#ffffff";
        } else {
            row.style.background = "#e5edf7"; // warna biru muda untuk row genap
        }

        visibleIndex++;
    });
}


//--EVENT: SEARCH INPUT--//
// Saat user mengetik:
// - Tampilkan tombol clear jika ada isi
// - Jalankan filter
searchInput.addEventListener("input", function() {
    clearBtn.style.display = this.value ? "block" : "none";
    applyFilter();
});


//--EVENT: CLEAR BUTTON --//
// Saat tombol clear diklik:
// - Kosongkan search
// - Sembunyikan tombol clear
// - Reset filter
clearBtn.addEventListener("click", function() {
    searchInput.value = "";
    clearBtn.style.display = "none";
    applyFilter();
});


//--EVENT: DROPDOWN FILTER MEJA--//
// Saat pilihan meja berubah → jalankan filter ulang
mejaFilter.addEventListener("change", applyFilter);

// jalankan sekali saat halaman load
refreshRowColor();
</script>

<?php include 'qc-summary-footer.php'; ?>

</body>
</html>
