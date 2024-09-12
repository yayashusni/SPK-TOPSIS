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
        echo "<script>alert('File harus berformat xls / xlsx'); window.open('alternatif.php','_self');</script>";
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
   

    require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

    // Load file Excel
    $excel = PHPExcel_IOFactory::load($filePath);

    // Ambil sheet pertama (indeks 0)
    $sheet = $excel->getSheet(0);

    // Ambil jumlah baris data (tanpa header)
    $highestRow = $sheet->getHighestDataRow();

    // Mulai dari baris kedua, karena baris pertama adalah header
    for ($row = 2; $row <= $highestRow; $row++) {
        $query =$conn->query("SELECT max(id_alternatif) as idMaks FROM alternatif");
        // $hasil = mysqli_query($conn,$query);
        $data  = mysqli_fetch_array($query);
        $id = $data['idMaks'];
        
        //mengatur 6 karakter sebagai jumalh karakter yang tetap
        //mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
        $noUrut = (int) substr($id, 2, 3);
        $noUrut++;
        
        //menjadikan 201353 sebagai 6 karakter yang tetap
        $char = "AL";
        //%03s untuk mengatur 3 karakter di belakang 201353
        $IDbaru = $char . sprintf("%03s", $noUrut);

        // $id_alternatif = $sheet->getCellByColumnAndRow(0, $row)->getValue();
        $nm_alternatif = $sheet->getCellByColumnAndRow(1, $row)->getValue();

        // Masukkan data ke dalam database
        $query = "INSERT INTO alternatif (id_alternatif, nm_alternatif) VALUES ('$IDbaru', '$nm_alternatif')";
        $add=mysqli_query($conn, $query);
        
        if($add){
           echo "<script>alert('Data berhasil diimpor ke database'); window.open('alternatif.php','_self');</script>";
        }else{
            echo "<script>alert('gagal'); window.open('alternatif.php','_self');</script>";
        }

    }

    // echo   "<script>alert('Data berhasil diimpor ke database'); window.open('alternatif.php','_self');</script>";

 
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
