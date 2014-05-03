<div align="right">
<input type="button" class="btn btn-primary" name="button" id="button" value="Tambah" onclick="window.location='?p=news-add'">
</div>
<?php

	include '../includes/functions/paging.php'; //include pagination file
	
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = 3; //berapa banyak blok
	$adjacents  = 3;
	$offset = ($page - 1) * $per_page;
	
	//Cari berapa banyak jumlah data*/
	$count_query   = mysql_query("SELECT COUNT(post_id) AS numrows FROM post_article Where  post_article.create_by='".$_SESSION['user']."'",$con);
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_pages = ceil($numrows/$per_page);

	
	//jalankan query menampilkan data per blok $offset dan $per_page
	$query = mysql_query("SELECT post_article.post_id, post_article.title, post_category.nm_cat, post_article.create_by, post_article.create_date, post_article.hit, post_article.featurephoto
FROM post_article LEFT JOIN post_category ON post_article.id_cat = post_category.id_cat Where  post_article.create_by='".$_SESSION['user']."' GROUP BY post_id LIMIT $offset,$per_page");
?>
<span class="span4">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
  <td></td>
    <td>Judul</td>
     <td>Kategori</td>
    <td>Dibuat Oleh</td>    
    <td>Dibuat Tanggal</td>
    <td>Jumlah Dilihat</td>
   
    <td>&nbsp;</td>
  </tr>
  <?php
  
  while($s=mysql_fetch_array($query))
  {
	  $photo=$base_url."uploads/images/".$s['featurephoto'];
  ?>
  <tr>
  	<td><img src="<?php echo $photo; ?>" height="30" width="30" /></td>
    <td><?php echo $s['title']; ?></td>
     <td><?php echo $s['nm_cat']; ?></td>
    <td><?php echo $s['create_by']; ?></td>     
    <td><?php echo $s['create_date']; ?></td>
    <td><?php echo $s['hit']; ?></td>
    
    <td><a href="?p=news-edit&id=<?php echo sha1($s['post_id']); ?>">Edit</a> - <a href="?p=news&del=1&id=<?php echo sha1($s['post_id']); ?>">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
echo paginate("?p=news&", $page, $total_pages, $adjacents);
?>
</span>
<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from post_article Where sha1(post_id)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?p=news'</script>";
	}
}

