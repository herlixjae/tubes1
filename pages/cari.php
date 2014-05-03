<p>&nbsp;</p><br />

<?php
include 'includes/functions/paging.php';
//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = 3; //berapa banyak blok
	$adjacents  = 3;
	$offset = ($page - 1) * $per_page;
	
	//Cari berapa banyak jumlah data*/
	$count_query   = mysql_query("SELECT COUNT(post_id) AS numrows FROM post_article Where post_article.post_entry LIKE '%".$_GET['s']."%'",$con);
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_pages = ceil($numrows/$per_page);
	
$query=mysql_query("SELECT post_article.post_id,post_article.id_cat, post_article.title, post_article.featurephoto, post_article.post_entry, post_article.create_date, post_article.hit, post_article.create_by,  post_category.nm_cat
FROM (post_article LEFT JOIN komentar ON post_article.post_id = komentar.post_id) LEFT JOIN post_category ON post_article.id_cat = post_category.id_cat Where post_article.post_entry LIKE '%".$_GET['s']."%'  GROUP BY post_id ORDER BY `create_date` DESC LIMIT $offset,$per_page") or die(mysql_error());
$rc=mysql_num_rows($q);
echo "<center>Hasil temuan kata kunci <strong>".$_GET['s']."</strong> adalah ".$rc."</center><p>&nbsp;</p>";
while($qr=mysql_fetch_array($query))
{
?>

    
        <div class="featured_list">
            
            <div class="post-descr">
                <h2><a href="?post_id=<?php echo $qr['post_id']; ?>"><?php echo $qr['title']; ?></a></h2><div class="meta-date"><?php echo timeAgo($qr['create_date']); ?></div>
                <p class="post-short">
                <img src="uploads/_thumbs/images/<?php echo $qr['featurephoto']; ?>" width="120" height="100" alt="" /> <?php  limit_text($qr['post_entry'],200); ?> 
                </p>
                <div class="meta-bot"><a href="?post_id=<?php echo $qr['post_id']; ?>" class="button_link"><span>Read</span></a> &nbsp;
            </div>
        </div></div>
                
<?php } ?>   
<div align="center"> 
<?php
echo paginate("?s=".$_GET['s']."&", $page, $total_pages, $adjacents);
?>
</div>
    <div class="clear"></div>
    