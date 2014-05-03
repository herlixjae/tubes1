
<?php
ob_start();
?>
<form name="form1" method="post" action="?p=usermanager&act=useradd1">
  <label>Username</label>

      <input type="text" name="username" id="username">
      <label>Password</label>
      <input type="password" name="password" id="password">
      <label>Email</label>
      <input type="text" name="email" id="email">
      <label>Nama</label>
      <input type="text" name="name" id="name">
      <label>Phone</label>
      <input type="text" name="phone" id="phone">
      <label>Jenis Login</label>
     <?php 
	 	_comboData("Select * from user_cat","id_cat_user","nm_cat_user","jenis");
	 ?>
   
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">
</form>
<?php
ob_end_flush();
?>
<p></p>
<p></p>
<span class="span4">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td>Username</td>
    <td>Email</td>  
    <td>Nama</td>
    <td>Telp</td>
    <td>Recent Login</td>
    <td>Status</td> 
    <td>&nbsp;</td>
  </tr>
  <?php
  $rw=mysql_query("SELECT userlogin.id_user, user_cat.nm_cat_user, userlogin.username, userlogin.password, userlogin.email, userlogin.nama, userlogin.telepon, userlogin.last_login, userlogin.banned
FROM userlogin INNER JOIN user_cat ON userlogin.id_cat_user = user_cat.id_cat_user where userlogin.username!='admin'") or die(mysql_error());
  while($s=mysql_fetch_array($rw))
  {
  ?>
  <tr>
    <td><?php echo $s['username']; ?></td>
    <td><?php echo $s['email']; ?></td>
     <td><?php echo $s['nama']; ?></td>
    <td><?php echo $s['telepon']; ?></td>
     <td><?php echo $s['last_login']; ?></td>
    <td><?php 
	$st=$s['banned']; 
	if($st=="0")
	{
		echo '<span class="label label-success">Aktif</span>';
	}elseif($st=="1")
	{
		echo '<span class="label">Non Aktif</span>';
	}
	?></td>

    <td><a href="?p=user-edit&id=<?php echo sha1($s['username']); ?>">Edit</a> - <a href="?p=usermanager&del=1&id=<?php echo sha1($s['username']); ?>">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>
</span>
<?php
if(isset($_GET['act']))
{
	
	
	$rs=mysql_query("INSERT INTO `userlogin` (`id_cat_user`, `username`, `password`, `email`, `nama`, `telepon`) VALUES
('".$_POST['jenis']."', '".$_POST['username']."', '".md5($_POST['password'])."', '".$_POST['email']."', '".$_POST['name']."', '".$_POST['phone']."')") or die(mysql_error());
	if($rs)
	{
		echo "<script>window.location='?p=usermanager'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from userlogin Where sha1(username)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?p=usermanager'</script>";
	}
}
?>
