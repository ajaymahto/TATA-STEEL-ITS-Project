<?php
/************************************ Connecting to MySql to database ma_prod1 ************************************************************************/
$con=mysqli_connect("localhost","root","","ma_prod1");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/************************************************************************************************************/

/************************************ Executing Queries (The Game Begins!!) ************************************************************************/

$result = mysqli_query($con,"SELECT * FROM prod_order_characteristic WHERE ODR_CHR_ID = 'PLANT_CODE' OR ODR_CHR_ID = 'SOURCING_PLANT'");

echo"<h1>Plant Code & Sourcing Plant!</h1>";				//Just a heading!!
print_result($result,$con);

/************************************ Executing Queries (The Main While Loop!!) ************************************************************************/
$result = mysqli_query($con,"SELECT * FROM prod_order_characteristic WHERE ODR_CHR_ID = 'PLANT_CODE' OR ODR_CHR_ID = 'SOURCING_PLANT'");
while($row = mysqli_fetch_array($result)) {
  
  $po_id = $row['PO_ID'];		
  $plant_code = $row['PO_CHR_VALUE'];						//storing table data into variables!!
															//getting po_id and plant_code!!
  $row = mysqli_fetch_array($result);
  
  $sourcing_plant = $row['PO_CHR_VALUE'];								//getting plant_code and sourcing_plant
  /************************************ Checking for Grid Index (Which Material for which order!!)************************************************************************/
  if(($plant_code == 41) && ($sourcing_plant==67))
  {
	$inv_id = 'HRQAY';
	echo "<h1>For Order ".$po_id." Needed HSM-HR Material for CR Order!</h1>";
	to_stock($po_id,$inv_id,$con);
  }
}


	function to_stock($po_id,$inv_id,$con)					//function to material_unit table
	{
		/*********Printing Result Table!********/
		
		$result = mysqli_query($con,"SELECT * FROM material_unit WHERE INV_ID = '".$inv_id."'");
		while($row = mysqli_fetch_array($result)) {
			echo "<table border='1'>									
			<tr>
			<th>MU_ID</th>
			<th>INV_ID</th>
			</tr>";
			echo "<tr>";
			echo "<td>" . $row['MU_ID'] . "</td>";
			echo "<td>" . $row['INV_ID'] . "</td>";
			echo "</tr>";
			
			echo ".";
			$mu_id = $row['MU_ID'];
			//echo "<h1>".$mu_id."</h1>";
			to_material_char($po_id,$mu_id,$con);
		}
		echo "</table>";
		/*****************/
	}
	
	function to_material_char($po_id,$mu_id,$con)
	{	
		/*********Printing Result Table!********/
		echo "<table border='1' cellpadding='5' cellspacing='5'>
		<tr>
		<th>MU_ID</th>
		<th>CHR_ID</th>
		<th>CHR_VALUE</th>
		</tr>";
		$result = mysqli_query($con,"SELECT * FROM material_unit_characteristic WHERE MU_ID = '".$mu_id."' AND (CHR_ID = 'SECTION1' OR CHR_ID = 'SECTION2' OR CHR_ID = 'QUALITY_CODE')");
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['MU_ID'] . "</td>";
			echo "<td>" . $row['CHR_ID'] . "</td>";
			echo "<td>" . $row['CHR_VALUE'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		/*****************/
		
		/*********Printing Result Table!********/
		echo "<table border='1' cellpadding='5' cellspacing='5'>								
		<tr>
		<th>ROUTE_ID</th>
		<th>STEP_NO</th>
		<th>CHR_ID</th>
		<th>NOMINAL_VALUE</th>
		<th>MIN_VALUE</th>
		<th>MAX_VALUE</th>
		</tr>";
		
		$result1 = mysqli_query($con,"SELECT * FROM route_operation_characteristic WHERE ROUTE_ID = '".$po_id."' AND STEP_NUMBER = '110' AND (CHR_ID = 'SECTION1' OR CHR_ID = 'SECTION2' OR CHR_ID = 'QUALITY_CODE')");
		
		while($row = mysqli_fetch_array($result1)) {
			echo "<tr>";
			echo "<td>" . $row['ROUTE_ID'] . "</td>";
			echo "<td>" . $row['STEP_NUMBER'] . "</td>";
			echo "<td>" . $row['CHR_ID'] . "</td>";
			echo "<td>" . $row['NOMINAL_VALUE'] . "</td>";
			echo "<td>" . $row['MIN_VALUE'] . "</td>";
			echo "<td>" . $row['MAX_VALUE'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		/*****************/
	}
	
	function print_result($result,$con)				//printing result table of first mysql query!!
	{
		/*********Printing Result Table!********/
		echo "<table border='1'>									
		<tr>
		<th>PO_ID</th>
		<th>ODR_CHR_ID</th>
		<th>PO_CHR_VALUE</th>
		</tr>";
		while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['PO_ID'] . "</td>";
		echo "<td>" . $row['ODR_CHR_ID'] . "</td>";
		echo "<td>" . $row['PO_CHR_VALUE'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";
		/*****************/
	}
	
mysqli_close($con);	
?>

<html>
<head>
<title>Material Allocation In Flat Products</title>
<body>
<h1></h1>
<div align="right"><form action = "display.html">
Back_to_Main_Page<input type = submit value="back!" name ="back"/>
</form></div>
</body>
</html>