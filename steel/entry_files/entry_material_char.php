<html>
<body bgcolor=#004646>
<center>
<h1><font color='#00FFFF'>Enter Material Characteristics!</font></h1>
<form action="<?php $_PHP_SELF ?>" method="POST">
<table border='1' cellpadding='5' cellspacing='5' bordercolor = 'blue' bgcolor = 'aqua'>
<tr>
<th>CHR_ID</th>
<th>CHAR_DESCRIPTION</th>
</tr>

<tr>
<td><input type='text' name='chr_id1' value=''/>
<td><input type='text' name='char_des1' value=''/>
</tr>

<tr>
<td><input type='text' name='chr_id2' value=''/>
<td><input type='text' name='char_des2' value=''/>
</tr>

<tr>
<td><input type='text' name='chr_id3' value=''/>
<td><input type='text' name='char_des3' value=''/>
</tr>

<tr>
<td><input type='text' name='chr_id4' value=''/>
<td><input type='text' name='char_des4' value=''/>
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
 if(isset($_POST['chr_id1']) && isset($_POST['char_des1'])){
   mysqli_query($con,"INSERT INTO `material_characteristic`(`CHR_ID`, `CHAR_DESCRIPTION`) VALUES ('".$_POST['chr_id1']."','".$_POST['char_des1']."')");
   $count++;
 }

 if(isset($_POST['chr_id2']) && isset($_POST['char_des2'])){
   mysqli_query($con,"INSERT INTO `material_characteristic`(`CHR_ID`, `CHAR_DESCRIPTION`) VALUES ('".$_POST['chr_id2']."','".$_POST['char_des2']."')");
   $count++;
 }

 if(isset($_POST['chr_id3']) && isset($_POST['char_des3'])){
   mysqli_query($con,"INSERT INTO `material_characteristic`(`CHR_ID`, `CHAR_DESCRIPTION`) VALUES ('".$_POST['chr_id3']."','".$_POST['char_des3']."')");
   $count++;
 }

 if(isset($_POST['chr_id4']) && isset($_POST['char_des4'])){
   mysqli_query($con,"INSERT INTO `material_characteristic`(`CHR_ID`, `CHAR_DESCRIPTION`) VALUES ('".$_POST['chr_id4']."','".$_POST['char_des4']."')");
   $count++;
 }                                                     //inserting into database

 if($count)
   echo "Done!";                               //done!


mysqli_close($con);                                   //closing connection!
?>