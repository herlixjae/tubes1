<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>Login - Akira</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/site.css" rel="stylesheet">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
	<div id="login-page" class="container">
			<h1>LOGIN PORTAL</h1>
			<form id="login-form" class="well" action="" method="post">
			<input type="text" class="span2" placeholder="Username" name="user" /><br />
			<input type="password" class="span2" placeholder="Password" name="pass" /><br />
			<button type="submit" class="btn btn-primary" name="button">Sign in</button>

		</form>	
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/site.js"></script>
	</body>
</html>

<?php
if(isset($_POST['button']))
{
	$pu=$_POST['user'];
	$pp=$_POST['pass'];
	$sql=sprintf("Select count(id_user) as b,id_cat_user as c from userlogin where username='%s' and password='%s'",$pu,md5($pp)) or die(mysql_error());
	$q=mysql_query($sql);
	$r=mysql_fetch_array($q);
	$g=$r['c'];
	if($r['b']==0)
	{
		echo "Gagal Login";
	}else{
		$_SESSION['user']=$_POST['user'];
		$pl="";
		if($g=="1")
		{
			
			$pl="admin";
			$_SESSION['hash']=$pl;
			echo "<script>window.location='admin/index.php'</script>";
		}elseif($g=="2"){
			$pl="member";
			$_SESSION['hash']=$pl;
			echo "<script>window.location='member/index.php'</script>";
		}
		
	}
}
?>
