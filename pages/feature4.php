<?php

$q=mysql_query("SELECT post_article.post_id, post_article.title, post_article.featurephoto, post_article.post_entry, post_article.create_date, post_article.hit, post_article.create_by, COUNT(komentar.id_komentar) as komen, post_category.nm_cat
FROM (post_article LEFT JOIN komentar ON post_article.post_id = komentar.post_id) LEFT JOIN post_category ON post_article.id_cat = post_category.id_cat Where post_article.id_cat='".$feature_cat_4."' and post_article.status='1' GROUP BY post_article.post_id ORDER BY `create_date` DESC") or die(mysql_error());
$qr=mysql_fetch_array($q);

?>
<div class="featured_post featured_style2">
            <div class="meta-date"><span class="ico_cat"><?php echo $qr['nm_cat']; ?></span> <?php echo timeAgo($qr['create_date']); ?></div>
            <div class="post-name">
            	<div class="post-image"><img src="uploads/_thumbs/images/<?php echo $qr['featurephoto']; ?>" width="300" height="200" alt="" /></div>
            	<div class="post-title"><a href="?post_id=<?php echo $qr['post_id']; ?>"><?php echo $qr['title']; ?></a></div>
            </div>
            <p class="post-short"><strong><?php echo $qr['create_by']; ?></strong> - <?php  limit_text($qr['post_entry'],200); ?></p>
			<div class="meta-bot"><a href="?post_id=<?php echo $qr['post_id']; ?>" class="button_link"><span>Read</span></a> &nbsp; <a href="article.html#comments" class="link-comments"><?php echo $qr['komen']; ?> Comments</a></div>
		</div>
        
        <div class="featured_list">
            <ul>
            <?php
			while($r=mysql_fetch_array($q))
			{
			?>
                <li>
                <a href="?post_id=<?php echo $r['post_id']; ?>" class="post-title"><?php echo $r['title']; ?></a>
                <div class="meta-date"><?php echo timeAgo($r['create_date']); ?></div>
                </li>                                        
            <?php
			}
			?>
            </ul>
        </div>