<?php
$total_kirim_shift_b = "1,605";
$total_kirim_all     = "1,801";

$qc_shift = [
    "QC 12" => 575,
    "QC 35" => 310,
    "QC 67" => 169,
    "QC 8"  => 181,
    "QC P2" => 325,
    "QC SK" => 45,
];

$qc_all = [
    "QC 12" => 575,
    "QC 35" => 310,
    "QC 67" => 268,
    "QC 8"  => 211,
    "QC P2" => 392,
    "QC SK" => 45,
];

$total_meja            = 38;
$meja_aktif            = 34;
$persen_aktif          = 89.5;
$mencapai_target       = 18;
$persen_mencapai       = 52.9;
$tidak_mencapai_target = 16;
$persen_tidak          = 47.1;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>QC Summary</title>

</head>
<body>

<div class="qc-dashboard">

    <!-- TOTAL SHIFT B -->
    <div class="qc-card bg-blue">
        <div class="qc-card-title">Total Kirim Shift B</div>
        <div class="qc-card-value"><?= $total_kirim_shift_b ?></div>
        <div class="qc-list">
            <?php foreach ($qc_shift as $label => $value): ?>
                <span><?= $label ?> : <?= number_format($value) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- TOTAL ALL -->
    <div class="qc-card bg-green">
        <div class="qc-card-title">Total Kirim All</div>
        <div class="qc-card-value"><?= $total_kirim_all ?></div>
        <div class="qc-list">
            <?php foreach ($qc_all as $label => $value): ?>
                <span><?= $label ?> : <?= number_format($value) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- MEJA -->
    <div class="qc-card bg-orange">
        <div class="qc-card-title">Status Meja Aktif</div>
        <div class="qc-card-value"><?= $meja_aktif ?> / <?= $total_meja ?></div>
        <div class="qc-list">
            Aktif : <?= $persen_aktif ?>%
        </div>
    </div>

    <!-- TARGET -->
    <div class="qc-card bg-red">
    <div class="qc-card-title">PENCAPAIAN TARGET</div>

    <div class="qc-target">
        <span class="success">😊 Mencapai : 18 (52.9%)</span>
        <span class="danger">😢 Tidak : 16 (47.1%)</span>
    </div>
</div>

</div>

</body>
</html>
