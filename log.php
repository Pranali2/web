<?php
$conn=mysql_connect('localhost','root','');
$db=mysql_select_db('mysql');
if($conn==true)
{
	echo "connected";
	header('location:login.html');
}
$add="insert into table1(username,email,password) values('".$_POST['username']."','".$_POST['email']."','".$_POST['password_1']."')";
mysql_query($add);
?>