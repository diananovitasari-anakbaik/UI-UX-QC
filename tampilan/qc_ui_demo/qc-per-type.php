<?php

// =============================
// DATA DUMMY QC AFKIR DETAIL
// =============================

$rows = [

[
    'operation' => 'Periksa',
    'type'      => 'C230',
    'meja'      => '105',
    'pb'        => 1,
    'aktual'    => 120,
    'bagus'     => 100,

    // AFKIR TOTAL
    'afkir'     => 20,

    // DETAIL DEFECT (jumlah total harus = afkir)
    'D'=>2,'M'=>1,'LA'=>0,'LB'=>1,'R'=>0,'F'=>2,'K'=>0,'P'=>3,'G'=>1,
    'N'=>0,'V'=>0,'E'=>1,'YA'=>1,'YB'=>0,'ZB'=>0,'ZC'=>0,'H'=>1,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>2,'ZA'=>0,'YC'=>1,'YD'=>0,'T'=>1,'S2'=>0,'Z'=>0
],

[
    'operation' => 'Periksa',
    'type'      => 'C230',
    'meja'      => '108',
    'pb'        => 1,
    'aktual'    => 110,
    'bagus'     => 95,
    'afkir'     => 15,

    'D'=>1,'M'=>0,'LA'=>0,'LB'=>1,'R'=>0,'F'=>1,'K'=>0,'P'=>2,'G'=>0,
    'N'=>0,'V'=>0,'E'=>1,'YA'=>0,'YB'=>0,'ZB'=>0,'ZC'=>0,'H'=>1,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>1,'ZA'=>0,'YC'=>1,'YD'=>0,'T'=>1,'S2'=>0,'Z'=>0
],

[
    'operation' => 'Perbaikan',
    'type'      => 'C230',
    'meja'      => '140',
    'pb'        => 1,
    'aktual'    => 90,
    'bagus'     => 90,
    'afkir'     => 0,

    'D'=>0,'M'=>0,'LA'=>0,'LB'=>0,'R'=>0,'F'=>0,'K'=>0,'P'=>0,'G'=>0,
    'N'=>0,'V'=>0,'E'=>0,'YA'=>0,'YB'=>0,'ZB'=>0,'ZC'=>0,'H'=>0,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>0,'ZA'=>0,'YC'=>0,'YD'=>0,'T'=>0,'S2'=>0,'Z'=>0
],

[
    'operation' => 'Gerinda',
    'type'      => 'C230',
    'meja'      => '115',
    'pb'        => 1,
    'aktual'    => 150,
    'bagus'     => 130,
    'afkir'     => 20,

    'D'=>2,'M'=>1,'LA'=>1,'LB'=>0,'R'=>1,'F'=>2,'K'=>0,'P'=>2,'G'=>1,
    'N'=>1,'V'=>0,'E'=>0,'YA'=>1,'YB'=>0,'ZB'=>0,'ZC'=>0,'H'=>1,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>1,'ZA'=>1,'YC'=>1,'YD'=>0,'T'=>1,'S2'=>0,'Z'=>1
],

[
    'operation' => 'Gerinda',
    'type'      => 'C230',
    'meja'      => '117',
    'pb'        => 1,
    'aktual'    => 145,
    'bagus'     => 130,
    'afkir'     => 15,

    'D'=>1,'M'=>1,'LA'=>1,'LB'=>0,'R'=>1,'F'=>1,'K'=>0,'P'=>2,'G'=>1,
    'N'=>0,'V'=>0,'E'=>0,'YA'=>0,'YB'=>0,'ZB'=>0,'ZC'=>1,'H'=>1,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>1,'ZA'=>1,'YC'=>0,'YD'=>0,'T'=>0,'S2'=>0,'Z'=>1
],

/* =======================
   TYPE C231
======================= */

[
    'type'      => 'C231',
    'operation' => 'Periksa',
    'meja'      => '201',
    'pb'        => 1,
    'aktual'    => 130,
    'bagus'     => 110,
    'afkir'     => 20,

    'D'=>2,'M'=>1,'LA'=>1,'LB'=>0,'R'=>1,'F'=>2,'K'=>0,'P'=>3,'G'=>1,
    'N'=>1,'V'=>0,'E'=>1,'YA'=>0,'YB'=>0,'ZB'=>0,'ZC'=>0,'H'=>1,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>2,'ZA'=>0,'YC'=>1,'YD'=>0,'T'=>1,'S2'=>0,'Z'=>0
],

[
    'type'      => 'C231',
    'operation' => 'Periksa',
    'meja'      => '202',
    'pb'        => 1,
    'aktual'    => 125,
    'bagus'     => 105,
    'afkir'     => 20,

    'D'=>1,'M'=>2,'LA'=>0,'LB'=>1,'R'=>0,'F'=>1,'K'=>0,'P'=>2,'G'=>1,
    'N'=>0,'V'=>0,'E'=>1,'YA'=>1,'YB'=>0,'ZB'=>0,'ZC'=>0,'H'=>1,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>1,'ZA'=>0,'YC'=>1,'YD'=>1,'T'=>1,'S2'=>0,'Z'=>0
],

[
    'type'      => 'C231',
    'operation' => 'Gerinda',
    'meja'      => '210',
    'pb'        => 1,
    'aktual'    => 150,
    'bagus'     => 135,
    'afkir'     => 15,

    'D'=>1,'M'=>1,'LA'=>0,'LB'=>0,'R'=>1,'F'=>1,'K'=>0,'P'=>2,'G'=>1,
    'N'=>0,'V'=>0,'E'=>0,'YA'=>1,'YB'=>0,'ZB'=>0,'ZC'=>0,'H'=>1,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>1,'ZA'=>0,'YC'=>0,'YD'=>0,'T'=>1,'S2'=>0,'Z'=>0
],

[
    'type'      => 'C231',
    'operation' => 'Perbaikan',
    'meja'      => '220',
    'pb'        => 1,
    'aktual'    => 95,
    'bagus'     => 90,
    'afkir'     => 5,

    'D'=>0,'M'=>0,'LA'=>0,'LB'=>0,'R'=>0,'F'=>1,'K'=>0,'P'=>1,'G'=>0,
    'N'=>0,'V'=>0,'E'=>0,'YA'=>0,'YB'=>0,'ZB'=>0,'ZC'=>0,'H'=>1,'S'=>0,
    'S1'=>0,'I'=>0,'B'=>1,'ZA'=>0,'YC'=>0,'YD'=>0,'T'=>1,'S2'=>0,'Z'=>0
],

];


