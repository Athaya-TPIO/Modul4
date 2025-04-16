<!DOCTYPE html>
<html>
<head>
  <title>Pemilu & Grafik Hasil</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      fetch('get_data.php')
        .then(response => response.json())
        .then(jsonData => {
          var data = google.visualization.arrayToDataTable(jsonData);

          var options = {
            title: 'Hasil Pemilu',
            chartArea: { width: '60%' },
            vAxis: { title: 'Jumlah Suara', minValue: 0 },
            hAxis: { title: 'Nama Calon' }
          };

          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        });
    }

    function kirimSuara(event) {
      event.preventDefault();

      var nama = document.getElementById("nama").value;
      var calon = document.getElementById("pilihan").value;

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "proses_pemilu.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          document.getElementById("response").innerHTML = xhr.responseText;
          document.getElementById("form-pemilu").reset();
          drawChart(); // update grafik
        }
      };
      xhr.send("nama=" + encodeURIComponent(nama) + "&pilihan=" + encodeURIComponent(calon));
    }
  </script>
</head>

<body>
  <div class="container">
    <!-- Kolom Kiri (Inputan) -->
    <div class="left-column">
      <h2>PEMUNGUTAN SUARA PEMILU</h2><br>
      <form id="form-pemilu" onsubmit="kirimSuara(event)">
        <label for="nama">Nama Pemilih:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="pilihan">Pilih Calon:</label><br>
        <select id="pilihan" name="pilihan" required>
          <option value="">-- Pilih Calon --</option>
          <option value="Athaya">Athaya</option>
          <option value="Muluq">Muluq</option>
          <option value="Priadinata">Priadinata</option>
          <option value="Exka">Exka</option>
          <option value="Julianti">Julianti</option>
        </select><br><br>

        <div style="display: flex; gap: 10px;">
          <button type="submit" class="tambah-btn">Kirim Suara</button>
          <a href="/modul4" class="tambah-btn">Kembali</a>
        </div>
      </form>

      <div id="response" style="margin-top: 20px; color: #00ff00; font-weight:bold"></div>
    </div>

    <!-- Kolom Kanan (Grafik) -->
    <div class="right-column">
      <h2>Grafik Hasil Pemilu</h2><br>
      <div id="chart_div" style="width: 100%; height: 400px;"></div>
    </div>
  </div>
</body>
</html>