<html>
<body bgcolor=#004646>
<center>
<h1><font color='#00FFFF'>Enter Material Unit Characteristics!</font></h1>
<form action="<?php $_PHP_SELF ?>" method="POST">
<table border='1' cellpadding='5' cellspacing='5' bordercolor = 'blue' bgcolor = 'aqua'>
<tr>
<th>MU_ID</th>
<th>CHR_ID</th>
<th>CHR_VALUE</th>
</tr>

<tr>
<td><input type='text' name='mu_id1' value=''/>
<td><input type='text' name='chr_id1' value=''/>
<td><input type='text' name='chr_val1' value=''/>
</tr>

<tr>
<td><input type='text' name='mu_id2' value=''/>
<td><input type='text' name='chr_id2' value=''/>
<td><input type='text' name='chr_val2' value=''/>
</tr>

<tr>
<td><input type='text' name='mu_id3' value=''/>
<td><input type='text' name='chr_id3' value=''/>
<td><input type='text' name='chr_val3' value=''/>
</tr>

<tr>
<td><input type='text' name='mu_id4' value=''/>
<td><input type='text' name='chr_id4' value=''/>
<td><input type='text' name='chr_val4' value=''/>
</tr>


<tr>
<td> <input type="submit" value="ohk! let's go!" name="submit" id="submit" />
</td>
</form>
</center>
</body>
</html>

<?php

$con=mysqli_connect("localhost","root","","ma_prod1");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}                                                                //connecting to mysql

 $count=0;
 if(isset($_POST['mu_id1']) && isset($_POST['chr_id1']) && isset($_POST['chr_val1'])){
			mysqli_query($con,"INSERT INTO `material_unit_characteristic`(`MU_ID`, `CHR_ID`, `CHR_VALUE`) VALUES ('".$_POST['mu_id1']."','".$_POST['chr_id1']."','".$_POST['chr_val1']."')");
			$count++;
 }

 if(isset($_POST['mu_id2']) && isset($_POST['chr_id2']) && isset($_POST['chr_val2'])){
   mysqli_query($con,"INSERT INTO `material_unit_characteristic`(`MU_ID`, `CHR_ID`, `CHR_VALUE`) VALUES ('".$_POST['mu_id2']."','".$_POST['chr_id2']."','".$_POST['chr_val2']."')");
   $count++;
 }

 if(isset($_POST['mu_id3']) && isset($_POST['chr_id3']) && isset($_POST['chr_val3'])){
   mysqli_query($con,"INSERT INTO `material_unit_characteristic`(`MU_ID`, `CHR_ID`, `CHR_VALUE`) VALUES ('".$_POST['mu_id3']."','".$_POST['chr_id3']."','".$_POST['chr_val3']."')");
   $count++;
 }

 if(isset($_POST['mu_id4']) && isset($_POST['chr_id4']) && isset($_POST['chr_val4'])){
   mysqli_query($con,"INSERT INTO `material_unit_characteristic`(`MU_ID`, `CHR_ID`, `CHR_VALUE`) VALUES ('".$_POST['mu_id4']."','".$_POST['chr_id4']."','".$_POST['chr_val4']."')");
   $count++;
 }                                                     //inserting into database

 if($count)
   echo "Done!";                               //done!


mysqli_close($con);                                   //closing connection!
?>