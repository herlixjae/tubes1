<?php
$q=mysql_query("Select * from userlogin Where username='".$_SESSION['user']."'");
$r=mysql_fetch_array($q);
?>
<form name="form1" method="post" action="">
<label>Nama Lengkap</label>
<input type="text" name="nama" value="<?php echo $r['nama']; ?>"><br>
<label>Nama Panggilan</label>
<input type="text" name="public_name" value="<?php echo $r['public_name']; ?>"><br>
<label>Alamat</label>
<input type="text" name="alamat" value="<?php echo $r['alamat']; ?>"><br>
<label>Telepon</label>
<input type="text" name="telepon" value="<?php echo $r['telepon']; ?>"><br>
<label>nama</label>
<select name="jk">
<option value="l">Laki-Laki</option>
<option value="p">Perempuan</option>
</select><br>
<label>Email</label>
<input type="text" name="email" value="<?php echo $r['email']; ?>"><br>
<label>Website</label>
<input name="website" type="text" value="<?php echo $r['website']; ?>" size="80"><br>
<label>Avatar</label>
<input name="avatar" type="text" value="<?php echo $r['avatar']; ?>" size="80"><br>

<input type="submit" name="submit" value="Ubah">
</form>
<?php
if(isset($_POST['submit']))
{
	$rs=mysql_query("Update userlogin SET nama='".$_POST['nama']."',public_name='".$_POST['public_name']."',alamat='".$_POST['alamat']."',telepon='".$_POST['telepon']."',jenis_kelamin='".$_POST['jk']."',email='".$_POST['email']."',website='".$_POST['website']."',avatar='".$_POST['avatar']."' Where username='".$_SESSION['user']."'");
	if($rs)
	{
		_direct('?p=profil-edit');
	}
}
?>