<?php
include_once 'dbkoneksi.php';

if (isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $nama_prodi = $_POST['nama_prodi'];
    $kaprodi = $_POST['kaprodi'];

    $sql = "INSERT INTO prodi (kode, nama_prodi, kaprodi) VALUES (:kode, :nama_prodi, :kaprodi)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':kode', $kode);
    $stmt->bindParam(':nama_prodi', $nama_prodi);
    $stmt->bindParam(':kaprodi', $kaprodi);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan. <a href='list_prodi.php'>Lihat Daftar Prodi</a>";
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}
?>
