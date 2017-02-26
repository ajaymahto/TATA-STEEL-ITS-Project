<html>
<body bgcolor=#004646>
<?php
$con=mysqli_connect("localhost","root","","ma_prod1");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM grid_config");

echo"<h1><center><font color='#00FFFF'>Grid Information!</font></center></h1>";

echo "<center><table border='1' cellpadding='5' cellspacing='5' bordercolor='blue' bgcolor='aqua'>
<tr>
<th>GRID_ID</th>
<th>PLANT_CODE</th>
<th>SOURCING_PLANT</th>
<th>INVENTORY_ID</th>
<th>GRID_DESCRIPTION</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['GRID_ID'] . "</td>";
  echo "<td>" . $row['PLANT_CODE'] . "</td>";
  echo "<td>" . $row['SOURCING_PLANT'] . "</td>";
  echo "<td>" . $row['INV_ID'] . "</td>";
  echo "<td>" . $row['GRID_DESCRIPTION'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</body>
</html>