// =============================
// GROUP BY OPERATION
// =============================
$group = [];

foreach ($rows as $r) {

    $type      = $r['type'];       // pastikan nama field sesuai DB
    $operation = $r['operation'];  // pastikan sesuai

    $group[$type][$operation][] = $r;
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan QC-12</title>

<link rel="stylesheet" href="assets/css/base.css">
<link rel="stylesheet" href="assets/css/qc_per_type.css">
<link rel="stylesheet" href="assets/css/header-qc.css">

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

<script src="assets/js/headerr.js"></script>

<main class="page">

<div class="tab-bar">
    <a href="qc_per_meja.php" class="tab">Laporan Per-Meja</a>
    <a href="qc-per-type.php" class="tab active">Laporan Per-Type</a>
</div>

<div class="card filter-card">

    <!-- FILTER TIPE -->
    <select id="typeFilter">
        <option value="ALL">SEMUA TYPE</option>

        <?php foreach (array_keys($group) as $type): ?>
            <option value="<?= $type ?>"><?= $type ?></option>
        <?php endforeach; ?>

    </select>
</div>

<div class="card table-card">
<table>
    <colgroup>
        <col style="width:4%"> <!-- OPERATION -->
        <col style="width:2.5%">  <!-- MEJA -->
        <col style="width:1.5%">  <!-- PB -->
        <col style="width:2.8%">  <!-- AKTUAL -->

        <col style="width:1.8%">  <!-- BAGUS PCS -->
        <col style="width:1.8%">  <!-- BAGUS % -->

        <col style="width:1.8%">  <!-- AFKIR PCS -->
        <col style="width:1.8%">  <!-- AFKIR % -->

        <!-- 20 defect kolom kecil -->
        <col span="27" style="width:1.3%">
    </colgroup>
        <thead>
            <tr>
                <th rowspan="2">OPERATION</th>
                <th rowspan="2">MEJA</th>
                <th rowspan="2">PB</th>
                <th rowspan="2">AKTUAL</th>

                <th colspan="2">BAGUS</th>
                <th colspan="29">AFKIR</th>
            </tr>

            <tr>
                <th>PCS</th>
                <th>%</th>

                <th>PCS</th>
                <th>%</th>
                <th>D</th>
                <th>M</th>
                <th>LA</th>
                <th>LB</th>
                <th>R</th>
                <th>F</th>
                <th>K</th>
                <th>P</th>
                <th>G</th>
                <th>N</th>
                <th>V</th>
                <th>E</th>
                <th>YA</th>
                <th>YB</th>
                <th>ZB</th>
                <th>ZC</th>
                <th>H</th>
                <th>S</th>
                <th>S1</th>
                <th>I</th>
                <th>B</th>
                <th>ZA</th>
                <th>YC</th>
                <th>YD</th>
                <th>T</th>
                <th>S2</th>
                <th>Z</th>
            </tr>
        </thead>

<tbody>

<tbody>

<?php
$defects = ['D','M','LA','LB','R','F','K','P','G','N','V','E','YA','YB','ZB','ZC','H','S','S1','I','B','ZA','YC','YD','T','S2','Z'];

foreach ($group as $type => $operations):
?>

    <!-- ================= TYPE ROW ================= -->
    <tr class="type-sticky" data-type="<?= $type ?>">
        <td colspan="35" class="type-cell">
            TYPE : <?= $type ?>
        </td>
    </tr>

    <?php foreach ($operations as $operation => $rows): ?>

        <?php
        $rowspan = count($rows);
        $firstRow = true;

        $totalAktual = 0;
        $totalBagus  = 0;
        $totalAfkir  = 0;
        $totalDefect = array_fill_keys($defects, 0);
        ?>

        <?php foreach ($rows as $r): 

            $aktual = $r['aktual'];
            $bagus  = $r['bagus'];
            $afkir  = $r['afkir'];

            $pctBagus = $aktual ? round($bagus/$aktual*100) : 0;
            $pctAfkir = $aktual ? round($afkir/$aktual*100) : 0;

            $totalAktual += $aktual;
            $totalBagus  += $bagus;
            $totalAfkir  += $afkir;

            foreach ($defects as $d) {
                $totalDefect[$d] += $r[$d];
            }
        ?>

        <tr data-type="<?= $type ?>">

            <!-- OPERATION rowspan -->
            <?php if ($firstRow): ?>
                <td rowspan="<?= $rowspan ?>">
                    <?= $operation ?>
                </td>
            <?php endif; ?>

            <td><?= $r['meja'] ?></td>
            <td><?= $r['pb'] ?></td>
            <td><?= $aktual ?></td>

            <!-- BAGUS -->
            <td><?= $bagus ?></td>
            <td><?= $pctBagus ?>%</td>

            <!-- AFKIR -->
            <td><?= $afkir ?></td>
            <td><?= $pctAfkir ?>%</td>

            <!-- DETAIL DEFECT -->
            <?php foreach ($defects as $d): ?>
                <td><?= $r[$d] ?></td>
            <?php endforeach; ?>

        </tr>

        <?php 
        $firstRow = false;
        endforeach; 
        ?>

        <!-- TOTAL PER OPERATION -->
        <tr class="total-row" data-type="<?= $type ?>">
            <td colspan="3">TOTAL <?= $operation ?></td>
            <td><?= $totalAktual ?></td>
            <td><?= $totalBagus ?></td>
            <td><?= $totalAktual ? round($totalBagus/$totalAktual*100) : 0 ?>%</td>
            <td><?= $totalAfkir ?></td>
            <td><?= $totalAktual ? round($totalAfkir/$totalAktual*100) : 0 ?>%</td>

            <?php foreach ($defects as $d): ?>
                <td><?= $totalDefect[$d] ?></td>
            <?php endforeach; ?>
        </tr>

    <?php endforeach; ?>

<?php endforeach; ?>

</tbody>

<script>
const typeFilter = document.getElementById("typeFilter");

function applyFilter() {

    const typeVal = typeFilter.value;

    document.querySelectorAll(".table-card tbody tr")
        .forEach(row => {

            const rowType = row.dataset.type || "";
            const isTypeRow = row.classList.contains("type-sticky");

            const matchType =
                typeVal === "ALL" ||
                rowType === typeVal;

            // Tampilkan atau sembunyikan row
            row.style.display = matchType ? "" : "none";
        });
}

// TYPE FILTER
if (typeFilter) {
    typeFilter.addEventListener("change", applyFilter);
}
</script>
</body>
</html>