<?php
// Database connection setup
$host = "localhost";
$user = "root";
$password = "";
$database = "hpg_db";

include '../conn.inc';
include_once '../fpdf/fpdf.php';

// Create connection
$sql = "SELECT * FROM vin";
$result = mysqli_query($conn, $sql);


// SQL query to get a specific vin by Vinid
$Vinid = isset($_GET['Vinid']) ? intval($_GET['Vinid']) : 0;
$sql = "SELECT Vinid,engine,chassis,type,Rname, Address FROM vin WHERE Vinid = $Vinid";
$result = $conn->query($sql);

// Print the result
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Vinid: " . $row["Vinid"] . "<br>";
    echo "engine: " . $row["engine"] . "<br>";
    echo "chassis: " . $row["chassis"] . "<br>";
    echo "type: " . $row["type"] . "<br>";
    echo "Rname: " . $row["Rname"] . "<br>";
    echo "Address: " . $row["Address"] . "<br>";
    echo "your vehicle/motorcycle is on the list of wanted vehicle" ."<br>";
  }
} else {
  echo "No data found with Vinid $Vinid.";
}
// 📋 Print the whole table
$sql_all = "SELECT * FROM vin";
$result_all = $conn->query($sql_all);

echo "<h2>All vin</h2>";
if ($result_all->num_rows > 0) {
  echo "<table border='1' cellpadding='8'>
          <tr>
            <th>Vinid</th>
            <th>engine</th>
            <th>chassis</th>
            <th>type</th>
            <th>Rname</th>
            <th>Address</th>
          </tr>";
  while($row = $result_all->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["Vinid"] . "</td>
            <td>" . $row["engine"] . "</td>
            <td>" . $row["chassis"] . "</td>
            <td>" . $row["type"] . "</td>
            <td>" . $row["Rname"] . "</td>
            <td>" . $row["Address"] . "</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "No data found in the table.";
}



// Close connection
$conn->close();
?>
