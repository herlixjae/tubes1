<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from userlogin where sha1(username)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
}
?>
<form name="form1" method="post" action="">
  <label>Username</label>

      <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>">
      <label>Password (*) Kosongkan jika tidak mengubahnya</label>
      <input type="text" name="password" id="password">
      <label>Email</label>
      <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>">
      <label>Nama</label>
      <input type="text" name="name" id="name" value="<?php echo $row['nama']; ?>">
      <label>Phone</label>
      <input type="text" name="phone" id="phone" value="<?php echo $row['telepon']; ?>">
      <label>Jenis Login</label>
     <?php 
	 	_comboData("Select * from user_cat","id_cat_user","nm_cat_user","jenis");
	 ?>
     <label>Status Aktif</label>
     <select name="staktif">
     <option value="0"> Aktif</option>
     <option value="1"> Banned</option>
     </select>
   
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Update">
</form>
	<?php
	if(isset($_POST["button"]))
	{
		if($_POST['password']=="")
		{
			$rs=mysql_query("UPDATE userlogin SET `id_cat_user`='".$_POST['jenis']."', `username`='".$_POST['username']."', `email`='".$_POST['email']."', `nama`='".$_POST['name']."',`telepon`= '".$_POST['phone']."',banned='".$_POST['staktif']."' Where sha1(username)='".$_GET['id']."'") or die(mysql_error());
		}else{
			$rs=mysql_query("UPDATE userlogin SET `id_cat_user`='".$_POST['jenis']."', `username`='".$_POST['username']."',`password`='".$_POST['password']."',`email`='".$_POST['email']."', `nama`='".$_POST['name']."',`telepon`= '".$_POST['phone']."',banned='".$_POST['staktif']."' Where sha1(username)='".$_GET['id']."'") or die(mysql_error());
		}
		echo "<script>window.location='?p=usermanager'</script>";
	}
	?>
<?php
ob_end_flush();
?>