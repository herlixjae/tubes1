<script src="<?php echo $base_url; ?>includes/ckeditor/ckeditor.js"></script>
<script src="<?php echo $base_url; ?>includes/ckfinder/ckfinder.js"></script>
<?php
ob_start();
?>
<form name="form1" method="post" action="">
  	  <label>Judul</label>
      <input type="text" name="judul" id="judul">
     	<label>Kategori</label>
     <?php 
	 	_comboData("Select * from post_category","id_cat","nm_cat","kategori");
	 ?>
      <label>Feature Image (akan ditampilkan sebagai thumbnails)</label>
      <input type="text" name="photo" id="photo" onClick="window.open('<?php echo $base_url; ?>includes/imguploads/index.php','popuppage','width=600,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');">
      <input type="hidden" name="ext" id="ext" />
<input type="hidden" name="nfile" id="nfile" />

<p></p>
      <label>Isi Berita</label>
      <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
   	
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Tambah">
</form>
<script type="text/javascript">

// This is a check for the CKEditor class. If not defined, the paths must be checked.
if ( typeof CKEDITOR == 'undefined' )
{
	document.write(
		'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
		'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
		'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
		'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
		'value (line 32).' ) ;
}
else
{
	var editor = CKEDITOR.replace( 'editor1' );	

	// Just call CKFinder.SetupCKEditor and pass the CKEditor instance as the first argument.
	// The second parameter (optional), is the path for the CKFinder installation (default = "/ckfinder/").
	CKFinder.setupCKEditor( editor, '<?php echo $base_url; ?>includes/ckfinder/' ) ;

	// It is also possible to pass an object with selected CKFinder properties as a second argument.
	// CKFinder.SetupCKEditor( editor, { BasePath : '../../', RememberLastFolder : false } ) ;
}

		</script>
<?php
if(isset($_POST["button"]))
{
	
	date_default_timezone_set('Asia/Jakarta');
	$skrg=date("Y-m-d h:i:s");
	$rs=mysql_query("INSERT INTO post_article (`title`, `featurephoto`, `post_entry`, `create_date`,`create_by`,`hit`,`id_cat`,`status`) VALUES ('".$_POST['judul']."','".$_POST['photo']."', '".$_POST['editor1']."','".$skrg."','".$_SESSION['user']."','0','".$_POST['kategori']."','0')") or die(mysql_error());
	
	if($rs)
	{			
		_direct("?p=news");
		
	}
}
ob_end_flush();
?>