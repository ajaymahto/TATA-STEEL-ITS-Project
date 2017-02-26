<html>
<body bgcolor=#004646>
<center><h1><font color='#00FFFF'>Enter Search Configuration!</font></h1>
		
		<h2><font color='#00FFFF'>Check boxes to select, then click [ohk! let's go!], then click [Done!]</font></h2>
<form action="<?php $_PHP_SELF ?>" method="POST">
<table border='1' cellpadding='5' cellspacing='5' bordercolor='blue' bgcolor='aqua'>
<tr>
<th>CHR_ID</th>
<th>CHECKED</th>
</tr>

<tr>
<td>QUALITY_CODE</td>
<td><input type="checkbox" name="qc" value="on">
</tr>

<tr>
<td>SECTION1</td>
<td><input type="checkbox" name="s1" value="on">
</tr>

<tr>
<td>SECTION2</td>
<td><input type="checkbox" name="s2" value="on">
</tr>

<tr>
<td><input type="submit" name="submit" value="ohk! let's go!">
</tr>


</table>

</form>

<a href="prototype5_1.php"><font color=#00FFFF><input type="button" value="Done!" Size=400></font></a>
</center>
</body>
</html>

<?php
	if(isset($_POST['qc']))
		$qc = $_POST['qc'];
	else $qc = "";
	if(isset($_POST['s1']))
		$s1 = $_POST['s1'];
	else $s1 = "";
	if(isset($_POST['s2']))
		$s2 = $_POST['s2'];
	else $s2 = "";

	
	$con=mysqli_connect("localhost","root","","ma_prod1");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}	//connecting to mysql
	
	$result=mysqli_query($con,"SELECT * FROM search_config");
	while($row=mysqli_fetch_array($result))
	{
		//echo "<br><font color=#00FFFF>".$row['ODR_CHR_ID']."</font>";
		
		/*****************Quality Code**************/
		if(($row['ODR_CHR_ID']=="QUALITY_CODE")&&($qc=="on"))
		{
			mysqli_query($con,"UPDATE search_config SET CHECKED='1' WHERE ODR_CHR_ID='".$row['ODR_CHR_ID']."' ");
			//echo "<br><font color=#00FFFF>Hei!</font>";
		}
		else if(($row['ODR_CHR_ID']=="SECTION1")&&($s1=="on"))
		{
			mysqli_query($con,"UPDATE search_config SET CHECKED='1' WHERE ODR_CHR_ID='".$row['ODR_CHR_ID']."' ");
			//echo "<br><font color=#00FFFF>Hei!</font>";
		}
		else if(($row['ODR_CHR_ID']=="SECTION2")&&($s2=="on"))
		{
			mysqli_query($con,"UPDATE search_config SET CHECKED='1' WHERE ODR_CHR_ID='".$row['ODR_CHR_ID']."' ");
			//echo "<br><font color=#00FFFF>Hei!</font>";
		}
		else
		{
			mysqli_query($con,"UPDATE search_config SET CHECKED='0' WHERE ODR_CHR_ID='".$row['ODR_CHR_ID']."' ");
			//echo "<br><font color=#00FFFF>Holla!</font>";
		}
		//echo "<br><center><font color=#00FFFF>Search Query Configured! Let's Go! Click DONE!</font></center>";
	}

?>