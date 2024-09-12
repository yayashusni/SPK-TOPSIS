<?php 
include 'cetak/dataCetak.php';
include 'cetak/dataChart.php';
?>

										
<div class="card">
    <div class="card-body">
        <h2>Hasil Perangkingan</h2>
  <canvas id="barChart2" height="170"></canvas>
    </div>
</div>


<!-- Sertakan Bootstrap JS dan jQuery -->


<?php
// Sertakan file koneksi database

// Query untuk mengambil data dari database
$query = "SELECT nm_alternatif, nilai FROM nilai_preferensi order by nilai desc";
$result = mysqli_query($conn, $query);

// Inisialisasi array untuk menyimpan data
$labels = [];
$data = [];

// Loop through the result set and store data in arrays
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['nm_alternatif'];
    $data[] = $row['nilai'];
}

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="assets/js/plugin/chart.js/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Sertakan Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Ambil data dari PHP dan simpan ke variabel JavaScript
  var labels = <?php echo json_encode($labels); ?>;
  var data = <?php echo json_encode($data); ?>;

  // Buat Chart
  var ctx = document.getElementById('barChart2').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: labels,
          datasets: [{
              label: 'Nilai',
              data: data,
              backgroundColor: '#28a745',
              borderColor: '#28a745',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>

<?php 
$del=mysqli_query($conn,"delete from nilai_preferensi");
?>
