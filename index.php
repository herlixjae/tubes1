<?php
session_start();
include_once("config.php");
include_once("includes/functions/publicfunc.php");
include_once("includes/functions/dbfunc.php");
include_once("define.php");
include_once("pages/meta.php");

?>

<body>
<div class="body_wrap homepage">

<?php
if(!isset($_GET['post_id']) && !isset($_GET['category'])&& !isset($_GET['s'])&& !isset($_GET['p']))
{
 include_once("pages/slider.php"); 
}else{
	echo "<p>&nbsp;</p>";
	echo "<p>&nbsp;</p>";
	echo "<p>&nbsp;</p>";
	echo "<p>&nbsp;</p>";
}
 ?>
	
      
    
    
<div class="header_menu">
	<div class="container">
		<div class="logo"><a href="index.php"><h2 style="color:#FFF"><?php echo _getconfigdb("company_name"); ?></h2></a></div>
        <?php
		if(isset($_SESSION['hash']) && $_SESSION['hash']=="member")
		{
			?>
        <div class="top_login_box"><a href="member/index.php">Profil</a><a href="logout.php">Log Out</a></div>
            
            <?php
		}elseif(isset($_SESSION['hash']) && $_SESSION['hash']=="admin")
		{
			?>
        <div class="top_login_box"><a href="admin/index.php">Admin Page</a><a href="logout.php">Log Out</a></div>
            
            <?php
		}else{
		?>      
        <div class="top_login_box"><a href="panel.php">Sign in</a><a href="panel.php#toregister">Register</a></div>
        <?php
		}
		?>
        <div class="top_search">
        	<form id="searchForm" action="" method="get">
                <fieldset>
                	<input type="submit" id="searchSubmit" value="" />
                    <div class="input">
                        <input type="text" name="s" id="s" value="Type & press enter" />
                    </div>                    
                </fieldset>
            </form>
        </div>
        
       <?php include_once("pages/menu.php"); ?>
    </div>
</div>
   	
<!--/ header -->

<?php
if(isset($_GET['post_id']))
{
	include("pages/artikel.php");
}elseif(isset($_GET['category']))
{
	include("pages/category.php");
}elseif(isset($_GET['p']))
{
	include("pages/".$_GET['p'].".php");
}elseif(isset($_GET['s']))
{
	include("pages/cari.php");
}else{
	include("pages/home.php");
}
?>
   

</div>   
</body>
</html>
