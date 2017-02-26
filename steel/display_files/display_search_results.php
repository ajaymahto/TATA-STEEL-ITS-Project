<html>
<<body bgcolor=#004646>
<?php
$con=mysqli_connect("localhost","root","","ma_prod1");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM search_results");
echo"<h1><center><font color='#00FFFF'>Search Results!</font></center></h1>";

echo "<center><table border='1' cellpadding='5' cellspacing='5' bordercolor='blue' bgcolor='aqua'>
<tr>
<th>PO_ID</th>
<th>MU_ID</th>
<th>WEIGHT</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['PO_ID'] . "</td>";
  echo "<td>" . $row['MU_ID'] . "</td>";
  $result1= mysqli_query($con,"SELECT CHR_VALUE FROM material_unit_characteristic WHERE MU_ID='".$row['MU_ID']."' AND CHR_ID='TOTAL_WEIGHT'");
  $row1=mysqli_fetch_array($result1);
  echo "<td>" . $row1['CHR_VALUE']. "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</body>
</html>