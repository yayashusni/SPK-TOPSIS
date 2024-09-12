<?php
include "config/koneksi.php";

// Fungsi untuk mengunggah file Excel
function uploadExcel($file)
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Cek apakah file merupakan file Excel
    if ($fileType != "xls" && $fileType != "xlsx") {
        echo "<script>alert('File harus berformat xls / xlsx'); window.open('kriteria.php','_self');</script>";
        return false;
    }

    // Pindahkan file ke direktori yang ditentukan
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        echo "Gagal mengunggah file.";
        return false;
    }
}

// Fungsi untuk menyimpan data dari Excel ke database
function importExcelToDatabase($filePath, $conn)
{
    include_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

    // Load file Excel
    $excel = PHPExcel_IOFactory::load($filePath);

    // Ambil sheet pertama (indeks 0)
    $sheet = $excel->getSheet(0);

    // Ambil jumlah baris data (tanpa header)
    $highestRow = $sheet->getHighestDataRow();

    // Mulai dari baris kedua, karena baris pertama adalah header
    for ($row = 2; $row <= $highestRow; $row++) {
        $getquery = $conn->query("SELECT max(id_kriteria) as idMaks FROM kriteria");
        // $data = mysqli_fetch_array($query);
        $data=$getquery->fetch_array();
        $id = $data['idMaks'];

        // Mengubah kode yang deprecated
        $noUrut = (int) substr($id, 2, 3);
        $noUrut++;

        // Mengubah kode yang deprecated
        $IDbaru = "KR" . sprintf("%03s", $noUrut);

        $namakriteria = $sheet->getCellByColumnAndRow(1, $row)->getValue();
        $bobot = $sheet->getCellByColumnAndRow(2, $row)->getValue();
        $sifat = $sheet->getCellByColumnAndRow(3, $row)->getValue();

        $query = $conn->query("INSERT INTO kriteria (id_kriteria,nama_kriteria,bobot,poin1,poin2,poin3,poin4,poin5,sifat) values ('$IDbaru','$namakriteria','$bobot','1','2','3','4','5','$sifat')");
        // $add = mysqli_query($conn, $query);

        if ($query) {
            echo "<script>alert('Data berhasil diimpor ke database'); window.open('kriteria.php','_self');</script>";
        } else {
            echo "<script>alert('gagal'); window.open('kriteria.php','_self');</script>";
        }
    }
}

// Jika tombol submit ditekan
if (isset($_POST["upload"])) {
    $file = $_FILES["fileToUpload"];

    // Unggah file Excel
    $filePath = uploadExcel($file);

    // Jika proses unggah berhasil
    if ($filePath) {
        // Impor data dari Excel ke database
        importExcelToDatabase($filePath, $conn);
    }
}
?>
