<html>
<body bgcolor=#004646>
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

	echo"<h1><font color='#00FFFF'>Plant Code & Sourcing Plant Information for Orders!</font></h1>";				//Just a heading!!
	print_result($result,$con);
	mysqli_query($con,"DELETE FROM `search_results` WHERE 1");

	/************************************ Executing Queries (The Main While Loop!!) ************************************************************************/
	$result = mysqli_query($con,"SELECT * FROM prod_order_characteristic WHERE ODR_CHR_ID = 'PLANT_CODE' OR ODR_CHR_ID = 'SOURCING_PLANT'");
	while($row = mysqli_fetch_array($result)) {

		if($row['ODR_CHR_ID']=="PLANT_CODE")
		{
			$po_id = $row['PO_ID'];
			$plant_code = $row['PO_CHR_VALUE'];						//storing table data into variables!!																		//getting po_id and plant_code!!
			if($plant_code != '62' && $plant_code != '67')
			{
				$row = mysqli_fetch_array($result);
				$sourcing_plant = $row['PO_CHR_VALUE'];								//getting sourcing_plant
			}
		}
		else
			$plant_code = 0;
		/************************************ Checking for Grid Index (Which Material for which order!!)************************************************************************/
		if(($plant_code == 41 || $plant_code == 40 || $plant_code == 43 || $plant_code == 84) &&($sourcing_plant==67))
		{
			echo "<br><font color='#00FFFF'>*************************************************************************************************************************</font>";
			$inv_id = 'HRQAY';
			echo "<h1><font color='#00FFFF'>For Order ".$po_id." Needed HSM-HR Material for CR Order!</font></h1>";
			to_stock($po_id,$inv_id,$con);
			echo "<h3><font color=#00FFFF>Search Results for Order '".$po_id."'</font></h3>";
			search_results($con,$po_id);
			echo "<br><font color='#00FFFF'>*************************************************************************************************************************</font>";
		}
		else if(($plant_code == 41|| $plant_code == 40 || $plant_code == 43 || $plant_code == 84) &&($sourcing_plant==62))
		{
			echo "<br><font color='#00FFFF'>*************************************************************************************************************************</font>";
			$inv_id = 'TSCRQAY';
			echo "<h1><font color='#00FFFF'>For Order ".$po_id." Needed TSCR-HR Material for CR Order!</font></h1>";
			to_stock($po_id,$inv_id,$con);
			echo "<h3><font color=#00FFFF>Search Results for Order '".$po_id."'</font></h3>";
			search_results($con,$po_id);
			echo "<br><font color='#00FFFF'>*************************************************************************************************************************</font>";
		}
		else if($plant_code == 62)
		{
			echo "<br><font color='#00FFFF'>*************************************************************************************************************************</font>";
			$inv_id = 'TSCRQAY';
			echo "<h1><font color='#00FFFF'>For Order ".$po_id." Needed TSCR-HR Material for HR Order!</font></h1>";
			to_stock($po_id,$inv_id,$con);
			echo "<h3><font color=#00FFFF>Search Results for Order '".$po_id."'</font></h3>";
			search_results($con,$po_id);
			echo "<br><font color='#00FFFF'>*************************************************************************************************************************</font>";
		}
		else if($plant_code == 67)
		{
			echo "<br><font color='#00FFFF'>*************************************************************************************************************************</font>";
			$inv_id = 'HRQAY';
			echo "<h1><font color='#00FFFF'>For Order ".$po_id." Needed HSM-HR Material for HR Order!</font></h1>";
			to_stock($po_id,$inv_id,$con);
			echo "<h3><font color=#00FFFF>Search Results for Order '".$po_id."'</font></h3>";
			search_results($con,$po_id);
			echo "<br><font color='#00FFFF'>*************************************************************************************************************************</font>";
		}
		//else
			//echo "<h1>Hmm! There seems to be some problem!!</h1><br>";
	}


	function to_stock($po_id,$inv_id,$con)					//function to material_unit table
	{

            /*********Printing Result Table!********/
            echo "<center><table border='1' cellpadding='5' cellspacing='5' bordercolor='blue' bgcolor='aqua'>
			<tr>
			<th>MU_ID</th>
			<th>INV_ID</th>
			</tr>";

		$result = mysqli_query($con,"SELECT * FROM material_unit WHERE INV_ID = '".$inv_id."'");
		while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
			echo "<td>" . $row['MU_ID'] . "</td>";
			echo "<td>" . $row['INV_ID'] . "</td>";
			echo "</tr>";
		}
		echo "</table></center><br>";
		/*****************/

		/*********Executing!********/
		$result = mysqli_query($con,"SELECT * FROM material_unit WHERE INV_ID = '".$inv_id."'");
		while($row = mysqli_fetch_array($result)) {
			$mu_id = $row['MU_ID'];
			to_comparison($po_id,$mu_id,$inv_id,$con);
		}

                /*****************/



	}

	function to_comparison($po_id,$mu_id,$inv_id,$con)
	{
			if($inv_id == "HRQAY")
				$step_no = 110;
			if($inv_id == "TSCRQAY")
				$step_no = 115;
			$flag=0;
			$count=0;
			$result101 = mysqli_query($con,"SELECT * FROM search_config WHERE CHECKED='1' ");
			while($row101 = mysqli_fetch_array($result101))
			{
				/******************************Getting Material Unit Values!!********************************/
				$result111 = mysqli_query($con,"SELECT * FROM material_unit_characteristic WHERE MU_ID = '".$mu_id."' AND CHR_ID = '".$row101['ODR_CHR_ID']."'");
				$row111 = mysqli_fetch_array($result111);
				$mu_param = $row111['CHR_VALUE'];
				/********************************************************************************************/
				
				/**************************************Getting Order Unit Values!!**************************/
				$result121 = mysqli_query($con,"SELECT * FROM route_operation_characteristic WHERE ROUTE_ID = '".$po_id."' AND STEP_NUMBER = '".$step_no."' AND CHR_ID = '".$row101['ODR_CHR_ID']."'");
				$row121 = mysqli_fetch_array($result121);
				$po_param_nom = $row121['NOMINAL_VALUE'];
				$po_param_min = $row121['MIN_VALUE'];
				$po_param_max = $row121['MAX_VALUE'];
				/******************************************************************************************/
				//echo "<br><font color=#00FFFF>MU : ".$mu_param.", PO_NOM : ".$po_param_nom.", PO_MIN : ".$po_param_min.", PO_MAX : ".$po_param_max."</font>";
				
				
				/**************************Converting to Numbers as required for comparison*****************************/
				if($row111['CHR_ID'] != 'QUALITY_CODE')
					$mu_param = $mu_param*1.0;
				if($po_param_nom == ""){
					$po_param_min = $po_param_min * 1.0;
					$po_param_max = $po_param_max * 1.0;
				}
				else if(($row121['CHR_ID'] != 'QUALITY_CODE'))
					$po_param_nom = $po_param_nom*1.0;		
				
				/**************************Comparing*********************************************/
				if($po_param_nom != "" && $po_param_nom == $mu_param)
					$count++;
				else if(($po_param_min<=$mu_param)&&($mu_param<=$po_param_max))
					$count++;
				else
				{
					$flag=1;
					break;
				}
			}
			if(($flag==0) && ($count))
				mysqli_query($con,"INSERT INTO `search_results`(`PO_ID`, `MU_ID`) VALUES ('".$po_id."','".$mu_id."')");
	}

	function search_results($con,$po_id)
	{
		$result1 = mysqli_query($con,"SELECT * FROM search_results WHERE PO_ID='".$po_id."'");
		/*********Printing Result Table!********/
		echo "<center><table border='1' cellpadding='5' cellspacing='5' bgcolor='aqua' bordercolor='blue'>
		<tr>
		<th>PO_ID</th>
		<th>MU_ID</th>
		</tr>";
		while($row = mysqli_fetch_array($result1)) {
			echo "<tr>";
			echo "<td>" . $row['PO_ID'] . "</td>";
			echo "<td>" . $row['MU_ID'] . "</td>";
			echo "</tr>";
		}
		echo "</table></center>";
		/*****************/
	}

	function print_result($result,$con)				//printing result table of first mysql query!!
	{
		/*********Printing Result Table!********/
		echo "<center><table border='1' cellpadding='5' cellspacing='5' bordercolor = 'blue' bgcolor = 'aqua'>
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
		echo "</table></center>";
		/*****************/
	}

mysqli_close($con);
?>
</body>
</html>