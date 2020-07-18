<?php
$conn=mysqli_connect('localhost','root','');
$db=mysqli_select_db($conn,'mysql');
$e=$_POST['username'];
$w=$_POST['password'];
$m="select username,email, password from table1 where username='".$_POST['username']."' and password='".$_POST['password']."'";
$rs1=mysqli_query($conn,$m);
$nors=mysqli_fetch_row($rs1);
if($nors[0]==$e && $nors[2]==$w)
{
	echo "success";
	header('location:neh1_2.html');
	
}
else
{
	echo "failed";
	header('location:lognot.html');
}

?>	

