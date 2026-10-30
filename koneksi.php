<?php
$con = mysqli_connect(
    "sql305.infinityfree.com",
    "if0_43311528",
    "7cBwtZMeD4V",
    "if0_43311528_hms",
    3306
);

if (!$con) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>