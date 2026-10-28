<!DOCTYPE html>
<html>
<head>
    <title>Tugas PHP</title>
</head>
<body>

<?php
$matkul = [
    ["nama" => "Pengantar PHP", "sks" => 3, "nilai" => 85],
    ["nama" => "Basis Data", "sks" => 3, "nilai" => 75],
    ["nama" => "Struktur Data", "sks" => 3, "nilai" => 65],
    ["nama" => "Jaringan Komputer", "sks" => 3, "nilai" => 55],
    ["nama" => "Kalkulus Dasar", "sks" => 2, "nilai" => 45]
];

function hitungBobot($nilai) {
    if ($nilai >= 80) {
        return ["huruf" => "A", "bobot" => 4.0];
    } else if ($nilai >= 70) {
        return ["huruf" => "B", "bobot" => 3.0];
    } else if ($nilai >= 60) {
        return ["huruf" => "C", "bobot" => 2.0];
    } else if ($nilai >= 50) {
        return ["huruf" => "D", "bobot" => 1.0];
    } else {
        return ["huruf" => "E", "bobot" => 0.0];
    }
}

$total_sks = 0;
$total_bobot = 0;
?>

<h2>Daftar Nilai Mahasiswa</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nama Matkul</th>
        <th>SKS</th>
        <th>Nilai Angka</th>
        <th>Nilai Huruf</th>
        <th>Status</th>
    </tr>

    <?php 
    foreach ($matkul as $mk) { 
        
        $hasil = hitungBobot($mk["nilai"]);
        $huruf = $hasil["huruf"];
        $bobot = $hasil["bobot"];
        
        if ($bobot >= 2.0) {
            $status = "LULUS";
        } else {
            $status = "MENGULANG";
        }

        $warna_baris = "";
        if ($status == "MENGULANG") {
            $warna_baris = "bgcolor='red' style='color:white;'"; 
        }

        $total_sks = $total_sks + $mk["sks"];
        $total_bobot = $total_bobot + ($bobot * $mk["sks"]);
    ?>
    
    <tr <?php echo $warna_baris; ?>>
        <td><?php echo $mk["nama"]; ?></td>
        <td><?php echo $mk["sks"]; ?></td>
        <td><?php echo $mk["nilai"]; ?></td>
        <td><?php echo $huruf; ?></td>
        <td><?php echo $status; ?></td>
    </tr>
    
    <?php } ?>
</table>

<?php
$ips = 0;
if ($total_sks > 0) {
    $ips = $total_bobot / $total_sks;
}

if ($ips >= 3.00) {
    $maks_sks = 24;
} else {
    $maks_sks = 20;
}
?>

<h3>Ringkasan IPS</h3>
<ul>
    <li>Total SKS: <?php echo $total_sks; ?></li>
    <li>IPS: <?php echo number_format($ips, 2); ?></li>
    <li>Maksimal SKS Semester Depan: <?php echo $maks_sks; ?> SKS</li>
</ul>

</body>
</html>