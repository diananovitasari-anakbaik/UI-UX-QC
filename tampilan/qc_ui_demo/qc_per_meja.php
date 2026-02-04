<?php
// dummy data QC per meja
$rows = [
    [
        'meja' => 'Meja A',
        'type' => 'QC-01',
        'ok' => 180,
        'ng' => 20,
        'operator' => 'Andi',
        'shift' => 'Shift 1',
        'update' => '12-10-2018 10:30'
    ],
    [
        'meja' => 'Meja B',
        'type' => 'QC-02',
        'ok' => 95,
        'ng' => 5,
        'operator' => 'Budi',
        'shift' => 'Shift 1',
        'update' => '12-10-2018 10:15'
    ],
    [
        'meja' => 'Meja C',
        'type' => 'QC-01',
        'ok' => 160,
        'ng' => 40,
        'operator' => 'Sari',
        'shift' => 'Shift 2',
        'update' => '12-10-2018 14:05'
    ],

    [
        'meja' => 'Meja D',
        'type' => 'QC-03',
        'ok' => 200,
        'ng' => 0,
        'operator' => 'Dewi',
        'shift' => 'Shift 2',
        'update' => '12-10-2018 13:50'
    ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan QC Per-Meja</title>

    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/qc-per-meja.css">
    <link rel="stylesheet" href="assets/css/header-qc.css">
</head>
<body>

<main class="page">

    <!-- TAB -->
    <div class="tab-bar">
        <a href="qc_per_meja.php" class="tab active">Laporan Per-Meja</a>
        <a href="qc_per_type.php" class="tab">Laporan Per-Type</a>
    </div>

    <!-- FILTER -->
    <div class="card filter-card">
        <div>
            <select>
                <option>Channel name</option>
            </select>
            <select>
                <option>EN</option>
            </select>
        </div>
        <button class="btn-primary">+ Export</button>
    </div>

    <!-- ACTION -->
    <div class="action-bar">
        <select>
            <option>Choose action</option>
        </select>
        <div class="search">
            <input type="text" placeholder="Find meja / operator">
        </div>
    </div>

    <!-- TABLE -->
    <div class="card table-card">
        <table>
            <thead>
                <tr>
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
                <?php foreach ($rows as $r): 
                    $target = $r['ok'] + $r['ng'];
                    $aktual = $target;

                    $pctAktual = $target ? round(($aktual / $target) * 100, 1) : 0;
                    $pctBagus  = $aktual ? round(($r['ok'] / $aktual) * 100, 1) : 0;
                    $pctAfkir  = $aktual ? round(($r['ng'] / $aktual) * 100, 1) : 0;
                ?>
                <tr>
                    <td class="link"><?= $r['meja'] ?></td>
                    <td><?= $r['type'] ?></td>
                    <td><?= $target ?></td>
                    <td><?= $aktual ?></td>
                    <td><?= $pctAktual ?>%</td>
                    <td><?= $r['ok'] ?></td>
                    <td><?= $pctBagus ?>%</td>
                    <td><?= $r['ng'] ?></td>
                    <td><?= $pctAfkir ?>%</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>

<script src="assets/js/header.js"></script>
</body>
</html>
