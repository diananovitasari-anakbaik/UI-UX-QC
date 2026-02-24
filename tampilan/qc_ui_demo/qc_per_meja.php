<?php
// DATA DUMMY QC-12
$rows = [

['meja'=>'Gerindra','type'=>'QC-01','ok'=>180,'ng'=>20],
['meja'=>'Gerindra','type'=>'QC-01','ok'=>160,'ng'=>40],
['meja'=>'Gerindra','type'=>'QC-01','ok'=>170,'ng'=>30],
['meja'=>'Cek Ulang','type'=>'QC-01','ok'=>95,'ng'=>5],
['meja'=>'Perbaikan','type'=>'QC-01','ok'=>150,'ng'=>50],

['meja'=>'Gerindra','type'=>'QC-02','ok'=>190,'ng'=>10],
['meja'=>'Gerindra','type'=>'QC-02','ok'=>195,'ng'=>5],
['meja'=>'Cek Ulang','type'=>'QC-02','ok'=>80,'ng'=>20],

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
<link rel="stylesheet" href="assets/css/search-clear.css"> <!-- CSS BARU -->

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

    <!-- SHIFT -->
    <div class="shift-info">
        <span class="shift-label">Shift yang sedang berjalan :</span>
        <div class="shift-group">
            <span class="shift-badge active">Shift B</span>
            <span class="shift-badge">Shift C</span>
        </div>
    </div>

    <!-- FILTER MEJA -->
    <select id="mejaFilter">
        <option value="ALL">SEMUA MEJA</option>
        <option value="GERINDRA">GERINDRA</option>
        <option value="CEK ULANG">CEK ULANG</option>
        <option value="PERBAIKAN">PERBAIKAN</option>
    </select>

    <!-- SEARCH DENGAN CLEAR BUTTON -->
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
<th>TYPE</th>
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
$totalOK = 0;
$totalNG = 0;
$prefix = ($qc === 'QC-01') ? 100 : 200;

foreach ($data as $r):

$no = $prefix + $counter;
$target = $r['ok'] + $r['ng'];
$pctOK = round($r['ok'] / $target * 100);
$pctNG = round($r['ng'] / $target * 100);

$totalTarget += $target;
$totalOK += $r['ok'];
$totalNG += $r['ng'];
?>

<tr data-meja="<?= strtoupper($meja) ?>">
<td class="no-col"><?= $no ?></td>
<td><?= $r['meja'] ?></td>
<td><?= $qc ?></td>
<td><?= $target ?></td>
<td><?= $target ?></td>
<td>100%</td>
<td><?= $r['ok'] ?></td>
<td><?= $pctOK ?>%</td>
<td><?= $r['ng'] ?></td>
<td><?= $pctNG ?>%</td>
</tr>

<?php
$counter++;
endforeach;

$totalPctOK = round($totalOK / $totalTarget * 100);
$totalPctNG = round($totalNG / $totalTarget * 100);
?>

<tr class="total-row" data-meja="<?= strtoupper($meja) ?>">
<td></td>
<td colspan="2">TOTAL</td>
<td><?= $totalTarget ?></td>
<td><?= $totalTarget ?></td>
<td>100%</td>
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
}

searchInput.addEventListener("input", function() {
    clearBtn.style.display = this.value ? "block" : "none";
    applyFilter();
});

clearBtn.addEventListener("click", function() {
    searchInput.value = "";
    clearBtn.style.display = "none";
    applyFilter();
});

mejaFilter.addEventListener("change", applyFilter);
</script>

<?php include 'qc-summary-footer.php'; ?>

</body>
</html>
