<form action="" method="post">
<input type="text" name="pwd"/>
<input type="submit" name="button" value="Update">
</form>
<?php
if(isset($_POST['button']))
{
	$q=mysql_query("Update login_web set password='".md5($_POST['pwd'])."' Where username='".$_SESSION['user']."'");
	if($q)
	{
		echo "<script>window.location='index.php'</script>";
	}
}
?>
