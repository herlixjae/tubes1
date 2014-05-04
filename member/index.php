<?php
session_start();
//CORE
//error_reporting(0);
if(!isset($_SESSION['hash']) && $_SESSION['hash']!="member")
{
	session_destroy();
	echo "<script>window.location='../index.php'</script>";
	
}
include("../config.php");
require_once('../includes/functions/publicfunc.php');
require_once('../includes/functions/dbfunc.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
<head>

		<meta charset="utf-8">
		<title>Member</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">        
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/site.css" rel="stylesheet">
        <link href="css/datepicker.css" rel="stylesheet">
        
        <script src="../js/jquery-1.9.1.js"></script>        
        <script src="js/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" href="../js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen">
      <script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
<body>

		<div class="container">       
        
			<div class="navbar">
            
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#">Member</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li class="active">
									<a href="index.php">Dashboard</a>
								</li>                                						
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Entri <b class="caret"></b></a>
									<ul class="dropdown-menu">
                                    	<li class="nav-header">
											Posting
										</li>
                                        <li>
											<a href="?p=news">Posting Member</a>
										</li>
										<li>
											<a href="?p=news-add">Tambah Posting</a>
										</li>										
																			
									</ul>
                                    
                                   <li><a href="?p=profil-edit">Edit Profil</a></li> 
                                        
								</li>
                               
							</ul>							
							<ul class="nav pull-right">
								<li>
									<a href="?p=chgpwd"><?php echo $_SESSION['user']; ?></a>
								</li>
                                 <li>
									<a href="<?php echo $base_url; ?>" target="_blank">View Site</a>
								</li>
								<li>
									<a href="../logout.php">Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
				<div class="span9">				  
				<?php
				
					if(isset($_GET['p']))
					{
						include("pages/".$_GET['p'].".php");
					}else{
						echo "<h1>WELCOME MEMBER</h1>";
						include("pages/home.php");
					}
				?>
			  </div>
			</div>
		</div>
		
		<script src="js/bootstrap.min.js"></script>
		<script src="js/site.js"></script>
        
        
        <script type="text/javascript"  src="../js/plug_ins.js"></script>  
<!-- Google Maps API -->	
<script type="text/javascript" src="../js/google_map.js"></script>
<script src="../js/functions.js"></script>
</body>
</html>
