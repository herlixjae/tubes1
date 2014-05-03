<?php
date_default_timezone_set('Asia/Jakarta');
$skrg=date("Y-m-d");

$q=mysql_query("Select * from post_article where DATE_FORMAT(create_date,'%Y-%m-%d')='".$skrg."' and post_article.status='1'");
$qr=mysql_fetch_array($q);
$q1=mysql_query("Select * from post_category where id_cat='".$qr['id_cat']."'");
$qr1=mysql_fetch_array($q1);
$qc=mysql_query("Select count(id_komentar) as b from komentar where post_id='".$qr['post_id']."'");
$qc1=mysql_fetch_array($qc);
?>
 <div class="featured_post">
                        	<div class="meta-date"><span class="ico_cat"><?php echo $qr1['nm_cat']; ?></span> <?php echo timeAgo($qr['create_date']); ?></div>
                        	<div class="post-name">
                            	<div class="post-image"><img src="uploads/_thumbs/images/<?php echo $qr['featurephoto']; ?>" width="300" height="295" alt="" /></div>
                                <div class="post-title"><a href="?post_id=<?php echo $qr['post_id']; ?>"><?php echo $qr['title']; ?></a></div>
                          	</div>
                          	<div class="post-short"><?php  limit_text($qr['post_entry'],200); ?></div>
                            <div class="meta-bot"><a href="?post_id=<?php echo $qr['post_id']; ?>" class="button_link"><span>Read</span></a> &nbsp; <a href="?post_id=<?php echo $qr['post_id']; ?>#comments" class="link-comments"><?php echo $qc1['b']; ?> Comments</a></div>
                        </div>
                        
                        <div class="featured_list">

                        	<ul>
                            <?php
$r=mysql_query("Select * from post_article where DATE_FORMAT(create_date,'%Y-%m-%d')='".$skrg."' and post_id!='".$qr['post_id']."' and post_article.status='1' LIMIT 0,".$limit_post_home."");
while($rr=mysql_fetch_array($r))
{
$r1=mysql_query("Select * from post_category where id_cat='".$rr['id_cat']."'");
$rr1=mysql_fetch_array($r1);
						?>
                            	<li>
                                <a href="?post_id=<?php echo $rr['post_id']; ?>" class="post-title"><?php echo $rr['title']; ?></a>
                                <div class="meta-date"><span class="ico_cat"><?php echo $rr1['nm_cat']; ?></span> <?php echo timeAgo($rr['create_date']); ?></div>
                                </li>
                              <?php } ?>
                            </ul>
                           
                        </div>
                        
                        <div class="clear"></div>