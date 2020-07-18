<?php
session_start();
$username="";
$email="";
$errors=array();
$db=mysqlli_connect('localhost', 'root', '','registration');
if(isset($_POST['register']))
{
$username=mysql_real_escape_string($_POST['username']);
$email=mysql_real_escape_string($_POST['email']);
$mobileno=mysql_real_escape_string($_POST['mobileno']);
$password_1=mysql_real_escape_string($_POST['password_1']);
$password_2=mysql_real_escape_string($_POST['password_2']);

if(empty($username))
{
	array_push($errors,"username is required");
}
if(empty($email))
{
	array_push($errors,"Email is required");
}	
if(empty($password_1))
{
	array_push($errors,"Password is required");
}	
if($password_1 != $password_2)
{
	array_push($errors,"The two passwords do not required");
}		
if(count($errors)==0)
{   
    $password=md5($password_1); //encrypt password
	$sql="INSERT INTO users(username,email,mobileno,password")
	VALUES('$username','$email','$mobileno','$password')";
	mysqli_query($db,$sql);
	$_SESSION['username']=$username;
	$_SESSION['success']="You Are Now Logged In";
	header('location:ta.html'); //diretect to homepage
	}
}
if(isset($-POST['login']))
{
$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['password']);

if(empty($username))
{
	array_push($errors,"username is required");
}
if(empty($password))
{
	array_push($errors,"Password is required");
}	
if(count($errors)==0)
{
	$password=md5($password);
	$query="select * from user where username='$username' and password='password'";
	$result= mysql_query($db,$query);
	if(mysql_num_rows($result)==1)
	{
	$_SESSION['username']=$username;
	$_SESSION['success']="You Are Now Logged In";
	header('location:ta.html'); //diretect to homepage
	}
	else 
	{ 
     array_push($errors,_"Wrong username or password combination");
	 hesder('location:login.html');
	}
}
}
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['username]));
	header('location:index.html');
}
?>
