<?php
$g=new BS_HTML_Func();
$g->input("text","nama");
$g->input("text","email");
$g->input("textarea","komentar");
$g->input("submit","simpan");

if($g->post)
{
	$s=new BS_DB_Function();
	$s->InsertSchema("nama","email","komentar");
	$s->InsertValue($_POST['nama'],$_POST['email'],$_POST['komentar']);
	$s->direct("_self");
}
?>