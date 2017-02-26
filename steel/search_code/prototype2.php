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
		$result = mysqli_query($con,"SELECT * FROM material_unit_characteristic WHERE MU_ID = '".$mu_id."' AND (CHR_ID = 'SECTION1' OR CHR_ID = 'SECTION2' OR CHR_ID = 'QUALITY_CODE')");
		while($row = mysqli_fetch_array($result)) {
			$mu_quality_code = $row['CHR_VALUE'];

			$row = mysqli_fetch_array($result);
			$mu_section1 = $row['CHR_VALUE'];

			$row = mysqli_fetch_array($result);
			$mu_section2 = $row['CHR_VALUE'];
			
			echo "Material_Chars!!";
			echo "<br>";
			
			echo "Quality Code : ".$mu_quality_code."";
			echo "<br>";
			echo "Section1     : ".$mu_section1."";
			echo "<br>";
			echo "Section2     : ".$mu_section2."";
			echo "<br>";
			echo "<br>";
		}
		
		$result1 = mysqli_query($con,"SELECT * FROM route_operation_characteristic WHERE ROUTE_ID = '".$po_id."' AND STEP_NUMBER = '110' AND (CHR_ID = 'SECTION1' OR CHR_ID = 'SECTION2' OR CHR_ID = 'QUALITY_CODE')");
		while($row = mysqli_fetch_array($result1)) {
			$po_quality_code = $row['NOMINAL_VALUE'];
			
			$row = mysqli_fetch_array($result1);
			$po_section1_min = $row['MIN_VALUE'];
			$po_section1_max = $row['MAX_VALUE'];
			
			$row = mysqli_fetch_array($result1);
			$po_section2_min = $row['MIN_VALUE'];
			$po_section2_max = $row['MAX_VALUE'];
			echo "Prod_Order_Chars!!";
			echo "<br>";
			echo "Quality Code : ".$po_quality_code."";
			echo "<br>";
			echo "Section1 :- Min :".$po_section1_min." Max : ".$po_section1_max."";
			echo "<br>";
			echo "Section2 :- Min :".$po_section2_min." Max : ".$po_section2_max."";
			echo "<br>";	  
		}
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