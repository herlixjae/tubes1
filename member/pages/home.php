<?php
$q=mysql_query("Select count(post_id) as n from post_article Where create_by='".$_SESSION['user']."'");
$qr=mysql_fetch_array($q);
echo "Jumlah postingan anda adalah : <strong>".$qr['n']."</strong>";
echo "<hr>";
$q2=mysql_query("Select count(post_id) as n from komentar Where id_user='".$_SESSION['user']."'");
$qr2=mysql_fetch_array($q2);
echo "Jumlah komentar anda adalah : <strong>".$qr2['n']."</strong>";
?>