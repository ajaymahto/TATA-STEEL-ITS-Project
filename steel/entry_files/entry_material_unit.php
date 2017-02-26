<html>
<body bgcolor=#004646>
<center>
<h1><font color='#00FFFF'>Enter Material Units!</font></h1>
<form action="<?php $_PHP_SELF ?>" method="POST">
<table border='1' cellpadding='5' cellspacing='5' bordercolor = 'blue' bgcolor = 'aqua'>
<tr>
<th>MU_ID</th>
<th>INV_ID</th>
</tr>

<tr>
<td><input type='text' name='mu_id1' value=''/>
<td><input type='text' name='inv_id1' value=''/>
</tr>

<tr>
<td><input type='text' name='mu_id2' value=''/>
<td><input type='text' name='inv_id2' value=''/>
</tr>

<tr>
<td><input type='text' name='mu_id3' value=''/>
<td><input type='text' name='inv_id3' value=''/>
</tr>

<tr>
<td><input type='text' name='mu_id4' value=''/>
<td><input type='text' name='inv_id4' value=''/>
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
 if(isset($_POST['mu_id1']) && isset($_POST['inv_id1'])){
   mysqli_query($con,"INSERT INTO `material_unit`(`MU_ID`, `INV_ID`) VALUES ('".$_POST['mu_id1']."','".$_POST['inv_id1']."')");
   $count++;
 }

 if(isset($_POST['mu_id2']) && isset($_POST['inv_id2'])){
   mysqli_query($con,"INSERT INTO `material_unit`(`MU_ID`, `INV_ID`) VALUES ('".$_POST['mu_id2']."','".$_POST['inv_id2']."')");
   $count++;
 }

 if(isset($_POST['mu_id3']) && isset($_POST['inv_id3'])){
   mysqli_query($con,"INSERT INTO `material_unit`(`MU_ID`, `INV_ID`) VALUES ('".$_POST['mu_id3']."','".$_POST['inv_id3']."')");
   $count++;
 }

 if(isset($_POST['mu_id4']) && isset($_POST['inv_id4'])){
   mysqli_query($con,"INSERT INTO `order_characteristic`material_unit`(`MU_ID`, `INV_ID`) VALUES ('".$_POST['mu_id4']."','".$_POST['inv_id4']."')");
   $count++;
 }                                                     //inserting into database

 if($count)
   echo "Done!";                               //done!


mysqli_close($con);                                   //closing connection!
?>