<html>
<body bgcolor=#004646>
<center>
<h1><font color='#00FFFF'>Enter Route Characteristics!</font></h1>
<form action="<?php $_PHP_SELF ?>" method="POST">
<table border='1' cellpadding='5' cellspacing='5' bordercolor = 'blue' bgcolor = 'aqua'>
<tr>
<th>ROUTE_ID</th>
<th>STEP_NUMBER</th>
<th>CHR_ID</th>
<th>NOMINAL VALUE</th>
<th>MIN_VALUE</th>
<th>MAX_VALUE</th>
</tr>

<tr>
<td><input type='text' name='route_id1' value=''/>
<td><input type='text' name='step_number1' value=''/>
<td><input type='text' name='chr_id1' value=''/>
<td><input type='text' name='nominal_val1' value=''/>
<td><input type='text' name='min_val1' value='' size='10'/>
<td><input type='text' name='max_val1' value='' size='10'/>
</tr>

<tr>
<td><input type='text' name='route_id2' value=''/>
<td><input type='text' name='step_number2' value=''/>
<td><input type='text' name='chr_id2' value=''/>
<td><input type='text' name='nominal_val2' value=''/>
<td><input type='text' name='min_val2' value='' size='10'/>
<td><input type='text' name='max_val2' value='' size='10'/>
</tr>

<tr>
<td><input type='text' name='route_id3' value=''/>
<td><input type='text' name='step_number3' value=''/>
<td><input type='text' name='chr_id3' value=''/>
<td><input type='text' name='nominal_val3' value=''/>
<td><input type='text' name='min_val3' value='' size='10'/>
<td><input type='text' name='max_val3' value='' size='10'/>
</tr>

<tr>
<td><input type='text' name='route_id4' value=''/>
<td><input type='text' name='step_number4' value=''/>
<td><input type='text' name='chr_id4' value=''/>
<td><input type='text' name='nominal_val4' value=''/>
<td><input type='text' name='min_val4' value='' size='10'/>
<td><input type='text' name='max_val4' value='' size='10'/>
</tr>

<tr>
<td> <input type="submit" value="ohk! let's go!" name="submit" id="submit" />
</td>
</table>
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
 if(isset($_POST['route_id1']) && isset($_POST['step_number1']) && isset($_POST['chr_id1']) &&isset($_POST['nominal_val1']) && isset($_POST['min_val1']) && isset($_POST['max_val1'])){
   mysqli_query($con,"INSERT INTO `route_operation_characteristic`(`ROUTE_ID`, `STEP_NUMBER`, `CHR_ID`, `NOMINAL_VALUE`, `MIN_VALUE`, `MAX_VALUE`) VALUES ('".$_POST['route_id1']."','".$_POST['step_number1']."','".$_POST['chr_id1']."','".$_POST['nominal_val1']."','".$_POST['min_val1']."','".$_POST['max_val1']."')");
   $count++;
 }

 if(isset($_POST['route_id2']) && isset($_POST['step_number2']) && isset($_POST['chr_id2']) &&isset($_POST['nominal_val2']) && isset($_POST['min_val2']) && isset($_POST['max_val2'])){
   mysqli_query($con,"INSERT INTO `route_operation_characteristic`(`ROUTE_ID`, `STEP_NUMBER`, `CHR_ID`, `NOMINAL_VALUE`, `MIN_VALUE`, `MAX_VALUE`) VALUES ('".$_POST['route_id2']."','".$_POST['step_number2']."','".$_POST['chr_id2']."','".$_POST['nominal_val2']."','".$_POST['min_val2']."','".$_POST['max_val2']."')");
   $count++;
 }

 if(isset($_POST['route_id3']) && isset($_POST['step_number3']) && isset($_POST['chr_id3']) &&isset($_POST['nominal_val3']) && isset($_POST['min_val3']) && isset($_POST['max_val3'])){
   mysqli_query($con,"INSERT INTO `route_operation_characteristic`(`ROUTE_ID`, `STEP_NUMBER`, `CHR_ID`, `NOMINAL_VALUE`, `MIN_VALUE`, `MAX_VALUE`) VALUES ('".$_POST['route_id3']."','".$_POST['step_number3']."','".$_POST['chr_id3']."','".$_POST['nominal_val3']."','".$_POST['min_val3']."','".$_POST['max_val3']."')");
   $count++;
 }

 if(isset($_POST['route_id4']) && isset($_POST['step_number4']) && isset($_POST['chr_id4']) &&isset($_POST['nominal_val4']) && isset($_POST['min_val4']) && isset($_POST['max_val4'])){
   mysqli_query($con,"INSERT INTO `route_operation_characteristic`(`ROUTE_ID`, `STEP_NUMBER`, `CHR_ID`, `NOMINAL_VALUE`, `MIN_VALUE`, `MAX_VALUE`) VALUES ('".$_POST['route_id4']."','".$_POST['step_number4']."','".$_POST['chr_id4']."','".$_POST['nominal_val4']."','".$_POST['min_val4']."','".$_POST['max_val4']."')");
   $count++;
 }                                                     //inserting into database

 if($count)
   echo "Done!";                               //done!


mysqli_close($con);                                   //closing connection!
?>