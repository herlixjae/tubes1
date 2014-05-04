<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login dan Daftar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />       
        <link rel="stylesheet" type="text/css" href="css/html5/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/html5/css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/html5/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar --><!--/ Codrops top bar -->
            <section>				
          <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on" method="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="blogin" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="" autocomplete="on" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" name="bdaftar" value="Sign up"/> 
					</p>
                                <p class="change_link">  
									Already a member ?
						<a href="#tologin" class="to_register"> Go and log in </a>
					</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
<?php
if(isset($_POST['blogin']))
{
	$pu=$_POST['username'];
	$pp=$_POST['password'];
	$sql=sprintf("Select count(id_user) as b,id_cat_user as c from userlogin where username='%s' and password='%s'",$pu,md5($pp)) or die(mysql_error());
	$q=mysql_query($sql);
	$r=mysql_fetch_array($q);
	$g=$r['c'];
	if($r['b']==0)
	{
		echo "Gagal Login";
	}else{
		$_SESSION['user']=$_POST['username'];
		$pl="";
		date_default_timezone_set('Asia/Jakarta');
		$skrg=date("Y-m-d h:i:s");
		mysql_query("Update userlogin SET last_login='".$skrg."' Where username='".$_POST['username']."'");
		if($g=="1")
		{
			
			$pl="admin";
			$_SESSION['hash']=$pl;
			if(isset($_GET['direct']))
			{
				echo "<script>window.location='".$_GET['direct']."'</script>";
			}else{
				echo "<script>window.location='admin/index.php'</script>";
			}
		}elseif($g=="2"){
			$pl="member";
			$_SESSION['hash']=$pl;
			if(isset($_GET['direct']))
			{
				echo "<script>window.location='".$_GET['direct']."'</script>";
			}else{
				echo "<script>window.location='member/index.php'</script>";
			}
		}
		
		
	}
}
if(isset($_POST['bdaftar']))
{
	$us=$_POST['usernamesignup'];
	$es=$_POST['emailsignup'];
	$ps=$_POST['passwordsignup'];
	$pcs=$_POST['passwordsignup_confirm'];
	if($ps==$pcs)
	{
		$sql2="Insert into userlogin (`username`,`email`,`password`,`id_cat_user`) values ('".$us."','".$es."','".md5($ps)."','2')";
		$q2=mysql_query($sql2) or die(mysql_error());
		if($q2)
		{
			echo "<script>alert('Berhasil mendaftar');window.location='panel.php'</script>";
		}
	}
}
?>
