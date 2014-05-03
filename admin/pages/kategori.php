
<?php
ob_start();
?>
<form name="form1" method="post" action="">
  <label>Nama Kategori</label>

      <input type="text" name="nmcat" id="username">
   
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
    <td>ID</td>
    <td>Nama Kategori</td>  
    
    <td>&nbsp;</td>
  </tr>
  <?php
  $rw=mysql_query("Select * from post_category");
  while($s=mysql_fetch_array($rw))
  {
  ?>
  <tr>
    <td><?php echo $s['id_cat']; ?></td>
    <td><?php echo $s['nm_cat']; ?></td>   

    <td><a href="?p=kategori&del=1&id=<?php echo sha1($s['id_cat']); ?>">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>
</span>
<?php
if(isset($_POST['button']))
{
	
	
	$rs=mysql_query("Insert into post_category (nm_cat) values ('".$_POST['nmcat']."')") or die(mysql_error());
	if($rs)
	{
		echo "<script>window.location='?p=kategori'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from post_category Where sha1(id_cat)='".$ids."'") or die(mysql_error());
	if($ff)
	{
		echo "<script>window.location='?p=kategori'</script>";
	}
}
?>
