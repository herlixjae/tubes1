<?php
if(_checksession("add")==true)
{
?>
<div class="alert alert-success">SUKSES UPDATE DATA</div>
<?php } ?>
<div class="span9">
<fieldset>
<form action="" method="post" id="edit-profile" class="form-horizontal">
<?php
$q=mysql_query("Select * from options");
$i=0;
while($r=mysql_fetch_array($q))
{
	$i=$i+1;
?>
<label><?php echo $i." "; ?> <?php echo strtoupper(str_replace("_"," ",$r['options_name'])); ?></label>
<input name="config[]" value="<?php echo $r['value']; ?>"><hr>
<?php
}
?>
<input type="submit" class="btn btn-primary btn-large" value="Simpan" name="button">
</form>

<?php
if(isset($_POST['button']))
{
	
    //	_RunSQL("Update options SET value='".$_POST[$b]."' Where idoptions='".$_POST[$b]."'","Berhasil diupdate","?p=appconfig");
	//echo $_POST[$b].name;		
	$i=0;
	foreach ($_POST['config'] AS $value) {
		$i=$i+1;
        // add to the database
        $sql = "Update options SET value = '". mysql_real_escape_string($value)."' Where idoptions='".$i."'";

		_RunSQL($sql);
    }
	_direct("?p=appconfig");
	_setsession("add","1");
}
?>
</fieldset>
</div>