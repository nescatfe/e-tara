<?php
  session_start(); // Start the session
  require_once('./database.php');

  // Check if user is not logged in, then redirect to login page
  if (!isset($_SESSION['username'])) {
    header('Location: /index.php');
    exit;
  }
  
?>
<html>
<head>
  <title>Input Status Perkara</title>
  <link rel="stylesheet" href="status.css">
</head>
<body>
  <h1>Input Status Perkara</h1>
  
  <form action="submitstatus.php" method="post">
    <label for="statusperkara">Masukan Nomor Status Perkara yang sudah siap:</label>
    <input type="text" id="statusperkara" name="statusperkara">
    
    <input type="submit" value="Akta Cerai Bisa di Ambil">
  </form>
  
  <div class="statusperkara-list">
    <h2>Status Perkara Siap di Ambil / <a href="/dashboard.php">Dashboard</a></h2>
  </div>
</body>
</html>
<?php 
  
  // Query to retrieve all data from statusperkara table
  $sql = "SELECT * FROM statusperkara";
  $result = mysqli_query($conn, $sql);
  
  // Check if the query is successful
  if (mysqli_num_rows($result) > 0) {
    // Add a new column to the table for the delete button
    echo "<table>";
    echo "<tr><th>ID</th><th>Status Perkara</th><th>Action</th></tr>";
    
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["id"] . "</td><td>" . $row["status"] . "</td>";
      echo "<td><form action='deletestatus.php' method='post'>";
      echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
      echo "<input type='submit' value='Delete'></form></td></tr>";
    }
    
    echo "</table>";
  } else {
    echo "No status perkara found.";
  }
?>