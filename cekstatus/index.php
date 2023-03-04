<?php
  require_once('./database.php');
  $result = null;

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the statusperkara value from the form
    $statusperkara = $_POST["statusperkara"];

    // Search for rows with the given status
    $sql = "SELECT * FROM statusperkara WHERE status = '$statusperkara'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  
  // Close the database connection
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Search Akta Cerai</title>
  <link rel="stylesheet" href="cekstatus.css">
</head>
<body>
  <div style="text-align: center;">
    <img src="/pa_png_logo.png" alt="Pengadilan Agama Ponorogo" style="display: block; margin: auto;" /><hr>
  </div>
  <form method="post" action="">
    <label for="statusperkara">Status Perkara:</label>
    <input type="text" name="statusperkara" id="statusperkara" placeholder="Masukan Nomor Perkara">
    <input type="submit" value="Search">
  </form>

  <?php if ($result): ?>
    <?php if (mysqli_num_rows($result) > 0): ?>
      <table>
        <thead>
          <tr>
            <th>Nomor Perkara : </th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <h1 style="text-align: center; font-family: Arial, sans-serif; font-size: 28px; font-weight: bold; color: #333;">Akta Cerai Sudah Selesai dan Bisa di Ambil</h1>
              <td><?php echo $row['status']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
  <h1 style="text-align: center; font-family: Arial, sans-serif; font-size: 28px; font-weight: bold; color: #333;">Akta Cerai Belum Selesai</h1>
    <?php endif; ?>
  <?php endif; ?>
</body>
</html>
