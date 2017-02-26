<html>
<body bgcolor=#004646>
<?php
$con=mysqli_connect("localhost","root","","ma_prod1");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM material_characteristic");

echo"<h1><center><font color='#00FFFF'>Material Characteristics!</font></center></h1>";

echo "<center><table border='1' cellpadding='5' cellspacing='5' bordercolor='blue' bgcolor='aqua'>
<tr>
<th>CHR_ID</th>
<th>CHAR_DESCRIPTION</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['CHR_ID'] . "</td>";
  echo "<td>" . $row['CHAR_DESCRIPTION'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</body>
</html>