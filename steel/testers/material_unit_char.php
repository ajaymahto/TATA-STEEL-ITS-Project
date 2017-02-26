<?php

	/************************************ Connecting to MySql to database ma_prod1 ************************************************************************/
	$con=mysqli_connect("localhost","root","","ma_prod1");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	/*****************************************************************************************************************************************************/
	
	$mu_id1 = $_POST['$mu_id1'];
	$chr_id1 = $_POST['$chr_id1'];
	$chr_value1 = $_POST['$chr_value1'];
	
	$mu_id2 = $_POST['$mu_id2'];
	$chr_id2 = $_POST['$chr_id2'];
	$chr_value2 = $_POST['$chr_value2'];
	
	$mu_id3 = $_POST['$mu_id3'];
	$chr_id3 = $_POST['$chr_id3'];
	$chr_value3 = $_POST['$chr_value3'];
	
	$mu_id4 = $_POST['$mu_id4'];
	$chr_id4 = $_POST['$chr_id4'];
	$chr_value4 = $_POST['$chr_value4'];
	
	$mu_id5 = $_POST['$mu_id5'];
	$chr_id5 = $_POST['$chr_id5'];
	$chr_value5 = $_POST['$chr_value5'];
	
	$mu_id = array($mu_id1, $mu_id2, $mu_id3, $mu_id4, $mu_id5);
	$chr_id = array($chr_id1, $chr_id2, $chr_id3, $chr_id4, $chr_id5);
	$chr_value = array($chr_value1, $chr_value2, $chr_value3, $chr_value4, $chr_value5);
	if(($mu_id[1] != "") && ($chr_id[1] != "") && ($chr_value[1] != ""))
		//mysqli_query($con,"INSERT INTO `material_unit_characteristic`(`MU_ID`, `CHR_ID`, `CHR_VALUE`) VALUES ('".$mu_id1."',[value-2],[value-3])");
		echo "Hi! There!!";
		echo "<br>";
	
?>